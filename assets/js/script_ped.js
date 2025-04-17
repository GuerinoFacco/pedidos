const tBody = document.getElementById("table-body");
var tNum = document.getElementById("id");
tNum = tNum + 1;

addNewRow =()=> {
    const row = document.createElement("tr");
    row.className = "single-row";
    tNum++;
    row.innerHTML = `<td><input type="number" value="` + tNum + `" name="id" readonly></td>
                    <td><input style="max-width: 600px; width: 600px" type="text" placeholder="Produto" name="produto[]" class="product" id="product"></td>
                    <td><input type="number" name="qtdped[]" id="unit" step="1" min="1" onkeyup="getInput()" required></td>
                    <td><input type="number" name="preuni[]" id="price" step="0.01" min="0.01" onkeyup="getInput()" required></td>
                    <td><input type="number" placeholder="0" name="amount" class="amount" id="amount" disabled></td>
                    <td style="text-align: right;"><span class="fs-3 icon-trash-2" action="delete"></span></td>`
    
    tBody.insertBefore(row, tBody.lastElementChild.previousSibling);
}

document.getElementById("add-row").addEventListener("click", (e)=> {
    e.preventDefault();
    addNewRow();
});

//GET INPUTS, MULTIPLY AND GET THE ITEM PRICE
getInput =()=> {
    var rows = document.querySelectorAll("tr.single-row");
    rows.forEach((currentRow) => {
        var unit = currentRow.querySelector("#unit").value;
        var price = currentRow.querySelector("#price").value;

        amount = unit * price;
        currentRow.querySelector("#amount").value = amount;
        overallSum();
        
    })
};

//Get the overall sum/Total
overallSum =()=> {
    var arr = document.getElementsByName("amount");
    var total = 0;
    for(var i = 0; i < arr.length; i++) {
        if(arr[i].value) {
            total += +arr[i].value;
        }
        document.getElementById("total").value = total;
    }
}

//Delete row from the table
tBody.addEventListener("click", (e)=>{
    let el = e.target;
    const deleteROW = e.target.getAttribute("action");  
    if(deleteROW == "delete") {
        delRow(el);
        overallSum();
    }
})

//Target row and remove from DOM;
delRow =(el)=> {
    el.parentNode.parentNode.parentNode.removeChild(el.parentNode.parentNode);
}