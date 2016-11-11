var $url = {
    root : function() {
        return location.protocol + '//' + location.host + '/course';
    }
};

$(document).ready(function(){
    $(".onlyId").each(function(){
        $(this).keypress(function(e){
            var code = e.charCode;
            return (((code>=48)&&(code<=57))||code==45||code==0);
        });
    });

    $("#stuid").each(function(){
        $(this).keypress(function(e){
            var code = e.charCode;
            $id = $(this);
            if ($id.val().length === 2 || $id.val().length === 8) {
                $id.val($id.val() + '-');
            }
            return ((code>=48)&&(code<=57));
        });
    });

    $(".onlyChars").each(function(){
        $(this).keypress(function(e){
            var code = e.charCode;
            return (((code>=65)&&(code<=90))||((code>=97)&&(code<=122))||code==32||code==44||code==46||code==0);
        });
    });

    $(".phnNum").each(function(){
        $(this).keypress(function(e){
            var code = e.charCode;
            return (((code>=48)&&(code<=57))||code==0);
        });
    });

    $(".onlyFloat").each(function(){
        $(this).keypress(function(e){
            var code = e.charCode;
            return (((code>=48)&&(code<=57))||code==46||code==0);
        });
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
});
function confirmation(){
    var r = confirm("Are you sure ?");
    return r ? true : false;
}