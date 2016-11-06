@extends("la.layouts.app")

<?php

use Dwij\Laraadmin\Models\Module;
?>

@section("contentheader_title", "Menus")
@section("contentheader_description", "Editor")
@section("section", "Menus")
@section("sub_section", "Editor")
@section("htmlheader_title", "Menu Editor")

@section("headerElems")

@endsection

@section("main-content")

<div class="box box-success menus">
    <!--<div class="box-header"></div>-->
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-modules" data-toggle="tab">Modules</a></li>
                        <li><a href="#tab-custom-link" data-toggle="tab">Custom Links</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-modules">
                            <ul>
                                @foreach ($modules as $module)
                                <li><i class="fa {{ $module->fa_icon }}"></i> {{ $module->name }} <a module_id="{{ $module->id }}" class="addModuleMenu pull-right"><i class="fa fa-plus"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane" id="tab-custom-link">

                            {!! Form::open(['action' => '\Dwij\Laraadmin\Controllers\MenuController@store', 'id' => 'menu-custom-form']) !!}
                            <input type="hidden" name="type" value="custom">
                            <div class="form-group">
                                <label for="url" style="font-weight:normal;">URL</label>
                                <input class="form-control" placeholder="URL" name="url" type="text" value="http://" data-rule-minlength="1" required>
                            </div>
                            <div class="form-group">
                                <label for="label" style="font-weight:normal;">Label</label>
                                <input class="form-control" placeholder="Label" name="label" type="text" value=""  data-rule-minlength="1" required>
                            </div>
                            <div class="form-group">
                                <label for="name" style="font-weight:normal;">Name</label>
                                <input class="form-control" placeholder="Name" name="name" type="text" value=""  data-rule-minlength="1" required>
                            </div>
                            <div class="form-group">
                                <label for="icon" style="font-weight:normal;">Icon</label>
                                <div class="input-group">
                                    <input class="form-control" placeholder="FontAwesome Icon" name="icon" type="text" value="fa-cube"  data-rule-minlength="1" required>
                                    <span class="input-group-addon"></span>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary pull-right mr10" value="Add to menu">
                            {!! Form::close() !!}
                        </div>
                    </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
            </div>
            <div class="col-md-8 col-lg-8">
                <div class="dd" id="menu-nestable">
                    <ol class="dd-list">
                        @foreach ($menus as $menu)
                        <?php echo LAHelper::print_menu_editor($menu); ?>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="EditModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Menu Item</h4>
            </div>
            {!! Form::open(['action' => ['\Dwij\Laraadmin\Controllers\MenuController@update', 1], 'id' => 'menu-edit-form']) !!}
            <input name="_method" type="hidden" value="PUT">
            <div class="modal-body">
                <div class="box-body">
                    <input type="hidden" name="type" value="custom">
                    <div class="form-group">
                        <label for="url" style="font-weight:normal;">URL</label>
                        <input class="form-control" placeholder="URL" name="url" type="text" value="http://" data-rule-minlength="1" required>
                    </div>
                    <div class="form-group">
                        <label for="label" style="font-weight:normal;">Label</label>
                        <input class="form-control" placeholder="Label" name="label" type="text" value=""  data-rule-minlength="1" required>
                    </div>                    
                    <div class="form-group">
                        <label for="name" style="font-weight:normal;">Name</label>
                        <input class="form-control" placeholder="Name" name="name" type="text" value=""  data-rule-minlength="1" required>
                    </div>
                    <div class="form-group">
                        <label for="icon" style="font-weight:normal;">Icon</label>
                        <div class="input-group">
                            <input class="form-control" placeholder="FontAwesome Icon" name="icon" type="text" value="fa-cube"  data-rule-minlength="1" required>
                            <span class="input-group-addon"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="roles[]" style="font-weight:normal;">Roles:</label>
                        <select id="roles" class="form-control select2-hidden-accessible" data-placeholder="Select roles" multiple="" rel="select2" name="roles[]" tabindex="-1" aria-hidden="true">
                            <?php $roles = App\Role::all(); ?>
                            @foreach($roles as $role)                   
                            <option value="{{ $role->id }}">{{ $role->name }}</option>            
                            @endforeach
                        </select>                    
                    </div>                       
                </div>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('la-assets/plugins/nestable/jquery.nestable.js') }}"></script>
<script src="{{ asset('la-assets/plugins/iconpicker/fontawesome-iconpicker.js') }}"></script>
<script>
$(function () {
    $('input[name=icon]').iconpicker();

    $('#menu-nestable').nestable({
        group: 1
    });
    $('#menu-nestable').on('change', function () {
        var jsonData = $('#menu-nestable').nestable('serialize');
        // console.log(jsonData);
        $.ajax({
            url: "{{ url(config('laraadmin.adminRoute') . '/la_menus/update_hierarchy') }}",
            method: 'POST',
            data: {
                jsonData: jsonData,
                "_token": '{{ csrf_token() }}'
            },
            success: function (data) {
                // console.log(data);
            }
        });
    });
    $("#menu-custom-form").validate({
    });

    $("#menu-nestable .editMenuBtn").on("click", function () {
        var info = JSON.parse($(this).attr("info"));

        var url = $("#menu-edit-form").attr("action");
        index = url.lastIndexOf("/");
        url2 = url.substring(0, index + 1) + info.id;

        $("#menu-edit-form").attr("action", url2);
        $("#EditModal input[name=url]").val(info.url);
        $("#EditModal input[name=label]").val(info.label);
        $("#EditModal input[name=name]").val(info.name);
        $("#EditModal input[name=icon]").val(info.icon);


        console.log(info.roles);

    
            $('#EditModal #roles').empty();
            var data = [];         
           <?php        
           $roles = App\Role::all(); 
           foreach($roles as $role) {
           ?>               
               var row = { id: <?php echo $role->id; ?>, text: '<?php echo $role-> name; ?>', selected : false}  
               for (i = 0; i < info.roles.length; i++) {          
               if (row["id"] == info.roles[i]){
                    row["selected"] = true;
               }
          }
               data.push(row);
          <?php } ?>
                $('#EditModal #roles').select2({
            data: data
        });

    $("#EditModal").modal("show");
});

$("#menu-edit-form").validate({
});

$("#tab-modules .addModuleMenu").on("click", function () {
    var module_id = $(this).attr("module_id");
    $.ajax({
    url: "{{ url(config('laraadmin.adminRoute') . '/la_menus') }}",
            method: 'POST',
            data: {
            type: 'module',
                    module_id: module_id,
                    "_token": '{{ csrf_token() }}'
            },
            success: function (data) {
                // console.log(data);
                window.location.reload();
            }
    });
    });
});
</script>
@endpush