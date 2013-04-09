<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:output indent="yes" method="xml" omit-xml-declaration="yes"/>
<?cocoon-process type="xslt"?>


<!-- Transforming RuleML rulebases to RDF via XSLT              2001-03-09  -->
<!-- Harold Boley    "boley@informatik.uni-kl.de" -->


  <!-- process rulebase and position rule transformer -->
  <xsl:template match="/rulebase">
    <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
         xmlns:ruleml="http://www.dfki.uni-kl.de/ruleml/rdf-voc#">
      <ruleml:Rulebase xmlns:ruleml="http://www.dfki.uni-kl.de/ruleml/rdf-voc#" about="http://www.xyz.org/and-gensym">
        <ruleml:Container>
          <rdf:Bag xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
            <xsl:for-each select="if"><rdf:li><xsl:apply-templates select="."/></rdf:li></xsl:for-each>
          </rdf:Bag>
        </ruleml:Container>
      </ruleml:Rulebase>
    </rdf:RDF>
  </xsl:template>


  <!-- if transformation -->
  <xsl:template match="if">
    <ruleml:If xmlns:ruleml="http://www.dfki.uni-kl.de/ruleml/rdf-voc#" about="http://www.xyz.org/if-gensym">
      <ruleml:Conc>
        <xsl:apply-templates select="(atom|eq)[position()=1]"/>
      </ruleml:Conc>
      <ruleml:Prem>
        <xsl:apply-templates select="(atom|eq|and)[position()=2]"/>
      </ruleml:Prem>
    </ruleml:If>
  </xsl:template>


  <!-- and transformation -->
  <xsl:template match="and">
    <ruleml:And xmlns:ruleml="http://www.dfki.uni-kl.de/ruleml/rdf-voc#" about="http://www.xyz.org/and-gensym">
      <ruleml:Container>
        <rdf:Bag xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
          <xsl:for-each select="(atom|eq)"><rdf:li><xsl:apply-templates select="."/></rdf:li></xsl:for-each>
        </rdf:Bag>
      </ruleml:Container>
    </ruleml:And>
  </xsl:template>


  <!-- atom transformation -->
  <xsl:template match="atom">
    <ruleml:Atom xmlns:ruleml="http://www.dfki.uni-kl.de/ruleml/rdf-voc#" about="http://www.xyz.org/atom-gensym">
      <ruleml:Relator>
        <xsl:apply-templates select="rel[position()=1]"/>
      </ruleml:Relator>
      <ruleml:Container>
        <rdf:Seq xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
          <xsl:for-each select="(ur|ind|var|cterm)[position()>0]"><rdf:li><xsl:apply-templates select="."/></rdf:li></xsl:for-each>
        </rdf:Seq>
      </ruleml:Container>
    </ruleml:Atom>
  </xsl:template>


  <!-- cterm transformation -->
  <xsl:template match="cterm">
    <ruleml:Cterm xmlns:ruleml="http://www.dfki.uni-kl.de/ruleml/rdf-voc#" about="http://www.xyz.org/cterm-gensym">
      <ruleml:Constructor>
        <xsl:apply-templates select="rel[position()=1]"/>
      </ruleml:Constructor>
      <ruleml:Container>
        <rdf:Seq xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
          <xsl:for-each select="(ur|ind|var|cterm)[position()>0]"><rdf:li><xsl:apply-templates select="."/></rdf:li></xsl:for-each>
        </rdf:Seq>
      </ruleml:Container>
    </ruleml:Cterm>
  </xsl:template>


  <!-- rel transformation -->
  <xsl:template match="rel">
    <ruleml:Rel xmlns:ruleml="http://www.dfki.uni-kl.de/ruleml/rdf-voc#" about="http://www.xyz.org/rel-gensym">
      <ruleml:Name>
        <xsl:value-of select="."/>
      </ruleml:Name>
    </ruleml:Rel>
  </xsl:template>


  <!-- ind transformation -->
  <xsl:template match="ind">
    <ruleml:Ind xmlns:ruleml="http://www.dfki.uni-kl.de/ruleml/rdf-voc#" about="http://www.xyz.org/ind-gensym">
      <ruleml:Name>
        <xsl:value-of select="."/>
      </ruleml:Name>
    </ruleml:Ind>
  </xsl:template>


  <!-- var transformation -->
  <xsl:template match="var">
    <ruleml:Var xmlns:ruleml="http://www.dfki.uni-kl.de/ruleml/rdf-voc#" about="http://www.xyz.org/var-gensym">
      <ruleml:Name>
        <xsl:value-of select="."/>
      </ruleml:Name>
    </ruleml:Var>
  </xsl:template>


  <!-- ctor transformation -->
  <xsl:template match="ctor">
    <ruleml:Ctor xmlns:ruleml="http://www.dfki.uni-kl.de/ruleml/rdf-voc#" about="http://www.xyz.org/ctor-gensym">
      <ruleml:Name>
        <xsl:value-of select="."/>
      </ruleml:Name>
    </ruleml:Ctor>
  </xsl:template>


</xsl:stylesheet>
