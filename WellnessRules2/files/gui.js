/** 
PatientSupporter GUI
Created by Derek Smith
Last modified on July 13, 2010

This file contains the functions used with the forms on the PatientSupporter Rule Responder page, to generate
desired RuleML queries for the External Agent of PatientSupporter's Rule Responder. It is split into 5 sections,
which are detailed at: http://ruleml.org/PatientSupporter/files/PSGUIDocumentation.pdf
*/

//**************************SECTION 1 PRELIMINARY ITEMS**************************

//Global function variables. Used in Section 2. Combined together to make a RuleML query along with messageHeader and messageFooter.
var profileID,activity,ambience,minRSVP,maxRSVP,startDate,startTime,endDate,endTime,duration,location1,fitness;

//Global function variables. Used in Section 2. Combined together to make a english query corresponding to the RuleML query made..
var englishProfileID,englishActivity,englishAmbience,englishMinRSVP,englishMaxRSVP,
englishStartTime,englishEndTime,englishStartDate,englishEndDate,englishLocation,englishHour,englishMinute,englishFitness;

//messageHeader and messageFooter contain all the static information in all the RuleML queries to be created
var messageHeader = 
			"<RuleML xmlns=\n   \"http://www.ruleml.org/0.91/xsd\"" + "\n" +
			" xmlns:xsi=\n   \"http://www.w3.org/2001/XMLSchema-instance\"" + "\n" +
			" xsi:schemaLocation=\n   \"http://www.ruleml.org/0.91/xsd" + "\n   " +
			" http://ibis.in.tum.de/research/" + "\n    " + "ReactionRuleML/0.2/rr.xsd\"" + ">\n\n" +
			" <Message mode=\"outbound\" directive=\"query-sync\">" +
			"\n   " + "<oid>" + "\n      " +
			"<Ind>WellnessRules2</Ind>" + "\n   " +
			"</oid>" + "\n   " +
			"<protocol>" + "\n      " +
			"<Ind>esb</Ind>" + "\n   " +
			"</protocol>" + "\n   " +
			"<sender>" + "\n      " +
			"<Ind>User</Ind>" + "\n   " +
			"</sender>" + "\n   " +
			"<content>" + "\n      " +
			"<Atom>" + "\n         " +
			"<Rel>myActivity</Rel>" + "\n         ";

var messageFooter =
			"</Atom>" + "\n   " +
			"</content>" + "\n " +
			"</Message>" + "\n" +
			"</RuleML>";

/*padZeros() 
Used to generate the appropriate number of zeroes for a bound ProfileID.
number parameter is the number to be padded.
if number = 1 padZeros() would return 0001 (so profileID could be p0001)
if number = 10 padZeros() would return 0010 (so profileID could be p0010)
*/
function padZeros(number) {
	var result;
	if (number < 10) result = '000' + number; 
	else if (number < 100) result = '00' + number;
	else if (number < 1000) result = '0' + number;
	return result;
}
/*checkTime() 
Using a regular expression, insures that the parameter variable time, fits the given
format for time. hour:minute
*/
function checkTime(time){
	var re = /^(([01][0-9])|(2[0-3])):[0-5][0-9]$/;
	if (re.test(time)) return true;
	else return false;
}
/*checkDate() 
Using a regular expression, insures that the parameter variable date, fits the given
format for date. mm/dd/yyyy
*/
function checkDate(date){
	var re = /(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$/;
	if(re.test(date)) return true;
	else return false;
}

/*pressSubmit() 
Due to Interner Explorer not meeting the standard for address length for POST and GET
forms, the RuleML query must have no excess whitespace in order for it to be process correctly.
This function does this if the user's browser is internet explorer.
*/
function pressSubmit(){
if (navigator.appName == "Microsoft Internet Explorer"){
	//alert(""+ navigator.appName);
	//string = string.replace(/(\s){2,}/g,""); //removes double spaces, not used.
	var string = document.form2.box1.value;
	document.form2.box1.value = string.replace(/\s+/g," "); //removes double spaces and new lines, useful for IE only.
	}
}

function selectQuery(){
	if (document.form.query.selectedIndex == 0){
		document.form.profileID.selectedIndex = 0;
		document.form.activity.selectedIndex = 1;
		document.form.ambience.selectedIndex = 0;
		document.form.minRSVP.value = 2;
		document.form.maxRSVP.value = 6;
		document.form.startDate.value = "";
		document.form.startTime.value = "";
		document.form.endDate.value = "";
		document.form.endTime.value = "";
		document.form.durationHours.value = "";
		document.form.durationMinutes.value = "";
		document.form.location1.selectedIndex = 0;
		document.form.fitness.value = "";
	}
	if (document.form.query.selectedIndex == 1){
		document.form.profileID.selectedIndex = 0;
		document.form.activity.selectedIndex = 1;
		document.form.ambience.selectedIndex = 0;
		document.form.minRSVP.value = 2;
		document.form.maxRSVP.value = 6;
		document.form.startDate.value = "";
		document.form.startTime.value = "";
		document.form.endDate.value = "";
		document.form.endTime.value = "";
		document.form.durationHours.value = "";
		document.form.durationMinutes.value = "";
		document.form.location1.selectedIndex = 0;
		document.form.fitness.value = 5;
	}
	if (document.form.query.selectedIndex == 2){
		document.form.profileID.selectedIndex = 1;
		document.form.activity.selectedIndex = 1;
		document.form.ambience.selectedIndex = 0;
		document.form.minRSVP.value = 2;
		document.form.maxRSVP.value = 6;
		document.form.startDate.value = "";
		document.form.startTime.value = "";
		document.form.endDate.value = "";
		document.form.endTime.value = "";
		document.form.durationHours.value = "";
		document.form.durationMinutes.value = "";
		document.form.location1.selectedIndex = 9;
		document.form.fitness.value = 5;
	}
	if (document.form.query.selectedIndex == 3){
		document.form.profileID.selectedIndex = 0;
		document.form.activity.selectedIndex = 0;
		document.form.ambience.selectedIndex = 0;
		document.form.minRSVP.value = 2;
		document.form.maxRSVP.value = 4;
		document.form.startDate.value = "05/24/2010";
		document.form.startTime.value = "";
		document.form.endDate.value = "05/24/2010";
		document.form.endTime.value = "";
		document.form.durationHours.value = 1;
		document.form.durationMinutes.value = 0;
		document.form.location1.selectedIndex = 0;
		document.form.fitness.value = "";
	}
	if (document.form.query.selectedIndex == 4){
		document.form.profileID.selectedIndex = 0;
		document.form.activity.selectedIndex = 0;
		document.form.ambience.selectedIndex = 0;
		document.form.minRSVP.value = 2;
		document.form.maxRSVP.value = 4;
		document.form.startDate.value = "05/24/2010";
		document.form.startTime.value = "";
		document.form.endDate.value = "05/24/2010";
		document.form.endTime.value = "";
		document.form.durationHours.value = 1;
		document.form.durationMinutes.value = 0;
		document.form.location1.selectedIndex = 0;
		document.form.fitness.value = 3;
	}

		
	
	recompile();
}

//**************************SECTION 2 FORM ELEMENTS************************** 

/*elementSelectedProfileID()
If ProfileID is a bound variable, then the index from the HTML form is taken
and padded with zeroes to create RuleML bounded ProfileID. Otherwise is a free
variable.
*/
function elementSelectedProfileID(){
	var choice = document.form.profileID.selectedIndex;
	choice = padZeros(choice);
	if(choice == 0){
		profileID = "<Var>ProfileID</Var>" + "\n         ";
		englishProfileID = "anybody";
	}
	else{
		profileID = "<Ind>p" + choice + "</Ind>" + "\n         ";
		englishProfileID = "p" + choice;
	}
	createRuleML();
}

/*elementSelectedActivity()
Creates a bound variable RuleML statement determined from
what was chosen from its corresponding html form value. As
of right now creates bounded variables only. However, free variable 
implementation would be the same as Gender below
*/
function elementSelectedActivity(){
	var choice = document.form.activity.value;
	activity = "<Var type=\"" + choice + "\">Activity</Var>" + "\n         ";
	englishActivity = choice;
	createRuleML();
}

/*elementSelectedAmbience()
Creates a variable RuleML statement determined from
what was chosen from its corresponding html form value. If
the "Any" option is selected (which should be default) this
would be a free variable, otherwise it is a bound variable.
*/
function elementSelectedAmbience(){
	var choice = document.form.ambience.value;
	if(choice == "Any"){
		ambience = "<Var>InOut</Var>" + "\n         ";
		englishAmbience= "Indoors or Outdoors";
	}
	else {
		ambience = "<Ind>" + choice + "</Ind>" + "\n         ";
		englishAmbience = choice + "doors";
	}
	createRuleML();
}

/*elementSelectedMinRSVP()
If MinRSVP value is a number greater than 0, its corresponding
function variable becomes a bounded variable RuleML statement. Otherwise
nothing happens and an error will be found in elementErrorRSVPCheck().
If MinRSVP is greater than MaxRSVP, an error will also be found.
*/
function elementSelectedMinRSVP(){
	var choice = document.form.minRSVP.value;
	if(choice > 0){
		minRSVP = "<Ind type=\"integer\">" + choice + "</Ind>" + "\n         ";
		englishMinRSVP = choice;
	}
	elementErrorRSVPCheck();
	createRuleML();
}

/*elementSelectedMaxRSVP()
If MaxRSVP value is a number greater than 0, its corresponding
function variable becomes a bounded variable RuleML statement. Otherwise
nothing happens and an error will be found in elementErrorRSVPCheck().
If MaxRSVP is less than than MinRSVP, an error will also be found.
*/
function elementSelectedMaxRSVP(){
	var choice = document.form.maxRSVP.value;
	if(choice > 0){
		maxRSVP = "<Ind type=\"integer\">" + choice + "</Ind>" + "\n         ";
		englishMaxRSVP = choice;
	}
	elementErrorRSVPCheck();
	createRuleML();
}

/*elementSelectedStartDate()
Takes the string from the appropriate HTML field (StartDate),
and turns it into a date object. Provided there are no errors,
this creates the start of a complex RuleML expression containing
information regarding the start date and time.
*/
function elementSelectedStartDate(){
	var choice, day,month,timeDate,year ;
	choice = document.form.startDate.value;
	timeDate=new Date("" + choice);
	if(isNaN(timeDate.getFullYear())) year = "<Var>StartYear</Var>\n            "; else year = "<Ind type=\"integer\">"+ timeDate.getFullYear() + "</Ind>\n            ";
	if(isNaN(timeDate.getMonth())) month = "<Var>StartMonth</Var>\n            "; else month = "<Ind type=\"integer\">"+ (timeDate.getMonth()+1) + "</Ind>\n            ";
	if(isNaN(timeDate.getDate())) day = "<Var>StartDay</Var>\n            "; else day = "<Ind type=\"integer\">"+ timeDate.getDate() + "</Ind>\n            ";
	if (choice == "") englishStartDate = "any day";	
	else englishStartDate = choice;	
	startDate = "<Expr>\n            <Fun>dateTime</Fun>\n            "  + year + month + day;
	elementErrorDateTimeCheck();
	createRuleML();
}

/*elementSelectedStartTime()
Takes the string from the appropriate HTML field (StartTime),
and turns it into a date object. Provided there are no errors,
this creates the end of a complex RuleML expression containing
information regarding the start date and time.
*/
function elementSelectedStartTime(){
	var choice,filler,hour,minute,timeDate;
	choice = document.form.startTime.value;
	if (!(choice == "")) filler = "12/12/2000 ";
	//Date portion of Date object is thrown away, only the hours and minutes are used
	timeDate=new Date(filler + choice);
	if(isNaN(timeDate.getHours())) 
	hour = "<Var>StartHour</Var>\n            "; else hour = "<Ind type=\"integer\">"+ timeDate.getHours() + "</Ind>\n            ";
	if(isNaN(timeDate.getMinutes())) 
	minute = "<Var>StartMinute</Var>\n          "; else minute = "<Ind type=\"integer\">"+ timeDate.getMinutes() + "</Ind>\n          ";
	if (choice == "") englishStartTime = "any time";	
	else englishStartTime = choice;
	startTime = hour + minute  + "</Expr>\n          ";
	elementErrorDateTimeCheck();
	createRuleML();
}
/*
When StartDate and EndDate could be free variables, the following code snippet was used, saved for later use
if(isNaN(timeDate.getFullYear())) year = "<Var>EndYear</Var>\n"; else year = "<Ind type=\"integer\">"+ timeDate.getFullYear() + "</Ind>\n";
if(isNaN(timeDate.getMonth())) month = "<Var>EndMonth</Var>\n"; else month = "<Ind type=\"integer\">"+ timeDate.getMonth() + "</Ind>\n";
if(isNaN(timeDate.getDate())) day = "<Var>EndDay</Var>\n"; else day = "<Var>"+ timeDate.getDate() + "</Var>\n";
if (choice == "") englishEndDate = "any day";	
else englishEndDate = choice;	
*/	

/*elementSelectedEndDate()
Takes the string from the appropriate HTML field (EndDate),
and turns it into a date object. Provided there are no errors,
this creates the start of a complex RuleML expression containing
information regarding the start date and time.
*/
function elementSelectedEndDate(){
	var choice, day,month,timeDate,year ;
	choice = document.form.endDate.value;
	timeDate=new Date("" + choice);
	if(isNaN(timeDate.getFullYear())) year = "<Var>EndYear</Var>\n            "; else year = "<Ind type=\"integer\">"+ timeDate.getFullYear() + "</Ind>\n            ";
	if(isNaN(timeDate.getMonth())) month = "<Var>EndMonth</Var>\n            "; else month = "<Ind type=\"integer\">"+ (timeDate.getMonth()+1) + "</Ind>\n            ";
	if(isNaN(timeDate.getDate())) day = "<Var>EndDay</Var>\n            "; else day = "<Ind type=\"integer\">"+ timeDate.getDate() + "</Ind>\n            ";
	if (choice == "") englishEndDate = "any day";	
	else englishEndDate = choice;	
	endDate = "<Expr>\n            <Fun>dateTime</Fun>\n            "  + year + month + day;
	elementErrorDateTimeCheck();
	createRuleML();
}


/*elementSelectedEndTime()
Takes the string from the appropriate HTML field (EndTime),
and turns it into a date object. Provided there are no errors,
this creates the end of a complex RuleML expression containing
information regarding the end date and time.
*/
function elementSelectedEndTime(){
	var choice, throwAwayDate, hour, minute,timeDate;
	choice = document.form.endTime.value;
	if (!(choice == "")) throwAwayDate = "12/12/2000 ";
	//Date portion of Date object is not used, only the hours and minutes are used. Date object parses time fairly well.
	timeDate=new Date(throwAwayDate + choice);
	if(isNaN(timeDate.getHours())) hour = "<Var>EndHour</Var>\n            "; else hour = "<Ind type=\"integer\">"+ timeDate.getHours() + "</Ind>\n            ";
	if(isNaN(timeDate.getMinutes())) minute = "<Var>EndMinute</Var>\n     "; else minute = "<Ind type=\"integer\">"+ timeDate.getMinutes() + "</Ind>\n     ";
	endTime =  hour + minute + "     " + "</Expr>\n          ";
	if (choice == "") englishEndTime = "any time";	
	else englishEndTime = choice;
	elementErrorDateTimeCheck();
	createRuleML();
}


/*elementSelectedEndTime()
Takes the string from the appropriate HTML field (Duration),
and turns it into the time portion of a date object. Provided 
there are no errors, this creates the end of a complex RuleML 
expression containing information regarding the end date and time.
*/
function elementSelectedDuration(){
	var filler,hour,hours,minute,minutes,throwAwayDate,timeDate;
	hours = document.form.durationHours.value;
	minutes = document.form.durationMinutes.value;
	if(hours != parseInt(hours) || hours == ""){ 
		hour = "<Var>DurationHour</Var>\n            ";
		englishHour = "0";
	} 
	else {
		hour = "<Ind type=\"integer\">"+ hours + "</Ind>\n            ";
		englishHour = "" + hours;
	}
	if(minutes != parseInt(minutes) || minutes == ""){ 
		minute = "<Var>DurationMinute</Var>\n          ";
		englishMinute = "0";
	}
	else {
		minute = "<Ind type=\"integer\">"+ minutes + "</Ind>\n          ";
		englishMinute = "" + minutes;
	}
	filler = "<Ind type=\"integer\">0</Ind>\n            "; //Filler, for the dateTime RuleML complex term.
	duration = "<Expr>\n            <Fun>dateTime</Fun>\n            " + filler + filler + filler + hour + minute + "</Expr>\n          ";
	elementErrorDurationCheck();
	createRuleML();
}

/*elementSelectedLocation()
Creates a variable RuleML statement determined from
what was chosen from its corresponding html form value. If
the "Any" option is selected (which should be default) this
would be a free variable, otherwise it is a bound variable.
*/
function elementSelectedLocation(){
	var choice = document.form.location1.value;
	if(choice == "Any"){
		location1 = "<Var>Location</Var>" + "\n          ";
		englishLocation = "any location";
	}
	else {
		location1 = "<Ind>" + choice + "</Ind>" + "\n          ";
		englishLocation = choice;
	}
	createRuleML();
}

/*elementSelectedLocation()
Creates a variable RuleML statement determined from
what was chosen from its corresponding html form value. If
the "Any" option is selected (which should be default) this
would be a free variable, otherwise it is a bound variable.
*/
function elementSelectedFitness(){
	var choice = parseInt(document.form.fitness.value);
	if(choice > 0){
		fitness = "<Ind type=\"integer\">" + choice + "</Ind>" + "\n          ";
		englishFitness = choice;
	}
	else {
		fitness = "<Var>FitnessLevel</Var>" + "\n      ";
		englishFitness = "any rating";
	}
	elementErrorFitnessCheck();
	createRuleML();
}


//**************************SECTION 4 ERROR CHECKING************************** 

/*elementErrorRSVPCheck()
Insures MinRSVP and MaxRSVP are correct and are consistent with each other. 
If there is an error field which contains errors is highlighted ready.
*/
function elementErrorRSVPCheck(){
	var choice = parseInt(document.form.minRSVP.value);
	var choice2 = parseInt(document.form.maxRSVP.value);
	if(!(choice > 0) || !(choice2 > 0) || choice > choice2){
		if (choice > choice2) {
		document.form.minRSVP.className='redField';
		document.form.maxRSVP.className='redField';
		}
		if (!(choice > 0)) document.form.minRSVP.className='redField';
		if (!(choice2 > 0)) document.form.maxRSVP.className='redField';
	}
	else{
		document.form.minRSVP.className='defaultField';
		document.form.maxRSVP.className='defaultField';
	}
}

/*elementErrorDurationCheck()
Insures Duration(which is split into two fields, hours and minutes) is correct.
If there is an error field which contains errors is highlighted ready.
*/
function elementErrorDurationCheck(){
	choice = document.form.durationHours.value;
	choice2 = document.form.durationMinutes.value;
	if((parseInt(choice) >= 0 || choice == "") || (parseInt(choice2) >= 0 || choice2 == "")) {
		if(parseInt(choice) == choice || choice == "")
		document.form.durationHours.className='defaultField';
		else
		document.form.durationHours.className='redField';
		if(parseInt(choice2) == choice2 || choice2 == "")
		document.form.durationMinutes.className='defaultField';
		else
		document.form.durationMinutes.className='redField';
	}
	else {
		document.form.durationHours.className='redField';
		document.form.durationMinutes.className='redField';
	}
}


/*elementErrorFitnessCheck()
Insures Fitness is a number
*/
function elementErrorFitnessCheck(){
	choice = document.form.fitness.value;
	if(parseInt(choice) >= 1) document.form.fitness.className='defaultField';
	else if (choice == '') document.form.fitness.className='defaultField';
	else document.form.fitness.className='redField';
}

/*elementErrorDateTimeCheck()
Insures all fields for StartDate, StartTime, EndDate, EndTime are correct
values for their appropriate fields and that EndDate + EndTime is greater
than StartDate + StartTime.
*/
function elementErrorDateTimeCheck(){
	choice = document.form.startDate.value;
	choice2 = document.form.endDate.value;	
	choice3 = document.form.startTime.value;
	choice4 =document.form.endTime.value;
	
	var year, month, day;
	var timeDate=new Date(choice + " " + choice3);
	var timeDate2=new Date(choice2 + " " + choice4);
	var datemilliseconds = timeDate.getTime();
	var datemilliseconds2 = timeDate2.getTime();

	if((!checkDate(choice) && choice != '') || (!checkDate(choice2) && choice2 != '') || (!checkTime(choice3) && choice3 != '') || 
	(!checkTime(choice4) && choice4 != '')){
		if(!checkDate(choice) && choice != ''){
			document.form.startDate.className='redField';
		}
		/*
		if(datemilliseconds > datemilliseconds2){
			document.form.startDate.className='redField';		
			document.form.endDate.className='redField';	
			document.form.startTime.className='redField';		
			document.form.endTime.className='redField';		
		}*/
		if(!checkDate(choice2) && choice2 != '') {
			document.form.endDate.className='redField';
		}
		if(!checkTime(choice3) && choice3 != '') {
			document.form.startTime.className='redField';
		}
		if(!checkTime(choice4) && choice4 != '') {
			document.form.endTime.className='redField';
		}
	}
	else{
		document.form.startDate.className='defaultField';		
		document.form.endDate.className='defaultField';	
		document.form.startTime.className='defaultField';		
		document.form.endTime.className='defaultField';		
	}
	createRuleML();
}

//**************************SECTION 4 QUERY AND ENGLISH GENERATION************************** 

/*createEnglish()
Using the global english variables first declared in section 1 and used in section 2,
creates a string containing a PatientSupporter english query to explain the corresponding
PatientSupporter RuleML query. 
*/
function createEnglish(){
	document.form3.box2.value = "Is " + englishProfileID + " interested in " + englishActivity + " (" + englishAmbience + 
	")? It would be for " + englishMinRSVP + " to " + englishMaxRSVP + 
	" people, " + "on " + (englishStartDate == "any day" && englishEndDate == "any day" ? "any day" : (englishStartDate == englishEndDate ? englishStartDate : englishStartDate+ " to " +englishEndDate)) + " between " + 
	(englishStartTime == "any time" && englishEndTime == "any time" ? "any time" : englishStartTime + " to " +englishEndTime) + ", for "  + (englishHour == "0" && englishMinute== "0" ? "any duration" : englishHour + " hour(s) and " + englishMinute + " minute(s)")
 + ", at " + englishLocation + " with " + englishFitness +  " for a fitness level."

}

/*createRuleML()
Using the global function variables first declared in section 1 and used in section 2,
creates a string containing a PatientSupporter RuleML query. 
*/
function createRuleML(){
	/*Contact should never be used by the GUI, hence why it is statically placed here*/
	var string  = messageHeader + profileID + activity + ambience + minRSVP + maxRSVP  + 
	startDate + startTime + endDate + endTime + location1 + duration + fitness +
	messageFooter;
	document.form2.box1.value = string;
	
	createEnglish();
}


//**************************SECTION 5 STARTER**************************

/*startCheck()
When the HTML page is loaded, this function is ran which runs all the
function variable functions for the first time with the html form's
default values.
*/
function startCheck(){
	selectQuery();
	elementSelectedProfileID();
	elementSelectedActivity();
	elementSelectedAmbience();
	elementSelectedMinRSVP();
	elementSelectedMaxRSVP();
	elementSelectedStartDate();
	elementSelectedEndDate();
	elementSelectedDuration();
	elementSelectedStartTime();
	elementSelectedEndTime();
	elementSelectedLocation();
	elementSelectedFitness();
}

function recompile(){
	elementSelectedProfileID();
	elementSelectedActivity();
	elementSelectedAmbience();
	elementSelectedMinRSVP();
	elementSelectedMaxRSVP();
	elementSelectedStartDate();
	elementSelectedEndDate();
	elementSelectedDuration();
	elementSelectedStartTime();
	elementSelectedEndTime();
	elementSelectedLocation();
	elementSelectedFitness();
}