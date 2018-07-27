<div class="modal-container">
    <!-- Modal --> 
    <div class="modal fade" id="myModal" role="dialog"  onclick="teste()">
        <div class="modal-dialog" style="margin-left:-300px;margin-top: 100px">
            <!-- Modal content-->
            <!--@include('painel.especialidade.new-edit')-->
            {{ Form::open( ['route' => 'agenda_trabalho.create', 'class' => 'form','method'=>'get']  ) }} 
            <div class="modal-header" style="background:#0e90d2">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color: #fff">Dados de Permissão</h4>
            </div>

            <div class="panel-body"style="background:#ffffff">
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('numero', 'Nº Utente') }}
                        {{  Form::text('numero', null, array('class'=> 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{  Form::label('senha_permicao', 'Senha de Permissao') }}
                        {{  Form::text('senha_permissao', null, array('class'=> 'form-control')) }}
                    </div>
                </div>
                <div class="form-actions right margin-bottom-10">
                    {{  Form::button('Cancelar',['class' => 'btn btn-outline dark','data-dismiss'=>'modal']) }}
                    {{  Form::submit('Continuar',['class' => 'btn blue ']) }}

                </div>

            </div>
            {{Form::close()}}
        </div>
    </div> 
</div>

