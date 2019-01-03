<?xml version="1.0"?>
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns="http://www.w3.org/1999/xhtml">

  <xsl:template match="Registry">
<html>
  <head>
    <meta charset="utf-8"></meta>
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

<header>
  <h1>Your Record Registry</h1>
</header>

<div id="body">
<!--
  <xsl:apply-templates select='Albums'/>

  <xsl:apply-templates select='Albums' mode='alphabet'/>

  <xsl:apply-templates select='Artists'/>
-->

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

  <br></br>

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
          <th scope="col">Release Date</th>
        </tr>
      </thead>
      <tbody>
        <xsl:for-each select='/Albums/album'>
          <xsl:sort select='title'/>


        <tr>
          <th scope="row"><xsl:value-of select="@id"/></th>
          <td><xsl:value-of select='translate(title, "&apos;", "")' /></td>
          <td><xsl:value-of select='translate(artist, "&apos;", "")'/></td>
          <td><xsl:value-of select='translate(release_date, "&apos;", "")'/></td>
        </tr>
      </xsl:for-each>

      </tbody>
    </table>

  </div>
</div>
  </div>

  <img src="images/waves.jpg" alt="logo" width="100%" height="800"/>

  </div>

</html>
</xsl:template>




</xsl:stylesheet>
