<meta charset="utf-8">
<div class="text-xs-center banner">
    <h1 style="font-size: 3rem;">F.A.Q</h1>
    <p class="lead banner-text"  >
        Toutes vos questions
    </p>
</div>
<br>

<div class="contentHelp">
    <div>
        <?php
        foreach($faq as $qr) {
            echo '<input type="checkbox" id="' . $qr['id'] . '" class="questions">';
            echo "<div class='plus'>+</div>";
                echo '<label for="' . $qr['id'] . '" class="question">';
                echo($qr['question']);
                echo("</label>");
            echo('<div class="answers">');
            echo($qr['reponse']);
            echo("</div>");
        }
        ?>
    </div>


</div>