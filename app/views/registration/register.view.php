<?php view('partials/head.php'); ?>


<section class="form-container">

    <div class="form-container__wrapper">
        <h2>Create an account </h2>

        <span class="login-instead">Already have an account?
         <a href="/login">LogIn here</a>
        </span>


        <form action="/register" class="form" id="signUpForm" method="POST">
            <div class="form-group">
                <label for="firstName">FirstName</label>
                <input type="text"
                       id="firstName"
                       name="first_name"
                       placeholder="First Name"
                       value="<?= htmlspecialchars($_POST['first_name']) ?? ''; ?>"
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
                       value="<?= htmlspecialchars($_POST['last_name']) ?? ''; ?>"
                />

                <?php if (isset($errors['last_name'])) : ?>
                    <p class="error"><?= $errors['last_name']; ?></p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email"
                       id="email"
                       name="email"
                       placeholder="Email"
                       value="<?= htmlspecialchars($_POST['email']) ?? ''; ?>"
                />
                <?php if (isset($errors['email'])) : ?>
                    <p class="error"><?= $errors['email']; ?></p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Password"/>

                    <span class="eye-icon">
                        <i class="fa-solid fa-eye-slash close-eye"></i>
                        <i class="fa-solid fa-eye open-eye hide-eye"></i>
                    </span>
                    <?php if (isset($errors['password'])) : ?>
                        <p class="error"><?= $errors['password']; ?></p>
                    <?php endif; ?>
                </div>
            </div>


            <button type="submit" class="submit-btn">Register</button>

        </form>
    </div>
</section>


<?php view('partials/user-partials/footer.php'); ?>
