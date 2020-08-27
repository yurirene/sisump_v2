<?=$this->layout("admin/_template", ["title"=>$this->e($title)])?>

<div class="row d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sinodais</h1>


</div>
<div class="row">
    <div class='col-md-6 col-sm-12 '>
        <?=flash()?>
    </div>
</div>

<div class="row justify-content-center">


    <!-- LISTA DAS UMPs -->


    <div class="col-md-12 col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-header d-sm-flex align-items-center justify-content-between mb-4 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Sinodais</h6>
                <a href='#' class="btn btn-md btn-success shadow-md ml-3 mt-3" data-toggle="modal" data-target="#modalSinodalCadastrar">
                    <i class="fas fa-plus-circle text-white-50"></i> Cadastrar Sinodal
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Sinodais" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Sigla</th>
                                <th>Localidade</th>
                                <th>Responsavel</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($listaSinodais!=null):
                            foreach($listaSinodais as $sinodal) :     
                            ?>
                            
                            <tr>
                                <td><?=$sinodal->nome?></td>
                                <td><?=$sinodal->sigla?></td>
                                <td><?=$sinodal->localidade?></td>
                                <td><?=$sinodal->responsavel?></td>
                                <td>
                                    <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalSinodalEditar'
                                            data-id="<?=$sinodal->id?>"
                                            data-nome="<?=$sinodal->nome?>"
                                            data-sigla="<?=$sinodal->sigla?>"
                                            data-localidade="<?=$sinodal->localidade?>"
                                            data-responsavel="<?=$sinodal->responsavel?>"
                                    >
                                        <i class='fas fa-edit'></i>
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
<div class="row justify-content-center">
    <div class="col-md-12 col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-header d-sm-flex align-items-center justify-content-between mb-4 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Usuários</h6>
                <a href='#' class="btn btn-md btn-success shadow-md ml-3 mt-3" data-toggle="modal" data-target="#modalUsuarioCadastrar"><i class="fas fa-plus-circle text-white-50"></i> Cadastrar Usuário</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Programacoes" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Usuário</th>
                                <th>Senha</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($listaUsuarios!=null):
                            foreach($listaUsuarios as $usuario) :     
                            ?>
                            
                            <tr>
                                <td><?=$usuario->usuario?></td>
                                <td><?=$usuario->senha?></td>
                                <td>
                                    <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalUsuarioEditar'
                                            data-id="<?=$usuario->id?>"
                                            data-usuario="<?=$usuario->usuario?>"
                                            data-senha="<?=$usuario->senha?>"
                                    >
                                        <i class='fas fa-edit'></i>
                                    </button>
                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalUsuarioDeletar'
                                            data-id="<?=$usuario->id?>"
                                            data-nome="<?=$usuario->usuario?>">
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
<!-- MODAL FEDERACAO CADASTRO -->
<div class="modal fade" id="modalSinodalCadastrar" tabindex="-1" role="dialog" aria-labelledby="modalFederacaoCadastrar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Cadastrar Sinodal</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="">
                <form action="<?=$router->route("admin.novasinodal")?>" id="form_cadastrar_Federacao" method="POST">
                    <div class="form-group">
                        <label for="nome">Nome da Sinodal</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="sigla">Sigla da Sinodal</label>
                        <input type="text" class="form-control" id="sigla" name="sigla" required>
                    </div>
                    <div class="form-group">
                        <label for="localidade">Localidade</label>
                        <input type="text" class="form-control" id="localidade" name="localidade" required>
                    </div>
                    <div class="form-group">
                        <label for="responsavel">Responsável</label>
                        <input type="text" class="form-control" id="responsavel" name="responsavel" required>
                    </div>
                     
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL FEDERACAO EDICAO -->
<div class="modal fade" id="modalSinodalEditar" tabindex="-1" role="dialog" aria-labelledby="modalFederacaoEditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Editar Federação</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="">
                <form action="<?=$router->route("admin.atualizarsinodal")?>" id="form_atualziar_Federacao" method="POST">
                    <div class="form-group">
                        <label for="nome_edit">Nome da Sinodal</label>
                        <input type="text" class="form-control" id="nome_edit" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="sigla_edit">Sigla da Sinodal</label>
                        <input type="text" class="form-control" id="sigla_edit" name="sigla" required>
                    </div>
                    <div class="form-group">
                        <label for="localidade_edit">Localidade</label>
                        <input type="text" class="form-control" id="localidade_edit" name="localidade" required>
                    </div>
                    <div class="form-group">
                        <label for="responsavel_edit">Responsável</label>
                        <input type="text" class="form-control" id="responsavel_edit" name="responsavel" required>
                    </div>
                    <input type="text" id="id_sinodal_edit" name="id" hidden/>
                   
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL USUARIO CADASTRO -->
<div class="modal fade" id="modalUsuarioCadastrar" tabindex="-1" role="dialog" aria-labelledby="ModalUsuario" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Cadastrar Usuário</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="">
                <form action="<?=$router->route("admin.novousuario")?>" id="form_cadastrar_Federacao" method="POST">
                    <div class="form-group">
                        <label for="usuario">Digite o Usuário</label>
                        <input type="text" class="form-control" id="usuario" name="usuario">
                        <small id="usuario_ajuda" class="form-text text-muted">Dica: nome (ex: filadelfia)</small>
                    </div>
                    <div class="form-group">
                        <label for="senha">Digite a Senha</label>
                        <input type="text" class="form-control" id="senha" name="senha">
                        <small id="senha_form_ajuda" class="form-text text-muted">Dica: nome123 (ex: filadelfia123)</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="sinodal-lista">Selecione a Sinodal</label>
                        <select class="form-control" id="sinodal-lista" name="sinodal">
                            <?php 
                                foreach($listaSinodais as $sinodal){
                                    echo("<option value=".$sinodal->id.">".$sinodal->sigla."</option>");
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL USUARIO EDICAO -->
<div class="modal fade" id="modalUsuarioEditar" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioEditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Editar Usuário</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="">
                <form action="<?=$router->route("admin.atualizarusuario")?>" id="form_atualizar_usuario" method="POST">
                    <div class="form-group">
                        <label for="usuario_edit">Digite o Usuário</label>
                        <input type="text" class="form-control" id="usuario_edit" name="usuario">
                        <small id="usuario_ajuda" class="form-text text-muted">Dica: nome (ex: setentrional)</small>
                    </div>
                    <div class="form-group">
                        <label for="senha_edit">Digite a Senha</label>
                        <input type="text" class="form-control" id="senha_edit" name="senha">
                        <small id="senha_form_ajuda" class="form-text text-muted">Dica: nome123 (ex: setentrional123)</small>
                    </div>
                    <input type="text" id="id_usuario_edit" name="id" hidden />
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUsuarioDeletar" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioDeletar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalSocio"></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$router->route("admin.deletarusuario")?>" method="POST">
                <div class="modal-body" id="ConteudoModalSocio">
                    <h3>Confirmar a exclusão do Usuário: <b id="nome_usuario_del"></b></h3>
                </div>
                <div class="modal-footer">
                    <input type="text" id="id_usuario_del" name="id" hidden/>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<?=$this->start("script")?>
<script>

    $('#modalSinodalEditar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')
        var sigla = button.data('sigla')
        var responsavel = button.data('responsavel')
        var localidade = button.data('localidade')
        
        var modal = $(this)
        modal.find('#id_sinodal_edit').val(id)
        modal.find('#nome_edit').val(nome)
        modal.find('#sigla_edit').val(sigla)
        modal.find('#localidade_edit').val(localidade)
        modal.find('#responsavel_edit').val(responsavel)
    })
    $('#modalUsuarioEditar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var usuario = button.data('usuario')
        var senha = button.data('senha')
        
        var modal = $(this)
        modal.find('#id_usuario_edit').val(id)
        modal.find('#usuario_edit').val(usuario)
        modal.find('#senha_edit').val(senha)
    })
     $('#modalUsuarioDeletar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')

        var modal = $(this)
        modal.find('#id_usuario_del').val(id)
        modal.find('#nome_usuario_del').text(nome)

    })
</script>
<?=$this->end();?>