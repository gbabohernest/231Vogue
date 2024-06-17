<?php
view('partials/head.php');
$data = $user;
?>

    <section class="account-management">
        <div class="account-wrapper" id="basic-details-show">

            <div class="account-information-wrapper">


                <?php view('user/partials/profile-actions-nav.view.php', [
                    'user' => $data
                ]) ?>

                <div class="profile-details-section">
                    <div class="context">
                        <h4>New Email Address</h4>
                        <p class="instruction">A code will be sent to your inbox to verify your email address</p>
                    </div>

                    <div class="profile-details-user-info">

                        <form action="/email/edit" class="form" id="loginForm" method="POST">
                            <input type="hidden" name="__request_method" value="PATCH">
                            <div class="form-group">
                                <label for="update">Email</label>
                                <input type="email" id="update" name="email"
                                       value="<?= htmlspecialchars($_POST['email']) ?? ''; ?>"
                                       placeholder="Email"/>

                                <?php if (isset($errors['email'])) : ?>
                                    <p class="error"><?= $errors['email']; ?></p>
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="submit-btn">Verify</button>

                        </form>


                    </div>

                </div>

            </div>

        </div>
    </section>

<?php view('user/footer.view.php'); ?>