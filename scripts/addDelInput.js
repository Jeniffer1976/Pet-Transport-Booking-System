$(document).ready(function () {

    function resetPickUpTimings() {
        $(".pickUpTimings-content").html(
            `
            <div class="col-md">
            </div>

            <div class="col-md-6">
                <label for="pickupdate" class="form-label para" align="left">Preferred pick
                    up
                    date:</label>
                <input type="date" id="pickupdate" class="form-control rounded-pill"
                    name="pickupdate[]">
            </div>

            <div class="col-md"></div>
            <!-- </div> -->
            <div class="twopickups">
                <div class="row">
                    <div class="col-md-6">
                        <label for="firstpickup" class="form-label para" align="left">First
                            pick
                            up
                            time:</label>
                        <input type="time" id="firstpickup"
                            class="form-control rounded-pill para" name="firstpickup[]">
                    </div>
                    <div class="col-md-6">
                        <label for="secondpickup" class="form-label para"
                            align="left">Second
                            pick
                            up
                            time:</label>
                        <input type="time" id="secondpickup"
                            class="form-control rounded-pill para" name="secondpickup[]">
                    </div>
                </div>
            </div>
            <div class="wholepickup">
                <div class="row g-3 gx-5">
                    <div class="col-md">
                    </div>
                    <div class="col-md-6">
                        <label for="onepickup" class="form-label para" align="left">Pick
                            up
                            time:</label>
                        <input type="time" id="onepickup"
                            class="form-control rounded-pill para" name="onepickup[]">
                    </div>
                    <div class="col-md">
                    </div>
                </div>
            </div>
            `
        );
    }


    var counter = 2;
    // $("#addPet").click(function (e) {
    $(document).on("click", "#addPet", function (e) {
        e.preventDefault(); // to prevent page from being refreshed
        $(".btns").hide()
        $(".petSec").append(`  
     
        <div>
        <div class="container-fluid d-flex justify-content-center">
            <div class="inverse full-bleed overflow-hidden" id="form">
            <br>
            <h3 class="header2 m-0 pb-3" align="left">PET `+ counter + `'S INFORMATION</h3>
                        <div class="row g-3 gx-5">
                        <div class="col-md-6">
                            <label for="petFname" class="form-label para" align="left">First Name:</label>
                            <input type="text" class="form-control rounded-pill" name="petFname[]"
                                list='petfNameList' required>

                            <datalist id="petfNameList">
                                <?php for ($p = 0; $p < count($petContent); $p++) {
                                    // getting info from the quote table
                                    $first_name = $petContent[$p]['first_name'];
                                    ?>
                                    <option value="<?php echo $first_name ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-md-6">
                            <label for="petLname" class="form-label para" align="left">Last Name:</label>
                            <input type="text" class="form-control rounded-pill" name="petLname[]"
                                list='petlNameList'>

                            <datalist id="petlNameList">
                                <?php for ($p = 0; $p < count($petContent); $p++) {
                                    // getting info from the quote table
                                    $last_name = $petContent[$p]['last_name'];
                                    ?>
                                    <option value="<?php echo $last_name ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-md-6">
                            <label for="petType" class="form-label para" align="left">Type of pet:</label>
                            <input type="text" class="form-control rounded-pill" name="petType[]" required
                                list='petTypeList'>

                            <datalist id="petTypeList">
                                <?php for ($p = 0; $p < count($petContent); $p++) {
                                    // getting info from the quote table
                                    $type = $petContent[$p]['type'];
                                    ?>
                                    <option value="<?php echo $type ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-md-6">
                            <label for="breed" class="form-label para" align="left">Breed:</label>
                            <input type="text" class="form-control rounded-pill" name="breed[]" required
                                list='breedList'>

                            <datalist id="breedList">
                                <?php for ($p = 0; $p < count($petContent); $p++) {
                                    // getting info from the quote table
                                    $breed = $petContent[$p]['breed'];
                                    ?>
                                    <option value="<?php echo $breed ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-md-6">
                            <label for="age" class="form-label para" align="left">Age:</label>
                            <input type="number" class="form-control rounded-pill" name="age[]" required
                                list='ageList'>

                            <datalist id="ageList">
                                <?php for ($p = 0; $p < count($petContent); $p++) {
                                    // getting info from the quote table
                                    $age = $petContent[$p]['age'];
                                    ?>
                                    <option value="<?php echo $age ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                        <h4 class="para-it mt-5 pt-3">Size of pet</h4>
                        <div class="col-md-6">
                            <label for="weight" class="form-label para" align="left">Weight (Kg):</label>
                            <input type="number" class="form-control rounded-pill" step="0.1"
                                name="weight[]" list='weightList' required>

                            <datalist id="weightList">
                                <?php for ($p = 0; $p < count($petContent); $p++) {
                                    // getting info from the quote table
                                    $weight = $petContent[$p]['weight'];
                                    ?>
                                    <option value="<?php echo $weight ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-md-6">
                            <label for="height" class="form-label para" align="left">Height (Cm):</label>
                            <input type="number" class="form-control rounded-pill" step="0.1"
                                name="height[]" list='heightList' required>

                            <datalist id="heightList">
                                <?php for ($p = 0; $p < count($petContent); $p++) {
                                    // getting info from the quote table
                                    $height = $petContent[$p]['height'];
                                    ?>
                                    <option value="<?php echo $height ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <label for="width" class="form-label para" align="left">Width (Cm):</label>
                            <input type="number" class="form-control rounded-pill" step="0.1" name="width[]"
                                required list='widthList'>

                            <datalist id="widthList">
                                <?php for ($p = 0; $p < count($petContent); $p++) {
                                    // getting info from the quote table
                                    $width = $petContent[$p]['width'];
                                    ?>
                                    <option value="<?php echo $width ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-12">
                            <label for="addInfo" class="form-label para mt-4" align="left">Additional
                                Comments:</label>
                            <textarea name="addInfo[]" rows="4" cols="50" class="form-control rounded"
                                list='addInfoList'>
                            </textarea>
                        </div>
                    
                        <div class="row g-3 gx-5 btns">    
                            <div class="col-md petBtn">
                                <button class="btn btn-light rounded-circle" id="delPet" type="button">
                                    <i class="fas fa-minus"></i></button>
                                <p class="para">Delete Pet</p>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md petBtn">
                                <p class="para">Add Pet</p>
                                <button class="btn btn-light rounded-circle" id="addPet" type="button">
                                    <i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `);
        counter += 1;
    });

    $(document).on("click", "#delPet", function (e) {
        e.preventDefault();
        let rowItem = $(this).parent().parent().parent().parent().parent().parent();
        $(rowItem).remove();



        counter -= 1;
        $(".btns:last").show();

    });


    $(document).on("click", "#serviceNext", function (e) {
        resetPickUpTimings();
        serviceQty = $('#serviceQty').val();
        for (let i = 1; i < serviceQty; i++) {
            $(".pickUpTimings-content").append(`
            <hr>
            <div class="col-md">
                                </div>
                                <div class="col-md-6">
                                    <label for="pickupdate" class="form-label para" align="left">Prefered pick up
                                        date: `+ (i + 1) + `</label>
                                    <input type="date" id="pickupdate" class="form-control rounded-pill"
                                            name="pickupdate[]">
                                </div>
                                <div class="col-md"></div>
                                <!-- </div> -->
                                <div class="twopickups">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="firstpickup" class="form-label para" align="left">First pick
                                                up
                                                time:</label>
                                            <input type="time" id="firstpickup" class="form-control rounded-pill para"
                                                name="firstpickup[]">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="secondpickup" class="form-label para" align="left">Second
                                                pick
                                                up
                                                time:</label>
                                            <input type="time" id="secondpickup" class="form-control rounded-pill para"
                                                name="secondpickup[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="wholepickup">
                                    <div class="row g-3 gx-5">
                                        <div class="col-md">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="onepickup" class="form-label para" align="left">Pick
                                                up
                                                time:</label>
                                            <input type="time" id="onepickup" class="form-control rounded-pill para"
                                                name="onepickup[]">
                                        </div>
                                        <div class="col-md">
                                        </div>
                                    </div>
                                </div>
            `);

        }
    });

});