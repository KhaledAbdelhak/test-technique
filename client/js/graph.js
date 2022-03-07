
const apiRootUrl = "http://localhost:8080";
const borderColor = "rgb(54, 162, 235)";
const backgroundColor = "rgba(54, 162, 235, 0.2)"

const fetchOrganisationData = function()  
{
	fetch( apiRootUrl + "/organisations" )
		.then(function(res) 
		{
			res.json()
			.then(function(organisations) {
				
				const graphElements = [];

				organisations.map(organisation => {

					graphElements.push({
						label: organisation.name,
						colors: {
							background: backgroundColor,
							border: borderColor,
						},
						value: organisation.people_inside
					})

				});
			renderCanvas('Organisations', graphElements, "Nombre de personne à l'interieur")
			fetchBuildingData();
			})
		} 
	)
}

const fetchBuildingData = function()  
{
	fetch( apiRootUrl + "/buildings" )
		.then(function(res) 
		{
			res.json()
			.then(function(buildings) {
				
				const graphElements = [];

				buildings.map(building => {

					graphElements.push({
						label: `${building.name} - ${building.organisation_name}` ,
						colors: {
							background: backgroundColor,
							border: borderColor,
						},
						value: building.people_inside
					})

					
				});
			renderCanvas("Buildings", graphElements, "Nombre de personne à l'interieur")
			fetchRoomData();
			})
		} 
	)
}


const fetchRoomData = function()  
{
	fetch( apiRootUrl + "/rooms" )
		.then(function(res) 
		{
			res.json()
			.then(function(rooms) {
				
				const graphElements = [];

				rooms.map(room => {

					graphElements.push({
						label: `${room.name} - ${room.building_name}`,
						colors: {
							background: backgroundColor,
							border: borderColor,
						},
						value: room.people_inside
					})

					
				});
			renderCanvas("Rooms", graphElements, "Nombre de personne à l'interieur")
			})
		} 
	)
}








fetchOrganisationData();
