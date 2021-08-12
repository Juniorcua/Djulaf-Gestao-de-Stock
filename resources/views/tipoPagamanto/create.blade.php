@extends('App')

@section('bread')
Formulário Registo Tipo Pagamento
@endsection

@section('crumbs')
Província
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




                         <div class="col-sm-12">
                             <div class="card">
                             <form action="{{url('/tipoPagamento/save')}}" id="form" method="POST">
                             @csrf
                                        <div class="card-body">
                                            <h5></h5>
                                            <hr>
                                            <div class="row">

                                                <div class="col-md-7">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Descrição do Tipo:</label>
                                                            <div class="form-group">
                                                            <input type="text" class="form-control" name="tipoP" id="tipoP" style="height: 38px;"placeholder="Insira o Tipo de Pagamento">
                                                               </div>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-sm-5 mt-4">

                                                    <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-save"></i> Registar </button>

                                                    <button type="reset" class="btn btn-outline-info btn-sm"><i class="fa fa-trash"></i> Limpar </button>

                                                    <a type="" id="cancel" class="btn btn-outline-light btn-sm d-none" onclick="cancel()"><i class="fa fa-times-circle"></i> Cancelar </a>
                                                </div>
                                            </div>


                                 </form>


                                            <hr>
                                        </div>



                                <div class="col-md-12 col-sm-12 ">
                                    <div class="x_panel">
                                      <div class="x_title">
                                        <h2>Tipos de Pagamentos Registados</h2>
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
                                          <div class="row">
                                              <div class="col-sm-12">
                                                <div class="card-box table-responsive">

                                        <table id="datatable" class="table table-striped table-bordered table-sm" style="width:100%">
                                          <thead>
                                            <tr>
                                              <th><i class="fa fa-asterisk"></i> Ordem</th>
                                               <th><i class="fa fa-file-text"></i> Descrição</th>
                                              <th><i class="fa fa-cogs"></i> Operações</th>

                                            </tr>
                                          </thead>


                                          <tbody>

                                            @foreach($tipopagamentos as $tp)

                                            <tr>
                                            <td>{{ $tp -> id}}</td>
                                            <td id="tipoP_{{$tp->id}}">{{$tp->descricao}}</td>
                                              <td>
                                                <button onclick="edit({{$tp->id}})" id="btn_{{$tp->id}}" class="btn btn-primary btn-sm pt-0 pb-0 pr-1 pl-1 mb-0" ><i class="fa fa-edit"></i></button>
                                                <a href="/tipoPagamento/delete/{{$tp->id}}" class="btn btn-danger btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-trash-o"></i></a>
                                             </td>
                                            </tr>

                                            @endforeach


                                          </tbody>
                                        </table>
                                      </div>
                                      </div>
                                  </div>
                                </div>
                                    </div>
                                  </div>


                                </div>
                             </div>
                                    <!-- Input group -->
<!-- jQuery -->
<script src="{{url('/vendors/jquery/dist/jquery.min.js')}}"></script>


                                    <script>
                                     function edit(id){

                                         $('#tipoP').val($('#tipoP_'+id).text());
                                         $('#form').attr('action','/tipoPagamento/edit/'+id);

                                         $('#form').attr('action','/tipoPagamento/edit/'+id);
                                            $('#cancel').removeClass('d-none');

                                              }

           function cancel(){
            $('#form').attr('action','/tipoPagamento/save');
            $('#form').trigger('reset');
            $('#cancel').addClass('d-none');
           }
                                    </script>

                         </div>




@endsection
