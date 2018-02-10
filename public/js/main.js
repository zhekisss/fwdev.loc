var btn = document.getElementById("send");
var panelBody = document.getElementsByClassName("panel-body")[0];
var obj = {
    content: "qwerty"
};
console.log(btn);

send.addEventListener("click", function() {
    console.log(this);
    console.log(obj.content);
    // content = "page=" + encodeURIComponent('');

    var textResponse = "";

    var request = new XMLHttpRequest();
    console.log(request);
    request.open("POST", "/main/test", true);
    request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    request.send("request");

    request.addEventListener("readystatechange", function(res) {
        if (request.readyState === 4 && request.status === 200) {
            panelBody.innerHTML += request.responseText;
        }
    });
});