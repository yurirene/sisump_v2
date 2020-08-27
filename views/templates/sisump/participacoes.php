<?=$this->layout("sisump/_template", ['title'=>$this->e($title)])?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Participações</h1>
        
</div>


    <?php 
    
    if($_SESSION['usuario']['restricao'] == '1'){
        $this->insert("sisump/participacoes/_local", ["socios"=>$socios, "participacoes"=>$participacoes]);
    }
    if($_SESSION['usuario']['restricao'] == '2'){
        $this->insert("sisump/participacoes/_federacao", ["lista"=>$participacoes]);
    }
    if($_SESSION['usuario']['restricao'] == '3'){
        $this->insert("sisump/participacoes/_sinodal", ["lista"=>$participacoes]);
    }
    
    ?>



    <?=$this->start("script");?>

<script>
    $('#modalParticipacaoDeletar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var modal = $(this)
        modal.find('#id_del').val(id)
        console.log(id);

    })

</script>
    <?=$this->end();?>