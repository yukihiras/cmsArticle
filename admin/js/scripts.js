$(document).ready(function() {
    $('#summernote').summernote({
        height: 200
    });
});
$(document).ready(function(){
    $('#selectAllBoxes').click(function(event){
        if (this.checked) {
            $('.checkBoxes').each(function(){
                this.checked = true
            })
        }else{
            $('.checkBoxes').each(function(){
                this.checked = false;
            })
        }
    })
});

var div_box = "<div id='load-screen'><div id='loading'></div></div>";
$("body").prepend(div_box); 
$('#load-screen').delay(700).fadeOut(600, function(){
    $(this).remove();
});


function loadUserOnline() {
    $.get("function.php?onlineusers=result", function(data){
        $(".useronline").text(data);
    })
}

setInterval(function(){
    loadUserOnline();
}, 500);