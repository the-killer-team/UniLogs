  $(document).ready(function(){
    $('#search').keyup(function(){
      $('#result-search').html('');

      var logs = $(this).val();

      if(logs != ""){
        $.ajax({
          type: 'GET',
          url: 'require/search.php',
          data: 'mylogs=' + encodeURIComponent(logs),
          success: function(data){
            if(data != ""){
              $('#result-search').append(data);
            }else{
              document.getElementById('result-search').innerHTML = "Aucune correspondance à votre recherche.";
            }
          }
        });
      }
    });
  });