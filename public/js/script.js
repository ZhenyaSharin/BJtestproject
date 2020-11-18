$(document).ready(function() {
    // function dTables() {
        $('#task-table').DataTable({
            columnDefs: [
                { 
                    "targets": [ 0, 4 ],
                    "orderable": false,
                }
            ],
            "pageLength": 3,
            "lengthMenu": 3,
            "searching": false,
            "info":     false
        });
    // };
    // dTables();

});