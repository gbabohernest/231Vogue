<?php view('partials/head.php');
$categories = require appUtilities('getCategories.php');
?>


<section class="admin">


    <!-- Admin Navigation Here-->
    <?php view('partials/admin-partials/nav.php') ?>

    <main class="admin__container">
        <!-- Sidebar Navigation Here -->
        <?php view('partials/admin-partials/sidebar.php'); ?>

        <div class="admin__container--main-content">


            <section class="modal">
                <div class="modal-content">

                    <a href="/dashboard/sub-categories">
                        <span class="close-modal-btn"><i class="fa-solid fa-xmark"></i></span>
                    </a>


                    <form action="/sub_category" method="POST">
                        <input type="hidden" name="__request_method" value="PATCH">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name"

                                <?php if (isset($sub_category['sub_category_name'])) : ?>
                                    value="<?= htmlspecialchars($sub_category['sub_category_name']); ?>"
                                <?php else: ?>
                                    value="<?= htmlspecialchars($_SESSION['form_data']['name']) ?>"
                                <?php endif; ?>

                                   placeholder="Sub-category name">

                            <?php if (isset($errors['sub_category_name'])): ?>
                                <span class="error"><?= $errors['sub_category_name'] ?></span>

                            <?php endif; ?>
                        </div>


                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description"
                                      placeholder="Describe the sub-category a bit..."><?= htmlspecialchars($sub_category['description'] ?? $_SESSION['form_data']['description']) ?></textarea>
                            <?php if (isset($errors['description'])): ?>
                                <span class="error"><?= $errors['description'] ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category">
                                <option value="">select a category</option>

                                <?php foreach ($categories as $category) : ?>

                                    <?php
                                    $selected_category = isset($_SESSION['form_data']['category']) ?: $sub_category['category_id'];
                                    $is_selected = $category['category_id'] == $selected_category ? 'selected' : '';
                                    ?>
                                    <option value="<?= $category['category_id'] ?>"
                                        <?= ($category['category_id'] == $selected_category) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($category['category_name']) ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>


                            <?php if (isset($errors['category'])): ?>
                                <span class="error"><?= $errors['category'] ?></span>


                            <?php endif; ?>
                        </div>


                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status">
                                <option value="">select status</option>
                                <option value="active"
                                    <?= ($sub_category['is_active'] == 1 || $_SESSION['form_data']['status'] == 'active') ? 'selected' : '' ?>
                                >Active
                                </option>

                                <option value="not active"
                                    <?= ($sub_category['is_active'] == 0 || $_SESSION['form_data']['status'] == 'not active') ? 'selected' : '' ?>
                                >Not Active
                                </option>
                            </select>

                            <?php if (isset($errors['status'])): ?>
                                <span class="error"><?= $errors['status'] ?></span>

                            <?php endif; ?>
                        </div>

                        <input type="hidden" name="id"
                               value="<?= htmlspecialchars($sub_category['sub_category_id']) ?>">
                        <button type="submit" class="submit-product-btn create-product-btn"> Update Sub-Category
                        </button>
                    </form>
                </div>
            </section>


        </div>


    </main>


</section>

