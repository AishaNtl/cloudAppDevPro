<?= view('_layout/header') ?>

<div class="section">
    <div class="columns">
        <?= view('_layout/sidebar') ?>
        <main class="column">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <div class="title">
                            Schools
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
                        <a href="/schools/new">
                            <button class="button is-primary">Create a new Scool</button>
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
                    <?php foreach ($schools as $school): ?>
                        <tr>
                            <td>
                                <strong><?= $school['Name']?></strong>
                                <br/>
                                <?= $school['Address']?>
                                <br/>
                                <?= $school['City']?>
                                <br/>
                                <?= $school['State']?>
                                <br/>
                                <?= $school['Country']?>
                                <br/>
                                Created: <?= $school['CreatedAt']?>
                            </td>
                            <td>
                                <a href="/schools/edit/<?= $school['SchoolID']?>">
                                    <button class="button is-info">Update</button>
                                </a>
                                <br/>
                                <br/>
                                <a href="/schools/<?= $school['SchoolID']?>/students">
                                    <button class="button is-link">See Students</button>
                                </a>
                                <br/>
                                <br/>
                                <a href="/schools/delete/<?= $school['SchoolID']?>">
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