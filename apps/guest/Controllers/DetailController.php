<?php
require_once('../model/detail.php');

class DetailController {
    var $detail_model;
    public function __construct()
    {
       $this->detail_model = new Detail();
    }

    function list() {
        $id = $_GET['id'];
        $data = $this->detail_model->detail_book($id);
        require_once('../view/index.php');
    }
}
?>