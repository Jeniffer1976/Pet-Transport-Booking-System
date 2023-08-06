const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

function myFirstBtn() {
  if (document.getElementById("firstName").value === '') {
    document.getElementById("demo").innerHTML = "";
  } if (document.getElementById("lastName").value === '') {
    document.getElementById("demo").innerHTML = "";
  } if (document.getElementById("email").value === '') {
    document.getElementById("demo").innerHTML = "";
  } else {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  }
}

function mySecondBtn() {
  var checkBox = document.getElementById("switch");
  var secondpickup = document.getElementById("wholesecpickup");

  if (checkBox.checked == true) {
    if (document.getElementById("pickupdate").value === '') {
      document.getElementById("demo").innerHTML = "";
    } if (document.getElementById("firstpickup").value === '') {
      document.getElementById("demo").innerHTML = "";
    } if (document.getElementById("secondpickup").value === '') {
      document.getElementById("demo").innerHTML = "";
    } if (document.getElementById("pickupaddress").value === '') {
      document.getElementById("demo").innerHTML = "";
    } if (document.getElementById("firstNameSI").value === '') {
      document.getElementById("demo").innerHTML = "";
    } if (document.getElementById("lastNameSI").value === '') {
      document.getElementById("demo").innerHTML = "";
    } if (document.getElementById("contactSI").value === '') {
      document.getElementById("demo").innerHTML = "";
    } if (document.getElementById("emailSI").value === '') {
      document.getElementById("demo").innerHTML = "";
    } else {
      formStepsNum++;
      updateFormSteps();
      updateProgressbar();
    }
  } else {
    if (document.getElementById("pickupdate").value === '') {
      document.getElementById("demo").innerHTML = "";
    } if (document.getElementById("onepickup").value === '') {
      document.getElementById("demo").innerHTML = "";
    } if (document.getElementById("pickupaddress").value === '') {
      document.getElementById("demo").innerHTML = "";
    } if (document.getElementById("firstNameSI").value === '') {
      document.getElementById("demo").innerHTML = "";
    } if (document.getElementById("lastNameSI").value === '') {
      document.getElementById("demo").innerHTML = "";
    } if (document.getElementById("contactSI").value === '') {
      document.getElementById("demo").innerHTML = "";
    } if (document.getElementById("emailSI").value === '') {
      document.getElementById("demo").innerHTML = "";
    } else {
      formStepsNum++;
      updateFormSteps();
      updateProgressbar();
    }
  }
};

function myThirdBtn() {
  if (document.getElementById("dropoffaddress").value === '') {
    document.getElementById("demo").innerHTML = "";
  } if (document.getElementById("firstNameRI").value === '') {
    document.getElementById("demo").innerHTML = "";
  } if (document.getElementById("lastNameRI").value === '') {
    document.getElementById("demo").innerHTML = "";
  } if (document.getElementById("contactRI").value === '') {
    document.getElementById("demo").innerHTML = "";
  } if (document.getElementById("emailRI").value === '') {
    document.getElementById("demo").innerHTML = "";
  } else {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  }
}



$('#submitReq').click(function () {
  if (document.getElementById("petFname").value === '') {
    document.getElementById("demo").innerHTML = "";
  } if (document.getElementById("petLname").value === '') {
    document.getElementById("demo").innerHTML = "";
  } if (document.getElementById("petType").value === '') {
    document.getElementById("demo").innerHTML = "";
  } if (document.getElementById("age").value === '') {
    document.getElementById("demo").innerHTML = "";
  } if (document.getElementById("weight").value === '') {
    document.getElementById("demo").innerHTML = "";
  } if (document.getElementById("height").value === '') {
    document.getElementById("demo").innerHTML = "";
  } if (document.getElementById("width").value === '') {
    document.getElementById("demo").innerHTML = "";
  } else {
    $('#reqForm').submit(function (e) {
      e.preventDefault();
      $.ajax({
        url: 'reqFormAction.php',
        method: 'post',
        data: $(this).serialize(),
        success: function (response) {
          console.log(response);
        }
      })
    })

    const nav = document.querySelector("nav");
    const endScreen_wrapper = document.querySelector(".endScreen_wrapper");

    nav.classList.contains("sticky-top") &&
      nav.classList.remove("sticky-top");

    endScreen_wrapper.classList.add("active");

    $('html, body').css({
      overflow: 'hidden'
    });
    $('.endScreen_wrapper').on('scroll touchmove mousewheel', function (e) {
      e.preventDefault();
      e.stopPropagation();
      return false;
    })
  }
});




nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}


$(document).ready(function () {
  const pickupday = document.getElementById('pickupday');
  const pickupdate = document.getElementById('pickupdate');
  $("#filterMonth").change(function () {

    if ($("#pickupday").val() != null) {
      var serviceQty = $("#serviceQty").val();
      var month = $("#filterMonth").val();
      var pickday = $("#pickupday").val();

      var d = new Date();
      var getTot = daysInMonth(month, d.getFullYear()); //Get total days in a month
      var day = new Array();

      for (var x = 1; x <= getTot; x++) {    //looping through days in month
        var newDate = new Date("2023", month, x)
        if (newDate.getDay() == pickday) {
          day.push(x);
        }


      }
      for (var i = 0; i < serviceQty; i++) {
        var field = document.getElementsByName('pickupdate[]')[i];

        var setDay = day[i];
        var setMonth = month;
        var setYear = d.getFullYear();

        if (setDay.toString().length == 1) {
          setDay = 0 + setDay.toString();
        }
        if (setMonth.toString().length == 1) {
          setMonth = 0 + setMonth.toString();
        }

        field.value = `${setYear}-${setMonth}-${setDay}`;
      }

    }
  });
  $("#pickupday").change(function () {
    if ($("#filterMonth").val() != null) {
      var serviceQty = $("#serviceQty").val();
      var month = $("#filterMonth").val();
      var pickday = $("#pickupday").val();

      var d = new Date();
      var getTot = daysInMonth(month, d.getFullYear()); //Get total days in a month
      var day = new Array();

      for (var x = 1; x <= getTot; x++) {    //looping through days in month
        var newDate = new Date("2023", month, x)
        if (newDate.getDay() == pickday) {
          day.push(x);
        }


      }
      for (var i = 0; i < serviceQty; i++) {
        var field = document.getElementsByName('pickupdate[]')[i];

        var setDay = day[i];
        var setMonth = month;
        var setYear = d.getFullYear();

        if (setDay.toString().length == 1) {
          setDay = 0 + setDay.toString();
        }
        if (setMonth.toString().length == 1) {
          setMonth = 0 + setMonth.toString();
        }

        field.value = `${setYear}-${setMonth}-${setDay}`;
      }
    }
  });
  // $('#pickupday').hide();
  $("#servicetype").change(function () {
    if (this.value == "regular") {
      $('.serviceQty').css({
        opacity: '1'
      });
      $('.filterMonth').css({
        display: 'block'
      });

    } else {
      $('.serviceQty').css({
        opacity: '0'
      });
      $('.filterMonth').css({
        display: 'none'
      });

      $('#serviceQty').val("1");

    }
  });

  $("#tickSI").change(function () {
    if (this.checked) {
      $("#firstNameSI").val(firstname)
      $("#lastNameSI").val(lastname)
      $("#emailSI").val(email)
      $("#contactSI").val(mobile)

      $("#firstNameSI").attr("disabled", "disabled")
      $("#lastNameSI").attr("disabled", "disabled")
      $("#emailSI").attr("disabled", "disabled")
      $("#contactSI").attr("disabled", "disabled")
    }
    else {
      $("#firstNameSI").val("")
      $("#lastNameSI").val("")
      $("#emailSI").val("")
      $("#contactSI").val("")

      $("#firstNameSI").removeAttr("disabled", "disabled")
      $("#lastNameSI").removeAttr("disabled", "disabled")
      $("#emailSI").removeAttr("disabled", "disabled")
      $("#contactSI").removeAttr("disabled", "disabled")
    }
  });

  $("#tickRI").change(function () {
    if (this.checked) {
      $("#firstNameRI").val(firstname)
      $("#lastNameRI").val(lastname)
      $("#emailRI").val(email)
      $("#contactRI").val(mobile)

      $("#firstNameRI").attr("disabled", "disabled")
      $("#lastNameRI").attr("disabled", "disabled")
      $("#emailRI").attr("disabled", "disabled")
      $("#contactRI").attr("disabled", "disabled")
    }
    else {
      $("#firstNameRI").val("")
      $("#lastNameRI").val("")
      $("#emailRI").val("")
      $("#contactRI").val("")

      $("#firstNameRI").removeAttr("disabled", "disabled")
      $("#lastNameRI").removeAttr("disabled", "disabled")
      $("#emailRI").removeAttr("disabled", "disabled")
      $("#contactRI").removeAttr("disabled", "disabled")
    }
  });

});



function daysInMonth(month, year) {
  return new Date(year, month, 0).getDate();
}

function toggleclicked() {
  var checkBox = document.getElementById("switch");
  var secondpickup = document.getElementById("wholesecpickup");

  if (checkBox.checked == true) {

    $('.twopickups').css({
      display: "block"
    });
    $('.wholepickup').css({
      display: "none"
    });

  } else {

    $('.twopickups').css({
      display: "none"
    });
    $('.wholepickup').css({
      display: "block"
    });

  }
}

