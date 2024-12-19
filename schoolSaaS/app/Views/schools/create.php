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
            <div class="level is-fullwidth">
                <form method="post" action="/schools/create">
                    <!-- Name -->
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input class="input" type="text" name="Name" placeholder="Enter your name" required>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="field">
                        <label class="label">Address</label>
                        <div class="control">
                            <input class="input" type="text" name="Address" placeholder="Enter your address" required>
                        </div>
                    </div>

                    <!-- City -->
                    <div class="field">
                        <label class="label">City</label>
                        <div class="control">
                            <input class="input" type="text" name="City" placeholder="Enter your city" required>
                        </div>
                    </div>

                    <!-- State -->
                    <div class="field">
                        <label class="label">State</label>
                        <div class="control">
                            <input class="input" type="text" name="State" placeholder="Enter your state" required>
                        </div>
                    </div>

                    <!-- Country -->
                    <div class="field">
                        <label class="label">Country</label>
                        <div class="control">
                            <input class="input" type="text" name="Country" placeholder="Enter your country" required>
                        </div>
                    </div>


                    <!-- Submit Button -->
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
</body>
</html>