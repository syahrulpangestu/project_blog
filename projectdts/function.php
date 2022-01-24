<?php
session_start();
include "config.php";

function register($conn){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($nama) && !empty($username) && !empty($password)){
        $sql = "INSERT INTO author (author_id, name, username, password) VALUES('', '".$nama."', '".$username."', '".$password."')";
        $simpan = mysqli_query($conn, $sql);
        header('location: register.php?pesan=berhasil');
        // echo "<script type='text/javascript'>alert('$pesan');</script>";
    }else{
        header('location: register.php?pesan=gagal');
    }
}

function login($conn){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT username, author_id, name, password FROM author WHERE username ='$username' and password='$password'";
    $find = mysqli_query($conn, $sql);
    while($tampil = mysqli_fetch_array($find)){
        $authid = $tampil['author_id'];
        $name = $tampil['name'];
    }    
    $cek = mysqli_num_rows($find);

    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['name'] = $name;
        $_SESSION['author_id'] = $authid;
        $_SESSION['status'] = "login";
        // echo $_SESSION['username'];
        // die();
        header('location: login.php?pesan=berhasil');
    } else{
        header('location: login.php?pesan=gagal');
    }
}

function create($conn){
    $judul = $_POST['title'];
    $headline = $_POST['headline'];
    $konten = $_POST['konten'];
    $authorid = $_POST['authorid'];
    $kategori = $_POST['kategori'];    
    $date = date("Y-m-d H:i:s");
    // echo $date;
    // echo $headline;
    // echo $konten;
    // echo $authorid;
    // echo $kategori;

    $nama = $_FILES['img']['name'];
    $file_tmp = $_FILES['img']['tmp_name'];
    // echo $nama;
    // die();
    // if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($file_tmp != ""){			
            move_uploaded_file($file_tmp, "img/$nama");
            mysqli_query($conn,"INSERT INTO blog (judul,headline,date,content,img,author_id,kategori_id) VALUES ('$judul','$headline','$date','$konten','$nama','$authorid','$kategori')");
            // if (!$result) {
            //     die('Query Error : '.mysqli_errno($conn). 
            //     ' - '.mysqli_error($conn));
            //  }
        header("location:template/index.php?action=list");
        }else{
            echo "Ra mashok";
        }
    // }else{
    //     echo "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN";
    // }
}

function update($conn){
    $idblog = $_POST['idblog'];
    $judul = $_POST['title'];
    $headline = $_POST['headline'];
    $konten = $_POST['konten'];
    $authorid = $_POST['authorid'];
    $kategori_id = $_POST['kategori'];
    $date = date("Y-m-d H:i:s");
    $image = $_FILES['img']['name'];
    $image_tmp = $_FILES['img']['tmp_name'];  
    
    // echo $image;
    // echo $image_tmp;    
    // die();
    if($image_tmp != "")
    {
        move_uploaded_file($image_tmp , "img/$image");
        $update="UPDATE blog SET judul='$judul', headline='$headline', date='$date', content='$konten', img='$image',
        author_id='$authorid',  kategori_id='$kategori_id' WHERE blog_id = $idblog";
        mysqli_query($conn, $update);   
        header("location:template/index.php?action=edit&ecd=$idblog");
    }else{
        $update="UPDATE blog SET judul='$judul', headline='$headline', date='$date', content='$konten',
        author_id='$authorid',  kategori_id='$kategori_id' WHERE blog_id = $idblog";
        mysqli_query($conn, $update);
        header("location:template/index.php?action=edit&ecd=$idblog");
    }
}

if(isset($_POST['register'])){
   $register = register($conn);
   return $register;
}

if(isset($_POST['login'])){
    $login = login($conn);
    return $login; 
}

if(isset($_POST['create'])){
    $create = create($conn);
    return $create;
}

if(isset($_POST['edit'])){
    $update = update($conn);
    return $update;
}
?>