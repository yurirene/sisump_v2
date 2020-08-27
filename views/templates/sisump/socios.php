<?=$this->layout("sisump/_template", ["title"=>$this->e($title)])?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sócios</h1>
    <a href='#' data-toggle="modal" data-target="#ModalSocioCadastrar"  class=" d-md-inline-block btn btn-md btn-success shadow-md"><i class="fas fa-user-plus text-white-50"></i> Cadastrar Sócio</a>
</div>
<div class="row justify-content-center">


    <!-- LISTA DE SECRETARIOS -->


    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Sócios</h6>
            </div>
            <div class="card-body">
                <div class="row float-right"><?=flash()?></div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="Programacoes" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Idade</th>
                                <th>Sexo</th>
                                <th>Estado Civil</th>
                                <th>Ensino</th>
                                <th>Filhos</th>
                                <th>Deficiencia</th>
                                <th>Doação</th>
                                <th>Doador</th>
                                <th>Tipo</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                            <?php 
                            $i=0;
                            if($lista!=null):
                            foreach($lista as $socio) :?>
                            <tr>
                                <td><?=$socio->nome?></td>
                                <td><?=date('Y')-$socio->idade?></td>
                                <td><?=$socio->sexo?></td>
                                <td><?=$socio->estadoCivil?></td>
                                <td><?=$socio->escolaridade?></td>
                                <td><?=$socio->filho?></td>
                                <td><?=$socio->deficiencia?></td>
                                <td><?=str_replace(",",", ",$socio->doacao)?></td><td><?=str_replace(",",", ",$socio->cadastroDoacao)?></td>
                                <td><?=$socio->tipo?></td>
                                <td>
                                    <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalSocioEditar'
                                            data-id="<?=$socio->id?>"
                                            data-idade="<?=$socio->idade?>"
                                            data-nome="<?=$socio->nome?>"
                                            data-sexo="<?=$socio->sexo?>"
                                            data-estadocivil="<?=$socio->estadoCivil?>"
                                            data-escolaridade="<?=$socio->escolaridade?>"
                                            data-deficiencia="<?=$socio->deficiencia?>"
                                            data-filhos="<?=$socio->filho?>"
                                            data-doacao="<?=$socio->doacao?>"
                                            data-doador="<?=$socio->cadastroDoacao?>"
                                            data-tipo="<?=$socio->tipo?>">
                                        <i class='fas fa-edit'></i>
                                    </button>
                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalSocioDeletar'
                                            data-id="<?=$socio->id?>"
                                            data-nome="<?=$socio->nome?>">
                                        <i class='fas fa-times-circle'></i>
                                    </button>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                                    endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>              
</div>
<!-- MODAL DE CADASTRO -->
<div class="modal fade" id="ModalSocioCadastrar" tabindex="-1" role="dialog" aria-labelledby="ModalSocioCadastrar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalSocioCadastrar">Cadastrar Sócio</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ConteudoModalSocioCadastrar">
                <form method='post' action='<?=$router->route("app.novosocio")?>'>
                    
                    <div class='form-group'>
                        <label for="tipo">Tipo:</label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option selected value="ATIVO">Ativo</option>
                            <option value="COOPERADOR">Cooperador</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="idade" class="col-sm-5 col-form-label">Ano de Nascimento</label>
                        <div class="col-sm-7">
                            <input type="text" maxlength="4" class="form-control" id="idade" name="idade">
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for="sexo">Sexo:</label>
                        <select class="form-control" id="sexo" name="sexo">
                            <option selected value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                        
                    </div>
                    <div class='form-group'>
                        <label for="estadoCivil">Estado Civil:</label>
                        <select class="form-control" id="estadoCivil" name="estadoCivil">
                            <option selected value="SOLTEIRO">Solteiro</option>
                            <option value="CASADO">Casado</option>
                            <option value="VIUVO">Viúvo</option>
                            <option value="DIVORCIADO">Divorciado</option>
                        </select>
                        
                    </div>
                    <div class='form-group'>
                        <label for="filhos">Filhos:</label>
                        <select class="form-control" id="filhos" name="filhos">
                            <option selected value="S">Sim</option>
                            <option value="N">Não</option>
                        </select>
                        
                    </div>
                    <div class='form-group'>
                        <label for="escolaridade">Escolaridade:</label>
                        <select class="form-control" id="escolaridade" name="escolaridade">
                            <option selected value="FUN">Fundamental</option>
                            <option value="MED">Médio</option>
                            <option value="TEC">Técnico</option>
                            <option value="SUP">Superior</option>
                            <option value="POS">Pós-Graduação</option>
                        </select>
                        
                    </div>
                    <div class='form-group'>
                        
                        <label for="deficiencia">Deficiencia:</label>
                        <select class="form-control" id="deficiencia" name="deficiencia">
                            <option selected value="N">Nenhuma</option>
                            <option value="VISUAL">Visual</option>
                            <option value="AUDITIVA">Auditiva</option>
                            <option value="FISICA">Física</option>
                            <option value="INTELECTUAL">Intelectual</option>
                        </select>
                        
                    </div>
                    <div class='form-group'>
                        <legend class='col-form-label col-sm-12 pt-0'><b>Doações:</b></legend>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox'  id='Sangue' name='doacoes[]' value='SANGUE'>
                            <label class='form-check-label' for='Sangue'>Sangue</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='Medula'  name='doacoes[]' value='MEDULA'>
                            <label class='form-check-label' for='Medula'>Medula</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='Plaqueta' name='doacoes[]' value='PLAQUETA'>
                            <label class='form-check-label' for='Plaqueta'>Plaqueta</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='Roupa' name='doacoes[]' value='ROUPA'>
                            <label class='form-check-label' for='Roupa'>Roupa</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='Alimentos' name='doacoes[]' value='ALIMENTOS'>
                            <label class='form-check-label' for='Alimentos'>Alimentos</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='Literatura' name='doacoes[]' value='LITERATURA'>
                            <label class='form-check-label' for='Literatura'>Literatura</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='Cabelo' name='doacoes[]' value='CABELO'>
                            <label class='form-check-label' for='Cabelo'>Cabelo</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='oferta' name='doacoes[]' value='DINHEIRO'>
                            <label class='form-check-label' for='oferta'>Oferta em Dinheiro</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='higiene' name='doacoes[]' value='HIGIENE PESSOAL'>
                            <label class='form-check-label' for='higiene'>Higiene Pessoal</label>
                        </div>
                    </div>
                    <div class='form-group'>
                        <legend class='col-form-label col-sm-12 pt-0'><b>Doador Cadastrado:</b></legend>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox'  id='DSangue' name='doador[]' value='SANGUE'>
                            <label class='form-check-label' for='DSangue'>Sangue</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='DMedula'  name='doador[]' value='MEDULA'>
                            <label class='form-check-label' for='DMedula'>Medula</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='DOrgaos'  name='doador[]' value='ORGAOS'>
                            <label class='form-check-label' for='DOrgaos'>Orgãos</label>
                        </div>
                    </div>
                    <button type='submit' class='btn btn-primary' id='BotaoSubmitSocio'>Cadastrar
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>


<!--======== MODAL EDITAR========  -->

<div class="modal fade" id="modalSocioEditar" tabindex="-1" role="dialog" aria-labelledby="ModalSocioEditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalSocioEditar">Editar Sócio</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ConteudoModalSocioEditar">
                <form method='post' action='<?=$router->route("app.atualizarsocio")?>'>
                    <div class='form-group'>
                        <label for="tipo_edit">Tipo:</label>
                        <select class="form-control" id="tipo_edit" name="tipo">
                            <option selected value="ATIVO">Ativo</option>
                            <option value="COOPERADOR">Cooperador</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="nome_edit" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nome_edit" name="nome">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="idade_edit" class="col-sm-5 col-form-label">Ano de Nascimento</label>
                        <div class="col-sm-7">
                            <input type="text" maxlength="4" class="form-control" id="idade_edit" name="idade">
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for="sexo_edit">Sexo:</label>
                        <select class="form-control" id="sexo_edit" name="sexo">
                            <option selected value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>

                    </div>
                    <div class='form-group'>
                        <label for="estadoCivil_edit">Estado Civil:</label>
                        <select class="form-control" id="estadoCivil_edit" name="estadoCivil">
                            <option selected value="SOLTEIRO">Solteiro</option>
                            <option value="CASADO">Casado</option>
                            <option value="VIUVO">Viúvo</option>
                            <option value="DIVORCIADO">Divorciado</option>
                        </select>

                    </div>
                    <div class='form-group'>
                        <label for="filhos_edit">Filhos:</label>
                        <select class="form-control" id="filhos_edit" name="filhos">
                            <option selected value="S">Sim</option>
                            <option value="N">Não</option>
                        </select>

                    </div>
                    <div class='form-group'>
                        <label for="escolaridade_edit">Escolaridade:</label>
                        <select class="form-control" id="escolaridade_edit" name="escolaridade">
                            <option selected value="FUN">Fundamental</option>
                            <option value="MED">Médio</option>
                            <option value="TEC">Técnico</option>
                            <option value="SUP">Superior</option>
                            <option value="POS">Pós-Graduação</option>
                        </select>

                    </div>
                    <div class='form-group'>

                        <label for="deficiencia_edit">Deficiencia:</label>
                        <select class="form-control" id="deficiencia_edit" name="deficiencia">
                            <option selected value="N">Nenhuma</option>
                            <option value="VISUAL">Visual</option>
                            <option value="AUDITIVA">Auditiva</option>
                            <option value="FISICA">Física</option>
                            <option value="INTELECTUAL">Intelectual</option>
                        </select>

                    </div>
                    <div class='form-group'>
                        <legend class='col-form-label col-sm-12 pt-0'><b>Doações:</b></legend>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox'  id='Sangue_edit' name='doacoes[]' value='SANGUE'>
                            <label class='form-check-label' for='Sangue'>Sangue</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='Medula_edit'  name='doacoes[]' value='MEDULA'>
                            <label class='form-check-label' for='Medula'>Medula</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='Plaqueta_edit' name='doacoes[]' value='PLAQUETA'>
                            <label class='form-check-label' for='Plaqueta'>Plaqueta</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='Roupa_edit' name='doacoes[]' value='ROUPA'>
                            <label class='form-check-label' for='Roupa'>Roupa</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='Alimentos_edit' name='doacoes[]' value='ALIMENTOS'>
                            <label class='form-check-label' for='Alimentos'>Alimentos</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='Literatura_edit' name='doacoes[]' value='LITERATURA'>
                            <label class='form-check-label' for='Literatura'>Literatura</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='Cabelo_edit' name='doacoes[]' value='CABELO'>
                            <label class='form-check-label' for='Cabelo'>Cabelo</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='oferta_edit' name='doacoes[]' value='DINHEIRO'>
                            <label class='form-check-label' for='oferta'>Oferta em Dinheiro</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='higiene_edit' name='doacoes[]' value='HIGIENE PESSOAL'>
                            <label class='form-check-label' for='higiene'>Higiene Pessoal</label>
                        </div>
                    </div>
                    <div class='form-group'>
                        <legend class='col-form-label col-sm-12 pt-0'><b>Doador Cadastrado:</b></legend>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox'  id='DSangue_edit' name='doador[]' value='SANGUE'>
                            <label class='form-check-label' for='DSangue_edit'>Sangue</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='DMedula_edit'  name='doador[]' value='MEDULA'>
                            <label class='form-check-label' for='DMedula_edit'>Medula</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' type='checkbox' id='DOrgaos_edit'  name='doador[]' value='ORGAOS'>
                            <label class='form-check-label' for='DOrgaos_edit'>Orgãos</label>
                        </div>
                    </div>
                    <input type="text" value="" id="id_edit" name="id" hidden/>
                    <button type='submit' class='btn btn-primary' id='BotaoSubmitSocio'>Editar
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- MODAL DE DELETAR SOCIO -->
<div class="modal fade" id="modalSocioDeletar" tabindex="-1" role="dialog" aria-labelledby="ModalSocio" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalSocio"></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$router->route("app.deletarsocio")?>" method="POST">
                <div class="modal-body" id="ConteudoModalSocio">
                    <h3>Confirmar a exclusão do Sócio: <b id="socio"></b></h3>
                </div>
                <div class="modal-footer">
                    <input type="text" id="id_del" name="id" hidden/>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
<?=$this->start("script")?>
<script>

    $('#modalSocioEditar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')
        var sexo = button.data('sexo')
        var estadoCivil = button.data('estadocivil')
        var escolaridade = button.data('escolaridade')
        var filhos = button.data('filhos')
        var deficiencia = button.data('deficiencia')
        var doacao = button.data('doacao')
        var doador = button.data('doador')
        var tipo = button.data('tipo')
        var idade = button.data('idade')
        
        
        
        var modal = $(this)
        modal.find('#id_edit').val(id)
        modal.find('#nome_edit').val(nome)
        modal.find('#idade_edit').val(idade)
        
        modal.find('#sexo_edit option').attr("selected",false)
        modal.find("#sexo_edit option[value="+sexo+"]").attr("selected",true)
        
        modal.find('#estadoCivil_edit option').attr("selected",false)
        modal.find("#estadoCivil_edit option[value="+estadoCivil+"]").attr("selected",true)

        modal.find('#escolaridade_edit option').attr("selected",false)
        modal.find("#escolaridade_edit option[value="+escolaridade+"]").attr("selected",true)
        
        modal.find('#filhos_edit option').attr("selected",false)
        modal.find("#filhos_edit option[value="+filhos+"]").attr("selected",true)
        
        modal.find('#deficiencia_edit option').attr("selected",false)
        modal.find("#deficiencia_edit option[value="+deficiencia+"]").attr("selected",true)
        
        modal.find('#tipo_edit option').attr("selected",false)
        modal.find("#tipo_edit option[value="+tipo+"]").attr("selected",true)

       
        
        var doacoes = doacao.split(",");

        var cadastrodoador = doador.split(",");

        if(doacoes.includes("SANGUE")){
            $('#Sangue_edit').attr('checked', true);
        }else{
            $('#Sangue_edit').attr('checked', false);
        }
        if(doacoes.includes("MEDULA")){
            $('#Medula_edit').attr('checked', true);
        }else{
            $('#Medula_edit').attr('checked', false);
        }
        if(doacoes.includes("PLAQUETA")){
            $('#Plaqueta_edit').attr('checked', true);
        }else{
            $('#Plaqueta_edit').attr('checked', false);
        }
        if(doacoes.includes("ROUPA")){
            $('#Roupa_edit').attr('checked', true);
        }else{
            $('#Roupa_edit').attr('checked', false);
        }
        if(doacoes.includes("ALIMENTOS")){
            $('#Alimentos_edit').attr('checked', true);
        }else{
            $('#Alimentos_edit').attr('checked', false);
        }
        if(doacoes.includes("LITERATURA")){
            $('#Literatura_edit').attr('checked', true);
        }else{
            $('#Literatura_edit').attr('checked', false);
        }
        if(doacoes.includes("CABELO")){
            $('#Cabelo_edit').attr('checked', true);
        }else{
            $('#Cabelo_edit').attr('checked', false);
        }
        if(doacoes.includes("DINHEIRO")){
            $('#oferta_edit').attr('checked', true);
        }else{
            $('#oferta_edit').attr('checked', false);
        }
        if(doacoes.includes("HIGIENE PESSOAL")){
            $('#higiene_edit').attr('checked', true);
        }else{
            $('#higiene_edit').attr('checked', false);
        }
        
        if(cadastrodoador.includes("SANGUE")){
            $('#DSangue_edit').attr('checked', true);
        }else{
            $('#DSangue_edit').attr('checked', false);
        }
        if(cadastrodoador.includes("MEDULA")){
            $('#DMedula_edit').attr('checked', true);
        }else{
            $('#DMedula_edit').attr('checked', false);
        }
        if(cadastrodoador.includes("ORGAOS")){
            $('#DOrgaos_edit').attr('checked', true);
        }else{
            $('#DOrgaos_edit').attr('checked', false);
        }
        
    })
    $('#modalSocioDeletar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')

        var modal = $(this)
        modal.find('#id_del').val(id)
        modal.find('#socio').text(nome)

    })

</script>
<?=$this->end();?>
