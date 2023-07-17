function triggerClick() {
    document.querySelector("#imgUpload").click();
}

function displayImage(i) {
    if (i.files[0]) {
        var reader = new FileReader();

        reader.onload = function (i) {
            document.querySelector("#imgPreview").setAttribute('src', i.target.result);
        }
        reader.readAsDataURL(i.files[0]);
    }

}