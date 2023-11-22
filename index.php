<?php 
include "config.php";
$query = "SELECT*FROM tb_note";
$sql=mysqli_query($conn,$query);

$no = 0;


//var_dump($result);
//die();

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT * FROM tb_note WHERE title_note LIKE '%$searchTerm%' OR note_note LIKE '%$searchTerm%'";
$sql = mysqli_query($conn, $query);


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

/* .search-bar {
    
    align-items: center;
    text-align: center;
    
} */

.search {
    border: .2rem solid rgb(49, 108, 244);
    border-radius: .5rem;
    height: 2.5rem;
    padding-left:1rem ;
}

.card-add {
    border: .2rem solid rgb(49, 108, 244);
    padding: 2rem;
}

.footer {
    border-radius: 10px;
}

footer {
    border-radius: 10px;
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
    <div class="card-add shadow bg-body-tertiary rounded mb-5 mt-4">
      <div class="card-body">
        <h4 class="judul-add">Write some notes!</h4>
        <form class="d-flex" action="insert.php" method="post">
          <input class="form-control me-2" name="title_note" placeholder="Insert title">
          <input class="form-control me-2" name="note_note" placeholder="Write some notes">
          <button  class="btn btn-primary" type="submit">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 1.7 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z"/>
</svg> Add
          </button>
        </form>
      </div>
    </div>
   
    <div class="search-bar mb-3">
    <form action="" method="get">
        <input class="search me-2" type="text" id="note-search" name="search" placeholder="Find your note">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
    
<div class="card mt-3">
      <?php 
              while  ($result=mysqli_fetch_assoc($sql)){
               
              ?>
      <div class="card-header">
      <?php echo ++$no;?>
      </div>
      <div class="card-body">
        <h5 class="card-title"><?php echo $result['title_note'];?></h5>
        <p class="card-text"><?php echo $result['note_note'];?></p>
        <a href="update.php?edit=<?php echo $result['id_note'];?>" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="25" fill="currentColor" class="bi bi-pencil" viewBox="0 1.8 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
           </svg> Edit</a>
        <a href="delete.php?delete=<?php echo $result['id_note'];?>" class="btn btn-danger" onclick="return confirmDelete();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="25"
            fill="currentColor" class="bi bi-trash3" viewBox="0 1.7 16 16">
            <path
              d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
          </svg> Delete</a>
      </div>
      <?php } ?>
     </div>
    </div>

    <div class="footer container my-5">
  <footer class="text-center text-white" style="background-color: #0a4275;">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright :
      <a class="text-white" href="https://www.instagram.com/just.faaizz_/">@just.faaizz_</a>
    </div>
  </footer>
  </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("note-search").addEventListener("input", function () {
            var searchTerm = this.value.toLowerCase();
            var notes = document.querySelectorAll(".card");

            notes.forEach(function (note) {
                var title = note.querySelector(".card-title").innerText.toLowerCase();
                var content = note.querySelector(".card-text").innerText.toLowerCase();

                if (title.includes(searchTerm) || content.includes(searchTerm)) {
                    note.style.display = "block";
                } else {
                    note.style.display = "none";
                }
            });
        });
    });
</script>

<script>
    function confirmDelete() {
        if (confirm("Are you sure you want to delete this note?")) {
            return true; // Lanjutkan proses penghapusan jika pengguna menekan OK
        } else {
            return false; // Batal penghapusan jika pengguna menekan Batal
        }
    }
</script>

    <!-- JS BOOSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>