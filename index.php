<?php
    require __DIR__ .'/controller/koneksi.php';
    require __DIR__ .'/controller/userclass.php';

    $userclass = new userclass($conn);
?>
<!DOCTYPE html>
<html>
<head>
        <title>HOME</title>
        <link rel="stylesheet" href="css/index.css" type="text/css">
</head>
<body>
    <div class="head">
        <nav class="navigasi">
            <p>HALLO EVERYONE</p>
                <ul>
                    <li>LOGIN</li>
                    <li>REGISTRASI</li>
                </ul>
        </nav>
    </div>
    <div class="content">

    </div>
    <div class="footer">

    </div>
</body>
</html>