<!-- top navigation -->
@php
    $userRole=DB::table('role_summaries')
                    ->where('user_id',Auth::user()->id)
                    ->first();
@endphp
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{url('/images/img.png')}}" alt="">{{Auth::user()->name}}
                    <span class="badge badge-primary">{{$userRole->description}}</span>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  document.getElementById('logout-form').submit();">Sai <i class="fa fa-sign-out pull-right"></i></a>
                    <a class="dropdown-item" href="/usuario/perfil"><i class="fa fa-user"></i> Perf&iacute;l </a>
                    <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Sair Do Sistema</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
                </div>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
