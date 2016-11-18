@extends("la.layouts.app")

@section("contentheader_title", "Education types")
@section("contentheader_description", "Education types listado")
@section("section", "Education types")
@section("sub_section", "Listado")
@section("htmlheader_title", "Education types listado")

@section("headerElems")
@la_access("Education_types", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Añadir Education type</button>
@endla_access
@endsection

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="tableData" class="table table-bordered">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th>Acción</th>
			@endif
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

@la_access("Education_types", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Añadir Education type</h4>
			</div>
			{!! Form::open(['action' => 'LA\Education_typesController@store', 'id' => 'education_type-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'category')
					--}}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				{!! Form::submit( 'Guardar', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#tableData").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/education_type_dt_ajax') }}",
                language: {
                    url: "{{ asset('la-assets/lang/SpanishDataTable.json') }}"
                },
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#education_type-add-form").validate({
		
	});
});
</script>
@endpush
