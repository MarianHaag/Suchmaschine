<?php
  include('../config.php');
  $link = mysqli_connect("localhost", "root", "", "i218_phrases_live");
  $update_result = 0; 
  if (isset($_GET['btn-save'])){
    $db_query = "UPDATE `phrases` SET `text` = '" . $_GET['phrase'] . "' WHERE `ID` = " . $_GET['edit-id'] ;
     // echo $db_query; 
     $update_result = $link->query($db_query);  
  }

  $db_query = "SELECT * FROM `phrases` WHERE `ID` = " . $_GET['edit-id'] ;
  $result = $link->query($db_query); 
  $row = mysqli_fetch_row($result); 
  $text = $row[1];



?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit phrase</title>
    <meta charset="UTF-8"></meta>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style type="text/css">
      .container div {
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
        <?php if ($update_result == 1){ ?>
          <div class="alert alert-primary" role="alert">
            Update Success! 
            <a href="index.php">Back to dashboard</a>
          </div>
        <?php } ?>

          <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-3">EDIT</h1>
            <form>
                <input type="hidden" name="edit-id" value="<?php echo $_GET['edit-id']?>" >
                <input type="text" name="phrase" value="<?php echo $text ?>"></input>
                <button type="submit" name="btn-save" value="1">Update</button>                
            </form>

          </div>

        </div>
        <?php include('../footer.php'); ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>    </body>
  </body>
</html>
