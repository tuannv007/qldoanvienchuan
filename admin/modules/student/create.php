<?php 	

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$masv = isset($_POST['masv']) ? $_POST['masv'] : '';
	$hoten = isset($_POST['hoten']) ? $_POST['hoten'] : '';
	$diachi = isset($_POST['diachi']) ? $_POST['diachi'] : '';
	$ngaysinh = isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : '';
	$sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
	$gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : '';
	$lop = isset($_POST['malop']) ? $_POST['malop'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
	// validate form later
    if ($gioitinh == 'Nam') {
        $gioitinh = 1;
    }else{
        $gioitinh =0;
    }
	$sinhvienID = dbCreateGetID('sinhvien', [
		'masv' => $masv,
		'hoten' => $hoten,
		'diachi' => $diachi,
        'email' => $email,
		'ngaysinh' => $ngaysinh,
		'sdt' => $sdt,
		'gioitinh' => $gioitinh,
		'malop' => $lop,
	]);

    
    $doanphiID = dbGet("select id from doanphi where namdong = " . date('Y'))[0]['id'];

    dbCreate('sinhvien_doanphi', [
        'sinhvien_id' => $sinhvienID,
        'doanphi_id' => $doanphiID,
    ]);


    redirect(url('admin/index.php?module=student&action=index'));
}

?>
<div class="row">
    <div class="col-lg-6">
        <h1 class="page-header">Thêm mới Sinh vien</h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-6">
    	<div class="text-right">
    		<a href="<?php echo url('admin/index.php?module=student&action=index') ?>" class="btn btn-default">
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
					<label>Mã SV</label>
					<input class="form-control"  required name="masv" placeholder="mã sv">
				</div>

				<div class="form-group">
					<label>Ho ten</label>
					<input class="form-control" required name="hoten" placeholder="Ho ten">
				</div>
	                       
				<div class="form-group">
					<label>Dia chi</label>
					 <textarea class="form-control" required rows="5" name="diachi"></textarea>
				</div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" required name="email" placeholder="Email">
                </div>
				<div class="form-group">
					<label>Ngay sinh</label>
					<input class="form-control" required type="date" name="ngaysinh" placeholder="Ngay Sinh">
				</div>
				<div class="form-group">
					<label>SDT</label>
					<input class="form-control" required name="sdt" type="tel" placeholder="SDT">
				</div>
				<div class="form-group">
                Gioi Tinh
                <select class="form-control" name="gioitinh">
                   <option>Nam</option>
                   <option>Nu</option>
                </select>
                <!-- Change this to a button or input when using this as a form -->
            </div>
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
                <select class="form-control" name="malop">
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

				<button type="submit" class="btn btn-primary btn-md">Thêm Sinh vien</button>
			</form>
		</div>
	</div>
</div>

