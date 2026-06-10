<!DOCTYPE html>
<html lang="en">
<script>
if (!<?= $this->session->userdata('loggedIn') ? 'true' : 'false' ?>) {
    window.location.replace("<?= base_url('auth/login') ?>");
}
</script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>B' Helpful About Page</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style_about.css') ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

<!-- WRAPPER (IMPORTANT FIX) -->
<div class="page-wrapper">

    <!-- NAVBAR -->
    <nav class="navbar">

        <img src="<?= base_url('assets/images/b-helpful logo.jpeg') ?>" class="logo">

        <ul class="navlink">

            <li class="unpaged"><a href="<?= base_url('homepage') ?>">Home</a></li>
            <li class="unpaged"><a href="<?= base_url('places') ?>">Places</a></li>
            <li class="paged">About</li>
            <li class="unpaged"><a href="<?= base_url('contact') ?>">Contact</a></li>
            <li class="unpaged"><a href="<?= base_url('account') ?>">Account</a></li>

        </ul>

        <div class="menu-button">☰</div>

    </nav>

    <!-- ABOUT -->
    <section class="about">

        <div class="about-container">

            <div class="about-text">

                <h1>We want to give you a new experience!</h1>

                <p>We are passionate about creating meaningful volunteering experiences for both Binusians and non-Binusians. Born from a shared commitment to social impact and community development, our platform is designed to connect individuals with opportunities to make a real difference.</p>

                <p>Our platform connects people with opportunities to help communities.</p>

                <p>Start your volunteering journey with us today.</p>

                <a href="<?= base_url('contact') ?>" class="btn">Contact Us</a>

            </div>

            <div class="about-image">
                <img src="<?= base_url('assets/images/volun.jpg') ?>" class="imgboutsyu">
            </div>

        </div>

    </section>

</div>

<!-- FOOTER (OUTSIDE WRAPPER = FULL WIDTH FIX) -->
<footer class="main-footer">

    <div class="footer-col">

        <h4>Download Our App</h4>

        <p>Download App for Android and IOS mobile phone.</p>

        <div class="app-buttons">

            <img src="<?= base_url('assets/images/playstore.png') ?>" alt="Google Play">
            <img src="<?= base_url('assets/images/appstore.png') ?>" alt="App Store">

        </div>

    </div>

    <div class="footer-col">

        <h4>Get Involved</h4>

        <ul>
            <li>Join as Volunteer</li>
            <li>Organize an Event</li>
            <li>Community Support</li>
            <li>Partner with Us</li>
        </ul>

    </div>

    <div class="footer-col">

        <h4>Follow Us</h4>

        <ul>

            <li>Facebook <i class="fa-brands fa-facebook"></i></li>
            <li>Twitter <i class="fa-brands fa-twitter"></i></li>
            <li>Instagram <i class="fa-brands fa-instagram"></i></li>
            <li>YouTube <i class="fa-brands fa-youtube"></i></li>

        </ul>

    </div>

    <div class="footer-bottom">

        <p>Our Goal Is To Give Our Customer A New Experience</p>
        <p>Copyright 2026 - B' Helpful</p>

    </div>

</footer>

</body>
</html>