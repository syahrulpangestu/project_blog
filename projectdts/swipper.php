  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper col-md-12">
    <?php 
    $data = mysqli_query($conn, "SELECT * FROM blog LEFT JOIN author USING (author_id)");
    while($tampil = mysqli_fetch_array($data)){
    ?>
     <div class="swiper-slide col-md-4">
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
    <?php }?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>

