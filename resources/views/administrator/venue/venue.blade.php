@extends('administrator.index')

@section('content')
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Venue</h3>
				</div>
				<div class="panel-body">
					<!-- Button trigger modal -->
					<table class="table" id="dataTable">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Venue</th>
								<th>Alamat</th>
								<th>Lokasi</th>
								<th>Pemesanan</th>
								<th>Kerja Sama</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;?>
							@foreach($venue as $venues)
							<tr>
								<td>{{$i++}}</td>
								<td><a href="{{url('sandwich/venue/detail.'.base64_encode(base64_encode($venues->id_venue)))}}">{{$venues->venue_name}}</a></td>
								<td>{{$venues->address}}</td>
								<td>-</td>
								<td>-</td>
								<td>
									@if($venues->cooperate == '1')
									<span class="label label-success"><b>Telah Bekerja Sama</b></span>
									@else
									<span class="label label-danger"><b>Belum Bekerja Sama</b></span>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
@endsection