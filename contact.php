<?php
session_start();

require_once __DIR__ . '/database.php';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$errors = [];
$success = isset($_GET['success']) && $_SERVER["REQUEST_METHOD"] !== "POST";

function clean_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

$name = '';
$company = '';
$email = '';
$phone = '';
$message = '';
$marketing = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $errors[] = "Invalid form submission.";
    }

    if (!empty($_POST['website'])) {
        $errors[] = "Spam detected.";
    }

    $name = clean_input($_POST['name'] ?? '');
    $company = clean_input($_POST['company'] ?? '');
    $email = clean_input($_POST['email'] ?? '');
    $phone = clean_input($_POST['phone'] ?? '');
    $message = clean_input($_POST['message'] ?? '');
    $marketing = isset($_POST['marketing']) ? 1 : 0;

    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    } else {
        $domain = substr(strrchr($email, "@"), 1);

        if (!checkdnsrr($domain, "MX")) {
            $errors[] = "Please enter an email address with a valid domain.";
        }
    }

    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match('/^[0-9+\-\s()]{7,20}$/', $phone)) {
        $errors[] = "Please enter a valid phone number.";
    }

    if (empty($message)) {
        $errors[] = "Message is required.";
    }

    if (strlen($name) > 100) {
        $errors[] = "Name must be under 100 characters.";
    }

    if (strlen($message) > 1000) {
        $errors[] = "Message must be under 1000 characters.";
    }

    $bad_patterns = ['<script', 'DROP TABLE', 'SELECT *', '--'];

    foreach ($bad_patterns as $pattern) {
        if (
            stripos($name, $pattern) !== false ||
            stripos($email, $pattern) !== false ||
            stripos($phone, $pattern) !== false ||
            stripos($message, $pattern) !== false
        ) {
            $errors[] = "Suspicious content was detected. Please remove it and try again.";
            break;
        }
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("
            INSERT INTO contactForm 
            (name, company, email, phone, message, marketing)
            VALUES 
            (:name, :company, :email, :phone, :message, :marketing)
        ");

        $stmt->execute([
            ':name' => $name,
            ':company' => $company,
            ':email' => $email,
            ':phone' => $phone,
            ':message' => $message,
            ':marketing' => $marketing
        ]);

        header("Location: contact.php?success=1#contact-form");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Netmatters</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="page-layout">
       <?php require_once __DIR__ . '/includes/sidebar.php'; ?>
        <div class="page-content">
            <?php require_once __DIR__ . '/includes/header.php'; ?>

            <main class="page-body">
                <section class="contact-breadcrumb">
                    <div class="container">
                        <p>
                            <a href="index.php">Home</a>
                            <span>/</span>
                            <strong>Our Offices</strong>
                        </p>
                    </div>
                </section>

                <div class="page-title-banner">
                    <div class="container">
                        <h1>Our Offices</h1>
                    </div>
                </div>

                <section class="offices-section">
                    <div class="container">
                        <div class="offices-grid">
                            <article class="office-card">
                                <a class=office-card__image href="#">
                                    <img src="img/cambridge.jpg" alt="Cambridge Office">
                                </a>
                                <div class="office-card__body">
                                    <a class = "office-card__title" href="#">
                                        <h2>Cambridge Office</h2>
                                    </a>
                                    <p>
                                        Unit 1.31,<br>
                                        St John's Innovation Centre,<br>
                                        Cowley Road, Milton,<br>
                                        Cambridge,<br>
                                        CB4 0WS
                                    </p>
                                    <a class="office-card__phone" href="tel:01223375772">01223 37 57 72</a>
                                    <a class="office-card__btn" href="#">View More</a>
                                </div>
                            </article>

                            <article class="office-card">
                                <a class=office-card__image href="#">
                                    <img src="img/wymondham.jpg" alt="Wymondham Office">
                                </a>
                                <div class="office-card__body">
                                    <a class="office-card__title" href="#">
                                        <h2>Wymondham Office</h2>
                                    </a>
                                    <p>
                                        Unit 15,<br>
                                        Penfold Drive,<br>
                                        Gateway 11 Business Park,<br>
                                        Wymondham, Norfolk,<br>
                                        NR18 0WZ
                                    </p>
                                    <a class="office-card__phone" href="tel:01603704020">01603 70 40 20</a>
                                    <a class="office-card__btn" href="#">View More</a>
                                </div>
                            </article>

                            <article class="office-card">
                                <a class=office-card__image href="#">
                                    <img src="img/yarmouth-2.jpg" alt="Great Yarmouth Office">
                                </a>
                                <div class="office-card__body">
                                    <a class = "office-card__title" href="#">
                                        <h2>Great Yarmouth Office</h2>
                                    </a>
                                    <p>
                                        Suite F23,<br>
                                        Beacon Innovation Centre,<br>
                                        Beacon Park, Gorleston,<br>
                                        Great Yarmouth, Norfolk,<br>
                                        NR31 7RA
                                    </p>
                                    <a class="office-card__phone" href="tel:01493603204">01493 60 32 04</a>
                                    <a class="office-card__btn" href="#">View More</a>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>

                <section class="contact-content">
                    <div class="container">
                        <div class="contact-content__grid">
                            <div class="contact-form-wrap" id="contact-form">
                                <?php if (!empty($errors)): ?>
                                    <div class="form-errors">
                                        <?php foreach ($errors as $error): ?>
                                            <p><?= htmlspecialchars($error); ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($success): ?>
                                    <div class="form-success">
                                        Your enquiry has been sent successfully.
                                    </div>
                                <?php endif; ?>
                                <form class="contact-form" action="contact.php#contact-form" method="post" novalidate>
                                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                                    <input type="text" name="website" style="display:none;">
                                    <div class="contact-form__grid">
                                        <div class="form-group">
                                            <label for="name">Your Name <span>*</span></label>
                                            <input type="text" name="name" value="<?= htmlspecialchars($name ?? ''); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="company">Company Name</label>
                                            <input type="text" name="company" value="<?= htmlspecialchars($company ?? ''); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Your Email <span>*</span></label>
                                            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? ''); ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Your Telephone Number <span>*</span></label>
                                            <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($phone ?? ''); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group form-group--full">
                                        <label for="message">Message <span>*</span></label>
                                        <textarea id="message" name="message" rows="6" required><?= htmlspecialchars($message ?? ''); ?></textarea>
                                    </div>

                                    <label class="marketing-check">
                                        <input type="checkbox" name="marketing" <?= $marketing ? 'checked' : '' ?>>
                                        <span class="marketing-check__box"></span>
                                        <span class="marketing-check__text">
                                            Please tick this box if you wish to receive marketing information from us.
                                            Please see our <a href="#">Privacy Policy</a> for more information on how we keep your data safe.
                                        </span>
                                    </label>

                                    <div class="contact-form__bottom">
                                        <button type="submit" class="contact-submit-btn">Send Enquiry</button>
                                        <p><span>*</span> Fields Required</p>
                                    </div>
                                </form>
                            </div>

                            <aside class="contact-details">
                                <h3>Email us on:</h3>
                                <a href="mailto:sales@netmatters.com">sales@netmatters.com</a>

                                <h3>Speak to Sales on:</h3>
                                <a href="tel:01603515007">01603 515007</a>

                                <h3>Business hours:</h3>
                                <p>Monday - Friday 07:00 - 18:00</p>

                                <div class="contact-details__accordion">
                                    <button type="button" class="contact-details__toggle">
                                        Out of Hours IT Support &#x2193;
                                    </button>

                                    <div class="contact-details__content">
                                        <p>
                                            Netmatters IT are offering an Out of Hours service for Emergency and Critical tasks.
                                        </p>

                                        <p>
                                            <strong>Monday - Friday 18:00 - 22:00 Saturday 08:00 - 16:00</strong>
                                            <strong>Sunday 10:00 - 18:00</strong>
                                        </p>

                                        <p>
                                            To log a critical task, you will need to call our main line number and select Option 2 to
                                            leave an Out of Hours voicemail. A technician will contact you on the number provided
                                            within 45 minutes of your call.
                                        </p>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </section>
            </main>

            <?php require_once __DIR__ . '/includes/footer.php'; ?>
        </div>
    </div>

    <?php require_once __DIR__ . '/includes/cookie-banner.php'; ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>