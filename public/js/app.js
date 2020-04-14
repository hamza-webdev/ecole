$(document).on('change', '#note_examin_eleve_classeroom', '#note_examin_eleve_eleve', function () {
    let $field = $(this);
    let  $form = $field.closest('form');
    let data = {}
    data[$field.attr('name')] = $field.val();
    $.post($form.attr('action'), data).then(function (data) {
        let $input = $(data).find('#note_examin_eleve_eleve')
        $('#note_examin_eleve_eleve').replaceWith($input);
        debugger;
    })


});
alert('ll');