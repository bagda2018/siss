@extends('templates.estrutura')

@section('conteudo')
@if( isset($categoriaclinica) )
{{ Form::model( $categoriaclinica, ['route' => ['categoria_clinica.update',$categoriaclinica->id], 'class' => 'form', 'method' => 'put' ] ) }}  
@else
{{ Form::open( ['route' => 'categoria_clinica.store', 'class' => 'form']  ) }} 
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
                        {{  Form::label('name', 'Nome') }}
                        {{  Form::text('name', null, array('placeholder'=>'Ex. Enfermeiro','class'=> 'form-control')) }}
                    </div>
                </div>
            
            <!-- DAdos da conta fin-->

            <div class="form-actions right margin-bottom-10" style="margin-top:-42px;">
                {{  Form::submit('Salvar',['class' => 'btn blue ']) }}
                {{  Form::reset('Limpar',['class' => 'btn default']) }}
            </div>
        </div>

    </div>

</div>

{{Form::close()}}






@stop

