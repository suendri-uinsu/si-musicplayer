<?php

// Config
require_once "inc/config.php";

$_SESSION = [];
session_destroy();

redirect("index.php");
