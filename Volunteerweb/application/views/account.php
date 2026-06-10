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
    <title>Account Page</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style_account.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<nav class="navbar">
    <img src="<?= base_url('assets/images/b-helpful logo.jpeg') ?>" class="logo">
    <ul class="navlink">
        <li class="unpaged"><a href="<?= base_url('homepage') ?>">Home</a></li>
        <li class="unpaged"><a href="<?= base_url('places') ?>">Places</a></li>
        <li class="unpaged"><a href="<?= base_url('about') ?>">About</a></li>
        <li class="unpaged"><a href="<?= base_url('contact') ?>">Contact</a></li>
        <li class="paged">Account</li>
    </ul>
    <div class="menu-button">☰</div>
</nav>

<div class="account-container">
    <div class="account-card-wrapper">
        <div class="account-header">
            <h1>Account Details</h1>
            <p>Manage your profile information</p>
        </div>
        <div class="account-layout">
            <div class="account-card">
                <div class="profile-avatar-section">
                    <img src="<?= !empty($user->profile_pic) ? $user->profile_pic : 'https://via.placeholder.com/120' ?>" class="profile-avatar">
                    <h2><?= $user->username ?? 'Unknown User' ?></h2>
                </div>
                <div class="row">
                    <span><i class="fa-solid fa-id-card"></i> ID</span>
                    <p><?= $user->id ?? '-' ?></p>
                </div>
                <div class="row">
                    <span><i class="fa-solid fa-user"></i> Username</span>
                    <p><?= $user->username ?? '-' ?></p>
                </div>
                <div class="row">
                    <span><i class="fa-solid fa-lock"></i> Password</span>
                    <p><?= $user->password ?? '-' ?></p>
                </div>
                <div class="row">
                    <span><i class="fa-solid fa-user-tag"></i> Role</span>
                    <p><?= $user->role ?? '-' ?></p>
                </div>
                <div class="row">
                    <span><i class="fa-solid fa-envelope"></i> Email</span>
                    <p><?= $user->email ?? '-' ?></p>
                </div>
                <div class="account-actions">
                    <button type="button" onclick="openProfileModal()" class="btn-edit-profile">Edit Profile</button>
                    <a href="<?= base_url('auth/logout') ?>" class="btn-logout">Logout</a>
                </div>
            </div>
            <div class="event-history-box">
                <div class="event-history-header">
                    <h2><i class="fa-solid fa-calendar-check"></i> Joined Events</h2>
                    <p>Your volunteering history</p>
                </div>
                <?php if (!empty($joinedEvents) && is_array($joinedEvents)): ?>
                    <?php foreach ($joinedEvents as $event): ?>
                        <?php if (!empty($event)): ?>
                            <div class="event-item">
                                <div class="event-top">
                                    <h3><?= $event->title ?? '-' ?></h3>
                                    <span class="status <?= strtolower($event->status ?? 'pending') ?>"><?= ucfirst($event->status ?? 'pending') ?></span>
                                </div>
                                <div class="event-info">
                                    <p><i class="fa-solid fa-clock"></i> <?= $event->event_date ?? '-' ?></p>
                                    <p><i class="fa-solid fa-hourglass-half"></i> <?= $event->hours_reward ?? '0' ?> Volunteer Hours</p>
                                    <p><i class="fa-solid fa-circle-check"></i> <?= $event->attendance ?? 'Not Completed' ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No joined events yet.</p>
                <?php endif; ?>
            </div>
            <?php if ($user->role == 'organizer'): ?>
            <div class="event-history-box">
                <div class="event-history-header">
                    <h2><i class="fa-solid fa-briefcase"></i> My Created Events</h2>
                    <p>Events you created</p>
                </div>
                <?php if (!empty($myEvents)): ?>
                    <?php foreach ($myEvents as $event): ?>
                        <div class="event-item">
                            <div class="event-top"><h3><?= $event->title ?></h3></div>
                            <div class="event-info">
                                <p><?= $event->event_date ?></p>
                                <p><?= $event->location ?></p>
                            </div>
                            <button class="btn-edit-event" onclick="openEditModal('<?= $event->id ?>','<?= htmlspecialchars($event->title, ENT_QUOTES) ?>','<?= htmlspecialchars($event->description, ENT_QUOTES) ?>','<?= htmlspecialchars($event->location, ENT_QUOTES) ?>','<?= $event->event_date ?>','<?= $event->max_quota ?>','<?= $event->hours_reward ?>')">Edit Event</button>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No events created yet.</p>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div id="eventModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Edit Event</h2>
        
        <form method="POST" id="editForm">
            <input type="hidden" name="id" id="event_id">

            <label for="title">Event Title</label>
            <input type="text" name="title" id="title" placeholder="Enter a catchy title for your event" required>

            <label for="description">Event Description</label>
            <input type="text" name="description" id="description" placeholder="Describe what volunteers will be doing..."></input>

            <label for="location">Location</label>
            <input type="text" name="location" id="location" placeholder="e.g. Community Center, Room 4B">

            <label for="event_date">Date and Time</label>
            <input type="datetime-local" name="event_date" id="event_date">

            <label for="max_quota">Maximum Volunteers Allowed</label>
            <input type="number" name="max_quota" id="max_quota" placeholder="e.g. 50">

            <label for="hours_reward">Volunteer Hours Rewarded</label>
            <input type="number" name="hours_reward" id="hours_reward" placeholder="e.g. 4">

            <button type="submit">Save Changes</button>
        </form>
    </div>
</div>

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

<?php $this->load->view('modal/modal_edit_account'); ?>

<script>
function openProfileModal() {
    document.getElementById("profileModal").classList.add("show");
}

function closeProfileModal() {
    document.getElementById("profileModal").classList.remove("show");
}

function openEditModal(id, title, description, location, event_date, max_quota, hours_reward) {

    document.getElementById("eventModal").classList.add("show");

    document.getElementById("event_id").value = id;
    document.getElementById("title").value = title;
    document.getElementById("description").value = description;
    document.getElementById("location").value = location;

    document.getElementById("event_date").value =
        event_date.replace(" ", "T").substring(0, 16);

    document.getElementById("max_quota").value = max_quota;
    document.getElementById("hours_reward").value = hours_reward;

    document.getElementById("editForm").action =
        "<?= base_url('account/updateEvent/') ?>" + id;
}

function closeEventModal() {
    document.getElementById("eventModal").classList.remove("show");
}
</script>

</body>
</html>