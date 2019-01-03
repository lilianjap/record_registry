<html>
<head>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
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
<form id="edit-rec" method="post" action="change-query-artist.php">
	<fieldset>
		<legend>Edit artist name</legend>
		Write in the artist name to change: </br></br>
		Old artist name: <input type="text" name="old_name" id="old_name"> </br><br/>
		<!--Album Title: <input type="text" name="old_title" id="old_title"> <br/> <br/> -->

		New artist name: <input type="text" name="new_name" id="new_name"> <br/><br/>
		<!--New albumtitle: <input type="text" name="new_title" id="new_title"> <br/> <br/> -->

		<input class="btn btn-default" type="submit" name="go" id="go" value="Update information" />


	</fieldset>

</form>
</div>
<img src="images/waves.jpg" alt="logo" width="100%" height="800"/>

</div>

<body>
</body>
</html>
