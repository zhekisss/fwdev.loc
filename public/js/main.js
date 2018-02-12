window.addEventListener('load', function(e){
  
  console.log(e);

  var btn = document.getElementById("send");
  var panelBody = document.getElementsByClassName("panel-body")[0];
  var title = document.getElementsByTagName("h1")[0];
  
  send.addEventListener("click", function() {
    content = "id=" + encodeURIComponent("1");
    var request = new XMLHttpRequest();
    
    request.open("post", "/main/test", true);
    
    request.addEventListener("readystatechange", function(res) {
      if (request.readyState === 4 && request.status === 200) {
        panelBody.style.cssText = "opacity:1";
        res = JSON.parse(request.responseText);
        panelBody.innerHTML += "<h3>" + res.name + "</h3><p>" + res.content + "</p>";
        title.innerHTML += res.img;
        // panelBody.innerHTML = res;
        
        console.log(request.responseText);
      }
    });
    
    request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(content);
  });
});

