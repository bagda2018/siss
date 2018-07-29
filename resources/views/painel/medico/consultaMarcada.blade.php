@extends('templates.estrutura')

@section('conteudo')

<div class="row marow service-box" style="margin-top: 100px;margin-left:150px">
    <!-- BLOCK START-->
    <div class="col-md-11 ">
        <div class="panel panel- panel-info " >   
            <div class="panel-heading">
                <h1 class="panel-title" style="font-size: 30px;font-family:Times New Roman">{{ $titulo}}</h1>
            </div>
            <div class="panel-body">
                <table class=" table-striped">
                    <tr >
                        <th style="font-size: 20px;font-family:Times New Roman;color: red" >Paciente</th>
                        <th style="font-size: 20px;font-family:Times New Roman;color: red" >Consultas</th>
                        <th style="font-size: 20px;font-family:Times New Roman;color: red">Data</th>
                        <th style="font-size: 20px;font-family:Times New Roman;color: red">Horário</th>
                        <th style="width: 5%;font-size: 20px;font-family:Times New Roman;color: red">Realizar</th>
                    </tr>
                    @foreach($consultas as $consulta) 
                    @php $codigo = base64_encode(base64_encode('bagda@2018').base64_encode($consulta->id)) @endphp
                    <tr>
                        <th width="120px" style="padding: 5px">{{$consulta->utente->name}}</th>
                        <th width="50px" style="padding: 5px">{{$consulta->especialidade->name}}</th>
                        <th width="100px" style="padding: 5px">{{$consulta->dia }}</th>
                        <th width="25px" style="width: 10px;padding: 5px">{{$consulta->hora }}</th>
                        
                        <th width="15px"> 
                            <a href=" {{route('realizar',$codigo ) }} " class="btn btn-warning" data-toggle="tooltip" title="Realizar consulta"
                               style="margin-top:5px ;float: left;margin-top:10px;margin-left:10px;height:33px"
                               >
                                <span class="glyphicon glyphicon-pencil" ></span> 
                            </a>
                        </th>
                    </tr>
                    @endforeach
                </table>

                {{$consultas->links()}}

            </div>

        </div>

    </div>
</div>

@stop
