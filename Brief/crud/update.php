<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title>Modify Player</title>
</head>
<body>
<?php
include_once '../connexion/Database.php';
include_once 'Player.php';

$database = new Database();
$db = $database->getConnection();

$player = new Player($db);

if (isset($_GET['id'])) {
    $player->id = $_GET['id'];
    $result = $player->readOne(); 

    if ($result) {
        $name = $result['name'];
        $club = $result['club'];
        $nationality = $result['nationality'];
        $rating = $result['rating'];
        $position = $result['position'];
    } else {
        echo "<p class='text-red-500'>Player not found!</p>";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $player->name = $_POST['name'];
    $player->club = $_POST['club'];
    $player->nationality = $_POST['nationality'];
    $player->rating = $_POST['rating'];
    $player->position = $_POST['position'];

    if ($player->update()) {
        echo "<p class='text-green-500'>Player updated successfully!</p>";
        header("Location: ../players.php"); 
        exit();
    } else {
        echo "<p class='text-red-500'>Error updating player!</p>";
    }
}
?>
<div class="max-w-4xl mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Modify Player</h2>

    <form action="" method="POST">
        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-600 font-medium">Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" class="mt-2 p-2 w-full border border-gray-300 rounded-lg" required>
        </div>

        <!-- Club -->
        <div class="mb-4">
            <label for="club" class="block text-gray-600 font-medium">Club</label>
            <input type="text" id="club" name="club" value="<?php echo htmlspecialchars($club); ?>" class="mt-2 p-2 w-full border border-gray-300 rounded-lg" required>
        </div>

        <!-- Nationality -->
        <div class="mb-4">
            <label for="nationality" class="block text-gray-600 font-medium">Nationality</label>
            <input type="text" id="nationality" name="nationality" value="<?php echo htmlspecialchars($nationality); ?>" class="mt-2 p-2 w-full border border-gray-300 rounded-lg" required>
        </div>

        <!-- Rating -->
        <div class="mb-4">
            <label for="rating" class="block text-gray-600 font-medium">Rating</label>
            <input type="number" id="rating" name="rating" value="<?php echo htmlspecialchars($rating); ?>" class="mt-2 p-2 w-full border border-gray-300 rounded-lg" required>
        </div>

        <!-- Position -->
        <div class="mb-4">
            <label for="position" class="block text-gray-600 font-medium">Position</label>
            <select id="position" name="position" class="mt-2 p-2 w-full border border-gray-300 rounded-lg" required>
                <option value="GK" <?php echo $position == 'GK' ? 'selected' : ''; ?>>Goalkeeper (GK)</option>
                <option value="LB" <?php echo $position == 'LB' ? 'selected' : ''; ?>>Left Back (LB)</option>
                <option value="CBL" <?php echo $position == 'CBL' ? 'selected' : ''; ?>>Center Back Left (CBL)</option>
                <option value="CBR" <?php echo $position == 'CBR' ? 'selected' : ''; ?>>Center Back Right (CBR)</option>
                <option value="RB" <?php echo $position == 'RB' ? 'selected' : ''; ?>>Right Back (RB)</option>
                <option value="CML" <?php echo $position == 'CML' ? 'selected' : ''; ?>>Central Midfield Left (CML)</option>
                <option value="DMF" <?php echo $position == 'DMF' ? 'selected' : ''; ?>>Defensive Midfielder (DMF)</option>
                <option value="CMR" <?php echo $position == 'CMR' ? 'selected' : ''; ?>>Central Midfield Right (CMR)</option>
                <option value="LW" <?php echo $position == 'LW' ? 'selected' : ''; ?>>Left Wing (LW)</option>
                <option value="ST" <?php echo $position == 'ST' ? 'selected' : ''; ?>>Striker (ST)</option>
                <option value="RW" <?php echo $position == 'RW' ? 'selected' : ''; ?>>Right Wing (RW)</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
            <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded-lg hover:bg-blue-600">Modifier</button>
        </div>
    </form>
</div>
</body>
</html>
