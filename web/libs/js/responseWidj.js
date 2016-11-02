/**
 * Created by user-204-008 on 06.05.16.
 */

window.addEventListener('message', function(data){

    if (data && (data.height || data.data.height)) {

        document.getElementById('casco-iframe').setAttribute('height', data.height || data.data.height);

    }

})
