$("#lista").hide();
function popuniDrop(){
    let unos = $("#grad").val();
    $.ajax({
        url : "data/rs.json",
        dataType : "json",
        method : "post",
        success : function(data){
            let cek = false;
            let novi = data.filter(x => {
               if(x.city.toLowerCase().indexOf(unos.toLowerCase()) > -1) return x;
            });
            if(unos.trim().length > 0 ){
                document.querySelector("#lista").innerHTML = "";
                $("#lista").show();
                if(novi.length > 5){
                    cek = true;
                    novi = novi.slice(0,5);
                }
                novi.forEach(e => {
                    document.querySelector("#lista").innerHTML += `<p>${e.city}</p>`;
                    
                });
                
                if(cek){
                    document.querySelector("#lista").innerHTML += `<i>...</i>`;
                }
                $("#lista p").click(function(){
                    let izabrani = $(this).html();
                    console.log(izabrani.toLowerCase());
                    document.querySelector("#grad").value = izabrani;
                    $("#lista").hide();
                    
                });
                if(!$("#lisa").is(":hidden")){
                    $("body").click(function(){
                        $("#lista").hide();
                    });
                }
        
            }
        },
        error: function(){
            console.log(xh);
        }
    });
    
}