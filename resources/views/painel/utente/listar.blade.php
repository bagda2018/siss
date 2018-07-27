@extends('templates.estrutura')

@section('conteudo')

<div class="row marow service-box" style="margin-top: 100px">
    <!-- BLOCK START-->
    <div class="panel panel- panel-info " >   
        <div class="panel-heading">
            <h1 class="panel-title">Listagem de Utentes</h1>
        </div>
        <div class="panel-body ">
            <table class=" table-striped "style="width: 100%">
                <tr >
<!--                    <th > Codigo</th>-->
                    <th >Nome</th>
                    <th >Email</th>
                    <th  style="text-align: center">Codigo Postal</th>
                    <th>Telefone</th>
                    <th >Morada</th>
                    <th  style="text-align: center">Accao</th>

                </tr>
                @foreach($utentes as $utente) 

                    @php $codigo = base64_encode(base64_encode('bagda@2018').base64_encode($utente->user->id)) @endphp

                <tr>
<!--                    <th > {{$utente->id}}</th>-->
                    <th >{{ $utente->name }}</th>
                    <th style="width: 15%">{{$utente->user->email}}</th>
                    <th  style="text-align: center" >{{$utente->codigo_postal}}</th>
                    <th >{{$utente->telefone}}</th>
                    <th style="text-align: center">{{$utente->municipio->name}}</th>
                    <th  style="text-align: center"> 

                        <a href=" {{route('utente.show',$codigo) }} " class="btn btn-primary" 
                           style="margin-top:5px ;float: left;margin-top:10px;margin-left:10px;height:33px"
                           data-toggle="tooltip" title="Visualizar" 
                           >
                            <span class="glyphicon glyphicon-eye-open"></span> 
                        </a>

                        <a href=" {{route('utente.edit',$codigo) }} " class="btn btn-primary" data-toggle="tooltip" title="Editar"
                           style="margin-top:5px ;float: left;margin-top:10px;margin-left:10px;height:33px"
                           >
                            <span class="glyphicon glyphicon-pencil" ></span> 
                        </a>

                        <a href="#"style="float: left;margin-left:10px;margin-top:10px" >
                            <span data-toggle="tooltip" title="Eliminar" >
                                {{ Form::open(['route' => ['utente.destroy',$codigo],'method' => 'delete' ] )  }}
                                {{ Form::submit('X', ['class'=> 'btn btn-danger'] )}}

                                {{ Form::close() }}

                            </span>
                        </a>
                </tr>
                @endforeach
            </table>

            {{$utentes->links()}}

        </div>

    </div>

</div>


@stop
