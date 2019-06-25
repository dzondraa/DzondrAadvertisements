$(".brisanje").click(function(){
    let id = $(this).data("id");
    $.ajax({
            url : "models/stanovi/brisanje.php",
            method : "post",
            dataType : "json",
            data : {id : id},
            success : function(data){
                console.log(data);
                document.querySelector("#stans").innerHTML = "";
                
                data.forEach(e => {
                    let naslov;
                    if(e.naslov.length > 15){
                        naslov = e.naslov.substr(0 , 17)+"...";   
                       }
                       else{
                           naslov = e.naslov;
                       }
                       console.log(e.pocetnaSlika);
                    document.querySelector("#stans").innerHTML += `<div class="card moja" data-id="<?=$oglas->ID ?>" style="width: 18rem;">
                    <img class="card-img-top" src="${e.pocetnaSlika[0].malaSlika}" alt="${e.naslov}">
                    <div class="card-body">
                      <h5 class="card-title">
                     ${naslov}
                      </h5>
                      <p class="cena"> ${e.cena}&euro; </p>
                      <a href="#" data-id="${e.id}" class="btn btn-primary">Izmeni</a>
                      <a href="#" data-id="${e.id}" class="btn btn-danger brisanje">Izbrisi</a>
                    </div>
                  </div>`;
                    
                });
            },
            error : function(e,b){
                console.log(e);
                }
    });
});