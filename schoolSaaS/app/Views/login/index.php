<?= view('_layout/header') ?>
<body>
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-4">
                <h1 class="title has-text-centered">Login</h1>
                <form action="/login" method="POST">

                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control has-icons-left">
                            <input class="input" type="email" name="email" placeholder="Enter your email" required>
                            <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control has-icons-left">
                            <input class="input" type="password" name="password" placeholder="Enter your password"
                                   required>
                            <span class="icon is-small is-left">
                  <i class="fas fa-lock"></i>
                </span>
                        </div>
                    </div>
                    <?php if (session()->getFlashdata('loginMsg')): ?>
                        <div class="message">
                            <div class="message-body">
                                <?= session()->getFlashdata('loginMsg'); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="field">
                        <div class="control">
                            <button class="button is-primary is-fullwidth">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>