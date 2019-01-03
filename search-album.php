<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="firstpage.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
    h1 {
      text-align: center;
      font-weight: bold;
      margin-top: 80px;
      font-family: 'Optima';
    }

    #homebtn {
      font-family: 'Optima';
      margin-left: 50px;
      margin-top: 50px;
    }
    .container {
      font-family: 'Optima';
      margin-top: 40px;
      font-size: 150%;
    }
    </style>

    <title>Music Collection</title>
  </head>

  <div id=header>
    <div id="homebtn">
    <form action='firstpageNEW.php' method='post'><input type='submit' class='btn btn-default btn-lg' value='Home' name='go' id='go'/>
          </form>
    </div>
    <h1>Your Music Collection</h1>
<div class="container">
<form class='newrecord' id="newrecord" method="post" action="search-query-album.php">
	<fieldset>
		<legend>Search album from collection</legend>
		Album Title: <input type="text" name="album_title" id="album_title"> <br/> <br/>
		<input class="btn btn-default btn-lg" type="submit" name="go" id="go" value="Search album" />
	</fieldset>
</form>
<form action="search-artist.php" method="post">
<input type="submit" class="btn1 btn-outline-secondary btn-lg" value="Search artist instead" name="go" id="go"/>
</form>
</div>


<img src="images/waves.jpg" alt="logo" width="100%" height="800"/>

</div>



<body>
</body>
</html>
