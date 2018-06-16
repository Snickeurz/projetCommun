
<main class="l-main hideDisplay" id="listeClients">
    <div class="content-wrapper content-wrapper--with-bg">
        <h1 class="page-title bg-info">LISTE DES CLIENTS <span class="fa fa-file bg-info"></span></h1>
        <div class="page-content">

            <div class="container">
                <?php
                    foreach($listeClients as $client)
                    {
                    ?>
                <div class="row client-item">
                    <div class="col-md-3 separateur-vertical"><img src="//placehold.it/250x250" class="img-responsive center-block arrondi"></div>
                    <div class="col-md-9">
                        <h2 class="titre_liste_client"><?php echo $client[1].$client[2] ?></h2>
                        <p class="description_client">
                        <ul>
                            <li>Nombre de contrat associé : <?php echo DependencyManager::countContrat($_SESSION["id"], $client[0]); ?></li>
                            <li>ID : <?php echo $client[0] ?></li>
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