<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.ruleml.org/0.91/xsd"
xmlns:ruleml="http://www.ruleml.org/0.9/xsd"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
exclude-result-prefixes="ruleml">
	
	<!--
	XSLT stylesheet for converting rulebases from RuleML 0.9 to 0.91

	See http://www.ruleml.org/0.91/#Changes for more information.

	File: 090_to_091.xslt
	Version: 1.0
	Author: Monika Machunik
	Last Modification: 2011-01-29

	Changes from RuleML 0.9 to 0.91 reflected in this document:
	
	1. Nano and Cterm changed to Expr, with varying Fun's "in" attribute:
	 	
	   - <Cterm>
          <Ctor>book</Ctor>
       ..
        
     was changed to
      
       <Expr>
          <Fun in="no">book</Fun>
        ..
        
	   - <Nano>
         <Fun>fac</Fun>
       ..
        
     was changed to
      
        <Expr>
          <Fun in="yes">fac</Fun>
        ..

  2. Protect + Integrity construct changed to Entails
    
     - <Protect>
         <Integrity>
            <And>expr1</And>
         </Integrity>
       expr2
       ..
       
     was changed to
      
       <Assert>
         <Entails>
           <Rulebase>expr2</Rulebase>
           <Rulebase>expr1</Rulebase>           
         </Entails>       
            
    3. Inside Implies, the @kind attribute was changed to @material attribute, with "fo" and "lp" values changed to "yes" and "no", respectively
     
    4. Inside Equal, side role tags changed to separate lhs and rhs (these are still optional tags) 
    *** note: assuming there's no assymetric "side" role (always either both "sides" are present or none)                
    
	Other changes (not reflected here):
	    
  * Slot names can no longer contain <Skolem>, <Var> or <Reify>   
  * Not allowing arbitrary XML in Reify element (only valid RuleML)
  
  
  Changes that are not relevant for the upgrader (and therefore not reflected here):
  
  * implicit Rulebase assumption (instead of And assumption) inside an Assert element
  * Added Rectract performative
  * Allowing arbitrary XML in the Data element                  
  * Introduced @mapMaterial attribute
  * Introduced @oriented attribute inside Equal
  * Introduced @val attribute inside Fun             
    
 	-->
	
	<xsl:output method="xml" version="1.0"/>
	
	<xsl:template match="/">				
		<xsl:text>&#xa;</xsl:text><!--newline-->
		<xsl:text>&#xa;</xsl:text><!--newline-->
		<xsl:apply-templates />
	</xsl:template>
		
	<!-- change references to 0.9 xds to 0.91 xsd in the root node attributes -->
  <xsl:template match="/*"> <!--matches the root element -->		
		<xsl:element name="{name(.)}">			
			<xsl:attribute name="xsi:schemaLocation">
				<xsl:variable name="url">http://www.ruleml.org/0.91/xsd</xsl:variable>
				<!-- store just the name of the schema -->
				<xsl:variable name="file" 
						select="substring-after(@xsi:schemaLocation, 'http://www.ruleml.org/0.9/xsd/')" />
				<xsl:value-of select="concat($url, ' ', $url, '/', $file)" />		
			</xsl:attribute>						
			<xsl:apply-templates/>			
		</xsl:element>	    
	</xsl:template>

  <!-- Ad. 1a. change <Cterm><Ctor>book</Ctor>.. to <Expr in="no"><Fun>book</Fun>.. -->	
	<xsl:template match="ruleml:Cterm">
                                  
     <!-- *** Cterm 0.9 ***
     ( (op | Ctor), (slot)*, (resl)?, (arg|Ind|Data|Skolem|Var|Reify|Cterm|Plex)*, (repo)?, (slot)*, (resl)? )
          
     *** op 0.9 ***
     (Ctor)
      
     *** Expr 0.91 ***
     (oid?, (op|Fun), (slot)*, (resl)?,(arg|Ind|Data|Skolem|Var|Reify|Expr|Plex)*,(repo)?, (slot)*, (resl)?)
     
     *** op 0.91 ***
     (Fun) --> 	
     
		<xsl:element name="Expr">
			  		  
		  <xsl:apply-templates select="@* | ruleml:oid"/>
        
		  <xsl:if test="./*[name()='op']">
		  	  <xsl:element name="op">
					 <xsl:apply-templates select="@*"/>				  
					 <xsl:element name="Fun">				        			
						  <xsl:attribute name="in">no</xsl:attribute>
						  <xsl:apply-templates select="ruleml:op/ruleml:Ctor/node()"/>
					</xsl:element>                 				 
		  	  </xsl:element>
		  </xsl:if>
		  
		<xsl:if test="./*[name()='Ctor']">		  	  				
			 <xsl:element name="Fun">				        			
				  <xsl:attribute name="in">no</xsl:attribute>
				  <xsl:apply-templates select="ruleml:Ctor/node()"/>				
		  	  </xsl:element>
		  </xsl:if>
		  	        
		  <xsl:apply-templates select="*[name() != 'Ctor' and name() != 'op' and name()!='oid']"/>
        	
    </xsl:element>                  	
	</xsl:template>
	
	<!-- Ad. 1b. change <Nano><Fun>fun</Fun>.. to <Expr in="yes"><Fun>fun</Fun>.. -->	
	<xsl:template match="ruleml:Nano">  		
		
		<xsl:element name="Expr">		
		
		<!-- *** Nano 0.9 ***
		( oid?, (op | Fun), (arg | Ind | Data | Skolem | Var | Reify | Cterm | Plex)* ) 
		 *** Expr 0.91 ***
		 (oid?, (op|Fun), (slot)*, (resl)?,(arg|Ind|Data|Skolem|Var|Reify|Expr|Plex)*,(repo)?, (slot)*, (resl)?) -->

		  <xsl:apply-templates select="@* | ruleml:oid"/>
        
		  <xsl:if test="./*[name()='op']">
		  	  <xsl:element name="op">
					 <xsl:apply-templates select="@*"/>				  
					 <xsl:element name="Fun">				        			
						  <xsl:attribute name="in">yes</xsl:attribute>
						  <xsl:apply-templates select="ruleml:op/ruleml:Fun/node()"/>
					</xsl:element>                 				 
		  	  </xsl:element>
		  </xsl:if>
		  
		<xsl:if test="./*[name()='Fun']">		  	  				
			 <xsl:element name="Fun">				        			
				  <xsl:attribute name="in">yes</xsl:attribute>
				  <xsl:apply-templates select="ruleml:Fun/node()"/>				
		  	  </xsl:element>
		  </xsl:if>
		  	        
		  <xsl:apply-templates select="*[name() != 'Fun' and name() != 'op' and name()!='oid']"/>          		  
        	
		</xsl:element>                  	
	</xsl:template>
	
	<!-- Ad. 2. change <Protect><Integrity><And>expr1</And></Integrity>expr2.. to <Assert><Entails><Rulebase>expr2</Rulebase><Rulebase>expr1</Rulebase></Entails> -->	    
	
	<xsl:template match="ruleml:Protect">  	
		
  	   <xsl:element name="Assert">
  	   
		   <xsl:apply-templates select="@*|ruleml:oid"/>          
    
		  <xsl:element name="Entails">
      
		 	 <!--	*** Protect 0.9 *** 
              ( oid?, (warden | Integrity)+, (formula | Atom | Implies | Equivalent | Forall)* )> -->
        
			<xsl:element name="Rulebase">
        
				  <xsl:apply-templates select="*[name() != 'Integrity' and name() != 'warden' and name() != 'oid']"/>          
                          
			</xsl:element>
                         
			<xsl:element name="Rulebase">
        
			  <!-- *** Integrity 0.9 *** 
			  (oid?, (formula | Atom | And | Or) ) 
					*** warden 0.9 ***
			  ( Integrity ) -->
          
				  <!--only one from the below will execute:-->
          
				  <xsl:apply-templates select="ruleml:warden/ruleml:Integrity/*[name() != 'And' and name() != 'Or']"/>
				  <xsl:apply-templates select="ruleml:warden/ruleml:Integrity/ruleml:And/node()"/>                                   
				  <xsl:apply-templates select="ruleml:warden/ruleml:Integrity/ruleml:Or/node()"/>
                  
				  <xsl:apply-templates select="ruleml:Integrity/*[name() != 'And' and name() != 'Or']"/>
				  <xsl:apply-templates select="ruleml:Integrity/ruleml:And/node()"/>                                   
				  <xsl:apply-templates select="ruleml:Integrity/ruleml:Or/node()"/>
                                                  
            </xsl:element>                 				  
          
         </xsl:element>                       
        	
      </xsl:element>                  	
  	</xsl:template>    

	<!-- Ad. 3. change @kind="fo|lp" to @material="yes|no", respectively-->	
	<xsl:template match="ruleml:Implies">
		<!-- *** Implies 0.9 ***
		( oid?, ( head, body) | ( body, head) | ( (Atom | And | Or), Atom ) ), 
		possible attrs: closure, direction, kind.attrib -->	
		<xsl:element name="{name()}">
			<xsl:apply-templates select="@*[name()!='kind']"/>
			<xsl:if test="@kind">
				<xsl:attribute name="material">
					<xsl:choose>
						 <xsl:when test="@kind='fo'">yes</xsl:when>
				   <xsl:when test="@kind='lp'">no</xsl:when>
					   <xsl:otherwise><xsl:value-of select="."/></xsl:otherwise>     			     			     
					</xsl:choose>			
				</xsl:attribute>
			</xsl:if>
			<xsl:apply-templates/>
		</xsl:element>
	</xsl:template>
	    
	<!-- Ad. 4. change Equal/side to Equal/lhs and Equal/rhs -->		
	<xsl:template match="ruleml:Equal/ruleml:side[1]">		  
	   	<xsl:element name="lhs" >			
			  <xsl:apply-templates/>			
		  </xsl:element>		        	
	</xsl:template>
  <xsl:template match="ruleml:Equal/ruleml:side[2]">		  
	   	<xsl:element name="rhs" >			
			  <xsl:apply-templates/>			
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