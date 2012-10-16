/**
 * indoBlockly
 *
 * Copyright 2012 indoBlockly Team Developers.
 * http://blockly.developers.or.id
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

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * THIS SCRIPT HAS DEPENDECIES :
 * SKRIP IKI KAGUNGAN DEPEDENSI KARO SKRIP NGISOR IKI:
 * maze.js
 * initjalan.js
 */
var custom_peta = {};



custom_peta.draw = false;

custom_peta.CELL_SIZE = 35;

custom_peta.loadmapStep = 0;

custom_peta.pilihStart = false;

custom_peta.pilihFinish = false;


custom_peta.apakahsudahpilihstart = false;

custom_peta.apakahsudahpilihfinish = false;

/*
 * warna bisa diganti URL karena merupakan implementasi dari css background:url("images.jpg");
 * setting color
 */

custom_peta.warna_start = "green";

custom_peta.warna_finish = "yellow";

custom_peta.warna_saatdiblok = "blue";

custom_peta.warna_garispemisah = "#c6c6c6";

custom_peta.warna_backgroundMAP = "url('../code/layout/gambar/batk.png')";

custom_peta.posisiBackgroundX = -200;

custom_peta.posisiBackgroundY = -280;


custom_peta.inittabelmap = function(){
   var main = document.getElementById("custommap");
   
   custom_peta.arrayPeta = new Array(Maze.MAP.length);
    
     for(var i=0;i<Maze.MAP.length;i++){
         custom_peta.arrayPeta[i] = new Array(Maze.MAP.length);
        for(var j=0;j<Maze.MAP.length;j++){            
                custom_peta.arrayPeta[i][j] = 1;
        }
    }
   
   main.style.position = "absolute";
   main.style.top = 50;
   main.style.left = 100;
   custom_peta.offsetAtas = main.offsetTop;
   custom_peta.offsetKiri = main.offsetLeft;
   
   var increaseTop = custom_peta.offsetAtas;
   var increaseLeft;
   var tebalPemisah = 5;
   
   
   main.style.height = (custom_peta.CELL_SIZE*Maze.BOX)+(tebalPemisah*(Maze.BOX-1));
  main.style.width = (custom_peta.CELL_SIZE*Maze.BOX)+(tebalPemisah*(Maze.BOX-1));
  main.style.background = custom_peta.warna_backgroundMAP; 
  main.style.backgroundPositionX = custom_peta.posisiBackgroundX;
  main.style.backgroundPositionY = custom_peta.posisiBackgroundY;
   
  for(var i=0;i<Maze.MAP.length;i++){    
        
      increaseLeft = custom_peta.offsetKiri;
      
      for(var j=0;j<Maze.MAP.length;j++){         
          var cell = document.createElement("div");
          if(j%2==0 && i%2==0){
              
              cell.id = String(i+"_"+j);  
              cell.style.position = "absolute";
              cell.style.top = increaseTop;
              cell.style.left = increaseLeft;
              cell.style.width = custom_peta.CELL_SIZE;
              cell.style.height = custom_peta.CELL_SIZE;
              //cell.innerHTML = String(i+"_"+j);
              main.appendChild(cell);
              increaseLeft += custom_peta.CELL_SIZE;
              
              
          }else if(j%2==0 && i%2==1){
              cell.id = String(i+"_"+j);  
              cell.style.position = "absolute";
              cell.style.top = increaseTop;
              cell.style.left = increaseLeft;
              cell.style.width = custom_peta.CELL_SIZE;
              cell.style.height = tebalPemisah;
              cell.style.background = custom_peta.warna_garispemisah;              
              main.appendChild(cell);
              increaseLeft += custom_peta.CELL_SIZE;
             
              
          }else if(j%2==1 && i%2==0){
              cell.id = String(i+"_"+j);  
              cell.style.position = "absolute";
              cell.style.top = increaseTop;
              cell.style.left = increaseLeft;
              cell.style.width = tebalPemisah;
              cell.style.height = custom_peta.CELL_SIZE;
              cell.style.background = custom_peta.warna_garispemisah;              
              main.appendChild(cell);
              increaseLeft += tebalPemisah;
              
          }else if(j%2==1 && i%2==1){
              cell.id = String(i+"_"+j);  
              cell.style.position = "absolute";
              cell.style.top = increaseTop;
              cell.style.left = increaseLeft;
              cell.style.width = tebalPemisah;
              cell.style.height = tebalPemisah;
              cell.style.background = custom_peta.warna_garispemisah;              
              main.appendChild(cell);
              increaseLeft += tebalPemisah;
              
          }
          
          
          
      }
      
      if(i%2==0){           
          increaseTop += custom_peta.CELL_SIZE;              
      }else {                          
          increaseTop += tebalPemisah;              
      } 
  }
  
  
  main.onmousedown = function(){
      custom_peta.draw = true;
  }
  
  
  main.onmouseup = function(){
      custom_peta.draw = false;
  }
  
  custom_peta.addList();
  
}

/*
 * fungsi untuk mendaftarkan event handler
 * @param (Number) id element
 * @param (tipe) jika 1 maka pemisah dan 0 adalah blok yang akan digunakan
 */
custom_peta.listenerMAP = function(id,tipe){
    
        
    var elem = document.getElementById(id);
    
    if(tipe==0){
        
        elem.onmouseover = function(){

            if(custom_peta.draw){  
                var index = custom_peta.parsingIDtoIndex(this.id);
                if(custom_peta.arrayPeta[index[0]][index[1]]!= 2 && custom_peta.arrayPeta[index[0]][index[1]]!= 3){
                    this.style.background = custom_peta.warna_saatdiblok;                
                    custom_peta.arrayPeta[index[0]][index[1]]=0;
                }
            }      
        }
        
        elem.onmouseout = function(){

            if(custom_peta.draw){  
                var index = custom_peta.parsingIDtoIndex(this.id);
                if(custom_peta.arrayPeta[index[0]][index[1]]!= 2 && custom_peta.arrayPeta[index[0]][index[1]]!= 3){
                    this.style.background = custom_peta.warna_saatdiblok;                
                    custom_peta.arrayPeta[index[0]][index[1]]=0;
                }
            }      
        }
        
        elem.onmousedown = function(){
             if(custom_peta.pilihStart){               
                custom_peta.pergantianTitikStart(custom_peta.parsingIDtoIndex(this.id));              
                custom_peta.pilihStart = false;
                custom_peta.draw = false;
                custom_peta.apakahsudahpilihstart = true;
            }
            
            if(custom_peta.pilihFinish){
               
                custom_peta.pergantianTitikFinish(custom_peta.parsingIDtoIndex(this.id));
                custom_peta.pilihFinish = false;
                custom_peta.draw = false;
                custom_peta.apakahsudahpilihfinish = true;
            }  
        }
    }else{
        
        elem.onmouseover = function(){
            if(custom_peta.draw){
                this.style.background = custom_peta.warna_saatdiblok;
                var index = custom_peta.parsingIDtoIndex(this.id);
                custom_peta.arrayPeta[index[0]][index[1]]=0;
            }
        }    
    }
}

custom_peta.addList = function(){
    
    
    
    for(var i=0;i<Maze.MAP.length;i++){
        for(var j=0;j<Maze.MAP.length;j++){  
            if(!(i%2==1 && j%2==1)){
                if(i%2==0 && j%2==0)
                    custom_peta.listenerMAP(String(i+"_"+j),0);
                else
                    custom_peta.listenerMAP(String(i+"_"+j),1);
            }
        }
    }
}




custom_peta.parsingIDtoIndex = function(StringId){
    StringID = new Array(2);
    StringID = StringId.split("_",2);
    
    return [parseInt(StringID[0]),parseInt(StringID[1])];
    
    
}

custom_peta.LihatArrayPeta = function(){
    var results = "";
    for(var i=0;i<Maze.MAP.length;i++){
        for(var j=0;j<Maze.MAP.length;j++){  
           results+=custom_peta.arrayPeta[i][j];
        }
        results+="\n";
    }
    alert(results);
}


custom_peta.load_map = function(){ 
    if(custom_peta.apakahsudahpilihstart && custom_peta.apakahsudahpilihfinish){
        Maze.MAP = custom_peta.arrayPeta;
        Maze.init(window.Blockly);
        Maze.pegmanDStart = custom_peta.tentukan_arahPegman(custom_peta.titikStart);
        Maze.reset();
        jalan.peta = custom_peta.arrayPeta;
        jalan.reset();
        jalan.init();
		$('#csm').dialog('close');
    }else{
        alert("Pilih start dan finish dahulu!");
    }
    
}

custom_peta.pilih_start = function(){ 
   
    custom_peta.pilihStart = true;
    
    
}

custom_peta.pilih_finish = function(){ 
   
    custom_peta.pilihFinish = true;
    
    
}


custom_peta.reset = function(){
    custom_peta.pilihStart = false;
    custom_peta.pilihFinish = false;
    custom_peta.draw = false;
    for(var i=0;i<Maze.MAP.length;i++){
        for(var j=0;j<Maze.MAP.length;j++){ 
            custom_peta.arrayPeta[i][j] = 1;
            if(!(i%2==1 && j%2==1)){
                if(i%2==0 && j%2==0){
                    var blok = document.getElementById(i+"_"+j);
                    blok.style.background = "";
                }else{
                    var blok = document.getElementById(i+"_"+j);
                    blok.style.background = custom_peta.warna_garispemisah;
                }
            }
        }
        
    }
}


/*
 * pergantian titik start
 * @param titikStartBaru berupa array 1 dimensi berisi 2 anggota koordinat [y][x]
 */
custom_peta.pergantianTitikStart = function(titikStartBaru){
    
    if(custom_peta.arrayPeta[titikStartBaru[0]][titikStartBaru[1]]!=1 && (titikStartBaru[0]%2==0 && titikStartBaru[1]%2==0)){
        for(var i=0;i<Maze.MAP.length;i++){
            for(var j=0;j<Maze.MAP.length;j++){  
                if(custom_peta.arrayPeta[i][j]==2){
                    custom_peta.arrayPeta[i][j]=0;              
                    var elem = document.getElementById(i+"_"+j);
                    elem.style.background = custom_peta.warna_saatdiblok;
                }
            }

        }    

        custom_peta.titikStart = titikStartBaru;
        custom_peta.arrayPeta[titikStartBaru[0]][titikStartBaru[1]]=2;
        var elem = document.getElementById(titikStartBaru[0]+"_"+titikStartBaru[1]);
        elem.style.background = custom_peta.warna_start;
    }else{
        return false;
    }
}


/*
 * pergantian titik finish
 * @param titikStartBaru berupa array 1 dimensi berisi 2 anggota koordinat [y][x]
 */
custom_peta.pergantianTitikFinish = function(titikStartBaru){
    if(custom_peta.arrayPeta[titikStartBaru[0]][titikStartBaru[1]]!=1 && (titikStartBaru[0]%2==0 && titikStartBaru[1]%2==0)){
        for(var i=0;i<Maze.MAP.length;i++){
            for(var j=0;j<Maze.MAP.length;j++){  
                if(custom_peta.arrayPeta[i][j]==3){
                    custom_peta.arrayPeta[i][j]=0;              
                    var elem = document.getElementById(i+"_"+j);
                    elem.style.background = custom_peta.warna_saatdiblok;
                }
            }

        }    

        custom_peta.titikFinish = titikStartBaru;
        custom_peta.arrayPeta[titikStartBaru[0]][titikStartBaru[1]]=3;
        var elem = document.getElementById(titikStartBaru[0]+"_"+titikStartBaru[1]);
        elem.style.background = custom_peta.warna_finish;
    }else{
        return false;
    }
}

//Maze.NORTH = 0;
//Maze.EAST = 1;
//Maze.SOUTH = 2;
//Maze.WEST = 3;


custom_peta.tentukan_arahPegman = function(koordinatTitikStart){
    
    for(var i=0;i<4;i++){
        var y = koordinatTitikStart[0];
        var x = koordinatTitikStart[1];     
       
        if(i==Maze.NORTH){
            y--;            
        }if(i==Maze.EAST){
            x++;
        }if(i==Maze.SOUTH){
            y++;
        }if(i==Maze.WEST){
            x--;
        }
        
        if(custom_peta.arrayPeta[y]!=undefined){
            if(custom_peta.arrayPeta[y][x]==0 || custom_peta.arrayPeta[y][x]==2 || custom_peta.arrayPeta[y][x]==3){
                return i;
            }
        }
    }
}


