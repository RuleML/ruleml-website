// $ANTLR 3.4 org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g 2012-07-09 15:59:05

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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:61:1: query : r= rule ;
    public final void query() throws RecognitionException {
        FofFormula r =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:62:5: (r= rule )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:62:9: r= rule
            {
            pushFollow(FOLLOW_rule_in_query237);
            r=rule();

            state._fsp--;


             m_outStream.print(m_generator.getAnnotatedQuery(r)); 

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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:65:1: rule returns [FofFormula formula] : ( ^( FORALL ^( VAR_LIST ( VAR_ID )+ ) clause ) |f= clause );
    public final FofFormula rule() throws RecognitionException {
        FofFormula formula = null;


        FofFormula f =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:66:5: ( ^( FORALL ^( VAR_LIST ( VAR_ID )+ ) clause ) |f= clause )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:66:9: ^( FORALL ^( VAR_LIST ( VAR_ID )+ ) clause )
                    {
                    match(input,FORALL,FOLLOW_FORALL_in_rule263); 

                    match(input, Token.DOWN, null); 
                    match(input,VAR_LIST,FOLLOW_VAR_LIST_in_rule266); 

                    match(input, Token.DOWN, null); 
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:66:29: ( VAR_ID )+
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
                    	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:66:29: VAR_ID
                    	    {
                    	    match(input,VAR_ID,FOLLOW_VAR_ID_in_rule268); 

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


                    match(input, Token.UP, null); 


                    pushFollow(FOLLOW_clause_in_rule272);
                    clause();

                    state._fsp--;


                    match(input, Token.UP, null); 


                      

                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:67:6: f= clause
                    {
                    pushFollow(FOLLOW_clause_in_rule284);
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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:70:1: clause returns [FofFormula formula] : ( ^( IMPLICATION h= head f= formula ) |atomicFormula= atomic );
    public final FofFormula clause() throws RecognitionException {
        FofFormula formula = null;


        FofFormula h =null;

        FofFormula f =null;

        FofFormula atomicFormula =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:71:5: ( ^( IMPLICATION h= head f= formula ) |atomicFormula= atomic )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:71:9: ^( IMPLICATION h= head f= formula )
                    {
                    match(input,IMPLICATION,FOLLOW_IMPLICATION_in_clause310); 

                    match(input, Token.DOWN, null); 
                    pushFollow(FOLLOW_head_in_clause314);
                    h=head();

                    state._fsp--;


                    pushFollow(FOLLOW_formula_in_clause318);
                    f=formula();

                    state._fsp--;


                    match(input, Token.UP, null); 


                     m_generator.getImplies(h, f); 

                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:72:9: atomicFormula= atomic
                    {
                    pushFollow(FOLLOW_atomic_in_clause333);
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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:75:1: head returns [FofFormula formula] : (f= atomic | ^( EXISTS ^( VAR_LIST ( VAR_ID )+ ) f= atomic ) );
    public final FofFormula head() throws RecognitionException {
        FofFormula formula = null;


        FofFormula f =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:76:5: (f= atomic | ^( EXISTS ^( VAR_LIST ( VAR_ID )+ ) f= atomic ) )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:76:9: f= atomic
                    {
                    pushFollow(FOLLOW_atomic_in_head364);
                    f=atomic();

                    state._fsp--;


                     formula = f; 

                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:77:9: ^( EXISTS ^( VAR_LIST ( VAR_ID )+ ) f= atomic )
                    {
                    match(input,EXISTS,FOLLOW_EXISTS_in_head377); 

                    match(input, Token.DOWN, null); 
                    match(input,VAR_LIST,FOLLOW_VAR_LIST_in_head380); 

                    match(input, Token.DOWN, null); 
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:77:29: ( VAR_ID )+
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
                    	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:77:30: VAR_ID
                    	    {
                    	    match(input,VAR_ID,FOLLOW_VAR_ID_in_head383); 

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


                    match(input, Token.UP, null); 


                    pushFollow(FOLLOW_atomic_in_head390);
                    f=atomic();

                    state._fsp--;


                    match(input, Token.UP, null); 


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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:80:1: formula returns [FofFormula formula] : ( ^( AND ( formula )+ ) | ^( OR ( formula )+ ) | ^( EXISTS ^( VAR_LIST ( VAR_ID )+ ) formula ) | atomic | external );
    public final FofFormula formula() throws RecognitionException {
        FofFormula formula = null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:81:5: ( ^( AND ( formula )+ ) | ^( OR ( formula )+ ) | ^( EXISTS ^( VAR_LIST ( VAR_ID )+ ) formula ) | atomic | external )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:81:9: ^( AND ( formula )+ )
                    {
                    match(input,AND,FOLLOW_AND_in_formula415); 

                    match(input, Token.DOWN, null); 
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:81:15: ( formula )+
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
                    	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:81:15: formula
                    	    {
                    	    pushFollow(FOLLOW_formula_in_formula417);
                    	    formula();

                    	    state._fsp--;


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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:82:9: ^( OR ( formula )+ )
                    {
                    match(input,OR,FOLLOW_OR_in_formula430); 

                    match(input, Token.DOWN, null); 
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:82:14: ( formula )+
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
                    	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:82:14: formula
                    	    {
                    	    pushFollow(FOLLOW_formula_in_formula432);
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:83:9: ^( EXISTS ^( VAR_LIST ( VAR_ID )+ ) formula )
                    {
                    match(input,EXISTS,FOLLOW_EXISTS_in_formula445); 

                    match(input, Token.DOWN, null); 
                    match(input,VAR_LIST,FOLLOW_VAR_LIST_in_formula448); 

                    match(input, Token.DOWN, null); 
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:83:29: ( VAR_ID )+
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
                    	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:83:29: VAR_ID
                    	    {
                    	    match(input,VAR_ID,FOLLOW_VAR_ID_in_formula450); 

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


                    match(input, Token.UP, null); 


                    pushFollow(FOLLOW_formula_in_formula454);
                    formula();

                    state._fsp--;


                    match(input, Token.UP, null); 


                    }
                    break;
                case 4 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:84:9: atomic
                    {
                    pushFollow(FOLLOW_atomic_in_formula465);
                    atomic();

                    state._fsp--;


                    }
                    break;
                case 5 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:85:9: external
                    {
                    pushFollow(FOLLOW_external_in_formula475);
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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:88:1: atomic returns [FofFormula formula] : (f= atom | equal | subclass );
    public final FofFormula atomic() throws RecognitionException {
        FofFormula formula = null;


        FofFormula f =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:89:5: (f= atom | equal | subclass )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:89:9: f= atom
                    {
                    pushFollow(FOLLOW_atom_in_atomic500);
                    f=atom();

                    state._fsp--;


                     formula = f; 

                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:90:9: equal
                    {
                    pushFollow(FOLLOW_equal_in_atomic512);
                    equal();

                    state._fsp--;


                    }
                    break;
                case 3 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:91:9: subclass
                    {
                    pushFollow(FOLLOW_subclass_in_atomic522);
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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:94:1: atom returns [FofFormula formula] : f= psoa ;
    public final FofFormula atom() throws RecognitionException {
        FofFormula formula = null;


        FofFormula f =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:95:5: (f= psoa )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:95:9: f= psoa
            {
            pushFollow(FOLLOW_psoa_in_atom547);
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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:98:1: equal : ^( EQUAL term term ) ;
    public final void equal() throws RecognitionException {
        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:99:5: ( ^( EQUAL term term ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:99:9: ^( EQUAL term term )
            {
            match(input,EQUAL,FOLLOW_EQUAL_in_equal569); 

            match(input, Token.DOWN, null); 
            pushFollow(FOLLOW_term_in_equal571);
            term();

            state._fsp--;


            pushFollow(FOLLOW_term_in_equal573);
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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:102:1: subclass : ^( SUBCLASS term term ) ;
    public final void subclass() throws RecognitionException {
        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:103:5: ( ^( SUBCLASS term term ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:103:9: ^( SUBCLASS term term )
            {
            match(input,SUBCLASS,FOLLOW_SUBCLASS_in_subclass594); 

            match(input, Token.DOWN, null); 
            pushFollow(FOLLOW_term_in_subclass596);
            term();

            state._fsp--;


            pushFollow(FOLLOW_term_in_subclass598);
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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:106:1: term returns [Term t] : (c= constant | VAR_ID |p= psoa | external );
    public final Term term() throws RecognitionException {
        Term t = null;


        CommonTree VAR_ID1=null;
        Term c =null;

        FofFormula p =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:107:5: (c= constant | VAR_ID |p= psoa | external )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:107:9: c= constant
                    {
                    pushFollow(FOLLOW_constant_in_term628);
                    c=constant();

                    state._fsp--;


                     t = c; 

                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:108:9: VAR_ID
                    {
                    VAR_ID1=(CommonTree)match(input,VAR_ID,FOLLOW_VAR_ID_in_term640); 

                     t = m_generator.getVariable((VAR_ID1!=null?VAR_ID1.getText():null)); 

                    }
                    break;
                case 3 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:109:9: p= psoa
                    {
                    pushFollow(FOLLOW_psoa_in_term654);
                    p=psoa();

                    state._fsp--;


                    }
                    break;
                case 4 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:110:9: external
                    {
                    pushFollow(FOLLOW_external_in_term664);
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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:113:1: external : ^( EXTERNAL psoa ) ;
    public final void external() throws RecognitionException {
        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:114:5: ( ^( EXTERNAL psoa ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:114:9: ^( EXTERNAL psoa )
            {
            match(input,EXTERNAL,FOLLOW_EXTERNAL_in_external684); 

            match(input, Token.DOWN, null); 
            pushFollow(FOLLOW_psoa_in_external686);
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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:117:1: psoa returns [FofFormula formula] : ^( PSOA (oid= term )? ^( INSTANCE type= term ) (t= tuple )* (s= slot )* ) ;
    public final FofFormula psoa() throws RecognitionException {
        FofFormula formula = null;


        Term oid =null;

        Term type =null;

        List<Term> t =null;

        List<Term> s =null;



        	Set<List<Term>> tuples = new HashSet<List<Term>>(4);
        	Set<List<Term>> slots = new HashSet<List<Term>>(4);

        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:122:5: ( ^( PSOA (oid= term )? ^( INSTANCE type= term ) (t= tuple )* (s= slot )* ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:122:9: ^( PSOA (oid= term )? ^( INSTANCE type= term ) (t= tuple )* (s= slot )* )
            {
            match(input,PSOA,FOLLOW_PSOA_in_psoa720); 

            match(input, Token.DOWN, null); 
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:122:19: (oid= term )?
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:122:19: oid= term
                    {
                    pushFollow(FOLLOW_term_in_psoa724);
                    oid=term();

                    state._fsp--;


                    }
                    break;

            }


            match(input,INSTANCE,FOLLOW_INSTANCE_in_psoa728); 

            match(input, Token.DOWN, null); 
            pushFollow(FOLLOW_term_in_psoa732);
            type=term();

            state._fsp--;


            match(input, Token.UP, null); 


            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:122:48: (t= tuple )*
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
            	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:122:49: t= tuple
            	    {
            	    pushFollow(FOLLOW_tuple_in_psoa738);
            	    t=tuple();

            	    state._fsp--;


            	    tuples.add(t); 

            	    }
            	    break;

            	default :
            	    break loop20;
                }
            } while (true);


            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:122:77: (s= slot )*
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
            	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:122:78: s= slot
            	    {
            	    pushFollow(FOLLOW_slot_in_psoa747);
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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:128:1: tuple returns [List<Term> terms] : ^( TUPLE (t= term )+ ) ;
    public final List<Term> tuple() throws RecognitionException {
        List<Term> terms = null;


        Term t =null;



            terms = new ArrayList<Term>(4);

        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:132:5: ( ^( TUPLE (t= term )+ ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:132:9: ^( TUPLE (t= term )+ )
            {
            match(input,TUPLE,FOLLOW_TUPLE_in_tuple787); 

            match(input, Token.DOWN, null); 
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:132:17: (t= term )+
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
            	    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:132:18: t= term
            	    {
            	    pushFollow(FOLLOW_term_in_tuple792);
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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:135:1: slot returns [List<Term> terms] : ^( SLOT p= term v= term ) ;
    public final List<Term> slot() throws RecognitionException {
        List<Term> terms = null;


        Term p =null;

        Term v =null;



            terms = new ArrayList<Term>(2);

        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:139:5: ( ^( SLOT p= term v= term ) )
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:139:9: ^( SLOT p= term v= term )
            {
            match(input,SLOT,FOLLOW_SLOT_in_slot830); 

            match(input, Token.DOWN, null); 
            pushFollow(FOLLOW_term_in_slot834);
            p=term();

            state._fsp--;


            pushFollow(FOLLOW_term_in_slot838);
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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:146:1: constant returns [Term t] : ( ^( LITERAL IRI ) | ^( SHORTCONST ct= constshort ) | TOP );
    public final Term constant() throws RecognitionException {
        Term t = null;


        Term ct =null;


        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:147:5: ( ^( LITERAL IRI ) | ^( SHORTCONST ct= constshort ) | TOP )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:147:9: ^( LITERAL IRI )
                    {
                    match(input,LITERAL,FOLLOW_LITERAL_in_constant870); 

                    match(input, Token.DOWN, null); 
                    match(input,IRI,FOLLOW_IRI_in_constant872); 

                    match(input, Token.UP, null); 


                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:148:9: ^( SHORTCONST ct= constshort )
                    {
                    match(input,SHORTCONST,FOLLOW_SHORTCONST_in_constant884); 

                    match(input, Token.DOWN, null); 
                    pushFollow(FOLLOW_constshort_in_constant888);
                    ct=constshort();

                    state._fsp--;


                    match(input, Token.UP, null); 


                     t = ct; 

                    }
                    break;
                case 3 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:149:9: TOP
                    {
                    match(input,TOP,FOLLOW_TOP_in_constant901); 

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
    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:152:1: constshort returns [Term t] : ( IRI | LITERAL | NUMBER | LOCAL );
    public final Term constshort() throws RecognitionException {
        Term t = null;


        CommonTree NUMBER2=null;
        CommonTree LOCAL3=null;

        try {
            // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:153:5: ( IRI | LITERAL | NUMBER | LOCAL )
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
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:153:9: IRI
                    {
                    match(input,IRI,FOLLOW_IRI_in_constshort930); 

                    }
                    break;
                case 2 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:154:9: LITERAL
                    {
                    match(input,LITERAL,FOLLOW_LITERAL_in_constshort940); 

                    }
                    break;
                case 3 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:155:9: NUMBER
                    {
                    NUMBER2=(CommonTree)match(input,NUMBER,FOLLOW_NUMBER_in_constshort950); 

                     t = m_generator.getConst((NUMBER2!=null?NUMBER2.getText():null)); 

                    }
                    break;
                case 4 :
                    // org/ruleml/psoa2tptp/translator/TPTPASOTranslatorWalker.g:156:9: LOCAL
                    {
                    LOCAL3=(CommonTree)match(input,LOCAL,FOLLOW_LOCAL_in_constshort962); 

                     t = m_generator.getConst((LOCAL3!=null?LOCAL3.getText():null)); 

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
    public static final BitSet FOLLOW_rule_in_query237 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_FORALL_in_rule263 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_VAR_LIST_in_rule266 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_VAR_ID_in_rule268 = new BitSet(new long[]{0x0001000000000008L});
    public static final BitSet FOLLOW_clause_in_rule272 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_clause_in_rule284 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_IMPLICATION_in_clause310 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_head_in_clause314 = new BitSet(new long[]{0x0000102800007020L});
    public static final BitSet FOLLOW_formula_in_clause318 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_atomic_in_clause333 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_atomic_in_head364 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_EXISTS_in_head377 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_VAR_LIST_in_head380 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_VAR_ID_in_head383 = new BitSet(new long[]{0x0001000000000008L});
    public static final BitSet FOLLOW_atomic_in_head390 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_AND_in_formula415 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_formula_in_formula417 = new BitSet(new long[]{0x0000102800007028L});
    public static final BitSet FOLLOW_OR_in_formula430 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_formula_in_formula432 = new BitSet(new long[]{0x0000102800007028L});
    public static final BitSet FOLLOW_EXISTS_in_formula445 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_VAR_LIST_in_formula448 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_VAR_ID_in_formula450 = new BitSet(new long[]{0x0001000000000008L});
    public static final BitSet FOLLOW_formula_in_formula454 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_atomic_in_formula465 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_external_in_formula475 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_atom_in_atomic500 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_equal_in_atomic512 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_subclass_in_atomic522 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_psoa_in_atom547 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_EQUAL_in_equal569 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_equal571 = new BitSet(new long[]{0x0001412020004000L});
    public static final BitSet FOLLOW_term_in_equal573 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_SUBCLASS_in_subclass594 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_subclass596 = new BitSet(new long[]{0x0001412020004000L});
    public static final BitSet FOLLOW_term_in_subclass598 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_constant_in_term628 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_VAR_ID_in_term640 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_psoa_in_term654 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_external_in_term664 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_EXTERNAL_in_external684 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_psoa_in_external686 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_PSOA_in_psoa720 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_psoa724 = new BitSet(new long[]{0x0000000000800000L});
    public static final BitSet FOLLOW_INSTANCE_in_psoa728 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_psoa732 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_tuple_in_psoa738 = new BitSet(new long[]{0x0000820000000008L});
    public static final BitSet FOLLOW_slot_in_psoa747 = new BitSet(new long[]{0x0000020000000008L});
    public static final BitSet FOLLOW_TUPLE_in_tuple787 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_tuple792 = new BitSet(new long[]{0x0001412020004008L});
    public static final BitSet FOLLOW_SLOT_in_slot830 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_term_in_slot834 = new BitSet(new long[]{0x0001412020004000L});
    public static final BitSet FOLLOW_term_in_slot838 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_LITERAL_in_constant870 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_IRI_in_constant872 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_SHORTCONST_in_constant884 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_constshort_in_constant888 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_TOP_in_constant901 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_IRI_in_constshort930 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_LITERAL_in_constshort940 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_NUMBER_in_constshort950 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_LOCAL_in_constshort962 = new BitSet(new long[]{0x0000000000000002L});

}