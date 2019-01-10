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
     table {font-family: 'Optima';}
     thead {font-size: 150%; margin-left: 100px;}

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
  $newAlbum = '';

  //om ej tom input
  if ($_POST['album_title'] != "") {
    $newAlbum = " '".$_POST["album_title"]."' ";
    $newAlbum = str_replace("'", '',$newAlbum);
    $newAlbum = trim($newAlbum);
    //query to search om liknande text(newArtist) finns i databasen
    $search_album = "SELECT DISTINCT album_title FROM Albums WHERE album_title LIKE '$newAlbum%'
        ;" ;
        $search_album2 = "SELECT DISTINCT album_title FROM Albums WHERE album_title LIKE '% $newAlbum%'
            ;" ;
    // Execute the query
    $result = mysqli_query($link, $search_album);
    $result2 = mysqli_query($link, $search_album2);

    if ($result === false || $result2 === false) {
          printf("Query failed: %s<br />\n%s", $search_artist, $search_artistlastname, mysqli_error($link));
          exit();
    } elseif ($result || $result2) { // Query ok, Store results from each row in variables
      $returnstring = "
      <table class='table table-hover'>
            <thead>
              <tr>
                <th><i>Found album titles with '".$newAlbum."'</i></th>
              </tr>
            </thead>
            <tbody>
            ";

        while ($line = $result->fetch_object()) {
            $albumTitle = $line->album_title;
            $returnstring .= "<tr>
                              <td>$albumTitle</td>
                              </tr>";
              }
        while ($line = $result2->fetch_object()) {
            $albumTitle2 = $line->album_title;
            $returnstring .= "<tr>
                              <td>$albumTitle2</td>
                              </tr>";
              }
          $returnstring .="</tbody></table>";

        if ($albumTitle != "" || $albumTitle2 != "") { //om search gav resultat
            echo "$returnstring";
            echo "<form action='search-album.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Search new album' name='go' id='go'/>
                  </form>
                  <form action='search-artist.php' method='post'>
                  <input type='submit' class='btn1 btn-outline-secondary btn-lg' value='Search artist' name='go' id='go'/>
                  </form>
                  <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
                  </form>
                  <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
                  </form>
                  ";
            }
        elseif ($albumTitle == "" || $albumTitle2 == "") { //om empty, raise msg
            echo "<h2>There is no album called <i>".$newAlbum."</i></h2>";
            echo "<form action='search-artist.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
                  </form>
                  <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
                  </form>
                  <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
                  </form>
                  ";
          }

        }
      }
  elseif ($_POST['album_title'] == "") {
    echo "<h2>An empty input won't add anything! Press below to search again.<h2>";
    echo "<form action='search-album.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
          </form>
          <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
          </form>
          ";
  }

?>
<img src="images/waves.jpg" alt="logo" width="100%" height="800"/>
  </body>

</html>
