$(function(){
  // untuk fungsi click Pop Up
    $('#modalButton').click(function(){
      $('#modal').modal('show')
      .find('#modalContent')
      .load($(this).attr('value'));
    });
});
