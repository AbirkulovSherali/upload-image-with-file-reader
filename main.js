window.onload = function() {

    let img = document.querySelector('#img');
    let preview = document.querySelector('#preview');
    let blobInput = document.querySelector("#blobInput");

    img.onchange = function(){
        let reader = new FileReader();
        reader.readAsDataURL(img.files[0]);
        reader.onload = function(){
            let dataUrl = reader.result;
            let imgSize = (img.files[0].size / 1000).toFixed(2);
            let mimeType = img.files[0].type;
            let allowedMimes = [
                "image/gif", "image/jpeg", "image/png",
                "image/vnd.microsoft.icon", "image/x-icon"
            ];

            if(allowedMimes.indexOf(mimeType) === -1) {
                alert("Нельзя загружать изображения подобного формата!");
                preview.src = '';
                blobInput.value = '';
                return false;
            }

            if(imgSize > 130) {
                alert("Файл должен быть не более 130 килобайт!");
                preview.src = '';
                blobInput.value = '';
                return false;
            }

            preview.src = dataUrl;
            blobInput.value = dataUrl;
        }
    }

}
