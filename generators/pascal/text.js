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
 * @fileoverview Generating Pascal for text blocks.
 * @author fraser@google.com (Neil Fraser)
 * Due to the frequency of long strings, the 80-column wrap rule need not apply
 * to language files.
 */

Blockly.Pascal = Blockly.Generator.get('Pascal');

Blockly.Pascal.text = function() {
  // Text value.
  var code = Blockly.Pascal.quote_(this.getTitleText('TEXT'));
  return [code, Blockly.Pascal.ORDER_ATOMIC];
};

Blockly.Pascal.text_join = function() {
  // Create a string made up of any number of elements of any type.
  var code;
  if (this.itemCount_ == 0) {
    return ['\'\'', Blockly.Pascal.ORDER_ATOMIC];
  } else if (this.itemCount_ == 1) {
    var argument0 = Blockly.Pascal.valueToCode(this, 'ADD0',
        Blockly.Pascal.ORDER_UNARY_POSTFIX) || '\'\'';
    code = argument0 + '.toString()';
    return [code, Blockly.Pascal.ORDER_UNARY_POSTFIX];
  } else {
    code = [];
    code[0] = 'new StringBuffer(' + (Blockly.Pascal.valueToCode(this, 'ADD0',
        Blockly.Pascal.ORDER_NONE) || '\'\'') + ')';
    for (var n = 1; n < this.itemCount_; n++) {
      code[n] = '.add(' + (Blockly.Pascal.valueToCode(this, 'ADD' + n,
          Blockly.Pascal.ORDER_NONE) || '\'\'') + ')';
    }
    code = code.join('') + '.toString()';
    return [code, Blockly.Pascal.ORDER_UNARY_POSTFIX];
  }
};

Blockly.Pascal.text_length = function() {
  // String length.
  var argument0 = Blockly.Pascal.valueToCode(this, 'VALUE',
      Blockly.Pascal.ORDER_UNARY_POSTFIX) || '\'\'';
  return [argument0 + '.length', Blockly.Pascal.ORDER_UNARY_POSTFIX];
};

Blockly.Pascal.text_isEmpty = function() {
  // Is the string null?
  var argument0 = Blockly.Pascal.valueToCode(this, 'VALUE',
      Blockly.Pascal.ORDER_UNARY_POSTFIX) || '\'\'';
  return [argument0 + '.isEmpty()', Blockly.Pascal.ORDER_UNARY_POSTFIX];
};

Blockly.Pascal.text_endString = function() {
  // Return a leading or trailing substring.
  var first = this.getTitleValue('END') == 'FIRST';
  var code;
  if (first) {
    var argument0 = Blockly.Pascal.valueToCode(this, 'NUM',
        Blockly.Pascal.ORDER_NONE) || '1';
    var argument1 = Blockly.Pascal.valueToCode(this, 'TEXT',
        Blockly.Pascal.ORDER_UNARY_POSTFIX) || '\'\'';
    code = argument1 + '.substring(0, ' + argument0 + ')';
  } else {
    if (!Blockly.Pascal.definitions_['text_tailString']) {
      var functionName = Blockly.Pascal.variableDB_.getDistinctName('text_tailString',
          Blockly.Generator.NAME_TYPE);
      Blockly.Pascal.text_endString.text_tailString = functionName;
      var func = [];
      func.push('String ' + functionName + '(n, myString) {');
      func.push('  // Return a trailing substring of n characters.');
      func.push('  return myString.substring(myString.length - n);');
      func.push('}');
      Blockly.Pascal.definitions_['text_tailString'] = func.join('\n');
    }
    var argument0 = Blockly.Pascal.valueToCode(this, 'NUM',
        Blockly.Pascal.ORDER_NONE) || '1';
    var argument1 = Blockly.Pascal.valueToCode(this, 'TEXT',
        Blockly.Pascal.ORDER_NONE) || '\'\'';
    code = Blockly.Pascal.text_endString.text_tailString +
        '(' + argument0 + ', ' + argument1 + ')';
  }
  return [code, Blockly.Pascal.ORDER_UNARY_POSTFIX];
};

Blockly.Pascal.text_indexOf = function() {
  // Search the text for a substring.
  var operator = this.getTitleValue('END') == 'FIRST' ? 'indexOf' : 'lastIndexOf';
  var argument0 = Blockly.Pascal.valueToCode(this, 'FIND',
      Blockly.Pascal.ORDER_NONE) || '\'\'';
  var argument1 = Blockly.Pascal.valueToCode(this, 'VALUE',
      Blockly.Pascal.ORDER_UNARY_POSTFIX) || '\'\'';
  var code = argument1 + '.' + operator + '(' + argument0 + ') + 1';
  return [code, Blockly.Pascal.ORDER_UNARY_POSTFIX];
};

Blockly.Pascal.text_charAt = function() {
  // Get letter at index.
  var argument0 = Blockly.Pascal.valueToCode(this, 'AT',
      Blockly.Pascal.ORDER_NONE) || '1';
  var argument1 = Blockly.Pascal.valueToCode(this, 'VALUE',
      Blockly.Pascal.ORDER_UNARY_POSTFIX) || '[]';
  // Blockly uses one-based arrays.
  if (argument0.match(/^\d+$/)) {
    // If the index is a naked number, decrement it right now.
    argument0 = parseInt(argument0, 10) - 1;
  } else {
    // If the index is dynamic, decrement it in code.
    argument0 += ' - 1';
  }
  var code = argument1 + '[' + argument0 + ']';
  return [code, Blockly.Pascal.ORDER_UNARY_POSTFIX];
};

Blockly.Pascal.text_changeCase = function() {
  // Change capitalization.
  var mode = this.getTitleValue('CASE');
  var operator = Blockly.Pascal.text_changeCase.OPERATORS[mode];
  var code;
  if (operator) {
    // Upper and lower case are functions built into Pascal.
    var argument0 = Blockly.Pascal.valueToCode(this, 'TEXT',
        Blockly.Pascal.ORDER_UNARY_POSTFIX) || '\'\'';
    code = argument0 + operator;
  } else {
    if (!Blockly.Pascal.definitions_['toTitleCase']) {
      // Title case is not a native Pascal function.  Define one.
      var functionName = Blockly.Pascal.variableDB_.getDistinctName('text_toTitleCase',
          Blockly.Generator.NAME_TYPE);
      Blockly.Pascal.text_changeCase.toTitleCase = functionName;
      var func = [];
      func.push('String ' + functionName + '(str) {');
      func.push('  RegExp exp = const RegExp(@"(\\S+)");');
      func.push('  List<String> list = str.split(exp);');
      func.push('  String title = \'\';');
      func.push('  for (String part in list) {');
      func.push('    if (part.length > 0) {');
      func.push('      title += part[0].toUpperCase();');
      func.push('      if (part.length > 0) {');
      func.push('        title += part.substring(1).toLowerCase();');
      func.push('      }');
      func.push('    }');
      func.push('  }');
      func.push('  return title;');
      func.push('}');
      Blockly.Pascal.definitions_['toTitleCase'] = func.join('\n');
    }
    var argument0 = Blockly.Pascal.valueToCode(this, 'TEXT',
        Blockly.Pascal.ORDER_NONE) || '\'\'';
    code = Blockly.Pascal.text_changeCase.toTitleCase + '(' + argument0 + ')';
  }
  return [code, Blockly.Pascal.ORDER_UNARY_POSTFIX];
};

Blockly.Pascal.text_changeCase.OPERATORS = {
  UPPERCASE: '.toUpperCase()',
  LOWERCASE: '.toLowerCase()',
  TITLECASE: null
};

Blockly.Pascal.text_trim = function() {
  // Trim spaces.
  var mode = this.getTitleValue('MODE');
  var operator = Blockly.Pascal.text_trim.OPERATORS[mode];
  var argument0 = Blockly.Pascal.valueToCode(this, 'TEXT',
      Blockly.Pascal.ORDER_UNARY_POSTFIX) || '\'\'';
  return [argument0 + operator, Blockly.Pascal.ORDER_UNARY_POSTFIX];
};

Blockly.Pascal.text_trim.OPERATORS = {
  LEFT: '.replaceFirst(new RegExp(@"^\\s+"), \'\')',
  RIGHT: '.replaceFirst(new RegExp(@"\\s+$"), \'\')',
  BOTH: '.trim()'
};

Blockly.Pascal.text_print = function() {
  // Print statement.
  var argument0 = Blockly.Pascal.valueToCode(this, 'TEXT',
      Blockly.Pascal.ORDER_NONE) || '\'\'';
  return 'Writeln(' + argument0 + ');\n';
};

Blockly.Pascal.text_prompt = function() {
  // Prompt function.
  Blockly.Pascal.definitions_['import_Pascal_html'] = '#import(\'Pascal:html\');';
  var msg = Blockly.Pascal.quote_(this.getTitleValue('TEXT'));
  var code = 'window.prompt(' + msg + ', \'\')';
  var toNumber = this.getTitleValue('TYPE') == 'NUMBER';
  if (toNumber) {
    code = 'Math.parseDouble(' + code + ')';
  }
  return [code, Blockly.Pascal.ORDER_UNARY_POSTFIX];
};
