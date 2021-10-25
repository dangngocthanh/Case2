<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Product id</th>
        <th scope="col">Product image</th>
        <th scope="col">Product name</th>
        <th scope="col">Brand</th>
        <th scope="col">Price</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php $stt=1; foreach ($products as $product): ?>
        <tr>
            <th scope="row"> <?php echo $stt++ ?> </th>
            <td> <?php echo $product['productId'] ?></td>
            <td><img src="productsImg/<?php echo $product['productImg'] ?>" alt="upload/avatar" style="width: 100px ;height:100px"> </td>
            <td> <?php echo $product['productName'] ?></td>
            <td> <?php echo $product['brand'] ?></td>
            <td> <?php echo number_format($product['price']).' VND' ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>