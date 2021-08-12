@extends('App')

@section('bread')
Alocar Usu&aacute;rio
@endsection

@section('crumbs')
usu&aacute;rio
@endsection
@section('crumbs2')
Alocar
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



                                            {{-- <form action="{{url('/medicamento/save')}}" id="form" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                @csrf

                                                        <div class="col-sm-5 mt-4">

                                                            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-save"></i> Registar </button>

                                                            <button type="reset" class="btn btn-outline-info btn-sm"><i class="fa fa-trash"></i> Limpar </button>

                                                            <a type="" id="cancel" class="btn btn-outline-light btn-sm d-none" onclick="cancel()"><i class="fa fa-times-circle"></i> Cancelar </a>
                                                        </div>



                                               </div>
                                            </form> --}}

                                         <!-- [ basic-table ] start   <Data table>    -->

                                   <div class="col-md-12 col-sm-12 ">

                                              <div class="x_title">
                                                <h2>Usu&aacute;rios Cadastrados</h2>
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

                                                            <form action="{{url('/auth/save')}}" id="form" method="POST" enctype="multipart/form-data">
                                                             @csrf
                                          {{--   --}}
                                          <input class="d-none" id="nomeM" name="nomeM" type="text">
                                          <input class="d-none" id="categoriaM" name="categoriaM" type="text">
                                          {{--  --}}

                                                <table id="datatable" class="table table-striped jambo_table bulk_action table-sm" style="width:100%">
                                                  <thead>
                                                    <tr>
                                                        <th><i class="fa fa-asterisk "></i> Ordem</th>
                                                        <th><i class="fa fa-edit"></i> Nome</th>
                                                        <th><i class="fa fa-book"></i> Papel</th>
                                                        <th><i class="fa fa-cog"></i> Operações</th>
                                                    </tr>
                                                  </thead>


                                                  <tbody>

                                                     @foreach ($user as $us)

                                                    <tr>
                                                    <td> {{$us->id}} </td>
                                                    <td> {{$us->name}}</td>
                                                    <td> <span class="badge badge-danger"> N&atilde;o Alocado</span>

                                                    <select onchange="edit2({{$us->id}})"  id="nome_{{$us->id}}" name="rolId" class="d-none" required>

                                                    @foreach ($roles as $rl)

                                                     <option value="{{$rl->id}}">{{$rl->description}}</>

                                                     @endforeach
                                                     </select>

                                                    <input class="d-none" type="text" id="categoria_{{$us->id}}" name="userId" value="{{$us->id}}" class="">

                                                    </td>
                                                    <td>
                                                     <a onclick="edit({{$us->id}})"  title="Atribuir Papel" class="btn btn-primary btn-sm pt-0 pb-0 pr-1 pl-1 mb-0" style="color:white" ><i class="fa fa-edit"></i></a>
                                                     <button id="btn_{{$us->id}}"    type="submit" class="btn btn-success btn-sm pt-0 pb-0 pr-1 pl-1 mb-0 d-none" >Alocar <i class="fa fa-check"></i></button>

                                                    <a href="/auth/delete/{{$us->id}}" title="Eliminar Papel" class="btn btn-danger btn-sm pt-0 pb-0 pr-1 pl-1 mb-0"><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                    </tr>



                                                    @endforeach


                                                  </tbody>
                                                </table>
                                               </form>
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
                                            //alert($('#categoria_'+id).val());

                                            $('#nomeM').val($('#nome_'+id).val());
                                            $('#categoriaM').val($('#categoria_'+id).val());


                                            // $('#form').attr('action','/medicamento/update/'+id);
                                            $('#nome_'+id).removeClass('d-none');
                                            $('#btn_'+id).removeClass('d-none');

                                              }

                                    //   $('#nome_7').on('change',function(){
                                    //       alert('djdjdj');
                                    //   });`

                                        function edit2(id){

                                            $('#nomeM').val($('#nome_'+id).val());
                                            $('#categoriaM').val($('#categoria_'+id).val());

                                        }




           function cancel(){
            $('#form').attr('action','/medicamento/save');
            $('#form').trigger('reset');
            $('#cancel').addClass('d-none');

           }

//===================================================================
function chamar(id){

     alert('here i am');

    $('#b').val($('#in_'+id));
    $('#a').val($('#btn1_'+id));

    $('#btn1_'+id).removeClass('d-none');
    $('#btn_'+id).removeClass('d-none');
}

$('up')


</script>

                         </div>
                         </div>
                         <script src="{{url('/assets/js/Jquery.js')}}"></script>
                         <link href="{{ asset('DataTables/DataTables-1.10.18/js/jquery.dataTables.js') }}"  rel="stylesheet"/>


@endsection
