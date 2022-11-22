<?php
    
    require_once("templates/header.php");
    

    $contatosDao = new ContatosDAO($conn);

    $listaContatos = $contatosDao->getAllContacts();
?>
    
  <!-- modal formulario incluir contatos -->
  <section class="container mb-3" id="open-form-btn-container">

    <div class="row">
      
      <div class="col-12 col-md-3">
        <button class="btn btn-primary" id="open-form-btn" data-bs-toggle="modal" data-bs-target="#modal-add-contact"><i class="bi bi-person-plus"></i> Adicionar Contatos</button>
        
      </div>      
      
    </div>

  </section>

    <div class="modal fade" id="modal-add-contact" tabindex="-1" aria-labelledby="modal-add-contact-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Insira um novo contato</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="form_process.php" method="post">
              <input type="hidden" name="type" value="register">
              <div class="col mb-3">
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o nome">
              </div>
              <div class="row mb-3">
                <div class="col-4">
                  <input type="text" name="ddd" id="ddd" class="form-control" placeholder="DDD">
                </div>
                <div class="col-8">
                  <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Número">
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Salvar</button>
          </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>

  <!-- tabela de contatos -->
  <section class="container" id="contacts-table-container">

    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
          <h1>Contatos</h1>
        <table class="table" id="contact-table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">DDD</th>
              <th scope="col">Número</th>
              <th scope="col">Ação</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach($listaContatos as $contato): ?>
            <tr>
              <th scope="row"><?= $contato["id"] ?></th>
              <td><?= $contato["nome"] ?></td>
              <td><?= $contato["ddd"] ?></td>
              <td><?= $contato["telefone"] ?></td>
              <td>
                <form action="form_process.php" method="post" class="d-inline me-md-3">
                  <input type="hidden" name="type" value="delete">
                  <input type="hidden" name="id" value="<?= $contato["id"] ?>">
                  <button type="submit" class="delete-btn"data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deletar"><i class="bi bi-trash3"></i></button>
                </form>
                <button type="button" class="edit-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Editar"><i class="bi bi-pencil-square"></i></button>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        </div>
    </div>
  </section>

</body>
</html>