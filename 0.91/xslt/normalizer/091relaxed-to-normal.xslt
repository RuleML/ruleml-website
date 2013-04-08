<?xml version="1.0" ?>
<xsl:stylesheet version="2.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns="http://www.ruleml.org/0.91/xsd"
  xmlns:r="http://www.ruleml.org/0.91/xsd"
  exclude-result-prefixes="#all">

  <!-- Remove all white space between elements -->
  <xsl:strip-space elements="*"/>

  <!-- Add the  <?xml version="1.0" ?> at the top of the result.-->
  <!-- Pretty-print by specifying indent="yes" (FIXME: newline needs to be added before or after comments). -->
  <xsl:output method="xml" version="1.0" indent="yes"
    exclude-result-prefixes="r"/>

  <!-- Phase I: insert stripes if skipped -->
  <xsl:variable name="phase-1-output">
    <xsl:apply-templates select="/" mode="phase-1"/>
  </xsl:variable>

  <!-- Wraps the naked RuleML children of Assert. -->
  <xsl:template
    match="r:Assert/*[namespace-uri(.)='http://www.ruleml.org/0.91/xsd' and local-name(.)!='oid' and local-name(.)!='formula']"
    mode="phase-1">
    <xsl:call-template name="wrap-with-formula"/>
  </xsl:template>

  <!-- Named template that wraps an element in a formula element.
       Foreign elements are copied unchanged. -->
  <xsl:template name="wrap-with-formula">
    <formula>
      <xsl:call-template name="copy-1"/>
    </formula>
  </xsl:template>

  <!-- The remaining templates for building the fully-striped form of a (Deliberation, non-SWSL) RuleML instance are listed below, but not implemented.
  However, the transformation output is still syntactically valid and semantically equivalent to the input.-->

  <!-- Note: Some of these templates may be combined. -->
  <!-- Wraps the naked children of Retract. -->
  <!-- Wraps the naked children of Query. -->
  <!-- Wraps the naked children of Entails. -->
  <!-- Wraps the naked children of Rulebase. -->
  <!-- Wraps the naked children of Exists. -->
  <!-- Wraps the naked children of Forall. -->
  <!-- Wraps the naked children of Implies. -->
  <!-- Wraps the naked children of Equivalent. -->
  <!-- Wraps the naked children of And.-->
  <!-- Wraps the naked children of Or. -->
  <!-- Wraps the naked children of Atom  (don't forget @index). -->
  <!-- Wraps the naked children of Equal. -->
  <!-- Wraps the naked children of Neg. -->
  <!-- Wraps the naked children of Naf. -->
  <!-- Wraps the naked children of Expr  (don't forget @index). -->
  <!-- Wraps the naked children of Plex. -->



  <!-- Copies everything else to the phase-1 output. Comments are preserved without escaping.
    Order is preserved.
    Foreign elements are preserved.
     Because this is the most general of all templates, any more specific template in phase-1 will over-ride this one.  -->

  <xsl:template match="node() | @*" mode="phase-1">
    <xsl:call-template name="copy-1"/>
  </xsl:template>

  <xsl:template name="copy-1">
    <xsl:copy>
      <xsl:apply-templates select="node() | @*" mode="phase-1"/>
    </xsl:copy>

  </xsl:template>

  <!-- Phase II: rearrange into canonical ordering -->

  <xsl:variable name="phase-2-output">
    <xsl:apply-templates select="$phase-1-output" mode="phase-2"/>
  </xsl:variable>

  <!-- Puts the contents of Implies into canonical ordering.
       (oid, body, head ), followed by everything else in the order in which it occurs.-->
  <xsl:template match="r:Implies" mode="phase-2">
    <xsl:copy>
      <xsl:apply-templates select="r:oid" mode="phase-2"/>
      <xsl:apply-templates select="r:body" mode="phase-2"/>
      <xsl:apply-templates select="r:head" mode="phase-2"/>
      <xsl:apply-templates
        select="*[namespace-uri(.)!='http://www.ruleml.org/0.91/xsd' or (local-name()!= 'oid' 
                      and local-name()!= 'body'  
                      and local-name()!= 'head')]"
        mode="phase-2"/>
    </xsl:copy>
  </xsl:template>

  <!-- The remaining templates for building the canonically-ordered form of a (Deliberation, non-SWSL) RuleML instance are listed below, but not implemented.
  However, the transformation output is still syntactically valid and semantically equivalent to the input.-->

  <!-- Note: Some of these templates may be combined. -->
  <!-- Builds canonically-ordered content of Retract. -->
  <!-- Builds canonically-ordered content of Query. -->
  <!-- Builds canonically-ordered content of Entails. -->
  <!-- Builds canonically-ordered content of Rulebase. -->
  <!-- Builds canonically-ordered content of Exists. -->
  <!-- Builds canonically-ordered content of Forall. -->
  <!-- Builds canonically-ordered content of Implies. -->
  <!-- Builds canonically-ordered content of Equivalent. -->
  <!-- Builds canonically-ordered content of And.-->
  <!-- Builds canonically-ordered content of Or. -->
  <!-- Builds canonically-ordered content of Atom. -->
  <!-- Builds canonically-ordered content of Equal. -->
  <!-- Builds canonically-ordered content of Neg. -->
  <!-- Builds canonically-ordered content of Naf. -->
  <!-- Builds canonically-ordered content of Expr. -->
  <!-- Builds canonically-ordered content of Plex. -->

  <!-- Copies everything else to the phase-2 output. Comments are preserved without escaping.
    Order is preserved.
    Foreign elements are preserved.
     Because this is the most general of all templates, any more specific template in phase-2 will over-ride this one.  -->
  <xsl:template match="node() | @*" mode="phase-2">
    <xsl:copy>
      <xsl:apply-templates select="node() | @*" mode="phase-2"/>
    </xsl:copy>
  </xsl:template>

  <!-- Phase III: treatment of attributes with default values -->

  <xsl:variable name="phase-3-output">
    <xsl:apply-templates select="$phase-2-output" mode="phase-3"/>
  </xsl:variable>

  <!-- Makes @material explicit. -->
  <!-- Adds the material attribute with default value (yes) to Implies elements where this attribute is absent. -->
  <xsl:template match="r:Implies[not(@material)]" mode="phase-3">
    <xsl:copy>
      <xsl:attribute name="material">yes</xsl:attribute>
      <xsl:apply-templates select="node() | @*" mode="phase-3"/>
    </xsl:copy>
  </xsl:template>

  <!-- The remaining templates for making the attributes with default values explicit in a (Deliberation, non-SWSL) RuleML instance are listed below, but not implemented.
  However, the transformation output is still syntactically valid and semantically equivalent to the input.-->

  <!-- Makes @mapMaterial explicit. -->
  <!-- Makes @direction explicit. -->
  <!-- Makes @mapDirection explicit. -->
  <!-- Makes @oriented explicit. -->
  <!-- Makes @in explicit. -->
  <!-- Makes @val explicit. -->


  <!-- Copies everything else to the phase-3 output. Comments are preserved without escaping.
    Order is preserved.
    Foreign elements are preserved.
     Because this is the most general of all templates, any more specific template in phase-3 will over-ride this one.  -->
  <xsl:template match="node() | @*" mode="phase-3">
    <xsl:copy>
      <xsl:apply-templates select="node() | @*" mode="phase-3"/>
    </xsl:copy>
  </xsl:template>

  <!-- Copies everything to the transformation output -->
  <xsl:template match="/">
    <xsl:copy-of select="$phase-3-output"/>
  </xsl:template>
</xsl:stylesheet>
