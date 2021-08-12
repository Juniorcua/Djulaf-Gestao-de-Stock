 {{-- User Profile --}}
 @php
$userRole=DB::table('role_summaries')
                ->where('user_id',Auth::user()->id)
                ->first();
@endphp
 @extends('App')

@section('bread')
Perf&iacute;l do Usuario
@endsection

@section('crumbs')
usu&aacute;rio
@endsection
@section('crumbs2')
Perf&iacute;l
@endsection


@section('content')

<div class="col-md-12">
    <div class="">
      @if(session('warning'))
          <div class ="alert alert-info">
             <button data-dismiss="alert" class="close"> x </button>
              <i class="fa fa-check-circle"></i>  {{session('warning')}}
          </div>
      @endif

       @if(session('info'))
          <div class ="alert alert-info">
              <button data-dismiss="alert" class="close"> x </button>
              <i class="fa fa-check-info"></i>  {{session('info')}}
          </div>
       @endif

       @if(session('success'))
          <div class ="alert alert-success">
             <button data-dismiss="alert" class="close"> x </button>
             <i class="fa fa-check-circle"></i>  {{session('success')}}
          </div>
        @endif

    </div>
</div>




                         <div class="col-sm-12">
                             <div class="card">
                                 <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 ">

                                            <div class="x_title">
                                              <h2>Painel de Dados<small></small></h2>
                                              <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                      <a class="dropdown-item" href="#">Settings 1</a>
                                                      <a class="dropdown-item" href="#">Settings 2</a>
                                                    </div>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                              </ul>
                                              <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                              <div class="col-md-3 col-sm-3  profile_left">
                                                <div class="profile_img">
                                                  <div id="crop-avatar">
                                                    <!-- Current avatar -->
                                                    <img style="width:100px;margin-bottom:0px;margin-left: 4px;" class="img-responsive avatar-view" src="{{url('/images/img.png')}}" alt="Avatar" title="Change the avatar">
                                                  </div>
                                                </div>
                                                <h3>{{auth::user()->name}}</h3>

                                                <ul class="list-unstyled user_data">
                                                  <li><i class="fa fa-envelope-o user-profile-icon"></i> Email: {{auth::user()->email}}
                                                  </li>

                                                  <li>
                                                    <i class="fa fa-building-o user-profile-icon"></i> F&aacute;rmacia: {{auth::user()->email}}
                                                  </li>
                                                  <li>
                                                    <i class="fa fa-cogs user-profile-icon"></i> Papel: {{$userRole->description}}
                                                  </li>
                                                </ul>
                                                <hr>
                                                <br />


                                              </div>

                                              <div class="col-md-9 col-sm-9 ">

                                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Farm&aacute;cias Alocadas</a>
                                                      </li>
                                                      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">....</a>
                                                      </li>

                                                    </ul>
                                                    <div id="myTabContent" class="tab-content">
                                                      <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                                                        <!-- start user projects -->
                                                        <table class="table table-striped jambo_table bulk_action table-md">
                                                            <thead style="background: skyblue;">
                                                              <tr>
                                                                <th><i class="fa fa-cog"></i> Ordem</th>
                                                                <th><i class="fa fa-picture-o"></i> Foto</th>
                                                                <th><i class="fa fa-pencil-square-o"></i> Nome</th>
                                                                <th class="hidden-phone"><i class="fa fa-phone"></i> Contacto</th>
                                                                <th><i class="fa fa-map"></i> Endere&ccedil;o</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td>1</td>
                                                                <td><img src="{{url('/images/img.png')}}" style="width: 25px" alt="" srcset=""> </td>
                                                                <td>Farmacia Junior</td>
                                                                <td class="hidden-phone">84 585 2093</td>
                                                                <td class="vertical-align-mid"> erkjerjklsfjkfwflj</td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                          <!-- end user projects -->

                                                      </div>


                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>



                                 </div>

 <!-- jQuery -->
 <script src="{{url('/vendors/jquery/dist/jquery.min.js')}}"></script>

 <script>
function edit2(id){

$('#bairro').val($('#nome_'+id).val());
$('#contacto').val($('#categoria_'+id).val());

}

 </script>


{{-- //=================================================================== --}}


                         </div>
                         </div>
                         <script src="{{url('/assets/js/Jquery.js')}}"></script>
                         <link href="{{ asset('DataTables/DataTables-1.10.18/js/jquery.dataTables.js') }}"  rel="stylesheet"/>


@endsection

