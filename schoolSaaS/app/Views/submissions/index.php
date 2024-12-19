<?= view('_layout/header') ?>

<div class="section">
    <div class="columns">
        <?= view('_layout/sidebar') ?>
        <main class="column">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <div class="title">
                            Current Submissions for <?= $assignment['Title'] ?>
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
            <div class="level">
                <div class="level-right">
                    <div class="level-item">

                    </div>
                </div>
            </div>
            <div class="level">
                <table class="table is-striped is-hoverable is-fullwidth">
                    <thead>
                    <tr>
                        <th class="is-10">Name</th>
                        <th class="is-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($submissions as $submission): ?>
                        <tr>
                            <td>
                                Student:
                                <strong><?= $submission['FirstName'] . " " . $submission['LastName'] ?></strong>
                                (<a href="mailto:<?= $submission['Email'] ?>">Send mail</a>)
                                <br/>
                                <br/>
                                <a href="mailto:<?= $submission['SubmissionFile'] ?>">Click here to see the
                                    submission</a>
                                <br/>
                            </td>
                            <td>
                                <?php if ($submission['Grade'] !== null): ?>
                                    Grade : <?= $submission['Grade'] ?>
                                    <br/>
                                    Feedback Provided : <?= $submission['Feedback'] ?>
                                <?php else: ?>
                                    <form action="/submissions/<?= $submission['SubmissionID'] ?>/qualify"
                                          method="POST">

                                        <!-- Grade Field -->
                                        <div class="field">
                                            <label class="label" for="Grade">Grade</label>
                                            <div class="control">
                                                <input type="text" class="input" id="Grade" name="Grade"
                                                       placeholder="Enter grade" required>
                                            </div>
                                        </div>

                                        <!-- Feedback Field -->
                                        <div class="field">
                                            <label class="label" for="Feedback">Feedback</label>
                                            <div class="control">
                                            <textarea class="textarea" id="Feedback" name="Feedback"
                                                      placeholder="Enter feedback" required></textarea>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="control">
                                                <button class="button is-primary" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
</body>
</html>