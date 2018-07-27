<html>
    <head>
        <title> SIS</title>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- BEGIN GLOBAL MANDATORY STYLES -->     

        <link href="{{ url('assets/plugins/font-awesome/css/font-awesome.min.css' )}}" rel="stylesheet" type="text/css"/>
        <link href="{{ url('assets/plugins/bootstrap/css/bootstrap.min.css' )}}" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
        <link href="{{ url('assets/plugins/fancybox/source/jquery.fancybox.css' )}}" rel="stylesheet" />              
        <link rel="stylesheet" href="{{ url('assets/plugins/revolution_slider/css/rs-style.css' )}}" media="screen">
        <link rel="stylesheet" href="{{ url('assets/plugins/revolution_slider/rs-plugin/css/settings.css' )}}" media="screen"> 
        <link href="{{ url('assets/plugins/bxslider/jquery.bxslider.css' )}}" rel="stylesheet" />                
        <!-- END PAGE LEVEL PLUGIN STYLES -->

        <!-- BEGIN THEME STYLES --> 
        <link href="{{ url('assets/css/style-metronic.css' )}}" rel="stylesheet" type="text/css"/>
        <link href="{{ url('assets/css/style.css' )}}" rel="stylesheet" type="text/css"/>
        <link href="{{ url('assets/css/themes/blue.css' )}}" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="{{ url('assets/css/style-responsive.css' )}}" rel="stylesheet" type="text/css"/>
        <link href="{{ url('assets/css/custom.css' )}}" rel="stylesheet" type="text/css"/>
        
         <link rel="stylesheet" href="{{ url('assets/css/sweet-alert.css' )}}"/>
        <link rel="stylesheet" href="{{ url('assets/css/material-design-iconic-font.min.css' )}}"/>
        <link rel="stylesheet" href="{{ url('assets/css/normalize.css' )}}" />
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css')}}" />
        
        <link rel="stylesheet" href="{{ url('assets/css/jquery.mCustomScrollbar.css' )}}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css' )}}">

    </head>

    <body>      

        @include('templates.menu')

        <div class="container">
            <div class="content">
                @yield('conteudo')
            </div>
        </div>


       
       
       
 <script src="{{ url('assets/plugins/jquery-1.10.2.min.js' )}}" type="text/javascript"></script>
            <script src="{{ url('assets/plugins/jquery-migrate-1.2.1.min.js' )}}" type="text/javascript"></script>
            <script src="{{ url('assets/plugins/bootstrap/js/bootstrap.min.js' )}}" type="text/javascript"></script>      
            <script type="text/javascript" src="{{ url('assets/plugins/hover-dropdown.js' )}}"></script>
            <script type="text/javascript" src="{{ url('assets/plugins/back-to-top.js' )}}"></script>    
            <!-- END CORE PLUGINS -->

            <!-- BEGIN PAGE LEVEL JAVASCRIPTS(REQUIRED ONLY FOR CURRENT PAGE) -->
            <script type="text/javascript" src="{{ url('assets/plugins/fancybox/source/jquery.fancybox.pack.js' )}}"></script>  
            <script type="text/javascript" src="{{ url('assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js' )}}"></script>
            <script type="text/javascript" src="{{ url('assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js' )}}"></script> 
            <script type="text/javascript" src="{{ url('assets/plugins/bxslider/jquery.bxslider.min.js' )}}"></script>
            <script src="{{ url('assets/scripts/app.js' )}}"></script>
            <script src="{{ url('assets/scripts/index.js' )}}"></script>    
            <script type="text/javascript">
        jQuery(document).ready(function () {
            App.init();
            App.initBxSlider();
            Index.initRevolutionSlider();
        });
            </script>
    </body>


</html>