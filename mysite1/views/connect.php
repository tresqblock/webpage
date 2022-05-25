<?php
$mysqli = new mysqli("localhost","root","","famousactors");
if(!$mysqli){
    die('Error connection');
}