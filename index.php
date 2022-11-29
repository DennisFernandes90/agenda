<?php
    
    require_once("templates/header.php");
    
?>
    
  <!-- modal formulario incluir contatos -->
  <section class="container mb-3" id="open-form-btn-container">

    <div class="row justify-content-center">
      
      <div class="col-12 col-md-8">
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
          <form action="" method="post">
              <input type="hidden" name="type" id="type" value="register">
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

              <button type="button" id="save-contact" class="btn btn-primary">Salvar</button>
          </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>

  <!-- tabela de contatos -->
  <section class="container mb-5" id="contacts-table-container">

    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
          <h1>Contatos</h1>
        <table class="table" id="contact-table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nome</th>
              <th scope="col">DDD</th>
              <th scope="col">Número</th>
              <th scope="col">Ação</th>
            </tr>
          </thead>
          <tbody class="table-body">


          </tbody>
        </table>
        </div>
    </div>
  </section>

  <!-- edit modal form -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar contato</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
              
              <input type="hidden" name="editId" id="editId">
              <div class="col mb-3">
                <input type="text" name="editNome" id="editNome" class="form-control" placeholder="Digite o nome">
              </div>
              <div class="row mb-3">
                <div class="col-4">
                  <input type="text" name="editDdd" id="editDdd" class="form-control" placeholder="DDD">
                </div>
                <div class="col-8">
                  <input type="text" name="editTelefone" id="editTelefone" class="form-control" placeholder="Número">
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" id="save-contact" class="btn btn-primary">Save changes</button>
            </div>
          </form>
    </div>
  </div>
</div>

</body>
</html>