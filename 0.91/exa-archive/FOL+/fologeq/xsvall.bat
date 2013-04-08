:: Validates all *.ruleml files in the current directory using XSV and summarizes the results.
:: David Hirtle, 2006-08-23

:: Usage: xsvall [output-file]

@echo off

echo Running XSV on all *.ruleml files in the current directory...
echo (This usually takes a while.)

:: loop through all examples
for %%G in (*.ruleml) do (
:: append everything out to a temp file
xsv %%G 2>> temp
)

:: if no output file specified, just display to the screen
if "%1"=="" (
echo Summary of results:
FINDSTR "<xsv instanceErrors= schemaErrors= target= <bug> </xsv>" temp
echo Done.
goto skip
)

:: else, send results to the specified output file
FINDSTR "<xsv instanceErrors= schemaErrors= target= </xsv>" temp > %1
echo Summary of results saved to file '%1'.

:skip

:: remove temp file
del temp