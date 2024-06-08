<aside class="admin__container--sidebar hide-admin-sidebar">

    <nav class="admin__container--sidebar-nav">

        <div class="admin-nav-wrapper">

            <a href="/dashboard" class="<?= activeURL('/dashboard') ? 'active-url' : ''; ?>">
                <i class="fa-solid fa-grip"></i>
                Dashboard
            </a>


            <a href="/dashboard/products" class="<?= activeURL('/dashboard/products') ? 'active-url' : '';?>">
                <i class="fa-solid fa-genderless"></i>
                Products
            </a>


            <a href="/dashboard/categories" class="<?= activeURL('/dashboard/categories') ? 'active-url' : '';?>">
                <i class="fa-solid fa-list"></i>
                Categories
            </a>

            <a href="/dashboard/sub-categories" class="<?= activeURL('/dashboard/sub-categories') ? 'active-url' : '';?>">
                <i class="fa-solid fa-arrow-down-wide-short"></i>
                Sub-Categories
            </a>

            <a href="/dashboard/users" class="<?= activeURL('/dashboard/users') ? 'active-url' : '';?>">
                <i class="fa-solid fa-user-group"></i>
                Users
            </a>
        </div>


        <form action="/dashboard/destroy" method="POST">
            <input type="hidden" name="__request_method" value="DELETE">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <button class="admin-logout">Log out</button>

        </form>

    </nav>
</aside>