<?xml version="1.0" encoding="ISO-8859-1" ?>

<!-- Written by Michael Sintek, modified by Harold Boley "{sintek,boley}@dfki.de" -->

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:import href="slixhtml.xsl"/>

  <xsl:template match="homepage">
   <xsl:processing-instruction name="cocoon-format">type="text/html"</xsl:processing-instruction>
   <html>
    <head>
     <title>
      <xsl:value-of select="//title"/>
     </title>
     <style type="text/css">
       h1 { font-size: 32pt; font-weight: bold }
       h2 { font-size: 16pt; font-weight: bold }
       ul { line-height: 120% }
       ol { line-height: 120% }
       p { line-height: 100% }
     </style>
    </head>
    <!-- <body bgcolor="#EEEEEE"> -->
    <body background="hintergrund.gif" bgcolor="#FFFFFF">
      <xsl:apply-templates select="opening"/>
      <h2>Sections</h2>
      <ul>
        <xsl:apply-templates select="section" mode="toc"/>
      </ul>
      <xsl:apply-templates select="section" mode="full"/>
      <br/>
      <xsl:apply-templates select="closing"/>
    </body>
   </html>
  </xsl:template>



  <xsl:template match="opening">
    <xsl:apply-templates/>
  </xsl:template>



  <xsl:template match="closing">
    <xsl:apply-templates/>
  </xsl:template>



  <xsl:template match="section" mode="toc">
     <li>
       <a>
         <xsl:attribute name="href">#<xsl:choose><xsl:when test="@label"><xsl:value-of select="@label"/></xsl:when><xsl:otherwise><xsl:value-of select="header"/></xsl:otherwise></xsl:choose></xsl:attribute>
         <xsl:apply-templates select="header" mode="header"/>
       </a>
     </li>
  </xsl:template>


  <xsl:template match="section" mode="full">
     <h2>
       <a>
         <xsl:attribute name="name"><xsl:choose><xsl:when test="@label"><xsl:value-of select="@label"/></xsl:when><xsl:otherwise><xsl:value-of select="header"/></xsl:otherwise></xsl:choose></xsl:attribute>
         <xsl:apply-templates select="header" mode="header"/>
       </a>
     </h2>
     <xsl:apply-templates/>
  </xsl:template>

  <xsl:template match="title" mode="title">
    <xsl:apply-templates/>
  </xsl:template>

  <xsl:template match="title">
  </xsl:template>

  <xsl:template match="header" mode="header">
    <xsl:apply-templates/>
  </xsl:template>

  <xsl:template match="header">
  </xsl:template>

  <xsl:template match="box[@bgcolor]">
    <table border="1" cellpadding="5" bgcolor="{@bgcolor}">
      <tr><td>
	<xsl:apply-templates/>
      </td></tr>
    </table>
  </xsl:template>

  <xsl:template match="box">
    <table border="1" cellpadding="5" bgcolor="#EEFFEE">
      <tr><td>
	<xsl:apply-templates/>
      </td></tr>
    </table>
  </xsl:template>

</xsl:stylesheet>

