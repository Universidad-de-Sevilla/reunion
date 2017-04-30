$('body').on('click', '.group_edit', function (e) {
    e.preventDefault();
    var element = $(this);
    var group_id = element.data('group_id');
    $.ajax({
        type: 'get',
        url: '/grupo/editar/' + group_id,
        success: function (response) {
            var modal = $('#modal');
            modal.modal('show');
            $('.modal-content').html(response);
        }
    });
});
 