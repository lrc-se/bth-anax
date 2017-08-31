(function(win, doc) {
    "use strict";
    
    var menuBtn = doc.getElementById("menu-toggle");
    
    menuBtn.addEventListener("click", function() {
       menuBtn.classList.toggle("open"); 
    });
})(window, document);
