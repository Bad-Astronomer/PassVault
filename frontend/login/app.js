function validateForm(){
    let fname = document.forms["signup"]["fname"].value;
    if (fname.length < 2) {
        alert("Invalid Name");
        return false;
    }
    let passvalue = document.forms["signup"]["password"].value;
    if (passvalue.length < 8) {
        alert("Your password should have atleast 8 characters");
        return false;
    }
    let confirmPass = document.forms["signup"]["confirmPassword"].value;
    if (passvalue != confirmPass) {
        alert("Password does not match");
    }
}