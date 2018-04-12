/*!
 * Respondo calculator javascript file
 * It will populate the Liter Flow Selection, Cylinder Size Selection options based on the O2 Device Selection. Cylinder % Full values are fixed.
 * Once you select all the options then it will display the cylinder duration result
 * info@visionplus.com.pk
 *
 * Date: 2017-09-15 17:34:21  (Friday, 15 September 2017)
 * 
 */


var cylinderSizeOptions = null;// variables for cylinder size drop down
var literFlowOptions = null;// variable for literflow drop downs
var cylinderFullOptions = null;//variable for the cylinder fill dropdowns

/*!
 * Function for the creating select option values
 *
 */

function createOption(text, value) {
	var option = new Option();
	option.text = text;
        option.value = value;
        return option;
}

/*!
 * Function for the clearing select option values
 *
 */

function clearOptions(list) {
	for(var i = 0; i < list.options.length; i ++)
		list.options[i] = null;
}


/*!
 * Function for loading the Cylinder % Full values
 *
 */
function  loadcylinderFull() {
	var cylinderFullList = document.getElementById('cylinderFull');
	var options = getcylinderFullListOptions();
	for(var i = 0; i < options.length; i++) {
           cylinderFullList.options[i] = options[i];
	}
}

/*!
 * Function for creating the Cylinder % Full values
 *
 */
function getcylinderFullListOptions() {
	cylinderFullOptions = new Array();
	cylinderFullOptions[cylinderFullOptions.length] = createOption("Select Cylinder % Full", '');
	cylinderFullOptions[cylinderFullOptions.length] = createOption("Full Cylinder", 1);
	cylinderFullOptions[cylinderFullOptions.length] = createOption("75 % Full - 1500 PSI", 0.75);
	cylinderFullOptions[cylinderFullOptions.length] = createOption("50% Full - 1000 PSI)", 0.5);
	cylinderFullOptions[cylinderFullOptions.length] = createOption("25% Full - 500 PSI)", 0.25);
	return cylinderFullOptions;
}

/*!
 * Function for loading the Liter Flow Selection
 *
 */

function  loadLiterFlow(o2DeviceId) {
	var literFlowSizeList = document.getElementById('literFlowId');
	clearOptions(literFlowSizeList);
	var options = getliterFlowOptions(o2DeviceId);
     	for(var i = 0; i < options.length; i++) {
           literFlowSizeList.options[i] = options[i];
	}
}

/*!
 * Function for creating the liter flow options
 *
 */
function getliterFlowOptions(o2DeviceId) {
	literFlowOptions = new Array();
	if (o2DeviceId == 'Conserver 5:1') {
		literFlowOptions[literFlowOptions.length] = createOption("Select Liter Flow", '');
		literFlowOptions[literFlowOptions.length] = createOption("1 LPM", 1);
		literFlowOptions[literFlowOptions.length] = createOption("2 LPM", 2);
		literFlowOptions[literFlowOptions.length] = createOption("2.5 LPM", 2.5);
		literFlowOptions[literFlowOptions.length] = createOption("3 LPM", 3);
		literFlowOptions[literFlowOptions.length] = createOption("4 LPM", 4);
		literFlowOptions[literFlowOptions.length] = createOption("5 LPM", 5);
	} else if(o2DeviceId == 'Conserver 3:1') {
		literFlowOptions[literFlowOptions.length] = createOption("Select Liter Flow", '');
		literFlowOptions[literFlowOptions.length] = createOption("1 LPM", 1);
		literFlowOptions[literFlowOptions.length] = createOption("2 LPM", 2);
		literFlowOptions[literFlowOptions.length] = createOption("2.5 LPM", 2.5);
		literFlowOptions[literFlowOptions.length] = createOption("3 LPM", 3);
		literFlowOptions[literFlowOptions.length] = createOption("4 LPM", 4);
		literFlowOptions[literFlowOptions.length] = createOption("5 LPM", 5);
		literFlowOptions[literFlowOptions.length] = createOption("6 LPM", 6);
	} else if(o2DeviceId == 'Adult Regulator') {
		literFlowOptions[literFlowOptions.length] = createOption("Select Liter Flow", '');
		literFlowOptions[literFlowOptions.length] = createOption("1 LPM", 1);
		literFlowOptions[literFlowOptions.length] = createOption("1.5 LPM", 1.5);
		literFlowOptions[literFlowOptions.length] = createOption("2 LPM", 2);
		literFlowOptions[literFlowOptions.length] = createOption("2.5 LPM", 2.5);
		literFlowOptions[literFlowOptions.length] = createOption("3 LPM", 3);
		literFlowOptions[literFlowOptions.length] = createOption("4 LPM", 4);
		literFlowOptions[literFlowOptions.length] = createOption("5 LPM", 5);
		literFlowOptions[literFlowOptions.length] = createOption("6 LPM", 6);
		literFlowOptions[literFlowOptions.length] = createOption("7 LPM", 7);
		literFlowOptions[literFlowOptions.length] = createOption("8 LPM", 8);
		literFlowOptions[literFlowOptions.length] = createOption("10 LPM", 10);
		literFlowOptions[literFlowOptions.length] = createOption("12 LPM", 12);
		literFlowOptions[literFlowOptions.length] = createOption("15 LPM", 15);
	} else if(o2DeviceId == 'Pediatric Regulator') {
		literFlowOptions[literFlowOptions.length] = createOption("Select Liter Flow", '');
		literFlowOptions[literFlowOptions.length] = createOption("0.03 LPM", 0.03);
		literFlowOptions[literFlowOptions.length] = createOption("0.06 LPM", 0.06);
		literFlowOptions[literFlowOptions.length] = createOption("0.12 LPM", 0.12);
		literFlowOptions[literFlowOptions.length] = createOption("0.25 LPM", 0.25);
		literFlowOptions[literFlowOptions.length] = createOption("0.375 LPM", 0.375);
		literFlowOptions[literFlowOptions.length] = createOption("0.5 LPM", 0.5);
		literFlowOptions[literFlowOptions.length] = createOption("0.75 LPM", 0.75);
		literFlowOptions[literFlowOptions.length] = createOption("1 LPM", 1);
		literFlowOptions[literFlowOptions.length] = createOption("1.5 LPM", 1.5);
		literFlowOptions[literFlowOptions.length] = createOption("2.0 LPM", 2.0);
		literFlowOptions[literFlowOptions.length] = createOption("2.5 LPM", 2.5);
		literFlowOptions[literFlowOptions.length] = createOption("3 LPM", 3);
		literFlowOptions[literFlowOptions.length] = createOption("4 LPM", 4);
	} else if(o2DeviceId == 'EMS Regulator') {
		literFlowOptions[literFlowOptions.length] = createOption("Select Liter Flow", '');
		literFlowOptions[literFlowOptions.length] = createOption("1 LPM", 1);
		literFlowOptions[literFlowOptions.length] = createOption("2 LPM", 2);
		literFlowOptions[literFlowOptions.length] = createOption("3 LPM", 3);
		literFlowOptions[literFlowOptions.length] = createOption("4 LPM", 4);
		literFlowOptions[literFlowOptions.length] = createOption("6 LPM", 6);
		literFlowOptions[literFlowOptions.length] = createOption("8 LPM", 8);
		literFlowOptions[literFlowOptions.length] = createOption("10 LPM", 10);
		literFlowOptions[literFlowOptions.length] = createOption("15 LPM", 15);
		literFlowOptions[literFlowOptions.length] = createOption("20 LPM", 20);
		literFlowOptions[literFlowOptions.length] = createOption("25 LPM", 25);
	}
	return literFlowOptions;
}


/*!
 * Function For changing the Liter Flow Selection
 *
 */

function fn_literflow(literFlowId) {
	
	if($('#o2Device').val()!='' && $('#literFlowId').val()!='' && $('#cylinderSize').val()!='' && $('#cylinderFull').val()!='') {			
		var CalcObject = new Respondo2Calculator();
		var result = CalcObject.calculateDuration($('#o2Device').val(), $('#literFlowId').val(), $('#cylinderSize').val(), $('#cylinderFull').val());
		setTimeout("displayResult('err_div', '"+result+"')", 400);
		//$('#err_div').html(result);

	} else {
		$('#err_div').html('Please make selections.');
		return false;
	}
}

/*!
 * Function For changing the Cylinder Size Selection
 *
 */

function fn_cylinderSize() {
	
	if($('#o2Device').val()!='' && $('#literFlowId').val()!='' && $('#cylinderSize').val()!='' && $('#cylinderFull').val()!='') {			
		var CalcObject = new Respondo2Calculator();
		var result = CalcObject.calculateDuration($('#o2Device').val(), $('#literFlowId').val(), $('#cylinderSize').val(), $('#cylinderFull').val());
		setTimeout("displayResult('err_div', '"+result+"')", 400);
		//$('#err_div').html(result);

	} else {
		$('#err_div').html('Please make selections.');
		return false;
	}

}	

/*!
 * Function For changing the Cylinder % Full
 *
 */

function fn_cylinderFull(){

	if($('#o2Device').val()!='' && $('#literFlowId').val()!='' && $('#cylinderSize').val()!='' && $('#cylinderFull').val()!='') {			
		var CalcObject = new Respondo2Calculator();
		var result = CalcObject.calculateDuration($('#o2Device').val(), $('#literFlowId').val(), $('#cylinderSize').val(), $('#cylinderFull').val());
		setTimeout("displayResult('err_div', '"+result+"')", 400);
		//$('#err_div').html(result);

	} else {
		$('#err_div').html('Please make selections.');
		return false;
	}
}

/*!
 * Function for creating the Cylinder Size options
 *
 */

function getcylinderSizeOptions(o2DeviceId) {

	cylinderSizeOptions = new Array();
	if (o2DeviceId =='Conserver 3:1' || o2DeviceId =='Conserver 5:1')
	{
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("Select Cylinder Size ", '');
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("M4 / 113L", 113);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("M6 / 164L", 164);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("M7 / 198L", 198);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("M9 / 248L", 248);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("D / 415L", 415);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("E / 682L", 682);
		
	} else {
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("Select Cylinder Size ", '');
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("M4 / 113L", 113);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("M6 / 164L", 164);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("M7 / 198L", 198);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("M9 / 248L", 248);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("D / 415L", 415);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("Jumbo D / 647L", 647);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("E / 682L", 682);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("M60 / 1724L", 1724);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("MM / 3452L", 3452);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("H / 6226L", 6226);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("H250 / 7075L", 7075);
		cylinderSizeOptions[cylinderSizeOptions.length] = createOption("T300 / 8490L", 8490);
	}
                return cylinderSizeOptions;
    }

function  loadCylindersize(o2DeviceId) {
	
	var cylinderSizeList = document.getElementById('cylinderSize');
	clearOptions(cylinderSizeList);
	var options = getcylinderSizeOptions(o2DeviceId);
        for(var i = 0; i < options.length; i++) {
                cylinderSizeList.options[i] = options[i];
	}
}


$(document).ready(function() {
	
	loadcylinderFull();
	
	$('#o2Device').change(function(){
		loadCylindersize($('#o2Device').val());
		loadLiterFlow($('#o2Device').val())
		$('#err_div').html('Please make selections.');
	
		return false;
	});
	
	if($('#o2Device').val() == '') {
		loadLiterFlow('Conserver 5:1')
		loadCylindersize('Conserver 5:1');
		$('#err_div').html('Please make selections.');
		return false;
	} else {
		loadCylindersize($('#o2Device').val());
		loadLiterFlow($('#o2Device').val())
	}

	if($('#o2Device').val()!='' && $('#literFlowId').val()!='' && $('#cylinderSize').val()!='' && $('#cylinderFull').val()!='') {			
		var CalcObject = new Respondo2Calculator();
		var result = CalcObject.calculateDuration($('#o2Device').val(), $('#literFlowId').val(), $('#cylinderSize').val(), $('#cylinderFull').val());
		setTimeout("displayResult('err_div', '"+result+"')", 400);
		//$('#err_div').html(result);

	} else {
		$('#err_div').html('Please make selections.');
		return false;
	}
});

 /*!
  *Function to Displaying the result
  *
  */
function displayResult(id, response) {
	$('#err_div').show();
	$('#'+id).html(unescape(response));
} 

 /*!
  *Function to Calculate the Cylinder Duration
  *
  */
function Respondo2Calculator() {

	this.calculateDuration = function(o2DeviceId, literFlowValue, cylinderSize, cylinderFull){
				
		var literFlowValue = literFlowValue;
		var cylSizeValue = cylinderSize;
		var percFullValue = cylinderFull;
		var o2DeviceId = o2DeviceId;
		
		//Logic starts from here		
		var result = (cylSizeValue / literFlowValue) * percFullValue;

		if(o2DeviceId == 'Conserver 5:1') {
			result = result * 5;
		}
		if(o2DeviceId == 'Conserver 3:1') {
			result = result * 3;
		}
	
		var hours = result / 60;
		var minutes = result % 60;
		hours = Math.floor(hours);
		minutes = Math.round(minutes);
		
		var resultText = hours + ' Hour(s), ' + minutes + ' Minute(s)';
		//alert(resultText);return false;
		return resultText;
	};
	
}

/*!
  *Function to Rest the Cylinder Duration
  *
  */

function reset(){
	$('#o2Device').val('');
	$('#literFlowId').val('');
	$('#cylinderSize').val('');
	$('#cylinderFull').val('');
	$('#err_div').html('Please make selections.');
}

