<style>
    #order{
        width:50%;
        margin:auto;
        padding:20px;
        background:#eee;
        border:1px solid #ddd;
    }
    .row{
        display:flex;
    }
    .row div:nth-child(1){
        width:15%;
        padding:5px;
        text-align:center;
    }
    .row div:nth-child(2){
        width:85%;
        padding:5px;
        text-align:center;
    }
    .row select{
        width:100%;
    }
    .row div:nth-last-child(1){
        width:100%;
    }
</style>
<h1 class="ct">線上訂票</h1>
<div id="order">
    <div class="row">
        <div>電影：</div>
        <div>
            <select name="movie" id="movie"></select>
        </div>
    </div>
    <div class="row">
        <div>日期：</div>
        <div>
        <select name="date" id="date"></select>
        </div>
    </div>
    <div class="row">
        <div>場次：</div>
        <div>
        <select name="session" id="session"></select>
        </div>
    </div>
    <div class="row ct">
        <div>
            <button onclick="order()">確定</button>
            <button onclick="reset()">重置</button>
        </div>
    </div>
</div>
<script>
    
let id=(new URL(location)).searchParams.get('id')
getMovies(id);

$("#movie").on("change",()=>{ getDays() })
$("#date").on("change",()=>{ getSessions() })

function order(){
    
}

function reset(){
    getMovies(id)
}

function getMovies(id){
    $.get("api/get_movies.php",{id},(movies)=>{
        $("#movie").html(movies)
        getDays();
    })
}

function getDays(){
    let id=$("#movie").val();
    $.get("api/get_days.php",{id},(days)=>{
        $("#date").html(days)
        getSessions()
    })
}
function getSessions(){
    let id=$("#movie").val();
    let date=$("#date").val();
    $.get("api/get_sessions.php",{id,date},(sessions)=>{
        $("#session").html(sessions)
    })
}


</script>