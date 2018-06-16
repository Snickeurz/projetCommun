//pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"

/**
 * Tu peux utiliser du JQuery, ce sera plus simple à lire.
 * Ex :
 *
 *      $("#idDiv").show() ===  document.getElementById('signup').style.display = 'inline' (ou block);
 *      $("#idDiv").hide();
 *
 *      Et t'as la classe addClass(); en jquery qui existe, ça t'évite de taper avec les toggles
 *
 *      Et rajouter des comms ! :o
 */
function affichage() {
    if (document.getElementById("signi").classList.contains('active')) {

        document.getElementById('signin').style.display = 'none';
        document.getElementById('signup').style.display = 'inline';

    }
    else
    {
        document.getElementById('signup').style.display = 'none';
        document.getElementById('signin').style.display = 'inline';
    }
    document.getElementById("signi").classList.toggle('active');
    document.getElementById("signu").classList.toggle('active');
}

