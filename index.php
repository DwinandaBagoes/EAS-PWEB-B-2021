<?php 
 
include 'config.php';
 
error_reporting(0);
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_SESSION['username'])) {
    header("location:dashboard.php");
}
 
if (isset($_POST['submit'])) {
    $sql = "SELECT * FROM akun WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $cek = mysqli_num_rows($result);
    if ($cek > 0) {
        $_SESSION['username'] = $username;
        header("location:dashboard.php");
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="css/styles.css">
 
    <title>Sekolahku</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Sekolahku Login</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
        </form>
    </div>
</body>
</html>