<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
            <a href="index.php?action=create" class="btn btn-primary">Create</a>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Blog">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <!-- <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button> -->
                <!-- <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                </div> -->
                <!-- /.btn-group -->
                <!-- <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button> -->
                <!-- <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                  </div> -->
                  <!-- /.btn-group -->
                <!-- </div> -->
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  <?php 
                  include "../config.php";
                  $authorid = $_SESSION['author_id'];
                  $data = mysqli_query($conn, "SELECT * FROM blog LEFT JOIN author USING (author_id) where author_id = $authorid");
                  while($tampil = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td>
                      <div class="icheck-primary">
                      <a href="index.php?action=hapus&ecd=<?php echo $tampil['blog_id']; ?>"><i class="far fa-trash-alt" style="color:red"></i></a>
                        <label for="check2"></label>
                      </div>
                    </td>
                    <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="index.php?action=edit&ecd=<?php echo $tampil['blog_id']; ?>" style="color: black;"><?php echo $tampil['name']; ?></a></td>
                    <td class="mailbox-subject"><a href="index.php?action=edit&ecd=<?php echo $tampil['blog_id']; ?>" style="color: black;"><b><?php echo $tampil['judul']; ?></b> <?php echo $tampil['headline']; ?></a></td>
                    <td class="mailbox-date"><?php echo $tampil['date']; ?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <!-- <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                </div> -->
                <!-- /.btn-group -->
                <!-- <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button> -->
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>