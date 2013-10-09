<div id="chart_div" style="width: 900px; height: 500px;" class="span12">

</div>
<button id="addTask" style="margin-left:100px;">Add task</button>
<div class="clr"></div>
<div id="addTaskDiv" style="display: none;margin-left:10px;position:absolute;">
    <?php $form = $this->beginWidget("CActiveForm");?>
    <?php echo $form->label($taskModel,"date_begin"); ?>
    <?php echo $form->textField($taskModel,"date_begin",array("class"=>"begin")); ?>
    <?php echo $form->label($taskModel,"date_end"); ?>
    <?php echo $form->textField($taskModel,"date_end",array("class"=>"end")); ?>
    <?php echo $form->label($taskModel,"description"); ?>
    <?php echo $form->textField($taskModel,"description"); ?>
    <?php echo $form->label($taskModel,"person"); ?>
    <?php echo $form->textField($taskModel,"person"); ?>
    <?php echo $form->label($taskModel,"department"); ?>
    <?php echo $form->textField($taskModel,"department"); ?>
    <?php echo $form->label($taskModel,"project"); ?>
    <?php echo $form->textField($taskModel,"project"); ?>
    <?php echo CHtml::ajaxSubmitButton('Add',CHtml::normalizeUrl(array('/dashboard/ajaxAddTask')),
                 array(
                     'dataType'=>'json',
                     'type'=>'get',
                     'success'=>'function(data) {
                         console.log(data);      
                    }',                    
                     
                     )); ?>
<?php $this->endWidget();?>
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
                $("#TaskForm_date_begin").datepicker();
                $("#TaskForm_date_end").datepicker();
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