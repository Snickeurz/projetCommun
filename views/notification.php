
<div class="center bannerCenter" id="notif">
    <div class="content">
        <div class="cardTrick">
            <div class="pull-right"> <a href="#" id="close_popUp_notif"><span class="fa fa-close"></a></div>
            <div class="firstinfo"><img src="./ressources/img/notif.png"/>
                <div class="profileinfo">
                    <h1>Notifications</h1>
                    <h3><span class="fa fa-bell"></span> <?php echo NotificationManager::countNotification($_SESSION["id"])?> notifications - total</h3>
                    <p class="bio">
                        <?php
                        foreach($notifications as $notif)
                        {
                            $lien = $notif["lien"];
                            $titre = $notif["titre"];
                            echo "<a href='$lien'>$titre</a><br>";
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="badgescard">
            <span class="fa fa-lightbulb-o"></span>
            Astuce : Trouvez les réponses à vos questions dans la FAQ
        </div>
    </div>
</div>

<script>
    /**
     * Concerne la pop up des notifs
     * Au click sur la div "close_popUp_notif", on cache a div "notif"
     */
    $( "#close_popUp_notif" ).click(function() {
        $("#notif").hide();
    });
</script>