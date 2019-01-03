<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="firstpage.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
  #WholeCollection {
    text-align: center;
    font-family: 'Optima';
    margin-top: 70px;
  }
  #header {
    text-align: center;
    font-weight: bold;
    margin-top: 80px;
    font-family: 'Optima';
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


</style>

    <title>Record Register</title>
  </head>

<div id=header>
  <h1>Your Record Registry</h1>
</div>

<div id=body>
  <div id="Add" class="dropdown btn-group-vertical">
    <a class="btn1 btn-outline-secondary dropdown-toggle btn-lg" href="addrecords.php" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
 >
      Add to collection
      <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" role="menu">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="addartist.php">Artist</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="addalbum.php">Album</a></li>
    </ul>
  </div>

<br>

  <div class="dropdown btn-group-vertical" id="Update">
    <a class="btn1 btn-outline-secondary dropdown-toggle btn-lg" href="addrecords.php" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
 >
      Update collection
      <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" role="menu">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="changeregister-artist.php">Artist</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="changeregister-album.php">Album</a></li>
    </ul>
  </div>

  <div class="btn-group-vertical" id="WholeCollection">
    <a class="btn1 btn-outline-secondary btn-lg" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      See entire music collection
      </a>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.

    <table class="table table-sm table-dark">
      <thead>
        <tr>
          <th scope="col">#id</th>
          <th scope="col">Title</th>
          <th scope="col">Artist</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td colspan="2">Larry the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>

  </div>
</div>
  </div>

  <img src="images/waves.jpg" alt="logo" width="100%" height="800"/>

  </div>






</html>
