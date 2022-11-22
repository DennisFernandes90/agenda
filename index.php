<?php
    
    require_once("templates/header.php");
    

    $contatosDao = new ContatosDAO($conn);

    $listaContatos = $contatosDao->getAllContacts();
?>
    
  <div class="container">
    <section class="row" id="open-form">
      
      <div class="col-12 col-md-2">
        <button class="btn btn-warning" id="open-form-btn">Adicionar Contatos</button>
        
      </div>

      <?php
        print_r($listaContatos);
      ?>
      
    </section>

    
  </div>
</body>
</html>