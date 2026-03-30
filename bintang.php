<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input PHP</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #f8f9fa; display: flex; justify-content: center; padding-top: 50px; }
        .container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); width: 100%; max-width: 450px; }
        input, textarea { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-size: 14px; }
        textarea { resize: vertical; min-height: 100px; }
        button { width: 100%; background-color: #4a90e2; color: white; padding: 10px; border: none; border-radius: 20px; cursor: pointer; font-size: 14px; margin-top: 10px; transition: 0.2s; }
        button:hover { background-color: #357abd; }
        .output-box { margin-top: 20px; font-size: 14px; line-height: 1.6; color: #333; }
        .reset-btn { display: inline-block; margin-top: 10px; color: #666; text-decoration: none; font-size: 12px; }
        .reset-btn:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <form method="POST" action="">
        <input type="text" name="firstname" placeholder="Firstname" required>
        <input type="text" name="lastname" placeholder="Lastname" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <textarea name="address" placeholder="Address" required></textarea>
        <div style="text-align: center;">
            <button type="submit" name="proses">Submit</button>
        </div>
    </form>

    <?php
    class FormHandler {
        private $fname;
        private $lname;
        private $phone;
        private $address;

        public function __construct($f, $l, $p, $a) {
            $this->fname = htmlspecialchars($f);
            $this->lname = htmlspecialchars($l);
            $this->phone = htmlspecialchars($p);
            $this->address = htmlspecialchars($a);
        }

        public function render() {
            echo "<div class='output-box'>";
            echo "Hi, my name is " . $this->fname . " " . $this->lname . "<br>";
            echo "Phone Number : " . $this->phone . "<br>";
            echo "Address : " . $this->address . "<br>";
            echo "<a href='' class='reset-btn'>Reset</a>";
            echo "</div>";
        }
    }

    if (isset($_POST['proses'])) {
        $display = new FormHandler($_POST['firstname'], $_POST['lastname'], $_POST['phone'], $_POST['address']);
        $display->render();
    }
    ?>
</div>

</body>
</html>