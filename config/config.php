<?php

//déginir les infos de connexion

const DB_HOST = "localhost:3306"; //const DB_PORT = 3306
const DB_NAME = "db_cinema";
const DB_USER = "root";
const DB_PASSWORD = "";

//connexion a la BDD
$connexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
    DB_USER, DB_PASSWORD);
