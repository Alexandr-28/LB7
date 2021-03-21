function btn1_click()
{
    var xhr = new XMLHttpRequest();
    var publ = $('#publ').val();

    xhr.onload = function(){
        var dv=$('.res1').first();
        dv.empty();

        var resp=xhr.responseText;
        var arr = ['Name', 'ISBN', 'Publisher', 'Year', 'Count'];
        var books=JSON.parse(resp);
        var index=0;

        var table = document.createElement('table');
        var tr = document.createElement('tr');
    
        for(var i=0;i<arr.length;i++){
            var th = document.createElement('th');
            th.innerText = arr[i];
            tr.appendChild(th);
        }
        table.append(tr);

        books.forEach(element => 
        {
            tr = document.createElement('tr');
            
            var td = document.createElement('td');
            td.innerText = element.NAME;
            tr.appendChild(td);
            
            td = document.createElement('td');
            td.innerText = element.ISBN;
            tr.appendChild(td);
            
           td = document.createElement('td');
           td.innerText = element.PUBLISHER;
           tr.appendChild(td);
            
           td = document.createElement('td');
           td.innerText = element.YEAR;
           tr.appendChild(td);
            
           td = document.createElement('td');
           td.innerText = element.NUMBER;
           tr.appendChild(td);
            
           table.appendChild(tr);
        });
        dv.append(table);
    } 

    xhr.open('GET',`publs.php?publ=${publ}`);
    xhr.send();
}