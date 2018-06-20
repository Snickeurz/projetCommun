<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 20/06/2018
 * Time: 17:57
 */

if(isset($_POST["delete_notification"]))
{
    if(NotificationManager::deleteNotification($_POST["id_notification_to_del"]))
    {
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&edit=notif_deleted");</script>';
    }else{
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&edit=notif_not_deleted");</script>';
    }
}