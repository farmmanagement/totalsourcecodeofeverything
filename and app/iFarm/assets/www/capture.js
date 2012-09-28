// JavaScript Document

function uploadPhoto(imageURI,server)
{
            var options = new FileUploadOptions();
            options.fileKey="imagefile";
            options.fileName=imageURI.substr(imageURI.lastIndexOf('/')+1);
            options.mimeType="image/jpeg";
            options.chunkedMode = false;

            var params = new Object();
            params.fid = "AP07260602";

            options.params = params;

            var ft = new FileTransfer();
            ft.upload(imageURI, server , win, fail, options);
}

function win(r)
{
            alert("Code = " + r.responseCode + "Response = " + r.response + "Sent = " + r.bytesSent);
}

function fail(error)
{
            alert("An error has occurred: Code = " + error.code + "\nupload error source " + error.source + "\nupload error target " + error.target);
}

function takePicture()
{
        navigator.camera.getPicture(
            function(uri) {
                var img = document.getElementById('camera_image');
                img.style.visibility = "visible";
                img.src = uri;
                alert("Success!");
                
                var ch = confirm("Upload?");
                if( ch == true)
                {	uploadPhoto(uri,"http://technonectar11.com/farm/rest/imageupload"); }
            },
            function(e) {
                alert("Error getting picture: " + e);              
            },
            { quality: 50, destinationType: navigator.camera.DestinationType.FILE_URI});
}

function uploadSelectedPic()
{
        navigator.camera.getPicture(
            function(uri) {
                var img = document.getElementById('camera_image');
                img.style.visibility = "visible";
                img.src = uri;
                alert("File Selected!");
                var ch = confirm("Upload?");
                if( ch == true)
                {	uploadPhoto(uri,"http://technonectar11.com/farm/rest/imageupload"); }
            },
            function(e) {
               alert("Error getting picture: " + e);
            },
            { quality: 50, destinationType: navigator.camera.DestinationType.FILE_URI, sourceType: navigator.camera.PictureSourceType.PHOTOLIBRARY});
}