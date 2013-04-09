// $ANTLR 3.4 org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g 2012-09-05 10:53:30

	package org.ruleml.api.presentation_syntax_parser;
    import org.ruleml.api.*;
    import org.ruleml.api.AbstractSyntax.*;


import org.antlr.runtime.*;
import java.util.Stack;
import java.util.List;
import java.util.ArrayList;

import org.antlr.runtime.tree.*;


@SuppressWarnings({"all", "warnings", "unchecked"})
public class PSOARuleMLPSParser extends Parser {
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
    public Parser[] getDelegates() {
        return new Parser[] {};
    }

    // delegators


    public PSOARuleMLPSParser(TokenStream input) {
        this(input, new RecognizerSharedState());
    }
    public PSOARuleMLPSParser(TokenStream input, RecognizerSharedState state) {
        super(input, state);
    }

protected TreeAdaptor adaptor = new CommonTreeAdaptor();

public void setTreeAdaptor(TreeAdaptor adaptor) {
    this.adaptor = adaptor;
}
public TreeAdaptor getTreeAdaptor() {
    return adaptor;
}
    public String[] getTokenNames() { return PSOARuleMLPSParser.tokenNames; }
    public String getGrammarFileName() { return "org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g"; }


        
        private CommonTree getTupleTree(List list_terms, int length)
        {
            CommonTree root = (CommonTree)adaptor.nil();
            for (int i = 0; i < length; i++)
                adaptor.addChild(root, list_terms.get(i));
            return root;
        }
        
        private String getStrValue(String str)
        {
            return str.substring(1, str.length() - 1);
        }


    public static class top_level_item_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "top_level_item"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:63:1: top_level_item : ( document )? EOF ;
    public final PSOARuleMLPSParser.top_level_item_return top_level_item() throws RecognitionException {
        PSOARuleMLPSParser.top_level_item_return retval = new PSOARuleMLPSParser.top_level_item_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token EOF2=null;
        PSOARuleMLPSParser.document_return document1 =null;


        CommonTree EOF2_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:63:16: ( ( document )? EOF )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:63:18: ( document )? EOF
            {
            root_0 = (CommonTree)adaptor.nil();


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:63:18: ( document )?
            int alt1=2;
            switch ( input.LA(1) ) {
                case DOCUMENT:
                    {
                    alt1=1;
                    }
                    break;
            }

            switch (alt1) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:63:18: document
                    {
                    pushFollow(FOLLOW_document_in_top_level_item166);
                    document1=document();

                    state._fsp--;

                    adaptor.addChild(root_0, document1.getTree());

                    }
                    break;

            }


            EOF2=(Token)match(input,EOF,FOLLOW_EOF_in_top_level_item169); 
            EOF2_tree = 
            (CommonTree)adaptor.create(EOF2)
            ;
            adaptor.addChild(root_0, EOF2_tree);


            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "top_level_item"


    public static class query_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "query"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:65:1: query : formula ;
    public final PSOARuleMLPSParser.query_return query() throws RecognitionException {
        PSOARuleMLPSParser.query_return retval = new PSOARuleMLPSParser.query_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        PSOARuleMLPSParser.formula_return formula3 =null;



        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:66:5: ( formula )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:66:9: formula
            {
            root_0 = (CommonTree)adaptor.nil();


            pushFollow(FOLLOW_formula_in_query183);
            formula3=formula();

            state._fsp--;

            adaptor.addChild(root_0, formula3.getTree());

            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "query"


    public static class document_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "document"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:68:1: document : DOCUMENT LPAR ( base )? ( prefix )* ( importDecl )* ( group )? RPAR -> ^( DOCUMENT ( base )? ( prefix )* ( importDecl )* ( group )? ) ;
    public final PSOARuleMLPSParser.document_return document() throws RecognitionException {
        PSOARuleMLPSParser.document_return retval = new PSOARuleMLPSParser.document_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token DOCUMENT4=null;
        Token LPAR5=null;
        Token RPAR10=null;
        PSOARuleMLPSParser.base_return base6 =null;

        PSOARuleMLPSParser.prefix_return prefix7 =null;

        PSOARuleMLPSParser.importDecl_return importDecl8 =null;

        PSOARuleMLPSParser.group_return group9 =null;


        CommonTree DOCUMENT4_tree=null;
        CommonTree LPAR5_tree=null;
        CommonTree RPAR10_tree=null;
        RewriteRuleTokenStream stream_RPAR=new RewriteRuleTokenStream(adaptor,"token RPAR");
        RewriteRuleTokenStream stream_LPAR=new RewriteRuleTokenStream(adaptor,"token LPAR");
        RewriteRuleTokenStream stream_DOCUMENT=new RewriteRuleTokenStream(adaptor,"token DOCUMENT");
        RewriteRuleSubtreeStream stream_importDecl=new RewriteRuleSubtreeStream(adaptor,"rule importDecl");
        RewriteRuleSubtreeStream stream_prefix=new RewriteRuleSubtreeStream(adaptor,"rule prefix");
        RewriteRuleSubtreeStream stream_base=new RewriteRuleSubtreeStream(adaptor,"rule base");
        RewriteRuleSubtreeStream stream_group=new RewriteRuleSubtreeStream(adaptor,"rule group");
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:69:5: ( DOCUMENT LPAR ( base )? ( prefix )* ( importDecl )* ( group )? RPAR -> ^( DOCUMENT ( base )? ( prefix )* ( importDecl )* ( group )? ) )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:69:9: DOCUMENT LPAR ( base )? ( prefix )* ( importDecl )* ( group )? RPAR
            {
            DOCUMENT4=(Token)match(input,DOCUMENT,FOLLOW_DOCUMENT_in_document197);  
            stream_DOCUMENT.add(DOCUMENT4);


            LPAR5=(Token)match(input,LPAR,FOLLOW_LPAR_in_document199);  
            stream_LPAR.add(LPAR5);


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:69:23: ( base )?
            int alt2=2;
            switch ( input.LA(1) ) {
                case BASE:
                    {
                    alt2=1;
                    }
                    break;
            }

            switch (alt2) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:69:23: base
                    {
                    pushFollow(FOLLOW_base_in_document201);
                    base6=base();

                    state._fsp--;

                    stream_base.add(base6.getTree());

                    }
                    break;

            }


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:69:29: ( prefix )*
            loop3:
            do {
                int alt3=2;
                switch ( input.LA(1) ) {
                case PREFIX:
                    {
                    alt3=1;
                    }
                    break;

                }

                switch (alt3) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:69:29: prefix
            	    {
            	    pushFollow(FOLLOW_prefix_in_document204);
            	    prefix7=prefix();

            	    state._fsp--;

            	    stream_prefix.add(prefix7.getTree());

            	    }
            	    break;

            	default :
            	    break loop3;
                }
            } while (true);


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:69:37: ( importDecl )*
            loop4:
            do {
                int alt4=2;
                switch ( input.LA(1) ) {
                case IMPORT:
                    {
                    alt4=1;
                    }
                    break;

                }

                switch (alt4) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:69:37: importDecl
            	    {
            	    pushFollow(FOLLOW_importDecl_in_document207);
            	    importDecl8=importDecl();

            	    state._fsp--;

            	    stream_importDecl.add(importDecl8.getTree());

            	    }
            	    break;

            	default :
            	    break loop4;
                }
            } while (true);


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:69:49: ( group )?
            int alt5=2;
            switch ( input.LA(1) ) {
                case GROUP:
                    {
                    alt5=1;
                    }
                    break;
            }

            switch (alt5) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:69:49: group
                    {
                    pushFollow(FOLLOW_group_in_document210);
                    group9=group();

                    state._fsp--;

                    stream_group.add(group9.getTree());

                    }
                    break;

            }


            RPAR10=(Token)match(input,RPAR,FOLLOW_RPAR_in_document213);  
            stream_RPAR.add(RPAR10);


            // AST REWRITE
            // elements: group, importDecl, prefix, base, DOCUMENT
            // token labels: 
            // rule labels: retval
            // token list labels: 
            // rule list labels: 
            // wildcard labels: 
            retval.tree = root_0;
            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

            root_0 = (CommonTree)adaptor.nil();
            // 70:9: -> ^( DOCUMENT ( base )? ( prefix )* ( importDecl )* ( group )? )
            {
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:70:12: ^( DOCUMENT ( base )? ( prefix )* ( importDecl )* ( group )? )
                {
                CommonTree root_1 = (CommonTree)adaptor.nil();
                root_1 = (CommonTree)adaptor.becomeRoot(
                stream_DOCUMENT.nextNode()
                , root_1);

                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:70:23: ( base )?
                if ( stream_base.hasNext() ) {
                    adaptor.addChild(root_1, stream_base.nextTree());

                }
                stream_base.reset();

                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:70:29: ( prefix )*
                while ( stream_prefix.hasNext() ) {
                    adaptor.addChild(root_1, stream_prefix.nextTree());

                }
                stream_prefix.reset();

                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:70:37: ( importDecl )*
                while ( stream_importDecl.hasNext() ) {
                    adaptor.addChild(root_1, stream_importDecl.nextTree());

                }
                stream_importDecl.reset();

                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:70:49: ( group )?
                if ( stream_group.hasNext() ) {
                    adaptor.addChild(root_1, stream_group.nextTree());

                }
                stream_group.reset();

                adaptor.addChild(root_0, root_1);
                }

            }


            retval.tree = root_0;

            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "document"


    public static class base_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "base"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:73:1: base : BASE LPAR IRI_REF RPAR -> ^( BASE IRI_REF ) ;
    public final PSOARuleMLPSParser.base_return base() throws RecognitionException {
        PSOARuleMLPSParser.base_return retval = new PSOARuleMLPSParser.base_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token BASE11=null;
        Token LPAR12=null;
        Token IRI_REF13=null;
        Token RPAR14=null;

        CommonTree BASE11_tree=null;
        CommonTree LPAR12_tree=null;
        CommonTree IRI_REF13_tree=null;
        CommonTree RPAR14_tree=null;
        RewriteRuleTokenStream stream_BASE=new RewriteRuleTokenStream(adaptor,"token BASE");
        RewriteRuleTokenStream stream_IRI_REF=new RewriteRuleTokenStream(adaptor,"token IRI_REF");
        RewriteRuleTokenStream stream_RPAR=new RewriteRuleTokenStream(adaptor,"token RPAR");
        RewriteRuleTokenStream stream_LPAR=new RewriteRuleTokenStream(adaptor,"token LPAR");

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:74:5: ( BASE LPAR IRI_REF RPAR -> ^( BASE IRI_REF ) )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:74:9: BASE LPAR IRI_REF RPAR
            {
            BASE11=(Token)match(input,BASE,FOLLOW_BASE_in_base258);  
            stream_BASE.add(BASE11);


            LPAR12=(Token)match(input,LPAR,FOLLOW_LPAR_in_base260);  
            stream_LPAR.add(LPAR12);


            IRI_REF13=(Token)match(input,IRI_REF,FOLLOW_IRI_REF_in_base262);  
            stream_IRI_REF.add(IRI_REF13);


            RPAR14=(Token)match(input,RPAR,FOLLOW_RPAR_in_base264);  
            stream_RPAR.add(RPAR14);


            // AST REWRITE
            // elements: BASE, IRI_REF
            // token labels: 
            // rule labels: retval
            // token list labels: 
            // rule list labels: 
            // wildcard labels: 
            retval.tree = root_0;
            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

            root_0 = (CommonTree)adaptor.nil();
            // 74:32: -> ^( BASE IRI_REF )
            {
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:74:35: ^( BASE IRI_REF )
                {
                CommonTree root_1 = (CommonTree)adaptor.nil();
                root_1 = (CommonTree)adaptor.becomeRoot(
                stream_BASE.nextNode()
                , root_1);

                adaptor.addChild(root_1, 
                stream_IRI_REF.nextNode()
                );

                adaptor.addChild(root_0, root_1);
                }

            }


            retval.tree = root_0;

            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "base"


    public static class prefix_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "prefix"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:77:1: prefix : PREFIX LPAR ID IRI_REF RPAR -> ^( PREFIX ID IRI_REF ) ;
    public final PSOARuleMLPSParser.prefix_return prefix() throws RecognitionException {
        PSOARuleMLPSParser.prefix_return retval = new PSOARuleMLPSParser.prefix_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token PREFIX15=null;
        Token LPAR16=null;
        Token ID17=null;
        Token IRI_REF18=null;
        Token RPAR19=null;

        CommonTree PREFIX15_tree=null;
        CommonTree LPAR16_tree=null;
        CommonTree ID17_tree=null;
        CommonTree IRI_REF18_tree=null;
        CommonTree RPAR19_tree=null;
        RewriteRuleTokenStream stream_PREFIX=new RewriteRuleTokenStream(adaptor,"token PREFIX");
        RewriteRuleTokenStream stream_IRI_REF=new RewriteRuleTokenStream(adaptor,"token IRI_REF");
        RewriteRuleTokenStream stream_RPAR=new RewriteRuleTokenStream(adaptor,"token RPAR");
        RewriteRuleTokenStream stream_LPAR=new RewriteRuleTokenStream(adaptor,"token LPAR");
        RewriteRuleTokenStream stream_ID=new RewriteRuleTokenStream(adaptor,"token ID");

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:78:5: ( PREFIX LPAR ID IRI_REF RPAR -> ^( PREFIX ID IRI_REF ) )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:78:9: PREFIX LPAR ID IRI_REF RPAR
            {
            PREFIX15=(Token)match(input,PREFIX,FOLLOW_PREFIX_in_prefix291);  
            stream_PREFIX.add(PREFIX15);


            LPAR16=(Token)match(input,LPAR,FOLLOW_LPAR_in_prefix293);  
            stream_LPAR.add(LPAR16);


            ID17=(Token)match(input,ID,FOLLOW_ID_in_prefix295);  
            stream_ID.add(ID17);


            IRI_REF18=(Token)match(input,IRI_REF,FOLLOW_IRI_REF_in_prefix297);  
            stream_IRI_REF.add(IRI_REF18);


            RPAR19=(Token)match(input,RPAR,FOLLOW_RPAR_in_prefix299);  
            stream_RPAR.add(RPAR19);


            // AST REWRITE
            // elements: PREFIX, IRI_REF, ID
            // token labels: 
            // rule labels: retval
            // token list labels: 
            // rule list labels: 
            // wildcard labels: 
            retval.tree = root_0;
            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

            root_0 = (CommonTree)adaptor.nil();
            // 78:37: -> ^( PREFIX ID IRI_REF )
            {
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:78:40: ^( PREFIX ID IRI_REF )
                {
                CommonTree root_1 = (CommonTree)adaptor.nil();
                root_1 = (CommonTree)adaptor.becomeRoot(
                stream_PREFIX.nextNode()
                , root_1);

                adaptor.addChild(root_1, 
                stream_ID.nextNode()
                );

                adaptor.addChild(root_1, 
                stream_IRI_REF.nextNode()
                );

                adaptor.addChild(root_0, root_1);
                }

            }


            retval.tree = root_0;

            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "prefix"


    public static class importDecl_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "importDecl"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:81:1: importDecl : IMPORT LPAR kb= IRI_REF (pf= IRI_REF )? RPAR -> ^( IMPORT $kb ( $pf)? ) ;
    public final PSOARuleMLPSParser.importDecl_return importDecl() throws RecognitionException {
        PSOARuleMLPSParser.importDecl_return retval = new PSOARuleMLPSParser.importDecl_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token kb=null;
        Token pf=null;
        Token IMPORT20=null;
        Token LPAR21=null;
        Token RPAR22=null;

        CommonTree kb_tree=null;
        CommonTree pf_tree=null;
        CommonTree IMPORT20_tree=null;
        CommonTree LPAR21_tree=null;
        CommonTree RPAR22_tree=null;
        RewriteRuleTokenStream stream_IRI_REF=new RewriteRuleTokenStream(adaptor,"token IRI_REF");
        RewriteRuleTokenStream stream_IMPORT=new RewriteRuleTokenStream(adaptor,"token IMPORT");
        RewriteRuleTokenStream stream_RPAR=new RewriteRuleTokenStream(adaptor,"token RPAR");
        RewriteRuleTokenStream stream_LPAR=new RewriteRuleTokenStream(adaptor,"token LPAR");

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:82:5: ( IMPORT LPAR kb= IRI_REF (pf= IRI_REF )? RPAR -> ^( IMPORT $kb ( $pf)? ) )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:82:9: IMPORT LPAR kb= IRI_REF (pf= IRI_REF )? RPAR
            {
            IMPORT20=(Token)match(input,IMPORT,FOLLOW_IMPORT_in_importDecl328);  
            stream_IMPORT.add(IMPORT20);


            LPAR21=(Token)match(input,LPAR,FOLLOW_LPAR_in_importDecl330);  
            stream_LPAR.add(LPAR21);


            kb=(Token)match(input,IRI_REF,FOLLOW_IRI_REF_in_importDecl334);  
            stream_IRI_REF.add(kb);


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:82:32: (pf= IRI_REF )?
            int alt6=2;
            switch ( input.LA(1) ) {
                case IRI_REF:
                    {
                    alt6=1;
                    }
                    break;
            }

            switch (alt6) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:82:33: pf= IRI_REF
                    {
                    pf=(Token)match(input,IRI_REF,FOLLOW_IRI_REF_in_importDecl339);  
                    stream_IRI_REF.add(pf);


                    }
                    break;

            }


            RPAR22=(Token)match(input,RPAR,FOLLOW_RPAR_in_importDecl343);  
            stream_RPAR.add(RPAR22);


            // AST REWRITE
            // elements: IMPORT, kb, pf
            // token labels: pf, kb
            // rule labels: retval
            // token list labels: 
            // rule list labels: 
            // wildcard labels: 
            retval.tree = root_0;
            RewriteRuleTokenStream stream_pf=new RewriteRuleTokenStream(adaptor,"token pf",pf);
            RewriteRuleTokenStream stream_kb=new RewriteRuleTokenStream(adaptor,"token kb",kb);
            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

            root_0 = (CommonTree)adaptor.nil();
            // 82:51: -> ^( IMPORT $kb ( $pf)? )
            {
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:82:54: ^( IMPORT $kb ( $pf)? )
                {
                CommonTree root_1 = (CommonTree)adaptor.nil();
                root_1 = (CommonTree)adaptor.becomeRoot(
                stream_IMPORT.nextNode()
                , root_1);

                adaptor.addChild(root_1, stream_kb.nextNode());

                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:82:68: ( $pf)?
                if ( stream_pf.hasNext() ) {
                    adaptor.addChild(root_1, stream_pf.nextNode());

                }
                stream_pf.reset();

                adaptor.addChild(root_0, root_1);
                }

            }


            retval.tree = root_0;

            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "importDecl"


    public static class group_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "group"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:85:1: group : GROUP LPAR ( group_element )* RPAR -> ^( GROUP ( group_element )* ) ;
    public final PSOARuleMLPSParser.group_return group() throws RecognitionException {
        PSOARuleMLPSParser.group_return retval = new PSOARuleMLPSParser.group_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token GROUP23=null;
        Token LPAR24=null;
        Token RPAR26=null;
        PSOARuleMLPSParser.group_element_return group_element25 =null;


        CommonTree GROUP23_tree=null;
        CommonTree LPAR24_tree=null;
        CommonTree RPAR26_tree=null;
        RewriteRuleTokenStream stream_GROUP=new RewriteRuleTokenStream(adaptor,"token GROUP");
        RewriteRuleTokenStream stream_RPAR=new RewriteRuleTokenStream(adaptor,"token RPAR");
        RewriteRuleTokenStream stream_LPAR=new RewriteRuleTokenStream(adaptor,"token LPAR");
        RewriteRuleSubtreeStream stream_group_element=new RewriteRuleSubtreeStream(adaptor,"rule group_element");
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:86:5: ( GROUP LPAR ( group_element )* RPAR -> ^( GROUP ( group_element )* ) )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:86:9: GROUP LPAR ( group_element )* RPAR
            {
            GROUP23=(Token)match(input,GROUP,FOLLOW_GROUP_in_group375);  
            stream_GROUP.add(GROUP23);


            LPAR24=(Token)match(input,LPAR,FOLLOW_LPAR_in_group377);  
            stream_LPAR.add(LPAR24);


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:86:20: ( group_element )*
            loop7:
            do {
                int alt7=2;
                switch ( input.LA(1) ) {
                case AND:
                case CURIE:
                case EXISTS:
                case EXTERNAL:
                case FORALL:
                case GROUP:
                case ID:
                case IRI_REF:
                case NUMBER:
                case OR:
                case STRING:
                case TOP:
                case VAR_ID:
                    {
                    alt7=1;
                    }
                    break;

                }

                switch (alt7) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:86:20: group_element
            	    {
            	    pushFollow(FOLLOW_group_element_in_group379);
            	    group_element25=group_element();

            	    state._fsp--;

            	    stream_group_element.add(group_element25.getTree());

            	    }
            	    break;

            	default :
            	    break loop7;
                }
            } while (true);


            RPAR26=(Token)match(input,RPAR,FOLLOW_RPAR_in_group382);  
            stream_RPAR.add(RPAR26);


            // AST REWRITE
            // elements: GROUP, group_element
            // token labels: 
            // rule labels: retval
            // token list labels: 
            // rule list labels: 
            // wildcard labels: 
            retval.tree = root_0;
            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

            root_0 = (CommonTree)adaptor.nil();
            // 86:40: -> ^( GROUP ( group_element )* )
            {
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:86:43: ^( GROUP ( group_element )* )
                {
                CommonTree root_1 = (CommonTree)adaptor.nil();
                root_1 = (CommonTree)adaptor.becomeRoot(
                stream_GROUP.nextNode()
                , root_1);

                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:86:51: ( group_element )*
                while ( stream_group_element.hasNext() ) {
                    adaptor.addChild(root_1, stream_group_element.nextTree());

                }
                stream_group_element.reset();

                adaptor.addChild(root_0, root_1);
                }

            }


            retval.tree = root_0;

            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "group"


    public static class group_element_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "group_element"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:89:1: group_element : ( rule | group );
    public final PSOARuleMLPSParser.group_element_return group_element() throws RecognitionException {
        PSOARuleMLPSParser.group_element_return retval = new PSOARuleMLPSParser.group_element_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        PSOARuleMLPSParser.rule_return rule27 =null;

        PSOARuleMLPSParser.group_return group28 =null;



        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:90:5: ( rule | group )
            int alt8=2;
            switch ( input.LA(1) ) {
            case AND:
            case CURIE:
            case EXISTS:
            case EXTERNAL:
            case FORALL:
            case ID:
            case IRI_REF:
            case NUMBER:
            case OR:
            case STRING:
            case TOP:
            case VAR_ID:
                {
                alt8=1;
                }
                break;
            case GROUP:
                {
                alt8=2;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 8, 0, input);

                throw nvae;

            }

            switch (alt8) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:90:9: rule
                    {
                    root_0 = (CommonTree)adaptor.nil();


                    pushFollow(FOLLOW_rule_in_group_element410);
                    rule27=rule();

                    state._fsp--;

                    adaptor.addChild(root_0, rule27.getTree());

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:91:9: group
                    {
                    root_0 = (CommonTree)adaptor.nil();


                    pushFollow(FOLLOW_group_in_group_element420);
                    group28=group();

                    state._fsp--;

                    adaptor.addChild(root_0, group28.getTree());

                    }
                    break;

            }
            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "group_element"


    public static class rule_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "rule"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:94:1: rule : ( FORALL ( variable )+ LPAR clause RPAR -> ^( FORALL ( variable )+ clause ) | clause );
    public final PSOARuleMLPSParser.rule_return rule() throws RecognitionException {
        PSOARuleMLPSParser.rule_return retval = new PSOARuleMLPSParser.rule_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token FORALL29=null;
        Token LPAR31=null;
        Token RPAR33=null;
        PSOARuleMLPSParser.variable_return variable30 =null;

        PSOARuleMLPSParser.clause_return clause32 =null;

        PSOARuleMLPSParser.clause_return clause34 =null;


        CommonTree FORALL29_tree=null;
        CommonTree LPAR31_tree=null;
        CommonTree RPAR33_tree=null;
        RewriteRuleTokenStream stream_FORALL=new RewriteRuleTokenStream(adaptor,"token FORALL");
        RewriteRuleTokenStream stream_RPAR=new RewriteRuleTokenStream(adaptor,"token RPAR");
        RewriteRuleTokenStream stream_LPAR=new RewriteRuleTokenStream(adaptor,"token LPAR");
        RewriteRuleSubtreeStream stream_variable=new RewriteRuleSubtreeStream(adaptor,"rule variable");
        RewriteRuleSubtreeStream stream_clause=new RewriteRuleSubtreeStream(adaptor,"rule clause");
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:95:5: ( FORALL ( variable )+ LPAR clause RPAR -> ^( FORALL ( variable )+ clause ) | clause )
            int alt10=2;
            switch ( input.LA(1) ) {
            case FORALL:
                {
                alt10=1;
                }
                break;
            case AND:
            case CURIE:
            case EXISTS:
            case EXTERNAL:
            case ID:
            case IRI_REF:
            case NUMBER:
            case OR:
            case STRING:
            case TOP:
            case VAR_ID:
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
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:95:9: FORALL ( variable )+ LPAR clause RPAR
                    {
                    FORALL29=(Token)match(input,FORALL,FOLLOW_FORALL_in_rule439);  
                    stream_FORALL.add(FORALL29);


                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:95:16: ( variable )+
                    int cnt9=0;
                    loop9:
                    do {
                        int alt9=2;
                        switch ( input.LA(1) ) {
                        case VAR_ID:
                            {
                            alt9=1;
                            }
                            break;

                        }

                        switch (alt9) {
                    	case 1 :
                    	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:95:16: variable
                    	    {
                    	    pushFollow(FOLLOW_variable_in_rule441);
                    	    variable30=variable();

                    	    state._fsp--;

                    	    stream_variable.add(variable30.getTree());

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


                    LPAR31=(Token)match(input,LPAR,FOLLOW_LPAR_in_rule444);  
                    stream_LPAR.add(LPAR31);


                    pushFollow(FOLLOW_clause_in_rule446);
                    clause32=clause();

                    state._fsp--;

                    stream_clause.add(clause32.getTree());

                    RPAR33=(Token)match(input,RPAR,FOLLOW_RPAR_in_rule448);  
                    stream_RPAR.add(RPAR33);


                    // AST REWRITE
                    // elements: clause, variable, FORALL
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 96:9: -> ^( FORALL ( variable )+ clause )
                    {
                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:96:12: ^( FORALL ( variable )+ clause )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(
                        stream_FORALL.nextNode()
                        , root_1);

                        if ( !(stream_variable.hasNext()) ) {
                            throw new RewriteEarlyExitException();
                        }
                        while ( stream_variable.hasNext() ) {
                            adaptor.addChild(root_1, stream_variable.nextTree());

                        }
                        stream_variable.reset();

                        adaptor.addChild(root_1, stream_clause.nextTree());

                        adaptor.addChild(root_0, root_1);
                        }

                    }


                    retval.tree = root_0;

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:97:9: clause
                    {
                    root_0 = (CommonTree)adaptor.nil();


                    pushFollow(FOLLOW_clause_in_rule477);
                    clause34=clause();

                    state._fsp--;

                    adaptor.addChild(root_0, clause34.getTree());

                    }
                    break;

            }
            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "rule"


    public static class clause_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "clause"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:100:1: clause : (f1= formula -> formula ) ( IMPLICATION f2= formula -> ^( IMPLICATION $clause $f2) )? ;
    public final PSOARuleMLPSParser.clause_return clause() throws RecognitionException {
        PSOARuleMLPSParser.clause_return retval = new PSOARuleMLPSParser.clause_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token IMPLICATION35=null;
        PSOARuleMLPSParser.formula_return f1 =null;

        PSOARuleMLPSParser.formula_return f2 =null;


        CommonTree IMPLICATION35_tree=null;
        RewriteRuleTokenStream stream_IMPLICATION=new RewriteRuleTokenStream(adaptor,"token IMPLICATION");
        RewriteRuleSubtreeStream stream_formula=new RewriteRuleSubtreeStream(adaptor,"rule formula");
         boolean isRule = false; 
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:114:5: ( (f1= formula -> formula ) ( IMPLICATION f2= formula -> ^( IMPLICATION $clause $f2) )? )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:114:9: (f1= formula -> formula ) ( IMPLICATION f2= formula -> ^( IMPLICATION $clause $f2) )?
            {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:114:9: (f1= formula -> formula )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:114:10: f1= formula
            {
            pushFollow(FOLLOW_formula_in_clause513);
            f1=formula();

            state._fsp--;

            stream_formula.add(f1.getTree());

            // AST REWRITE
            // elements: formula
            // token labels: 
            // rule labels: retval
            // token list labels: 
            // rule list labels: 
            // wildcard labels: 
            retval.tree = root_0;
            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

            root_0 = (CommonTree)adaptor.nil();
            // 114:21: -> formula
            {
                adaptor.addChild(root_0, stream_formula.nextTree());

            }


            retval.tree = root_0;

            }


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:114:33: ( IMPLICATION f2= formula -> ^( IMPLICATION $clause $f2) )?
            int alt11=2;
            switch ( input.LA(1) ) {
                case IMPLICATION:
                    {
                    alt11=1;
                    }
                    break;
            }

            switch (alt11) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:114:35: IMPLICATION f2= formula
                    {
                    IMPLICATION35=(Token)match(input,IMPLICATION,FOLLOW_IMPLICATION_in_clause522);  
                    stream_IMPLICATION.add(IMPLICATION35);


                    pushFollow(FOLLOW_formula_in_clause526);
                    f2=formula();

                    state._fsp--;

                    stream_formula.add(f2.getTree());

                     isRule = true; 

                    // AST REWRITE
                    // elements: f2, clause, IMPLICATION
                    // token labels: 
                    // rule labels: retval, f2
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);
                    RewriteRuleSubtreeStream stream_f2=new RewriteRuleSubtreeStream(adaptor,"rule f2",f2!=null?f2.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 114:77: -> ^( IMPLICATION $clause $f2)
                    {
                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:114:80: ^( IMPLICATION $clause $f2)
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(
                        stream_IMPLICATION.nextNode()
                        , root_1);

                        adaptor.addChild(root_1, stream_retval.nextTree());

                        adaptor.addChild(root_1, stream_f2.nextTree());

                        adaptor.addChild(root_0, root_1);
                        }

                    }


                    retval.tree = root_0;

                    }
                    break;

            }


            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);


                    if (isRule)
                    {
                        if (!(f1!=null?f1.isValidHead:false))
                            throw new RuntimeException("Unacceptable head formula:" + (f1!=null?input.toString(f1.start,f1.stop):null));
                    }
                    else if (!(f1!=null?f1.isAtomic:false))
                    {
                        throw new RuntimeException("Unacceptable clause:" + input.toString(retval.start,input.LT(-1)));
                    }
                
        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "clause"


    public static class formula_return extends ParserRuleReturnScope {
        public boolean isValidHead;
        public boolean isAtomic;
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "formula"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:119:1: formula returns [boolean isValidHead, boolean isAtomic] : ( AND LPAR (f= formula )+ RPAR -> ^( AND ( formula )* ) | OR LPAR ( formula )+ RPAR -> ^( OR ( formula )* ) | EXISTS ( variable )+ LPAR f= formula RPAR -> ^( EXISTS ( variable )+ $f) | atomic -> atomic | ( external_term -> external_term ) ( psoa_rest -> ^( PSOA $formula psoa_rest ) )? );
    public final PSOARuleMLPSParser.formula_return formula() throws RecognitionException {
        PSOARuleMLPSParser.formula_return retval = new PSOARuleMLPSParser.formula_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token AND36=null;
        Token LPAR37=null;
        Token RPAR38=null;
        Token OR39=null;
        Token LPAR40=null;
        Token RPAR42=null;
        Token EXISTS43=null;
        Token LPAR45=null;
        Token RPAR46=null;
        PSOARuleMLPSParser.formula_return f =null;

        PSOARuleMLPSParser.formula_return formula41 =null;

        PSOARuleMLPSParser.variable_return variable44 =null;

        PSOARuleMLPSParser.atomic_return atomic47 =null;

        PSOARuleMLPSParser.external_term_return external_term48 =null;

        PSOARuleMLPSParser.psoa_rest_return psoa_rest49 =null;


        CommonTree AND36_tree=null;
        CommonTree LPAR37_tree=null;
        CommonTree RPAR38_tree=null;
        CommonTree OR39_tree=null;
        CommonTree LPAR40_tree=null;
        CommonTree RPAR42_tree=null;
        CommonTree EXISTS43_tree=null;
        CommonTree LPAR45_tree=null;
        CommonTree RPAR46_tree=null;
        RewriteRuleTokenStream stream_RPAR=new RewriteRuleTokenStream(adaptor,"token RPAR");
        RewriteRuleTokenStream stream_EXISTS=new RewriteRuleTokenStream(adaptor,"token EXISTS");
        RewriteRuleTokenStream stream_LPAR=new RewriteRuleTokenStream(adaptor,"token LPAR");
        RewriteRuleTokenStream stream_AND=new RewriteRuleTokenStream(adaptor,"token AND");
        RewriteRuleTokenStream stream_OR=new RewriteRuleTokenStream(adaptor,"token OR");
        RewriteRuleSubtreeStream stream_external_term=new RewriteRuleSubtreeStream(adaptor,"rule external_term");
        RewriteRuleSubtreeStream stream_psoa_rest=new RewriteRuleSubtreeStream(adaptor,"rule psoa_rest");
        RewriteRuleSubtreeStream stream_variable=new RewriteRuleSubtreeStream(adaptor,"rule variable");
        RewriteRuleSubtreeStream stream_atomic=new RewriteRuleSubtreeStream(adaptor,"rule atomic");
        RewriteRuleSubtreeStream stream_formula=new RewriteRuleSubtreeStream(adaptor,"rule formula");
         retval.isValidHead = true; retval.isAtomic = false; 
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:121:5: ( AND LPAR (f= formula )+ RPAR -> ^( AND ( formula )* ) | OR LPAR ( formula )+ RPAR -> ^( OR ( formula )* ) | EXISTS ( variable )+ LPAR f= formula RPAR -> ^( EXISTS ( variable )+ $f) | atomic -> atomic | ( external_term -> external_term ) ( psoa_rest -> ^( PSOA $formula psoa_rest ) )? )
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
            case CURIE:
            case ID:
            case IRI_REF:
            case NUMBER:
            case STRING:
            case TOP:
            case VAR_ID:
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
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:121:9: AND LPAR (f= formula )+ RPAR
                    {
                    AND36=(Token)match(input,AND,FOLLOW_AND_in_formula581);  
                    stream_AND.add(AND36);


                    LPAR37=(Token)match(input,LPAR,FOLLOW_LPAR_in_formula583);  
                    stream_LPAR.add(LPAR37);


                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:121:18: (f= formula )+
                    int cnt12=0;
                    loop12:
                    do {
                        int alt12=2;
                        switch ( input.LA(1) ) {
                        case AND:
                        case CURIE:
                        case EXISTS:
                        case EXTERNAL:
                        case ID:
                        case IRI_REF:
                        case NUMBER:
                        case OR:
                        case STRING:
                        case TOP:
                        case VAR_ID:
                            {
                            alt12=1;
                            }
                            break;

                        }

                        switch (alt12) {
                    	case 1 :
                    	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:121:19: f= formula
                    	    {
                    	    pushFollow(FOLLOW_formula_in_formula588);
                    	    f=formula();

                    	    state._fsp--;

                    	    stream_formula.add(f.getTree());

                    	     if(!(f!=null?f.isValidHead:false)) retval.isValidHead = false; 

                    	    }
                    	    break;

                    	default :
                    	    if ( cnt12 >= 1 ) break loop12;
                                EarlyExitException eee =
                                    new EarlyExitException(12, input);
                                throw eee;
                        }
                        cnt12++;
                    } while (true);


                    RPAR38=(Token)match(input,RPAR,FOLLOW_RPAR_in_formula595);  
                    stream_RPAR.add(RPAR38);


                    // AST REWRITE
                    // elements: formula, AND
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 121:83: -> ^( AND ( formula )* )
                    {
                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:121:86: ^( AND ( formula )* )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(
                        stream_AND.nextNode()
                        , root_1);

                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:121:92: ( formula )*
                        while ( stream_formula.hasNext() ) {
                            adaptor.addChild(root_1, stream_formula.nextTree());

                        }
                        stream_formula.reset();

                        adaptor.addChild(root_0, root_1);
                        }

                    }


                    retval.tree = root_0;

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:122:9: OR LPAR ( formula )+ RPAR
                    {
                    OR39=(Token)match(input,OR,FOLLOW_OR_in_formula614);  
                    stream_OR.add(OR39);


                    LPAR40=(Token)match(input,LPAR,FOLLOW_LPAR_in_formula616);  
                    stream_LPAR.add(LPAR40);


                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:122:17: ( formula )+
                    int cnt13=0;
                    loop13:
                    do {
                        int alt13=2;
                        switch ( input.LA(1) ) {
                        case AND:
                        case CURIE:
                        case EXISTS:
                        case EXTERNAL:
                        case ID:
                        case IRI_REF:
                        case NUMBER:
                        case OR:
                        case STRING:
                        case TOP:
                        case VAR_ID:
                            {
                            alt13=1;
                            }
                            break;

                        }

                        switch (alt13) {
                    	case 1 :
                    	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:122:17: formula
                    	    {
                    	    pushFollow(FOLLOW_formula_in_formula618);
                    	    formula41=formula();

                    	    state._fsp--;

                    	    stream_formula.add(formula41.getTree());

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


                    RPAR42=(Token)match(input,RPAR,FOLLOW_RPAR_in_formula621);  
                    stream_RPAR.add(RPAR42);


                     retval.isValidHead = false; 

                    // AST REWRITE
                    // elements: OR, formula
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 122:57: -> ^( OR ( formula )* )
                    {
                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:122:60: ^( OR ( formula )* )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(
                        stream_OR.nextNode()
                        , root_1);

                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:122:65: ( formula )*
                        while ( stream_formula.hasNext() ) {
                            adaptor.addChild(root_1, stream_formula.nextTree());

                        }
                        stream_formula.reset();

                        adaptor.addChild(root_0, root_1);
                        }

                    }


                    retval.tree = root_0;

                    }
                    break;
                case 3 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:123:9: EXISTS ( variable )+ LPAR f= formula RPAR
                    {
                    EXISTS43=(Token)match(input,EXISTS,FOLLOW_EXISTS_in_formula642);  
                    stream_EXISTS.add(EXISTS43);


                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:123:16: ( variable )+
                    int cnt14=0;
                    loop14:
                    do {
                        int alt14=2;
                        switch ( input.LA(1) ) {
                        case VAR_ID:
                            {
                            alt14=1;
                            }
                            break;

                        }

                        switch (alt14) {
                    	case 1 :
                    	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:123:16: variable
                    	    {
                    	    pushFollow(FOLLOW_variable_in_formula644);
                    	    variable44=variable();

                    	    state._fsp--;

                    	    stream_variable.add(variable44.getTree());

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


                    LPAR45=(Token)match(input,LPAR,FOLLOW_LPAR_in_formula647);  
                    stream_LPAR.add(LPAR45);


                    pushFollow(FOLLOW_formula_in_formula651);
                    f=formula();

                    state._fsp--;

                    stream_formula.add(f.getTree());

                    RPAR46=(Token)match(input,RPAR,FOLLOW_RPAR_in_formula653);  
                    stream_RPAR.add(RPAR46);


                     retval.isValidHead = (f!=null?f.isAtomic:false); 

                    // AST REWRITE
                    // elements: EXISTS, f, variable
                    // token labels: 
                    // rule labels: f, retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_f=new RewriteRuleSubtreeStream(adaptor,"rule f",f!=null?f.tree:null);
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 124:9: -> ^( EXISTS ( variable )+ $f)
                    {
                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:124:12: ^( EXISTS ( variable )+ $f)
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(
                        stream_EXISTS.nextNode()
                        , root_1);

                        if ( !(stream_variable.hasNext()) ) {
                            throw new RewriteEarlyExitException();
                        }
                        while ( stream_variable.hasNext() ) {
                            adaptor.addChild(root_1, stream_variable.nextTree());

                        }
                        stream_variable.reset();

                        adaptor.addChild(root_1, stream_f.nextTree());

                        adaptor.addChild(root_0, root_1);
                        }

                    }


                    retval.tree = root_0;

                    }
                    break;
                case 4 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:125:9: atomic
                    {
                    pushFollow(FOLLOW_atomic_in_formula685);
                    atomic47=atomic();

                    state._fsp--;

                    stream_atomic.add(atomic47.getTree());

                     retval.isAtomic = true; 

                    // AST REWRITE
                    // elements: atomic
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 125:38: -> atomic
                    {
                        adaptor.addChild(root_0, stream_atomic.nextTree());

                    }


                    retval.tree = root_0;

                    }
                    break;
                case 5 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:126:9: ( external_term -> external_term ) ( psoa_rest -> ^( PSOA $formula psoa_rest ) )?
                    {
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:126:9: ( external_term -> external_term )
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:126:10: external_term
                    {
                    pushFollow(FOLLOW_external_term_in_formula702);
                    external_term48=external_term();

                    state._fsp--;

                    stream_external_term.add(external_term48.getTree());

                     retval.isValidHead = false; 

                    // AST REWRITE
                    // elements: external_term
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 126:50: -> external_term
                    {
                        adaptor.addChild(root_0, stream_external_term.nextTree());

                    }


                    retval.tree = root_0;

                    }


                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:127:9: ( psoa_rest -> ^( PSOA $formula psoa_rest ) )?
                    int alt15=2;
                    switch ( input.LA(1) ) {
                        case INSTANCE:
                            {
                            alt15=1;
                            }
                            break;
                    }

                    switch (alt15) {
                        case 1 :
                            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:127:10: psoa_rest
                            {
                            pushFollow(FOLLOW_psoa_rest_in_formula720);
                            psoa_rest49=psoa_rest();

                            state._fsp--;

                            stream_psoa_rest.add(psoa_rest49.getTree());

                             retval.isAtomic = true; 

                            // AST REWRITE
                            // elements: psoa_rest, formula
                            // token labels: 
                            // rule labels: retval
                            // token list labels: 
                            // rule list labels: 
                            // wildcard labels: 
                            retval.tree = root_0;
                            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                            root_0 = (CommonTree)adaptor.nil();
                            // 127:42: -> ^( PSOA $formula psoa_rest )
                            {
                                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:127:45: ^( PSOA $formula psoa_rest )
                                {
                                CommonTree root_1 = (CommonTree)adaptor.nil();
                                root_1 = (CommonTree)adaptor.becomeRoot(
                                (CommonTree)adaptor.create(PSOA, "PSOA")
                                , root_1);

                                adaptor.addChild(root_1, stream_retval.nextTree());

                                adaptor.addChild(root_1, stream_psoa_rest.nextTree());

                                adaptor.addChild(root_0, root_1);
                                }

                            }


                            retval.tree = root_0;

                            }
                            break;

                    }


                    }
                    break;

            }
            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "formula"


    public static class atomic_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "atomic"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:130:1: atomic : non_ex_term= internal_term ( ( EQUAL | SUBCLASS ) ^ term )? ;
    public final PSOARuleMLPSParser.atomic_return atomic() throws RecognitionException {
        PSOARuleMLPSParser.atomic_return retval = new PSOARuleMLPSParser.atomic_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token set50=null;
        PSOARuleMLPSParser.internal_term_return non_ex_term =null;

        PSOARuleMLPSParser.term_return term51 =null;


        CommonTree set50_tree=null;

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:136:5: (non_ex_term= internal_term ( ( EQUAL | SUBCLASS ) ^ term )? )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:136:9: non_ex_term= internal_term ( ( EQUAL | SUBCLASS ) ^ term )?
            {
            root_0 = (CommonTree)adaptor.nil();


            pushFollow(FOLLOW_internal_term_in_atomic765);
            non_ex_term=internal_term();

            state._fsp--;

            adaptor.addChild(root_0, non_ex_term.getTree());

            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:136:35: ( ( EQUAL | SUBCLASS ) ^ term )?
            int alt17=2;
            switch ( input.LA(1) ) {
                case EQUAL:
                case SUBCLASS:
                    {
                    alt17=1;
                    }
                    break;
            }

            switch (alt17) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:136:36: ( EQUAL | SUBCLASS ) ^ term
                    {
                    set50=(Token)input.LT(1);

                    set50=(Token)input.LT(1);

                    if ( input.LA(1)==EQUAL||input.LA(1)==SUBCLASS ) {
                        input.consume();
                        root_0 = (CommonTree)adaptor.becomeRoot(
                        (CommonTree)adaptor.create(set50)
                        , root_0);
                        state.errorRecovery=false;
                    }
                    else {
                        MismatchedSetException mse = new MismatchedSetException(null,input);
                        throw mse;
                    }


                    pushFollow(FOLLOW_term_in_atomic777);
                    term51=term();

                    state._fsp--;

                    adaptor.addChild(root_0, term51.getTree());

                    }
                    break;

            }


            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);


                if (((CommonTree)retval.tree).getChildCount() == 1 && (non_ex_term!=null?non_ex_term.isSimple:false))
                    throw new RuntimeException("Simple term cannot be an atomic formula:" + (non_ex_term!=null?input.toString(non_ex_term.start,non_ex_term.stop):null));

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "atomic"


    public static class term_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "term"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:139:1: term : ( internal_term -> internal_term | external_term -> external_term );
    public final PSOARuleMLPSParser.term_return term() throws RecognitionException {
        PSOARuleMLPSParser.term_return retval = new PSOARuleMLPSParser.term_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        PSOARuleMLPSParser.internal_term_return internal_term52 =null;

        PSOARuleMLPSParser.external_term_return external_term53 =null;


        RewriteRuleSubtreeStream stream_internal_term=new RewriteRuleSubtreeStream(adaptor,"rule internal_term");
        RewriteRuleSubtreeStream stream_external_term=new RewriteRuleSubtreeStream(adaptor,"rule external_term");
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:140:5: ( internal_term -> internal_term | external_term -> external_term )
            int alt18=2;
            switch ( input.LA(1) ) {
            case CURIE:
            case ID:
            case IRI_REF:
            case NUMBER:
            case STRING:
            case TOP:
            case VAR_ID:
                {
                alt18=1;
                }
                break;
            case EXTERNAL:
                {
                alt18=2;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 18, 0, input);

                throw nvae;

            }

            switch (alt18) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:140:9: internal_term
                    {
                    pushFollow(FOLLOW_internal_term_in_term798);
                    internal_term52=internal_term();

                    state._fsp--;

                    stream_internal_term.add(internal_term52.getTree());

                    // AST REWRITE
                    // elements: internal_term
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 140:23: -> internal_term
                    {
                        adaptor.addChild(root_0, stream_internal_term.nextTree());

                    }


                    retval.tree = root_0;

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:141:9: external_term
                    {
                    pushFollow(FOLLOW_external_term_in_term812);
                    external_term53=external_term();

                    state._fsp--;

                    stream_external_term.add(external_term53.getTree());

                    // AST REWRITE
                    // elements: external_term
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 141:23: -> external_term
                    {
                        adaptor.addChild(root_0, stream_external_term.nextTree());

                    }


                    retval.tree = root_0;

                    }
                    break;

            }
            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "term"


    public static class simple_term_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "simple_term"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:144:1: simple_term : ( constant | variable );
    public final PSOARuleMLPSParser.simple_term_return simple_term() throws RecognitionException {
        PSOARuleMLPSParser.simple_term_return retval = new PSOARuleMLPSParser.simple_term_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        PSOARuleMLPSParser.constant_return constant54 =null;

        PSOARuleMLPSParser.variable_return variable55 =null;



        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:145:5: ( constant | variable )
            int alt19=2;
            switch ( input.LA(1) ) {
            case CURIE:
            case ID:
            case IRI_REF:
            case NUMBER:
            case STRING:
            case TOP:
                {
                alt19=1;
                }
                break;
            case VAR_ID:
                {
                alt19=2;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 19, 0, input);

                throw nvae;

            }

            switch (alt19) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:145:9: constant
                    {
                    root_0 = (CommonTree)adaptor.nil();


                    pushFollow(FOLLOW_constant_in_simple_term835);
                    constant54=constant();

                    state._fsp--;

                    adaptor.addChild(root_0, constant54.getTree());

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:146:9: variable
                    {
                    root_0 = (CommonTree)adaptor.nil();


                    pushFollow(FOLLOW_variable_in_simple_term845);
                    variable55=variable();

                    state._fsp--;

                    adaptor.addChild(root_0, variable55.getTree());

                    }
                    break;

            }
            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "simple_term"


    public static class external_term_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "external_term"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:149:1: external_term : EXTERNAL LPAR simple_term LPAR ( term )* RPAR RPAR -> ^( EXTERNAL ^( PSOA ^( INSTANCE simple_term ) ^( TUPLE ( term )* ) ) ) ;
    public final PSOARuleMLPSParser.external_term_return external_term() throws RecognitionException {
        PSOARuleMLPSParser.external_term_return retval = new PSOARuleMLPSParser.external_term_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token EXTERNAL56=null;
        Token LPAR57=null;
        Token LPAR59=null;
        Token RPAR61=null;
        Token RPAR62=null;
        PSOARuleMLPSParser.simple_term_return simple_term58 =null;

        PSOARuleMLPSParser.term_return term60 =null;


        CommonTree EXTERNAL56_tree=null;
        CommonTree LPAR57_tree=null;
        CommonTree LPAR59_tree=null;
        CommonTree RPAR61_tree=null;
        CommonTree RPAR62_tree=null;
        RewriteRuleTokenStream stream_EXTERNAL=new RewriteRuleTokenStream(adaptor,"token EXTERNAL");
        RewriteRuleTokenStream stream_RPAR=new RewriteRuleTokenStream(adaptor,"token RPAR");
        RewriteRuleTokenStream stream_LPAR=new RewriteRuleTokenStream(adaptor,"token LPAR");
        RewriteRuleSubtreeStream stream_term=new RewriteRuleSubtreeStream(adaptor,"rule term");
        RewriteRuleSubtreeStream stream_simple_term=new RewriteRuleSubtreeStream(adaptor,"rule simple_term");
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:150:5: ( EXTERNAL LPAR simple_term LPAR ( term )* RPAR RPAR -> ^( EXTERNAL ^( PSOA ^( INSTANCE simple_term ) ^( TUPLE ( term )* ) ) ) )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:150:9: EXTERNAL LPAR simple_term LPAR ( term )* RPAR RPAR
            {
            EXTERNAL56=(Token)match(input,EXTERNAL,FOLLOW_EXTERNAL_in_external_term864);  
            stream_EXTERNAL.add(EXTERNAL56);


            LPAR57=(Token)match(input,LPAR,FOLLOW_LPAR_in_external_term866);  
            stream_LPAR.add(LPAR57);


            pushFollow(FOLLOW_simple_term_in_external_term868);
            simple_term58=simple_term();

            state._fsp--;

            stream_simple_term.add(simple_term58.getTree());

            LPAR59=(Token)match(input,LPAR,FOLLOW_LPAR_in_external_term870);  
            stream_LPAR.add(LPAR59);


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:150:40: ( term )*
            loop20:
            do {
                int alt20=2;
                switch ( input.LA(1) ) {
                case CURIE:
                case EXTERNAL:
                case ID:
                case IRI_REF:
                case NUMBER:
                case STRING:
                case TOP:
                case VAR_ID:
                    {
                    alt20=1;
                    }
                    break;

                }

                switch (alt20) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:150:40: term
            	    {
            	    pushFollow(FOLLOW_term_in_external_term872);
            	    term60=term();

            	    state._fsp--;

            	    stream_term.add(term60.getTree());

            	    }
            	    break;

            	default :
            	    break loop20;
                }
            } while (true);


            RPAR61=(Token)match(input,RPAR,FOLLOW_RPAR_in_external_term875);  
            stream_RPAR.add(RPAR61);


            RPAR62=(Token)match(input,RPAR,FOLLOW_RPAR_in_external_term877);  
            stream_RPAR.add(RPAR62);


            // AST REWRITE
            // elements: simple_term, EXTERNAL, term
            // token labels: 
            // rule labels: retval
            // token list labels: 
            // rule list labels: 
            // wildcard labels: 
            retval.tree = root_0;
            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

            root_0 = (CommonTree)adaptor.nil();
            // 151:5: -> ^( EXTERNAL ^( PSOA ^( INSTANCE simple_term ) ^( TUPLE ( term )* ) ) )
            {
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:151:8: ^( EXTERNAL ^( PSOA ^( INSTANCE simple_term ) ^( TUPLE ( term )* ) ) )
                {
                CommonTree root_1 = (CommonTree)adaptor.nil();
                root_1 = (CommonTree)adaptor.becomeRoot(
                stream_EXTERNAL.nextNode()
                , root_1);

                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:151:19: ^( PSOA ^( INSTANCE simple_term ) ^( TUPLE ( term )* ) )
                {
                CommonTree root_2 = (CommonTree)adaptor.nil();
                root_2 = (CommonTree)adaptor.becomeRoot(
                (CommonTree)adaptor.create(PSOA, "PSOA")
                , root_2);

                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:151:26: ^( INSTANCE simple_term )
                {
                CommonTree root_3 = (CommonTree)adaptor.nil();
                root_3 = (CommonTree)adaptor.becomeRoot(
                (CommonTree)adaptor.create(INSTANCE, "INSTANCE")
                , root_3);

                adaptor.addChild(root_3, stream_simple_term.nextTree());

                adaptor.addChild(root_2, root_3);
                }

                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:151:50: ^( TUPLE ( term )* )
                {
                CommonTree root_3 = (CommonTree)adaptor.nil();
                root_3 = (CommonTree)adaptor.becomeRoot(
                (CommonTree)adaptor.create(TUPLE, "TUPLE")
                , root_3);

                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:151:58: ( term )*
                while ( stream_term.hasNext() ) {
                    adaptor.addChild(root_3, stream_term.nextTree());

                }
                stream_term.reset();

                adaptor.addChild(root_2, root_3);
                }

                adaptor.addChild(root_1, root_2);
                }

                adaptor.addChild(root_0, root_1);
                }

            }


            retval.tree = root_0;

            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "external_term"


    public static class internal_term_return extends ParserRuleReturnScope {
        public boolean isSimple;
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "internal_term"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:154:1: internal_term returns [boolean isSimple] : ( simple_term -> simple_term ) ( LPAR ( tuples_and_slots )? RPAR -> ^( PSOA ^( INSTANCE $internal_term) ( tuples_and_slots )? ) )? ( psoa_rest -> ^( PSOA $internal_term psoa_rest ) )* ;
    public final PSOARuleMLPSParser.internal_term_return internal_term() throws RecognitionException {
        PSOARuleMLPSParser.internal_term_return retval = new PSOARuleMLPSParser.internal_term_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token LPAR64=null;
        Token RPAR66=null;
        PSOARuleMLPSParser.simple_term_return simple_term63 =null;

        PSOARuleMLPSParser.tuples_and_slots_return tuples_and_slots65 =null;

        PSOARuleMLPSParser.psoa_rest_return psoa_rest67 =null;


        CommonTree LPAR64_tree=null;
        CommonTree RPAR66_tree=null;
        RewriteRuleTokenStream stream_RPAR=new RewriteRuleTokenStream(adaptor,"token RPAR");
        RewriteRuleTokenStream stream_LPAR=new RewriteRuleTokenStream(adaptor,"token LPAR");
        RewriteRuleSubtreeStream stream_tuples_and_slots=new RewriteRuleSubtreeStream(adaptor,"rule tuples_and_slots");
        RewriteRuleSubtreeStream stream_simple_term=new RewriteRuleSubtreeStream(adaptor,"rule simple_term");
        RewriteRuleSubtreeStream stream_psoa_rest=new RewriteRuleSubtreeStream(adaptor,"rule psoa_rest");
         retval.isSimple = true; 
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:156:5: ( ( simple_term -> simple_term ) ( LPAR ( tuples_and_slots )? RPAR -> ^( PSOA ^( INSTANCE $internal_term) ( tuples_and_slots )? ) )? ( psoa_rest -> ^( PSOA $internal_term psoa_rest ) )* )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:156:9: ( simple_term -> simple_term ) ( LPAR ( tuples_and_slots )? RPAR -> ^( PSOA ^( INSTANCE $internal_term) ( tuples_and_slots )? ) )? ( psoa_rest -> ^( PSOA $internal_term psoa_rest ) )*
            {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:156:9: ( simple_term -> simple_term )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:156:10: simple_term
            {
            pushFollow(FOLLOW_simple_term_in_internal_term933);
            simple_term63=simple_term();

            state._fsp--;

            stream_simple_term.add(simple_term63.getTree());

            // AST REWRITE
            // elements: simple_term
            // token labels: 
            // rule labels: retval
            // token list labels: 
            // rule list labels: 
            // wildcard labels: 
            retval.tree = root_0;
            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

            root_0 = (CommonTree)adaptor.nil();
            // 156:22: -> simple_term
            {
                adaptor.addChild(root_0, stream_simple_term.nextTree());

            }


            retval.tree = root_0;

            }


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:157:9: ( LPAR ( tuples_and_slots )? RPAR -> ^( PSOA ^( INSTANCE $internal_term) ( tuples_and_slots )? ) )?
            int alt22=2;
            switch ( input.LA(1) ) {
                case LPAR:
                    {
                    alt22=1;
                    }
                    break;
            }

            switch (alt22) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:157:10: LPAR ( tuples_and_slots )? RPAR
                    {
                    LPAR64=(Token)match(input,LPAR,FOLLOW_LPAR_in_internal_term949);  
                    stream_LPAR.add(LPAR64);


                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:157:15: ( tuples_and_slots )?
                    int alt21=2;
                    switch ( input.LA(1) ) {
                        case CURIE:
                        case EXTERNAL:
                        case ID:
                        case IRI_REF:
                        case LSQBR:
                        case NUMBER:
                        case STRING:
                        case TOP:
                        case VAR_ID:
                            {
                            alt21=1;
                            }
                            break;
                    }

                    switch (alt21) {
                        case 1 :
                            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:157:15: tuples_and_slots
                            {
                            pushFollow(FOLLOW_tuples_and_slots_in_internal_term951);
                            tuples_and_slots65=tuples_and_slots();

                            state._fsp--;

                            stream_tuples_and_slots.add(tuples_and_slots65.getTree());

                            }
                            break;

                    }


                    RPAR66=(Token)match(input,RPAR,FOLLOW_RPAR_in_internal_term954);  
                    stream_RPAR.add(RPAR66);


                     retval.isSimple = false; 

                    // AST REWRITE
                    // elements: tuples_and_slots, internal_term
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 158:10: -> ^( PSOA ^( INSTANCE $internal_term) ( tuples_and_slots )? )
                    {
                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:158:13: ^( PSOA ^( INSTANCE $internal_term) ( tuples_and_slots )? )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(
                        (CommonTree)adaptor.create(PSOA, "PSOA")
                        , root_1);

                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:158:20: ^( INSTANCE $internal_term)
                        {
                        CommonTree root_2 = (CommonTree)adaptor.nil();
                        root_2 = (CommonTree)adaptor.becomeRoot(
                        (CommonTree)adaptor.create(INSTANCE, "INSTANCE")
                        , root_2);

                        adaptor.addChild(root_2, stream_retval.nextTree());

                        adaptor.addChild(root_1, root_2);
                        }

                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:158:47: ( tuples_and_slots )?
                        if ( stream_tuples_and_slots.hasNext() ) {
                            adaptor.addChild(root_1, stream_tuples_and_slots.nextTree());

                        }
                        stream_tuples_and_slots.reset();

                        adaptor.addChild(root_0, root_1);
                        }

                    }


                    retval.tree = root_0;

                    }
                    break;

            }


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:159:9: ( psoa_rest -> ^( PSOA $internal_term psoa_rest ) )*
            loop23:
            do {
                int alt23=2;
                switch ( input.LA(1) ) {
                case INSTANCE:
                    {
                    alt23=1;
                    }
                    break;

                }

                switch (alt23) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:159:10: psoa_rest
            	    {
            	    pushFollow(FOLLOW_psoa_rest_in_internal_term994);
            	    psoa_rest67=psoa_rest();

            	    state._fsp--;

            	    stream_psoa_rest.add(psoa_rest67.getTree());

            	     retval.isSimple = false; 

            	    // AST REWRITE
            	    // elements: internal_term, psoa_rest
            	    // token labels: 
            	    // rule labels: retval
            	    // token list labels: 
            	    // rule list labels: 
            	    // wildcard labels: 
            	    retval.tree = root_0;
            	    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

            	    root_0 = (CommonTree)adaptor.nil();
            	    // 159:43: -> ^( PSOA $internal_term psoa_rest )
            	    {
            	        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:159:46: ^( PSOA $internal_term psoa_rest )
            	        {
            	        CommonTree root_1 = (CommonTree)adaptor.nil();
            	        root_1 = (CommonTree)adaptor.becomeRoot(
            	        (CommonTree)adaptor.create(PSOA, "PSOA")
            	        , root_1);

            	        adaptor.addChild(root_1, stream_retval.nextTree());

            	        adaptor.addChild(root_1, stream_psoa_rest.nextTree());

            	        adaptor.addChild(root_0, root_1);
            	        }

            	    }


            	    retval.tree = root_0;

            	    }
            	    break;

            	default :
            	    break loop23;
                }
            } while (true);


            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "internal_term"


    public static class psoa_rest_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "psoa_rest"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:162:1: psoa_rest : INSTANCE simple_term ( LPAR ( tuples_and_slots )? RPAR )? -> ^( INSTANCE simple_term ) ( tuples_and_slots )? ;
    public final PSOARuleMLPSParser.psoa_rest_return psoa_rest() throws RecognitionException {
        PSOARuleMLPSParser.psoa_rest_return retval = new PSOARuleMLPSParser.psoa_rest_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token INSTANCE68=null;
        Token LPAR70=null;
        Token RPAR72=null;
        PSOARuleMLPSParser.simple_term_return simple_term69 =null;

        PSOARuleMLPSParser.tuples_and_slots_return tuples_and_slots71 =null;


        CommonTree INSTANCE68_tree=null;
        CommonTree LPAR70_tree=null;
        CommonTree RPAR72_tree=null;
        RewriteRuleTokenStream stream_RPAR=new RewriteRuleTokenStream(adaptor,"token RPAR");
        RewriteRuleTokenStream stream_LPAR=new RewriteRuleTokenStream(adaptor,"token LPAR");
        RewriteRuleTokenStream stream_INSTANCE=new RewriteRuleTokenStream(adaptor,"token INSTANCE");
        RewriteRuleSubtreeStream stream_tuples_and_slots=new RewriteRuleSubtreeStream(adaptor,"rule tuples_and_slots");
        RewriteRuleSubtreeStream stream_simple_term=new RewriteRuleSubtreeStream(adaptor,"rule simple_term");
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:163:5: ( INSTANCE simple_term ( LPAR ( tuples_and_slots )? RPAR )? -> ^( INSTANCE simple_term ) ( tuples_and_slots )? )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:163:9: INSTANCE simple_term ( LPAR ( tuples_and_slots )? RPAR )?
            {
            INSTANCE68=(Token)match(input,INSTANCE,FOLLOW_INSTANCE_in_psoa_rest1028);  
            stream_INSTANCE.add(INSTANCE68);


            pushFollow(FOLLOW_simple_term_in_psoa_rest1030);
            simple_term69=simple_term();

            state._fsp--;

            stream_simple_term.add(simple_term69.getTree());

            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:163:30: ( LPAR ( tuples_and_slots )? RPAR )?
            int alt25=2;
            switch ( input.LA(1) ) {
                case LPAR:
                    {
                    alt25=1;
                    }
                    break;
            }

            switch (alt25) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:163:31: LPAR ( tuples_and_slots )? RPAR
                    {
                    LPAR70=(Token)match(input,LPAR,FOLLOW_LPAR_in_psoa_rest1033);  
                    stream_LPAR.add(LPAR70);


                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:163:36: ( tuples_and_slots )?
                    int alt24=2;
                    switch ( input.LA(1) ) {
                        case CURIE:
                        case EXTERNAL:
                        case ID:
                        case IRI_REF:
                        case LSQBR:
                        case NUMBER:
                        case STRING:
                        case TOP:
                        case VAR_ID:
                            {
                            alt24=1;
                            }
                            break;
                    }

                    switch (alt24) {
                        case 1 :
                            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:163:36: tuples_and_slots
                            {
                            pushFollow(FOLLOW_tuples_and_slots_in_psoa_rest1035);
                            tuples_and_slots71=tuples_and_slots();

                            state._fsp--;

                            stream_tuples_and_slots.add(tuples_and_slots71.getTree());

                            }
                            break;

                    }


                    RPAR72=(Token)match(input,RPAR,FOLLOW_RPAR_in_psoa_rest1038);  
                    stream_RPAR.add(RPAR72);


                    }
                    break;

            }


            // AST REWRITE
            // elements: tuples_and_slots, simple_term, INSTANCE
            // token labels: 
            // rule labels: retval
            // token list labels: 
            // rule list labels: 
            // wildcard labels: 
            retval.tree = root_0;
            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

            root_0 = (CommonTree)adaptor.nil();
            // 164:5: -> ^( INSTANCE simple_term ) ( tuples_and_slots )?
            {
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:164:8: ^( INSTANCE simple_term )
                {
                CommonTree root_1 = (CommonTree)adaptor.nil();
                root_1 = (CommonTree)adaptor.becomeRoot(
                stream_INSTANCE.nextNode()
                , root_1);

                adaptor.addChild(root_1, stream_simple_term.nextTree());

                adaptor.addChild(root_0, root_1);
                }

                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:164:32: ( tuples_and_slots )?
                if ( stream_tuples_and_slots.hasNext() ) {
                    adaptor.addChild(root_0, stream_tuples_and_slots.nextTree());

                }
                stream_tuples_and_slots.reset();

            }


            retval.tree = root_0;

            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "psoa_rest"


    public static class tuples_and_slots_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "tuples_and_slots"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:167:1: tuples_and_slots : ( ( tuple )+ ( slot )* -> ( tuple )+ ( slot )* | (terms+= term )+ ( SLOT_ARROW first_slot_value= term ( slot )* )? -> {!hasSlot}? ^( TUPLE ) -> {$terms.size() == 1}? ^( SLOT $first_slot_value) ( slot )* -> ^( TUPLE ) ^( SLOT $first_slot_value) ( slot )* );
    public final PSOARuleMLPSParser.tuples_and_slots_return tuples_and_slots() throws RecognitionException {
        PSOARuleMLPSParser.tuples_and_slots_return retval = new PSOARuleMLPSParser.tuples_and_slots_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token SLOT_ARROW75=null;
        List list_terms=null;
        PSOARuleMLPSParser.term_return first_slot_value =null;

        PSOARuleMLPSParser.tuple_return tuple73 =null;

        PSOARuleMLPSParser.slot_return slot74 =null;

        PSOARuleMLPSParser.slot_return slot76 =null;

        RuleReturnScope terms = null;
        CommonTree SLOT_ARROW75_tree=null;
        RewriteRuleTokenStream stream_SLOT_ARROW=new RewriteRuleTokenStream(adaptor,"token SLOT_ARROW");
        RewriteRuleSubtreeStream stream_term=new RewriteRuleSubtreeStream(adaptor,"rule term");
        RewriteRuleSubtreeStream stream_tuple=new RewriteRuleSubtreeStream(adaptor,"rule tuple");
        RewriteRuleSubtreeStream stream_slot=new RewriteRuleSubtreeStream(adaptor,"rule slot");
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:168:5: ( ( tuple )+ ( slot )* -> ( tuple )+ ( slot )* | (terms+= term )+ ( SLOT_ARROW first_slot_value= term ( slot )* )? -> {!hasSlot}? ^( TUPLE ) -> {$terms.size() == 1}? ^( SLOT $first_slot_value) ( slot )* -> ^( TUPLE ) ^( SLOT $first_slot_value) ( slot )* )
            int alt31=2;
            switch ( input.LA(1) ) {
            case LSQBR:
                {
                alt31=1;
                }
                break;
            case CURIE:
            case EXTERNAL:
            case ID:
            case IRI_REF:
            case NUMBER:
            case STRING:
            case TOP:
            case VAR_ID:
                {
                alt31=2;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 31, 0, input);

                throw nvae;

            }

            switch (alt31) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:168:9: ( tuple )+ ( slot )*
                    {
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:168:9: ( tuple )+
                    int cnt26=0;
                    loop26:
                    do {
                        int alt26=2;
                        switch ( input.LA(1) ) {
                        case LSQBR:
                            {
                            alt26=1;
                            }
                            break;

                        }

                        switch (alt26) {
                    	case 1 :
                    	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:168:9: tuple
                    	    {
                    	    pushFollow(FOLLOW_tuple_in_tuples_and_slots1074);
                    	    tuple73=tuple();

                    	    state._fsp--;

                    	    stream_tuple.add(tuple73.getTree());

                    	    }
                    	    break;

                    	default :
                    	    if ( cnt26 >= 1 ) break loop26;
                                EarlyExitException eee =
                                    new EarlyExitException(26, input);
                                throw eee;
                        }
                        cnt26++;
                    } while (true);


                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:168:16: ( slot )*
                    loop27:
                    do {
                        int alt27=2;
                        switch ( input.LA(1) ) {
                        case CURIE:
                        case EXTERNAL:
                        case ID:
                        case IRI_REF:
                        case NUMBER:
                        case STRING:
                        case TOP:
                        case VAR_ID:
                            {
                            alt27=1;
                            }
                            break;

                        }

                        switch (alt27) {
                    	case 1 :
                    	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:168:16: slot
                    	    {
                    	    pushFollow(FOLLOW_slot_in_tuples_and_slots1077);
                    	    slot74=slot();

                    	    state._fsp--;

                    	    stream_slot.add(slot74.getTree());

                    	    }
                    	    break;

                    	default :
                    	    break loop27;
                        }
                    } while (true);


                    // AST REWRITE
                    // elements: tuple, slot
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 168:22: -> ( tuple )+ ( slot )*
                    {
                        if ( !(stream_tuple.hasNext()) ) {
                            throw new RewriteEarlyExitException();
                        }
                        while ( stream_tuple.hasNext() ) {
                            adaptor.addChild(root_0, stream_tuple.nextTree());

                        }
                        stream_tuple.reset();

                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:168:32: ( slot )*
                        while ( stream_slot.hasNext() ) {
                            adaptor.addChild(root_0, stream_slot.nextTree());

                        }
                        stream_slot.reset();

                    }


                    retval.tree = root_0;

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:169:9: (terms+= term )+ ( SLOT_ARROW first_slot_value= term ( slot )* )?
                    {
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:169:14: (terms+= term )+
                    int cnt28=0;
                    loop28:
                    do {
                        int alt28=2;
                        switch ( input.LA(1) ) {
                        case CURIE:
                        case EXTERNAL:
                        case ID:
                        case IRI_REF:
                        case NUMBER:
                        case STRING:
                        case TOP:
                        case VAR_ID:
                            {
                            alt28=1;
                            }
                            break;

                        }

                        switch (alt28) {
                    	case 1 :
                    	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:169:14: terms+= term
                    	    {
                    	    pushFollow(FOLLOW_term_in_tuples_and_slots1098);
                    	    terms=term();

                    	    state._fsp--;

                    	    stream_term.add(terms.getTree());
                    	    if (list_terms==null) list_terms=new ArrayList();
                    	    list_terms.add(terms.getTree());


                    	    }
                    	    break;

                    	default :
                    	    if ( cnt28 >= 1 ) break loop28;
                                EarlyExitException eee =
                                    new EarlyExitException(28, input);
                                throw eee;
                        }
                        cnt28++;
                    } while (true);


                     boolean hasSlot = false; 

                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:170:9: ( SLOT_ARROW first_slot_value= term ( slot )* )?
                    int alt30=2;
                    switch ( input.LA(1) ) {
                        case SLOT_ARROW:
                            {
                            alt30=1;
                            }
                            break;
                    }

                    switch (alt30) {
                        case 1 :
                            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:170:10: SLOT_ARROW first_slot_value= term ( slot )*
                            {
                            SLOT_ARROW75=(Token)match(input,SLOT_ARROW,FOLLOW_SLOT_ARROW_in_tuples_and_slots1112);  
                            stream_SLOT_ARROW.add(SLOT_ARROW75);


                            pushFollow(FOLLOW_term_in_tuples_and_slots1116);
                            first_slot_value=term();

                            state._fsp--;

                            stream_term.add(first_slot_value.getTree());

                             hasSlot = true; 

                            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:170:63: ( slot )*
                            loop29:
                            do {
                                int alt29=2;
                                switch ( input.LA(1) ) {
                                case CURIE:
                                case EXTERNAL:
                                case ID:
                                case IRI_REF:
                                case NUMBER:
                                case STRING:
                                case TOP:
                                case VAR_ID:
                                    {
                                    alt29=1;
                                    }
                                    break;

                                }

                                switch (alt29) {
                            	case 1 :
                            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:170:63: slot
                            	    {
                            	    pushFollow(FOLLOW_slot_in_tuples_and_slots1120);
                            	    slot76=slot();

                            	    state._fsp--;

                            	    stream_slot.add(slot76.getTree());

                            	    }
                            	    break;

                            	default :
                            	    break loop29;
                                }
                            } while (true);


                            }
                            break;

                    }


                    // AST REWRITE
                    // elements: slot, first_slot_value, first_slot_value, slot
                    // token labels: 
                    // rule labels: retval, first_slot_value
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);
                    RewriteRuleSubtreeStream stream_first_slot_value=new RewriteRuleSubtreeStream(adaptor,"rule first_slot_value",first_slot_value!=null?first_slot_value.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 171:5: -> {!hasSlot}? ^( TUPLE )
                    if (!hasSlot) {
                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:171:20: ^( TUPLE )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(
                        (CommonTree)adaptor.create(TUPLE, "TUPLE")
                        , root_1);

                        adaptor.addChild(root_1, getTupleTree(list_terms, list_terms.size()) );

                        adaptor.addChild(root_0, root_1);
                        }

                    }

                    else // 172:5: -> {$terms.size() == 1}? ^( SLOT $first_slot_value) ( slot )*
                    if (list_terms.size() == 1) {
                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:173:9: ^( SLOT $first_slot_value)
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(
                        (CommonTree)adaptor.create(SLOT, "SLOT")
                        , root_1);

                        adaptor.addChild(root_1, list_terms.get(0));

                        adaptor.addChild(root_1, stream_first_slot_value.nextTree());

                        adaptor.addChild(root_0, root_1);
                        }

                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:173:51: ( slot )*
                        while ( stream_slot.hasNext() ) {
                            adaptor.addChild(root_0, stream_slot.nextTree());

                        }
                        stream_slot.reset();

                    }

                    else // 174:5: -> ^( TUPLE ) ^( SLOT $first_slot_value) ( slot )*
                    {
                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:174:9: ^( TUPLE )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(
                        (CommonTree)adaptor.create(TUPLE, "TUPLE")
                        , root_1);

                        adaptor.addChild(root_1, getTupleTree(list_terms, list_terms.size() - 1));

                        adaptor.addChild(root_0, root_1);
                        }

                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:174:60: ^( SLOT $first_slot_value)
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(
                        (CommonTree)adaptor.create(SLOT, "SLOT")
                        , root_1);

                        adaptor.addChild(root_1, list_terms.get(list_terms.size() - 1));

                        adaptor.addChild(root_1, stream_first_slot_value.nextTree());

                        adaptor.addChild(root_0, root_1);
                        }

                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:174:118: ( slot )*
                        while ( stream_slot.hasNext() ) {
                            adaptor.addChild(root_0, stream_slot.nextTree());

                        }
                        stream_slot.reset();

                    }


                    retval.tree = root_0;

                    }
                    break;

            }
            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "tuples_and_slots"


    public static class tuple_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "tuple"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:177:1: tuple : LSQBR ( term )+ RSQBR -> ^( TUPLE ( term )+ ) ;
    public final PSOARuleMLPSParser.tuple_return tuple() throws RecognitionException {
        PSOARuleMLPSParser.tuple_return retval = new PSOARuleMLPSParser.tuple_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token LSQBR77=null;
        Token RSQBR79=null;
        PSOARuleMLPSParser.term_return term78 =null;


        CommonTree LSQBR77_tree=null;
        CommonTree RSQBR79_tree=null;
        RewriteRuleTokenStream stream_LSQBR=new RewriteRuleTokenStream(adaptor,"token LSQBR");
        RewriteRuleTokenStream stream_RSQBR=new RewriteRuleTokenStream(adaptor,"token RSQBR");
        RewriteRuleSubtreeStream stream_term=new RewriteRuleSubtreeStream(adaptor,"rule term");
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:178:5: ( LSQBR ( term )+ RSQBR -> ^( TUPLE ( term )+ ) )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:178:9: LSQBR ( term )+ RSQBR
            {
            LSQBR77=(Token)match(input,LSQBR,FOLLOW_LSQBR_in_tuple1215);  
            stream_LSQBR.add(LSQBR77);


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:178:15: ( term )+
            int cnt32=0;
            loop32:
            do {
                int alt32=2;
                switch ( input.LA(1) ) {
                case CURIE:
                case EXTERNAL:
                case ID:
                case IRI_REF:
                case NUMBER:
                case STRING:
                case TOP:
                case VAR_ID:
                    {
                    alt32=1;
                    }
                    break;

                }

                switch (alt32) {
            	case 1 :
            	    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:178:15: term
            	    {
            	    pushFollow(FOLLOW_term_in_tuple1217);
            	    term78=term();

            	    state._fsp--;

            	    stream_term.add(term78.getTree());

            	    }
            	    break;

            	default :
            	    if ( cnt32 >= 1 ) break loop32;
                        EarlyExitException eee =
                            new EarlyExitException(32, input);
                        throw eee;
                }
                cnt32++;
            } while (true);


            RSQBR79=(Token)match(input,RSQBR,FOLLOW_RSQBR_in_tuple1220);  
            stream_RSQBR.add(RSQBR79);


            // AST REWRITE
            // elements: term
            // token labels: 
            // rule labels: retval
            // token list labels: 
            // rule list labels: 
            // wildcard labels: 
            retval.tree = root_0;
            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

            root_0 = (CommonTree)adaptor.nil();
            // 178:27: -> ^( TUPLE ( term )+ )
            {
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:178:30: ^( TUPLE ( term )+ )
                {
                CommonTree root_1 = (CommonTree)adaptor.nil();
                root_1 = (CommonTree)adaptor.becomeRoot(
                (CommonTree)adaptor.create(TUPLE, "TUPLE")
                , root_1);

                if ( !(stream_term.hasNext()) ) {
                    throw new RewriteEarlyExitException();
                }
                while ( stream_term.hasNext() ) {
                    adaptor.addChild(root_1, stream_term.nextTree());

                }
                stream_term.reset();

                adaptor.addChild(root_0, root_1);
                }

            }


            retval.tree = root_0;

            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "tuple"


    public static class slot_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "slot"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:181:1: slot : name= term SLOT_ARROW value= term -> ^( SLOT $name $value) ;
    public final PSOARuleMLPSParser.slot_return slot() throws RecognitionException {
        PSOARuleMLPSParser.slot_return retval = new PSOARuleMLPSParser.slot_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token SLOT_ARROW80=null;
        PSOARuleMLPSParser.term_return name =null;

        PSOARuleMLPSParser.term_return value =null;


        CommonTree SLOT_ARROW80_tree=null;
        RewriteRuleTokenStream stream_SLOT_ARROW=new RewriteRuleTokenStream(adaptor,"token SLOT_ARROW");
        RewriteRuleSubtreeStream stream_term=new RewriteRuleSubtreeStream(adaptor,"rule term");
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:182:5: (name= term SLOT_ARROW value= term -> ^( SLOT $name $value) )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:183:9: name= term SLOT_ARROW value= term
            {
            pushFollow(FOLLOW_term_in_slot1256);
            name=term();

            state._fsp--;

            stream_term.add(name.getTree());

            SLOT_ARROW80=(Token)match(input,SLOT_ARROW,FOLLOW_SLOT_ARROW_in_slot1258);  
            stream_SLOT_ARROW.add(SLOT_ARROW80);


            pushFollow(FOLLOW_term_in_slot1262);
            value=term();

            state._fsp--;

            stream_term.add(value.getTree());

            // AST REWRITE
            // elements: name, value
            // token labels: 
            // rule labels: retval, name, value
            // token list labels: 
            // rule list labels: 
            // wildcard labels: 
            retval.tree = root_0;
            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);
            RewriteRuleSubtreeStream stream_name=new RewriteRuleSubtreeStream(adaptor,"rule name",name!=null?name.tree:null);
            RewriteRuleSubtreeStream stream_value=new RewriteRuleSubtreeStream(adaptor,"rule value",value!=null?value.tree:null);

            root_0 = (CommonTree)adaptor.nil();
            // 183:41: -> ^( SLOT $name $value)
            {
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:183:44: ^( SLOT $name $value)
                {
                CommonTree root_1 = (CommonTree)adaptor.nil();
                root_1 = (CommonTree)adaptor.becomeRoot(
                (CommonTree)adaptor.create(SLOT, "SLOT")
                , root_1);

                adaptor.addChild(root_1, stream_name.nextTree());

                adaptor.addChild(root_1, stream_value.nextTree());

                adaptor.addChild(root_0, root_1);
                }

            }


            retval.tree = root_0;

            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "slot"


    public static class constant_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "constant"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:192:1: constant : ( const_string -> const_string | CURIE -> ^( SHORTCONST IRI[$CURIE.text] ) | NUMBER -> ^( SHORTCONST NUMBER[$NUMBER.text] ) | ID -> ^( SHORTCONST LOCAL[$ID.text.substring(1)] ) | IRI_REF -> ^( SHORTCONST IRI[$IRI_REF.text] ) | TOP );
    public final PSOARuleMLPSParser.constant_return constant() throws RecognitionException {
        PSOARuleMLPSParser.constant_return retval = new PSOARuleMLPSParser.constant_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token CURIE82=null;
        Token NUMBER83=null;
        Token ID84=null;
        Token IRI_REF85=null;
        Token TOP86=null;
        PSOARuleMLPSParser.const_string_return const_string81 =null;


        CommonTree CURIE82_tree=null;
        CommonTree NUMBER83_tree=null;
        CommonTree ID84_tree=null;
        CommonTree IRI_REF85_tree=null;
        CommonTree TOP86_tree=null;
        RewriteRuleTokenStream stream_IRI_REF=new RewriteRuleTokenStream(adaptor,"token IRI_REF");
        RewriteRuleTokenStream stream_ID=new RewriteRuleTokenStream(adaptor,"token ID");
        RewriteRuleTokenStream stream_CURIE=new RewriteRuleTokenStream(adaptor,"token CURIE");
        RewriteRuleTokenStream stream_NUMBER=new RewriteRuleTokenStream(adaptor,"token NUMBER");
        RewriteRuleSubtreeStream stream_const_string=new RewriteRuleSubtreeStream(adaptor,"rule const_string");
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:193:5: ( const_string -> const_string | CURIE -> ^( SHORTCONST IRI[$CURIE.text] ) | NUMBER -> ^( SHORTCONST NUMBER[$NUMBER.text] ) | ID -> ^( SHORTCONST LOCAL[$ID.text.substring(1)] ) | IRI_REF -> ^( SHORTCONST IRI[$IRI_REF.text] ) | TOP )
            int alt33=6;
            switch ( input.LA(1) ) {
            case STRING:
                {
                alt33=1;
                }
                break;
            case CURIE:
                {
                alt33=2;
                }
                break;
            case NUMBER:
                {
                alt33=3;
                }
                break;
            case ID:
                {
                alt33=4;
                }
                break;
            case IRI_REF:
                {
                alt33=5;
                }
                break;
            case TOP:
                {
                alt33=6;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 33, 0, input);

                throw nvae;

            }

            switch (alt33) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:193:9: const_string
                    {
                    pushFollow(FOLLOW_const_string_in_constant1296);
                    const_string81=const_string();

                    state._fsp--;

                    stream_const_string.add(const_string81.getTree());

                    // AST REWRITE
                    // elements: const_string
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 193:22: -> const_string
                    {
                        adaptor.addChild(root_0, stream_const_string.nextTree());

                    }


                    retval.tree = root_0;

                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:194:9: CURIE
                    {
                    CURIE82=(Token)match(input,CURIE,FOLLOW_CURIE_in_constant1310);  
                    stream_CURIE.add(CURIE82);


                    // AST REWRITE
                    // elements: 
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 194:17: -> ^( SHORTCONST IRI[$CURIE.text] )
                    {
                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:194:20: ^( SHORTCONST IRI[$CURIE.text] )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(
                        (CommonTree)adaptor.create(SHORTCONST, "SHORTCONST")
                        , root_1);

                        adaptor.addChild(root_1, 
                        (CommonTree)adaptor.create(IRI, (CURIE82!=null?CURIE82.getText():null))
                        );

                        adaptor.addChild(root_0, root_1);
                        }

                    }


                    retval.tree = root_0;

                    }
                    break;
                case 3 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:195:9: NUMBER
                    {
                    NUMBER83=(Token)match(input,NUMBER,FOLLOW_NUMBER_in_constant1332);  
                    stream_NUMBER.add(NUMBER83);


                    // AST REWRITE
                    // elements: NUMBER
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 195:17: -> ^( SHORTCONST NUMBER[$NUMBER.text] )
                    {
                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:195:20: ^( SHORTCONST NUMBER[$NUMBER.text] )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(
                        (CommonTree)adaptor.create(SHORTCONST, "SHORTCONST")
                        , root_1);

                        adaptor.addChild(root_1, 
                        (CommonTree)adaptor.create(NUMBER, (NUMBER83!=null?NUMBER83.getText():null))
                        );

                        adaptor.addChild(root_0, root_1);
                        }

                    }


                    retval.tree = root_0;

                    }
                    break;
                case 4 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:196:9: ID
                    {
                    ID84=(Token)match(input,ID,FOLLOW_ID_in_constant1352);  
                    stream_ID.add(ID84);



                                if (!(ID84!=null?ID84.getText():null).startsWith("_"))
                                    throw new RuntimeException("Incorrect constant format:" + (ID84!=null?ID84.getText():null));
                            

                    // AST REWRITE
                    // elements: 
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 200:9: -> ^( SHORTCONST LOCAL[$ID.text.substring(1)] )
                    {
                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:200:12: ^( SHORTCONST LOCAL[$ID.text.substring(1)] )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(
                        (CommonTree)adaptor.create(SHORTCONST, "SHORTCONST")
                        , root_1);

                        adaptor.addChild(root_1, 
                        (CommonTree)adaptor.create(LOCAL, (ID84!=null?ID84.getText():null).substring(1))
                        );

                        adaptor.addChild(root_0, root_1);
                        }

                    }


                    retval.tree = root_0;

                    }
                    break;
                case 5 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:201:9: IRI_REF
                    {
                    IRI_REF85=(Token)match(input,IRI_REF,FOLLOW_IRI_REF_in_constant1383);  
                    stream_IRI_REF.add(IRI_REF85);


                    // AST REWRITE
                    // elements: 
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 201:17: -> ^( SHORTCONST IRI[$IRI_REF.text] )
                    {
                        // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:201:20: ^( SHORTCONST IRI[$IRI_REF.text] )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(
                        (CommonTree)adaptor.create(SHORTCONST, "SHORTCONST")
                        , root_1);

                        adaptor.addChild(root_1, 
                        (CommonTree)adaptor.create(IRI, (IRI_REF85!=null?IRI_REF85.getText():null))
                        );

                        adaptor.addChild(root_0, root_1);
                        }

                    }


                    retval.tree = root_0;

                    }
                    break;
                case 6 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:202:9: TOP
                    {
                    root_0 = (CommonTree)adaptor.nil();


                    TOP86=(Token)match(input,TOP,FOLLOW_TOP_in_constant1402); 
                    TOP86_tree = 
                    (CommonTree)adaptor.create(TOP86)
                    ;
                    adaptor.addChild(root_0, TOP86_tree);


                    }
                    break;

            }
            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "constant"


    public static class const_string_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "const_string"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:207:1: const_string : STRING ( ( SYMSPACE_OPER symspace= ( IRI_REF | CURIE ) ) | '@' )? -> {isAbbrivated}? ^( SHORTCONST LITERAL[getStrValue($STRING.text)] ) -> LITERAL[getStrValue($STRING.text)] IRI[$symspace.text] ;
    public final PSOARuleMLPSParser.const_string_return const_string() throws RecognitionException {
        PSOARuleMLPSParser.const_string_return retval = new PSOARuleMLPSParser.const_string_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token symspace=null;
        Token STRING87=null;
        Token SYMSPACE_OPER88=null;
        Token IRI_REF89=null;
        Token CURIE90=null;
        Token char_literal91=null;

        CommonTree symspace_tree=null;
        CommonTree STRING87_tree=null;
        CommonTree SYMSPACE_OPER88_tree=null;
        CommonTree IRI_REF89_tree=null;
        CommonTree CURIE90_tree=null;
        CommonTree char_literal91_tree=null;
        RewriteRuleTokenStream stream_IRI_REF=new RewriteRuleTokenStream(adaptor,"token IRI_REF");
        RewriteRuleTokenStream stream_51=new RewriteRuleTokenStream(adaptor,"token 51");
        RewriteRuleTokenStream stream_CURIE=new RewriteRuleTokenStream(adaptor,"token CURIE");
        RewriteRuleTokenStream stream_SYMSPACE_OPER=new RewriteRuleTokenStream(adaptor,"token SYMSPACE_OPER");
        RewriteRuleTokenStream stream_STRING=new RewriteRuleTokenStream(adaptor,"token STRING");

         boolean isAbbrivated = true; 
        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:209:5: ( STRING ( ( SYMSPACE_OPER symspace= ( IRI_REF | CURIE ) ) | '@' )? -> {isAbbrivated}? ^( SHORTCONST LITERAL[getStrValue($STRING.text)] ) -> LITERAL[getStrValue($STRING.text)] IRI[$symspace.text] )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:209:7: STRING ( ( SYMSPACE_OPER symspace= ( IRI_REF | CURIE ) ) | '@' )?
            {
            STRING87=(Token)match(input,STRING,FOLLOW_STRING_in_const_string1427);  
            stream_STRING.add(STRING87);


            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:209:14: ( ( SYMSPACE_OPER symspace= ( IRI_REF | CURIE ) ) | '@' )?
            int alt35=3;
            switch ( input.LA(1) ) {
                case SYMSPACE_OPER:
                    {
                    alt35=1;
                    }
                    break;
                case 51:
                    {
                    alt35=2;
                    }
                    break;
            }

            switch (alt35) {
                case 1 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:209:15: ( SYMSPACE_OPER symspace= ( IRI_REF | CURIE ) )
                    {
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:209:15: ( SYMSPACE_OPER symspace= ( IRI_REF | CURIE ) )
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:209:16: SYMSPACE_OPER symspace= ( IRI_REF | CURIE )
                    {
                    SYMSPACE_OPER88=(Token)match(input,SYMSPACE_OPER,FOLLOW_SYMSPACE_OPER_in_const_string1431);  
                    stream_SYMSPACE_OPER.add(SYMSPACE_OPER88);


                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:209:39: ( IRI_REF | CURIE )
                    int alt34=2;
                    switch ( input.LA(1) ) {
                    case IRI_REF:
                        {
                        alt34=1;
                        }
                        break;
                    case CURIE:
                        {
                        alt34=2;
                        }
                        break;
                    default:
                        NoViableAltException nvae =
                            new NoViableAltException("", 34, 0, input);

                        throw nvae;

                    }

                    switch (alt34) {
                        case 1 :
                            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:209:40: IRI_REF
                            {
                            IRI_REF89=(Token)match(input,IRI_REF,FOLLOW_IRI_REF_in_const_string1436);  
                            stream_IRI_REF.add(IRI_REF89);


                            }
                            break;
                        case 2 :
                            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:209:50: CURIE
                            {
                            CURIE90=(Token)match(input,CURIE,FOLLOW_CURIE_in_const_string1440);  
                            stream_CURIE.add(CURIE90);


                            }
                            break;

                    }


                     isAbbrivated = false; 

                    }


                    }
                    break;
                case 2 :
                    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:209:87: '@'
                    {
                    char_literal91=(Token)match(input,51,FOLLOW_51_in_const_string1449);  
                    stream_51.add(char_literal91);


                    }
                    break;

            }


            // AST REWRITE
            // elements: 
            // token labels: 
            // rule labels: retval
            // token list labels: 
            // rule list labels: 
            // wildcard labels: 
            retval.tree = root_0;
            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

            root_0 = (CommonTree)adaptor.nil();
            // 210:5: -> {isAbbrivated}? ^( SHORTCONST LITERAL[getStrValue($STRING.text)] )
            if (isAbbrivated) {
                // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:210:24: ^( SHORTCONST LITERAL[getStrValue($STRING.text)] )
                {
                CommonTree root_1 = (CommonTree)adaptor.nil();
                root_1 = (CommonTree)adaptor.becomeRoot(
                (CommonTree)adaptor.create(SHORTCONST, "SHORTCONST")
                , root_1);

                adaptor.addChild(root_1, 
                (CommonTree)adaptor.create(LITERAL, getStrValue((STRING87!=null?STRING87.getText():null)))
                );

                adaptor.addChild(root_0, root_1);
                }

            }

            else // 211:5: -> LITERAL[getStrValue($STRING.text)] IRI[$symspace.text]
            {
                adaptor.addChild(root_0, 
                (CommonTree)adaptor.create(LITERAL, getStrValue((STRING87!=null?STRING87.getText():null)))
                );

                adaptor.addChild(root_0, 
                (CommonTree)adaptor.create(IRI, (symspace!=null?symspace.getText():null))
                );

            }


            retval.tree = root_0;

            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "const_string"


    public static class variable_return extends ParserRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };


    // $ANTLR start "variable"
    // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:215:1: variable : VAR_ID -> VAR_ID[$VAR_ID.text.substring(1)] ;
    public final PSOARuleMLPSParser.variable_return variable() throws RecognitionException {
        PSOARuleMLPSParser.variable_return retval = new PSOARuleMLPSParser.variable_return();
        retval.start = input.LT(1);


        CommonTree root_0 = null;

        Token VAR_ID92=null;

        CommonTree VAR_ID92_tree=null;
        RewriteRuleTokenStream stream_VAR_ID=new RewriteRuleTokenStream(adaptor,"token VAR_ID");

        try {
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:216:5: ( VAR_ID -> VAR_ID[$VAR_ID.text.substring(1)] )
            // org/ruleml/api/presentation_syntax_parser/PSOARuleMLPS.g:216:9: VAR_ID
            {
            VAR_ID92=(Token)match(input,VAR_ID,FOLLOW_VAR_ID_in_variable1506);  
            stream_VAR_ID.add(VAR_ID92);


            // AST REWRITE
            // elements: VAR_ID
            // token labels: 
            // rule labels: retval
            // token list labels: 
            // rule list labels: 
            // wildcard labels: 
            retval.tree = root_0;
            RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

            root_0 = (CommonTree)adaptor.nil();
            // 216:16: -> VAR_ID[$VAR_ID.text.substring(1)]
            {
                adaptor.addChild(root_0, 
                (CommonTree)adaptor.create(VAR_ID, (VAR_ID92!=null?VAR_ID92.getText():null).substring(1))
                );

            }


            retval.tree = root_0;

            }

            retval.stop = input.LT(-1);


            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (CommonTree)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }

        finally {
        	// do for sure before leaving
        }
        return retval;
    }
    // $ANTLR end "variable"

    // Delegated rules


 

    public static final BitSet FOLLOW_document_in_top_level_item166 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_top_level_item169 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_formula_in_query183 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_DOCUMENT_in_document197 = new BitSet(new long[]{0x0000000080000000L});
    public static final BitSet FOLLOW_LPAR_in_document199 = new BitSet(new long[]{0x0000005000420040L});
    public static final BitSet FOLLOW_base_in_document201 = new BitSet(new long[]{0x0000005000420000L});
    public static final BitSet FOLLOW_prefix_in_document204 = new BitSet(new long[]{0x0000005000420000L});
    public static final BitSet FOLLOW_importDecl_in_document207 = new BitSet(new long[]{0x0000004000420000L});
    public static final BitSet FOLLOW_group_in_document210 = new BitSet(new long[]{0x0000004000000000L});
    public static final BitSet FOLLOW_RPAR_in_document213 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_BASE_in_base258 = new BitSet(new long[]{0x0000000080000000L});
    public static final BitSet FOLLOW_LPAR_in_base260 = new BitSet(new long[]{0x0000000004000000L});
    public static final BitSet FOLLOW_IRI_REF_in_base262 = new BitSet(new long[]{0x0000004000000000L});
    public static final BitSet FOLLOW_RPAR_in_base264 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_PREFIX_in_prefix291 = new BitSet(new long[]{0x0000000080000000L});
    public static final BitSet FOLLOW_LPAR_in_prefix293 = new BitSet(new long[]{0x0000000000040000L});
    public static final BitSet FOLLOW_ID_in_prefix295 = new BitSet(new long[]{0x0000000004000000L});
    public static final BitSet FOLLOW_IRI_REF_in_prefix297 = new BitSet(new long[]{0x0000004000000000L});
    public static final BitSet FOLLOW_RPAR_in_prefix299 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_IMPORT_in_importDecl328 = new BitSet(new long[]{0x0000000080000000L});
    public static final BitSet FOLLOW_LPAR_in_importDecl330 = new BitSet(new long[]{0x0000000004000000L});
    public static final BitSet FOLLOW_IRI_REF_in_importDecl334 = new BitSet(new long[]{0x0000004004000000L});
    public static final BitSet FOLLOW_IRI_REF_in_importDecl339 = new BitSet(new long[]{0x0000004000000000L});
    public static final BitSet FOLLOW_RPAR_in_importDecl343 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_GROUP_in_group375 = new BitSet(new long[]{0x0000000080000000L});
    public static final BitSet FOLLOW_LPAR_in_group377 = new BitSet(new long[]{0x0001484C0406E0A0L});
    public static final BitSet FOLLOW_group_element_in_group379 = new BitSet(new long[]{0x0001484C0406E0A0L});
    public static final BitSet FOLLOW_RPAR_in_group382 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule_in_group_element410 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_group_in_group_element420 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_FORALL_in_rule439 = new BitSet(new long[]{0x0001000000000000L});
    public static final BitSet FOLLOW_variable_in_rule441 = new BitSet(new long[]{0x0001000080000000L});
    public static final BitSet FOLLOW_LPAR_in_rule444 = new BitSet(new long[]{0x0001480C040460A0L});
    public static final BitSet FOLLOW_clause_in_rule446 = new BitSet(new long[]{0x0000004000000000L});
    public static final BitSet FOLLOW_RPAR_in_rule448 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_clause_in_rule477 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_formula_in_clause513 = new BitSet(new long[]{0x0000000000200002L});
    public static final BitSet FOLLOW_IMPLICATION_in_clause522 = new BitSet(new long[]{0x0001480C040460A0L});
    public static final BitSet FOLLOW_formula_in_clause526 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_AND_in_formula581 = new BitSet(new long[]{0x0000000080000000L});
    public static final BitSet FOLLOW_LPAR_in_formula583 = new BitSet(new long[]{0x0001480C040460A0L});
    public static final BitSet FOLLOW_formula_in_formula588 = new BitSet(new long[]{0x0001484C040460A0L});
    public static final BitSet FOLLOW_RPAR_in_formula595 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_OR_in_formula614 = new BitSet(new long[]{0x0000000080000000L});
    public static final BitSet FOLLOW_LPAR_in_formula616 = new BitSet(new long[]{0x0001480C040460A0L});
    public static final BitSet FOLLOW_formula_in_formula618 = new BitSet(new long[]{0x0001484C040460A0L});
    public static final BitSet FOLLOW_RPAR_in_formula621 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_EXISTS_in_formula642 = new BitSet(new long[]{0x0001000000000000L});
    public static final BitSet FOLLOW_variable_in_formula644 = new BitSet(new long[]{0x0001000080000000L});
    public static final BitSet FOLLOW_LPAR_in_formula647 = new BitSet(new long[]{0x0001480C040460A0L});
    public static final BitSet FOLLOW_formula_in_formula651 = new BitSet(new long[]{0x0000004000000000L});
    public static final BitSet FOLLOW_RPAR_in_formula653 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_atomic_in_formula685 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_external_term_in_formula702 = new BitSet(new long[]{0x0000000000800002L});
    public static final BitSet FOLLOW_psoa_rest_in_formula720 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_internal_term_in_atomic765 = new BitSet(new long[]{0x0000100000001002L});
    public static final BitSet FOLLOW_set_in_atomic768 = new BitSet(new long[]{0x0001480404044080L});
    public static final BitSet FOLLOW_term_in_atomic777 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_internal_term_in_term798 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_external_term_in_term812 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_constant_in_simple_term835 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_variable_in_simple_term845 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_EXTERNAL_in_external_term864 = new BitSet(new long[]{0x0000000080000000L});
    public static final BitSet FOLLOW_LPAR_in_external_term866 = new BitSet(new long[]{0x0001480404040080L});
    public static final BitSet FOLLOW_simple_term_in_external_term868 = new BitSet(new long[]{0x0000000080000000L});
    public static final BitSet FOLLOW_LPAR_in_external_term870 = new BitSet(new long[]{0x0001484404044080L});
    public static final BitSet FOLLOW_term_in_external_term872 = new BitSet(new long[]{0x0001484404044080L});
    public static final BitSet FOLLOW_RPAR_in_external_term875 = new BitSet(new long[]{0x0000004000000000L});
    public static final BitSet FOLLOW_RPAR_in_external_term877 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_simple_term_in_internal_term933 = new BitSet(new long[]{0x0000000080800002L});
    public static final BitSet FOLLOW_LPAR_in_internal_term949 = new BitSet(new long[]{0x0001484504044080L});
    public static final BitSet FOLLOW_tuples_and_slots_in_internal_term951 = new BitSet(new long[]{0x0000004000000000L});
    public static final BitSet FOLLOW_RPAR_in_internal_term954 = new BitSet(new long[]{0x0000000000800002L});
    public static final BitSet FOLLOW_psoa_rest_in_internal_term994 = new BitSet(new long[]{0x0000000000800002L});
    public static final BitSet FOLLOW_INSTANCE_in_psoa_rest1028 = new BitSet(new long[]{0x0001480404040080L});
    public static final BitSet FOLLOW_simple_term_in_psoa_rest1030 = new BitSet(new long[]{0x0000000080000002L});
    public static final BitSet FOLLOW_LPAR_in_psoa_rest1033 = new BitSet(new long[]{0x0001484504044080L});
    public static final BitSet FOLLOW_tuples_and_slots_in_psoa_rest1035 = new BitSet(new long[]{0x0000004000000000L});
    public static final BitSet FOLLOW_RPAR_in_psoa_rest1038 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_tuple_in_tuples_and_slots1074 = new BitSet(new long[]{0x0001480504044082L});
    public static final BitSet FOLLOW_slot_in_tuples_and_slots1077 = new BitSet(new long[]{0x0001480404044082L});
    public static final BitSet FOLLOW_term_in_tuples_and_slots1098 = new BitSet(new long[]{0x00014C0404044082L});
    public static final BitSet FOLLOW_SLOT_ARROW_in_tuples_and_slots1112 = new BitSet(new long[]{0x0001480404044080L});
    public static final BitSet FOLLOW_term_in_tuples_and_slots1116 = new BitSet(new long[]{0x0001480404044082L});
    public static final BitSet FOLLOW_slot_in_tuples_and_slots1120 = new BitSet(new long[]{0x0001480404044082L});
    public static final BitSet FOLLOW_LSQBR_in_tuple1215 = new BitSet(new long[]{0x0001480404044080L});
    public static final BitSet FOLLOW_term_in_tuple1217 = new BitSet(new long[]{0x0001488404044080L});
    public static final BitSet FOLLOW_RSQBR_in_tuple1220 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_term_in_slot1256 = new BitSet(new long[]{0x0000040000000000L});
    public static final BitSet FOLLOW_SLOT_ARROW_in_slot1258 = new BitSet(new long[]{0x0001480404044080L});
    public static final BitSet FOLLOW_term_in_slot1262 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_const_string_in_constant1296 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_CURIE_in_constant1310 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_NUMBER_in_constant1332 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ID_in_constant1352 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_IRI_REF_in_constant1383 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_TOP_in_constant1402 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_STRING_in_const_string1427 = new BitSet(new long[]{0x0008200000000002L});
    public static final BitSet FOLLOW_SYMSPACE_OPER_in_const_string1431 = new BitSet(new long[]{0x0000000004000080L});
    public static final BitSet FOLLOW_IRI_REF_in_const_string1436 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_CURIE_in_const_string1440 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_51_in_const_string1449 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_VAR_ID_in_variable1506 = new BitSet(new long[]{0x0000000000000002L});

}