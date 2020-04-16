var $collectionHolder;

// setup an "add a tag" link
var $addNewItem = $('<a href="" class="btn btn-info">Add a item</a>');

$(document).ready(function() {
    // Get the collection holder
    $collectionHolder = $('#eleves_list');

    // append the add new item to the collectionholder
    $collectionHolder.append($addNewItem);

    // have the index for each panel we find it
    $collectionHolder.data('index',$collectionHolder.find('.panel').length);

   //add remove button to existing item
    $collectionHolder.find('.panel').each(function () {
        addRemoveButton($(this))
    });

    //  handle the click event for addNewItem
    $addNewItem.click(function (e) {
        e.preventDefault();
        //create a new form and append it to the collectionholder
        addNewForm();
    })

});


function addNewForm() {
    // getting the prototype
    var prototype = $collectionHolder.data('prototype');
    // get the index
    var index = $collectionHolder.data('index');
    //create a form
     var newForm = prototype;
      newForm = newForm.replace(/__name__/g, index);

     $collectionHolder.data('index', index+1);
     // create the panel
    var $panel = $('<div class="panel panel-warning border border-primary ml-4 p-3 rounded"><div class="panel-heading"></div></div>')

    // create the panel-body and append newForm to it
    var $panelBody = $('<div class="panel-body"></div>').append(newForm);

    // append the panelBody to the panel parent
    $panel.append($panelBody);

    //append the the remove button to the new panel
    addRemoveButton($panel);

    // append the panel to the addNewItem
    $addNewItem.before($panel);

}

function addRemoveButton($panel) {
    // create remove button
    var $removeButton = $('<a href="#" class="btn btn-danger">Remove</a>');

    var $panelFooter = $('<div class="panel-footer"></div>').append($removeButton);

    //handle the click event of the remove button
    $removeButton.click(function (e) {
        e.preventDefault();
        $(e.target).parents('.panel').slideUp(3000, function () {
            $(this).remove();
        })
    });

    //append the footer to the panel
    $panel.append($panelFooter);
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