<?php

$lopID = $_POST['lopID'];
$doanphiID = $_POST['doanphiID'];
$sinhvienIDs = isset($_POST['sinhvienIDs']) ? $_POST['sinhvienIDs'] : [0];

$sql1 = "update sinhvien_doanphi set dadong = 0 where doanphi_id = $doanphiID";
$sql2 = "update sinhvien_doanphi set dadong = 1 where doanphi_id = $doanphiID and sinhvien_id in (" . implode(',', $sinhvienIDs) . ')';

dbExecute($sql1);
dbExecute($sql2);

redirect(url('admin/index.php?module=doanphi&action=index&doanphi_id='.$doanphiID.'&lop_id='.$lopID));