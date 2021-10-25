<div style="background-color: #232222">
    <div class="container" style="background-color: #413d3d">
        <div class="row" style="color: white">
            <div class="col-md-12">
                <img src="upload/<?php echo $data['image'] ?>" class=" border border-success rounded-circle"
                     style="width: 200px; height: 200px; margin-top:100px; margin-left: 453px ">
                <hr noshade="noshade">
                <h2 style="text-align: center "><?php echo $data['name'] ?></h2>
            </div>
            <div class="col-md-6 pl-5">
                <div class="col-md-6">
                    <p><strong>User Id: </strong><?php echo $data['id'] ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Account: </strong><?php echo $data['account'] ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Email: </strong><?php echo $data['email'] ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Phone number: </strong><?php echo $data['phone'] ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Address: </strong><?php echo $data['address'] ?></p>
                </div>
                <div class="col-md-12">
                    <a href="index.php?page=edit" class="btn btn-outline-success btn-sm">Edit profile</a>
                </div>

            </div>
            <div class="col-md-2">
                <div class="col-md-6" style="text-align: right"><h5>Boughted: </h5></div>
            </div>
            <div class="card col-md-4" style="width: 250px;color: black;">
                <img class="card-img-top" src="productsImg/<?php echo $product['productImg'] ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['productName'] ?></h5>
                    <p class="card-text">Price: <?php echo number_format($product['price']) . ' VND' ?></p>
                    <a href="index.php?page=ordersHistory" class="btn btn-outline-secondary">history</a>
                </div>
            </div>
        </div>
    </div>
</div>