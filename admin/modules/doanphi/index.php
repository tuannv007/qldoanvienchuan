<?php

    $makhoa = isset($_GET['makhoa']) ? $_GET['makhoa'] : '';
    $nienkhoa = isset($_GET['nienkhoa']) ? $_GET['nienkhoa'] : '';
    $lop_id = isset($_GET['lop_id']) ? intval($_GET['lop_id']) : 0;
    $doanphi_id = isset($_GET['doanphi_id']) ? intval($_GET['doanphi_id']) : 0;

    $sql = "select sinhvien.id, sinhvien.hoten, doanphi.namdong, doanphi.tiendong, sinhvien_doanphi.dadong
from sinhvien
LEFT join sinhvien_doanphi ON sinhvien.id = sinhvien_doanphi.sinhvien_id
LEFT join doanphi on sinhvien_doanphi.doanphi_id = doanphi.id
WHERE sinhvien.malop = $lop_id and doanphi.id = $doanphi_id;";
    
    $sinhviens   = dbGet($sql);

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
        <div class="row">
            <div class="col-md-4 col-md-offset-1">
                <form>
                    <input type="hidden" name="module" value="doanphi"/>
                    <input type="hidden" name="action" value="index"/>

                    <div class="form-group">
                        Lop
                        <select class="form-control" name="lop_id">
                            <?php 
                                echo $sql = "SELECT id, tenlop FROM lop";
                                $query = mysqli_query($link, $sql);
                                while ($rowLop = mysqli_fetch_array($query)) {
                                    $selected = $rowLop['id'] == $makhoa ? 'selected' : '';
                            ?>
                                <option value="<?php echo $rowLop['id']; ?>" <?php echo $selected; ?>>
                                    <?php echo $rowLop['tenlop']; ?>
                                </option>
                            <?php
                                }
                             ?>
                        </select>
                        <!-- Change this to a button or input when using this as a form -->
                    </div>
                    <div class="form-group">
                        Nam dong doan phi
                        <select class="form-control" name="doanphi_id">
                            <?php 
                                $sql = "SELECT id, namdong FROM doanphi";
                                $query = mysqli_query($link, $sql);
                                while ($rowLop = mysqli_fetch_array($query)) {
                                    $selected = $rowLop['id'] == $doanphi_id ? 'selected' : '';
                            ?>
                                <option value="<?php echo $rowLop['id']; ?>" <?php echo $selected; ?>>
                                    <?php echo $rowLop['namdong']; ?>
                                </option>
                            <?php
                                }
                             ?>
                        </select>
                    </div>

                    <div class="form-group">

                        <button type="submit" name="filter" class="btn btn-default">Lọc</button>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>&nbsp;</label>
                    <?php 
                        $sql = "SELECT tiendong FROM doanphi where id =".$doanphi_id;
                        $query = mysqli_query($link, $sql);
                        $doanphi = mysqli_fetch_assoc($query);
                    ?>
                    <input type="text" class="form-control" value="<?php echo isset($doanphi['tiendong']) ? $doanphi['tiendong'] : 0; ?>" disabled />
                </div>
            </div>
        </div>
    </div>
    <form action="/admin/index.php?module=doanphi&action=update" method="post">
        <input type="hidden" name="lopID" value="<?php echo $lop_id;?>">
        <input type="hidden" name="doanphiID" value="<?php echo $doanphi_id;?>">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Doan vien</th>
                        <th>Da dong</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($sinhviens as $i => $sinhvien): ?>
                        <tr>
                            <td><?php echo $i + 1; ?></td>
                            <td><?php echo $sinhvien['hoten']; ?></td>
                            <td>
                                <?php $checked = ($sinhvien['dadong'] == 1) ? 'checked' : ''; ?>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="sinhvienIDs[]" value="<?php echo $sinhvien['id'];  ?>" <?php echo $checked ?>/>
                                    </label>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <div class="form-group">
           <input type="submit" name="submit" class="btn btn-default" value="Cap nhat">
        </div>
    </form>

    <script src="<?php echo url(); ?>public/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo url(); ?>public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(); ?>public/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo url(); ?>public/dist/js/sb-admin-2.js"></script>
</body>
</html>