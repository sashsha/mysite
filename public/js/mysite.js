$(document).ready(function (){
    $('#deletePlanet').submit(function (e){
        e.preventDefault();
        var url = $(this).attr('action');
        //console.log(url);
        //var message = 'Are you sure you want to delete?';
        var message = $(this).attr('data-question');

        BootstrapDialog.confirm(message, function(result){
            //console.log(result);
            if (result){
                $.ajax({
                    url: url,
                    type: 'Delete',
                    success: function(data) {
                        console.log(data);
                        $('body').html(data);
                        //$('html').html(data);
                    }
                });
            }
        });
    });
});