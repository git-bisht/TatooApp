<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Black Opal Ink</title>

    <!-- bootstrap css -->
    <?php include "./header/bootstrap-css.php" ?>

    <!-- datatable css -->
    <?php include "./data-tabel-css.php" ?>


</head>

<!-- navbar-sidebar -->
<?php include "./navbar-sidebar.php" ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>Inventory</h2>
                    <a href="frm-purchase.php" type="button" class="btn btn-secondary">Purchess</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Inventory</li>
            
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Create button -->
                            
                            <table id='example1' class='table table-bordered table-hover'>
                  <thead>
                  <tr>
                    <th>Sr.</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Studio</th>
                    <th>In Stock</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                        include "config.php";
                        $id = 0;
                        $sql= "SELECT product.product_name, product.description, product.type, studio.name, purchase.quantity FROM studio, product, purchase WHERE purchase.product_id = product.id AND purchase.studio_id = studio.id ORDER BY 1,2";
                        $result =mysqli_query($conn,$sql) or die("query failed". mysqli_error());
                        if($row = mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $id +1;
                            ?>
                        <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['description']?></td>
                        <td><?php echo $row['type']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['quantity']?></td>
                        </tr>
                        <?php
                        }
                        } 
                    ?>
                    </tbody>
                    </table>
      
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- footer -->
<?php include "./footer/footer.php" ?>

<?php include "./data-tabel-js.php" ?>



</body>

</html>