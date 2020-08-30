<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Description of Relatorio
 *
 * @author Yuri
 */
class Relatorio extends DataLayer {
    
    public function __construct() {
        parent::__construct("", [], "", false);
    }
    
    public function dadosCabecalho($id):DataLayer
    {
        
        
        $this->statement = $query;
        
        return $this;
        
    }
    
    public function dadosPerfil($param): DataLayer
    {
        $query = "SELECT
                COUNT(CASE WHEN socios.tipo='ATIVO' THEN 1 END) AS p1,
                COUNT(CASE WHEN socios.tipo='COOPERADOR' THEN 1 END) AS p2,
                COUNT(CASE WHEN (YEAR(curdate())-socios.idade) <19 THEN 1 END) AS p3,
                COUNT(CASE WHEN (YEAR(curdate())-socios.idade) >=19 AND (YEAR(curdate())-socios.idade)<=23  THEN 1 END) AS p4,
                COUNT(CASE WHEN (YEAR(curdate())-socios.idade) >=24 AND (YEAR(curdate())-socios.idade) <=29 THEN 1 END) AS p5,
                COUNT(CASE WHEN (YEAR(curdate())-socios.idade) >=30 AND (YEAR(curdate())-socios.idade) <=35 THEN 1 END) AS p6,
                COUNT(CASE WHEN socios.sexo='F' THEN 1 END) AS p7,
                COUNT(CASE WHEN socios.sexo='M' THEN 1 END) AS p8,
                COUNT(CASE WHEN socios.estadoCivil='SOLTEIRO' THEN 1 END) AS p9,
                COUNT(CASE WHEN socios.estadoCivil='CASADO' THEN 1 END) AS p10,
                COUNT(CASE WHEN socios.estadoCivil='DIVORCIADO' THEN 1 END) AS p11,
                COUNT(CASE WHEN socios.estadoCivil='VIUVO' THEN 1 END) AS p12,
                COUNT(CASE WHEN socios.escolaridade='FUN' THEN 1 END) AS p13,
                COUNT(CASE WHEN socios.escolaridade='MED' THEN 1 END) AS p14,
                COUNT(CASE WHEN socios.escolaridade='SUP' THEN 1 END) AS p15,
                COUNT(CASE WHEN socios.escolaridade='POS' THEN 1 END) AS p16,
                COUNT(CASE WHEN socios.escolaridade='TEC' THEN 1 END) AS p17,
                COUNT(CASE WHEN socios.filho='S' AND socios.sexo='F' THEN 1 END) AS p18,
                COUNT(CASE WHEN socios.filho='S' AND socios.sexo='M' THEN 1 END) AS p19,
                COUNT(CASE WHEN socios.deficiencia='VISUAL' THEN 1 END) AS p20,
                COUNT(CASE WHEN socios.deficiencia='AUDITIVA' THEN 1 END) AS p21,
                COUNT(CASE WHEN socios.deficiencia='FISICA' THEN 1 END) AS p22,
                COUNT(CASE WHEN socios.deficiencia='INTELECTUAL' THEN 1 END) AS p23
                FROM socios WHERE {$param}";
        
        $this->statement = $query;
        return $this;
        
    }
    
    public function dadosParticipacao($param): DataLayer
    {
        $query = "SELECT 
        COUNT(CASE WHEN participacoes.nome='PMF - PROJETO MISSIONARIO DE FERIAS' AND instancia='LOCAL' THEN 1 END) AS p24,
        COUNT(CASE WHEN participacoes.nome='PMF - PROJETO MISSIONARIO DE FERIAS' AND instancia='FEDERACAO' THEN 1 END) AS p25,
        COUNT(CASE WHEN participacoes.nome='PMF - PROJETO MISSIONARIO DE FERIAS' AND instancia='SINODAL' THEN 1 END) AS p26,
        COUNT(CASE WHEN participacoes.nome='PMF - PROJETO MISSIONARIO DE FERIAS' AND instancia='NACIONAL' THEN 1 END) AS p27,
        COUNT(CASE WHEN participacoes.nome='VIGILIA NACIONAL' AND instancia='LOCAL' THEN 1 END) AS p28,
        COUNT(CASE WHEN participacoes.nome='VIGILIA NACIONAL' AND instancia='FEDERACAO' THEN 1 END) AS p29,
        COUNT(CASE WHEN participacoes.nome='VIGILIA NACIONAL' AND instancia='SINODAL' THEN 1 END) AS p30,
        COUNT(CASE WHEN participacoes.nome='VIGILIA NACIONAL' AND instancia='NACIONAL' THEN 1 END) AS p31,
        COUNT(CASE WHEN participacoes.nome='SOMOS TODOS PEREGRINOS' AND instancia='LOCAL' THEN 1 END) AS p32,
        COUNT(CASE WHEN participacoes.nome='SOMOS TODOS PEREGRINOS' AND instancia='FEDERACAO' THEN 1 END) AS p33,
        COUNT(CASE WHEN participacoes.nome='SOMOS TODOS PEREGRINOS' AND instancia='SINODAL' THEN 1 END) AS p34,
        COUNT(CASE WHEN participacoes.nome='SOMOS TODOS PEREGRINOS' AND instancia='NACIONAL' THEN 1 END) AS p35,
        COUNT(CASE WHEN participacoes.nome='MAKENZIE VOLUNTARIO' AND instancia='LOCAL' THEN 1 END) AS p36,
        COUNT(CASE WHEN participacoes.nome='MAKENZIE VOLUNTARIO' AND instancia='FEDERACAO' THEN 1 END) AS p37,
        COUNT(CASE WHEN participacoes.nome='MAKENZIE VOLUNTARIO' AND instancia='SINODAL' THEN 1 END) AS p38,
        COUNT(CASE WHEN participacoes.nome='MAKENZIE VOLUNTARIO' AND instancia='NACIONAL' THEN 1 END) AS p39
                FROM participacoes  WHERE participacoes.{$param} AND participacoes.ano = YEAR(CURDATE())";
        
        $this->statement = $query;
        return $this;
    }
    
    public function dadosDoacao($param): DataLayer
    {
        $query = "SELECT COUNT(CASE WHEN doacao LIKE '%SANGUE%' THEN 1 END) AS p50,
        COUNT(CASE WHEN cadastroDoacao LIKE '%MEDULA%' THEN 1 END) AS p51,
        COUNT(CASE WHEN cadastroDoacao LIKE '%ORGAO%' THEN 1 END) AS p52,
        COUNT(CASE WHEN cadastroDoacao LIKE '%SANGUE%' THEN 1 END) AS p40,
        COUNT(CASE WHEN doacao LIKE '%MEDULA%' THEN 1 END) AS p41,
        COUNT(CASE WHEN doacao LIKE '%PLAQUETA%' THEN 1 END) AS p42,
        COUNT(CASE WHEN doacao LIKE '%ROUPA%' THEN 1 END) AS p43,
        COUNT(CASE WHEN doacao LIKE '%ALIMENTOS%' THEN 1 END) AS p44,
        COUNT(CASE WHEN doacao LIKE '%LITERATURA%' THEN 1 END) AS p45,
        COUNT(CASE WHEN doacao LIKE '%CABELO%' THEN 1 END) AS p46,
        COUNT(CASE WHEN doacao LIKE '%DINHEIRO%' THEN 1 END) AS p47,
        COUNT(CASE WHEN doacao LIKE '%HIGIENE%' THEN 1 END) AS p48
                FROM socios WHERE {$param}";
        
        $this->statement = $query;
        return $this;
                
    }
    
    public function dadosIgrejas($param): DataLayer
    {
        $query = "SELECT "
                . "igrejas.nome, igrejas.ump, "
                . "COUNT(CASE WHEN socios.tipo='ATIVO' THEN 1 END) AS ativo, "
                . "COUNT(CASE WHEN socios.tipo='COOPERADOR' THEN 1 END) AS cooperador "
                . "FROM igrejas "
                . "LEFT JOIN socios ON socios.id_ump=igrejas.id_ump "
                . "WHERE igrejas.{$param} GROUP BY igrejas.id_ump ORDER BY igrejas.nome";
        
        $this->statement = $query;
        return $this;
        
                
    }
    public function totalSocios($param) {
        
        $query = "SELECT COUNT(CASE WHEN tipo='ATIVO' THEN 1 END) AS ativo, COUNT(CASE WHEN tipo='COOPERADOR' THEN 1 END) AS cooperador FROM socios WHERE {$param}";
        
        $this->statement = $query;
        return $this;
        
    }
    
     public function dadosUmps($param): DataLayer
    {
        $query = "SELECT umps.nome, diretoria_local.presidente, diretoria_local.conselheiro "
                . "FROM umps JOIN diretoria_local ON umps.id=diretoria_local.id_ump "
                . "WHERE umps.{$param} ORDER BY umps.nome";
        
        $this->statement = $query;
        return $this;
        
                
    }
    
    public function dadosPresbiterios($param): DataLayer
    {
        
        $query = "SELECT "
                . "presbiterios.nome, presbiterios.sigla, presbiterios.federacao, federacoes.n_umps as umps, "
                . "COUNT(CASE WHEN tipo='ATIVO' THEN 1 END) AS ativo, "
                . "COUNT(CASE WHEN tipo='COOPERADOR' THEN 1 END) AS cooperador "
                . "FROM presbiterios "
                . "LEFT JOIN federacoes ON federacoes.id = presbiterios.id_federacao "
                . "LEFT JOIN socios ON socios.id_federacao = federacoes.id "
                . "WHERE presbiterios.{$param} "
                . "GROUP BY presbiterios.id_federacao";
        
        $this->statement = $query;
        return $this;
        
    }
    
     public function dadosFederacoes($param): DataLayer
    {
        $query = "SELECT federacoes.nome, diretoria_federacao.presidente, diretoria_federacao.secretarioPresbiterial "
                . "FROM federacoes JOIN diretoria_federacao ON federacoes.id=diretoria_federacao.id_federacao "
                . "WHERE federacoes.{$param} ORDER BY federacoes.nome";
        
        $this->statement = $query;
        return $this;
        
                
    }
    
    
}
