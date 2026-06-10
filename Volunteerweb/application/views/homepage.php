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

    <title>B' Helpful Home Page</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style_home.css') ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

<nav class="navbar">

    <img src="<?= base_url('assets/images/b-helpful logo.jpeg') ?>" class="logo">

    <ul class="navlink">

        <li class="paged">Home</li>
        <li class="unpaged"><a href="<?= base_url('places') ?>">Places</a></li>
        <li class="unpaged"><a href="<?= base_url('about') ?>">About</a></li>
        <li class="unpaged"><a href="<?= base_url('contact') ?>">Contact</a></li>
        <li class="unpaged"><a href="<?= base_url('account') ?>">Account</a></li>

    </ul>

    <div class="menu-button">☰</div>

</nav>

<header class="hero-section">

    <div class="hero-card">

        <h1>Get A New Volunteering Experience!</h1>

        <p>
            Don't just stay in your room doing nothing.<br>
            Go outdoors and help others!
        </p>

        <a href="<?= base_url('places') ?>" class="btn-green">Explore</a>

    </div>

</header>

<div class="green-bg-section">

    <section class="places-section">

        <h2 class="section-title">
            Featured Places
        </h2>

        <div class="places-grid">

            <?php if (!empty($featuredEvents)): ?>

                <?php foreach ($featuredEvents as $event): ?>

                    <div class="place-card">

                        <img
                            src="<?= base_url('assets/images/place1.jpg') ?>"
                            class="place-img"
                        >

                        <div class="place-content">

                            <h3>
                                <?= htmlspecialchars($event->title) ?>
                            </h3>

                            <p>
                                <?= htmlspecialchars($event->location) ?>
                            </p>

                            <p>
                                <?= date(
                                    'd M Y',
                                    strtotime($event->event_date)
                                ) ?>
                            </p>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <p>
                    No featured events found.
                </p>

            <?php endif; ?>

        </div>

    </section>

    <section class="places-section">

        <h2 class="section-title">
            Binusian Places
        </h2>

        <div class="places-grid">

            <?php if (!empty($binusEvents)): ?>

                <?php foreach ($binusEvents as $event): ?>

                    <div class="place-card">

                        <img
                            src="<?= base_url('assets/images/place1.jpg') ?>"
                            class="place-img"
                        >

                        <div class="place-content">

                            <h3>
                                <?= htmlspecialchars($event->title) ?>
                            </h3>

                            <p>
                                <?= htmlspecialchars($event->location) ?>
                            </p>

                            <p>
                                <?= date(
                                    'd M Y',
                                    strtotime($event->event_date)
                                ) ?>
                            </p>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <p>
                    No BINUS events found.
                </p>

            <?php endif; ?>

        </div>

    </section>

</div>

<section class="about-section">

    <div class="about-img-container">

        <img
            src="<?= base_url('assets/images/volunteer-group.jpg') ?>"
            class="volunimgcon"
        >

    </div>

    <div class="about-text-container">

        <h2>B' Helpful</h2>

        <p>
            Join us in making a positive impact on the world.
        </p>

        <p>
            B' Helpful is a volunteering platform designed to help
            students and communities connect through meaningful
            activities and social programs.
        </p>

        <p>
            Whether you want to participate in charity events,
            environmental campaigns, educational programs,
            or local community support activities,
            B' Helpful makes it easier to discover opportunities
            around you.
        </p>

        <p>
            Our mission is to encourage more people to become active,
            compassionate, and socially aware by making volunteering
            more accessible, organized, and enjoyable.
        </p>

        <p>
            Start your volunteering journey today and become part of
            a growing community dedicated to creating positive change.
        </p>

    </div>

</section>

<!-- ================= REVIEWS SECTION ================= -->
<section class="reviews-section">

    <h2 class="section-title">
        Some Reviews We Get
    </h2>

    <div class="reviews-container">

        <button
            class="review-btn left"
            onclick="moveReviews(-1)"
        >
            ❮
        </button>

        <div class="reviews-viewport">

            <div class="reviews-track" id="reviewsTrack">

                <?php if (!empty($reviews)): ?>

                    <?php foreach ($reviews as $r): ?>

                        <div class="review-card">

                            <div class="review-top">

                                <img
                                    src="<?= !empty($r->profile_pic) ? $r->profile_pic : 'https://via.placeholder.com/60' ?>"
                                    class="review-avatar"
                                >

                                <div class="review-user">

                                    <div class="review-role">
                                        User
                                    </div>

                                    <div class="review-name">
                                        <?= htmlspecialchars($r->username) ?>
                                    </div>

                                </div>

                            </div>

                            <div class="review-comment">
                                <?= htmlspecialchars($r->comment) ?>
                            </div>

                            <div class="review-stars">
                                <?= str_repeat("★", $r->rating) ?>
                                <?= str_repeat("☆", 5 - $r->rating) ?>
                            </div>

                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <p style="color:white;">
                        No reviews found
                    </p>

                <?php endif; ?>

            </div>

        </div>

        <button
            class="review-btn right"
            onclick="moveReviews(1)"
        >
            ❯
        </button>

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

<script>

window.BASE_URL =
    "<?= base_url() ?>";

window.IMAGE_URL =
    "<?= base_url('assets/images/') ?>";

</script>

<script src="<?= base_url('assets/js/script_home.js') ?>"></script>

</body>
</html>