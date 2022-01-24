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
              <form action="../function.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <span>Title</span>
                  <input class="form-control" name="title" placeholder="Title">
                  <input type="hidden" name="authorid" value="<?php echo $_SESSION['author_id'];?>">
                </div>
                <div class="form-group">
                  <span>Image</span>
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input type="file" name="img">
                  </div>
                </div>
                <div class="form-group">
                  <span>Category</span>
                  <select name="kategori" class="custom-select">
                  <option selected>Open this select menu</option>
                  <?php 
                    include "../config.php";
                    $querycat = mysqli_query($conn, "SELECT * FROM kategori");
                    while($tampil = mysqli_fetch_array($querycat)){                    
                    ?>
                    <option value="<?php echo $tampil['kategori_id']; ?>"><?php echo $tampil['kateg_name']; ?></option>
                    <?php } ?>
                  </select>
                </div>                                
                <div class="form-group">
                  <span>Headline</span>
                  <input class="form-control" name="headline" placeholder="Headline">
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" name="konten" class="form-control" style="height: 300px"></textarea>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <input type="submit" name="create" class="btn btn-primary">
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
