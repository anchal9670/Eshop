<?php
include('simple_html_dom.php');
$html=file_get_html('https://sports.ndtv.com/cricket/live-scores');
echo $html->find('div.section.pt-0',0)->innertext;

?>