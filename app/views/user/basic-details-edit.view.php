<?php
view('partials/head.php');
$data = $user; ?>

    <section class="account-management">
        <div class="account-wrapper" id="basic-details-show">

            <div class="account-information-wrapper">

                <?php view('user/partials/profile-actions-nav.view.php', [
                    'user' => $data
                ]) ?>


                <div class="profile-details-section">
                    <div class="profile-handler">
                        <h4 class="edit-view-heading">Profile Details</h4>
                    </div>

                    <div class="profile-details-user-info">

                        <form action="/basic-details" class="form" id="signUpForm" method="POST">
                            <input type="hidden" name="__request_method" value="PATCH">

                            <div class="form-group">
                                <label for="firstName">FirstName</label>
                                <input type="text"
                                       id="firstName"
                                       name="first_name"
                                       placeholder="First Name"
                                    <?php if ($user['first_name']) : ?>
                                        value="<?= htmlspecialchars($user['first_name']); ?>"
                                    <?php else : ?>
                                        value="<?= htmlspecialchars($_POST['first_name']) ?? ''; ?>"
                                    <?php endif; ?>
                                />
                                <?php if (isset($errors['first_name'])) : ?>
                                    <p class="error"><?= $errors['first_name']; ?></p>
                                <?php endif; ?>
                            </div>


                            <div class="form-group">
                                <label for="lastName">LastName</label>
                                <input type="text"
                                       id="lastName"
                                       name="last_name"
                                       placeholder="Last Name"
                                    <?php if ($user['last_name']) : ?>
                                        value="<?= htmlspecialchars($user['last_name']); ?>"
                                    <?php else : ?>
                                        value="<?= htmlspecialchars($_POST['last_name']) ?? ''; ?>"
                                    <?php endif; ?>
                                />

                                <?php if (isset($errors['last_name'])) : ?>
                                    <p class="error"><?= $errors['last_name']; ?></p>
                                <?php endif; ?>
                            </div>


                            <button type="submit" class="submit-btn">Save</button>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </section>

<?php view('user/footer.view.php'); ?>