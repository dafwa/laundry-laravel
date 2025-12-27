<?php
    include 'connect.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
  
    $registrasi = "INSERT INTO user(username, password, alamat, no_telp) VALUES ('$username','$password','$alamat','$no_telp')";
  
    $cek_no_telp = "SELECT no_telp FROM user WHERE no_telp='$no_telp' LIMIT 1";
    $cek_no_telp_run = mysqli_query($mysqli, $cek_no_telp);

    if(mysqli_num_rows($cek_no_telp_run) > 0){
        header("Location: index.php?hasil=Nomor Telepon tersebut sudah ada!#login-form");
        exit(0);
    }else if($mysqli->query($registrasi) === true) {
        header("Location: index.php?hasil=Data anda berhasil diregistrasi!#login-form");
    } else {
        echo "Error: " . $registrasi . "<br>" . $mysqli->error;
    }
?>