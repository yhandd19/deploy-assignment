<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./crud.css">
    <title>CRUD-APP</title>
</head>
<body>
    <nav class="container d-flex justify-content-end mt-5 nav">
        <a class="nav-link me-3" href="./index.php">Home</a>
        <a class="nav-link me-2" href="./about.php">About</a>
    </nav>
      
    </div>
    <div class="container row btn-modal">
      <div class="col">
        <!-- Button trigger modal -->
      <button type="button" class="btn btn-create" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="bi bi-plus-lg me-2"></i>New Student
      </button>

      <!-- Create Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="color: rgb(102, 43, 158);">
              <div class="modal-header">
                <h1 class="modal-title text-center fs-4" id="staticBackdropLabel" style="font-family:Raleway; font-weight:700">Create New Student</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <form method="POST">
                  <div class="mb-3">
                    <label for="fullName" class="form-label" style="font-size:16px;font-weight:500;font-family:Raleway">Full Name</label>
                    <input type="name" name="fullName" class="form-control text-center" id="fullName" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="studentID" class="form-label" style="font-size:16px;font-weight:500;font-family:Raleway">Student ID</label>
                    <input type="number" name="studentID" class="form-control text-center" id="studentID" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="major" class="form-label" style="font-size:16px;font-weight:500;font-family:Raleway">Major</label>
                    <input type="text" name="major" class="form-control text-center" id="major">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label" style="font-size:16px;font-weight:500;font-family:Raleway">Email</label>
                    <input type="email" name="email" class="form-control text-center" id="email">
                  </div>
                  <button type="submit" name="btnSubmit" class="btn btn-submit text-white" style="background-color: rgb(97, 34, 155); width:29rem;font-weight:700; font-family:Raleway">SUBMIT</button>
                </form>
                <?php 
                  include "./conn.php";
                  if(($_POST['btnSubmit'])){
                    $insert = mysqli_query($conn, "INSERT INTO student ('id', 'name', 'email', 'major') 
                    VALUES('$_POST[fullName]',
                    '$_POST[studentID]',
                    '$_POST[major]',
                    '$_POST[email]')");
                      if($insert){
                      echo "<script>alert('Berhasil menambahkan data :)')</script>";
                      }else{
                        echo "<script>alert('Gagal menambahkan data :(')</script>";
                      }
                  }
                ?>
                <?php 
                  include "./conn.php";
                  if(isset($_POST['btnSubmit'])){
                    $insert = mysqli_query($conn, "INSERT INTO student (id, name, email, major) 
                    VALUES('$_POST[fullName]',
                    '$_POST[studentID]',
                    '$_POST[major]',
                    '$_POST[email]')");
                     if($insert){
                      echo "<script>alert('Berhasil menambahkan data :)')</script>";
                      }else{
                        echo "<script>alert('Gagal menambahkan data :(')</script>";
                      }
                  }
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn text-white" style="background-color: rgb(102, 43, 158); font-family:Raleway">OK</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="container container-tabel">
        <table class="table table-hover text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>Student ID</th>
                <th>Major</th>
                <th>Email</th>
              </tr>
            </thead>

            <?php 
              include './conn.php';
              $query = "SELECT * FROM student";
              $exeQuery = mysqli_query($conn, $query);

              if(!$exeQuery){
                die("Error: ".mysqli_error($conn));
              }

              $counter = 1;

              while ($data = mysqli_fetch_assoc($exeQuery)) {
              ?>
                  <tr>
                    <td><?= $counter ?></td>
                    <td><?= $data["name"]?></td>
                    <td><?= $data["id"]?></td>
                    <td><?= $data["email"] ?></td>
                    <td><?= $data["major"] ?></td>
                  </tr>
              <?php   
                $counter++;
              }
              ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>