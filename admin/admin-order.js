let orderStatus = document.getElementById("show_order-status");
let orderStatusForm = document.getElementById("order-status_form")
let orderIdfive = document.getElementById("5")

orderStatusForm.addEventListener("input", function (event) {

    location.href = "../admin/admin-order.php?id=" + orderStatus.value

})

