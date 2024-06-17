<?php
view('partials/head.php');

$data = $user; ?>


<section class="account-management">
    <div class="account-wrapper" id="basic-details-show">

        <div class="account-information-wrapper">
            <!--  remove not unique content from here              -->
            <?php view('user/partials/profile-actions-nav.view.php', [
                'user' => $data
            ]) ?>
            <!--     remove not unique content end here       -->

            <div class="profile-details-section">
                <div class="profile-handler">
                    <h4>Profile Details</h4>
                    <a href="/basic-details/edit">Edit Profile</a>
                </div>

                <div class="profile-details-user-info">
                    <div>
                        <span>First Name</span>
                        <p><?= $user['first_name'] ?></p>
                        <div class="divider"></div>
                    </div>

                    <div>
                        <span>Last Name</span>
                        <p><?= $user['last_name'] ?></p>
                        <div class="divider"></div>
                    </div>

                    <div>
                        <span>email</span>
                        <p><?= $user['email'] ?></p>
                        <div class="divider"></div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

<?php view('user/footer.view.php'); ?>
