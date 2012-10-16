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


var jalan ={};

//jalan 8x8
jalan.BLOK = 8;

jalan.ATAS = 0;
jalan.KANAN = 1;
jalan.BAWAH = 2;
jalan.KIRI = 3;

jalan.peta = Maze.MAP;



jalan.init = function(){
    /**
 * The maze's map is a 2D array of numbers.
 * 0: Empty space.
 * 1: Wall.
 * 2: Starting square.
 * 3. Finish square.
 */
    jalan.mapOffsetLeft_ = 0;
    jalan.mapOffsetTop_ = 0;
  var element = document.getElementById('map');
//  while (element) {
//     
//    jalan.mapOffsetLeft_ += element.offsetLeft;
//    jalan.mapOffsetTop_ += element.offsetTop;
//    element = element.offsetParent;    
//  }
  
    jalan.mapOffsetLeft_ = element.offsetLeft;
    jalan.mapOffsetTop_ = element.offsetTop;
  
  
    jalan.jarakblok = Maze.SIZE/3;
    
   
    
    
    jalan.buatJalan();
}



jalan.buatJalan = function(){
    var mazemain = document.getElementById("maze_main");
    jalan.jln = new Array();
   
    jalan.blokyangdigunakan = new Array();
    var indexjln = 0;
    
    
   
    for(var i=0;i<jalan.peta.length;i++){
        
            for(var j=0;j<jalan.peta[0].length;j++){
                
                    if(jalan.peta[i][j]==0 || jalan.peta[i][j]==3 || jalan.peta[i][j]==2){
                
                        if(i%2==0 && j%2==0){
                            var Y = jalan.RealPosition(i);
                            var X = jalan.RealPosition(j);
                            
                            jalan.jln[indexjln] = document.createElement("img");
                            jalan.jln[indexjln].id = "blokjalan"+indexjln;
                            jalan.jln[indexjln].style.position = "absolute";
                            jalan.jln[indexjln].style.top = jalan.mapOffsetTop_ + (Y*50);
                            jalan.jln[indexjln].style.left = jalan.mapOffsetLeft_ + (X*50);
                            mazemain.insertBefore(jalan.jln[indexjln],mazemain.firstChild);
                            jalan.blokyangdigunakan[indexjln] = [Y,X]; 
                            indexjln++;
                        }
                        
                       
                       
                        
                    }
               
            }
       
    }
    
   // alert(jalan.blokyangdigunakan.join(".."));
    
    
    
    for(var z=0;z<jalan.blokyangdigunakan.length;z++){
        var elem = document.getElementById("blokjalan"+z);
           
           var gambarblok = "jalan/"+jalan.JenisBlok([jalan.blokyangdigunakan[z][0],jalan.blokyangdigunakan[z][1]])+".png";
            elem.src=gambarblok;
        
    }
    
   
}


jalan.JenisBlok = function(blokjalan){
   //0:atas 1:kanan 2:bawah 3:kiri
    var blokdekat = new Array(0,0,0,0);   
    var direction = new Array();
    var jenisblok="";
   
   for(var i=0;i<4;i++)
        direction[i]=null;
    
    
    if(blokjalan[0]!=0)
        direction[0] = [blokjalan[0]-1,blokjalan[1]]; // apakah blok ada di paling UTARA?
    
    if(blokjalan[0]!=jalan.BOX-1)
        direction[2] = [blokjalan[0]+1,blokjalan[1]]; // apakah blok ada di paling SELATAN?
    
    if(blokjalan[1]!=jalan.BOX-1)
        direction[1] = [blokjalan[0],blokjalan[1]+1]; // apakah blok ada di paling TIMUR?
     
    if(blokjalan[1]!=0)
        direction[3] = [blokjalan[0],blokjalan[1]-1];  //  apakah blok ada di paling BARAT?
   
    
    blokdekat = jalan.CariTembok(direction);
     
    for(j=0;j<4;j++){
        jenisblok +=String(blokdekat[j]);        
    }
    
    return jenisblok;
    
    
}


/*
 * mencari tembok dengan parameter direction berisi arah atas,kanan,bawah,dan kiri...
 * @param direction  arah atas,kanan,bawah,dan kiri
 * @return (Array.<number>) array 1 dimensi berbentuk 1 dan 0... 1 untuk mengindikasikan adanya jalan keluar dari suatu blok
 * 
 */
jalan.CariTembok = function(direction){
    
    var jalankeluar = new Array(0,0,0,0);
    
    direction = jalan.Tembokmapke15x15(direction);
   
      
    for(var j=0;j<4;j++){
        if(direction[j]!=null){
            
                if(jalan.lihatJalanKeluar(j, direction[j])){
                    jalankeluar[j] = 1;
                }      
        }
        
    }
   
    return jalankeluar;
    
}


/*
 * mengecek apakah pemisah dan blok terdekat ada di list indexblockused
 */
jalan.lihatJalanKeluar = function(arah,arr_direction){
    var pemisah = new Array();;
    
            if(arah==jalan.ATAS){ // atas
                pemisah[0] = arr_direction[0]+1;
                pemisah[1] = arr_direction[1];
            }else if(arah==jalan.KANAN){ // kanan
                pemisah[0] = arr_direction[0];
                pemisah[1] = arr_direction[1]-1;
            }else if(arah==jalan.BAWAH){ //bawah
                pemisah[0] = arr_direction[0]-1;
                pemisah[1] = arr_direction[1];
            }else if(arah==jalan.KIRI){ //kiri
                pemisah[0] = arr_direction[0];
                pemisah[1] = arr_direction[1]+1;
            }
           
           
                if(pemisah[0]>jalan.peta.length-1 || pemisah[1]>jalan.peta.length-1){
                    return false;
                }
                
                
                 
              if((jalan.peta[pemisah[0]][pemisah[1]] ==0 ) && (jalan.peta[arr_direction[0]][arr_direction[1]] == 0 || jalan.peta[arr_direction[0]][arr_direction[1]] == 2 || jalan.peta[arr_direction[0]][arr_direction[1]] == 3)){
                     return true;
              }
              
    
    return false;
}


/*
 * memetakan peta 8x8 ke 15x15 dengan adanya dinding pemisah tambahan
 */
jalan.Tembokmapke15x15 = function(arraydirection){
    for(var i=0;i<arraydirection.length;i++){
        if(arraydirection[i]!=null){
            arraydirection[i] = [jalan.UnrealPosition(arraydirection[i][0]),jalan.UnrealPosition(arraydirection[i][1])];
        }
    }
    return arraydirection;
}

jalan.RealPosition = function(num){
  if(num==0)
      return 0;
  else if(num%2==1)
      return (num-1)/2;
  else if(num%2==0)
      return num/2;
}

jalan.UnrealPosition = function(num){
  if(num==0)
      return 0;
   else
      return num*2;
}


jalan.reset = function(){
    var maze_main = document.getElementById("maze_main");
    for(var i=0;i<jalan.jln.length;i++){
        maze_main.removeChild(jalan.jln[i]);
    }
}