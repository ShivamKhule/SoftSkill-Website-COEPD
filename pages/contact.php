<?php
$pageTitle = "Contact Us - SoftSkill Mentor Academy";

// Include configuration files
require_once __DIR__ . '/../config.php';

// Start session for flash messages
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include email configuration
require_once __DIR__ . '/../config_email.php';

include __DIR__ . '/../includes/functions.php';
$courses = loadData(__DIR__ . '/../data/courses.json');
$batches = loadData(__DIR__ . '/../data/batches.json');
require_once __DIR__ . '/../includes/db.php';

$db = new Database();
$db->connectServerWithDB();
$db->createContactUsTable();
$db->createEnrollmentsTable();
$db->createBatchesTable();

$name = $phone = $email = $course = $mode = $message = '';
$show_success_alert = false;
$success_message = '';
$is_enrollment = false;

// Check if this is an enrollment request
if (isset($_GET['batch']) && isset($_GET['course'])) {
    $is_enrollment = true;
    $selected_batch_id = $_GET['batch'];
    $selected_course_id = $_GET['course'];

    // Find the selected batch
    foreach ($batches as $batch) {
        if ($batch['id'] == $selected_batch_id) {
            $selected_batch = $batch;
            break;
        }
    }

    // Find the selected course
    foreach ($courses as $course_item) {
        if ($course_item['id'] == $selected_course_id) {
            $selected_course = $course_item;
            break;
        }
    }
}

// Check for success messages from session (flash messages)
if (isset($_SESSION['success_message'])) {
    $show_success_alert = true;
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']); // Clear the message so it doesn't show again
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Start output buffering to prevent any output before header redirects
    if (ob_get_level() == 0)
        ob_start();

    $name = isset($_POST["name"]) ? test_input($_POST["name"]) : '';
    $phone = isset($_POST["phone"]) ? test_input($_POST["phone"]) : '';
    $email = isset($_POST["email"]) ? test_input($_POST["email"]) : '';
    $course = isset($_POST["course"]) ? test_input($_POST["course"]) : '';
    $mode = isset($_POST["mode"]) ? test_input($_POST["mode"]) : '';
    $message = isset($_POST["message"]) ? test_input($_POST["message"]) : '';

    // Check if this is an enrollment
    if (isset($_POST["is_enrollment"]) && $_POST["is_enrollment"] == "1") {
        $batch_id = isset($_POST["batch_id"]) ? test_input($_POST["batch_id"]) : '';

        // Insert enrollment into database
        $enrollment_id = $db->insertEnrollment($name, $email, $phone, $batch_id, $course);

        if ($enrollment_id) {
            // Send confirmation email
            sendEnrollmentEmail($name, $email, $batch_id, $course, $batches, $courses);

            // Set success message in session for redirect
            $_SESSION['success_message'] = 'Thank you for enrolling! A confirmation email has been sent to your email address.';

            // Clear form fields after successful submission
            $name = $phone = $email = $course = $mode = $message = '';

            // Clean any output and redirect
            ob_clean();
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $error_message = 'There was an error processing your enrollment. Please try again.';
        }
    } else {
        // Regular contact form submission
        $result = $db->insertContactMessage($name, $phone, $email, $course, $mode, $message);

        if (strpos($result, '✔') !== false) {
            // Send notification email to site owner
            sendContactNotificationEmail($name, $phone, $email, $course, $mode, $message);

            // Set success message in session for redirect
            $_SESSION['success_message'] = 'Thank you! Your message has been sent successfully.';

            // Clear form fields after successful submission
            $name = $phone = $email = $course = $mode = $message = '';

            // Clean any output and redirect
            ob_clean();
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }

    // Flush output buffer
    ob_end_flush();
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function sendEnrollmentEmail($name, $email, $batch_id, $course_id, $batches, $courses)
{
    // Find batch and course details
    $batch_details = null;
    $course_details = null;

    foreach ($batches as $batch) {
        if ($batch['id'] == $batch_id) {
            $batch_details = $batch;
            break;
        }
    }

    foreach ($courses as $course) {
        if ($course['id'] == $course_id) {
            $course_details = $course;
            break;
        }
    }

    // Load program details - now supports multiple programs
    $program = getProgramById($course_id);

    if (!$batch_details || !$course_details) {
        return false;
    }

    if (!$program) {
        // Fallback to basic program info from course
        $program_title = isset($course_details['title']) ? $course_details['title'] : 'Our Program';
        $is_coming_soon = false;
    } else {
        $program_title = $program['title'];
        $is_coming_soon = isset($program['status']) && $program['status'] === 'coming_soon';
    }

    // Email content
    $subject = "Enrollment Confirmation - " . $program_title;

    $message = "
    <html>
    <head>
        <title>Enrollment Confirmation</title>
    </head>
    <body>
        <h2>Enrollment Confirmation</h2>
        <p>Dear " . $name . ",</p>
        <p>Thank you for enrolling in our program. Here are the details of your enrollment:</p>
        
        <h3>Program Details</h3>
        <ul>
            <li><strong>Program:</strong> " . (isset($course_details['title']) ? $course_details['title'] : 'N/A') . "</li>
            <li><strong>Batch ID:</strong> " . $batch_details['id'] . "</li>
            <li><strong>Start Date:</strong> " . date('M j, Y', strtotime($batch_details['startDate'])) . "</li>
            <li><strong>End Date:</strong> " . date('M j, Y', strtotime($batch_details['endDate'])) . "</li>
            <li><strong>Timings:</strong> " . $batch_details['timings'] . "</li>
            <li><strong>Mode:</strong> " . $batch_details['mode'] . "</li>
            <li><strong>Instructor:</strong> " . $batch_details['instructor'] . "</li>
        </ul>";

    // Add program details if available
    if ($program) {
        if ($is_coming_soon) {
            $message .= "
        <h3>Program Overview</h3>
        <p><strong>Status:</strong> Coming Soon</p>
        <p><strong>Audience:</strong> " . (isset($program['audience']) ? (is_array($program['audience']) ? implode(', ', $program['audience']) : $program['audience']) : 'N/A') . "</p>";
        } else {
            $message .= "
        <h3>Program Overview</h3>
        <p><strong>Duration:</strong> " . (isset($program['duration']) ? $program['duration'] : 'N/A') . "</p>
        <p><strong>Daily Time Commitment:</strong> " . (isset($program['dailyTime']) ? $program['dailyTime'] : 'N/A') . "</p>
        <p><strong>Practical Content:</strong> " . (isset($program['practicalPercentage']) ? $program['practicalPercentage'] : 'N/A') . "</p>";
        }

        if (!$is_coming_soon && isset($program['structure']) && is_array($program['structure'])) {
            $message .= "<h3>Program Structure</h3>";

            // Add program structure details
            foreach ($program['structure'] as $monthIndex => $month) {
                $message .= "<h4>Module " . ($monthIndex + 1) . " - " . (isset($month['title']) ? $month['title'] : 'N/A') . "</h4>";
                if (isset($month['weeks']) && is_array($month['weeks'])) {
                    $message .= "<ul>";
                    foreach ($month['weeks'] as $week) {
                        $message .= "<li><strong>Week " . (isset($week['week']) ? $week['week'] : 'N/A') . ":</strong> " . (isset($week['title']) ? $week['title'] : 'N/A') . "</li>";
                    }
                    $message .= "</ul>";
                }
            }
        } elseif ($is_coming_soon) {
            $message .= "<h3>Program Information</h3>";
            $message .= "<p>This program is coming soon. Please check back later for detailed structure and content.</p>";
        }

        if (!$is_coming_soon && isset($program['programDeliverables']) && is_array($program['programDeliverables'])) {
            $message .= "
                <h3>Program Deliverables</h3>
                <ul>";

            // Add program deliverables
            foreach ($program['programDeliverables'] as $deliverable) {
                $message .= "<li>" . $deliverable . "</li>";
            }

            $message .= "</ul>";
        } elseif ($is_coming_soon) {
            $message .= "
                <h3>Coming Soon</h3>
                <p>More information about program deliverables will be available when the program launches.</p>";
        }
    }

    $message .= "
        <h3>Next Steps</h3>
        <ol>
            <li>Please check your email for payment instructions.</li>
            <li>You will receive joining instructions 24 hours before the program starts.</li>
            <li>Download our mobile app for daily micro-learning sessions.</li>
        </ol>
        
        <p>If you have any questions, please contact us at info@softskillmentor.com</p>
        
        <p>Best regards,<br/>
        The SoftSkill Mentor Academy Team</p>
    </body>
    </html>
    ";

    // Try to send email using multiple methods
    $email_sent = false;

    // Method 1: Try PHPMailer
    $email_sent = sendEmailWithPHPMailer($email, $name, $subject, $message);

    // Method 2: Try basic mail function if PHPMailer not available or failed
    if (!$email_sent) {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: SoftSkill Mentor Academy <info@softskillmentor.com>" . "\r\n";

        $email_sent = mail($email, $subject, $message, $headers);
    }

    // Method 3: Save to file as backup
    if (!$email_sent) {
        $email_sent = saveEmailToFile($email, $name, $subject, $message);
    }

    return $email_sent;
}

function sendEmailWithPHPMailer($to_email, $to_name, $subject, $message)
{
    // Check if email config is loaded
    if (!defined('SMTP_HOST')) {
        // Try to load config if not already loaded
        if (file_exists(__DIR__ . '/../config_email.php')) {
            require_once __DIR__ . '/../config_email.php';
        } else {
            error_log("Email config file not found");
            return false;
        }
    }

    // Verify all required constants are defined
    $required_constants = ['SMTP_HOST', 'SMTP_PORT', 'SMTP_USERNAME', 'SMTP_PASSWORD', 'SENDER_EMAIL', 'SENDER_NAME'];
    foreach ($required_constants as $constant) {
        if (!defined($constant)) {
            error_log("Required constant not defined: " . $constant);
            return false;
        }
    }

    // Include PHPMailer classes
    $phpmailer_path = __DIR__ . '/../libs/PHPMailer.php';

    if (!file_exists($phpmailer_path)) {
        error_log("PHPMailer not found at: " . $phpmailer_path);
        return false;
    }

    require_once __DIR__ . '/../libs/PHPMailer.php';
    require_once __DIR__ . '/../libs/SMTP.php';
    require_once __DIR__ . '/../libs/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = SMTP_ENCRYPTION === 'ssl' ? PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS :
            (SMTP_ENCRYPTION === 'tls' ? PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS :
                PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_NONE);
        $mail->Port = SMTP_PORT;
        $mail->SMTPDebug = 0; // DISABLE debugging to prevent output to browser
        $mail->Timeout = 30; // Set timeout to 30 seconds

        // Recipients
        $mail->setFrom(SENDER_EMAIL, SENDER_NAME);
        $mail->addAddress($to_email, $to_name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = strip_tags($message); // Plain text version

        $result = $mail->send();
        error_log("Email sent successfully using PHPMailer to: " . $to_email);
        return true;
    } catch (Exception $e) {
        error_log("PHPMailer error: " . $mail->ErrorInfo);
        error_log("Exception message: " . $e->getMessage());
        return false;
    }
}

function saveEmailToFile($to_email, $to_name, $subject, $message)
{
    // Save email to file as backup method
    $email_data = [
        'to' => $to_email,
        'name' => $to_name,
        'subject' => $subject,
        'message' => $message,
        'timestamp' => date('Y-m-d H:i:s')
    ];

    $emails_dir = __DIR__ . '/../emails';
    if (!file_exists($emails_dir)) {
        mkdir($emails_dir, 0777, true);
    }

    $filename = $emails_dir . '/email_' . time() . '_' . uniqid() . '.json';
    $saved = file_put_contents($filename, json_encode($email_data, JSON_PRETTY_PRINT));

    return $saved !== false;
}

function sendContactNotificationEmail($name, $phone, $email, $course, $mode, $message)
{
    // Email content for site owner
    $subject = "New Contact Form Submission - SoftSkill Mentor Academy";

    $email_message = "
    <html>
    <head>
        <title>New Contact Form Submission</title>
    </head>
    <body>
        <h2>New Contact Form Submission</h2>
        <p>You have received a new message from your website contact form.</p>
        
        <h3>Contact Details:</h3>
        <ul>
            <li><strong>Name:</strong> " . $name . "</li>
            <li><strong>Email:</strong> " . $email . "</li>
            <li><strong>Phone:</strong> " . $phone . "</li>
            <li><strong>Course Interest:</strong> " . $course . "</li>
            <li><strong>Preferred Mode:</strong> " . $mode . "</li>
        </ul>
        
        <h3>Message:</h3>
        <p>" . nl2br($message) . "</p>
        
        <p>This message has been automatically generated from your website contact form.</p>
    </body>
    </html>
    ";

    // Send email to site owner - ONLY using info@softskillmentor.com
    sendEmailWithPHPMailer('info@softskillmentor.com', 'SoftSkill Mentor Academy', $subject, $email_message);
}
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20 animate-fade-in">
    <div class="container mx-auto px-4 text-center animate-slide-up">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">
            <?php echo $is_enrollment ? 'Enroll Now' : 'Contact Us'; ?>
        </h1>
        <p class="text-xl max-w-3xl mx-auto animate-fade-in-delay">
            <?php echo $is_enrollment ? 'Complete your enrollment in our program' : 'Have questions about our training programs? Get in touch with our team.'; ?>
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 contact-container">
            <!-- Contact Form -->
            <div class="animate-fade-in-left">
                <h2 class="text-3xl font-bold mb-6">
                    <?php echo $is_enrollment ? 'Complete Your Enrollment' : 'Send Us a Message'; ?>
                </h2>

                <?php if ($is_enrollment && isset($selected_batch) && isset($selected_course)): ?>
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                        <h3 class="font-bold text-lg mb-2">Program Enrollment Details</h3>
                        <p><strong>Program:</strong> <?php echo $selected_course['title']; ?></p>
                        <p><strong>Batch:</strong> <?php echo $selected_batch['id']; ?></p>
                        <p><strong>Start Date:</strong>
                            <?php echo date('M j, Y', strtotime($selected_batch['startDate'])); ?></p>
                        <p><strong>Timings:</strong> <?php echo $selected_batch['timings']; ?></p>
                        <p><strong>Mode:</strong> <?php echo $selected_batch['mode']; ?></p>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                    class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-xl shadow-md animate-fade-in-up"
                    id="contactForm">
                    <?php if ($is_enrollment): ?>
                        <input type="hidden" name="is_enrollment" value="1">
                        <input type="hidden" name="batch_id"
                            value="<?php echo $is_enrollment ? $selected_batch_id : ''; ?>">
                        <input type="hidden" name="course" value="<?php echo $is_enrollment ? $selected_course_id : ''; ?>">
                        <input type="hidden" name="mode"
                            value="<?php echo $is_enrollment && isset($selected_batch) ? strtolower($selected_batch['mode']) : ''; ?>">
                    <?php endif; ?>

                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $name; ?>"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transform focus:scale-[1.02] transition duration-300"
                            placeholder="Your name" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transform focus:scale-[1.02] transition duration-300"
                                placeholder="Your phone number">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                            <input type="email" id="email" name="email" value="<?php echo $email; ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transform focus:scale-[1.02] transition duration-300"
                                placeholder="Your email address" required>
                        </div>
                    </div>

                    <?php if (!$is_enrollment): ?>
                        <div class="mb-6">
                            <label for="course" class="block text-gray-700 font-medium mb-2">Course Interest</label>
                            <select id="course" name="course"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transform focus:scale-[1.02] transition duration-300">
                                <option value="">Select a course</option>
                                <?php 
                                // Load all programs and filter out 'coming soon' ones
                                $all_programs = loadData(__DIR__ . '/../data/programs.json');
                                foreach ($all_programs as $program_item):
                                    if (!isset($program_item['status']) || $program_item['status'] !== 'coming_soon'):
                                ?>
                                    <option value="<?php echo $program_item['id']; ?>" <?php echo ($course == $program_item['id']) ? 'selected' : ''; ?>><?php echo $program_item['title']; ?></option>
                                <?php 
                                    endif;
                                endforeach;
                                foreach ($courses as $course_item): ?>
                                    <option value="<?php echo $course_item['id']; ?>" <?php echo ($course == $course_item['id']) ? 'selected' : ''; ?>><?php echo $course_item['title']; ?></option>
                                <?php endforeach; ?>
                                <option value="corporate" <?php echo ($course == 'corporate') ? 'selected' : ''; ?>>Corporate
                                    Training</option>
                                <option value="other" <?php echo ($course == 'other') ? 'selected' : ''; ?>>Other Inquiry
                                </option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="mode" class="block text-gray-700 font-medium mb-2">Preferred Mode</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <label
                                    class="flex items-center bg-gray-100 p-3 rounded-lg cursor-pointer hover:bg-blue-50 transform hover:scale-105 transition duration-300">
                                    <input type="radio" name="mode" value="online" class="mr-2" <?php echo ($mode == 'online') ? 'checked' : ''; ?>>
                                    <span>Online</span>
                                </label>
                                <label
                                    class="flex items-center bg-gray-100 p-3 rounded-lg cursor-pointer hover:bg-blue-50 transform hover:scale-105 transition duration-300">
                                    <input type="radio" name="mode" value="inperson" class="mr-2" <?php echo ($mode == 'inperson') ? 'checked' : ''; ?>>
                                    <span>In-person</span>
                                </label>
                                <label
                                    class="flex items-center bg-gray-100 p-3 rounded-lg cursor-pointer hover:bg-blue-50 transform hover:scale-105 transition duration-300">
                                    <input type="radio" name="mode" value="hybrid" class="mr-2" <?php echo ($mode == 'hybrid') ? 'checked' : ''; ?>>
                                    <span>Hybrid</span>
                                </label>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="mb-6">
                        <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                        <textarea id="message" rows="5" name="message"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transform focus:scale-[1.02] transition duration-300"
                            placeholder="<?php echo $is_enrollment ? 'Any special requirements or questions?' : 'Your message'; ?>"><?php echo $message; ?></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105 shadow-md flex items-center justify-center"
                        id="submitBtn">
                        <span id="btnText"><?php echo $is_enrollment ? 'Complete Enrollment' : 'Send Message'; ?></span>
                        <span id="loadingSpinner" class="hidden ml-2">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </span>
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="animate-fade-in-right">
                <h2 class="text-3xl font-bold mb-6">Get In Touch</h2>

                <div
                    class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-xl shadow-md mb-8 contact-info-card animate-fade-in-up delay-1">
                    <div class="space-y-6">
                        <div class="flex items-start animate-fade-in-left delay-1">
                            <div class="text-blue-600 text-2xl mr-4 mt-1">
                                <i class="fas fa-map-marker-alt animate-bounce"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">Our Location</h3>
                                <p class="text-gray-600">Office No: 301, 3rd Floor, Walchand House Happy Colony Lane, 1, Warje Malwadi Rd,
                                    above PNG & sons Jwellery store, Kothrud, Pune, Maharashtra 411038</p>
                            </div>
                        </div>

                        <div class="flex items-start animate-fade-in-left delay-2">
                            <div class="text-blue-600 text-2xl mr-4 mt-1">
                                <i class="fas fa-phone animate-bounce"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">Phone Number</h3>
                                <p class="text-gray-600">+91 9154829627</p>
                                <p class="text-gray-600 mt-1">WhatsApp: <a href="https://wa.me/9154829627"
                                        class="text-green-600 hover:text-green-800 transform hover:underline">Chat with
                                        us</a></p>
                            </div>
                        </div>

                        <div class="flex items-start animate-fade-in-left delay-3">
                            <div class="text-blue-600 text-2xl mr-4 mt-1">
                                <i class="fas fa-envelope animate-bounce"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">Email Address</h3>
                                <p class="text-gray-600">info@softskillmentor.com</p>
                            </div>
                        </div>

                        <div class="flex items-start animate-fade-in-left delay-4">
                            <div class="text-blue-600 text-2xl mr-4 mt-1">
                                <i class="fas fa-clock animate-bounce"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">Working Hours</h3>
                                <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM</p>
                                <p class="text-gray-600">Saturday: 10:00 AM - 4:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-br from-blue-600 to-teal-500 text-white p-8 rounded-xl shadow-md contact-emergency-card animate-fade-in-up delay-2">
                    <h3 class="text-xl font-bold mb-4">Need Immediate Assistance?</h3>
                    <p class="mb-4">For urgent inquiries, call our support line:</p>
                    <p class="text-2xl font-bold">+91 9154829627</p>
                    <p class="mt-4 text-blue-100">Available Monday-Friday, 9:00 AM - 6:00 PM</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Find Us</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Visit our training center for in-person sessions and consultations.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden h-96 map-container animate-fade-in-up">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.7216923120554!2d73.81149677496235!3d18.496261382592554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bfb6b6abee15%3A0xf60f9720b95207c1!2sCOEPD!5e0!3m2!1sen!2sin!4v1765269128315!5m2!1sen!2sin"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>


<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white animate-fade-in">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-pulse-slow">Ready to Start Your Journey?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto animate-fade-in-delay">Join thousands of professionals who have
            advanced their careers with
            our proven training programs.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-delay-2">
            <a href="<?php echo BASE_PATH; ?>/pages/programs.php"
                class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105 shadow-lg">Explore
                Courses</a>
            <a href="#"
                class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105">Free
                E-book</a>
        </div>
    </div>
</section>

<style>
    /* Animation classes */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    @keyframes pulseSlow {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.8;
        }
    }

    /* Base animation classes */
    .animate-fade-in {
        animation: fadeIn 0.8s ease-out forwards;
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }

    .animate-fade-in-down {
        animation: fadeInDown 0.6s ease-out forwards;
        opacity: 0;
    }

    .animate-fade-in-left {
        animation: fadeInLeft 0.6s ease-out forwards;
        opacity: 0;
    }

    .animate-fade-in-right {
        animation: fadeInRight 0.6s ease-out forwards;
        opacity: 0;
    }

    .animate-slide-up {
        animation: slideUp 0.8s ease-out forwards;
        opacity: 0;
    }

    .animate-bounce {
        animation: bounce 2s ease-in-out infinite;
    }

    .animate-pulse-slow {
        animation: pulseSlow 2s ease-in-out infinite;
    }

    /* Delay classes */
    .delay-1 {
        animation-delay: 0.1s;
    }

    .delay-2 {
        animation-delay: 0.2s;
    }

    .delay-3 {
        animation-delay: 0.3s;
    }

    .delay-4 {
        animation-delay: 0.4s;
    }

    .animate-fade-in-delay {
        animation: fadeIn 0.8s ease-out 0.3s forwards;
        opacity: 0;
    }

    .animate-fade-in-delay-2 {
        animation: fadeIn 0.8s ease-out 0.6s forwards;
        opacity: 0;
    }

    /* Ensure elements with delayed animations are initially hidden */
    .animate-fade-in-up,
    .animate-fade-in-down,
    .animate-fade-in-left,
    .animate-fade-in-right,
    .animate-slide-up,
    .animate-fade-in-delay,
    .animate-fade-in-delay-2 {
        opacity: 0;
    }

    /* Stagger animations for contact info */
    .contact-info-card>div:nth-child(1) {
        animation-delay: 0.1s;
    }

    .contact-info-card>div:nth-child(2) {
        animation-delay: 0.2s;
    }

    .contact-info-card>div:nth-child(3) {
        animation-delay: 0.3s;
    }

    .contact-info-card>div:nth-child(4) {
        animation-delay: 0.4s;
    }

    /* Stagger animations for contact container */
    .contact-container>div:nth-child(1) {
        animation-delay: 0.1s;
    }

    .contact-container>div:nth-child(2) {
        animation-delay: 0.2s;
    }
</style>

<script>
    // Add loading indicator functionality
    document.addEventListener('DOMContentLoaded', function () {
        const contactForm = document.getElementById('contactForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');
        const loadingSpinner = document.getElementById('loadingSpinner');

        if (contactForm && submitBtn && btnText && loadingSpinner) {
            contactForm.addEventListener('submit', function (e) {
                // Show loading spinner
                submitBtn.disabled = true;
                btnText.textContent = '<?php echo $is_enrollment ? 'Completing Enrollment...' : 'Sending Message...'; ?>';
                loadingSpinner.classList.remove('hidden');

                // Allow form to submit normally
            });
        }
    });

    // Show alert if form was successfully submitted
    <?php if ($show_success_alert): ?>
        // Function to show notification
        function showNotification() {
            // Try to use Notyf if available
            if (typeof Notyf !== 'undefined') {
                try {
                    // Initialize Notyf
                    const notyf = new Notyf({
                        duration: 5000,
                        position: {
                            x: 'right',
                            y: 'top'
                        }
                    });

                    // Show success notification
                    notyf.success('<?php echo addslashes($success_message); ?>');
                } catch (e) {
                    console.error("Error showing Notyf notification:", e);
                }
            }
        }

        // Execute when DOM is ready
        if (document.readyState !== 'loading') {
            showNotification();
        } else {
            document.addEventListener('DOMContentLoaded', showNotification);
        }

        // Also execute on window load
        window.addEventListener('load', showNotification);
    <?php endif; ?>

    // Load Notyf library
    document.addEventListener('DOMContentLoaded', function () {
        // Load Notyf CSS and JS if not already loaded
        if (typeof Notyf === 'undefined') {
            // Check if Notyf CSS is already loaded
            var notyfCssLoaded = false;
            for (var i = 0; i < document.styleSheets.length; i++) {
                if (document.styleSheets[i].href && document.styleSheets[i].href.includes('notyf')) {
                    notyfCssLoaded = true;
                    break;
                }
            }

            // Load Notyf CSS if not loaded
            if (!notyfCssLoaded) {
                var cssLink = document.createElement('link');
                cssLink.rel = 'stylesheet';
                cssLink.href = 'https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css';
                document.head.appendChild(cssLink);
            }

            // Load Notyf JS
            var script = document.createElement('script');
            script.src = 'https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js';
            script.onload = function () {
                // If we have a success message, show it now that Notyf is loaded
                <?php if ($show_success_alert): ?>
                    showNotification();
                <?php endif; ?>
            };
            document.head.appendChild(script);
        }

        // Intersection Observer for animations
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements with fade-in-up animations
        document.querySelectorAll('.animate-fade-in-up').forEach(el => {
            observer.observe(el);
        });

        // Observe elements with fade-in-left animations
        document.querySelectorAll('.animate-fade-in-left').forEach(el => {
            observer.observe(el);
        });

        // Observe elements with fade-in-right animations
        document.querySelectorAll('.animate-fade-in-right').forEach(el => {
            observer.observe(el);
        });
    });
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/layout.php';
?>