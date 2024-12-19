<?php $errors = session('errors')?>
<?= view('_layout/header') ?>
<div class="section">
    <div class="columns">
        <?= view('_layout/sidebar') ?>
        <main class="column">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <div class="title">
                            Users
                        </div>
                    </div>
                </div>
                <div class="level-right">
                    <div class="level-item">
                        Today: <?= date("d/m/Y"); ?>
                    </div>
                </div>
                <br/>
            </div>
            <div class="level is-fullwidth">
                <form action="/users/create" method="POST">
                    <!-- First Name -->
                    <div class="field <?= isset($errors['FirstName']) ? 'has-danger' : '' ?>">
                        <label class="label">First Name</label>
                        <div class="control">
                            <input class="input <?= isset($errors['FirstName']) ? 'is-danger' : '' ?>" type="text" name="FirstName" placeholder="Enter your first name" value="<?= old('FirstName') ?>" required>
                        </div>
                        <?php if (isset($errors['FirstName'])): ?>
                            <p class="help is-danger"><?= $errors['FirstName'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Last Name -->
                    <div class="field <?= isset($errors['LastName']) ? 'has-danger' : '' ?>">
                        <label class="label">Last Name</label>
                        <div class="control">
                            <input class="input <?= isset($errors['LastName']) ? 'is-danger' : '' ?>" type="text" name="LastName" placeholder="Enter your last name" value="<?= old('LastName') ?>" required>
                        </div>
                        <?php if (isset($errors['LastName'])): ?>
                            <p class="help is-danger"><?= $errors['LastName'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Email -->
                    <div class="field <?= isset($errors['Email']) ? 'has-danger' : '' ?>">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input <?= isset($errors['Email']) ? 'is-danger' : '' ?>" type="Email" name="Email" placeholder="Enter your Email" value="<?= old('Email') ?>" required>
                        </div>
                        <?php if (isset($errors['Email'])): ?>
                            <p class="help is-danger"><?= $errors['Email'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Password Hash -->
                    <div class="field <?= isset($errors['PasswordHash']) ? 'has-danger' : '' ?>">
                        <label class="label">Password</label>
                        <div class="control">
                            <input class="input <?= isset($errors['PasswordHash']) ? 'is-danger' : '' ?>" type="password" name="PasswordHash" placeholder="Enter your password" required>
                        </div>
                        <?php if (isset($errors['PasswordHash'])): ?>
                            <p class="help is-danger"><?= $errors['PasswordHash'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Role -->
                    <div class="field <?= isset($errors['Role']) ? 'has-danger' : '' ?>">
                        <label class="label">Role</label>
                        <div class="control">
                            <div class="select">
                                <select name="Role" required>
                                    <option value="Admin" <?= old('Role') == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                    <option value="Teacher" <?= old('Role') == 'Teacher' ? 'selected' : '' ?>>Teacher</option>
                                    <option value="Student" <?= old('Role') == 'Student' ? 'selected' : '' ?>>Student</option>
                                    <option value="Parent" <?= old('Role') == 'Parent' ? 'selected' : '' ?>>Parent</option>
                                </select>
                            </div>
                        </div>
                        <?php if (isset($errors['Role'])): ?>
                            <p class="help is-danger"><?= $errors['Role'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Submit Button -->
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary" type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
</body>
</html>
