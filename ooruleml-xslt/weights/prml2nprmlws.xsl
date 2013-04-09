<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" indent="yes"/>
	<xsl:template match="//signature">
		<signature formula="{@formula}" world="{@world}" order="{@order}">
			<xsl:apply-templates/>
		</signature>
	</xsl:template>
	<xsl:template match="//fact//atom | //imp//atom | //query//atom">
		<atom>
			<xsl:choose>
				<xsl:when test="cterm">
					<xsl:apply-templates select="cterm"/>
				</xsl:when>
				<xsl:otherwise>
					<xsl:apply-templates select="_opr"/>
					<xsl:call-template name="CheckSignature">
						<xsl:with-param name="childSet" select="ind|var"/>
						<xsl:with-param name="rel" select="_opr/rel"/>
						<xsl:with-param name="formula" select="string('fact|imp')"/>
					</xsl:call-template>
				</xsl:otherwise>
			</xsl:choose>
			<!--	<xsl:call-template name="CopyTags"/>-->
		</atom>
	</xsl:template>
	<xsl:template match="//fact//cterm | //imp//cterm | //query//cterm">
		<cterm>
			<xsl:apply-templates select="_opc"/>
			<xsl:call-template name="CheckSignature">
				<xsl:with-param name="childSet" select="ind|var|cterm"/>
				<xsl:with-param name="rel" select="_opc/ctor"/>
				<xsl:with-param name="formula" select="string('cterm')"/>
			</xsl:call-template>
		</cterm>
	</xsl:template>
	<xsl:template match="_opr">
		<xsl:element name="_opr">
			<xsl:apply-templates/>
		</xsl:element>
	</xsl:template>
	<xsl:template match="_opc">
		<xsl:element name="_opc">
			<xsl:if test="@ws">
			<xsl:attribute name="ws">
				<xsl:call-template name="reverseweights">
					<xsl:with-param name="str" select="@ws"/>
				</xsl:call-template>
			</xsl:attribute>
			</xsl:if>
			<xsl:apply-templates/>
		</xsl:element>
	</xsl:template>
	<xsl:template name="CheckSignature">
		<xsl:param name="childSet"/>
		<xsl:param name="rel"/>
		<xsl:param name="formula"/>
		<xsl:param name="sigs" select="//signature"/>
		<xsl:choose>
			<xsl:when test="$formula = 'fact|imp'">
				<xsl:call-template name="SelectAtomSig">
					<xsl:with-param name="sigs" select="$sigs"/>
					<xsl:with-param name="sigsCount" select="count($sigs)"/>
					<xsl:with-param name="childSet" select="$childSet"/>
					<xsl:with-param name="rel" select="$rel"/>
					<xsl:with-param name="formula" select="$formula"/>
				</xsl:call-template>
			</xsl:when>
			<xsl:when test="$formula = 'cterm'">
				<xsl:call-template name="SelectCtermSig">
					<xsl:with-param name="sigs" select="$sigs"/>
					<xsl:with-param name="sigsCount" select="count($sigs)"/>
					<xsl:with-param name="childSet" select="$childSet"/>
					<xsl:with-param name="rel" select="$rel"/>
					<xsl:with-param name="formula" select="$formula"/>
				</xsl:call-template>
			</xsl:when>
			<xsl:otherwise>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	<xsl:template name="SelectCtermSig">
		<xsl:param name="sigs"/>
		<xsl:param name="sigsCount"/>
		<xsl:param name="childSet"/>
		<xsl:param name="rel"/>
		<xsl:param name="formula"/>
		<xsl:choose>
			<xsl:when test="$sigsCount > 0">
				<xsl:choose>
					<xsl:when test="$sigs[$sigsCount]//ctor = $rel and $sigs[$sigsCount]//@formula = $formula">
						<xsl:call-template name="loop">
							<xsl:with-param name="childSet" select="$childSet"/>	
							<xsl:with-param name="sigNset" select="$sigs[$sigsCount]//@n"/>	
							<xsl:with-param name="index" select="count($childSet)"/>
							<xsl:with-param name="sigIndex" select="count($sigs[$sigsCount]//@n)"/>
						</xsl:call-template>
					</xsl:when>
					<xsl:otherwise>
						<xsl:call-template name="SelectCtermSig">
							<xsl:with-param name="sigs" select="$sigs"/>
							<xsl:with-param name="sigsCount" select="$sigsCount - 1"/>
							<xsl:with-param name="childSet" select="$childSet"/>
							<xsl:with-param name="rel" select="$rel"/>
							<xsl:with-param name="formula" select="$formula"/>
						</xsl:call-template>
					</xsl:otherwise>
				</xsl:choose>
			</xsl:when>
			<xsl:otherwise>
				<xsl:call-template name="InnerLoop">
					<xsl:with-param name="childSet" select="$childSet"/>
					<xsl:with-param name="sigNset" select="$sigs[$sigsCount]//@n"/>
					<xsl:with-param name="index" select="count($childSet)"/>
					<xsl:with-param name="sigIndex" select="count($sigs[$sigsCount]//@n)"/>
				</xsl:call-template>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	<xsl:template name="SelectAtomSig">
		<xsl:param name="sigs"/>
		<xsl:param name="sigsCount"/>
		<xsl:param name="childSet"/>
		<xsl:param name="rel"/>
		<xsl:param name="formula"/>
		<xsl:if test="$sigsCount > 0">
			<xsl:choose>
				<xsl:when test="$sigs[$sigsCount]//rel = $rel and $sigs[$sigsCount]//@formula = $formula">
					<xsl:call-template name="loop">
						<xsl:with-param name="childSet" select="$childSet"/>
						<xsl:with-param name="sigNset" select="$sigs[$sigsCount]//@n"/>
						<xsl:with-param name="index" select="count($childSet)"/>
						<xsl:with-param name="sigIndex" select="count($sigs[$sigsCount]//@n)"/>
					</xsl:call-template>
				</xsl:when>
				<xsl:otherwise>
					<xsl:call-template name="SelectAtomSig">
						<xsl:with-param name="sigs" select="$sigs"/>
						<xsl:with-param name="sigsCount" select="$sigsCount - 1"/>
						<xsl:with-param name="childSet" select="$childSet"/>
						<xsl:with-param name="rel" select="$rel"/>
						<xsl:with-param name="formula" select="$formula"/>
					</xsl:call-template>
				</xsl:otherwise>
			</xsl:choose>
		</xsl:if>
	</xsl:template>
	<xsl:template name="loop">
		<xsl:param name="childSet"/>
		<xsl:param name="sigNset"/>
		<xsl:param name="index"/>
		<xsl:param name="sigIndex"/>
		<!--	<params sig="{$sigNset[$index]}" ind = "{$childSet[$index]}"/>-->
		<xsl:choose>
			<xsl:when test="$sigIndex > 0">
				<_r n="{$sigNset[$sigIndex]}">
				<xsl:choose>
					<xsl:when test="$childSet[$index] = cterm and $childSet[$index]//ctor">
						<xsl:apply-templates select="$childSet[$index]"/>
					</xsl:when>
					<xsl:otherwise>
							<xsl:copy-of select="$childSet[$index]"/>
					</xsl:otherwise>	
				</xsl:choose>
				</_r>
				<xsl:call-template name="loop">
					<xsl:with-param name="childSet" select="$childSet"/>
					<xsl:with-param name="sigNset" select="$sigNset"/>
					<xsl:with-param name="index" select="$index - 1"/>
					<xsl:with-param name="sigIndex" select="$sigIndex - 1"/>
				</xsl:call-template>
			</xsl:when>
			<xsl:otherwise>
				<xsl:call-template name="InnerLoop">
					<xsl:with-param name="childSet" select="$childSet"/>
					<xsl:with-param name="sigNset" select="$sigNset"/>
					<xsl:with-param name="index" select="$index"/>
					<xsl:with-param name="sigIndex" select="$sigIndex"/>
				</xsl:call-template>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	<xsl:template name="InnerLoop">
		<xsl:param name="childSet"/>
		<xsl:param name="sigNset"/>
		<xsl:param name="index"/>
		<xsl:param name="sigIndex"/>
		<xsl:choose>
			<xsl:when test="$index > 0">
				<xsl:choose>
					<xsl:when test="$childSet[$index] = cterm and $childSet[$index]//ctor">
						<xsl:apply-templates select="$childSet[$index]"/>
					</xsl:when>
					<xsl:otherwise>
						<xsl:copy-of select="$childSet[$index]"/>
					</xsl:otherwise>
				</xsl:choose>
				<xsl:call-template name="InnerLoop">
					<xsl:with-param name="childSet" select="$childSet"/>
					<xsl:with-param name="sigNset" select="$sigNset"/>
					<xsl:with-param name="index" select="$index - 1"/>
					<xsl:with-param name="sigIndex" select="$sigIndex"/>
				</xsl:call-template>
			</xsl:when>
			<xsl:otherwise>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	<xsl:template name="reverseweights">
		<xsl:param name="str"/>
		<xsl:param name="res" select=" ' ' "/>
		<xsl:param name="sep" select=" ' ' "/>
		<xsl:choose>
			<xsl:when test="contains($str,' ')">
				<xsl:call-template name="reverseweights">
					<xsl:with-param name="str" select="substring-after($str,' ')"/>
					<xsl:with-param name="sep" select="' '"/>
					<xsl:with-param name="res" select="concat(substring-before($str,' '),$sep,$res)"/>
				</xsl:call-template>
			</xsl:when>
			<xsl:otherwise>
				<xsl:value-of select="concat($str,$sep,$res)"/>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	<xsl:template name="CopyTags">
		<xsl:for-each select="child::node()">
			<xsl:if test="name(.) != 'ind' and name(.) != '_opr' and name(.) != '_opc' and name(.) != 'cterm'">
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
