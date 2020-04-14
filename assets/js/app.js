/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
$(document).on(change, #note_examin_eleve_classeroom, #note_examin_eleve_eleve, function () {
    let $field = $(this);
    let  $form = $field.closest('form');
    let data = {}
    data[$field.attr('name')] = $field.val();
    debugger

});
alert('bonjouur');