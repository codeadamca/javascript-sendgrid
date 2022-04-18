
const button = document.querySelector('#contact-form button');
const form = document.querySelector('#contact-form form');

const formDiv = document.getElementById('contact-form');
const thankyouDiv = document.getElementById('thankyou-message');

thankyouDiv.style.display = 'none';

button.addEventListener('click', function(e){

    e.preventDefault();

    const XHR = new XMLHttpRequest();

    // Bind the FormData object and the form element
    const FD = new FormData( form );

    // Define what happens on successful data submission
    XHR.addEventListener( "load", function(event) {

      formDiv.style.display = 'none';
      thankyouDiv.style.display = 'block';

    } );

    // Define what happens in case of error
    XHR.addEventListener( "error", function( event ) {
      alert( 'Oops! Something went wrong.' );
    } );

    // Set up our request
    XHR.open( "POST", "send.php" );

    // The data sent is what the user provided in the form
    XHR.send( FD );

});