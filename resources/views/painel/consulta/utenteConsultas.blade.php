@extends('templates.estrutura')

@section('conteudo')

<div class="row marow service-box" style="margin-top: 100px;margin-left:150px">
    <!-- BLOCK START-->
    <div class="col-md-10 ">
        <div class="panel panel- panel-info " >   
            <div class="panel-heading">
                <h1 class="panel-title" style="font-size: 30px;font-family:Times New Roman">{{ $titulo}}</h1>
            </div>
            <div class="panel-body">
                <table class=" table-striped" width="100%">
                    <tr >
                        <th width="50px" style="font-size: 20px;font-family:Times New Roman;color: red" >Consultas</th>
                        <th width="50px" style="font-size: 20px;font-family:Times New Roman;color: red">Data</th>
                        <th width="5px" style="font-size: 20px;font-family:Times New Roman;color: red">Horário</th>

                    </tr>
                    @foreach($consultas as $consulta) 
                    <tr>
                        <th width="50px" style="padding: 10px">{{$consulta->especialidade->name}}</th>
                        <th width="50px"style="padding: 10px">{{$consulta->dia }}</th>
                        <th width="50px" style="padding: 10px">{{$consulta->hora }}</th>
                    </tr>
                    @endforeach
                </table>

                {{$consultas->links()}}

            </div>

        </div>

    </div>
</div>

@stop
