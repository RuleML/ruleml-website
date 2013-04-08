<!-- XML DTD module used by the Datalog and 'UR' Datalog RuleML sublanguages -->
<!-- File: datalog_mod.mod -->
<!-- Version: 0.85 -->
<!-- Last Modification: 2003-10-22 -->

<!-- atom's content model is extended to permit an unlimited number of vars and/or inds -->
<!-- more intuitively, the content model is "((_opr, (_slot)*, (ind | var)*, (_slot)*) | ((_slot)*, (ind | var)+, (_slot)*, _opr))", -->
<!-- but this is ambiguous using LR1 parsing -->
<!ENTITY % atom.content "(
                            ( _opr,
                              (_slot)*, 
                              ( (ind | var)+, (_slot)*)?
                            ) 
                          |
                            (
                               (
                                  ( (_slot)+, 
                                    ( (ind | var)+, (_slot)* )?
                                  )
                                |
                                  ((ind | var)+, (_slot)*)
                               ),
                               _opr
                            )
                         )">