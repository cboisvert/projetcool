<div id="chart_div" style="width: 900px; height: 500px;" class="span12">

</div>
<button id="addTask" style="margin-left:100px;">Add task</button>
<div class="clr"></div>
<div id="addTaskDiv" style="display: none;margin-left:10px;position:absolute;">
    <label>Time Begin:</label>
    <input type="text" id="begin"/>
    <label>Time end:</label>
    <input type="text" id="end"/>
    <label>Description:</label>
    <input type="text"/>
    <label>Personne:</label>
    <input type="text"/>
    <label>Compétence:</label>
    <input type="text"/>
    <label>Projet:</label>
    <input type="text"/>
    <input type="submit" value="Add"/>
</div>
<div id="stats" class="row-fluid">
    <div class="statsContenu span4">
        <h4>Personne</h4>
    </div>
    <div class="statsContenu span4">
        <h4>Compétence</h4>
    </div>
    <div class="statsContenu span4">
        <h4>Projet</h4>
    </div>
    <!--<div class="statsContenu span3">
        <h4>Time</h4>
    </div>
    <div class="statsContenu span3">
        <h4>Description</h4>
    </div>
    <div class="statsContenu span3">
        <h4>Piece Jointe</h4>
    </div>-->
    
</div>

<script type="text/javascript">
       

    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    var chart;
    var options;
    var data;
    function drawChart() {
        data = google.visualization.arrayToDataTable([
            ['Age', 'Weight','Weight2','Weight3'],
            [ 4,      12,15,14],
            [ 8,      5.5,16,14],
            [ 12,     14,16,19],
            [ 16,      5,16,14],
            [ 20,      3.5,17,14],
            [ 24,    7,18,14]
        ]);

        options = {
            title: 'Company Performance',
            lineWidth: 1,
            Axis:{gridlineColor:{color: '#333'}},
            hAxis:{gridlines:{count:15},format:'##'},
            height:300,
            width:965,
            legend:{position:"top"}

        };

        chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        google.visualization.events.addListener(chart, 'click', selectHandler);
    }

    function redraw(multiple){
        data = google.visualization.arrayToDataTable([
            ['Age', 'Weight','Weight2','Weight3'],
            [ 4,      12/multiple,15,14],
            [ 8,      5.5/multiple,16,14],
            [ 12,     14/multiple,16,19],
            [ 16,      5/multiple,16,14],
            [ 20,      3.5/multiple,17,14],
            [ 24,    7/multiple,18,14]
        ]);
        chart.draw(data, options);
    }

    $("#what").change(function(){
        console.log("WHATTT");
        var multiple = $(this).val();
        console.log(multiple);
        redraw(multiple);

    });
    
    
    
    function selectHandler() {
      alert('A table row was selected');
    }
    
    $(document).ready(function(){
        $("#addTask").click(function(){
            $("#stats").animate({marginTop:""+$("#addTaskDiv").height()+"px"},1000);
            $("#addTaskDiv").fadeIn(1000,function(){
                $("#addTaskDiv").css("position","relative");
                $("#stats").css("margin-top","0px");
                $("#begin").datepicker();
                $("#end").datepicker();
                /*$("#begin").datetimepicker({
                    dateFormat : 'dd-mm-yy',
                    minDate: (function() {
                        var now = new Date();
                        now.setHours(0, 0, 0, 0);
                        return now;
                    })()
                });
                $("#end").datetimepicker({
                    dateFormat : 'dd-mm-yy',
                    minDate: (function() {
                        var now = new Date();
                        now.setHours(0, 0, 0, 0);
                        return now;
                    })()
                });*/
            });
            
            
        });
        
        
    });

</script>