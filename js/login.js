$(function (){


    $("#login_form").validate({
            rules: {


                email_log: {
                    required: true,
                    email: true

                },

                password_log: {
                    required: true,


                }
            },
            messages: {

                email_log: {
                    required: "Ce champ est requis",
                    email: "Votre adresse E-mail doit correspondre au format d'adresse"
                },
                password_log: {
                    required: "Ce champ est requis",
                },


            },
            submitHandler: function(form){


                var news_letter = 0;
                if($("#news_letter").is(":checked")){
                    news_letter=1;
                }

                console.log("formulaire envoyé");
                $.post("./json./inscription.json.php?_="+Date.now(),
                    {
                        email_log:$("#email_per").val(),
                        password_log:$("#password").val(),
                    },
                    function result(data,status){
                        $("#alert .message").html(data.message.texte)
                        $("#alert").attr("class","alert");
                        $("#alert").addClass("alert-"+data.message.type);
                        $("#alert").css("display", "block");
                    }

                )


            }
        }
    );
});