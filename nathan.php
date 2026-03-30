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
        echo "<div style='margin-top: 30px; font-family: Arial, sans-serif; font-size: 13px; line-height: 1.6;'>";
        echo "Hi, my name is " . $this->firstname . " " . $this->lastname . "<br>";
        echo "Phone Number : " . $this->phone . "<br>";
        echo "Address : " . $this->address . "<br>";
        echo "<a href='' style='font-size: 10px; color: gray; text-decoration: none; margin-top: 10px; display: inline-block;'>Reset</a>";
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
            background-color: #ffffff; /* Ubah ke putih bersih seperti di layar macbook */
            margin: 0;
        }
        .form-container {
            width: 100%;
            max-width: 600px; /* Diperlebar agar proporsinya mirip gambar */
            padding: 20px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #dcdcdc;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 13px;
        }
        textarea {
            resize: vertical;
        }
        /* Container baru untuk menengahkan button */
        .button-container {
            text-align: center;
            margin-top: 10px;
        }
        button {
            padding: 8px 30px; /* Membuat bentuknya seperti pil kecil */
            background-color: #5b9bd5; /* Warna biru sesuai modul */
            color: white;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            font-size: 13px;
        }
        button:hover {
            background-color: #4a84bc;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <form method="POST" action="">
            <input type="text" name="firstname" placeholder="Firstname" value="<?= isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '' ?>" required>
            
            <input type="text" name="lastname" placeholder="Lastname" value="<?= isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '' ?>" required>
            
            <input type="text" name="phone" placeholder="Phone Number" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>" required>
            
            <textarea name="address" placeholder="Address" rows="4" required><?= isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '' ?></textarea>
            
            <div class="button-container">
                <button type="submit">Submit</button>
            </div>
        </form>

        <?php 
        // Menampilkan output di bawah form jika tombol submit sudah ditekan
        if ($isSubmitted && $user != null) {
            $user->displayProfile(); 
        }
        ?>
    </div>

</body>
</html>