<?= view('_layout/header') ?>

<div class="section">
    <div class="columns">
        <?= view('_layout/sidebar') ?>
        <main class="column">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <div class="title">
                            Students in <?= $school['Name'] ?>
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
                        <a href="/students/new/<?= $school['SchoolID'] ?>">
                            <button class="button is-primary">Create student</button>
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
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td>
                                Name: <?= $student['FirstName']?>  <?= $student['LastName']?>
                                <br/>
                                Created: <?= $student['CreatedAt']?>
                            </td>
                            <td>
                                <a href="/students/<?= $school['SchoolID']?>/<?= $student['UserID']?>">
                                    <button class="button is-info">Update</button>
                                </a>
                                <br/>
                                <br/>
                                <a href="/student/<?= $school['SchoolID']?>/delete/<?= $student['UserID']?>">
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