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
            }
        });
    }
});