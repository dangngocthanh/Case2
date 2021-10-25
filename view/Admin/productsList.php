<a type="submit" class="btn btn-primary " style="margin: 10px 10px " href="index.php?page=addProduct">Add Product</a>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Product Name</th>
        <th scope="col">Information</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Brand</th>
        <th scope="col">Image</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <th scope="row"> <?php echo $product['id'] ?></th>
            <td> <?php echo $product['name'] ?></td>
            <td> <?php echo $product['information'] ?></td>
            <td> <?php echo $product['quantity'] ?></td>
            <td> <?php echo number_format($product['price']).' VND' ?></td>
            <td> <?php echo $product['brand'] ?></td>
            <td><img src="productsImg/<?php echo $product['image'] ?>"
                     style="width: 100px ;height:100px"></td>
            <td><a type="submit" class="btn btn-primary"
                   href="index.php?page=editProduct&id=<?php echo $product['id'] ?>">Update</a></td>
            <td><a type="submit" class="btn btn-primary"
                   href="index.php?page=deleteProduct&id=<?php echo $product['id'] ?>">Delete</a></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
