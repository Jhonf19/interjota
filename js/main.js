$(function (){
  $('.dropdown-toggle').dropdown();

  $(document).on('click', '#_search', function(){
    var query = $('#_query').val();
    window.location.replace('?b=inventario&pagina=1&search='+query);
  });
  // $(document).on('keyup', '#_search', function(){
  //   var valor = $(this).val();
  //   if(valor != ""){
  //     findDates(valor)
  //   }else{
  //     findDates()
  //   }
  // })

  
  
  // function findDates(query){
  //   // console.log(query);
  //   $.ajax({
  //     url: 'http://interjota.com/?b=findProduct',
  //     type: "post",
  //     data: { "query" : query},
  //     beforSend: function(){
  //       console.log("ok");
        
  //     }
  //   })
  //   .done(function(data){
  //     console.log(data);
  //     // $('#exampleModal').modal('show');
      
  //   });
  // }

});