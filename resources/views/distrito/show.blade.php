@extends('App')


@section('bread')
Formulário Visualização Clientes
@endsection

@section('crumbs')
Clientes
@endsection
@section('crumbs2')
lista
@endsection


@section('content')


<div class="col-sm-12">
                             <div class="card">
                          <!-- [ basic-table ] start   <Data table>    -->

                            <div class="col-md-12 col-sm-12 ">

                                <div class="x_title">
                                  <h2>Districtos registados</h2>
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

                                  <table id="datatable" class="table table-striped jambo_table bulk_action table-sm" style="width:100%">
                                    <thead>
                                      <tr>
                                          <th>Ordem</th>
                                          <th>Descrição</th>
                                          <th>Prov&iacute;ncia</th>
                                          <th>Estado</th>
                                          <th>Operações</th>
                                      </tr>
                                    </thead>


                                    <tbody>

                                       @foreach ($distritos as $dt)

                                      <tr>
                                      <td> {{ $dt -> id}}</td>
                                      <td id="nome_{{$dt->id}}">{{$dt -> nome}}</td>
                                      <td>{{ $dt -> c_prov}}</td>
                                      <span class="d-none" id="categoria_{{$dt->id}}">{{$dt->provinciaId}}</span>
                                      <td>
                                          @if ($dt->estado!=1)

                                          <span style="border-radius:5px;color:white" class="badge badge-success"> activo</span>
                                          @else
                                          <span style="border-radius:5px;" class="badge badge-danger"> inactivo</span>

                                          @endif
                                      </td>

                                        <td>
                                            @if($dt->estado!=1)
                                          <a href="/distritoshow/delete/{{$dt->id}}/1" class="btn btn-danger btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-trash-o"></i></a>
                                          @else
                                          <a href="/distritoshow/delete/{{$dt->id}}/0" class="btn btn-success btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-check-square-o"></i></a>
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
                                    <!-- Input group -->

                         </div>

<!-- jQuery -->
<script src="{{url('/vendors/jquery/dist/jquery.min.js')}}"></script>




@endsection
