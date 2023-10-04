<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://titan.csit.rmit.edu.au/~s3958095/wp/a2/styles.css" />
    <script src="https://titan.csit.rmit.edu.au/~s3958095/wp/a2/scripts.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Russel Street Medical</title>
</head>

<body>
<body>
    <!-- Header (Logo and Navigation bar) -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#">
                <img src="./imgs/logo.png" alt="Russel Street Medical Logo" width="170">
            </a>
            <a class="navbar-brand" href="index.html">Russel Street Medical</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#aboutUs">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#whoWeAre">Who We Are</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#serviceArea">Service Area</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="booking.php">Book Online</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="intro">
            <div class="intro-text">
                <h1>Reliable medical care</h1>
                <p>Trust your healthcare needs to a team of qualified professionals. Whether it's a regular check-up or an emergency, our reliable medical care will ensure that you receive the best possible care.</p>
                <div class="btn-group">
                    <a href="#aboutUs" class="learn-more-btn">Learn More</a>
                    <a href="booking.html" class="book-now-btn">Book Now</a>
                </div>
            </div>
            <div id="aboutUs">
                <div class="aboutUs">
                    <div class="aboutUs-content">
                        <!-- Carousel Start -->
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="./imgs/abU.png" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./imgs/abU2.png" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./imgs/abU3.png" alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./imgs/abU4.png" alt="Fourth slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./imgs/abU5.png" alt="Fifth slide">
                                </div>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!-- Carousel End -->
                        <div class="aboutUs-text">
                            <h2>About Us</h2>
                            <p>Russel Street Medical opened in 2020 and is located in Melbourne’s CBD at 427 Swanston Street Melbourne 3000, just opposite RMIT University Building 10 and within walking distance of Melbourne central station.</p>
                            <p>We strive to help all our patients with a focus on preventative health care, a view to managing chronic health conditions with a holistic approach, and with access to a wide range of specialist care providers when needed.</p>
                            <div class="aboutUs-opening-times">
                                <h3>Opening Times</h3>
                                <ul>
                                    <li><span>Monday:</span> 9am - 6pm</li>
                                    <li><span>Tuesday:</span> 9am - 6pm</li>
                                    <li><span>Wednesday:</span> 9am - 6pm</li>
                                    <li><span>Thursday:</span> 9am - 6pm</li>
                                    <li><span>Friday:</span> 9am - 6pm</li>
                                    <li><span>Saturday:</span> 9am - 6pm</li>
                                    <li><span>Sunday:</span> 9am - 6pm</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <p>RMIT students and staff receive discounts through partnership programs.</p>
                    <table>
                        <tr>
                            <th>Consultation</th>
                            <th>Normal Fee</th>
                            <th>RMIT Member Fee</th>
                            <th>Medicare Rebate</th>
                        </tr>
                        <tr>
                            <td>Standard</td>
                            <td>$80.00</td>
                            <td>$60.00</td>
                            <td>$40.00</td>
                        </tr>
                        <tr>
                            <td>Long or Complex</td>
                            <td>$125.00</td>
                            <td>$95.00</td>
                            <td>$75.00</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <section id="whoWeAre">
        <h2>Who We Are</h2>
        <div class="staff-profiles">
            <div class="staff">
                <img src="./imgs/doctor1.jpg" alt="Dr. Stephen Hill" />
                <div>
                    <strong>Dr. Stephen Hill</strong>
                    <p>Stephen Hill graduated from Auckland University in New Zealand in 2014 and obtained his Fellowship from the Royal Australian College of General Practitioners in 2017.</p>
                    <p>Over his training and practice, Stephen worked in internal medicine at the Royal Children's Hospital Melbourne before transitioning to General Practice.</p>
                </div>
            </div>
            <div class="staff">
                <img src="./imgs/doctor2.jpg" alt="Ms Kiyoko Tsu" />
                <div>
                    <strong>Ms Kiyoko Tsu</strong>
                    <p>Kiyoko is our lovely nurse at Russel Street Medical. She graduated with a Bachelor of Nursing at Melbourne University and is a Registered Nurse.</p>
                    <p>She assists Dr. Stephen Hill with many aspects of patient care, including vaccinations, wound dressings, and performing pathology collection on-site.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="serviceArea">
        <div class="new-patients">
            <h3>New Patients</h3>
            <p>Russel Street Medical welcomes new patients to the practice. Please visit the <a href="register.html">Register</a> page for further information and to download the New Patient Registration form.</p>
            <p>Russel Street Medical is also equipped to provide healthcare for international students and visitors, with staff able to speak Mandarin, Cantonese and Bahasa Melayu.</p>
            <div class="register-form">
                <h3>Join Us</h3>
                <p>Enter your email to start the registration process:</p>
                <input type="email" id="emailInput" placeholder="example@gmail.com">
                <a href="#" class="register-btn">Register Now</a>
            </div>
        </div>

        <div class="current-patients">
            <h3>Current Patients</h3>
            <p>Current patients may wish to download the HotDoc app for mobile bookings and appointment reminders.</p>
            <a href="booking.html" class="book-online-btn">Book Online</a>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-address">
                <address>427 Swanston Street Melbourne, 3000 <br /> Contact: 61 (0) 1234 5678</address>
                <p>Zeyi Li - S3958095</p>
            </div>
            <div class="footer-navigation">
                <img class="footer-logo" src="./imgs/logo.png" alt="Russel Street Medical Logo" />
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#aboutUs">About Us</a></li>
                    <li><a href="#whoWeAre">Who We Are</a></li>
                    <li><a href="#serviceArea">Service Area</a></li>
                    <li><a href="booking.html">Book Online</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>
