<?php
/*
Author: Dipankar Mohanta
Website: http://www.dipankarmohanta.com/
*/

session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: login"); // Redirecting To Home Page
}
?>