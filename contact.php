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

                <section class="offices-section">
                    <div class="container">
                        <h1>Our Offices</h1>

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
                            <div class="contact-form-wrap">
                                <form class="contact-form" action="#" method="post">
                                    <div class="contact-form__grid">
                                        <div class="form-group">
                                            <label for="name">Your Name <span>*</span></label>
                                            <input type="text" id="name" name="name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="company">Company Name</label>
                                            <input type="text" id="company" name="company">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Your Email <span>*</span></label>
                                            <input type="email" id="email" name="email" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="telephone">Your Telephone Number <span>*</span></label>
                                            <input type="text" id="telephone" name="telephone" required>
                                        </div>
                                    </div>

                                    <div class="form-group form-group--full">
                                        <label for="message">Message <span>*</span></label>
                                        <textarea id="message" name="message" rows="6" required></textarea>
                                    </div>

                                    <label class="marketing-check">
                                        <input type="checkbox" name="marketing">
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

                                <button type="button" class="contact-details__toggle">
                                    Out of Hours IT Support
                                    <span>▼</span>
                                </button>
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