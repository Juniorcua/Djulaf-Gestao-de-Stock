@php
    $userRole=DB::table('role_summaries')
                    ->where('user_id',Auth::user()->id)
                    ->first();
@endphp
<!DOCTYPE html>
<html>
<head>
	@include('admin.partials.head')
</head>
<body class="nav-md">
  <div class="container body">
      <div class="main_container">
      	@include('admin.partials.side-menu')
      	@include('admin.partials.header')

      	<div class="right_col" role="main">
      	  @yield('content')
      	</div>

      </div>
   </div>
   @include('admin.partials.footer-javascript')
</body>
</html>
