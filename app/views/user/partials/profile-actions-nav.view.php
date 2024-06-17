<div class="profile-details">
    <div class="logo logo-wrapper">
        <?php view('partials/logo.php') ?>
        <h4>Hello <?= $user['first_name'] . ' ' . $user['last_name']; ?></h4>
    </div>

    <table>
        <thead class="th-basic-details">
        <tr class="show-user-drop-down profile">
            <td class="td-basic-details"><i class="fa-solid fa-user"></i><span>Profile Details</span>
            </td>
            <td class="chevron-icon">
                <i class="fa-solid fa-chevron-right"></i>
            </td>
        </tr>

        </thead>
        <tbody class="dropdown-profile-details" id="profile-drop">
        <tr>
            <td class="td-basic-details">
                <div>
                    <a href="/basic-details/show">Basic Details</a>
                </div>
                <div>
                    <a href="/email/show">Edit Email Address</a>
                </div>

            </td>

        </tr>
        </tbody>
    </table>


    <div class="security">
        <table>
            <thead class="th-basic-details">
            <tr class="show-user-drop-down security">
                <td class="td-basic-details">
                    <i class="fa-solid fa-lock"></i><span>Security Settings</span></td>

                <td class="chevron-icon">
                    <i class="fa-solid fa-chevron-right"></i>
                </td>
            </tr>
            </thead>
            <tbody class="dropdown-profile-details" id="security-drop">
            <tr>
                <td class="td-basic-details">
                    <div>
                        <a href="#">Change Password</a>
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