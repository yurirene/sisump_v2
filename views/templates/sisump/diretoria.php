<?=$this->layout("sisump/_template", ["title"=>$this->e($title)])?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Diretoria</h1>
</div>
<div class="row justify-content-center">


    <!-- LISTA DE MEMBROS DA DIRETORIA -->


    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Membros da Diretoria</h6>
            </div>
            <div class="card-body">
                <div class="row float-right"><?=flash()?></div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="Programacoes" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Cargo</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $presidente = explode(",",$diretoria->presidente);?>
                                <td>Presidente</td>
                                <td ><?php echo $presidente[0]; ?></td>
                                <td ><?php echo $presidente[1]; ?></td>
                                <td><?php echo $presidente[2]; ?></td>
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#ModalDiretoria" 
                                            data-cargo="Presidente" 
                                            data-coluna="presidente" 
                                            data-nome="<?=$presidente[0]?>" 
                                            data-telefone="<?=$presidente[1]?>" 
                                            data-email="<?=$presidente[2]?>">
                                        <i class="fas fa-pen-square text-white-50"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <?php $vice = explode(",",$diretoria->vicePresidente);?>
                                <td>Vice-Presidente</td>
                                <td><?php echo $vice[0]; ?></td>
                                <td><?php echo $vice[1]; ?></td>
                                <td><?php echo $vice[2]; ?></td>
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#ModalDiretoria" 
                                            data-cargo="Vice-Presidente" 
                                            data-coluna="vicePresidente" 
                                            data-nome="<?=$vice[0]?>" 
                                            data-telefone="<?=$vice[1]?>" 
                                            data-email="<?=$vice[2]?>">
                                        <i class="fas fa-pen-square text-white-50"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php if($diretoria->secretarioExecutivo): ?>
                            <tr>
                                <?php $secExecutivo = explode(",",$diretoria->secretarioExecutivo);?>
                                <td>Sec. Executivo</td>
                                <td><?php echo $secExecutivo[0]; ?></td>
                                <td><?php echo $secExecutivo[1]; ?></td>
                                <td><?php echo $secExecutivo[2]; ?></td>
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#ModalDiretoria" 
                                            data-cargo="Secretário Executivo" 
                                            data-coluna="secretarioExecutivo" 
                                            data-nome="<?=$secExecutivo[0]?>" 
                                            data-telefone="<?=$secExecutivo[1]?>" 
                                            data-email="<?=$secExecutivo[2]?>">
                                        <i class="fas fa-pen-square text-white-50"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endif;?>
                            <tr>
                                <?php $primeiro = explode(",",$diretoria->primeiroSecretario);?>
                                <td>1º Secretário</td>
                                <td><?php echo $primeiro[0]; ?></td>
                                <td><?php echo $primeiro[1]; ?></td>
                                <td><?php echo $primeiro[2]; ?></td>
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#ModalDiretoria" 
                                            data-cargo="Primeiro Secretário"
                                            data-coluna="primeiroSecretario" 
                                            data-nome="<?=$primeiro[0]?>" 
                                            data-telefone="<?=$primeiro[1]?>" 
                                            data-email="<?=$primeiro[2]?>">
                                        <i class="fas fa-pen-square text-white-50"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <?php $segundo = explode(",",$diretoria->segundoSecretario);?>
                                <td>2º Secretário</td>
                                <td><?php echo $segundo[0]; ?></td>
                                <td><?php echo $segundo[1]; ?></td>
                                <td><?php echo $segundo[2]; ?></td>
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#ModalDiretoria" 
                                            data-cargo="Segundo Secretário"
                                            data-coluna="segundoSecretario" 
                                            data-nome="<?=$segundo[0]?>" 
                                            data-telefone="<?=$segundo[1]?>" 
                                            data-email="<?=$segundo[2]?>">
                                        <i class="fas fa-pen-square text-white-50"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <?php $tesoureiro = explode(",",$diretoria->tesoureiro);?>
                                <td>Tesoureiro</td>
                                <td><?php echo $tesoureiro[0]; ?></td>
                                <td><?php echo $tesoureiro[1]; ?></td>
                                <td><?php echo $tesoureiro[2]; ?></td>
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#ModalDiretoria" 
                                            data-cargo="Tesoureiro"
                                            data-coluna="tesoureiro" 
                                            data-nome="<?=$tesoureiro[0]?>" 
                                            data-telefone="<?=$tesoureiro[1]?>" 
                                            data-email="<?=$tesoureiro[2]?>">
                                        <i class="fas fa-pen-square text-white-50"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php if($diretoria->conselheiro): ?>
                            <tr>
                                <?php $conselheiro = explode(",",$diretoria->conselheiro);?>
                                <td>Conselheiro</td>
                                <td><?php echo $conselheiro[0]; ?></td>
                                <td><?php echo $conselheiro[1]; ?></td>
                                <td><?php echo $conselheiro[2]; ?></td>
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#ModalDiretoria" 
                                            data-cargo="Conselheiro"
                                            data-coluna="conselheiro" 
                                            data-nome="<?=$conselheiro[0]?>" 
                                            data-telefone="<?=$conselheiro[1]?>" 
                                            data-email="<?=$conselheiro[2]?>">
                                        <i class="fas fa-pen-square text-white-50"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endif;?>
                            <?php if($diretoria->secretarioPresbiterial): ?>
                            <tr>
                                <?php $conselheiro = explode(",",$diretoria->secretarioPresbiterial);?>
                                <td>Sec. Presbiterial</td>
                                <td><?php echo $conselheiro[0]; ?></td>
                                <td><?php echo $conselheiro[1]; ?></td>
                                <td><?php echo $conselheiro[2]; ?></td>
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#ModalDiretoria" 
                                            data-cargo="Secretário Presbiterial"
                                            data-coluna="secretarioPresbiterial" 
                                            data-nome="<?=$conselheiro[0]?>" 
                                            data-telefone="<?=$conselheiro[1]?>" 
                                            data-email="<?=$conselheiro[2]?>">
                                        <i class="fas fa-pen-square text-white-50"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endif;?>
                            <?php if($diretoria->secretarioSinodal): ?>
                            <tr>
                                <?php $conselheiro = explode(",",$diretoria->secretarioSinodal);?>
                                <td>Sec. Sinodal</td>
                                <td><?php echo $conselheiro[0]; ?></td>
                                <td><?php echo $conselheiro[1]; ?></td>
                                <td><?php echo $conselheiro[2]; ?></td>
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#ModalDiretoria" 
                                            data-cargo="Secretário Sinodal"
                                            data-coluna="secretarioSinodal" 
                                            data-nome="<?=$conselheiro[0]?>" 
                                            data-telefone="<?=$conselheiro[1]?>" 
                                            data-email="<?=$conselheiro[2]?>">
                                        <i class="fas fa-pen-square text-white-50"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>              
</div>
<!-- LISTA DE DIRETORIAS -->
<?php if($listaDiretorias!=null): ?>
<div class="row justify-content-center">
        
        <?php foreach($listaDiretorias as $itemListaDiretoria): ?>
        
        <div class="col-md-6 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Diretoria: <?php echo $itemListaDiretoria->nome; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="Programacoes" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Cargo</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>E-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $presidente = explode(",",$itemListaDiretoria->presidente);?>
                                    <td>Presidente</td>
                                    <td ><?php echo $presidente[0]; ?></td>
                                    <td ><?php echo $presidente[1]; ?></td>
                                    <td><?php if(isset($presidente[2])){ echo $presidente[2]; }?></td>
                                </tr>
                                <tr>
                                    <?php $vice = explode(",",$itemListaDiretoria->vicePresidente);?>
                                    <td>Vice-Presidente</td>
                                    <td><?php echo $vice[0]; ?></td>
                                    <td><?php echo $vice[1]; ?></td>
                                    <td><?php if(isset($vice[2])){ echo $vice[2]; }?></td>
                                </tr>
                                
                                <?php if($itemListaDiretoria->secretarioExecutivo): ?>
                                <tr>
                                    <?php $secExecutivo = explode(",",$itemListaDiretoria->secretarioExecutivo);?>
                                    <td>Sec. Executivo</td>
                                    <td><?php echo $secExecutivo[0]; ?></td>
                                    <td><?php echo $secExecutivo[1]; ?></td>
                                    <td><?php if(isset($secExecutivo[2])){ echo $secExecutivo[2]; }?></td>
                                </tr>
                                <?php endif;?>
                                <tr>
                                    <?php $primeiro = explode(",",$itemListaDiretoria->primeiroSecretario);?>
                                    <td>1º Secretário</td>
                                    <td><?php echo $primeiro[0]; ?></td>
                                    <td><?php echo $primeiro[1]; ?></td>
                                    <td><?php if(isset($primeiro[2])){ echo $primeiro[2]; }?></td>
                                </tr>
                                <tr>
                                    <?php $segundo = explode(",",$itemListaDiretoria->segundoSecretario);?>
                                    <td>2º Secretário</td>
                                    <td><?php echo $segundo[0]; ?></td>
                                    <td><?php echo $segundo[1]; ?></td>
                                    <td><?php if(isset($segundo[2])){ echo $segundo[2]; }?></td>
                                </tr>
                                <tr>
                                    <?php $tesoureiro = explode(",",$itemListaDiretoria->tesoureiro);?>
                                    <td>Tesoureiro</td>
                                    <td><?php echo $tesoureiro[0]; ?></td>
                                    <td><?php echo $tesoureiro[1]; ?></td>
                                    <td><?php if(isset($tesoureiro[2])){ echo $tesoureiro[2]; }?></td>
                                </tr>
                                <?php if($itemListaDiretoria->conselheiro): ?>
                            <tr>
                                <?php $conselheiro = explode(",",$itemListaDiretoria->conselheiro);?>
                                <td>Conselheiro</td>
                                <td><?php echo $conselheiro[0]; ?></td>
                                <td><?php echo $conselheiro[1]; ?></td>
                                <td><?php if(isset($conselheiro[2])){ echo $conselheiro[2]; }?></td>
                                
                            </tr>
                            <?php endif;?>
                            <?php if($itemListaDiretoria->secretarioPresbiterial): ?>
                            <tr>
                                <?php $conselheiro = explode(",",$itemListaDiretoria->secretarioPresbiterial);?>
                                <td>Sec. Presbiterial</td>
                                <td><?php echo $conselheiro[0]; ?></td>
                                <td><?php echo $conselheiro[1]; ?></td>
                                <td><?php if(isset($conselheiro[2])){ echo $conselheiro[2]; }?></td>
                            </tr>
                            <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>     
        <?php endforeach; ?>
        
    </div>
<?php endif;?>


<!-- MODAL DE ATUALIZACAO DIRETORIA -->
<div class="modal fade" id="ModalDiretoria" tabindex="-1" role="dialog" aria-labelledby="ModalDiretoria" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Atualizar Diretoria</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Cargo: <b id="nome_cargo"></b></h5>
                <small>Se o cargo está vago preencha com <b>---</b></small>
                <form action="<?=$router->route("app.atualizadiretoria")?>" method="post">

                    <input type="text" id="cargo" name="cargo" hidden />
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="type" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="contato">Tefelone</label>
                        <input type="type" class="form-control" id="telefone" name="telefone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<?=$this->start("script")?>

<script>


$('#ModalDiretoria').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') 
    var cargo = button.data('cargo')
    var coluna = button.data('coluna')
    var nome = button.data('nome')
    var telefone = button.data('telefone')
    var email = button.data('email')


    var modal = $(this)
    modal.find('#id').val(id)
    modal.find('#nome').val(nome)
    modal.find('#telefone').val(telefone)
    modal.find('#email').val(email)
    modal.find('#nome_cargo').text(cargo)
    modal.find('#cargo').val(coluna)

})


</script>

<?=$this->end(); ?>