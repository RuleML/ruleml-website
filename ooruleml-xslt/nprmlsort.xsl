<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<!--  Sorting Non-Positional RuleML Metaroles    -->
	<!--  Stephen Greene    "stephen.greene@nrc.ca"   -->
	<!--******************************************************************************************************************-->
	<!--  process metaroles (_r) and sort them lexicographically, by name (n = "name") in descending order   -->
	<!--  intended to be used to sort metarole in preparation for nprm2prml.xsl to be run in order -->
	<!--  to translate from positionalized to unpositionalized (Kernel) RuleML  -->
	<!--******************************************************************************************************************-->
	<!--******************************************************************************************************************-->
	<!-- Within atom | nanos | cterm blocks, output from the translator will place _opc and _opr tags at the-->
	<!-- beginning of the parent, followed by sorted metaroles <_r> and individual constatns <ind> and-->
	<!-- variables <var>-->
	<!--******************************************************************************************************************-->
	<xsl:key name="relKey" match="/rulebase/signature" use="*/*/_opr/rel"/>
	<xsl:key name="ctorKey" match="/rulebase/signature" use="*/*/_opc/ctor"/>
	
	<xsl:output method="xml" indent="yes"/>
	<xsl:template match="//signature">
		
		<xsl:choose>
			<xsl:when test="@order='unsorted'">
				<signature formula="{@formula}" world="{@world}" order="sorted">
					<xsl:apply-templates/>
				</signature>
			</xsl:when>
			<xsl:otherwise>
				<xsl:copy-of select="."/>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	<xsl:template match="//atom">
		<xsl:param name="sigRel" select="key('relKey', _opr/rel)"/>
		<atom>
			<xsl:apply-templates select="cterm"/>
			<xsl:apply-templates select="_opr|_opc"/>
			<xsl:apply-templates select="ind|var"/>
						
			<xsl:choose>
				<xsl:when test="$sigRel/@order='sorted'">
					<xsl:call-template name="SortedOrder">
						<xsl:with-param name="sigRel" select="$sigRel"/>
						<xsl:with-param name="_rSet" select="_r"/>
					</xsl:call-template>
				</xsl:when>
				<xsl:otherwise>
					<xsl:apply-templates select="_r">
						<xsl:sort select="@n"/>
					</xsl:apply-templates>
				</xsl:otherwise>
			</xsl:choose>
		</atom>
	</xsl:template>
	<xsl:template match="//nanos">
		<xsl:param name="sigRel" select="key('relKey', _opr/rel)"/>
		<nanos>
			<xsl:apply-templates select="_opr|_opc"/>
			<xsl:apply-templates select="ind|var"/>
			<xsl:choose>
				<xsl:when test="$sigRel/@order='sorted'">
					<xsl:call-template name="SortedOrder">
						<xsl:with-param name="sigRel" select="$sigRel"/>
						<xsl:with-param name="_rSet" select="_r"/>
					</xsl:call-template>
				</xsl:when>
				<xsl:otherwise>
					<xsl:apply-templates select="_r">
						<xsl:sort select="@n"/>
					</xsl:apply-templates>
				</xsl:otherwise>
			</xsl:choose>
		</nanos>
	</xsl:template>
	<xsl:template match="//cterm">
	<xsl:param name="sigRel" select="key('ctorKey', _opc/ctor)"/>
		<cterm>
			<xsl:apply-templates select="_opc"/>
			<xsl:apply-templates select="ind|var"/>
			<xsl:apply-templates select="cterm"/>
			<xsl:choose>
				<xsl:when test="$sigRel/@order='sorted'">
					<xsl:call-template name="SortedOrder">
						<xsl:with-param name="sigRel" select="$sigRel"/>
						<xsl:with-param name="_rSet" select="_r"/>
					</xsl:call-template>
				</xsl:when>
				<xsl:otherwise>
					<xsl:apply-templates select="_r">
						<xsl:sort select="@n"/>
					</xsl:apply-templates>
				</xsl:otherwise>
			</xsl:choose>
		</cterm>
	</xsl:template>
	
	<xsl:template name="SortedOrder">
		<xsl:param name="sigRel"/>
		<xsl:param name="_rSet"/>
		<xsl:for-each select="$sigRel//_r/@n">			
			<xsl:call-template name="CompareSig">
				<xsl:with-param name="sigN" select="."/>
				<xsl:with-param name="_rNset" select="$_rSet/@n"/>
			</xsl:call-template>
		</xsl:for-each>
		
	</xsl:template>
	
	<xsl:template name="CompareSig">
		<xsl:param name="sigN"/>
		<xsl:param name="_rNset"/>
		<xsl:for-each select="$_rNset">
			<xsl:if test=". = $sigN">
				<xsl:copy-of select="./.."/>
			</xsl:if>
		</xsl:for-each>
	</xsl:template>
	
	<xsl:template match="_r">
		<xsl:choose>
			<xsl:when test="cterm">
				<_r n="{@n}">
					<xsl:apply-templates select="cterm"/>
				</_r>
			</xsl:when>
			<xsl:otherwise>
				<xsl:copy-of select="."/>	
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	<xsl:template match="_opr|_opc">
		<xsl:choose>
			<xsl:when test="name()='_opr'">
				<_opr>
					<xsl:apply-templates/>
				</_opr>
			</xsl:when>
			<xsl:otherwise> 
				<_opc>
					<xsl:apply-templates/>
				</_opc>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	<xsl:template match="ind">
		<ind>
			<xsl:value-of select="."/>
		</ind>
	</xsl:template>
	<xsl:template match="var">
		<var>
			<xsl:value-of select="."/>
		</var>
	</xsl:template>
	<!-- Identity function, copy over all non-explicitly transformed nodes -->
	<xsl:template match="@*|node()">
		<xsl:copy>
			<xsl:apply-templates select="@*|node()"/>
		</xsl:copy>
	</xsl:template>
</xsl:stylesheet>
