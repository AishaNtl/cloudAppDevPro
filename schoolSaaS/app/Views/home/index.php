<?= view('_layout/header') ?>

<div class="section">
    <div class="columns">
        <?= view('_layout/sidebar') ?>
        <main class="column">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <div class="title">Hello, <?= session()->get('user_name')?></div>
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
                As <?= session()->get('role')?>
                <!-- 'Admin','Teacher','Student','Parent' -->
                <?php if (session()->get('role') === 'Admin'):?>
                    you can control the schools inside the application
                <?php elseif (session()->get('role') === 'Teacher'):?>
                    you can control the groups and their students
                <?php elseif (session()->get('role') === 'Student'):?>
                    you can see your assignments and upload them
                <?php elseif (session()->get('role') === 'Parent'):?>
                    you can see your assignments and upload them
                <?php endif;?>
                 please select from the sidebar the module where you want to go
            </div>
        </main>
    </div>
</div>
</body>
</html>