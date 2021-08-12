@extends('App')

@section('bread')
Formulário Registo Farmácia

@endsection

@section('crumbs')
Farmácia

@endsection
@section('crumbs2')
Registo
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







                                        <div class="card-body mb-0"  >

                                            <div class="row">

                                                <div class="col-md-12 col-sm-12 ">

                                                  <div class="x_panel">
                                                    <div class="col-md-12 col-sm-12 ">

                                                          <div class="x_title">
                                                            <h2>Dados importantes da Farmácia <small></small></h2>
                                                            <ul class="nav navbar-right panel_toolbox">
                                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                              </li>
                                                              <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                                <ul class="dropdown-menu" role="menu">
                                                                  <li><a href="#">Settings 1</a>
                                                                  </li>
                                                                  <li><a href="#">Settings 2</a>
                                                                  </li>
                                                                </ul>
                                                              </li>
                                                            </ul>
                                                            <div class="clearfix"></div>
                                                          </div>
                                                          <div class="x_content">



                                                      <!-- Smart Wizard -->
                                                      <p>Caro utilizador, preste a devida atenção no preenchimento dos dados subsequentes.</p>
                                                       <div id="wizard" class="form_wizard wizard_horizontal">
                                                        <ul class="wizard_steps">
                                                          <li>
                                                            <a href="#step-1">
                                                              <span class="step_no">1</span>
                                                              <span class="step_descr">
                                                                                Step 1<br />
                                                                                <bold>Dados da Farmácia</bold>
                                                                            </span>
                                                            </a>
                                                          </li>
                                                          <li>
                                                            <a href="#step-2">
                                                              <span class="step_no">2</span>
                                                              <span class="step_descr">
                                                                                Step 2<br />
                                                                                <bold>Imagens</bold>
                                                                            </span>
                                                            </a>
                                                          </li>
                                                          <li>
                                                            <a href="#step-3">
                                                              <span class="step_no">3</span>
                                                              <span class="step_descr">
                                                                                Step 3<br />
                                                                                <bold>Coordenadas</bold>
                                                                            </span>
                                                            </a>
                                                          </li>
                                                          <li>
                                                            <a href="#step-4">
                                                              <span class="step_no">4</span>
                                                              <span class="step_descr">
                                                                                Step 4<br />
                                                                                <bold>Finalização</bold>
                                                                            </span>
                                                            </a>
                                                          </li>
                                                        </ul>
                                                        <form action="{{url('/farmacia/save')}}" method="POST" id="form" enctype="multipart/form-data">
                                                        <div id="step-1" style="margin-bottom:-1000px">
                                                            @csrf
                                                            <div class ="row">
                                                                <div class="col-md-5">
                                                                         <div class="form-group">
                                                                                <label for="exampleInputEmail1"><i class="fa fa-edit"></i> Nome da Farmácia</label>
                                                                                <div class="form-group">
                                                                                <input style="height:38px;" type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome da farmácia" required>
                                                                                   </div>
                                                                         </div>
                                                                    </div>
                                                                <div class="col-md-3">
                                                                         <div class="form-group">
                                                                                <label for="exampleInputEmail1"><i class="fa fa-phone"></i> Contacto</label>
                                                                                <div class="form-group">
                                                                                <input style="height:38px;" type="number" class="form-control" id="contacto" name="contacto" placeholder="Insira o contacto" required>
                                                                                   </div>
                                                                         </div>
                                                                    </div>
                                                                <div class="col-md-4">
                                                                         <div class="form-group">
                                                                                <label for="exampleInputEmail1"><i class="fa fa-envelope"></i> E-mail</label>
                                                                                <div class="form-group">
                                                                                <input style="height:38px;" type="email" class="form-control" id="email" name="email" placeholder="Insira o email" required>
                                                                                   </div>
                                                                         </div>
                                                                    </div>
                                                                <div class="col-md-5">
                                                                         <div class="form-group">
                                                                                <label for="exampleInputEmail1"><i class="fa fa-map-marker"></i> Endereço</label>
                                                                                <div class="form-group">
                                                                                <input style="height:38px;" type="text" class="form-control" id="endereco" name="endereco" placeholder="Insira o endereco" required>
                                                                                   </div>
                                                                         </div>
                                                                    </div>

                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                           <label for="exampleInputEmail1"><i class="fa fa-map"></i> Província</label>
                                                                           <div class="form-group" >
                                                                               <select style="height:39px;" class="form-control" id="provincia" name="provincia" required>
                                                                                    <option value="">Selecione</option>

                                                                                      @foreach ($provincias as $pv)

                                                                               <option value="{{$pv -> id}}">{{$pv -> nome}}</option>

                                                                                      @endforeach

                                                                               </select>
                                                                          </div>
                                                                        </div>
                                                                   </div>

                                                                   <div class="col-md-4">
                                                                    <div class="form-group">
                                                                       <label for="exampleInputEmail1"><i class="fa fa-map"></i> Distrito</label>
                                                                       <div class="form-group" >
                                                                           <select style="height:39px;" class="form-control" id="distD" name="distD" required>
                                                                                <option value="">Selecione</option>

                                                                                  @foreach ($distritos as $dt)

                                                                           <option value="{{$dt -> id}}">{{$dt -> nome}}</option>

                                                                                  @endforeach

                                                                           </select>
                                                                      </div>
                                                                    </div>
                                                               </div>

                                                                </div>



                                                        </div>

                                                        <div id="step-2" style="margin-bottom:-1000px">

                                                            <div class ="row">

                                                                <div class="col-md-6">
                                                                         <div class="form-group align-center">
                                                                         <img id="img1" src="{{url('/Djulaf/1.jpg')}}" alt="" srcset="" style="width:100%;height:200px;"><br><br>
                                                                                <label for="exampleInputEmail1">Imagem principal</label>
                                                                                <div class="form-group">
                                                                                <label id="pic1" class="btn btn-info col-md-12"><i class="fa fa-picture-o"></i> carregar Imagem</label>
                                                                                <input style="height:40px;" id="imgP" name="imgP" type="file" class="d-none" placeholder="">
                                                                                   </div>
                                                                         </div>
                                                                    </div>


                                                                              <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <img id="img2" src="{{url('/Djulaf/2.jpg')}}" alt="" srcset="" style="width:100%;height:200px;"> <br><br>
                                                                                <label for="exampleInputEmail1">Imagem de fundo</label>
                                                                                <div class="form-group">
                                                                                <label id="pic2" class="btn btn-info col-md-12"><i class="fa fa-picture-o"></i> carregar Imagem</label>
                                                                                <input style="height:40px;" id="imgF" name="imgF" type="file" class="form-control d-none" placeholder="">
                                                                                   </div>
                                                                                   </div>
                                                                            </div>

                                                                </div>



                                                        </div>
                                                        <div id="step-3" style="margin-bottom:-1000px">

                                                          <div class ="row">
                                                            <div class="col-md-12">

                                                               <div id="chart_div" class="card" style="height:200px; margin-top:5px">

                                                               </div>

                                                            </div>

                                                        </div>
                                                        <div class ="row">

                                                            <div class="col-md-12 mt-2">
                                                                <input type="text" class="form-control" id="address" name="adress">
                                                            </div>
                                                        </div>

                                                          <div class ="row">

                                                            <div class="col-md-6">
                                                                     <div class="form-group">
                                                                            <label for="exampleInputEmail1"><i class="fa fa-map-marker"></i> Latitude:</label>
                                                                            <div class="form-group">
                                                                            <input style="height:38px;" id="latitude" name="latitude" type="text" class="form-control" placeholder="Insira a latitude">
                                                                               </div>
                                                                     </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1"><i class="fa fa-map-marker"></i> Longitude:</label>
                                                                            <div class="form-group">
                                                                            <input style="height:38px;" id="longitude" name="longitude" type="text" class="form-control" placeholder="Insira longitude">
                                                                               </div>
                                                                        </div>
                                                              </div>

                                                            </div>
                                                        </div>
                                                        <div id="step-4" style="margin-bottom:-1000px">
                                                            <div class="row">
                                                                <div  class="col-md-5">

                                                                    <img src="{{url('/Djulaf/2.jpg')}}" id="imgR" alt="" srcset="" style="width:100%;height:200px;">

                                                                </div>

                                                                <div  class="col-md-6" >
                                                                    <p ><i class="fa fa-edit"></i> Nome: <span id="nomeR"></span>  </p><hr>
                                                                    <p ><i class="fa fa-phone"></i> Contacto: <span id="contactoR"></span></p><hr>
                                                                    <p ><i class="fa fa-envelope"></i> Email: <span id="emailR"></span></p><hr>
                                                                    <p ><i class="fa fa-map-marker"></i> Endereço: <span id="enderecoR"></span></p><hr>
                                                                    <button class="btn btn-outline-info btn-md col-lg-12" style="text-align:center;"  type="submit"><i class="fa fa-save"></i> Submeter Dados</button>


                                                                 </div>

                                                             </div>
                                                            </div>
                                                    </form>

                                                      </div>

                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                            </div>
                                        </div>







 <!-- jQuery -->
 <script src="{{url('/vendors/jquery/dist/jquery.min.js')}}"></script>
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCogJ5y23TqNnEdFiHYVvjh_DjmKP-E5Xc"></script>





 <script>

    //  var maputo = {lat: -25.959621, lng: 32.578774};

  var map;
  var marker;
var myLatlng;
if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(function(position) {

            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
              adress:position.coords.formatted_address
            };
            myLatlng = new google.maps.LatLng(pos.lat, pos.lng);
            $('#longitude').val(pos.lng);
            $('#latitude').val(pos.lat);


            // infoWindow.setPosition(pos);
            // infoWindow.setContent('Location found.');
            // infoWindow.open(map);
            // map.setCenter(pos);
          }, function() {
            // handleLocationError(true, infoWindow, map.getCenter());
            myLatlng   = new google.maps.LatLng(-25.974926300798337, 32.58548814622327);
          });

}else{
myLatlng   = new google.maps.LatLng(-25.974926300798337, 32.58548814622327);
}






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





<script>

function see(){

    var nome=document.getElementById('nome').value;
    var contacto=document.getElementById('contacto').value;
    var email=document.getElementById('email').value;
    var endereco=document.getElementById('endereco').value;
}

$('#pic1').click(function(){

    $('#imgP').click();

});

$('#pic2').click(function(){

    $('#imgF').click();

});



$('#imgP').on('change', function() {
$('#img1').attr('src',window.URL.createObjectURL(this.files[0]));
$('#imgR').attr('src',window.URL.createObjectURL(this.files[0]));

var fileName = $(this)[0].files[0].name;
var query = fileName.split("-", 3);
    query.push('...');
    res = query.join(' ');
$('#pic1').html("<i class='fa fa-image'></i> "+res);

});


$('#imgF').on('change', function() {
$('#img2').attr('src',window.URL.createObjectURL(this.files[0]));

var fileName = $(this)[0].files[0].name;
var query = fileName.split("-", 3);
    query.push('...');
    res = query.join(' ');
$('#pic2').html("<i class='fa fa-image'></i> "+res);

});


//------------------------------------------

$('#nome').on('input', function(){
    $('#nomeR').text($('#nome').val());
    });
$('#contacto').on('input', function(){
    $('#contactoR').text($('#contacto').val());
    });
$('#email').on('input', function(){
    $('#emailR').text($('#email').val());
    });
$('#endereco').on('input', function(){
    $('#enderecoR').text($('#endereco').val());
    });
//-----------------------------------------------



</script>


@endsection
