@extends('la.layouts.app')

@section('htmlheader_title')
	Experience View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	<div class="bg-primary clearfix">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-3">
					<!--<img class="profile-image" src="{{ asset('la-assets/img/avatar5.png') }}" alt="">-->
					<div class="profile-icon text-primary"><i class="fa {{ $module->fa_icon }}"></i></div>
				</div>
				<div class="col-md-9">
					<h1 class="name" style="padding-top: 20px">{{ $experience->$view_col }}</h1>
					
				</div>
			</div>
		</div>
		<div class="col-md-3">
			
		</div>
		<div class="col-md-4">
			
		</div>
		<div class="col-md-1 actions">
			@la_access("Experiences", "edit")
				<a href="{{ url(config('laraadmin.adminRoute') . '/experiences/'.$experience->id.'/edit') }}" class="btn btn-xs btn-edit btn-default"><i class="fa fa-pencil"></i></a><br>
			@endla_access
			
			@la_access("Experiences", "delete")
				{{ Form::open(['route' => [config('laraadmin.adminRoute') . '.experiences.destroy', $experience->id], 'method' => 'delete', 'style'=>'display:inline']) }}
					<button class="btn btn-default btn-delete btn-xs" type="submit"><i class="fa fa-times"></i></button>
				{{ Form::close() }}
			@endla_access
		</div>
	</div>

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/experiences') }}" data-toggle="tooltip" data-placement="right" title="Back to Experiences"><i class="fa fa-chevron-left"></i></a></li>
		<li class="active"><a role="tab" data-toggle="tab" class="active" href="#tab-general-info" data-target="#tab-info"><i class="fa fa-bars"></i> Experiencia</a></li>
		
	</ul>

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active fade in" id="tab-info">
			<div class="tab-content">
				<div class="panel infolist">

					<div class="panel-body">
						@la_display($module, 'company')
						@la_display($module, 'logo')
						@la_display($module, 'begin')
						@la_display($module, 'end')
						@la_display($module, 'description')
                  @la_display($module, 'user_id')
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	</div>
	</div>
</div>
@endsection
