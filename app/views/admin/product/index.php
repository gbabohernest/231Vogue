<?php require view('partials/head.php'); ?>

<section class="admin">

    <!-- Admin Navigation Here-->
    <?php require view('partials/admin-partials/nav.php') ?>

    <div class="admin__container">
        <!-- Sidebar Navigation Here -->
        <?php require view('partials/admin-partials/sidebar.php'); ?>


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
                        <button class="add-record-btn" data-modal-type="product"><i class="fa-solid fa-plus"></i>Add Product</button>
                    </div>
                </div>

                <div class="divider"></div>


                <table class="record-table">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th class="center-th">Action</th>
                        <th>Date Posted</th>
                    </tr>
                    </thead>

                    <tbody>


                    <!-- More rows here, rows will be fetch form db -->
                    <tr>
                        <td>
                            <div class="record-name-wrapper">
                                <span><img src="/assets/images/products/fashion.png" alt="item image" class="record-image"></span>
                                Shoe
                            </div>

                        </td>

                        <td>Shoes</td>
                        <td>$20.99</td>
                        <td>Active</td>
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
                        <td>Monday 10, June 2014</td>
                    </tr>
                    <!-- More rows here, rows will be fetch form db -->

                    <!-- add one more row for demonstration purpose -->
                    <tr>
                        <td>
                            <div class="record-name-wrapper">
                                <span><img src="/assets/images/products/fashion.png" alt="item image" class="record-image"></span>
                                Shoe
                            </div>

                        </td>

                        <td>Shoes</td>
                        <td>$20.99</td>
                        <td>Active</td>
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
                        <td>Monday 10, June 2014</td>
                    </tr>

                    </tbody>
                </table>

                <!-- pagination buttons -->
                <div class="pagination">
                    <button ><i class="fa-solid fa-left-long prev"></i>Previous</button>
                    <button>Next <i class="fa-solid fa-right-long next"></i></button>
                </div>
            </section>

            <!-- A model for creating product -->
            <?php require view('admin/product/create.php');?>

            <!-- A model for editing product -->
            <?php require view('admin/product/edit.php');?>
        </main>


    </div>

</section>

<?php require view('partials/admin-partials/layouts/footer.php') ?>