function menuHighlight(currentPosition) {
    
    var counter = 0;
    
    $("a[name='menu']").each(function() {
        //alert(currentPosition);
        $(this).removeClass("active-menu");
          if (currentPosition == counter) {
                $(this).addClass("active-menu");
        }
        counter++;
    });

}