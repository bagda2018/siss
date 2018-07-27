@extends('templates.estrutura')

@section('conteudo')




<div class="row marow service-box" style="margin-top: 100px">
    <!-- BLOCK START-->
    <div class="panel panel- panel-info " >   
        <div class="panel-heading">
            <h1 class="panel-title">Listagem de Utentes</h1>
        </div>
        <div class="panel-body ">
            <table class=" table-striped ">
                <tr >
<!--                    <th > Codigo</th>-->
                    <th >Nome</th>
                    <th >Data do Exame</th>
                    <th >Hora</th><!--
-->                 <th >Consulta</th>
                    <th >Resultado</th>
                    <th>Telefone</th>
                    <th style="width: 10%">Accao</th>
                    
                </tr>
                @foreach($utentes as $utente) 
                <tr>
<!--                    <th > {{$utente->id}}</th>-->
                    <th >{{ $utente->nome_completo }}</th>
                    <th style="width: 15%">{{$utente->email}}</th>
                    <th style="width: 15%" >{{$utente->codigo_postal}}</th><!--
-->                 <th style="text-align: center">{{$utente->entidade_financeira}}</th>
                    <th >{{$utente->data_nascimento}}</th>
                    <th >{{$utente->telefone}}</th>
                    <th style="width: 10%"> 
                        
                        <a href=" {{route('utente.edit',$utente->id) }} " class="btn btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span> 
                        </a>
                     
                        <a href="teste/create" class="btn btn-danger">
                         <span class="glyphicon glyphicon-trash"></span>
                        </a>
                </tr>
                @endforeach
            </table>

            {{$utentes->links()}}

        </div>

    </div>

</div>




















@stop
