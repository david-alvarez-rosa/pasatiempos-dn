function PreviewImage1() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage1").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview1").src = oFREvent.target.result;
    };
};


function PreviewImage2() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage2").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview2").src = oFREvent.target.result;
    };
};
