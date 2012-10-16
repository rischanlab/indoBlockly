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
 * @fileoverview Generating Dart for math blocks.
 * @author fraser@google.com (Neil Fraser)
 * Due to the frequency of long strings, the 80-column wrap rule need not apply
 * to language files.
 * 
 * MODIFIED BY INDOBLOCKLY
 * aanx04 2012
 * 
 */

Blockly.C = Blockly.Generator.get('C');

Blockly.C.math_number = function() {
  // Numeric value.
  return window.parseFloat(this.getTitleText('NUM'));
};

Blockly.C.math_arithmetic = function(opt_dropParens) {
  // Basic arithmetic operators, and power.
  var argument0 = Blockly.C.valueToCode(this, 'A') || '0';
  var argument1 = Blockly.C.valueToCode(this, 'B') || '0';
  var code;

  var mode = this.getInputLabelValue('B');
  if (mode == 'POWER') {
    code = 'pow(' + argument0 + ', ' + argument1 + ')';
  } else {
    var operator = Blockly.C.math_arithmetic.OPERATORS[mode];
    code = argument0 + operator + argument1;
    if (!opt_dropParens) {
      code = '(' + code + ')';
    }
  }
  return code;
};

Blockly.C.math_arithmetic.OPERATORS = {
  ADD: ' + ',
  MINUS: ' - ',
  MULTIPLY: ' * ',
  DIVIDE: ' / '
};

Blockly.C.math_change = function() {
  // Add to a variable in place.
  var argument0 = Blockly.C.valueToCode(this, 'DELTA') || '0';
  var varName = Blockly.C.variableDB_.getName(this.getTitleText('VAR'),
      Blockly.Variables.NAME_TYPE);
  return varName + ' = (' + varName + ' is num ? ' + varName + ' : 0) + ' +
      argument0 + ';\n';
};

Blockly.C.math_single = function(opt_dropParens) {
  // Math operators with single operand.
  var argNaked = Blockly.C.valueToCode(this, 'NUM', true) || '0';
  var argParen = Blockly.C.valueToCode(this, 'NUM', false) || '0';
  var argDartSafe = argNaked;
  if (!argDartSafe.match(/^[\w\.]+$/)) {
    // -4.abs() returns -4 in Dart due to strange order of operation choices.
    // Need to wrap non-trivial numbers in parentheses: (-4).abs()
    argDartSafe = '(' + argDartSafe + ')';
  }
  var operator = this.getInputLabelValue('NUM');
  var code;
  // First, handle cases which generate values that don't need parentheses.
  
  switch (operator) {
    case 'ABS':
      code =  'abs('+argDartSafe+')';
      break;
    case 'ROOT':
      code = 'sqrt(' + argNaked + ')';
      break;
    case 'LN':
      code = 'log(' + argNaked + ')';
      break;
    case 'EXP':
      code = 'exp(' + argNaked + ')';
      break;
    case 'POW10':
      code = 'pow(10,' + argNaked + ')';
    case 'ROUND':
      
      code = 'ceil('+argDartSafe+')';
      break;
    case 'ROUNDUP':
      code = 'ceil('+argDartSafe+')';
      break;
    case 'ROUNDDOWN':
      code = 'floor('+argParen+')';
      break;
    case 'SIN':
      code = 'sin(' + argParen + ')';
      break;
    case 'COS':
      code = 'cos(' + argParen + ')';
      break;
    case 'TAN':
      code = 'tan(' + argParen + ')';
      break;
    case 'NEG':
      code = '-' + argParen;
      break;
    case 'LOG10':
      code = 'log10(' + argNaked + ')';
      break;
    case 'ASIN':
      code = 'asin(' + argNaked + ')';
      break;
    case 'ACOS':
      code = 'acos(' + argNaked + ')';
      break;
    case 'ATAN':
      code = 'atan(' + argNaked + ')';
      break;
    default:
      throw 'Unknown math operator.';
  }
  if (code) {
    return code;
  }
  // Second, handle cases which generate values that may need parentheses.
  
  if (!opt_dropParens) {
    code = '(' + code + ')';
  }
  return code;
};

// Rounding functions have a single operand.
Blockly.C.math_round = Blockly.C.math_single;
// Trigonometry functions have a single operand.
Blockly.C.math_trig = Blockly.C.math_single;

Blockly.C.math_on_list = function() {
  // Rounding functions.
  func = this.getTitleValue('OP');
  list = Blockly.C.valueToCode(this, 'LIST', true) || '[]';
  var code;
  switch (func) {
    case 'SUM':
      if (!Blockly.C.definitions_['math_sum']) {
        var functionName = Blockly.C.variableDB_.getDistinctName(
            'math_sum', Blockly.Generator.NAME_TYPE);
        Blockly.C.math_on_list.math_sum = functionName;
        var func = [];
        func.push('Dynamic ' + functionName + '(List myList) {');
        func.push('  var sumVal = 0;');
        func.push('  myList.forEach((num entry) {sumVal += entry;});');
        func.push('  return sumVal;');
        func.push('}');
        Blockly.C.definitions_['math_sum'] = func.join('\n');
      }
      code = Blockly.C.math_on_list.math_sum + '(' + list + ')';
      break;
    case 'MIN':
      if (!Blockly.C.definitions_['math_min']) {
        var functionName = Blockly.C.variableDB_.getDistinctName(
            'math_min', Blockly.Generator.NAME_TYPE);
        Blockly.C.math_on_list.math_min = functionName;
        var func = [];
        func.push('Dynamic ' + functionName + '(List myList) {');
        func.push('  if (myList.isEmpty()) return;');
        func.push('  var minVal = myList[0];');
        func.push('  myList.forEach((num entry) {minVal = Math.min(minVal, entry);});');
        func.push('  return minVal;');
        func.push('}');
        Blockly.C.definitions_['math_min'] = func.join('\n');
      }
      code = Blockly.C.math_on_list.math_min + '(' + list + ')';
      break;
    case 'MAX':
      if (!Blockly.C.definitions_['math_max']) {
        var functionName = Blockly.C.variableDB_.getDistinctName(
            'math_max', Blockly.Generator.NAME_TYPE);
        Blockly.C.math_on_list.math_max = functionName;
        var func = [];
        func.push('Dynamic ' + functionName + '(List myList) {');
        func.push('  if (myList.isEmpty()) return;');
        func.push('  var maxVal = myList[0];');
        func.push('  myList.forEach((num entry) {maxVal = Math.max(maxVal, entry);});');
        func.push('  return maxVal;');
        func.push('}');
        Blockly.C.definitions_['math_max'] = func.join('\n');
      }
      code = Blockly.C.math_on_list.math_max + '(' + list + ')';
      break;
    case 'AVERAGE':
      if (!Blockly.C.definitions_['math_average']) {
        var functionName = Blockly.C.variableDB_.getDistinctName(
            'math_average', Blockly.Generator.NAME_TYPE);
        Blockly.C.math_on_list.math_average = functionName;
        var func = [];
        func.push('Dynamic ' + functionName + '(List myList) {');
        func.push('  if (myList.isEmpty()) return;');
        func.push('  var sumVal = 0;');
        func.push('  myList.forEach((num entry) {sumVal += entry;});');
        func.push('  return sumVal / myList.length;');
        func.push('}');
        Blockly.C.definitions_['math_average'] = func.join('\n');
      }
      code = Blockly.C.math_on_list.math_average + '(' + list + ')';
      break;
    case 'MEDIAN':
      if (!Blockly.C.definitions_['math_median']) {
        var functionName = Blockly.C.variableDB_.getDistinctName(
            'math_median', Blockly.Generator.NAME_TYPE);
        Blockly.C.math_on_list.math_median = functionName;
        var func = [];
        func.push('Dynamic ' + functionName + '(List myList) {');
        func.push('  // First filter list for numbers only, then sort, then return middle value');
        func.push('  // or the average of two middle values if list has an even number of elements.');
        func.push('  List localList = myList.filter((a) => a is num);');
        func.push('  if (localList.isEmpty()) return;');
        func.push('  localList.sort((a, b) => (a - b));');
        func.push('  int index = (localList.length / 2).toInt();');
        func.push('  if (localList.length.isOdd()) {');
        func.push('    return localList[index];');
        func.push('  } else {');
        func.push('    return (localList[index - 1] + localList[index]) / 2;');
        func.push('  }');
        func.push('}');
        Blockly.C.definitions_['math_median'] = func.join('\n');
      }
      code = Blockly.C.math_on_list.math_median + '(' + list + ')';
      break;
    case 'MODE':
      if (!Blockly.C.definitions_['math_modes']) {
        var functionName = Blockly.C.variableDB_.getDistinctName(
            'math_modes', Blockly.Generator.NAME_TYPE);
        Blockly.C.math_on_list.math_modes = functionName;
        // As a list of numbers can contain more than one mode,
        // the returned result is provided as an array.
        // Mode of [3, 'x', 'x', 1, 1, 2, '3'] -> ['x', 1].
        var func = [];
        func.push('Dynamic ' + functionName + '(values) {');
        func.push('  var modes = [];');
        func.push('  var counts = [];');
        func.push('  var maxCount = 0;');
        func.push('  for (var i = 0; i < values.length; i++) {');
        func.push('    var value = values[i];');
        func.push('    var found = false;');
        func.push('    var thisCount;');
        func.push('    for (var j = 0; j < counts.length; j++) {');
        func.push('      if (counts[j][0] === value) {');
        func.push('        thisCount = ++counts[j][1];');
        func.push('        found = true;');
        func.push('        break;');
        func.push('      }');
        func.push('    }');
        func.push('    if (!found) {');
        func.push('      counts.add([value, 1]);');
        func.push('      thisCount = 1;');
        func.push('    }');
        func.push('    maxCount = Math.max(thisCount, maxCount);');
        func.push('  }');
        func.push('  for (var j = 0; j < counts.length; j++) {');
        func.push('    if (counts[j][1] == maxCount) {');
        func.push('        modes.add(counts[j][0]);');
        func.push('    }');
        func.push('  }');
        func.push('  return modes;');
        func.push('}');
        Blockly.C.definitions_['math_modes'] = func.join('\n');
      }
      code = Blockly.C.math_on_list.math_modes + '(' + list + ')';
      break;
    case 'STD_DEV':
      if (!Blockly.C.definitions_['math_standard_deviation']) {
        var functionName = Blockly.C.variableDB_.getDistinctName(
            'math_standard_deviation', Blockly.Generator.NAME_TYPE);
        Blockly.C.math_on_list.math_standard_deviation = functionName;
        var func = [];
        func.push('Dynamic ' + functionName + '(myList) {');
        func.push('  List numbers = myList.filter((a) => a is num);');
        func.push('  if (numbers.isEmpty()) return;');
        func.push('  var n = numbers.length;');
        func.push('  var sum = 0;');
        func.push('  numbers.forEach((x) => sum += x);');
        func.push('  var mean = sum / n;');
        func.push('  var sumSquare = 0;');
        func.push('  numbers.forEach((x) => sumSquare += Math.pow(x - mean, 2));');
        func.push('  var standard_dev = Math.sqrt(sumSquare / n);');
        func.push('  return standard_dev;');
        func.push('}');
        Blockly.C.definitions_['math_standard_deviation'] = func.join('\n');
      }
      code = Blockly.C.math_on_list.math_standard_deviation + '(' + list + ')';
      break;
    case 'RANDOM':
      code = list + '[(Math.random() * ' + list + '.length).floor().toInt()]';
      break;
    default:
      throw 'Unknown operator.';
  }
  return code;
};

Blockly.C.math_constrain = function() {
  // Constrain a number between two limits.
  var argument0 = Blockly.C.valueToCode(this, 'VALUE', true) || '0';
  var argument1 = Blockly.C.valueToCode(this, 'LOW', true) || '0';
  var argument2 = Blockly.C.valueToCode(this, 'HIGH', true) || '0';
  return 'Math.min(Math.max(' + argument0 + ', ' + argument1 + '), ' + argument2 + ')';
};

Blockly.C.math_modulo = function(opt_dropParens) {
  // Remainder computation.
  var argument0 = Blockly.C.valueToCode(this, 'DIVIDEND') || '0';
  var argument1 = Blockly.C.valueToCode(this, 'DIVISOR') || '0';
  var code = argument0 + ' % ' + argument1;
  if (!opt_dropParens) {
    code = '(' + code + ')';
  }
  return code;
};

Blockly.C.math_random_int = function() {
  // Random integer between [X] and [Y].
  var argument0 = Blockly.C.valueToCode(this, 'FROM') || '0';
  var argument1 = Blockly.C.valueToCode(this, 'TO') || '0';
  var rand1 = '(Math.random() * (' + argument1 + ' - ' + argument0 + ' + 1' +
      ') + ' + argument0 + ').floor()';
  var rand2 = '(Math.random() * (' + argument0 + ' - ' + argument1 + ' + 1' +
      ') + ' + argument1 + ').floor()';
  var code;
  if (argument0.match(/^[\d\.]+$/) && argument1.match(/^[\d\.]+$/)) {
    if (parseFloat(argument0) < parseFloat(argument1)) {
      code = rand1;
    } else {
      code = rand2;
    }
  } else {
    code = argument0 + ' < ' + argument1 + ' ? ' + rand1 + ' : ' + rand2;
  }
  return code;
};

Blockly.C.math_random_float = function() {
  // Random fraction between 0 and 1.
  return 'Math.random()';
};
