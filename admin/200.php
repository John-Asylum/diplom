<div class="err200">
    <h1>Данные отправлены</h1>
</div>
<style>
    .err200{
        position: absolute;
        top:20%;
        left: 30%;
        width: 400px;
        height: 250px;
        background: white;
        box-shadow: 1px 1px 2px 0px greenyellow;
        display:none;
    }
    .err200 h1{
        margin-top:100px;
        text-align: center;
        color:greenyellow;
    }
</style>
<script>
    function start200(){
        $('.err200').css({"display":"block"})
        setTimeout(function() {  $('.err200').fadeOut()}, 4000);
    }
</script>