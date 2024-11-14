<?php
session_start();
require_once 'utils/isSession.php';

if (isSession()) {
    header('Location: ./product.php');
} else {    
    header('Location: ./login.php');
}
exit();
