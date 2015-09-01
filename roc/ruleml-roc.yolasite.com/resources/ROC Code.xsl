<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns="http://ruleml.org/spec"
    xmlns:r="http://ruleml.org/spec" exclude-result-prefixes="#all">
    
    
    <!-- Remove almost all white space between elements -->
    <xsl:preserve-space elements="RuleML"/>
    <xsl:strip-space elements="*"/>
    
    <!-- Add the  <?xml version="1.0" ?> at the top of the result.-->
    <xsl:output method="xml" version="1.0" indent="no" exclude-result-prefixes="r"/>
    
    <!-- Rearrange into canonical ordering -->

    <xsl:variable name="phase-1-output">
        <xsl:apply-templates select="$phase-1-output" mode="phase-1"/>
    </xsl:variable>
    
    
    <!-- Note: Some of these templates may be combined. -->
    <!-- Builds canonically-ordered content of Retract. -->
    <xsl:template match="r:Retract" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[namespace-uri(.)='http://ruleml.org/spec' and
                (local-name()!= 'meta' and local-name()!= 'formula')]" mode="phase-1"/>
            <xsl:apply-templates select="r:formula" mode="phase-1"/>
        </xsl:copy> 
    </xsl:template>
    <!-- Builds canonically-ordered content of Query. -->
    <xsl:template match="r:Query" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[namespace-uri(.)='http://ruleml.org/spec' and
                (local-name()!= 'meta' and local-name()!= 'formula')]" mode="phase-1"/>
            <xsl:apply-templates select="r:formula" mode="phase-1"/>
        </xsl:copy>       
    </xsl:template>
    <!-- Builds canonically-ordered content of Entails. -->
    <xsl:template match="r:Entails" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[namespace-uri(.)='http://ruleml.org/spec' and
                (local-name()!= 'meta' and local-name()!= 'if' 
                and local-name()!= 'then')]" mode="phase-1"/>
            <xsl:apply-templates select="r:if" mode="phase-1"/>
            <xsl:apply-templates select="r:then" mode="phase-1"/>
        </xsl:copy>    
    </xsl:template>
    <!-- Builds canonically-ordered content of Rulebase. -->
    <xsl:template match="r:Rulebase" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[namespace-uri(.)='http://ruleml.org/spec' and
                (local-name()!= 'meta' and local-name()!= 'formula')]" mode="phase-1"/>
            <xsl:apply-templates select="r:formula" mode="phase-1"/>
        </xsl:copy>
    </xsl:template>
    <!-- Builds canonically-ordered content of Exists. -->
    <xsl:template match="r:Exists" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[namespace-uri(.)='http://ruleml.org/spec' and
                (local-name()!= 'meta' and local-name()!= 'formula')]" mode="phase-1"/>
            <xsl:apply-templates select="r:formula" mode="phase-1"/>
        </xsl:copy>
    </xsl:template>
    <!-- Builds canonically-ordered content of Forall. -->
    <xsl:template match="r:Forall" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[namespace-uri(.)='http://ruleml.org/spec' and
                (local-name()!= 'meta' and local-name()!= 'formula')]" mode="phase-1"/>
            <xsl:apply-templates select="r:formula" mode="phase-1"/>
        </xsl:copy>
    </xsl:template>
    <!-- Builds canonically-ordered content of Implies. -->
    <xsl:template match="r:Implies" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[namespace-uri(.)='http://ruleml.org/spec' and
                (local-name()!= 'meta' and local-name()!= 'if' 
                and local-name()!= 'then')]" mode="phase-1"/>
            <xsl:apply-templates select="r:if" mode="phase-1"/>
            <xsl:apply-templates select="r:then" mode="phase-1"/>
        </xsl:copy>    
    </xsl:template>
    <!-- Builds canonically-ordered content of Equivalent. -->
    <xsl:template match="r:Equivalent" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[namespace-uri(.)='http://ruleml.org/spec' and
                (local-name()!= 'meta' and local-name()!= 'torso')]" mode="phase-1"/>
            <xsl:apply-templates select="r:torso" mode="phase-1"/>
        </xsl:copy>
    </xsl:template>
    <!-- Builds canonically-ordered content of And.-->
    <xsl:template match="r:And" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[namespace-uri(.)='http://ruleml.org/spec' and
                (local-name()!= 'meta' and local-name()!= 'formula')]" mode="phase-1"/>
            <xsl:apply-templates select="r:formula" mode="phase-1"/>
        </xsl:copy>
    </xsl:template>
    <!-- Builds canonically-ordered content of Or. -->
    <xsl:template match="r:Or" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[namespace-uri(.)='http://ruleml.org/spec' and
                (local-name()!= 'meta' and local-name()!= 'formula')]" mode="phase-1"/>
            <xsl:apply-templates select="r:formula" mode="phase-1"/>
        </xsl:copy>
    </xsl:template>
    <!-- Builds canonically-ordered content of Atom. -->
    <xsl:template match="r:Atom" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="@*|*[
                namespace-uri(.)='http://ruleml.org/spec' and 
                local-name()!= 'meta' and 
                local-name()!= 'oid' and 
                local-name()!= 'degree' and 
                local-name()!= 'op' and 
                local-name()!= 'arg' and 
                local-name()!='repo' and 
                local-name()!='slot' and 
                local-name()!='resl']" mode="phase-1"/>
            <xsl:apply-templates select="r:oid" mode="phase-1"/>
            <xsl:apply-templates select="r:degree" mode="phase-1"/>
            <xsl:apply-templates select="r:op" mode="phase-1"/>
            <xsl:apply-templates select="r:arg" mode="phase-1"/>            
            <xsl:apply-templates select="r:repo" mode="phase-1"/>
            <xsl:apply-templates select="r:slot" mode="phase-1"/>
            <xsl:apply-templates select="r:resl" mode="phase-1"/>
        </xsl:copy> 
    </xsl:template>
    <!-- Builds canonically-ordered content of Equal. -->
    <xsl:template match="r:Equal" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[
                namespace-uri(.)='http://ruleml.org/spec' and 
                local-name()!= 'meta' and 
                local-name()!= 'degree' and 
                local-name()!= 'left' and 
                local-name()!= 'right']" mode="phase-1"/>
            <xsl:apply-templates select="r:degree" mode="phase-1"/>
            <xsl:apply-templates select="r:left" mode="phase-1"/>
            <xsl:apply-templates select="r:right" mode="phase-1"/>    
        </xsl:copy> 
    </xsl:template>
    <!-- Builds canonically-ordered content of Neg. -->
    <xsl:template match="r:Neg" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[namespace-uri(.)='http://ruleml.org/spec' and
                (local-name()!= 'meta' and local-name()!= 'strong')]" mode="phase-1"/>
            <xsl:apply-templates select="r:strong" mode="phase-1"/>
        </xsl:copy>     
    </xsl:template>
    <!-- Builds canonically-ordered content of Naf. -->
    <xsl:template match="r:Naf" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[namespace-uri(.)='http://ruleml.org/spec' and
                (local-name()!= 'meta' and local-name()!= 'weak')]" mode="phase-1"/>
            <xsl:apply-templates select="r:weak" mode="phase-1"/>
        </xsl:copy>     
    </xsl:template>
    <!-- Builds canonically-ordered content of Expr. -->
    <xsl:template match="r:Expr" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[
                namespace-uri(.)='http://ruleml.org/spec' and 
                local-name()!= 'meta' and 
                local-name()!= 'oid' and 
                local-name()!= 'op' and 
                local-name()!= 'arg' and 
                local-name()!='repo' and 
                local-name()!='slot' and 
                local-name()!='resl']" mode="phase-1"/>
            <xsl:apply-templates select="r:oid" mode="phase-1"/>
            <xsl:apply-templates select="r:op" mode="phase-1"/>
            <xsl:apply-templates select="r:arg" mode="phase-1"/>
            <xsl:apply-templates select="r:repo" mode="phase-1"/>
            <xsl:apply-templates select="r:slot" mode="phase-1"/>
            <xsl:apply-templates select="r:resl" mode="phase-1"/>
        </xsl:copy>     
    </xsl:template>
    <!-- Builds canonically-ordered content of Plex. -->
    <xsl:template match="r:Plex" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates 
                select="*[namespace-uri(.)!='http://ruleml.org/spec']" mode="phase-1"/>
            <xsl:apply-templates select="r:meta" mode="phase-1"/>
            <xsl:apply-templates select="*[
                namespace-uri(.)='http://ruleml.org/spec' and 
                local-name()!= 'meta' and 
                local-name()!= 'oid' and 
                local-name()!= 'arg' and 
                local-name()!='repo' and 
                local-name()!='slot' and 
                local-name()!='resl']" />
            <xsl:apply-templates select="r:oid" mode="phase-1"/>
            <xsl:apply-templates select="r:arg" mode="phase-1"/>
            <xsl:apply-templates select="r:repo" mode="phase-1"/>
            <xsl:apply-templates select="r:slot" mode="phase-1"/>
            <xsl:apply-templates select="r:resl" mode="phase-1"/>
        </xsl:copy>     
    </xsl:template>
    <!-- copy comments-->
    <xsl:template match="comment()">
        <xsl:copy/>
    </xsl:template>
    
    <!-- Copies everything else to the phase-1 output. Comments are preserved without escaping.
        Order is preserved.
        Foreign elements are preserved.
        Because this is the most general of all templates, any more specific template in phase-1 will over-ride this one.  -->
    <xsl:template match="node() | @*" mode="phase-1">
        <xsl:copy>
            <xsl:apply-templates select="node() | @*" mode="phase-1"/>
        </xsl:copy>
    </xsl:template>

    
<!-- This phase will convert the canonically ordered elements  into compact form                  -->
    
<!--  This is the identification variable of phase 2 which will take input as the output of Phase 1        -->
    
    <xsl:variable name="phase-2-output">
        <xsl:apply-templates select="/" mode="phase-2"/>
    </xsl:variable>
   
   
<!-- Skips the stripes of RuleML and copies its children to the next phase                                    -->
    
    <xsl:template match="r:RuleML/*[namespace-uri(.)='http://ruleml.org/spec']" mode="phase-2">
        <xsl:if test="local-name()='act'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>
    </xsl:template>
        
<!-- Skips the stripes of Assert and copies the RuleML children of Assert into the next phase   -->
    <xsl:template match="r:Assert/*[namespace-uri(.)='http://ruleml.org/spec']" mode="phase-2">
        <xsl:if test="local-name()='formula'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>
    </xsl:template>
    
<!-- Skips the stripes of Rulebase and copies the RuleML children of Rulebase into the next phase  -->
    <xsl:template match="r:Rulebase/*[namespace-uri(.)='http://ruleml.org/spec']" mode="phase-2">
        <xsl:if test="local-name()='formula'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>  
    </xsl:template>   
    
<!-- Skips the stripes of Equivalent and copies the RuleML children of Equivalent into the next phase  -->
    <xsl:template match="r:Equivalent/*[namespace-uri(.)='http://ruleml.org/spec']" mode="phase-2">
        <xsl:if test="local-name()='torso'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>   
    </xsl:template>   
    
<!-- Skips the stripes of Retract and copies the RuleML children of Retract into the next phase  -->
    
    <xsl:template
        match="r:Retract/*[namespace-uri(.)='http://ruleml.org/spec']"      mode="phase-2">
        <xsl:if test="local-name()='formula'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
            </xsl:if>
    </xsl:template>
    
<!-- Skips the stripes of Query and copies the RuleML children of Query into the next phase  -->
    <xsl:template
        match="r:Query/*[namespace-uri(.)='http://ruleml.org/spec' ]"    mode="phase-2">
        <xsl:if test="local-name()='formula'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>
    </xsl:template>
    
<!-- Skips the stripes of And and copies the RuleML children of And into the next phase  -->
    <xsl:template
        match="r:And/*[namespace-uri(.)='http://ruleml.org/spec']"  mode="phase-2">
        <xsl:if test="local-name()='formula'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>
    </xsl:template>
    
<!-- Skips the stripes of Or and copies the RuleML children of Or into the next phase  -->
    <xsl:template match="r:Or/*[namespace-uri(.)='http://ruleml.org/spec']" mode="phase-2">
        <xsl:if test="local-name()='formula'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>
    </xsl:template>
    
<!-- Skips the stripes of Neg and copies the RuleML children of Neg into the next phase  -->
    <xsl:template match="r:Neg/*[namespace-uri(.)='http://ruleml.org/spec' ]" mode="phase-2">
        
        <xsl:if test="local-name()='strong' or local-name()='formula'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>
    </xsl:template>
    
<!-- Skips the stripes of Naf and copies the RuleML children of Naf into the next phase  -->
    <xsl:template match="r:Naf/*[namespace-uri(.)='http://ruleml.org/spec' ]" mode="phase-2">
        <xsl:if test="local-name()='weak'  or local-name()='formula'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>
    </xsl:template>
    

<!-- Skips the stripes of Equal and copies the RuleML children of Equal into the next phase  -->
    <xsl:template match="r:Equal/*[namespace-uri(.)='http://ruleml.org/spec']" mode="phase-2">
        <xsl:if test="local-name()='left' or local-name()='right'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>
    </xsl:template>
    
<!-- Skips the stripes of Atom and copies the RuleML children of Atom into the next phase  -->
    <xsl:template match="r:Atom/*[namespace-uri(.)='http://ruleml.org/spec' ]" mode="phase-2">
        <xsl:if test="local-name()='slot'">
            <xsl:for-each select="./*">
                <xsl:call-template name="wrap" > 
                    <xsl:with-param name="tag">slot</xsl:with-param> 
                </xsl:call-template>
            </xsl:for-each>
        </xsl:if>
        
        
        <xsl:if test="local-name()='op' or local-name()='arg' ">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>
      
    </xsl:template>
   
    
<!-- Skips the stripes of Implies and copies the RuleML children of Implies into the next phase  -->
    <xsl:template match="r:Implies/*[namespace-uri(.)='http://ruleml.org/spec']" mode="phase-2">
        <xsl:if test="local-name()='if' or local-name()='then'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>
    </xsl:template>
    
    
<!-- Skips the stripes of Forall and copies the RuleML children of Forall into the next phase  -->
    <xsl:template match="r:Forall/*[namespace-uri(.)='http://ruleml.org/spec']" mode="phase-2">
        <xsl:if test="local-name()='declare' or local-name()='formula'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>
       
    </xsl:template>
    
<!-- Skips the stripes of Exists and copies the RuleML children of Exists into the next phase  -->
    
    <xsl:template match="r:Exists/*[namespace-uri(.)='http://ruleml.org/spec']" mode="phase-2">
        <xsl:if test="local-name()='declare' or local-name()='formula'">
                    <xsl:for-each select="./*">
                        <xsl:call-template name="copy-1" />
                    </xsl:for-each>
                    </xsl:if>
    </xsl:template>
       
<!-- Skips the stripes of Entails and copies the RuleML children of Entails into the next phase  -->
    
    <xsl:template match="r:Entails/*[namespace-uri(.)='http://ruleml.org/spec' ]" mode="phase-2">
        
        <xsl:if test="local-name()='if' or local-name()='then'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>
    </xsl:template>
 
    
<!-- Skips the stripes of Expr and copies the RuleML children of Expr into the next phase  -->
    <xsl:template match="r:Expr/*[namespace-uri(.)='http://ruleml.org/spec']"  mode="phase-2">        
        
        <xsl:if test="local-name()='op' or local-name()='arg'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>
    </xsl:template> 
    
<!-- Skips the stripes of Plex and copies the RuleML children of Plex into the next phase  -->
    <xsl:template match="r:Plex/*[namespace-uri(.)='http://ruleml.org/spec']" mode="phase-2">
        <xsl:if test="local-name()='oid' or local-name()='op' or local-name()= 'arg' or local-name()='degree' or local-name()='repo' or local-name()='resl'">
            <xsl:for-each select="./*">
                <xsl:call-template name="copy-1" />
            </xsl:for-each>
        </xsl:if>
    </xsl:template>
    
    
    
<!--*****************************************************************************************************-->    
<!--*****************************************************************************************************-->
    
    
    <!-- Copies everything else to the phase-2 output. Comments are preserved without escaping.
        Order is preserved.
        Foreign elements are preserved.
        Because this is the most general of all templates, any more specific template in phase-2 will over-ride this one.  -->
    
    <xsl:template match="node() | @*" mode="phase-2">
        <xsl:call-template name="copy-1"/>
    </xsl:template>
    
    <xsl:template name="copy-1">
        <xsl:copy>
            <xsl:apply-templates select="node() | @*" mode="phase-2"/>
        </xsl:copy>
    </xsl:template>
    <xsl:template name="wrap"> <xsl:param name="tag"/> 
        <xsl:element name="{$tag}">
            <xsl:call-template name="copy-1"/>
        </xsl:element> </xsl:template> 
    

<!-- Phase III: treatment of attributes with default values -->
    
    <xsl:variable name="phase-3-output">
        <xsl:apply-templates select="$phase-2-output" mode="phase-3"/>
    </xsl:variable>
    
    <!-- Adds the material attribute with default value (yes) to Implies elements where this attribute is absent. -->
    <!-- Makes @material explicit. -->
    <!-- Makes @mapMaterial explicit. -->
    <!-- Makes @direction explicit. -->
    <!-- Makes @mapDirection explicit. -->
    <xsl:template match="r:Implies[not(@material) or not(@direction) or not(@mapMaterial) or not(@mapDirection)]" mode="phase-3">
        <xsl:copy>
            <xsl:if test="not(@material)">
                <xsl:attribute name="material">yes</xsl:attribute>
            </xsl:if>
            <xsl:if test="not(@direction)">
                <xsl:attribute name="direction">bidirectional</xsl:attribute>
            </xsl:if>
            <xsl:if test="not(@mapMaterial)">
                <xsl:attribute name="mapMaterial">yes</xsl:attribute>
            </xsl:if>
            <xsl:if test="not(@mapDirection)">
                <xsl:attribute name="mapDirection">bidirectional</xsl:attribute>
            </xsl:if>
            <xsl:apply-templates select="node() | @*" mode="phase-3"/>
        </xsl:copy>
    </xsl:template>
    
    <!-- Makes @val explicit. -->
    <!-- Makes @per explicit. -->
    <xsl:template match="r:Fun[not(@val)or not(@per)]" mode="phase-3">
        <xsl:copy>
            <xsl:if test="not (@val)">
                <xsl:attribute name="val">0..</xsl:attribute>
            </xsl:if>
            <xsl:if test="not(@per)">
                <xsl:attribute name="per">copy</xsl:attribute>
            </xsl:if>
            <xsl:apply-templates select="node() | @*" mode="phase-3"/>
        </xsl:copy>
    </xsl:template>
    
    <!-- Makes @oriented explicit. -->
    <xsl:template match="r:Equal[not(@oriented)]" mode="phase-3">
        <xsl:copy>
            <xsl:attribute name="oriented">no</xsl:attribute>
            <xsl:apply-templates select="node() | @*" mode="phase-3"/>
        </xsl:copy>
    </xsl:template>
    
    <!-- Adds the required index attribute to the arg tag 
        There are errors with the indexing when the argument is within a slot-->
    <xsl:template match="r:arg[namespace-uri(.)='http://ruleml.org/spec']" mode="phase-3">
        <xsl:variable name="index_value">
            <xsl:value-of select="count(preceding-sibling::r:arg)+1" />
        </xsl:variable>
        <arg>
            <xsl:attribute name="index">
                <xsl:value-of select="$index_value" />
            </xsl:attribute>
            <xsl:apply-templates select="node() | @*" mode="phase-3"/>
        </arg>
    </xsl:template>
    
    <!-- Copies everything else to the phase-3 output. Comments are preserved without escaping.
        Order is preserved.
        Foreign elements are preserved.
        Because this is the most general of all templates, any more specific template in phase-3 will over-ride this one.  -->
    <xsl:template match="node() | @*" mode="phase-3">
        <xsl:copy>
            <xsl:apply-templates select="node() | @*" mode="phase-3"/>
        </xsl:copy>
    </xsl:template>
    
    <!-- Copies everything to the transformation output -->
    <xsl:template match="@*|node()">
        <xsl:copy>
            <xsl:apply-templates select="@*|node()" mode="phase-3"/>
        </xsl:copy>
    </xsl:template>
    
<!--*****************************************************************************************************-->    
    <!-- Pretty Print -->
    <!--Makes sure everything is printed nicely-->
    <xsl:variable name="pretty-print-output">
        <xsl:apply-templates select="$phase-3-output" mode="pretty-print">
            <xsl:with-param name="tabs">
                <xsl:text></xsl:text>
            </xsl:with-param>
        </xsl:apply-templates>
    </xsl:variable>
    
    <!-- variable containing the amount of space for a tab -->
    <xsl:variable name="tab">
        <xsl:text>  </xsl:text>
    </xsl:variable>
    
    <!-- variable containing a new line -->
    <xsl:variable name="newline">
        <xsl:text>
</xsl:text>
    </xsl:variable>
    
    <!-- adds a new line and an appropriate amount of tabs before each comment -->
    <xsl:template match="*/comment()" mode="pretty-print">
        <xsl:param name="tabs" />
        <xsl:value-of select="$newline" />
        <xsl:value-of select="$tabs" />
        <xsl:comment><xsl:value-of select="."/></xsl:comment>
    </xsl:template>
    
    <!-- decides whether the children of the current node should be on a new
        line or not and calls the appropriate template-->
    <xsl:template match="*" mode="pretty-print">
        <xsl:param name="tabs" />
        <xsl:choose>
            
            <xsl:when test="local-name(.)='op' or local-name(.)='arg' or local-name(.)='slot'">
                <xsl:call-template name="no-new-line">
                    <xsl:with-param name="newlines">yes</xsl:with-param>
                    <xsl:with-param name="tabs">
                        <xsl:value-of select="$tabs" />
                    </xsl:with-param>
                </xsl:call-template>
            </xsl:when>
            
            <xsl:otherwise>
                <xsl:call-template name="new-line">
                    <xsl:with-param name="tabs">
                        <xsl:value-of select="$tabs" />
                    </xsl:with-param>
                </xsl:call-template>
            </xsl:otherwise>
            
        </xsl:choose>
    </xsl:template>
    
    <!-- formats a node that should have new lines before it's children -->
    <xsl:template name="new-line">
        <xsl:param name="tabs" />
        <xsl:value-of select="$newline" />
        <xsl:value-of select="$tabs" />
        <xsl:copy>
            <xsl:for-each select="@*">
                <xsl:call-template name="attribute-out" />
            </xsl:for-each>
            <xsl:choose>
                <xsl:when test="count(./*) = 0">
                    <xsl:value-of select="." />
                </xsl:when>
                <xsl:otherwise>
                    <xsl:apply-templates select="./node()" mode="pretty-print">
                        <xsl:with-param name="tabs">
                            <xsl:value-of select="$tabs" /><xsl:value-of select="$tab" />
                        </xsl:with-param>
                    </xsl:apply-templates>
                    <xsl:value-of select="$newline" />
                    <xsl:value-of select="$tabs" />
                </xsl:otherwise>
            </xsl:choose>
        </xsl:copy>
    </xsl:template>
    
    <!-- formats a node with no new lines before it's children -->
    <xsl:template name="no-new-line">
        <xsl:param name="newlines" />
        <xsl:param name="tabs" />
        <xsl:if test="$newlines='yes'">
            <xsl:value-of select="$newline" />
            <xsl:value-of select="$tabs" />
        </xsl:if>
        <xsl:copy>
            <xsl:for-each select="@*">
                <xsl:call-template name="attribute-out" />
            </xsl:for-each>
            <xsl:choose>
                <xsl:when test="count(./*)=0">
                    <xsl:value-of select="." />
                </xsl:when>
                <xsl:otherwise>
                    <xsl:for-each select="./node()">
                        <xsl:call-template name="no-new-line">
                            <xsl:with-param name="newlines">no</xsl:with-param>
                        </xsl:call-template>
                    </xsl:for-each>
                </xsl:otherwise>
            </xsl:choose>
        </xsl:copy>
    </xsl:template>
    
    <!-- outputs an attribute -->
    <xsl:template name="attribute-out">
        <xsl:attribute name="{local-name(.)}">
            <xsl:value-of select="." />
        </xsl:attribute>
    </xsl:template>
    
    <!-- Copies everything to the transformation output -->
    <xsl:template match="/">
        <xsl:copy-of select="$pretty-print-output"/>
    </xsl:template>
    
</xsl:stylesheet>    
    