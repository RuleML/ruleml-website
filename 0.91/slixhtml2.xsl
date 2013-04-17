<?xml version="1.0" encoding="ISO-8859-1" ?>

<!-- Written by Michael Sintek, modified by Harold Boley "{sintek,boley}@dfki.de", modified by Elina Hotman and David Hirtle -->

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="img">
   <xsl:copy-of select="."/>
 </xsl:template>
 
<xsl:template match="dl | dt | dd">
   <xsl:copy>
   	<xsl:apply-templates/>
   </xsl:copy>
 </xsl:template>
 
<xsl:template match="dt[@id]">
    <xsl:copy-of select="."/>
</xsl:template>

<xsl:template match="acronym[@title]">
   <xsl:copy-of select="."/>
</xsl:template>

<xsl:template match="abbr[@title]">
    <xsl:copy-of select="."/>
</xsl:template>
 
<xsl:template match="map">
   <xsl:copy-of select="."/>
</xsl:template>

<xsl:template match="table | tr | td">
   <xsl:copy-of select="."/>
 </xsl:template>

<!--
  <xsl:template match="table">
    <xsl:copy>
    <xsl:attribute name="border">
      <xsl:value-of select="@border"/>
    </xsl:attribute>
    <xsl:attribute name="cellspacing">
      <xsl:value-of select="@cellspacing"/>
    </xsl:attribute>
    <xsl:attribute name="cellpadding">
      <xsl:value-of select="@cellpadding"/>
    </xsl:attribute>
    <xsl:apply-templates/>
  </xsl:copy>
  </xsl:template>

  <xsl:template match="tr">
   <tr><xsl:apply-templates/></tr>
  </xsl:template>

  <xsl:template match="td">
   <td><xsl:apply-templates/></td>
  </xsl:template>
-->
  <xsl:template match="a[@name]">
    <a name="{@name}"><xsl:apply-templates/></a>
  </xsl:template>
<!-- not adequate for modularization page links...
  <xsl:template match="a[@href]">
    <a href="{@href}"><xsl:apply-templates/></a>
  </xsl:template>
-->
<xsl:template match="a[@href]">
    <xsl:copy-of select="."/>
</xsl:template>

<xsl:template match="@id">
    <xsl:copy/>
</xsl:template>

  <xsl:template match="br">
    <br/>
  </xsl:template>

  <xsl:template match="p">
    <p><xsl:apply-templates/></p>
  </xsl:template>

  <xsl:template match="h1">
    <h1><xsl:apply-templates/></h1>
  </xsl:template>

  <xsl:template match="h3">
    <h3><xsl:apply-templates/></h3>
  </xsl:template>

  <xsl:template match="h2">
    <h2><xsl:apply-templates/></h2>
  </xsl:template>

  <xsl:template match="center">
    <center><xsl:apply-templates/></center>
  </xsl:template>

  <xsl:template match="b">
    <b><xsl:apply-templates/></b>
  </xsl:template>

  <xsl:template match="i">
    <i><xsl:apply-templates/></i>
  </xsl:template>

  <xsl:template match="ul">
    <ul><xsl:apply-templates/></ul>
  </xsl:template>

  <xsl:template match="li">
   <li><xsl:apply-templates/></li>
  </xsl:template>

  <xsl:template match="tt">
    <tt><xsl:apply-templates/></tt>
  </xsl:template>

  <xsl:template match="big">
    <big><xsl:apply-templates/></big>
  </xsl:template>

  <xsl:template match="small">
    <small><xsl:apply-templates/></small>
  </xsl:template>

  <xsl:template match="code">
    <!--<b><pre><xsl:apply-templates/></pre></b>-->
     <code><xsl:apply-templates/></code>
  </xsl:template>

  <xsl:template match="pre">
    <b><pre><xsl:apply-templates/></pre></b>
  </xsl:template>

  <xsl:template match="itemize">
    <ul>
      <xsl:apply-templates/>
    </ul>
  </xsl:template>

  <xsl:template match="itemize" mode="reverse">
    <ul>
      <xsl:apply-templates>
         <xsl:sort data-type="number" select="position()" order="descending"/>
      </xsl:apply-templates>
    </ul>
  </xsl:template>
  
  <xsl:template match="enumerate">
    <ol>
      <xsl:apply-templates/>
    </ol>
  </xsl:template>

  <xsl:template match="item">
    <li>
      <xsl:apply-templates/>
    </li>
  </xsl:template>

  <xsl:template match="xhtml">
    <xsl:copy-of select="."/>
  </xsl:template>

 <xsl:template match="hr">
  <xsl:copy-of select="."/>
 </xsl:template>

</xsl:stylesheet>

