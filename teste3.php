//////////// SCRIPT GRAFICOS DOS GRUPOS
<?php $i=1;//for ($i=1; $i<=$numGroup; $i++){?>
var chart = new CanvasJS.Chart("chartContainerG<?php echo $i; ?>",{
	animationEnabled: true,
	title:{
		text: "<?php $nameGroup[$i] ?>"
	},
	axisY:{
		title:"Respostas"
	},
	toolTip: {
		shared: true,
		reversed: true
	},
	data: [{
		type: "stackedColumn",
		name: "Maior",
		showInLegend: "true",
		yValueFormatString: "",
		dataPoints: [
			<?php for ($j=1; $j<=4; $j++){
				switch ($j) {
					case 1:
							echo '{ y: '.$numAnswerMaior[$i]["C"].', label: Confirma},';
							break;
					case 2:
							echo '{ y: '.$numAnswerMaior[$i]["NC"].', label: Não Confirma},';
							break;
					case 3:
							echo '{ y: '.$numAnswerMaior[$i]["P"].', label: Parcial},';
							break;
					case 4:
							echo '{ y: '.$numAnswerMaior[$i]["NA"].', label: Não Aplica},';
							break;
				}
			}?>
		]
	},
	{
		type: "stackedColumn",
		name: "Menor",
		showInLegend: "true",
		yValueFormatString: "",
		dataPoints: [
			<?php for ($j=1; $j<=4; $j++){
				switch ($j) {
					case 1:
							echo '{ y: '.$numAnswerMenor[$i]["C"].', label: Confirma},';
							break;
					case 2:
							echo '{ y: '.$numAnswerMenor[$i]["NC"].', label: Não Confirma},';
							break;
					case 3:
							echo '{ y: '.$numAnswerMenor[$i]["P"].', label: Parcial},';
							break;
					case 4:
							echo '{ y: '.$numAnswerMenor[$i]["NA"].', label: Não Aplica},';
							break;
				}
			} ?>
		]
	}]
});

chart.render();
