@extends('templates.estrutura')

@section('conteudo')


@if( isset($consulta) )
 @php $codigo = base64_encode(base64_encode('bagda@2018').base64_encode($consulta->id)) @endphp
{{ Form::model($consulta, ['route' => ['consulta.update',$codigo], 'class' => 'form', 'method' => 'put' ] ) }}
   
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
                <h1 class="panel-title" style="color: #000">{{$titulo}} </h1>
              
               
            </div>
            <div class="panel-body">

                 <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('name', 'Paciente') }}
                        {{  Form::text('name', $consulta->utente->name, array('class'=> 'form-control','disabled'=>'')) }}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('estado', 'Estado') }}
                        {{ Form::select('estado',$estados, null, ['class'=> 'form-control']) }}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('dia', 'Data Consulta') }}
                        {{  Form::date('dia', null, array('class'=> 'form-control','disabled'=>'')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('hora', 'Hora da Consulta') }}
                        {{  Form::time('hora', null, array('class'=> 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('numero', 'Nº Utente') }}
                        {{  Form::text('numero', $consulta->utente->numero, array('class'=> 'form-control','disabled'=>'')) }}
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


