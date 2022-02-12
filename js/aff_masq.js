$(document).ready(function() {
    $("#afficher").click(function(){
    $(".invisible").css("display","block")
    $("#afficher").css("display","none")
    }

    )
    $("#masquer").click(function(){
    $(".invisible").css("display","none")
    $("#afficher").css("display","block")
    })
  })
