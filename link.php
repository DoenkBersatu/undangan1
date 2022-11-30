<!doctype html>
<?php
$kepada = $_POST['kepada'];
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&displas=swap">
    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container">
    <div class="row justify-content-center">
            <div class="col-lg-7">
            <div class="card p-4 shadow-lg border-0 mt-4">
            <i class="fa fa-envelope text-center" style="font-size:30px;color:Green"></i>
            <h2 class="text-center">Generator Link</h2>
            <p>Sukses Membuat link, copy link dibawah ini</p>
              <div class="card">
                <input type="text" id="text" value="http://localhost/HTML/undangan.php?to=<?php echo str_replace(" ","+",$kepada);?>">
              
            </div>
            <br>
            <div class="copy text-center">
                 <button onclick='copy()' class="btn btn-success">Copy</button>
                 <a href="form_link.php" class="btn btn-primary">Buat Link Lagi</a>
                 </div>
                 </div>
        </div>
        </div>
    </div>
  </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
<script>
    function copy() {
        document.querySelector('#text').select(),document.execCommand('copy');
    }
</script>
    </body>
</html>