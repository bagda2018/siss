@extends('templates.estrutura')

@section('conteudo')


@if( isset($exame) )
{{ Form::model( $exame, ['route' => ['exame.update',$exame->id], 'class' => 'form', 'method' => 'put' ] ) }}
@else
{{ Form::open(  ['route' => 'exame.store', 'class' => 'form']  ) }} 
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

                        {{  Form::label('especialidade', 'Especialidades') }}
                        <!--<a href="{{route('medico.edit',1 )}} "-->
                        <!--                          >-->
                        <select class="form-control" name="especialidade" id="especialidade">

                            @foreach($especialidades as $especialidade): 
                            <option  class="teste"style="width:508px" value="{{$especialidade}}">
                                {{$especialidade}} 
                            </option>
                            @endforeach

                        </select>
                        <!--</a>-->
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('tipo_exame_id', 'Tipo de Exame') }}
                        {{ Form::select('tipo_exame_id',$exames, null, ['class'=> 'form-control']) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('data', 'Data de Exame') }}
                        {{  Form::date('data', null, array('placeholder'=>'Ex.111-rua 9','class'=> 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('hora', 'Hora de Exame') }}
                        {{  Form::time('hora', null, array('class'=> 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('numero', 'Nº Utente') }}
                        {{ Form::text('numero', null, ['placeholder'=>'Ex.9','class'=> 'form-control']) }}
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

    <script>
       $(document).on('click','.teste',function(){
           alert('kkkkkkkkkkk');
        });

    </script>

    @stop


