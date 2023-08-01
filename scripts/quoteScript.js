const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");



let formStepsNum = 0;

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

// function getServiceQty() {
//   return $('#serviceQty').val();
// }

// function getServiceQty() {
//   qty = $('#serviceQty').val();
//   var data = {
//       serviceQty: '2'
//   };

//   var xhr = new XMLHttpRequest();

//   //👇 set the PHP page you want to send data to
//   xhr.open("POST", "requestquote.php", true);
//   xhr.setRequestHeader("Content-Type", "application/json");

//   //👇 what to do when you receive a response
//   xhr.onreadystatechange = function () {
//       if (xhr.readyState == XMLHttpRequest.DONE) {
//           // alert(xhr.responseText);
//       }
//   };

//   //👇 send the data
//   xhr.send(JSON.stringify(data));
// }

function validateForm() {
  var isValid = true;
  $('.form-control input:required').each(function () {
    if ($(this).val() === '')
      isValid = false;
  });
  return isValid;
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
      // $('.pickupday').css(
      //   'display','block'
      // );

      // $('.pickupdate').css({
      //   display:'none'
      // });

      // $('.col .row .pickUpTimings-content .pickupday').css({
      //   display:'block'
      // });
      // $('.col .row .pickUpTimings-content .pickupdate').css({
      //   display:'none'
      // });
      // $("#pickupday").attr("disabled","");
      // $("#pickupdate").attr("disabled","disabled");
    } else {
      $('.serviceQty').css({
        opacity: '0'
      });
      $('.filterMonth').css({
        display: 'none'
      });
      // $("#pickupday").attr("disabled","disabled");
      // $("#pickupdate").attr("disabled","");
      // $('.pickupday').css({
      //   display:'none'
      // });
      // $('.pickupdate').css({
      //   display:'block'
      // });
      // $('.col .row .pickUpTimings-content .pickupday').css({
      //   display:'none'
      // });
      // $('.col .row .pickUpTimings-content .pickupdate').css({
      //   display:'block'
      // });

      // pickupday.style.display = "none";
      // pickupdate.style.display = "block";
      $('#serviceQty').val("1");

    }
  });

  // $('#serviceNext').click(function () {
  //   alert ($("#servicetype").val());
  //   if ($("#servicetype").val() == "regular") {
  //     $('.pickupday').css({
  //       display:'block',
  //     });
  //     $('.pickupdate').css({
  //       display:'none',
  //     });
  //   } else {
  //     $('.pickupday').css({
  //       display:'none',
  //     });
  //     $('.pickupdate').css({
  //       display:'block',
  //     });
  //   }
  // });

  $('#submitReq').click(function () {
    // if (validateForm == false) {
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
    });

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
    // }
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

  // $("#tickSI").change(function(){
  //   if (this.checked) {
  //     $("#firstNameSI").val(firstname)
  //     $("#lastNameSI").val(lastname)
  //     $("#emailSI").val(email)
  //     $("#contactSI").val(mobile)

  //     $("#firstNameSI").attr("disabled","disabled")
  //     $("#lastNameSI").attr("disabled","disabled")
  //     $("#emailSI").attr("disabled","disabled")
  //     $("#contactSI").attr("disabled","disabled")
  //   } 
  //   else {
  //     $("#firstNameSI").val("")
  //     $("#lastNameSI").val("")
  //     $("#emailSI").val("")
  //     $("#contactSI").val("")

  //     $("#firstNameSI").removeAttr("disabled","disabled")
  //     $("#lastNameSI").removeAttr("disabled","disabled")
  //     $("#emailSI").removeAttr("disabled","disabled")
  //     $("#contactSI").removeAttr("disabled","disabled")
  //   }
  // });

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

  // $(".switch").change(function(){
  //   if (document.getElementById("switch").checked) {
  //     $('.secondpickup').css({
  //       opacity: '1'
  //      });
  //   } else {
  //     $('.secondpickup').css({
  //       opacity: '0'
  //      });  
  //      $('#secondpickup').val("1");
  //   }
  // });
});

// function toggleclicked() {
//   var checkBox = document.getElementById("switch");
//   var secondpickup = document.getElementById("wholesecpickup");

//   if (checkBox.checked == true) {

//     // secondpickup.style.display = "block";
//     $('.pickUpTimings-content div:nth-child(n+4):nth-child(-n+5)').css({
//       display: "block"
//     });
//     $('.wholepickup').css({
//       display: "none"
//     });
//   } else {

//     $('.pickUpTimings-content div:nth-child(n+4):nth-child(-n+5)').css({
//       display: "none"
//     });
//     $('.wholepickup').css({
//       display: "block"
//     });
//   }
// }
// function serviceClicked() {
//   var servicetype = document.getElementById("servicetype");

//   if (servicetype.value == "regular") {

//     $('.pickupday').css({
//       display:'block'
//     });
//     $('.pickupdate').css({
//       display:'none'
//     });
//   } else {

//     $('.pickupday').css({
//       display:'none'
//     });
//     $('.pickupdate').css({
//       display:'block'
//     });
//   }
// }

function daysInMonth(month, year) {
  return new Date(year, month, 0).getDate();
}

function toggleclicked() {
  var checkBox = document.getElementById("switch");
  var secondpickup = document.getElementById("wholesecpickup");

  if (checkBox.checked == true) {

    // secondpickup.style.display = "block";
    $('.twopickups').css({
      display: "block"
    });
    $('.wholepickup').css({
      display: "none"
    });
    // $('.pickupday').css({
    //   display:'block'
    // });
    // $('.pickupdate').css({
    //   display:'none'
    // });
  } else {

    $('.twopickups').css({
      display: "none"
    });
    $('.wholepickup').css({
      display: "block"
    });
    // $('.pickupday').css({
    //   display:'none'
    // });
    // $('.pickupdate').css({
    //   display:'block'
    // });
  }
}

