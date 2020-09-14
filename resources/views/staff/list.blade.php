@extends('templates.master')

@section('title','Quản lý nhân viên')

@section('content')

<?php //Hiển thị thông báo thành công?>
<div class="page-header"><h4>Quản lý nhân viên</h4></div>

@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<?php //Hiển thị danh sách nhân viên?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="table-responsive">
			<p><a class="btn btn-primary" href="{{ url('/staff/create') }}">Thêm mới</a></p>
			<table id="DataList" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên nhân viên</th>
                        <th>email</th>
                        <th>Tuổi nhân viên</th>
						<th>Sửa</th>
						<th>Xóa</th>
					</tr>
				</thead>
				<tbody>
				<?php //Khởi tạo vòng lập foreach lấy giá trị vào bảng?>
				@foreach($listStaff as $key => $staff)
					<tr>
						<?php //Điền số thứ tự?>
						<td>{{ $key+1 }}</td>
						<?php //Lấy tên nhân viên?>
						<td>{{ $staff->name }}</td>
						<?php //Lấy số email?>
                        <td>{{ $staff->email }}</td>
                        <?php //Lấy số tuổi?>
                        <td>{{ $staff->age }}</td>
						<?php //Tạo nút sửa nhân viên?>
						<td><a href="/staff/{{ $staff->id }}/edit" class="btn btn-primary">Sửa</a></td>
						<?php //Tạo nút xóa nhân viên?>
						<td><a href="/staff/{{ $staff->id }}/delete" class="btn btn-danger"  >Xóa</a></td>
					</tr>
				<?php //Kết thúc vòng lập foreach?>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection