<?php
session_start();
$_SESSION["attempts"] = [];
header('Location: ../index.php');
