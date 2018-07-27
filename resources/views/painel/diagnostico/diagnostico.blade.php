@extends('templates.estrutura')

@section('conteudo')


@if( isset($utente) )
    {{ Form::model( $utente, ['route' => ['utente.update',$utente->id], 'class' => 'form', 'method' => 'put' ] ) }}
@else
{{ Form::open(  ['route' => 'utente.store', 'class' => 'form']  ) }} 
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
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('Diagnostico', 'Diagnostico') }}
                        {{  Form::text('Diagnostico', null, array('placeholder'=>'','class'=> 'form-control')) }}
                    </div>
                </div>
                
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('Consulta', 'Consulta') }}
                        {{  Form::text('Consulta',null, array('placeholder'=>'','class'=> 'form-control')) }}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('Procedimento', 'Procedimento') }}
                        {{  Form::textarea('Procedimentp', null, array('placeholder'=>'','class'=> 'form-control')) }}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('RCU', 'RCU') }}
                         {{ Form::select('entidade_financeira',['SIS','UAN','BAGDA'], null, ['class'=> 'form-control']) }}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('nome_completo', 'Nome') }}
                        {{  Form::text('Nome Completo', null, array('placeholder'=>'Ex: Maria','class'=> 'form-control')) }}
                    </div>
                </div>
                
                 <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('ID Medico', 'ID Medico') }}
                         {{ Form::select('ID_Medico',['a', 'b'], null, ['class'=> 'form-control'] ) }}
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