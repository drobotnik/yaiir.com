var appkey = 'ccbbba491f5d76350316f30653c72786';
var appid = 'ab82aeb6e43bf2c191645a044994ba3c';
var baseURL = "https://music-api.musikki.com/v1/";
var authKeys = "]&appkey="+appkey+"&appid="+appid;
document.getElementById("jsSection").innerHTML = "Cool!!!";

document.getElementById("Section02").innerHTML = "Enter artist name below, then click"


var artistSearch = function(artist){
		
	var search = baseURL + "artists?q=[artist-name:"+ artist + authKeys;

	$.getJSON(search, function(data){
		var out = "";
		var results = data.results;
		switch(results.length){
			case 0:
				out = "Sorry, no results found"
				break;
			default:
				out += "Top result:<br>";
				out += results[0].name + '<br><br>';
				out += "Artist's albums:<br>";
				console.log('***'+out)
				albumSearch(results[0].name, out);
				console.log(out+'***')

			};


		document.getElementById("container").innerHTML = out;
		console.log("search finished")
			});
		};

$(document).ready(function(){
    $("#artistSearchBtn").click(function(){
        artistSearch($("#TEXTBOX_ID").val());
    });
});


var jsonLength = function(json){
	var i = 0;
	for(key in json){
		i++;
	};
	return(i);
};


var albumSearch = function(artist, text){
	var search = baseURL + "/releases?q=[release-type:Album],[artist-name:" + artist + authKeys;

	$.getJSON(search, function(data){
		console.log(JSON.stringify(data.results));
		for(result of data.results){
			text += result.title + '<br>';
			console.log(result.title);
		
		};
		console.log("albumSearch")
		document.getElementById("container").innerHTML = text

	});

};

//albumSearch("The shins");