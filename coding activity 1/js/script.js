let name = $("#name");
let email = $("#email");
let message = $("#message");
let errorMessage = $(".error_incomplete");
let successMessage = $(".success");
let form = $("form");

async function formSubmission(e){
    e.preventDefault();
    errorMessage.hide();
    successMessage.hide();
    let formData = new FormData(form[0]);
    
    if (!name.val() || !email.val() || !message.val()) {
        errorMessage.text("Please fill all required fields.");
        errorMessage.show();
        return false;
    }
    
    $.LoadingOverlay("show");
    let response = await fetch("api/send.php", {
        method: "POST",
        body: formData
    });
    let data = await response.json();
    if (!data.success) {
        errorMessage.text("Cannot continue due to malformed request. Please resubmit the form.")
        errorMessage.show(); 
    } else {
        successMessage.show();
        name.val("");
        email.val("");
        message.val("");
    }
    $.LoadingOverlay("hide");
}

form.submit(formSubmission);