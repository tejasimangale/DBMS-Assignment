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

        <br>
        <br>
        <h1>Want to find a Sailor?</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="id">Sailor ID:</label>
                <input type="number" name="s_id" class="form-control" id="sid" required placeholder="Enter the ID">
            </div>
            <button type="submit" class="btn btn-info" name="disp">Display</button>
        </form>

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

                    if(isset($_POST['disp'])){
                        $id = $_POST['s_id'];

                        $query = "SELECT * from sailor WHERE SID=$id";
    
                        $disp = mysqli_query($connect,$query);

                        if(mysqli_num_rows($disp)>0){

                        while($result = mysqli_fetch_assoc($disp)){
                            ?>
                    
                            <tr>
                                <td><?php  echo $result['SID']?></td>
                                <td><?php  echo $result['SNAME']?></td>
                                <td><?php  echo $result['RATING']?></td>
                                <td><?php  echo $result['AGE']?></td>
                            </tr>
                        <?php } 
                        }else{
                            $_SESSION['message']="ID does not exist. Please try again ";
                            $_SESSION['msg_type']="danger";
                        }
                        ?>
                        <?php }    
                    ?>
                </tbody>
        </table>
        
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
    </div>
</body>
</html>