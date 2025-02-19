<?php
session_start();
require 'assets/php/connect.php';
// require 'assets/php/session.php';
require 'assets/php/validateReservation.php';




?>


<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <!------------------------ Bootstrap 5 ------------------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!------------------------ CSS Link ------------------------>
    <link rel="stylesheet" type="text/css" href="assets/css/home.css" />

    <!------------------------ For NAV-BAR ------------------------>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!------------------------ Google Fonts Used ------------------------>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Playfair+Display:ital@1&display=swap"
        rel="stylesheet">

    <!-- animation on scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
<script>
    // Function to trigger the PHP script
    function triggerValidation() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'assets/php/validateReservation.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log('Checked expired validation');
                } else {
                    console.log('Error in checking expired validation');
                }
            }
        };
        xhr.send();
    }

    // Call the function immediately
    triggerValidation();

    // Set up a recurring timer to call the function every 5 seconds (5000 milliseconds)
    setInterval(triggerValidation, 5000);
</script>

</head>


<body>

   


    <script>
        AOS.init();
    </script>

    <div class="wrapper">

        <!------------------------ HEADER --------------------->

        <?php 
        // if the user was not logged in
        if (!isset($_SESSION["user_id"]) && !isset($_SESSION["password"]) && !isset($_SESSION["first_name"]) 
        && !isset($_SESSION["last_name"]) &&!isset($_SESSION["reservation_count"])) {
            require 'assets/php/header_notLogged.php';
            

        } else {
            require 'assets/php/header.php';
            $query123 = "SELECT occupy.*, seat.seat_number, reservation.start_time, reservation.end_time 
                    FROM occupy 
                    INNER JOIN reservation ON occupy.reservation_id = reservation.reservation_id 
                    INNER JOIN seat ON reservation.seat_id = seat.seat_id
                    WHERE reservation.user_id = '{$_SESSION['user_id']}' 
                    AND reservation.date = CURDATE() 
                    AND occupy.isDone = 0";

            $result123 = mysqli_query($conn, $query123);

            if (mysqli_num_rows($result123) == 1) {
                // If the query returns exactly one result, require the specified file
                require 'assets/php/occupancy_timer.php';
            }
        }

        ?>



  

        <!------------------------ END HEADER --------------------->
        <!------------------------ COVER ------------------------>
        <div id="home" class="parallax-home">
            <img class="banner" src="assets/img/lib building_bg.jpg" id="lib-front">

            <div class="title">
                <h1 id="parallax-home-text-lib" data-aos="fade-right">Library</h1>
                <h1 id="parallax-home-text-school" data-aos="fade-up">BULACAN STATE UNIVERSITY</h1>
                <h1 id="parallax-home-text-disc" data-aos="fade-left">Discover and Learn</h1>
            </div>
        </div>
        <!------------------------ END OF COVER ------------------------>


        <!------------------------ SEAT INFO ------------------------>
        <canvas class="webgl"></canvas>

        <div class="seats" data-aos="fade-right">
            <div class="no-of-seats">
                <h1 id="no">206</h1>
                <h1 id="avail">Available Seats</h1>
            </div>
            <a href="reserve.php" class="reserve-btn btn">
                Reserve seat
            </a>
        </div>

        <div class="col" id="clock">
            <div class="clock">
                <div class="hour">
                    <div class="hr" id="hr"></div>
                </div>
                <div class="min">
                    <div class="mn" id="mn"></div>
                </div>
                <div class="sec">
                    <div class="sc" id="sc"></div>
                </div>
            </div>
        </div>

        <!------------------------ END OF SEAT INFO ------------------------>

        <div class="col-2" id="aboutus">
            <h2>ABOUT US</h2>
            <p>
                The Bulacan State University Library, through its resources, facility, and staff, is dedicated to
                providing open
                access to information and to offering the services and tools with which to locate and interpret that
                information. As patrons’ needs and information technologies continue to evolve, so will the means
                with which the
                Library attempts to fulfill its role within the community.
            </p>
        </div>


        <!------------------------ NEWS SLIDER ------------------------>
        <!--<div id="my-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-ride="true" data-aos="fade-left">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#my-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#my-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#my-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#my-carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>

            </div>
            <div class="carousel-inner">
                <div class="carousel-item active c-item">
                    <img src="assets/img/elib1.jpg" class="d-block w-100 c-img" alt="...">
                    <div class="carousel-caption">
                        <h3>First slide label</h3>
                        <p>Some representative placeholder content for the first slide.</p>
                        <a href="" class="btn btn-lg btn-primary ">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="carousel-item c-item">
                    <img class="d-block w-100 c-img" src="assets/img/elib2.jpg" alt="Second slide">
                    <div class="carousel-caption">
                        <h3>First slide label</h3>
                        <p>Some representative placeholder content for the first slide.</p>
                        <a href="" class="btn btn-lg btn-primary">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="carousel-item c-item">
                    <img class="d-block w-100 c-img" src="assets/img/elib3.jpg" alt="Third slide">
                    <div class="carousel-caption">
                        <h3>First slide label</h3>
                        <p>Some representative placeholder content for the first slide.</p>
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
        <!--<div class="abtus" id="aboutus" data-aos="fade-up">
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
            <div class="tile" data-aos="fade-up" data-aos-duration="1000">
                <img src='assets/img/elib4.jpg' />
                <div class="text">
                    <h1>Vision</h1>
                    <p class="animate-text">Bulacan State University is a progressive knowledge-generating institution
                        globally recognized for excellent instruction, pioneering research, and responsive community
                        engagements. </p>
                    <div class="dots">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>


            <div class="tile" data-aos="fade-up" data-aos-duration="1500">
                <img src='assets/img/inaug7.jpg' />
                <div class="text">
                    <h1>Mission</h1>
                    <p class="animate-text"> Bulacan State University exists to produce highly competent, ethical and
                        service-oriented professionals that contribute to the sustainable socio-economic growth and
                        development of the nation </p>
                    <div class="dots">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>

            <div class="tile" data-aos="fade-up" data-aos-duration="2000">
                <img src='assets/img/inaug2.jpg' />
                <div class="text">
                    <h1>Goals</h1>
                    <p class="animate-text">The university is committed to provide education that is accessible to
                        deserving and qualified students through internationally-recognized and industry-responsive
                        programs set in a 21st century learning environment. </p>
                    <div class="dots">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>

            <div class="tile" data-aos="fade-up" data-aos-duration="2000">
                <img src='assets/img/inaug2.jpg' />
                <div class="text">
                    <h1>Core Values</h1>
                    <p class="animate-text">S – Service to God and Community.<br>O – Order and Peace.<br>
                        A – Assurance of Quality and Accountability.<br>R – Respect and Responsibility. </p>
                    <div class="dots">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
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

    <script type="module" src="assets/js/main.js"></script>
    <script src="assets/js/clock.js"></script>


</body>

<!------------------------ For Sliding News ------------------------>
<script type="text/javascript">
    AOS.init();
    var counter = 1;
    setInterval(function () {
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if (counter > 2) {
            counter = 1;
        }
    }, 5000);
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>

</html>
