<?php
session_start();

session_destroy();

header("Location: /Portfolio/index.php");
// die;