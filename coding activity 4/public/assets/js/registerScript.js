let result = $(".result");
let form = $(".form_input");

async function formSubmission(e)
{
    e.preventDefault();
    result.removeClass("error");
    result.removeClass("success");

    let formData = new FormData(form[0]);

    for (const [_, value] of formData) {
        if (value) {
            continue;
        }
        error("Please fill all required fields.");
        return;
    }

    if (formData.get("email") != formData.get("confirm_email")) {
        error("Email and Confirmation email is not the same");
        return
    }

    if (formData.get("password") != formData.get("confirm_password")) {
        error("Password and Confirmation password is not the same")
        return
    }

    $.LoadingOverlay("show");

    let response = await fetch(`api / register`, {
        method: "POST",
        body: formData
    });

    let data = await response.json();
    if (data.success) {
        form.trigger("reset");
        result.addClass("success");
    } else {
        result.addClass("error");
    }
    result.text(data.message);
    result.show();
    $.LoadingOverlay("hide");
}

function error(message)
{
    result.addClass("error");
    result.text(message);
    result.show();
}

form.submit(formSubmission);