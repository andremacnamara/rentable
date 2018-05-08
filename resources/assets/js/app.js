
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


$('.card-header').click(function(){
  $('.card-header').hide();
});
//Script to preview image in upload form
$("#myFile").change(function(event) {
  var $previews = $(".previews").empty();
  [].forEach.call(this.files, function(file) {
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = function() {
      $previews.append(`<img src="${this.result}" />`);
    };
  });
});
