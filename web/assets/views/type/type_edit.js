$('body').on('click', '.type_edit', function (e) {
    e.preventDefault();
    var element = $(this);
    var group_id = element.data('type_id');
    $.ajax({
        type: 'get',
        url: '/type/editar/' + group_id,
        success: function (response) {
            var modal = $('#modal');
            modal.modal('show');
            $('.modal-content').html(response);
        }
    });
});
 