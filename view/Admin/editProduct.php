<div class="container">
    <h3>Update Products</h3>
    <form method="post" enctype='multipart/form-data'>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
            <label for="">Products name</label>
            <input type="text" name="name" required class="form-control" value="<?php echo $product['name'] ?>">
            <label for="">Information</label>
            <input type="text" name="information" required class="form-control " value="<?php echo $product['information'] ?>">
            <label for="">Quantity</label>
            <input type="number" name="quantity" required class="form-control" value="<?php echo $product['quantity'] ?>">
            <label for="">Price</label>
            <input type="number" name="price" required class="form-control" value="<?php echo $product['price'] ?>">
            <label for="">Brand</label>
            <input type="text" name="brand" required class="form-control" value="<?php echo $product['brand'] ?>">
            <label for="">Image</label>
            <img src="productsImg/<?php echo $product['image'] ?>">
            <input type="file" name="fileToUpload" id="fileToUpload" required class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>