<?php

function __autoload($name){ include("classes/".$name.".php");}

$name = $_POST['name'];
$sname = $_POST['sname'];
$db =  Database::init()->getStudent($name, $sname);
$person = new Person($db);
?>
<html>
<head>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<script >
    window.onload = function() {
 
 
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     title: {
         text: "Количество верно решенных карточек по уровням:",
         fontStyle: "normal",
         fontSize: 18,
     },
     subtitles: [{
         text: "<?php echo "{$person}"; ?>"
        
     }],
     data: [{
         type: "pie",
         yValueFormatString: ": #,##0",
         indexLabel: "{label} ({y})",
         dataPoints: <?php echo json_encode($person->arr(), JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
 
 }
</script>
<script>

</script>

</head>
<body>
<div class="w-container">
            <div class="w-row">
                <div class="w-col w-col-3">
                    <div class="w-form">
                        <form name="name-form"  method="post" class="w-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <label for="name">Имя</label>
                            <input type="text" class="sname w-input" maxlength="256" name="name"  placeholder="Имя" id="name"/>
                            <label for="sname" class="field-label">Фамилия</label>
                            <input type="text" class="sname w-input" autofocus="true" maxlength="256" name="sname" data-name="sname" placeholder="Фамилия" id="sname" required=""/>
                            <input type="submit" value="Поиск" data-wait="Идет поиск..." class="submit-button w-button"/>
                        </form>
                     
                    </div>
                </div>
                <div class="w-col w-col-9"><div class="w-col w-col-8"><div id="chartContainer" style="height: 370px; width: 100%;"></div></div>
            </div>
        </div>

        



<br>

<script src="assets/script/canvasjs.min.js"></script>

</body>
</html>
</body>
</html>

</body>
</HTML>