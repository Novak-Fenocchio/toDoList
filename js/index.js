var state = 0;

$('#addTasks').hide();

$('#buttonAddTask').on('click', function() {
    if (state % 2 == 0) {
        $('#addTasks').show();
        state++;
    } else {
        $('#addTasks').hide();
        state++;
    }
});