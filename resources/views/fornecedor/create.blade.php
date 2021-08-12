@extends('App')

@section('bread')
Formulário Registo Fornecedor

@endsection

@section('crumbs')
Cliente

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

                <form action="{{url('/fornecedor/save')}}" method="POST" id="form">

                @csrf
                <div class ="row">
                    <div class="col-md-5">
                             <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-edit"></i> Nome</label>
                                    <div class="form-group">
                                    <input style="height:38px;" type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome" required>
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
                    </div>


                    <div class ="row">

                        <div class="col-md-5">
                            <div class="form-group">
                                 <label for="exampleInputEmail1"><i class="fa fa-map-marker"></i> Endereço</label>
                                    <div class="form-group">
                                         <input style="height:38px;" type="text" class="form-control" id="endereco" name="endereco" placeholder="Insira o endereço" required>
                                    </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                     <label for="exampleInputEmail1"><i class="fa fa-edit"></i> Descri&ccedil;&atilde;o de servi&ccedil;o</label>
                                         <div class="form-group">
                                            <input style="height:38px;" type="text" class="form-control" id="descricao" name="descricao" placeholder="Insira a descricao" required>
                                         </div>
                             </div>
                         </div>


                            </div>

                            <div class="row">



                             <div class="col-sm-5 mt-4">

                                <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-save"></i> Registar </button>

                                <button type="reset" class="btn btn-outline-info btn-sm"><i class="fa fa-trash"></i> Limpar </button>

                                <a type="" id="cancel" class="btn btn btn-outline-light btn-sm d-none" onclick="cancel()"><i class="fa fa-times-circle"></i> Cancelar </a>
                            </div>

                        </div>

                </form>
                <hr>
                 <!-- [ basic-table ] start   <Data table>    -->

                    <div class="col-md-12 col-sm-12 ">

                          <div class="x_title">
                            <h2>Fornecedores registadas</h2>
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
                                    <th><i class="fa fa-asterisk"></i> Ordem</th>
                                    <th><i class="fa fa-edit"></i> Nome do cliente</th>
                                    <th><i class="fa fa-phone"></i> Contacto</th>
                                    <th><i class="fa fa-envelope"></i> Email</th>
                                    <th><i class="fa fa-map-marker"></i> Endereco</th>
                                    <th><i class="fa fa-asterisk"></i> Estado</th>
                                    <th><i class="fa fa-cog"></i> Operações</th>
                                </tr>
                              </thead>


                              <tbody>
                                @foreach ($fornecedores as $fn)
                                <tr>
                                    <td>{{$fn -> id}}</td>
                                    <td id="nome_{{$fn->id}}">{{ $fn -> nome }}</td>
                                    <td  id="contacto_{{$fn->id}}">{{ $fn ->  contacto }}</td>
                                    <td id="email_{{$fn->id}}">{{ $fn -> email}}</td>
                                    <td id="endereco_{{$fn->id}}">{{ $fn -> endereco}}</td>
                                    <td>
                                        @if ($fn->estado!=1)

                                        <span style="border-radius:5px;color:white" class="badge badge-success"> activo</span>
                                        @else
                                        <span style="border-radius:5px;" class="badge badge-danger"> inactivo</span>

                                        @endif
                                        </td>
                                    <td>
                                        <button onclick="edit({{$fn->id}})" id="btn_{{$fn->id}}" class="btn btn-primary btn-sm pt-0 pb-0 pr-1 pl-1 mb-0" ><i class="fa fa-edit"></i></button>
                                        @if($fn->estado!=1)
                                        <a href="/fornecedor/delete/{{$fn->id}}/1" title="desactivar" class="btn btn-danger btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-trash-o"></i></a>
                                       @else
                                        <a href="/fornecedor/delete/{{$fn->id}}/0" title="activar" class="btn btn-success btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-check-square-o"></i></a>
                                       @endif
                                        </td>

                                <span class="d-none" id="descricao_{{$fn->id}}">{{ $fn -> descricao}}</span>


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

            <script>
            function edit(id){

                $('#nome').val($('#nome_'+id).text());
                $('#contacto').val($('#contacto_'+id).text());
                $('#email').val($('#email_'+id).text());
                $('#endereco').val($('#endereco_'+id).text());
                $('#descricao').val($('#descricao_'+id).text());


                $('#form').attr('action','/fornecedor/edit/'+id);
                $('#cancel').removeClass('d-none');

            }

           function cancel(){
            $('#form').attr('action','/fornecedor/save');
            $('#form').trigger('reset');
            $('#cancel').addClass('d-none');
           }



           </script>
    </div>
           <!-- Input group -->

</div>
</div>


@endsection
