@extends('templates.estrutura')

@section('conteudo')

 <div class="col-md-14 ">
<div class="container">
    <div class="col-sm-6 col-md-6">
        <div class="wow fadeInUp" data-wow-delay="0.2s">
            <img src="assets/img/photos/img-1.jpg" class="img-responsive" alt="" />
        </div>
    </div> 
    
    <div class="col-xs-6" style="margin-top:80px">
         <div class="panel panel-info">
            <div class="panel-heading" style="font-size: 20px"> {{ $titulo }}</div>

            @foreach($exames as $exame) 
            <div class="panel-body" style="font-size: 30px">{{ $exame->name}}</div>
            @endforeach

            {{$exames->links()}}

        </div>
    </div> 
</div>

</div>














@stop
