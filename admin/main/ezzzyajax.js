function showDept(str){
    //alert('I am here: '+str);
  if(str === ""){
    document.getElementById('fac').value="";
    return;
  }
  if(window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest();
  }
  else{
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
      document.getElementById('dep').innerHTML=xmlhttp.responseText;
      //console.log(xmlhttp.responseText);
    }
  }
  xmlhttp.open("GET","getdep.php?q="+str,true);
  xmlhttp.send();
}//end of the function show Dept

function showProg(str){
    //alert('I am here: '+str);
  if(str === ""){
    document.getElementById('dep').value="";
    //document.getElementById('mid').value="";
    return;
  }
  if(window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest();
  }
  else{
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
        //alert("I go here");
      document.getElementById('prg').innerHTML=xmlhttp.responseText;
      //console.log(xmlhttp.responseText);
    }
  }
  xmlhttp.open("GET","getprg.php?q="+str,true);
  xmlhttp.send();
}//end of the function showProg

function showLevel(str){
    //alert('I am here: '+str);
  if(str === ""){
    document.getElementById('prg').value="";
    //document.getElementById('mid').value="";
    return;
  }
  if(window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest();
  }
  else{
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
        //alert("I go here");
      document.getElementById('lvl').innerHTML=xmlhttp.responseText;
      console.log(xmlhttp.responseText);
    }
  }
  xmlhttp.open("GET","getlvl.php?q="+str,true);
  xmlhttp.send();
}//end of the function showProg

function showBatch(str){
    //alert('I am here: '+str);
  if(str === ""){
    document.getElementById('sess').value="";
    //document.getElementById('mid').value="";
    return;
  }
  if(window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest();
  }
  else{
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
        //alert("I go here");
      document.getElementById('batch').innerHTML=xmlhttp.responseText;
      console.log(xmlhttp.responseText);
    }
  }
  xmlhttp.open("GET","getses.php?q="+str,true);
  xmlhttp.send();
}//end of the function showProg