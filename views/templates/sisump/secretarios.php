<?=$this->layout("sisump/_template", ["title"=>$this->e($title)])?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Secretários</h1>
    <a href='#' data-toggle="modal" data-target="#ModalSecretarioCadastrar"  class=" d-md-inline-block btn btn-md btn-success shadow-md">
        <i class="fas fa-user-plus text-white-50"></i> Cadastrar Secretário
    </a>
    
</div>
<div class="row justify-content-center">


    <!-- LISTA DE SECRETARIOS -->


    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Secretários</h6>
            </div>
            <div class="card-body">
                <div class="row float-right"><?=flash()?></div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="Programacoes" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Secretaria</th>
                                <th>Contato</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($lista!=null):
                                foreach($lista as $secretario) :
                            ?>
                            <tr>
                                <td><?=$secretario->nome?></td>
                                <td><?=$secretario->secretaria?></td>
                                <td><?=$secretario->telefone?></td>
                                <td><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalSecretarioEditar'
                                            data-id="<?=$secretario->id?>"
                                            data-nome="<?=$secretario->nome?>"
                                            data-telefone="<?=$secretario->telefone?>"
                                            data-secretaria="<?=$secretario->secretaria?>"
                                    >
                                        <i class='fas fa-edit'></i>
                                    </button>
                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalSecretarioDeletar'
                                            data-id="<?=$secretario->id?>"
                                            data-nome="<?=$secretario->nome?>">
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


<div class="modal fade" id="ModalSecretarioCadastrar" tabindex="-1" role="dialog" aria-labelledby="ModalUsuario" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Cadastrar Secretário</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="">
                <form action="<?=$router->route("app.novosecretario")?>" id="form_cadastrar_secretario" method="POST">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control celular" id="telefone" name="telefone">
                    </div>
                    <div class="form-group">
                        <label for="secretaria">Secretaria</label>
                        <input type="text" class="form-control" id="secretaria" name="secretaria">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSecretarioEditar" tabindex="-1" role="dialog" aria-labelledby="modalSecretarioEditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Cadastrar Secretário</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="">
                <form action="<?=$router->route("app.atualizarsecretario")?>" id="form_atualziar_secretario" method="POST">
                    <div class="form-group">
                        <label for="nome_edit">Nome</label>
                        <input type="text" class="form-control" id="nome_edit" name="nome">
                    </div>
                    <div class="form-group">
                        <label for="telefone_edit">Telefone</label>
                        <input type="text" class="form-control celular" id="telefone_edit" name="telefone">
                    </div>
                    <div class="form-group">
                        <label for="secretaria_edit">Secretaria</label>
                        <input type="text" class="form-control" id="secretaria_edit" name="secretaria">
                    </div>
                    <input type="text" id="id_edit" name="id" hidden/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalSecretarioDeletar" tabindex="-1" role="dialog" aria-labelledby="modalSecretarioDeletar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalSocio"></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$router->route("app.deletarsecretario")?>" method="POST">
                <div class="modal-body" id="ConteudoModalSocio">
                    <h3>Confirmar a exclusão do Secretário: <b id="nome_del"></b></h3>
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

    $('#modalSecretarioEditar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')
        var telefone = button.data('telefone')
        var secretaria = button.data('secretaria')
        
        var modal = $(this)
        modal.find('#id_edit').val(id)
        modal.find('#nome_edit').val(nome)
        modal.find('#telefone_edit').val(telefone)
        modal.find('#secretaria_edit').val(secretaria)
    })
    $('#modalSecretarioDeletar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')

        var modal = $(this)
        modal.find('#id_del').val(id)
        modal.find('#nome_del').text(nome)

    })
</script>
<?=$this->end();?>