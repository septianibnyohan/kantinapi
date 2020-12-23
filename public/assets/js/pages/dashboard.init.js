!(function (e) {
    

    var periode_0 = $("#periode_0").val();
    var periode_1 = $("#periode_1").val();
    var periode_2 = $("#periode_2").val();
    var periode_3 = $("#periode_3").val(); 

    var data_0 = $("#data_0").val();
    var data_1 = $("#data_1").val();
    var data_2 = $("#data_2").val();
    var data_3 = $("#data_3").val();


    var data_profit_0 = $("#data_profit_0").val();
    var data_profit_1 = $("#data_profit_1").val();
    var data_profit_2 = $("#data_profit_2").val();
    var data_profit_3 = $("#data_profit_3").val();

    
    function a() {}
    (a.prototype.createAreaChart = function (e, a, r, t, i, o, b, c) {
        Morris.Area({ element: e, pointSize: 0, lineWidth: 1, data: t, xkey: i, ykeys: o, labels: b, resize: !0, gridLineColor: "rgba(108, 120, 151, 0.1)", hideHover: "auto", lineColors: c, fillOpacity: 0.9, behaveLikeLine: !0 });
    }),
        (a.prototype.createDonutChart = function (e, a, r) {
            Morris.Donut({ element: e, data: a, resize: !0, colors: r });
        }),
        (a.prototype.createStackedChart = function (e, a, r, t, i, o) {
            Morris.Bar({ element: e, data: a, xkey: r, ykeys: t, stacked: !0, labels: i, hideHover: "auto", resize: !0, gridLineColor: "rgba(108, 120, 151, 0.1)", barColors: o });
        }),
        e("#sparkline").sparkline([8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], { type: "bar", height: "130", barWidth: "10", barSpacing: "7", barColor: "#ec536c" }),
        
       
        (a.prototype.init = function () {
            
            this.createAreaChart(
                "morris-transaksi",
                0,
                0,
                [   
                    { y: periode_0, a: data_0, },
                    { y: periode_1, a: data_1, },
                    { y: periode_2, a: data_2, },
                    { y: periode_3, a: data_3,  }
                ],
                "y",
                ["a", "b", "c"],
                ["Series A", "Series B", "Series C"],
                ["#ccc", "#fab249", "#ec536c"]
            );
            this.createAreaChart(
                "morris-revenue",
                0,
                0,
                [
                    { y: periode_0, b: data_profit_0, },
                    { y: periode_1, b: data_profit_1, },
                    { y: periode_2, b: data_profit_2, },
                    { y: periode_3, b: data_profit_3,  }
                ],
                "y",
                ["a", "b", "c"],
                ["Series A", "Series B", "Series C"],
                ["#ccc", "#fab249", "#ec536c"]
            );
            this.createDonutChart(
                "morris-donut-example",
                [
                    { label: "Download Sales", value: 12 },
                    { label: "In-Store Sales", value: 30 },
                    { label: "Mail-Order Sales", value: 20 },
                ],
                ["#f0f1f4", "#ec536c", "#fab249"]
            );
            this.createStackedChart(
                "morris-bar-stacked",
                [
                    { y: "2005", a: 45, b: 180 },
                    { y: "2006", a: 75, b: 65 },
                    { y: "2007", a: 100, b: 90 },
                    { y: "2008", a: 75, b: 65 },
                    { y: "2009", a: 100, b: 90 },
                    { y: "2010", a: 75, b: 65 },
                    { y: "2011", a: 50, b: 40 },
                    { y: "2012", a: 75, b: 65 },
                    { y: "2013", a: 50, b: 40 },
                    { y: "2014", a: 75, b: 65 },
                    { y: "2015", a: 100, b: 90 },
                    { y: "2016", a: 80, b: 65 },
                ],
                "y",
                ["a", "b"],
                ["Series A", "Series B"],
                ["#fab249", "#f0f1f4"]
            );
        }),
        (e.Dashboard = new a()),
        (e.Dashboard.Constructor = a);
})(window.jQuery),
    (function () {
        "use strict";
        window.jQuery.Dashboard.init();
    })();
