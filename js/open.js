$(document).ready(function(){
 $('.owl-carousel').owlCarousel({
    margin:10,
    loop:true,
    nav:true,
    autoWidth:true,
    items:4
})
$('#auth').click(function(){
    $("#autores").css("display","block");
});
$('.close').click(function(){
    $("#autores").css("display","none");
});
$('#reg').click(function(){
    $("#autores").css("display","block");
    $("#avtor").css("display","none");
    $("#reg1").css("display","flex");
});
$('#avt').click(function(){
    $("#autores").css("display","block");
    $("#avtor").css("display","flex");
    $("#reg1").css("display","none");
});
$('.btn_add_playlist').click(function(){
    $(".add_playlist").css("display","block");
});
$('.close_playlist').click(function(){
    $(".add_playlist").css("display","none");
});
$('.edits_playlist').click(function(){
    $(".edit_playlist").css("display","block");
});
$('.close_edit_playlist').click(function(){
    $(".edit_playlist").css("display","none");
});

    $('.do_signup').click(function(){
        var login = $('.login').val();
        var email = $('.email').val();
        var password = $('.password').val();
        var password_2 = $('.password_2').val(); 
        console.log(login,email,password);
        if(login) {
            if(email) {
                if(password == password_2 && login && email){
                    $.ajax({
                        url: '../server.php',
                        type:"POST",
                        data:{login,email,password},
                        dataType:"json",
                    }).done(function(res) {
                        console.log(res);
                        location.reload();
                    }).fail(function(err) {
                    if(err.status == 400){
                        alert('user exist');
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
        $('inp').val('');
    }); 
    $('.do_login').click(function(){
        
        var login1 = $('.login1').val();
        var password1 = $('.password1').val();
        if(login1 &&  password1) {
        $.ajax({
            url: '../server.php',
            type:"POST",
            data:{login1,password1},
            dataType:"json",
        }).done(function(res) {
            console.log(res);
            location.reload();
        }).fail(function(err) {
        if(err.status == 400){
            alert('user exist');
        }
            
        });
    }
    else
        alert("Оба поля обязательны");
    });
    $('.sign_out').click(function(){
        $.ajax({
            url:'../server.php',
            type:'POST',
            data:{destroy:'destroy'}
        }).done(function(res) {
        location.reload();
        });
    });

    $('.btn_search').click(function(){
        var inp_search = $('.inp_search').val();
        document.location.href = '../php/search.php?action=search&data=%'+ inp_search+'%';
    });

    $(".like").click(function(){
        var data_id = $(this).attr("data-id");
        $.ajax({
            url: '../server.php',
            type:"POST",
            data:{data_id,action:"like_add"},
            dataType:"json",
        }).done(function(res) {
            console.log(res);
            location.reload();
        }).fail(function(err) {
        if(err.status == 400){
            
        }
            
        });
    });
    $('.btn_coment').click(function(){

        var textfilm = CKEDITOR.instances.editor5.getData();
        var filmid = $(this).attr("data-id");
        

       $.ajax({
        url: '../server.php',
        type:"POST",
        data:{filmid,dtime,textfilm,date:date(),action:"film_chat_add"},
        dataType:"json",
    }).done(function(res) {
        location.reload();
       
    }).fail(function(err) {
    if(err.status == 400){
        alert('user exist');
    }
        
    });
    });

    $('.btn_news_coment').click(function(){

        var textnews = CKEDITOR.instances.editor1.getData();
        var newsid = $(this).attr("data-id");
        

       $.ajax({
        url: '../server.php',
        type:"POST",
        data:{newsid,textnews,date:dt(),action:"news_chat_add"},
        dataType:"json",
    }).done(function(res) {
        location.reload();
       
    }).fail(function(err) {
    if(err.status == 400){
        alert('user exist');
    }
        
    });
    });

    $('.btn_adds_playlist').click(function(){
        var fileimg = $('.file_playlist').val();
        var titleplaylist = $('.name_playlist').val();
        var opisanies = CKEDITOR.instances.editor3.getData();
        var dtime = Date.now()+$(this).attr('data-name');
        var author = $(this).attr('data-name');

        var fileimg = $('.file_playlist')[0].files[0];
        var fData = new FormData();
        
        fData.append('action','playlist_add');
        fData.append('file',fileimg);
        fData.append('titleplaylist',titleplaylist);
        fData.append('opisanies',opisanies);
        fData.append('date',date());
        fData.append('dtime',dtime);
        fData.append('author',author);
        $.ajax({               
            url: '../server.php',
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

     $('.edits_playlist').click(function(){
       var id_playlist = $(this).attr("data-id");
       var title =  $(this).parents('.content_block').find('.title').html();
       var text =  $(this).parents('.content_block').find('.text').clone().children('p').html(); 
       $('.name_edit_playlist').val(title);
       CKEDITOR.instances.editor4.setData(text);

       $('.btn_edit_playlist').click(function(){
        var text = CKEDITOR.instances.editor4.getData();
        console.log(text);
           var title1 = $('.name_edit_playlist').val();
           var fileimg = $('.file_edit_playlist')[0].files[0];
           var fData = new FormData();

           fData.append('action','playlist_edit');
           fData.append('file',fileimg);
           fData.append('titleplaylist',title1);
           fData.append('opisanies',text);
           fData.append('id',id_playlist);
           $.ajax({               
                url: '../server.php',
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
     });



    $(".del_playlist").click(function(){
        var id_playlist = $(this).attr("data-id");

        $.ajax({
            url: '../server.php',
            type:"POST",
            data:{id_playlist,action:"del_playlist"},
            dataType:"json",
        }).done(function(res) {
            console.log(res);
            location.reload();
        })
    });

    function date() {
        var q = new Date();
        var z = q.toLocaleString();
        var date = (z);
        return date;
    }

    function dt(){
        var d=new Date();
        var day=d.getDate();
        var s = d.toLocaleString('ru', {       
            month: 'long'      
        });
        var date = (day + "" + s);
        return date;
    }

    function dt3(){
        var d=new Date();
        var day=d.getDate();
        var s = d.toLocaleString('ru', {       
            month: 'long'      
        });
        s = s.slice(0,3);
        var date = (day + "" + s);
        return date;
    }


    $('#genre').change(function() {
        sort($(this).val(),'data-genre');
    })
    $('#year').change(function() {
        sort($(this).val(),'data-year');
    })
    $('#country').change(function() {
        sort($(this).val(),'data-country');
    })
    function sort(id,fData) {
        $('.film['+fData+'!='+id+']').hide();
        $('.film['+fData+'='+id+']').show();
        if(fData=='data-genre') {
            var film = $('.film');
            for (var i=0; i<film.length; i++) {
                var fg = $(film[i]).data('genre').split(',');

                for(var j=0; j<fg.length; j++) {
                    if(fg[j]==id) {
                        $(film[i]).show();
                        break;
                    }
                    else {
                        $(film[i]).hide();
                    }
                }
            }
        }
    }
    $('.btn_filter').click(function(){
       $('.film').show(); 
    });
    

   CKEDITOR.replace('editor1');  
   CKEDITOR.replace('editor2');
   CKEDITOR.replace('editor3');
}); 