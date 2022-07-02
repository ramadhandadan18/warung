<script>
    window.location = "login.php";
</script>

<!-- ?php

session_start();
if (!isset($_SESSION["users"])) header("Location: login.php");
? -->

<!-- ?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php'); 
} else { 
   $username = $_SESSION['username']; 
}
?> -->