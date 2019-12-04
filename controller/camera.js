// Getting variables
var imageLayer = document.getElementById("CANVAS"); //document.getElementById("canvas");
var stickerLayer = document.getElementById("CANVAS"); //this speaks to the sticker canvas;
var imageContext = imageLayer.getContext('2d');
var stickerContext = stickerLayer.getContext('2d');
var imageDisplay = document.getElementById("image-display");
var stickerDisplay = document.getElementById("sticker-display");
var Videobox = document.getElementById("video");
var FileUpload = document.getElementById("fileupload");
var capture = document.getElementById("capture");
var save = document.getElementById("save-btn");


function captureState() {
    save.style.display = "none";
    imageDisplay.style.display = "none";
    stickerDisplay.style.display = "none";
    Videobox.style.display = "initial";
    capture.style.display = "initial";
    FileUpload.style.display = "initial";
}

function editState() {
    save.style.display = "initial";
    imageDisplay.style.display = "initial";
    stickerDisplay.style.display = "initial";
    Videobox.style.display = "none";
    capture.style.display = "none";
    FileUpload.style.display = "none";
}
captureState();
// Upload segment

//
function addsticker() {
    let sticker = new Image();
    sticker.src = '../../img/stickers/blue-wings.png';
    stickerContext.drawImage(sticker, 0, 0, 250, 250);
}

//capture.addEventListener("click", (event) => {
//	stickerContext.drawImage(, 0,0);
//});

FileUpload.addEventListener("change", (event) => {
    if (FileUpload.files.length > 0 && FileUpload.files[0].type.match(/image\/*/)) {
        var image = new Image();
        image.addEventListener("load", () => {
            imageLayer.height = image.height;
            imageLayer.width = image.width;
            imageContext.drawImage(image, 0, 0);
            editState();
            imageDisplay.src = imageLayer.toDataURL();
        });
        image.src = URL.createObjectURL(FileUpload.files[0]);
    }
});

// capture segment
capture.addEventListener("click", (event) => {
    imageLayer.height = Videobox.offsetHeight;
    imageLayer.width = Videobox.offsetWidth;
    imageContext.drawImage(Videobox, 0, 0);
    editState();
    imageDisplay.src = imageLayer.toDataURL();
});

if (navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({ "video": true }).then((stream) => {
        Videobox.srcObject = stream;
    }).catch((error) => {
        console.log(error);
    });
}

//fillupload
save.addEventListener("click", () => {
    var canvas = document.getElementById("canvas");
    var dataURL = imageLayer.toDataURL("image/png");
    var xhr = new XMLHttpRequest();
    xhr.addEventListener("load", function() {
        console.log(xhr.responseText);
        captureState();
    });
    xhr.open('POST', '/camagru/controller/Profileimg.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("img=" + encodeURIComponent(dataURL.replace("data:image/png;base64,", "")));
});