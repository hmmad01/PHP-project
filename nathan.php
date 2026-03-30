<?php
// Menggunakan Class dan Object untuk mendapatkan nilai tambah
class UserProfile {
    public $firstname;
    public $lastname;
    public $phone;
    public $address;

    // Constructor untuk menginisialisasi data
    public function __construct($first, $last, $phone, $address) {
        $this->firstname = htmlspecialchars($first);
        $this->lastname = htmlspecialchars($last);
        $this->phone = htmlspecialchars($phone);
        $this->address = htmlspecialchars($address);
    }

    // Method untuk menampilkan hasil inputan
    public function displayProfile() {
        echo "<div style='margin-top: 20px; font-family: sans-serif;'>";
        echo "<b>Hi, my name is " . $this->firstname . " " . $this->lastname . "</b><br>";
        echo "<b>Phone Number : " . $this->phone . "</b><br>";
        echo "<b>Address : " . $this->address . "</b><br>";
        echo "<a href='' style='font-size: 12px; color: gray; text-decoration: none; margin-top: 10px; display: inline-block;'>Reset</a>";
        echo "</div>";
    }
}

$isSubmitted = false;
$user = null;

// Mengecek apakah form sudah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Membuat object baru dari class UserProfile
    $user = new UserProfile($_POST['firstname'], $_POST['lastname'], $_POST['phone'], $_POST['address']);
    $isSubmitted = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Form Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f9;
            margin: 0;
        }
        .form-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #4a90e2; /* Warna biru mirip di contoh */
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #357abd;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <form method="POST" action="">
            <input type="text" name="firstname" placeholder="Firstname" required>
            <input type="text" name="lastname" placeholder="Lastname" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <textarea name="address" placeholder="Address" rows="4" required></textarea>
            <button type="submit">Submit</button>
        </form>

        <?php 
        if ($isSubmitted && $user != null) {
            $user->displayProfile(); 
        }
        ?>
    </div>

</body>
</html>