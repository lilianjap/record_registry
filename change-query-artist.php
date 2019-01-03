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
$link = mysqli_connect('localhost', 'root', 'drommar', 'Registry');

// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit(); }
  $newName = '';
  $oldName= '';

  //Om ej tom input
if ($_POST['new_name'] != "" && $_POST['old_name'] != "") {
    $newName = "'".$_POST["new_name"]."'";
    $oldName = "'".$_POST["old_name"]."'";

  $check_artist= "SELECT name FROM Artists WHERE name = ".$oldName ."
      ;";
  $result = mysqli_query($link, $check_artist);
  if ($result === false) {
        printf("Query failed: %s<br />\n%s", $check_artist, mysqli_error($link));
        exit(); }
  elseif ($result) {
    // Store results from each row in variables
      while ($line = $result->fetch_object()) {
          $artist_exist = $line->name;
        }}


  if ($artist_exist != "" ) { //om namnet finns i databasen, gör update
  $query = "UPDATE Artists SET name = " .$newName ." WHERE name = " .$oldName ." ;" ;
              //execute query
              if (($result = mysqli_query($link, $query)) === false) {
                printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
                exit();
               } else {
                 echo "<h2>
                   <i>".$oldName. "</i> has been updated to <i>".$newName. "</i>!
                 </h2>
                 <form action='changeregister-artist.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Update new' name='go' id='go'/>
                 </form>
                 <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
                 </form>
                 <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
                 </form>
                 ";
                  }
                }
  elseif ($artist_exist == "") { //om det gamla artistnamnet inte finns,
    echo "<h2><i>" .$oldName. "</i> doesn't exist. Press below to add new artist! </h2>";
    echo "<form action='addartist.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Add new artist' name='go' id='go'/>
          </form>
          <form action='changeregister-artist.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
          </form>
          <form action='index.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='See Music Collection' name='go' id='go'/>
          </form>
          <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
          </form>
          ";
  }
}
//Om tom input
elseif ($_POST['new_name'] == "" || $_POST['old_name'] == "" ) {
  echo "<h2>An empty input won't add anything! Press below to add again.</h2>";
  echo "<form action='changeregister-artist.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Back' name='go' id='go'/>
        </form>
        <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
        </form>
        ";
}


?>

<img src="images/waves.jpg" alt="logo" width="100%" height="800"/>

	</body>
</html>
