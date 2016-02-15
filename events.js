var angezeigt = false;
 
function versteckt()
{
    if (angezeigt)
    {
        $('.bestelldrop').css("display", "none");
        $('#bestellklap').text("Bestellungen ausklappen");
        angezeigt = false;
    }
    else
    {
        $('.bestelldrop').css("display", "table-row");
        $('#bestellklap').text("Bestellungen einklappen");
        angezeigt = true;
    }
}