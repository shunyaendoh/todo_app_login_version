$(() => {
    $('.delete_btn').on('click', function () {
        let id = $(this).attr('id');
        $.ajax({
            url: "./delete.php",
            type:"GET",
            data:{
                'id':id
            }
        }).done((data) => {
        }).fail((data) => {
        }).always((data) => {
        });
    });
})