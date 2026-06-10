<div id="profileModal" class="modal">

    <div class="modal-content">

        <span class="close">&times;</span>

        <h2>Edit Profile</h2>

        <form action="<?= base_url('account/update') ?>" method="POST">

            <input type="hidden" name="id" value="<?= $user->id ?>">

            <label>Username</label>
            <input type="text" name="username" value="<?= $user->username ?>">

            <label>Password</label>
            <input type="password" name="password" placeholder="New password">

            <label>Email</label>
            <input type="email" name="email" value="<?= $user->email ?>" readonly style="background:#eee; cursor:not-allowed;">

            <button type="submit">Save</button>

        </form>

    </div>

</div>