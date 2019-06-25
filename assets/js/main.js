window.onload = function(){
    $("#lista").hide();
    $("#sub").click(function(){
        validateFormLog();
    });
    $("#absolute").hide();
    absoluteSlide();
    $("#grad").keyup(function(){
        popuniDrop();
    });    
    dodeliDogadjasSearch();
    

}
function absoluteSlide(){
    $("#absClick , #abs").click(function(){
        var clicks = $(this).data('clicks');
        if ($('#absolute:visible').length == 0) {
            $("#absolute").fadeIn();
        } else {
            $("#absolute").fadeOut();
        }
        $(this).data("clicks", !clicks);
    });
    
}

function validateFormLog(){
    let regUsername = /^[A-z][\w\d]{2,14}$/;
    let regPassword = /^[A-z0-9]{5,25}$/;
    let username = document.querySelector("#username").value;
    let password = document.querySelector("#password").value;
    let mistakes = [];
    let bb;
    if(!regUsername.test(username)){
        mistakes.push("Bad username!");

    }
    if(!regPassword.test(password)){
        mistakes.push("Wrong password!");
    }
    if(mistakes.length == 0){
         bb = true;
    }
    else{
        document.querySelector("#mistakeslog").innerHTML = "";
        mistakes.forEach(e => {
            
            document.querySelector("#mistakeslog").innerHTML += `<p>${e}</p>`;
           
        });
        bb = false;
    }
    if(bb){
        $.ajax({
            url : "models/users/login.php",
            method : "post",
            dataType : "json",
            data : {username : username , password : password},
            success : function(data){
                window.location = "index.php?page=korisnik";
            },
            error : function(e,b){
                document.getElementById("mistakeslog").innerHTML ="";
                JSON.parse(e.responseText).errors.forEach(e => {
                    document.getElementById("mistakeslog").innerHTML += `<p>${e}<p>`;
                });
            }
        });
    }
    
}
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
function validInsert(){
    let naslov = document.querySelector("#naslov").value;
    let cena = document.querySelector("#cena").value;
    let opis = document.querySelector("#opis").value;
    let transakcija = document.querySelector("#transakcija").options[document.querySelector("#transakcija").selectedIndex].value;
    let kvadratura = document.querySelector("#kvadratura").value;
    let kategorija = document.querySelector("#kategorija").options[document.querySelector("#kategorija").selectedIndex].value;
    let grad = document.querySelector("#grad").value;
    let ulica = document.querySelector("#ulica").value;
    let greske = [];

}
function stampajOglase(data){
    let str = "";
    data.forEach(e => {
        let opis;
        let naslov;
        if(e.naslov.length > 25){
            naslov = e.naslov.substr(0 , 26);
            naslov+="...";   
           }
           else{
               naslov = e.naslov;
           }
        if(e.opis.length > 65){
             opis = e.opis.substr(0,65);
             opis+="...";   
        }
        else{
            opis = e.opis;
        }                 
        str += `
        <div class=" moja1 moja d-flex flex-wrap">
                <div class="zaIm">
                    <img class="card-img-left imi" src="${e.slikaStana}" alt="${naslov}">
                    </div>


                    <div class="neSlika">

                    <div class="card-body opis">
                    <h5 class="card-title">
                    ${naslov}
                    </h5>
                    <p class="card-text">${opis}
                    </div>


                    <div class="cen d-flex flex-wrap justify-content-between">
                    <h6 class="card-text col-lg-12 cenis"><i class="fa fa-map-marker" aria-hidden="true">  </i> ${e.grad}</h6>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <h4 class="card-title">${e.cena}&euro;</h5>

                    </div>   
                    </div>
                </div>
        `;
    });
    return str;
}
function validateFormRegist(){
    let regExPas = /^[A-z0-9]{5,30}$/;
    let regExfName = /^[A-Z]{1}[a-z]{3,15}(\s[A-Z]{1}[a-z]{20})*$/;                          
    let regExlName = /^[A-Z]{1}[a-z]{3,15}(\s[A-Z]{1}[a-z]{20})*$/;                      
    let regExUser = /^[\w][\w\d]{2,14}$/;
    let mistakes = [];
    let name = document.querySelector("#fName").value;
    let lastName = document.querySelector("#lName").value;
    let username = document.querySelector("#user").value;
    let pass = document.querySelector("#pass").value;
    let repass = document.querySelector("#pas2").value;
    let email = document.querySelector("#mail").value;
    let bb = false;
    if(!regExfName.test(name)){
        mistakes.push("Bad first name!");
        
    }
    if(!regExlName.test(lastName)){
        mistakes.push("Bad last name!");
    }
    if(!regExPas.test(pass)){
        mistakes.push("Bad password!");
    }
    if(!regExUser.test(username)){
        mistakes.push("Bad username");
    }
   
    if(pass != repass){
        mistakes.push("Password and repassword do not match!");
    }
    if(mistakes.length == 0){
        bb = true;
    }
    else{
        document.querySelector("#mm").innerHTML = ""; 
        mistakes.forEach(e => {
           document.querySelector("#mm").innerHTML += `<p>${e}</p>`; 
        });
    }
    console.log(mistakes);
    return bb;

}
function dodeliDogadjasSearch(){
    if($("#trazi") != null){
        
    
    $("#trazi").click(function(){
        $("#jumb").hide();
        $("#pagin").css("display" , "block");
        let transakcija = $("#transakcija").val();
        let lokacija = $("#grad").val().trim();
        let kategorija = $("#kategorija").val();
        let cenaOd = $("#cenaDo").val().trim();
        let cenaDo = $("#cenaOd").val().trim();
        $.ajax({
            url : "models/stanovi/paginator.php",
            dataType : "json",
            method : "post",
            data : {
                transakcija : transakcija,
                lokacija : lokacija,
                kategorija : kategorija,
                cenaOd : cenaOd,
                cenaDo : cenaDo
            },
            success : function(data){
                console.log(data);
                document.querySelector("#sviStanovi").innerHTML = stampajOglase(data);
            },
            error : function(x,xh){
                console.log(x);
            }
        });
        $(".pag").click(function(){
            let limit = parseInt($(this).data("limit"));
            $.ajax({
                url : "models/stanovi/paginator.php",
                data : {limit : limit,
                    transakcija : transakcija,
                lokacija : lokacija,
                kategorija : kategorija,
                cenaOd : cenaOd,
                cenaDo : cenaDo
                
                },
                dataType : "json",
                method : "post",
                success : function(data){
                    console.log(data);
                    document.querySelector("#sviStanovi").innerHTML = stampajOglase(data);
                    
                },
                error: function(x,xh){
                    console.log(xh);
                    console.log(x);
                }
            });
        
        });
        
        


    });
}
}