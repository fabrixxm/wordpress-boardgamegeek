<?php
/*
* Plugin Name: BoardGameGeek
* Description: Insert boardgame info in a post with a shortcode
* Version: 1.0
* Author: fabrixxm
* Author URI: https://kirgroup.com/~fabrixxm/
* License: GPLv2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


function bgg_shortcode($atts, $content=null){
    if (count($atts)!== 1) return "<div class='bgg error'>Wrong parameters count for bgg shortcode. Expected 1.</div>";
    
    $gameid = $atts[0];
    if (!is_numeric($gameid)) return "<div class='bgg error'>Wrong game id for bgg shortcode</div>";
    
    $xml = wp_cache_get($gameid, "bgg", true);
    if ($xml === false) {
        $r = wp_safe_remote_request("https://boardgamegeek.com/xmlapi/boardgame/".$gameid);
        if ($r['response']['code']>399) return "<div class='bgg error'>".$r['response']['code'].":".$r['response']['message']." from bgg.com</div>";
        $xml = $r['body'];
        
        $r = wp_cache_add($gameid, $xml, "bgg");
    }
        
    $doc = simplexml_load_string($xml);
    if ($doc === false) return "<div class='bgg error'>Cannot parse response from bgg.com</div>";
    
    $bg = $doc->boardgame;
    if ($bg->errror) return "<div class='bgg error'>".$bg->error."</div>";

    ob_start();
    include("gamecard.php");
    $o = ob_get_clean();
    
    return $o;
    
    
}
add_shortcode('bgg', 'bgg_shortcode');


function bgg_add_style() {
    wp_register_style('bgg', plugins_url('style.css',__FILE__ ));
    wp_enqueue_style('bgg');
}

add_action( 'wp_enqueue_scripts','bgg_add_style');

