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

    <title>B' Helpful Contact Page</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style_contact.css') ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar">

    <img src="<?= base_url('assets/images/b-helpful logo.jpeg') ?>" class="logo">

    <ul class="navlink">

        <li class="unpaged"><a href="<?= base_url('homepage') ?>">Home</a></li>
        <li class="unpaged"><a href="<?= base_url('places') ?>">Places</a></li>
        <li class="unpaged"><a href="<?= base_url('about') ?>">About</a></li>
        <li class="paged">Contact</li>
        <li class="unpaged"><a href="<?= base_url('account') ?>">Account</a></li>

    </ul>

    <div class="menu-button">☰</div>

</nav>

<!-- ================= CONTACT SECTION ================= -->
<section class="contact">

    <!-- ================= GOOGLE MAP ================= -->
    <section class="map-section">

        <div class="map-container">

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126907.07484175136!2d106.689431!3d-6.2293867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3a1c0b0c1d3%3A0x301576d14feb8c0!2sJakarta!5e0!3m2!1sen!2sid!4v1700000000000"
                allowfullscreen=""
                loading="lazy">
            </iframe>

        </div>

    </section>
    
    <div class="contact-container">

        <div class="contact-info">

            <h1>Get in Touch</h1>

            <p>Have questions or suggestions? Contact us anytime.</p>

            <div class="info-item">
                <strong>Email:</strong>
                <p>info@bhelpful.com</p>
            </div>

            <div class="info-item">
                <strong>Phone:</strong>
                <p>+62 812 3456 7890</p>
            </div>

            <div class="info-item">
                <strong>Location:</strong>
                <p>Jakarta, Indonesia</p>
            </div>

        </div>

        <div class="contact-form">

            <form>
                <input type="text" placeholder="Your Name">
                <input type="email" placeholder="Your Email">
                <input type="text" placeholder="Subject">
                <textarea rows="5" placeholder="Message"></textarea>
                <button type="submit">Send</button>
            </form>

        </div>

    </div>

</section>

<!-- ================= FOOTER (YOUR ORIGINAL) ================= -->
<footer class="main-footer">

    <div class="footer-col">

        <h4>
            Download Our App
        </h4>

        <p>
            Download App for Android and IOS mobile phone.
        </p>

        <div class="app-buttons">

            <img
                src="<?= base_url('assets/images/playstore.png') ?>"
                alt="Google Play"
            >

            <img
                src="<?= base_url('assets/images/appstore.png') ?>"
                alt="App Store"
            >

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

        <h4>
            Follow Us
        </h4>

        <ul>

            <li>
                Facebook
                <i class="fa-brands fa-facebook"></i>
            </li>

            <li>
                Twitter
                <i class="fa-brands fa-twitter"></i>
            </li>

            <li>
                Instagram
                <i class="fa-brands fa-instagram"></i>
            </li>

            <li>
                YouTube
                <i class="fa-brands fa-youtube"></i>
            </li>

        </ul>

    </div>

    <div class="footer-bottom">

        <p>
            Our Goal Is To Give Our Customer
            A New Experience
        </p>

        <p>
            Copyright 2026 - B' Helpful
        </p>

    </div>

</footer>

<!-- ================= JS ================= -->
<script src="<?= base_url('assets/js/script_contact.js') ?>"></script>

</body>
</html>