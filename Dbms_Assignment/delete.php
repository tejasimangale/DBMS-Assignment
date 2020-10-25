<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <?php include('display.php'); ?>
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
    <br>
    <br>
    <h1>Want to delete a Sailor?</h1>
        <form action="deletedb.php" method="POST">
            <div class="form-group">
                <label for="id">Sailor ID:</label>
                <input type="number" name="s_id" class="form-control" id="sid" required placeholder="Enter the ID">
            </div>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</body>
</html>