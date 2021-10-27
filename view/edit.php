<div style="background-color: #232222">
    <div class="container" style="background-color: #413d3d">
        <form method="post" enctype='multipart/form-data'>
            <div class="row" style="color: white">
                <div class="col-md-12">
                    <img src="upload/<?php echo $data['image'] ?>" class=" border border-success rounded-circle"
                         style="width: 200px; margin-top:100px; margin-left: 453px ">
                    <hr noshade="noshade">
                    <p style="text-align: center "><input type="file" name="fileToUpload" id="fileToUpload"></p>
                </div>
                <div class="col-md-6 pl-5">
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <div class="col-md-6">
                        <p><strong>Account: </strong></p><input type="text" name="account"
                                                                value="<?php echo $data['account'] ?>">
                    </div>
                    <div class="col-md-6">
                        <p><strong>Password: </strong></p><input type="text" name="password"
                                                                 value="<?php echo $data['passwordd'] ?>">
                    </div>
                    <div class="col-md-6">
                        <p><strong>Name: </strong></p><input type="text" name="name"
                                                                 value="<?php echo $data['name'] ?>">
                    </div>
                    <div class="col-md-6">
                        <p><strong>Email: </strong></p><input type="email" name="email"
                                                              value="<?php echo $data['email'] ?>">
                    </div>
                    <div class="col-md-6">
                        <p><strong>Phone number: </strong></p><input type="text" name="phone"
                                                                     value="<?php echo $data['phone'] ?>">
                    </div>
                    <div class="col-md-6">
                        <p><strong>Address: </strong></p><input type="text" name="address"
                                                                value="<?php echo $data['address'] ?>">
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-outline-success btn-sm mt-3">Update</button>
                        <a href="index.php?page=profile" class="btn btn-outline-success btn-sm mt-3" type="submit">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>