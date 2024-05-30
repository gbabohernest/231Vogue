<?php require view('partials/head.php'); ?>
<section class="form-container">

    <div class="form-container__wrapper">
        <h2>Log in to your account </h2>

        <form action="" class="form" id="loginForm">
            <div class="form-group">
                <label for="loginEmail">Email</label>
                <input type="email" id="loginEmail" name="email" placeholder="Email" required/>

            </div>

            <div class="form-group">
                <label for="loginPassword">Password</label>
                <div class="password-wrapper">
                    <input
                            type="password"
                            id="loginPassword"
                            name="password"
                            placeholder="Password"/>

                    <span class="eye-icon">
                            <i class="fa-solid fa-eye-slash close-eye"></i>
                            <i class="fa-solid fa-eye open-eye hide-eye"></i>
                    </span>
                </div>
            </div>

            <a href="#" class="forgot-password">Forgot your password</a>
            <button type="submit" class="submit-btn">Sign In</button>
            <div class="divider"></div>
            <a href="/register" class="create-account">No account? Create one here</a>

        </form>
    </div>

</section>


<?php require view('partials/user-partials/footer.php'); ?>

