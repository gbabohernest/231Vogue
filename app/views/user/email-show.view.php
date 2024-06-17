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
                    <div class="context">
                        <h4>Current Email Address</h4>
                        <span>Active</span>
                        <p class="instruction">This is the current email associated with your profile.<br> If you want
                            to change it, click on the button below</p>
                    </div>

                    <div class="profile-details-user-info">

                        <form class="form">

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email"
                                       id="email"
                                       disabled="disabled"
                                       value="<?= htmlspecialchars($user['email']); ?>"
                                />
                            </div>

                            <a href="/email/edit" class="submit-btn">Edit Email</a>
                        </form>


                    </div>

                </div>

            </div>

        </div>
    </section>

<?php view('user/footer.view.php'); ?>