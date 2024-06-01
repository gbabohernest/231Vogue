
<section class="modal create-modal"  data-modal-type="product">
    <div class="modal-content">
        <span class="close-modal-btn"><i class="fa-solid fa-xmark"></i></span>

        <form action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Product name">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category">
                    <!-- dynamically load category from db -->
             <option value="clothes">Clothes</option>
                    <option value="accessories">Accessories</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" placeholder="What product is it?"></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="active">Active</option>
                    <option value="disabled">Disabled</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" id="image" name="image" placeholder="product image">
            </div>

            <button type="submit" class="submit-product-btn create-product-btn"> Add Product</button>
        </form>
    </div>
</section>