    $(document).ready(function(){
        /*For featured product slider*/
        var clients_count = 12;
        var clients_slider_width = 185*clients_count;        
        $('.client-slider').css('width',clients_slider_width + 'px');
        
        var current_position = 0;
        var current_frame = 1;    
            
        $('#client_right').click(function(){            
            if(current_frame<clients_count)
            {   
                if(clients_count-current_frame>=6)
                {
                    current_frame = current_frame + 1;
                    current_position = current_position + 185;
                    $('.client-slider').animate({left:-current_position},500);
                }
                //alert(current_frame);
                
            }            
        });
        
        $('#client_left').click(function(){

            if(current_frame>1)
            {                   
                current_frame = current_frame - 1;
                current_position = current_position - 185;
                $('.client-slider').animate({left:-current_position},500);
            }            
        });
               
    });