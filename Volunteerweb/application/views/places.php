<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        B' Helpful Places
    </title>

    <link
        rel="stylesheet"
        href="<?= base_url('assets/css/style_places.css') ?>"
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Manjari:wght@400;700&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

</head>

<body>

<?php if (
    !$this->session->userdata('loggedIn')
): ?>

<script>

window.location.replace(
    "<?= base_url('auth/login') ?>"
);

</script>

<?php endif; ?>

<nav class="navbar">

    <img
        src="<?= base_url('assets/images/b-helpful logo.jpeg') ?>"
        alt="B-Helpful Logo"
        class="logo"
    >

    <ul class="navlink">

        <li class="unpaged">

            <a href="<?= base_url('homepage') ?>">
                Home
            </a>

        </li>

        <li class="paged">
            Places
        </li>

        <li class="unpaged">

            <a href="<?= base_url('about') ?>">
                About
            </a>

        </li>

        <li class="unpaged">

            <a href="<?= base_url('contact') ?>">
                Contact
            </a>

        </li>

        <li class="unpaged">

            <a href="<?= base_url('account') ?>">
                Account
            </a>

        </li>

    </ul>

    <div class="menu-button">
        ☰
    </div>

</nav>

<main class="main-content">

    <div class="search-container">

        <input
            type="text"
            placeholder="Search..."
        >

        <button type="submit">

            <i class="fa-solid fa-search"></i>

        </button>

    </div>

    <div class="events-container">

        <div class="events-header">

            <h2>

                Upcoming Events

                <i
                    class="fa-solid fa-thumbs-up"
                    style="
                        color:#000;
                        font-size:20px;
                        margin-left:8px;
                    "
                ></i>

            </h2>

            <div
                style="
                    display:flex;
                    gap:10px;
                    align-items:center;
                "
            >

                <select class="sort-dropdown">

                    <option value="default">
                        Default Sorting
                    </option>

                    <option value="newest">
                        Newest
                    </option>

                    <option value="oldest">
                        Oldest
                    </option>

                </select>

                <?php if (
                    $this->session->userdata('role')
                    == 'organizer'
                ): ?>

                    <button
                        class="create-event-btn"
                        onclick="openCreateModal()"
                    >
                        Create Event
                    </button>

                <?php else: ?>

                    <button
                        class="create-event-btn disabled-btn"
                        onclick="showOrganizerAlert()"
                    >
                        Create Event
                    </button>

                <?php endif; ?>

            </div>

        </div>

        <div
            class="events-list"
            id="eventsList"
        >

        <?php if (!empty($events)): ?>

            <?php foreach ($events as $event): ?>

                <div class="event-item">

                    <div class="event-logo">

                        <img
                            src="<?= base_url('assets/images/place1.jpg') ?>"
                            alt="Event"
                        >

                    </div>

                    <div class="event-datetime">

                        <h4>
                            Event Date
                        </h4>

                        <p>
                            <?= $event->event_date ?>
                        </p>

                    </div>

                    <div class="event-info-text">

                        <h4>
                            <?= $event->title ?>
                        </h4>

                        <p>
                            <?= $event->description ?>
                        </p>

                        <small>
                            <?= $event->location ?>
                        </small>

                    </div>

                    <div class="event-actions">

                        <?php if ($event->joined): ?>

                            <button class="btn-joined" disabled>
                                <i class="fa-solid fa-check"></i>
                                Joined
                            </button>

                        <?php else: ?>

                            <form method="POST" action="<?= base_url('places/joinEvent') ?>">
                                <input type="hidden" name="event_id" value="<?= $event->id ?>">

                                <button class="btn-info" type="submit">
                                    <i class="fa-solid fa-user-plus"></i>
                                    Join
                                </button>
                            </form>

                        <?php endif; ?>

                        <button class="btn-save">

                            <i class="fa-regular fa-bookmark"></i>

                            Save

                        </button>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="event-item">

                <p>
                    No events found.
                </p>

            </div>

        <?php endif; ?>

        </div>

    </div>

</main>

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

        <h4>
            Get Involved
        </h4>

        <ul>

            <li>
                Join as Volunteer
            </li>

            <li>
                Organize an Event
            </li>

            <li>
                Community Support
            </li>

            <li>
                Partner with Us
            </li>

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

<?php $this->load->view('modal/modal_create_event'); ?>

<script>
const BASE_URL =
    "<?= base_url('assets/images/') ?>";

const USER_ID =
    "<?= $this->session->userdata('userId') ?>";

const IS_LOGGED_IN =
    <?= $this->session->userdata('loggedIn') ? 'true' : 'false' ?>;
</script>

<script
    src="<?= base_url('assets/js/script_places.js') ?>"
></script>

</body>
</html>