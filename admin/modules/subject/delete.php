<?php

$id = isset($_GET['kid']) ? $_GET['kid'] : 0;

dbDelete('lop', $id);

redirect(url('admin/index.php?module=subject&action=index'));