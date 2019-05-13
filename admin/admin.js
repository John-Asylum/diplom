$(document).ready(function(){
$('.btn_add_user').click(function(){
    $(".floating_form").css("display","block");
});
$('.close_floating').click(function(){
    $(".floating_form").css("display","none");
});
// $( "li" ).not( document.getElementById( "notli" ) )
  // .css( "background-color", "red" );
/////////////add_film///////////////////////
$('.search_add_film').on('input',function() {
    var inp_search = $('.search_add_film').val();
    inp_search = "%"+inp_search+"%";
    $.ajax({
        url: 'server.php',
        type:"POST",
        // contentType: 'application/json',
        data:{inp_search,action:"search"},
        dataType:"json",
    }).done(function(res) {
        
        var films = $('.content_add_film').remove();
        for(i in res) {
            var film = $('.content_add_film');
            film = $(film[0]).clone();
            // var film = '<div>'+res[i].name+'</div>';
            $(film).find('.content_add_film .title_film').html(res[i].name);
            $(film).find('.content_add_film .opisanie').html(res[i].description);
            // var film = `<div> 
            //     <div class='title_film'>${res[i].name}</div>
            // </div>`
            console.log(res[i].name);
            $('.add_film').append(film);
        }
    }).fail(function(err) {
        console.log(err);
        if(err.status == 400){
            
        }
    });
});

$('.del_films').click(function(){
    var film_id = $(this).attr("data-id");
    $.ajax({
        url: 'server.php',
        type:"POST",
        data:{film_id,action:"del_film"},
        dataType:"json",
    }).done(function(res) {
        console.log(res);
        location.reload();
    })
});

$('.btn_add_new_film').click(function() {
    var fileimg = $('.poster_new_film').val();
    var filefilm = $('.file_new_films').val();
    var name = $('.name_new_film').val();
    var year = $('.year').val();
    var country = $('.country').val();
    var actor = $('.actor_new_film').val();
    var link = $('.link_new_film').val();
    var opisanies = CKEDITOR.instances.editor2.getData();
    var kratkoe = CKEDITOR.instances.editor1.getData();
    var status_film = ('new');
    var genre = $('.genre').val();

    var fileimg = $('.poster_new_film')[0].files[0];
    var filefilm = $('.file_new_films')[0].files[0];
    var fData = new FormData();

    fData.append('action','add_new_film');
    fData.append('fileimg',fileimg);
    fData.append('filefilm',filefilm);
    fData.append('name',name);
    fData.append('year',year);
    fData.append('country',country);
    fData.append('actor',actor);
    fData.append('genre',genre);
    fData.append('opisanies',opisanies);
    fData.append('kratkoe',kratkoe);
    fData.append('link',link);
    fData.append('status_film',status_film);
    $.ajax({               
        url: 'server.php',
        type:"POST",
        data: fData,
        processData: false,
        contentType: false,
        dataType:"json"               
    }).done(function(res) {
        console.log(res);
        location.reload();
    }).fail(function(err) {
    if(err.status == 400){
        alert('Заполните пустые поля');
    }
        
    });
});
////////////////////////USER/////////////////////////////
 $(".btn_add_status").click(function(){
    var status = $('.status_user').val();
    var user_id = $(this).attr("data-id");
    $.ajax({
        url: 'server.php',
        type:"POST",
        data:{status,user_id,action:"status"},
        dataType:"json",
    }).done(function(res) {
        console.log(res);
        location.reload();
    }).fail(function(err) {
        if(err.status == 400){
            
        }    
    })
});
$(".delete_user").click(function(){
    var user_id = $(this).attr("data-id");
    $.ajax({
        url: 'server.php',
        type:"POST",
        data:{user_id,action:"del_user"},
        dataType:"json",
    }).done(function(res) {
        console.log(res);
        location.reload();
    })
});

$(".buttons_form_add").click(function(){
    var login = $('.pole_form_login').val();
    var email = $('.pole_form_email').val();
    var password = $('.pole_form_password').val();
    var password_2 = $('.pole_form_password_2').val();
    var status = ('user');

    if(login) {
        if(email) {
            if(password == password_2 && login && email){
                $.ajax({
                    url: 'server.php',
                    type:"POST",
                    data:{login,email,password,password_2,status,action:"user_add_form"},
                    dataType:"json",
                }).done(function(res) {
                    console.log(res);
                    location.reload();
                }).fail(function(err) {
                    if(err.status == 400){
                        
                    }
                });
            }
            else {
                alert("неверный пароль");
            }
        }
        else
            alert("Введите Email")
    }
    else 
        alert("Введите Login")
});


}); 