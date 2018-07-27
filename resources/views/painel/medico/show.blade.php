@extends('templates.estrutura')

@section('conteudo')
@php $codigo = base64_encode(base64_encode('bagda@2018').base64_encode($medico->user->id)) @endphp
{{ Form::model( $medico, ['route' => ['medico.update',$codigo], 'class' => 'form'] ) }}
<!-- ROW 1 -->
<div class="row marow service-box">
    <div class="col-md-12 ">
        <!-- BLOCK START-->
        <div class="panel panel- panel-info">   
            <div class="panel-heading">
                <h1 class="panel-title" style="font-size: 30px">{{$titulo}}</h1>

                <div class="form-actions right" style="margin-top:-10px" >
                    <a data-toggle="tooltip" title="Editar" href=" {{route('medico.edit',$codigo) }} ">
                        <span class="glyphicon glyphicon-pencil" style="font-size: 30px"></span> 
                    </a>

                </div>

            </div>
            <div class="panel-body">

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('name', 'Nome') }}
                        {{  Form::text('name', null, array('class'=> 'form-control','disabled'=>'')) }}
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('email', 'Email') }}
                        {{  Form::email('email',$medico->user->email, array('class'=> 'form-control ','disabled'=>'')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('data', 'Data Nascimento') }}
                        {{  Form::date('data', null, array('class'=> 'form-control','disabled'=>'')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('sexo', 'Genero') }}
                        {{  Form::text('sexo', null, array('class'=> 'form-control','disabled'=>'')) }}
                    </div>
                </div>

                 <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('categoria_medica_id', 'Categoria Medica') }}
                        {{ Form::text('categoria_medica_id',$medico->categoria_clinica->name, array('class'=> 'form-control','disabled'=>'') ) }}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('especialidade_id', 'Especialidade') }}
                        {{ Form::text('especialidade_id',$medico->especialidade->name, array('class'=> 'form-control','disabled'=>'') ) }}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('codigo_postal', 'Codigo Postal') }}
                        {{  Form::text('codigo_postal', null, array('class'=> 'form-control','disabled'=>'')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('telefone', 'Telefone') }}
                        {{ Form::text('telefone', null, array('class'=> 'form-control','disabled'=>'') ) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('municipio', 'Municipio') }}
                        {{  Form::text('municipio',$medico->municipio->name, array('class'=> 'form-control','disabled'=>'')) }}
                    </div>
                </div>

               
            </div>

            <div class="col-xs-4"style="margin-bottom:2px;" > <!-- imagem User-->
                <img src="{{ url('assets/img/photos/user.png' )}}" class="img-responsive" alt="" />
            </div><!-- imagem User end-->

            <!-- DAdos da conta-->
            <div class="container" style="margin-bottom:2px;">
                <h4> <b>{{ $dados_conta }} </b></h4> 
                <hr>
                <div class="col-xs-8" style="margin-left: 400px;margin-top:-150px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{  Form::label('username', 'Username') }}
                            {{  Form::text('username', $medico->user->username, array('placeholder'=>'Ex. uan.sis','class'=> 'form-control','disabled'=>'')) }}
                        </div>
                    </div>


                </div> 
            </div>
            <!-- DAdos da conta fin-->
        </div>

    </div>

</div>

{{Form::close()}}


@stop


