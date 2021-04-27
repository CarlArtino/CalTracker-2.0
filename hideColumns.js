function hide_show_table()
{
    var checkbox_val=document.getElementById("hideExtra").value;
    if(checkbox_val=="hide")
    {
    var col=document.getElementsByClassName("fat_col");
    for(var i=0;i<col.length;i++)
    {
        col[i].style.display="none";
    }
    document.getElementById("fat_col_head").style.display="none";
    document.getElementById("hideExtra").value="show";

    col=document.getElementsByClassName("cholesterol_col");
    for(var i=0;i<col.length;i++)
    {
        col[i].style.display="none";
    }
    document.getElementById("cholesterol_col_head").style.display="none";
    document.getElementById("hideExtra").value="show";

    col=document.getElementsByClassName("sodium_col");
    for(var i=0;i<col.length;i++)
    {
        col[i].style.display="none";
    }
    document.getElementById("sodium_col_head").style.display="none";
    document.getElementById("hideExtra").value="show";

    col=document.getElementsByClassName("carbs_col");
    for(var i=0;i<col.length;i++)
    {
        col[i].style.display="none";
    }
    document.getElementById("carbs_col_head").style.display="none";
    document.getElementById("hideExtra").value="show";

    col=document.getElementsByClassName("protein_col");
    for(var i=0;i<col.length;i++)
    {
        col[i].style.display="none";
    }
    document.getElementById("protein_col_head").style.display="none";
    document.getElementById("hideExtra").value="show";
    }

    else
    {
    var all_col=document.getElementsByClassName("fat_col");
    for(var i=0;i<all_col.length;i++)
    {
    all_col[i].style.display="table-cell";
    }
    document.getElementById("fat_col_head").style.display="table-cell";
    document.getElementById("hideExtra").value="hide";

    col=document.getElementsByClassName("cholesterol_col");
    for(var i=0;i<col.length;i++)
    {
        col[i].style.display="table-cell";
    }
    document.getElementById("cholesterol_col_head").style.display="table-cell";
    document.getElementById("hideExtra").value="hide";

    col=document.getElementsByClassName("sodium_col");
    for(var i=0;i<col.length;i++)
    {
        col[i].style.display="table-cell";
    }
    document.getElementById("sodium_col_head").style.display="table-cell";
    document.getElementById("hideExtra").value="hide";

    col=document.getElementsByClassName("carbs_col");
    for(var i=0;i<col.length;i++)
    {
        col[i].style.display="table-cell";
    }
    document.getElementById("carbs_col_head").style.display="table-cell";
    document.getElementById("hideExtra").value="hide";

    col=document.getElementsByClassName("protein_col");
    for(var i=0;i<col.length;i++)
    {
        col[i].style.display="table-cell";
    }
    document.getElementById("protein_col_head").style.display="table-cell";
    document.getElementById("hideExtra").value="hide";
    }
} 