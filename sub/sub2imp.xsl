<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<?cocoon-process type="xslt"?>

<!-- Transforming RuleML Sub to Imp Elements via XSLT     2002-04-18 -->
<!-- Harold Boley    "boley@informatik.uni-kl.de" -->

  <!-- process rulebase and position sub transformer -->
  <xsl:template match="rulebase">
    <rulebase>
      <xsl:apply-templates/>
    </rulebase>
  </xsl:template>

  <!-- apply sub transformer, creating an
       imp from _shead and _sbody elements -->
  <xsl:template match="sub">
    <imp>
      <_head>
        <xsl:apply-templates select="_shead"/>
      </_head>
      <_body>
        <xsl:apply-templates select="_sbody"/>
      </_body>
    </imp>
  </xsl:template>

  <!-- apply templates to sor elements -->
  <xsl:template match="sor">
    <or>
      <xsl:apply-templates/>
    </or>
  </xsl:template>

  <!-- apply templates to sand elements -->
  <xsl:template match="sand">
    <and>
      <xsl:apply-templates/>
    </and>
  </xsl:template>

  <!-- apply rel transformer, creating an
       atom element -->
  <xsl:template match="rel">
    <atom>
      <_opr><rel><xsl:value-of select="."/></rel></_opr>
      <var>x</var>
    </atom>
  </xsl:template>

</xsl:stylesheet>
