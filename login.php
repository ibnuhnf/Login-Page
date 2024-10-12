<?php
    include "service/database.php";
    session_start();

    $login_message = "";

    if(isset($_POST['login'])) {
        $username = $_POST ['username'];
        $password = $_POST ['password'];
        $hash_password = hash('sha256', $password);
        
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$hash_password'";
    
        $result = $db->query($sql);

        if($result->num_rows >0) {
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["is_login"] = true;
           
            header("location: dashboard.php");

        }else {
            $login_message ="akun tidak ditemukan";
        }
        $db->close();    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- <?php include "layout/header.html" ?> -->

    <div class="wrapper">
        <div class="logo">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzMJVoKG8DJ8cr2hJuxEzYRuZVJ8o5nJiVXw&s" alt="">
        </div>
    <h3>Login</h3>
    <p><?= $login_message?></p>
    <form actiom="login.php" method="POST">
    <div class="up">
    <div class="input-box">
            <input type="text" placeholder="username" name="username" required>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="password" name="password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>
        </div>   



            <button type="submit" name="login" class="btn" href="/Lumia/">Login</button>
            <div class="register-link">
            <p>don't have an account? <a href="register.php">register Now</a></p>
            </div>
        </form>
</div>

    <!-- <?php include "layout/footer.html" ?> -->
    
</body>
</html>