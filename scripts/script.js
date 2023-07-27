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

function openReqErr() {
    const nav = document.querySelector("nav");
    const errScreen_wrapper = document.querySelector(".errScreen_wrapper");

    nav.classList.contains("sticky-top") &&
      nav.classList.remove("sticky-top");

      errScreen_wrapper.classList.add("active");

    $('html, body').css({
      overflow: 'hidden'
    });


}