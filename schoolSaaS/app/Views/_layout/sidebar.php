<aside class="column is-2">
    <nav class="menu is-light">
        <section>
            Hello, <?= session('user_name') ?>
        </section>
        <br/>
        <?php if (session('role') === 'Admin'): ?>
            <section>
                <ul class="menu-list">
                    <li><a href="/schools">Schools</a></li>
                    <li><a href="/users">Users</a></li>
                </ul>
            </section>
        <?php endif; ?>
        <?php if (session('role') === 'Teacher'): ?>
            <section>
                <ul class="menu-list">
                    <li><a href="/courses">Courses</a></li>
                    <li><a href="/students">Students</a></li>
                </ul>
            </section>
        <?php endif; ?>
        <?php if (session('role') === 'Student'): ?>
            <section>
                <ul class="menu-list">
                    <li><a href="/assignments">My Assignments</a></li>
                    <!--<li><a href="/parents">Users</a></li>-->
                </ul>
            </section>
        <?php endif; ?>
        <?php if (session('role') === 'Parent'): ?>
           <!-- <section>
                <ul class="menu-list">
                    <li><a href="#">Schools</a></li>
                    <li><a href="#">Users</a></li>
                </ul>
            </section>-->
        <?php endif; ?>
        <br/>
        <section>
            <a href="/logout">Logout</a>
        </section>

    </nav>
</aside>