<?php

$sqliteFile = $_SERVER['DOCUMENT_ROOT'].'/test.db';

if (!file_exists($sqliteFile))
    throw new PDOException("DB file '".$sqliteFile."' doesn't exist");

// Variable contenant le DSN de la BDD SQLite
$SQL_DSN = 'sqlite:'.$sqliteFile;
