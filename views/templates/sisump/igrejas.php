<?=$this->layout("sisump/_template", ["title"=>$this->e($title)])?>
<div class="row d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Igrejas</h1>
    <a href='#' class="btn btn-md btn-success shadow-md ml-3 mt-3" data-toggle="modal" data-target="#ModalIgrejasCadastrar"><i class="fas fa-plus-circle text-white-50"></i> Cadastrar Igreja</a>

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
                <h6 class="m-0 font-weight-bold text-primary">Lista de Igrejas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Programacoes" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>UMP</th>
                                <th>Endereço</th>
                                <th>Pastor</th>
                                <th>Telefone</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($lista!=null):
                            foreach($lista as $igreja) :     
                            ?>
                            <tr>
                                <td><?=$igreja->nome?></td>
                                <td><?=$igreja->ump?></td>
                                <td><?=$igreja->endereco?></td>
                                <td><?=$igreja->pastor?></td>
                                <td><?=$igreja->telefone?></td>
                                <td>
                                    <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalIgrejaEditar'
                                            data-id="<?=$igreja->id?>"
                                            data-nome="<?=$igreja->nome?>"
                                            data-ump="<?=$igreja->ump?>"
                                            data-endereco="<?=$igreja->endereco?>"
                                            data-pastor="<?=$igreja->pastor?>"
                                            data-telefone="<?=$igreja->telefone?>"
                                    >
                                        <i class='fas fa-edit'></i>
                                    </button>
                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalIgrejaDeletar'
                                            data-id="<?=$igreja->id?>"
                                            data-nome="<?=$igreja->nome?>"
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
<!-- MODAL DE CADASTRO IGREJA -->
<div class="modal fade" id="ModalIgrejasCadastrar" tabindex="-1" role="dialog" aria-labelledby="ModalIgrejas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCadastrar">Cadastrar Igreja</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$router->route("app.novaigreja")?>" id="form_cadastrar_Igreja" method="POST">
                <div class="modal-body" id="ConteudoModalIgrejaCadastrar">
                
                    <div class="form-group">
                        <label for="ump_form">Digite o nome da Igreja</label>
                        <input type="text" class="form-control" id="ump_form" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="endereco_form">Endereço</label>
                        <input type="text" class="form-control" id="endereco_form" name="endereco" required>
                    </div>
                    <div class="form-group">
                        <label for="pastor_form">Pastor</label>
                        <input type="text" class="form-control" id="pastor_form" name="pastor" required>
                    </div>
                    <div class="form-group">
                        <label for="tel_pastor_form">Telefone do Pastor</label>
                        <input type="text" class="form-control celular" maxlength="20" id="tel_pastor_form" name="telefone">
                    </div>
                    <div class='form-group'>
                        <label for="ump">Existe UMP?:</label>
                        <select class="form-control" id="ump" name="ump">
                            <option selected value="SIM">Sim</option>
                            <option value="NAO">Não</option>
                        </select>

                    </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- MODAL DE EDICAO IGREJA -->
<div class="modal fade" id="modalIgrejaEditar" tabindex="-1" role="dialog" aria-labelledby="modalIgrejaEditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCadastrar">Editar Igreja</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$router->route("app.atualizarigreja")?>" id="form_editar_Igreja" method="POST">
                <div class="modal-body" id="ConteudoModalIgrejaCadastrar">
                
                    <div class="form-group">
                        <label for="nome_edit">Nome da Igreja</label>
                        <input type="text" class="form-control" id="nome_edit" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="endereco_edit">Endereço</label>
                        <input type="text" class="form-control" id="endereco_edit" name="endereco" required>
                    </div>
                    <div class="form-group">
                        <label for="pastor_edit">Pastor</label>
                        <input type="text" class="form-control" id="pastor_edit" name="pastor" required>
                    </div>
                    <div class="form-group">
                        <label for="telefone_edit">Telefone do Pastor</label>
                        <input type="text" class="form-control celular" maxlength="20" id="telefone_edit" name="telefone">
                    </div>
                    <div class='form-group'>
                        <label for="ump_edit">Existe UMP?:</label>
                        <select class="form-control" id="ump_edit" name="ump">
                            <option selected value="SIM">Sim</option>
                            <option value="NAO">Não</option>
                        </select>

                    </div>
                    

                    <input type="text" id="id_edit" name="id" hidden />
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Editar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- MODAL DE DELETAR IGREJA -->
<div class="modal fade" id="modalIgrejaDeletar" tabindex="-1" role="dialog" aria-labelledby="modalIgrejaDeletar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalSocio"></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$router->route("app.deletarigreja")?>" method="POST">
                <div class="modal-body" id="ConteudoModalSocio">
                    <h3>Confirmar a exclusão da Igreja: <b id="nome_del"></b></h3>
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

    $('#modalIgrejaEditar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')
        var ump = button.data('ump')
        var endereco = button.data('endereco')
        var pastor = button.data('pastor')
        var telefone = button.data('telefone')
        
        var modal = $(this)
        modal.find('#id_edit').val(id)
        modal.find('#nome_edit').val(nome)
        modal.find('#endereco_edit').val(endereco)
        modal.find('#pastor_edit').val(pastor)
        modal.find('#telefone_edit').val(telefone)
        
        modal.find('#ump_edit option').attr("selected",false)
        modal.find("#ump_edit option[value="+ump+"]").attr("selected",true)
        
    })
    $('#modalIgrejaDeletar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var nome = button.data('nome')

        var modal = $(this)
        modal.find('#id_del').val(id)
        modal.find('#nome_del').text(nome)

    })

</script>
<?=$this->end();?>

