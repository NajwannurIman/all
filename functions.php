<?php

//koneksi ke database
$conn = mysqli_connect("localhost","root","","coffee_shop");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[]= $row;
    }
    return $rows;
}

function registrasi($data){
    global $conn;
    
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $repass = mysqli_real_escape_string($conn,$data["re_pass"]);

    // //cek username sudah ada atau belum
    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script> 
            alert('username sudah ada')
                </script>";
        return false;
    }

    // cek konfirmasi password
    if($password !== $repass){
        echo "<script>
            alert('Password Tidak Sesuai!')
                </script>";
        return false;
    }
    //enkripsi password
    
    //tambahkan user baru kedata base
    mysqli_query($conn,"INSERT INTO user VALUE('','$username','$password') ");

    return mysqli_affected_rows($conn);

}

if(isset($_POST['tambahpelanggan'])){
    $nama=$_POST['nama'];
    $insert= mysqli_query($conn,"INSERT INTO pelanggan values (null,'$nama')");
}
if(isset($_POST['tampen'])){
    $menu=$_POST['menu'];
    $namapel=$_POST['namapel'];
    $insert = mysqli_query($conn,"INSERT INTO pesanan(nama_pelanggan,id_menu) values ('$namapel','$menu')");
}
function hapus($id){
    global $conn;
    
    mysqli_query($conn,"DELETE FROM pesanan WHERE id_pesanan=$id");
    return mysqli_affected_rows($conn);
}
?>