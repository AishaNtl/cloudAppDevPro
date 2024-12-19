<?= view('_layout/header') ?>

<div class="section">
    <div class="columns">
        <?= view('_layout/sidebar') ?>
        <main class="column">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <div class="title">
                            Update School Information
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
                <form method="post" action="/schools/update/<?= $school['SchoolID']; ?>">
                    <?= csrf_field(); // CSRF token  ?>
                    <!-- Name -->
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input class="input" type="text" name="Name" value="<?= old('Name', $school['Name']); ?>"
                                   placeholder="Enter the school name" required>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="field">
                        <label class="label">Address</label>
                        <div class="control">
                            <input class="input" type="text" name="Address"
                                   value="<?= old('Address', $school['Address']); ?>"
                                   placeholder="Enter the school address" required>
                        </div>
                    </div>

                    <!-- City -->
                    <div class="field">
                        <label class="label">City</label>
                        <div class="control">
                            <input class="input" type="text" name="City" value="<?= old('City', $school['City']); ?>"
                                   placeholder="Enter the city" required>
                        </div>
                    </div>

                    <!-- State -->
                    <div class="field">
                        <label class="label">State</label>
                        <div class="control">
                            <input class="input" type="text" name="State" value="<?= old('State', $school['State']); ?>"
                                   placeholder="Enter the state" required>
                        </div>
                    </div>

                    <!-- Country -->
                    <div class="field">
                        <label class="label">Country</label>
                        <div class="control">
                            <input class="input" type="text" name="Country"
                                   value="<?= old('Country', $school['Country']); ?>" placeholder="Enter the country"
                                   required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

</body>
</html>
