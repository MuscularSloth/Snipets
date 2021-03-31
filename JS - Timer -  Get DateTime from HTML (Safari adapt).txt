 //timer
    if ( $('.timer-block-endtime').length > 0 ){
    
        //this one for Safari - replace(/\s/, 'T')+'Z')
        let countDownDate = new Date($('.timer-block-endtime').html().replace(/\s/, 'T')+'Z').getTime();
        let timer = setInterval(function() {

            let now = new Date().getTime();
            let distance = countDownDate - now;
            let days = 0; 
            let hours = 0; 
            let minutes = 0; 
            let seconds = 0;
        
            if (distance > 0){
                days = Math.floor(distance / (1000 * 60 * 60 * 24));
                hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                seconds = Math.floor((distance % (1000 * 60)) / 1000);
            }

        
            $('.days').html(days < 10 ? '0' + days : days );
            $('.hours').html(hours < 10 ? '0' + hours : hours);
            $('.minutes').html(minutes < 10 ? '0' + minutes : minutes);
            $('.seconds')').html(seconds < 10 ? '0' + seconds : seconds);
            
        
            if (distance < 0) {
            clearInterval(timer);
            }
        }, 1000);
        }
