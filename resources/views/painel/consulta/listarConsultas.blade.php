@extends('templates.estrutura')

@section('conteudo')

<div class="row marow service-box" style="margin-top: 100px">
    <!-- BLOCK START-->
    <div class="panel panel- panel-info " >   
        <div class="panel-heading">
            <h1 class="panel-title" style="font-size: 30px;font-family:Times New Roman">{{ $titulo }}</h1>
        </div>
        <div class="panel-body ">
            <table class=" table-striped " style="width: 100%">
                <tr >
                    <th style="width: 250px;font-size: 20px;font-family:Times New Roman;color: red" >Paciente</th>
                    <th style="font-size: 20px;font-family:Times New Roman;color: red" >Email</th>                    
                    <th style="text-align: center;font-family:Times New Roman;color: red"">Especialidade</th>
                    <th style="font-size: 20px;font-family:Times New Roman;color: red" >Data</th>
                    <th style="font-size: 20px;font-family:Times New Roman;color: red" >Horário</th>
                    <th style="text-align: center;width: 15%;font-size: 20px;font-family:Times New Roman;color: red"">Accao</th>
                </tr>
                @foreach($consultas as $consulta) 
                <tr>
                    <th style="width: 25%">{{ $consulta->utente->name }}</th>
                    <th style="width: 15%">{{$consulta->utente->user->email}}</th>                    
                    <th style="text-align: center">{{$consulta->especialidade->name}}</th>
                    <th>{{$consulta->dia }}</th>
                      <th>{{$consulta->hora }}</th>
                    <th style="width: 15px"> 

                         <a href=" {{route('consulta.show',  $consulta->id) }} " class="btn btn-primary" 
                            style="margin-top:5px ;float: left;margin-top:10px;margin-left:10px;height:33px"
                            data-toggle="tooltip" title="Visualizar" 
                            >
                            <span class="glyphicon glyphicon-eye-open"></span> 
                        </a>

                        <a href=" {{route('consulta.edit',$consulta->id ) }} " class="btn btn-warning" data-toggle="tooltip" title="Editar"
                           style="margin-top:5px ;float: left;margin-top:10px;margin-left:10px;height:33px"
                           >
                            <span class="glyphicon glyphicon-pencil" ></span> 
                        </a>

                        <a href="#"style="float: left;margin-left:10px;margin-top:10px" >
                            <span data-toggle="tooltip" title="Eliminar" >
                                {{ Form::open(['route' => ['consulta.destroy',$consulta->id],'method' => 'delete' ] )  }}
                                {{ Form::submit('X', ['class'=> 'btn btn-danger'] )}}
                                
                                {{ Form::close() }}

                            </span>
                        </a>
                    </th>
                </tr>
                @endforeach
            </table>

            {{$consultas->links()}}

        </div>

    </div>

</div>

@stop
