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
 * @fileoverview Generating Dart for variable blocks.
 * @author fraser@google.com (Neil Fraser)
 * Due to the frequency of long strings, the 80-column wrap rule need not apply
 * to language files.
 * 
 * MODIFIED BY INDOBLOCKLY
 * aanx04 2012
 */

Blockly.C = Blockly.Generator.get('C');

Blockly.C.procedures_defreturn = function() {
  // Define a procedure with a return value.
  var funcName = Blockly.C.variableDB_.getName(this.getTitleText('NAME'),
      Blockly.Procedures.NAME_TYPE);
  var branch = Blockly.C.statementToCode(this, 'STACK');
  var returnValue = Blockly.C.valueToCode(this, 'RETURN', true) || '';
  
  var returnType = returnValue ? 'dynamic' : 'void';
  //jika dynamic maka kemungkinan int, float
  
  
  if (returnValue) {
    returnValue = '  return ' + returnValue + ';\n';
  }
  var code = returnType + ' ' + funcName + '() {\n' +
      branch + returnValue + '}\n';
  code = Blockly.C.scrub_(this, code);
  Blockly.C.definitions_[funcName] = code;
  return null;
};

// Defining a procedure without a return value uses the same generator as
// a procedure with a return value.
Blockly.C.procedures_defnoreturn = Blockly.C.procedures_defreturn;

// Defining a procedure without a return value uses the same generator as
// a procedure with a return value.
Blockly.C.procedures_defnoreturn = Blockly.C.procedures_defreturn;

Blockly.C.procedures_callreturn = function() {
  // Call a procedure with a return value.
  var funcName = Blockly.C.variableDB_.getName(this.getTitleText('NAME'),
      Blockly.Procedures.NAME_TYPE);
  var code = funcName + '()';
  return code;
};

Blockly.C.procedures_callnoreturn = function() {
  // Call a procedure with no return value.
  var funcName = Blockly.C.variableDB_.getName(this.getTitleText('NAME'),
      Blockly.Procedures.NAME_TYPE);
  var code = funcName + '();\n';
  return code;
};
