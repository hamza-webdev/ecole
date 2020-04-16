var $collectionHolder;

// setup an "add a tag" link
var $addTagButton = $('<button type="button" class="add_eleve_link">Add a tag</button>');
var $newLinkLi = $('<li></li>').append($addTagButton);

jQuery(document).ready(function() {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('ul.eleves');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // add a delete link to all of the existing tag form li elements
    $collectionHolder.find('li').each(function() {
        addEleveFormDeleteLink($(this));
    });

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find('input').length);

    $addTagButton.on('click', function(e) {
        // add a new tag form (see next code block)
        addEleveForm($collectionHolder, $newLinkLi);
    });
});

function addEleveForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    var newForm = prototype;
    // You need this only if you didn't set 'label' => false in your tags field in TaskType
    // Replace '__name__label__' in the prototype's HTML to
    // instead be a number based on how many items we have
    // newForm = newForm.replace(/__name__label__/g, index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);

    // add a delete link to the new form
    addTagFormDeleteLink($newFormLi);
}

function addTagFormDeleteLink($eleveFormLi) {
    var $removeFormButton = $('<button type="button">Delete this Eleve</button>');
    $eleveFormLi.append($removeFormButton);

    $removeFormButton.on('click', function(e) {
        // remove the li for the tag form
        $eleveFormLi.remove();
    });
}



// $(document).on('change', '#note_examin_eleve_classeroom', '#note_examin_eleve_eleve', function () {
//     let $field = $(this);
//     let  $form = $field.closest('form');
//     let data = {}
//     data[$field.attr('name')] = $field.val();
//     $.post($form.attr('action'), data).then(function (data) {
//         let $input = $(data).find('#note_examin_eleve_eleve')
//         $('#note_examin_eleve_eleve').replaceWith($input);
//         debugger;
//     })
//
//
// });
// alert('ll');