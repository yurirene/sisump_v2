<?=$this->layout("sisump/relatorio", ["title"=>$this->e($title), "perfil"=>$perfil, "participacao"=>$participacao, "doacao"=>$doacao])?>
<?=$this->start("cabecalho");?>
<tr>
    <td rowspan="8" colspan="2" style="text-align: center"><img src="<?=assets("img/Logo2.png")?>" class="logo" /></td>
    <td colspan="12" class="titulo">Estatística Anual<br>Federação <input type="text" class="midias valor titulo" /></td>
</tr>
<tr>
    <td colspan="12" class="azul">I - Identificação da Federação</td>

</tr>
<tr>
    <td>Presbitério</td>
    <td colspan="7" class="valor"><?=$cabecalhoFederacao->nome?></td>
    <td colspan="2" class="valor">Sigla</td>
    <td colspan="2" class="valor"><?=$cabecalhoFederacao->sigla?></td>
</tr>
<tr>
    <td colspan="4">Data de Organização da Federação</td>
    <td colspan="4"><input type="text" class="midias valor" /></td>
    <td colspan="3" class="valor">Ano Vigente</td>
    <td colspan="3" class="valor"><?=date("Y")?></td>
</tr>
<?=$this->end();?>

<?=$this->start("diretoria");?>
<tr>
    <?php $presidente = explode(",",$diretoria->presidente) ?>
    <td colspan="2">Presidente</td>
    <td colspan="4" class="valor"><?=$presidente[0]?></td>
    <td rowspan="7" class="texto-vertical">T<br>E<br>L<br>E<br>F<br>O<br>N<br>E</td>
    <td colspan="3" class="valor"><?=$presidente[1]?></td>
    <td rowspan="7" class="texto-vertical">E<br>-<br>M<br>A<br>I<br>L</td>
    <td colspan="3" class="valor"><?php if(isset($presidente[2])){echo($presidente[2]);}?></td>
</tr>
<tr>
    <?php $vice = explode(",",$diretoria->vicePresidente) ?>
    <td colspan="2">Vice-Presidente</td>
    <td colspan="4" class="valor"><?=$vice[0]?></td>
    <td colspan="3" class="valor"><?=$vice[1]?></td>
    <td colspan="3" class="valor"><?php if(isset($vice[2])){echo($vice[2]);}?></td>
</tr>
<tr>
    <?php $executivo = explode(",",$diretoria->secretarioExecutivo) ?>
    <td colspan="2">Secretário Executivo</td>
    <td colspan="4" class="valor"><?=$executivo[0]?></td>
    <td colspan="3" class="valor"><?=$executivo[1]?></td>
    <td colspan="3" class="valor"><?php if(isset($executivo[2])){echo($executivo[2]);}?></td>
</tr>
<tr>
    <?php $primeiro = explode(",",$diretoria->primeiroSecretario) ?>
    <td colspan="2">Primeiro Secretário</td>
    <td colspan="4" class="valor"><?=$primeiro[0]?></td>
    <td colspan="3" class="valor"><?=$primeiro[1]?></td>
    <td colspan="3" class="valor"><?php if(isset($primeiro[2])){echo($primeiro[2]);}?></td>
</tr>
<tr>
    <?php $segundo = explode(",",$diretoria->segundoSecretario) ?>
    <td colspan="2">Segundo Secretário</td>
    <td colspan="4" class="valor"><?=$segundo[0]?></td>
    <td colspan="3" class="valor"><?=$segundo[1]?></td>
    <td colspan="3" class="valor"><?php if(isset($segundo[2])){echo($segundo[2]);}?></td>
</tr>
<tr>
    <?php $tesoureiro = explode(",",$diretoria->tesoureiro) ?>
    <td colspan="2">Tesoureiro</td>
    <td colspan="4" class="valor"><?=$tesoureiro[0]?></td>
    <td colspan="3" class="valor"><?=$tesoureiro[1]?></td>
    <td colspan="3" class="valor"><?php if(isset($tesoureiro[2])){echo($tesoureiro[2]);}?></td>
</tr>
<tr>
    <?php $conselheiro = explode(",",$diretoria->secretarioPresbiterial) ?>
    <td colspan="2">Secretário Presbiterial</td>
    <td colspan="4" class="valor"><?=$conselheiro[0]?></td>
    <td colspan="3" class="valor"><?=$conselheiro[1]?></td>
    <td colspan="3" class="valor"><?php if(isset($conselheiro[2])){echo($conselheiro[2]);}?></td>
</tr>

<!-- ========== DADOS GERAIS =========== -->

<tr>
    <td colspan="14" class="azul">III - Dados Gerais</td>
</tr>
<tr>
    <td colspan="14" class="azul">III.I - Dados das UMPs Locais</td>
</tr>
<tr>
    <td colspan="4" rowspan="2" class="azul-claro valor">Igreja</td>
    <td colspan="4" rowspan="2" class="azul-claro valor">Possui UMP organizada?<br>(S / N)</td>
    <td colspan="6" class="azul-claro valor">Número de Sócios</td>
</tr>
<tr class="azul-claro">
    <td colspan="3" class="valor">Ativos</td>
    <td colspan="3" class="valor">Cooperador</td>
</tr>
<?php 
if($dadosIgrejas != null):
    foreach($dadosIgrejas as $di):
?>
<tr>
    <td colspan="4" class=""><?=$di->nome?></td>    
    <td colspan="4" class="valor"><?=$di->ump?></td>    
    <td colspan="3" class="valor"><?=$di->ativo?></td>    
    <td colspan="3" class="valor"><?=$di->cooperador?></td>    
</tr>

<?php    
    endforeach;
endif;?>
<tr class="azul-claro">
    <td colspan="8">
        Total        
    </td>
    <td colspan="3"><?=$totalSocios->ativo?></td>
    <td colspan="3"><?=$totalSocios->cooperador?></td>
</tr>
</table>
<p class="break"></p>
<table border="1px">
<tr>
    <td colspan="14" class="azul">III.I - Dados das UMPs Locais</td>
</tr>
<tr>
    <td colspan="2"  class="azul-claro valor">UMP Local</td>
    <td colspan="3"  class="azul-claro valor">Presidente</td>
    <td colspan="3" class="azul-claro valor">Telefone</td>
    <td colspan="3" class="azul-claro valor">E-mail</td>
    <td colspan="3" class="azul-claro valor">Conselheiro</td>
</tr>
<?php 
if($dadosUmps != null):
    
    foreach($dadosUmps as $du):
    $presidente = explode(",",$du->presidente);
    $conselheiro = explode(",", $du->conselheiro);
?>
<tr>
    
    <td colspan="2" class=""><?=$du->nome?></td>    
    <td colspan="3" class="valor"><?=$presidente[0]?></td>    
    <td colspan="3" class="valor"><?=$presidente[1]?></td>    
    <td colspan="3" class="valor"><?php if(isset($presidente[2])){echo $presidente[2];}?></td>    
    <td colspan="3" class="valor"><?=$conselheiro[0]?></td>    
</tr>

<?php    
    endforeach;
endif;?>

<?=$this->end();?>

<?=$this->start("aci");?>
<tr class="sem-borda espaco-linha">
    <td colspan="14"></td>
</tr>
<tr class="sem-borda espaco-linha">
    <td colspan="14"></td>
</tr>
<tr class="sem-borda">
    <td colspan="6" class="identificadores">Valor recebido das UMPs R$</td>
    <td colspan="3" class="borda-grossa valor"><input type="text" class="" style="width: 80px; border: 0; font-size: 1rem;"/></td>
    <td colspan="5" class="direita"></td>
</tr>

<tr class="sem-borda espaco-linha">
    <td colspan="14"></td>
</tr>
<tr class="sem-borda">
    <td colspan="6" class="identificadores">Valor repassado à Sinodal R$</td>
    <td colspan="3" class="borda-grossa valor"><input type="text" class="" style="width: 80px; border: 0; font-size: 1rem;"/></td>
    <td></td>
    <td>Data:</td>
    <td colspan="2" class="inferior"><input type="text" class="" style="width: 80px; border: 0; font-size: 1rem;"/></td>
    <td  class="direita"></td>
</tr>



<?=$this->end();?>