<script>
function visibilite(thingId) { 
    var targetElement; 
    targetElement = document.getElementById(thingId) ;
    if (targetElement.style.display == "none") {
        targetElement.style.display = "block" ; 
    }
    else { 
        targetElement.style.display = "none" ;
    }
}

</script>