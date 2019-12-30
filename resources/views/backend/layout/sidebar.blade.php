    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <a href="{{ route('crm.profile') }}"><img class="app-sidebar__user-avatar" width="50" src="
          @if(empty(Auth::user()->image))
          {{ URL::to('/') }}/images/no-image.png
          @else
          {{ URL::to('/') }}/images/profile/{{ Auth::user()->image }}
          @endif
          " alt="User Image"></a>

          <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ Auth::user()->email }}</p>
          </div>
        </div>
        <ul class="app-menu">
          <li><a class="app-menu__item {{ (request()->segment(2) == '') ? 'active' : '' }}" href="/crm"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">{{ __('backend.dashboard') }}</span></a></li>

          <li><a class="app-menu__item {{ (request()->segment(2) == 'company') ? 'active' : '' }}" href="/crm/company"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">{{ __('backend.companies') }}</span></a></li>

          <li><a class="app-menu__item {{ (request()->segment(2) == 'contact') ? 'active' : '' }}" href="/crm/contact"><i class="app-menu__icon fa fa-address-card"></i><span class="app-menu__label">{{ __('backend.contacts') }}</span></a></li>

          <li><a class="app-menu__item {{ (request()->segment(2) == 'document') ? 'active' : '' }}" href="/crm/document" active><i class="app-menu__icon fa fa-folder"></i><span class="app-menu__label">{{ __('backend.documents') }}</span></a></li>

          <li class="treeview {{ (request()->segment(2) == 'task' || request()->segment(2) == 'event') ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">{{ __('backend.notes') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item {{ (request()->segment(2) == 'task') ? 'active' : '' }}" href="/crm/task"><i class="icon fa fa-circle-o"></i> {{ __('backend.tasks') }}</a></li>
              <li><a class="treeview-item {{ (request()->segment(2) == 'event') ? 'active' : '' }}" href="/crm/event"><i class="icon fa fa-circle-o"></i> {{ __('backend.events') }}</a></li>

            </ul>
          </li>

          <li class="treeview {{ (request()->segment(2) == 'payment' || request()->segment(2) == 'expense'  || request()->segment(2) == 'currency') ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-credit-card"></i><span class="app-menu__label">{{ __('backend.finance') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item {{ (request()->segment(2) == 'payment') ? 'active' : '' }}" href="/crm/payment"><i class="icon fa fa-circle-o"></i> {{ __('backend.payment') }}</a></li>
              <li><a class="treeview-item {{ (request()->segment(2) == 'expense') ? 'active' : '' }}" href="/crm/expense"><i class="icon fa fa-circle-o"></i> {{ __('backend.expense') }}</a></li>
              <li><a class="treeview-item {{ (request()->segment(2) == 'currency') ? 'active' : '' }}" href="/crm/currency"><i class="icon fa fa-circle-o"></i> {{ __('backend.currency') }}</a></li>

            </ul>
          </li>

          <li><a class="app-menu__item {{ (request()->segment(2) == 'service') ? 'active' : '' }}" href="/crm/service"><i class="app-menu__icon fa fa-bars"></i><span class="app-menu__label">{{ __('backend.services') }}</span></a></li>

          <li><a class="app-menu__item {{ (request()->segment(2) == 'employee') ? 'active' : '' }}" href="/crm/employee"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">{{ __('backend.employees') }}</span></a></li>

          <li><a class="app-menu__item {{ (request()->segment(2) == 'offer') ? 'active' : '' }}" href="/crm/offer"><i class="app-menu__icon fa fa-check"></i><span class="app-menu__label">{{ __('backend.offers') }}</span></a></li>
          <li><a class="app-menu__item {{ (request()->segment(2) == 'setting') ? 'active' : '' }}" href="/crm/setting"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">{{ __('backend.settings') }}</span></a></li>

          @if(Auth::user()->role == 0 && Auth::user()->status == 1)
          <li><a class="app-menu__item {{ (request()->segment(2) == 'user') ? 'active' : '' }}" href="/crm/user"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">{{ __('backend.users') }}</span></a></li>
          @endif

        </ul>
      </aside>