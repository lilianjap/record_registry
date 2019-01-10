<html>
     <head>
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="firstpage.css"/>

     <title>Music Collection</title>
     </head>
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
  $newTitle = '';
  $oldName= '';
  $oldTitle = '';

  //Om ej tom input
  if ($_POST['new_title'] != "" && $_POST['old_name'] != "" && $_POST['old_title'] != "") {
  $newTitle = "'".$_POST["new_title"]."'";
  $oldName = "'".$_POST["old_name"]."'";
  $oldTitle = "'".$_POST["old_title"]."'";

        //Kolla att artist och old album title finns, samt att new_title inte finns
        $check_artist  = "SELECT name FROM Artists WHERE name = " .$oldName ."; ";
        $check_oldalbum = "SELECT album_title FROM Albums WHERE album_title = " .$oldTitle ."; ";
        $check_newalbum = "SELECT album_title FROM Albums WHERE album_title = " .$newTitle ."; ";

        // Execute the query
        $result = mysqli_query($link, $check_artist);
        $result2 = mysqli_query($link, $check_oldalbum);
        $result3 = mysqli_query($link, $check_newalbum);

        //kolla att query's funkar
        if ($result === false || $result2 === false || $result3 === false) {
              printf("Query failed: %s<br />\n%s", $check_artist, $check_oldalbum, $check_newalbum, mysqli_error($link));
              exit();
            } elseif ($result || $result2 || $result3) {
              // Store results from each row in variables
                while ($line = $result->fetch_object()) {
                    $artist_exist = $line->name;
                }
                while ($line = $result2->fetch_object()){
                  $oldalbum_exist = $line ->album_title;
                }
                while ($line = $result3->fetch_object()){
                  $newalbum_exist = $line ->album_title;
                }
            }

        //om artist & old title finns, samt att new_title inte existerar
        if ($artist_exist != "" && $oldalbum_exist != "" && $newalbum_exist == "" ) {

            $update_album = "UPDATE Albums SET album_title = " .$newTitle ." WHERE album_title = " .$oldTitle ." AND artist_id = (SELECT artist_id FROM Artists WHERE name = " .$oldName.");
            ";
                      // Execute the query
                      if (($result = mysqli_multi_query($link, $update_album)) === false) {
                        printf("Query failed: %s<br />\n%s", $update_album, mysqli_error($link));
                        exit();
                      } else {
                        echo "<h2> <i>".$oldTitle ."</i> has been updated to <i>".$newTitle. "</i> with <i>".$oldName. "</i>.</h2>";
                        echo "<form action='changeregister-album.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Update new' name='go' id='go'/>
                              </form>
                              <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See all' name='go' id='go'/>
                              </form>
                              <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
                              </form>

                              ";
                      }
            }
        //all inputs exist in database
        elseif ($artist_exist != "" && $oldalbum_exist != "" && $newalbum_exist != "") {
              echo "<h2><i>".$newalbum_exist."</i> already exist!</h2>";
              echo "<form action='changeregister-album.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
                    </form>
                    <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
                    </form>
                    <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
                    </form>
                    ";
            }
        //artist finns inte i databasen
        elseif ($artist_exist == "" && $oldalbum_exist != "" && $newalbum_exist != "") {
          echo "<h2><i>".$_POST['old_name']."</i> doesn't exist in collection. Press below to add artist! </h2>";
          echo "<form action='addartist.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Add artist' name='go' id='go'/>
                </form>
                <form action='changeregister-album.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
                </form>
                <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
                </form>
                <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
                </form>
                "; }
        //album finns inte i databasen
        elseif ($artist_exist != "" && $oldalbum_exist == "" || $newalbum_exist != "") {
                  echo "<h2>There is no album called <i>".$_POST['old_title']."</i>. Press below to add album! </h2>";
                  echo "<form action='addalbum.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Add album' name='go' id='go'/>
                        </form>
                        <form action='changeregister-album.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
                        </form>
                        <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
                        </form>
                        <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
                        </form>
                        "; }
        else {
          echo "<h2>No update could be made, <i>".$_POST['old_name']."</i> or <i>".$_POST['old_title']."</i> could not be found in collection. Press below to add to collection!</h2>";
          echo "<form action='addalbum.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Add album' name='go' id='go'/>
                </form>
                <form action='addartist.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Add artist' name='go' id='go'/>
                </form>
                <form action='changeregister-album.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
                </form>
                <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
                </form>
                <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
                </form>
                "; }
        }

  //Om tom input
  elseif ($_POST['new_title'] == "" || $_POST['old_name'] == "" || $_POST['old_title'] == "") {
    echo "<h2>An empty input won't add anything! Press below to add again.</h2>";
    echo "<form action='changeregister-album.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
          </form>
          <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
          </form>
          ";

  }


  //query, update albums set album_title = 'Hours Spent Loving You' where artist_id = (select artist_id from artists where name = 'Sango');
  //$query = "UPDATE Albums SET album_title = '"  . utf8_encode ($_POST["new_title"]) ."' WHERE album_title = '"  . utf8_encode ($_POST["old_title"]) ."'
  //AND
  //artist_id = (SELECT artist_id FROM Artists WHERE name = '" . utf8_encode ($_POST["old_name"]) ."')
  //;" ;


  //$newName = '';


  //if ($_POST['new_name'] != "") {
  //  $newName = "'".$_POST["new_name"]."'";
  //  }


?>

<img src="images/waves.jpg" alt="logo" width="100%" height="800"/>

	</body>
</html>
