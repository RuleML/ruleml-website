<?xml version="1.0"?>
<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.ruleml.org/0.88/xsd"
xmlns:ruleml="http://www.ruleml.org/0.87/xsd"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
exclude-result-prefixes="ruleml"
>
<!--
		XSLT stylesheet for converting rulebases from RuleML 0.87 to 0.88

		See http://www.ruleml.org/0.88/#Changes for more information.

		File: 087_to_088.xslt
		Version: 0.8
		Last Modification: 2005-02-02

		Note that pre-0.88, queried and asserted content was freely mixed
		below a Rulebase.  In 0.88, asserted content must be beneath the
		'Assert' performative, and queried content must be beneath
		the 'Query' performative, each in its own document.  With XSLT 1.0,
		creating multiple output documents is not possible (though it will be in 2.0).

		Thus the translation below guesses which type of content (asserted or
		queried) is present based on the first child of 'Rulebase'.  If the Rulebase's first
		child is a Fact or Imp (or a Fact/Imp-containing clause), all 'Query' elements are
		commented out while everything else is updated to 0.88 under the 'Assert'
		performative.  On the other hand, if a Query is foremost, then the Facts/Imps
		are commented out and the performative chosen is 'Query'.

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
	<xsl:template match="ruleml:Rulebase">
		<xsl:choose>
			<xsl:when test="name(*[1])='Query' or (name(*[1])='clause' and name(*[1]/*[1])='Query')">
				<!-- Rulebase's first child is Query (or a Query-containing clause), so use 'Query' performative -->
				<xsl:element name="Query">
					<xsl:attribute name="xsi:schemaLocation">
						<xsl:variable name="url">http://www.ruleml.org/0.88/xsd</xsl:variable>
						<!-- just the name of the schema -->
						<xsl:variable name="file" 
							select="substring-after(@xsi:schemaLocation, 'http://www.ruleml.org/0.87/xsd/')" />
						<xsl:value-of select="concat($url, ' ', $url, '/', $file)" />
					</xsl:attribute>
					<xsl:element name="And">
						<!-- note translation is in "query mode" -->					
						<xsl:apply-templates mode="query"/>						
					</xsl:element>
				</xsl:element>		
			</xsl:when>
			
			<xsl:otherwise>
				<!-- Rulebase's first child is Fact or Imp (or a Fact/Imp-containing clause), so use 'Assert' -->
				<xsl:element name="Assert">
					<xsl:attribute name="xsi:schemaLocation">
						<xsl:variable name="url">http://www.ruleml.org/0.88/xsd</xsl:variable>
						<!-- just the name of the schema -->
						<xsl:variable name="file" 
							select="substring-after(@xsi:schemaLocation, 'http://www.ruleml.org/0.87/xsd/')" />
						<xsl:value-of select="concat($url, ' ', $url, '/', $file)" />
					</xsl:attribute>
					<xsl:element name="And">
						<!-- universally closed -->
						<xsl:attribute name="innerclose">universal</xsl:attribute>
						<xsl:copy-of select="@direction"/>
						<!-- note translation is in "assert mode" -->
						<xsl:apply-templates mode="assert"/>
					</xsl:element>  
				</xsl:element>		
				
			</xsl:otherwise>
		</xsl:choose>		
	</xsl:template>

	<!-- ASSERT MODE -->

	<!-- Query => (commented out) in assert mode, unless already commented out -->
	<xsl:template match="ruleml:Query" mode="assert">
		<xsl:if test="name(..)!='clause'">	
			<xsl:text disable-output-escaping="yes">&lt;!--</xsl:text>
		</xsl:if>	
		<xsl:element name="{name()}">
			<xsl:apply-templates select="@*|node()" mode="assert"/>
		</xsl:element>
		<xsl:if test="name(..)!='clause'">
			<xsl:text disable-output-escaping="yes">--></xsl:text>
		</xsl:if>
	</xsl:template>

	<!-- Slot => slot -->
	<xsl:template match="ruleml:Slot" mode="assert">
		<!-- note that it is now a role tag and is therefore not initially capitalized -->
		<xsl:element name="slot">
			<xsl:copy-of select="@*"/>
			<xsl:apply-templates mode="assert"/>
		</xsl:element>
	</xsl:template>
	
	<!-- Imp => Implies -->
	<xsl:template match="ruleml:Imp" mode="assert">
		<xsl:element name="Implies">
			<xsl:apply-templates mode="assert"/>
		</xsl:element>
	</xsl:template>	
	
	<!-- Eq => Equal -->
	<xsl:template match="ruleml:Eq" mode="assert">
		<xsl:element name="Equal">
			<xsl:apply-templates mode="assert"/>
		</xsl:element>
	</xsl:template>

	<!-- clause/Fact and clause/Imp => formula; clause/Query => (commented out) -->
	<xsl:template match="ruleml:clause" mode="assert">
		<xsl:choose>
			<xsl:when test="name(*[1])='Query'">
				<xsl:text disable-output-escaping="yes">&lt;!--</xsl:text>
				<xsl:element name="clause">
					<xsl:apply-templates select="@*|node()" mode="assert"/>
				</xsl:element>
				<xsl:text disable-output-escaping="yes">--></xsl:text>		
			</xsl:when>
			<xsl:otherwise> <!-- child must be Fact or Imp, so don't comment out -->
				<xsl:element name="formula">
					<xsl:apply-templates mode="assert"/>
				</xsl:element>					
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	
	<!-- wff => formula -->
	<xsl:template match="ruleml:wff" mode="assert">
		<xsl:element name="formula">
			<xsl:apply-templates mode="assert"/>
		</xsl:element>
	</xsl:template>
	
	<!-- rbaselab, rlab => oid -->
	<xsl:template match="ruleml:rbaselab | ruleml:rlab" mode="assert">
		<xsl:element name="oid">
			<xsl:apply-templates mode="assert"/>
		</xsl:element>
	</xsl:template>
	
	<!-- remove name, filler, role, Fact and Fact/head tags -->
	<xsl:template match="ruleml:name | ruleml:filler | ruleml:role | ruleml:Fact | ruleml:Fact/ruleml:head" mode="assert">
		<xsl:apply-templates mode="assert"/>
	</xsl:template>		

	 <xsl:template match="*" mode="assert">
		<xsl:element name="{name()}">
			<xsl:choose>
				<xsl:when test="@href">
					<xsl:attribute name="wref">
						<xsl:value-of select="@href"/>
					</xsl:attribute>
				</xsl:when>
				<xsl:otherwise>
					<xsl:copy-of select="@*"/>
				</xsl:otherwise>
			</xsl:choose>
			<xsl:apply-templates mode="assert"/>
		</xsl:element>
	</xsl:template>
	
	<!-- preserve comments -->
	<xsl:template match="comment()" mode="assert">
		<!-- enter newlines around comments to increase readability -->
		<xsl:text>
</xsl:text>	
		<xsl:copy/>
		<xsl:text>
</xsl:text>			
	</xsl:template>
	
	
	<!-- QUERY MODE -->
	
	<!-- Imp => (commented out) in query mode, unless clause already commented out -->
	<xsl:template match="ruleml:Imp" mode="query">
		<xsl:if test="name(..)!='clause'">	
			<xsl:text disable-output-escaping="yes">&lt;!--</xsl:text>
		</xsl:if>
		<xsl:element name="{name()}">
			<xsl:apply-templates select="@*|node()" mode="query"/>
		</xsl:element>
		<xsl:if test="name(..)!='clause'">
			<xsl:text disable-output-escaping="yes">--></xsl:text>
		</xsl:if>
	</xsl:template>

	<!-- Fact => (commented out) in query mode, unless clause already commented out -->
	<xsl:template match="ruleml:Fact" mode="query">
		<xsl:if test="name(..)!='clause'">
			<xsl:text disable-output-escaping="yes">&lt;!--</xsl:text>
		</xsl:if>
		<xsl:element name="{name()}">
			<xsl:apply-templates select="@*|node()" mode="query"/>
		</xsl:element>
		<xsl:if test="name(..)!='clause'">			
			<xsl:text disable-output-escaping="yes">--></xsl:text>
		</xsl:if>		
	</xsl:template>

	<!-- Slot => slot -->
	<xsl:template match="ruleml:Slot" mode="query">
		<!-- note that it is now a role tag and is therefore not initially capitalized -->
		<xsl:element name="slot">
			<xsl:copy-of select="@*"/>
			<xsl:apply-templates mode="query"/>
		</xsl:element>
	</xsl:template>
	
	<!-- Imp => Implies -->
	<xsl:template match="ruleml:Imp" mode="query">
		<xsl:element name="Implies">
			<xsl:apply-templates mode="query"/>
		</xsl:element>
	</xsl:template>	
	
	<!-- Eq => Equal -->
	<xsl:template match="ruleml:Eq" mode="query">
		<xsl:element name="Equal">
			<xsl:apply-templates mode="query"/>
		</xsl:element>
	</xsl:template>
	
	<!-- clause/Query => formula; clause/Imp or clause/Fact => (commented out) -->
	<xsl:template match="ruleml:clause" mode="query">
		<xsl:choose>
			<xsl:when test="name(*[1])='Query'">
				<xsl:element name="formula">
					<xsl:apply-templates mode="query"/>
				</xsl:element>			
			</xsl:when>
			<xsl:otherwise> <!-- child must be Fact or Imp, so comment out -->
				<xsl:text disable-output-escaping="yes">&lt;!--</xsl:text>
				<xsl:element name="clause">
					<xsl:apply-templates select="@*|node()" mode="query"/>
				</xsl:element>
				<xsl:text disable-output-escaping="yes">--></xsl:text>			
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>

	<!-- wff => formula -->
	<xsl:template match="ruleml:wff" mode="query">
		<xsl:element name="formula">
			<xsl:apply-templates mode="query"/>
		</xsl:element>
	</xsl:template>
	
	<!-- rbaselab, rlab => oid -->
	<xsl:template match="ruleml:rbaselab | ruleml:rlab" mode="query">
		<xsl:element name="oid">
			<xsl:apply-templates mode="query"/>
		</xsl:element>
	</xsl:template>
	
	<!-- remove name, filler, role, Fact and Fact/head tags -->
	<xsl:template match="ruleml:name | ruleml:filler | ruleml:role" mode="query">
		<xsl:apply-templates mode="query"/>
	</xsl:template>

	<!-- just drop Query and Query/body tags in query mode -->
	<xsl:template match="ruleml:Query | ruleml:Query/ruleml:body" mode="query">
		<xsl:apply-templates mode="query"/>
	</xsl:template>		

	 <xsl:template match="*" mode="query">
		<xsl:element name="{name()}">
			<xsl:choose>
				<xsl:when test="@href">
					<xsl:attribute name="wref">
						<xsl:value-of select="@href"/>
					</xsl:attribute>
				</xsl:when>
				<xsl:otherwise>
					<xsl:copy-of select="@*"/>
				</xsl:otherwise>
			</xsl:choose>
			<xsl:apply-templates mode="query"/>
		</xsl:element>
	</xsl:template>
	
	<!-- preserve comments -->
	<xsl:template match="comment()" mode="query">
		<!-- enter newlines around comments to increase readability -->
		<xsl:text>
</xsl:text>	
		<xsl:copy/>
		<xsl:text>
</xsl:text>			
	</xsl:template>	
	
</xsl:stylesheet>