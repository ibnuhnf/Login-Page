<?php
    include "service/database.php";

    $register_message = "";

    if(isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hash_password = hash("sha256", $password);

        try {
            $sql = "INSERT INTO users (username, password) VALUES
        ('$username', '$hash_password')";

        if($db->query($sql)) {
            $register_message = "daftar akun berhasil";
        }
        else {
            $register_message = "daftar akun gagal,silahkan coba lagi";
        }
        }catch (mysqli_sql_exception) {
            $register_message = "username sudah digunakan";
        }
        $db->close();
        
        
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>

    <div class="wrapper">
    <h3>Daftar Akun</h3>
    <i><?= $register_message ?></i>
    <form actiom="register.php" method="POST">
    <div class="up">
    <div class="input-box">
            <input type="text" placeholder="username" name="username" required>
            <i class='bx bxs-user'></i>
        </div>
        <!-- <div class="input-box">
            <input type="email" placeholder="email" name="email" required>
            <i class='bx bxs-lock-alt'></i>
        </div> -->
        <div class="input-box">
            <input type="password" placeholder="password" name="password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>
        </div>   



            <button type="submit" name="register" class="btn" >Buat Akun</button>
            <div class="register-link">
            <p>sudah membuat akun? <a href="login.php">login</a></p>
            </div>
        </form>
</div>

</body>
</html>