<?xml version="1.0"?>
<?xml-stylesheet type="text/xsl" href="C:\Duong\XMLSample\XSLT\Duong.xsl"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
	<!-- This stylesheet transforms the functional part of RFML to RuleML -->

	<!-- Version for RuleML 0.9              2005-10-29  -->
	<!-- Adapted from earlier version by Doan Dai Duong and Le Thi Thu Thuy-->

	<!-- Version for RuleML 1.0              2013-04-28  -->
	<!-- Harold Boley  -->

	<!-- Comments use Relfun's Prolog-like presentation syntax for RFML -->
  	<!-- Assumes valid ft elements, which have at least two children -->
  	<!-- per="open" is the default attribute value for the Fun element -->
	<!-- This stylesheet also handles RFML with higher-order logic calling an operator variable and the special case where a struc is the first child of pattop and callop -->
	
	<xsl:template match="/rfml">
		<Assert>
			<xsl:apply-templates/>
		</Assert>
	</xsl:template>
	
	<xsl:template match="ft">
		<xsl:choose>

		  	<!-- HEAD :& FOOT. -->
			<xsl:when test="count(child::*)=2">
				<Equal oriented="yes">
					<xsl:apply-templates select="pattop"/>
					<xsl:apply-templates select="con|var|anon|struc|callop|is|tup|dom"/>
				</Equal>
			</xsl:when>
			<xsl:otherwise>
				
				<xsl:choose>  <!-- @@@MERGE INTO ABOVE choose -->

		  	        <!-- HEAD :- PREM1, ..., PREMn & FOOT. with n>1 -->				
					<xsl:when test="count(child::*)>3">
						<Implies>
							<And>
								<xsl:for-each select="(con|var|anon|struc|callop|is|tup|dom)[not(position()=last())]">
											<xsl:apply-templates select="."/>
								</xsl:for-each>
							</And>
							<Equal oriented="yes">
								<xsl:apply-templates select="pattop" mode="rule"/>
								<xsl:apply-templates select="(con|var|anon|struc|callop|is|tup|dom)[position()=last()]"/>
							</Equal>
						</Implies>
					</xsl:when>
					
					<!-- Exactly three child elements -->
		  	        <!-- HEAD :- PREM & FOOT. -->	
					<xsl:otherwise>
						<Implies>
							<xsl:for-each select="(con|var|anon|struc|callop|is|tup|dom)[not(position()=last())]">
							<xsl:choose>
								<xsl:when test="name(.)='callop'">
											<xsl:apply-templates select="." mode="atom"/>
								</xsl:when>							
								<xsl:otherwise>
											<xsl:apply-templates select="."/>								
								</xsl:otherwise>
							</xsl:choose>
							</xsl:for-each>
							<Equal oriented="yes">
								<xsl:apply-templates select="pattop" mode="rule"/>
								<xsl:apply-templates select="(con|var|anon|struc|callop|is|tup|dom)[position()=last()]"/>
							</Equal>
						</Implies>
						
					</xsl:otherwise>
				</xsl:choose>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>

	<!-- Application of the form FUN-BEING-CALLED(...) -->
    <xsl:template match="callop">
		<Expr>
			<xsl:for-each select="(con|var|anon|struc|callop|is|tup|dom)">
			  <xsl:choose>
				<xsl:when test="position()=1">
					<xsl:choose>
							<!-- Handle the special case where the first child element is a struc -->
							<!-- op[...](...) -->
							<xsl:when test="name(.)='struc'">
								<xsl:apply-templates select="." mode="active"/>
							</xsl:when>
							<!-- Handle higher-order logic calling an operator variable -->
							<!-- V(...) -->
							<xsl:when test="name(.)='var'">
								<xsl:apply-templates select="." mode="active"/>  <!-- @@@WHY mode="active" HERE? -->
							</xsl:when>
							<!-- op(...) AND op(...)(...) --> <!-- @@@callop OF callop CASE NOT TREATED SEPARATELY? -->
							<xsl:otherwise>
								<Fun per="value">
									<xsl:value-of select="(.)[position()=1]"/>
								</Fun>
							</xsl:otherwise>
					</xsl:choose>
				</xsl:when>
				<xsl:otherwise>
						<xsl:apply-templates select="."/>
				</xsl:otherwise>
			  </xsl:choose>
			</xsl:for-each>
		</Expr>
	</xsl:template>

	<!-- Application of the form REL-BEING-CALLED(...) , inline comments of FUN-BEING-CALLED(...) also apply here -->
	<xsl:template match="callop" mode="atom">
		<Atom>
			<xsl:for-each select="(con|var|anon|struc|callop|is|tup|dom)">
			<xsl:choose>
				<xsl:when test="position()=1">
					<xsl:choose>
							<xsl:when test="name(.)='struc'">
								<xsl:apply-templates select="." mode="active"/>
							</xsl:when>
							<!--Handle higher-order logic calling an operator variable -->
							<xsl:when test="name(.)='var'">
								<xsl:apply-templates select="." mode="active"/>  <!-- @@@WHY mode="active" HERE? -->
							</xsl:when>
							<xsl:otherwise>
								<Rel per="value">
									<xsl:value-of select="(.)[position()=1]"/>
								</Rel>
							</xsl:otherwise>
					</xsl:choose>
				</xsl:when>
				<xsl:otherwise>
						<xsl:apply-templates select="."/>
				</xsl:otherwise>
			</xsl:choose>
			</xsl:for-each>
		</Atom>
	</xsl:template>


	<!-- @@@THE NEXT TWO templateS SEEM EQUIVALENT SO mode="rule" MAY BE REDUNDANT -->
	
	<!-- Application of the form FUN-BEING-DEFINED(...) -->
	<xsl:template match="pattop">
		<Expr>
			<!-- Handle the special case where the first child element is a struc -->
			<xsl:choose>
				<xsl:when test="not(struc[position()=1])">
					<Fun per="value">
						<xsl:value-of select="(con|dom)[position()=1]"/>
					</Fun>
				</xsl:when>
				<xsl:otherwise>
					<xsl:apply-templates select="struc[position()=1]" mode="active"/>  <!-- @@@WHY mode="active" HERE? -->
				</xsl:otherwise>
			</xsl:choose>
			<xsl:for-each select="(con|var|anon|struc|tup|dom)[position()>1]">
				<xsl:apply-templates select="."/>
			</xsl:for-each>
		</Expr>
	</xsl:template>

	<!-- Application of the form FUN-BEING-DEFINED(...) -->
	<xsl:template match="pattop" mode="rule">
		<Expr>
			<!-- Handle the special case where the first child element is a struc -->
			<xsl:choose>
				<xsl:when test="(struc[position()=1])">
					<xsl:apply-templates select="struc[position()=1]" mode="active"/>  <!-- @@@WHY mode="active" HERE? -->
				</xsl:when>
				<xsl:otherwise>
					<Fun per="value">
						<xsl:value-of select="(con|dom)[position()=1]"/>
					</Fun>
				</xsl:otherwise>
			</xsl:choose>
			<xsl:for-each select="(con|var|anon|struc|tup|dom)[position()>1]">
				<xsl:apply-templates select="."/>
			</xsl:for-each>
		</Expr>
	</xsl:template>

	
	<!-- The struc op[...] is used as a passive operator in a pattop: op[...][...] -->	
	<xsl:template match="struc">
		<Expr>
			<Fun per="copy">
				<xsl:value-of select="con[position()=1]"/>
			</Fun>
			<xsl:for-each select="(con|var|anon|struc|is|tup)[position()>1]">
				<xsl:apply-templates select="."/>
			</xsl:for-each>
		</Expr>
	</xsl:template>

	<!-- The struc op[...] is used as an active operator in a callop: op[...](...) -->
	<xsl:template match="struc" mode="active">
		<Expr per="value">
			<Fun per="copy">
				<xsl:value-of select="con[position()=1]"/>
			</Fun>
			<xsl:for-each select="(con|var|anon|struc|is|tup)[position()>1]">
				<xsl:apply-templates select="."/>
			</xsl:for-each>
		</Expr>
	</xsl:template>
	
	<xsl:template match="is">
		<Equal oriented="yes">
			<xsl:for-each select="con|var|anon|struc|callop|tup">
				<xsl:apply-templates select="."/>
			</xsl:for-each>
		</Equal>
	</xsl:template>
	
	<xsl:template match="dom">
		<Set>
			<xsl:for-each select="con">
				<xsl:apply-templates select="."/>
			</xsl:for-each>
		</Set>
	</xsl:template>

	<xsl:template match="tup">
		<Plex>
			<xsl:choose>
				<xsl:when test="rest">
					<xsl:for-each select="(con|var|anon|struc|pattop|callop|tup)[not(position()=last())]">
						<xsl:apply-templates select="."/>
					</xsl:for-each>
					<xsl:choose>
						<xsl:when test="rest">
							<repo>
								<xsl:apply-templates select="(var|anon|tup)[position()=last()]"/>
							</repo>
						</xsl:when>
					</xsl:choose>
				</xsl:when>
				<xsl:otherwise>
					<xsl:for-each select="con|var|anon|struc|pattop|callop">
						<xsl:apply-templates select="."/>
					</xsl:for-each>
				</xsl:otherwise>
			</xsl:choose>
		</Plex>
	</xsl:template>

	<xsl:template match="var">
		<Var>
			<xsl:value-of select="."/>
		</Var>
	</xsl:template>

	<xsl:template match="var" mode="active">
		<Var per="value">
			<xsl:value-of select="."/>
		</Var>
	</xsl:template>

	<xsl:template match="con">
		<Ind>
			<xsl:value-of select="."/>
		</Ind>
	</xsl:template>

	<xsl:template match="anon">
		<Var>
		</Var>
	</xsl:template>

</xsl:stylesheet>
