@extends('templates.estrutura')

@section('conteudo')

    <!-- BEGIN PAGE CONTAINER -->  
    <div class="page-container">
        <!-- BEGIN REVOLUTION SLIDER -->    
        <div class="fullwidthbanner-container slider-main">
            <div class="fullwidthabnner">
                <ul id="revolutionul" style="display:none;">            
                        <!-- THE FIRST SLIDE -->
                        <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="{{url('assets/img/photos/bg.jpg')}}">
                            <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                            <img src="{{url('assets/img/photos/bg.jpg')}}" alt="">
                            
                            <div class="caption lft slide_title slide_item_left"
                                 data-x="0"
                                 data-y="105"
                                 data-speed="400"
                                 data-start="1500"
                                 data-easing="easeOutExpo">
                                Unidos para uma saude melhor
                            </div>
                            <div class="caption lft slide_subtitle slide_item_left"
                                 data-x="0"
                                 data-y="180"
                                 data-speed="400"
                                 data-start="2000"
                                 data-easing="easeOutExpo">
                                A vida é completada com uma boa saude
                            </div>
                            <div class="caption lft slide_desc slide_item_left"
                                 data-x="0"
                                 data-y="220"
                                 data-speed="400"
                                 data-start="2500"
                                 data-easing="easeOutExpo">
                                Saude cuidada uma vida melhor
                            </div>
                            <a class="caption lft btn green slide_btn slide_item_left" href="{{route('utente.create')}}"
                                 data-x="0"
                                 data-y="290"
                                 data-speed="400"
                                 data-start="3000"
                                 data-easing="easeOutExpo">
                                 Cadastrar - se
                            </a>                        
                            <div class="caption lfb"
                                 data-x="640" 
                                 data-y="0" 
                                 data-speed="700" 
                                 data-start="1000" 
                                 data-easing="easeOutExpo"  >
                                 <img src="{{url('assets/img/photos/img.png')}}" alt="Image 1" style="width: 420px;height: 404px">
                            </div>
                        </li>

                        <!-- THE SECOND SLIDE -->
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-delay="9400" data-thumb="{{url('assets/img/photos/bg.jpg')}}">                        
                            <img src="{{url('assets/img/photos/bg.jpg')}}" alt="">
                            <div class="caption lfl slide_title slide_item_left"
                                 data-x="0"
                                 data-y="50"
                                 data-speed="400"
                                 data-start="3500"
                                 data-easing="easeOutExpo">
                                SIS, velando para o bem da <br> população
                            </div>
                            <div class="caption lfl slide_subtitle slide_item_left"
                                 data-x="0"
                                 data-y="200"
                                 data-speed="400"
                                 data-start="4000"
                                 data-easing="easeOutExpo">
                                
                            </div>
                            <div class="caption lfl slide_desc slide_item_left"
                                 data-x="0"
                                 data-y="245"
                                 data-speed="400"
                                 data-start="4500"
                                 data-easing="easeOutExpo">
                            </div>                        
                            <div class="caption lfr slide_item_right" 
                                 data-x="635" 
                                 data-y="0" 
                                 data-speed="1200" 
                                 data-start="1500" 
                                 data-easing="easeOutBack">
<!--                                 <img src="assets/img/sliders/revolution/mac.png" alt="Image 1">-->
                                <img src=" {{url('assets/img/photos/img-3.png')}}" alt="Image 1" style="width: 420px;height: 404px">
                            </div>
                            <div class="caption lfr slide_item_right" 
                                 data-x="580" 
                                 data-y="245" 
                                 data-speed="1200" 
                                 data-start="2000" 
                                 data-easing="easeOutBack">
                                 <img src="assets/img/sliders/revolution/ipad.png" alt="Image 1">
                            </div>
                            <div class="caption lfr slide_item_right" 
                                 data-x="735" 
                                 data-y="290" 
                                 data-speed="1200" 
                                 data-start="2500" 
                                 data-easing="easeOutBack">
                                 <img src="assets/img/sliders/revolution/iphone.png" alt="Image 1">
                            </div>
                            <div class="caption lfr slide_item_right" 
                                 data-x="835" 
                                 data-y="230" 
                                 data-speed="1200" 
                                 data-start="3000" 
                                 data-easing="easeOutBack">
                                 <img src="assets/img/sliders/revolution/macbook.png" alt="Image 1">
                            </div>
                            
                        </li>
                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div>
        <!-- END REVOLUTION SLIDER -->
    	
        <!-- BEGIN CONTAINER -->   
        <div class="container">
            <!-- BEGIN SERVICE BOX -->   
            <div class="row service-box">
                @foreach($posts as $post)
                <div class="col-md-4 col-sm-4">
                    <div class="service-box-heading">
                        <em><i class="icon-location-arrow blue"></i></em>
                        <?php
                            if($post->name == "Marcar Consulta"){
                                $route = "consulta/create" ;
                            }else{
                                $route = "#";
                            }
                        
                        ?>
                        <span> <a href="{{ $route }}">{{$post->name}} </a> </span>
                    </div>
                    <p> {{$post->conteudo}} </p>
                </div>
                @endforeach
               
                
            </div>
            <!-- END SERVICE BOX -->  

          

            <div class="clearfix"></div>

            <div class="clearfix"></div>


        <!-- END CONTAINER -->
    </div>
    <!-- END PAGE CONTAINER -->


@stop
