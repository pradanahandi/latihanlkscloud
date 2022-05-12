<?php
@session_start();
session_unset();
session_destroy();
?>
<script language="JavaScript">
 		alert("Anda Yakin Akan Keluar ?");
 		document.location.href="login.php";
 </script>