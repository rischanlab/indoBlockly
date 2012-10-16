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
 * MODIFIED BY INDOBLOCKLY
 * aanx04 2012
 * 
 */

Blockly.C = Blockly.Generator.get('C');

Blockly.C.variables_get = function() {
  // Variable getter.
  return Blockly.C.variableDB_.getName(this.getTitleText('VAR'),
      Blockly.Variables.NAME_TYPE);
};

Blockly.C.variables_set = function() {
  // Variable setter.
  var argument0 = Blockly.C.valueToCode(this, 'VALUE', true) || '0';
  var varName = Blockly.C.variableDB_.getName(this.getTitleText('VAR'),
      Blockly.Variables.NAME_TYPE);
    
    
  
        var cekString = /^"+[\w]*"/g;
        var cekFungsiReturnChar = /^(strlwr\(|strupr\(|substring\(|trim\()[\w\W]*/g;
        var cekFungsiReturnFloat = /^(sqrt\(|floor\(|ceil\(|sin\(|cos\(|tan\(|asin\(|acos\(|atan\(|log\(|log10\(|exp\(|pow\()[\w\W]*/g;
        var cekArrayString = /^\[["[\w\W]*"]*\]$/g;
        var cekArrayAngka = /^\[[\d,\s]*\]$/g;
        var cekAngkaFloat = /(\d\.\d|\d\.\s\d)/g;
        var cekVariabel = /^[a-zA-Z_]+[\w]?/g;
        
        
        if(cekArrayString.test(argument0)){
            //jika berupa array string
            if(Blockly.C.listTypeVar[varName]==undefined || Blockly.C.listTypeVar[varName].match(/arraychar/g)==null){
                var cekjumlahElemen = /(",\s"|\w,\s)/g;
                if(argument0.match(cekjumlahElemen) !=null){ 
                    var jumlahElemen = argument0.match(cekjumlahElemen).length+1;
                    Blockly.C.listTypeVar[varName] = 'arraychar'+jumlahElemen;
                    var code = '';
                    var elemen = argument0.replace(/[\s\[\];]/g,'').split(',');
                    for(var i = 0;i<jumlahElemen;i++)
                        code += varName+'['+i+']='+elemen[i]+';\n';
                    return code;
                }else{
                    Blockly.C.listTypeVar[varName] = 'arraychar1';
                }
                
            }
            
        }else if(cekArrayAngka.test(argument0)){
            //jika berupa array angka
            if(Blockly.C.listTypeVar[varName]==undefined || Blockly.C.listTypeVar[varName].match(/arrayint/g)==null){
                var cekjumlahElemen = /(\d,\s|\w,\s)/g;
                if(argument0.match(cekjumlahElemen) !=null){ 
                    var jumlahElemen = argument0.match(cekjumlahElemen).length+1;
                    Blockly.C.listTypeVar[varName] = 'arrayint'+jumlahElemen;
                    var code = '';
                    var elemen = argument0.replace(/[\s\[\];]/g,'').split(',');
                    for(var i = 0;i<jumlahElemen;i++)
                        code += varName+'['+i+']='+elemen[i]+';\n';
                    return code;
                }else{
                    Blockly.C.listTypeVar[varName] = 'arrayint1';
                }
                
            }
        }else if(cekString.test(argument0) || cekFungsiReturnChar.test(argument0)){
               //jika merupakan fungsi return char
            if(Blockly.C.listTypeVar[varName]==undefined || Blockly.C.listTypeVar[varName]!='char'){
                Blockly.C.listTypeVar[varName] = 'char';
            }
            return 'strncpy('+varName + ', ' + argument0 + ',maxChar);\n';
        }else if(cekAngkaFloat.test(argument0)){
            //jika merupakan float
            if(Blockly.C.listTypeVar[varName]==undefined || Blockly.C.listTypeVar[varName]!='float'){
                
                Blockly.C.listTypeVar[varName] = 'float';
            }
        }else if(cekFungsiReturnFloat.test(argument0)){
            //jika merupakan fungsi return float
            if(Blockly.C.listTypeVar[varName]==undefined || Blockly.C.listTypeVar[varName]!='float'){
                
                Blockly.C.listTypeVar[varName] = 'float';
            }
        }else if(cekVariabel.test(argument0)){
            //jika berupa variabel
            
            if(Blockly.C.listTypeVar[argument0]!=undefined && Blockly.C.listTypeVar[argument0]=='char'){
                if(Blockly.C.listTypeVar[varName]==undefined || Blockly.C.listTypeVar[varName]!='char'){                
                    Blockly.C.listTypeVar[varName] = 'char';
                }
                return 'strncpy('+varName + ', ' + argument0 + ',maxChar);\n';
            }else if(Blockly.C.listTypeVar[argument0]!=undefined && Blockly.C.listTypeVar[argument0]=='int'){
                
                Blockly.C.listTypeVar[varName] = 'int';                
            }else if(Blockly.C.listTypeVar[argument0]!=undefined && Blockly.C.listTypeVar[argument0]=='float'){
                Blockly.C.listTypeVar[varName] = 'float';                
            }
        }else{
            //yang lain dianggap int
            if(Blockly.C.listTypeVar[varName]==undefined){
                Blockly.C.listTypeVar[varName] = 'int';
            }
        }
  
  return varName + ' = ' + argument0 + ';\n';
};
