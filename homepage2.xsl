<?xml version="1.0" encoding="ISO-8859-1" ?>

<!-- Started by Michael Sintek, developed by Harold Boley "{sintek,boley}@dfki.de",
modified by Elina Hotman -->
<!-- filename with "2" suffix is a version including changes by David Hirtle -->


<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:import href="slixhtml2.xsl"/>

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
       dt { font-weight: bold }
       abbr, acronym { cursor:help }
     </style>
    </head>
    <body bgcolor="#FFFFFF">
    <!-- <body bgcolor="#F8F8FF"> -->
    <!-- <body bgcolor="#EEEEEE"> -->
    <!-- <body background="hintergrund.gif" bgcolor="#FFFFFF"> -->
      <xsl:apply-templates select="opening"/>


<xsl:choose>
<xsl:when test="mission|news">

<table border="0" width="100%" cellspacing="7" cellpadding="0" align="center" >
  <tr> 
    <td valign="TOP" width="30%" bgcolor="#FFFFFF"></td>
    <td valign="TOP" width="40%" bgcolor="#FFFFFF"> 
      <!-- <div align="center"><img src="img/logo.jpg" alt="logo" border="0" height="42" width="320" align="BOTTOM"/> 
      </div> -->
    </td>
    <td valign="TOP" width="30%" bgcolor="#FFFFFF"></td>
  </tr>
  <tr> 
    <td valign="TOP" width="30%" bgcolor="#FFCCCC">
      <h2>Contents</h2>
      <ul>
        <xsl:apply-templates select="section" mode="toc"/>
      </ul>
    </td>
    <td valign="TOP" width="40%" align="left">
      <xsl:apply-templates select="news"/>
    </td>
    <td valign="TOP" width="30%" bgcolor="#CCCCFF">
      <xsl:apply-templates select="mission"/>
    </td>
  </tr>
</table>

</xsl:when>
<xsl:otherwise>

      <h2>Contents</h2>
      <ul>
        <xsl:apply-templates select="section" mode="toc"/>
      </ul>

</xsl:otherwise>
</xsl:choose>

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



  <xsl:template match="news">
    <h2><xsl:apply-templates select="header" mode="header"/></h2>
    <xsl:apply-templates select="itemize" mode="reverse"/>
  </xsl:template>



  <xsl:template match="mission">
    <h2><xsl:apply-templates select="header" mode="header"/></h2>
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

