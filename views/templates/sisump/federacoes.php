<?=$this->layout("sisump/_template", ["title"=>$this->e($title)])?>

<div class="row d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Federações</h1>


</div>
<div class="row">
    <div class='col-md-6 col-sm-12 '>
        <?=flash()?>
    </div>
</div>

<div class="row justify-content-center">


    <!-- LISTA DAS UMPs -->


    <div class="col-md-6 col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-header d-sm-flex align-items-center justify-content-between mb-4 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Federações</h6>
                <a href='#' class="btn btn-md btn-success shadow-md ml-3 mt-3" data-toggle="modal" data-target="#modalFederacaoCadastrar"><i class="fas fa-plus-circle text-white-50"></i> Cadastrar Federação</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-warning" role="alert">Tenha atenção, o Presbitério não pode ser alterado. 
                            Você pode excluir e inserir novamente, mas o dados serão perdidos.
                            Se precisar de ajuda entre em contato em suporte@ump.net.br</div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="Programacoes" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Federação</th>
                                <th>Sigla</th>
                                <th>Presbitério</th>
                                <th>Nº de UMPs</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($listaFederacoes!=null):
                            foreach($listaFederacoes as $federacao) :     
                            ?>
                            
                            <tr>
                                <td><?=$federacao->nome?></td>
                                <td><?=$federacao->sigla?></td>
                                <td><?=$federacao->presbiterio?></td>
                                <td><?=$federacao->n_umps?></td>
                                <td>
                                    <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalFederacaoEditar'
                                            data-id="<?=$federacao->id?>"
                                            data-nome="<?=$federacao->nome?>"
                                            data-sigla="<?=$federacao->sigla?>"
                                    >
                                        <i class='fas fa-edit'></i>
                                    </button>
                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalFederacaoDeletar'
                                            data-id="<?=$federacao->id?>"
                                            data-nome="<?=$federacao->nome?>">
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


    <!-- LISTA DAS USUARIOS -->


    <div class="col-md-6 col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-header d-sm-flex align-items-center justify-content-between mb-4 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Usuários</h6>
                <a href='#' class="btn btn-md btn-success shadow-md ml-3 mt-3" data-toggle="modal" data-target="#modalUsuarioCadastrar"><i class="fas fa-plus-circle text-white-50"></i> Cadastrar Usuário</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger" role="alert">Nunca use <b>Senhas Pessoais</b>, as senhas não são criptografadas.</div>
                    </div>
                </div>
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
<div class="modal fade" id="modalFederacaoCadastrar" tabindex="-1" role="dialog" aria-labelledby="modalFederacaoCadastrar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Cadastrar Federação</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="">
                <form action="<?=$router->route("app.novafederacao")?>" id="form_cadastrar_Federacao" method="POST">
                    <div class="form-group">
                        <label for="nome">Nome da Federação</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="sigla">Sigla da Federação</label>
                        <input type="text" class="form-control" id="sigla" name="sigla" required>
                    </div>
                     <div class="form-group">
                        <label for="presbiterio-lista">Selecione o Presbitério</label>
                        <select class="form-control" id="presbiterio-lista" name="presbiterio">
                            <?php 
                                foreach($listaPresbiterios as $presbiterio){
                                    echo("<option value=".$presbiterio->id.">".$presbiterio->sigla."</option>");
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
<!-- MODAL FEDERACAO EDICAO -->
<div class="modal fade" id="modalFederacaoEditar" tabindex="-1" role="dialog" aria-labelledby="modalFederacaoEditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Editar Federação</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="">
                <form action="<?=$router->route("app.atualizarfederacao")?>" id="form_atualziar_Federacao" method="POST">
                    <div class="form-group">
                        <label for="nome_edit">Digite o nome da Federação</label>
                        <input type="text" class="form-control" id="nome_edit" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="sigla_edit">Sigla da Federação</label>
                        <input type="text" class="form-control" id="sigla_edit" name="sigla" required>
                    </div>
                    
                    <input type="text" id="id_federacao_edit" name="id" hidden/>
                   
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFederacaoDeletar" tabindex="-1" role="dialog" aria-labelledby="modalFederacaoDeletar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalSocio"></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$router->route("app.deletarfederacao")?>" method="POST">
                <div class="modal-body" id="ConteudoModalSocio">
                    <h3>Confirmar a exclusão da Federacao: <b id="nome_federacao_del"></b> ?</h3>
                    <h4>Fazendo isso você estará apagando todos os registros de: <b>UMPs, Participações, Sócios, Usuário e Diretoria dessa Federação</b></h4>
                </div>
                <div class="modal-footer">
                    <input type="text" id="id_federacao_del" name="id" hidden />
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </form>
            
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
                <form action="<?=$router->route("app.novousuario")?>" id="form_cadastrar_Federacao" method="POST">
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
                        <label for="ump-lista">Selecione a Federacao</label>
                        <select class="form-control" id="ump-lista" name="ump">
                            <?php 

                            foreach($listaFederacoes as $item){
                                echo("<option value=".$item->id.">".$item->sigla."</option>");
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
                <form action="<?=$router->route("app.atualizarusuario")?>" id="form_cadastrar_Federacao" method="POST">
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
            <form action="<?=$router->route("app.deletarusuario")?>" method="POST">
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

    $('#modalFederacaoEditar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')
        var sigla = button.data('sigla')
        
        var modal = $(this)
        modal.find('#id_federacao_edit').val(id)
        modal.find('#nome_edit').val(nome)
        modal.find('#sigla_edit').val(sigla)
    })
    $('#modalFederacaoDeletar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')

        var modal = $(this)
        modal.find('#id_federacao_del').val(id)
        modal.find('#nome_federacao_del').text(nome)

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