<?php view('partials/head.php'); ?>


<section class="admin">

    <!-- Admin Navigation Here-->
    <?php view('partials/admin-partials/nav.php')?>

    <div class="admin__container">
        <!-- Sidebar Navigation Here -->
        <?php view('partials/admin-partials/sidebar.php');?>


        <main class="admin__container--main-content">
            <h1>Dashboard</h1>
            <div class="divider"></div>
            <div class="card-wrapper-admin">
                <h2>Overview</h2>

                <div class="stats">
                        <div class="card one">
                            <h3>Customers</h3>
                            <p>Total: 20,224</p>
                        </div>

                        <div class="card">
                            <h3>Products</h3>
                            <p>Total: 20,224</p>
                        </div>

                        <div class="card">
                            <h3>Categories</h3>
                            <p>Total: 6</p>
                        </div>

                </div>
            </div>

        </main>
    </div>
</section>

<?php view('partials/admin-partials/layouts/footer.php')?>