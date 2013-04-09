<!-- XML DTD module used by the Horn-Logic and 'UR' Horn-Logic RuleML sublanguages -->
<!-- File: hornlog_mod.mod -->
<!-- Version: 0.85 -->
<!-- Last Modification: 2003-12-16 -->

<!-- the content models of the labels are extended to permit c(omplex )terms in addition to inds -->

<!-- SYNTACTIC REQUIREMENT BEYOND DTD: for now, labels must be GROUND (i.e., if a cterm) -->
<!-- FUTURE DESIGN:  might permit labels to be non-ground;
e.g., to instantiate a personal messaging agent to the particular user; 
but that would require that coincidence of variable names be significant ACROSS rules,
and there are expressively simpler ways to achieve the same effect -->
<!ENTITY % _rbaselab.content "(ind | cterm)">

<!-- SYNTACTIC REQUIREMENT BEYOND DTD: any logical variables (var elements)
appearing within the rule label (i.e., within _rlab's cterm child) must also appear within
the rule body and/or head -->
<!-- FUTURE DESIGN:  probably will want to permit even stronger restrictions on the
appearance of variables, e.g., "must appear within both the rule head and body" or
"must appear within the rule body but not in any literal which has negation-as-failure,
nor in any literal which can sensed" in OLP or CLP or SLP or SCLP -->
<!-- NOTE: rule label is not required to be ground; semantically, instantiating
the rule label's logical variables corresponds to instantiating the (rest of the)
rule's variables.  For example, if the rule says "Mortal(?x) if Man(?x)", and
the rule label is "SocraticSyllogism(?x)", then "SocraticSyllogism(Joe)" 
corresponds semantically to the rule label for "Mortal(Joe) if Man(Joe)". -->
<!ENTITY % _rlab.content "(ind | cterm)">

<!-- Note: ro(le )li(st) elements (and thus _arv and arole) from version 0.8 have been replaced by the metarole _slot -->

<!-- atom's content model is extended to also permit cterms and (com)plexs -->
<!-- more intuitively, the content model is "((_opr, (_slot)*, (ind | var | cterm | plex)*, (_slot)*) | ((_slot)*, (ind | var | cterm | plex)+, (_slot)*, _opr))", -->
<!-- but this is ambiguous using LR1 parsing -->
<!ENTITY % atom.content "(
                            ( _opr,
                              (_slot)*, 
                              ( (ind | var | cterm | plex)+, (_slot)*)?
                            ) 
                          |
                            (
                               (
                                  ( (_slot)+, 
                                    ( (ind | var | cterm | plex)+, (_slot)* )?
                                  )
                                |
                                  ((ind | var | cterm | plex)+, (_slot)*)
                               ),
                               _opr
                            )
                         )">

<!-- the metarole _slot's content model is also extended to permit cterms and (com)plexs -->
<!ENTITY % _slot.content "(ind | var | cterm | plex)">

<!-- complex, compound, or constructor terms are usable within other cterms, plexs, and atoms -->
<!-- the cterm element uses _opc ("operator of constructors") role followed by a sequence of five kinds of arguments, -->
<!-- surrounded by optional metaroles, or vice versa, much like atoms -->
<!-- more intuitively, the content model is "((_opc, (_slot)*, (ind | var | cterm | plex)*, (_slot)*) | ((_slot)*, (ind | var | cterm | plex)+, (_slot)*, _opc))", -->
<!-- but this is again ambiguous -->
<!ENTITY % cterm.content "(
                             ( _opc,
                               (_slot)*, 
                               ( (ind | var | cterm | plex)+, (_slot)*)?
                             )
                           |
                             (
                                (
                                   ( (_slot)+, 
                                     ( (ind | var | cterm | plex)+, (_slot)* )?
                                   )
                                 |
                                   ((ind | var | cterm | plex)+, (_slot)*)
                                ),
                                _opc
                             )
                          )">
                         
<!ELEMENT cterm %cterm.content;>
<!ATTLIST cterm type CDATA #IMPLIED>

<!-- _opc is usable within cterms -->
<!-- _opc uses c(onstruc)tor symbol -->
<!ENTITY % _opc.content "(ctor)">
<!ELEMENT _opc %_opc.content;>

<!-- constructor -->
<!ENTITY % ctor.content "(#PCDATA)">
<!ELEMENT ctor %ctor.content;>

<!-- (com)plex elements are usable within cterms, atoms and other plexs -->
<!-- (previous to version 0.85, these are called tup(le)s - the addition of roles means the term "tup" is no longer appropriate) -->
<!-- plex element uses sequence of five kinds of arguments -->
<!-- more intuitively, the content model is "((_slot)*, (ind | var | cterm | plex)*, (_slot)*)", but this can be ambiguous -->
<!ENTITY % plex.content "((_slot)*, ( (ind | var | cterm | plex)+, (_slot)* )?)">
<!ELEMENT plex %plex.content;>