<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>B' Helpful - Create Account</title>

    <link
        rel="stylesheet"
        href="<?= base_url('assets/css/style_register.css') ?>"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Manjari:wght@400;700&display=swap"
        rel="stylesheet"
    >

</head>

<body class="register-body">

    <nav class="auth-navbar">

        <img
            src="<?= base_url('assets/images/b-helpful logo.jpeg') ?>"
            alt="B-Helpful Logo"
            class="logo"
        >

        <a
            href="<?= base_url('auth/login') ?>"
            class="nav-link-auth"
        >
            Log in &rarr;
        </a>

    </nav>

    <div class="auth-container">

        <section class="auth-desc">

            <h1>
                Berdampak bagi Sesama,<br>
                Bangun Masa Depanmu.
            </h1>

            <p>
                Platform pengumpulan jam
                Community Service bagi
                mahasiswa BINUS University.
            </p>

            <img
                src="<?= base_url('assets/images/logobinus.png') ?>"
                alt="Binus Logo"
                class="binus-logo-auth"
            >

        </section>

        <section class="auth-form-section">

            <form
                id="registerForm"
                method="POST"
                action="<?= base_url('auth/registerProcess') ?>"
                class="auth-form"
            >

                <h2 class="form-title">
                    Create Account
                </h2>

                <?php if($this->session->flashdata('error')): ?>

                    <div class="error-box">

                        <?= $this->session->flashdata('error') ?>

                    </div>

                <?php endif; ?>

                <?php if($this->session->flashdata('success')): ?>

                    <div class="success-box">

                        <?= $this->session->flashdata('success') ?>

                    </div>

                <?php endif; ?>

                <div class="input-group">

                    <label for="username">
                        Username
                    </label>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        required
                    >

                </div>

                <div class="input-group">

                    <label for="email">
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                    >

                </div>

                <div class="input-row">

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

                    </div>

                    <div class="input-group">

                        <label for="conPassword">
                            Confirm Password
                        </label>

                        <input
                            type="password"
                            id="conPassword"
                            name="conPassword"
                            required
                        >

                    </div>

                </div>

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

                <div class="input-group">

                    <label>
                        I want to join as:
                    </label>

                    <div class="radio-group">

                        <label class="radio-label">

                            <input
                                type="radio"
                                name="role"
                                value="user"
                                checked
                            >

                            Volunteer

                        </label>

                        <label class="radio-label">

                            <input
                                type="radio"
                                name="role"
                                value="organizer"
                            >

                            Event Organizer

                        </label>

                    </div>

                </div>

                <div class="checkbox-group">

                    <input
                        type="checkbox"
                        id="agreement"
                        required
                    >

                    <label for="agreement">
                        I agree with the terms and conditions
                    </label>

                </div>

                <button
                    type="submit"
                    class="btn-auth"
                >
                    Sign Up Now
                </button>

            </form>

        </section>

    </div>

    <script>

    function togglePassword()
    {
        const password =
            document.getElementById('password');

        const confirmPassword =
            document.getElementById('conPassword');

        if (password.type === 'password') {

            password.type = 'text';
            confirmPassword.type = 'text';

        } else {

            password.type = 'password';
            confirmPassword.type = 'password';
        }
    }

    </script>

</body>
</html>