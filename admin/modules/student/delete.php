<?php

$id = isset($_GET['kid']) ? $_GET['kid'] : 0;

dbDelete('sinhvien', $id);

redirect(url('admin/index.php?module=student&action=index'));