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
        result.addClass("error");
        result.text("Please fill all required fields.");
        result.show();
        return;
    }

    $.LoadingOverlay("show");

    let response = await fetch(`api / login`, {
        method: "POST",
        body: formData
    });

    let data = await response.json();
    if (data.success) {
        window.location.replace("./dashboard");
    } else {
        result.addClass("error");
    }
    result.text(data.message);
    result.show();
    $.LoadingOverlay("hide");
}

form.submit(formSubmission);