<?php

$id = isset($_GET['kid']) ? $_GET['kid'] : 0;

dbDelete('khoa', $id);

redirect(url('admin/index.php?module=department&action=index'));