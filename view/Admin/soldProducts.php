<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">User id</th>
        <th scope="col">User image</th>
        <th scope="col">Account</th>
        <th scope="col">User name</th>
        <th scope="col">Product id</th>
        <th scope="col">Product image</th>
        <th scope="col">Product name</th>
        <th scope="col">Brand</th>
        <th scope="col">Price</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <th scope="row"> <?php echo $product['historyId'] ?></th>
            <th> <?php echo $product['userId'] ?></th>
            <td><img src="upload/<?php echo $product['userImg'] ?>" alt="upload/avatar" style="width: 100px ;height:100px"> </td>
            <td> <?php echo $product['account'] ?></td>
            <td> <?php echo $product['name'] ?></td>
            <td> <?php echo $product['productId'] ?></td>
            <td><img src="productsImg/<?php echo $product['productImg'] ?>" alt="upload/avatar" style="width: 100px ;height:100px"> </td>
            <td> <?php echo $product['productName'] ?></td>
            <td> <?php echo $product['brand'] ?></td>
            <td> <?php echo number_format($product['price']).' VND' ?></td>
            <td><a type="submit" class="btn btn-primary" href="index.php?page=deleteHistory&id=<?php echo $product['historyId'] ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>