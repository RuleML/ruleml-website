@echo off

REM		Usage:
REM			validate xml-file xsd-file

echo Running XSV validation on %1...
xsv %1

echo Creating Schematron schema from appinfo in %2...
java -jar C:\saxon\saxon.jar -o ruleml.sch %2 http://www.ruleml.org/schematron/XSD2Schtrn.xsl

echo Running Basic Schematron validation on file %1...
java -jar C:\saxon\saxon.jar -o schematron-ruleml.xsl ruleml.sch schematron-basic.xsl
java -jar C:\saxon\saxon.jar %1 schematron-ruleml.xsl

echo Done.