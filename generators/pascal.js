/**
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
 * @fileoverview Helper functions for generating Pascal for blocks.
 * @author fraser@google.com (Neil Fraser)
 * Due to the frequency of long strings, the 80-column wrap rule need not apply
 * to language files.
 */

Blockly.Pascal = Blockly.Generator.get('Pascal');

/**
 * List of illegal variable names.
 * This is not intended to be a security feature.  Blockly is 100% client-side,
 * so bypassing this list is trivial.  This is intended to prevent users from
 * accidentally clobbering a built-in object or function.
 * @private
 */
Blockly.Pascal.RESERVED_WORDS_ =

    'absolute, and, array, asm, begin, case, const, constructor, destructor, div, do, downto, else, end, file, for, function, goto, if, implementation, in, inherited, inline, interface, label, mod, nil, not, object, of, on, operator, or, packed, procedure, program, record, reintroduce, repeat, self, set, shl, shr, string, then, to, type, unit, until, uses, var, while, with, xor dispose, exit, false, new, true as, class, dispinterface, except, exports, finalization, finally, initialization, inline, is, library, on, out, packed, property, raise, resourcestring, threadvar, try absolute, abstract, alias, assembler, cdecl, cppdecl, default, export, external, far, far16, forward, index, local, name, near, nostackframe, oldfpccall, override, pascal, private, protected, public, published, read, register, reintroduce, safecall, softfloat, stdcall, virtual, write';

/**
 * Order of operation ENUMs.
 * http://www.Pascallang.org/docs/language-tour/#operators
 */
Blockly.Pascal.ORDER_ATOMIC = 0;         // 0 "" ...
Blockly.Pascal.ORDER_UNARY_POSTFIX = 1;  // expr++ expr-- () [] .
Blockly.Pascal.ORDER_UNARY_PREFIX = 2;   // -expr !expr ~expr ++expr --expr
Blockly.Pascal.ORDER_MULTIPLICATIVE = 3; // * / % ~/
Blockly.Pascal.ORDER_ADDITIVE = 4;       // + -
Blockly.Pascal.ORDER_SHIFT = 5;          // << >>
Blockly.Pascal.ORDER_RELATIONAL = 6;     // is is! >= > <= <
Blockly.Pascal.ORDER_EQUALITY = 7;       // == != === !==
Blockly.Pascal.ORDER_BITWISE_AND = 8;    // &
Blockly.Pascal.ORDER_BITWISE_XOR = 9;    // ^
Blockly.Pascal.ORDER_BITWISE_OR = 10;    // |
Blockly.Pascal.ORDER_LOGICAL_AND = 11;   // &&
Blockly.Pascal.ORDER_LOGICAL_OR = 12;    // ||
Blockly.Pascal.ORDER_CONDITIONAL = 13;   // expr ? expr : expr
Blockly.Pascal.ORDER_ASSIGNMENT = 14;    // = *= /= ~/= %= += -= <<= >>= &= ^= |=
Blockly.Pascal.ORDER_NONE = 99;          // (...)

/**
 * Initialise the database of variable names.
 */
Blockly.Pascal.init = function() {
  // Create a dictionary of definitions to be printed before the code.
  Blockly.Pascal.definitions_ = {};
  
  // Create an array for variable type.
  Blockly.Pascal.listVarType = [];
  // Create an array for variable value (experimental).
  Blockly.Pascal.listVarValue = [];
  
  if (Blockly.Variables) {
    if (!Blockly.Pascal.variableDB_) {
      Blockly.Pascal.variableDB_ =
          new Blockly.Names(Blockly.Pascal.RESERVED_WORDS_.split(','));
    } else {
      Blockly.Pascal.variableDB_.reset();
    }

    var defvars = [];
    var variables = Blockly.Variables.allVariables();
    for (var x = 0; x < variables.length; x++) {
      defvars[x] = Blockly.Pascal.variableDB_.getDistinctName(variables[x], 
      	Blockly.Variables.NAME_TYPE);
    }
    Blockly.Pascal.definitions_['variables'] = defvars.join('\n');
  }
};

/**
 * Prepend the generated code with the variable definitions.
 * @param {string} code Generated code.
 * @return {string} Completed code.
 */
Blockly.Pascal.finish = function(code) {
  // Indent every line.
  code = '  ' + code.replace(/\n/g, '\n  ');
  code = code.replace(/\n\s+$/, '\n');
  code = 'Begin \n' + code + 'End.';

  // Add the variable type
  var def_ = Blockly.Pascal.definitions_['variables'].split('\n');
  for(var i = 0; i<def_.length; i++){
  	if(Blockly.Pascal.listVarType[def_[i]]!=undefined){
  		def_[i] = 'Var ' + def_[i] + ' : ' + Blockly.Pascal.listVarType[def_[i]]
  		 + ';';
  		Blockly.Pascal.definitions_['variables'] = def_.join('\n');
  	}
  }

  // Convert the definitions dictionary into a list.
  var definitions = [];
  for (var name in Blockly.Pascal.definitions_) {
    definitions.push(Blockly.Pascal.definitions_[name]);
  }
  
  return definitions.join('\n') + '\n\n' + code;
};

/**
 * Naked values are top-level blocks with outputs that aren't plugged into
 * anything.  A trailing semicolon is needed to make this legal.
 * @param {string} line Line of generated code.
 * @return {string} Legal line of code.
 */
Blockly.Pascal.scrubNakedValue = function(line) {
  return line + ';\n';
};

/**
 * Encode a string as a properly escaped Pascal string, complete with quotes.
 * @param {string} string Text to encode.
 * @return {string} Pascal string.
 * @private
 */
Blockly.Pascal.quote_ = function(string) {
  // TODO: This is a quick hack.  Replace with goog.string.quote
  string = string.replace(/\\/g, '\\\\')
                 .replace(/\n/g, '\\\n')
                 .replace(/\$/g, '\\$')
                 .replace(/'/g, '\\\'');
  return '\'' + string + '\'';
};

/**
 * Common tasks for generating Pascal from blocks.
 * Handles comments for the specified block and any connected value blocks.
 * Calls any statements following this block.
 * @param {!Blockly.Block} block The current block.
 * @param {string} code The Pascal code created for this block.
 * @return {string} Pascal code with comments and subsequent blocks added.
 * @private
 */
Blockly.Pascal.scrub_ = function(block, code) {
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
