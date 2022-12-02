<?php
session_start();
session_regenerate_id(FALSE);
session_unset();
header("Location: index.php");
