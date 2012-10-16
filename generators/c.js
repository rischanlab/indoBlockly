/**
 *
 *
 * Visual Blocks Language
 *
 * Copyright 2012 Google Inc.
 * http://code.google.com/p/blockly/
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * @fileoverview Helper functions for generating Dart for blocks.
 * @author fraser@google.com (Neil Fraser)
 * Due to the frequency of long strings, the 80-column wrap rule need not apply
 * to language files.
 * 
 * 
 * MODIFIED BY INDOBLOCKLY for C Generator
 * aanx04 2012
 */

Blockly.C = Blockly.Generator.get('C');

/**
 * List of illegal variable names.
 * This is not intended to be a security feature.  Blockly is 100% client-side,
 * so bypassing this list is trivial.  This is intended to prevent users from
 * accidentally clobbering a built-in object or function.
 * @private
 */
Blockly.C.RESERVED_WORDS_ =
    // http://www.dartlang.org/docs/spec/latest/dart-language-specification.pdf
    // Section 14.1.1
    'break,case,catch,class,const,continue,default,do,else,extends,false,final,finally,for,if,in,is,new,null,return,super,switch,this,throw,true,try,var,void,while,' +
    // http://api.dartlang.org/dart_core.html
    'AssertionError,bool,Clock,Collection,Comparable,Completer,Date,double,Duration,Dynamic,Expect,FallThroughError,Function,Future,Futures,Hashable,HashMap,HashSet,int,Iterable,Iterator,LinkedHashMap,List,Map,Match,Math,num,Object,Options,Pattern,Queue,RegExp,Set,Stopwatch,String,StringBuffer,Strings,TimeZone,TypeError,BadNumberFormatException,ClosureArgumentMismatchException,EmptyQueueException,Exception,ExpectException,FutureAlreadyCompleteException,FutureNotCompleteException,IllegalAccessException,IllegalArgumentException,IllegalJSRegExpException,IndexOutOfRangeException,IntegerDivisionByZeroException,NoMoreElementsException,NoSuchMethodException,NotImplementedException,NullPointerException,ObjectNotClosureException,OutOfMemoryException,StackOverflowException,UnsupportedOperationException,WrongArgumentCountException';

/**
 * Initialise the database of variable names.
 */
Blockly.C.init = function() {
  // Create a dictionary of definitions to be printed before the code.
  Blockly.C.definitions_ = {};
  Blockly.C.listTypeVar = []; //The key to heaven, this fix my probs..lol
  Blockly.C.maxChar = 100;
  
  if (Blockly.Variables) {
    if (!Blockly.C.variableDB_) {
      Blockly.C.variableDB_ =
          new Blockly.Names(Blockly.C.RESERVED_WORDS_.split(','));
    } else {
      Blockly.C.variableDB_.reset();
    }

    var defvars = [];
    var variables = Blockly.Variables.allVariables();
    for (var x = 0; x < variables.length; x++) {
      defvars[x] = 
          Blockly.C.variableDB_.getDistinctName(variables[x],
          Blockly.Variables.NAME_TYPE) + ';';
    }
    
    Blockly.C.definitions_['variables'] = defvars.join('\n');
  }
};

/**
 * Prepend the generated code with the variable definitions.
 * @param {string} code Generated code.
 * @return {string} Completed code.
 */
Blockly.C.finish = function(code) {
  // Indent every line.
  code = '  ' + code.replace(/\n/g, '\n  ');
  code = code.replace(/\n\s+$/, '\n');
  

  // Convert the definitions dictionary into a list.
  var definitions = [];
  
  for (var name in Blockly.C.definitions_) {
    
    definitions.push(Blockly.C.definitions_[name]);
    
    
  }
  
  
  var newDef = Blockly.C.definitions_['variables'].split('\n');
  for(var i=0;i<newDef.length;i++ ){
      newDef[i] = newDef[i].replace(/(;|\n|\s)/g,'');
      if(Blockly.C.listTypeVar[newDef[i]]!=undefined){
            if(Blockly.C.listTypeVar[newDef[i]] == 'char'){
                newDef[i] = Blockly.C.listTypeVar[newDef[i]]+" "+newDef[i]+"[maxChar];\n";
                
            }else if(Blockly.C.listTypeVar[newDef[i]] == 'int'){
                newDef[i] = Blockly.C.listTypeVar[newDef[i]]+" "+newDef[i]+";";
            }else if(Blockly.C.listTypeVar[newDef[i]].match('arrayint')){
                newDef[i] = "int "+newDef[i]+" ["+Blockly.C.listTypeVar[newDef[i]].replace(/arrayint/g, '')+"];";
            }else if(Blockly.C.listTypeVar[newDef[i]].match('arraychar')){
                newDef[i] = "char "+newDef[i]+" ["+Blockly.C.listTypeVar[newDef[i]].replace(/arraychar/g, '')+"][maxChar];";
            }else if(Blockly.C.listTypeVar[newDef[i]]=='float'){
                newDef[i] = "float "+newDef[i]+";";
            }else{
                 newDef[i] = "int "+newDef[i]+";\n";
            } 
      }else{
		if(newDef[i] != '')
			newDef[i] = "int "+newDef[i]+";\n";
      }
  }
  
  definitions[0] = newDef.join("\n");
  headerc = "//-----------STANDARD LIBRARY------\n#include &lt;stdio.h&gt;\n#include &lt;string.h&gt;\n#include &lt;stdlib.h&gt;\n#include &lt;math.h&gt;\n#include &lt;ctype.h&gt;\n//-----------------------------------\n#define maxChar "+Blockly.C.maxChar+"\n";
  //headerc +="char hasilMergeChar["+Blockly.Dart.maxChar+"];\nchar bufferFloat["+Blockly.Dart.maxChar+"];\n\n";
  
  code = headerc+"\n"+definitions.join("\n") + '\n\nint main() {\n\n\n'+code + '\nreturn 0;\n}';
  
  
  return code;
};

/**
 * Naked values are top-level blocks with outputs that aren't plugged into
 * anything.  A trailing semicolon is needed to make this legal.
 * @param {string} line Line of generated code.
 * @return {string} Legal line of code.
 */
Blockly.C.scrubNakedValue = function(line) {
  return line + ';\n';
};

/**
 * Encode a string as a properly escaped Dart string, complete with quotes.
 * @param {string} string Text to encode.
 * @return {string} Dart string.
 * @private
 */
Blockly.C.quote_ = function(string) {
  // TODO: This is a quick hack.  Replace with goog.string.quote
  string = string.replace(/\\/g, '\\\\')
                 .replace(/\n/g, '\\\n')
                 .replace(/\$/g, '\\$')
                 .replace(/'/g, '\\\'');
  return '"' + string + '"';
};

/**
 * Common tasks for generating Dart from blocks.
 * Handles comments for the specified block and any connected value blocks.
 * Calls any statements following this block.
 * @param {!Blockly.Block} block The current block.
 * @param {string} code The Dart code created for this block.
 * @return {string} Dart code with comments and subsequent blocks added.
 * @private
 */
Blockly.C.scrub_ = function(block, code) {
  if (code === null) {
    // Block has handled code generation itself.
    return '';
  }
  var commentCode = '';
  // Only collect comments for blocks that aren't inline.
  if (!block.outputConnection || !block.outputConnection.targetConnection) {
    // Collect comment for this block.
    var comment = block.getCommentText();
    if (comment) {
      commentCode += Blockly.Generator.prefixLines(comment, '// ') + '\n';
    }
    // Collect comments for all value arguments.
    // Don't collect comments for nested statements.
    for (var x = 0; x < block.inputList.length; x++) {
      if (block.inputList[x].type == Blockly.INPUT_VALUE) {
        var childBlock = block.inputList[x].targetBlock();
        if (childBlock) {
          var comment = Blockly.Generator.allNestedComments(childBlock);
          if (comment) {
            commentCode += Blockly.Generator.prefixLines(comment, '// ');
          }
        }
      }
    }
  }
  var nextBlock = block.nextConnection && block.nextConnection.targetBlock();
  var nextCode = this.blockToCode(nextBlock);
  return commentCode + code + nextCode;
};


