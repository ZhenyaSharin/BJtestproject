$(document).ready(function() {
    function dTables() {
        $('#task-table').DataTable({
            // columnDefs: [
            //     { 
            //         "targets": [ 4 ],
            //         "orderable": false,
            //     }
            // ],
            "pageLength": 3,
            "lengthMenu": 3,
            "info":     false,
            "searching": false,
            "lengthChange": false
        });
    };

    // Change task
    // var taskid = 0;

    let taskid,
        taskText = '';


    $('.change-btn').on('click', function(){
        taskid = $(this).attr('data-id');
        $("#task-id").html(taskid);
        $("#change-task-id").val(taskid);
        taskText = $(this).closest('.admintask-row').find('.admintask-row-txt').text();
        $('#newtext-area').val(taskText);
    });

    dTables();
});
