$(function() {
    $( "#speed" )
        .selectmenu()
        .selectmenu( "menuWidget" )
        .addClass( "overflow" );
    $( "#speed1" )
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
        minDate: '01/01/1900',
        maxDate: "+0D"
    });
    $( "#speed" )
        .selectmenu()
        .selectmenu( "menuWidget" )
        .addClass( "overflow" );
});