/*---------------news---------------------
var puns = [
"Choose whole grains more often. Try whole-wheat breads and pastas, oatmeal, or brown rice.",
"Select a mix of colorful vegetables. Vegetables of different colors provide a variety of nutrients. Try collards, kale, spinach, squash, sweet potatoes, and tomatoes.",
"At restaurants, eat only half of your meal and take the rest home.",
"Walk in parks, around a track, or in your neighborhood with your family or friends.",
"Make getting physical activity a priority.",
"Try to do at least 150 minutes a week of moderate-intensity aerobic activity, like biking or brisk walking.",
"If your time is limited, work in small amounts of activity throughout your day."
];

for (i = 0; i < puns.length; i++) {
  $("#newsTicker p").append(
    "<span class='date'>Alihsan Medical:</span>" +
    "<span class='story'>" + puns[i] + "</span>"
  );
}

---------------news---------------------*/

/*---------------modal---------------------*/
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("No")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
/*---------------modal---------------------*/



/*---------------disclaimer---------------------*/
window.onscroll = function() {myFunction()};

var header = document.getElementById("disclaimer");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
/*---------------disclaimer---------------------*/



/*---------------null---------------------*/
const noContext = document.getElementById('noContextMenu');
noContext.addEventListener('contextmenu', e => {
  e.preventDefault();
});
/*---------------null---------------------*/