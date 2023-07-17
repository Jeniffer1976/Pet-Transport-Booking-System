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

  $("#servicetype").change(function(){
    if (this.value == "regular") {
      $('.serviceQty').css({
        opacity: '1'
       });
    } else {
      $('.serviceQty').css({
        opacity: '0'
       });  
       $('#serviceQty').val("1");
    }
  });

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
      $('.endScreen_wrapper').on('scroll touchmove mousewheel', function(e){
        e.preventDefault();
        e.stopPropagation();
        return false;
      })
    // }
  });

});