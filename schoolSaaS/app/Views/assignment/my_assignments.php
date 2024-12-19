<?= view('_layout/header') ?>

<div class="section">
    <div class="columns">
        <?= view('_layout/sidebar') ?>
        <main class="column">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <div class="title">
                            My Assignments
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
                <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                    <thead>
                    <tr>
                        <th class="is-10">Name</th>
                        <th class="is-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($assignments as $assignment): ?>
                    <tr>
                        <td>
                            <strong> <?= $assignment['SubmissionStatus'] ?> - <?= $assignment['Title'] ?></strong>
                            <br/>
                            <br/>
                            Description: <br/>
                            <?= $assignment['Description'] ?>
                            <br/>
                            <br/>
                            Due Date: <br/>
                            <?= date('m-d-Y', strtotime($assignment['DueDate'])) ?>
                            <br/>
                        </td>
                        <td>
                            <?php if ($assignment['SubmissionStatus'] === 'Pending') : ?>
                                <form action="/submission/<?= $assignment['AssignmentID'] ?>/new/" method="post">
                                    <div class="field">
                                        <label class="label" for="SubmissionFile">Link:</label>
                                        <div class="control">
                                            <input class="input" type="text" id="SubmissionFile"
                                                   name="SubmissionFile"
                                                   placeholder="Input the link to the file" required>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <button class="button is-primary is-fullwidth" type="submit">Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            <?php elseif ($assignment['SubmissionStatus'] === 'Sent') : ?>
                            <?php if ($assignment['Grade'] !== NULL) : ?>
                                The Grade is: <?= $assignment['Grade'] ?>
                                <br/>
                                The Feedback is: <?= $assignment['Feedback'] ?>
                                <?php else : ?>
                                There is not feedback yet
                                <?php endif; ?>

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