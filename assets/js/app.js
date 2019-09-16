$(() => {
    // $('.delete-btn').on('click', function (e) {
        $(document).on('click', '.delete-btn', function (e) {
        console.log('from delete');
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            url: "./delete.php",
            type:"GET",
            dataType: 'json',
            data:{
                'id':id
            }
        }).done((data) => {
            $("tr[data-tr='" + data + "']").addClass('none');
            console.log('done');
        }).fail(() => {
            console.log('fail');
        }).always(() => {
        });
    });
    $('.create-btn').on('click' , (e) => {
        console.log('from create');
        e.preventDefault();
        let task = $('.create-task').val();
        let content = 
        console.log(task);
        $.ajax({
            url: "./create.php",
            type: "POST",
            dataType: "json",
            data: {
                'task': task
            }
        }).done((data) => {
            console.log('done');
            $('tbody').append(''+ data +'');
        }).fail(() => {
            console.log('fail');
        }).always(() => {
            $('.create-task').val('');
        });
    });

})