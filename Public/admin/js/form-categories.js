// -----------------------------------------------------------------------------
// les catégories dans le formulaire de création d'article
// -----------------------------------------------------------------------------

jQuery(document).ready(function($){
    $(".format-game").hide();
    $(".name-author").hide();   
    $(".format-expo").hide();
    $(".name-public").hide();
});


$("#select-block").change(function() {

    if ( $("#select-block").val() == "game" ){
        
        $(".format-expo").hide();
        $(".format-game").show();
        $(".name-public").show();    
        $(".name-author").show();    
    }
    
    if ( $("#select-block").val() == "movie" ){ 
        
        $(".format-expo").hide();
        $(".format-game").hide();   
        $(".name-public").show();
    }
   
    if ( $("#select-block").val() == "book" ){
        
        $(".format-flyer").hide();
        $(".format-game").hide();

        $(".name-public").show();

    }

    if ( $("#select-block").val() == "expo" ){
        
        $(".format-game").hide();
        $(".name-public").hide();
        $(".name-author").hide();

        $(".format-expo").show();

    }

});
