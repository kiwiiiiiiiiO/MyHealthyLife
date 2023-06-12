var ctx = document.getElementById('BMIChart').getContext('2d');
var currentDate = new Date();
var selectedYear = currentDate.getFullYear();
var selectedMonth = ('0' + (currentDate.getMonth() + 1)).slice(-2);
var date = ('0' + currentDate.getDate()).slice(-2);
var today = selectedYear + '-' + selectedMonth + '-' + date;
let totalFoodCalories = 0; // Variable to store total food calories
let totalExerciseCalories = 0; // Variable to store total exercise calories
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['星期一', '星期二', '星期三', '星期四', '星期五', '星期六', '星期日'],
        datasets: [{
            label: '一周體重報表',
            data: [75, 75.5, 75, 74, 74.5, 75, 75],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            width: '100px',
            borderWidth: 1
        }]
    },
    options: {
            responsive: true,
            scales: {
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: '體重(kg)',
                        color: '#191',
                        font: {
                            family: 'Times',
                            size: 20,
                            style: 'normal',
                            lineHeight: 1.2
                        },
                        padding: { top: 30, left: 0, right: 0, bottom: 0 }
                    }
                }
            }
        },
});
fetch(`../database/GetFood.php?date=${today}`)
			.then(response => response.json())
			.then(data => {
				const foodTableBody = document.getElementById("foodTableBody");
				foodTableBody.innerHTML = ""; // Clear the table body
			
				// Loop through the data and create table rows
				data.forEach(row => {
					if (row.date === `${selectedYear}-${selectedMonth.toString().padStart(2, '0')}-${date.toString().padStart(2, '0')}`) {
						const tableRow = document.createElement("tr");
						tableRow.innerHTML = `
							<td>${row.food_name}</td>
							<td>${row.quantity}</td>
							<td>${row.calories}</td>
						`;
						foodTableBody.appendChild(tableRow);
						totalFoodCalories += parseInt(row.calories); // Add food calories to the total
					} else {
						const tableRow = document.createElement("tr");
						tableRow.style.display = "none";
						foodTableBody.appendChild(tableRow);
					}
				});
				document.getElementById("remainingCalories").textContent = `1800 | ${ - totalFoodCalories}`;
			})
			.catch(error => console.error('Error:', error));
		fetch(`../database/GetExercise.php?date=${today}`)
			.then(response => response.json())
			.then(data => {
				const ExerciseTableBody = document.getElementById("ExerciseTableBody");
				ExerciseTableBody.innerHTML = ""; // Clear the table body
			
				// Loop through the data and create table rows
				data.forEach(row => {
					if (row.date === `${selectedYear}-${selectedMonth.toString().padStart(2, '0')}-${date.toString().padStart(2, '0')}`) {
						const tableRow = document.createElement("tr");
						tableRow.innerHTML = `
							<td>${row.exercise_name}</td>
							<td>${row.time}</td>
							<td>${row.calories}</td>
						`;
						ExerciseTableBody.appendChild(tableRow);
						totalExerciseCalories += parseInt(row.calories); // Add exercise calories to the total
					} else {
						const tableRow = document.createElement("tr");
						tableRow.style.display = "none";
						ExerciseTableBody.appendChild(tableRow);
					}
				});
				const remainingCalories = document.getElementById("remainingCalories");
				remainingCalories.textContent = `${remainingCalories.textContent}+${totalExerciseCalories}=${- totalFoodCalories + totalExerciseCalories}`;
			})
			.catch(error => console.error('Error:', error));