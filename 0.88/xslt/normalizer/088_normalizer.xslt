<?xml version="1.0"?>
<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns:ruleml="http://www.ruleml.org/0.88/xsd"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns="http://www.ruleml.org/0.88/xsd"
>

<!--
		XSLT stylesheet for normalizing 0.88 RuleML documents.  All skipped role tags
		are reconstructed, resulting in fully-expanded, normalized RuleML which is
		compatible with RDF.

		See http://www.ruleml.org/0.88/#XSLT-Based%20Normalizer for more information.

		File: 088_normalizer.xslt
		Version: 0.9
		Last Modification: 2005-02-15

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
	<xsl:template match="*">
		 <xsl:copy>
			<xsl:copy-of select="@*"/> 
			<xsl:copy-of select="text()"/> 			
			<xsl:choose>
				<xsl:when test="name(.)='Implies'">
					<xsl:for-each select="* | comment()">
						<xsl:choose>
							<xsl:when test="self::comment()">
								<xsl:call-template name="comments"/>
							</xsl:when>	
							<xsl:when test="current()=../*[1] and name(.)!='body' and name(.)!='head'"> 
								<xsl:element name="body">
									<xsl:apply-templates select="."/>
								</xsl:element>
							</xsl:when>
							<xsl:when test="current()=../*[2] and name(.)!='head' and name(.)!='body'"> 
								<xsl:element name="head">
									<xsl:apply-templates select="."/>
								</xsl:element>
							</xsl:when>
							<xsl:otherwise>													
								<xsl:copy>
									<xsl:copy-of select="@*"/>								
									<xsl:apply-templates/>	
								</xsl:copy>					
							</xsl:otherwise>					
						</xsl:choose>
					</xsl:for-each>
				</xsl:when>
				<xsl:when test="name(.)='Nano'">
					<xsl:for-each select="* | comment()">
						<xsl:choose>
							<xsl:when test="self::comment()">
								<xsl:call-template name="comments"/>
							</xsl:when>	
							<xsl:when test="name(.)='Fun' and name(..)!='opf'">
								<xsl:element name="opf">
									<xsl:apply-templates select="."/>
								</xsl:element>
							</xsl:when>
							<xsl:when test="( name(.)='Ind' or name(.)='Var' or name(.)='Cterm' or name(.)='Plex' ) and name(..)!='arg'">
								<xsl:element name="arg">
									<xsl:attribute name="index"><xsl:value-of select="count(preceding-sibling::*[name()='Ind' or name()='Var' or name()='Cterm' or name()='Plex'])+1"/></xsl:attribute>
									<xsl:apply-templates select="."/>
								</xsl:element>
							</xsl:when>
							<xsl:otherwise>
								<xsl:copy>
									<xsl:copy-of select="@*"/>								
									<xsl:apply-templates/>	
								</xsl:copy>
							</xsl:otherwise>	
						</xsl:choose>
					</xsl:for-each>		
				</xsl:when>					
				<xsl:when test="name(.)='Atom'">
					<xsl:for-each select="* | comment()">
						<xsl:choose>
							<xsl:when test="self::comment()">
								<xsl:call-template name="comments"/>
							</xsl:when>	
							<xsl:when test="name(.)='Rel' and name(..)!='opr'">
								<xsl:element name="opr">
									<xsl:apply-templates select="."/>
								</xsl:element>
							</xsl:when>
							<xsl:when test="( name(.)='Ind' or name(.)='Var' or name(.)='Cterm' or name(.)='Plex' ) and name(..)!='arg'">
								<xsl:element name="arg">
									<xsl:attribute name="index"><xsl:value-of select="count(preceding-sibling::*[name()='Ind' or name()='Var' or name()='Cterm' or name()='Plex'])+1"/></xsl:attribute>
									<xsl:apply-templates select="."/>
								</xsl:element>
							</xsl:when>
							<xsl:otherwise>
								<xsl:copy>
									<xsl:copy-of select="@*"/>								
									<xsl:apply-templates/>	
								</xsl:copy>
							</xsl:otherwise>	
						</xsl:choose>
					</xsl:for-each>		
				</xsl:when>
				<xsl:when test="name(.)='Cterm'">
					<xsl:for-each select="* | comment()">
						<xsl:choose>
							<xsl:when test="self::comment()">
								<xsl:call-template name="comments"/>
							</xsl:when>	
							<xsl:when test="name(.)='Ctor' and name(..)!='opc'">
								<xsl:element name="opc">
									<xsl:apply-templates select="."/>
								</xsl:element>
							</xsl:when>
							<xsl:when test="( name(.)='Ind' or name(.)='Var' or name(.)='Cterm' or name(.)='Plex' ) and name(..)!='arg'">
								<xsl:element name="arg">
									<xsl:attribute name="index"><xsl:value-of select="count(preceding-sibling::*[name()='Ind' or name()='Var' or name()='Cterm' or name()='Plex'])+1"/></xsl:attribute>
									<xsl:apply-templates select="."/>
								</xsl:element>
							</xsl:when>
							<xsl:otherwise>
								<xsl:copy>
									<xsl:copy-of select="@*"/>								
									<xsl:apply-templates/>	
								</xsl:copy>
							</xsl:otherwise>	
						</xsl:choose>
					</xsl:for-each>		
				</xsl:when>												
				<xsl:otherwise>
					<xsl:variable name="role">
						<xsl:choose>
							<xsl:when test="name(.)='Assert' or name(.)='Query'">content</xsl:when>
							<xsl:when test="name(.)='And' or name(.)='Or'">formula</xsl:when>
							<xsl:when test="name(.)='Equal'">side</xsl:when>					
						</xsl:choose>
					</xsl:variable>						
					<xsl:for-each select="* | comment()">
						<xsl:choose>
							<xsl:when test="self::comment()">
								<xsl:call-template name="comments"/>
							</xsl:when>
							<xsl:when test="name(.)!=$role">
								<xsl:element name="{$role}">
									<xsl:apply-templates select="."/>
								</xsl:element>
							</xsl:when>
							<xsl:otherwise>
								<xsl:copy>
									<xsl:copy-of select="@*"/>							
									<xsl:apply-templates/>	
								</xsl:copy>
							</xsl:otherwise>	
						</xsl:choose>
					</xsl:for-each>
				</xsl:otherwise>					
			</xsl:choose>		
		</xsl:copy>
	</xsl:template>
	
	<xsl:template match="comment()">
		<xsl:call-template name="comments"/>
	</xsl:template>
	
		<!-- preserve comments -->
	<xsl:template name="comments">
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