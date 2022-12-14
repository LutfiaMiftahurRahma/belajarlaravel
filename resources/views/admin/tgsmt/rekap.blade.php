<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>
			@foreach($th_ajar as $ta)
				Rekap Tanggungan {{ $ta->th_ajaran }} {{ $ta->smt }}
			@endforeach
		</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		@include('admin/loadcss')

		<!-- inline styles related to this page -->
		
	</head>

	<body class="no-skin">
		@include('admin/header')

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			@include('admin/sidebar')

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="{{route('adminhome')}}">Home</a>
							</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h4>
								@foreach($th_ajar as $ta)
								Rekap Tanggungan <br> {{ $ta->th_ajaran }} {{ $ta->smt }}
								@endforeach <br>
							</h4>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								@yield('content')
								<div class="table-responsive" >
									<table id="example1" class="table  table-bordered table-hover">
										<thead>
											<tr>
												<th>NO</th>
												<th>NIS</th>
												<th>Nama Siswa</th>
												<th>Kelas</th>
												<th>Status</th>
												<th>Keuangan</th>
												<th>Ket</th>
												<!-- <th>Biaya Ujian</th> -->
												<th>KH</th>
												<th>Ket</th>
												<th>Paper</th>
												<th>Ket</th>
												<th>Kartu Aksi</th>
												<!-- <th>Osis</th>
												<th>DA</th>
												<th>PMR</th> -->
												<th>Ketuntasan</th>
											</tr>
										</thead>
										<tbody>
											@foreach($rekaptg as $rt)
										    <tr>
												<td>{{ $no++ }}</td>
												<td>{{ $rt->nis }}</td>
												<td>{{ $rt->s_nama }}</td>
												<td>{{ $rt->tingkat }} {{ $rt->k_nama }}</td>
												<td>{{ $rt->status }}</td>
												<td>{{ $rt->keuangan }}</td>
												<td>{{ $rt->ket_keu }}</td>
												<!-- <td>{{ $rt->ujian }}</td> -->
												<td>{{ $rt->k_hijau }}</td>
												<td>{{ $rt->ket_k_h }}</td>
												<td>{{ $rt->paper }}</td>
												<td>{{ $rt->ket_ppr }}</td>
												<td>{{ $rt->kartu_aksi }}</td>
												<!-- <td>{{ $rt->osis }}</td>
												<td>{{ $rt->da }}</td>
												<td>{{ $rt->pmr }}</td> -->
												<td>{{ $rt->ketuntasan }}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>							
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			@include('admin/footer')

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		@include('admin/loadjs')

		<!-- inline scripts related to this page -->
		<script>
		  $(function () {
		    $("#example1").DataTable({
		      "responsive": false, "lengthChange": false, "autoWidth": false,
		      "buttons": ["excel", "pdf"]
		    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		  });
		</script>
	</body>
</html>
