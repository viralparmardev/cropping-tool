var link = document.getElementById('upload');
link.style.visibility = 'hidden';

function validateType(event) {

    var f = document.getElementById('file');
    var file = f.files.item(0);

    var fileName = file.name;
    var fileExtension = fileName.replace(/^.*\./, '');

    if (fileExtension == 'jpg' || fileExtension == 'jpeg' || fileExtension == 'png') {
        document.getElementById('details').innerHTML = "Uploaded file: " + fileName;
        validateSize(file, event);
    }
    else {
        document.getElementById('details').innerHTML = "Please upload a JPG or PNG image...";
        link.style.visibility = 'hidden';
    }
}

function validateSize(file, event) {
    var reader = new FileReader();
    reader.onload = function (e) {
        var img = new Image();
        img.src = e.target.result;
        img.onload = function () {
            if (this.width == 1024 && this.height == 1024) {
                link.style.visibility = 'visible';
                previewImage(event);
            }
            else {
                document.getElementById('details').innerHTML = "Please upload a 1024 x 1024 sized image...";
                link.style.visibility = 'hidden';
            }
        }
    };
    reader.readAsDataURL(file);
}

function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('preview');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
