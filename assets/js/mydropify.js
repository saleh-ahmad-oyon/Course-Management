$(document).ready(function(){
    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop an image here or click',
            'replace': 'Drag and drop or click to replace',
            'remove':  '<span class="glyphicon glyphicon-trash"></span>',
            'error':   'Sorry, this file is too large'

        }
    });
    var drEvent = $('.dropify').dropify();

    drEvent.on('dropify.beforeClear', function(event, element){
        return confirm("Do you really want to delete \"" + element.filename + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element){
        alert('File deleted');
    });
});