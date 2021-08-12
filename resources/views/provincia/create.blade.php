@extends('App')

@section('bread')
Formulário Registo Província
@endsection

@section('crumbs')
Província
@endsection
@section('crumbs2')
Registo
@endsection
@section('Provincia')
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
                             <form action="{{url('/provincia/save')}}" id="form" method="POST">
                             @csrf
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-7">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Descrição da Província:</label>
                                                            <div class="form-group">
                                                            <input type="text" class="form-control" name="nomeP" id="nomeP" style="height: 38px;"placeholder="Insira a Província">
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



                                <div class="col-md-12 col-sm-12 mt-0">
                                      <div class="x_title">
                                        <h2>Províncias registadas</h2>
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
                                          <div class="row">
                                              <div class="col-sm-12">
                                                <div class="card-box table-responsive">

                                        <table id="datatable" class="table table-striped jambo_table bulk_action table-sm" >
                                          <thead>
                                            <tr>
                                              <th><i class="fa fa-asterisk"></i> Ordem</th>
                                              <th><i class="fa fa-file-text"></i> Descrição</th>
                                              <th><i class="fa fa-asterisk"></i> Estado</th>
                                              <th><i class="fa fa-cogs"></i> Operações</th>

                                            </tr>
                                          </thead>


                                          <tbody>

                                            @foreach($provincias as $prov)

                                            <tr>
                                            <td>{{ $prov -> id}}</td>
                                            <td id="nome_{{$prov->id}}">{{$prov->nome}}</td>
                                            <td>
                                                @if ($prov->estado!=1)

                                                <span style="border-radius:5px;color:white" class="badge badge-success"> activo</span>
                                                @else
                                                <span style="border-radius:5px;" class="badge badge-danger"> inactivo</span>

                                                @endif
                                                </td>
                                              <td>
                                                <button onclick="edit({{$prov->id}})" id="btn_{{$prov->id}}" class="btn btn-primary btn-sm pt-0 pb-0 pr-1 pl-1 mb-0" ><i class="fa fa-edit"></i></button>
                                                @if($prov->estado!=1)
                                                <a href="/provincia/delete/{{$prov->id}}/1" title="desactivar" class="btn btn-danger btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-trash-o"></i></a>
                                                @else
                                                <a href="/provincia/delete/{{$prov->id}}/0" title="activar" class="btn btn-success btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-check-square-o"></i></a>
                                                @endif
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
                                    <!-- Input group -->

<!-- jQuery -->
<script src="{{url('/vendors/jquery/dist/jquery.min.js')}}"></script>

                                    <script>
                                     function edit(id){

                                         $('#nomeP').val($('#nome_'+id).text());
                                         $('#form').attr('action','/provincia/edit/'+id);

                                         $('#form').attr('action','/provincia/edit/'+id);
                                             $('#cancel').removeClass('d-none');

                                              }

           function cancel(){
            $('#form').attr('action','/provincia/save');
            $('#form').trigger('reset');
            $('#cancel').addClass('d-none');
           }
                                    </script>

                         </div>




@endsection
