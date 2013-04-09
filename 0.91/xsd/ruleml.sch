<?xml version="1.0" encoding="utf-8" standalone="yes"?>

<sch:schema xmlns:sch="http://www.ascc.net/xml/schematron" xmlns:xs="http://www.w3.org/2001/XMLSchema">
	<sch:ns xmlns="http://www.ruleml.org/0.91/xsd" prefix="r" uri="http://www.ruleml.org/0.91/xsd"/>
	
	<!--
	Generated using Saxon as follows:
	java -jar C:\saxon\saxon.jar -o ruleml.sch
	http://www.ruleml.org/0.91/xsd/hornlogeq.xsd http://www.ruleml.org/schematron/XSD2Schtrn.xsl
	
	You can perform XSD and Schematron validation at the same time using a batch file, e.g.
	http://www.ruleml.org/schematron/validate.bat
	-->

	<sch:pattern xmlns="http://www.ruleml.org/0.91/xsd" name="Defining equality">
		<sch:rule context=
			"r:Implies/r:head/r:Equal/r:lhs/r:Expr/r:Fun |
			 r:Implies/r:Equal[2]/r:lhs/r:Expr/r:Fun | 
			 r:Implies/r:head/r:Equal/r:Expr[1]/r:Fun | 
			 r:Implies/r:Equal[2]/r:Expr[1]/r:Fun">
			<sch:assert test="@in='yes'">
				A defining equality must have an interpreted left-hand side.
			</sch:assert>
		</sch:rule>
	</sch:pattern>

	<sch:pattern xmlns="http://www.ruleml.org/0.91/xsd" name="Uninterpreted functions">
		<sch:rule context="r:Expr/r:Fun[@in='no']">
			<sch:assert test=
				"not(../r:Expr/r:Fun[@in='yes'] or
				     ../r:arg/r:Expr/r:Fun[@in='yes'] or
					 ../r:Expr/r:op/r:Fun[@in='yes'] or 
					 ../r:arg/r:Expr/r:op/r:Fun[@in='yes'])">
				Functions nested within an uninterpreted function must also be uninterpreted.
			</sch:assert>
		</sch:rule>
		<sch:rule context="r:Expr/r:op/r:Fun[@in='no']">
			<sch:assert test=
				"not(../../r:Expr/r:Fun[@in='yes'] or
					 ../../r:arg/r:Expr/r:Fun[@in='yes'] or
					 ../../r:Expr/r:op/r:Fun[@in='yes'] or 
					 ../../r:arg/r:Expr/r:op/r:Fun[@in='yes'])">
				Functions nested within an uninterpreted function must also be uninterpreted.
			</sch:assert>
		</sch:rule>
	</sch:pattern>
	
	<sch:pattern xmlns="http://www.ruleml.org/0.91/xsd" name="Equivalent">
		<sch:rule context="r:Equivalent[count( descendant::r:Equal/r:Expr | descendant::r:Equal/r:lhs/r:Expr )=2]">
			<sch:assert test=
				"( descendant::r:Equal[1]/descendant::r:Fun[@in = 'no']
				  and descendant::r:Equal[2]/descendant::r:Fun[@in = 'no'] ) 
				 or
				 ( descendant::r:Equal[1]/descendant::r:Fun[@in = 'yes']
				  and descendant::r:Equal[2]/descendant::r:Fun[@in = 'yes'] )">
				Equalities within an equivalence expression must either both be interpreted or both uninterpreted.
			</sch:assert>
      </sch:rule>
   </sch:pattern>

   <sch:diagnostics/>
</sch:schema>