<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="firstpage.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
  #header {
    text-align: center;
    font-weight: bold;
    margin-top: 80px;
    font-family: 'Optima';
  }

  #collapseAdd {margin-top: 15px;}

  #body     {
      text-align: center;
      font-weight: bold;
      margin-top: 80px;
      font-family: 'Optima';
      color: #003366;
    }

  .btn-group-vertical {
    display: block;
  }
  .dropdown-menu {
        background-color: #FFFFFF;
        right: -50%;
        left: -50%;
        text-align: center;
        overflow: hidden;
        }
  #DELETE {
    margin-top: 35px;
  }
  #SEARCH{
    margin-top: 35px;
  }

</style>

    <title>Music Collection</title>
  </head>

<div id=header>
  <h1>Your Music Collection</h1>
  <h3>What do you want to do?</h3>
</div>

<div id=body>

  <div class="btn-group-vertical" id="ALL">
    <form action="index.php" method="post">
    <input type="submit" class="btn1 btn-outline-secondary btn-lg" value="See entire collection" name="go" id="go"/>
    </form>
  </div>


  <div class="btn-group-vertical" id="ADD">
    <a class="btn1 btn-outline-secondary btn-lg" data-toggle="collapse" href="#collapseAdd" role="button" aria-expanded="false" aria-controls="collapseExample">
      Add to collection
      </a>
      <div class="collapse" id="collapseAdd">
        <div class="card card-body">
          <ul>
            <a role="menuitem" tabindex="-1" href="addartist.php">Artist</a> <br></br>
            <a role="menuitem" tabindex="-1" href="addalbum.php">Album</a>
          </ul>
        </div>
      </div>
  </div>

  <div class="btn-group-vertical" id="UPDATE">
    <a class="btn1 btn-outline-secondary btn-lg" data-toggle="collapse" href="#collapseUpdate" role="button" aria-expanded="false" aria-controls="collapseExample">
      Update collection
      </a> <br></br>
      <div class="collapse" id="collapseUpdate">
        <div class="card card-body">
          <ul>
            <a role="menuitem" tabindex="-1" href="changeregister-artist.php">Artist</a> <br></br>
            <a role="menuitem" tabindex="-1" href="changeregister-album.php">Album</a>
          </ul>
        </div>
      </div>
  </div>

  <div class="btn-group-vertical" id="DELETE">
    <a class="btn1 btn-outline-secondary btn-lg" data-toggle="collapse" href="#collapseDelete" role="button" aria-expanded="false" aria-controls="collapseExample">
      Delete in collection
      </a> <br></br>
      <div class="collapse" id="collapseDelete">
        <div class="card card-body">
          <ul>
            <a role="menuitem" tabindex="-1" href="delete-artist.php">Artist</a> <br></br>
            <a role="menuitem" tabindex="-1" href="delete-album.php">Album</a>
          </ul>
        </div>
      </div>
  </div>

  <div class="btn-group-vertical" id="SEARCH">
    <a class="btn1 btn-outline-secondary btn-lg" data-toggle="collapse" href="#collapseSearch" role="button" aria-expanded="false" aria-controls="collapseExample">
      Search
      </a> <br></br>
      <div class="collapse" id="collapseSearch">
        <div class="card card-body">
          <ul>
            <a role="menuitem" tabindex="-1" href="search-artist.php">Artist</a> <br></br>
            <a role="menuitem" tabindex="-1" href="search-album.php">Album</a>
          </ul>
        </div>
      </div>
  </div>

  <img src="images/waves.jpg" alt="logo" width="100%" height="800"/>

  </div>






</html>
