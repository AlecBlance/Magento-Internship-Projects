let result = $(".result");
let form = $(".form_input");
let optional = ["password", "confirm_password", "confirm_email"];

async function formSubmission(e)
{
    e.preventDefault();
    result.removeClass("error");
    result.removeClass("success");

    let formData = new FormData(form[0]);

    for (const [key, value] of formData) {
        if (value || optional.includes(key)) {
            continue;
        }
        error("Please fill all required fields.");
        return;
    }

    if (formData.get('confirm_email') && formData.get("email") != formData.get("confirm_email")) {
        error("Email and Confirmation email is not the same");
        return
    }

    if (formData.get('password') && formData.get('confirm_password') && formData.get("password") != formData.get("confirm_password")) {
        error("Password and Confirmation password is not the same")
        return
    }

    $.LoadingOverlay("show");

    let response = await fetch(`api / user`, {
        method: "POST",
        body: formData
    });

    let data = await response.json();
    if (data.success) {
        // form.trigger("reset");
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

async function init()
{
    let response = await fetch(`api / user`);
    let data = await response.json();
    data = data.message;

    for (var key of Object.keys(data)) {
        $(`input[name = ${key}]`).val(data[key]);
    }
}

form.submit(formSubmission);
init();