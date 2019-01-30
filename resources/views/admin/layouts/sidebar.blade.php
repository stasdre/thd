<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span>House Plans</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('house-plan.index') }}"><i class="fa fa-circle-o"></i> View all Plans</a></li>
                    <li><a href="{{ route('house-plan.create') }}"><i class="fa fa-circle-o"></i> Create New Plan</a></li>
                </ul>
            </li>
            @role(['owner', 'admin'])
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Customer Management</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.create') }}"><i class="fa fa-user-plus"></i> New User</a></li>
                        <li><a href="{{ route('user.index') }}"><i class="fa fa-user-circle"></i> Customer Administration</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-sliders"></i>
                        <span>House Plans Settings</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('styles.index') }}"><i class="fa fa-circle-o"></i> Architectural Design Styles</a></li>
                        <li><a href="{{ route('collections.index') }}"><i class="fa fa-folder-o"></i> Specialty Collections</a></li>
                        <li><a href="{{ route('packages.index') }}"><i class="fa fa-folder-o"></i> Packages</a></li>
                        <li><a href="{{ route('foundation-options.index') }}"><i class="fa fa-folder-o"></i> Foundation Options</a></li>
                        <li><a href="{{ route('addons.index') }}"><i class="fa fa-folder-o"></i> Add-Ons</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-desktop"></i>
                        <span>Home page (Desktop)</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('gallery.index') }}"><i class="fa fa-photo"></i>Gallery</a></li>
                        <li><a href="{{route('home-page.desktop-dream')}}">DREAM HOME Text</a></li>
                        <li><a href="{{ route('home-page.desktop-best') }}">Best plans</a></li>
                        <li><a href="{{ route('home-page.desktop-favorite') }}">Favorite plans</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-mobile"></i>
                        <span>Home page (Mobile)</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i>
                        <span>Site Settings</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="{{ route('about-david.edit') }}"><i class="fa fa-pencil-square-o"></i> Home Page.</a></li>
                    </ul>
                </li>
            @endrole
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>