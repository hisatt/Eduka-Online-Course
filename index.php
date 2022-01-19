<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduka</title>
    <link rel="stylesheet" href="./assets/fontawesome-free-5.12.0-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <nav id="nav" class="still-center">
        <div class="nav-header">
            <h4>eduka<span>.</span></h4>
            <button class="nav-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="nav-links">
            <ul class="links">
                <li><a href="dataListCourse.php">Course</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="login.php">Login</a></li>
                <li><button class="btn-regis" onclick="location.href='register.php'">Register</button></li>
            </ul>
        </div>
    </nav>

    <section id="hero" class="grid still-center">
        <div class="hero-text">
            <h1>Discover the knowledge</h1>
            <p class="sub-judul">Is coronavirus affecting your education or work? Explore online courses to continue
                studying, build
                professional skills, and connect with experts.</p>
            <button class="btn-join btn-orange btn-duapat" onclick="location.href='register.php'">Join for Free</button>
        </div>
        <div class="hero-img">
            <!-- <img src="./assets/hero-img.svg" alt=""> -->
            <img src="./assets/image/hero-img.svg" alt="">
        </div>
    </section>

    <section id="featured" class="still-center">
        <div class="featured-background">
            <h3>Featured Course</h3>
            <div class="container-items">
                <div class="item">
                    <img src="./assets/image/featured-mobile.png" alt="">
                    <p>Mobile Apps Development</p>
                </div>
                <div class="item">
                    <img src="./assets/image/featured-ux.png" alt="">
                    <p>User Experience Research</p>
                </div>
                <div class="item">
                    <img src="./assets/image/featured-hard.png" alt="">
                    <p>Hardware Troubleshooting</p>
                </div>
            </div>
            <button class="btn-featured" onclick="location.href='dataListCourse.php'">View All Course</button>
        </div>
    </section>

    <section id="browse" class="still-center">
        <h3>Browse Subjects</h3>
        <div class="browse-items">
            <div class="b-item">
                <img src="./assets/image/browse-computer.png" alt="">
                <p>Computer Science</p>
            </div>
            <div class="b-item">
                <img src="./assets/image/browse-engginer.png" alt="">
                <p>Engineering</p>
            </div>
            <div class="b-item">
                <img src="./assets/image/browse-data.png" alt="">
                <p>Data Science</p>
            </div>
        </div>
    </section>

    <section id="offer" class="still-center">
        <div class="offer-container grid">
            <div class="offer-text">
                <h3>Special offer! Try 7 days for free</h3>
                <p>*credit card required</p>
            </div>
            <button class="btn-offer btn-orange btn-duapat">Start Free Trial</button>
        </div>
    </section>

    <section id="learn" class="still-center">
        <div class="learn-container">
            <div class="learn-text">
                <h3>Learn anything</h3>
                <p class="sub-judul">Whether you want to develop as a professional or discover a new hobby, there's an
                    online course for that.
                    You can even take your learning further with online programs and degrees.</p>
                <button class="learn-btn btn-duapat" onclick="location.href='dataListCourse.php'">Start Learning</button>
            </div>
            <img src="./assets/image/learn-img.png" alt="" class="learn-img">
        </div>
    </section>

    <section id="our" class="still-center">
        <h3>Our Learners</h3>
        <img src="./assets/image/our-img.png" alt="">
        <p class="sub-judul">Millions of people, of all ages and from around the world, are improving their lives with
            Eduka.<br><br>You
            can read some of their amazing stories on our blog.</p>
    </section>

    <section id="instructor">
        <div class="instructor-container grid still-center">
            <div class="instructor-text">
                <h2>Do you want to be an instructor ?</h2>
                <button class="btn-instructor btn-orange btn-duapat" onclick="location.href='register.php'">Join with Us</button>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="footer-container">
            <div class="footer-atas footer-center still-center">
                <h3>eduka<span>.</span></h3>
                <div class="subs grid">
                    <p>Subscribe our Newsletters</p>
                    <input type="text" placeholder="Your e-mail">
                    <button class="btn-subs btn-orange">Subscribe</button>
                </div>
            </div>
            <div class="footer-garis"></div>
            <div class="footer-bawah footer-center still-center">
                <ul class="footer-links">
                    <li><a href="">JOBS</a></li>
                    <li><a href="">BLOG</a></li>
                    <li><a href="">BECOME A PARTNER</a></li>
                    <li><a href="aboutUs.php">ABOUT US</a></li>
                    <li><a href="">CONTACT</a></li>
                </ul>
                <ul class="sosmed-links">
                    <li><a href=""><img src="./assets/image/icon-behance.svg" alt=""></a></li>
                    <li><a href=""><img src="./assets/image/icon-google.svg" alt=""></a></li>
                    <li><a href=""><img src="./assets/image/icon-twt.svg" alt=""></a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- javascript -->
    <script src="./app.js"></script>
</body>

</html>