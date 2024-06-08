<?php view('partials/head.php'); ?>

<section class="admin">

    <!-- Admin Navigation Here-->
    <?php view('partials/admin-partials/nav.php') ?>

    <div class="admin__container">
        <!-- Sidebar Navigation Here -->
        <?php view('partials/admin-partials/sidebar.php'); ?>

        <main class="admin__container--main-content">
            <header class="page-header">
                <h1>Users</h1>
                <div class="divider"></div>
            </header>

            <section class="record-section">
                <div class="section-header">
                    <h2>Users list</h2>
                    <div class="section-actions">
                        <button class="filter-btn"><i class="fa-solid fa-filter"></i>Filter</button>
                        <button class="see-all-btn">See All</button>
                        <button class="add-record-btn" data-modal-type="user"><i class="fa-solid fa-plus"></i>Add User
                        </button>
                    </div>
                </div>

                <div class="divider"></div>


                <table class="record-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="center-th">Action</th>
                        <th>Date Registered</th>
                    </tr>
                    </thead>

                    <tbody>


                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user['first_name'] . ' ' . $user['last_name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['is_admin'] ? "<span class='admin-column'>Admin</span>" : "<span class='user-column'>User</span>" ?></td>
                            <td class="center-td">
                                <button class="edit-btn" data-modal-type="user">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </button>
                                <button class="delete-btn" data-modal-type="user">
                                    <i class="fa-solid fa-trash-can"></i>
                                    Delete
                                </button>
                            </td>
                            <td>
                                <?php
                                echo date('j-M-Y, H:i', strtotime($user['created_at']));; ?>
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

            <!-- A model for creating user -->
            <?php view('admin/user/create.view.php'); ?>

            <!-- A model for editing user -->
            <?php view('admin/user/edit.view.php'); ?>
        </main>


    </div>

</section>

<?php view('partials/admin-partials/layouts/footer.php') ?>
