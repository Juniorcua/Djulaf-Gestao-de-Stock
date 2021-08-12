@extends('App')



@section('content')
                        
                         <div class="col-sm-12">
                             <div class="card">
                                        <div class="card-body">
                                            <h5></h5>
                                            <hr>
                                            <div class="row">
                                               
                                                <div class="col-md-5">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Litro</label>
                                                            <div class="form-group">
                                                            <select class="form-control" style="height: 38px;" id="exampleFormControlSelect1">
                                                                <option>Selecione</option>
                                                            </select>
                                                               </div> 
                                                        </div>
                                                        
                                                    </form>
                                                </div>
                                                
                                                
                                                 <div class="col-md-1">
                                                     <div class="form-group">
                                                            <label for="exampleInputEmail1">________</label>
                                                            <div class="form-group">
                                                           <button type="submit" class="btn btn-primary btn-sm"><i style="padding-left: 10px;" class="feather icon-plus-circle"></i></button> 
                                                      
                                                               </div> 
                                                     </div> 
                                                </div>
                                               
                                                 <div class="col-md-5" >
                                                    <form>
                                                        <div class="form-group">
                                                            <label>Quantidade</label> 
                                                            <input type="text" class="form-control" style="height: 38px;"placeholder="Insira a Quantidade">
                                                        </div>
                                                       
                                                        
                                                    </form>
                                                </div>
                                            
                                            </div>
                                            
                                            <div class="row">
                                                 <div class="col-md-1">
                                                     <div class="form-group">
                                                         
                                                           <div class="form-group">
                                                         <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i>Registar</button>'
                                                       </div> 
                                                     </div> 
                                                </div>
                                                
                                            </div>
                                            
                                            <hr>
                                        </div>
                                        
                                        
                                         <!-- [ basic-table ] start -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Vasilhames Registados</h5>
                                              </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Ordem</th>
                                                            <th>Litro</th>
                                                            <th>Quantidade</th>
                                                            <th>Operações</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>----</td>
                                                            <td>----</td>
                                                            <td>
                                                                <button class="btn btn-success btn-sm "><i class="feather icon-edit"></i>Editar</button>
                                                                <button class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>Eliminar</button>
                                                            </td>
                                                        </tr>
                                                       
                                                        <tr>
                                                            <td>2</td>
                                                            <td>----</td>
                                                            <td>----</td>
                                                            <td>
                                                                <button class="btn btn-success btn-sm"><i class="feather icon-edit"></i>Editar</button> 
                                                                <button class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>Eliminar</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ basic-table ] end -->
                             </div>
                                    <!-- Input group -->
                                 
                         </div> 




@endsection