function validate(){
    var form = document.getElementById("form");
    var email = document.getElementById("mail").value;
    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/
    if(email.match(pattern))
    {
        form.classList.add("valid");
        form.classList.remove("invalid");
    }
    else{
        form.classList.remove("valid");
        form.classList.add("invalid");
    }
    if (email == "") {
        form.classList.remove("valid");
        form.classList.remove("invalid");
    }
}    