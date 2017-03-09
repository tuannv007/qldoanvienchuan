<?php 

$departments = dbGetAll('khoa');

?>
<div class="row">
    <div class="col-lg-6">
        <h1 class="page-header">Danh sách khoa</h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-6">
    	<div class="text-right">
    		<a href="<?php echo url('admin/index.php?module=department&action=create') ?>" class="btn btn-default">
    			Thêm mới
    		</a>
    	</div>
    </div>
</div>
<div class="panel-body">
    <div class="table-responsive">
    	<table class="table table-bordered table-hover">
    		<thead>
    			<tr>
    				<th>#</th>
    				<th>Mã Khoa</th>
    				<th>Tên Khoa</th>
    				<th>Sửa</th>
    				<th>Xóa</th>
    			</tr>
    		</thead>

    		<tbody>
    			<?php foreach ($departments as $department): ?>
	    			<tr>
	    				<td><?php echo $department['id']; ?></td>
	    				<td><?php echo $department['makhoa']; ?></td>
	    				<td><?php echo $department['tenkhoa']; ?></td>
	    				<td>
                            <a href="<?php echo url('admin/index.php?module=department&action=edit&kid=' . $department['id']); ?>" class="btn btn-default btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>               
                        </td>
	    				<td>
                            <a href="<?php echo url('admin/index.php?module=department&action=delete&kid=' . $department['id']); ?>" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
                            </a>               
                        </td>
	    			</tr>
    			<?php endforeach; ?>
    		</tbody>
    	</table>
    </div>
</div>

