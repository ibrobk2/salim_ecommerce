<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Account Transactions</title>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
<link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
<link rel="stylesheet" href="lineawesome/css/line-awesome.min.css">
<style>
    .las{
        font-size: 22px;
    }
</style>
</head>
<body>
  <div class="container">
        <h2 class="text-center">Account Transactions</h2>
        <table class="table table-striped table-hover">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Transaction Reference</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Date</th>
      <!-- <th scope="col" colspan="2">Action</th> -->
    </tr>
  </thead>
  <tbody>
    <?php
    include "server.php";
    $sn = 1;
    $sql = "SELECT * FROM transactions";
    $result = mysqli_query($conn, $sql);

    while($row=mysqli_fetch_assoc($result)){
   ?>
    <tr>
      <th scope="row"><?= $sn++; ?></th>
      <td><?= $row['reference']; ?></td>
      <td><?= $row['quantity']; ?></td>
      <td><?= $row['amount']; ?></td>
      <td><?= $row['date']; ?></td>
      <!-- <td><a href="add_product.php?edit=<?= $row['id']; ?>" class="btn btn-success"><i class="las la-edit"></i>Edit</a> </td>
      <td><a href="delete_product.php?delete=<?= $row['id']; ?>" class="btn btn-danger"><i class="las la-trash-alt"></i>Delete</a> </td> -->
    </tr>
    <?php } ?>
  
  </tbody>
</table>
    </div>
</body>

</html>