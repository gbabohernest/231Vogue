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
                    <a href="/dashboard/categories">

                        <span class="close-modal-btn"><i class="fa-solid fa-xmark"></i></span>
                    </a>


                    <form action="/category" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name"
                                   value="<?= htmlspecialchars($_POST['name'] ?? ''); ?>"
                                   placeholder="Category name">

                            <?php if (isset($errors['category_name'])): ?>
                                <span class="error"><?= $errors['category_name'] ?></span>

                            <?php endif; ?>
                        </div>


                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description"
                                      placeholder="Describe the category a bit..."><?= htmlspecialchars($_POST['description']); ?></textarea>

                            <?php if (isset($errors['description'])): ?>
                                <span class="error"><?= $errors['description'] ?></span>

                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status">
                                <option value="">select a status</option>
                                <option value="active" <?= (isset($_POST['status']) && $_POST['status'] == 'active') ? 'selected' : '' ?>>
                                    Active
                                </option>
                                <option value="disable" <?= (isset($_POST['status']) && $_POST['status'] == 'disable') ? 'selected' : '' ?>>
                                    Disabled
                                </option>
                            </select>
                            <?php if (isset($errors['status'])): ?>
                                <span class="error"><?= $errors['status'] ?></span>

                            <?php endif; ?>
                        </div>

                        <button type="submit" class="submit-product-btn create-product-btn"> Add Category</button>
                    </form>
                </div>
            </section>


        </div>


    </main>


</section>

