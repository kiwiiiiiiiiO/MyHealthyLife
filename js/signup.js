var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
hideMsg();
//  新增 validation 
function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if((n == (x.length - 1))){
    document.getElementById("nextBtn").innerHTML = "送出";
  }else {
    document.getElementById("nextBtn").innerHTML = "下一步";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // if you have reached the end of the form... :
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (currentTab >= x.length-1) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // Otherwise, display the correct tab:
  showTab(currentTab);
}
function hideMsg(){
  window.setTimeout(function(){
      document.getElementById("msg").style.display = "none";
  }, 3000);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

var btn = document.getElementsByClassName("btn_1");
for(var i=0; i< btn.length;i++){
  btn[i].addEventListener('click', function (e) {
    var ID = e.id;
    e.target.style.backgroundColor = '#0EA293';
    e.target.style.color = 'white';
    for(var i=0; i< btn.length;i++){
      if(btn[i].id != ID){
        btn[i].style.backgroundColor = 'white';
        btn[i].style.color = '#0EA293';
      }
    }
  }
)}

const togglePassword = document.querySelector('#checkEye');
const password = document.querySelector('#passwordInput');
togglePassword.addEventListener('click', function (e) {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});