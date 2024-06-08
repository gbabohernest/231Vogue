<?php view('partials/head.php'); ?>

<section class="admin">

    <!-- Admin Navigation Here-->
    <?php view('partials/admin-partials/nav.php') ?>

    <div class="admin__container">
        <!-- Sidebar Navigation Here -->
        <?php view('partials/admin-partials/sidebar.php'); ?>


        <main class="admin__container--main-content">
            <header class="page-header">
                <h1>Categories</h1>
                <div class="divider"></div>
            </header>

            <section class="record-section">
                <div class="section-header">
                    <h2>Categories list</h2>
                    <div class="section-actions">
                        <button class="filter-btn"><i class="fa-solid fa-filter"></i>Filter</button>
                        <button class="see-all-btn">See All</button>
                        <button class="add-record-btn" data-modal-type="category"><i class="fa-solid fa-plus"></i>Add
                            Category
                        </button>
                    </div>
                </div>

                <div class="divider"></div>


                <table class="record-table">
                    <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th class="center-th">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($categories as $category) : ?>
                        <tr>
                            <td><?= $category['category_name'] ?></td>
                            <td><?= $category['description'] ?></td>
                            <td><?php if ($category['is_active']) : ?>
                                    <?= "<span class='active-column'>Active</span> " ?>
                                <?php else : ?>
                                    <?= "<span class='not-active-column'>Not Active</span> " ?>
                                <?php endif; ?>
                            </td>
                            <td class="center-td">
                                <button class="edit-btn" data-modal-type="category">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </button>
                                <button class="delete-btn" data-modal-type="category">
                                    <i class="fa-solid fa-trash-can"></i>
                                    Delete
                                </button>
                            </td>
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

            <!-- A model for creating category -->
            <?php view('admin/category/create.view.php'); ?>

            <!-- A model for editing category -->
            <?php view('admin/category/edit.view.php'); ?>
        </main>


    </div>

</section>

<?php view('partials/admin-partials/layouts/footer.php') ?>
