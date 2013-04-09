<?xml version="1.0"?>
<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.ruleml.org/0.87/xsd"
xmlns:ruleml="http://www.ruleml.org/0.86/xsd"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
exclude-result-prefixes="ruleml"
>
<!--
		XSLT stylesheet for converting rulebases from RuleML 0.86 to 0.87

		See http://www.ruleml.org/0.87/#Changes for more information.

		File: 086_to_087.xslt
		Version: 0.9
		Last Modification: 2004-07-28
-->

	<xsl:output method="xml" version="1.0"/>

	<!--
		these are used for case replacement using translate() ...
		see http://www.topxml.com/xsl/articles/caseconvert/
	-->
	<xsl:variable name="lc_letters">abcdefghijklmnopqrstuvwxyz</xsl:variable>
	<xsl:variable name="uc_letters">ABCDEFGHIJKLMNOPQRSTUVWXYZ</xsl:variable>

	<xsl:template match="/">
		<!-- enter newlines to separate xml declaration and root element -->
		<xsl:text>

</xsl:text>
		<xsl:apply-templates />
	</xsl:template>

	<xsl:template match="ruleml:rulebase">
		<!-- capitalize first letter by replacing lower case with upper via translate() -->
		<xsl:variable name="first_letter"
			select="translate(substring(name(), 1, 1), $lc_letters, $uc_letters)" />
		<xsl:element name="{concat($first_letter, substring(name(), 2))}">
			<xsl:attribute name="xsi:schemaLocation">
				<xsl:variable name="url">http://www.ruleml.org/0.87/xsd</xsl:variable>
				<!-- just the name of the schema -->
				<xsl:variable name="file" 
					select="substring-after(@xsi:schemaLocation, 'http://www.ruleml.org/0.86/xsd/')" />
				<xsl:value-of select="concat($url, ' ', $url, '/', $file)" />
			</xsl:attribute>
			<xsl:copy-of select="@direction"/>
			<xsl:apply-templates />
		</xsl:element>  
	</xsl:template>
	
	<!-- applies "slot name as subelement instead of attribute" change -->
	<xsl:template match="ruleml:_slot">
		<!-- note that it is now a type tag and is therefore capitalized -->
		<xsl:element name="Slot">
			<xsl:copy-of select="@weight"/>
			<xsl:copy-of select="@card"/>
			<Ind><xsl:value-of select="@name" /></Ind>
			<xsl:apply-templates select="*"/>
		</xsl:element>
	</xsl:template>	

	<!-- applies case changes to all elements -->
	<xsl:template match="*">
		<xsl:call-template name="convert">
			<xsl:with-param name="tag" select="name(.)" />
		</xsl:call-template>
	</xsl:template>

	<!-- preserve comments -->
	<xsl:template match="comment()">
		<xsl:copy/>
	</xsl:template>
	
	<xsl:template name="convert">
		<xsl:param name="tag" />		
		<xsl:choose>
			<!-- remove the underscore from role tags e.g. <_head> becomes <head> -->
			<xsl:when test="starts-with($tag, '_')">
				<xsl:element name="{substring-after($tag, '_')}">
					<xsl:copy-of select="@*"/>
					<xsl:apply-templates/>
				</xsl:element>
			</xsl:when>
		
			<!-- capitalize first letter of type tags e.g. <imp> becomes <Imp> -->
			<xsl:otherwise>
				<!-- replace lower case with upper via translate() and alphabet global variables -->
				<xsl:variable name="first_letter"
					select="translate(substring($tag, 1, 1), $lc_letters, $uc_letters)" />
				<xsl:element name="{concat($first_letter, substring($tag, 2))}">
					<xsl:copy-of select="@*"/>
					<xsl:apply-templates/>
				</xsl:element>
			</xsl:otherwise>
		</xsl:choose>	
	</xsl:template>

</xsl:stylesheet>