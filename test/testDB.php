<?php 

include '../php/DataBase.php';
    $db = DB();
	
	 $sql = "SELECT * FROM instabuilder.test;";
    $result = $db->query($sql);
	while ($row = $result->fetch(PDO::FETCH_OBJ)) {
//PDO::FETCH_OBJ 指定取出資料的型態
//        echo '<tr>';
//        echo '<td>' . $row->顧客編號 . "</td><td>" . $row->顧客名稱 . "</td>";
//        echo '</tr>';
        echo '
        <hr/>
        <p>	test_id：' . $row->test_id . '</p>
        <p>     first_name：' . $row->first_name . '</p>
        <p>     E-lasr_name：' . $row->last_name . '</p>';
		
        $out = true;
    }
    if (!$out) {
        echo '<div class ="Err" style="color:red;">
        查不到資料！  請檢查輸入資料是否正確！</div>';
        echo '<script>  swal({
            text: "查不到資料！  請檢查輸入資料是否正確！",
            icon: "error",
            button: false,
            timer: 3000,
        }); </script>';
    }
?>




<script src="../node_modules/chart.js/dist/Chart.js"></script>
<div>
<canvas id="myChart" style="position: relative; height:40vh; width:80vw"></canvas>
</div>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
