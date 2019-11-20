function loadPage(url, success, fail) {
    var req = new XMLHttpRequest();
    req.addEventListener("load", () => {
        if ((req.status) / 100 == 4)
            fail(req);
        if ((req.status) / 100 == 2)
            success(req);
    });
    req.open("GET", url);
    req.send();
}

function render(req) {
    document.getElementById("load").innerHTML = req.responseText;

    var re = new RegExp(/\<script[^\>]*src=\"(.*)\"[^\>]*\>/);
    var ret = req.responseText.matchAll(re);
    var res = ret.next();
    while (!res.done) {
        var script = document.createElement('script');
        script.src = res.value[1];
        document.head.appendChild(script);
        res = ret.next();
    }
}

function err(req) {
    console.log(req);
}