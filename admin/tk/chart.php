<script src="https://www.gstatic.com/charts/loader.js"></script>
<div class="flex">
    <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>
    <div id="myChart2" style="width:100%; max-width:600px; height:500px;"></div>
</div>

<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Set Data
        const data = google.visualization.arrayToDataTable([
            ['Category', 'Count'],
            <?php 
            $i = 1;
            $countC = count($list);
            foreach($list as $listTk){
                extract($listTk); 
                if($i == $countC) $phay = ''; else $phay = ',';
                echo "['".$name_c."',".$countP."]".$phay;
                $i++;
            }
            ?>
        ]);

        // Set Options
        const options = {
            title: 'Thống kê sản phẩm',
            is3D: true
        };

        // Draw
        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Set Data
        const data = google.visualization.arrayToDataTable([
            ['Category', 'Count'],
            <?php 
            $i = 1;
            $countC = count($list);
            foreach($list as $listTk){
                extract($listTk); 
                if($i == $countC) $phay = ''; else $phay = ',';
                echo "['".$name_c."',".$total_views."]".$phay;
                $i++;
            }
            ?>
        ]);

        // Set Options
        const options = {
            title: 'Thống kê lượt xem sản phẩm theo danh mục',
            is3D: true
        };

        // Draw
        const chart = new google.visualization.PieChart(document.getElementById('myChart2'));
        chart.draw(data, options);
    }
</script>