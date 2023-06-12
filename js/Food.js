var selectedDate = null;
var selectedMonth = 5;
var selectedYear = 2023;
var totalCalories = 0; // Variable to store the total calories
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
    fetch(`../database/GetFood.php?date=${selectedYear + '-' + selectedMonth + '-' + date}`)
    .then(response => response.json())
    .then(data => {
        const foodTableBody = document.getElementById("foodTableBody");
        foodTableBody.innerHTML = ""; // Clear the table body
        totalCalories = 0; 
        // Loop through the data and create table rows
        data.forEach(row => {
            if (row.date === `${selectedYear}-${selectedMonth.toString().padStart(2, '0')}-${date.toString().padStart(2, '0')}`) {
                const tableRow = document.createElement("tr");
                tableRow.innerHTML = `
                    <td>${row.date}</td>
                    <td>${row.food_name}</td>
                    <td>${row.quantity}</td>
                    <td>${row.calories}</td>
                    <td><button onclick="deleteFood(${row.food_id})">Delete</button></td>
                `;
                foodTableBody.appendChild(tableRow);
                totalCalories += parseInt(row.calories); 
            }else{
                const tableRow = document.createElement("tr");
                tableRow.style.display = "none";
                foodTableBody.appendChild(tableRow);
            }
        });
        const totalCaloriesElement = document.getElementById("totalCalory");
        totalCaloriesElement.innerText = `總熱量: ${totalCalories} 大卡`; // Set the inner text of the element to display the total calories
    })
    .catch(error => console.error('Error:', error));
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
    selectedMonth = parseInt(monthInput.value);
    selectedYear = parseInt(yearInput.value);
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


function addFood() {
    var foodName = document.getElementById("foodName").value;
    var quantity = document.getElementById("quantity").value;
    var calories = document.getElementById("calories").value;
    // Create a FormData object
    var formData = new FormData();
    formData.append('foodName', foodName);
    formData.append('quantity', quantity);
    formData.append('calories', calories);
    formData.append('date', selectedYear + '-' + selectedMonth + '-' + selectedDate);

    fetch("../database/AddFood.php", {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(result => {
            // Handle the response from PHP
            console.log(result);
            if (result === 'success') {
                // Call a function to reload the table or update the UI
                // reloadTable();
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
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
