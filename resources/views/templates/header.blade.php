<head>
    <meta charset="utf-8" />
    <title>Metronic Frontend | Home with Top Bar</title>
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
    <!-- END THEME STYLES -->

    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>
    <!-- BEGIN STYLE CUSTOMIZER -->
    <div class="color-panel hidden-sm">
        <div class="color-mode-icons icon-color"></div>
        <div class="color-mode-icons icon-color-close"></div>
        <div class="color-mode">
            <p>THEME COLOR</p>
            <ul class="inline">
                <li class="color-blue current color-default" data-style="blue"></li>
                <li class="color-red" data-style="red"></li>
                <li class="color-green" data-style="green"></li>
                <li class="color-orange" data-style="orange"></li>
            </ul>
            <label>
                <span>Header</span>
                <select class="header-option form-control input-small">
                    <option value="default" selected>Default</option>
                    <option value="fixed">Fixed</option>
                </select>
            </label>
        </div>
    </div>
    <!-- END BEGIN STYLE CUSTOMIZER -->     

    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-default navbar-static-top">
        <!-- BEGIN TOP BAR -->
        <div class="front-topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <ul class="list-unstyle inline">
                            <li><i class="icon-phone topbar-info-icon top-2"></i>Call us: <span>(1) 456 6717</span></li>
                            <li class="sep"><span>|</span></li>
                            <li><i class="icon-envelope-alt topbar-info-icon top-2"></i>Email: <span>info@keenthemes.com</span></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-6 topbar-social">
                        <ul class="list-unstyled inline">
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-google-plus"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon-youtube"></i></a></li>
                            <li><a href="#"><i class="icon-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>        
        </div>
        <!-- END TOP BAR -->
        <div class="container">
            <div class="navbar-header">
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <button class="navbar-toggle btn navbar-btn" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN LOGO (you can use logo image instead of text)-->
                <a class="navbar-brand logo-v1" href="index.html">
                    <img src="{{ url('assets/img/logo_blue.png' )}}" id="logoimg" alt="">
                </a>
                <!-- END LOGO -->
            </div>

            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown active">
                        <li class="active"><a href="{{ route('site.index' )}}">Home</a></li>
                    </li>
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            Pages
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="page_prices.html">Prices</a></li>
                            <li><a href="page_faq.html">FAQ</a></li>
                            <li><a href="page_gallery.html">Gallery</a></li>
                            <li><a href="page_search_result.html">Search Result</a></li>
                            <li><a href="page_404.html">404</a></li>
                            <li><a href="page_500.html">500</a></li>
                            <li><a href="page_contacts.html">Contact</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            Features
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="feature_typography.html">Typography</a></li>
                            <li><a href="feature_buttons.html">Buttons</a></li>
                            <li><a href="feature_forms.html">Forms</a></li>
                            <li><a href="feature_icons.html">Icons</a></li>
                        </ul>
                    </li>                        
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            Portfolio
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="portfolio_4.html">Portfolio 4</a></li>
                            <li><a href="portfolio_3.html">Portfolio 3</a></li>
                            <li><a href="portfolio_2.html">Portfolio 2</a></li>
                            <li><a href="portfolio_item.html">Portfolio Item</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            Blog
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="blog.html">Blog Page</a></li>
                            <li><a href="blog_item.html">Blog Item</a></li>
                        </ul>
                    </li>
                    <li><a href="http://www.keenthemes.com/preview/index.php?theme=metronic_admin&page=index.html" target="_blank">Admin Theme</a></li>
                    <li class="menu-search">
                        <span class="sep"></span>
                        <i class="icon-search search-btn"></i>

                        <div class="search-box">
                            <form action="#">
                                <div class="input-group input-large">
                                    <input class="form-control" type="text" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn theme-btn">Go</button>
                                    </span>
                                </div>
                            </form>
                        </div> 
                    </li>
                </ul>                         
            </div>
            <!-- BEGIN TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER -->

    

    
    
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
        jQuery(document).ready(function() {
            App.init();    
            App.initBxSlider();
            Index.initRevolutionSlider();                    
        });
    </script>