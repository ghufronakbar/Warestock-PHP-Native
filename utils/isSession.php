<?php
function isSession(): bool
{
    return isset($_SESSION['username']);
}
