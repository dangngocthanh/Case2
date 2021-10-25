<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Product id</th>
        <th scope="col">Product name</th>
        <th scope="col">Product image</th>
        <th scope="col">Brand</th>
        <th scope="col">Price</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php $id = 1;
    foreach ($products as $product): ?>
        <tr>
            <th scope="row"> <?php echo $id++ ?></th>
            <td> <?php echo $product['productId'] ?></td>
            <td> <?php echo $product['name'] ?></td>
            <td><img src="productsImg/<?php echo $product['image'] ?>" alt="upload/avatar"
                     style="width: 100px ;height:100px"></td>
            <td> <?php echo $product['brand'] ?></td>
            <td> <?php echo number_format($product['price']).' VND' ?></td>
            <td><a type="submit" class="btn btn-danger"
                   href="index.php?page=deleteOrder&id=<?php echo $product['id'] ?>">Delete</a></td>
            <td><a type="submit" class="btn btn-success"
                   href="index.php?page=buy&id=<?php echo $product['id'] ?>">Buy</a></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>