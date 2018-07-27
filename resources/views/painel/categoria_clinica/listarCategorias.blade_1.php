@extends('templates.estrutura')

@section('conteudo')

<div class="row marow service-box" style="margin-top: 100px">
    <!-- BLOCK START-->
    <div class="panel panel- panel-info " >   
        <div class="panel-heading">
            <h1 class="panel-title">{{$titulo}}</h1>
        </div>
        <div class="panel-body ">
            <table class=" table-striped ">
                <tr >
<!--                    <th > Codigo</th>-->
                    <th >Nome</th>
                    
                    <th style="width: 10%">Accao</th>
                    
                </tr>
                @foreach($categoriaClinicas as $categoria) 
                <tr>
<!--                    <th > {{$categoria->id}}</th>-->
                    <th >{{ $categoria->name }}</th>
                    <th style="width: 10%"> 
                        
                        <a href=" {{route('categoria_clinica.edit',$categoria->id) }} " class="btn btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span> 
                        </a>
                     
                        <a href="{{route('categoria_clinica.destroy',$categoria->id) }}" class="btn btn-danger">
                         <span class="glyphicon glyphicon-trash"></span>
                        </a>
                </tr>
                @endforeach
            </table>

            {{$categoriaClinicas->links()}}

        </div>

    </div>

</div>




















@stop
