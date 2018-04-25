<div class="bgg bgg-container">
    <div class="bgg-thumb"><img src="<?php echo $bg->thumbnail?>"></div>
    <div class="bgg-data">
        <h1><a href="https://boardgamegeek.com/boardgame/<?php echo $gameid?>/"><?php echo $bg->name[0]?></a> <span>(<?php echo $bg->yearpublished?>)</span></h1>
        <ul class="bgg-details">
            <li><?php echo $bg->minplayers." - ".$bg->maxplayers?> Players</li>
            <li><?php echo $bg->minplaytime." - ".$bg->maxplaytime?> Min</li>
            <li>Age: <?php echo $bg->age?>+</li>
        </ul>
    </div>
</div>
