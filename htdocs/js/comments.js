/* jshint browser: true, devel: true */
/* globals RV1 */
(function(win, doc) {
    "use strict";

    var commentId;
    var commentText;
    var editForm = doc.getElementById("comment-edit-form");

    function cancelEdit() {
        editForm.style.display = "none";
        doc.querySelector("#comment-" + commentId + " .comment-actions").style.display = "block";
        doc.getElementById("comment-" + commentId).replaceChild(commentText, editForm);
    }

    function editComment(e) {
        e.preventDefault();
        if (editForm.style.display != "none") {
            cancelEdit();
        }
        var id = e.target.getAttribute("data-id");
        commentId = id.substring(id.indexOf("/") + 1);
        editForm.action = RV1.basePath + "comment/update/" + id;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var comment;
                    try {
                        comment = JSON.parse(xhr.responseText);
                    } catch (ex) {
                        alert("Felaktigt dataformat.");
                        return;
                    }
                    editForm.text.innerHTML = comment.text;
                    editForm.text.value = comment.text;
                    editForm.userId.value = comment.userId;
                    var div = doc.getElementById("comment-" + comment.id);
                    commentText = div.replaceChild(editForm, div.querySelector(".comment-text"));
                    editForm.style.display = "block";
                    var input = editForm.querySelector("textarea");
                    input.focus();
                    input.setSelectionRange(0, 0);
                    doc.querySelector("#comment-" + comment.id + " .comment-actions").style.display = "none";
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
            var form = doc.getElementById("comment-delete-form");
            form.action = RV1.basePath + "comment/delete/" + e.target.getAttribute("data-id");
            form.submit();
        }
    }

    Array.prototype.forEach.call(doc.getElementsByClassName("comment-edit"), function(a) {
        a.addEventListener("click", editComment);
    });
    Array.prototype.forEach.call(doc.getElementsByClassName("comment-delete"), function(a) {
        a.addEventListener("click", deleteComment);
    });
    doc.getElementById("comment-edit-cancel").addEventListener("click", cancelEdit);
})(window, document);
