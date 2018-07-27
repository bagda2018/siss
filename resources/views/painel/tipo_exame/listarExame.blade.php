@extends('templates.estrutura')

@section('conteudo')



<!-- ROW 1 -->
<div class="row marow service-box">
    <div class="col-md-12 ">
        <!-- BLOCK START-->
        <div class="panel panel- panel-info ">   
            <div class="panel-heading ">
                <h1 class="panel-title">{{$titulo}}</h1>
                <div class="form-actions col-md-4 right  " style="margin-left: 670px;margin-top: -27px;">
                    {{ Form::open(['route' => 'buscarExames']) }}
                    
                    {{ Form::text('busca',null,array('placeholder'=>'Ex. Dermatologia','class'=> 'form-control')) }}
                    <div class="form-actions  " style="margin-right: -96px;margin-top: -34px;">
                    {{  Form::submit('Pesquisar',array('class'=> 'btn btn-primary')) }}
                    </div>
                     {{ Form::close() }}
                    
                </div>
            </div>


            <div class="panel-body margin-top-10">


                @foreach($exames as $exame) 
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::text('codigo_postal', $exame->name, array('class'=> 'form-control','disabled'=>'')) }}
                    </div>
                </div>

                @endforeach

                @if(isset($dados))
                    {{$exames->appends($dados)->links()}}
                @else
                
                {{$exames->links()}}
                
                @endif


            </div>

        </div>

    </div>

</div>

{{Form::close()}}






@stop


