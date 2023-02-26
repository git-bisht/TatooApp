<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>

    <!-- bootstrap css -->
    <?php include "././header/bootstrap-css.php" ?>

</head>

<!-- navbar-sidebar -->
<?php include "././navbar-sidebar.php" ?>

<?php
 include "config.php";
if(isset($_POST['submit'])){
    $id = isset($_POST['id']) ? $_POST['id'] : 'id';
    $fname = isset($_POST['fname']) ? $_POST['fname'] : 'fname';
    $userType = isset($_POST['user_type']) ? $_POST['user_type'] : 'user_type';
    $userName = isset($_POST['username']) ? $_POST['username'] : 'username';
    $password = isset($_POST['password']) ? $_POST['password'] : 'password';
    $email = isset($_POST['email']) ? $_POST['email'] : 'email';
    $studioId = isset($_POST['studio_id']) ? $_POST['studio_id'] : '0';

    $sql ="UPDATE user SET user_type='{$userType}', username='{$userName}', password='{$password}', email='{$email}', fname='{$fname}',studio_id ='{$studioId}' WHERE id ='{$id}'";
  
    $result = mysqli_query($conn, $sql) or die("Query Failed". mysqli_error());
    ?>
    <script>
    console.log('<?= json_encode($result) ?>');
    </script>
   <?php
    if($result){
        echo "<script>window.location.href='list-users.php';</script>";
        exit;
    }else{
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert product.</p>";
    }
 }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Resistration Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Resistration Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <?php
      include "config.php";
      $id = isset($_GET['id']) ? $_GET['id'] : 'id';
      $sql = "SELECT * FROM user WHERE id ='{$id}'";
     
      $result = mysqli_query($conn,$sql) or die("Query Failed". mysqli_error());

      if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
    
    ?>
    


    <form action="<?php echo $_SERVER['PHP_SELF']?> " method="POST">
    <!-- Main content -->
    <section class="content">
        <input type="hidden" name="id" value="<?php echo $row['id']?>" >
        <div class="container-fluid">
            <!-- mentor DETAILS -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">User Details</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->

                <!-- mentor DETAILS -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Name</label>
                                <select class="form-control" value="<?php echo $row['user_type'];?>" name="user_type">
                                <option value="studio_admin">Studio Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Studio Name</label>
                                <select class="form-control" value="<?php echo $row['studio_id'];?>" name="studio_id">
                                <?php
                                   
                                    $sql= "SELECT * FROM studio ORDER BY id DESC";
                                    $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
                                    if($row1 = mysqli_num_rows($result)>0){
                                        while($row1 = mysqli_fetch_assoc($result)){
                                            ?>
                                             <option value="<?php echo $row1['id']?><"><?php echo $row1['name']?></option>
                                            <?php
                                        }
                                    } 
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="fname" value="<?php echo $row['fname'];?>"  class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>E Mail</label>
                                <input type="email" name="email" value="<?php echo $row['email'];?>" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" value="<?php echo $row['password'];?>" class="form-control select2" style="width: 100%;">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center"><input type="submit"name="submit" value="submit" class="btn btn-secondary"></input></div>

                    <!-- /.row -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    </form>
    <?php
        }
    }
    ?>
    <!-- /.content -->
</div>


<!-- footer -->
<?php include "././footer/footer.php" ?>

<!-- footer pluggins-->
<?php include "././footer/footer-plugins.php" ?>