<?php $this->layout('sisump/_template', ['title' => $this->e($title)]); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Programações</h1>
    <button type='button' class=" d-md-inline-block btn btn-md btn-success shadow-md" data-toggle='modal' data-target='#modalProgramacaoCadastrar'><i class="fas fa-calendar-plus text-white-50"></i> Cadastrar Programação</button>
</div>
<div class="row justify-content-center">


    <!-- LISTA DE PROGRAMAÇÕES -->


    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Programações</h6>
            </div>
            <div class="card-body">
                <div class="row float-right"><?=flash()?></div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="Programacoes" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th hidden>#</th>
                                <th>Data</th>
                                <th>Nome</th>
                                <th>Local</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($lista!=null):
                                foreach($lista as $programacao) :
                                ?>
                            <tr>
                                <td><?=date('d/m/Y',  strtotime($programacao->date))?></td>
                                <td><?=$programacao->nome?></td>
                                <td><?=$programacao->local?></td>
                                <td>
                                    <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalProgramacaoEditar'
                                            data-id="<?=$programacao->id?>"
                                            data-date="<?=date('d/m/Y',  strtotime($programacao->date))?>"
                                            data-nome="<?=$programacao->nome?>"
                                            data-local="<?=$programacao->local?>">
                                        <i class='fas fa-edit'></i>
                                    </button>
                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalProgramacaoDeletar'
                                            data-id="<?=$programacao->id?>"
                                            data-nome="<?=$programacao->nome?>">
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

<div class="modal fade" id="modalProgramacaoCadastrar" tabindex="-1" role="dialog" aria-labelledby="modalProgramacaoCadastrar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalProgramacaoCadastrar">Cadastrar Programação</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="">
                <form method='POST' action='<?=$router->route("app.novaprogramacao")?>'>
                    <div class="form-group">
                        <label for="nome" class="">Nome</label>
                        <div class="">
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="">Data</label>
                        <div class="">
                            <input type="text" maxlength="4" class="form-control date" id="date" name="date" placeholder="00/00/0000">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="local" class="">Local</label>
                        <div class="">
                            <input type="text" class="form-control" id="local" name="local">
                        </div>
                    </div>
                    
                    <button type='submit' class='btn btn-primary' id='BotaoSubmitSocio'>Cadastrar
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalProgramacaoEditar" tabindex="-1" role="dialog" aria-labelledby="modalProgramacaoEditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitulomodalProgramacaoEditar">Editar Programação</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="">
                <form method='POST' action='<?=$router->route("app.atualizarprogramacao")?>'>
                    <div class="form-group">
                        <label for="nome_edit" class="">Nome</label>
                        <div class="">
                            <input type="text" class="form-control" id="nome_edit" name="nome">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_edit" class="">Data</label>
                        <div class="">
                            <input type="text" maxlength="4" class="form-control date" id="date_edit" name="date" placeholder="00/00/0000">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="local_edit" class="">Local</label>
                        <div class="">
                            <input type="text" class="form-control" id="local_edit" name="local">
                        </div>
                    </div>
                    <input type="text" name="id" id="id_edit" hidden />
                    <button type='submit' class='btn btn-warning' id='BotaoSubmitSocio'>Editar
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- MODAL DE DELETAR PROGRAMACAO -->
<div class="modal fade" id="modalProgramacaoDeletar" tabindex="-1" role="dialog" aria-labelledby="modalProgramacaoDeletar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalSocio"></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$router->route("app.deletarprogramacao")?>" method="POST">
                <div class="modal-body" id="ConteudoModalSocio">
                    <h3>Confirmar a exclusão da Programação: <b id="nome"></b></h3>
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

    $('#modalProgramacaoEditar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')
        var date = button.data('date')
        var local = button.data('local')
        
        var modal = $(this)
        modal.find('#id_edit').val(id)
        modal.find('#nome_edit').val(nome)
        modal.find('#date_edit').val(date)
        modal.find('#local_edit').val(local)
        
    })
    $('#modalProgramacaoDeletar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')

        var modal = $(this)
        modal.find('#id_del').val(id)
        modal.find('#nome').text(nome)

    })

</script>
<?=$this->end();?>
