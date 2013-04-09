<?xml version="1.0"?>
<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.ruleml.org/0.89/xsd"
xmlns:ruleml="http://www.ruleml.org/0.88/xsd"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
exclude-result-prefixes="ruleml"
>
<!--
	XSLT stylesheet for converting rulebases from RuleML 0.88 to 0.89

	See http://www.ruleml.org/0.89/#Changes for more information.

	File: 088_to_089.xslt
	Version: 1.0
	Last Modification: 2005-07-14

	Changes from RuleML 0.88 to 0.89:

	* new sublanguages providing the modular specification of FOL RuleML as submitted to W3C:
	* new sublanguages providing the serialization of SWSL
	* new tag <Reify> introduced to support reification (a kind of instantiation or quasi-quotation)
	* new attributes 'minCard' and 'maxCard' introduced to allow cardinality constraints
	* new tag <Data> introduced, besides <Ind>, optionally specifying an XML Schema built-in datatype for checking during validation
	* new tag <Mutex> introduced to support mutual exclusion
	* optional positional rest role <repo> and slotted rest role <resl> introduced
	* RDF blank nodes as Skolem individual constants
	
	All of the above are extensions only and don't affect translation.

	* oid's are now permitted in all atoms, connectives and quantifiers

	This also does not affect translation since the range of occurrence of oids in 0.89 is a superset of that in 0.88.

	* 'innerclose' renamed to 'mapClosure', and analogous 'mapDirection' introduced
	* webizing is optionally included in all sublanguages, eliminating the need for the entire 'ur' branch of the family of languages

	These two DO affect translation, since attributes and URLs must be altered.

	i.e.
	urcbindatagroundfact => bindatagroundfact
	urcbindatagroundlog => bindatagroundlog
	urcbindatalog => bindatalog
	urcdatalog => datalog
	urdatalog => datalog
	urhornlog => hornlog
	urequalog => equalog

	equalog => hornlogeq

	Note that whitespace before and after the elements isn't part of the
	data model and so it can't be preserved by this translator.  Software with
	"pretty print" functionality can be used to increase readability after translation.
-->

	<xsl:output method="xml" version="1.0"/>

	<xsl:template match="/">
		<!-- enter newlines to separate xml declaration and root element -->
		<xsl:text>

</xsl:text>
		<xsl:apply-templates />
	</xsl:template>
	
	<!-- determine whether the content is asserted or queried based on the first child of Rulebase -->
	<xsl:template match="ruleml:Assert | ruleml:Query">
		<xsl:element name="{name(.)}">
			<xsl:attribute name="xsi:schemaLocation">
				<xsl:variable name="url">http://www.ruleml.org/0.89/xsd</xsl:variable>
				<!-- store just the name of the schema -->
				<xsl:variable name="file" 
						select="substring-after(@xsi:schemaLocation, 'http://www.ruleml.org/0.88/xsd/')" />
				<!-- remove any occurrences of "ur" or "urc" from sublanguage names... -->
				<!--
						would be easier with XPath 2.0's replace function, but XML Spy 2005 reports
						"unknown Xpath function" even though it works fine with the "Evaluate XPath" tool
				-->
				<xsl:choose>
					<xsl:when test="contains($file, 'equalog')">
						<!-- if equalog or urequalog, replace with hornlogeq -->
						<xsl:value-of select="concat($url, ' ', $url, '/hornlogeq.xsd')" />				
					</xsl:when>				
					<xsl:when test="starts-with($file, 'urc')">
						<xsl:value-of select="concat($url, ' ', $url, '/', substring($file, 4))" />				
					</xsl:when>
					<xsl:when test="starts-with($file, 'ur')">
						<xsl:value-of select="concat($url, ' ', $url, '/', substring($file, 3))" />				
					</xsl:when>					
					<xsl:otherwise>
						<xsl:value-of select="concat($url, ' ', $url, '/', $file)" />
					</xsl:otherwise>
				</xsl:choose>

			</xsl:attribute>
			<xsl:apply-templates/>
		</xsl:element>
	
	</xsl:template>

	<!-- rename innerclose to mapClosure -->
	<xsl:template match="@innerclose">
		<xsl:attribute name="mapClosure">
			<xsl:value-of select="."/>
		</xsl:attribute>
	</xsl:template>
	
	<!-- copy all attributes, except as above -->
	<xsl:template match="@*">
		<xsl:copy-of select="."/>
	</xsl:template>	
	
	<!-- copy everything except the old namespace -->
	<xsl:template match="*">
		<xsl:element name="{name()}" >
			<xsl:apply-templates select="node()|@*"/>
		</xsl:element>
	</xsl:template>	
	
	<!-- preserve comments -->
	<xsl:template match="comment()">
		<!-- enter newlines around comments to increase readability -->
		<xsl:text>
</xsl:text>

		<!-- prevent commented-out code from being escaped -->
		<xsl:text disable-output-escaping="yes">&lt;!--</xsl:text>
		<xsl:value-of disable-output-escaping="yes" select="."/>
		<xsl:text disable-output-escaping="yes">--></xsl:text>
		
		<xsl:text>
</xsl:text>			
	</xsl:template>
	
</xsl:stylesheet>