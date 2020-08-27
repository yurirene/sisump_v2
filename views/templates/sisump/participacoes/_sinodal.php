<div class="row justify-content-center">


    <!-- LISTA DE PARTICIPACAO -->


    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Participação Sinodal</h6>
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