    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> @yield('contentTitle', 'Default Blank Page Title')</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">@yield('contentTitle', 'Default Blank Page Title')</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">@yield('content','Create a beautiful dashboard')</div>
          </div>
        </div>
      </div>
    </main>