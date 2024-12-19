<?php
// Initializing variables for testing running
if (!isset($course)){
    $course['Name'] = 'Course Test';
    $course['CourseID'] = '1';
}
if (!isset($assignments)){
    $assignments = [
            ['id' => 1, '1' => 101, 'name' => 'Assignment 1'],
            ['id' => 2, '1' => 101, 'name' => 'Assignment 2']
        ];
}
?>
<?= view('_layout/header') ?>

<div class="section">
    <div class="columns">
        <?= view('_layout/sidebar') ?>
        <main class="column">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <div class="title">
                            Assignments for <?= $course['Name']?>
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
                        <a href="/courses/<?= $course['CourseID']?>/assignments/new">
                            <button class="button is-primary">Create a new Assignment</button>
                        </a>
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
                                <strong><?= $assignment['Title']?></strong>
                                <br/>
                                <br/>
                                Description: <br/>
                                <?= $assignment['Description']?>
                                <br/>
                                <br/>
                                Due Date: <br/>
                                <?= date('m-d-Y', strtotime($assignment['DueDate']))?>
                            </td>
                            <td>
                                <a href="/courses/<?= $assignment['CourseID']?>/assignments/<?= $assignment['AssignmentID']?>">
                                    <button class="button is-info">Update</button>
                                </a>
                                <br/>
                                <br/>
                                <a href="/courses/<?= $assignment['CourseID']?>/assignments/<?= $assignment['AssignmentID']?>/submissions">
                                    <button class="button is-link">See Submissions</button>
                                </a>
                                <br/>
                                <br/>
                                <a href="/courses/<?= $assignment['CourseID']?>/assignments/<?= $assignment['AssignmentID']?>/delete">
                                    <button class="button is-danger">Delete</button>
                                </a>
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