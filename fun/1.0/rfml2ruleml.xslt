<?xml version="1.0"?>
<?xml-stylesheet type="text/xsl" href="C:\Duong\XMLSample\XSLT\Duong.xsl"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
	<!-- This stylesheet transforms the functional part of RFML to RuleML 0.9 -->
	<!-- Vesrion              2005-10-29  -->
	<!-- Harold Boley  -->
	<!-- Adapted from earlier vesion by Doan Dai Duong and Le Thi Thu Thuy-->
  	<!-- "semi" is the default attribute for Fun element -->
	<!-- This stylesheet also handles high-ordered logic RFML and a special case where "struct" is the first element of pattop and callop -->
	
	<xsl:template match="/rfml">
		<Assert>
			<xsl:apply-templates/>
		</Assert>
	</xsl:template>
	
	<xsl:template match="ft">
		<xsl:choose>
			<xsl:when test="count(child::*)=2">
				<Equal oriented="yes">
					<xsl:apply-templates select="pattop"/>
					<xsl:apply-templates select="con|var|anon|struc|callop|is|tup|dom"/>
				</Equal>
			</xsl:when>
			<xsl:otherwise>
				
				<xsl:choose>
				
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
					
					<!--Has only three elements -->
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
	
<xsl:template match="callop">
		<Expr>
			<!--Handle a special case where the first element is struc-->
			<xsl:for-each select="(con|var|anon|struc|callop|is|tup|dom)">
			<xsl:choose>
				<xsl:when test="position()=1">
					<xsl:choose>
							<xsl:when test="name(.)='struc'">
								<xsl:apply-templates select="." mode="active"/>
							</xsl:when>
							<!--Handle high-ordered logic-->
							<xsl:when test="name(.)='var'">
								<xsl:apply-templates select="." mode="active"/>
							</xsl:when>
						<xsl:otherwise>
							<Fun in="yes">
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


	<xsl:template match="callop" mode="atom">
		<Atom>
			<xsl:for-each select="(con|var|anon|struc|callop|is|tup|dom)">
			<xsl:choose>
				<xsl:when test="position()=1">
					<xsl:choose>
							<xsl:when test="name(.)='struc'">
								<xsl:apply-templates select="." mode="active"/>
							</xsl:when>
							<!--Handle high-ordered logic-->
							<xsl:when test="name(.)='var'">
								<xsl:apply-templates select="." mode="active"/>
							</xsl:when>
						<xsl:otherwise>
							<Rel in="yes">
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

	<xsl:template match="pattop">
		<Expr>
			<!--Handle a special case where the first element is struc -->
			<xsl:choose>
				<xsl:when test="not(struc[position()=1])">
					<Fun in="yes">
						<xsl:value-of select="(con|dom)[position()=1]"/>
					</Fun>
				</xsl:when>
				<xsl:otherwise>
					<xsl:apply-templates select="struc[position()=1]" mode="active"/>
				</xsl:otherwise>
			</xsl:choose>
			<xsl:for-each select="(con|var|anon|struc|tup|dom)[position()>1]">
				<xsl:apply-templates select="."/>
			</xsl:for-each>
		</Expr>
	</xsl:template>

	<xsl:template match="pattop" mode="rule">
		<Expr>
			<!--Handle a special case where the first element is struc -->
			<xsl:choose>
				<xsl:when test="(struc[position()=1])">
					<xsl:apply-templates select="struc[position()=1]" mode="active"/>
				</xsl:when>
				<xsl:otherwise>
					<Fun in="yes">
						<xsl:value-of select="(con|dom)[position()=1]"/>
					</Fun>
				</xsl:otherwise>
			</xsl:choose>
			<xsl:for-each select="(con|var|anon|struc|tup|dom)[position()>1]">
				<xsl:apply-templates select="."/>
			</xsl:for-each>
		</Expr>
	</xsl:template>
	
	<xsl:template match="struc">
		<Expr>
			<Fun in= "no">
				<xsl:value-of select="con[position()=1]"/>
			</Fun>
			<xsl:for-each select="(con|var|anon|struc|is|tup)[position()>1]">
				<xsl:apply-templates select="."/>
			</xsl:for-each>
		</Expr>
	</xsl:template>
<!--Where struc is the first element of a function-->
	<xsl:template match="struc" mode="active">
		<Expr in="yes">
			<Fun in="no">
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
		<Var in="yes">
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
			<xsl:value-of select="."/>
		</Var>
	</xsl:template>
</xsl:stylesheet>
