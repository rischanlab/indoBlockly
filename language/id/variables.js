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
 * @fileoverview Variable blocks for Blockly.
 * @author fraser@google.com (Neil Fraser)
 * Due to the frequency of long strings, the 80-column wrap rule need not apply
 * to language files.
 */
//untuk mngganti nama variables dan procedures di pilihan berada di _messages.js
if (!Blockly.Language) Blockly.Language = {};

Blockly.Language.variables_get = {
  // Variable getter.
  category: null,  // Variables are handled specially.
  helpUrl: 'http://en.wikipedia.org/wiki/Variable_(computer_science)',
  init: function() {
    this.setColour(20);
    this.appendTitle('ambil'); //awalnya get
    this.appendTitle(new Blockly.FieldDropdown(
        Blockly.Variables.dropdownCreate, Blockly.Variables.dropdownChange),
        'VAR').setText('nilai'); //awalnya ('item')
    this.setOutput(true, null);
    this.setTooltip('Returns the value of this variable.');
  },
  getVars: function() {
    return [this.getTitleText('VAR')];
  },
  renameVar: function(oldName, newName) {
    if (Blockly.Names.equals(oldName, this.getTitleText('VAR'))) {
      this.setTitleText(newName, 'VAR');
    }
  }
};

Blockly.Language.variables_set = {
  // Variable setter.
  category: null,  // Variables are handled specially.
  helpUrl: 'http://en.wikipedia.org/wiki/Variable_(computer_science)',
  init: function() {
    this.setColour(20);
    this.appendTitle('atur'); //awalnya set
    this.appendTitle(new Blockly.FieldDropdown(
        Blockly.Variables.dropdownCreate, Blockly.Variables.dropdownChange),
        'VAR').setText('nilai'); //awalny ('item')
    this.appendInput('', Blockly.INPUT_VALUE, 'VALUE', null);
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('Sets this variable to be equal to the input.');
  },
  getVars: function() {
    return [this.getTitleText('VAR')];
  },
  renameVar: function(oldName, newName) {
    if (Blockly.Names.equals(oldName, this.getTitleText('VAR'))) {
      this.setTitleText(newName, 'VAR');
    }
  }
};
