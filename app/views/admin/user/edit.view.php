<?php view('partials/head.php'); ?>

<section class="admin">

    <!-- Admin Navigation Here-->
    <?php view('partials/admin-partials/nav.php') ?>


    <main class="admin__container">

        <!-- Sidebar Navigation Here -->
        <?php view('partials/admin-partials/sidebar.php'); ?>

        <div class="admin__container--main-content">


            <section class="modal">
                <div class="modal-content">

                    <a href="/dashboard/users">
                        <span class="close-modal-btn"><i class="fa-solid fa-xmark"></i></span>
                    </a>


                    <form action="/user" method="POST">
                        <input type="hidden" name="__request_method" value="PATCH">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name"

                                <?php if (isset($user['first_name'])) : ?>
                                    value="<?= htmlspecialchars($user['first_name']); ?>"
                                <?php else: ?>
                                    value="<?= htmlspecialchars($_SESSION['form_data']['first_name']) ?>"
                                <?php endif; ?>

                                   placeholder="last name">

                            <?php if (isset($errors['first_name'])): ?>
                                <span class="error"><?= $errors['first_name'] ?></span>

                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name"


                                <?php if (isset($user['last_name'])) : ?>
                                    value="<?= htmlspecialchars($user['last_name']); ?>"
                                <?php else: ?>
                                    value="<?= htmlspecialchars($_SESSION['form_data']['last_name']) ?>"
                                <?php endif; ?>

                                   placeholder="Last name">

                            <?php if (isset($errors['last_name'])): ?>
                                <span class="error"><?= $errors['last_name'] ?></span>

                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email"

                                <?php if (isset($user['email'])) : ?>
                                    value="<?= htmlspecialchars($user['email']); ?>"
                                <?php else: ?>
                                    value="<?= htmlspecialchars($_SESSION['form_data']['email']) ?>"
                                <?php endif; ?>

                                   placeholder="email">

                            <?php if (isset($errors['email'])): ?>
                                <span class="error"><?= $errors['email'] ?></span>

                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password">

                            <?php if (isset($errors['password'])): ?>
                                <span class="error"><?= $errors['password'] ?></span>

                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="is_admin" id="role" required>
                                <option value="">select user role</option>
                                <option value="user"
                                    <?= (isset($user['is_admin']) && $user['is_admin'] == 0) || (isset($_SESSION['form_data']['is_admin']) && $_SESSION['form_data']['is_admin'] == 'user') ? 'selected' : ''; ?>
                                >User
                                </option>

                                <option value="admin"
                                    <?= (isset($user['is_admin']) && $user['is_admin'] == 1) || (isset($_SESSION['form_data']['is_admin']) && $_SESSION['form_data']['is_admin'] == 'admin') ? 'selected' : ''; ?>
                                >Admin
                                </option>
                            </select>


                            <?php if (isset($errors['role'])) : ?>
                                <p class="error"><?= $errors['role']; ?></p>
                            <?php endif; ?>


                        </div>

                        <input type="hidden" name='id' value="<?= $user['user_id'] ?>">
                        <button type="submit" class="submit-product-btn create-product-btn"> Update User</button>
                    </form>
                </div>
            </section>

        </div>
    </main>

</section>
