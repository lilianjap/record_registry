<html>
     <head>
     <link rel="stylesheet" type="text/css" href="firstpage.css"/>
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

     <title>Music Collection</title>
     </head>

     <header>
    	<h1>Your Music Collection</h1>
      </header>
      <style>
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
    <body>

<?php
// Connect using host, username, password and databasename
$link = mysqli_connect('localhost', 'root', 'drommar', 'Registry');

// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }

  $newArtist = '';
  $newAlbum = '';

  if ($_POST['artist_name'] != "") {
    $newArtist = "'".$_POST["artist_name"]."'";
    }
  if ($_POST['album_title'] != "") {
  	$newAlbum = "'".$_POST["album_title"]."'";
  }

  // check if artist exist (alternativt submenu bar med alla artister)
  if ($_POST['artist_name'] != "" && $_POST['album_title'] != "") {

  //query
  $check_artist = "SELECT name FROM Artists WHERE name = " .$newArtist ."
      ;";
  $check_album = "SELECT album_title FROM Albums WHERE album_title = " .$newAlbum ."
          ;";

  // Execute the query
  $result = mysqli_query($link, $check_artist);
  $result2 = mysqli_query($link, $check_album);


  if ($result === false || $result2 === false) {
        printf("Query failed: %s<br />\n%s", $check_artist, $check_album, mysqli_error($link));
        exit();
  } elseif ($result || $result2) {
    // Store results from each row in variables
      while ($line = $result->fetch_object()) {
          $artist_exist = $line->name;
      }
      while ($line = $result2->fetch_object()){
        $album_exist = $line ->album_title;
      }
    }

  //check if query gives existing artistname and albumtitle in database
  if ($artist_exist == "" && $album_exist == "") { //artist and album doesn't exist, add both artist and album
      $input_artist_album = "INSERT INTO Artists (name) VALUES (" .$newArtist .")
          ;";
      $input_artist_album .= "INSERT INTO Albums (artist_id, album_title) VALUES((SELECT artist_id FROM Artists WHERE name = " .$newArtist ."), " .$newAlbum .")
      		;";
      $input_all = mysqli_multi_query ($link, $input_artist_album);
      echo "<h2><i>" .$newArtist. "</i> and <i>" .$newAlbum. "</i> has been added!</h2>";
      echo "<form action='addalbum.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Add new' name='go' id='go'/>
            </form>
            <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
            </form>
            <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
            </form>

            ";
    }
    elseif ($artist_exist != "" && $album_exist == "") { //artist exist but not album, add album with this artist

      $input_album = "INSERT INTO Albums(artist_id, album_title)
                      VALUES ( (SELECT artist_id FROM Artists WHERE name = '" .$artist_exist ."'), " .$newAlbum .")
                      ;";
      $input_album_only = mysqli_query($link, $input_album);

                        if ($input_album_only === false) {
                              printf("Query failed: %s<br />\n%s", $input_album_only, mysqli_error($link));
                              exit();
                            }
                        echo nl2br ("<h2>Album added with <i>" .$artist_exist. "</i></h2>");
                        echo "<form action='addalbum.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Add new' name='go' id='go'/>
                              </form>
                              <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
                              </form>
                              <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
                              </form>";
    }
    elseif ($artist_exist != "" && $album_exist != ""){ //both artist and album return non-empty strings, album exists
      echo nl2br ("<h2><i>" .$album_exist. "</i> exist already!</h2>");
      echo "<form action='addalbum.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
            </form>
            <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
            </form>
            <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
            </form>";

      }
  }
    elseif ($_POST['artist_name'] == "" || $_POST['album_title'] == "")  {
      echo "<h2>An empty input won't add anything! Press below to add again.</h2>";
      echo "<form action='addalbum.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
            </form>
            <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
            </form>";

    }



  // $query = "INSERT INTO Artists (name) VALUES (" .$newArtist .")
  //    ;";
  //$query .= "INSERT INTO Albums (artist_id, album_title) VALUES((SELECT artist_id FROM Artists WHERE name = " .$newArtist ."), " .$newAlbum .")
  //		;";

  // Execute the query
  //if (($result = mysqli_multi_query($link, $query)) === false) {
  //  printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
  //  exit();
  // }

  //<?php
  //echo "<h2>Artist exists! (" .$artist_exist. ")</h2>";

?>
<img src="images/waves.jpg" alt="logo" width="100%" height="800"/>

	</body>
</html>
