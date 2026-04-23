<?php
require_once __DIR__ . '/database.php';

$stmt = $pdo->query("
    SELECT id, type, image, title, description, button, author_image, author, date FROM news
");

$newsItems = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Full Service Digital Agency | Cambridgeshire &amp; Norfolk</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/main.js"></script>
    <body>
        <div class="page-layout">
            <?php include 'includes/sidebar.php'; ?>

            <div class="page-content">
                <?php include 'includes/header.php'; ?>

                <main class="page-body">
                    <div class="main-carousel">
                        <div class="slides">
                            <div class="slide slide--1 active" style="background-image: linear-gradient(
                                    to right,
                                    rgba(0, 0, 0, 0.75) 0%,
                                    rgba(0, 0, 0, 0.7) 20%,
                                    rgba(0, 0, 0, 0.6) 30%,
                                    rgba(0, 0, 0, 0.5) 40%),
                                    url('img/main-carousel-1.webp')">
                                <div class="slide-content">
                                    <h1>The East Of England's Leading Technology Company</h1>
                                    <p>Performance-driven digital and technology services with complete transparency.</p>
                                    <a href="#" class="slide-btn">WHY CHOOSE US? &#8594;</a>
                                </div>
                            </div>

                            <div class="slide slide--2" style="background-image:linear-gradient(
                                    to right,
                                    rgba(0, 0, 0, 0.75) 0%,
                                    rgba(0, 0, 0, 0.7) 20%,
                                    rgba(0, 0, 0, 0.6) 30%,
                                    rgba(0, 0, 0, 0.5) 40%),
                                    url('img/main-carousel-2.webp');">
                                <div class="slide-content">
                                    <h1 class="heading">Bespoke Software</h1>
                                    <p class="description">Delivering expert bespoke software solutions across a range of industries.</p>
                                    <a href="#" class="slide-btn">LEARN MORE &#8594;</a>
                                </div>
                            </div>
                            <div class="slide slide--3" style="background-image:linear-gradient(
                                    to right,
                                    rgba(0, 0, 0, 0.75) 0%,
                                    rgba(0, 0, 0, 0.7) 20%,
                                    rgba(0, 0, 0, 0.6) 30%,
                                    rgba(0, 0, 0, 0.5) 40%),
                                    url('img/main-carousel-3.webp');">
                                <div class="slide-content">
                                    <h1 class="heading">IT Support</h1>
                                    <p class="description">Fast and cost-effective IT support services for your business.</p>
                                    <a href="#" class="slide-btn">LEARN MORE &#8594;</a>
                                </div>
                            </div>
                            <div class="slide slide--4" style="background-image:linear-gradient(
                                    to right,
                                    rgba(0, 0, 0, 0.75) 0%,
                                    rgba(0, 0, 0, 0.7) 20%,
                                    rgba(0, 0, 0, 0.6) 30%,
                                    rgba(0, 0, 0, 0.5) 40%),
                                    url('img/main-carousel-4.webp');">
                                <div class="slide-content">
                                    <h1 class="heading">Digital Marketing</h1>
                                    <p class="description">Generating your new business through results-driven marketing activities.</p>
                                    <a href="#" class="slide-btn">LEARN MORE &#8594;</a>
                                </div>
                            </div>
                            <div class="slide slide--5" style="background-image:linear-gradient(
                                    to right,
                                    rgba(0, 0, 0, 0.75) 0%,
                                    rgba(0, 0, 0, 0.7) 20%,
                                    rgba(0, 0, 0, 0.6) 30%,
                                    rgba(0, 0, 0, 0.5) 40%),
                                    url('img/main-carousel-5.webp');">
                                <div class="slide-content">
                                    <h1 class="heading">Telecoms Services</h1>
                                    <p class="description">A new approach to connectivity, see how we can help your business.</p>
                                    <a href="#" class="slide-btn">LEARN MORE &#8594;</a>
                                </div>
                            </div>
                            <div class="slide slide--6" style="background-image:linear-gradient(
                                    to right,
                                    rgba(0, 0, 0, 0.75) 0%,
                                    rgba(0, 0, 0, 0.7) 20%,
                                    rgba(0, 0, 0, 0.6) 30%,
                                    rgba(0, 0, 0, 0.5) 40%),
                                    url('img/main-carousel-6.webp');">
                                <div class="slide-content">
                                    <h1 class="heading">Web Design</h1>
                                    <p class="description">For businesses looking to make a strong and effective first impression.</p>
                                    <a href="#" class="slide-btn">LEARN MORE &#8594;</a>
                                </div>
                            </div>
                            <div class="slide slide--7" style="background-image:linear-gradient(
                                    to right,
                                    rgba(0, 0, 0, 0.75) 0%,
                                    rgba(0, 0, 0, 0.7) 20%,
                                    rgba(0, 0, 0, 0.6) 30%,
                                    rgba(0, 0, 0, 0.5) 40%),
                                    url('img/main-carousel-7.webp');">
                                <div class="slide-content">
                                    <h1 class="heading">Cyber Security</h1>
                                    <p class="description">Keeping businesses and their customers sensitive information protected.</p>
                                    <a href="#" class="slide-btn">LEARN MORE &#8594;</a>
                                </div>
                            </div>
                        </div>

                        <div class="dots">
                            <button class="dot active" type="button" data-slide="0"></button>
                            <button class="dot" type="button" data-slide="1"></button>
                            <button class="dot" type="button" data-slide="2"></button>
                            <button class="dot" type="button" data-slide="3"></button>
                            <button class="dot" type="button" data-slide="4"></button>
                            <button class="dot" type="button" data-slide="5"></button>
                            <button class="dot" type="button" data-slide="6"></button>
                        </div>
                    </div>

                    <section class="services">
                        <div class="container">
                            <div class="services-header">
                                <h1>Our Services</h1>
                                <a class="vow vow-top" href="#">View Our Work &#8594;</a>
                            </div>
                            <div class="services-grid">
                                <a href="#top" class="service-card consultancy-service">
                                    <span class="consultancy-icon" aria-hidden="true"></span>
                                    <h2>Consultancy & Development</h2>
                                    <p>Bespoke software solutions & consultancy for all your business needs including integrations and reporting.</p>
                                <button class="reg-btn">READ MORE</button>
                                </a>
                                <a href="#top" class="service-card it-service">
                                    <span class="it-icon" aria-hidden="true"></span>
                                    <h2>IT Support</h2>
                                    <p>Fully managed IT support and consultancy packages tailored to meet your exact business needs.</p>
                                    <button class="reg-btn">READ MORE</button>
                                </a>
                                <a href="#top" class="service-card marketing-service">
                                    <span class="marketing-icon" aria-hidden="true"></span>
                                    <h2>Digital Marketing</h2>
                                    <p>Driven brand awareness & ROI through creative digital marketing campaigns.</p>
                                    <button class="reg-btn">READ MORE</button>
                                </a>
                                <a href="#top" class="service-card telecoms-service">
                                    <span class="telecoms-icon" aria-hidden="true"></span>
                                    <h2>Telecoms Services</h2>
                                    <p>Business telephony solutions including mobile & connectivity solutions.</p>
                                    <button class="reg-btn">READ MORE</button>
                                </a>
                                <a href="#top" class="service-card web-service">
                                    <span class="web-icon" aria-hidden="true"></span>
                                    <h2>Web Design</h2>
                                    <p>User-centric design for businesses looking to make a lasting impression.</p>
                                    <button class="reg-btn">READ MORE</button>
                                </a>
                                <a href="#top" class="service-card security-service">
                                    <span class="security-icon" aria-hidden="true"></span>
                                    <h2>Cyber Security</h2>
                                    <p>Prevention, testing, consultancy & breach management services.</p>
                                    <button class="reg-btn">READ MORE</button>
                                </a>
                                <a href="#top" class="service-card developer-service">
                                    <span class="developer-icon" aria-hidden="true"></span>
                                    <h2>Developer Training</h2>
                                    <p>Web design & software training courses designed to secure a job in tech.</p>
                                    <button class="reg-btn">READ MORE</button>
                                </a>
                            </div>
                            <a class="vow vow-bottom" href="#">View Our Work &#8594;</a>
                        </div>
                    </section>

                    <div class="view-our-work">
                        <div class="slider">
                            <div class="slider-track">
                                <div class="slider-item">
                                    <img src="img/work-carousel-1.jpg" class="award-grey" alt="Award 1">
                                    <img src="img/work-carousel-1-col.jpg" class="award-colour" alt="Award 1 Colour">
                                </div>
                                <div class="slider-item">
                                    <img src="img/work-carousel-2.webp" class="award-grey" alt="Award 2">
                                    <img src="img/work-carousel-2-col.webp" class="award-colour" alt="Award 2 Colour">
                                </div>
                                <div class="slider-item">
                                    <img src="img/work-carousel-3.png" class="award-grey" alt="Award 3">
                                    <img src="img/work-carousel-3-col.png" class="award-colour" alt="Award 3 Colour">
                                </div>
                                <div class="slider-item">
                                    <img src="img/work-carousel-4.jpg" class="award-grey" alt="Award 4">
                                    <img src="img/work-carousel-4-col.jpg" class="award-colour" alt="Award 4 Colour">
                                </div>
                                <div class="slider-item">
                                    <img src="img/work-carousel-5.jpg" class="award-grey" alt="Award 5">
                                    <img src="img/work-carousel-5-col.jpg" class="award-colour" alt="Award 5 Colour">
                                </div>
                                <div class="slider-item">
                                    <img src="img/work-carousel-6.jpg" class="award-grey" alt="Award 6"> 
                                    <img src="img/work-carousel-6-col.jpg" class="award-colour" alt="Award 6 Colour">
                                </div>
                                <div class="slider-item">
                                    <img src="img/work-carousel-7.png" class="award-grey" alt="Award 7">
                                    <img src="img/work-carousel-7-col.png" class="award-colour" alt="Award 7 Colour">
                                </div>
                                <div class="slider-item">
                                    <img src="img/work-carousel-8.jpg" class="award-grey" alt="Award 8">
                                    <img src="img/work-carousel-8-col.jpg" class="award-colour" alt="Award 8 Colour">
                                </div>
                                <div class="slider-item">
                                    <img src="img/work-carousel-9.png" class="award-grey" alt="Award 9">
                                    <img src="img/work-carousel-9-col.png" class="award-colour" alt="Award 9 Colour">
                                </div>
                                <div class="slider-item">
                                    <img src="img/work-carousel-10.png" class="award-grey" alt="Award 10">
                                    <img src="img/work-carousel-10-col.png" class="award-colour" alt="Award 10 Colour">
                                </div>
                                <div class="slider-item">
                                    <img src="img/work-carousel-11.jpg" class="award-grey" alt="Award 11">
                                    <img src="img/work-carousel-11-col.jpg" class="award-colour" alt="Award 11 Colour">
                                </div>
                                <div class="slider-item">
                                    <img src="img/work-carousel-12.jpg" class="award-grey" alt="Award 12">
                                    <img src="img/work-carousel-12-col.jpg" class="award-colour" alt="Award 12 Colour">
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="welcome">
                        <div class="container">
                            <div class="welcome-container">
                                <div class="left">
                                    <h1>Welcome To Netmatters</h1>
                                    <p class="bold">
                                        Netmatters is a leading <a href="#top">Bespoke Software</a>, <a href="#top">IT Support</a>, and <a href="#top">Digital Marketing</a> company
                                        based in the East of England with offices in <a href="#top">Cambridge</a>, <a href="#top">Wymondham</a>, and <a href="#top">Great Yarmouth</a>.
                                    </p>
                                    <p>
                                        We aren't tied into contracts with third-party providers, so you know that our recommendations for your business are based purely with one benefit in mind: to help improve your business with the most appropriate solutions.    
                                    </p>
                                    <p>
                                        We pride ourselves on being an ethical business and have a unique business offering and cost model that ensures you get the most from our relationship in an upfront manner.
                                    </p>
                                    <div class="buttons">
                                        <button class="welcome-btn scroll-top-btn">WHY CHOOSE US? &#8594;</button>
                                        <button class="welcome-btn scroll-top-btn">OUR CULTURE &#8594;</button>
                                    </div>
                                </div>

                                <div class="right">
                                    <h2>What Our Clients Think</h2>

                                    <div class="rating">★★★★★</div>

                                    <p class="quote">Netmatters stood out from the start. Great guys and very easy to work with. Both the build and digital marketing teams are clearly skilled -they know their stuff! They delivered a website to our (high!) expectations and went over and above to ensure we were satisfied clients - and we are!</p>

                                    <p class="author">Eleanor Bishop, Head of Marketing - <a href="#top">Ashcroft Partnership LLP</a></p>
                                    <div class="buttons">
                                        <button class="google-btn scroll-top-btn">GOOGLE REVIEWS &#8594;</button>
                                        <button class="trustpilot-btn scroll-top-btn">TRUSTPILOT REVIEWS &#8594;</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="news-section">
                        <div class="container">
                            <div class="news-header">
                                <h1>Latest News</h1>
                                <a class="view-all view-all--top" href="#">View All &#8594;</a>
                            </div>

                            <div class="news-grid">
                                <?php foreach ($newsItems as $item): ?>
                                    <?php $isCareer = $item['type'] === 'Careers'; ?>
                                    <a href="#"class="news-card <?= $isCareer ? 'news-card__career' : '' ?>">

                                        <div class="news-card__media">
                                            <img
                                                src="<?= htmlspecialchars('img/' . $item['image']) ?>"
                                                alt="<?= htmlspecialchars($item['title']) ?>"
                                            >

                                            <span class="news-card__tag <?= $isCareer ? 'news-card__tag--career' : '' ?>">
                                                <?= htmlspecialchars($item['type']) ?>
                                            </span>
                                        </div>

                                        <div class="news-card__content">
                                            <h2><?= htmlspecialchars($item['title']) ?></h2>

                                            <p><?= htmlspecialchars($item['description']) ?></p>

                                            <span class="<?= $isCareer ? 'news-card-career__btn' : 'news-card__btn' ?>">
                                                Read More
                                            </span>

                                            <div class="news-card__meta">
                                                <img
                                                    class="news-card__avatar"
                                                    src="<?= htmlspecialchars('img/' . $item['author_image']) ?>"
                                                    alt="<?= htmlspecialchars($item['author']) ?>"
                                                >

                                                <div>
                                                    <strong>Posted by <?= htmlspecialchars($item['author']) ?></strong>

                                                    <span>
                                                        <?= date('jS F Y', strtotime($item['date'])) ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                            <a class="view-all view-all--bottom" href="#">View All &#8594;</a>
                        </div>
                    </section>

                    <div class="business">
                        <div class="company-slider">
                            <div class="slider">
                                <div class="slider-track">
                                    <div class="slider-item company-item">
                                        <img src="img/bus-carousel-1.webp" alt="Company 1">

                                        <div class="company-popup">
                                            <h3>Black Swan Care Group</h3>
                                            <p>Black Swan Care Group own and manage 21 high-quality care and residential homes with a focus on putting the needs of their residents first.</p>
                                            <a href="#" class="popup-btn popup-btn--yellow">
                                                VIEW OUR CASE STUDY &#8594;
                                            </a>
                                        </div>
                                    </div>
                                    <div class="slider-item company-item">
                                        <img src="img/bus-carousel-2.webp" alt="Company 2">

                                        <div class="company-popup">
                                            <h3>Xupes</h3>
                                        </div>
                                    </div>
                                    <div class="slider-item company-item">
                                        <img src="img/bus-carousel-3.webp" alt="Company 3">

                                        <div class="company-popup">
                                            <h3>BEAT</h3>
                                            <p>The UK's eating disorder charity founded in 1989.</p>
                                        </div>
                                    </div>
                                    <div class="slider-item company-item">
                                        <img src="img/bus-carousel-4.webp" alt="Company 4">

                                        <div class="company-popup">
                                            <h3>Survey Solutions</h3>
                                        </div>
                                    </div>
                                    <div class="slider-item company-item">
                                        <img src="img/bus-carousel-5.webp" alt="Company 5">

                                        <div class="company-popup">
                                            <h3>Girl Guiding Anglia</h3>
                                            <p>Girl Guiding Anglia is part of Girlguiding, the UK's leading charity for girls and young women in the UK.</p>
                                            <a href="#" class="popup-btn">
                                                VIEW OUR CASE STUDY &#8594;
                                            </a>
                                        </div>
                                    </div>
                                    <div class="slider-item company-item">
                                        <img src="img/bus-carousel-6.webp" alt="Company 6"> 

                                        <div class="company-popup">
                                            <h3>Sweetzy</h3>
                                            <p>Sweetzy are an online sweets retailer, based in Wymondham.</p>
                                            <a href="#" class="popup-btn popup-btn--green">
                                                VIEW OUR CASE STUDY &#8594;
                                            </a>
                                        </div>
                                    </div>
                                    <div class="slider-item company-item">
                                        <img src="img/bus-carousel-7.webp" alt="Company 7">

                                        <div class="company-popup">
                                            <h3>Howes Percival</h3>
                                        </div>
                                    </div>
                                    <div class="slider-item company-item">
                                        <img src="img/bus-carousel-8.webp" alt="Company 8">

                                        <div class="company-popup">
                                            <h3>GDST</h3>
                                            <p>The Girls' Day School Trust (GDST) is the UK's leading family of 25 independent girls' schools.</p>
                                            <a href="#" class="popup-btn popup-btn--green">
                                                VIEW OUR CASE STUDY &#8594;
                                            </a>
                                        </div>
                                    </div>
                                    <div class="slider-item company-item">
                                        <img src="img/bus-carousel-9.webp" alt="Company 9">

                                        <div class="company-popup">
                                            <h3>Ashcroft Partnership LLP</h3>
                                            <p>Originally founded in 2006 as Ashcroft Anthony, they became Ashcroft Partnership LLP in 2020 and are one of the top chartered accountancy firms in Cambridge, advising entrepreneurs and families.</p>
                                            <a href="#" class="popup-btn popup-btn--purple">
                                                VIEW OUR CASE STUDY &#8594;
                                            </a>
                                        </div>
                                    </div>
                                    <div class="slider-item company-item">
                                        <img src="img/bus-carousel-10.webp" alt="Company 10">

                                        <div class="company-popup">
                                            <h3>One Traveller</h3>
                                            <p>One Traveller, founded in 2007, is a leading provider of solo holidays for over 50s.</p>
                                            <a href="#" class="popup-btn popup-btn--purple">
                                                VIEW OUR CASE STUDY &#8594;
                                            </a>
                                        </div>
                                    </div>
                                    <div class="slider-item company-item">
                                        <img src="img/bus-carousel-11.webp" alt="Company 11">

                                        <div class="company-popup">
                                            <h3>Searles Leisure Resort</h3>
                                            <p>Searles Leisure Resort, on the beautiful North Norfolk coast, is an award-winning UK holiday resort for families.</p>
                                            <a href="#" class="popup-btn popup-btn--green">
                                                VIEW OUR CASE STUDY &#8594;
                                            </a>
                                        </div>
                                    </div>
                                    <div class="slider-item company-item">
                                        <img src="img/bus-carousel-12.webp" alt="Company 12">

                                        <div class="company-popup">
                                            <h3>Busseys</h3>
                                            <p>One of the UK's leading Ford dealerships.</p>
                                        </div>
                                    </div>
                                    <div class="slider-item company-item">
                                        <img src="img/bus-carousel-13.webp" alt="Company 13">

                                        <div class="company-popup">
                                            <h3>Crane Garden Buildings</h3>
                                            <p>Leading manufacturer and supplier of high-end garden rooms, summerhouses, workshops and sheds in the UK.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <?php include 'includes/footer.php'; ?>
                </main>
            </div>
        </div>
        <?php include 'includes/cookie-banner.php'; ?>
    </body>
</html>