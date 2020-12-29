var state = 0;
var stateMenu = 0;
$('#addTasks').hide();
$('#aside').show();

$('#buttonAddTask').on('click', function() {
    if (state % 2 == 0) {
        $('#addTasks').show();
        state++;
    } else {
        $('#addTasks').hide();
        state++;
    }
});

$('#menu').on('click', function() {
    if (stateMenu % 2 == 0) {
        $('#aside').show();
        stateMenu++;
    } else {
        $('#aside').hide();
        stateMenu++;
    }

});