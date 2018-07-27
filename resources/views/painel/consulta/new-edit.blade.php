@extends('templates.estrutura')

@section('conteudo')


@if( isset($consulta) )
{{ Form::model($consulta, ['route' => ['consulta.update',$consulta->id], 'class' => 'form', 'method' => 'put' ] ) }}
@else
{{ Form::open(  ['route' => 'consulta.store', 'class' => 'form']  ) }} 
{{ csrf_field()}}
@endif

<!-- ROW 1 -->
<div class="row marow service-box">
    <div class="col-md-11 ">
        <!-- BLOCK START-->
        <div class="panel panel- panel-info" style="margin-left:180px;">   
            <div class="panel-heading">
                <h1 class="panel-title">{{$titulo}}</h1>
            </div>
            <div class="panel-body">

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('especialidade_id', 'Especialidade') }}
                        {{ Form::select('especialidade_id',$especialidades, null, ['class'=> 'form-control']) }}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('dia', 'Data Consulta') }}
                        {{  Form::date('dia', null, array('placeholder'=>'Data da Consulta','class'=> 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('hora', 'Hoda da Consulta') }}
                        {{  Form::time('hora', null, array('class'=> 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('numero', 'Nº Utente') }}
                        {{  Form::text('numero', null, array('placeholder'=>'Data da Consulta','class'=> 'form-control')) }}
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


