<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 26/05/2018
 * Time: 12:25
 */
?>
<main class="l-main hideDisplay" id="listeEntreprises">
    <div class="content-wrapper content-wrapper--with-bg">
        <h1 class="page-title bg-info">LISTE DES ENTREPRISES <span class="fa fa-file bg-info"></span></h1>
        <div class="page-content">
            <div class="container">
                <?php
                foreach($listeEntreprises as $ent)
                {
                    ?>
                    <div class="row client-item">
                        <div class="col-md-3 separateur-vertical"><img src="//placehold.it/250x250" class="img-responsive center-block arrondi"></div>
                        <div class="col-md-9">
                            <h2 class="titre_liste_client"><?php echo $ent[1].$ent[2] ?></h2>
                            <p class="description_client">
                            <ul>
                                <li>Nombre de contrat associé : <?php echo DependencyManager::countContrat($_SESSION["id"], $ent[0]); ?></li>
                                <li>ID : <?php echo $ent[0] ?></li>
                            </ul>
                            </p>
                            <a href="#" type="button" class="btn btn-info arrondi pull-right">Détails</a>
                        </div>
                    </div>

                    <?php
                }
                ?>

            </div>

        </div>
    </div>

</main>
