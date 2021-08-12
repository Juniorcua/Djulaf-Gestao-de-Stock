<!DOCTYPE html>
<html lang="en">
<head>

@include('partials.head')
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">

          @include('partials.sideMenu')

         @include('partials.Header')

             @include('partials.breadCrumbs')

               <div class="row">

                @yield('content')


               </div>
            </div>
        </div>

        @include('partials.footer')

    </div>
</div>


@include('partials.Javascripts')

</body>
</html>
