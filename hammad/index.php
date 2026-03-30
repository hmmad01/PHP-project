<!DOCTYPE html>
<html>
<head>
    <title>Form Input</title>
    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            background: #4da6ff;
            border: none;
            color: white;
            border-radius: 20px;
            cursor: pointer;
        }
        .hasil {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <form method="POST">
        <input type="text" name="firstname" placeholder="Firstname" required>
        <input type="text" name="lastname" placeholder="Lastname" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <textarea name="address" placeholder="Address" required></textarea>
        <button type="submit" name="submit">Submit</button>
    </form>

    <div class="hasil">
        <?php
        if(isset($_POST['submit'])){
            include "proses.php";

            $data = new Data(
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['phone'],
                $_POST['address']
            );

            echo $data->tampil();
        }
        ?>
    </div>
</div>

</body>
</html>