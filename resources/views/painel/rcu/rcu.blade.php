@extends('templates.estrutura')

@section('conteudo')


@if( isset($rcu) )
    {{ Form::model( $rcu, ['route' => ['rcu.update',$rcu->id], 'class' => 'form', 'method' => 'put' ] ) }}
@else
{{ Form::open(  ['route' => 'rcu.store', 'class' => 'form']  ) }} 
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
                        {{  Form::label('utente_id', 'Utentes') }}
                        {{ Form::select('utente_id', $utentes, null, ['class'=> 'form-control']) }}
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('sexo', 'Sexo') }}
                         {{ Form::select('sexo',['Masculino','Feminino'], null, ['class'=> 'form-control']) }}
                    </div>
                </div>
                  
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('grupo_sanguino', 'Grupo Sanguinio') }}
                         {{ Form::select('grupo_sanguino_id',$tipos, null, ['class'=> 'form-control']) }}
                    </div>
                </div>
                
                

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('pessoal_clinico_id', 'Medico') }}
                        {{ Form::select('pessoal_clinico_id',$pessoal_clinico, null, ['class'=> 'form-control']) }}
                    </div>
                </div>

                <div class="col-md-6">
                    
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('alergico', 'Es Alergico') }}
                        {{  Form::text('alergico', null, array('placeholder'=>'','class'=> 'form-control')) }}
                        
                    </div
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


