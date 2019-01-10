<html>
     <head>
       <meta charset="utf-8">
       <link rel="stylesheet" type="text/css" href="firstpage.css"/>

       <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <title>Music Collection</title>

     </head>
     <style>
     #homebtn {
       font-family: 'Optima';
     }
     h2 {
       text-align: center;
       margin-top: 100px;
       font-family: 'Optima';
     }

     form {
       font-family: 'Optima';
       margin-top: 40px;
       text-align: center;
     }
      </style>
     <header>
    	<h1>Your Music Collection</h1>
      </header>

	<body>
<?php
// Connect using host, username, password and databasename
$link = mysqli_connect('localhost', 'root', '', 'Registry');

// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }
  $newArtist = '';

  //om ej tom input
  if ($_POST['album_title'] != "") {
    //query to check att artist finns i databasen
    $check_album= "SELECT album_title FROM Albums WHERE album_title = '".$_POST['album_title']."'
        ;";
    // Execute the query
    $result = mysqli_query($link, $check_album);
    if ($result === false) {
          printf("Query failed: %s<br />\n%s", $check_album, mysqli_error($link));
          exit();
    } elseif ($result) { // Store results from each row in variables
        while ($line = $result->fetch_object()) {
            $album_title = $line->album_title;
        }
      }

    if ($album_title == "") { //om empty, raise msg
        echo "<h2>There is no album called <i>".$_POST["album_title"]."</i></h2>";
        echo "<form action='delete-album.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
              </form>
              <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
              </form>
              <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
              </form>
              ";
      } else {
          $album = " '".$_POST["album_title"]."' ";

          //query

          $query .= "DELETE FROM Albums WHERE album_title =".$album."
              ;";

          $input_new = mysqli_multi_query($link, $query);

          // Execute the query
          if ($input_new === false) {
            printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
            exit();
          } else {
          echo nl2br ("<h2><i>".$album."</i> has been deleted from collection.</h2>");
          echo "<form action='delete-album.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Delete new' name='go' id='go'/>
                </form>
                <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
                </form>
                <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
                </form>
                ";
          }
        }

  }
  elseif ($_POST['artist_name'] == "") {
    echo "<h2>An empty input won't add anything! Press below to delete again.<h2>";
    echo "<form action='delete-album.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
          </form>
          <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
          </form>
          ";
  }

?>
<img src="images/waves.jpg" alt="logo" width="100%" height="800"/>
  </body>

</html>
