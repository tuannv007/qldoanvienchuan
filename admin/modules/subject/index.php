<?php


$params = json_encode($_GET);

$makhoa = isset($_GET['makhoa']) ? $_GET['makhoa'] : '';
$nienkhoa = isset($_GET['nienkhoa']) ? $_GET['nienkhoa'] : '';
$subjects = getDataWithSelection($nienkhoa,$makhoa);
     
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <div class="container">
        <div class="col-md-4 col-md-offset-1">
            <div class="form-group">
                Khoa
                <select class="form-control" name="makhoa">
                    <?php 
                        echo $sql = "SELECT *FROM khoa";
                        $query = mysqli_query($link, $sql);
                        while ($rowKhoa = mysqli_fetch_array($query)) {
                            $selected = $rowKhoa['id'] == $makhoa ? 'selected' : '';
                    ?>
                        <option value="<?php echo $rowKhoa['id']; ?>" <?php echo $selected; ?>>
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
                            $selected = $rowKhoa['id'] == $nienkhoa ? 'selected' : '';
                    ?>
                        <option value="<?php echo $rowKhoa['id']; ?>" <?php echo $selected; ?>>
                            <?php echo $rowKhoa['tennienkhoa']; ?>
                        </option>
                    <?php
                        }
                     ?>
                </select>
            </div>

            <div class="form-group">
                <button type="button" name="filter">Lọc</button>
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
                    <th>Tên Khoa</th>
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
                        <td><?php echo $subject['tenkhoa']; ?></td>
                        <td><?php echo $subject['tennienkhoa']; ?></td>
                        <td>
                            <a href="<?php echo url('admin/index.php?module=subject&action=edit&kid=' . $subject['id']); ?>" class="btn btn-default btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>               
                        </td>
                        <td>
                            <a href="<?php echo url('admin/index.php?module=subject&action=delete&kid=' . $subject['id']); ?>" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
                            </a>               
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <div class="form-group">
       <a href="<?php echo url('admin/index.php?module=subject&action=create') ?>" class="btn btn-default">
                Thêm mới
       </a>
    </div>

    <script src="<?php echo url(); ?>public/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo url(); ?>public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(); ?>public/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo url(); ?>public/dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var params = <?php echo $params; ?>;
            var adminUrl = '<?php echo url('admin/index.php'); ?>';

            $('button[name="filter"]').click(function () {
                params.makhoa = $('[name="makhoa"]').val();
                params.nienkhoa = $('[name="nienkhoa"]').val();
                window.location.href = adminUrl + '?' + jQuery.param(params);
            });
        });
    </script>
</body>
</html>