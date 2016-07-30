$(document).ready(function() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '../../controller/searchStud.php',
        cache: false,
        success: function(states){
            console.log(states);
            var states = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                local: states
            });

            $('#bloodhound .typeahead').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                },
                {
                    name: 'states',
                    source: states
                });
        }
    });
});

