<!-- XML DTD module used by the Equational-Logic and 'UR' Equational-Logic RuleML sublanguages -->
<!-- File: equalog_mod.mod -->
<!-- Version: 0.85 -->
<!-- Last Modification: 2003-10-22 -->

<!-- Only a flat equational logic (without function nestings) is defined here. -->
<!-- A nested equational logic would require atom versions, called 'relationships', -->
<!-- with embedded applications, generalizing the flat nanos defined here; -->
<!-- analogously, nano versions with embedded applications, are called 'applications' -->
<!-- To keep one kind of 'eq' and 'and' (rather than needing two of both), -->
<!-- only (flat) atoms and nanos are used here. For flatting use 'eq' variables. -->

<!-- _head, _body & and's content models are extended to also permit an equational formula -->
<!-- 'eq' in the head and body permits an equational logic (cf. RFML) -->
<!ENTITY % _head.content "(atom | eq)">
<!ENTITY % _body.content "(atom | and | eq)">
<!ENTITY % and.content "(atom | eq)*">

<!-- an eq(uational formula) is usable within a head, a body, and an 'and' -->
<!-- it uses two expressions consisting of an ind, var, cterm or nano -->
<!ENTITY % eq.content "((ind | var | cterm | nano), (ind | var | cterm | nano))">
<!ELEMENT eq %eq.content;>

<!-- nano element uses _opf ("operator of functions") role followed by three flat (i.e. non-nano) kinds of arguments, -->
<!-- or vice versa, much like atoms and cterms -->
<!ENTITY % nano.content "((_opf, (ind | var | cterm)*) | ((ind | var | cterm)+, _opf))">
<!ELEMENT nano %nano.content;>

<!-- _opf is usable within nanos -->
<!-- _opf uses a fun(ction) symbol -->
<!ENTITY % _opf.content "(fun)">
<!ELEMENT _opf %_opf.content;>

<!-- user-defined function name -->
<!ENTITY % fun.content "(#PCDATA)">
<!ELEMENT fun %fun.content;>