<?php

$subjects = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo $makhoa = isset($_POST['makhoa']) ? $_POST['makhoa'] : '';
    echo $nienkhoa = isset($_POST['nienkhoa']) ? $_POST['nienkhoa'] : '';
    $subjects = getDataWitdSelection('lop',$makhoa,$nienkhoa);
}
     

?>
<!DOCTYPE html>
<html lang="en">
	
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <link href="<?php echo url(); ?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo url(); ?>public/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <link href="<?php echo url(); ?>public/dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="<?php echo url(); ?>public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
          <form role="form"  method="POST">

    <div class="container">
         <div class="col-md-4 col-md-offset-1">
             <div class="form-group">
            	Khoa
                <select class="form-control" name="makhoa">
                    <?php 
                        $sql = "SELECT *FROM khoa";
                        $query = mysqli_query($link, $sql);
                        while ($rowKhoa = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $rowKhoa['makhoa']; ?>">
                            <?php echo $rowKhoa['tenkhoa']; ?>
                        </option>
                    <?php
                        }
                     ?>
                </select>
                <!-- Change this to a button or input when using this as a form -->
                </div>
             <div class="form-group">
            	Niên Khóa
                <select class="form-control" name="nienkhoa">
                    <?php 
                        $sql = "SELECT *FROM nienkhoa";
                        $query = mysqli_query($link, $sql);
                        while ($rowKhoa = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $rowKhoa['manienkhoa']; ?>">
                            <?php echo $rowKhoa['tennienkhoa']; ?>
                        </option>
                    <?php
                        }
                     ?>
                </select>
            </div>
        </div>
        
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mã Lớp</th>
                    <th>Tên Lớp</th>
                    <th>Mã Khoa</th>
                    <th>Niên Khóa</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($subjects as $subject): ?>
                    <tr>
                        <td><?php echo $subject['id']; ?></td>
                        <td><?php echo $subject['malop']; ?></td>
                        <td><?php echo $subject['tenlop']; ?></td>
                        <td><?php echo $subject['makhoa']; ?></td>
                        <td><?php echo $subject['nienkhoa']; ?></td>
                        <td>
                            <a href="<?php echo url('admin/index.php?module=department&action=edit&kid=' . $department['id']); ?>" class="btn btn-default btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>               
                        </td>
                        <td>
                            <a href="<?php echo url('admin/index.php?module=department&action=delete&kid=' . $department['id']); ?>" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
                            </a>               
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
        </form>
    
            <button type="submit" class="btn btn-primary btn-md">Chọn</button>

    <script src="<?php echo url(); ?>public/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo url(); ?>public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(); ?>public/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo url(); ?>public/dist/js/sb-admin-2.js"></script>
</body>
</html>