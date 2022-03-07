
/// Element attendu pour le graphique
const graphElements = [
	{
		label: "name", // nom de la barre 
		colors: {
			background: 'color', // background color de la barre
			border: "color", // border color de la barre		
		},
        value: 0 // valeur de la barre
	}
]

const renderCanvas = function(title, graphElements, valueLabel, type="bar") {
	
	const graphData = {
		type: type,
		options: {},
		data: {
			labels: [],
			datasets: [
				{
					label: valueLabel,
					backgroundColor: [],
					borderColor: [],
					data: [],
                    borderWidth: 1,
              
				}
			]
		}
	}

	graphElements.map(element => {
		graphData.data.labels.push(element.label)
		graphData.data.datasets[0].backgroundColor.push(element.colors.background)
		graphData.data.datasets[0].borderColor.push(element.colors.border)
		graphData.data.datasets[0].data.push(element.value)	
	})



	const graphContainer = document.createElement("div");

	const canvasElement = document.createElement("canvas")
	const graphTitle = document.createElement("h2");
	graphTitle.innerText = title

	graphContainer.appendChild(canvasElement);
	graphContainer.appendChild(graphTitle);
	
	document.getElementById('container').appendChild(graphContainer)

	new Chart(
			canvasElement,
			graphData
	);
	
}