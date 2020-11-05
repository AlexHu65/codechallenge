/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


$('.delete').on('click', function(e){
    e.preventDefault();

    var id = $(this).attr('data-id');

    $.ajax({
        type: "POST",
        url: `${dir}/empleado/delete`,
        data: {id:id},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {

          if(response.deleted){

            location.reload();
          }
        }
      });

});

$('.activar').on('click', function(e){
    e.preventDefault();

    var id = $(this).attr('data-id');

    $.ajax({
        type: "POST",
        url: `${dir}/empleado/activar`,
        data: {id:id},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {

          if(response.updated){

            location.reload();
          }
        }
      });

});

