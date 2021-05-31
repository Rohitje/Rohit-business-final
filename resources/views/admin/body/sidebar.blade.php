<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="{{ url('/') }}">
          <span class="brand-name">Rohit's Dashboard</span>
        </a>
      </div>
      <!-- begin sidebar scrollbar -->
      <div class="sidebar-scrollbar">
        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
            <li class="has-sub active expand" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                aria-expanded="false" aria-controls="dashboard">
                <i class="mdi mdi-home"></i>
                <span class="nav-text">Home</span> <b class="caret"></b>
              </a>
              <ul  class="collapse show"  id="dashboard"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                      <li class="active">
                        <a class="sidenav-item-link" href="{{ route('home.about') }}">
                          <span class="nav-text">Home About</span>
                        </a>
                      </li>
                      <li class="active">
                        <a class="sidenav-item-link" href="{{ route('all.category') }}">
                          <span class="nav-text">Category</span>
                        </a>
                      </li>
                      <li class="active">
                        <a class="sidenav-item-link" href="{{ route('multi.image') }}">
                          <span class="nav-text">Home Portfolio</span>
                        </a>
                      </li>
                      <li class="active">
                        <a class="sidenav-item-link" href="{{ route('all.brand') }}">
                          <span class="nav-text">Home Brand</span>
                        </a>
                      </li>
                      <li class="active">
                        <a class="sidenav-item-link" href="{{ route('home.slider') }}">
                          <span class="nav-text">Slider</span>
                        </a>
                      </li>
                </div>
              </ul>
            </li>
            <li class="has-sub">
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-elements"
                aria-expanded="false" aria-controls="ui-elements">
                <i class="mdi mdi-message"></i>
                <span class="nav-text">Contact</span> <b class="caret"></b>
              </a>
              <ul class="collapse"  id="ui-elements"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                  <li class="active">
                    <a class="sidenav-item-link" href="{{ route('admin.contact') }}">
                      <span class="nav-text">Contact Profiles</span>
                    </a>
                  </li>
                  <li class="active">
                    <a class="sidenav-item-link" href="{{ route('admin.message') }}">
                      <span class="nav-text">Contacts Messages</span>
                    </a>
                  </li>
                </div>
              </ul>
            <li class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
                aria-expanded="false" aria-controls="pages">
                <a href="{{ route('profile.update') }}">
                  <i class="mdi mdi-account"></i>
                  <span class="nav-text">User's Profile</span>
                </a>
              </a>
            </li>
        </ul>
      </div>
      <hr class="separator" />
    </div>
  </aside>