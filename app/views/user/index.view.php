<section class="user_dashboard">
    <div class="user_dashboard__container">

        <aside class="">
            <nav class="admin__container--sidebar-nav">

                <div class="">

                    <a href="/customer/account/index"
                       class="<?= activeURL('/customer/account/index') ? 'active-url' : ''; ?>">
                        <i class="fa-solid fa-user"></i>
                        My 231Vouge Account
                    </a>


                    <a href="#" class="<?= activeURL('/something') ? 'active-url' : ''; ?>">
                        <i class="fa-solid fa-genderless"></i>
                        Orders
                    </a>


                    <a href="#" class="<?= activeURL('/something_again') ? 'active-url' : ''; ?>">
                        <i class="fa-solid fa-heart"></i>
                        Saved Items
                    </a>

                    <a href="/account" class="<?= activeURL('/account') ? 'active-url' : ''; ?>" target="_blank">
                        Account Management
                    </a>

                    <a href="/delete-account" class="<?= activeURL('/delete-account') ? 'active-url' : ''; ?>">

                        Close Account
                    </a>
                </div>


                <form action="/dashboard/destroy" method="POST">
                    <input type="hidden" name="__request_method" value="DELETE">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <button class="admin-logout">Log out</button>

                </form>

            </nav>
        </aside>

        <main>

            <section>
                <h2>Account Overview</h2>
                <table>
                    <thead>
                    <tr>
                        <td><h3>Account Details</h3></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <h4>
                                <span>Name:</span> <?= htmlspecialchars($user['first_name']) . ' ' . htmlspecialchars($user['last_name']) ?>
                            </h4>
                            <p>Email: <?= htmlspecialchars($user['email']) ?></p>
                            <p>Joined Date: <?= date('j-M-Y, H:i', $user['created_at']); ?></p>
                        </td>

                    </tr>
                    </tbody>

                </table>

            </section>

        </main>

    </div>
</section>