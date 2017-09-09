(function(win, doc) {
    function editComment(e) {
        e.preventDefault();
        var id = e.target.getAttribute("data-id");
        var form = document.getElementById("comment-edit-form");
        form.action = RV1.basePath + "comment/update/" + id;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    try {
                        var comment = JSON.parse(xhr.responseText);
                    } catch (ex) {
                        alert("Felaktigt dataformat.");
                        return;
                    }
                    console.log(comment);
                    form.text.innerHTML = comment.text;
                    form.text.value = comment.text;
                    form.userId.value = comment.userId;
                    document.getElementById("comment-" + comment.id).appendChild(form);
                    form.style.display = "block";
                } else {
                    alert("Något gick fel.");
                }
            }
        };
        xhr.open("GET", RV1.basePath + "comment/get/" + id);
        xhr.send();
    }

    function deleteComment(e) {
        e.preventDefault();
        if (confirm("Är du säker på att du vill ta bort kommentaren?")) {
            var form = document.getElementById("comment-delete-form");
            form.action = RV1.basePath + "comment/delete/" + e.target.getAttribute("data-id");
            form.submit();
        }
    }

    Array.prototype.forEach.call(document.getElementsByClassName("comment-edit"), function(a) {
        a.addEventListener("click", editComment);
    });
    Array.prototype.forEach.call(document.getElementsByClassName("comment-delete"), function(a) {
        a.addEventListener("click", deleteComment);
    });
    document.getElementById("comment-edit-cancel").addEventListener("click", function() {
        document.getElementById("comment-edit-form").style.display = "none";
    });
})(window, document);
