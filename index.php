<?php

session_start();
require "vendor/autoload.php";

$index = (isset($_GET['index']) && is_numeric($_GET["index"]) && $_GET['index'] > 0) ? (int)$_GET["index"] : 0;
$next_index = $index + __records_per_page__;
$next_link = "index.php?index=$next_index";
$previous_index = (($index - __records_per_page__) >= 0) ? $index - __records_per_page__ : 0;
$previous_link = "index.php?index=$previous_index";

$handler = new MYSQLHandler;
$handler->connect();
$glasses = $handler->get_data($index);



// $usa_glasses = $handler->get_record_by_id(17);


require_once("views/table.php");

