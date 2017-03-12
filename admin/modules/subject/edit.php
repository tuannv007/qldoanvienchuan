 <?php 	

echo $id = isset($_GET['kid']) ? $_GET['kid'] : 0;
$subject = dbFind('lop', $id);
$submited = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$submited = true;
	echo $malop = isset($_POST['malop']) ? $_POST['malop'] : '';
	echo $tenlop = isset($_POST['tenlop']) ? $_POST['tenlop'] : '';
	echo $makhoa = isset($_POST['makhoa']) ? $_POST['makhoa'] : '';
	echo $nienkhoa = isset($_POST['nienkhoa']) ? $_POST['nienkhoa'] : '';

	// validate form later

		if (dbCheckExits('lop','malop',$malop)) {
			dbUpdateSUbkect($malop,$tenlop,$makhoa,$nienkhoa,$id);
			redirect(url('admin/index.php?module=subject&action=index'));
		}
		else 
		{
			echo "Ma khoa da ton tai";
		}
	}	

?> 
<div class="row">
    <div class="col-lg-6">
        <h1 class="page-header">Chỉnh sửa lớp</h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-6">
    	<div class="text-right">
    		<a href="<?php echo url('admin/index.php?module=subject&action=index') ?>" class="btn btn-default">
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
					<label>Mã lớp</label>
					<input value="<?php echo $submited ? $_POST['malop'] : $subject['malop'] ?>" class="form-control" name="malop" placeholder="mã lớp">
				</div>

				<div class="form-group">
					<label>Tên lớp</label>
					<input value="<?php echo $submited ? $_POST['tenlop'] : $subject['tenlop'] ?>" class="form-control" name="tenlop" placeholder="tên lớp">
				</div>
				<div class="form-group">
	                Khoa
		                <select class="form-control" name="makhoa">
		                    <?php 
		                        $sql = "SELECT *FROM khoa";
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
				<button type="submit" class="btn btn-primary btn-md">Sửa lớp</button>
			</form>
		</div>
	</div>
</div>

