<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
  <nav class=" navbar-inverse">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="insert.php">Insert</a></li>
            <li><a href="update.php">Update</a></li>
            <li><a href="delete.php">Delete</a></li>
            <li><a href="display.php">Display All</a></li>
            <li><a href="display_id.php">Display with ID</a></li>
        </ul>
        <div class="navbar-header navbar-right">
        <a class="navbar-brand" href="#">Tejasi Mangale</a>
        </div>
    </div>
  </nav>
<div class="container">
  <h2>Sailors</h2>            
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Rating</th>
        <th>Age</th>
      </tr>
    </thead>
    <tbody>
        <?php
            include('dbconnection.php');

            $query = "SELECT * from sailor";

            $disp = mysqli_query($connect,$query);

            while($result = mysqli_fetch_assoc($disp)){
                ?>
            
            <tr>
                <td><?php  echo $result['SID']?></td>
                <td><?php  echo $result['SNAME']?></td>
                <td><?php  echo $result['RATING']?></td>
                <td><?php  echo $result['AGE']?></td>
            </tr>
            <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
