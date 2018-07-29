<header>

    @if (!(Auth::guest()))
    @php $codigo = base64_encode(base64_encode('bagda@2018').base64_encode(Auth::user()->id)) @endphp
    @endif
    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-default navbar-static-top">
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
                <a class="navbar-brand logo-v1" href="{{ route('site.index' )}}">
<!--                    <img src="{{ url('assets/img/teste.png' )}}" id="logoimg" alt="">-->
                </a>
                <!-- END LOGO -->
            </div>

            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">

                    <li><a href="{{ route('site.index' )}}">Home</a></li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            Area Medica
                            <i class="icon-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{ route('especialidade.index' )}}">Visualizar Especialidades</a></li>
                            <li><a href="{{ route('tipo_exame.index' )}}">Visualizar Tipo de Exames</a></li>
                            <li><a href="{{ route('medico.index' )}}">Visualizar Medicos</a></li>
                            <li><a href="#tab_diario" data-toggle="tab" id="dia"> Diário </a></li>  
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            Utente
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a href="#">
                                    Registo
                                </a>
                                <ul class="dropdown-menu" style="margin-top:0px">
                                    <li><a href="{{ route('utente.create' )}}">Novo</a></li>
                                    @can('permission_utente')
                                    <li><a href="{{ route('utente.show', $codigo ) }}">Visualizar Dados</a></li>
                                    @endcan
                                </ul>
                            </li>
                            @can('permission_utente') 
                            <li class="dropdown-submenu">
                                <a href="#">
                                    Consulta
                                </a>
                                <ul class="dropdown-menu" style="margin-top:37px">
                                    <li><a href="{{ route('consulta.create') }}">Nova</a></li>
                                    @can('permission_clinico')
                                    <li><a href="#" data-target="#myModal"  data-toggle="modal" data-backdrop="static"> Nova</a> </li>
                                    @endcan
                                    <li><a href="{{ route('utente_consultas',["pendente",$codigo]) }}">Marcadas</a></li>
                                    <li><a href="{{ route('utente_consultas',["realizada",$codigo])}}">Realizadas</a></li>
                                </ul> 
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#">
                                    Exames
                                </a>
                                <ul class="dropdown-menu" style="margin-top:75px">
                                    <li><a href="{{ route('exame.create') }}">Novo</a></li>
                                    @can('permission_clinico')
                                    <li><a href="#" data-target="#myModal"  data-toggle="modal" data-backdrop="static"> Novo</a> </li>
                                    @endcan
                                    <li><a href="{{ route('utente_consultas',["pendente",$codigo]) }}">Marcados</a></li>
                                    <li><a href="{{ route('utente_consultas',["realizada",$codigo])}}">Realizados</a></li>
                                </ul> 
                            </li>
                            @endcan
                        </ul>
                    </li>

                    @can('permission_clinico')
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            Pessoal Clinico
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a href="#">
                                    Dados Pessoais
                                </a>
                                <ul class="dropdown-menu" style="margin-top:0px">
                                    <li><a href="{{ route('medico.edit',$codigo)}}">Editar</a></li>
                                    <li><a href="{{ route('medico.show',$codigo)}}">Visualizar</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#">
                                    Gerir RCU
                                </a>
                                <ul class="dropdown-menu" style="margin-top:37px">
                                    <li><a href="{{ route('rcu.create' )}}">Novo</a></li>
                                    <li><a href="{{ route('rcu.index' )}}">Visualizar Todos</a></li>
                                </ul>
                            </li>

                            <li class="dropdown-submenu">
                                <a href="#">
                                    Consulta
                                </a>
                                <ul class="dropdown-menu" style="margin-top:75px">
                                    <li><a href="{{ route('buscar_consultas', ["pendente",$codigo])}}">Realizar</a></li>
                                    <li><a href="{{ route('buscar_consultas', ["realizada",$codigo])}}">Realizada</a></li>
                                    <li><a href="{{ route('consulta.index') }}">Visualizar Todas</a></li>
                                </ul>
                            </li>

                            <li class="dropdown-submenu">
                                <a href="#">
                                    Exame
                                </a>
                                <ul class="dropdown-menu" style="margin-top:115px">
                                    <li><a href="{{ route('exame.update',$codigo )}}">Realizar</a></li>
                                    <li><a href="{{ route('exame.show',$codigo) }}">Visualizar Todos</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endcan

                    @can('permission_admin')
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            Administrador
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">

                            <li class="dropdown-submenu">
                                <a href="#">
                                    Administrador
                                </a>
                                <ul class="dropdown-menu"style="margin-top:0px">
                                    @can('permission_super_admin')
                                    <li><a href="{{ route('administrador.create' )}}">Novo</a></li>
                                    @endcan
                                    <li><a href="{{ route('administrador.show', $codigo ) }}">Visualizar Dados Pessoais</a></li>
                                    <li><a href="{{ route('administrador.index') }}">Ver todos</a></li>


                                </ul>
                            </li>


                            <li class="dropdown-submenu">
                                <a href="#">
                                    Utentes
                                </a>
                                <ul class="dropdown-menu" style="margin-top:37px">
                                    <li><a href="{{ route('utente.create' )}}">Novo Registo</a></li>
                                    <li><a href="{{ route('utente.index') }}">Visualizar Todos</a></li>
                                </ul>
                            </li>


                            <li class="dropdown-submenu">
                                <a href="#">
                                    Consulta
                                </a>
                                <ul class="dropdown-menu" style="margin-top:37px">
                                    <li><a href="{{ route('consulta.create' )}}">Nova</a></li>
                                    <li><a href="{{ route('consulta.index') }}">Visualizar Todas</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#">
                                    Pessoal Clinico
                                </a>
                                <ul class="dropdown-menu" style="margin-top:75px">
                                    <li><a href="{{ route('medico.create' )}}">Novo Registo</a></li>
                                    <li><a href="{{ route('medico.index') }}">Visualizar Todos</a></li>
                                </ul>
                            </li>


                            <li class="dropdown-submenu">
                                <a href="#">
                                    Agenda de Trabalho
                                </a>
                                <ul class="dropdown-menu" style="margin-top:115px">
                                    <li><a href="{{ route( 'agenda_trabalho.create' )}}">Nova Agenda</a></li>
                                    <li><a href="{{ route('agenda_trabalho.index') }}">Visualizar Agendas</a></li>
                                </ul>
                            </li>
                            
                            <li class="dropdown-submenu">
                                <a href="#">
                                   Categoria Clinica
                                </a>
                                <ul class="dropdown-menu" style="margin-top:198px">
                                    <li><a href="{{ route( 'categoria_clinica.create' )}}">Nova Categoria</a></li>
                                    <li><a href="{{ route('categoria_clinica.index') }}">Visualizar Categorias</a></li>
                                </ul>
                            </li>
                            

                        </ul>
                    </li>
                    @endcan

                    @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @else 
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif


                </ul>                         
            </div>
            <!-- BEGIN TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER -->

</header>

@include('templates.modal')

<!--ajax form add -->
<script src="{{url('assets/ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js' )}}"></script>
<script src="{{url('assets/maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/1.12.0/bootstrap.min.js' )}}"></script>
    
<script type="text/javascript">
$(document).on('click','.create-modal',function(){
    $('#create').modal('show');
    $('.form-horizontal').modal();
    $('.modal-title').text('Add Categoria Clinica');
    $("#create").modal({backdrop: 'static'});
});

//ajax funcao salvar


$(document).on('click','#add',function(){
   
    $.ajax({
        url: "{{ route('teste')}}",
        method:'post',
       
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('input[name=name]').val()
        },
        success: function(data){
            if(data.errors){
                $('.error').removeClass('hidden');
                $('.error').text(data.errors.name);
            }else{
                $('.error').remove();
                $('#table').append("<tr class='categoria_clinica" +data.id +"'>"+
                  "<td>" + data.id + "</td>" +
                  "<td>" + data.name + "</td>" +
                   "<td>"
                   "<a class='show-modal btn btn-info btn-sm' data-id='"+ data.id+ "' data-name='"+ data.name+"'>"+
                        "<i class='glyphicon glyphicon-eye-open'></i></a>" +
                   "<a class='edit-modal btn btn-warning btn-sm' data-id='"+ data.id+ "' data-name='"+ data.name+"'>"+
                        "<i class='glyphicon glyphicon-pencil'></i></a>" +
                   "<a class='delete-modal btn btn-danger btn-sm' data-id='"+ data.id+ "' data-name='"+ data.name+"'>"+
                        "<i class='glyphicon glyphicon-trash'></i></a>" +
                    "</td>" +
                "</tr>");
            }
        } 
    });
  //  alert('ffffff');
    $('#name').val('');
});

</script>
