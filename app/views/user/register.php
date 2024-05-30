<?php require view('partials/head.php'); ?>

    <section class="form-container">

        <div class="form-container__wrapper">
            <h2>Create an account </h2>

            <a href="/login" class="login-instead">
                Already have an account?
                <span>Log in instead!</span>
            </a>

            <form action="" class="form" id="signUpForm">

                <div class="form-group">
                    <label for="firstName">FirstName</label>
                    <input type="text"
                           id="firstName"
                           name="first_name"
                           placeholder="First Name"
                           required/>
                </div>

                <div class="form-group">
                    <label for="lastName">LastName</label>
                    <input type="text"
                           id="lastName"
                           name="last_name"
                           placeholder="Last Name"
                           required/>
                </div>

                <div class="form-group">
                    <label for="signUpEmail">Email</label>
                    <input type="email"
                           id="signUpEmail"
                           name="signup_email"
                           placeholder="Email"
                           required/>
                </div>

                <div class="form-group">
                    <label for="signupPassword">Password</label>
                    <div class="password-wrapper">
                        <input
                                type="password"
                                id="signupPassword"
                                name="signup_password"
                                placeholder="Password"/>

                        <span class="eye-icon">
                        <i class="fa-solid fa-eye-slash close-eye"></i>
                        <i class="fa-solid fa-eye open-eye hide-eye"></i>
                    </span>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Register</button>

            </form>
        </div>
    </section>


<?php require view('partials/user-partials/footer.php'); ?>