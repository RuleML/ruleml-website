// $ANTLR 3.4 org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g 2012-09-05 10:53:30

    package org.ruleml.api.presentation_syntax_parser;
    import org.ruleml.api.*;
    import org.ruleml.api.AbstractSyntax.*;


import org.antlr.runtime.*;
import java.util.Stack;
import java.util.List;
import java.util.ArrayList;

@SuppressWarnings({"all", "warnings", "unchecked"})
public class PSOARuleMLPSLexer extends Lexer {
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
    // delegators
    public Lexer[] getDelegates() {
        return new Lexer[] {};
    }

    public PSOARuleMLPSLexer() {} 
    public PSOARuleMLPSLexer(CharStream input) {
        this(input, new RecognizerSharedState());
    }
    public PSOARuleMLPSLexer(CharStream input, RecognizerSharedState state) {
        super(input,state);
    }
    public String getGrammarFileName() { return "org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g"; }

    // $ANTLR start "T__51"
    public final void mT__51() throws RecognitionException {
        try {
            int _type = T__51;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:10:7: ( '@' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:10:9: '@'
            {
            match('@'); 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "T__51"

    // $ANTLR start "WHITESPACE"
    public final void mWHITESPACE() throws RecognitionException {
        try {
            int _type = WHITESPACE;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:221:13: ( ( ' ' | '\\t' | '\\r' | '\\n' )+ )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:221:16: ( ' ' | '\\t' | '\\r' | '\\n' )+
            {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:221:16: ( ' ' | '\\t' | '\\r' | '\\n' )+
            int cnt1=0;
            loop1:
            do {
                int alt1=2;
                switch ( input.LA(1) ) {
                case '\t':
                case '\n':
                case '\r':
                case ' ':
                    {
                    alt1=1;
                    }
                    break;

                }

                switch (alt1) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:
            	    {
            	    if ( (input.LA(1) >= '\t' && input.LA(1) <= '\n')||input.LA(1)=='\r'||input.LA(1)==' ' ) {
            	        input.consume();
            	    }
            	    else {
            	        MismatchedSetException mse = new MismatchedSetException(null,input);
            	        recover(mse);
            	        throw mse;
            	    }


            	    }
            	    break;

            	default :
            	    if ( cnt1 >= 1 ) break loop1;
                        EarlyExitException eee =
                            new EarlyExitException(1, input);
                        throw eee;
                }
                cnt1++;
            } while (true);


             _channel = HIDDEN; 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "WHITESPACE"

    // $ANTLR start "MULTI_LINE_COMMENT"
    public final void mMULTI_LINE_COMMENT() throws RecognitionException {
        try {
            int _type = MULTI_LINE_COMMENT;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:222:20: ( '<!--' ( options {greedy=false; } : ( . )* ) '-->' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:222:23: '<!--' ( options {greedy=false; } : ( . )* ) '-->'
            {
            match("<!--"); 



            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:222:30: ( options {greedy=false; } : ( . )* )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:222:57: ( . )*
            {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:222:57: ( . )*
            loop2:
            do {
                int alt2=2;
                int LA2_0 = input.LA(1);

                if ( (LA2_0=='-') ) {
                    int LA2_1 = input.LA(2);

                    if ( (LA2_1=='-') ) {
                        int LA2_3 = input.LA(3);

                        if ( (LA2_3=='>') ) {
                            alt2=2;
                        }
                        else if ( ((LA2_3 >= '\u0000' && LA2_3 <= '=')||(LA2_3 >= '?' && LA2_3 <= '\uFFFF')) ) {
                            alt2=1;
                        }


                    }
                    else if ( ((LA2_1 >= '\u0000' && LA2_1 <= ',')||(LA2_1 >= '.' && LA2_1 <= '\uFFFF')) ) {
                        alt2=1;
                    }


                }
                else if ( ((LA2_0 >= '\u0000' && LA2_0 <= ',')||(LA2_0 >= '.' && LA2_0 <= '\uFFFF')) ) {
                    alt2=1;
                }


                switch (alt2) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:222:57: .
            	    {
            	    matchAny(); 

            	    }
            	    break;

            	default :
            	    break loop2;
                }
            } while (true);


            }


            match("-->"); 



             _channel=HIDDEN; 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "MULTI_LINE_COMMENT"

    // $ANTLR start "DOCUMENT"
    public final void mDOCUMENT() throws RecognitionException {
        try {
            int _type = DOCUMENT;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:225:10: ( 'Document' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:225:12: 'Document'
            {
            match("Document"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "DOCUMENT"

    // $ANTLR start "BASE"
    public final void mBASE() throws RecognitionException {
        try {
            int _type = BASE;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:226:6: ( 'Base' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:226:8: 'Base'
            {
            match("Base"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "BASE"

    // $ANTLR start "IMPORT"
    public final void mIMPORT() throws RecognitionException {
        try {
            int _type = IMPORT;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:227:8: ( 'Import' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:227:10: 'Import'
            {
            match("Import"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "IMPORT"

    // $ANTLR start "PREFIX"
    public final void mPREFIX() throws RecognitionException {
        try {
            int _type = PREFIX;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:228:8: ( 'Prefix' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:228:10: 'Prefix'
            {
            match("Prefix"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "PREFIX"

    // $ANTLR start "GROUP"
    public final void mGROUP() throws RecognitionException {
        try {
            int _type = GROUP;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:229:7: ( 'Group' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:229:9: 'Group'
            {
            match("Group"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "GROUP"

    // $ANTLR start "FORALL"
    public final void mFORALL() throws RecognitionException {
        try {
            int _type = FORALL;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:230:8: ( 'Forall' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:230:10: 'Forall'
            {
            match("Forall"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "FORALL"

    // $ANTLR start "EXISTS"
    public final void mEXISTS() throws RecognitionException {
        try {
            int _type = EXISTS;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:231:8: ( 'Exists' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:231:10: 'Exists'
            {
            match("Exists"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "EXISTS"

    // $ANTLR start "AND"
    public final void mAND() throws RecognitionException {
        try {
            int _type = AND;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:232:5: ( 'And' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:232:7: 'And'
            {
            match("And"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "AND"

    // $ANTLR start "OR"
    public final void mOR() throws RecognitionException {
        try {
            int _type = OR;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:233:4: ( 'Or' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:233:6: 'Or'
            {
            match("Or"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "OR"

    // $ANTLR start "EXTERNAL"
    public final void mEXTERNAL() throws RecognitionException {
        try {
            int _type = EXTERNAL;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:234:10: ( 'External' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:234:12: 'External'
            {
            match("External"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "EXTERNAL"

    // $ANTLR start "TOP"
    public final void mTOP() throws RecognitionException {
        try {
            int _type = TOP;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:235:5: ( 'Top' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:235:7: 'Top'
            {
            match("Top"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "TOP"

    // $ANTLR start "NUMBER"
    public final void mNUMBER() throws RecognitionException {
        try {
            int _type = NUMBER;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:238:7: ( ( DIGIT )+ ( '.' ( DIGIT )* )? )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:238:9: ( DIGIT )+ ( '.' ( DIGIT )* )?
            {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:238:9: ( DIGIT )+
            int cnt3=0;
            loop3:
            do {
                int alt3=2;
                switch ( input.LA(1) ) {
                case '0':
                case '1':
                case '2':
                case '3':
                case '4':
                case '5':
                case '6':
                case '7':
                case '8':
                case '9':
                    {
                    alt3=1;
                    }
                    break;

                }

                switch (alt3) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:
            	    {
            	    if ( (input.LA(1) >= '0' && input.LA(1) <= '9') ) {
            	        input.consume();
            	    }
            	    else {
            	        MismatchedSetException mse = new MismatchedSetException(null,input);
            	        recover(mse);
            	        throw mse;
            	    }


            	    }
            	    break;

            	default :
            	    if ( cnt3 >= 1 ) break loop3;
                        EarlyExitException eee =
                            new EarlyExitException(3, input);
                        throw eee;
                }
                cnt3++;
            } while (true);


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:238:16: ( '.' ( DIGIT )* )?
            int alt5=2;
            switch ( input.LA(1) ) {
                case '.':
                    {
                    alt5=1;
                    }
                    break;
            }

            switch (alt5) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:238:17: '.' ( DIGIT )*
                    {
                    match('.'); 

                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:238:21: ( DIGIT )*
                    loop4:
                    do {
                        int alt4=2;
                        switch ( input.LA(1) ) {
                        case '0':
                        case '1':
                        case '2':
                        case '3':
                        case '4':
                        case '5':
                        case '6':
                        case '7':
                        case '8':
                        case '9':
                            {
                            alt4=1;
                            }
                            break;

                        }

                        switch (alt4) {
                    	case 1 :
                    	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:
                    	    {
                    	    if ( (input.LA(1) >= '0' && input.LA(1) <= '9') ) {
                    	        input.consume();
                    	    }
                    	    else {
                    	        MismatchedSetException mse = new MismatchedSetException(null,input);
                    	        recover(mse);
                    	        throw mse;
                    	    }


                    	    }
                    	    break;

                    	default :
                    	    break loop4;
                        }
                    } while (true);


                    }
                    break;

            }


            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "NUMBER"

    // $ANTLR start "CURIE"
    public final void mCURIE() throws RecognitionException {
        try {
            int _type = CURIE;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:239:7: ( ( ID )? ':' ( ID )? )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:239:9: ( ID )? ':' ( ID )?
            {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:239:9: ( ID )?
            int alt6=2;
            int LA6_0 = input.LA(1);

            if ( ((LA6_0 >= 'A' && LA6_0 <= 'Z')||LA6_0=='_'||(LA6_0 >= 'a' && LA6_0 <= 'z')||(LA6_0 >= '\u00C0' && LA6_0 <= '\u00D6')||(LA6_0 >= '\u00D8' && LA6_0 <= '\u00F6')||(LA6_0 >= '\u00F8' && LA6_0 <= '\u02FF')||(LA6_0 >= '\u0370' && LA6_0 <= '\u037D')||(LA6_0 >= '\u037F' && LA6_0 <= '\u1FFF')||(LA6_0 >= '\u200C' && LA6_0 <= '\u200D')||(LA6_0 >= '\u2070' && LA6_0 <= '\u218F')||(LA6_0 >= '\u2C00' && LA6_0 <= '\u2FEF')||(LA6_0 >= '\u3001' && LA6_0 <= '\uD7FF')||(LA6_0 >= '\uF900' && LA6_0 <= '\uFDCF')||(LA6_0 >= '\uFDF0' && LA6_0 <= '\uFFFD')) ) {
                alt6=1;
            }
            switch (alt6) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:239:9: ID
                    {
                    mID(); 


                    }
                    break;

            }


            match(':'); 

            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:239:17: ( ID )?
            int alt7=2;
            int LA7_0 = input.LA(1);

            if ( ((LA7_0 >= 'A' && LA7_0 <= 'Z')||LA7_0=='_'||(LA7_0 >= 'a' && LA7_0 <= 'z')||(LA7_0 >= '\u00C0' && LA7_0 <= '\u00D6')||(LA7_0 >= '\u00D8' && LA7_0 <= '\u00F6')||(LA7_0 >= '\u00F8' && LA7_0 <= '\u02FF')||(LA7_0 >= '\u0370' && LA7_0 <= '\u037D')||(LA7_0 >= '\u037F' && LA7_0 <= '\u1FFF')||(LA7_0 >= '\u200C' && LA7_0 <= '\u200D')||(LA7_0 >= '\u2070' && LA7_0 <= '\u218F')||(LA7_0 >= '\u2C00' && LA7_0 <= '\u2FEF')||(LA7_0 >= '\u3001' && LA7_0 <= '\uD7FF')||(LA7_0 >= '\uF900' && LA7_0 <= '\uFDCF')||(LA7_0 >= '\uFDF0' && LA7_0 <= '\uFFFD')) ) {
                alt7=1;
            }
            switch (alt7) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:239:17: ID
                    {
                    mID(); 


                    }
                    break;

            }


            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "CURIE"

    // $ANTLR start "STRING"
    public final void mSTRING() throws RecognitionException {
        try {
            int _type = STRING;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:241:7: ( '\"' (~ ( '\"' | '\\\\' | EOL ) | ECHAR )* '\"' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:241:9: '\"' (~ ( '\"' | '\\\\' | EOL ) | ECHAR )* '\"'
            {
            match('\"'); 

            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:241:13: (~ ( '\"' | '\\\\' | EOL ) | ECHAR )*
            loop8:
            do {
                int alt8=3;
                int LA8_0 = input.LA(1);

                if ( ((LA8_0 >= '\u0000' && LA8_0 <= '\t')||(LA8_0 >= '\u000B' && LA8_0 <= '\f')||(LA8_0 >= '\u000E' && LA8_0 <= '!')||(LA8_0 >= '#' && LA8_0 <= '[')||(LA8_0 >= ']' && LA8_0 <= '\uFFFF')) ) {
                    alt8=1;
                }
                else if ( (LA8_0=='\\') ) {
                    alt8=2;
                }


                switch (alt8) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:241:14: ~ ( '\"' | '\\\\' | EOL )
            	    {
            	    if ( (input.LA(1) >= '\u0000' && input.LA(1) <= '\t')||(input.LA(1) >= '\u000B' && input.LA(1) <= '\f')||(input.LA(1) >= '\u000E' && input.LA(1) <= '!')||(input.LA(1) >= '#' && input.LA(1) <= '[')||(input.LA(1) >= ']' && input.LA(1) <= '\uFFFF') ) {
            	        input.consume();
            	    }
            	    else {
            	        MismatchedSetException mse = new MismatchedSetException(null,input);
            	        recover(mse);
            	        throw mse;
            	    }


            	    }
            	    break;
            	case 2 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:241:36: ECHAR
            	    {
            	    mECHAR(); 


            	    }
            	    break;

            	default :
            	    break loop8;
                }
            } while (true);


            match('\"'); 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "STRING"

    // $ANTLR start "IRI_REF"
    public final void mIRI_REF() throws RecognitionException {
        try {
            int _type = IRI_REF;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:244:9: ( '<' IRI_START_CHAR ( IRI_CHAR )+ '>' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:244:11: '<' IRI_START_CHAR ( IRI_CHAR )+ '>'
            {
            match('<'); 

            mIRI_START_CHAR(); 


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:244:30: ( IRI_CHAR )+
            int cnt9=0;
            loop9:
            do {
                int alt9=2;
                switch ( input.LA(1) ) {
                case '!':
                case '#':
                case '$':
                case '%':
                case '&':
                case '\'':
                case '(':
                case ')':
                case '*':
                case '+':
                case ',':
                case '-':
                case '.':
                case '/':
                case '0':
                case '1':
                case '2':
                case '3':
                case '4':
                case '5':
                case '6':
                case '7':
                case '8':
                case '9':
                case ':':
                case ';':
                case '=':
                case '?':
                case '@':
                case 'A':
                case 'B':
                case 'C':
                case 'D':
                case 'E':
                case 'F':
                case 'G':
                case 'H':
                case 'I':
                case 'J':
                case 'K':
                case 'L':
                case 'M':
                case 'N':
                case 'O':
                case 'P':
                case 'Q':
                case 'R':
                case 'S':
                case 'T':
                case 'U':
                case 'V':
                case 'W':
                case 'X':
                case 'Y':
                case 'Z':
                case '_':
                case 'a':
                case 'b':
                case 'c':
                case 'd':
                case 'e':
                case 'f':
                case 'g':
                case 'h':
                case 'i':
                case 'j':
                case 'k':
                case 'l':
                case 'm':
                case 'n':
                case 'o':
                case 'p':
                case 'q':
                case 'r':
                case 's':
                case 't':
                case 'u':
                case 'v':
                case 'w':
                case 'x':
                case 'y':
                case 'z':
                case '~':
                    {
                    alt9=1;
                    }
                    break;

                }

                switch (alt9) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:
            	    {
            	    if ( input.LA(1)=='!'||(input.LA(1) >= '#' && input.LA(1) <= ';')||input.LA(1)=='='||(input.LA(1) >= '?' && input.LA(1) <= 'Z')||input.LA(1)=='_'||(input.LA(1) >= 'a' && input.LA(1) <= 'z')||input.LA(1)=='~' ) {
            	        input.consume();
            	    }
            	    else {
            	        MismatchedSetException mse = new MismatchedSetException(null,input);
            	        recover(mse);
            	        throw mse;
            	    }


            	    }
            	    break;

            	default :
            	    if ( cnt9 >= 1 ) break loop9;
                        EarlyExitException eee =
                            new EarlyExitException(9, input);
                        throw eee;
                }
                cnt9++;
            } while (true);


            match('>'); 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "IRI_REF"

    // $ANTLR start "VAR_ID"
    public final void mVAR_ID() throws RecognitionException {
        try {
            int _type = VAR_ID;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:245:8: ( '?' ( ID_CHAR )* )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:245:10: '?' ( ID_CHAR )*
            {
            match('?'); 

            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:245:14: ( ID_CHAR )*
            loop10:
            do {
                int alt10=2;
                int LA10_0 = input.LA(1);

                if ( (LA10_0=='.'||(LA10_0 >= '0' && LA10_0 <= '9')||(LA10_0 >= 'A' && LA10_0 <= 'Z')||LA10_0=='_'||(LA10_0 >= 'a' && LA10_0 <= 'z')||LA10_0=='\u00B7'||(LA10_0 >= '\u00C0' && LA10_0 <= '\u00D6')||(LA10_0 >= '\u00D8' && LA10_0 <= '\u00F6')||(LA10_0 >= '\u00F8' && LA10_0 <= '\u02FF')||(LA10_0 >= '\u0370' && LA10_0 <= '\u037D')||(LA10_0 >= '\u037F' && LA10_0 <= '\u1FFF')||(LA10_0 >= '\u200C' && LA10_0 <= '\u200D')||(LA10_0 >= '\u203F' && LA10_0 <= '\u2040')||(LA10_0 >= '\u2070' && LA10_0 <= '\u218F')||(LA10_0 >= '\u2C00' && LA10_0 <= '\u2FEF')||(LA10_0 >= '\u3001' && LA10_0 <= '\uD7FF')||(LA10_0 >= '\uF900' && LA10_0 <= '\uFDCF')||(LA10_0 >= '\uFDF0' && LA10_0 <= '\uFFFD')) ) {
                    alt10=1;
                }


                switch (alt10) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:
            	    {
            	    if ( input.LA(1)=='.'||(input.LA(1) >= '0' && input.LA(1) <= '9')||(input.LA(1) >= 'A' && input.LA(1) <= 'Z')||input.LA(1)=='_'||(input.LA(1) >= 'a' && input.LA(1) <= 'z')||input.LA(1)=='\u00B7'||(input.LA(1) >= '\u00C0' && input.LA(1) <= '\u00D6')||(input.LA(1) >= '\u00D8' && input.LA(1) <= '\u00F6')||(input.LA(1) >= '\u00F8' && input.LA(1) <= '\u02FF')||(input.LA(1) >= '\u0370' && input.LA(1) <= '\u037D')||(input.LA(1) >= '\u037F' && input.LA(1) <= '\u1FFF')||(input.LA(1) >= '\u200C' && input.LA(1) <= '\u200D')||(input.LA(1) >= '\u203F' && input.LA(1) <= '\u2040')||(input.LA(1) >= '\u2070' && input.LA(1) <= '\u218F')||(input.LA(1) >= '\u2C00' && input.LA(1) <= '\u2FEF')||(input.LA(1) >= '\u3001' && input.LA(1) <= '\uD7FF')||(input.LA(1) >= '\uF900' && input.LA(1) <= '\uFDCF')||(input.LA(1) >= '\uFDF0' && input.LA(1) <= '\uFFFD') ) {
            	        input.consume();
            	    }
            	    else {
            	        MismatchedSetException mse = new MismatchedSetException(null,input);
            	        recover(mse);
            	        throw mse;
            	    }


            	    }
            	    break;

            	default :
            	    break loop10;
                }
            } while (true);


            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "VAR_ID"

    // $ANTLR start "ID"
    public final void mID() throws RecognitionException {
        try {
            int _type = ID;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:246:4: ( ID_START_CHAR ( ID_CHAR )* )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:246:6: ID_START_CHAR ( ID_CHAR )*
            {
            mID_START_CHAR(); 


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:246:20: ( ID_CHAR )*
            loop11:
            do {
                int alt11=2;
                int LA11_0 = input.LA(1);

                if ( (LA11_0=='.'||(LA11_0 >= '0' && LA11_0 <= '9')||(LA11_0 >= 'A' && LA11_0 <= 'Z')||LA11_0=='_'||(LA11_0 >= 'a' && LA11_0 <= 'z')||LA11_0=='\u00B7'||(LA11_0 >= '\u00C0' && LA11_0 <= '\u00D6')||(LA11_0 >= '\u00D8' && LA11_0 <= '\u00F6')||(LA11_0 >= '\u00F8' && LA11_0 <= '\u02FF')||(LA11_0 >= '\u0370' && LA11_0 <= '\u037D')||(LA11_0 >= '\u037F' && LA11_0 <= '\u1FFF')||(LA11_0 >= '\u200C' && LA11_0 <= '\u200D')||(LA11_0 >= '\u203F' && LA11_0 <= '\u2040')||(LA11_0 >= '\u2070' && LA11_0 <= '\u218F')||(LA11_0 >= '\u2C00' && LA11_0 <= '\u2FEF')||(LA11_0 >= '\u3001' && LA11_0 <= '\uD7FF')||(LA11_0 >= '\uF900' && LA11_0 <= '\uFDCF')||(LA11_0 >= '\uFDF0' && LA11_0 <= '\uFFFD')) ) {
                    alt11=1;
                }


                switch (alt11) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:
            	    {
            	    if ( input.LA(1)=='.'||(input.LA(1) >= '0' && input.LA(1) <= '9')||(input.LA(1) >= 'A' && input.LA(1) <= 'Z')||input.LA(1)=='_'||(input.LA(1) >= 'a' && input.LA(1) <= 'z')||input.LA(1)=='\u00B7'||(input.LA(1) >= '\u00C0' && input.LA(1) <= '\u00D6')||(input.LA(1) >= '\u00D8' && input.LA(1) <= '\u00F6')||(input.LA(1) >= '\u00F8' && input.LA(1) <= '\u02FF')||(input.LA(1) >= '\u0370' && input.LA(1) <= '\u037D')||(input.LA(1) >= '\u037F' && input.LA(1) <= '\u1FFF')||(input.LA(1) >= '\u200C' && input.LA(1) <= '\u200D')||(input.LA(1) >= '\u203F' && input.LA(1) <= '\u2040')||(input.LA(1) >= '\u2070' && input.LA(1) <= '\u218F')||(input.LA(1) >= '\u2C00' && input.LA(1) <= '\u2FEF')||(input.LA(1) >= '\u3001' && input.LA(1) <= '\uD7FF')||(input.LA(1) >= '\uF900' && input.LA(1) <= '\uFDCF')||(input.LA(1) >= '\uFDF0' && input.LA(1) <= '\uFFFD') ) {
            	        input.consume();
            	    }
            	    else {
            	        MismatchedSetException mse = new MismatchedSetException(null,input);
            	        recover(mse);
            	        throw mse;
            	    }


            	    }
            	    break;

            	default :
            	    break loop11;
                }
            } while (true);


            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "ID"

    // $ANTLR start "IMPLICATION"
    public final void mIMPLICATION() throws RecognitionException {
        try {
            int _type = IMPLICATION;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:249:13: ( ':-' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:249:15: ':-'
            {
            match(":-"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "IMPLICATION"

    // $ANTLR start "EQUAL"
    public final void mEQUAL() throws RecognitionException {
        try {
            int _type = EQUAL;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:250:7: ( '=' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:250:9: '='
            {
            match('='); 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "EQUAL"

    // $ANTLR start "SUBCLASS"
    public final void mSUBCLASS() throws RecognitionException {
        try {
            int _type = SUBCLASS;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:251:10: ( '##' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:251:12: '##'
            {
            match("##"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "SUBCLASS"

    // $ANTLR start "INSTANCE"
    public final void mINSTANCE() throws RecognitionException {
        try {
            int _type = INSTANCE;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:252:10: ( '#' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:252:12: '#'
            {
            match('#'); 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "INSTANCE"

    // $ANTLR start "SLOT_ARROW"
    public final void mSLOT_ARROW() throws RecognitionException {
        try {
            int _type = SLOT_ARROW;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:253:12: ( '->' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:253:14: '->'
            {
            match("->"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "SLOT_ARROW"

    // $ANTLR start "SYMSPACE_OPER"
    public final void mSYMSPACE_OPER() throws RecognitionException {
        try {
            int _type = SYMSPACE_OPER;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:254:15: ( '^^' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:254:17: '^^'
            {
            match("^^"); 



            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "SYMSPACE_OPER"

    // $ANTLR start "LPAR"
    public final void mLPAR() throws RecognitionException {
        try {
            int _type = LPAR;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:257:6: ( '(' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:257:8: '('
            {
            match('('); 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "LPAR"

    // $ANTLR start "RPAR"
    public final void mRPAR() throws RecognitionException {
        try {
            int _type = RPAR;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:258:6: ( ')' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:258:8: ')'
            {
            match(')'); 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "RPAR"

    // $ANTLR start "LESS"
    public final void mLESS() throws RecognitionException {
        try {
            int _type = LESS;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:259:6: ( '<' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:259:8: '<'
            {
            match('<'); 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "LESS"

    // $ANTLR start "GREATER"
    public final void mGREATER() throws RecognitionException {
        try {
            int _type = GREATER;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:260:9: ( '>' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:260:11: '>'
            {
            match('>'); 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "GREATER"

    // $ANTLR start "LSQBR"
    public final void mLSQBR() throws RecognitionException {
        try {
            int _type = LSQBR;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:261:7: ( '[' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:261:9: '['
            {
            match('['); 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "LSQBR"

    // $ANTLR start "RSQBR"
    public final void mRSQBR() throws RecognitionException {
        try {
            int _type = RSQBR;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:262:7: ( ']' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:262:9: ']'
            {
            match(']'); 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "RSQBR"

    // $ANTLR start "ALPHA"
    public final void mALPHA() throws RecognitionException {
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:265:16: ( 'a' .. 'z' | 'A' .. 'Z' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:
            {
            if ( (input.LA(1) >= 'A' && input.LA(1) <= 'Z')||(input.LA(1) >= 'a' && input.LA(1) <= 'z') ) {
                input.consume();
            }
            else {
                MismatchedSetException mse = new MismatchedSetException(null,input);
                recover(mse);
                throw mse;
            }


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "ALPHA"

    // $ANTLR start "DIGIT"
    public final void mDIGIT() throws RecognitionException {
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:266:16: ( '0' .. '9' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:
            {
            if ( (input.LA(1) >= '0' && input.LA(1) <= '9') ) {
                input.consume();
            }
            else {
                MismatchedSetException mse = new MismatchedSetException(null,input);
                recover(mse);
                throw mse;
            }


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "DIGIT"

    // $ANTLR start "IRI_CHAR"
    public final void mIRI_CHAR() throws RecognitionException {
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:267:19: ( ALPHA | DIGIT | '+' | '-' | '.' | '@' | ':' | '_' | '~' | '%' | '!' | '$' | '&' | '\\'' | '(' | ')' | '*' | ',' | ';' | '=' | '?' | '#' | '/' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:
            {
            if ( input.LA(1)=='!'||(input.LA(1) >= '#' && input.LA(1) <= ';')||input.LA(1)=='='||(input.LA(1) >= '?' && input.LA(1) <= 'Z')||input.LA(1)=='_'||(input.LA(1) >= 'a' && input.LA(1) <= 'z')||input.LA(1)=='~' ) {
                input.consume();
            }
            else {
                MismatchedSetException mse = new MismatchedSetException(null,input);
                recover(mse);
                throw mse;
            }


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "IRI_CHAR"

    // $ANTLR start "IRI_START_CHAR"
    public final void mIRI_START_CHAR() throws RecognitionException {
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:271:25: ( ALPHA )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:
            {
            if ( (input.LA(1) >= 'A' && input.LA(1) <= 'Z')||(input.LA(1) >= 'a' && input.LA(1) <= 'z') ) {
                input.consume();
            }
            else {
                MismatchedSetException mse = new MismatchedSetException(null,input);
                recover(mse);
                throw mse;
            }


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "IRI_START_CHAR"

    // $ANTLR start "ID_CHAR"
    public final void mID_CHAR() throws RecognitionException {
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:275:5: ( ID_START_CHAR | DIGIT | '\\u00B7' | '\\u203F' .. '\\u2040' | '.' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:
            {
            if ( input.LA(1)=='.'||(input.LA(1) >= '0' && input.LA(1) <= '9')||(input.LA(1) >= 'A' && input.LA(1) <= 'Z')||input.LA(1)=='_'||(input.LA(1) >= 'a' && input.LA(1) <= 'z')||input.LA(1)=='\u00B7'||(input.LA(1) >= '\u00C0' && input.LA(1) <= '\u00D6')||(input.LA(1) >= '\u00D8' && input.LA(1) <= '\u00F6')||(input.LA(1) >= '\u00F8' && input.LA(1) <= '\u02FF')||(input.LA(1) >= '\u0370' && input.LA(1) <= '\u037D')||(input.LA(1) >= '\u037F' && input.LA(1) <= '\u1FFF')||(input.LA(1) >= '\u200C' && input.LA(1) <= '\u200D')||(input.LA(1) >= '\u203F' && input.LA(1) <= '\u2040')||(input.LA(1) >= '\u2070' && input.LA(1) <= '\u218F')||(input.LA(1) >= '\u2C00' && input.LA(1) <= '\u2FEF')||(input.LA(1) >= '\u3001' && input.LA(1) <= '\uD7FF')||(input.LA(1) >= '\uF900' && input.LA(1) <= '\uFDCF')||(input.LA(1) >= '\uFDF0' && input.LA(1) <= '\uFFFD') ) {
                input.consume();
            }
            else {
                MismatchedSetException mse = new MismatchedSetException(null,input);
                recover(mse);
                throw mse;
            }


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "ID_CHAR"

    // $ANTLR start "ID_START_CHAR"
    public final void mID_START_CHAR() throws RecognitionException {
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:285:5: ( ALPHA | '\\u00C0' .. '\\u00D6' | '\\u00D8' .. '\\u00F6' | '\\u00F8' .. '\\u02FF' | '\\u0370' .. '\\u037D' | '\\u037F' .. '\\u1FFF' | '\\u200C' .. '\\u200D' | '\\u2070' .. '\\u218F' | '\\u2C00' .. '\\u2FEF' | '\\u3001' .. '\\uD7FF' | '\\uF900' .. '\\uFDCF' | '\\uFDF0' .. '\\uFFFD' | '_' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:
            {
            if ( (input.LA(1) >= 'A' && input.LA(1) <= 'Z')||input.LA(1)=='_'||(input.LA(1) >= 'a' && input.LA(1) <= 'z')||(input.LA(1) >= '\u00C0' && input.LA(1) <= '\u00D6')||(input.LA(1) >= '\u00D8' && input.LA(1) <= '\u00F6')||(input.LA(1) >= '\u00F8' && input.LA(1) <= '\u02FF')||(input.LA(1) >= '\u0370' && input.LA(1) <= '\u037D')||(input.LA(1) >= '\u037F' && input.LA(1) <= '\u1FFF')||(input.LA(1) >= '\u200C' && input.LA(1) <= '\u200D')||(input.LA(1) >= '\u2070' && input.LA(1) <= '\u218F')||(input.LA(1) >= '\u2C00' && input.LA(1) <= '\u2FEF')||(input.LA(1) >= '\u3001' && input.LA(1) <= '\uD7FF')||(input.LA(1) >= '\uF900' && input.LA(1) <= '\uFDCF')||(input.LA(1) >= '\uFDF0' && input.LA(1) <= '\uFFFD') ) {
                input.consume();
            }
            else {
                MismatchedSetException mse = new MismatchedSetException(null,input);
                recover(mse);
                throw mse;
            }


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "ID_START_CHAR"

    // $ANTLR start "ECHAR"
    public final void mECHAR() throws RecognitionException {
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:300:16: ( '\\\\' ( 't' | 'b' | 'n' | 'r' | 'f' | '\\\\' | '\"' | '\\'' ) )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:300:18: '\\\\' ( 't' | 'b' | 'n' | 'r' | 'f' | '\\\\' | '\"' | '\\'' )
            {
            match('\\'); 

            if ( input.LA(1)=='\"'||input.LA(1)=='\''||input.LA(1)=='\\'||input.LA(1)=='b'||input.LA(1)=='f'||input.LA(1)=='n'||input.LA(1)=='r'||input.LA(1)=='t' ) {
                input.consume();
            }
            else {
                MismatchedSetException mse = new MismatchedSetException(null,input);
                recover(mse);
                throw mse;
            }


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "ECHAR"

    // $ANTLR start "EOL"
    public final void mEOL() throws RecognitionException {
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:302:14: ( '\\n' | '\\r' )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:
            {
            if ( input.LA(1)=='\n'||input.LA(1)=='\r' ) {
                input.consume();
            }
            else {
                MismatchedSetException mse = new MismatchedSetException(null,input);
                recover(mse);
                throw mse;
            }


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "EOL"

    public void mTokens() throws RecognitionException {
        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:8: ( T__51 | WHITESPACE | MULTI_LINE_COMMENT | DOCUMENT | BASE | IMPORT | PREFIX | GROUP | FORALL | EXISTS | AND | OR | EXTERNAL | TOP | NUMBER | CURIE | STRING | IRI_REF | VAR_ID | ID | IMPLICATION | EQUAL | SUBCLASS | INSTANCE | SLOT_ARROW | SYMSPACE_OPER | LPAR | RPAR | LESS | GREATER | LSQBR | RSQBR )
        int alt12=32;
        alt12 = dfa12.predict(input);
        switch (alt12) {
            case 1 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:10: T__51
                {
                mT__51(); 


                }
                break;
            case 2 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:16: WHITESPACE
                {
                mWHITESPACE(); 


                }
                break;
            case 3 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:27: MULTI_LINE_COMMENT
                {
                mMULTI_LINE_COMMENT(); 


                }
                break;
            case 4 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:46: DOCUMENT
                {
                mDOCUMENT(); 


                }
                break;
            case 5 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:55: BASE
                {
                mBASE(); 


                }
                break;
            case 6 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:60: IMPORT
                {
                mIMPORT(); 


                }
                break;
            case 7 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:67: PREFIX
                {
                mPREFIX(); 


                }
                break;
            case 8 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:74: GROUP
                {
                mGROUP(); 


                }
                break;
            case 9 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:80: FORALL
                {
                mFORALL(); 


                }
                break;
            case 10 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:87: EXISTS
                {
                mEXISTS(); 


                }
                break;
            case 11 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:94: AND
                {
                mAND(); 


                }
                break;
            case 12 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:98: OR
                {
                mOR(); 


                }
                break;
            case 13 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:101: EXTERNAL
                {
                mEXTERNAL(); 


                }
                break;
            case 14 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:110: TOP
                {
                mTOP(); 


                }
                break;
            case 15 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:114: NUMBER
                {
                mNUMBER(); 


                }
                break;
            case 16 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:121: CURIE
                {
                mCURIE(); 


                }
                break;
            case 17 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:127: STRING
                {
                mSTRING(); 


                }
                break;
            case 18 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:134: IRI_REF
                {
                mIRI_REF(); 


                }
                break;
            case 19 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:142: VAR_ID
                {
                mVAR_ID(); 


                }
                break;
            case 20 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:149: ID
                {
                mID(); 


                }
                break;
            case 21 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:152: IMPLICATION
                {
                mIMPLICATION(); 


                }
                break;
            case 22 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:164: EQUAL
                {
                mEQUAL(); 


                }
                break;
            case 23 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:170: SUBCLASS
                {
                mSUBCLASS(); 


                }
                break;
            case 24 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:179: INSTANCE
                {
                mINSTANCE(); 


                }
                break;
            case 25 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:188: SLOT_ARROW
                {
                mSLOT_ARROW(); 


                }
                break;
            case 26 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:199: SYMSPACE_OPER
                {
                mSYMSPACE_OPER(); 


                }
                break;
            case 27 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:213: LPAR
                {
                mLPAR(); 


                }
                break;
            case 28 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:218: RPAR
                {
                mRPAR(); 


                }
                break;
            case 29 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:223: LESS
                {
                mLESS(); 


                }
                break;
            case 30 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:228: GREATER
                {
                mGREATER(); 


                }
                break;
            case 31 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:236: LSQBR
                {
                mLSQBR(); 


                }
                break;
            case 32 :
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:1:242: RSQBR
                {
                mRSQBR(); 


                }
                break;

        }

    }


    protected DFA12 dfa12 = new DFA12(this);
    static final String DFA12_eotS =
        "\3\uffff\1\36\12\40\1\uffff\1\40\1\42\3\uffff\1\56\12\uffff\1\40"+
        "\1\uffff\1\40\1\uffff\7\40\1\70\1\40\3\uffff\10\40\1\102\1\uffff"+
        "\1\103\1\40\1\105\6\40\2\uffff\1\40\1\uffff\2\40\1\117\4\40\1\124"+
        "\1\125\1\uffff\1\126\1\127\2\40\4\uffff\1\40\1\133\1\134\2\uffff";
    static final String DFA12_eofS =
        "\135\uffff";
    static final String DFA12_minS =
        "\1\11\2\uffff\1\41\12\56\1\uffff\1\56\1\55\3\uffff\1\43\12\uffff"+
        "\1\56\1\uffff\1\56\1\uffff\11\56\3\uffff\11\56\1\uffff\11\56\2\uffff"+
        "\1\56\1\uffff\11\56\1\uffff\4\56\4\uffff\3\56\2\uffff";
    static final String DFA12_maxS =
        "\1\ufffd\2\uffff\1\172\12\ufffd\1\uffff\1\ufffd\1\55\3\uffff\1\43"+
        "\12\uffff\1\ufffd\1\uffff\1\ufffd\1\uffff\11\ufffd\3\uffff\11\ufffd"+
        "\1\uffff\11\ufffd\2\uffff\1\ufffd\1\uffff\11\ufffd\1\uffff\4\ufffd"+
        "\4\uffff\3\ufffd\2\uffff";
    static final String DFA12_acceptS =
        "\1\uffff\1\1\1\2\13\uffff\1\17\2\uffff\1\21\1\23\1\26\1\uffff\1"+
        "\31\1\32\1\33\1\34\1\36\1\37\1\40\1\3\1\22\1\35\1\uffff\1\24\1\uffff"+
        "\1\20\11\uffff\1\25\1\27\1\30\11\uffff\1\14\11\uffff\1\13\1\16\1"+
        "\uffff\1\5\11\uffff\1\10\4\uffff\1\6\1\7\1\11\1\12\3\uffff\1\4\1"+
        "\15";
    static final String DFA12_specialS =
        "\135\uffff}>";
    static final String[] DFA12_transitionS = {
            "\2\2\2\uffff\1\2\22\uffff\1\2\1\uffff\1\21\1\24\4\uffff\1\27"+
            "\1\30\3\uffff\1\25\2\uffff\12\16\1\20\1\uffff\1\3\1\23\1\31"+
            "\1\22\1\1\1\13\1\5\1\17\1\4\1\12\1\11\1\10\1\17\1\6\5\17\1\14"+
            "\1\7\3\17\1\15\6\17\1\32\1\uffff\1\33\1\26\1\17\1\uffff\32\17"+
            "\105\uffff\27\17\1\uffff\37\17\1\uffff\u0208\17\160\uffff\16"+
            "\17\1\uffff\u1c81\17\14\uffff\2\17\142\uffff\u0120\17\u0a70"+
            "\uffff\u03f0\17\21\uffff\ua7ff\17\u2100\uffff\u04d0\17\40\uffff"+
            "\u020e\17",
            "",
            "",
            "\1\34\37\uffff\32\35\6\uffff\32\35",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\16\41\1\37\13\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\1\43\31\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff"+
            "\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61"+
            "\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff"+
            "\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\14\41\1\44\15\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\21\41\1\45\10\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\21\41\1\46\10\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\16\41\1\47\13\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\27\41\1\50\2\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\15\41\1\51\14\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\21\41\1\52\10\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\16\41\1\53\13\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\32\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff\u0208"+
            "\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61\uffff"+
            "\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff\ua7ff"+
            "\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\54",
            "",
            "",
            "",
            "\1\55",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\2\41\1\57\27\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\32\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff\u0208"+
            "\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61\uffff"+
            "\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff\ua7ff"+
            "\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\22\41\1\60\7\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\17\41\1\61\12\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\4\41\1\62\25\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\16\41\1\63\13\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\21\41\1\64\10\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\10\41\1\65\12\41\1\66\6\41\74\uffff\1\41\10\uffff\27\41\1\uffff"+
            "\37\41\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14"+
            "\uffff\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0"+
            "\41\21\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\3\41\1\67\26\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\32\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff\u0208"+
            "\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61\uffff"+
            "\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff\ua7ff"+
            "\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\17\41\1\71\12\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "",
            "",
            "",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\24\41\1\72\5\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\4\41\1\73\25\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\16\41\1\74\13\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\5\41\1\75\24\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\24\41\1\76\5\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\1\77\31\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff"+
            "\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61"+
            "\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff"+
            "\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\22\41\1\100\7\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\4\41\1\101\25\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\32\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff\u0208"+
            "\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61\uffff"+
            "\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff\ua7ff"+
            "\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\32\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff\u0208"+
            "\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61\uffff"+
            "\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff\ua7ff"+
            "\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\14\41\1\104\15\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\32\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff\u0208"+
            "\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61\uffff"+
            "\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff\ua7ff"+
            "\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\21\41\1\106\10\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\10\41\1\107\21\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\17\41\1\110\12\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\13\41\1\111\16\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\23\41\1\112\6\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\21\41\1\113\10\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "",
            "",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\4\41\1\114\25\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\23\41\1\115\6\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\27\41\1\116\2\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\32\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff\u0208"+
            "\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61\uffff"+
            "\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff\ua7ff"+
            "\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\13\41\1\120\16\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\22\41\1\121\7\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\15\41\1\122\14\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\15\41\1\123\14\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\32\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff\u0208"+
            "\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61\uffff"+
            "\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff\ua7ff"+
            "\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\32\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff\u0208"+
            "\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61\uffff"+
            "\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff\ua7ff"+
            "\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\32\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff\u0208"+
            "\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61\uffff"+
            "\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff\ua7ff"+
            "\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\32\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff\u0208"+
            "\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61\uffff"+
            "\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff\ua7ff"+
            "\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\1\130\31\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff"+
            "\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61"+
            "\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff"+
            "\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\23\41\1\131\6\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "",
            "",
            "",
            "",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\13\41\1\132\16\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41"+
            "\1\uffff\u0208\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff"+
            "\2\41\61\uffff\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21"+
            "\uffff\ua7ff\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\32\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff\u0208"+
            "\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61\uffff"+
            "\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff\ua7ff"+
            "\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "\1\41\1\uffff\12\41\1\42\6\uffff\32\41\4\uffff\1\41\1\uffff"+
            "\32\41\74\uffff\1\41\10\uffff\27\41\1\uffff\37\41\1\uffff\u0208"+
            "\41\160\uffff\16\41\1\uffff\u1c81\41\14\uffff\2\41\61\uffff"+
            "\2\41\57\uffff\u0120\41\u0a70\uffff\u03f0\41\21\uffff\ua7ff"+
            "\41\u2100\uffff\u04d0\41\40\uffff\u020e\41",
            "",
            ""
    };

    static final short[] DFA12_eot = DFA.unpackEncodedString(DFA12_eotS);
    static final short[] DFA12_eof = DFA.unpackEncodedString(DFA12_eofS);
    static final char[] DFA12_min = DFA.unpackEncodedStringToUnsignedChars(DFA12_minS);
    static final char[] DFA12_max = DFA.unpackEncodedStringToUnsignedChars(DFA12_maxS);
    static final short[] DFA12_accept = DFA.unpackEncodedString(DFA12_acceptS);
    static final short[] DFA12_special = DFA.unpackEncodedString(DFA12_specialS);
    static final short[][] DFA12_transition;

    static {
        int numStates = DFA12_transitionS.length;
        DFA12_transition = new short[numStates][];
        for (int i=0; i<numStates; i++) {
            DFA12_transition[i] = DFA.unpackEncodedString(DFA12_transitionS[i]);
        }
    }

    class DFA12 extends DFA {

        public DFA12(BaseRecognizer recognizer) {
            this.recognizer = recognizer;
            this.decisionNumber = 12;
            this.eot = DFA12_eot;
            this.eof = DFA12_eof;
            this.min = DFA12_min;
            this.max = DFA12_max;
            this.accept = DFA12_accept;
            this.special = DFA12_special;
            this.transition = DFA12_transition;
        }
        public String getDescription() {
            return "1:1: Tokens : ( T__51 | WHITESPACE | MULTI_LINE_COMMENT | DOCUMENT | BASE | IMPORT | PREFIX | GROUP | FORALL | EXISTS | AND | OR | EXTERNAL | TOP | NUMBER | CURIE | STRING | IRI_REF | VAR_ID | ID | IMPLICATION | EQUAL | SUBCLASS | INSTANCE | SLOT_ARROW | SYMSPACE_OPER | LPAR | RPAR | LESS | GREATER | LSQBR | RSQBR );";
        }
    }
 

}