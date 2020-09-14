@extends('templates.master')

@section('title','Quản lý nhân viên')

@section('content')

<div class="page-header"><h4>Quản lý nhân viên</h4></div>

<?php //Hiển thị thông báo thành công?>
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

<?php //Hiển thị form sửa nhân viên?>
<p><a class="btn btn-primary" href="{{ url('/staff') }}">Về danh sách</a></p>
<div class="col-xs-4 col-xs-offset-4">
	<center><h4>Sửa nhân viên</h4></center>
	<form action="{{ url('/staff/update') }}" method="post">
		<input type="hidden" id="_token" name="_token" value="{!! csrf_token() !!}" />
		<input type="hidden" id="id" name="id" value="{!! $getStaffById->id !!}" />
		<div class="form-group">
			<label for="name">Tên nhân viên:</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Tên nhân viên" maxlength="64" value="{{ $getStaffById->name }}" required />
		</div>
		<div class="form-group">
			<label for="email">email:</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="255" value="{{ $getStaffById->email }}" required />
        </div>
        <div class="form-group">
			<label for="age">age:</label>
			<input type="number" class="form-control" id="age" name="age" placeholder="age" min="1" max="100" value="{{ $getStaffById->age }}" required />
		</div>
		<center><button type="submit" class="btn btn-primary">Lưu lại</button></center>
	</form>
</div>

@endsection