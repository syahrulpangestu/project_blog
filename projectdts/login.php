<?php
  // session_start();
  // echo $_SESSION['username'];
  // die();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Navbar dan Form</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Login</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
      <div class="container">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card" style="margin-top: 5rem;">
                <div class="card-body">
                    <?php 
                      if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "gagal"){
                          echo "<p>Login gagal! username dan password salah!</p>";
                        }else{
                        ?>
                            <script type="text/javascript">
                              alert("Berhasil");
                              window.location.href = "template/index.php?action=list";
                            </script>
                        <?php
                        }
                      }
                    ?>
                    <form action="function.php" method="POST">
                        <div class="form-group">
                          <label for="formGroupExampleInput">Username</label>
                          <input type="text" name="username" class="form-control" id="formGroupExampleInput" required>
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput">Password</label>
                          <input type="password" name="password" class="form-control" id="formGroupExampleInput" required>
                        </div>
                        <div style="text-align:center">
                        <span><a href="register.php" style="text-decoration:none">create account</a></span>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="login" value="Submit">
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
  </body>
</html>