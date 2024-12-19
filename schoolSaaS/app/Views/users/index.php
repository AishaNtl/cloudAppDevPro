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
            <div class="level">
                <div class="level-right">
                    <div class="level-item">
                        <a href="/users/new">
                            <button class="button is-primary">Create a new User</button>
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
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td>
                                <strong><?= $user['FirstName'], " ", $user['LastName'] ?></strong>
                                <br/>
                                <?= $user['Email']?>
                                <br/>
                                Updated: <?= $user['UpdatedAt']?>
                                <br/>
                                Created: <?= $user['CreatedAt']?>
                            </td>
                            <td>
                                <a href="/users/edit/<?= $user['UserID']?>">
                                    <button class="button is-info">Update</button>
                                </a>
                                <br/>
                                <br/>
                                <?php if (session('user_id') !== $user['UserID']):?>
                                <a href="/users/delete/<?= $user['UserID']?>">
                                    <button class="button is-danger">Delete</button>
                                </a>
                                <?php endif;?>

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