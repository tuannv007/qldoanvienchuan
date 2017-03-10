<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
	    <ul class="nav" id="side-menu">
	        <li class="sidebar-search">
	            <div class="input-group custom-search-form">
	                <input type="text" class="form-control" placeholder="Search...">
	                <span class="input-group-btn">
	                <button class="btn btn-default" type="button">
	                    <i class="fa fa-search"></i>
	                </button>
	                </span>
	            </div>
	            <!-- /input-group -->
	        </li>
	        <li>
	            <a href="<?php echo url('admin/index.php?module=department&action=index'); ?>">
	            	<i class="fa fa-edit fa-fw"></i> Quản Lý Khoa
            	</a>
	        </li>
	        <li>
	             <a href="<?php echo url('admin/index.php?module=subject&action=index'); ?>">
	            	<i class="fa fa-edit fa-fw"></i>Quản Lý Lớp
            	</a>
	        </li>
	        <li>
	             <a href="<?php echo url('admin/index.php?module=managerstudent&action=index'); ?>">
	            	<i class="fa fa-edit fa-fw"></i> Quản Lý Sinh viên
            	</a>
	        </li>
	      	<li>
	             <a href="<?php echo url('admin/index.php?module=targets&action=index'); ?>">
	            	<i class="fa fa-edit fa-fw"></i> Quản Lý Đoàn Phí
            	</a>
	        </li>
	    </ul>
	</div>
</div>