<?= view('_layout/header') ?>

<div class="section">
    <div class="columns">
        <?= view('_layout/sidebar') ?>
        <main class="column">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <div class="title">
                            Update <?=$course['Name']?> > <?=$assignment['Title']?>
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

            <form action="/courses/<?= $course['CourseID'] ?>/assignments/<?= $assignment['AssignmentID'] ?>/update" method="POST">
                <!-- CSRF Token for security (if using a framework that supports it) -->
                <input type="hidden" name="_token" value="<?= csrf_token() ?>">

                <div class="field">
                    <label class="label" for="title">Title</label>
                    <div class="control">
                        <input class="input" type="text" id="title" name="Title" value="<?= htmlspecialchars($assignment['Title']) ?>" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="description">Description</label>
                    <div class="control">
                        <textarea class="textarea" id="description" name="Description" required><?= htmlspecialchars($assignment['Description']) ?></textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="due_date">Due Date <?= date('m-d-Y', strtotime($assignment['DueDate']))?></label>
                    <div class="control">
                        <input class="input" type="date" id="due_date" name="DueDate" value="<?= date('m-d-Y', strtotime($assignment['DueDate'])) ?>" required>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary" type="submit">Update Assignment</button>
                    </div>
                    <div class="control">
                        <a href="/courses/<?= $course['CourseID'] ?>/assignments">
                            <button type="button" class="button is-light">Cancel</button>
                        </a>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>

</body>
</html>
