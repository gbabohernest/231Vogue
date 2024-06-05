

<section class="modal edit-modal" data-modal-type="product" >
    <div class="modal-content">
        <span class="close-modal-btn"><i class="fa-solid fa-xmark"></i></span>

        <form action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Product name">
            </div>

            <div class="form-group">
                <label for="category">Sub-category</label>
                <select name="category" id="category">
                    <!-- dynamically load category from db -->
                    <option value="dresses">Dresses</option>
                    <option value="heals">Heels</option>
                </select>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" placeholder="price">
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

            <button type="submit" class="submit-product-btn update-product-btn"> Update Product</button>
        </form>
    </div>
</section>