<?php view('partials/head.php'); ?>


<section class="admin">

    <!-- Admin Navigation Here-->
    <?php view('partials/admin-partials/nav.php') ?>

    <div class="admin__container">
        <!-- Sidebar Navigation Here -->
        <?php view('partials/admin-partials/sidebar.php'); ?>


        <main class="admin__container--main-content">
            <header class="page-header">
                <h1>Products</h1>
                <div class="divider"></div>
            </header>

            <section class="record-section">
                <div class="section-header">
                    <h2>Products list</h2>
                    <div class="section-actions">
                        <button class="filter-btn"><i class="fa-solid fa-filter"></i>Filter</button>
                        <button class="see-all-btn">See All</button>
                        <button class="add-record-btn" data-modal-type="product"><i class="fa-solid fa-plus"></i>Add
                            Product
                        </button>
                    </div>
                </div>

                <div class="divider"></div>


                <table class="record-table">
                    <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Sub-category</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th class="center-th">Action</th>
                        <th>Date Posted</th>
                    </tr>
                    </thead>

                    <tbody>


                    <?php foreach ($products as $product) : ?>

                        <tr>
                            <td><?= $product['image'] ?? 'No image Now' ?></td>
                            <td><?= $product['product_name'] ?></td>
                            <td><?= $product['sub_category_name'] ?></td>

                            <td><?= $product['price'] ?></td>
                            <td><?= $product['description'] ?></td>
                            <td> <?= $product['status'] ? 'Active' : 'Not Active'; ?></td>
                            <td class="center-td">
                                <button class="edit-btn" data-modal-type="product">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </button>
                                <button class="delete-btn" data-modal-type="product">
                                    <i class="fa-solid fa-trash-can"></i>
                                    Delete
                                </button>
                            </td>
                            <td><?= date('j-M-Y, H:i', $products['created_at']); ?></td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>
                </table>

                <!-- pagination buttons -->
                <div class="pagination">
                    <button><i class="fa-solid fa-left-long prev"></i>Previous</button>
                    <button>Next <i class="fa-solid fa-right-long next"></i></button>
                </div>
            </section>

            <!-- A model for creating product -->
            <?php view('admin/product/create.view.php'); ?>

            <!-- A model for editing product -->
            <?php view('admin/product/edit.view.php'); ?>
        </main>


    </div>

</section>

<?php view('partials/admin-partials/layouts/footer.php') ?>
