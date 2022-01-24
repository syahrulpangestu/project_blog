<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>    
    <title>Document</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">MaBlog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" href="#">News</a>
            </li> -->
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="navbar-nav">
          <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
        </ul>
        </div>
    </nav>
    </header>
    
<div class="container-fluid">
    <div class="row" style="margin:3em;margin-top:5em;">
        <!-- <section> -->
            <div class="col-md-2 card" style="border-radius: 20px;border:#000 1px solid;margin-right:30px;height:100%">
                <aside id="sidebar">
                    <div class="card-rounded white-box">
                    <h4 style="margin-top:5px">Recent Category</h4>
                    <ul>
                        <?php 
                                    include "config.php";
                            $kate = mysqli_query($conn, "SELECT * FROM kategori");
                            while($gori = mysqli_fetch_array($kate)){
                        ?>	
                        <a style="color: grey" href="detail-kategori.php?kat=<?=$gori['kategori_id'];?>"><li><?=$gori['kateg_name'];?></li></a>
                        <?php
                        }
                        ?>
                    </ul>			
                    </div>
                </aside>
            </div>
            <!-- <div>		 -->
            <div class="col-md-9" style="border-radius: 20px;border:#000 1px solid;overflow: hidden;padding:10px">
                <?php
            // $authorid = $_SESSION['author_id'];
            $idkat = $_GET['kat'];
            $data = mysqli_query($conn, "SELECT * FROM blog LEFT JOIN author USING (author_id) LEFT JOIN kategori USING (kategori_id) where kategori_id = $idkat");
            while($tampil = mysqli_fetch_array($data)){            
        ?>
                    <div class="col-xs-4">
                        <a href="detail.php?pas=<?php echo $tampil['blog_id']; ?>" style="text-decoration:none">
                            <div class="card" style="border-radius: 20px;border:#000 1px solid;overflow: hidden;">
                                <img src="http://localhost/digitalent/projectdts/img/<?php echo $tampil['img']; ?>" class="card-img-top" alt="..." style="width: 100%;">
                                <div class="card-body" style="padding-left:5px;color:black;">
                                    <p class="card-text"><b><?php echo $tampil['judul']; ?></b></p>
                                    <p class="card-text"><?php echo $tampil['content']; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="clearfix"></div>
                </div>
            <!-- </div> -->
        <!-- </section> -->
    </div>
</div>
<?php include "footer.php"; ?>    
</body>
</html>