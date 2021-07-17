<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            .wrapper{
                width: 600px;
                margin: 0 auto;
            }
            table tr td:last-child{
                width: 120px;
            }
            img{
                height: 100px;
                width: 100px;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5 mb-3 clearfix">
                            <h2 class="pull-left">Employees Details</h2>
                            <a href="insert.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Employee</a>
                        </div>
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Salary</th>
                                    <th>MobileNumber</th>
                                    <th>MyPhoto</th>
                                   <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'connection.php';
                                $id = 1;
                                $sql = "SELECT * from mytable ORDER BY id desc";
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>

                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['salary']; ?></td>
                                    <td><?php echo $row['mobilenumber']; ?></td>
                                    <td><?php echo "<img src=".$row['image'].">"; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="mr-3" title="View Record" data-toggle = "tooltip"><span class="fa fa-pencil"></span></a>
                                    </td>
                                    <td>
                                        <a href="delete.php?id=<?php echo $row['id'];?>" class="mr-3" title="Record Delete" data-toggle = "tooltip"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                                <?php $id++; ?>
                                <?php }
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>