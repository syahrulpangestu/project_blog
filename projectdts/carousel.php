    <!-- carousel -->
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <?php 
        $data = mysqli_query($conn, "SELECT * FROM blog LEFT JOIN author USING (author_id)");
        // $tampil = mysqli_fetch_array($data) or die(mysqli_error());
        $i = 0;
        while ($tampil = mysqli_fetch_array($data)) {
            $actives = '';
            if($i==0){
                $actives = 'active';
            }
    ?>
    <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $i;?>" class="<?php echo $actives;?>"></li>
    <?php $i++; }?>
    </ol>        
    <div class="carousel-inner">
    <?php 
        $data = mysqli_query($conn, "SELECT * FROM blog LEFT JOIN author USING (author_id)");
        // $tampil = mysqli_fetch_array($data) or die(mysqli_error());
        $i = 0;
        while ($tampil = mysqli_fetch_array($data)) {
            $actives = '';
            if($i==0){
                $actives = 'active';
            }
    ?>
        <div class="carousel-item <?php echo $actives;?>">
        <img src="http://localhost/digitalent/projectdts/img/<?php echo $tampil['img']; ?>" width="100%" height="800" class="d-block w-100" alt="...">
        <a href="detail.php?pas=<?php echo $tampil['blog_id']; ?>">
        <div class="carousel-caption">
            <h1><?php echo $tampil['judul']; ?></h1>
        </div>
        </a>
        </div>
        <?php $i++; }?>
        <!-- <div class="carousel-item">
        <img src="blink-cover.JPG" class="d-block w-100" alt="...">
        <div class="carousel-caption">
            <h1>LILILIL</h1>
        </div>
        </div>
        <div class="carousel-item">
        <img src="blink-cover.JPG" class="d-block w-100" alt="...">
        <div class="carousel-caption">
            <h1>LULULUL</h1>
        </div>
        </div> -->
    </div>
    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
    <!-- endcarousel -->