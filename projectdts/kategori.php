  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper col-md-12">
    <?php 
    $data = mysqli_query($conn, "SELECT * FROM kategori");
    while($tampil = mysqli_fetch_array($data)){
    ?>
     <div class="swiper-slide col-sm-2">
     <a href="detail-kategori.php?kat=<?php echo $tampil['kategori_id']; ?>" style="text-decoration:none">
        <div class="card" style="border-radius: 20px;border:#000 1px solid;overflow: hidden;">
            <div class="card-body" style="padding-left:5px;color:black;text-align:center">
                <p class="card-text"><?php echo $tampil['kateg_name']; ?></p>
            </div>
        </div>
        </a>
      </div>
    <?php }?>

    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>

