$(".moja").click(function(){
    $(".moja").removeClass("checked");
    $(this).addClass("checked");
    let id = $(this).data("id");
    $.ajax({
            url : "models/stanovi/odabirSlike.php",
            method : "post",
            dataType : "json",
            data : {id : id},
            success : function(data){
                console.log("Uspesno");            },
            error : function(e){
                console.log(e);
            }
    });
});