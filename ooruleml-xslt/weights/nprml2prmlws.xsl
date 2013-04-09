<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" indent="yes"/>
	<!--  Positionalizing Non-Positional RuleML Metaroles    -->
	<!--  Stephen Greene    "stephen.greene@nrc.ca"   -->
	<!--******************************************************************************************************************-->
	<!--  process metaroles (_r) and remove the implicityly positionalized metarole leavings the individual contants -->
	<!--  <ind>and or variables <var> in there explicitly positionalized order. All metaroles should be ordered -->
	<!--  lexicographically by name (n="name"). This can be achieved by applying the nprmlsort.xsl translator.-->
	<!--******************************************************************************************************************-->
	<!--******************************************************************************************************************-->
	<!--******************************************************************************************************************-->
	<xsl:template match="//signature">
		<signature formula="{@formula}" world="{@world}" order="{@order}">
			<xsl:choose>
				<xsl:when test="@formula = 'fact|imp'">
					<_head>
						<atom>
							<xsl:apply-templates select="_head/atom/_opr"/>
							<xsl:for-each select="_head/atom/_r">
								<ind/>
							</xsl:for-each>
						</atom>
					</_head>
				</xsl:when>
				<xsl:when test="@formula = 'cterm'">
					<_data>
						<cterm>
							<xsl:apply-templates select="_data/cterm/_opc"/>
							<xsl:for-each select="_data/cterm/_r">
								<ind/>
							</xsl:for-each>
						</cterm>
					</_data>
				</xsl:when>
			</xsl:choose>
		</signature>
	</xsl:template>
	<xsl:template match="//atom">
		<atom>
			<xsl:apply-templates select="cterm"/>
			<xsl:apply-templates select="_opr"/>
			<xsl:call-template name="CopyTags"/>
			<xsl:apply-templates select="_r"/>
		</atom>
	</xsl:template>
	<xsl:template match="//nano">
		<nano>
			<xsl:apply-templates select="_opr|_opc"/>
			<xsl:apply-templates select="_r"/>
			<xsl:call-template name="CopyTags"/>
		</nano>
	</xsl:template>
	<xsl:template match="//cterm">
		<cterm>
			<xsl:apply-templates select="_opc"/>
			<xsl:call-template name="CopyTags"/>
			<xsl:apply-templates select="./cterm"/>
			<xsl:apply-templates select="_r"/>
			
		</cterm>
	</xsl:template>
	<!-- Remove Metaroles and Metarole contents -->
	<xsl:template match="_r">
		<xsl:apply-templates select="cterm"/>
		<xsl:apply-templates select="ind|var"/>
	</xsl:template>
	
	<xsl:template match="_opc">
		<xsl:element name="_opc">
			<xsl:attribute name="ws">
				<xsl:if test="@ws">
					<xsl:value-of select="@ws"/>
				</xsl:if>
				<xsl:for-each select="../_r/@w">
					<xsl:text> </xsl:text>				
					<xsl:value-of select="."/>
				</xsl:for-each>
			</xsl:attribute>
			<xsl:copy-of select="ctor"/>
		</xsl:element>
	</xsl:template>
	
	<xsl:template match="_opr">
		<xsl:element name="_opr">
			<xsl:attribute name="ws">
				<xsl:if test="@ws">
					<xsl:value-of select="@ws"/>
				</xsl:if>
				<xsl:for-each select="../_r/@w">
					<xsl:value-of select="."/>
					<xsl:text> </xsl:text>
				</xsl:for-each>
			</xsl:attribute>
			<xsl:copy-of select="rel"/>
		</xsl:element>
	</xsl:template>
	
	<xsl:template name="CopyTags">
		<xsl:for-each select="child::node()">
			<xsl:if test="name(.) != '_r' and name(.) != '_opr' and name(.) != '_opc' and name(.) != 'cterm'">
				<xsl:copy-of select="."/>
			</xsl:if>
		</xsl:for-each>
	</xsl:template>
	<!-- Identity function, copy over all non-explicitly transformed nodes -->
	<xsl:template match="@*|node()">
		<xsl:copy>
			<xsl:apply-templates select="@*|node()"/>
		</xsl:copy>
	</xsl:template>
</xsl:stylesheet>
