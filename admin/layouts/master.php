<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $pagetitle; ?></title>

    <link href="<?php echo url(); ?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo url(); ?>public/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo url(); ?>public/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo url(); ?>public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php include BASE_PATH . '/admin/layouts/header.php'; ?>

            <?php include BASE_PATH . '/admin/layouts/sidebar.php'; ?>
        </nav>

        <div id="page-wrapper">
            <?php include $subview; ?>
        </div>
    </div>

    <script src="<?php echo url(); ?>public/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo url(); ?>public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(); ?>public/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo url(); ?>public/dist/js/sb-admin-2.js"></script>
</body>
</html>
