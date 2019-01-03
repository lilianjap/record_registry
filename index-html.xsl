<?xml version="1.0"?>
<!DOCTYPE Registry [
<!ENTITY Ouml "&#214;">
<!ENTITY ouml "&#246;">
<!ENTITY Ccedil "&#199;">
<!ENTITY ccedil "&#231;">
<!ENTITY Sh "&#350;">
<!ENTITY sh "&#351;">
<!ENTITY Uuml "&#220;">
<!ENTITY uuml "&#252;">
<!ENTITY amp "&#38;">
<!ENTITY apos "&#39;">
<!ENTITY quot "&#34;">

<!ELEMENT Registry (Artists, Albums)>
<!ELEMENT Artists (artist+)>
<!ATTLIST artist id ID #REQUIRED>
<!ELEMENT artist (name)>
<!ELEMENT name (#PCDATA)>

<!ELEMENT Albums (album+)>
<!ATTLIST album album_id ID #REQUIRED artist_id IDREF #REQUIRED>
<!ELEMENT album (title, artist, release_date, added)>
<!ELEMENT title (#PCDATA)>
<!ELEMENT release_date (#PCDATA)>
<!ELEMENT added (#PCDATA)>
]>
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns="http://www.w3.org/1999/xhtml">

  <xsl:template match="Registry">
<html>
  <head>
    <meta charset="utf-8"></meta>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"/>

    <title>Music Collection</title>

<style>
  header{
    text-align: center;
    font-weight: bold;
    margin-top: 80px;
    font-family: 'Optima';
  }
  form {margin-left: 40px; margin-right: 40px; text-align: center;}
  table {
  margin-top: 20px;
  }

  .btn-group {
    display: inline-block;
    text-align: center;
    margin-top: 40px;
  }
  #go {
  font-family: 'Optima';
  color: #003366;
  font-weight: bold;
  }
  h2 {
    text-align: center;
    margin-top: 50px;
    font-family: 'Optima';
  }
  th {text-align: center;}
  td {text-align: center;}

</style>
  </head>

  <header>

    <h1>Your Music Collection</h1>
    <div class="btn-group">
      <form action="firstpageNEW.php" method="post">
      <input type="submit" class="btn1 btn-outline-secondary btn-lg" value="Home" name="go" id="go"/>
      </form>
    </div>
    <div class="btn-group">
      <form action="search-artist.php" method="post">
      <input type="submit" class="btn1 btn-outline-secondary btn-lg" value="Search" name="go" id="go"/>
      </form>
    </div>
  </header>

  <body>



<h2>All Albums by <u>Artist</u></h2>
    <table class="table table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#id - Album</th>
          <th scope="col">Title</th>
          <th scope="col">Artist</th>
          <!--
          <th scope="col">Release Date</th>
        -->
        </tr>
      </thead>
      <tbody>
        <xsl:for-each select='Albums/album'>
          <xsl:sort select='artist'/>
        <tr>
          <th scope="row"><xsl:value-of select="@album_id"/></th>
          <td><i><xsl:value-of select='translate(title, "&apos;", "")' /></i></td>
          <td><xsl:value-of select='translate(artist, "&apos;", "")'/></td>
          <!--
          <td><xsl:value-of select='translate(release_date, "&apos;", "")'/></td>
        -->
        </tr>
      </xsl:for-each>

      </tbody>
    </table>

    <h2><u>All Artists</u></h2>
    <table class="table table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#id - Artist</th>
          <!--
          <th scope="col">Title</th>
        -->
          <th scope="col">Artist Name</th>
          <!--
          <th scope="col">Release Date</th>
        -->
        </tr>
      </thead>
      <tbody>
        <xsl:for-each select='Artists/artist'>
          <xsl:sort select='name'/>
        <tr>
          <th scope="row"><xsl:value-of select="@id"/></th>
          <!--
          <td><i><xsl:value-of select='translate(title, "&apos;", "")' /></i></td>
        -->
          <td><xsl:value-of select='translate(name, "&apos;", "")'/></td>
          <!--
          <td><xsl:value-of select='translate(release_date, "&apos;", "")'/></td>
        -->
        </tr>
      </xsl:for-each>

      </tbody>
    </table>



    <img src="images/waves.jpg" alt="logo" width="100%" height="800"/>

  </body>
</html>

  </xsl:template>


</xsl:stylesheet>
