
<main class="l-main hideDisplay" id="listeClients">
    <div class="content-wrapper content-wrapper--with-bg">
        <h1 class="page-title">LISTE DES CLIENTS</h1>
        <div class="page-content">
            <div class="container">

                <form action="./index.php?uc=profil&ac=addclient" method="POST" class=" alert alert-dark" role="alert">
                    <legend>FORMULAIRE D'AJOUT DE CLIENT</legend>
                    <div class="row">
                        <div class="col-8">
                            <select name="idClientToAdd" id="select_utilisateur" class="full-width">
                                <option>-- Veuillez choisir parmis la liste des utilisateurs --</option>
                                <?php
                                    foreach($listeUtilisateurs as $utilisateur)
                                    {
                                        $nom = $utilisateur[1]." ".$utilisateur[2];
                                        echo "<option value='$utilisateur[0]'>$nom</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <input name="add_client" value="add_client" hidden>
                            <button type="submit" class="btn btn-info pull-right"><span class="fa fa-plus"></span> Ajouter cette personne</button>
                        </div>
                    </div>
                </form>

                <?php
                    if(empty($listeClients))
                    {
                        echo "<div class='alert alert-info'>Vous n'avez pas de clients partenaires pour l'instant.. Ajoutez-en depuis la liste déroulante !</div>";
                    }
                    foreach($listeClients as $client)
                    {
                    ?>
                <div class="row client-item">
                    <div class="col-md-3 separateur-vertical"><img src="//placehold.it/250x250" class="img-responsive center-block arrondi"></div>
                    <div class="col-md-9">
                        <h2 class="titre_liste_client"><?php echo $client[1].$client[2] ?>
                            <span class="pull-right">
                                <form action="./index.php?uc=client&ac=delete" method="POST">
                                    <button type="submit" class="btn btn-warning" onclick="alert('Êtes vous sûr ? Cela supprimera votre client ainsi que tout les contrats associé.')">&times;</button>
                                    <input hidden name="idClientToDelete" value="$client[0]">
                                </form>
                            </span>
                        </h2>
                        <p class="description_client">
                        <ul>
                            <li>Nombre de contrat associé : <?php
                                $nbrContrat = DependencyManager::countContrat($_SESSION["id"], $client[0]);
                                if($nbrContrat>0)
                                {
                                    echo $nbrContrat;
                                }
                                else{
                                    echo "<span style='color:red;'>Aucun contrat pour l'instant</span>";
                                }
                                 ?></li>
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