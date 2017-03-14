<?php

    $params = json_encode($_GET);
    $lop = isset($_GET['lop']) ? $_GET['lop'] : '';
    $students = getSubjectIntDepartment($lop);
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
                        $sql = "SELECT *FROM khoa";
                        $query = mysqli_query($link, $sql);
                        while ($rowKhoa = mysqli_fetch_array($query)) {
                            $selected = $rowKhoa['makhoa'] == $makhoa ? 'selected' : '';
                    ?>
                        <option value="<?php echo $rowKhoa['makhoa']; ?>" <?php echo $selected; ?>>
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
                            $selected = $rowKhoa['manienkhoa'] == $nienkhoa ? 'selected' : '';
                    ?>
                        <option value="<?php echo $rowKhoa['manienkhoa']; ?>" <?php echo $selected; ?>>
                            <?php echo $rowKhoa['tennienkhoa']; ?>
                        </option>
                    <?php
                        }
                     ?>
                </select>
            </div>
             <div class="form-group">
                Lop
                <select class="form-control" name="lop">
                    <?php 
                        $sql = "SELECT *FROM lop";
                        $query = mysqli_query($link, $sql);
                        while ($rowLop = mysqli_fetch_array($query)) {
                            $selected = $rowLop['id'] == $lop ? 'selected' : '';
                    ?>
                        <option value="<?php echo $rowLop['id']; ?>" <?php echo $selected; ?>>
                            <?php echo $rowLop['tenlop']; ?>
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
                    <th>Mã Sinh vien</th>
                    <th>Ten sinh vien</th>
                    <th>Dia chi</th>
                    <th>SDT</th>
                    <th>Ngay sinh</th>
                    <th>Gioi tinh</th>
                    <th>Xóa</th>
                    <th>Sua</th>

                </tr>
            </thead>

            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?php echo $student['id']; ?></td>
                        <td><?php echo $student['masv']; ?></td>
                        <td><?php echo $student['hoten']; ?></td>
                        <td><?php echo $student['diachi']; ?></td>
                        <td><?php echo $student['sdt']; ?></td>
                        <td><?php echo $student['ngaysinh']; ?></td>
                        <td><?php
                            if ($student['gioitinh'] == 1) {
                                 echo 'Nam';
                             } 
                             else {
                                echo 'Nu';
                             }?></td>
                        <td>
                            <a href="<?php echo url('admin/index.php?module=student&action=edit&kid=' . $student['id']); ?>" class="btn btn-default btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>               
                        </td>
                        <td>
                            <a href="<?php echo url('admin/index.php?module=student&action=delete&kid=' . $student['id']); ?>" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
                            </a>               
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <div class="form-group">
       <a href="<?php echo url('admin/index.php?module=student&action=create') ?>" class="btn btn-default">
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
                params.lop = $('[name="lop"]').val();
                window.location.href = adminUrl + '?' + jQuery.param(params);
            });
        });
    </script>
</body>
</html>