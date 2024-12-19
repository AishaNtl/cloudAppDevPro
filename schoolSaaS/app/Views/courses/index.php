<?= view('_layout/header') ?>

<div class="section">
    <div class="columns">
        <?= view('_layout/sidebar') ?>
        <main class="column">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <div class="title">
                            Courses
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
                        <a href="/courses/new">
                            <button class="button is-primary">Create a new Course</button>
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
                    <?php foreach ($courses as $course): ?>
                        <tr>
                            <td>
                                <strong><?= $course['Name']?></strong>
                                <br/>
                                School: <?= $course['SchoolFullName']?>
                            </td>
                            <td>
                                <a href="/courses/edit/<?= $course['CourseID']?>">
                                    <button class="button is-info">Update</button>
                                </a>
                                <br/>
                                <br/>
                                <a href="/courses/<?= $course['CourseID']?>/assignments">
                                    <button class="button is-link">See Assignments</button>
                                </a>
                                <br/>
                                <br/>
                                <a href="/courses/delete/<?= $course['CourseID']?>">
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