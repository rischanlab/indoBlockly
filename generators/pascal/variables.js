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

Blockly.Pascal.variables_get = function() {
  // Variable getter.
  var code = Blockly.Pascal.variableDB_.getName(this.getTitleText('VAR'),
      Blockly.Variables.NAME_TYPE);
  return [code, Blockly.Pascal.ORDER_ATOMIC];
};

Blockly.Pascal.variables_set = function() {
  // Variable setter.
  var argument0 = Blockly.Pascal.valueToCode(this, 'VALUE',
      Blockly.Pascal.ORDER_ASSIGNMENT) || '0';
  var varName = Blockly.Pascal.variableDB_.getName(this.getTitleText('VAR'),
      Blockly.Variables.NAME_TYPE);
  
  // Store the variable's value (experimental).
  Blockly.Pascal.listVarValue[varName] = argument0;
  
  // Function to check array.
  checkArray = function(value_){
  	var pattern = /^\([\w\, \']*\)$/g;
  	return pattern.test(value_);
  };
  // Function to check whether the value is from other variable or not
  checkVariable = function(value_){
  	var variables = Blockly.Variables.allVariables();
  	for(var i = 0; i<variables.length; i++){
  		if(value_ == variables[i]) return true;
  	}
  	return false;
  }
  // Function to check string data type.
  checkString = function(value_){
  	var pattern = /^'{1}[\w]*'{1}$/g;
  	return pattern.test(value_);
  };
  // Function to check integer data type.
  checkInteger = function(value_){
  	var pattern = /^(\+|-)?[\d]+$/g;
  	return pattern.test(value_);
  };
  // Function to check float data type.
  checkFloat = function(value_){
  	var pattern = /^[\d]+.{1}[\d]+$/g;
  	return pattern.test(value_);
  };
  // Function to check math operation
  checkMath = function(value_){
  	var pattern = /[\+\-\/\*\^]/g;
  	return pattern.test(value_);
  }
  // Function to determine the variable type.
  checkVarType = function(varname_, value_){
  	var type;
  	if(checkVariable(value_)){
    	if((type = Blockly.Pascal.listVarType[value_]) && varname_ == value_){
    		type = 'Integer';
    	}
    } else if(checkString(value_)){ 
  		type = 'String';
    } else if(checkInteger(value_)){
    	type = 'Integer';
    } else if(checkFloat(value_) || checkMath(value_)){
    	type = 'Double';
    } else{
    	type = 'Integer';
    }
    return Blockly.Pascal.listVarType[varname_] = type;
  }
  
  if(checkArray(argument0)){
  	var elements = argument0.replace(/[ \(\)]/g,'').split(',');
  	var arraySize = elements.length;
  	var code;
  	var type;
  	if(checkVariable(elements[0])){
  		if((type = Blockly.Pascal.listVarType[elements[0]]) == undefined){
  			type = 'Integer';
  		}
  	} else{
  		type = checkVarType(varName,elements[0]);
  	}
  	if(arraySize > 1){
  		code = 'Array [0..' + (arraySize-1) + '] of ' + type;
  	} else{
  		code = 'Array [0..0] of ' + type;
  	}
  	Blockly.Pascal.listVarType[varName] = code;
  } else{
  	checkVarType(varName, argument0);
  }
  return varName + ' := ' + argument0 + ';\n';
};
