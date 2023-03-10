let result = $(".result");
let form = $(".form_input");
let name = $("#name");
let email = $("#email");
let message = $("#message");
let order_id_input = $("#order_id");
let product_sku_input = $("#product_sku");
async function formSubmission(e){
	e.preventDefault();
	result.removeClass("error");
	result.removeClass("success");
	let formData = new FormData(form[0]);
	for (const [_, value] of formData) {
		if (value) continue;
		result.addClass("error");
		result.text("Please fill all required fields.");
		result.show();
		return;
	}

	$.LoadingOverlay("show");

	let order_id = formData.get("order_id");
	let product_sku = formData.get("product_sku");

	let response = await fetch(`api/warranty/${order_id}/${product_sku}`, {
        method: "POST",
        body: formData
    });

	let data = await response.json();
	if (data.success) {
        name.val("");
        email.val("");
        message.val("");
		order_id_input.val("");
		product_sku_input.val("");
		result.addClass("success");
	} else {
		result.addClass("error");
	}
	result.text(data.message);
	result.show();
	$.LoadingOverlay("hide");
}

form.submit(formSubmission);
