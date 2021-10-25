<?php include_once ('view/banner.php')?>
<div class="row mt-3 ml-5 mr-5">
    <?php foreach ($products as $product) : ?>
        <a href="index.php?page=detailProduct&id=<?php echo $product['id'] ?>" style="color: black;text-decoration:none">
            <div class="col-3 mt-4 pr-2 pl-2">
                <div class="card" style="width: 23rem;height: 500px">
                    <img src="productsImg/<?php echo $product["image"] ?>" class="rounded mx-auto d-block" alt="..."
                         width="200"
                         height="200" style="margin-top: 20px">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product["name"] ?></h5>
                        <p class="card-text">Price: <?php echo number_format($product['price']).' VND' ?></p>
                        <p class="card-text">Brand: <?php echo $product["brand"] ?></p>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>