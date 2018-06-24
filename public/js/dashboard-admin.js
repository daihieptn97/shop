
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

    // init start first run
    var ctx2 = document.getElementById("barChart").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});

    // thong ke theo nam

    var barDataChartYear = {
        labels: labelYear,
        datasets: [
            {
                label: "sản phẩm",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: dataProductYear
            },
            
            {
                label: "Đơn hàng",
                backgroundColor: 'rgba(13, 186, 248, 0.64)',
                pointBorderColor: "#fff",
                data: dataOrderYear
            }
        ],

    };

    var barOptionsChartYear = {
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

    $('.select-date-chart').click(function(){
        if(!$(this).hasClass('active')){
            activeChart();
        }

        $('.active').removeClass('active');
        $(this).addClass('active');
    });

    function activeChart() {
        var arr = document.getElementsByClassName('barChart-date');
        for (var i = 0; i < arr.length; i++) {
            if(arr[i].className.indexOf('chart-active') < 0 ){
                arr[i].classList.add("chart-active")

                // painting when this active
                var charYearProduct = document.getElementById("barChart-product-year").getContext("2d");
                new Chart(charYearProduct, {type: 'bar', data: barDataChartYear, options:barOptionsChartYear});

                var ctx2 = document.getElementById("barChart").getContext("2d");
                new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});


            }else{
                arr[i].classList.remove("chart-active");
            }
        }
    }

});