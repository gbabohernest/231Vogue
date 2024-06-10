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
                        <a href="/category/create">
                            <button class="add-record-btn" ><i class="fa-solid fa-plus"></i>Add
                                Category
                            </button>
                        </a>

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
                                <a href="/category/edit?category_id=<?=$category['category_id']?>">
                                    <button class="edit-btn" >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit
                                    </button>
                                </a>


                                <form action="/category" method="POST" class="action-btn-admin">
                                    <input type="hidden" name="__request_method" value="DELETE">
                                    <input type="hidden" name="id" value="<?=$category['category_id']?>">

                                    <button class="delete-btn">
                                        <i class="fa-solid fa-trash-can"></i>
                                        Delete
                                    </button>
                                </form>
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

        </main>


    </div>

</section>

<?php view('partials/admin-partials/layouts/footer.php') ?>
