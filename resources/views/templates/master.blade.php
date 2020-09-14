<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> @yield('title')</title>
	<link href={{ asset("bootstrap/css/bootstrap.css") }} rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
</head>

<body>
	<div class="container">
		@section('content')
		@show
	</div>
 
<script  type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script  type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#DataList").DataTable({
				"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tất cả"]],
				"iDisplayLength": 10,
				"oLanguage": {
					"sLengthMenu": "Hiển thị _MENU_ dòng mỗi trang",
					"oPaginate": {
						"sFirst": "<span class='glyphicon glyphicon-step-backward' aria-hidden='true'></span>",
						"sLast": "<span class='glyphicon glyphicon-step-forward' aria-hidden='true'></span>",
						"sNext": "<span class='glyphicon glyphicon-triangle-right' aria-hidden='true'></span>",
						"sPrevious": "<span class='glyphicon glyphicon-triangle-left' aria-hidden='true'></span>"
					},
					"sEmptyTable": "Không có dữ liệu",
					"sSearch": "Tìm kiếm:",
					"sZeroRecords": "Không có dữ liệu",
					"sInfo": "Hiển thị từ _START_ đến _END_ trong tổng số _TOTAL_ dòng được tìm thấy",
					"sInfoEmpty" : "Không tìm thấy",
					"sInfoFiltered": " (trong tổng số _MAX_ dòng)"
				}
			});
		});
	</script>
</body>

</html>