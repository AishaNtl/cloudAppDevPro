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
                            Update student details in <?=$school['Name']?>
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
                <form action="/students/update/<?=$school['SchoolID']?>/<?=$student['UserID']?>" method="POST">
                    <!-- Add CSRF Token -->
                    <?= csrf_field() ?>

                    <!-- First Name -->
                    <div class="field <?= isset($errors['FirstName']) ? 'has-danger' : '' ?>">
                        <label class="label">First Name</label>
                        <div class="control">
                            <input class="input <?= isset($errors['FirstName']) ? 'is-danger' : '' ?>" type="text" name="FirstName" placeholder="Enter the first name" value="<?= old('FirstName', $student['FirstName']) ?>" required>
                        </div>
                        <?php if (isset($errors['FirstName'])): ?>
                            <p class="help is-danger"><?= $errors['FirstName'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Last Name -->
                    <div class="field <?= isset($errors['LastName']) ? 'has-danger' : '' ?>">
                        <label class="label">Last Name</label>
                        <div class="control">
                            <input class="input <?= isset($errors['LastName']) ? 'is-danger' : '' ?>" type="text" name="LastName" placeholder="Enter the last name" value="<?= old('LastName', $student['LastName']) ?>" required>
                        </div>
                        <?php if (isset($errors['LastName'])): ?>
                            <p class="help is-danger"><?= $errors['LastName'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Email -->
                    <div class="field <?= isset($errors['Email']) ? 'has-danger' : '' ?>">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input <?= isset($errors['Email']) ? 'is-danger' : '' ?>" type="email" name="Email" placeholder="Enter the Email" value="<?= old('Email', $student['Email']) ?>" required>
                        </div>
                        <?php if (isset($errors['Email'])): ?>
                            <p class="help is-danger"><?= $errors['Email'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Submit Button -->
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
</body>
</html>
