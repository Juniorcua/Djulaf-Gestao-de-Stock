@extends('App')

@section('bread')
Formulário Registo Medicamento
@endsection

@section('crumbs')
Medicamento
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

                                        <div class="card-body">

                                            <form action="{{url('/medicamento/save')}}" id="form" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                @csrf
                                            <div class="col-md-4">
                                                     <div class="form-group">
                                                            <label for="exampleInputEmail1">Nome Medicamento</label>
                                                            <div class="form-group">
                                                            <input style="height:38px;" id="nomeM" name="nomeM" type="text" class="form-control" placeholder="Insira o medicamento" required>
                                                               </div>
                                                     </div>
                                                </div>

                                                <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Categoria</label>
                                                            <div class="form-group" >
                                                            <!-- <select style="height:38px;"  id="e" name="d[]" multiple="multiple"> -->
                                                            <select style="height:39px;" class="form-control" id="categoriaM" name="categoriaM" required>
                                                                <option >Selecione a categoria</option>

                                                                @foreach ($categorias as $cat)

                                                            <option value="{{ $cat -> id}}">{{$cat->nome}}</option>

                                                               @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Foto do Medicamento </label>
                                                            <div class="form-group">
                                                            <input style="height:40px;" id="file" name="file" type="file" class="form-control" placeholder="Se" >
                                                               </div>
                                                               </div>
                                                        </div>

                                                        <div class="col-sm-5 mt-4">

                                                            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-save"></i> Registar </button>

                                                            <button type="reset" class="btn btn-outline-info btn-sm"><i class="fa fa-trash"></i> Limpar </button>

                                                            <a type="" id="cancel" class="btn btn-outline-light btn-sm d-none" onclick="cancel()"><i class="fa fa-times-circle"></i> Cancelar </a>
                                                        </div>



                                               </div>
                                            </form>




                                         <hr>
                                         <!-- [ basic-table ] start   <Data table>    -->

                                   <div class="col-md-12 col-sm-12 ">

                                              <div class="x_title">
                                                <h2>Medicamentoss registados</h2>
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

                                                <table id="datatable" class="table table-striped jambo_table bulk_action table-sm" style="width:100%">
                                                  <thead>
                                                    <tr>
                                                        <th>Ordem</th>
                                                        <th>Descrição</th>
                                                        <th>Catgeoria</th>
                                                        <th>Estado</th>
                                                        <th>Operações</th>
                                                    </tr>
                                                  </thead>


                                                  <tbody>

                                                     @foreach ($medicamentos as $med)

                                                    <tr>
                                                    <td> {{ $med -> id}}</td>
                                                    <td id="nome_{{$med->id}}">{{$med -> nome}}</td>
                                                    <td>{{ $med -> c_nome}}</td>
                                                    <span class="d-none" id="categoria_{{$med->id}}">{{$med->categoriaId}}</span>
                                                    <td>
                                                        @if ($med->estado!=1)

                                                        <span style="border-radius:5px;color:white" class="badge badge-success"> activo</span>
                                                        @else
                                                        <span style="border-radius:5px;" class="badge badge-danger"> inactivo</span>

                                                        @endif
                                                        </td>
                                                      <td>
                                                        <button onclick="edit({{$med->id}})" id="btn_{{$med->id}}" class="btn btn-primary btn-sm pt-0 pb-0 pr-1 pl-1 mb-0" ><i class="fa fa-edit"></i></button>
                                                       @if($med->estado!=1)
                                                                <a href="/medicamentocreate/delete/{{$med->id}}/1" title="desactivar" class="btn btn-danger btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-trash-o"></i></a>
                                                                @else
                                                                <a href="/medicamentocreate/delete/{{$med->id}}/0" title="activar" class="btn btn-success btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-check-square-o"></i></a>
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

                                <!-- [ basic-table ] end -->
                             </div>

 <!-- jQuery -->
 <script src="{{url('/vendors/jquery/dist/jquery.min.js')}}"></script>


                                    <!-- Input group -->

                                    <script>
                                        function edit(id){

                                            $('#nomeM').val($('#nome_'+id).text());
                                            $('#categoriaM').val($('#categoria_'+id).text());


                                            $('#form').attr('action','/medicamento/update/'+id);
                                            $('#cancel').removeClass('d-none');

                                              }

           function cancel(){
            $('#form').attr('action','/medicamento/save');
            $('#form').trigger('reset');
            $('#cancel').addClass('d-none');
           }


                                       </script>

                         </div>
                         </div>
                         <script src="{{url('/assets/js/Jquery.js')}}"></script>
                         <link href="{{ asset('DataTables/DataTables-1.10.18/js/jquery.dataTables.js') }}"  rel="stylesheet"/>
<script>
 $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>


@endsection
