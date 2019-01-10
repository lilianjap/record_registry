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
  //$newAlbum = '';

  if ($_POST['artist_name'] != "") {
    //query
    $check_artist= "SELECT name FROM Artists WHERE name = '".$_POST['artist_name']."'
        ;";
    // Execute the query
    $result = mysqli_query($link, $check_artist);
    if ($result === false) {
          printf("Query failed: %s<br />\n%s", $check_artist, mysqli_error($link));
          exit();
    } elseif ($result) {
      // Store results from each row in variables
        while ($line = $result->fetch_object()) {
            $artist_exist = $line->name;
        }
      }


    if ($artist_exist != "") { //om not empty, existerar namnet redan
        echo "<h2><i>" .$artist_exist. "</i> exist already!</h2>";
        echo "<form action='addartist.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
              </form>
              <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
              </form>
              <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
              </form>
              ";
      } else {
          $newArtist = " '".$_POST["artist_name"]."' ";

          //query
          $query = "INSERT INTO Artists (name) VALUES (" .$newArtist .")
              ;";
          $input_new = mysqli_query($link, $query);

          // Execute the query
          if ($input_new === false) {
            printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
            exit();
          } else {
          echo nl2br ("<h2><i>" .$newArtist. "</i> has been added!</h2>");
          echo "<form action='addartist.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Add new' name='go' id='go'/>
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
    echo "<h2>An empty input won't add anything! Press below to add again.</h2>";
    echo "<form action='addartist.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
          </form>
          <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
          </form>
          ";
  }

?>
<img src="images/waves.jpg" alt="logo" width="100%" height="800"/>
  </body>

</html>
