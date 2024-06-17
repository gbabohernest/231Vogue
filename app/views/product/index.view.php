<div class="products-wrapper">
    <article class="product-grid">


        <?php foreach ($products as $product) : ?>
               <a href="/show?product_id=<?= $product['product_id'] ?>">
                    <div class="product-card">
                        <!-- product image  -->
                        <img src="/<?=$product['image_path']?>" alt="<?= $product['product_name']?>">
                        <div class="product_info">
                            <p class="p_name"><?=$product['product_name']?></p>
                            <p class="p_price">US$<?=$product['price'] ?></p>
                        </div>
                    </div>
                </a>

        <?php endforeach;?>

    </article>

</div>