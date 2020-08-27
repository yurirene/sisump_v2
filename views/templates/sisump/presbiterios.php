<?=$this->layout("sisump/_template", ["title"=>$this->e($title)])?>
<div class="row d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Presbitérios</h1>
    <a href='#' class="btn btn-md btn-success shadow-md ml-3 mt-3" data-toggle="modal" data-target="#ModalPresbiteriosCadastrar"><i class="fas fa-plus-circle fa-md text-white-50"></i> Cadastrar Presbitério</a>

</div>
<div class="row">
    <div class='col-md-6 col-sm-12 '>
        <?=flash()?>
    </div>
</div>

<div class="row justify-content-center">


    <!-- LISTA DAS UMPs -->


    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Presbitérios</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Programacoes" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Silga</th>
                                <th>Federacao</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($lista!=null):
                            foreach($lista as $presbiterio) :     
                            ?>
                            <tr>
                                <td><?=$presbiterio->nome?></td>
                                <td><?=$presbiterio->sigla?></td>
                                <td><?=$presbiterio->federacao?></td>
                                <td>
                                    <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalPresbiterioEditar'
                                            data-id="<?=$presbiterio->id?>"
                                            data-nome="<?=$presbiterio->nome?>"
                                            data-sigla="<?=$presbiterio->sigla?>"
                                            data-federacao="<?=$presbiterio->federacao?>"
                                    >
                                        <i class='fas fa-edit'></i>
                                    </button>
                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalPresbiterioDeletar'
                                            data-id="<?=$presbiterio->id?>"
                                            data-nome="<?=$presbiterio->sigla?>"
                                        >
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
<div class="modal fade" id="ModalPresbiteriosCadastrar" tabindex="-1" role="dialog" aria-labelledby="ModalPresbiterios" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCadastrar">Cadastrar Igreja</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$router->route("app.novopresbiterio")?>" id="form_cadastrar_presbiterio" method="POST">
                <div class="modal-body" id="ConteudoModalPresbiterioCadastrar">
                
                    <div class="form-group">
                        <label for="ump_form">Digite o nome do Presbitério</label>
                        <input type="text" class="form-control" id="ump_form" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="sigla_form">Sigla</label>
                        <input type="text" class="form-control" id="sigla_form" name="sigla" required>
                    </div>
                    <div class='form-group'>
                        <label for="federacao">Existe Federação:</label>
                        <select class="form-control" id="federacao" name="federacao">
                            <option selected value="SIM">Sim</option>
                            <option value="NAO">Não</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL DE UMPs -->
<div class="modal fade" id="modalPresbiterioEditar" tabindex="-1" role="dialog" aria-labelledby="modalPresbiterioEditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCadastrar">Editar Igreja</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$router->route("app.atualizarpresbiterio")?>" id="form_cadastrar_presbiterio" method="POST">
                <div class="modal-body" id="ConteudoModalPresbiterioCadastrar">
                
                    <div class="form-group">
                        <label for="nome_edit">Digite o nome do Presbitério</label>
                        <input type="text" class="form-control" id="nome_edit" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="sigla_edit">Sigla</label>
                        <input type="text" class="form-control" id="sigla_edit" name="sigla" required>
                    </div>
                    <div class='form-group'>
                        <label for="federacao_edit">Existe Federação:</label>
                        <select class="form-control" id="federacao_edit" name="federacao">
                            <option value="SIM">Sim</option>
                            <option value="NAO">Não</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="id_edit" name="id" hidden/>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- MODAL DE DELETAR IGREJA -->
<div class="modal fade" id="modalPresbiterioDeletar" tabindex="-1" role="dialog" aria-labelledby="modalPresbiterioDeletar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalSocio"></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$router->route("app.deletarpresbiterio")?>" method="POST">
                <div class="modal-body" id="ConteudoModalSocio">
                    <h3>Confirmar a exclusão do Presbitério: <b id="nome_del"></b></h3>
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

    $('#modalPresbiterioEditar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')
        var federacao = button.data('federacao')
        var sigla = button.data('sigla')
        
        var modal = $(this)
        modal.find('#id_edit').val(id)
        modal.find('#nome_edit').val(nome)
        modal.find('#sigla_edit').val(sigla)
        
        modal.find('#federacao_edit option').attr("selected",false)
        modal.find("#federacao_edit option[value="+federacao+"]").attr("selected",true)
        
    })
    $('#modalPresbiterioDeletar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')

        var modal = $(this)
        modal.find('#id_del').val(id)
        modal.find('#nome_del').text(nome)

    })

</script>
<?=$this->end();?>

