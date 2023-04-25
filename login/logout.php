<?php
include "funcs.php";
session_start();
session_destroy();
redirect_to("index.php");
?>