<?php

include '../helpers/init.php';
include '../helpers/app.php';

session_destroy();

redirect(url('admin/login.php'));