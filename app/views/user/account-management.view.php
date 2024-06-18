<?php
view('partials/head.php');
?>


<section class="account-management">
    <div class="account-wrapper">
        <div class="logo">
            <?php view('partials/logo.php') ?>
            <h4>Hello <?= $user['first_name'] . ' ' . $user['last_name']; ?></h4>
        </div>


        <div class="account-information-wrapper">


            <div class="profile-details">
                <table>
                    <thead>
                    <tr>
                        <td><i class="fa-solid fa-user"></i><span>Profile Details</span></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div>
                                <a href="/basic-details/show">Basic Details</a>
                            </div>
                            <div>
                                <a href="email/show">Edit Email Address</a>
                            </div>

                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>


            <div class="security">
                <table>
                    <thead>
                    <tr>
                        <td><i class="fa-solid fa-lock"></i><span>Security Settings</span></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div>
                                <a href="/change-password/show">Change Password</a>
                            </div>
                            <div>
                                <a href="#" class="delete-acc">Delete Account</a>
                            </div>

                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</section>
