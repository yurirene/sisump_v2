<?php $this->layout('sisump/_template', ['title' => $this->e($title)]); ?>
<div class="row mb-2">
    <div class="col">
        <a href='<?=url("SISUMP/Calendario-Federacoes".$botao)?>' class="d-md-inline-block btn btn-md btn-primary shadow-md">
            <i class="fas fa-filter text-white-50"></i> <?=$texto?> 
        </a>
    </div>
</div>
<div class="box">
    <div class="container">
     	<div class="row">
            <?php 
            if($lista!=null):
                foreach($lista as $programacao):
            ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mt-5">
                <div class="box-part text-center  h-100 ">
                    <i class="fa fa-calendar-alt fa-2x text-info" aria-hidden="true"></i>
                    <div class="title">
                        <h4><?=$programacao->nome?></h4>
                    </div>
                    <div class="h5">
                        <span><?=date("d/m/Y", strtotime(str_replace("-","/",$programacao->date)))?></span>
                    </div>
                    <div class="h6">
                        <span><?=$programacao->local?></span>
                    </div>
                </div>
            </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</div>