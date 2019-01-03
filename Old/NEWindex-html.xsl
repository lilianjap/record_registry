<?xml version="1.0"?>
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns="http://www.w3.org/1999/xhtml">

  <xsl:template match="Registry">
    <html>
      <head>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>

        <title>Your Music Collection</title>
      </head>

      <header>
        <h1>Your Music Collection</h1>
      </header>

      <body>
        <h2>Recently added albums</h2>
        <xsl:apply-templates select='Albums'/>

        <h2>B</h2>
          <xsl:apply-templates select='Artists' mode='B'/>
        <h2>Whole Registry - Albums</h2>
        <xsl:apply-templates select='Albums' mode='alphabet'/>

        <h2>Whole Registry - Artists</h2>
          <xsl:apply-templates select='Artists'/>
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

    <xsl:template match="Artists" mode='B'>
      <xsl:for-each select='artist'>
      <xsl:if test="starts-with(name, 'B')">
        <li>
          <xsl:value-of select='name'/>
        </li>
      </xsl:if>
    </xsl:for-each>
    </xsl:template>



    </xsl:stylesheet>
