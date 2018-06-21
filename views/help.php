<meta charset="utf-8">
<div class="text-xs-center banner">
    <h1 style="font-size: 3rem;">F.A.Q</h1>
    <p class="lead banner-text"  >
        Toutes vos questions
    </p>
    <?php
    $i = 0;
    foreach($faq as $qr) {
        echo '<div class="contentHelp">';
        echo "<div class='plus'>+</div>";
        echo '<a href="#demo'.$i.'" data-toggle="collapse" class="question">';
        echo($qr['question']);
        echo '</a>';
        echo '<div id="demo'.$i.'" class="collapse answers">';
        echo($qr['reponse']);
        echo '</div>';
        $i++;
        echo '</div>';
    }
    $i=0;
    ?>

</div>


