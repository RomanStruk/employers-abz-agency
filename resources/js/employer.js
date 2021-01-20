$(function () {

    var table = $('#employers-data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/employers",
        columns: [
            {data: 'photo', name: 'photo', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'position_id', name: 'position'},
            {data: 'date_of_employment', name: 'date_of_employment'},
            {data: 'phone', name: 'phone'},
            {data: 'email', name: 'email'},
            {data: 'salary', name: 'salary'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
})
