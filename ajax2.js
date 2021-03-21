function btn2_click(){
    var xhr2=new XMLHttpRequest();

    var yr1=$('#yr1').val();
    var yr2=$('#yr2').val();

    xhr2.onreadystatechange = function() 
    {
      if (xhr2.readyState === 4)
      {
        if(xhr2.status === 200) 
        {      
            $('.res2').first().html(this.responseText);
        }
        else alert(xhr2.status + " - " + xhr2.statusText);
        xhr2.abort();  
      }
    };
    
    xhr2.open('GET', `timespan.php?yr1=${yr1}&yr2=${yr2}`);
    xhr2.send();
}