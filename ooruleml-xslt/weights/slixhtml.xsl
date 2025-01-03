<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="a[@name]">
		<a name="{@name}">
			<xsl:apply-templates/>
		</a>
	</xsl:template>
	<xsl:template match="a[@href]">
		<a href="{@href}">
			<xsl:apply-templates/>
		</a>
	</xsl:template>
	<xsl:template match="br">
		<br/>
	</xsl:template>
	<xsl:template match="p">
		<p>
			<xsl:apply-templates/>
		</p>
	</xsl:template>
	<xsl:template match="h1">
		<h1>
			<xsl:apply-templates/>
		</h1>
	</xsl:template>
	<xsl:template match="h2">
		<h2>
			<xsl:apply-templates/>
		</h2>
	</xsl:template>
	<xsl:template match="center">
		<center>
			<xsl:apply-templates/>
		</center>
	</xsl:template>
	<xsl:template match="b">
		<b>
			<xsl:apply-templates/>
		</b>
	</xsl:template>
	<xsl:template match="i">
		<i>
			<xsl:apply-templates/>
		</i>
	</xsl:template>
	<xsl:template match="tt">
		<b>
			<tt>
				<xsl:apply-templates/>
			</tt>
		</b>
	</xsl:template>
	<xsl:template match="big">
		<big>
			<xsl:apply-templates/>
		</big>
	</xsl:template>
	<xsl:template match="small">
		<small>
			<xsl:apply-templates/>
		</small>
	</xsl:template>
	<xsl:template match="code">
		<b>
			<pre>
				<xsl:apply-templates/>
			</pre>
		</b>
	</xsl:template>
	<xsl:template match="itemize">
		<ul>
			<xsl:apply-templates/>
		</ul>
	</xsl:template>
	<xsl:template match="itemize" mode="reverse">
		<ul>
			<xsl:apply-templates>
				<xsl:sort data-type="number" select="position()" order="descending"/>
			</xsl:apply-templates>
		</ul>
	</xsl:template>
	<xsl:template match="enumerate">
		<ol>
			<xsl:apply-templates/>
		</ol>
	</xsl:template>
	<xsl:template match="item">
		<li>
			<xsl:apply-templates/>
		</li>
	</xsl:template>
	<xsl:template match="xhtml">
		<xsl:copy-of select="."/>
	</xsl:template>
</xsl:stylesheet>
