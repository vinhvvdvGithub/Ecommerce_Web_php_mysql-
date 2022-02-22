<?php
    session_start();
    session_unset();
    header("location:../mobile/index.php");