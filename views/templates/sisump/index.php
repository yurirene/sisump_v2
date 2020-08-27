<?=$this->layout('sisump/_template', ['title' => $this->e($title)]); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tutorial</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <?=flash()?>
            </div>
        </div>
        <div class="accordion" id="accordionExample">
            
            <div class="card">
                <div class="card-header" id="quarto">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#programacoes" aria-expanded="true" aria-controls="programacoes">
                            Programações
                        </button>
                    </h2>
                </div>

                <div id="programacoes" class="collapse" aria-labelledby="quarto" data-parent="#accordionExample">
                    <div class="card-body">
                        Para acessar a página de Programações clique em ( <i class="fas fa-calendar"></i> <span>Programações</span> ).
                        <p>
                            <b>Cadastrar Programações</b><br>
                            <li>Clique em <a href='#' class="btn btn-sm btn-success disabled"><i class="fas fa-calendar-plus  text-white-50"></i> Cadastrar Programações</a></li>
                            <li>Preencha os dados</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-primary disabled">Cadastrar</a></li>
                            <li>Pronto!</li>

                        </p>
                        <p>
                            <b>Editar Programação</b><br>
                            <li>Clique em <a href='#' class='btn btn-sm btn-circle btn-warning m-1'><i class='fas fa-edit'></i></a> para editar</li>
                            <li>Edite os dados que você desejar</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-primary disabled">Atualizar</a></li>
                            <li>Pronto!</li>

                        </p>
                        <p>
                            <b>Apagar Programação</b><br>
                            <li>Clique em <a href='#' class='btn btn-sm btn-circle btn-danger m-1'><i class='fas fa-trash '></i></a> para excluir</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-primary disabled">Apagar</a> na caixa de confirmação</li>
                            <li>Pronto!</li>

                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="sexto">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#igrejas" aria-expanded="true" aria-controls="igrejas">
                            Igrejas
                        </button>
                    </h2>
                </div>

                <div id="igrejas" class="collapse" aria-labelledby="sexto" data-parent="#accordionExample">
                    <div class="card-body">
                        Para acessar a página das Igrejas clique em ( <i class="fas fa-fw fa-church"></i> <span>Igrejas</span> ).
                        <p>
                            <b>Cadastrar Igreja</b><br>
                            <li>Clique em <a href='#' class="btn btn-sm btn-success disabled"><i class="fas fa-plus  text-white-50"></i> Cadastrar Igreja</a></li>
                            <li>Preencha o Nome da Igreja</li>
                            <li>Preencha as informações de contato</li>
                            <li>Selecione se existe UMP naquela igreja</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-success disabled">Cadastrar</a></li>
                            <li>Pronto!</li>

                        </p>
                        <p>
                            <b>Editar Igrejas</b><br>
                            <li>Clique em <a href='#' class='btn btn-sm btn-circle btn-warning m-1'><i class='fas fa-edit '></i></a> para editar</li>
                            <li>Edite os dados que você desejar</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-primary disabled">Atualizar</a></li>
                            <li>Pronto!</li>

                        </p>
                        <p>
                            <b>Apagar Igreja</b><br>
                            <li>Clique em <a href='#' class='btn btn-sm btn-circle btn-danger m-1'><i class='fas fa-trash '></i></a> para excluir</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-primary disabled">Apagar</a> na caixa de confirmação</li>
                            <li>Pronto!</li>

                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="quinta">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#umps" aria-expanded="true" aria-controls="umps">
                            UMPs
                        </button>
                    </h2>
                </div>

                <div id="umps" class="collapse" aria-labelledby="quinta" data-parent="#accordionExample">
                    <div class="card-body">
                        Para acessar a página de UMPs clique em ( <i class="fas fa-fw fa-users"></i> <span>UMPs</span> ).
                        <p>
                            <b style="color:red;"><i>Antes de Cadastrar uma UMP cadastre primeiro as igrejas</i></b><br>
                            <b>Cadastrar UMP</b><br>
                            <li>Clique em <a href='#' class="btn btn-sm btn-success disabled"><i class="fas fa-plus  text-white-50"></i> Cadastrar UMP</a></li>
                            <li>Digite o nome</li>
                            <li>Selecione a Igreja</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-success disabled">Cadastrar</a></li>
                            <li>Pronto!</li>

                        </p>
                        <p>
                            <b>Editar UMP</b><br>
                            <li>Clique em <a href='#' class='btn btn-sm btn-circle btn-warning m-1'><i class='fas fa-edit '></i></a> para editar</li>
                            <li>Edite os dados que você desejar</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-primary disabled">Atualizar</a></li>
                            <li>Pronto!</li>

                        </p>
                        <p>
                            <b>Apagar UMP</b><br>
                            <li>Clique em <a href='#' class='btn btn-sm btn-circle btn-danger m-1'><i class='fas fa-trash '></i></a> para excluir</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-primary disabled">Apagar</a> na caixa de confirmação</li>
                            <li>Pronto!</li>
                            <li><b style="color:red">Ao apagar a UMP você estará apagando todos os sócios já cadastrados dessa UMP.</b></li>

                        </p>

                        <p>
                            <b>Cadastrar Usuário</b><br>
                            <li>Clique em <a href='#' class="btn btn-sm btn-success disabled"><i class="fas fa-plus  text-white-50"></i> Cadastrar Usuário</a></li>
                            <li>Digite o Login</li>
                            <li>Digite a Senha</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-success disabled">Cadastrar</a></li>
                            <li>Pronto!</li>

                        </p>
                        <p>
                            <b>Editar Usuário</b><br>
                            <li>Clique em <a href='#' class='btn btn-sm btn-circle btn-warning m-1'><i class='fas fa-edit '></i></a> para editar</li>
                            <li>Edite os dados que você desejar</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-primary disabled">Atualizar</a></li>
                            <li>Pronto!</li>

                        </p>
                        <p>
                            <b>Apagar Usuário</b><br>
                            <li>Clique em <a href='#' class='btn btn-sm btn-circle btn-danger m-1'><i class='fas fa-trash '></i></a> para excluir</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-primary disabled">Apagar</a> na caixa de confirmação</li>
                            <li>Pronto!</li>

                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="setimo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#secretarios" aria-expanded="true" aria-controls="igrejas">
                            Secretários
                        </button>
                    </h2>
                </div>

                <div id="secretarios" class="collapse" aria-labelledby="setimo" data-parent="#accordionExample">
                    <div class="card-body">
                        Para acessar a página de Secretários clique em ( <i class="fas fa-fw fa-people-carry"></i> <span>Secretários</span> ).
                        <p>
                            <b>Cadastrar Secretário</b><br>
                            <li>Clique em <a href='#' class="btn btn-sm btn-success disabled"><i class="fas fa-plus  text-white-50"></i> Cadastrar Secretário</a></li>
                            <li>Preencha as Informações</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-primary disabled">Cadastrar</a></li>
                            <li>Pronto!</li>

                        </p>
                        <p>
                            <b>Editar Secretário</b><br>
                            <li>Clique em <a href='#' class='btn btn-sm btn-circle btn-warning m-1'><i class='fas fa-edit '></i></a> para editar</li>
                            <li>Edite os dados que você desejar</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-primary disabled">Atualizar</a></li>
                            <li>Pronto!</li>

                        </p>
                        <p>
                            <b>Apagar Secretário</b><br>
                            <li>Clique em <a href='#' class='btn btn-sm btn-circle btn-danger m-1'><i class='fas fa-trash '></i></a> para excluir</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-primary disabled">Apagar</a> na caixa de confirmação</li>
                            <li>Pronto!</li>

                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="oitavo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#senha" aria-expanded="true" aria-controls="senha">
                            Senha
                        </button>
                    </h2>
                </div>

                <div id="senha" class="collapse show" aria-labelledby="oitavo" data-parent="#accordionExample">
                    <div class="card-body">
                        Para alterar a sua Senha clique no canto superior direito ( <i class="fas fa-fw fa-user"></i> ).
                        <p>
                            <li>Clique em Trocar Senha</li>
                            <li>Digite a Senha atual</li>
                            <li>Digite a Senha nova</li>
                            <li>Clique em <a href='#' class="btn btn-sm btn-primary disabled">Atualizar</a></li>
                            <li>Pronto!</li>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>