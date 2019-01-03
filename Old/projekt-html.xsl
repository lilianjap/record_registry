<?xml version="1.0"?>
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns="http://www.w3.org/1999/xhtml">
  <xsl:key name="albumID" match="artist" use="@id"/>


  <xsl:template match="Registry">
    <html>
      <head>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="firstpage.css"/>
        <style>
          h2 {
          margin-top: 50px;
          margin-left: 100px;
          font-weight: bold;
          font-family: 'Optima';
          }

          #RecentlyAdded { float: left; margin-left: 100px;}

          #All { float: right;
          margin-right: 100px
          }

          #Add, #Update {
          position: absolute;
          top: 25%;
          left: 50%;
          /* bring your own prefixes */
          transform: translate(-50%, -50%);

          }


        </style>
        <title>Record Registry</title>
      </head>
      <header>
        <h1>Your Record Registry</h1>
      </header>



      <body>
        <div id="RecentlyAdded">
        <h2>Recently added albums</h2>
        <xsl:apply-templates select='Albums'/>

      <!--  <h2>B</h2>
          <xsl:apply-templates select='Artists' mode='B'/>
        -->
        </div>

        <div id="All">
        <h2>Whole Registry - Albums</h2>
        <xsl:apply-templates select='Albums' mode='alphabet'/>

        <h2>Whole Registry - Artists</h2>
          <xsl:apply-templates select='Artists'/>
        </div>

        <div id="Add" class="dropdown btn-group">
        <a class="btn1 btn-outline-secondary dropdown-toggle btn-lg" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Add to Register
              <span class="caret"></span>
        </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" role="menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="addartist.php">Artist</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="addalbum.php">Album</a></li>
            </ul>
          </div>

        <br></br>
        <br></br>

          <div class="dropdown btn-group" id="Update">
            <a class="btn1 btn-outline-secondary dropdown-toggle btn-lg" href="addrecords.php" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Update Register
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" role="menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="changeregister-artist.php">Artist</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="changeregister-album.php">Album</a></li>
            </ul>
          </div>
        <img src="images/waves.jpg" alt="logo" width="100%" height="800"/>

      </body>
      </html>


  </xsl:template>

  <xsl:template match="Albums">
    <xsl:for-each select='album'>
    <xsl:sort select='added' order='descending'/>
    <li>
      <xsl:value-of select='translate(added, "&apos;", "")'/>
    </li>
  </xsl:for-each>
  </xsl:template>

  <xsl:template match="Albums" mode='alphabet'>
    <xsl:for-each select='album'>
      <xsl:sort select='title'/>
    <li>
      <i><xsl:value-of select='translate(title, "&apos;", "")' /></i>
        <xsl:text> by </xsl:text>
        <xsl:value-of select='translate(artist, "&apos;", "")' />
    </li>
  </xsl:for-each>
  </xsl:template>

  <xsl:template match="Artists">
    <xsl:for-each select='artist'>
      <xsl:sort select='name'/>
    <li>
      <xsl:value-of select='name[not(name = preceding::name)]'/>
    </li>
  </xsl:for-each>
  </xsl:template>
<!--
  <xsl:template match="Artists" mode='B'>
    <xsl:for-each select='artist'>
    <xsl:if test="starts-with(name, 'B')">
      <li>
        <xsl:value-of select='name'/>
      </li>
    </xsl:if>
  </xsl:for-each>
  </xsl:template>
-->


  </xsl:stylesheet>
