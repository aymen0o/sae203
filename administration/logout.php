<?php
session_start();
session_destroy(); // On déchire le bracelet VIP
header("Location: ../index.php");
exit();
?>