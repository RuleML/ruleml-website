<?xml version="1.0" encoding="utf-8" standalone="yes"?>
<axsl:stylesheet xmlns:axsl="http://www.w3.org/1999/XSL/Transform" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:sch="http://www.ascc.net/xml/schematron" xmlns:r="http://www.ruleml.org/0.91/xsd" version="1.0" r:dummy-for-xmlns="">
   <axsl:output method="text"/>
   <axsl:template match="*|@*" mode="schematron-get-full-path">
      <axsl:apply-templates select="parent::*" mode="schematron-get-full-path"/>
      <axsl:text>/</axsl:text>
      <axsl:if test="count(. | ../@*) = count(../@*)">@</axsl:if>
      <axsl:value-of select="name()"/>
      <axsl:text>[</axsl:text>
      <axsl:value-of select="1+count(preceding-sibling::*[name()=name(current())])"/>
      <axsl:text>]</axsl:text>
   </axsl:template>
   <axsl:template match="/">

      <axsl:apply-templates select="/" mode="M1"/>
      <axsl:apply-templates select="/" mode="M2"/>
      <axsl:apply-templates select="/" mode="M3"/>
   </axsl:template>
   <axsl:template match="r:Implies/r:head/r:Equal/r:lhs/r:Expr/r:Fun |        r:Implies/r:Equal[2]/r:lhs/r:Expr/r:Fun |        r:Implies/r:head/r:Equal/r:Expr[1]/r:Fun |        r:Implies/r:Equal[2]/r:Expr[1]/r:Fun" priority="4000" mode="M1">
      <axsl:choose>
         <axsl:when test="@in='yes'"/>
         <axsl:otherwise>In pattern @in='yes':
   A defining equality must have an interpreted left-hand side.
</axsl:otherwise>
      </axsl:choose>
      <axsl:apply-templates mode="M1"/>
   </axsl:template>
   <axsl:template match="text()" priority="-1" mode="M1"/>
   <axsl:template match="r:Expr/r:Fun[@in='no']" priority="4000" mode="M2">
      <axsl:choose>
         <axsl:when test="not(../r:Expr/r:Fun[@in='yes'] or             ../r:arg/r:Expr/r:Fun[@in='yes'] or          ../r:Expr/r:op/r:Fun[@in='yes'] or           ../r:arg/r:Expr/r:op/r:Fun[@in='yes'])"/>
         <axsl:otherwise>In pattern not(../r:Expr/r:Fun[@in='yes'] or ../r:arg/r:Expr/r:Fun[@in='yes'] or ../r:Expr/r:op/r:Fun[@in='yes'] or ../r:arg/r:Expr/r:op/r:Fun[@in='yes']):
   Functions nested within an uninterpreted function must also be uninterpreted.
</axsl:otherwise>
      </axsl:choose>
      <axsl:apply-templates mode="M2"/>
   </axsl:template>
   <axsl:template match="r:Expr/r:op/r:Fun[@in='no']" priority="3999" mode="M2">
      <axsl:choose>
         <axsl:when test="not(../../r:Expr/r:Fun[@in='yes'] or          ../../r:arg/r:Expr/r:Fun[@in='yes'] or          ../../r:Expr/r:op/r:Fun[@in='yes'] or           ../../r:arg/r:Expr/r:op/r:Fun[@in='yes'])"/>
         <axsl:otherwise>In pattern not(../../r:Expr/r:Fun[@in='yes'] or ../../r:arg/r:Expr/r:Fun[@in='yes'] or ../../r:Expr/r:op/r:Fun[@in='yes'] or ../../r:arg/r:Expr/r:op/r:Fun[@in='yes']):
   Functions nested within an uninterpreted function must also be uninterpreted.
</axsl:otherwise>
      </axsl:choose>
      <axsl:apply-templates mode="M2"/>
   </axsl:template>
   <axsl:template match="text()" priority="-1" mode="M2"/>
   <axsl:template match="r:Equivalent[count( descendant::r:Equal/r:Expr | descendant::r:Equal/r:lhs/r:Expr )=2]" priority="4000" mode="M3">
      <axsl:choose>
         <axsl:when test="( descendant::r:Equal[1]/descendant::r:Fun[@in = 'no']           and descendant::r:Equal[2]/descendant::r:Fun[@in = 'no'] )         or         ( descendant::r:Equal[1]/descendant::r:Fun[@in = 'yes']           and descendant::r:Equal[2]/descendant::r:Fun[@in = 'yes'] )"/>
         <axsl:otherwise>In pattern ( descendant::r:Equal[1]/descendant::r:Fun[@in = 'no'] and descendant::r:Equal[2]/descendant::r:Fun[@in = 'no'] ) or ( descendant::r:Equal[1]/descendant::r:Fun[@in = 'yes'] and descendant::r:Equal[2]/descendant::r:Fun[@in = 'yes'] ):
   Equalities within an equivalence expression must either both be interpreted or both uninterpreted.
</axsl:otherwise>
      </axsl:choose>
      <axsl:apply-templates mode="M3"/>
   </axsl:template>
   <axsl:template match="text()" priority="-1" mode="M3"/>
   <axsl:template match="text()" priority="-1"/>
</axsl:stylesheet>