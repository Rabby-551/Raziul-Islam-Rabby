<?php
  session_start(); 
  include "../Database/Database.php";

  if(isset($_GET['addNew'])){
    $value = $_GET['addNew'];
    $id = $_SESSION['id'];
    $date = $_GET["dateTime"];

    $sql = " INSERT INTO `list`(`id`, `list`, `time`) VALUES ('$id','$value','$date') ";
   // echo($sql);
    mysqli_query($conn, $sql);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Todo List | Home</title>
</head>
<body>
<nav class="navbar navbar-light cbg-color">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../Assets/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Todo List
    </a>
    <a href="../Controller/Logout.php" class="logoutbtn">Logout</a>
  </div>
</nav>

<section class="my-5 px-4">
    <h4>Hello, <?php echo"{$_SESSION['name']}"  ?></h4>
    <div class="mx-5">
        <form method="get" action="">
            <div class="mb-3">
              <label for="addNew" class="form-label">Add New</label>
              <input type="text" name="addNew" class="form-control" id="addNew" >  
              <input class="mt-2" type="datetime-local" id="" name="dateTime">
             </div>
            <button type="submit" class="btn btn-primary px-5">Add</button>
        </form>
    </div>
    <div class="mx-5 mt-4">
        <h3 class="text-center">List To Do</h3>
      
        <table class="table table-striped text-center" id="myTable">
          <thead class="table-dark">
            <tr>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
                <tbody>
                  <?php
                  $i=0;
                
                      $sql = "Select list,time from list where id={$_SESSION['id']}";
                      $result = mysqli_query($conn, $sql);
                      if(mysqli_num_rows($result) > 0){
                          while($row = $result->fetch_assoc()){
                              echo "<tr id='{$i}'> <td class='row-data'>{$row["list"]}</td><td class='row-data'>{$row["time"]} </td>  <td> <button type='button' class='btn btn-outline-danger fw-bolder px-3 py-1 rounded-1' data-bs-toggle='modal' data-bs-target='#exampleModal' onClick='myList()'>Delete</button> </td></tr>";
                            $i++;
                          }
                      }

                  

                  ?>
                </tbody>
          </table>
    </div>
</section>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>