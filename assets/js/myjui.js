$(function() {
    $("#speed")
        .selectmenu()
        .selectmenu( "menuWidget" )
        .addClass( "overflow" );
    $("#speed1")
        .selectmenu()
        .selectmenu( "menuWidget" )
        .addClass( "overflow" );
});

$(function() {
    $( "#datepicker" ).datepicker({
        showOnFocus: true,
        showOtherMonths: true,
        changeMonth: true,
        changeYear: true,
        dateFormat: "d M, yy",
        maxDate: "+0D",
        yearRange: "-100:+0" // last hundred years
    });
    $( "#speed" )
        .selectmenu()
        .selectmenu( "menuWidget" )
        .addClass( "overflow" );
});