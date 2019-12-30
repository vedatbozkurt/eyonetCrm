  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="/crm">WPanel</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!--Notification Menu-->
     {{--    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
    <i class="fa fa-bell-o fa-lg"></i></a>

       

          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 0  new notifications.</li>
            <div class="app-notification__content">


No message
            
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li> --}}

         <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Langueage Menu"><i class="fa fa-language fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="/lang/en"></i> English</a></li>
            <li><a class="dropdown-item" href="/lang/tr"></i> Türkçe</a></li>
          </ul>
        </li>
        
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="{{ route('crm.setting') }}"><i class="fa fa-cog fa-lg"></i> {{ __('backend.settings') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('crm.profile') }}"><i class="fa fa-user fa-lg"></i> {{ __('backend.profile') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> {{ __('backend.logout') }}</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form></li>
          </ul>
        </li>
      </ul>
    </header>