<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$ajax = new index();
if (isset($_GET['action'])) {
    $ajax->run($_GET['action']);
} else {
    echo json_encode( array(
        "message" => "No action provided.",
    ));
}
class index
{
    public function run($aktion)
    {
        $this->$aktion();
    }
    function help(){

    }
}
