@extends('templates.estrutura')

@section('conteudo')




@if( isset($agenda) )
{{ Form::model( $agenda, ['route' => ['agenda_trabalho.update',$agenda->id], 'class' => 'form', 'method' => 'put' ] ) }}
@else
{{ Form::open( ['route' => 'agenda_trabalho.store', 'class' => 'form']  ) }} 

@endif

<div class="alert alert-success alert-dismissable">
    <button type="button" class="close hidden" data-dismiss="alert">
        ➥&times;</button>
    Amount has been transferred successfully.
</div>


<!-- ROW 1 -->
<div class="row marow service-box" style="margin-left:150px">
    <div class="col-md-10 " >
        <!-- BLOCK START-->
        <div class="panel panel- panel-info">   
            <div class="panel-heading">
                <h1 class="panel-title">{{$titulo}}</h1>
            </div>
            <div class="panel-body">

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('pessoal_clinico_id', 'Medico') }}
                        {{ Form::select('pessoal_clinico_id',$pessoal_clinicos, null, ['class'=> 'form-control']) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('hora_inicio', 'Hora de Entrada') }}
                        {{  Form::time('hora_inicio', null, array('class'=> 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('data', 'Data de Trabalho') }}
                        {{  Form::date('data', null, array('class'=> 'form-control')) }}
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('hora_termino', 'Hora de Saida') }}
                        {{  Form::time('hora_termino', null, array('class'=> 'form-control')) }}
                    </div>
                </div>

            </div>

            <div class="form-actions right margin-bottom-10" style="margin-top:-42px;">
                {{  Form::submit('Salvar',['class' => 'btn blue ']) }}
                {{  Form::reset('Limpar',['class' => 'btn default']) }}
            </div>
        </div>

    </div>

</div>

{{Form::close()}}



<script>
    $(document).ready(function() {
        if($('.close')){
            alert('kkkkkkkkk');
        }
  
    }); 
</script>


@stop


