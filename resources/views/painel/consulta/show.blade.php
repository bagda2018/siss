@extends('templates.estrutura')

@section('conteudo')
@php $codigo = base64_encode(base64_encode('bagda@2018').base64_encode($consulta->id)) @endphp
{{ Form::model( $consulta, ['route' => ['medico.update',$codigo], 'class' => 'form'] ) }}
<!-- ROW 1 -->
<div class="row marow service-box">
    <div class="col-md-12 ">
        <!-- BLOCK START-->
        <div class="panel panel- panel-info">   
            
            <div class="panel-heading">
                <h1 class="panel-title" style="font-size: 30px">{{$titulo}}</h1>
                

                    @can('permission_admin')
                <div class="form-actions right" style="margin-top:-10px" >
                    <a data-toggle="tooltip" title="Editar" href=" {{route('consulta.edit',$codigo) }} ">
                        <span class="glyphicon glyphicon-pencil" style="font-size: 30px"></span> 
                    </a>
                </div>
                     @endcan
            </div>
            
            <div class="panel-body">

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('name', 'Paciente') }}
                        {{ Form::text('name',$consulta->utente->name,['class'=> 'form-control','disabled'=>'']) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('numero', 'Nº Utente') }}
                        {{ Form::text('numer',$consulta->utente->numero,['class'=> 'form-control','disabled'=>'']) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('especialidade_id', 'Especialidade') }}
                        {{ Form::text('especialidade_id',$consulta->especialidade->name,['class'=> 'form-control','disabled'=>'']) }}
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('dia', 'Data Consulta') }}
                        {{  Form::text('dia', null, array('class'=> 'form-control','disabled'=>'')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('hora', 'Hora da Consulta') }}
                        {{  Form::text('hora', null, array('class'=> 'form-control','disabled'=>'')) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('estado', 'Estado') }}
                        {{ Form::text('estado', null, ['class'=> 'form-control','disabled'=>'']) }}
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

{{Form::close()}}


@stop


