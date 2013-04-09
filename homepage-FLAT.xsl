<?xml version="1.0" encoding="ISO-8859-1" ?>

<!-- Written by Michael Sintek, modified by Harold Boley "{sintek,boley}@dfki.de" -->

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:import href="slixhtml.xsl"/>

  <xsl:template match="slides">
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

      <xsl:apply-templates/>
    </body>
   </html>
  </xsl:template>


  <xsl:template match="slide">
<!--   <xsl:variable name="slno"><xsl:number/></xsl:variable> -->
   <p>
     <h1>
<!--         <xsl:value-of select="$slno"/>.  -->
       <xsl:apply-templates select="title" mode="title"/>
     </h1>
     <xsl:apply-templates/>
   </p>
  </xsl:template>

  <xsl:template match="title" mode="title">
    <xsl:apply-templates/>
  </xsl:template>

  <xsl:template match="title">
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

