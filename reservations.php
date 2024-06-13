<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guest_id = $_POST['guest_id'];
    $room = $_POST['room'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $stmt = $conn->prepare("INSERT INTO reservations (guest_id, room, check_in, check_out) VALUES (:guest_id, :room, :check_in, :check_out)");
    $stmt->bindParam(':guest_id', $guest_id);
    $stmt->bindParam(':room', $room);
    $stmt->bindParam(':check_in', $check_in);
    $stmt->bindParam(':check_out', $check_out);
    $stmt->execute();
    header("Location: reservations.php");
}

$stmt = $conn->prepare("SELECT reservations.*, guests.name AS guest_name FROM reservations JOIN guests ON reservations.guest_id = guests.id");
$stmt->execute();
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'templates/header.php'; ?>
<h1>Reservations</h1>
<form method="post" action="reservations.php">
    <input type="number" name="guest_id" placeholder="Guest ID" required>
    <input type="text" name="room" placeholder="Room" required>
    <input type="date" name="check_in" placeholder="Check-In Date" required>
    <input type="date" name="check_out" placeholder="Check-Out Date" required>
    <button type="submit">Add Reservation</button>
</form>
<h2>Reservation List</h2>
<ul>
    <?php foreach ($reservations as $reservation): ?>
        <li><?php echo $reservation['guest_name']; ?> - Room: <?php echo $reservation['room']; ?> - Check-In: <?php echo $reservation['check_in']; ?> - Check-Out: <?php echo $reservation['check_out']; ?></li>
    <?php endforeach; ?>
</ul>
<?php include 'templates/footer.php'; ?>
