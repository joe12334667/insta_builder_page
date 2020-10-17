ajaxChart("post_comment", "comment");
$("#like_search").click(function () {
    var limit = document.getElementById("like_limit").value;
    //                    alert(limit);
    if (limit < 1) {
        limit = 1;
    } else if (limit > 50) {
        limit = 50;
    }
    ajaxChart("post_like", "like", limit);
    ajaxChart("post_comment", "comment", limit);

});

function ajaxChart(ChartName, ChartTableName, limits = 10) {

    $('#' + ChartName).remove(); // this is my <canvas> element
    $('#' + ChartName + '_chart').append('<canvas id="' + ChartName + '"><canvas>');
    $("#" + ChartName).width(10).height(9);

    $.ajax({
        type: "GET",
        cache: false,
        url: "../../../dashboard/Ajaxlike_comment.php",
        data: {
            type: ChartTableName,
            limit: limits,
        },
        dataType: "json",
        success: function (response) {
            //主要Chart.js繪圖區
            const data = response; //取得.php回傳的資料
            const all_x_labels = [], all_y_data = [], Background_color = [];

            //利用陣列建立x,y座標
            for (let i = 0; i < data.length; i++) {
                if (data[i].content == null) {
                    all_x_labels[i] = data[i].announce_time;
                }
                else if (data[i].content.length > 10) {
                    all_x_labels[i] = data[i].content.substr(0, 10) + "..." + "\n" + data[i].announce_time;
                } else {
                    all_x_labels[i] = data[i].content + "\n" + data[i].announce_time;
                }
                all_y_data[i] = data[i].count;

                Background_color[i] = "#6f42c1";
            }

            const ctx = document.getElementById(ChartName);
            visualize = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: all_x_labels, // x軸的刻度
                    datasets: [{
                        label: ChartTableName, // 顯示該資料的標題 
                        data: all_y_data, // y軸資料
                        fill: false, // 不顯示底下的灰色區塊
                        borderColor: "#5a28b5", // 設定線的顏色
                        backgroundColor: Background_color, // 設定點的顏色
                        pointBorderWidth: 6,
                        //                                            pointBorderColor: "#FF82B4",
                        //                                            lineTension: 0.1  // 顯示折線圖，不使用曲線
                    }],

                },
                options: {
                    legend: {
                        onClick: (e) => e.stopPropagation()
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                // beginAtZero: true,
                                //min: 10,
                                //stepSize: 2
                            },

                        }],
                        xAxes: [{
                            ticks: {
                                minRotation: 90,

                                // beginAtZero: true,
                                // min: 10,
                                // maxTicksLimit: 10,

                            },

                        }],

                    }

                }
            });
        }
    });
}

