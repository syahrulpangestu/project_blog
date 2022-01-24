<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <a href="index.php?action=list" class="btn btn-primary">Back to List</a>
              </div>
              <!-- /.card-header -->
              <?php 
                    include "../config.php";
                    $idblog = $_GET['ecd'];
                    $data = mysqli_query($conn, "SELECT * FROM blog LEFT JOIN author USING (author_id) LEFT JOIN kategori USING (kategori_id) where blog_id = $idblog");
                    $row = mysqli_fetch_assoc($data);
                    $judul = $row['judul'];
                    $kategori_name = $row['kateg_name'];
                    $kategori_id = $row['kategori_id'];
                    $headline = $row['headline'];
                    $image = $row['img'];
                    $konten = $row['content'];
              ?>
              <form action="../function.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <span>Title</span>
                  <input type="hidden" name="idblog" id="" value="<?php echo $idblog ?>">
                  <input class="form-control" name="title" value="<?php echo $judul ?>" placeholder="Title">
                  <input type="hidden" name="authorid" value="<?php echo $_SESSION['author_id'];?>">
                </div>
                <div class="form-group">
                  <span>Image</span>
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input type="file" value="<?php echo $image ?>" name="img">
                  </div>
                  <img style="width:10em" src="http://localhost/digitalent/projectdts/img/<?php echo $image ?>" alt="" srcset="">
                </div>
                <div class="form-group">
                  <span>Category</span>
                  <select name="kategori" class="custom-select">
                  <option>Open this select menu</option>
                  <?php 
                    $querycat = mysqli_query($conn, "SELECT * FROM kategori");
                    while($tampil = mysqli_fetch_array($querycat)){
                        if($tampil['kategori_id'] == $kategori_id){ $selected = "selected"; }else{ $selected=""; }                    
                    ?>
                    <option value="<?php echo $tampil['kategori_id']; ?>" <?php echo $selected; ?>><?php echo $tampil['kateg_name']; ?></option>
                    <?php } ?>
                  </select>
                </div>                
                <div class="form-group">
                  <span>Headline</span>
                  <input class="form-control" name="headline" value="<?php echo $headline ?>" placeholder="Headline">
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" name="konten" class="form-control" style="height: 300px"><?php echo $konten ?></textarea>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <input type="submit" name="edit" class="btn btn-primary">
                </div>
              </div>
              </form>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
