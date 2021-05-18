let axios = require('axios');

$('body').on('click', '.delete-bookmark', function(){
    let id = $(this).data('id');

    axios.delete('/bookmarks/'+id)
    .then(function(){
        window.location.reload();
    })
    .catch(function(){
        console.log(error);
    });

})