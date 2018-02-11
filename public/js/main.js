var btn = document.getElementById("send");
var panelBody = document.getElementsByClassName("panel-body")[0];

send.addEventListener("click", function() {

    content = "id=" + encodeURIComponent('1');
    var request = new XMLHttpRequest();
    post = 'id=1&name=post'; // + encodeURIComponent(content);
    request.open("post", "/main/test", true);

    request.addEventListener("readystatechange", function(res) {
        if (request.readyState === 4 && request.status === 200) {
            panelBody.style.cssText = 'opacity:1';
            res = JSON.parse(request.responseText);
            panelBody.innerHTML = '<h3>' + res.name + '</h3>';
            panelBody.innerHTML += '<p>' + res.content + '</p>';
            console.log(res);
        }
    });

    request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(content);
});