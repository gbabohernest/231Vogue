<!-- Show a single product & details about the product -->

<section class="single-product-wrapper">

    <div class="product-card-single">
        <div class="product-image">
            <img src="/<?=$product['image_path']?>" alt="<?=$product['product_name']?>">

        </div>
        <div class="product-info">
            <div class="product-details">
                <h1><?=$product['product_name']?></h1>

                <div class="product-description">
                    <h2>Product details</h2>
                    <p><?=$product['description']?></p>
                </div>
            </div>
            <span class="price">Price: US$<?=$product['price']?></span>
            <div class="add-to-cart">
                <i class="fa-solid fa-cart-plus"></i>
                <button>Add to Cart</button>
            </div>
        </div>
    </div>

</section>
