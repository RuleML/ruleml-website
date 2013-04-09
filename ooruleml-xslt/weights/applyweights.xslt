<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" version="1.0" encoding="UTF-8" indent="yes"/>

	<xsl:template match="_opr">
		<xsl:element name="_opr">
			<xsl:apply-templates/>
		</xsl:element>
	</xsl:template>
	
	<xsl:template match="_opc">
		<xsl:choose>
			<xsl:when test="ancestor-or-self::signature">
			</xsl:when>
			<xsl:otherwise>
				<xsl:element name="_opc">
					<xsl:element name="_ctor">
						<xsl:value-of select="./ctor"/>
					</xsl:element>
				</xsl:element>
				<xsl:call-template name="ProcessRoles">
					<xsl:with-param name="metaroles" select="../_r"/>
					<xsl:with-param name="weights" select="string(@ws)"/>
					<xsl:with-param name="numRoles" select="count(../_r)"/>
				</xsl:call-template>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	
	<xsl:template match="_r">
		<xsl:if test="ancestor::signature">
			<xsl:copy-of select="."/>
		</xsl:if>
	</xsl:template>
	
	<xsl:template name="ProcessRoles">
		<xsl:param name="metaroles"/>
		<xsl:param name="weights"/>
		<xsl:param name="numRoles"/>
		<xsl:if test="$numRoles > 0">
		<xsl:choose>
			<xsl:when test="string-length($weights) > 2">
				<xsl:element name="_r">
					<xsl:attribute name="n"><xsl:value-of select="$metaroles[$numRoles]/@n"/></xsl:attribute>
					<xsl:attribute name="w"><xsl:value-of select="substring-before($weights, ' ')"/></xsl:attribute>
					<xsl:choose>
						<xsl:when test="$metaroles[$numRoles]/child::cterm">
							<xsl:apply-templates select="$metaroles[$numRoles]/cterm"/>
						</xsl:when>
						<xsl:otherwise>
							<xsl:copy-of select="$metaroles[$numRoles]/child::node()"/>
						</xsl:otherwise>
					</xsl:choose>
				</xsl:element>
				<xsl:call-template name="ProcessRoles">
					<xsl:with-param name="metaroles" select="$metaroles"/>
					<xsl:with-param name="weights" select="substring-after($weights, ' ')"/>
					<xsl:with-param name="numRoles" select="$numRoles - 1"/>
				</xsl:call-template>
			</xsl:when>
			<xsl:otherwise>
				<xsl:element name="_r">
					<xsl:attribute name="n"><xsl:value-of select="$metaroles[$numRoles]/@n"/></xsl:attribute>
					<xsl:choose>
						<xsl:when test="$metaroles[$numRoles]/child::cterm">
							<xsl:apply-templates select="cterm"/>
						</xsl:when>
						<xsl:otherwise>
							<xsl:copy-of select="$metaroles[$numRoles]/child::node()"/>
						</xsl:otherwise>
					</xsl:choose>
				</xsl:element>
				
				<xsl:call-template name="ProcessRoles">
					<xsl:with-param name="metaroles" select="$metaroles"/>
					<xsl:with-param name="weights" select="$weights"/>
					<xsl:with-param name="numRoles" select="$numRoles - 1"/>
				</xsl:call-template>
			</xsl:otherwise>
		</xsl:choose>
		</xsl:if>
	</xsl:template>

	<xsl:template name="CopyRoleContents">
		<xsl:for-each select="child::node()">
			<xsl:if test="name(.) != '_r' and name(.) != '_opr' and name(.) != '_opc' and name(.) != 'cterm'">
				<xsl:copy-of select="."/>
			</xsl:if>
		</xsl:for-each>
	</xsl:template>

	<xsl:template match="@*|node()">
		<xsl:copy>
			<xsl:apply-templates select="@*|node()"/>
		</xsl:copy>
	</xsl:template>

</xsl:stylesheet>
