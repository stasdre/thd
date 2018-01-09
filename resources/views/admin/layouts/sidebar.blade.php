<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="treeview @if(Request::is('*/house-plan*')) menu-open @endif">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span>House Plans</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu" @if(Request::is('*/house-plan*')) style="display:block;" @endif>
                    <li><a href="{{ route('house-plan.index') }}"><i class="fa fa-circle-o"></i> View all Plans</a></li>
                    <li><a href="{{ route('house-plan.create') }}"><i class="fa fa-circle-o"></i> Create New Plan</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>