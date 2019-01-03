<?php
// if debug is set to 1, the xml structure is printed instead of the result of the transformation, från instruktionsvideon
$debug = 0;

if($debug) {

  header("Content-type: text/xml");
} else {
  include("prefix.php");
}
?>

 <Registry>

<?php
// Connect using host, username, password and databasename
$link = mysqli_connect('localhost', 'root', 'drommar', 'Registry');

// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }

// The SQL query, denna kommer hämta ut data som matchar och inte inkludera data som saknar andra attribut (som kali uchis)
//$query = "SELECT *
//      FROM Artists A inner join Albums B
//      WHERE A.artist_id = B.artist_id
//      ;";
$query = "SELECT * FROM Artists ORDER BY name
;";


// Execute the query
if (($result = mysqli_query($link, $query)) === false) {
  printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
  exit();
}
  $string_artists = '';


 // Loop over the resulting lines
 while ($line = $result->fetch_object()) {
 // Store results from each row in variables
 $id = $line->artist_id;
 $artistname = $line->name;
 $artistname = str_replace("&","&amp;", $artistname);
 //preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $artistname); //htmlspecialchars($artistname);
 //htmlentities($artistname);

 //if (strpos($artistname, "&") !== false) {
//        htmlentities($artistname);
        //echo "THIS IS THE ARTIST NAME $artistname";
//      }
// else {
//  $artistname = $artistname;
//   }
 //$strlen = strlen($artistname);
 //for ($i=0;$i<=$strlen;$i++){ }
 //$count = substr_count($artistname, "&");

 //if ($count > 0) {
   //$artistname=preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $artistname);

//   $artistname = str_replace("&","&amp;", $artistname); }

 // Store the result we want by appending strings to the variable $returnstring
 $string_artists .= "<Artists><artist id='$id'>";
 $string_artists .= "<name>$artistname</name></artist></Artists>";

}
// Free result and just in case encode result to utf8 before returning
 mysqli_free_result($result);
 print utf8_encode($string_artists);

?>
<?php

$query2 = "SELECT name, Albums.artist_id, album_id, album_title, added, release_date FROM Albums Inner join Artists WHERE Albums.artist_id = Artists.artist_id
ORDER BY album_title
; ";


if (($result = mysqli_query($link, $query2)) === false) {
  printf("Query failed: %s<br />\n%s", $query2, mysqli_error($link));
  exit();
}

 $string_albums = '';

while ($line = $result->fetch_object()) {

 $artist_id = $line->artist_id;
 $album_id = $line->album_id;
 $album_title = $line->album_title;
 $date_added = $line->added;
 //$date_added = strtotime($date_added);

 //$date_added = date('Y-m-d H:i:s', $date_added);
 //$date_added = strtotime($date_added);
 //$date_added = date('Y-m-j H:i:s', $date_added);
 $releasedate = $line->release_date;
 $artistname = $line->name;


 $string_albums .= "<Albums><album album_id='$album_id' artist_id='$artist_id'>";
 $string_albums .= "<title>'$album_title'</title>";
 $string_albums .= "<artist>'$artistname'</artist>";
 $string_albums .= "<release_date>'$releasedate'</release_date>";
 $string_albums .= "<added>'$date_added'</added>";
 $string_albums .= "<type>'$albumtype'</type></album></Albums>";
}

 mysqli_free_result($result);
 print utf8_encode($string_albums);
?>

</Registry>


<?php
if (!($debug)){
  //do the transformations. Look in the file postfix.php to see how it works
  include("postfix.php");
}
?>
