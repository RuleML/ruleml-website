// $ANTLR 3.4 org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g 2012-09-05 10:53:35

    package org.ruleml.psoa2tptp.translator;

	import logic.is.power.tptp_parser.TptpParserOutput.*;
	import java.io.*;
	import java.util.Set;
	import java.util.HashSet;
    import org.ruleml.psoa2tptp.translator.ANTLRBasedTranslator.TranslatorWalker;
    import static org.ruleml.psoa2tptp.translator.TPTPASOGenerator.*;


import org.antlr.runtime.*;
import org.antlr.runtime.tree.*;
import java.util.Stack;
import java.util.List;
import java.util.ArrayList;

@SuppressWarnings({"all", "warnings", "unchecked"})
public class TPTPASOTranslatorWalker extends TranslatorWalker {
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
    public TranslatorWalker[] getDelegates() {
        return new TranslatorWalker[] {};
    }

    // delegators


    public TPTPASOTranslatorWalker(TreeNodeStream input) {
        this(input, new RecognizerSharedState());
    }
    public TPTPASOTranslatorWalker(TreeNodeStream input, RecognizerSharedState state) {
        super(input, state);
    }

    public String[] getTokenNames() { return TPTPASOTranslatorWalker.tokenNames; }
    public String getGrammarFileName() { return "org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g"; }


        private TPTPASOGenerator m_generator = new TPTPASOGenerator();

        public void parseDocument() throws RecognitionException {
            document();
        }
        
        public void parseQuery() throws RecognitionException {
            query();
        }



    // $ANTLR start "document"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:36:1: document : ^( DOCUMENT ( base )? ( prefix )* ( importDecl )* ( group )? ) ;
    public final void document() throws RecognitionException {
        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:37:5: ( ^( DOCUMENT ( base )? ( prefix )* ( importDecl )* ( group )? ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:37:9: ^( DOCUMENT ( base )? ( prefix )* ( importDecl )* ( group )? )
            {
            match(input,DOCUMENT,FOLLOW_DOCUMENT_in_document72); 

            if ( input.LA(1)==Token.DOWN ) {
                match(input, Token.DOWN, null); 
                // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:37:20: ( base )?
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
                        // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:37:20: base
                        {
                        pushFollow(FOLLOW_base_in_document74);
                        base();

                        state._fsp--;


                        }
                        break;

                }


                // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:37:26: ( prefix )*
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
                	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:37:26: prefix
                	    {
                	    pushFollow(FOLLOW_prefix_in_document77);
                	    prefix();

                	    state._fsp--;


                	    }
                	    break;

                	default :
                	    break loop2;
                    }
                } while (true);


                // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:37:34: ( importDecl )*
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
                	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:37:34: importDecl
                	    {
                	    pushFollow(FOLLOW_importDecl_in_document80);
                	    importDecl();

                	    state._fsp--;


                	    }
                	    break;

                	default :
                	    break loop3;
                    }
                } while (true);


                // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:37:46: ( group )?
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
                        // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:37:46: group
                        {
                        pushFollow(FOLLOW_group_in_document83);
                        group();

                        state._fsp--;


                        }
                        break;

                }


                match(input, Token.UP, null); 
            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return ;
    }
    // $ANTLR end "document"



    // $ANTLR start "base"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:40:1: base : ^( BASE IRI_REF ) ;
    public final void base() throws RecognitionException {
        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:41:5: ( ^( BASE IRI_REF ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:41:9: ^( BASE IRI_REF )
            {
            match(input,BASE,FOLLOW_BASE_in_base105); 

            match(input, Token.DOWN, null); 
            match(input,IRI_REF,FOLLOW_IRI_REF_in_base107); 

            match(input, Token.UP, null); 


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return ;
    }
    // $ANTLR end "base"



    // $ANTLR start "prefix"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:44:1: prefix : ^( PREFIX ID IRI_REF ) ;
    public final void prefix() throws RecognitionException {
        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:45:5: ( ^( PREFIX ID IRI_REF ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:45:9: ^( PREFIX ID IRI_REF )
            {
            match(input,PREFIX,FOLLOW_PREFIX_in_prefix128); 

            match(input, Token.DOWN, null); 
            match(input,ID,FOLLOW_ID_in_prefix130); 

            match(input,IRI_REF,FOLLOW_IRI_REF_in_prefix132); 

            match(input, Token.UP, null); 


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return ;
    }
    // $ANTLR end "prefix"



    // $ANTLR start "importDecl"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:48:1: importDecl : ^( IMPORT IRI_REF ( IRI_REF )? ) ;
    public final void importDecl() throws RecognitionException {
        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:49:5: ( ^( IMPORT IRI_REF ( IRI_REF )? ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:49:9: ^( IMPORT IRI_REF ( IRI_REF )? )
            {
            match(input,IMPORT,FOLLOW_IMPORT_in_importDecl153); 

            match(input, Token.DOWN, null); 
            match(input,IRI_REF,FOLLOW_IRI_REF_in_importDecl155); 

            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:49:26: ( IRI_REF )?
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:49:26: IRI_REF
                    {
                    match(input,IRI_REF,FOLLOW_IRI_REF_in_importDecl157); 

                    }
                    break;

            }


            match(input, Token.UP, null); 


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return ;
    }
    // $ANTLR end "importDecl"



    // $ANTLR start "group"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:52:1: group : ^( GROUP ( group_element )* ) ;
    public final void group() throws RecognitionException {
        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:53:5: ( ^( GROUP ( group_element )* ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:53:9: ^( GROUP ( group_element )* )
            {
            match(input,GROUP,FOLLOW_GROUP_in_group179); 

            if ( input.LA(1)==Token.DOWN ) {
                match(input, Token.DOWN, null); 
                // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:53:17: ( group_element )*
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
                	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:53:17: group_element
                	    {
                	    pushFollow(FOLLOW_group_element_in_group181);
                	    group_element();

                	    state._fsp--;


                	    }
                	    break;

                	default :
                	    break loop6;
                    }
                } while (true);


                match(input, Token.UP, null); 
            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return ;
    }
    // $ANTLR end "group"



    // $ANTLR start "group_element"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:56:1: group_element : (r= rule | group );
    public final void group_element() throws RecognitionException {
        FofFormula r =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:57:5: (r= rule | group )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:57:9: r= rule
                    {
                    pushFollow(FOLLOW_rule_in_group_element204);
                    r=rule();

                    state._fsp--;


                     m_outStream.print(m_generator.getAnnotatedAxiom(r)); 

                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:58:9: group
                    {
                    pushFollow(FOLLOW_group_in_group_element216);
                    group();

                    state._fsp--;


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
        return ;
    }
    // $ANTLR end "group_element"



    // $ANTLR start "query"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:61:1: query : f= formula ;
    public final void query() throws RecognitionException {
        FofFormula f =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:62:5: (f= formula )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:62:9: f= formula
            {
            pushFollow(FOLLOW_formula_in_query237);
            f=formula();

            state._fsp--;


             m_outStream.print(m_generator.getAnnotatedQuery(f)); 

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return ;
    }
    // $ANTLR end "query"



    // $ANTLR start "rule"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:65:1: rule returns [FofFormula formula] : ( ^( FORALL ( VAR_ID )+ f= clause ) |f= clause );
    public final FofFormula rule() throws RecognitionException {
        FofFormula formula = null;


        CommonTree VAR_ID1=null;
        FofFormula f =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:66:5: ( ^( FORALL ( VAR_ID )+ f= clause ) |f= clause )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:66:9: ^( FORALL ( VAR_ID )+ f= clause )
                    {
                     List<String> vars = new ArrayList<String>(4); 

                    match(input,FORALL,FOLLOW_FORALL_in_rule273); 

                    match(input, Token.DOWN, null); 
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:67:18: ( VAR_ID )+
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
                    	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:67:19: VAR_ID
                    	    {
                    	    VAR_ID1=(CommonTree)match(input,VAR_ID,FOLLOW_VAR_ID_in_rule276); 

                    	     vars.add((VAR_ID1!=null?VAR_ID1.getText():null)); 

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


                    pushFollow(FOLLOW_clause_in_rule284);
                    f=clause();

                    state._fsp--;


                    match(input, Token.UP, null); 


                     formula = m_generator.getForAll(vars, f); 

                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:69:6: f= clause
                    {
                    pushFollow(FOLLOW_clause_in_rule304);
                    f=clause();

                    state._fsp--;


                     formula = f; 

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
        return formula;
    }
    // $ANTLR end "rule"



    // $ANTLR start "clause"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:72:1: clause returns [FofFormula formula] : ( ^( IMPLICATION h= head f= formula ) |atomicFormula= atomic );
    public final FofFormula clause() throws RecognitionException {
        FofFormula formula = null;


        FofFormula h =null;

        FofFormula f =null;

        FofFormula atomicFormula =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:73:5: ( ^( IMPLICATION h= head f= formula ) |atomicFormula= atomic )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:74:9: ^( IMPLICATION h= head f= formula )
                    {
                    match(input,IMPLICATION,FOLLOW_IMPLICATION_in_clause336); 

                    match(input, Token.DOWN, null); 
                    pushFollow(FOLLOW_head_in_clause340);
                    h=head();

                    state._fsp--;


                    pushFollow(FOLLOW_formula_in_clause344);
                    f=formula();

                    state._fsp--;


                    match(input, Token.UP, null); 


                     formula = m_generator.getImplies(h, f); 

                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:76:9: atomicFormula= atomic
                    {
                    pushFollow(FOLLOW_atomic_in_clause367);
                    atomicFormula=atomic();

                    state._fsp--;


                     formula = atomicFormula; 

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
        return formula;
    }
    // $ANTLR end "clause"



    // $ANTLR start "head"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:79:1: head returns [FofFormula formula] : (f= atomic | ^( EXISTS ( VAR_ID )+ f= atomic ) );
    public final FofFormula head() throws RecognitionException {
        FofFormula formula = null;


        CommonTree VAR_ID2=null;
        FofFormula f =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:80:5: (f= atomic | ^( EXISTS ( VAR_ID )+ f= atomic ) )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:80:9: f= atomic
                    {
                    pushFollow(FOLLOW_atomic_in_head398);
                    f=atomic();

                    state._fsp--;


                     formula = f; 

                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:81:9: ^( EXISTS ( VAR_ID )+ f= atomic )
                    {
                     List<String> vars = new ArrayList<String>(4); 

                    match(input,EXISTS,FOLLOW_EXISTS_in_head421); 

                    match(input, Token.DOWN, null); 
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:82:18: ( VAR_ID )+
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
                    	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:82:19: VAR_ID
                    	    {
                    	    VAR_ID2=(CommonTree)match(input,VAR_ID,FOLLOW_VAR_ID_in_head424); 

                    	     vars.add((VAR_ID2!=null?VAR_ID2.getText():null)); 

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


                    pushFollow(FOLLOW_atomic_in_head432);
                    f=atomic();

                    state._fsp--;


                    match(input, Token.UP, null); 


                     formula = m_generator.getExist(vars, f); 

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
        return formula;
    }
    // $ANTLR end "head"



    // $ANTLR start "formula"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:86:1: formula returns [FofFormula formula] : ( ^( AND (f= formula )+ ) | ^( OR ( formula )+ ) | ^( EXISTS ( VAR_ID )+ f= formula ) |f= atomic | external );
    public final FofFormula formula() throws RecognitionException {
        FofFormula formula = null;


        CommonTree VAR_ID3=null;
        FofFormula f =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:87:5: ( ^( AND (f= formula )+ ) | ^( OR ( formula )+ ) | ^( EXISTS ( VAR_ID )+ f= formula ) |f= atomic | external )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:87:9: ^( AND (f= formula )+ )
                    {
                    match(input,AND,FOLLOW_AND_in_formula467); 

                    match(input, Token.DOWN, null); 
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:87:15: (f= formula )+
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
                    	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:87:16: f= formula
                    	    {
                    	    pushFollow(FOLLOW_formula_in_formula472);
                    	    f=formula();

                    	    state._fsp--;


                    	     formula = m_generator.getAndFormula(formula, f); 

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


                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:88:9: ^( OR ( formula )+ )
                    {
                    match(input,OR,FOLLOW_OR_in_formula488); 

                    match(input, Token.DOWN, null); 
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:88:14: ( formula )+
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
                    	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:88:14: formula
                    	    {
                    	    pushFollow(FOLLOW_formula_in_formula490);
                    	    formula();

                    	    state._fsp--;


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


                    }
                    break;
                case 3 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:89:9: ^( EXISTS ( VAR_ID )+ f= formula )
                    {
                     List<String> vars = new ArrayList<String>(4); 

                    match(input,EXISTS,FOLLOW_EXISTS_in_formula513); 

                    match(input, Token.DOWN, null); 
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:90:18: ( VAR_ID )+
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
                    	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:90:19: VAR_ID
                    	    {
                    	    VAR_ID3=(CommonTree)match(input,VAR_ID,FOLLOW_VAR_ID_in_formula516); 

                    	     vars.add((VAR_ID3!=null?VAR_ID3.getText():null)); 

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


                    pushFollow(FOLLOW_formula_in_formula524);
                    f=formula();

                    state._fsp--;


                    match(input, Token.UP, null); 


                     formula = m_generator.getExist(vars, f); 

                    }
                    break;
                case 4 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:92:9: f= atomic
                    {
                    pushFollow(FOLLOW_atomic_in_formula547);
                    f=atomic();

                    state._fsp--;


                     formula = f; 

                    }
                    break;
                case 5 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:93:9: external
                    {
                    pushFollow(FOLLOW_external_in_formula559);
                    external();

                    state._fsp--;


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
        return formula;
    }
    // $ANTLR end "formula"



    // $ANTLR start "atomic"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:96:1: atomic returns [FofFormula formula] : (f= atom | equal | subclass );
    public final FofFormula atomic() throws RecognitionException {
        FofFormula formula = null;


        FofFormula f =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:97:5: (f= atom | equal | subclass )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:97:9: f= atom
                    {
                    pushFollow(FOLLOW_atom_in_atomic584);
                    f=atom();

                    state._fsp--;


                     formula = f; 

                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:98:9: equal
                    {
                    pushFollow(FOLLOW_equal_in_atomic596);
                    equal();

                    state._fsp--;


                    }
                    break;
                case 3 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:99:9: subclass
                    {
                    pushFollow(FOLLOW_subclass_in_atomic606);
                    subclass();

                    state._fsp--;


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
        return formula;
    }
    // $ANTLR end "atomic"



    // $ANTLR start "atom"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:102:1: atom returns [FofFormula formula] : f= psoa ;
    public final FofFormula atom() throws RecognitionException {
        FofFormula formula = null;


        FofFormula f =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:103:5: (f= psoa )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:103:9: f= psoa
            {
            pushFollow(FOLLOW_psoa_in_atom631);
            f=psoa();

            state._fsp--;


             formula = f; 

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return formula;
    }
    // $ANTLR end "atom"



    // $ANTLR start "equal"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:106:1: equal : ^( EQUAL term term ) ;
    public final void equal() throws RecognitionException {
        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:107:5: ( ^( EQUAL term term ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:107:9: ^( EQUAL term term )
            {
            match(input,EQUAL,FOLLOW_EQUAL_in_equal653); 

            match(input, Token.DOWN, null); 
            pushFollow(FOLLOW_term_in_equal655);
            term();

            state._fsp--;


            pushFollow(FOLLOW_term_in_equal657);
            term();

            state._fsp--;


            match(input, Token.UP, null); 


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return ;
    }
    // $ANTLR end "equal"



    // $ANTLR start "subclass"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:110:1: subclass : ^( SUBCLASS term term ) ;
    public final void subclass() throws RecognitionException {
        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:111:5: ( ^( SUBCLASS term term ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:111:9: ^( SUBCLASS term term )
            {
            match(input,SUBCLASS,FOLLOW_SUBCLASS_in_subclass678); 

            match(input, Token.DOWN, null); 
            pushFollow(FOLLOW_term_in_subclass680);
            term();

            state._fsp--;


            pushFollow(FOLLOW_term_in_subclass682);
            term();

            state._fsp--;


            match(input, Token.UP, null); 


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return ;
    }
    // $ANTLR end "subclass"



    // $ANTLR start "term"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:114:1: term returns [Term t] : (c= constant | VAR_ID |p= psoa | external );
    public final Term term() throws RecognitionException {
        Term t = null;


        CommonTree VAR_ID4=null;
        Term c =null;

        FofFormula p =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:115:5: (c= constant | VAR_ID |p= psoa | external )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:115:9: c= constant
                    {
                    pushFollow(FOLLOW_constant_in_term712);
                    c=constant();

                    state._fsp--;


                     t = c; 

                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:116:9: VAR_ID
                    {
                    VAR_ID4=(CommonTree)match(input,VAR_ID,FOLLOW_VAR_ID_in_term724); 

                     t = m_generator.getVariable((VAR_ID4!=null?VAR_ID4.getText():null)); 

                    }
                    break;
                case 3 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:117:9: p= psoa
                    {
                    pushFollow(FOLLOW_psoa_in_term738);
                    p=psoa();

                    state._fsp--;


                    }
                    break;
                case 4 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:118:9: external
                    {
                    pushFollow(FOLLOW_external_in_term748);
                    external();

                    state._fsp--;


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
        return t;
    }
    // $ANTLR end "term"



    // $ANTLR start "external"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:121:1: external : ^( EXTERNAL psoa ) ;
    public final void external() throws RecognitionException {
        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:122:5: ( ^( EXTERNAL psoa ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:122:9: ^( EXTERNAL psoa )
            {
            match(input,EXTERNAL,FOLLOW_EXTERNAL_in_external768); 

            match(input, Token.DOWN, null); 
            pushFollow(FOLLOW_psoa_in_external770);
            psoa();

            state._fsp--;


            match(input, Token.UP, null); 


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return ;
    }
    // $ANTLR end "external"



    // $ANTLR start "psoa"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:125:1: psoa returns [FofFormula formula] : ^( PSOA (oid= term )? ^( INSTANCE type= term ) (t= tuple )* (s= slot )* ) ;
    public final FofFormula psoa() throws RecognitionException {
        FofFormula formula = null;


        Term oid =null;

        Term type =null;

        List<Term> t =null;

        List<Term> s =null;



        	Set<List<Term>> tuples = new HashSet<List<Term>>(4);
        	Set<List<Term>> slots = new HashSet<List<Term>>(4);

        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:130:5: ( ^( PSOA (oid= term )? ^( INSTANCE type= term ) (t= tuple )* (s= slot )* ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:130:9: ^( PSOA (oid= term )? ^( INSTANCE type= term ) (t= tuple )* (s= slot )* )
            {
            match(input,PSOA,FOLLOW_PSOA_in_psoa800); 

            match(input, Token.DOWN, null); 
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:130:19: (oid= term )?
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:130:19: oid= term
                    {
                    pushFollow(FOLLOW_term_in_psoa804);
                    oid=term();

                    state._fsp--;


                    }
                    break;

            }


            match(input,INSTANCE,FOLLOW_INSTANCE_in_psoa808); 

            match(input, Token.DOWN, null); 
            pushFollow(FOLLOW_term_in_psoa812);
            type=term();

            state._fsp--;


            match(input, Token.UP, null); 


            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:130:48: (t= tuple )*
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
            	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:130:49: t= tuple
            	    {
            	    pushFollow(FOLLOW_tuple_in_psoa818);
            	    t=tuple();

            	    state._fsp--;


            	    tuples.add(t); 

            	    }
            	    break;

            	default :
            	    break loop20;
                }
            } while (true);


            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:130:77: (s= slot )*
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
            	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:130:78: s= slot
            	    {
            	    pushFollow(FOLLOW_slot_in_psoa827);
            	    s=slot();

            	    state._fsp--;


            	    slots.add(s); 

            	    }
            	    break;

            	default :
            	    break loop21;
                }
            } while (true);


            match(input, Token.UP, null); 



                    formula = m_generator.getPSOAFormula(oid, type, tuples, slots);
                

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return formula;
    }
    // $ANTLR end "psoa"



    // $ANTLR start "tuple"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:136:1: tuple returns [List<Term> terms] : ^( TUPLE (t= term )+ ) ;
    public final List<Term> tuple() throws RecognitionException {
        List<Term> terms = null;


        Term t =null;



            terms = new ArrayList<Term>(4);

        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:140:5: ( ^( TUPLE (t= term )+ ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:140:9: ^( TUPLE (t= term )+ )
            {
            match(input,TUPLE,FOLLOW_TUPLE_in_tuple867); 

            match(input, Token.DOWN, null); 
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:140:17: (t= term )+
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
            	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:140:18: t= term
            	    {
            	    pushFollow(FOLLOW_term_in_tuple872);
            	    t=term();

            	    state._fsp--;


            	     terms.add(t); 

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


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return terms;
    }
    // $ANTLR end "tuple"



    // $ANTLR start "slot"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:143:1: slot returns [List<Term> terms] : ^( SLOT p= term v= term ) ;
    public final List<Term> slot() throws RecognitionException {
        List<Term> terms = null;


        Term p =null;

        Term v =null;



            terms = new ArrayList<Term>(2);

        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:147:5: ( ^( SLOT p= term v= term ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:147:9: ^( SLOT p= term v= term )
            {
            match(input,SLOT,FOLLOW_SLOT_in_slot910); 

            match(input, Token.DOWN, null); 
            pushFollow(FOLLOW_term_in_slot914);
            p=term();

            state._fsp--;


            pushFollow(FOLLOW_term_in_slot918);
            v=term();

            state._fsp--;


            match(input, Token.UP, null); 



            	        terms.add(p);
            	        terms.add(v);
            	    

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }

        finally {
        	// do for sure before leaving
        }
        return terms;
    }
    // $ANTLR end "slot"



    // $ANTLR start "constant"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:154:1: constant returns [Term t] : ( ^( LITERAL IRI ) | ^( SHORTCONST ct= constshort ) | TOP );
    public final Term constant() throws RecognitionException {
        Term t = null;


        Term ct =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:155:5: ( ^( LITERAL IRI ) | ^( SHORTCONST ct= constshort ) | TOP )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:155:9: ^( LITERAL IRI )
                    {
                    match(input,LITERAL,FOLLOW_LITERAL_in_constant950); 

                    match(input, Token.DOWN, null); 
                    match(input,IRI,FOLLOW_IRI_in_constant952); 

                    match(input, Token.UP, null); 


                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:156:9: ^( SHORTCONST ct= constshort )
                    {
                    match(input,SHORTCONST,FOLLOW_SHORTCONST_in_constant964); 

                    match(input, Token.DOWN, null); 
                    pushFollow(FOLLOW_constshort_in_constant968);
                    ct=constshort();

                    state._fsp--;


                    match(input, Token.UP, null); 


                     t = ct; 

                    }
                    break;
                case 3 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:157:9: TOP
                    {
                    match(input,TOP,FOLLOW_TOP_in_constant981); 

                     t = null; 

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
        return t;
    }
    // $ANTLR end "constant"



    // $ANTLR start "constshort"
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:160:1: constshort returns [Term t] : ( IRI | LITERAL | NUMBER | LOCAL );
    public final Term constshort() throws RecognitionException {
        Term t = null;


        CommonTree LITERAL5=null;
        CommonTree NUMBER6=null;
        CommonTree LOCAL7=null;

        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:161:5: ( IRI | LITERAL | NUMBER | LOCAL )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:161:9: IRI
                    {
                    match(input,IRI,FOLLOW_IRI_in_constshort1010); 

                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:162:9: LITERAL
                    {
                    LITERAL5=(CommonTree)match(input,LITERAL,FOLLOW_LITERAL_in_constshort1020); 

                     t = m_generator.getConst('\"' + (LITERAL5!=null?LITERAL5.getText():null) + '\"'); 

                    }
                    break;
                case 3 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:163:9: NUMBER
                    {
                    NUMBER6=(CommonTree)match(input,NUMBER,FOLLOW_NUMBER_in_constshort1032); 

                     t = m_generator.getConst((NUMBER6!=null?NUMBER6.getText():null)); 

                    }
                    break;
                case 4 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:164:9: LOCAL
                    {
                    LOCAL7=(CommonTree)match(input,LOCAL,FOLLOW_LOCAL_in_constshort1044); 

                     t = m_generator.getLocalConst((LOCAL7!=null?LOCAL7.getText():null)); 

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
        return t;
    }
    // $ANTLR end "constshort"

    // Delegated rules


 

    public static final BitSet FOLLOW_DOCUMENT_in_document72 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_base_in_document74 = new BitSet(new long[]{0x0000001000420008L});
    public static final BitSet FOLLOW_prefix_in_document77 = new BitSet(new long[]{0x0000001000420008L});
    public static final BitSet FOLLOW_importDecl_in_document80 = new BitSet(new long[]{0x0000000000420008L});
    public static final BitSet FOLLOW_group_in_document83 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_BASE_in_base105 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_IRI_REF_in_base107 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_PREFIX_in_prefix128 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_ID_in_prefix130 = new BitSet(new long[]{0x0000000004000000L});
    public static final BitSet FOLLOW_IRI_REF_in_prefix132 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_IMPORT_in_importDecl153 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_IRI_REF_in_importDecl155 = new BitSet(new long[]{0x0000000004000008L});
    public static final BitSet FOLLOW_IRI_REF_in_importDecl157 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_GROUP_in_group179 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_group_element_in_group181 = new BitSet(new long[]{0x0000102000229008L});
    public static final BitSet FOLLOW_rule_in_group_element204 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_group_in_group_element216 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_formula_in_query237 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_FORALL_in_rule273 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_VAR_ID_in_rule276 = new BitSet(new long[]{0x0001102000201000L});
    public static final BitSet FOLLOW_clause_in_rule284 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_clause_in_rule304 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_IMPLICATION_in_clause336 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_head_in_clause340 = new BitSet(new long[]{0x0000102800007020L});
    public static final BitSet FOLLOW_formula_in_clause344 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_atomic_in_clause367 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_atomic_in_head398 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_EXISTS_in_head421 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_VAR_ID_in_head424 = new BitSet(new long[]{0x0001102000001000L});
    public static final BitSet FOLLOW_atomic_in_head432 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_AND_in_formula467 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_formula_in_formula472 = new BitSet(new long[]{0x0000102800007028L});
    public static final BitSet FOLLOW_OR_in_formula488 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_formula_in_formula490 = new BitSet(new long[]{0x0000102800007028L});
    public static final BitSet FOLLOW_EXISTS_in_formula513 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_VAR_ID_in_formula516 = new BitSet(new long[]{0x0001102800007020L});
    public static final BitSet FOLLOW_formula_in_formula524 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_atomic_in_formula547 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_external_in_formula559 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_atom_in_atomic584 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_equal_in_atomic596 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_subclass_in_atomic606 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_psoa_in_atom631 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_EQUAL_in_equal653 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_equal655 = new BitSet(new long[]{0x0001412020004000L});
    public static final BitSet FOLLOW_term_in_equal657 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_SUBCLASS_in_subclass678 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_subclass680 = new BitSet(new long[]{0x0001412020004000L});
    public static final BitSet FOLLOW_term_in_subclass682 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_constant_in_term712 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_VAR_ID_in_term724 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_psoa_in_term738 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_external_in_term748 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_EXTERNAL_in_external768 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_psoa_in_external770 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_PSOA_in_psoa800 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_psoa804 = new BitSet(new long[]{0x0000000000800000L});
    public static final BitSet FOLLOW_INSTANCE_in_psoa808 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_psoa812 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_tuple_in_psoa818 = new BitSet(new long[]{0x0000820000000008L});
    public static final BitSet FOLLOW_slot_in_psoa827 = new BitSet(new long[]{0x0000020000000008L});
    public static final BitSet FOLLOW_TUPLE_in_tuple867 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_tuple872 = new BitSet(new long[]{0x0001412020004008L});
    public static final BitSet FOLLOW_SLOT_in_slot910 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_slot914 = new BitSet(new long[]{0x0001412020004000L});
    public static final BitSet FOLLOW_term_in_slot918 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_LITERAL_in_constant950 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_IRI_in_constant952 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_SHORTCONST_in_constant964 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_constshort_in_constant968 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_TOP_in_constant981 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_IRI_in_constshort1010 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_LITERAL_in_constshort1020 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_NUMBER_in_constshort1032 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_LOCAL_in_constshort1044 = new BitSet(new long[]{0x0000000000000002L});

}