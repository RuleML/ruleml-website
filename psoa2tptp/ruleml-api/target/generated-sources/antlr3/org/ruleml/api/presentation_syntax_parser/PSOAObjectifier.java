// $ANTLR 3.4 org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g 2012-09-05 10:53:31

	package org.ruleml.api.presentation_syntax_parser;


import org.antlr.runtime.*;
import org.antlr.runtime.tree.*;
import java.util.Stack;
import java.util.List;
import java.util.ArrayList;


@SuppressWarnings({"all", "warnings", "unchecked"})
public class PSOAObjectifier extends TreeParser {
    public static final String[] tokenNames = new String[] {
        "<invalid>", "<EOR>", "<DOWN>", "<UP>", "ALPHA", "AND", "BASE", "CURIE", "DIGIT", "DOCUMENT", "ECHAR", "EOL", "EQUAL", "EXISTS", "EXTERNAL", "FORALL", "GREATER", "GROUP", "ID", "ID_CHAR", "ID_START_CHAR", "IMPLICATION", "IMPORT", "INSTANCE", "IRI", "IRI_CHAR", "IRI_REF", "IRI_START_CHAR", "LESS", "LITERAL", "LOCAL", "LPAR", "LSQBR", "MULTI_LINE_COMMENT", "NUMBER", "OR", "PREFIX", "PSOA", "RPAR", "RSQBR", "SHORTCONST", "SLOT", "SLOT_ARROW", "STRING", "SUBCLASS", "SYMSPACE_OPER", "TOP", "TUPLE", "VAR_ID", "VAR_LIST", "WHITESPACE", "'@'"
    };

    public static final int EOF=-1;
    public static final int T__51=51;
    public static final int ALPHA=4;
    public static final int AND=5;
    public static final int BASE=6;
    public static final int CURIE=7;
    public static final int DIGIT=8;
    public static final int DOCUMENT=9;
    public static final int ECHAR=10;
    public static final int EOL=11;
    public static final int EQUAL=12;
    public static final int EXISTS=13;
    public static final int EXTERNAL=14;
    public static final int FORALL=15;
    public static final int GREATER=16;
    public static final int GROUP=17;
    public static final int ID=18;
    public static final int ID_CHAR=19;
    public static final int ID_START_CHAR=20;
    public static final int IMPLICATION=21;
    public static final int IMPORT=22;
    public static final int INSTANCE=23;
    public static final int IRI=24;
    public static final int IRI_CHAR=25;
    public static final int IRI_REF=26;
    public static final int IRI_START_CHAR=27;
    public static final int LESS=28;
    public static final int LITERAL=29;
    public static final int LOCAL=30;
    public static final int LPAR=31;
    public static final int LSQBR=32;
    public static final int MULTI_LINE_COMMENT=33;
    public static final int NUMBER=34;
    public static final int OR=35;
    public static final int PREFIX=36;
    public static final int PSOA=37;
    public static final int RPAR=38;
    public static final int RSQBR=39;
    public static final int SHORTCONST=40;
    public static final int SLOT=41;
    public static final int SLOT_ARROW=42;
    public static final int STRING=43;
    public static final int SUBCLASS=44;
    public static final int SYMSPACE_OPER=45;
    public static final int TOP=46;
    public static final int TUPLE=47;
    public static final int VAR_ID=48;
    public static final int VAR_LIST=49;
    public static final int WHITESPACE=50;

    // delegates
    public TreeParser[] getDelegates() {
        return new TreeParser[] {};
    }

    // delegators


    public PSOAObjectifier(TreeNodeStream input) {
        this(input, new RecognizerSharedState());
    }
    public PSOAObjectifier(TreeNodeStream input, RecognizerSharedState state) {
        super(input, state);
    }

protected TreeAdaptor adaptor = new CommonTreeAdaptor();

public void setTreeAdaptor(TreeAdaptor adaptor) {
    this.adaptor = adaptor;
}
public TreeAdaptor getTreeAdaptor() {
    return adaptor;
}
    public String[] getTokenNames() { return PSOAObjectifier.tokenNames; }
    public String getGrammarFileName() { return "org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g"; }


        private boolean m_isRule = false, m_isQuery = false;
        private int m_localConstID = 0, m_varID = 0;


    public static class document_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "document"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:23:1: document : ^( DOCUMENT ( base )? ( prefix )* ( importDecl )* ( group )? ) ;
    public final PSOAObjectifier.document_return document() throws RecognitionException {
        PSOAObjectifier.document_return retval = new PSOAObjectifier.document_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree DOCUMENT1=null;
        PSOAObjectifier.base_return base2 =null;

        PSOAObjectifier.prefix_return prefix3 =null;

        PSOAObjectifier.importDecl_return importDecl4 =null;

        PSOAObjectifier.group_return group5 =null;


        CommonTree DOCUMENT1_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:24:5: ( ^( DOCUMENT ( base )? ( prefix )* ( importDecl )* ( group )? ) )
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:24:9: ^( DOCUMENT ( base )? ( prefix )* ( importDecl )* ( group )? )
            {
            _last = (CommonTree)input.LT(1);
            {
            CommonTree _save_last_1 = _last;
            CommonTree _first_1 = null;
            _last = (CommonTree)input.LT(1);
            DOCUMENT1=(CommonTree)match(input,DOCUMENT,FOLLOW_DOCUMENT_in_document80); 


            if ( _first_0==null ) _first_0 = DOCUMENT1;
            if ( input.LA(1)==Token.DOWN ) {
                match(input, Token.DOWN, null); 
                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:24:20: ( base )?
                int alt1=2;
                switch ( input.LA(1) ) {
                    case BASE:
                        {
                        alt1=1;
                        }
                        break;
                }

                switch (alt1) {
                    case 1 :
                        // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:24:20: base
                        {
                        _last = (CommonTree)input.LT(1);
                        pushFollow(FOLLOW_base_in_document82);
                        base2=base();

                        state._fsp--;

                         
                        if ( _first_1==null ) _first_1 = base2.tree;


                        retval.tree = (CommonTree)_first_0;
                        if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                            retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                        }
                        break;

                }


                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:24:26: ( prefix )*
                loop2:
                do {
                    int alt2=2;
                    switch ( input.LA(1) ) {
                    case PREFIX:
                        {
                        alt2=1;
                        }
                        break;

                    }

                    switch (alt2) {
                	case 1 :
                	    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:24:26: prefix
                	    {
                	    _last = (CommonTree)input.LT(1);
                	    pushFollow(FOLLOW_prefix_in_document85);
                	    prefix3=prefix();

                	    state._fsp--;

                	     
                	    if ( _first_1==null ) _first_1 = prefix3.tree;


                	    retval.tree = (CommonTree)_first_0;
                	    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                	        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                	    }
                	    break;

                	default :
                	    break loop2;
                    }
                } while (true);


                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:24:34: ( importDecl )*
                loop3:
                do {
                    int alt3=2;
                    switch ( input.LA(1) ) {
                    case IMPORT:
                        {
                        alt3=1;
                        }
                        break;

                    }

                    switch (alt3) {
                	case 1 :
                	    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:24:34: importDecl
                	    {
                	    _last = (CommonTree)input.LT(1);
                	    pushFollow(FOLLOW_importDecl_in_document88);
                	    importDecl4=importDecl();

                	    state._fsp--;

                	     
                	    if ( _first_1==null ) _first_1 = importDecl4.tree;


                	    retval.tree = (CommonTree)_first_0;
                	    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                	        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                	    }
                	    break;

                	default :
                	    break loop3;
                    }
                } while (true);


                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:24:46: ( group )?
                int alt4=2;
                switch ( input.LA(1) ) {
                    case GROUP:
                        {
                        alt4=1;
                        }
                        break;
                }

                switch (alt4) {
                    case 1 :
                        // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:24:46: group
                        {
                        _last = (CommonTree)input.LT(1);
                        pushFollow(FOLLOW_group_in_document91);
                        group5=group();

                        state._fsp--;

                         
                        if ( _first_1==null ) _first_1 = group5.tree;


                        retval.tree = (CommonTree)_first_0;
                        if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                            retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                        }
                        break;

                }


                match(input, Token.UP, null); 
            }
            _last = _save_last_1;
            }


            retval.tree = (CommonTree)_first_0;
            if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "document"


    public static class base_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "base"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:27:1: base : ^( BASE IRI_REF ) ;
    public final PSOAObjectifier.base_return base() throws RecognitionException {
        PSOAObjectifier.base_return retval = new PSOAObjectifier.base_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree BASE6=null;
        CommonTree IRI_REF7=null;

        CommonTree BASE6_tree=null;
        CommonTree IRI_REF7_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:28:5: ( ^( BASE IRI_REF ) )
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:28:9: ^( BASE IRI_REF )
            {
            _last = (CommonTree)input.LT(1);
            {
            CommonTree _save_last_1 = _last;
            CommonTree _first_1 = null;
            _last = (CommonTree)input.LT(1);
            BASE6=(CommonTree)match(input,BASE,FOLLOW_BASE_in_base113); 


            if ( _first_0==null ) _first_0 = BASE6;
            match(input, Token.DOWN, null); 
            _last = (CommonTree)input.LT(1);
            IRI_REF7=(CommonTree)match(input,IRI_REF,FOLLOW_IRI_REF_in_base115); 
             
            if ( _first_1==null ) _first_1 = IRI_REF7;


            match(input, Token.UP, null); 
            _last = _save_last_1;
            }


            retval.tree = (CommonTree)_first_0;
            if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "base"


    public static class prefix_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "prefix"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:31:1: prefix : ^( PREFIX ID IRI_REF ) ;
    public final PSOAObjectifier.prefix_return prefix() throws RecognitionException {
        PSOAObjectifier.prefix_return retval = new PSOAObjectifier.prefix_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree PREFIX8=null;
        CommonTree ID9=null;
        CommonTree IRI_REF10=null;

        CommonTree PREFIX8_tree=null;
        CommonTree ID9_tree=null;
        CommonTree IRI_REF10_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:32:5: ( ^( PREFIX ID IRI_REF ) )
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:32:9: ^( PREFIX ID IRI_REF )
            {
            _last = (CommonTree)input.LT(1);
            {
            CommonTree _save_last_1 = _last;
            CommonTree _first_1 = null;
            _last = (CommonTree)input.LT(1);
            PREFIX8=(CommonTree)match(input,PREFIX,FOLLOW_PREFIX_in_prefix136); 


            if ( _first_0==null ) _first_0 = PREFIX8;
            match(input, Token.DOWN, null); 
            _last = (CommonTree)input.LT(1);
            ID9=(CommonTree)match(input,ID,FOLLOW_ID_in_prefix138); 
             
            if ( _first_1==null ) _first_1 = ID9;


            _last = (CommonTree)input.LT(1);
            IRI_REF10=(CommonTree)match(input,IRI_REF,FOLLOW_IRI_REF_in_prefix140); 
             
            if ( _first_1==null ) _first_1 = IRI_REF10;


            match(input, Token.UP, null); 
            _last = _save_last_1;
            }


            retval.tree = (CommonTree)_first_0;
            if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "prefix"


    public static class importDecl_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "importDecl"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:35:1: importDecl : ^( IMPORT IRI_REF ( IRI_REF )? ) ;
    public final PSOAObjectifier.importDecl_return importDecl() throws RecognitionException {
        PSOAObjectifier.importDecl_return retval = new PSOAObjectifier.importDecl_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree IMPORT11=null;
        CommonTree IRI_REF12=null;
        CommonTree IRI_REF13=null;

        CommonTree IMPORT11_tree=null;
        CommonTree IRI_REF12_tree=null;
        CommonTree IRI_REF13_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:36:5: ( ^( IMPORT IRI_REF ( IRI_REF )? ) )
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:36:9: ^( IMPORT IRI_REF ( IRI_REF )? )
            {
            _last = (CommonTree)input.LT(1);
            {
            CommonTree _save_last_1 = _last;
            CommonTree _first_1 = null;
            _last = (CommonTree)input.LT(1);
            IMPORT11=(CommonTree)match(input,IMPORT,FOLLOW_IMPORT_in_importDecl161); 


            if ( _first_0==null ) _first_0 = IMPORT11;
            match(input, Token.DOWN, null); 
            _last = (CommonTree)input.LT(1);
            IRI_REF12=(CommonTree)match(input,IRI_REF,FOLLOW_IRI_REF_in_importDecl163); 
             
            if ( _first_1==null ) _first_1 = IRI_REF12;


            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:36:26: ( IRI_REF )?
            int alt5=2;
            switch ( input.LA(1) ) {
                case IRI_REF:
                    {
                    alt5=1;
                    }
                    break;
            }

            switch (alt5) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:36:26: IRI_REF
                    {
                    _last = (CommonTree)input.LT(1);
                    IRI_REF13=(CommonTree)match(input,IRI_REF,FOLLOW_IRI_REF_in_importDecl165); 
                     
                    if ( _first_1==null ) _first_1 = IRI_REF13;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;

            }


            match(input, Token.UP, null); 
            _last = _save_last_1;
            }


            retval.tree = (CommonTree)_first_0;
            if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "importDecl"


    public static class group_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "group"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:39:1: group : ^( GROUP ( group_element )* ) ;
    public final PSOAObjectifier.group_return group() throws RecognitionException {
        PSOAObjectifier.group_return retval = new PSOAObjectifier.group_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree GROUP14=null;
        PSOAObjectifier.group_element_return group_element15 =null;


        CommonTree GROUP14_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:40:5: ( ^( GROUP ( group_element )* ) )
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:40:9: ^( GROUP ( group_element )* )
            {
            _last = (CommonTree)input.LT(1);
            {
            CommonTree _save_last_1 = _last;
            CommonTree _first_1 = null;
            _last = (CommonTree)input.LT(1);
            GROUP14=(CommonTree)match(input,GROUP,FOLLOW_GROUP_in_group187); 


            if ( _first_0==null ) _first_0 = GROUP14;
            if ( input.LA(1)==Token.DOWN ) {
                match(input, Token.DOWN, null); 
                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:40:17: ( group_element )*
                loop6:
                do {
                    int alt6=2;
                    switch ( input.LA(1) ) {
                    case EQUAL:
                    case FORALL:
                    case GROUP:
                    case IMPLICATION:
                    case PSOA:
                    case SUBCLASS:
                        {
                        alt6=1;
                        }
                        break;

                    }

                    switch (alt6) {
                	case 1 :
                	    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:40:17: group_element
                	    {
                	    _last = (CommonTree)input.LT(1);
                	    pushFollow(FOLLOW_group_element_in_group189);
                	    group_element15=group_element();

                	    state._fsp--;

                	     
                	    if ( _first_1==null ) _first_1 = group_element15.tree;


                	    retval.tree = (CommonTree)_first_0;
                	    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                	        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                	    }
                	    break;

                	default :
                	    break loop6;
                    }
                } while (true);


                match(input, Token.UP, null); 
            }
            _last = _save_last_1;
            }


            retval.tree = (CommonTree)_first_0;
            if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "group"


    public static class group_element_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "group_element"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:43:1: group_element : ( rule | group );
    public final PSOAObjectifier.group_element_return group_element() throws RecognitionException {
        PSOAObjectifier.group_element_return retval = new PSOAObjectifier.group_element_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        PSOAObjectifier.rule_return rule16 =null;

        PSOAObjectifier.group_return group17 =null;



        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:44:5: ( rule | group )
            int alt7=2;
            switch ( input.LA(1) ) {
            case EQUAL:
            case FORALL:
            case IMPLICATION:
            case PSOA:
            case SUBCLASS:
                {
                alt7=1;
                }
                break;
            case GROUP:
                {
                alt7=2;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 7, 0, input);

                throw nvae;

            }

            switch (alt7) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:44:9: rule
                    {
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_rule_in_group_element210);
                    rule16=rule();

                    state._fsp--;

                     
                    if ( _first_0==null ) _first_0 = rule16.tree;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:45:9: group
                    {
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_group_in_group_element220);
                    group17=group();

                    state._fsp--;

                     
                    if ( _first_0==null ) _first_0 = group17.tree;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;

            }
        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "group_element"


    public static class query_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "query"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:48:1: query : formula ;
    public final PSOAObjectifier.query_return query() throws RecognitionException {
        PSOAObjectifier.query_return retval = new PSOAObjectifier.query_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        PSOAObjectifier.formula_return formula18 =null;



        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:49:5: ( formula )
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:49:9: formula
            {
             m_isQuery = true; 

            _last = (CommonTree)input.LT(1);
            pushFollow(FOLLOW_formula_in_query241);
            formula18=formula();

            state._fsp--;

             
            if ( _first_0==null ) _first_0 = formula18.tree;


             m_isQuery = false; 

            retval.tree = (CommonTree)_first_0;
            if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "query"


    public static class rule_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "rule"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:52:1: rule : ( ^( FORALL ( VAR_ID )+ clause ) | clause );
    public final PSOAObjectifier.rule_return rule() throws RecognitionException {
        PSOAObjectifier.rule_return retval = new PSOAObjectifier.rule_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree FORALL19=null;
        CommonTree VAR_ID20=null;
        PSOAObjectifier.clause_return clause21 =null;

        PSOAObjectifier.clause_return clause22 =null;


        CommonTree FORALL19_tree=null;
        CommonTree VAR_ID20_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:53:5: ( ^( FORALL ( VAR_ID )+ clause ) | clause )
            int alt9=2;
            switch ( input.LA(1) ) {
            case FORALL:
                {
                alt9=1;
                }
                break;
            case EQUAL:
            case IMPLICATION:
            case PSOA:
            case SUBCLASS:
                {
                alt9=2;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 9, 0, input);

                throw nvae;

            }

            switch (alt9) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:53:9: ^( FORALL ( VAR_ID )+ clause )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    _last = (CommonTree)input.LT(1);
                    FORALL19=(CommonTree)match(input,FORALL,FOLLOW_FORALL_in_rule267); 


                    if ( _first_0==null ) _first_0 = FORALL19;
                    match(input, Token.DOWN, null); 
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:53:18: ( VAR_ID )+
                    int cnt8=0;
                    loop8:
                    do {
                        int alt8=2;
                        switch ( input.LA(1) ) {
                        case VAR_ID:
                            {
                            alt8=1;
                            }
                            break;

                        }

                        switch (alt8) {
                    	case 1 :
                    	    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:53:18: VAR_ID
                    	    {
                    	    _last = (CommonTree)input.LT(1);
                    	    VAR_ID20=(CommonTree)match(input,VAR_ID,FOLLOW_VAR_ID_in_rule269); 
                    	     
                    	    if ( _first_1==null ) _first_1 = VAR_ID20;


                    	    retval.tree = (CommonTree)_first_0;
                    	    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                    	        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    	    }
                    	    break;

                    	default :
                    	    if ( cnt8 >= 1 ) break loop8;
                                EarlyExitException eee =
                                    new EarlyExitException(8, input);
                                throw eee;
                        }
                        cnt8++;
                    } while (true);


                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_clause_in_rule272);
                    clause21=clause();

                    state._fsp--;

                     
                    if ( _first_1==null ) _first_1 = clause21.tree;


                    match(input, Token.UP, null); 
                    _last = _save_last_1;
                    }


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:54:6: clause
                    {
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_clause_in_rule280);
                    clause22=clause();

                    state._fsp--;

                     
                    if ( _first_0==null ) _first_0 = clause22.tree;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;

            }
        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "rule"


    public static class clause_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "clause"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:57:1: clause : ( ^( IMPLICATION head formula ) | atomic );
    public final PSOAObjectifier.clause_return clause() throws RecognitionException {
        PSOAObjectifier.clause_return retval = new PSOAObjectifier.clause_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree IMPLICATION23=null;
        PSOAObjectifier.head_return head24 =null;

        PSOAObjectifier.formula_return formula25 =null;

        PSOAObjectifier.atomic_return atomic26 =null;


        CommonTree IMPLICATION23_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:58:5: ( ^( IMPLICATION head formula ) | atomic )
            int alt10=2;
            switch ( input.LA(1) ) {
            case IMPLICATION:
                {
                alt10=1;
                }
                break;
            case EQUAL:
            case PSOA:
            case SUBCLASS:
                {
                alt10=2;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 10, 0, input);

                throw nvae;

            }

            switch (alt10) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:58:9: ^( IMPLICATION head formula )
                    {
                     m_isRule = true; 

                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    _last = (CommonTree)input.LT(1);
                    IMPLICATION23=(CommonTree)match(input,IMPLICATION,FOLLOW_IMPLICATION_in_clause310); 


                    if ( _first_0==null ) _first_0 = IMPLICATION23;
                    match(input, Token.DOWN, null); 
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_head_in_clause312);
                    head24=head();

                    state._fsp--;

                     
                    if ( _first_1==null ) _first_1 = head24.tree;


                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_formula_in_clause314);
                    formula25=formula();

                    state._fsp--;

                     
                    if ( _first_1==null ) _first_1 = formula25.tree;


                    match(input, Token.UP, null); 
                    _last = _save_last_1;
                    }


                     m_isRule = false; 

                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:61:9: atomic
                    {
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_atomic_in_clause335);
                    atomic26=atomic();

                    state._fsp--;

                     
                    if ( _first_0==null ) _first_0 = atomic26.tree;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;

            }
        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "clause"


    public static class head_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "head"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:64:1: head : ( atomic | ^( EXISTS ( VAR_ID )+ atomic ) );
    public final PSOAObjectifier.head_return head() throws RecognitionException {
        PSOAObjectifier.head_return retval = new PSOAObjectifier.head_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree EXISTS28=null;
        CommonTree VAR_ID29=null;
        PSOAObjectifier.atomic_return atomic27 =null;

        PSOAObjectifier.atomic_return atomic30 =null;


        CommonTree EXISTS28_tree=null;
        CommonTree VAR_ID29_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:65:5: ( atomic | ^( EXISTS ( VAR_ID )+ atomic ) )
            int alt12=2;
            switch ( input.LA(1) ) {
            case EQUAL:
            case PSOA:
            case SUBCLASS:
                {
                alt12=1;
                }
                break;
            case EXISTS:
                {
                alt12=2;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 12, 0, input);

                throw nvae;

            }

            switch (alt12) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:65:9: atomic
                    {
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_atomic_in_head358);
                    atomic27=atomic();

                    state._fsp--;

                     
                    if ( _first_0==null ) _first_0 = atomic27.tree;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:66:9: ^( EXISTS ( VAR_ID )+ atomic )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    _last = (CommonTree)input.LT(1);
                    EXISTS28=(CommonTree)match(input,EXISTS,FOLLOW_EXISTS_in_head369); 


                    if ( _first_0==null ) _first_0 = EXISTS28;
                    match(input, Token.DOWN, null); 
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:66:18: ( VAR_ID )+
                    int cnt11=0;
                    loop11:
                    do {
                        int alt11=2;
                        switch ( input.LA(1) ) {
                        case VAR_ID:
                            {
                            alt11=1;
                            }
                            break;

                        }

                        switch (alt11) {
                    	case 1 :
                    	    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:66:18: VAR_ID
                    	    {
                    	    _last = (CommonTree)input.LT(1);
                    	    VAR_ID29=(CommonTree)match(input,VAR_ID,FOLLOW_VAR_ID_in_head371); 
                    	     
                    	    if ( _first_1==null ) _first_1 = VAR_ID29;


                    	    retval.tree = (CommonTree)_first_0;
                    	    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                    	        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    	    }
                    	    break;

                    	default :
                    	    if ( cnt11 >= 1 ) break loop11;
                                EarlyExitException eee =
                                    new EarlyExitException(11, input);
                                throw eee;
                        }
                        cnt11++;
                    } while (true);


                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_atomic_in_head374);
                    atomic30=atomic();

                    state._fsp--;

                     
                    if ( _first_1==null ) _first_1 = atomic30.tree;


                    match(input, Token.UP, null); 
                    _last = _save_last_1;
                    }


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;

            }
        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "head"


    public static class formula_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "formula"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:69:1: formula : ( ^( AND ( formula )+ ) | ^( OR ( formula )+ ) | ^( EXISTS ( VAR_ID )+ formula ) | atomic | external );
    public final PSOAObjectifier.formula_return formula() throws RecognitionException {
        PSOAObjectifier.formula_return retval = new PSOAObjectifier.formula_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree AND31=null;
        CommonTree OR33=null;
        CommonTree EXISTS35=null;
        CommonTree VAR_ID36=null;
        PSOAObjectifier.formula_return formula32 =null;

        PSOAObjectifier.formula_return formula34 =null;

        PSOAObjectifier.formula_return formula37 =null;

        PSOAObjectifier.atomic_return atomic38 =null;

        PSOAObjectifier.external_return external39 =null;


        CommonTree AND31_tree=null;
        CommonTree OR33_tree=null;
        CommonTree EXISTS35_tree=null;
        CommonTree VAR_ID36_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:70:5: ( ^( AND ( formula )+ ) | ^( OR ( formula )+ ) | ^( EXISTS ( VAR_ID )+ formula ) | atomic | external )
            int alt16=5;
            switch ( input.LA(1) ) {
            case AND:
                {
                alt16=1;
                }
                break;
            case OR:
                {
                alt16=2;
                }
                break;
            case EXISTS:
                {
                alt16=3;
                }
                break;
            case EQUAL:
            case PSOA:
            case SUBCLASS:
                {
                alt16=4;
                }
                break;
            case EXTERNAL:
                {
                alt16=5;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 16, 0, input);

                throw nvae;

            }

            switch (alt16) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:70:9: ^( AND ( formula )+ )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    _last = (CommonTree)input.LT(1);
                    AND31=(CommonTree)match(input,AND,FOLLOW_AND_in_formula395); 


                    if ( _first_0==null ) _first_0 = AND31;
                    match(input, Token.DOWN, null); 
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:70:15: ( formula )+
                    int cnt13=0;
                    loop13:
                    do {
                        int alt13=2;
                        switch ( input.LA(1) ) {
                        case AND:
                        case EQUAL:
                        case EXISTS:
                        case EXTERNAL:
                        case OR:
                        case PSOA:
                        case SUBCLASS:
                            {
                            alt13=1;
                            }
                            break;

                        }

                        switch (alt13) {
                    	case 1 :
                    	    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:70:15: formula
                    	    {
                    	    _last = (CommonTree)input.LT(1);
                    	    pushFollow(FOLLOW_formula_in_formula397);
                    	    formula32=formula();

                    	    state._fsp--;

                    	     
                    	    if ( _first_1==null ) _first_1 = formula32.tree;


                    	    retval.tree = (CommonTree)_first_0;
                    	    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                    	        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    	    }
                    	    break;

                    	default :
                    	    if ( cnt13 >= 1 ) break loop13;
                                EarlyExitException eee =
                                    new EarlyExitException(13, input);
                                throw eee;
                        }
                        cnt13++;
                    } while (true);


                    match(input, Token.UP, null); 
                    _last = _save_last_1;
                    }


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:71:9: ^( OR ( formula )+ )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    _last = (CommonTree)input.LT(1);
                    OR33=(CommonTree)match(input,OR,FOLLOW_OR_in_formula410); 


                    if ( _first_0==null ) _first_0 = OR33;
                    match(input, Token.DOWN, null); 
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:71:14: ( formula )+
                    int cnt14=0;
                    loop14:
                    do {
                        int alt14=2;
                        switch ( input.LA(1) ) {
                        case AND:
                        case EQUAL:
                        case EXISTS:
                        case EXTERNAL:
                        case OR:
                        case PSOA:
                        case SUBCLASS:
                            {
                            alt14=1;
                            }
                            break;

                        }

                        switch (alt14) {
                    	case 1 :
                    	    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:71:14: formula
                    	    {
                    	    _last = (CommonTree)input.LT(1);
                    	    pushFollow(FOLLOW_formula_in_formula412);
                    	    formula34=formula();

                    	    state._fsp--;

                    	     
                    	    if ( _first_1==null ) _first_1 = formula34.tree;


                    	    retval.tree = (CommonTree)_first_0;
                    	    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                    	        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    	    }
                    	    break;

                    	default :
                    	    if ( cnt14 >= 1 ) break loop14;
                                EarlyExitException eee =
                                    new EarlyExitException(14, input);
                                throw eee;
                        }
                        cnt14++;
                    } while (true);


                    match(input, Token.UP, null); 
                    _last = _save_last_1;
                    }


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 3 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:72:9: ^( EXISTS ( VAR_ID )+ formula )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    _last = (CommonTree)input.LT(1);
                    EXISTS35=(CommonTree)match(input,EXISTS,FOLLOW_EXISTS_in_formula425); 


                    if ( _first_0==null ) _first_0 = EXISTS35;
                    match(input, Token.DOWN, null); 
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:72:18: ( VAR_ID )+
                    int cnt15=0;
                    loop15:
                    do {
                        int alt15=2;
                        switch ( input.LA(1) ) {
                        case VAR_ID:
                            {
                            alt15=1;
                            }
                            break;

                        }

                        switch (alt15) {
                    	case 1 :
                    	    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:72:18: VAR_ID
                    	    {
                    	    _last = (CommonTree)input.LT(1);
                    	    VAR_ID36=(CommonTree)match(input,VAR_ID,FOLLOW_VAR_ID_in_formula427); 
                    	     
                    	    if ( _first_1==null ) _first_1 = VAR_ID36;


                    	    retval.tree = (CommonTree)_first_0;
                    	    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                    	        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    	    }
                    	    break;

                    	default :
                    	    if ( cnt15 >= 1 ) break loop15;
                                EarlyExitException eee =
                                    new EarlyExitException(15, input);
                                throw eee;
                        }
                        cnt15++;
                    } while (true);


                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_formula_in_formula430);
                    formula37=formula();

                    state._fsp--;

                     
                    if ( _first_1==null ) _first_1 = formula37.tree;


                    match(input, Token.UP, null); 
                    _last = _save_last_1;
                    }


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 4 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:73:9: atomic
                    {
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_atomic_in_formula441);
                    atomic38=atomic();

                    state._fsp--;

                     
                    if ( _first_0==null ) _first_0 = atomic38.tree;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 5 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:74:9: external
                    {
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_external_in_formula451);
                    external39=external();

                    state._fsp--;

                     
                    if ( _first_0==null ) _first_0 = external39.tree;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;

            }
        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "formula"


    public static class atomic_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "atomic"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:77:1: atomic : ( atom | equal | subclass );
    public final PSOAObjectifier.atomic_return atomic() throws RecognitionException {
        PSOAObjectifier.atomic_return retval = new PSOAObjectifier.atomic_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        PSOAObjectifier.atom_return atom40 =null;

        PSOAObjectifier.equal_return equal41 =null;

        PSOAObjectifier.subclass_return subclass42 =null;



        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:78:5: ( atom | equal | subclass )
            int alt17=3;
            switch ( input.LA(1) ) {
            case PSOA:
                {
                alt17=1;
                }
                break;
            case EQUAL:
                {
                alt17=2;
                }
                break;
            case SUBCLASS:
                {
                alt17=3;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 17, 0, input);

                throw nvae;

            }

            switch (alt17) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:78:9: atom
                    {
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_atom_in_atomic470);
                    atom40=atom();

                    state._fsp--;

                     
                    if ( _first_0==null ) _first_0 = atom40.tree;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:79:9: equal
                    {
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_equal_in_atomic480);
                    equal41=equal();

                    state._fsp--;

                     
                    if ( _first_0==null ) _first_0 = equal41.tree;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 3 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:80:9: subclass
                    {
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_subclass_in_atomic490);
                    subclass42=subclass();

                    state._fsp--;

                     
                    if ( _first_0==null ) _first_0 = subclass42.tree;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;

            }
        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "atomic"


    public static class atom_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "atom"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:83:1: atom : psoa[true] ;
    public final PSOAObjectifier.atom_return atom() throws RecognitionException {
        PSOAObjectifier.atom_return retval = new PSOAObjectifier.atom_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        PSOAObjectifier.psoa_return psoa43 =null;



        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:84:5: ( psoa[true] )
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:84:9: psoa[true]
            {
            _last = (CommonTree)input.LT(1);
            pushFollow(FOLLOW_psoa_in_atom509);
            psoa43=psoa(true);

            state._fsp--;

             
            if ( _first_0==null ) _first_0 = psoa43.tree;


            retval.tree = (CommonTree)_first_0;
            if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "atom"


    public static class equal_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "equal"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:87:1: equal : ^( EQUAL term term ) ;
    public final PSOAObjectifier.equal_return equal() throws RecognitionException {
        PSOAObjectifier.equal_return retval = new PSOAObjectifier.equal_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree EQUAL44=null;
        PSOAObjectifier.term_return term45 =null;

        PSOAObjectifier.term_return term46 =null;


        CommonTree EQUAL44_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:88:5: ( ^( EQUAL term term ) )
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:88:9: ^( EQUAL term term )
            {
            _last = (CommonTree)input.LT(1);
            {
            CommonTree _save_last_1 = _last;
            CommonTree _first_1 = null;
            _last = (CommonTree)input.LT(1);
            EQUAL44=(CommonTree)match(input,EQUAL,FOLLOW_EQUAL_in_equal530); 


            if ( _first_0==null ) _first_0 = EQUAL44;
            match(input, Token.DOWN, null); 
            _last = (CommonTree)input.LT(1);
            pushFollow(FOLLOW_term_in_equal532);
            term45=term();

            state._fsp--;

             
            if ( _first_1==null ) _first_1 = term45.tree;


            _last = (CommonTree)input.LT(1);
            pushFollow(FOLLOW_term_in_equal534);
            term46=term();

            state._fsp--;

             
            if ( _first_1==null ) _first_1 = term46.tree;


            match(input, Token.UP, null); 
            _last = _save_last_1;
            }


            retval.tree = (CommonTree)_first_0;
            if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "equal"


    public static class subclass_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "subclass"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:91:1: subclass : ^( SUBCLASS term term ) ;
    public final PSOAObjectifier.subclass_return subclass() throws RecognitionException {
        PSOAObjectifier.subclass_return retval = new PSOAObjectifier.subclass_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree SUBCLASS47=null;
        PSOAObjectifier.term_return term48 =null;

        PSOAObjectifier.term_return term49 =null;


        CommonTree SUBCLASS47_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:92:5: ( ^( SUBCLASS term term ) )
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:92:9: ^( SUBCLASS term term )
            {
            _last = (CommonTree)input.LT(1);
            {
            CommonTree _save_last_1 = _last;
            CommonTree _first_1 = null;
            _last = (CommonTree)input.LT(1);
            SUBCLASS47=(CommonTree)match(input,SUBCLASS,FOLLOW_SUBCLASS_in_subclass555); 


            if ( _first_0==null ) _first_0 = SUBCLASS47;
            match(input, Token.DOWN, null); 
            _last = (CommonTree)input.LT(1);
            pushFollow(FOLLOW_term_in_subclass557);
            term48=term();

            state._fsp--;

             
            if ( _first_1==null ) _first_1 = term48.tree;


            _last = (CommonTree)input.LT(1);
            pushFollow(FOLLOW_term_in_subclass559);
            term49=term();

            state._fsp--;

             
            if ( _first_1==null ) _first_1 = term49.tree;


            match(input, Token.UP, null); 
            _last = _save_last_1;
            }


            retval.tree = (CommonTree)_first_0;
            if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "subclass"


    public static class term_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "term"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:95:1: term : ( constant | VAR_ID | psoa[false] | external );
    public final PSOAObjectifier.term_return term() throws RecognitionException {
        PSOAObjectifier.term_return retval = new PSOAObjectifier.term_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree VAR_ID51=null;
        PSOAObjectifier.constant_return constant50 =null;

        PSOAObjectifier.psoa_return psoa52 =null;

        PSOAObjectifier.external_return external53 =null;


        CommonTree VAR_ID51_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:96:5: ( constant | VAR_ID | psoa[false] | external )
            int alt18=4;
            switch ( input.LA(1) ) {
            case LITERAL:
            case SHORTCONST:
            case TOP:
                {
                alt18=1;
                }
                break;
            case VAR_ID:
                {
                alt18=2;
                }
                break;
            case PSOA:
                {
                alt18=3;
                }
                break;
            case EXTERNAL:
                {
                alt18=4;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 18, 0, input);

                throw nvae;

            }

            switch (alt18) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:96:9: constant
                    {
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_constant_in_term583);
                    constant50=constant();

                    state._fsp--;

                     
                    if ( _first_0==null ) _first_0 = constant50.tree;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:97:9: VAR_ID
                    {
                    _last = (CommonTree)input.LT(1);
                    VAR_ID51=(CommonTree)match(input,VAR_ID,FOLLOW_VAR_ID_in_term593); 
                     
                    if ( _first_0==null ) _first_0 = VAR_ID51;



                                if ((VAR_ID51!=null?VAR_ID51.getText():null).equals("obj"))
                                    throw new RuntimeException("?obj is a reserved variable and can not be used.");
                            

                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 3 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:102:9: psoa[false]
                    {
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_psoa_in_term614);
                    psoa52=psoa(false);

                    state._fsp--;

                     
                    if ( _first_0==null ) _first_0 = psoa52.tree;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 4 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:103:9: external
                    {
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_external_in_term625);
                    external53=external();

                    state._fsp--;

                     
                    if ( _first_0==null ) _first_0 = external53.tree;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;

            }
        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "term"


    public static class external_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "external"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:106:1: external : ^( EXTERNAL psoa[false] ) ;
    public final PSOAObjectifier.external_return external() throws RecognitionException {
        PSOAObjectifier.external_return retval = new PSOAObjectifier.external_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree EXTERNAL54=null;
        PSOAObjectifier.psoa_return psoa55 =null;


        CommonTree EXTERNAL54_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:107:5: ( ^( EXTERNAL psoa[false] ) )
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:107:9: ^( EXTERNAL psoa[false] )
            {
            _last = (CommonTree)input.LT(1);
            {
            CommonTree _save_last_1 = _last;
            CommonTree _first_1 = null;
            _last = (CommonTree)input.LT(1);
            EXTERNAL54=(CommonTree)match(input,EXTERNAL,FOLLOW_EXTERNAL_in_external645); 


            if ( _first_0==null ) _first_0 = EXTERNAL54;
            match(input, Token.DOWN, null); 
            _last = (CommonTree)input.LT(1);
            pushFollow(FOLLOW_psoa_in_external647);
            psoa55=psoa(false);

            state._fsp--;

             
            if ( _first_1==null ) _first_1 = psoa55.tree;


            match(input, Token.UP, null); 
            _last = _save_last_1;
            }


            retval.tree = (CommonTree)_first_0;
            if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "external"


    public static class psoa_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "psoa"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:110:1: psoa[boolean isAtomic] : ^( PSOA (oid= term )? ^( INSTANCE type= term ) ( tuple )* ( slot )* ) -> { oid != null || !isAtomic }? ^( PSOA $oid ^( INSTANCE $type) ( tuple )* ( slot )* ) -> { m_isRule || m_isQuery }? ^( EXISTS VAR_ID[varname = \"obj\"] ^( PSOA VAR_ID[varname] ^( INSTANCE $type) ( tuple )* ( slot )* ) ) -> ^( PSOA ^( SHORTCONST LOCAL[String.valueOf(++m_localConstID)] ) ^( INSTANCE $type) ( tuple )* ( slot )* ) ;
    public final PSOAObjectifier.psoa_return psoa(boolean isAtomic) throws RecognitionException {
        PSOAObjectifier.psoa_return retval = new PSOAObjectifier.psoa_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree PSOA56=null;
        CommonTree INSTANCE57=null;
        PSOAObjectifier.term_return oid =null;

        PSOAObjectifier.term_return type =null;

        PSOAObjectifier.tuple_return tuple58 =null;

        PSOAObjectifier.slot_return slot59 =null;


        CommonTree PSOA56_tree=null;
        CommonTree INSTANCE57_tree=null;
        RewriteRuleNodeStream stream_PSOA=new RewriteRuleNodeStream(adaptor,"token PSOA");
        RewriteRuleNodeStream stream_INSTANCE=new RewriteRuleNodeStream(adaptor,"token INSTANCE");
        RewriteRuleSubtreeStream stream_term=new RewriteRuleSubtreeStream(adaptor,"rule term");
        RewriteRuleSubtreeStream stream_tuple=new RewriteRuleSubtreeStream(adaptor,"rule tuple");
        RewriteRuleSubtreeStream stream_slot=new RewriteRuleSubtreeStream(adaptor,"rule slot");

            String varname;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:114:5: ( ^( PSOA (oid= term )? ^( INSTANCE type= term ) ( tuple )* ( slot )* ) -> { oid != null || !isAtomic }? ^( PSOA $oid ^( INSTANCE $type) ( tuple )* ( slot )* ) -> { m_isRule || m_isQuery }? ^( EXISTS VAR_ID[varname = \"obj\"] ^( PSOA VAR_ID[varname] ^( INSTANCE $type) ( tuple )* ( slot )* ) ) -> ^( PSOA ^( SHORTCONST LOCAL[String.valueOf(++m_localConstID)] ) ^( INSTANCE $type) ( tuple )* ( slot )* ) )
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:114:9: ^( PSOA (oid= term )? ^( INSTANCE type= term ) ( tuple )* ( slot )* )
            {
            _last = (CommonTree)input.LT(1);
            {
            CommonTree _save_last_1 = _last;
            CommonTree _first_1 = null;
            _last = (CommonTree)input.LT(1);
            PSOA56=(CommonTree)match(input,PSOA,FOLLOW_PSOA_in_psoa679);  
            stream_PSOA.add(PSOA56);


            if ( _first_0==null ) _first_0 = PSOA56;
            match(input, Token.DOWN, null); 
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:114:19: (oid= term )?
            int alt19=2;
            switch ( input.LA(1) ) {
                case EXTERNAL:
                case LITERAL:
                case PSOA:
                case SHORTCONST:
                case TOP:
                case VAR_ID:
                    {
                    alt19=1;
                    }
                    break;
            }

            switch (alt19) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:114:19: oid= term
                    {
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_term_in_psoa683);
                    oid=term();

                    state._fsp--;

                    stream_term.add(oid.getTree());

                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;

            }


            _last = (CommonTree)input.LT(1);
            {
            CommonTree _save_last_2 = _last;
            CommonTree _first_2 = null;
            _last = (CommonTree)input.LT(1);
            INSTANCE57=(CommonTree)match(input,INSTANCE,FOLLOW_INSTANCE_in_psoa687);  
            stream_INSTANCE.add(INSTANCE57);


            if ( _first_1==null ) _first_1 = INSTANCE57;
            match(input, Token.DOWN, null); 
            _last = (CommonTree)input.LT(1);
            pushFollow(FOLLOW_term_in_psoa691);
            type=term();

            state._fsp--;

            stream_term.add(type.getTree());

            match(input, Token.UP, null); 
            _last = _save_last_2;
            }


            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:114:48: ( tuple )*
            loop20:
            do {
                int alt20=2;
                switch ( input.LA(1) ) {
                case TUPLE:
                    {
                    alt20=1;
                    }
                    break;

                }

                switch (alt20) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:114:48: tuple
            	    {
            	    _last = (CommonTree)input.LT(1);
            	    pushFollow(FOLLOW_tuple_in_psoa694);
            	    tuple58=tuple();

            	    state._fsp--;

            	    stream_tuple.add(tuple58.getTree());

            	    retval.tree = (CommonTree)_first_0;
            	    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
            	        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            	    }
            	    break;

            	default :
            	    break loop20;
                }
            } while (true);


            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:114:55: ( slot )*
            loop21:
            do {
                int alt21=2;
                switch ( input.LA(1) ) {
                case SLOT:
                    {
                    alt21=1;
                    }
                    break;

                }

                switch (alt21) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:114:55: slot
            	    {
            	    _last = (CommonTree)input.LT(1);
            	    pushFollow(FOLLOW_slot_in_psoa697);
            	    slot59=slot();

            	    state._fsp--;

            	    stream_slot.add(slot59.getTree());

            	    retval.tree = (CommonTree)_first_0;
            	    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
            	        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            	    }
            	    break;

            	default :
            	    break loop21;
                }
            } while (true);


            match(input, Token.UP, null); 
            _last = _save_last_1;
            }


            // AST REWRITE
            // elements: slot, INSTANCE, type, slot, INSTANCE, type, tuple, PSOA, type, tuple, PSOA, oid, slot, PSOA, INSTANCE, tuple
            // token labels: 
            // rule labels: retval, oid, type
            // token list labels: 
            // rule list labels: 
            // wildcard labels: 
            retval.tree = root_0;
            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);
            RewriteRuleSubtreeStream stream_oid=new RewriteRuleSubtreeStream(adaptor,"rule oid",oid!=null?oid.tree:null);
            RewriteRuleSubtreeStream stream_type=new RewriteRuleSubtreeStream(adaptor,"rule type",type!=null?type.tree:null);

            root_0 = (CommonTree)adaptor.nil();
            // 115:5: -> { oid != null || !isAtomic }? ^( PSOA $oid ^( INSTANCE $type) ( tuple )* ( slot )* )
            if ( oid != null || !isAtomic ) {
                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:115:38: ^( PSOA $oid ^( INSTANCE $type) ( tuple )* ( slot )* )
                {
                CommonTree root_1 = (CommonTree)adaptor.nil();
                root_1 = (CommonTree)adaptor.becomeRoot(
                stream_PSOA.nextNode()
                , root_1);

                adaptor.addChild(root_1, stream_oid.nextTree());

                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:115:50: ^( INSTANCE $type)
                {
                CommonTree root_2 = (CommonTree)adaptor.nil();
                root_2 = (CommonTree)adaptor.becomeRoot(
                stream_INSTANCE.nextNode()
                , root_2);

                adaptor.addChild(root_2, stream_type.nextTree());

                adaptor.addChild(root_1, root_2);
                }

                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:115:68: ( tuple )*
                while ( stream_tuple.hasNext() ) {
                    adaptor.addChild(root_1, stream_tuple.nextTree());

                }
                stream_tuple.reset();

                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:115:75: ( slot )*
                while ( stream_slot.hasNext() ) {
                    adaptor.addChild(root_1, stream_slot.nextTree());

                }
                stream_slot.reset();

                adaptor.addChild(root_0, root_1);
                }

            }

            else // 116:5: -> { m_isRule || m_isQuery }? ^( EXISTS VAR_ID[varname = \"obj\"] ^( PSOA VAR_ID[varname] ^( INSTANCE $type) ( tuple )* ( slot )* ) )
            if ( m_isRule || m_isQuery ) {
                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:117:9: ^( EXISTS VAR_ID[varname = \"obj\"] ^( PSOA VAR_ID[varname] ^( INSTANCE $type) ( tuple )* ( slot )* ) )
                {
                CommonTree root_1 = (CommonTree)adaptor.nil();
                root_1 = (CommonTree)adaptor.becomeRoot(
                (CommonTree)adaptor.create(EXISTS, "EXISTS")
                , root_1);

                adaptor.addChild(root_1, 
                (CommonTree)adaptor.create(VAR_ID, varname = "obj")
                );

                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:118:13: ^( PSOA VAR_ID[varname] ^( INSTANCE $type) ( tuple )* ( slot )* )
                {
                CommonTree root_2 = (CommonTree)adaptor.nil();
                root_2 = (CommonTree)adaptor.becomeRoot(
                stream_PSOA.nextNode()
                , root_2);

                adaptor.addChild(root_2, 
                (CommonTree)adaptor.create(VAR_ID, varname)
                );

                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:118:36: ^( INSTANCE $type)
                {
                CommonTree root_3 = (CommonTree)adaptor.nil();
                root_3 = (CommonTree)adaptor.becomeRoot(
                stream_INSTANCE.nextNode()
                , root_3);

                adaptor.addChild(root_3, stream_type.nextTree());

                adaptor.addChild(root_2, root_3);
                }

                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:118:54: ( tuple )*
                while ( stream_tuple.hasNext() ) {
                    adaptor.addChild(root_2, stream_tuple.nextTree());

                }
                stream_tuple.reset();

                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:118:61: ( slot )*
                while ( stream_slot.hasNext() ) {
                    adaptor.addChild(root_2, stream_slot.nextTree());

                }
                stream_slot.reset();

                adaptor.addChild(root_1, root_2);
                }

                adaptor.addChild(root_0, root_1);
                }

            }

            else // 120:5: -> ^( PSOA ^( SHORTCONST LOCAL[String.valueOf(++m_localConstID)] ) ^( INSTANCE $type) ( tuple )* ( slot )* )
            {
                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:120:8: ^( PSOA ^( SHORTCONST LOCAL[String.valueOf(++m_localConstID)] ) ^( INSTANCE $type) ( tuple )* ( slot )* )
                {
                CommonTree root_1 = (CommonTree)adaptor.nil();
                root_1 = (CommonTree)adaptor.becomeRoot(
                stream_PSOA.nextNode()
                , root_1);

                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:120:15: ^( SHORTCONST LOCAL[String.valueOf(++m_localConstID)] )
                {
                CommonTree root_2 = (CommonTree)adaptor.nil();
                root_2 = (CommonTree)adaptor.becomeRoot(
                (CommonTree)adaptor.create(SHORTCONST, "SHORTCONST")
                , root_2);

                adaptor.addChild(root_2, 
                (CommonTree)adaptor.create(LOCAL, String.valueOf(++m_localConstID))
                );

                adaptor.addChild(root_1, root_2);
                }

                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:120:69: ^( INSTANCE $type)
                {
                CommonTree root_2 = (CommonTree)adaptor.nil();
                root_2 = (CommonTree)adaptor.becomeRoot(
                stream_INSTANCE.nextNode()
                , root_2);

                adaptor.addChild(root_2, stream_type.nextTree());

                adaptor.addChild(root_1, root_2);
                }

                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:120:87: ( tuple )*
                while ( stream_tuple.hasNext() ) {
                    adaptor.addChild(root_1, stream_tuple.nextTree());

                }
                stream_tuple.reset();

                // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:120:94: ( slot )*
                while ( stream_slot.hasNext() ) {
                    adaptor.addChild(root_1, stream_slot.nextTree());

                }
                stream_slot.reset();

                adaptor.addChild(root_0, root_1);
                }

            }


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            input.replaceChildren(adaptor.getParent(retval.start),
                                  adaptor.getChildIndex(retval.start),
                                  adaptor.getChildIndex(_last),
                                  retval.tree);

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "psoa"


    public static class tuple_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "tuple"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:123:1: tuple : ^( TUPLE ( term )+ ) ;
    public final PSOAObjectifier.tuple_return tuple() throws RecognitionException {
        PSOAObjectifier.tuple_return retval = new PSOAObjectifier.tuple_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree TUPLE60=null;
        PSOAObjectifier.term_return term61 =null;


        CommonTree TUPLE60_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:124:5: ( ^( TUPLE ( term )+ ) )
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:124:9: ^( TUPLE ( term )+ )
            {
            _last = (CommonTree)input.LT(1);
            {
            CommonTree _save_last_1 = _last;
            CommonTree _first_1 = null;
            _last = (CommonTree)input.LT(1);
            TUPLE60=(CommonTree)match(input,TUPLE,FOLLOW_TUPLE_in_tuple841); 


            if ( _first_0==null ) _first_0 = TUPLE60;
            match(input, Token.DOWN, null); 
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:124:17: ( term )+
            int cnt22=0;
            loop22:
            do {
                int alt22=2;
                switch ( input.LA(1) ) {
                case EXTERNAL:
                case LITERAL:
                case PSOA:
                case SHORTCONST:
                case TOP:
                case VAR_ID:
                    {
                    alt22=1;
                    }
                    break;

                }

                switch (alt22) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:124:17: term
            	    {
            	    _last = (CommonTree)input.LT(1);
            	    pushFollow(FOLLOW_term_in_tuple843);
            	    term61=term();

            	    state._fsp--;

            	     
            	    if ( _first_1==null ) _first_1 = term61.tree;


            	    retval.tree = (CommonTree)_first_0;
            	    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
            	        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            	    }
            	    break;

            	default :
            	    if ( cnt22 >= 1 ) break loop22;
                        EarlyExitException eee =
                            new EarlyExitException(22, input);
                        throw eee;
                }
                cnt22++;
            } while (true);


            match(input, Token.UP, null); 
            _last = _save_last_1;
            }


            retval.tree = (CommonTree)_first_0;
            if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "tuple"


    public static class slot_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "slot"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:127:1: slot : ^( SLOT term term ) ;
    public final PSOAObjectifier.slot_return slot() throws RecognitionException {
        PSOAObjectifier.slot_return retval = new PSOAObjectifier.slot_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree SLOT62=null;
        PSOAObjectifier.term_return term63 =null;

        PSOAObjectifier.term_return term64 =null;


        CommonTree SLOT62_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:128:5: ( ^( SLOT term term ) )
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:128:9: ^( SLOT term term )
            {
            _last = (CommonTree)input.LT(1);
            {
            CommonTree _save_last_1 = _last;
            CommonTree _first_1 = null;
            _last = (CommonTree)input.LT(1);
            SLOT62=(CommonTree)match(input,SLOT,FOLLOW_SLOT_in_slot869); 


            if ( _first_0==null ) _first_0 = SLOT62;
            match(input, Token.DOWN, null); 
            _last = (CommonTree)input.LT(1);
            pushFollow(FOLLOW_term_in_slot871);
            term63=term();

            state._fsp--;

             
            if ( _first_1==null ) _first_1 = term63.tree;


            _last = (CommonTree)input.LT(1);
            pushFollow(FOLLOW_term_in_slot873);
            term64=term();

            state._fsp--;

             
            if ( _first_1==null ) _first_1 = term64.tree;


            match(input, Token.UP, null); 
            _last = _save_last_1;
            }


            retval.tree = (CommonTree)_first_0;
            if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                retval.tree = (CommonTree)adaptor.getParent(retval.tree);

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "slot"


    public static class constant_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "constant"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:131:1: constant : ( ^( LITERAL IRI ) | ^( SHORTCONST constshort ) | TOP );
    public final PSOAObjectifier.constant_return constant() throws RecognitionException {
        PSOAObjectifier.constant_return retval = new PSOAObjectifier.constant_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree LITERAL65=null;
        CommonTree IRI66=null;
        CommonTree SHORTCONST67=null;
        CommonTree TOP69=null;
        PSOAObjectifier.constshort_return constshort68 =null;


        CommonTree LITERAL65_tree=null;
        CommonTree IRI66_tree=null;
        CommonTree SHORTCONST67_tree=null;
        CommonTree TOP69_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:132:5: ( ^( LITERAL IRI ) | ^( SHORTCONST constshort ) | TOP )
            int alt23=3;
            switch ( input.LA(1) ) {
            case LITERAL:
                {
                alt23=1;
                }
                break;
            case SHORTCONST:
                {
                alt23=2;
                }
                break;
            case TOP:
                {
                alt23=3;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 23, 0, input);

                throw nvae;

            }

            switch (alt23) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:132:9: ^( LITERAL IRI )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    _last = (CommonTree)input.LT(1);
                    LITERAL65=(CommonTree)match(input,LITERAL,FOLLOW_LITERAL_in_constant894); 


                    if ( _first_0==null ) _first_0 = LITERAL65;
                    match(input, Token.DOWN, null); 
                    _last = (CommonTree)input.LT(1);
                    IRI66=(CommonTree)match(input,IRI,FOLLOW_IRI_in_constant896); 
                     
                    if ( _first_1==null ) _first_1 = IRI66;


                    match(input, Token.UP, null); 
                    _last = _save_last_1;
                    }


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:133:9: ^( SHORTCONST constshort )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    _last = (CommonTree)input.LT(1);
                    SHORTCONST67=(CommonTree)match(input,SHORTCONST,FOLLOW_SHORTCONST_in_constant908); 


                    if ( _first_0==null ) _first_0 = SHORTCONST67;
                    match(input, Token.DOWN, null); 
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_constshort_in_constant910);
                    constshort68=constshort();

                    state._fsp--;

                     
                    if ( _first_1==null ) _first_1 = constshort68.tree;


                    match(input, Token.UP, null); 
                    _last = _save_last_1;
                    }


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 3 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:134:9: TOP
                    {
                    _last = (CommonTree)input.LT(1);
                    TOP69=(CommonTree)match(input,TOP,FOLLOW_TOP_in_constant921); 
                     
                    if ( _first_0==null ) _first_0 = TOP69;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;

            }
        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "constant"


    public static class constshort_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "constshort"
    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:137:1: constshort : ( IRI | LITERAL | NUMBER | LOCAL );
    public final PSOAObjectifier.constshort_return constshort() throws RecognitionException {
        PSOAObjectifier.constshort_return retval = new PSOAObjectifier.constshort_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree IRI70=null;
        CommonTree LITERAL71=null;
        CommonTree NUMBER72=null;
        CommonTree LOCAL73=null;

        CommonTree IRI70_tree=null;
        CommonTree LITERAL71_tree=null;
        CommonTree NUMBER72_tree=null;
        CommonTree LOCAL73_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:138:5: ( IRI | LITERAL | NUMBER | LOCAL )
            int alt24=4;
            switch ( input.LA(1) ) {
            case IRI:
                {
                alt24=1;
                }
                break;
            case LITERAL:
                {
                alt24=2;
                }
                break;
            case NUMBER:
                {
                alt24=3;
                }
                break;
            case LOCAL:
                {
                alt24=4;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 24, 0, input);

                throw nvae;

            }

            switch (alt24) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:138:9: IRI
                    {
                    _last = (CommonTree)input.LT(1);
                    IRI70=(CommonTree)match(input,IRI,FOLLOW_IRI_in_constshort944); 
                     
                    if ( _first_0==null ) _first_0 = IRI70;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:139:9: LITERAL
                    {
                    _last = (CommonTree)input.LT(1);
                    LITERAL71=(CommonTree)match(input,LITERAL,FOLLOW_LITERAL_in_constshort954); 
                     
                    if ( _first_0==null ) _first_0 = LITERAL71;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 3 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:140:9: NUMBER
                    {
                    _last = (CommonTree)input.LT(1);
                    NUMBER72=(CommonTree)match(input,NUMBER,FOLLOW_NUMBER_in_constshort964); 
                     
                    if ( _first_0==null ) _first_0 = NUMBER72;


                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;
                case 4 :
                    // org/ruleml/api/presentation_syntax_parser/PSOAObjectifier.g:141:9: LOCAL
                    {
                    _last = (CommonTree)input.LT(1);
                    LOCAL73=(CommonTree)match(input,LOCAL,FOLLOW_LOCAL_in_constshort974); 
                     
                    if ( _first_0==null ) _first_0 = LOCAL73;



                                String lcName = (LOCAL73!=null?LOCAL73.getText():null);
                                boolean hasNonDigitChar = false;
                                for (int i = lcName.length() - 1; i >= 0; i--)
                                { 
                                    if (!Character.isDigit(lcName.charAt(i)))
                                    {
                                        hasNonDigitChar = true;
                                        break;
                                    }
                                }
                                if (!hasNonDigitChar)
                                {
                                    throw new RuntimeException("'_" + lcName + "' is disallowed: the name of local constants cannot have only digits.");
                                }
                            

                    retval.tree = (CommonTree)_first_0;
                    if ( adaptor.getParent(retval.tree)!=null && adaptor.isNil( adaptor.getParent(retval.tree) ) )
                        retval.tree = (CommonTree)adaptor.getParent(retval.tree);

                    }
                    break;

            }
        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "constshort"

    // Delegated rules


 

    public static final BitSet FOLLOW_DOCUMENT_in_document80 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_base_in_document82 = new BitSet(new long[]{0x0000001000420008L});
    public static final BitSet FOLLOW_prefix_in_document85 = new BitSet(new long[]{0x0000001000420008L});
    public static final BitSet FOLLOW_importDecl_in_document88 = new BitSet(new long[]{0x0000000000420008L});
    public static final BitSet FOLLOW_group_in_document91 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_BASE_in_base113 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_IRI_REF_in_base115 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_PREFIX_in_prefix136 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_ID_in_prefix138 = new BitSet(new long[]{0x0000000004000000L});
    public static final BitSet FOLLOW_IRI_REF_in_prefix140 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_IMPORT_in_importDecl161 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_IRI_REF_in_importDecl163 = new BitSet(new long[]{0x0000000004000008L});
    public static final BitSet FOLLOW_IRI_REF_in_importDecl165 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_GROUP_in_group187 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_group_element_in_group189 = new BitSet(new long[]{0x0000102000229008L});
    public static final BitSet FOLLOW_rule_in_group_element210 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_group_in_group_element220 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_formula_in_query241 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_FORALL_in_rule267 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_VAR_ID_in_rule269 = new BitSet(new long[]{0x0001102000201000L});
    public static final BitSet FOLLOW_clause_in_rule272 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_clause_in_rule280 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_IMPLICATION_in_clause310 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_head_in_clause312 = new BitSet(new long[]{0x0000102800007020L});
    public static final BitSet FOLLOW_formula_in_clause314 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_atomic_in_clause335 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_atomic_in_head358 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_EXISTS_in_head369 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_VAR_ID_in_head371 = new BitSet(new long[]{0x0001102000001000L});
    public static final BitSet FOLLOW_atomic_in_head374 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_AND_in_formula395 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_formula_in_formula397 = new BitSet(new long[]{0x0000102800007028L});
    public static final BitSet FOLLOW_OR_in_formula410 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_formula_in_formula412 = new BitSet(new long[]{0x0000102800007028L});
    public static final BitSet FOLLOW_EXISTS_in_formula425 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_VAR_ID_in_formula427 = new BitSet(new long[]{0x0001102800007020L});
    public static final BitSet FOLLOW_formula_in_formula430 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_atomic_in_formula441 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_external_in_formula451 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_atom_in_atomic470 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_equal_in_atomic480 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_subclass_in_atomic490 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_psoa_in_atom509 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_EQUAL_in_equal530 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_equal532 = new BitSet(new long[]{0x0001412020004000L});
    public static final BitSet FOLLOW_term_in_equal534 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_SUBCLASS_in_subclass555 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_subclass557 = new BitSet(new long[]{0x0001412020004000L});
    public static final BitSet FOLLOW_term_in_subclass559 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_constant_in_term583 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_VAR_ID_in_term593 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_psoa_in_term614 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_external_in_term625 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_EXTERNAL_in_external645 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_psoa_in_external647 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_PSOA_in_psoa679 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_psoa683 = new BitSet(new long[]{0x0000000000800000L});
    public static final BitSet FOLLOW_INSTANCE_in_psoa687 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_psoa691 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_tuple_in_psoa694 = new BitSet(new long[]{0x0000820000000008L});
    public static final BitSet FOLLOW_slot_in_psoa697 = new BitSet(new long[]{0x0000020000000008L});
    public static final BitSet FOLLOW_TUPLE_in_tuple841 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_tuple843 = new BitSet(new long[]{0x0001412020004008L});
    public static final BitSet FOLLOW_SLOT_in_slot869 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_slot871 = new BitSet(new long[]{0x0001412020004000L});
    public static final BitSet FOLLOW_term_in_slot873 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_LITERAL_in_constant894 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_IRI_in_constant896 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_SHORTCONST_in_constant908 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_constshort_in_constant910 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_TOP_in_constant921 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_IRI_in_constshort944 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_LITERAL_in_constshort954 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_NUMBER_in_constshort964 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_LOCAL_in_constshort974 = new BitSet(new long[]{0x0000000000000002L});

}