filterOrders()
//Filtrera på beställningsstatus
function filterOrders() {

    let orderStatus = document.getElementById("show_order-status");
    let orderStatusForm = document.getElementById("order-status_form")

    orderStatusForm.addEventListener("input", function (event) {
        location.href = "../admin/admin-order.php?id=" + orderStatus.value
    })
}
/////////

/*let sortStatus = document.querySelector("#sort-status")
sortStatus.addEventListener("click", function (event) {
    event.preventDefault();
    //alert("click")
    sort(7)
})*/


//////////Sortera på summa
let sortSum = document.querySelector("#sort-sum")
sortSum.addEventListener("click", function (event) {
    event.preventDefault();
    sort(4)
});

function sort(num) {
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
            x = rows[i].getElementsByTagName("td")[num];
            y = rows[i + 1].getElementsByTagName("td")[num];
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
/////////////

////////////sortera på datum
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
    console.log("högst upp dir = asc")

    while (switching) {
        console.log("Går in i while loop")
        switching = false;
        rows = table.rows
        for (i = 1; i < rows.length - 1; i++) {
            console.log("går in i foor loop")
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[5];
            y = rows[i + 1].getElementsByTagName("td")[5];
            z = new Date(x.innerHTML)
            o = new Date(y.innerHTML)
            //console.log("x " + z.getTime())
            //console.log("y " + o.getTime())
            if (dir === "asc") {
                console.log(" går in i if -loop = directon is ascending")
                if (z.getTime() > o.getTime()) {
                    // console.log("mindre")
                    shouldSwitch = true;
                    // console.log(dir)
                    break;
                }

            } else if (dir === "desc") {
                console.log("går in i if -loop = direction is descending")
                if (z.getTime() < o.getTime()) {
                    //console.log("större")
                    shouldSwitch = true;
                    //console.log(dir)
                    break;
                }
            }
        }
        if (shouldSwitch) {
            console.log("går in och byter plats")
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i])
            switching = true;
            switchcountDate++

        } else {
            if (switchcountDate === 0 && dir === "asc") {
                console.log("går in i if-sats, byter dir = descending")
                dir = "desc";
                switching = true;
            }
        }
    }
}
/////////////////