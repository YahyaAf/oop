<?php
include_once './connexion/Database.php';
include_once './crud/Crud.php';


$database = new Database("players");
$db = $database->getConnection();


$player = new CRUD($db, "players");


// $player->fields = [
//     "name" => "Yahya",
//     "club" => "OCS",
//     "nationality" => "Morroco",
//     "rating" => 94,
//     "position" => "RW"
// ];
// $player->create();


$players = $player->read();
foreach ($players as $row) {
    print_r($row);
}


// $player->id = 24;
// $player->fields = [
//     "name" => "Maradona",
//     "club" => "died",
//     "nationality" => "Argentina",
//     "rating" => 92,
//     "position" => "ST"
// ];
// $player->update();



// $player->id = 23;
// $player->delete();

