@extends('templates.estrutura')

@section('conteudo')



<div class="row marow service-box " style="margin-top: 100px">
    <!-- BLOCK START-->
    <div class="panel panel- panel-info" >   
        <div class="panel-heading">
            <h1 class="panel-title">Listagens de RCU</h1>
        </div>
        <div class="panel-body  ">
            <table class=" table-striped " style="width: 100%">
                <tr >
                    <th >Codigo</th>
                    <th >paciente</th>
                    <th  style="text-align: center">Sexo</th>                    
                    <th  style="text-align: center" >Alergico</th>
                    <th >Grupo sanguinio</th>
                    <th >Medico</th>
                    <th  style="width: 15%"">Accao</th>

                </tr>
                @foreach($rcus as $rcu)
                <tr>
                    <th >{{ $rcu->id }}</th>
                    <th >{{ $rcu->utente->name}}</th>
                    <th  style="text-align: center" style="padding: 5px">{{$rcu->utente->sexo}}</th>
                    <th  style="text-align: center">{{$rcu->alergico}}</th>                    
                    <th  style="text-align: center">{{ $rcu->grupoSanguino->tipo }}</th>
                    <th >{{$rcu->pessoalClinico->name}}</th>
                    <th sstyle="width: 15px"> 
                        
                         <a href=" {{route('rcu.show',$rcu->id) }} " class="btn btn-primary" 
                            style="margin-top:5px ;float: left;margin-top:10px;margin-left:10px;height:33px"
                            data-toggle="tooltip" title="Visualizar" 
                            >
                            <span class="glyphicon glyphicon-eye-open"></span> 
                        </a>

                        
                        <a href=" {{route('rcu.edit',$rcu->id) }} " class="btn btn-primary" data-toggle="tooltip" title="Editar"
                           style="margin-top:5px ;float: left;margin-top:10px;margin-left:10px;height:33px"
                           >
                            <span class="glyphicon glyphicon-pencil" ></span> 
                        </a>

                             
                        <a href="#"style="float: left;margin-left:10px;margin-top:10px" >
                            <span data-toggle="tooltip" title="Eliminar" >
                                {{ Form::open(['route' => ['rcu.destroy',$rcu->id],'method' => 'delete' ] )  }}
                                {{ Form::submit('X', ['class'=> 'btn btn-danger'] )}}
                                
                                {{ Form::close() }}

                            </span>
                        </a>

                </tr>
                @endforeach
            </table>

            {{$rcus->links()}}

        </div>

    </div>

</div>


@stop
