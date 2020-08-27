<div class="row mb-2">
    <div class="col">
        <a href='#' data-toggle="modal" data-target="#modalApagarParticipacoes"  class="d-md-inline-block btn btn-md btn-danger shadow-md">
            <i class="fas fa-times-circle text-white-50"></i> Apagar Participações
        </a> - <span class="text-danger">Faça isso uma vez ao ano para que os dados sempre estejam atualizados</span>
    </div>
</div>
<div class="row justify-content-center">
    <!-- LISTA DE PARTICIPACAO -->


    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="row">
                <div class="col">
                    <?=flash()?>
                    
                </div>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Participação Federação</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Programacoes" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Programação</th>
                                <th>Nº de Jovens</th>
                                <th>Instância</th>
                                <th>Ano</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($lista!=null):
                                
                                
                                foreach($lista as $participacao) :
                                ?>
                            <tr>
                                
                                <td><?=$participacao->nome?></td>
                                <td><?=$participacao->qtd?></td>
                                <td><?=$participacao->instancia?></td>
                                <td><?=$participacao->ano?></td>
                                
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

<div class="modal fade" id="modalApagarParticipacoes" tabindex="-1" role="dialog" aria-labelledby="modalSecretarioDeletar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalSocio"></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$router->route("app.resetparticipacao")?>" method="POST">
                <div class="modal-body" id="ConteudoModalSocio">
                    <h3>Confirmar a exclusão de todas as Participações cadastradas da sua Federação?</h3>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </form>
            
        </div>
    </div>
</div>