<?xml version="1.0" encoding="UTF-8"?>

<!-- ==================================================================================== -->
<!-- RuleML stylesheet for 0.8                                                            -->
<!--                                                                                      -->
<!-- Said Tabet, The RuleML Initiative                                                    -->
<!-- ==================================================================================== -->

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fo="http://www.w3.org/1999/XSL/Format">
  <xsl:output method="text"/>
  <xsl:template match="rulebase">
    <xsl:variable name="KBLabel">
      <xsl:value-of select="@label"/>
    </xsl:variable><xsl:apply-templates/>
  </xsl:template>

  <xsl:template match="imp">
    <xsl:variable name="RuleLabel">
      <xsl:value-of select="./@label"/>
    </xsl:variable>
    <xsl:text><![CDATA[
;; -------------------------------------------------------------------------
(defrule ]]></xsl:text><xsl:value-of select="translate($RuleLabel,' ','')"/>
    <xsl:text><![CDATA[
"add rule comment here."]]></xsl:text>
    <xsl:text><![CDATA[
(declare (salience ]]></xsl:text><xsl:value-of select="@priority"></xsl:value-of><xsl:text>))</xsl:text>

    <xsl:apply-templates select="_body"/>
    <xsl:text><![CDATA[
=>]]></xsl:text>
    <xsl:apply-templates select="_head"/>
    <xsl:text>)<![CDATA[
]]></xsl:text>
  </xsl:template>

  <xsl:template match="_body">
    <xsl:apply-templates/>
  </xsl:template>

  <xsl:template match="ind">
    <xsl:text> </xsl:text>
    <xsl:value-of select="ind"/>
    <xsl:apply-templates/>
  </xsl:template>

  <xsl:template match="var">
    <xsl:text> ?</xsl:text>
    <xsl:apply-templates/>
  </xsl:template>


  <xsl:template match="atom">
    <xsl:apply-templates select="_opr"/>
  </xsl:template>

  <xsl:template match="_opr">
    <xsl:choose>
      <xsl:when test="../../../fact/atom">
        <xsl:text>(</xsl:text>
        <xsl:value-of select="rel"/>
        <xsl:apply-templates select="../var | ../ind | ../unary | ../binary | ../nary"/>
        <xsl:text>)</xsl:text>
      </xsl:when>
      <xsl:when test="../../../conclusions/atom">
        <xsl:text>(call ?</xsl:text>
        <xsl:value-of select="../var[position() = 1]"/>
        <xsl:text> </xsl:text>
        <xsl:value-of select="rel"/>
        <xsl:apply-templates select="../unary | ../binary | ../nary | ../ind | ../var[position() > 1]"/><xsl:text>)</xsl:text>        
      </xsl:when>
      <xsl:otherwise>
        <xsl:apply-templates/>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>

  <xsl:template match="_head">
    <xsl:apply-templates/>
  </xsl:template>

  <xsl:template match="conclusions">
    <xsl:apply-templates/>
  </xsl:template>
  <xsl:template match="boundfact">
    <xsl:text>?</xsl:text><xsl:value-of select="var"/><xsl:text> &lt;- </xsl:text><xsl:apply-templates select="fact"/>
  </xsl:template>

  <xsl:template match="fact">
    <xsl:if test="../../../_body">
      <xsl:apply-templates select="./atom"/>
    </xsl:if>
    <xsl:if test="../../../../_body">
      <xsl:apply-templates select="./atom"/>
    </xsl:if>
    <xsl:if test="../../rulebase">
      <xsl:text><![CDATA[
;; ---------------------------------------------------------------
;; asserting a ground fact:

]]></xsl:text>
      <xsl:text>(assert </xsl:text><xsl:apply-templates select="./atom"/>
      <xsl:text>)</xsl:text>
    </xsl:if>
  </xsl:template>
  
  <xsl:template match="assert">
    <xsl:text>(assert </xsl:text>
    <xsl:apply-templates select="./fact/atom"/>
    <xsl:text>)</xsl:text>
  </xsl:template>

  <xsl:template match="retract">
    <xsl:choose>
      <xsl:when test="./var">
        <xsl:text>(retract ?</xsl:text><xsl:value-of select="var"/><xsl:text>)</xsl:text>
      </xsl:when>
      <xsl:otherwise>
        <xsl:text>(retract </xsl:text>
        <xsl:apply-templates select="./fact/atom"/>

        <xsl:text>)</xsl:text>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
    
</xsl:stylesheet>
