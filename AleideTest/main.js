$(document).ready(function(){
	

  $('#regione').on('change', function(){ 

      regione = $(this).val();
     
      if(regione!= 0){
          $.ajax({
              type:'POST',
              url:'prendiDati.php', 
              data:{
                'regione': regione,
                'action': 'getProvince' 
              }, 
              success:function(rispostahtml){                
                 $('#provincia').html(rispostahtml);
                //  $( "input" ).attr( "disabled" , false );
                 console.log(rispostahtml);
              }
          }); 
      }
     
      else
      {
         $('#provincia').html('<option value="">Seleziona la Provincia</option>');
         $('#comune').html('<option value="">Seleziona il Comune</option>'); 
      }
  });
 
  $('#provincia').on('change', function(){ 
   
      provincia = $(this).val();
      if(provincia!= 0){
          $.ajax({
              type:'POST',
              url:'prendiDati.php',
              data:{
                'provincia': provincia,
                'action': 'getComuni' 
              }, 
              success:function(rispostahtml){ 
                  $('#comune').html(rispostahtml);
                  console.log(rispostahtml);
              }
          }); 
      }else{
          $('#comune').html('<option value="">Seleziona il Comune</option>'); 
      }
         
          
  });

  

});