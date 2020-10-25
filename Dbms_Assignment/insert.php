<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                
        <h1>Insert the details of a sailor</h1>
        <form action="insertdb.php" method="POST">

            <div class="form-group">
                <label for="id">Sailor ID:</label>
                <input type="number" name="s_id" class="form-control" id="sid" required placeholder="Enter the ID">
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="sname" class="form-control" id="name" required placeholder="Enter the name">
            </div>

            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="number" name="srank" class="form-control" id="rating" required placeholder="Enter the rating" min='1' max="10">
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" name="sage" class="form-control" id="age" required placeholder="Enter the age" min="20" max="60">
            </div>

            <button type="submit" class="btn btn-info">Submit</button>

            <button type="reset" class="btn btn-default">Reset</button>

        </form>
    </div>
</body>
</html>

