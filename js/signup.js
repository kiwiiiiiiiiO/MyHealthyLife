var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "送出";  
    var btn = document.getElementById("nextBtn");
  } else {
    document.getElementById("nextBtn").innerHTML = "繼續";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    window.location.href = "Welcome.html";
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    var z, z_valid = false;
    
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    z =  x[currentTab].getElementsByClassName("radio");
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

    // check the radio is clicked 
    for (i = 0; i < z.length; i++) {

      if (z[i].checked == true) {
        z_valid = true;
      }

    }

    // If the valid status is true, mark the step as finished and valid:
    if (valid && z_valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid&& z_valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
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




