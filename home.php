<?php
// always start session
session_start();

// if the user was not logged in
if (!isset($_SESSION["student_id"]) && !isset($_SESSION["password"])) {
    echo '<style type="text/css">
        .wrapper .hidden{
            display: none;
        }
        </style>'; // reserve and account button is hidden if the user was not logged in

} else {
    echo '<style type="text/css">
        .wrapper .show{
            display: none;
        }
        </style>'; // login button is hidden if the user was logged in
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!------------------------ Bootstrap 5.3.0 ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/home.css" />
    <!------------------------ Google Fonts Used ------------------------>
    <link href="assets/fonts/fonts.css" rel="stylesheet">
</head>

<body>

    <div class="wrapper">
        <!-- Sticky header -->
        <header class="header-outer">
            <div class="header-inner responsive-wrapper">
                <div class="header-logo">
                    <img src="assets/img/elib logo.png" class="icon">
                </div>
                <nav class="header-navigation">
                    <a href="#home" class="active">HOME</a>
                    <a href="reserve.php">RESERVE A SEAT</a>
                    <a href="#aboutus">ABOUT US</a>
                    <a class="show" href="toLogout.php">LOGIN</a>
                    <a class="hidden" href="profile.php">ACCOUNT</a>
                    <a class="hidden" href="toLogout.php">LOGOUT</a>
                </nav>
            </div>
        </header>
        <!-- Sticky header -->

        <!------------------------ COVER ------------------------>
        <div id="home" class="parallax-home">
            <img class="banner" src="assets/img/lib building_bg.jpg" id="lib-front">

            <div class="title">
                <h1 id="parallax-home-text-lib">Library</h1>
                <h1 id="parallax-home-text-school">BULACAN STATE UNIVERSITY</h1>
                <h1 id="parallax-home-text-disc">Discover and Learn</h1>
            </div>
        </div>
        <!------------------------ END OF COVER ------------------------>


        <!------------------------ SEAT INFO ------------------------>
        <div class="seats">
            <div class="no-of-seats">
                <h1 id="no">206</h1>
                <h1 id="avail">Available Seats</h1>
            </div>
            <a href="reserve.php" class="reserve-btn">
                Reserve your seat here
            </a>
        </div>
        <!------------------------ END OF SEAT INFO ------------------------>

        <!------------------------ NEWS SLIDER ------------------------>
        <div id="my-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#my-carousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#my-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#my-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#my-carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>

            </div>
            <div class="carousel-inner">
                <div class="carousel-item active c-item">
                    <img src="assets/img/elib1.jpg" class="d-block w-100 c-img" alt="...">
                    <div class="carousel-caption">
                        <h3>Lorem ipsum dolor</h3>
                        <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ...</p>
                        <a href="" class="btn btn-lg btn-primary ">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="carousel-item c-item">
                    <img class="d-block w-100 c-img" src="assets/img/elib2.jpg" alt="Second slide">
                    <div class="carousel-caption">
                        <h3>Lorem ipsum dolor</h3>
                        <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ...</p>
                        <a href="" class="btn btn-lg btn-primary">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="carousel-item c-item">
                    <img class="d-block w-100 c-img" src="assets/img/elib3.jpg" alt="Third slide">
                    <div class="carousel-caption">
                        <h3>Lorem ipsum dolor</h3>
                        <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ...</p>
                        <a href="" class="btn btn-lg btn-primary">
                            Read More
                        </a>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#my-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#my-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!------------------------ END OF NEWS SLIDER ------------------------>


        <!------------------------ ABOUT US ------------------------>
        <div class="abtus" id="aboutus">
            <div class="col-1">
                <img src="assets/img/elib0.jpg">

            </div>
            <div class="col-2">
                <h2>BULACAN STATE UNIVERSITY LIBRARY</h2>
                <p>
                    The Bulacan State University Library, through its resources, facility, and staff, is dedicated to
                    providing open
                    access to information and to offering the services and tools with which to locate and interpret that
                    information. As patrons’ needs and information technologies continue to evolve, so will the means
                    with which the
                    Library attempts to fulfill its role within the community.
                </p>
            </div>
        </div>
        <!------------------------ END OF ABOUT US ------------------------>


        <!------------------------ VMGO ------------------------>

        <div class="wrap">
            <div class="tile">
                <img src='assets/img/elib4.jpg' />
                <div class="text">
                    <h1>Vision</h1>
                    <p class="animate-text">Bulacan State University is a progressive knowledge-generating institution
                        globally recognized for excellent instruction, pioneering research, and responsive community
                        engagements. </p>
                </div>
            </div>


            <div class="tile">
                <img src='assets/img/lib building bg.jpg' />
                <div class="text">
                    <h1>Mission</h1>
                    <p class="animate-text"> Bulacan State University exists to produce highly competent, ethical and
                        service-oriented professionals that contribute to the sustainable socio-economic growth and
                        development of the nation </p>
                </div>
            </div>

            <div class="tile">
                <img src='assets/img/inaug2.jpg' />
                <div class="text">
                    <h1>Goals</h1>
                    <p class="animate-text">The university is committed to provide education that is accessible to
                        deserving and qualified students through internationally-recognized and industry-responsive
                        programs set in a 21st century learning environment. </p>
                </div>
            </div>
        </div>
        <!------------------------ END OF VMGO ------------------------>

        <!------------------------ FOOTER ------------------------>
        <footer>
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 about-footer">
                            <h3>Bulacan State University
                                E-Library </h3>
                            <ul>
                                <li><a href="tel:(010) 919 7800"><i class="fas fa-phone fa-flip-horizontal"></i>
                                        919 7800</a></li>
                                <li><i class="fas fa-map-marker-alt"></i>
                                    Guinhawa,
                                    <br />City of Malolos,
                                    <br />Bulacan
                                </li>
                                <li><i class="fas fa-at"></i>
                                    officeofthepresident@bulsu.edu.ph
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-2 page-more-info">
                            <div class="footer-title">
                                <h4>Page links</h4>
                            </div>
                            <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a href="#aboutus">About Us</a></li>
                                <li><a href="reserve.php">Reserve seat</a></li>
                                <li><a href="profile.php">Your Account</a></li>
                            </ul>
                        </div>

                        <div class="col-md-6 col-lg-3 page-more-info">
                            <div class="footer-title">
                                <h4>More Info</h4>
                            </div>
                            <ul>
                                <li><a href="survey.php">Rate our service</a></li>
                                <li><a href="https://www.bulsu.edu.ph/">Official Website</a></li>
                                <li><a href="https://myportal.bulsu.edu.ph/">BulSU Portal</a></li>
                                <li><a href="https://www.bulsu.edu.ph/library/">Library Service</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-4 open-hours">
                            <div class="footer-title">
                                <h4>Open hours</h4>
                                <ul class="footer-social">
                                    <li><a href="https://www.facebook.com/BulSUaklatan" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>

                                </ul>
                            </div>
                            <table class="table-hours">
                                <tbody>
                                    <tr>
                                        <td><i class="far fa-clock"></i>Monday-Thursday </td>
                                        <td>10:00am - 7:00pm</td>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-clock"></i>Friday</td>
                                        <td>10:00am - 7:30pm</td>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-clock"></i>Saturday</td>
                                        <td>10:30am - 7:30pm</td>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-clock"></i>Sunday</td>
                                        <td>10:30am - 7:00pm</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <div class="footer-logo">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><img src="assets/img/elib logo.png"></td>
                                            <td><img src="assets/img/bulsu logo.png"></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="">Privacy policy</a>
                        </div>
                        <div class="col-sm-8">
                            <p>© 2017 Bulacan State University</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!------------------------ FOOTER ------------------------>
    </div>
</body>

<!------------------------ For Sliding News ------------------------>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/popper.min.js"></script>
</html>