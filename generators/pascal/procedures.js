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
 * @fileoverview Generating Pascal for variable blocks.
 * @author fraser@google.com (Neil Fraser)
 * Due to the frequency of long strings, the 80-column wrap rule need not apply
 * to language files.
 */

Blockly.Pascal = Blockly.Generator.get('Pascal');

Blockly.Pascal.procedures_defreturn = function() {
  // Define a procedure with a return value.
  var funcName = Blockly.Pascal.variableDB_.getName(this.getTitleText('NAME'),
      Blockly.Procedures.NAME_TYPE);
  var branch = Blockly.Pascal.statementToCode(this, 'STACK');
  var returnValue = Blockly.Pascal.valueToCode(this, 'RETURN',
      Blockly.Pascal.ORDER_NONE) || '';
  if (returnValue) {
    returnValue = '  return ' + returnValue + ';\n';
  }
  var returnType = returnValue ? 'dynamic' : 'void';
  var args = [];
  for (var x = 0; x < this.arguments_.length; x++) {
    args[x] = Blockly.Pascal.variableDB_.getName(this.arguments_[x],
        Blockly.Variables.NAME_TYPE);
  }
  var code = returnType + ' ' + funcName + '(' + args.join(', ') + ') {\n' +
      branch + returnValue + '}\n';
  code = Blockly.Pascal.scrub_(this, code);
  Blockly.Pascal.definitions_[funcName] = code;
  return null;
};

// Defining a procedure without a return value uses the same generator as
// a procedure with a return value.
Blockly.Pascal.procedures_defnoreturn = Blockly.Pascal.procedures_defreturn;

Blockly.Pascal.procedures_callreturn = function() {
  // Call a procedure with a return value.
  var funcName = Blockly.Pascal.variableDB_.getName(this.getTitleText('NAME'),
      Blockly.Procedures.NAME_TYPE);
  var args = [];
  for (var x = 0; x < this.arguments_.length; x++) {
    args[x] = Blockly.Pascal.valueToCode(this, 'ARG' + x,
        Blockly.Pascal.ORDER_NONE) || 'null';
  }
  var code = funcName + '(' + args.join(', ') + ')';
  return [code, Blockly.Pascal.ORDER_UNARY_POSTFIX];
};

Blockly.Pascal.procedures_callnoreturn = function() {
  // Call a procedure with no return value.
  var funcName = Blockly.Pascal.variableDB_.getName(this.getTitleText('NAME'),
      Blockly.Procedures.NAME_TYPE);
  var args = [];
  for (var x = 0; x < this.arguments_.length; x++) {
    args[x] = Blockly.Pascal.valueToCode(this, 'ARG' + x,
        Blockly.Pascal.ORDER_NONE) || 'null';
  }
  var code = funcName + '(' + args.join(', ') + ');\n';
  return code;
};
