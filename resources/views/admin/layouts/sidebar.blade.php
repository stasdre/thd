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
          <i class="fa fa-magic"></i>
          <span>Inspiration</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('inspiration.index') }}"><i class="fa fa-file-o"></i> <span>Pages</span></a></li>
          <li><a href="{{route('inspiration-slider.index')}}"><i class="fa fa-sliders"></i> <span>Home page
                slider</span></a></li>
          <li><a href="{{route('inspiration-blocks.edit')}}"><i class="fa fa-th-large"></i> <span>Home page
                blocks</span></a></li>
          <li><a href="{{route('inspiration-products.index')}}"><i class="fa fa-tasks"></i> <span>Home page
                products</span></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-building-o"></i>
          <span>Builders</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('builders.index') }}"><i class="fa fa-users"></i> <span>Builders</span></a></li>
          <li><a href="{{ route('builders-preferred.index') }}"><i class="fa fa-list-ul"></i> <span>Builder Preferred
                Plans</span></a>
          </li>
          <li><a href="{{ route('builder-landing-blocks.edit') }}"><i class="fa fa-th-large"></i> <span>Landing
                blocks</span></a></li>
        </ul>
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
          <i class="fa fa-shopping-bag"></i>
          <span>E-commerce</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('order.index') }}"><i class="fa fa-shopping-cart"></i> Orders</a></li>
          <li><a href="{{ route('shipping.index') }}"><i class="fa fa-address-card-o"></i> Shipping Methods</a></li>
          <li><a href="{{ route('promo.index') }}"><i class="fa fa-money"></i> Promo Codes</a></li>
        </ul>
      </li>
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
          <li><a href="{{ route('foundation-options.index') }}"><i class="fa fa-folder-o"></i> Foundation Options</a>
          </li>
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
          <li><a href="{{ route('mobile-gallery.index') }}"><i class="fa fa-photo"></i>Gallery</a></li>
          <li><a href="{{route('mobile-favorite.index')}}">Favorite plans</a></li>
          <li><a href="{{route('mobile-new.index')}}">New plans</a></li>
          <li><a href="{{route('home-page.mobile-best')}}">Best plan</a></li>
          <li><a href="{{route('home-page.mobile-dream')}}">DREAM HOME Text</a></li>
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
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pencil-square-o"></i>
          <span>Pages</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('pages.about') }}"><i class="fa fa-address-card-o"></i> <span>AboutUs</span></a></li>
          <li><a href="{{ route('pages.index') }}"><i class="fa fa-file-o"></i> <span>Other</span></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder-o"></i>
          <span>Footer</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('footer-blocks.index') }}"><i class="fa fa-th-large"></i> <span>Blocks</span></a></li>
        </ul>
      </li>
      @endrole
      <li>
        <a href="/blog/wp-admin/"><i class="fa fa-sign-in"></i> <span>Blog</span></a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>