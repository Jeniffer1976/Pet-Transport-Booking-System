$(document).ready(function () {
    var counter = 2;
    // $("#addPet").click(function (e) {
    $(document).on("click", "#addPet", function (e) {
        e.preventDefault(); // to prevent page from being refreshed
        $(".btns").hide()
        $(".petInfo").append(`  <br><hr><div class="petSec">
            <h3 class="header2 m-0 pb-3" align="left">PET `+ counter + `'S INFORMATION</h3>
            <div class="row g-3 gx-5">
            <div class="col-md-6">
                <label for="petFname" class="form-label para" align="left">First Name:</label>
                <input type="text" class="form-control rounded-pill" name="petFname[]" required>
            </div>
            <div class="col-md-6">
                <label for="petLname" class="form-label para" align="left">Last Name:</label>
                <input type="text" class="form-control rounded-pill" name="petLname[]">
            </div>
            <div class="col-md-6">
                <label for="petType" class="form-label para" align="left">Type of pet:</label>
                <input type="text" class="form-control rounded-pill" name="petType[]" required>
            </div>
            <div class="col-md-6">
                <label for="breed" class="form-label para" align="left">Breed:</label>
                <input type="text" class="form-control rounded-pill" name="breed[]" required>
            </div>
            <h4 class="para-it mt-5 pt-3">Size of pet</h4>
            <div class="col-md-6">
                <label for="weight" class="form-label para" align="left">Weight (Kg):</label>
                <input type="text" class="form-control rounded-pill" name="weight[]" required>
            </div>
            <div class="col-md-6">
                <label for="height" class="form-label para" align="left">Height (Cm):</label>
                <input type="text" class="form-control rounded-pill" name="height[]" required>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <label for="width" class="form-label para" align="left">Width (Cm):</label>
                <input type="text" class="form-control rounded-pill" name="width[]" required>
            </div>
            <div class="col-12">
                <label for="addInfo" class="form-label para mt-4" align="left">Additional
                    Comments:</label>
                <textarea name="addInfo[]" rows="4" cols="50" class="form-control rounded">
         </textarea>
            </div>
          
            <div class="row g-3 gx-5 btns">
                <div class="col-md petBtn">
                        <button class="btn btn-light rounded-circle" id="addPet" type="button">
                            <i class="fas fa-plus"></i></button>
                        <p class="para">Add Pet</p>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md petBtn">
                    <p class="para">Delete Pet</p>
                    <button class="btn btn-light rounded-circle" id="delPet" type="button">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
        </div>
    </div>`);
        counter += 1;
    });

    $(document).on("click", "#delPet", function (e) {
        e.preventDefault();
        let rowItem = $(this).parent().parent().parent().parent();

        $(rowItem).remove()
        counter -= 1;
        $(".btns:last").show()

    });

});