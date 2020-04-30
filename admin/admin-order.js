filterOrders()
//Filtrera på beställningsstatus
function filterOrders() {

    let orderStatus = document.getElementById("show_order-status");
    let orderStatusForm = document.getElementById("order-status_form")
    let orderIdfive = document.getElementById("5")

    orderStatusForm.addEventListener("input", function (event) {
        location.href = "../admin/admin-order.php?id=" + orderStatus.value
    })
}
/////////


//Sortera på summa
let sortSum = document.querySelector("#sort-sum")
sortSum.addEventListener("click", function (event) {
    event.preventDefault();
    // alert('click')
    sort()
});


function sort() {
    let table = document.getElementById("table-orders")
    let rows, x, y, i, switching, shouldSwitch, dir;
    let switchcount = 0;
    switching = true;
    dir = "asc";

    while (switching) {
        switching = false;
        rows = table.rows
        for (i = 1; i < rows.length - 1; i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[3];
            y = rows[i + 1].getElementsByTagName("td")[3];
           
            if (dir == "asc") {
                
                if (Number(x.innerHTML) > Number(y.innerHTML)) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (Number(x.innerHTML) < Number(y.innerHTML)) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }

}



//////

