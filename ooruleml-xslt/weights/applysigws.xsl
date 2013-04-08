<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" version="1.0" encoding="UTF-8" indent="yes"/>
	<xsl:template match="//signature">
		<signature formula="{@formula}" world="{@world}" order="{@order}">
			<xsl:apply-templates/>
		</signature>
	</xsl:template>
	<xsl:template match="//fact//cterm | //imp//cterm | //query//cterm">
		<cterm>
			<xsl:apply-templates select="_opc"/>
			<xsl:call-template name="CheckSignature">
				<xsl:with-param name="rNset" select="./_r/@n"/>
				<xsl:with-param name="rSet" select="./_r"/>
				<xsl:with-param name="rel" select="_opc/ctor"/>
				<xsl:with-param name="formula" select="string('cterm')"/>
			</xsl:call-template>
			<xsl:call-template name="CopyTags"/>
		</cterm>
	</xsl:template>
	<xsl:template match="//fact//atom | //imp//atom | //query//atom">
		<atom>
			<xsl:if test="cterm">
				<xsl:apply-templates select="cterm"/>
			</xsl:if>
			<xsl:apply-templates select="_opr"/>
			<xsl:call-template name="CheckSignature">
				<xsl:with-param name="rNset" select="./_r/@n"/>
				<xsl:with-param name="rSet" select="./_r"/>
				<xsl:with-param name="rel" select="_opr/rel"/>
				<xsl:with-param name="formula" select="string('fact|imp')"/>
			</xsl:call-template>
			<xsl:call-template name="CopyTags"/>
		</atom>
	</xsl:template>
	<xsl:template name="CheckSignature">
		<xsl:param name="rNset"/>
		<xsl:param name="rSet"/>
		<xsl:param name="rel"/>
		<xsl:param name="formula"/>
		<xsl:param name="sigs" select="//signature"/>
		<xsl:choose>
			<xsl:when test="$formula = 'fact|imp'">
				<xsl:call-template name="SelectAtomSig">
					<xsl:with-param name="sigs" select="$sigs"/>
					<xsl:with-param name="sigsCount" select="count($sigs)"/>
					<xsl:with-param name="rNset" select="$rNset"/>
					<xsl:with-param name="rSet" select="$rSet"/>
					<xsl:with-param name="rel" select="$rel"/>
					<xsl:with-param name="formula" select="$formula"/>
				</xsl:call-template>
			</xsl:when>
			<xsl:when test="$formula = 'cterm'">
				<xsl:call-template name="SelectCtermSig">
					<xsl:with-param name="sigs" select="$sigs"/>
					<xsl:with-param name="sigsCount" select="count($sigs)"/>
					<xsl:with-param name="rNset" select="$rNset"/>
					<xsl:with-param name="rSet" select="$rSet"/>
					<xsl:with-param name="rel" select="$rel"/>
					<xsl:with-param name="formula" select="$formula"/>
				</xsl:call-template>
				<xsl:apply-templates select="cterm"/>
			</xsl:when>
		</xsl:choose>
	</xsl:template>
	<xsl:template name="SelectAtomSig">
		<xsl:param name="sigs"/>
		<xsl:param name="sigsCount"/>
		<xsl:param name="rNset"/>
		<xsl:param name="rSet"/>
		<xsl:param name="rel"/>
		<xsl:param name="formula"/>
		<xsl:if test="$sigsCount > 0">
			<xsl:choose>
				<xsl:when test="$sigs[$sigsCount]//@formula = $formula">
					<xsl:choose>
						<xsl:when test="$sigs[$sigsCount]//rel = $rel">
							<xsl:call-template name="SigNloop">
								<xsl:with-param name="SL_iSigN" select="count($sigs[$sigsCount]//@n)"/>
								<xsl:with-param name="SL_iRN" select="count($rNset)"/>
								<xsl:with-param name="SL_sigNset" select="$sigs[$sigsCount]//@n"/>
								<xsl:with-param name="SL_rNset" select="$rNset"/>
								<xsl:with-param name="SL_rSet" select="$rSet"/>
								<xsl:with-param name="SL_formula" select="$formula"/>
							</xsl:call-template>
						</xsl:when>
						<xsl:otherwise>
							<xsl:call-template name="SelectAtomSig">
								<xsl:with-param name="sigs" select="$sigs"/>
								<xsl:with-param name="sigsCount" select="$sigsCount - 1"/>
								<xsl:with-param name="rNset" select="$rNset"/>
								<xsl:with-param name="rSet" select="$rSet"/>
								<xsl:with-param name="rel" select="$rel"/>
								<xsl:with-param name="formula" select="$formula"/>
							</xsl:call-template>
						</xsl:otherwise>
					</xsl:choose>
				</xsl:when>
				<xsl:otherwise>
					<xsl:call-template name="SelectAtomSig">
						<xsl:with-param name="sigs" select="$sigs"/>
						<xsl:with-param name="sigsCount" select="$sigsCount - 1"/>
						<xsl:with-param name="rNset" select="$rNset"/>
						<xsl:with-param name="rSet" select="$rSet"/>
						<xsl:with-param name="rel" select="$rel"/>
						<xsl:with-param name="formula" select="$formula"/>
					</xsl:call-template>
				</xsl:otherwise>
			</xsl:choose>
		</xsl:if>
	</xsl:template>
	<xsl:template name="SelectCtermSig">
		<xsl:param name="sigs"/>
		<xsl:param name="sigsCount"/>
		<xsl:param name="rNset"/>
		<xsl:param name="rSet"/>
		<xsl:param name="rel"/>
		<xsl:param name="formula"/>
		<xsl:if test="$sigsCount > 0">
			<xsl:choose>
				<xsl:when test="$sigs[$sigsCount]//@formula = $formula">
					<xsl:choose>
						<xsl:when test="$sigs[$sigsCount]//ctor = $rel">
							<xsl:call-template name="SigNloop">
								<xsl:with-param name="SL_iSigN" select="count($sigs[$sigsCount]//@n)"/>
								<xsl:with-param name="SL_iRN" select="count($rNset)"/>
								<xsl:with-param name="SL_sigNset" select="$sigs[$sigsCount]//@n"/>
								<xsl:with-param name="SL_rNset" select="$rNset"/>
								<xsl:with-param name="SL_rSet" select="$rSet"/>
								<xsl:with-param name="SL_formula" select="$formula"/>
							</xsl:call-template>
						</xsl:when>
						<xsl:otherwise>
							<xsl:call-template name="SelectCtermSig">
								<xsl:with-param name="sigs" select="$sigs"/>
								<xsl:with-param name="sigsCount" select="$sigsCount - 1"/>
								<xsl:with-param name="rNset" select="$rNset"/>
								<xsl:with-param name="rSet" select="$rSet"/>
								<xsl:with-param name="rel" select="$rel"/>
								<xsl:with-param name="formula" select="$formula"/>
							</xsl:call-template>
						</xsl:otherwise>
					</xsl:choose>
				</xsl:when>
				<xsl:otherwise>
					<xsl:call-template name="SelectCtermSig">
						<xsl:with-param name="sigs" select="$sigs"/>
						<xsl:with-param name="sigsCount" select="$sigsCount - 1"/>
						<xsl:with-param name="rNset" select="$rNset"/>
						<xsl:with-param name="rSet" select="$rSet"/>
						<xsl:with-param name="rel" select="$rel"/>
						<xsl:with-param name="formula" select="$formula"/>
					</xsl:call-template>
				</xsl:otherwise>
			</xsl:choose>
		</xsl:if>
	</xsl:template>
	<xsl:template name="SigNloop">
		<xsl:param name="SL_iSigN"/>
		<xsl:param name="SL_iRN"/>
		<xsl:param name="SL_sigNset"/>
		<xsl:param name="SL_rNset"/>
		<xsl:param name="SL_rSet"/>
		<xsl:param name="SL_formula"/>
		<!--   	<SigNloop i="{$SL_iSigN}" j="{$SL_iRN}"/> -->
		<xsl:if test="$SL_iSigN > 0">
			<xsl:call-template name="RNloop">
				<xsl:with-param name="RL_iSigN" select="$SL_iSigN"/>
				<xsl:with-param name="RL_iRN" select="$SL_iRN"/>
				<xsl:with-param name="RL_sigNset" select="$SL_sigNset"/>
				<xsl:with-param name="RL_rNset" select="$SL_rNset"/>
				<xsl:with-param name="RL_rSet" select="$SL_rSet"/>
				<xsl:with-param name="RL_formula" select="$SL_formula"/>
			</xsl:call-template>
		</xsl:if>
	</xsl:template>
	<xsl:template name="RNloop">
		<xsl:param name="RL_iSigN"/>
		<xsl:param name="RL_iRN"/>
		<xsl:param name="RL_sigNset"/>
		<xsl:param name="RL_rNset"/>
		<xsl:param name="RL_rSet"/>
		<xsl:param name="RL_formula"/>
		<!--		<RNloop RL_sigNset="{$RL_sigNset[$RL_iSigN]}" RL_rNset="{$RL_rNset[$RL_iRN]}"/> -->
		<xsl:choose>
			<xsl:when test="$RL_sigNset[$RL_iSigN] = $RL_rNset[$RL_iRN] and $RL_iRN != 0">
				<xsl:choose>
					<xsl:when test="$RL_formula = 'cterm' and count($RL_rNset[$RL_iRN]/..//child::cterm) != 0">
						<_r n="{$RL_rNset[$RL_iRN]}" w="{$RL_rNset[$RL_iRN]/../@w}">

							<xsl:apply-templates select="$RL_rNset[$RL_iRN]/../cterm"/>
						</_r>
					</xsl:when>
					<xsl:otherwise>
						<xsl:copy-of select="$RL_rSet[$RL_iRN]"/>
					</xsl:otherwise>
				</xsl:choose>
				<xsl:call-template name="SigNloop">
					<xsl:with-param name="SL_iSigN" select="$RL_iSigN - 1"/>
					<xsl:with-param name="SL_iRN" select="count($RL_rNset)"/>
					<xsl:with-param name="SL_sigNset" select="$RL_sigNset"/>
					<xsl:with-param name="SL_rNset" select="$RL_rNset"/>
					<xsl:with-param name="SL_rSet" select="$RL_rSet"/>
					<xsl:with-param name="SL_formula" select="$RL_formula"/>
				</xsl:call-template>
			</xsl:when>
			<xsl:when test="$RL_iRN > 1">
				<xsl:call-template name="RNloop">
					<xsl:with-param name="RL_iSigN" select="$RL_iSigN"/>
					<xsl:with-param name="RL_iRN" select="$RL_iRN - 1"/>
					<xsl:with-param name="RL_sigNset" select="$RL_sigNset"/>
					<xsl:with-param name="RL_rNset" select="$RL_rNset"/>
					<xsl:with-param name="RL_rSet" select="$RL_rSet"/>
					<xsl:with-param name="RL_formula" select="$RL_formula"/>
				</xsl:call-template>
			</xsl:when>
			<xsl:otherwise>
				<_r n="{$RL_sigNset[$RL_iSigN]}" w="{$RL_sigNset[$RL_iSigN]/../@w}">
					<xsl:choose>
						<xsl:when test="ancestor::_body">
							<var/>
						</xsl:when>
						<xsl:when test="$RL_formula = 'cterm' and count($RL_sigNset[$RL_iSigN]/..//child::cterm) != 0">
							<cterm/>
						</xsl:when>
						<xsl:otherwise>
							<ind/>
						</xsl:otherwise>
					</xsl:choose>
				</_r>
				<xsl:call-template name="SigNloop">
					<xsl:with-param name="SL_iSigN" select="$RL_iSigN - 1"/>
					<xsl:with-param name="SL_iRN" select="count($RL_rNset)"/>
					<xsl:with-param name="SL_sigNset" select="$RL_sigNset"/>
					<xsl:with-param name="SL_rNset" select="$RL_rNset"/>
					<xsl:with-param name="SL_rSet" select="$RL_rSet"/>
					<xsl:with-param name="SL_formula" select="$RL_formula"/>
				</xsl:call-template>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	<!-- Cannot return to Object Oriented RuleML because order is not correspondant to signature if _r terms are implemented without being declared
	<xsl:template name="RetainNonSigRoles">
		<xsl:param name="RNS_iSigN"/>
		<xsl:param name="RNS_iRN"/>
		<xsl:param name="RNS_sigNset"/>
		<xsl:param name="RNS_rNset"/>
		<xsl:param name="RNS_rSet"/>
		<xsl:param name="RNS_formula"/>
		<xsl:if test="$RNS_iRN > 0">
			<xsl:call-template name="RNSloop">
				<xsl:with-param name="RNSL_iSigN" select="$RNS_iSigN"/>
				<xsl:with-param name="RNSL_iRN" select="$RNS_iRN"/>
				<xsl:with-param name="RNSL_sigNset" select="$RNS_sigNset"/>
				<xsl:with-param name="RNSL_rNset" select="$RNS_rNset"/>
				<xsl:with-param name="RNSL_rSet" select="$RNS_rSet"/>
				<xsl:with-param name="RNSL_formula" select="$RNS_formula"/>
			</xsl:call-template>
		</xsl:if>
	</xsl:template>
	<xsl:template name="RNSloop">
		<xsl:param name="RNSL_iSigN"/>
		<xsl:param name="RNSL_iRN"/>
		<xsl:param name="RNSL_sigNset"/>
		<xsl:param name="RNSL_rNset"/>
		<xsl:param name="RNSL_rSet"/>
		<xsl:param name="RNSL_formula"/>
		<xsl:choose>
			<xsl:when test="$RNSL_sigNset[$RNSL_iSigN] = $RNSL_rNset[$RNSL_iRN]">
				<xsl:call-template name="RetainNonSigRoles">
					<xsl:with-param name="RNS_iSigN" select="count($RNSL_sigNset)"/>
					<xsl:with-param name="RNS_iRN" select="$RNSL_iRN - 1"/>
					<xsl:with-param name="RNS_sigNset" select="$RNSL_sigNset"/>
					<xsl:with-param name="RNS_rNset" select="$RNSL_rNset"/>
					<xsl:with-param name="RNS_rSet" select="$RNSL_rSet"/>
					<xsl:with-param name="RNS_formula" select="$RNSL_formula"/>
				</xsl:call-template>
			</xsl:when>
			<xsl:when test="$RNSL_iSigN > 1">
				<xsl:call-template name="RNSloop">
					<xsl:with-param name="RNSL_iSigN" select="$RNSL_iSigN - 1"/>
					<xsl:with-param name="RNSL_iRN" select="$RNSL_iRN"/>
					<xsl:with-param name="RNSL_sigNset" select="$RNSL_sigNset"/>
					<xsl:with-param name="RNSL_rNset" select="$RNSL_rNset"/>
					<xsl:with-param name="RNSL_rSet" select="$RNSL_rSet"/>
					<xsl:with-param name="RNSL_formula" select="$RNSL_formula"/>
				</xsl:call-template>
			</xsl:when>
			<xsl:otherwise>
				<xsl:copy-of select="$RNSL_rSet[$RNSL_iRN]"/>
				<xsl:if test="$RNSL_iRN > 0">
					<xsl:call-template name="RetainNonSigRoles">
						<xsl:with-param name="RNS_iSigN" select="count($RNSL_sigNset)"/>
						<xsl:with-param name="RNS_iRN" select="$RNSL_iRN - 1"/>
						<xsl:with-param name="RNS_sigNset" select="$RNSL_sigNset"/>
						<xsl:with-param name="RNS_rNset" select="$RNSL_rNset"/>
						<xsl:with-param name="RNS_rSet" select="$RNSL_rSet"/>
						<xsl:with-param name="RNS_formula" select="$RNSL_formula"/>
					</xsl:call-template>		
				</xsl:if>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	-->
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
