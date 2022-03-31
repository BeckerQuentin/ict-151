$(function (){


    $("#autorisation_form").validate({
            rules: {

                nom_aut: {
                    required: true,
                    minlength: 5

                },
                code_aut: {
                    required: true,
                    minlength: 3,
                    maxlength: 4


                },
                desc_adm: {
                    required: true,
                    minlength: 20

                },
                desc_usr: {
                    required: true,
                    minlength: 20

                },
            },
            messages: {
                nom_aut: {
                    required: "Ce champ est requis",
                    minlength: "Le nom de l'autorisation doit comporter au minimum 5 caractères"
                },
                code_aut: {
                    required: "Ce champ est requis",
                    minlength: "Le code doit comporter au minimum 3 caractères",
                    maxlength: "Le code peut comporter au maximum 4 caractères",
                },
                desc_adm: {
                    required: "Ce champ est requis",
                    minlength: "Le code doit comporter au minimum 20 caractères",
                },
                desc_usr: {
                    required: "Ce champ est requis",
                    minlength: "Le code doit comporter au minimum 20 caractères",

                },


            },
            submitHandler: function (form) {
                $.post(
                    "./json/add_autorisation.json.php?_=" + Date.now(),
                    {
                        nom_aut: $("#nom_aut").val(),
                        code_aut: $("#code_aut").val(),
                        desc_adm: $("#desc_adm").val(),
                        desc_usr: $("#desc_usr").val(),
                    },
                    function result(data, status) {
                        $("#alert .message").html(data.message.texte)
                        $("#alert").attr("class", "alert");
                        $("#alert").addClass("alert-" + data.message.type);
                        $("#alert").css("display", "block");


                    }
                );


                console.log("formulaire envoyé");


            }
        }
    );
});