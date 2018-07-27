@extends('templates.estrutura')

@section('conteudo')

<div class="row ">
    <!-- BLOCK START-->
    <div class="table table-responsive " style="margin-top: 100px">   
        <table class="table table-bordered" id="table">
            <tr >
                <th width="150px"> ID</th>
                <th >Nome</th>
                <th class="text-center" width="150px">
                    <a href="#" class="create-modal btn btn-sucess btn-sm" >
                        <i class="glyphicon glyphicon-plus"></i>

                    </a>                        
                </th>
            </tr>
            {{ csrf_field() }}
            @foreach($categoriaClinicas as $categoria) 
            <tr class="{{$categoria->id}}">
                <td > {{$categoria->id}}</td>
                <td >{{ $categoria->name }}</td>
                <td> 
                    <a href="#" class=" show-modal btn btn-info btn-sm" data-id="{{ $categoria->id }}" data-name="{{ $categoria->name }}">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>

                    <a href="#" class=" edit-modal btn btn-warning btn-sm" data-id="{{ $categoria->id }}" data-name="{{ $categoria->name }}">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>

                    <a href="#" class=" deletes-modal btn btn-danger btn-sm" data-id="{{ $categoria->id }}" data-name="{{ $categoria->name }}">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>


                </td>
                @endforeach
        </table>

        {{$categoriaClinicas->links()}}

    </div>

</div>


<div class="modal-container">
    <!-- Modal --> 
    <div class="modal fade" id="create" role="dialog" >
        <div class="modal-dialog" style="margin-left:-300px;margin-top: 100px">
            <!-- Modal content-->
            <!--@include('painel.especialidade.new-edit')-->
            <div class="modal-header" style="background:#0e90d2">
                <button  type="button"class="close" data-dismiss="modal" >&times;</button>
                <h4 class="modal-title" style="color: #fff"></h4>
            </div>

            <div class="modal-body"style="background:#ffffff">
                <form class="form-horizontal" role="form" method="">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="name">Nome: </label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nome da Categoria"/>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
               
                    <div class="form-actions right margin-bottom-10">
                        <button type="submit" class="btn btn-info"name="salvar" id="add">
                            <span class="glyphicon glyphicon-plus"></span>  Salvar 
                        </button>
                        <button class="btn btn-warning" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remobe"></span> Close
                        </button>
                    </div> 
                </form>
            </div>
            
        </div>
    </div> 
</div>


@stop

