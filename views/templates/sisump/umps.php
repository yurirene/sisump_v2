<?=$this->layout("sisump/_template", ["title"=>$this->e($title)])?>

<div class="row d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">UMPs</h1>

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
                <h6 class="m-0 font-weight-bold text-primary">Lista de UMPs</h6>
                <a href='#' class="btn btn-md btn-success shadow-md ml-3 mt-3" data-toggle="modal" data-target="#ModalUMPs"><i class="fas fa-plus-circle tefaxt-white-50"></i> Cadastrar UMP</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-warning" role="alert">Tenha atenção, a Igreja não pode ser alterada. 
                            Você pode excluir e inserir novamente, mas o dados serão perdidos.
                            Se precisar de ajuda entre em contato em suporte@ump.net.br</div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="Programacoes" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>UMP</th>
                                <th>Nº de Sócios</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($listaUMP != null):
                                foreach($listaUMP as $ump) :     
                                ?>
                            <tr>
                                <td><?=$ump->nome?></td>
                                <td><?=$ump->n_socios?></td>
                                <td>
                                    <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalUMPEditar'
                                            data-id="<?=$ump->id?>"
                                            data-nome="<?=$ump->nome?>"
                                    >
                                        <i class='fas fa-edit'></i>
                                    </button>
                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalUMPDeletar'
                                            data-id="<?=$ump->id?>"
                                            data-nome="<?=$ump->nome?>">
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
                <a href='#' class="btn btn-md btn-success shadow-md ml-3 mt-3" data-toggle="modal" data-target="#ModalUsuarioCadastro">
                    <i class="fas fa-plus-circle text-white-50"></i> Cadastrar Usuário
                </a>
                
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
                                <td><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalUsuarioEditar'
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
<!-- MODAL DE UMPs -->
<div class="modal fade" id="ModalUMPs" tabindex="-1" role="dialog" aria-labelledby="ModalUMPs" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalUMPs">Cadastrar UMP</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ConteudoModalUMPs">
                <form action="<?=$router->route("app.novaump")?>" id="form_cadastrar_UMP" method="POST">
                    <div class="form-group">
                        <label for="ump_form">Digite o nome da UMP</label>
                        <input type="text" class="form-control" id="ump_form" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="id_igreja">Selecione a Igreja</label>
                        <select class="form-control" id="id_igreja" name="igreja">
                            <?php 
                            if($listaIgrejas!=null):
                                foreach($listaIgrejas as $igreja){
                                    echo("<option value=".$igreja->id.">".$igreja->nome."</option>");
                                }
                            endif;
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


<div class="modal fade" id="modalUMPEditar" tabindex="-1" role="dialog" aria-labelledby="modalUMPEditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalUMPs">Editar UMP</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ConteudoModalUMPs">
                <form action="<?=$router->route("app.atualizarump")?>" id="form_cadastrar_UMP" method="POST">
                    <div class="form-group">
                        <label for="ump_form">Digite o nome da UMP</label>
                        <input type="text" class="form-control" id="nome_edit" name="nome" required>
                    </div>
                    <input type="text" name="id" id="id_ump_edit" hidden/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="modalUMPDeletar" tabindex="-1" role="dialog" aria-labelledby="modalUMPDeletar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalSocio"></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$router->route("app.deletarump")?>" method="POST">
                <div class="modal-body" id="ConteudoModalSocio">
                    <h3>Confirmar a exclusão da UMP: <b id="nome_ump_del"></b></h3>
                    <h4>Fazendo isso você estará apagando todos os registros de: <b>Participações, Sócios, Usuário e Diretoria dessa UMP</b></h4>
                </div>
                <div class="modal-footer">
                    <input type="text" id="id_ump_del" name="id" hidden/>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<!-- MODAL USUARIO CADASTRO -->
<div class="modal fade" id="ModalUsuarioCadastro" tabindex="-1" role="dialog" aria-labelledby="ModalUsuario" aria-hidden="true">
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
                        <label for="ump-lista">Selecione a UMP</label>
                        <select class="form-control" id="ump-lista" name="ump">
                            <?php 
                            foreach($listaUMP as $item){
                                echo("<option value=".$item->id.">".$item->nome."</option>");
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
                        <small id="usuario_ajuda" class="form-text text-muted">Dica: nome (ex: filadelfia)</small>
                    </div>
                    <div class="form-group">
                        <label for="senha_edit">Digite a Senha</label>
                        <input type="text" class="form-control" id="senha_edit" name="senha">
                        <small id="senha_form_ajuda" class="form-text text-muted">Dica: nome123 (ex: filadelfia123)</small>
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

    $('#modalUMPEditar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')
        
        var modal = $(this)
        modal.find('#id_ump_edit').val(id)
        modal.find('#nome_edit').val(nome)
    })
    $('#modalUMPDeletar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')

        var modal = $(this)
        modal.find('#id_ump_del').val(id)
        modal.find('#nome_ump_del').text(nome)

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