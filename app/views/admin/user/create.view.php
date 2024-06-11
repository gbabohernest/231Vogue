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
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name"
                                   value="<?= htmlspecialchars($_POST['first_name']) ?? ''; ?>"
                                   placeholder="Last name">

                            <?php if (isset($errors['first_name'])) : ?>
                                <p class="error"><?= $errors['first_name']; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name"
                                   value="<?= htmlspecialchars($_POST['last_name']) ?? ''; ?>"
                                   placeholder="Last name">

                            <?php if (isset($errors['last_name'])) : ?>
                                <p class="error"><?= $errors['last_name']; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email"
                                   value="<?= htmlspecialchars($_POST['email']) ?? ''; ?>"
                                   placeholder="email">

                            <?php if (isset($errors['email'])) : ?>
                                <p class="error"><?= $errors['email']; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password">


                            <?php if (isset($errors['password'])) : ?>
                                <p class="error"><?= $errors['password']; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="is_admin">Is Admin</label>
                            <select name="is_admin" id="is_admin" required>
                                <option value="">Select User Status</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>

                            <?php if (isset($errors['role'])) : ?>
                                <p class="error"><?= $errors['role']; ?></p>
                            <?php endif; ?>
                        </div>


                        <button type="submit" class="submit-product-btn create-product-btn"> Add User</button>
                    </form>
                </div>
            </section>

        </div>
    </main>

</section>
