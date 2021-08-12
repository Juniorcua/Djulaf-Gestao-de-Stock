@extends('App')


@section('bread')
Perfil da Farmácia
@endsection

@section('crumbs')
Farmácia
@endsection
@section('crumbs2')
Perfil
@endsection


@section('content')



<div class="col-sm-12">
                             <div class="card">

                                        <div class="">

                                            <div class="col-md-12 col-sm-12 mt-2">

                                                  <div class="x_title">

                                                    <ul class="nav navbar-right panel_toolbox">

                                                    </ul>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                  <div class="x_content">

                                                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                                      <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-picture-o"></i> Dados e Imagens</a>
                                                      </li>
                                                      <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-map"></i> Cordenadas</a>
                                                      </li>

                                                    </ul>
                                                    <div class="tab-content" id="myTabContent">
                                                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                        <div class ="row">


                                                            <div class="col-md-3">
                                                                <form action="{{url('farmacia/updatePerfil/'.$farmacias->id)}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input class="d-none" type="text" value="1" name="caso" id="">
                                                                     <div class="form-group align-center">
                                                                     <span id="previousImg" class="d-none">{{url('/upload/farmacia/'.$farmacias->fotoP)}}</span>
                                                                     <img id="img1" src="{{url('/upload/farmacia/'.$farmacias->fotoP)}}" alt="" srcset="" style="width:100%;height:160px;"><br><br>
                                                                            <label for="exampleInputEmail1" style="color:black"><strong> <i class="fa fa-picture-o"></i> Imagem principal</strong></label>
                                                                            <div class="form-group">
                                                                            <label style="height:30px; width:90%" id="pic1" class="btn btn-info btn-sm col-md-12"><i class="fa fa-picture-o"></i> Alterar Imagem</label>
                                                                            <input style="height:40px;" id="imgP" name="imgP" type="file" class="d-none" placeholder="">
                                                                               </div>
                                                                     </div>
                                                                         <a id="cancel" style="color:white" class="btn btn-danger btn-sm d-none"> Cancelar <i class="fa fa-times-circle-o"></i></a>
                                                                         <button id="act" class="btn btn-outline-success btn-sm d-none" type="submit"> Actualizar <i class="fa fa-refresh"></i></button>
                                                                        </form>


                                                                        <h4 class="mt-2" style="color:black"> <strong> <i class="fa fa-medkit "></i> Medicamentos </strong></h4>
                                                                        <hr>
                                                                        <a href="/dispo/show/{{$farmacias->id}}" title="painel de disponiblidade" style="color:white" class="btn btn-success btn-sm"> Gerir Disponibiliade <i class="fa fa-external-link"></i></a>

                                                                        </div>


                                                                <div  class="col-md-9 ml-0 mr-0"  style="color:black">

                                                                    <form action="{{url('farmacia/updatePerfil/'.$farmacias->id)}}" method="post">
                                                                        @csrf

                                                                    <input class="d-none" type="text" value="2" name="caso" id="">
                                                                    <h2> <strong> Detalhes da Farmácia </strong> <i class="fa fa-building"></i></h2> <hr>
                                                                    <div class="col-md-12 col-sm-6  ">

                                                                            <table class="table table-striped">
                                                                              <thead>
                                                                                <tr>
                                                                                  <th> <i class="fa fa-edit"></i> Nome</th>
                                                                                  <th><i class="fa fa-phone"></i> Contacto</th>
                                                                                  <th><i class="fa fa-envelope"></i> Email</th>

                                                                                 </tr>
                                                                              </thead>
                                                                              <tbody>
                                                                                <tr>
                                                                                  <th><i class="feather icon-edit"></i> {{$farmacias->nome}}</th>
                                                                                  <td>{{$farmacias->contacto}}</td>
                                                                                  <td>{{$farmacias->email}}</td>

                                                                                </tr>

                                                                                <tr>
                                                                                    <th ><input type="text" value="{{$farmacias->nome}}" class="form-control d-none mt-1"  name="nome" id="nome" ></th>
                                                                                    <td><input style="width:130px;" type="number" value="{{$farmacias->contacto}}" class="form-control d-none mt-1"  name="contacto" id="contacto" ></td>
                                                                                    <td><input type="email" value="{{$farmacias->email}}" class="form-control d-none mt-1"  name="email" id="email"></td>
                                                                                       </tr>
                                                                               </tbody>
                                                                            </table>


                                                                            <table class="table table-striped">
                                                                                <thead>
                                                                                  <tr>
                                                                                    <th><i class="fa fa-map-marker"></i> Endereço</th>
                                                                                    <th><i class="fa fa-map"></i> prov&iacute;ncia</th>
                                                                                    <th><i class="fa fa-map"></i> Districto</th>

                                                                                  </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                  <tr>
                                                                                    <td>{{$farmacias->endereco}}</td>
                                                                                    <td>{{$farmacias->Fprov}}</td>
                                                                                    <td>{{$farmacias->dt}}</td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                    <td><input type="text" value="{{$farmacias->endereco}}" class="form-control d-none mt-1"  name="endereco" id="endereco"></td>

                                                                                      <td>
                                                                                          <select style="height:39px;" class="form-control d-none mt-1" name="provincia" id="provincia" required>

                                                                                              @foreach ($provincias as $pv)

                                                                                       <option @if ($farmacias->provinciaId == $pv->id)
                                                                                           selected="selected"
                                                                                       @endif  value="{{$pv -> id}}">{{$pv->nome}}</option>

                                                                                              @endforeach

                                                                                       </select>
                                                                                      </td>
                                                                                      <td>
                                                                                          <select style="height:39px;" class="form-control d-none mt-1"  name="distrito" id="distrito" required>

                                                                                              <option value="">Selecione</option>

                                                                                                @foreach ($distritos as $dt)

                                                                                         <option @if ($farmacias->distritoId == $dt->id)
                                                                                          selected="selected"
                                                                                      @endif value="{{$dt -> id}}">{{$dt -> nome}}</option>

                                                                                                @endforeach

                                                                                         </select>
                                                                                      </td>
                                                                                    </tr>
                                                                                 </tbody>
                                                                              </table>

                                                                          </div>
                                                                        <hr>
                                                                    <a id="edit1" style="color:white" class="btn btn-success btn-sm"> Editar Texto <i class="fa fa-edit"></i></a>
                                                                    <a id="c1" style="color:white" class="btn btn-danger btn-sm d-none"> Cancelar <i class="fa fa-times-circle-o"></i></a>
                                                                    <button id="sub" type="submit" class="btn btn-primary btn-sm d-none"> Actualizar <i class="fa fa-refresh"></i></button>
                                                                    </form>


                                                                </div>
                                                            </div>
                                                      </div>
                                                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                        <div class ="row">

                                                            <div class="col-md-4">
                                                                <form action="{{url('farmacia/updatePerfil/'.$farmacias->id)}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input class="d-none" type="text" value="3" name="caso" id="">
                                                                     <div class="form-group align-center">
                                                                        <span id="previousImg2" class="d-none">{{url('/upload/farmacia/'.$farmacias->fotoF)}}</span>
                                                                     <img id="img2" src="{{url('/upload/farmacia/'.$farmacias->fotoF)}}" alt="" srcset="" style="width:100%;height:180px;"><br><br>
                                                                            <label for="exampleInputEmail1" style="color:black"><strong> <i class="fa fa-picture-o"></i> Imagem de fundo</strong></label>
                                                                            <div class="form-group">
                                                                            <label style="height:30px; width:90%" id="pic2" class="btn btn-info btn-sm col-md-12"><i class="fa fa-picture-o"></i> Alterar Imagem</label>
                                                                            <input style="height:40px;" id="imgF" name="imgF" type="file" class="d-none" placeholder="">
                                                                               </div>
                                                                     </div>
                                                                         <a id="cancelb" style="color:white" class="btn btn-danger btn-sm d-none"> Cancelar <i class="fa fa-times-circle-o"></i></a>
                                                                         <button id="act1" class="btn btn-outline-success btn-sm d-none" type="submit"> Actualizar <i class="fa fa-refresh"></i></button>
                                                                 </form>
                                                             </div>

                                                                <div  class="col-md-8"  style="color:black">
                                                                    <div class ="row">
                                                                        <div class="col-md-12">

                                                                           <div id="chart_div" class="card" style="height:150px; margin-top:5px">

                                                                           </div>

                                                                        </div>

                                                                    </div>
                                                                <form action="{{url('farmacia/updatePerfil/'.$farmacias->id)}}" method="post">
                                                                    @csrf
                                                                    <input class="d-none" type="text" value="4" name="caso" id="">
                                                                    <div class ="row">

                                                                        <div class="col-md-12 mt-2">
                                                                            <input type="text" value="{{$farmacias->adress}}" class="form-control" id="address" name="adress">
                                                                        </div>
                                                                    </div>

                                                                      <div class ="row">

                                                                        <div class="col-md-6">
                                                                                 <div class="form-group">
                                                                                        <label for="exampleInputEmail1"><i class="fa fa-map-marker"></i> Latitude:</label>
                                                                                        <div class="form-group">
                                                                                        <input style="height:38px;" value="{{$farmacias->latitude}}" id="latitude" name="latitude" type="text" class="form-control" placeholder="Insira a latitude">
                                                                                           </div>
                                                                                 </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1"><i class="fa fa-map-marker"></i> Longitude:</label>
                                                                                        <div class="form-group">
                                                                                        <input style="height:38px;" value="{{$farmacias->longitude}}" id="longitude" name="longitude" type="text" class="form-control" placeholder="Insira longitude">
                                                                                           </div>
                                                                                    </div>
                                                                          </div>
                                                                         <button type="submit" class="btn btn-primary btn-sm ml-2"> Actualizar <i class="fa fa-refresh"></i></button>

                                                                        </div>
                                                        </form>
                                                                </div>
                                                            </div>





                                                      </div>
                                                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>







                                        </div>

                             </div>
                                    <!-- Input group -->



 <!-- jQuery -->

 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCogJ5y23TqNnEdFiHYVvjh_DjmKP-E5Xc"></script>
 <script src="{{url('/vendors/jquery/dist/jquery.min.js')}}"></script>


 <script>
$('#pic1').click(function(){

$('#imgP').click();

});

$('#pic2').click(function(){

$('#imgF').click();

});

$('#cancel').click(function(){
    $('#img1').attr('src',$('#previousImg').text());
    $('#pic1').html("<i class='fa fa-image'></i> Alterar imagem ");
    $('#cancel').addClass('d-none');
    $('#act').addClass('d-none');

});

$('#cancelb').click(function(){
    $('#img2').attr('src',$('#previousImg2').text());
    $('#pic2').html("<i class='fa fa-image'></i> Alterar imagem ");
    $('#cancelb').addClass('d-none');
    $('#act1').addClass('d-none');
});


$('#imgP').on('change', function() {
$('#img1').attr('src',window.URL.createObjectURL(this.files[0]));
$('#imgR').attr('src',window.URL.createObjectURL(this.files[0]));

var fileName = $(this)[0].files[0].name;
var query = fileName.split("-", 3);
query.push('...');
res = query.join(' ');
$('#pic1').html("<i class='fa fa-image'></i> "+res);

$('#cancel').removeClass('d-none');
$('#act').removeClass('d-none')

});


$('#imgF').on('change', function() {
$('#img2').attr('src',window.URL.createObjectURL(this.files[0]));

var fileName = $(this)[0].files[0].name;
var query = fileName.split("-", 3);
query.push('...');
res = query.join(' ');
$('#pic2').html("<i class='fa fa-image'></i> "+res);

$('#cancelb').removeClass('d-none');
$('#act1').removeClass('d-none')

});



$('#edit1').click(function(){

$('#nome').removeClass('d-none');
$('#contacto').removeClass('d-none');
$('#email').removeClass('d-none');
$('#endereco').removeClass('d-none');
$('#provincia').removeClass('d-none');
$('#distrito').removeClass('d-none');
$('#c1').removeClass('d-none');
$('#sub').removeClass('d-none');
});

$('#c1').click(function(){

$('#nome').addClass('d-none');
$('#contacto').addClass('d-none');
$('#email').addClass('d-none');
$('#endereco').addClass('d-none');
$('#provincia').addClass('d-none');
$('#distrito').addClass('d-none');
$('#c1').addClass('d-none');
$('#sub').addClass('d-none');
});
</script>


<script>

    //  var maputo = {lat: -25.959621, lng: 32.578774};

  var map;
  var marker;
var myLatlng;


myLatlng   = new google.maps.LatLng('{{$farmacias->latitude}}', '{{$farmacias-> longitude}}');





  var geocoder = new google.maps.Geocoder();
  var infowindow = new google.maps.InfoWindow();

  function initialize(){
      navigator.geolocation
      var mapOptions = {
          zoom: 18,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      map = new google.maps.Map(document.getElementById("chart_div"), mapOptions);

      marker = new google.maps.Marker({
          map: map,
          position: myLatlng,
          draggable: true
      });

      geocoder.geocode({'latLng': myLatlng }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            $('#latitude,#longitude').show();
            $('#address_map').val(results[0].formatted_address);
            $('#lat').val(marker.getPosition().lat());
            $('#long').val(marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          }
        }
      });

      google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
            //   $('#address_map').val(results[0].formatted_address);
              $('#address').val(results[0].formatted_address);
                      //form view
                      $('#latitude').val(marker.getPosition().lat());
                      $('#longitude').val(marker.getPosition().lng());

                      //maps view
                    //   $('#lat').val(marker.getPosition().lat());
                    //   $('#long').val(marker.getPosition().lng());

                      infowindow.setContent(results[0].formatted_address);
                      infowindow.open(map, marker);
                    }
                  }
                });
      });

    }

  google.maps.event.addDomListener(window, 'load', initialize);


// var map, infoWindow;
//       function initMap() {
//         map = new google.maps.Map(document.getElementById('map'), {
//           center: {lat: -34.397, lng: 150.644},
//           zoom: 6
//         });
//         infoWindow = new google.maps.InfoWindow;

//         // Try HTML5 geolocation.
//         if (navigator.geolocation) {
//           navigator.geolocation.getCurrentPosition(function(position) {
//             var pos = {
//               lat: position.coords.latitude,
//               lng: position.coords.longitude
//             };

//             infoWindow.setPosition(pos);
//             infoWindow.setContent('Location found.');
//             infoWindow.open(map);
//             map.setCenter(pos);
//           }, function() {
//             handleLocationError(true, infoWindow, map.getCenter());
//           });
//         } else {
//           // Browser doesn't support Geolocation
//           handleLocationError(false, infoWindow, map.getCenter());
//         }
//       }

//       function handleLocationError(browserHasGeolocation, infoWindow, pos) {
//         infoWindow.setPosition(pos);
//         infoWindow.setContent(browserHasGeolocation ?
//                               'Error: The Geolocation service failed.' :
//                               'Error: Your browser doesn\'t support geolocation.');
//         infoWindow.open(map);
//       }

  </script>

@endsection
