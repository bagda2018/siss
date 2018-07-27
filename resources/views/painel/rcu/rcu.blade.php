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
                        {{  Form::label('Paciente', 'Paciente') }}
                         {{ Form::select('paciente',['Paciente 1','Paciente 2','Paciente 3'], null, ['class'=> 'form-control']) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('Sexo', 'Sexo') }}
                         {{ Form::select('sexo',['Masculino','Femenino'], null, ['class'=> 'form-control']) }}
                    </div>
                </div>
                                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('grupo_sanguino', 'Grupo Sanguino') }}
                        {{  Form::text('grupo_sanguino', null, array('placeholder'=>'Ex. L','class'=> 'form-control')) }}
                    </div>
                </div>                                                
               

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('diagnostico', 'Diagnostico') }}
                         {{ Form::select('paciente',['Diagnostico 1','Diagnostico 2','Diagnostico 3'], null, ['class'=> 'form-control']) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('temperatura', 'Temperatura') }}
                         {{ Form::select('paciente',['Temperatura 1','Temperatura 2','Temperatura 3'], null, ['class'=> 'form-control']) }}
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('isalergico', 'is Alergico') }}
                        {{  Form::radio('isalergico') }}
                        
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


