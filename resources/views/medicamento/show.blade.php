@extends('App')


@section('bread')
Formulário Visualização Medicamento
@endsection

@section('crumbs')
Medicamento
@endsection
@section('crumbs2')
lista
@endsection


@section('content')



<div class="col-sm-12">
                             <div class="card">

                                        <div class="card-body">
                                            <form action="{{url('medicamentos/show')}}" method="post" id="form">
                                             <div class="row">
                                                @csrf
                                            <div class="col-md-5">
                                                     <div class="form-group">
                                                            <label for="exampleInputEmail1">Filtrar por categoria</label>
                                                            <div class="form-group">
                                                            <select style="height:39px;" class="form-control" id="categoriaM" name="categoriaM">
                                                                <option value="">Selecione a categoria</option>
                                                                @foreach ($categorias as $cat)

                                                                <option value="{{ $cat -> id}}">{{$cat->nome}}</option>

                                                                   @endforeach
                                                            </select>
                                                            </div>
                                                     </div>


                                                </div>

                                                <div class="colmd-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" style="color:white">Filtrar por categoria</label>
                                                    </div>
                                                     <div class="form-group">
                                                        <button class="btn btn-primary btn-xs ml-2" style="margin-top:-10px;" type="submit"> <i class="fa fa-search"></i> Filtrar</button>
                                                     </div>
                                                </div>


                                                <hr>
                                        </div>
                                    </form>
                                        </div>

                             <!-- [ basic-table ] start   <Data table>    -->

                                <div class="col-md-12 col-sm-12 ">
                                    <div class="x_panel">
                                      <div class="x_title">
                                        <h2>Medicamentos registados</h2>
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

                                        <table id="datatable" class="table table-striped jambo_table bulk_action table-sm" >
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
                                            <td id="categoria_{{$med->id}}">{{ $med -> c_nome}}</td>
                                            <td>
                                                @if ($med->estado!=1)

                                                <span style="border-radius:5px;color:white" class="bg-success pl-1 pr-1"> activo</span>
                                                @else
                                                <span style="border-radius:5px;" class="bg-red pl-1 pr-1"> inactivo</span>

                                                @endif
                                                </td>
                                              <td>

                                               @if($med->estado!=1)
                                                <a href="/medicamento/delete/{{$med->id}}/1" class="btn btn-danger btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-trash-o"></i></a>
                                                @else
                                                <a href="/medicamento/delete/{{$med->id}}/0" class="btn btn-success btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-check-square-o"></i></a>
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
                        <!-- [ basic-table ] end -->
                             </div>
                                    <!-- Input group -->

                         </div>





 <!-- jQuery -->
 <script src="{{url('/vendors/jquery/dist/jquery.min.js')}}"></script>

                         <script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
@endsection
