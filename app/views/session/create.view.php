<?php view('partials/head.php'); ?>

<section class="form-container">

    <div class="form-container__wrapper">
        <h2>Log in to your account </h2>

        <form action="/session" class="form" id="loginForm" method="POST">
            <div class="form-group">
                <label for="loginEmail">Email</label>
                <input type="email" id="loginEmail" name="email"
                       value="<?= htmlspecialchars($_POST['email']) ?? '' ;?>"
                       placeholder="Email"/>

                <?php if( isset($errors['email']) ) :?>
                    <p class="error"><?= $errors['email'];?></p>
                <?php endif ; ?>
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
                    <?php if(isset($errors['password'])):?>
                        <p class="error"><?= $errors['password'];?></p>
                    <?php endif ;?>
                </div>
            </div>
            <?php if(isset($errors['fail-login'])) :?>
                <p class="error"><?= $errors['fail-login']; ?></p>
            <?php endif ;?>

            <span class="forgot-password">
                <a href="#">Forgot your password</a>
            </span>
            <button type="submit" class="submit-btn">Sign In</button>
            <div class="divider"></div>
            <span class="create-account">No account?
         <a href="/register">Create one here</a>
        </span>

        </form>
    </div>

</section>


<?php view('partials/user-partials/footer.php'); ?>

