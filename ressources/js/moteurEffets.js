/**
 * Cette fonction s'execute lorsque la page est dans l'état ready().
 */
$(function() {

    /**
     *
     * Cacher le slider principal sauf pour certaines pages
     */
    var parametreUC = getUrlParameter('uc');
    if(parametreUC!=="accueil" && parametreUC!="service" && parametreUC!="help")
    {
        $("#carouselLogo").hide();
     //   $(".carousel").hide();
        if(parametreUC==="profil")
        {
            $("#form_search_navbar").hide();
        }
    }

    /**
     * Concerne contact.html
     * Affiche le succès ou l'échec de l'envoie de l'email.
     */
    var parametreSend = getUrlParameter('send');
    // Si on recupère bien le paramètre send (ndrl il existe)
    switch(parametreSend)
    {
        case 'message_send':
            $("#display_sucess_send_contact").html("<strong>Votre message a bien été envoyé!</strong> Nous vous contacterons dès que possible !<br>\n Nous vous remercions d'avance pour votre patience.");
            // Display la div alert dans contact.html
            $("#envoie_reussit").show();
            break;
        case 'message_not_send':
            $("#display_sucess_send_contact").html("<strong>Un problème est survenu lors de l'envoie , merci de réessayer plus tard!</strong> Nous mettons tout en oeuvre pour résoudre la panne asap !<br>\n Nous vous remercions d'avance pour votre patience.");
            // Display la div alert dans contact.html
            $("#envoie_reussit").show();
            break;
        default:
            break;
    }


    /**
     * Permet d'afficher le message de succès d'édition dans la profile page :
     */
    var parametreEdit = getUrlParameter('edit');
    switch (parametreEdit)
    {
        case 'password':
            $("#display_success_edit").html("<strong>Mot de passe modifié</strong> Nous avons bien prit en compte votre modification de mot de passe !<br>");
            $("#editProfilSuccess").show();
            break;
        case 'coord_true':
            $("#display_success_edit").html("<strong>Coordonnées modifié</strong> Nous avons bien prit en compte votre modification d'email et de téléphone !<br>");
            $("#editProfilSuccess").show();
            break;
        case 'coord_false':
            $("#display_fail_edit").html("<strong>Coordonnées non modifié</strong> Impossible de modifier l'email et le téléphone !<br>");
            $("#editProfilFail").show();
            break;
        case 'names_true':
            $("#display_success_edit").html("<strong>Nom/Prénom modifié</strong> Nous avons bien prit en compte votre modification de votre prénom et nom!<br>");
            $("#editProfilSuccess").show();
            break;
        case 'names_false':
            $("#display_fail_edit").html("<strong>Nom/Prénom non modifié</strong> Impossible de changer le nom/prénom !<br>");
            $("#editProfilFail").show();
            break;
        case 'contrat_signe':
            $("#display_success_edit").html("<strong>Contrat signé</strong> Nous avons bien prit en compte la signature de votre contrat !<br>");
            $("#editProfilSuccess").show();
            break;
        case 'contrat_non_signe':
            $("#display_fail_edit").html("<strong>Contrat non signé</strong> Impossible de signer le contrat !<br>");
            $("#editProfilFail").show();
            break;
        case 'pref_true':
            $("#display_success_edit").html("<strong>Préférences modifiées</strong>  Les changements ont bien été pris en compte !<br>");
            $("#editProfilSuccess").show();
            break;
        case 'pref_false':
            $("#display_fail_edit").html("<strong>Préférences non modifiées</strong> Un problème est survenue !<br>");
            $("#editProfilFail").show();
            break;
        default:
            break;
    }
    /**
     * Permet d'afficher le message de succès d'édition dans la profile page :
     */
    var information = getUrlParameter('information');
    $("#uploadOk").hide();
    $("#failupload").hide();
    switch (information)
    {
        case 'uploadOk':
            $("#uploadOk").toggle(10);
            break;
        case 'failupload':
            $("#failupload").toggle(10);
            break;
        default:
            break;
    }
});

/**
 * Cette fonction recupère un paramètre donné dans l'url
 * @param sParam le paramètre a chercher
 * @returns {boolean}
 */
var getUrlParameter = function getUrlParameter(sParam)
{
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++)
    {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam)
        {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};


