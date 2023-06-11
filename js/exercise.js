var selectedDate = null;

// 建立日曆
function createCalendar(year, month) {
    var calendar = document.getElementById("calendar");
    var currentDate = new Date(year, month - 1, 1);
    var currentYear = currentDate.getFullYear();
    var currentMonth = currentDate.getMonth();

    // 獲取當前月份第一天
    var firstDay = new Date(currentYear, currentMonth, 1);
    var startingDay = firstDay.getDay();

    // 獲取當前月份總天數
    var totalDays = new Date(currentYear, currentMonth + 1, 0).getDate();

    // 建日曆表格
    var table = document.createElement("table");

    // th星期一到日
    var thead = document.createElement("thead");
    var daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    var tr = document.createElement("tr");

    for (var i = 0; i < 7; i++) {
        var th = document.createElement("th");
        th.textContent = daysOfWeek[i];
        tr.appendChild(th);
    }

    thead.appendChild(tr);
    table.appendChild(thead);

    // 建立日期格
    var tbody = document.createElement("tbody");
    var day = 1;

    for (var i = 0; i < 6; i++) {
        var tr = document.createElement("tr");

        for (var j = 0; j < 7; j++) {
            if (i === 0 && j < startingDay) {
                var td = document.createElement("td");
                tr.appendChild(td);
            } else if (day <= totalDays) {
                var td = document.createElement("td");
                td.textContent = day;
                td.addEventListener("click", function () {
                    selectDate(this);
                });
                tr.appendChild(td);
                day++;
            } else {
                var td = document.createElement("td");
                tr.appendChild(td);
            }
        }

        tbody.appendChild(tr);
    }

    table.appendChild(tbody);
    calendar.innerHTML = "";
    calendar.appendChild(table);
}

// 選日期
function selectDate(cell) {
    var selectedCells = document.getElementsByClassName("selected");

    // 移除之前選中的日期狀態
    while (selectedCells.length > 0) {
        selectedCells[0].classList.remove("selected");
    }

    // 把狀態新增到現在選擇的日期格
    cell.classList.add("selected");

    // 獲取日期
    var date = cell.textContent;

    selectedDate = date;

    // 隱藏其他日期的食物
    var foodRows = document.getElementsById("foodTable");

    for (var i = 0; i < foodRows.length; i++) {
        var row = foodRows[i];
        var rowDate = row.getAttribute("data-date");

        if (rowDate === selectedDate) {
            row.style.display = "table-row";
        } else {
            row.style.display = "none";
        }
    }
}

// 變更年份及月份
function changeCalendar() {
    var yearInput = document.getElementById("year");
    var monthInput = document.getElementById("month");
    var year = parseInt(yearInput.value);
    var month = parseInt(monthInput.value);

    createCalendar(year, month);
}

// 建立初始表格
createCalendar(2023, 5);

// **********************************************************************************************************

// 開啟modal
function openModal() {
    if (selectedDate === null) {
        alert("Please choose a date first！");
        return;
    }
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
    // 清除表單輸入欄位的值
    foodName.value = '';
    quantity.value = '';
    calories.value = '';
}

// 關閉modal
function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}



// 新增食物到food table
function addFood() {

    var foodName = document.getElementById("foodName").value;
    var quantity = document.getElementById("quantity").value;
    var calories = document.getElementById("calories").value;

    var tableBody = document.getElementById("foodTableBody");

    var row = tableBody.insertRow(-1);

    var dateCell = row.insertCell(0);
    var foodNameCell = row.insertCell(1);
    var quantityCell = row.insertCell(2);
    var caloriesCell = row.insertCell(3);
    var deleteCell = row.insertCell(4);

    dateCell.innerHTML = selectedDate;
    foodNameCell.innerHTML = foodName;
    quantityCell.innerHTML = quantity;
    caloriesCell.innerHTML = calories;

    var deleteButton = document.createElement("button");
    deleteButton.innerHTML = "Delete";
    deleteButton.classList.add("delete-button"); // 幫delete-button加上class name，改css用
    deleteButton.onclick = function () {
        var yes = confirm('Are you sure to delete it?');
        if (yes) {
            deleteRow(row);
        }
    };
    deleteCell.appendChild(deleteButton);

    closeModal();
}

// 刪除食物
function deleteRow(row) {
    var table = document.getElementById("foodTable");
    var rowIndex = row.rowIndex;
    table.deleteRow(rowIndex);
}

//總熱量
function totalCalory(caloriesCell) {
    const caloryInput = document.getElementById('caloriesCell');
    const caloryToAdd = Number(caloryInput.value);
    caloriesCell += caloryToAdd;
    totalCalory.textContent = `總熱量：${caloriesCell} 大卡`;
    caloryInput.value = 0;
}