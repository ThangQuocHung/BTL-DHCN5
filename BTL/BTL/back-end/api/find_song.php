<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
function getSongLink($songName)
{
    $res = "";
    if (!empty($songName)) {
        $res = file_get_contents("https://www.nhaccuatui.com/tim-kiem/bai-hat?q=" . urlencode($songName) . "&b=keyword&l=tat-ca&s=default&page=1");
        $res = trim(preg_replace('/\s+/', ' ', $res)); // supports line breaks
        $res = trim(preg_replace('/\n+/', ' ', $res)); // supports line breaks
    }
    return $res;
}

function getSongDetail($songName)
{
    $res = getSongLink($songName);
    $links = [];
    if (!empty($res)) {
        if (preg_match_all("/<li class=\"sn_search_single_song\">.*?<\/li>/m", $res, $matches, PREG_SET_ORDER, 0)) {
            $i = 0;
            foreach ($matches as $li) {
                $link = "";
                if (preg_match("/href=\"(.*?)\"/i", $li[0], $got)) {
                    $link = $got[1];
                }
                // Lấy thực tế
                $res = file_get_contents($link);
                $res = trim(preg_replace('/\s+/', ' ', $res)); // supports line breaks
                if (preg_match("/(https:\/\/www\.nhaccuatui\.com\/flash\/xml\?html5=true&key1=(.*?))\";/i", $res, $got)) {
                    array_push($links, $got[2]);
                }
                if (++$i > 10)
                    break;
            }
            if (count($links) <= 0) {
                echo -1;
            } else {
                echo json_encode($links);
            }
        } else {
            echo -1;
        }
    } else {
        echo -1;
    }
}

// Processing here
if (isset($_GET["song"]) && !empty($_GET["song"])) {
    getSongDetail($_GET["song"]);
} else {
    echo -1;
}
