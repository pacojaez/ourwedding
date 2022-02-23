<?php
  $host_name = 'db5006723659.hosting-data.io';
  $database = 'dbs5563569';
  $user_name = 'dbu2164955';
  $password = 'Asiotus1&Tytoalba68$';

  $link = new mysqli($host_name, $user_name, $password, $database);

  if ($link->connect_error) {
    die('<p>Error al conectar con servidor MySQL: '. $link->connect_error .'</p>');
  } else {
    echo '<p>Se ha establecido la conexión al servidor MySQL con éxito.</p>';
  }
