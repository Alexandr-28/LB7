function btn3_click(){
    var xhr3 = new XMLHttpRequest();
    var auth=$('#auth').val();
    
    xhr3.onload = function(){
        var dv=$('.res3').first();
        dv.empty();

        var resp=xhr3.responseXML;

        console.log(resp);

        var table = document.createElement('table');
        var tr = document.createElement('tr');

        var th = document.createElement('th');
        th.innerHTML = 'Name';
        tr.appendChild(th);
    
        table.appendChild(tr);

        var tag=resp.getElementsByTagName('authors');

        for(var i=0;i<tag.length;i++){
            tr = document.createElement('tr');

            var td = document.createElement('td');
            td.innerHTML = tag[i].textContent;
            tr.appendChild(td);

            table.appendChild(tr);
        }

        dv.append(table);
    }

    xhr3.open('GET',`authrs.php?auth=${auth}`);
    xhr3.send();
}