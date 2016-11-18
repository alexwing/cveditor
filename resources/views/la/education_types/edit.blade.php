@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/education_types') }}">Education type</a> :
@endsection
@section("contentheader_description", $education_type->$view_col)
@section("section", "Education types")
@section("section_url", url(config('laraadmin.adminRoute') . '/education_types'))
@section("sub_section", "Editar")

@section("htmlheader_title", "Education types Edit : ".$education_type->$view_col)

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

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($education_type, ['route' => [config('laraadmin.adminRoute') . '.education_types.update', $education_type->id ], 'method'=>'PUT', 'id' => 'education_type-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'category')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Guardar', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/education_types') }}">Cancelar</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#education_type-edit-form").validate({
		
	});
});
</script>
@endpush
