/*
 * TDDemo.java
 *
 * Created on November 19, 2003, 11:36 AM
 */

import jDREW.oo.util.*;
import jDREW.oo.td.*;

import java.util.*;

import java.io.*;
/**
 *
 * @author  marcel
 */
public class TDDemo {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws Exception{
            BufferedReader console = new BufferedReader(new InputStreamReader(System.in));
            
            System.out.print("Class definition(RDFS) (leave blank to not use types): ");
            String rdfsFile = console.readLine().trim();
            
            if(!rdfsFile.equals(""))
                RDFSParser.parseRDFS(rdfsFile);
            
            
            DCParser dcp = new DCParser();
            DCTree dct = new DCTree();
            
            boolean askNext = false;
            boolean printTree = true;
            
            while(true)
            {
                System.out.print("?-> ");
                String line = console.readLine().trim();
                if(line.equalsIgnoreCase("#quit")){
                    System.out.println("Quitting.");
                    break;
                }
                
                if(line.charAt(0) == '#'){
                    int idx = line.indexOf(" ");
                    String command;
                    String arguments;
                    if(idx == -1){
                        command = line.substring(1);
                        arguments = "";
                    }
                    else{
                        command = line.substring(1, idx);
                        arguments = line.substring(idx+1);
                    }
                    if(command.equalsIgnoreCase("loadClausesR")){
                        try{
                            RuleMLParser rmp = new RuleMLParser();
                            rmp.parseRuleMLFile(arguments.trim());
                            dct.loadClauses(rmp.iterator());
                            rmp.clear();
                            rmp = null;
                            System.gc();
                        }catch(Exception e){
                            System.out.println("Error parsing RuleML clauses.");
                            System.out.println(e.getMessage());
                            continue;
                        }
                    }
                    else if(command.equalsIgnoreCase("loadClausesA")){
                        try{
                            DCParser dcp2 = new DCParser();
                            dcp2.parseDCFile(arguments.trim());
                            dct.loadClauses(dcp2.iterator());
                            dcp2.clear();
                            dcp2 = null;
                            System.gc();
                        }catch(Exception e){
                            System.out.println("Error parsing ASCII clauses.");
                            System.out.println(e.getMessage());
                            continue;
                        }
                    }
                    else if(command.equalsIgnoreCase("printClauses")){
                        Iterator it = dct.discTree.getAllClauseIterator();
                        while(it.hasNext()){
                            DefiniteClause dc2 = (DefiniteClause)it.next();
                            System.out.println(dc2.toPrologString());
                        }
                        continue;
                    }
                    else if(command.equalsIgnoreCase("printtree")){
                        if(arguments.equalsIgnoreCase("t") || arguments.equalsIgnoreCase("true")){
                            printTree = true;
                            continue;
                        }
                        else if(arguments.equalsIgnoreCase("f") || arguments.equalsIgnoreCase("false")){
                            printTree = false;
                            continue;
                        }
                        else{
                            System.out.println("Invalid argument: " + arguments);
                            continue;
                        }
                    }
                    else if(command.equalsIgnoreCase("asknext")){
                        if(arguments.equalsIgnoreCase("t") || arguments.equalsIgnoreCase("true")){
                            askNext = true;
                            continue;
                        }
                        else if(arguments.equalsIgnoreCase("f") || arguments.equalsIgnoreCase("false")){
                            askNext = false;
                            continue;
                        }
                        else{
                            System.out.println("Invalid argument: " + arguments);
                            continue;
                        }
                    }
                    else{
                        System.out.println("Invalid Command.");
                        continue;
                    }
                }
                else{
                    DefiniteClause dc;
                    try{
                        dc = dcp.parseQueryString(line);
                    }
                    catch(Exception e){
                        System.err.println("Error parsing query.");
                        continue;
                    }
                    
                    Iterator it = dct.depthFirstSolutionIterator(dc);
                    
                    boolean cont = true;
                    while(cont){
                        if(!it.hasNext()){
                            System.out.println("No (more) Solutions.");
                            break;
                        }
                        DCTree.GoalList gl = (DCTree.GoalList)it.next();
                        System.out.println(gl.toString());
                        System.out.println();
                        if(printTree){
                            System.out.println(dct);
                        }                       
                        
                        if(askNext){
                            boolean ansd = false;
                            
                            while(!ansd){
                                System.out.print("More solutions (y/n): ");
                                String more = console.readLine().trim();
                                if(more.charAt(0) == 'y'){
                                    ansd = true;
                                }
                                else if(more.charAt(0) == 'n'){
                                    ansd = true;
                                    cont = false;
                                }
                            }
                        }
                    }
                }
            }
    }
    
}
