<?php 
include "config.php";
$id = $_GET['edit'];
$query = "SELECT*FROM tb_note WHERE id_note = '$id'";
$sql=mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($sql);

$no = 0;


// var_dump($result);
// die();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Note Hub</title>
  <link rel="stylesheet" href="style.css">

  <style>
body {
    background: url(img/background.png);
    background-size: cover;
}

.judul-web{
    color: rgb(255, 255, 255);
    background-color: black;
    font-weight: 600;
    padding: 15px 0 10px 0;
    text-align: center;
    border-radius: 5px;
}
.judul-web span{
    color: rgb(0, 0, 0);
    background-color: rgb(41, 144, 255);
    padding: 3px 5px;
    border-radius: 3px;
}
  </style>
</head>
<body>
<div class="container">
<h3 class="judul-web mt-4">
        <span>Note</span> Hub
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="37" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 1.8 16 16">
  <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
</svg> 
    </h3>
    <div class="card shadow bg-body-tertiary rounded mb-4 mt-4">
      <div class="card-body">
        <h4 class="judul-add">Edit your note!</h4>
        <form class="d-flex" action="updateupdate.php" method="post">
          <input class="form-control me-2" name="title_note" placeholder="Insert title" value="<?php echo $result['title_note']?>">
          <input class="form-control me-2" name="note_note" placeholder="Write some notes" value="<?php echo $result['note_note']?>">
          <input type="hidden" name="id" value="<?php echo $result['id_note']?>">
          <button  class="btn btn-primary" type="submit">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 1.7 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg> Edit
          </button>
        </form>
      </div>
    </div>
</div>


    <!-- JS BOOSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>