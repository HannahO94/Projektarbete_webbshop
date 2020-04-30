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
            x = rows[i].getElementsByTagName("td")[4];
            y = rows[i + 1].getElementsByTagName("td")[4];
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

//sortera på datum
let sortbyDate = document.querySelector("#sort-date")
sortbyDate.addEventListener("click", function (event) {
    //alert("click")
    event.preventDefault();

    sortByDate()
});

function sortByDate() {
    let table = document.getElementById("table-orders")
    let rows, x, y, z, o, i, switching, shouldSwitch, dir;
    let switchcountDate = 0;
    switching = true;
    dir = "asc";

    while (switching) {
        switching = false;
        rows = table.rows
        for (i = 1; i < rows.length - 1; i++) {
           // console.log(rows.length-1)
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[5];
            y = rows[i + 1].getElementsByTagName("td")[5];
            z = new Date(x.innerHTML)
            o = new Date(y.innerHTML)
            //console.log("x " + z.getTime())
            //console.log("y " + o.getTime())
            if (dir == "asc") {
                console.log("körs denna")
                if (z.getTime() > o.getTime()) {
                   // console.log("mindre")
                    shouldSwitch = true;
                   // console.log(dir)
                    //break;
                }
            
            } else if (dir == "desc") {
                console.log("denna körs")
                if (z.getTime() < o.getTime()) {
                    //console.log("större")
                    shouldSwitch = true;
                    //console.log(dir)
                    //break;
                }
            }

            if (shouldSwitch) {
                //console.log("byt")
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i])
                switching = true;
                switchcountDate++
                console.log(dir)
            } else {
                if (switchcountDate == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
}