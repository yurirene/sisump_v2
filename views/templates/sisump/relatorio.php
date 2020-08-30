<html>
    <head>
        <link rel="stylesheet" href="<?=assets("css/relatorio.css")?>">
    </head>
    <body>
        <table border="1px black" >
            <?=$this->section("cabecalho");?>
            <tr>
                <td rowspan="4" colspan="2">Mídias Socias</td>
                <td colspan="2"><input type="text" class="midias" /></td>
                <td colspan="8"><input type="text" class="midias" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" class="midias" /></td>
                <td colspan="8"><input type="text" class="midias" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" class="midias" /></td>
                <td colspan="8"><input type="text" class="midias" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" class="midias" /></td>
                <td colspan="8"><input type="text" class="midias" /></td>
            </tr>
            
            <!-- ========== DIRETORIA =========== -->
            
            <tr>
                <td colspan="14" class="azul">II - Composição da Diretoria</td>
                
            </tr>
            <?=$this->section("diretoria")?>
            
            
            <tr>
                <td colspan="14" class="azul">IV - Perfil Sócio</td>
            </tr>
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            
            <!-- ========== FAIXA ETARIA =========== -->
            
            <tr class="sem-borda">
                <td colspan="2" rowspan="3" class="identificadores">Faixa Etária</td>
                <td class=""></td>
                <td class="borda-grossa  valor"><?=$perfil->p3?></td>
                <td colspan="2">Menor de 19 anos</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p4?></td>
                <td colspan="2">19 a 23 anos</td>
                <td colspan="4" class="direita"></td>
            </tr>

            <tr class="espaco-linha sem-borda">
                <td colspan="12"></td>
            </tr>
            
            <tr  class="sem-borda">
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p5?></td>
                <td colspan="2">24 a 29 anos</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p6?></td>
                <td colspan="2">30 a 35 anos</td>
                <td colspan="4" class="direita"></td>
            </tr>
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            <!-- ========== SEXO =========== -->
            
            <tr class="espaco-linha sem-borda superior">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-borda">
                <td colspan="2" class="identificadores">Sexo</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p7?></td>
                <td colspan="2">Feminino</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p8?></td>
                <td colspan="2">Masculino</td>
                <td colspan="4" class="direita"></td>
            </tr>
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            
            <!-- ========== ESTADO CIVIL =========== -->
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-borda">
                <td colspan="2" rowspan="3" class="identificadores">Estado Civil</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p9?></td>
                <td colspan="2">Solteiro</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p10?></td>
                <td colspan="2">Casado</td>
                <td colspan="4" class="direita"></td>
            </tr>

            <tr class="sem-borda espaco-linha">
                <td colspan="12"></td>
            </tr>

            <tr class="sem-borda">
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p11?></td>
                <td colspan="2">Divorciado</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p12?></td>
                <td colspan="2">Viúvo</td>
                <td colspan="4" class="direita"></td>
            </tr>
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            <!-- ========== ESCOLARIDADE =========== -->
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-borda">
                <td colspan="2" rowspan="3" class="identificadores">Escolaridade</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p13?></td>
                <td colspan="2">Fundamental</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p14?></td>
                <td colspan="2">Médio</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p17?></td>
                <td colspan="2" class="direita">Técnico</td>
            </tr>

            <tr class="sem-borda espaco-linha">
                <td colspan="12"></td>
            </tr>

            <tr class="sem-borda">
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p15?></td>
                <td colspan="2">Graduação</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p16?></td>
                <td colspan="2">Pós-Graduação</td>
                <td colspan="4" class="direita"></td>
            </tr>
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            
            
            <!-- ========== FILHOS =========== -->
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-borda">
                <td colspan="2" class="identificadores">Sócios com filhos</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p18?></td>
                <td colspan="2">Feminino</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p19?></td>
                <td colspan="2">Masculino</td>
                <td colspan="4" class="direita"></td>
            </tr>
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            
            
            <!-- ========== DEFICIENCIA =========== -->
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-borda">
                <td colspan="3" rowspan="3" class="identificadores">Sócios com deficiência</td>
                <td class="borda-grossa valor"><?=$perfil->p20?></td>
                <td colspan="2">Visual</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p21?></td>
                <td colspan="2">Auditiva</td>
                <td colspan="4" class="direita"></td>
            </tr>

            <tr class="espaco-linha">
                <td class="sem-borda"></td>
                <td colspan="10"></td>
            </tr>

            <tr class="sem-borda">
                <td class="borda-grossa valor"><?=$perfil->p22?></td>
                <td colspan="2">Física</td>
                <td></td>
                <td class="borda-grossa valor"><?=$perfil->p23?></td>
                <td colspan="2">Intelectual</td>
                <td colspan="4" class="direita"></td>
            </tr>
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            
        </table>

        <p class="break"></p>
        <table border="1px black">
            <!-- ========== QUEBRA DE PÁGINA =========== -->
            
            
            <!-- ========== PROGRAMACOES =========== -->
            <tr>
                <td colspan="14" class="azul">V - Programações</td>
            </tr>
            <tr class="sem-bordas">
                <td colspan="14" class="legendas">Preencha a quantidade de participações nas programações organizadas pelas instâncias abaixo:</td>
            </tr>
            <!-- ========== PMF =========== -->
            <tr class="sem-borda espaco-linha">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-borda">
                <td colspan="2" rowspan="3" class="identificadores">PMF - Projeto<br>Missionário de<br>Férias</td>
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p24?></td>
                <td colspan="2">UMP Local</td>
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p25?></td>
                <td colspan="2">Federação</td>
                <td colspan="4" class="direita"></td>
            </tr>

            <tr class="sem-borda espaco-linha">
                <td colspan="12"></td>
            </tr>

            <tr class="sem-borda">
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p26?></td>
                <td colspan="2">Sinodal</td>
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p27?></td>
                <td colspan="2">Nacional</td>
                <td colspan="4" class="direita"></td>
            </tr>
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            
            <!-- ========== VIGILIA =========== -->
            
            <tr class="espaco-linha superior">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-borda">
                <td colspan="2" rowspan="3" class="identificadores">Vigília Nacional</td>
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p28?></td>
                <td colspan="2">UMP Local</td>
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p29?></td>
                <td colspan="2">Federação</td>
                <td colspan="4" class="direita"></td>
            </tr>

            <tr class="sem-borda espaco-linha">
                <td colspan="12"></td>
            </tr>

            <tr class="sem-borda">
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p30?></td>
                <td colspan="2">Sinodal</td>
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p31?></td>
                <td colspan="2">Nacional</td>
                <td colspan="4" class="direita"></td>
            </tr>
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            
            
            <!-- ========== PEREGRINOS =========== -->
            <tr class="espaco-linha superior">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-borda">
                <td colspan="2" rowspan="3" class="identificadores">Somos Todos<br>Peregrinos</td>
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p32?></td>
                <td colspan="2">UMP Local</td>
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p33?></td>
                <td colspan="2">Federação</td>
                <td colspan="4" class="direita"></td>
            </tr>

            <tr class="sem-borda espaco-linha">
                <td colspan="12"></td>
            </tr>

            <tr class="sem-borda">
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p34?></td>
                <td colspan="2">Sinodal</td>
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p35?></td>
                <td colspan="2">Nacional</td>
                <td colspan="4" class="direita"></td>
            </tr>
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            
            <!-- ========== MAKENZIE =========== -->
            <tr class="espaco-linha superior">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-borda">
                <td colspan="2" rowspan="3" class="identificadores">Makenzie<br>Voluntário</td>
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p36?></td>
                <td colspan="2">UMP Local</td>
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p37?></td>
                <td colspan="2">Federação</td>
                <td colspan="4" class="direita"></td>
            </tr>

            <tr class="sem-borda espaco-linha">
                <td colspan="12"></td>
            </tr>

            <tr class="sem-borda">
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p38?></td>
                <td colspan="2">Sinodal</td>
                <td></td>
                <td class="borda-grossa valor"><?=$participacao->p39?></td>
                <td colspan="2">Nacional</td>
                <td colspan="4" class="direita"></td>
            </tr>
            <tr class="espaco-linha">
                <td colspan="14"></td>
            </tr>
            
            <!-- ========== DOADORES =========== -->
            <tr>
                <td colspan="14" class="azul">VI - Doadores</td>
            </tr>
            <tr class="sem-bordas">
                <td colspan="14" class="legendas">Preencha a quantidades de doadores dos itens abaixo:</td>
            </tr>
            <tr class="sem-borda espaco-linha">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-borda">
                <td colspan="2" rowspan="7" class="identificadores">Doações</td>
                <td></td>
                <td class="borda-grossa valor"><?=$doacao->p40?></td>
                <td colspan="2">Sangue</td>
                <td></td>
                <td class="borda-grossa valor"><?=$doacao->p41?></td>
                <td colspan="2">Medula</td>
                <td></td>
                <td class="borda-grossa valor"><?=$doacao->p42?></td>
                <td colspan="2" class="direita">Plaqueta</td>
            </tr>

            <tr class="sem-borda espaco-linha">
                <td colspan="12"></td>
            </tr>

            <tr class="sem-borda">
                <td></td>
                <td class="borda-grossa valor"><?=$doacao->p43?></td>
                <td colspan="2">Roupa</td>
                <td></td>
                <td class="borda-grossa valor"><?=$doacao->p44?></td>
                <td colspan="2">Alimentos</td>
                <td></td>
                <td class="borda-grossa valor"><?=$doacao->p45?></td>
                <td colspan="2" class="direita">Literatura</td>
            </tr>
            <tr class="espaco-linha">
                <td colspan="12"></td>
            </tr>
            <tr class="sem-borda">
                <td></td>
                <td class="borda-grossa valor"><?=$doacao->p46?></td>
                <td colspan="2">Cabelo</td>
                <td></td>
                <td class="borda-grossa valor"><?=$doacao->p47?></td>
                <td colspan="2">Oferta em Dinheiro</td>
                <td></td>
                <td class="borda-grossa valor"><?=$doacao->p48?></td>
                <td colspan="2" class="direita">Higiene Pessoal</td>
            </tr>
            
            <tr class="espaco-linha">
                <td colspan="12"></td>
            </tr>
            
            <tr class="sem-borda">

                <td></td>
                <td class="borda-grossa valor"><input type="text" class="midias" style="width: 50px;" /></td>
                <td colspan="2">Outras doações:</td>
                <td colspan="4" class="inferior"><input type="text" class="midias" /></td>
                <td colspan="4" class="direita"></td>
            </tr>
            
            <tr class="espaco-linha superior">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-bordas">
                <td colspan="14" class="legendas">Preencha a quantidade de jovens cadastrados para doação dos itens abaixo:</td>
            </tr>
            <tr class="sem-borda espaco-linha">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-borda">
                <td colspan="2" class="identificadores">Cadastrados</td>
                <td></td>
                <td class="borda-grossa valor"><?=$doacao->p50?></td>
                <td colspan="2">Sangue</td>
                <td></td>
                <td class="borda-grossa valor"><?=$doacao->p51?></td>
                <td colspan="2">Medula</td>
                <td></td>
                <td class="borda-grossa valor"><?=$doacao->p52?></td>
                <td colspan="2" class="direita">Orgãos</td>
            </tr>
            <tr class="sem-borda espaco-linha">
            <td colspan="14"></td>
            </tr>

            <!-- ========== DOADORES =========== -->
            <tr>
                <td colspan="14" class="azul">VII - Contribuição Anual</td>
            </tr>
            <?=$this->section("aci");?>

            <tr class="sem-borda espaco-linha">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-borda espaco-linha">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-borda">
                <td colspan="2" class="identificadores">Assinatura</td>
                <td colspan="5">________________________</td>
                <td colspan="7" class="direita"></td>
            </tr>

            <tr class="sem-borda espaco-linha">
                <td colspan="14"></td>
            </tr>
            <tr class="sem-borda">
                <td colspan="2" class="identificadores">Cargo</td>
                <td colspan="5" class="inferior"><input type="text" class="midias valor" style="font-size: 1rem;"/></td>
                <td colspan="3"></td>
                <td>Data:</td>
                <td colspan="2" class="valor inferior"><?=date("d/m/Y")?></td>
                <td class="direita"></td>
            </tr>
            <tr class="espaco-linha superior">
                <td colspan="14"></td>
            </tr>
        </table>
    </body>
</html>