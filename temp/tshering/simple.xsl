<?xml version="1.0" encoding="ISO-8859-1"?>

<html xsl:version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  
	<body style="font-family:Arial,helvetica,sans-serif;font-size:12pt;background-color:#EEEFFF">
	
		<H1><BOLD>CALENDAR</BOLD></H1>
		<xsl:for-each select="Calendar/Conference|Calendar/Break">
			<div style="background-color:teal;color:white;padding:4px">
				<span style="font-weight:bold;color:black">
				    <xsl:value-of select="name()"/> <br/>
					<xsl:value-of select="Date"/>,
					<xsl:value-of select="Time"/>
				 - <xsl:value-of select="Location"/>
				 </span>
			</div>
			<span style="font-weight:bold;color:Green">
				<xsl:value-of select="name(Presenters|Attendees)"/>
			</span>: <br/>
			<ul>
				<xsl:for-each select="Presenters/person|Attendees/name">
				<span style="font-weight:bold;color:green">
					<li>
						<xsl:value-of select="."/>
					</li>
				</span>
				</xsl:for-each>
			</ul>
			</xsl:for-each>
		
	</body>

</html>
