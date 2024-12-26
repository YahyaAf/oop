<?php
include_once './connexion/Database.php';
include_once './crud/Player.php';

$database = new Database();
$db = $database->getConnection();

$player = new Player($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $player->name = $_POST['name'];
    $player->club = $_POST['club'];
    $player->nationality = $_POST['nationality'];
    $player->rating = $_POST['rating'];
    $player->position = $_POST['position'];

    if ($player->create()) {
        echo "Player was created successfully!";
    } else {
        echo "Error creating player.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="max-w-4xl mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Player Form</h2>

    <form action="" method="POST">
        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-600 font-medium">Name</label>
            <input type="text" id="name" name="name" class="mt-2 p-2 w-full border border-gray-300 rounded-lg" required>
        </div>

        <!-- Club -->
        <div class="mb-4">
            <label for="club" class="block text-gray-600 font-medium">Club</label>
            <input type="text" id="club" name="club" class="mt-2 p-2 w-full border border-gray-300 rounded-lg" required>
        </div>

        <!-- Nationality -->
        <div class="mb-4">
            <label for="nationality" class="block text-gray-600 font-medium">Nationality</label>
            <input type="text" id="nationality" name="nationality" class="mt-2 p-2 w-full border border-gray-300 rounded-lg" required>
        </div>

        <!-- Rating -->
        <div class="mb-4">
            <label for="rating" class="block text-gray-600 font-medium">Rating</label>
            <input type="number" id="rating" name="rating" class="mt-2 p-2 w-full border border-gray-300 rounded-lg" required>
        </div>

        <!-- Position -->
        <div class="mb-4">
            <label for="position" class="block text-gray-600 font-medium">Position</label>
            <select id="position" name="position" class="mt-2 p-2 w-full border border-gray-300 rounded-lg" required>
                <option value="GK">Goalkeeper (GK)</option>
                <option value="LB">Left Back (LB)</option>
                <option value="CBL">Center Back Left (CBL)</option>
                <option value="CBR">Center Back Right (CBR)</option>
                <option value="RB">Right Back (RB)</option>
                <option value="CML">Central Midfield Left (CML)</option>
                <option value="DMF">Defensive Midfielder (DMF)</option>
                <option value="CMR">Central Midfield Right (CMR)</option>
                <option value="LW">Left Wing (LW)</option>
                <option value="ST">Striker (ST)</option>
                <option value="RW">Right Wing (RW)</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Submit</button>
        </div>
    </form>
</div>

</body>
</html>
