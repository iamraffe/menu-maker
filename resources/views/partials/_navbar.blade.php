<nav id="navbar-primary" class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-primary-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-primary-collapse">
      <ul class="nav navbar-nav">
        <li class="{{ \Request::is('/') ? 'active' : '' }}">
            <a href="{{ url('/admin/menus') }}"><span class="ion ion-ionic"></span> Home</a>
        </li>
        @if(!$menu->multivsn)
            <li class="{{ \Request::is('admin/menus/'.str_slug($menu->name).'/edit') ? 'active' : '' }}">
                <a href="{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}"><span class="ion ion-ios-color-wand-outline"></span> Edit</a>
            </li>
            <li>
                <a href="{{ url('admin/pdf/'.str_slug($menu->name)) }}" target="_blank"><span class="ion ion-ios-eye-outline"></span> Preview</a>
            </li>
        @else
            <li class="dropdown">
              <a class="dropdown-toggle {{ \Request::is('admin/menus/'.str_slug($menu->name).'/edit') ? 'active' : '' }}" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="ion ion-ios-color-wand-outline"></span> Edit
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li>
                    <a href="{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}">
                        Full version
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/menus/'.str_slug($menu->name).'/shortened/edit') }}">
                        Short version
                    </a>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="ion ion-ios-eye-outline"></span> Preview
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li>
                    <a href="{{ url('admin/pdf/'.str_slug($menu->name)) }}" target="_blank">
                        Full version
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/pdf/'.str_slug($menu->name)).'/shortened' }}" target="_blank">
                        Short version
                    </a>
                </li>
              </ul>
            </li>
        @endif
        @if(!$menu->multivsn)
            <li>
                <a href="{{ url('admin/menus/'.str_slug($menu->name).'/save') }}" ><span class="ion ion-ios-reload"></span> Save</a>
            </li>
            <li>
                <a href="{{ url('admin/pdf/'.str_slug($menu->name).'/download') }}" ><span class="ion ion-ios-cloud-download-outline"></span> Download</a>
            </li>
        @else
            <li class="dropdown">
              <a class="dropdown-toggle" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="ion ion-ios-reload"></span> Save as
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li>
                    <a href="{{ url('admin/menus/'.str_slug($menu->name).'/save') }}">
                        Full version
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/menus/'.str_slug($menu->name).'/shortened/save') }}">
                        Short version
                    </a>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="ion ion-ios-cloud-download-outline"></span> Download
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li>
                    <a href="{{ url('admin/pdf/'.str_slug($menu->name).'/download') }}">
                        Full version
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/pdf/'.str_slug($menu->name).'/shortened/download') }}">
                        Short version
                    </a>
                </li>
              </ul>
            </li>
        @endif
        <li class="{{ \Request::is('admin/menus/'.str_slug($menu->name).'/archive') ? 'active' : '' }}">
            <a href="{{ url('admin/menus/'.str_slug($menu->name).'/archive') }}"><span class="ion ion-ios-filing-outline"></span> Archive</a>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle {{ \Request::is('admin/users/') ? 'active' : '' }}" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <span class="ion ion-ios-at-outline"></span>
            You
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li>
                <a href="#user" href="{{ url('admin/users/'.\Auth::user()->objectId) }}" data-toggle="modal" data-tab="profile">
                    <span class="ion ion-ios-person-outline"></span>
                    My profile
                </a>
            </li>
            <li>
                <a href="#user" href="{{ url('admin/users/'.\Auth::user()->objectId) }}" data-toggle="modal" data-tab="settings">
                    <span class="ion ion-ios-settings"></span>
                    Preferences
                </a>
            </li>
            <li role="separator" class="divider"></li>
            <li>
                <a href="{{ url('auth/logout') }}">
                    <span class="ion ion-log-out"></span>
                    Logout
                </a>
            </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
