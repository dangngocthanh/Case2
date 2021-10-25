<div class="container card">
    <div class="row card-body" class="product" style="margin-top: 120px">
        <img src="productsImg/<?php echo $product['image'] ?>" class="col-md-4" >
        <div class="col-md-8" style="margin-top: 15px">
            <h3 class=""><?php echo $product['name'] ?></h3>
            <p style="margin-top: 50px"><b>Information:</b> <?php echo $product['information'] ?></p>
            <p style="margin-top: 10px"><b>Brand:</b> <?php echo $product['brand'] ?></p>
            <p style="margin-top: 10px"><b>Price:</b> <?php echo number_format($product['price']).' VND' ?></p>
            <a href="index.php?page=addOrder&id=<?php echo $product['id'] ?>"
               class="btn btn-success">Buy</a>
            <a href="index.php"
               class="btn btn-success">Cancel</a>
            <p></p>
        </div>
    </div>
</div>