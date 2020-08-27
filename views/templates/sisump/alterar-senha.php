<?php $this->layout('sisump/_template', ['title' => $this->e($title)]); ?>

<h1 class="h3 mb-3 font-weight-normal">Alterar Senha</h1>
<form class="form-signin mt-5" action="<?=$router->route("app.atualizarsenha")?>" method="POST">
    <?=flash()?>
    <label for="antiga" class="sr-only">Antiga Senha</label>
    <input type="text" id="antiga" name="antiga" class="form-control" placeholder="Antiga Senha" required autofocus>
    <label for="nova" class="sr-only">Nova Senha</label>
    <input type="text" id="nova" name="nova" class="form-control mt-2" placeholder="Nova Senha" required>

    <button class="btn btn-lg btn-warning btn-block mt-2" type="submit">Alterar</button>
    <p class="text-danger text-center">As senhas não são criptografadas, por isso, não use senhas pessoais</p>
</form>
