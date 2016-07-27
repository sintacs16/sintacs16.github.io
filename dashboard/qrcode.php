<?php 

require "../../includes/phpqrcode/qrlib.php";

QRcode::png($_GET['id']);

?>