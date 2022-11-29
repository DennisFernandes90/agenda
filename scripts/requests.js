$(document).ready(function(){

    //retornar a lista de contatos
    
    returnContactsList();
    
    function returnContactsList(){

        $.ajax({
            url: "return_contacts.php",
            type: "GET",
            dataType: "json",
            success: function(response){
                console.log(response);
                for(var i = 0; i < response.length; i++){
                    $(".table-body").append(
                        "<tr><td>" + response[i].id + "</td><td>" + response[i].nome + "</td><td>" + response[i].ddd + "</td><td>" + response[i].telefone + "</td><td><form action='form_process.php' method='post' class='d-inline me-md-3'><input type='hidden' name='type' value='delete'><input type='hidden' name='id' value='"+ response[i].id +"'><button type='submit' class='delete-btn'data-bs-toggle='tooltip' data-bs-placement='top' data-bs-title='Deletar'><i class='bi bi-trash3'></i></button></form><button type='button' class='edit-btn'><i class='bi bi-pencil-square'></i></button></td></tr>"
         
                    );
                }
            }
        });
    }

    //inserção de contatos no BD acionado pelo evento de clique no botão

    $("#save-contact").click(function(){
        
        $.ajax({
            url: "form_process.php",
            type: "POST",
            data: {
                type: $("#type").val(),
                nome: $("#nome").val(),
                ddd: $("#ddd").val(),
                telefone: $("#telefone").val()
            },
            dataType: "json",
            success: function(response){
                console.log(response);
                $("#nome").val("");
                $("#ddd").val("");
                $("#telefone").val("");
                $(".table-body").html("");
                returnContactsList();
            }
        });
    });

    //procurar usuários pelo nome

    $("#contact-search-btn").click(function(){

        var input = $("#searchName").val();
        
        if(input != ""){

            $.ajax({
                url: "busca_contato.php",
                type: "POST",
                data: {
                    input: input
                },
                dataType: "json",
                success: function(response){
                    console.log(response);
                    $(".table-body").html("");
                    for(var i = 0; i < response.length; i++){
                        $(".table-body").append(
                            "<tr><td>" + response[i].id + "</td><td>" + response[i].nome + "</td><td>" + response[i].ddd + "</td><td>" + response[i].telefone + "</td><td><form action='form_process.php' method='post' class='d-inline me-md-3'><input type='hidden' name='type' value='delete'><input type='hidden' name='id' value='"+ response[i].id +"'><button type='submit' class='delete-btn'data-bs-toggle='tooltip' data-bs-placement='top' data-bs-title='Deletar'><i class='bi bi-trash3'></i></button></form><button type='button' class='edit-btn'><i class='bi bi-pencil-square'></i></button></td></tr>"
             
                        );
                    }
                    
                }
            });
        }else{
            alert("Digite algo");
        }
    });

    $(".my-btn").click(function(){
        
    });

    //Abertura do modal de edição a partir do clique nos botões de edição na tabela
    $(document).on('click', '.edit-btn', function() { //para elementos criados dinamicamente, usar esta sintaxe
        $("#editModal").modal("show");

        var tr = $(this).closest("tr");
        var data = tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $("#editId").val(data[0]);
        $("#editNome").val(data[1]);
        $("#editDdd").val(data[2]);
        $("#editTelefone").val(data[3]);
    });




});