<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.ruleml.org/0.9/xsd"
xmlns:ruleml="http://www.ruleml.org/0.89/xsd"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
exclude-result-prefixes="ruleml">
	
	<!--
	XSLT stylesheet for converting rulebases from RuleML 0.89 to 0.9

	See http://www.ruleml.org/0.9/#Changes for more information.

	File: 089_to_090.xslt
	Version: 1.0
	Author: Monika Machunik
	Last Modification: 2011-02-08

	Changes from RuleML 0.89 to 0.9 reflected in this document:
	
	1. <opr>, <opc> and <opf> merged into context-sensitive <op>	

	2. <Mutex> generalized as <Integrity>:

		 <Mutex>
		   <oppo>
			 a
		   </oppo>
		   <mgiv>
			 b
		   </mgiv>
		 </Mutex>

		changed to:

		<Integrity>
		   <Implies>
			 b
		   <Neg>
				 a
		   </Neg>
          </Implies>
		</Integrity>

	3. @wlab and @wref are replaced with a single attribute: @uri 
		- changed all @wlab and @wref to @uri 

	4. <RuleML> top level element is introduced, permitting (ordered) transactions of performatives    
		- added top RuleML element, moved the top attributes into it

	5. <content> renamed to <formula> in <Assert>, <Query> and <Protect>
         *** what we will do we'll actually skip content element, as in case that And was a child of content, the formula would get multiple children (initially not mentioned in main page documentation - so this is just my assumption..)

	6. existing performatives <Assert>, <Query> and <Protect> now make the 'implicit <And>' assumption for their clauses	

	- in case of <Assert> or <Protect>:
	   - @mapClosure attribute moved from <And> to enclosig <Assert> or <Protect>
	   - <And> element removed
	- in case of <Query>: no changes, as Query still allows <And> inside		

    7. (official) introduction of a 'positionalized' prefix normal form
     - <opr> (in Atom), <opc> (in Cterm) and <opf> (in Nano) is moved to the position of the first (or second, if <oid> is present) child

  Changes that are not relevant for the upgrader (and therefore not reflected here):
  
  * new sublanguage: hornlog with negation-as-failure (nafhornlog), as implemented by OO jDREW +  
  * @mapClosure and @mapDirection now added to performatives, and @closure added to <Query>
  * <degree> added to facts and rules for Fuzzy RuleML
  * @kind attribute added to <Implies> to distinguish between FOL and LP types of implication (as in the Web Rule Language)  
        
 	-->
	
	<xsl:output method="xml" version="1.0"/>
	
	<xsl:template match="/">				
		<xsl:text>&#xa;</xsl:text><!--newline-->
		<xsl:text>&#xa;</xsl:text><!--newline-->
		<xsl:apply-templates/>
	</xsl:template>
			
	<!-- change references to 0.89 xds to 0.9 xsd in the root node attributes -->		
	<xsl:template match="/*"> <!--matches the root element -->		
							  
			<!--RuleML element allows only Assert, Query or Protect inside; any other will be treated as a subtree -->
		
			<xsl:if test="name(.)='Query' or name(.)='Protect' or name(.)='Assert'">
			
						<!-- here the situation is quite complicated - we need to move root element one level down
						  plus apply all other templates to this element - but since the element is still considered
						  as root element, the apply-templates command would always call this template, leading
						  to an infinite loop. That is why below I use template names and have to call particular 
						  "sub-template" explicitly, depending on the current element name: 						  
						.-->
			
				<!--Ad. 4.<RuleML> top level element is introduced, permitting (ordered) transactions of performatives-->		
				<xsl:element name="RuleML">			
				
					<xsl:attribute name="xsi:schemaLocation">
						<xsl:variable name="url">http://www.ruleml.org/0.9/xsd</xsl:variable>
						<!-- store just the name of the schema -->
						<xsl:variable name="file" 
								select="substring-after(@xsi:schemaLocation, 'http://www.ruleml.org/0.89/xsd/')" />
						<xsl:value-of select="concat($url, ' ', $url, '/', $file)" />							
					</xsl:attribute>				
									
					<xsl:if test="name(.)='Assert'">
						<xsl:call-template name="assert_or_protect_template"/>
					</xsl:if>
					
					<xsl:if test="name(.)='Protect'">
						<xsl:call-template name="assert_or_protect_template"/>
					</xsl:if>
					
					<xsl:if test="name(.)='Query'">
						<xsl:call-template name="query_template"/>
					</xsl:if>			
					
				</xsl:element>	    		
			</xsl:if>			
			
			<!-- if it is not one of Assert, Query and Protect - treat the file as a subtree, ie don't add root RuleML node at the top -->
			
			<xsl:if test="name(.)!='Query' and name(.)!='Protect' and name(.)!='Assert'">
											
					<xsl:element name="{name(.)}">
					
						<xsl:attribute name="xsi:schemaLocation">
							<xsl:variable name="url">http://www.ruleml.org/0.9/xsd</xsl:variable>
							<!-- store just the name of the schema -->
							<xsl:variable name="file" 
									select="substring-after(@xsi:schemaLocation, 'http://www.ruleml.org/0.89/xsd/')" />
							<xsl:value-of select="concat($url, ' ', $url, '/', $file)" />							
						</xsl:attribute>						
						
						<xsl:apply-templates/>
						
					</xsl:element>
			</xsl:if>							
				    			
	</xsl:template>
	
	<!-- Ad. 7. (official) introduction of a 'positionalized' prefix normal form
     - <opr> (in Atom), <opc> (in Cterm) and <opf> (in Nano) is moved to the position of the first (or second, if <oid> is present) child -->
	<xsl:template match="ruleml:Atom">
		<xsl:element name="{name()}">
			<xsl:apply-templates select="@*"/>
			<xsl:apply-templates select="ruleml:oid"/>
			<xsl:apply-templates select="ruleml:opr"/>
			<xsl:apply-templates select="node()[name()!='opr' and name()!='oid']"/>
		</xsl:element>
	</xsl:template>
	
	<xsl:template match="ruleml:Cterm">
		<xsl:element name="{name()}">
			<xsl:apply-templates select="@*"/>
			<xsl:apply-templates select="ruleml:oid"/>
			<xsl:apply-templates select="ruleml:opc"/>
			<xsl:apply-templates select="node()[name()!='opc' and name()!='oid']"/>
		</xsl:element>
	</xsl:template>
	
	<xsl:template match="ruleml:Nano">
		<xsl:element name="{name()}">
			<xsl:apply-templates select="@*"/>
			<xsl:apply-templates select="ruleml:oid"/>
			<xsl:apply-templates select="ruleml:opf"/>
			<xsl:apply-templates select="node()[name()!='opf' and name()!='oid']"/>
		</xsl:element>		
	</xsl:template>

  <!-- Ad. 1. <opr>, <opc> and <opf> merged into context-sensitive <op>
		*** op 0.9 *** 
		within Cterm: (Ctor)
		within Nano: (Fun)
		within Atom: (Rel)

		*** opc 0.89 ***
		(Ctor)
	
		*** opf 0.89 ***
		(Fun)

		*** opr 0.89 ***
		(Rel) -->	
		
	<xsl:template match="ruleml:opr | ruleml:opc | ruleml:opf">
		<xsl:element name="op">
			<xsl:apply-templates/>
		</xsl:element>
	</xsl:template>	
		
	<!-- Ad. 2. <Mutex> generalized as <Integrity>:

		*** Mutex 0.89 *** (no attrs)
		( (oppo, mgiv?) | (mgiv, oppo) ) -> yes, there's not oid
		*** oppo 0.89 *** (no attrs)
		(And)
		*** mgiv 0.89 *** (no attrs)
		 ( Atom | And | Or ) -->

	<xsl:template match="ruleml:Mutex">
		<xsl:element name="Integrity">
			<xsl:apply-templates select="@*"/><!-- Mutex has no atttributes actually.. -->
			<xsl:element name="Implies">
				<xsl:apply-templates select="./ruleml:mgiv/@* | ./ruleml:mgiv/node()"/> <!-- mgiv has no atttributes actually.. -->
				<xsl:element name="Neg">
					<xsl:apply-templates select="./ruleml:oppo/@* | ./ruleml:oppo/node()"/>	<!-- oppo has no atttributes actually.. -->
				</xsl:element>
			</xsl:element>		
		</xsl:element>
	</xsl:template>
	
	<!-- Ad. 3. @wlab and @wref are replaced with a single attribute: @uri -->
	<xsl:template match="@wlab | @wref">
		<xsl:attribute name="uri">
			<xsl:value-of select="."/>
		</xsl:attribute>		
	</xsl:template>		

	<!-- Ad. 5. <content> renamed to <formula> in <Assert>, <Query> and <Protect>
         *** what we do we actually skip content element, as in case that And was a child of content, the formula would get multiple children 

	*** Query 0.89 ***
	(content | Atom | And | Or | Exists)

	*** Protect 0.89 ***
	( (warden | Mutex), (content | And) )

	*** Assert 0.89 ***
	( (content | And) )	

	*** content 0.89 ***
	(below Assert and Protect): ( And )
	(below Query): ( Atom | And | Or | Exists )

	(<And> in <Assert> and <Protect> is omitted, see point 6.)

	*** And 0.89 ***
	(below Assert and content): ( oid?, (formula | Atom | Implies | Equivalent | Forall)* )

	- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	*** Query 0.9 ***
	( oid?, (formula | Atom | And | Or | Exists)* )

	*** Protect 0.9 ***
	( oid?, (warden | Integrity)+, (formula | Atom | Implies | Equivalent | Forall)* )

	*** Assert 0.9 ***
	( oid?, (formula | Atom | Implies | Equivalent | Forall)* )

	*** formula 0.9 ***
	(below Assert and Protect): ( Atom | Implies | Equivalent | Forall )	
	(below Query): (Atom | And | Or | Exists) 

    
	Ad. 6. remove <And> element in <Assert> and <Protect>, move @mapClosure attribute from <And> to the enclosig Assert or Protect element 

	*** Query 0.89 ***
	(content | Atom | And | Or | Exists)

	*** Protect 0.89 ***
	( (warden | Mutex), (content | And) )

	*** Assert 0.89 ***
	( (content | And) )	

	*** And 0.89 ***
	(below Assert and content): ( oid?, (formula | Atom | Implies | Equivalent | Forall)* )
	(below Query, Implies, Exists, And/Or): ( oid?, (formula | Atom | And | Or)* )
	(below oppo): ( oid?, (formula | Atom), (formula | Atom) )
	- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	*** Query 0.9 ***
	( oid?, (formula | Atom | And | Or | Exists)* )

	*** Protect 0.9 ***
	( oid?, (warden | Integrity)+, (formula | Atom | Implies | Equivalent | Forall)* )

	*** Assert 0.9 ***
	( oid?, (formula | Atom | Implies | Equivalent | Forall)* ) -->		
				 
	<xsl:template match="ruleml:Assert|ruleml:Protect" name="assert_or_protect_template">		
		<xsl:element name="{name()}">		
				<xsl:apply-templates select="./ruleml:And/@*"/>
				
				<xsl:apply-templates select="./ruleml:content/ruleml:And/@*"/>
				
				<xsl:apply-templates select="@*[name()!='xsi:schemaLocation']"/>
				
				<xsl:apply-templates select="./ruleml:And/ruleml:oid"/>
				
				<xsl:apply-templates select="./ruleml:content/ruleml:And/ruleml:oid"/>
				
				<xsl:apply-templates select="./ruleml:Mutex | ./comment()"/>
							
				<xsl:apply-templates select="./ruleml:And/node()[name()!='oid']"/><!-- this will work fine, as there cannot be multiple Ands under Assert of Protect -->
				
				<xsl:apply-templates select="./ruleml:content/ruleml:And/node()[name()!='oid']"/><!-- this will work fine, as there cannot be multiple contents under Assert of Protect, and according to the content model the content must contain only exactly one And element -->     				   				
								
		</xsl:element>
	</xsl:template>				 

	<!-- just remove 'content'-->
	<xsl:template match="ruleml:Query" name="query_template">	
		<xsl:element name="{name()}">												
				
				<xsl:apply-templates select="@*[name()!='xsi:schemaLocation']"/>																
				
				<xsl:apply-templates select="./ruleml:content/node() | ./*[name()!='content'] | ./comment()"/>			
				
		</xsl:element>			
	</xsl:template>
				 
		
	<!-- copy all attributes, except as above -->
	<xsl:template match="@*">
		<xsl:copy-of select="."/>
	</xsl:template>	
	
	<!-- copy everything except the old namespace -->
	<xsl:template match="*">
		<xsl:element name="{name()}" >			
			<xsl:apply-templates select="node()|@*"/>
		</xsl:element>				
	</xsl:template>	

  <!-- preserve comments -->
	<xsl:template match="comment()">
		<xsl:text>&#xa;</xsl:text><!--newline-->
		<!-- prevent commented-out code from being escaped -->
		<xsl:text disable-output-escaping="yes">&lt;!--</xsl:text>
		<xsl:value-of disable-output-escaping="yes" select="."/>
		<xsl:text disable-output-escaping="yes">--></xsl:text>		
		<xsl:text>&#xa;</xsl:text><!--newline-->
	</xsl:template>
  	
</xsl:stylesheet>