@extends('templates.estrutura')

@section('conteudo')




<div class="row marow service-box" style="margin-top: 100px;margin-left:150px">
    <!-- BLOCK START-->
    <div class="col-md-11 ">
        <div class="panel panel- panel-info " >   
            <div class="panel-heading">
                <h1 class="panel-title">Agenda de Trabalho</h1>
            </div>
            <div class="panel-body ">

                <table class=" table-striped ">
                    <tr >
                        <th >Data de Trabalho</th>
                        <th >Hora de Entrada</th>
                        <th >Hora de Saida</th>
                        <th style="width: 10%">Accao</th>

                    </tr>
                    @foreach($medicos as $medico)

                    @if(count($medico->agendas) > 0)
                    <th >
                        <div class="panel-primary">
                            <h1 class="panel-title">{{ $medico->name }}</h1>
                        </div>
                    </th>
                    @endif
                    @foreach($medico->agendas as $agenda) 
                    <tr>
                        <th >{{ $agenda->data }}</th>
                        <th >{{$agenda->hora_inicio}}</th>
                        <th style="width: 15%">{{$agenda->hora_termino}}</th>
                        <th style="width: 10%"> 

                            <a href=" {{route('agenda_trabalho.edit',$agenda->id) }} " class="btn btn-primary">
                                <span class="glyphicon glyphicon-pencil"></span> 
                            </a>

                            <a href="{{route('agenda_trabalho.show',$agenda->id) }}" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </th>>
                    </tr>
                    @endforeach

                    @endforeach
                </table>

            </div>
        </div>

    </div>


</div>



















@stop
