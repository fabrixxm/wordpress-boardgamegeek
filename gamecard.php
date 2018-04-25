<div class="bgg bgg-container">
    <div class="bgg-thumb"><img src="<?php echo $bg->thumbnail?>"></div>
    <div class="bgg-data">
        <h1><a href="https://boardgamegeek.com/boardgame/<?php echo $gameid?>/"><?php echo $bg->name[0]?></a> <span>(<?php echo $bg->yearpublished?>)</span></h1>
        <div class="bgg-details">
            <div><?php echo $bg->minplayers." - ".$bg->maxplayers?> Players</div>
            <div><?php echo $bg->minplaytime." - ".$bg->maxplaytime?> Min</div>
            <div>Age: <?php echo $bg->age?>+</div>
        
        </div>
        
    </div>
</div>
