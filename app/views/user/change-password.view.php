<?php
view('partials/head.php');
$data = $user;
?>

    <section class="account-management">
        <div class="account-wrapper" id="basic-details-show">

            <div class="account-information-wrapper">


                <?php view('user/partials/profile-actions-nav.view.php', [
                    'user' => $user
                ]) ?>

                <div class="profile-details-section">

                    <div class="profile-details-user-info">

                        <form action="/change-password" class="form" id="loginForm" method="POST">
                            <input type="hidden" name="__request_method" value="PATCH">

                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="password-wrapper">
                                    <input
                                            type="password"
                                            id="password"
                                            name="current_password"
                                            placeholder="Current Password*"/>

                                    <span class="eye-icon">
                                        <i class="fa-solid fa-eye-slash close-eye"></i>
                                         <i class="fa-solid fa-eye open-eye hide-eye"></i>
                                    </span>
                                    <?php if (isset($errors['password'])) : ?>
                                        <p class="error"><?= $errors['password']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="password-wrapper">
                                    <input
                                            type="password"
                                            id="password"
                                            name="new_password"
                                            placeholder="New Password*"/>

                                    <span class="eye-icon">
                        <i class="fa-solid fa-eye-slash close-eye"></i>
                        <i class="fa-solid fa-eye open-eye hide-eye"></i>
                    </span>
                                    <?php if (isset($errors['new_password'])) : ?>
                                        <p class="error"><?= $errors['new_password']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

<!--                            --><?php //if (isset($errors['failed'])) : ?>
<!--                                <p class="error">--><?php //= $errors['failed']; ?><!--</p>-->
<!--                            --><?php //endif; ?>
                            <button type="submit" class="submit-btn">Update</button>

                        </form>


                    </div>

                </div>

            </div>

        </div>
    </section>

    <script src="/assets/js/user.js"></script>
<?php view('user/footer.view.php'); ?>