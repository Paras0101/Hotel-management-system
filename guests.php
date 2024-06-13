<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $stmt = $conn->prepare("INSERT INTO guests (name, email, phone) VALUES (:name, :email, :phone)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();
    header("Location: guests.php");
}

$stmt = $conn->prepare("SELECT * FROM guests");
$stmt->execute();
$guests = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'templates/header.php'; ?>
<h1>Guests</h1>
<form method="post" action="guests.php">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone" required>
    <button type="submit">Add Guest</button>
</form>
<h2>Guest List</h2>
<ul>
    <?php foreach ($guests as $guest): ?>
        <li><?php echo $guest['name']; ?> - <?php echo $guest['email']; ?> - <?php echo $guest['phone']; ?></li>
    <?php endforeach; ?>
</ul>
<?php include 'templates/footer.php'; ?>
