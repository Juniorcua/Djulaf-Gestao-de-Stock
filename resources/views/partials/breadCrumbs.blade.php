<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3> @yield('bread')  </h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i>Home</a></li>
            <li class="breadcrumb-item"><a href="#">@yield('crumbs')</a></li>
            <li class="breadcrumb-item"><a href="#">@yield('crumbs2')</a></li>
            </ul>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
