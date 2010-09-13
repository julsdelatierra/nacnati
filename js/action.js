$(document).ready(function(){
    if (navigator.geolocation){
        browserSupportFlag = true;
        navigator.geolocation.getCurrentPosition(function(pos){
	    myLocation = new google.maps.LatLng(pos.coords.latitude,pos.coords.longitude);
            geocoder = new google.maps.Geocoder();
	    geocoder.geocode({'location':myLocation}, function(result,status){
                state = result[0].address_components[3];
		country = result[0].address_components[4];
                console.log(country.short_name);
		if(country.short_name != 'MX'){
                    $('#fila_estado').hide('fast');
                }
                else{
                    $('#estado').val(state.long_name);
                    $('#pais').val(country.long_name);
                }
            });
        });
    }
    $('#send').click(function(){
        re = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        email_valid = re.test($('#correo').val());
        if($('#nombre').val()!=""&&email_valid&&$('#pais').val()!=""&&$('#comentario').val()!=""&&$("input#recaptcha_response_field").val()!=""){
            $.ajax({
                type:'POST',
                url:'./guardarOpinion.php',
                data:{
                    'nombre':$('#nombre').val(),
                    'correo':$('#correo').val(),
                    'pais':$('#pais').val(),
                    'estado':$('#estado').val(),
                    'comentario':$('#comentario').val(),
                    'recaptcha_challenge_field':$("input#recaptcha_challenge_field").val(),
                    'recaptcha_response_field':$("input#recaptcha_response_field").val()
                },
                success:function(data){
                    console.log(data);
                    $('#notice').slideDown('slow').delay(1000).hide('slow');
                    Recaptcha.reload();
                }
            });
        }
        else{
            $('#error').slideDown('slow').delay(1000).hide('slow');
        }
    });
});