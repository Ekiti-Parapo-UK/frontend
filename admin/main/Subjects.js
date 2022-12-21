// Javascript File Script.js 
function goChoose()
{
    var recslen = document.frmmsg.length;
    var checkboxes = "";

    for (i = 1; i < recslen; i++)
    {
        if (document.frmmsg.elements[i].checked === true)
            checkboxes += " " + document.frmmsg.elements[i].name;
    }

    if (checkboxes.length > 0)
    {
        var con = confirm("Are you sure you want to add selected items for this user ?");
        if (con)
        {
            document.frmmsg.action = "selectmultiple_subjects.php?recsno=" + checkboxes;
            document.frmmsg.submit();
        }
    }
    else
    {
        alert("No item was selected.");
    }
}

function selectall()
{
//        var formname=document.getElementById(formname); 

    var recslen = document.frmmsg.length;

    if (document.frmmsg.topcheckbox.checked === true)
    {
        for (i = 1; i < recslen; i++) {
            document.frmmsg.elements[i].checked = true;
        }
    }
    else
    {
        for (i = 1; i < recslen; i++)
            document.frmmsg.elements[i].checked = false;
    }
}
