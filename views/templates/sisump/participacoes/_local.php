
<div class="row justify-content-center mb-3">
    <div class="col">
        <a href='#' data-toggle="modal" data-target="#ModalParticipacao" class=" d-md-inline-block btn btn-md btn-success shadow-md">
            <i class="fas fa-calendar-check text-white-50"></i>
            Cadastrar Participação
        </a>
    </div>
    
</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Participação</h6>
            </div>
            <div class="card-body">
                <div class="row float-right"><?=flash()?></div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="Programacoes" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Programação</th>
                                <th>Instância</th>
                                <th>Sócio</th>
                                <th>Ano</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php 
                            if($participacoes!=null):
                                foreach($participacoes as $participacao) :
                                ?>
                            <tr>
                                
                                <td><?=$participacao->nome?></td>
                                <td><?=$participacao->instancia?></td>
                                <td><?=$participacao->socio?></td>
                                <td><?=$participacao->ano?></td>
                                <td>
                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalParticipacaoDeletar'
                                            data-id="<?=$participacao->id?>">
                                        <i class='fas fa-trash'></i>
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
<div class="modal fade" id="ModalParticipacao" tabindex="-1" role="dialog" aria-labelledby="ModalParticipacao" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalParticipacao">Cadastrar Participação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ConteudoModalParticipacao">
                
                <form action="<?=$router->route("app.novaparticipacao")?>" method="POST">
                            <!-- your steps content here -->
                    <div class="form-group">
                        <label for="instancia">Selecione a Instância da UMP</label><br>
                        <small>Selecione se a programação foi da UMP Local, Federação ou Sinodal</small>
                        <select class="form-control" id="instancia" name="instancia">
                            <option value="LOCAL">Local</option>
                            <option value="FEDERAÇÃO">Federação</option>
                            <option value="SINODAL">Sinodal</option>
                            <option value="NACIONAL">Nacional</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="programacao">Selecione a Programação</label>
                        <select class="form-control" id="programacao" name="programacao">
                            <option value="PMF - Projeto Missionario de Ferias">PMF - Projeto Missionário de Férias</option>
                            <option value="Vigilia Nacional">Vigília Nacional</option>
                            <option value="Somos Todos Peregrinos">Somos Todos Peregrinos</option>
                            <option value="Makenzie Voluntario">Makenzie Voluntário</option>
                        </select>
                    </div>
                            <div class="form-group">
                                <label for="ano">Ano da Participação</label>
                                <input class="form-control" type="text" name="ano" id="ano" placeholder="0000" maxlength="4" />
                                
                            </div>
                    <div class="form-group">
                        <label for="socios">Selecione os Sócios</label>
                        <?php
                        foreach($socios as $socio) :

                        $nome = $socio->nome;
                        $id = $socio->id;
                        echo("<div class='form-check'><input type='checkbox' name='socios[]' id='socio_".$id."' value='".$id."'><label class='form-check-label' for='socio_".$id."'>".$nome."</label></div>");
                        endforeach;
                        ?>
                    </div>
                    <button type="submit" class="btn btn-success">CADASTRAR</button>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalParticipacaoDeletar" tabindex="-1" role="dialog" aria-labelledby="modalParticipacaoDeletar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalSocio"></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$router->route("app.deletarparticipacao")?>" method="POST">
                <div class="modal-body" id="ConteudoModalSocio">
                    <h3>Confirmar a exclusão da Participação?</h3>
                </div>
                <div class="modal-footer">
                    <input type="text" id="id_del" name="id" hidden/>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </form>
            
        </div>
    </div>
</div>