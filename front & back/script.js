function addRow()
{
    var fname = document.getElementById('fname').value;
    var email = document.getElementById('email').value;
    var add = document.getElementById('add').value;
    var phonenum = document.getElementById('phonenum').value;
    var bdate = document.getElementById('bdate').value;
    
    var table = document.getElementsByTagName('table')[0];
    var newRow = table.insertRow(1);

    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);

    cell1.innerHTML = fname;
    cell2.innerHTML = email;
    cell3.innerHTML = add;
    cell4.innerHTML = phonenum;
    cell5.innerHTML = bdate;

    row++;
}
