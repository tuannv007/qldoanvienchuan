<?php 	


$id = isset($_GET['kid']) ? $_GET['kid'] : 0;
$department = dbFind('khoa', $id);
$submited = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$submited = true;
	$makhoa = isset($_POST['makhoa']) ? $_POST['makhoa'] : '';
	$tenkhoa = isset($_POST['tenkhoa']) ? $_POST['tenkhoa'] : '';

	// validate form later

		if (dbCheckExits('khoa','makhoa',$makhoa) < 0) {
			dbUpdate('khoa', $id, [
			'makhoa' => $makhoa,
			'tenkhoa' => $tenkhoa,
			]);
			redirect(url('admin/index.php?module=department&action=index'));
		}
		else 
		{
			echo "Ma khoa da ton tai";
		}
	}	

?>
<div class="row">
    <div class="col-lg-6">
        <h1 class="page-header">Chỉnh sửa khoa</h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-6">
    	<div class="text-right">
    		<a href="<?php echo url('admin/index.php?module=department&action=index') ?>" class="btn btn-default">
    			Quay lại
    		</a>
    	</div>
    </div>
</div>
<div class="panel-body">
    <div class="row">
		<div class="col-lg-6">
			<form role="form" method="POST">
				<div class="form-group">
					<label>Ma Khoa</label>
					<input value="<?php echo $submited ? $_POST['makhoa'] : $department['makhoa'] ?>" class="form-control" name="makhoa" placeholder="ma khoa">
				</div>

				<div class="form-group">
					<label>Ten Khoa</label>
					<input value="<?php echo $submited ? $_POST['tenkhoa'] : $department['tenkhoa'] ?>" class="form-control" name="tenkhoa" placeholder="Enter text">
				</div>

				<button type="submit" class="btn btn-primary btn-md">Them Khoa</button>
			</form>
		</div>
	</div>
</div>

