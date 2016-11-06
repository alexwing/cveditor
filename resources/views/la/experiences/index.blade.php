@extends("la.layouts.app")

@section("contentheader_title", "Experiencia")
@section("contentheader_description", "Experiencia laboral del candidato")
@section("section", "Experiencia")
@section("sub_section", "Listado")
@section("htmlheader_title", "Listado de empleos del candidato")

@section("headerElems")
@la_access("Experiences", "create")
<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Añadir Experiencia</button>
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
        <table id="example1" class="table table-bordered">
            <thead>
                <tr class="success">
                    @foreach( $listing_cols as $col )
                    <th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
                    @endforeach
                    @if($show_actions)
                    <th>Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

@la_access("Experiences", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Añadir Experience</h4>
            </div>
            {!! Form::open(['action' => 'LA\ExperiencesController@store', 'id' => 'experience-add-form']) !!}
            <div class="modal-body">
                <div class="box-body">
                    @la_form($module)

                    {{--
					@la_input($module, 'company')
					@la_input($module, 'logotipo')
					@la_input($module, 'begin')
					@la_input($module, 'end')
					@la_input($module, 'description')
					--}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                {!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
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
$("#example1").DataTable({
processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/experience_dt_ajax') }}",
          language: {
              url: "{{ asset('la-assets/lang/SpanishDataTable.json') }}"
          },
        @if ($show_actions)
        columnDefs: [ { orderable: false, targets: [ - 1] }],
        @endif
});
$("#experience-add-form").validate({

});
});
</script>
@endpush
