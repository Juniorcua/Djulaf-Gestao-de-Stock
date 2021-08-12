@extends('App')


@section('bread')
Disponibilidade de Medicamentos
@endsection

@section('crumbs')
disponiblidade
@endsection
@section('crumbs2')
registo
@endsection


@section('content')

@php
   function estado($farm_id,$med_id){
       $estado=DB::table('disponibilidades')
                    ->where('disponibilidades.farmaciaId',$farm_id)
                    ->where('disponibilidades.medicamentoId',$med_id)
                    ->select('disponibilidades.estado as estado')
                    ->first();

        return $estado;
   }
@endphp

<div class="col-sm-12">
                             <div class="card">

                                        <div class="card-body">
                                            <form action="{{url('dispo/show/'.$farmacia_id)}}" method="get" id="form">
                                                @csrf

                                             <div class="row">

                                            <div class="col-md-5">
                                                     <div class="form-group">
                                                       <label for="exampleInputEmail1">Filtrar Por Categeoria</label>
                                                         <div class="form-group">
                                                            <select style="height:39px;" class="form-control" id="categor" name="categor">
                                                                <option value="todas">Todas</option>

                                                                @foreach ($categorias as $ca)

                                                            <option @if($ca->id==$cat) selected="selected" @endif value="{{ $ca-> id}}">{{ $ca-> nome}}</option>

                                                                @endforeach

                                                            </select>
                                                         </div>
                                                     </div>
                                                 <hr>
                                            </div>


                                            <div class="colmd-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" style="color:white">Filtrar por categoria</label>
                                                </div>
                                                 <div class="form-group">
                                                    <button class="btn btn-success btn-sm ml-2" style="margin-top:-10px;" type="submit"> <i class="fa fa-search"></i> Filtrar</button>
                                                 </div>
                                            </div>

                                        </div>
                                            </form>


                                        </div>





                             <div class="col-md-12 col-sm-12 ">
                                <div class="row">
                                    <div class="col-md-10">


                                    </div>
                                    <div class="col-md-2">
                                        <div class="btn-group mb-2">
                                            <button title="operacoes com todos" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"
                                              aria-haspopup="true" aria-expanded="false">
                                             <i class="fa fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                              <button class="dropdown-item" id="submiter0" onclick="storeAll({{$farmacia_id}});"> Alocar todos </button>
                                              <button class="dropdown-item" onclick="enableAll({{$farmacia_id}},2);"> Disponibilzar todos </button>
                                              <button class="dropdown-item" onclick="enableAll({{$farmacia_id}},3);" > Indisponibilizar todos </button>

                                            </div>
                                          </div>
                                    </div>
                                    {{-- <div class="col-md-2"> --}}
                                    {{-- <button class="btn btn-success btn-sm mr-0" id="submiter0" type="button" onclick="storeAll({{$farmacia_id}});">Alocar todos <i class="fa fa-paper-plane-o"></i></button> --}}
                                    {{-- </div> --}}
                                </div>

                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2>Disponibilidade</h2>
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

                                    </ul>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">
                                    <form action="{{url('dispo/store/'.$farmacia_id)}}" method="post" id="form2">
                                        @csrf

                                      <div class="row">
                                          <div class="col-sm-12">
                                            <div class="card-box table-responsive">

                                    <table id="datatable" class="table table-striped jambo_table bulk_action table-sm" id="table_id">
                                      <thead>
                                        <tr>
                                                      <th>

                                                      </th>
                                                      <th class="column-title">ID </th>
                                                      <th class="column-title">Categoria </th>
                                                      <th class="column-title">Nome Medicamento</th>
                                                      <th class="column-title">Estado</th>
                                        </tr>
                                      </thead>


                                      <tbody>

                                        @foreach ($medicamentos as $fa)

                                        @php
                                             $recupera=estado($farmacia_id,$fa->id);
                                        @endphp

                                        <tr>
                                         <td class="a-center ">

                                         <input id="ck_{{$fa->id}}"  @if(!empty($recupera))
                                            @if($recupera->estado=='0')
                                                 checked
                                            @endif
                                        @endif

                                         onchange="store({{$farmacia_id}},{{$fa->id}})"

                                         type="checkbox"


                                            name="dispo[]">
                                        </td>
                                        <td>{{ $fa-> id}}</td>
                                        <td>{{ $fa-> Fcat}}</td>
                                        <td>{{ $fa-> nome}} <input class="d-none"  type="number" value="{{ $fa-> id}}" name="med[]" id=""></td>
                                        <td>
                                            {{-- <button id="submit2" class="" type="submit"></button> --}}
                                        {{-- @if ($fa->estado!=1)

                                        <span style="border-radius:5px;color:white" class="bg-success pl-1 pr-1"> dispon&iacute;vel</span>
                                        @else
                                        <span style="border-radius:5px;" class="bg-red pl-1 pr-1"> indispon&iacute;vel</span>

                                        @endif --}}




                                      <span id="report_{{$fa->id}}" class=" @if(!empty($recupera)) @if($recupera->estado=='0') badge badge-success @elseif($recupera->estado=='1') badge badge-danger

                                         @endif @else badge badge-light text-danger @endif ">
                                           @if(!empty($recupera))
                                             @if($recupera->estado=='0')
                                                 Disponivel
                                                   @elseif($recupera->estado=='1')
                                                 Indisponivel
                                                   @endif

                                             @else N&atilde;o alocado  @endif

                                            </span>

                                           </td>

                                        </tr>

                                       @endforeach

                                    </tbody>
                                    </table>
                                  </div>
                                  </div>
                              </div>
                             </form>
                            </div>
                                </div>
                              </div>
                           </div>



                                    {{--                      modal section                  --}}
                                    <!-- Large modal -->


                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="width:100%">
                    <div class="modal-dialog modal-lg modal-dialog-centered" >
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel"> Perfil da Farm&iacute;cia <i class="fa fa-building"></i></h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">

                            <div class="col-md-12 col-sm-12  ">
                                <div class="x_panel">
                                  <div class="x_title">

                                    <ul class="nav navbar-right panel_toolbox">

                                    </ul>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">

                                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                      <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Imagens da Farmacia</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Dados</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Cordenadas</a>
                                      </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class ="row">

                                            <div class="col-md-6">
                                                     <div class="form-group align-center">
                                                     <img id="img1" src="{{url('/Djulaf/1.jpg')}}" alt="" srcset="" style="width:100%;height:160px;"><br><br>
                                                            <label for="exampleInputEmail1" style="color:black">Imagem principal</label>
                                                            <div class="form-group">
                                                            <label id="pic1" class="btn btn-info col-md-12"><i class="fa fa-picture-o"></i> carregar Imagem</label>
                                                            <input style="height:40px;" id="imgP" name="imgP" type="file" class="d-none" placeholder="">
                                                               </div>
                                                     </div>
                                                </div>


                                                          <div class="col-md-6">
                                                        <div class="form-group">
                                                            <img id="img2" src="{{url('/Djulaf/2.jpg')}}" alt="" srcset="" style="width:100%;height:160px;"> <br><br>
                                                            <label for="exampleInputEmail1" style="color:black">Imagem de fundo</label>
                                                            <div class="form-group">
                                                            <label id="pic2" class="btn btn-info col-md-12"><i class="fa fa-picture-o"></i> carregar Imagem</label>
                                                            <input style="height:40px;" id="imgF" name="imgF" type="file" class="form-control d-none" placeholder="">
                                                               </div>
                                                               </div>
                                                        </div>

                                            </div>
                                      </div>
                                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">


                                            <div  class="col-md-12" >
                                                <p ><i class="feather icon-edit"></i>Nome: <span id="nomeR">;'osdfgk;sdfg</span>  </p><hr>
                                                <p ><i class="feather icon-phone"></i> Contacto: <span id="contactoR">;lkdsfg;lsdfkgm</span></p><hr>
                                                <p ><i class="feather icon-mail"></i> Email: <span id="emailR">sdflgjkgljsdgfjg</span></p><hr>
                                                <p ><i class="feather icon-map"></i> Endereço: <span id="enderecoR">klsdfglk</span></p><hr>
                                                <p ><i class="feather icon-map"></i> prov&iacute;ncia: <span id="prov">ljnsdfgkljsd</span></p><hr>
                                                <p ><i class="feather icon-map"></i> Distrito: <span id="dist">sdflgjnsgolsdf</span></p><hr>

                                             </div>

                                         </div>
                                      </div>
                                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                            booth letterpress, commodo enim craft beer mlkshk
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>

                      </div>
                    </div>
                  </div>

                         </div>




 <!-- jQuery -->
 <script src="{{url('/vendors/jquery/dist/jquery.min.js')}}"></script>

 <script>
$('#submiter0').on('click', function(){

$('#submiter1').click();

});
// var disponiblidade=new Array();

function check(id){
    if($('#ck_'+id).is(':checked')){
         return '0';
    }else{
        return '1';
    }
}

function store(farm_id,medId){

var disponiblidade={
                    "status":check(medId),
                    "medId":medId,
                    'type':0
                    };

// alert(disponiblidade.status);
         $.ajax({
                url: "/dispo/store/"+farm_id,
                type: "get",
                data: disponiblidade,

                success: function (res) {


                    // var get=res.response[0];
                   if(res==0){
                       $('#report_'+disponiblidade.medId).removeClass();
                       $('#report_'+disponiblidade.medId).addClass('badge badge-success');
                       $('#report_'+disponiblidade.medId).text('Disponivel');
                   }else{
                         $('#report_'+disponiblidade.medId).removeClass();
                       $('#report_'+disponiblidade.medId).addClass('badge badge-danger');
                       $('#report_'+disponiblidade.medId).text('Indisponivel');
                   }

                },
                error: function(xhr, status, error) {
                    alert('Verfifique a sua conexão \n'+'Descrição=>'+xhr.responseText);
                    // console.log(xhr.responseText);
                }
            });
}


function storeAll(farm_id){

    if(confirm('Tem a certeza, que deseja alocar todos os medicamentos desta categoria?')){

var disponiblidade={
                    // "status":check(medId),
                    "farmId":farm_id,
                    'type':1,
                    'category':$('#categor').val()
                    };

// alert(disponiblidade.status);
         $.ajax({
                url: "/dispo/store/"+farm_id,
                type: "get",
                data: disponiblidade,

                success: function (res) {

                    var recupera=res.Id;
                    var valida=res.count;
                   if(valida>0){
                    for(var i=0; i<recupera.length; i++){
                        $('#report_'+recupera[i].med_id).removeClass();
                       $('#report_'+recupera[i].med_id).addClass('badge badge-success');
                       $('#report_'+recupera[i].med_id).text('Disponivel');
                       $('#ck_'+recupera[i].med_id).prop('checked',true);
                    }
                   }else{
                       alert('Ups \n Os medicamentos dessa categoria foram anteriormente adicionados!')
                   }


                },
                error: function(xhr, status, error) {
                    alert('Verfifique a sua conexão \n'+'Descrição=>'+xhr.responseText);
                    // console.log(xhr.responseText);
                }
            });

    }
}

function enableAll(farm_id,type){

if(confirm('Tem a certeza, que deseja disponibilizar todos os medicamentos desta categoria?')){

var disponiblidade={
                // "status":check(medId),
                "farmId":farm_id,
                'type':type,
                'category':$('#categor').val()
                };

// alert(disponiblidade.status);
     $.ajax({
            url: "/dispo/store/"+farm_id,
            type: "get",
            data: disponiblidade,

            success: function (res) {

                var recupera=res.Id;
                var valida=res.count;
               if(valida>0){
                for(var i=0; i<recupera.length; i++){
                    if(type!=3){
                            $('#report_'+recupera[i].med_id).removeClass();
                            $('#report_'+recupera[i].med_id).addClass('badge badge-success');
                            $('#report_'+recupera[i].med_id).text('Disponivel');
                            $('#ck_'+recupera[i].med_id).prop('checked',true);
                    }else{
                            $('#report_'+recupera[i].med_id).removeClass();
                            $('#report_'+recupera[i].med_id).addClass('badge badge-danger');
                            $('#report_'+recupera[i].med_id).text('Indisponivel');
                            $('#ck_'+recupera[i].med_id).prop('checked',false);

                    }
                }
               }else{
                   alert('Ups \n Os medicamentos dessa categoria foram anteriormente adicionados!')
               }


            },
            error: function(xhr, status, error) {
                alert('Verfifique a sua conexão \n'+'Descrição=>'+xhr.responseText);
                // console.log(xhr.responseText);
            }
        });

}
}
</script>
@endsection
