<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Account</th>
        <th scope="col">Password</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Address</th>
        <th scope="col">Image</th>
        <th scope="col">Role</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <th scope="row"> <?php echo $user['id'] ?></th>
            <td> <?php echo $user['account'] ?></td>
            <td> <?php echo $user['passwordd'] ?></td>
            <td> <?php echo $user['name'] ?></td>
            <td> <?php echo $user['email'] ?></td>
            <td> <?php echo $user['phone'] ?></td>
            <td> <?php echo $user['address'] ?></td>
            <td><img src="upload/<?php echo $user['image'] ?>" alt="upload/avatar" style="width: 100px ;height:100px">
            </td>
            <td> <?php echo $user['role'] ?></td>
            <td><a type="submit" class="btn btn-primary" href="index.php?page=deleteUser&id=<?php echo $user['id'] ?>">Delete</a></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>