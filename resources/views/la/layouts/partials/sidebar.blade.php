<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                     <?php
                        
                       $user =  \Auth::user()->context_id;
               
                       $employee = \App\Models\Employee::find($user);
                       $upload = \App\Models\Upload::find($employee->profile_image);
                    if (!empty($employee->profile_image) && !empty($upload)){
                         $url_profile =  url("files/" . $upload->hash . DIRECTORY_SEPARATOR . $upload->name);
                    
                         ?>
                         <img src="<?php echo $url_profile; ?>" class="img-circle" alt="User Image" />
                         
                    <?php } else { ?>
                  
                          <img src="{{ Gravatar::fallback(asset('la-assets/img/user2-160x160.jpg'))->get(Auth::user()->email) }}" class="img-circle" alt="User Image" />
                          
                    <?php } ?>    
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>

                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        @if(LAConfigs::getByKey('sidebar_search'))
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
	                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        @endif
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!--<li class="header">MODULES</li>-->
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url(config('laraadmin.adminRoute')) }}"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
            <?php
            $menuItems = Dwij\Laraadmin\Models\Menu::where("parent", 0)->orderBy('hierarchy', 'asc')->get();
            ?>
            @foreach ($menuItems as $menu)
               <?php 
               //get de user roles
               $roles = \Auth::user()->roles();
               $rolesArray = array();
               // create similar array to compare roles
               foreach ($roles->get() as $role) {  
                    array_push( $rolesArray, (String)$role->id);        
               }
                // var_dump($rolesArray);   
                // var_dump(json_decode($menu->roles));
               //compare two array, if one or more roles in both, access to this menu
               if(count(array_intersect($rolesArray, json_decode($menu->roles))) > 0) { ?>
                    @if($menu->type == "module")
                        <?php
                        $temp_module_obj = Module::get($menu->name);
                        ?>
                        @la_access($temp_module_obj->id)
                      @if(isset($module->id) && $module->name == $menu->name)
                               <?php echo LAHelper::print_menu($menu ,true); ?>
                      @else
                         <?php echo LAHelper::print_menu($menu); ?>
                      @endif
                        @endla_access
                    @else
                        <?php echo LAHelper::print_menu($menu); ?>
                    @endif
               <?php } ?>     
            @endforeach
            <!-- LAMenus -->
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
