<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>B' Helpful - Log In</title>

    <link
        rel="stylesheet"
        href="<?= base_url('Volunteerweb/assets/css/style_login.css') ?>"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Manjari:wght@400;700&display=swap"
        rel="stylesheet"
    >

</head>

<body class="login-body">

    <nav class="auth-navbar">

        <img
            src="<?= base_url('assets/images/b-helpful logo.jpeg') ?>"
            alt="B-Helpful Logo"
            class="logo"
        >

        <a
            href="<?= base_url('auth/register') ?>"
            class="nav-link-auth"
        >
            Sign up &rarr;
        </a>

    </nav>

    <div class="auth-container">

        <section class="auth-form-section">

            <form
                id="loginForm"
                method="POST"
                action="<?= base_url('auth/loginProcess') ?>"
                class="auth-form"
            >

                <h2 class="form-title">
                    Log In Account
                </h2>

                <?php if($this->session->flashdata('error')): ?>

                    <div class="error-box">

                        <?= $this->session->flashdata('error') ?>

                    </div>

                <?php endif; ?>

                <div class="input-group">

                    <label for="login_id">
                        Email or Username
                    </label>

                    <input
                        type="text"
                        id="login_id"
                        name="username"
                        required
                    >

                </div>

                <div class="input-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                    >

                    <div class="show-password-wrapper">

                        <input
                            type="checkbox"
                            id="showPassword"
                            onclick="togglePassword()"
                        >

                        <label
                            for="showPassword"
                            class="show-password-label"
                        >
                            Show Password
                        </label>

                    </div>

                </div>

                <button
                    type="submit"
                    class="btn-auth"
                >
                    Log In
                </button>

                <p class="forgot-pass">

                    Forgot password?

                    <a href="#">
                        Click here
                    </a>

                </p>

            </form>

        </section>

        <section class="auth-desc">

            <h1>
                Selamat Datang Kembali!
            </h1>

            <p>
                Lanjutkan kontribusi sosialmu dan
                kumpulkan jam Comserv dengan mudah.
            </p>

            <img
                src="<?= base_url('assets/images/logobinus.png') ?>"
                alt="Binus Logo"
                class="binus-logo-auth"
            >

        </section>

    </div>

    <script src="<?= base_url('assets/js/script_login.js') ?>"></script>

    <script>

    function togglePassword()
    {
        const password =
            document.getElementById('password');

        if (password.type === 'password') {

            password.type = 'text';

        } else {

            password.type = 'password';
        }
    }

    </script>

</body>
</html>