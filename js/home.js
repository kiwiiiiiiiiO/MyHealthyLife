var ctx = document.getElementById('BMIChart').getContext('2d');
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