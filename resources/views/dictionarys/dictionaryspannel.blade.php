@extends('layouts.default')
@section('content')

<div id="content">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Dictionary Manager</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<a class="btn btn-primary btn-mini pull-left" href="{{ route("dictionarys.create") }}">Add New Word</a>	</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						DICTIONARY
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>id</th>
									<th>photo</th>					
									<th>soung</th>
									<th>qtext</th>					
									<th>atext</th>
									
									<th>active</th>

									<th></th>
									<th></th>
									
								</tr>
							</thead>
							<tbody>

								@foreach($dictionarys as $dictionary)
								<tr lass="odd gradeX">   
									<td>{{ $dictionary->id }}</td>
									<td><img src="{{ $dictionary->photourl1 }}" width="200" height="100"></td>
									
									<td><audio controls>
										<!-- <source src="horse.ogg" type="audio/ogg"> -->
										<source src="{{ $dictionary->photourl2 }}" type="audio/mpeg">
											Your browser does not support the audio element.
										</audio><img src="{{ $dictionary->photourl2 }}" width="200" height="100"></td>
										
										<td>{{ $dictionary->qtext }}</td>
										<td><?php echo $dictionary->atext; ?></td>
										
										@if($dictionary->active==1)
										<td><i class="fa fa-check"></i></td>
										@else
										<td></td>
										@endif
										<td>
											<a class="btn btn-mini btn-primary" href="{{ route("dictionarys.edit", $dictionary->id ) }}">Edit</a>
										</td>
										@if(Auth::user()->roleid==1 || Auth::user()->roleid==2)
										<td>
											<form method="POST" action="{{ route("dictionarys.destroy", $dictionary->id) }}" accept-charset="UTF-8">
												<input name="_method" type="hidden" value="DELETE">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input class="btn btn-mini btn-danger" type="submit" value="Delete">
											</form>
										</td>
										@endif
									</tr>
									@endforeach





								</tbody>
							</table>
							<!-- /.table-responsive -->

						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-12 -->
			</div>
		</div>






		@stop

