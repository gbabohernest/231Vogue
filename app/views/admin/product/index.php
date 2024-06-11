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
                        <a href="/product/create">
                            <button class="add-record-btn" data-modal-type="product"><i class="fa-solid fa-plus"></i>
                                Add
                                Product
                            </button>

                        </a>
                    </div>
                </div>

                <div class="divider"></div>


                <table class="record-table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
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
                            <td><img src="/<?php echo (htmlspecialchars($product['image_path'])); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>"  style="max-width:200px;"></td>
                            <td><?= $product['product_name'] ?></td>
                            <td><?= $product['sub_category_name'] ?></td>

                            <td><?= $product['price'] ?></td>
                            <td><?= $product['description'] ?></td>
                            <td> <?= $product['status'] ? "<span class='active-column'>Active</span>" : "<span class='not-active-colum'>Not Active</span>"; ?></td>
                            <td class="center-td">
                                <a href="/product/edit?product_id=<?= $product['product_id'] ?>">
                                    <button class="edit-btn">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit
                                    </button>
                                </a>


                                <form action="/product" method="POST" class="action-btn-admin">
                                    <input type="hidden" name="__request_method" value="DELETE">
                                    <input type="hidden" name="id" value="<?= $product['product_id'] ?>">

                                    <button class="delete-btn">
                                        <i class="fa-solid fa-trash-can"></i>
                                        Delete
                                    </button>
                                </form>
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

        </main>


    </div>

</section>

<?php view('partials/admin-partials/layouts/footer.php') ?>
