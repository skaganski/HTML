window.onload = function() {
    var bead = document.querySelectorAll(".bead");
    for(var i = 0; i < bead.length; i++) {
        bead[i].onclick = function(i) {
            if (getComputedStyle(this).cssFloat == "left") {
                this.style.cssFloat = "right";
            } else {
                this.style.cssFloat = "left";
            }
        }
    }
}
