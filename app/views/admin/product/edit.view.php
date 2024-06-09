<?php

view('partials/head.php');
$sub_categories = require base_path('app/controllers/admin-controllers/functions/get_sub-categories.php');
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
                    <a href="/dashboard/products">

                        <span class="close-modal-btn"><i class="fa-solid fa-xmark"></i></span>
                    </a>


                    <form action="/product" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="__request_method" value="PATCH">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name"
                                <?php if (isset($product['product_name'])) : ?>
                                    value="<?= htmlspecialchars($product['product_name']); ?>"
                                <?php else: ?>
                                    value="<?= htmlspecialchars($_SESSION['form_data']['name']) ?>"
                                <?php endif; ?>
                                   placeholder="Product name">

                            <?php if (isset($errors['product_name'])): ?>
                                <span class="error"><?= $errors['product_name'] ?></span>

                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="category">Sub-category</label>
                            <select name="category" id="category">
                                <!-- dynamically load category from db -->
                                <option value="">select a sub-category</option>

                                <?php foreach ($sub_categories as $sub_category) : ?>
                                    <?php
                                    $selected_category = $_SESSION['form_data']['category'] ?? $product['sub_category_id'] ?? '';
                                    $is_selected = $sub_category['sub_category_id'] == $selected_category ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $sub_category['sub_category_id']; ?>" <?php echo $is_selected; ?>>
                                        <?php echo htmlspecialchars($sub_category['sub_category_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($errors['category'])): ?>
                                <span class="error"><?= $errors['category'] ?></span>

                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" id="price" name="price"

                                <?php if (isset($product['price'])) : ?>
                                    value="<?= htmlspecialchars($product['price']); ?>"

                                <?php else: ?>

                                    value="<?= htmlspecialchars($_SESSION['form_data']['price']) ?>"
                                <?php endif; ?>

                                   placeholder="price">

                            <?php if (isset($errors['price'])): ?>
                                <span class="error"><?= $errors['price'] ?></span>

                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description"
                                      placeholder="What product is it?"><?= htmlspecialchars($product['description'] ?? $_SESSION['form_data']['description']) ?></textarea>
                            <?php if (isset($errors['description'])): ?>
                                <span class="error"><?= $errors['description'] ?></span>
                            <?php endif; ?>

                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status">
                                <option value="">select a status</option>

                                <?php
                                $selected_status = $_SESSION['form_data']['status'] ?? ($product['status'] ?? '');
                                ?>
                                <option value="active" <?php echo ($selected_status === 'active' || $selected_status == 1) ? 'selected' : ''; ?>>
                                    Active
                                </option>
                                <option value="disabled" <?php echo ($selected_status === 'disabled' || $selected_status == 0) ? 'selected' : ''; ?>>
                                    Disabled
                                </option>


                            </select>
                            <?php if (isset($errors['status'])): ?>
                                <span class="error"><?= $errors['status'] ?></span>

                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="image">Product Image</label>
                            <input type="file" id="image" name="image" placeholder="product image">

                            <input type="hidden" name="current_image_path"
                                   value="<?php echo htmlspecialchars($product['image_path']); ?>">

                        </div>

                        <input type="hidden" name="id" value="<?= htmlspecialchars($product['product_id']) ?>">
                        <button type="submit" class="submit-product-btn create-product-btn"> Update Product</button>
                    </form>
                </div>
            </section>

        </div>
    </main>
</section>




