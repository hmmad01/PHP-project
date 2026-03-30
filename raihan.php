<?php
// Class untuk memproses data (Tetap menggunakan OOP untuk nilai tambah)
class UserProfile {
    public $firstName;
    public $lastName;
    public $phoneNumber;
    public $address;

    public function __construct($firstName, $lastName, $phoneNumber, $address) {
        $this->firstName = htmlspecialchars($firstName);
        $this->lastName = htmlspecialchars($lastName);
        $this->phoneNumber = htmlspecialchars($phoneNumber);
        $this->address = htmlspecialchars($address);
    }

    public function getFullName() {
        return $this->firstName . " " . $this->lastName;
    }
}

$user = null; 

// Logic PHP: Mengecek apakah form sudah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new UserProfile(
        $_POST['firstname'], 
        $_POST['lastname'], 
        $_POST['phone'], 
        $_POST['address']
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sederhana PBO</title>
    <style>
        /* CSS yang disesuaikan agar mirip persis dengan gambar referensi */
        body { 
            font-family: Arial, sans-serif; 
            display: flex; 
            justify-content: center; 
            padding-top: 60px; 
            background-color: #ffffff; /* Background putih polos */
        }
        .container { 
            width: 550px; /* Lebar kontainer disesuaikan proporsi layar */
        }
        .form-group { 
            margin-bottom: 12px; 
        }
        .form-group input, .form-group textarea { 
            width: 100%; 
            padding: 12px 15px; 
            border: 1px solid #e0e0e0; /* Border abu-abu tipis */
            border-radius: 4px; 
            box-sizing: border-box; 
            font-family: Arial, sans-serif;
            font-size: 13px;
        }
        .form-group input::placeholder, .form-group textarea::placeholder {
            color: #999;
        }
        .btn-submit { 
            background-color: #559ff3; /* Biru muda mirip di gambar */
            color: white; 
            border: none; 
            padding: 8px 35px; 
            border-radius: 20px; /* Bentuk pill/oval */
            cursor: pointer; 
            display: block; 
            margin: 25px auto; /* Posisi persis di tengah */
            font-size: 13px;
        }
        .btn-submit:hover { 
            background-color: #3b87db; 
        }
        .result-container { 
            margin-top: 15px; 
            font-size: 13px; 
            color: #000; 
            line-height: 1.8; 
        }
        .btn-reset { 
            color: #666; 
            text-decoration: none; 
            font-size: 11px; 
            display: block;
            margin-top: 5px;
        }
        .btn-reset:hover { 
            text-decoration: underline; 
            color: #000;
        }
    </style>
</head>
<body>

<div class="container">
    <form method="POST" action="">
        <div class="form-group">
            <input type="text" name="firstname" placeholder="Firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" required>
        </div>
        <div class="form-group">
            <input type="text" name="lastname" placeholder="Lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required>
        </div>
        <div class="form-group">
            <input type="text" name="phone" placeholder="Phone Number" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>" required>
        </div>
        <div class="form-group">
            <textarea name="address" placeholder="Address" rows="4" required><?= isset($_POST['address']) ? $_POST['address'] : '' ?></textarea>
        </div>
        <button type="submit" class="btn-submit">Submit</button>
    </form>

    <?php if ($user != null): ?>
        <div class="result-container">
            Hi, my name is <?= $user->getFullName() ?><br>
            Phone Number : <?= $user->phoneNumber ?><br>
            Address : <?= $user->address ?><br>
            <a href="index.php" class="btn-reset">Reset</a> 
        </div>
    <?php endif; ?>
</div>

</body>
</html>