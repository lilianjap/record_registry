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
$link = mysqli_connect('localhost', 'root', 'drommar', 'Registry');

// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }
  $newArtist = '';

  //om ej tom input
  if ($_POST['artist_name'] != "") {
    $newArtist = " '".$_POST["artist_name"]."' ";
    $newArtist = str_replace("'", '',$newArtist);
    $newArtist = trim($newArtist);
    //query to search om liknande text(newArtist) finns i databasen
    $search_artist = "SELECT name FROM Artists WHERE name LIKE '$newArtist%'
        ;" ;
        $search_artistlastname = "SELECT name FROM Artists WHERE name LIKE '% $newArtist%'
            ;" ;
    // Execute the query
    $result = mysqli_query($link, $search_artist);
    $result2 = mysqli_query($link, $search_artistlastname);

    if ($result === false || $result2 === false) {
          printf("Query failed: %s<br />\n%s", $search_artist, $search_artistlastname, mysqli_error($link));
          exit();
    } elseif ($result || $result2) { // Query ok, Store results from each row in variables
      $returnstring = "
      <table class='table table-hover'>
            <thead>
              <tr>
                <th><i>Found artists with '".$newArtist."'</i></th>
              </tr>
            </thead>
            <tbody>
            ";

        while ($line = $result->fetch_object()) {
            $artist_exist = $line->name;
            $returnstring .= "<tr>
                              <td>$artist_exist</td>
                              </tr>";
              }
        while ($line = $result2->fetch_object()) {
            $artistlastname_exist = $line->name;
            $returnstring .= "<tr>
                              <td>$artistlastname_exist</td>
                              </tr>";
              }
          $returnstring .="</tbody></table>";

        if ($artist_exist != "" || $artistlastname_exist != "") { //om search gav resultat
            echo "$returnstring";
            echo "<form action='search-artist.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Search new artist' name='go' id='go'/>
                  </form>
                  <form action='search-album.php' method='post'>
                  <input type='submit' class='btn1 btn-outline-secondary btn-lg' value='Search album' name='go' id='go'/>
                  </form>
                  <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
                  </form>
                  <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
                  </form>
                  ";
            }
        elseif ($artist_exist == "" || $artistlastname_exist == "") { //om empty, raise msg
            echo "<h2>There is no artist called <i>".$newArtist."</i></h2>";
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
  elseif ($_POST['artist_name'] == "") {
    echo "<h2>An empty input won't add anything! Press below to search again.<h2>";
    echo "<form action='search-artist.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
          </form>
          <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
          </form>
          ";
  }

?>
<img src="images/waves.jpg" alt="logo" width="100%" height="800"/>
  </body>

</html>
