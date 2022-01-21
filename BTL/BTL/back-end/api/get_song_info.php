<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
function getSongInfo($key)
{
    $xml = simpleXML_load_file("https://www.nhaccuatui.com/flash/xml?html5=true&key1=" . $key, "SimpleXMLElement", LIBXML_NOCDATA);
    if ($xml ===  FALSE) {
        echo -1;
    } else {
        echo json_encode($xml);
    }
}

if (isset($_GET['key']) && !empty($_GET['key'])) {
    getSongInfo($_GET['key']);
} else {
    echo -1;
}
