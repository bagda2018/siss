@extends('templates.estrutura')

@section('conteudo')



{{ Form::model( $rcu, ['route' => ['rcu.update',$rcu->id], 'class' => 'form'] ) }}
<!-- ROW 1 -->
<div class="row marow service-box">
    <div class="col-md-12 ">
        <!-- BLOCK START-->
        <div class="panel panel- panel-info">   
            <div class="panel-heading">
                <h1 class="panel-title" style="font-size: 30px">{{$titulo}}</h1>

                <div class="form-actions right" style="margin-top:-10px" >
<!--                    <a href=" {{route('utente.index') }} ">
                        <span style="font-size: 30px; margin-right: 10px"> Voltar</span> 
                    </a>-->
                    <a data-toggle="tooltip" title="Editar" href=" {{route('rcu.edit',$rcu->id) }} ">
                        <span class="glyphicon glyphicon-pencil" style="font-size: 30px"></span> 
                    </a>
                    
                </div>

            </div>
            <div class="panel-body">

               


                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('name', 'Paciente') }}
                        {{  Form::email('name',$rcu->utente->name, array('class'=> 'form-control ','disabled'=>'')) }}
                    </div>
                </div>

                 
                  
                    <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('grupo_sanguino', 'Grupo sanguinio') }}
                        {{ Form::text('grupo_sanguino', null, array('class'=> 'form-control','disabled'=>'') ) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('pessoal_clinico_id', 'Medico') }}
                        {{ Form::text('pessoal_clinico_id',$rcu->pessoalClinico->name, array('class'=> 'form-control','disabled'=>'') ) }}
                    </div>
                </div>
                 
                    
                    <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('sexo', 'SEXO') }}
                        {{ Form::text('sexo', null, array('class'=> 'form-control','disabled'=>'') ) }}
                    </div>
               
                    <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('alergico', 'Alergico') }}
                        {{ Form::text('alergico', null, array('class'=> 'form-control','disabled'=>'') ) }}
                    </div>


                

            <div class="col-xs-4"style="margin-bottom:2px;" > <!-- imagem User-->
                <img src="{{ url('assets/img/photos/user.png' )}}" class="img-responsive" alt="" />
            </div><!-- imagem User end-->

          
        </div>

    </div>

</div>

{{Form::close()}}






@stop


