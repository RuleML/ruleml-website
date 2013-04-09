<?xml version="1.0"?>
<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns:ruleml="http://www.ruleml.org/0.9/xsd"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns="http://www.ruleml.org/0.9/xsd"
>

<!--
		XSLT stylesheet for normalizing 0.89 RuleML documents which is built upon
		the 0.88 version and hasn't been extensively tested.

		Support for the following tags (new as of 0.89) has been added:
		Reify (arg)
		Data (arg)
		Skolem (arg)
		Protect (content)
		Mutex (warden)
		oppo (none)
		mgiv (none)
		repo (none)
		resl (none)
		Hterm (various)
		op (none)
		Con (op)

		Not yet supported: Set, Get, SlotProd, InstanceOf, SubclassOf, Forall, Equivalent, Plex.

		oid's within Ands also cause problems in this version.

	    All skipped role tags are reconstructed, resulting in fully-expanded, normalized
		RuleML which is	compatible with RDF.

		See http://www.ruleml.org/0.89/#XSLT-Based%20Normalizer for more information.

		File: 089_normalizer.xslt
		Version: 0.5
		Last Modification: 2005-07-15

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
	
	<xsl:variable name="op_found">false</xsl:variable>
	
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
							<!--originally opf-->
							<xsl:when test="name(.)='Fun' and name(..)!='op'">
								<xsl:element name="op">
									<xsl:apply-templates select="."/>
								</xsl:element>
							</xsl:when>
							<xsl:when test="( name(.)='Ind' or name(.)='Var' or name(.)='Cterm' or name(.)='Plex' or name(.)='Reify' or name(.)='Data' or name(.)='Skolem' ) and name(..)!='arg'">
								<xsl:element name="arg">
									<xsl:attribute name="index"><xsl:value-of select="count(preceding-sibling::*[name()='Ind' or name()='Var' or name()='Cterm' or name()='Plex' or name()='Reify' or name()='Data' or name()='Skolem'])+1"/></xsl:attribute>
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
							<!-- was originally opr -->
							<xsl:when test="name(.)='Rel' and name(..)!='op'">
								<xsl:element name="op">
									<xsl:apply-templates select="."/>
								</xsl:element>
							</xsl:when>
							<xsl:when test="( name(.)='Ind' or name(.)='Var' or name(.)='Cterm' or name(.)='Plex' or name(.)='Reify' or name(.)='Data' or name(.)='Skolem' ) and name(..)!='arg'">
								<xsl:element name="arg">
									<xsl:attribute name="index"><xsl:value-of select="count(preceding-sibling::*[name()='Ind' or name()='Var' or name()='Cterm' or name()='Plex' or name()='Reify' or name()='Data' or name()='Skolem'])+1"/></xsl:attribute>
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
							<!-- was originally opc-->
							<xsl:when test="name(.)='Ctor' and name(..)!='op'">
								<xsl:element name="op">
									<xsl:apply-templates select="."/>
								</xsl:element>
							</xsl:when>
							<xsl:when test="( name(.)='Ind' or name(.)='Var' or name(.)='Cterm' or name(.)='Plex' or name(.)='Reify' or name(.)='Data' or name(.)='Skolem' ) and name(..)!='arg'">
								<xsl:element name="arg">
									<xsl:attribute name="index"><xsl:value-of select="count(preceding-sibling::*[name()='Ind' or name()='Var' or name()='Cterm' or name()='Plex' or name()='Reify' or name()='Data' or name()='Skolem'])+1"/></xsl:attribute>
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
				<xsl:when test="name(.)='Hterm'">
					<xsl:for-each select="* | comment()">
						<xsl:choose>
							<xsl:when test="self::comment()">
								<xsl:call-template name="comments"/>
							</xsl:when>	
							<xsl:when test="( position() = 1 or name(preceding-sibling)='oid' ) and name(.)!='op' and name(.)!='oid' and name(..)!='op'">
								<xsl:element name="op">
									<xsl:apply-templates select="."/>
								</xsl:element>
							</xsl:when>
							<xsl:when test="( name(.)='Con' or name(.)='Var' or name(.)='Reify' or name(.)='Hterm' or name(.)='Skolem' ) and name(..)!='arg'">
								<xsl:element name="arg">
									<xsl:attribute name="index"><xsl:value-of select="count(preceding-sibling::*[name()='Con' or name()='Var' or name()='Hterm' or name()='Reify' or name()='Skolem'])"/></xsl:attribute>
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
				<xsl:when test="name(.)='Protect'">
					<xsl:for-each select="* | comment()">
						<xsl:choose>
							<xsl:when test="self::comment()">
								<xsl:call-template name="comments"/>
							</xsl:when>	
							<!-- Was Mutex before Integrity -->
							<xsl:when test="name(.)='Integrity' and name(..)!='warden'">
								<xsl:element name="warden">
									<xsl:apply-templates select="."/>
								</xsl:element>
							</xsl:when>
							<xsl:when test="name(.)='And' and name(..)!='content'">
								<xsl:element name="content">
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
				<xsl:when test="name(.)='Reify'">				
					<xsl:apply-templates/>	
				</xsl:when>
				<xsl:when test="name(.)='Integrity'">
					<xsl:for-each select="* | comment()">
						<xsl:choose>
							<xsl:when test="self::comment()">
								<xsl:call-template name="comments"/>
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
							<xsl:when test="name(.)='Assert' or name(.)='And' or name(.)='Or'">formula</xsl:when>
							<!--RuleML use to be Assert in this situation-->
							<xsl:when test="name(.)='RuleML' or name(.)='Query'">content</xsl:when>
							<xsl:when test="name(.)='Equal'">side</xsl:when>	
							<xsl:when test="name(.)='Neg'">strong</xsl:when>										
							<xsl:when test="name(.)='Naf'">weak</xsl:when>																	
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