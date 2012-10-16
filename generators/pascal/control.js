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
 * @fileoverview Generating Pascal for control blocks.
 * @author fraser@google.com (Neil Fraser)
 * Due to the frequency of long strings, the 80-column wrap rule need not apply
 * to language files.
 */

Blockly.Pascal = Blockly.Generator.get('Pascal');

Blockly.Pascal.controls_if = function() {
  // If/elseif/else condition.
  var n = 0;
  var argument = Blockly.Pascal.valueToCode(this, 'IF' + n,
      Blockly.Pascal.ORDER_NONE) || 'false';
  var branch = Blockly.Pascal.statementToCode(this, 'DO' + n);
  var code = 'if (' + argument + ') then begin\n' + branch + 'end';
  for (n = 1; n <= this.elseifCount_; n++) {
    argument = Blockly.Pascal.valueToCode(this, 'IF' + n, 
      Blockly.Pascal.ORDER_NONE) || 'false';
    branch = Blockly.Pascal.statementToCode(this, 'DO' + n);
    code += '\nelse if (' + argument + ') then begin\n' + branch + 'end';
  }
  if (this.elseCount_) {
    branch = Blockly.Pascal.statementToCode(this, 'ELSE');
    code += '\nelse begin\n' + branch + 'end';
  }
  return code + ';\n';
};

Blockly.Pascal.controls_whileUntil = function() {
  // Do while/until loop.
  var argument0 = Blockly.Pascal.valueToCode(this, 'BOOL',
      Blockly.Pascal.ORDER_NONE) || 'false';
  var branch0 = Blockly.Pascal.statementToCode(this, 'DO');
  if (this.getTitleValue('MODE') == 'UNTIL') {
    if (!argument0.match(/^\w+$/)) {
      argument0 = '(' + argument0 + ')';
    }
    argument0 = '!' + argument0;
  }
  return 'while (' + argument0 + ') do begin\n' + branch0 + 'end\n';
};

Blockly.Pascal.controls_for = function() {
  // For loop.
  var variable0 = Blockly.Pascal.variableDB_.getName(
      this.getInputVariable('VAR'), Blockly.Variables.NAME_TYPE);
  var argument0 = Blockly.Pascal.valueToCode(this, 'FROM',
      Blockly.Pascal.ORDER_ASSIGNMENT) || '0';
  var argument1 = Blockly.Pascal.valueToCode(this, 'TO',
      Blockly.Pascal.ORDER_ASSIGNMENT) || '0';
  var branch0 = Blockly.Pascal.statementToCode(this, 'DO');
  var code;
  
  // Store the variable's type.
  Blockly.Pascal.listVarType[variable0] = 'Integer';
  
  // Store the variable's value (experimental).
  Blockly.Pascal.listVarValue[varName] = argument0;
  
  if (argument1.match(/^\w+$/)) {
    code = 'for ' + variable0 + ' := ' + argument0 + ' to ' + argument1 + ' do begin\n' +
        branch0 + 'end\n';
  } else {
    // The end value appears to be more complicated than a simple variable.
    // Cache it to a variable to prevent repeated look-ups.
    // Masih bingung masksudnya.
    var endVar = Blockly.Pascal.variableDB_.getDistinctName(
        variable0 + '_end', Blockly.Variables.NAME_TYPE);
    code = 'var ' + endVar + ' = ' + argument1 + ';\n' +
        'for (' + variable0 + ' = ' + argument0 + '; ' + variable0 + ' <= ' + endVar + '; ' + variable0 + '++) {\n' +
        branch0 + '}\n';
  }
  return code;
};

Blockly.Pascal.controls_forEach = function() {
  // For each loop.
  var variable0 = Blockly.Pascal.variableDB_.getName(
      this.getInputVariable('VAR'), Blockly.Variables.NAME_TYPE);
  var argument0 = Blockly.Pascal.valueToCode(this, 'LIST',
      Blockly.Pascal.ORDER_ASSIGNMENT) || '[]';
  var branch0 = Blockly.Pascal.statementToCode(this, 'DO');
  var code;
  var indexVar = Blockly.Pascal.variableDB_.getDistinctName(
      variable0 + '_index', Blockly.Variables.NAME_TYPE);
  if (argument0.match(/^\w+$/)) {
    branch0 = '  ' + variable0 + ' = ' + argument0 + '[' + indexVar + '];\n' + branch0;
    code = 'for (var ' + indexVar + ' in  ' + argument0 + ') {\n' +
        branch0 + '}\n';
  } else {
    // The list appears to be more complicated than a simple variable.
    // Cache it to a variable to prevent repeated look-ups.
    var listVar = Blockly.Pascal.variableDB_.getDistinctName(
        variable0 + '_list', Blockly.Variables.NAME_TYPE);
    branch0 = '  ' + variable0 + ' = ' + listVar + '[' + indexVar + '];\n' + branch0;
    code = 'var ' + listVar + ' = ' + argument0 + ';\n' +
        'for (var ' + indexVar + ' in ' + listVar + ') {\n' +
        branch0 + '}\n';
  }
  return code;
};

Blockly.Pascal.controls_flow_statements = function() {
  // Flow statements: continue, break.
  switch (this.getTitleValue('FLOW')) {
    case 'BREAK':
      return 'break;\n';
    case 'CONTINUE':
      return 'continue;\n';
  }
  throw 'Unknown flow statement.';
};
