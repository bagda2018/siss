@extends('templates.estrutura')

@section('conteudo')


@if( isset($utente) )
    {{ Form::model( $utente, ['route' => ['consulta.update',$utente->id], 'class' => 'form', 'method' => 'put' ] ) }}
@else
{{ Form::open(  ['route' => 'consulta.store', 'class' => 'form']  ) }} 
{{ csrf_field()}}
@endif


<!-- ROW 1 -->
<div class="row marow service-box">
    <div class="col-md-12 ">
        <!-- BLOCK START-->
        <div class="panel panel- panel-info">   
            <div class="panel-heading">
                <h1 class="panel-title">{{$titulo}}</h1>
            </div>
            <div class="panel-body">
                        {{  Form::hidden('estado') }}
                
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('entidade_financeira', 'Especialidade') }}
                         {{ Form::select('especialidade_id',['SIS','UAN','BAGDA'], null, ['class'=> 'form-control']) }}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('data_consulta', 'Data Consulta') }}
                        {{  Form::date('data_consulta', null, array('placeholder'=>'Data da Consulta','class'=> 'form-control')) }}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('hora_consulta', 'Hoda da Consulta') }}
                        {{  Form::time('hora_consulta', null, array('class'=> 'form-control')) }}
                    </div>
                </div>
                
                         <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('medico_id', 'Medico') }}
                         {{ Form::select('medico_id',['SIS','UAN','BAGDA'], null, ['class'=> 'form-control']) }}
                    </div>
                </div>
             
                  </div>

             
            <div class="form-actions right margin-bottom-10">
                {{  Form::submit('Salvar',['class' => 'btn blue ']) }}
                {{  Form::reset('Limpar',['class' => 'btn default']) }}
            </div>
        </div>

    </div>

</div>

{{Form::close()}}






@stop


