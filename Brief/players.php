<?php
include_once './connexion/Database.php';
include_once './crud/Crud.php';


$database = new Database("players");
$db = $database->getConnection();


$player = new CRUD($db, "players");


// $player->fields = [
//     "name" => "Lionel Messi",
//     "club" => "Inter Miami",
//     "nationality" => "Argentina",
//     "rating" => 94,
//     "position" => "RW"
// ];
// $player->create();


$players = $player->read();
foreach ($players as $row) {
    print_r($row);
}


// $player->id = 21;
// $player->fields = [
//     "name" => "Cristiano Ronaldo",
//     "club" => "Al-Nassr",
//     "nationality" => "Portugal",
//     "rating" => 92,
//     "position" => "ST"
// ];
// $player->update();



// $player->id = 23;
// $player->delete();

