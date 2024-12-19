<?= view('_layout/header') ?>

<div class="section">
    <div class="columns">
        <?= view('_layout/sidebar') ?>
        <main class="column">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <div class="title">
                            Update Course
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
                <form action="/courses/update/<?= $course['CourseID'] ?>" method="POST">
                    <!-- CSRF Token -->
                    <?= csrf_field() ?>

                    <!-- School -->
                    <div class="field <?= isset($errors['SchoolID']) ? 'has-danger' : '' ?>">
                        <label class="label">School</label>
                        <div class="control">
                            <div class="select">
                                <select name="SchoolID" required>
                                    <?php foreach ($schools as $school): ?>
                                        <option value="<?= $school['SchoolID'] ?>" <?= old('SchoolID', $course['SchoolID']) == $school['SchoolID'] ? 'selected' : '' ?>><?= $school['Name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <?php if (isset($errors['SchoolID'])): ?>
                            <p class="help is-danger"><?= $errors['SchoolID'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Course Name -->
                    <div class="field <?= isset($errors['Name']) ? 'has-danger' : '' ?>">
                        <label class="label">Course Name</label>
                        <div class="control">
                            <input class="input <?= isset($errors['Name']) ? 'is-danger' : '' ?>" type="text" name="Name" placeholder="Enter the course name" value="<?= old('Name', $course['Name']) ?>" required>
                        </div>
                        <?php if (isset($errors['Name'])): ?>
                            <p class="help is-danger"><?= $errors['Name'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Description -->
                    <div class="field <?= isset($errors['Description']) ? 'has-danger' : '' ?>">
                        <label class="label">Description</label>
                        <div class="control">
                            <textarea class="textarea <?= isset($errors['Description']) ? 'is-danger' : '' ?>" name="Description" placeholder="Enter the course description"><?= old('Description', $course['Description']) ?></textarea>
                        </div>
                        <?php if (isset($errors['Description'])): ?>
                            <p class="help is-danger"><?= $errors['Description'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Submit Button -->
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary" type="submit">Update Course</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

</body>
</html>
