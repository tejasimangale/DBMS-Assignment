<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <?php
            session_start();
        ?>

        <?php  
            if(isset($_SESSION['message'])): ?>
                <div class="alert alert-<?=$_SESSION['msg_type']?>">

                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message'])
                ?>
                </div>
        <?php endif?>

        <?php
            session_destroy();
        ?>
    <h2>Sailors</h2>            
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Rating</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include('dbconnection.php');
                include('updatedb.php');

                $query = "SELECT * from sailor";

                $disp = mysqli_query($connect,$query);

                while($result = mysqli_fetch_assoc($disp)){
                    ?>
                <tr>
                    <td ><?php  echo $result['SID']?></td>
                    <td ><?php  echo $result['SNAME']?></td>
                    <td ><?php  echo $result['RATING']?></td>
                    <td ><?php  echo $result['AGE']?></td>
                    <td><a href="update.php?edit=<?php echo $result['SID'];?>" class="btn btn-info">
                        Edit
                    </a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <h2>Update the data of the selected sailor</h2>
    <form action="updatedb.php" method="POST">

        <div class="form-group">
            <label for="id">Sailor ID:</label>
            <input type="number" name="s_id" class="form-control" id="sid" required placeholder="Enter the ID"
            value="<?php echo $s_id;?>">
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="sname" class="form-control" id="name" required placeholder="Enter the name"
            value="<?php echo $s_name;?>">
        </div>

        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="number" name="srank" class="form-control" id="ranking" required placeholder="Enter the ranking"
            value="<?php echo $s_rating;?>" min='1' max="10">
        </div>

        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" name="sage" class="form-control" id="age" required placeholder="Enter the age"
            value="<?php echo $s_age;?>" min="20" max="60">
        </div>

        <button type="submit" name="update" class="btn btn-info">Update</button>
    </div>
    
</body>


</html>