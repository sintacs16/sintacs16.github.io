$(function() {
  $(".enter-trig").keypress(function(event) {
    if(event.which == 13) {
      $(".trig").trigger("click");
    }
  });
});