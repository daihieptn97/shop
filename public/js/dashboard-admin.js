
$(function () {

    var barData = {
        labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12",],
        datasets: [
            {
                label: "sản phẩm",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: dataProduct
            },
            
            {
                label: "Đơn hàng",
                backgroundColor: 'rgba(13, 186, 248, 0.64)',
                pointBorderColor: "#fff",
                data: dataOrder
            }
        ],

    };

    var barOptions = {
        responsive: true,
        responsiveAnimationDuration : '600',
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }

    };

    var ctx2 = document.getElementById("barChart").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});

});