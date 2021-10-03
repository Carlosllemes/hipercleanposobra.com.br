$(document).ready(function(){
  // DISABLE STATE
  let disabledStates = ['SP', 'RJ'];
  $.each(disabledStates, function(index, value){
    $(`.svg-map [data-map-link="${value}"]`).attr('data-disabled-state', true);
    $(`.mobile-map option[value="${value}"]`).remove();
  });
  // DESKTOP
  $('.svg-map [data-map-link]').on('click', function(){
    let selectedState = $(this).attr('data-map-link');
    $('.svg-map [data-selected-state="true"]').removeAttr('data-selected-state');
    $(this).attr('data-selected-state', true);
    $('.content-map > h2').hide();
    $(`.content-map [data-map-content].active-map`).hide();
    $(`.content-map [data-map-content="${selectedState}"]`).show().addClass('active-map');
  });
  // MOBILE
  $('.mobile-map').on('change', function(){
    let selectedState = $(this).val();
    $('.content-map > h2').hide();
    $(`.content-map [data-map-content].active-map`).hide();
    $(`.content-map [data-map-content="${selectedState}"]`).show().addClass('active-map');
  });
});