$(function (){


    $("#fonction_form").validate({
            rules: {

                nom_fnc: {
                    required: true,
                    minlength: 5

                },
                abr_fnc: {
                    required: true,
                },
                desc_fnc: {
                    required: true,
                    minlength:20

                },

            },
            messages: {
                nom_fnc: {
                    required: "Ce champ est requis",
                    minlength: "Le nom de la fonction doit comporter au minimum 5 caractères"
                },
                abr_fnc: {
                    required: "Ce champ est requis",
                },
                desc_fnc: {
                    required: "Ce champ est requis",
                    minlength: "La description doit comporter au minimum 20 caractères",
                },



            },
            submitHandler: function(form){
            $.post(
                "./json/add_fonction.json.php?_="+Date.now(),
                {
                    nom_fnc:$("#nom_fnc").val(),
                    abr_fnc:$("#abr_fnc").val(),
                    desc_fnc:$("#desc_fnc").val(),

                },
                function result(data,status){
                    $("#alert .message").html(data.message.texte)
                    $("#alert").attr("class","alert");
                    $("#alert").addClass("alert-"+data.message.type);
                    $("#alert").css("display", "block");


                }
            );



                console.log("formulaire envoyé");



            }
        }
    );
});