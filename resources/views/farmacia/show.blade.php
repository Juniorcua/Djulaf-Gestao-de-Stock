@extends('App')


@section('bread')
Formulário Visualização Farmácias
@endsection

@section('crumbs')
Farmácia
@endsection
@section('crumbs2')
lista
@endsection


@section('content')



<div class="col-sm-12">
                             <div class="card">

                                        <div class="card-body">
                                            <form action="{{url('farmacia/show')}}" method="post" id="form">
                                                @csrf
                                             <div class="row">

                                            <div class="col-md-5">
                                                     <div class="form-group">
                                                       <label for="exampleInputEmail1">Filtrar Por Província</label>
                                                         <div class="form-group">
                                                            <select style="height:39px;" class="form-control" id="prov" name="prov">
                                                                <option value="todas">Todas</option>
                                                                @foreach ($provincias as $fa)

                                                            <option @if($fa->id== $provinceId) selected="selected" @endif value="{{ $fa-> id}}">{{ $fa-> nome}}</option>

                                                                @endforeach

                                                            </select>
                                                         </div>
                                                     </div>
                                                 <hr>
                                            </div>
                                            <div class="col-md-5">
                                                     <div class="form-group">
                                                        <label for="exampleInputEmail1">Filtrar Por Distrito</label>
                                                          <div class="form-group">
                                                            <select style="height:39px;" class="form-control" id="dist" name="dist">
                                                                <option value="todos">Todos</option>

                                                                @foreach ($distritos as $dt)

                                                            <option @if($dt->id== $districtId) selected="selected" @endif value="{{$dt-> id}}">{{ $dt ->nome}}</option>

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
                                                    <button class="btn btn-primary btn-xs ml-2" style="margin-top:-10px;" type="submit"> <i class="fa fa-search"></i> Filtrar</button>
                                                 </div>
                                            </div>

                                        </div>
                                            </form>

                                        </div>

                            <!-- [ basic-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Farmácias Registados</h5>
                                              </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">

                                                <table class="table table-sm" id="table_id">
                                                    <thead>
                                                        <tr>
                                                            <th>Ordem</th>
                                                            <th>Nome da farmácia</th>
                                                            <th>Contacto</th>
                                                            <th>Email</th>
                                                            <th>Endereço</th>
                                                            <th>Província</th>
                                                            <th>Estado</th>
                                                            <th>Operações <i class="feather icon-settings"></i></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($farmacias as $fa)

                                                        <tr>
                                                        <td>{{ $fa-> id}}</td>
                                                        <td>{{ $fa-> nome}}</td>
                                                        <td>{{ $fa-> contacto}}</td></td>
                                                        <td>{{ $fa-> email}}</td></td>
                                                        <td>{{ $fa-> endereco}}</td>
                                                        <td>{{ $fa-> Fprov}}</td>
                                                        <td>
                                                        @if ($fa->estado!=1)

                                                        <span style="border-radius:5px;color:white" class="badge badge-success"> activo</span>
                                                        @else
                                                        <span style="border-radius:5px;" class="badge badge-danger"> inactivo</span>

                                                        @endif
                                                        </td>

                                                            <td>
                                                            <a href="/farmacia/perfil/{{ $fa->id}}" title="editar & perfil "  class="btn btn-primary btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-edit"></i></a>
                                                                @if($fa->estado!=1)
                                                                <a href="/farmacia/delete/{{$fa->id}}/1" title="desactivar" class="btn btn-danger btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-trash-o"></i></a>
                                                                @else
                                                                <a href="/farmacia/delete/{{$fa->id}}/0" title="activar" class="btn btn-success btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-check-square-o"></i></a>
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
                                <!-- [ basic-table ] end -->
                             </div>
                         </div>s




 <!-- jQuery -->
 <script src="{{url('/vendors/jquery/dist/jquery.min.js')}}"></script>

                         <script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
@endsection
