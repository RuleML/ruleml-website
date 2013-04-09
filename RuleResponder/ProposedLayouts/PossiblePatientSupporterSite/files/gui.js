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
var profileID,injury,gender,minAge, maxAge, category,healingStage,treatment,minRSVP,maxRSVP,startDate,startTime,endDate,endTime,duration,timeZone,channel;

//Global function variables. Used in Section 2. Combined together to make a english query corresponding to the RuleML query made..
var englishProfileID,englishGender,englishMinAge, englishMaxAge, englishInjury,englishCategory,englishHealingStage,englishTreatment,englishMinRSVP,
englishMaxRSVP,englishStartTime,englishEndTime,englishTimeZone,englishStartDate,englishEndDate,englishChannel;


//messageHeader and messageFooter contain all the static information in all the RuleML queries to be created
var messageHeader = 
			"<RuleML xmlns=\n   \"http://www.ruleml.org/0.91/xsd\"" + "\n" +
			" xmlns:xsi=\n   \"http://www.w3.org/2001/XMLSchema-instance\"" + "\n" +
			" xsi:schemaLocation=\n   \"http://www.ruleml.org/0.91/xsd" + "\n   " +
			" http://ibis.in.tum.de/research/" + "\n    " + "ReactionRuleML/0.2/rr.xsd\"" + ">\n\n" +
			" <Message mode=\"outbound\" directive=\"query-sync\">" +
			"\n   " + "<oid>" + "\n      " +
			"<Ind>PatientSupporter</Ind>" + "\n   " +
			"</oid>" + "\n   " +
			"<protocol>" + "\n      " +
			"<Ind>esb</Ind>" + "\n   " +
			"</protocol>" + "\n   " +
			"<sender>" + "\n      " +
			"<Ind>User</Ind>" + "\n   " +
			"</sender>" + "\n   " +
			"<content>" + "\n      " +
			"<Atom>" + "\n         " +
			"<Rel>myDiscussion</Rel>" + "\n         ";

var messageFooter =
			"</Atom>" + "\n   " +
			"</content>" + "\n " +
			"</Message>" + "\n" +
			"</RuleML>";

var reset = 0;
			
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
	var re = /^(([1][0-9])|(2[0-3])|([0-9])):[0-5][0-9]$/;
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
This function runs everything required when the submit button is pressed.

Due to Interner Explorer not meeting the standard for address length for POST and GET
forms, the RuleML query must have no excess whitespace in order for it to be process correctly.
This function does this if the user's browser is internet explorer.

Additionally, because some queries takes longer than other, a simple interval call to processing()
is done every second to let the user know the page is still working on producing a result. 
*/
function pressSubmit(){
if (navigator.appName == "Microsoft Internet Explorer"){
	//alert(""+ navigator.appName);
	//string = string.replace(/(\s){2,}/g,""); //removes double spaces, not used.
	var string = document.form2.box1.value;
	document.form2.box1.value = string.replace(/\s+/g," "); //removes double spaces and new lines, useful for IE only.
	}
	document.form2.subButton.value = "Processing";
	setInterval("processing()",1000);
}

/*processing() 
This simple function transforms the submit button into a small indicator that
the website is still working on the query request. Call in intervals from pressSubmit().
*/
function processing(){
	if(reset == 5){
		reset = 0;
		document.form2.subButton.value = "Processing";
	}
	else{
		document.form2.subButton.value = document.form2.subButton.value.concat(".");
		reset++;
	}
}


/*selectQuery() 
Sets the menu system to the corresponding example query and then regenerates the RuleML query.
*/
function selectQuery(){
	if (document.form.query.selectedIndex == 1){
		document.form.profileID.selectedIndex = 0;
		document.form.gender.selectedIndex = 0;
		document.form.minAge.value = 20;
		document.form.maxAge.value = 50;
		document.form.injury.selectedIndex = 23;
		document.form.category.selectedIndex = 0;
		document.form.healingStage.selectedIndex = 0;
		document.form.treatment.selectedIndex = 0;
		document.form.minRSVP.value = 2;
		document.form.maxRSVP.value = 10;
		document.form.startDate.value = "05/21/2010";
		document.form.startTime.value = "10:00";
		document.form.endDate.value = "05/21/2010";
		document.form.endTime.value = "11:40";
		document.form.durationHours.value = 0;
		document.form.durationMinutes.value = 30;
		document.form.timeZone.selectedIndex = 0;
		document.form.channel.selectedIndex = 0;
	}
	else if (document.form.query.selectedIndex == 2){
		document.form.profileID.selectedIndex = 0;
		document.form.gender.selectedIndex = 0;
		document.form.minAge.value = 20;
		document.form.maxAge.value = 50;
		document.form.injury.selectedIndex = 27;
		document.form.category.selectedIndex = 0;
		document.form.healingStage.selectedIndex = 0;
		document.form.treatment.selectedIndex = 0;
		document.form.minRSVP.value = 2;
		document.form.maxRSVP.value = 10;
		document.form.startDate.value = "05/21/2010";
		document.form.startTime.value = "10:00";
		document.form.endDate.value = "05/21/2010";
		document.form.endTime.value = "11:40";
		document.form.durationHours.value = 0;
		document.form.durationMinutes.value = 30;
		document.form.timeZone.selectedIndex = 0;
		document.form.channel.selectedIndex = 0;
	}
	else if (document.form.query.selectedIndex == 3){
		document.form.profileID.selectedIndex = 0;
		document.form.gender.selectedIndex = 0;
		document.form.minAge.value = 20;
		document.form.maxAge.value = 50;
		document.form.injury.selectedIndex = 29;
		document.form.category.selectedIndex = 0;
		document.form.healingStage.selectedIndex = 0;
		document.form.treatment.selectedIndex = 0;
		document.form.minRSVP.value = 2;
		document.form.maxRSVP.value = 10;
		document.form.startDate.value = "05/21/2010";
		document.form.startTime.value = "10:00";
		document.form.endDate.value = "05/21/2010";
		document.form.endTime.value = "11:40";
		document.form.durationHours.value = 0;
		document.form.durationMinutes.value = 30;
		document.form.timeZone.selectedIndex = 0;
		document.form.channel.selectedIndex = 0;
	}
	else if (document.form.query.selectedIndex == 0){
		document.form.profileID.selectedIndex = 0;
		document.form.gender.selectedIndex = 0;
		document.form.minAge.value = 20;
		document.form.maxAge.value = 50;
		document.form.injury.selectedIndex = 23;
		document.form.category.selectedIndex = 0;
		document.form.healingStage.selectedIndex = 0;
		document.form.treatment.selectedIndex = 0;
		document.form.minRSVP.value = 2;
		document.form.maxRSVP.value = 10;
		document.form.startDate.value = "";
		document.form.startTime.value = "";
		document.form.endDate.value = "";
		document.form.endTime.value = "";
		document.form.durationHours.value = 0;
		document.form.durationMinutes.value = 30;
		document.form.timeZone.selectedIndex = 0;
		document.form.channel.selectedIndex = 0;
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

/*elementSelectedMinAge()
If MinAge value is a number greater than 0, its corresponding
function variable becomes a bounded variable RuleML statement. Otherwise
nothing happens and an error will be found in elementErrorAgeCheck().
If MinAge is greater than MaxAge, an error will also be found.
*/
function elementSelectedMinAge(){
	var choice = document.form.minAge.value;
	if(choice != ''){
		minAge = "<Ind type=\"integer\">" + choice + "</Ind>" + "\n         ";
		englishMinAge = choice;
	}
	/*else{ //Used if Age could be free variables
		minAge = "<Var>MinAge</Var>" + "\n         ";
		englishMinAge = "any minimum";
	}*/
	elementErrorAgeCheck();
	createRuleML();
}

/*elementSelectedMaxAge()
If MaxAge value is a number greater than 0, its corresponding
function variable becomes a bounded variable RuleML statement. Otherwise
nothing happens and an error will be found in elementErrorAgeCheck().
If MaxAge is less than than MinAge, an error will also be found.
*/
function elementSelectedMaxAge(){
	var choice = document.form.maxAge.value;
	if(choice != ''){
		maxAge = "<Ind type=\"integer\">" + choice + "</Ind>" + "\n         ";
		englishMaxAge = choice;
		
	}
	elementErrorAgeCheck();
	createRuleML();
}

/*elementSelectedInjury()
Creates a bound variable RuleML statement determined from
what was chosen from its corresponding html form value. As
of right now creates bounded variables only. However, free variable 
implementation would be the same as Gender below
*/
function elementSelectedInjury(){
	var choice = document.form.injury.value;
	injury = "<Var type=\"" + choice + "\">Injury</Var>" + "\n         ";
	englishInjury = choice;
	createRuleML();
}

/*elementSelectedCategory()
Creates a variable RuleML statement determined from
what was chosen from its corresponding html form value. If
the "Any" option is selected (which should be default) this
would be a free variable, otherwise it is a bound variable.
*/
function elementSelectedCategory(){
	var choice = document.form.category.value;
	if(choice == "Any"){
		category = "<Var>Category</Var>" + "\n         ";
		englishCategory= "Inpatients or Outpatients";
	}
	else {
		category = "<Ind>" + choice + "</Ind>" + "\n         ";
		englishCategory = choice + "patients";
	}
	createRuleML();
}

/*elementSelectedHealingStage()
Creates a variable RuleML statement determined from
what was chosen from its corresponding html form value. If
the "Any" option is selected (which should be default) this
would be a free variable, otherwise it is a bound variable.
*/
function elementSelectedHealingStage(){
	var choice = document.form.healingStage.value;
	if(choice == "Any"){
		healingStage = "<Var>HealingStage</Var>" + "\n         ";
		englishHealingStage = "any healing stage";
	}
	else {
		healingStage = "<Ind>" + choice + "</Ind>" + "\n         ";
		englishHealingStage = choice;
	}
	createRuleML();
}	

/*elementSelectedTreatment()
Creates a variable RuleML statement determined from
what was chosen from its corresponding html form value. If
the "Any" option is selected (which should be default) this
would be a free variable, otherwise it is a bound variable.
*/
function elementSelectedTreatment(){
	var choice = document.form.treatment.value;
	if(choice == "Any"){
		treatment = "<Var>Treatment</Var>" + "\n         ";
		englishTreatment = "any treatment";
	}
	else {
		treatment = "<Ind>" + choice + "</Ind>" + "\n         ";
		englishTreatment = choice;
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
	/*
	else{
		minRSVP = "<Var>MinRSVP</Var>" + "\n         ";
		englishMinRSVP = "any minimum";
	}*/
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

/*elementSelectedDuration()
Takes the string from the appropriate HTML field (Duration),
and turns it into the time portion of a date object. Provided 
there are no errors, this creates the end of a complex RuleML 
expression containing information regarding the end date and time.
*/
function elementSelectedDuration(){
	var filler,hour,hours,minute,minutes,throwAwayDate,timeDate;
	hours = document.form.durationHours.value;
	minutes = document.form.durationMinutes.value;
	if(hours != parseInt(hours) || hours == "") hour = "<Var>DurationHour</Var>\n            "; else hour = "<Ind type=\"integer\">"+ hours + "</Ind>\n            ";
	if(minutes != parseInt(minutes) || minutes == "") minute = "<Var>DurationMinute</Var>\n     "; else minute = "<Ind type=\"integer\">"+ minutes + "</Ind>\n          ";
	filler = "<Ind type=\"integer\">0</Ind>\n            "; //Filler, for the dateTime RuleML complex term.
	duration = "<Expr>\n            <Fun>dateTime</Fun>\n            " + filler + filler + filler + hour + minute + "</Expr>\n          ";
	elementErrorDurationCheck();
	createRuleML();
}

/*elementSelectedChannel()
Creates a variable RuleML statement determined from
what was chosen from its corresponding html form value. If
the "Any" option is selected (which should be default) this
would be a free variable, otherwise it is a bound variable.
*/
function elementSelectedChannel(){
	var choice = document.form.channel.value;
	if(choice == "Any"){
		channel = "<Var>Channel</Var>" + "\n          ";
		englishChannel = "any channel";
	}
	else {
		channel = "<Ind>" + choice + "</Ind>" + "\n          ";
		englishChannel = choice;
	}
	createRuleML();
}
	
/*elementSelectedGender()
Creates a variable RuleML statement determined from
what was chosen from its corresponding html form value. If
the "Any" option is selected (which should be default) this
would be a free variable. Due to a current prova limitation,
this variable is always free.
*/
function elementSelectedGender(){
	var choice = document.form.gender.value;
	if(choice == "Any"){
		gender = "<Var>Gender</Var>" + "\n          ";
		englishGender = "either gender";
	}
	else {
		gender = "<Ind>" + choice + "</Ind>" + "\n           ";
		englishGender = choice;
	}
	createRuleML();
}

/*elementSelectedTimeZone()
Creates a variable RuleML statement determined from
what was chosen from its corresponding html form value. If
the "Any" option is selected (which should be default) this
would be a free variable. Due to a current prova limitation,
this variable is always free.
*/
function elementSelectedTimeZone(){
	var choice = document.form.timeZone.value;
	if(choice == "Any"){
		timeZone = "<Var>TimeZone</Var>" + "\n     ";
		englishTimeZone = "any time zone.";
	}
	else {
		timeZone = "<Ind>" + choice + "</Ind>" + "\n        ";
		englishTimeZone = choice;
	}
	createRuleML();
}

//**************************SECTION 4 ERROR CHECKING************************** 

/*elementErrorAgeCheck()
Insures MinAge and MaxAge are correct and are consistent with each other. 
If there is an error field which contains errors is highlighted ready.
*/
function elementErrorAgeCheck(){
	var choice = parseInt(document.form.minAge.value);
	var choice2 = parseInt(document.form.maxAge.value);
 
	if(choice < choice2 && choice > 0 && choice2 > 0){	
		document.form.minAge.className='defaultField';
		document.form.maxAge.className='defaultField';
	}
	else{
			document.form.minAge.className='redField';
			document.form.maxAge.className='redField';
	}
}

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
	document.form3.box2.value = "Is " + englishProfileID + " interested in joining a group about " + englishInjury + " injuries" + " for " + englishCategory + 
	" that are at " + englishHealingStage + " and are treated with " +  englishTreatment + ". It would be for " + englishMinRSVP + " to " + englishMaxRSVP + 
	" people, " +  englishGender + ", " + (englishMaxAge == "any minimum" && englishMaxAge == "any maximum" ? "in any age group " : "between " + englishMinAge + " and " + 
	englishMaxAge + " years of age ")  + "on " + (englishStartDate == "any day" && englishEndDate == "any day" ? "any day" : (englishStartDate == englishEndDate ? englishStartDate : englishStartDate+ " to " +englishEndDate)) + " between " + 
	(englishStartTime == "any time" && englishEndTime == "any time" ? "any time" : englishStartTime + " to " +englishEndTime) + ", on " + englishChannel + ".";// + " Time zone should be " + englishTimeZone;
}

/*createRuleML()
Using the global function variables first declared in section 1 and used in section 2,
creates a string containing a PatientSupporter RuleML query. 
*/
function createRuleML(){
	/*Contact should never be used by the GUI, hence why it is statically placed here*/
	var string  = messageHeader + profileID + injury + minAge + maxAge + minRSVP + maxRSVP  + category + 
	treatment + healingStage + startDate + startTime + endDate + endTime + duration + channel + 
	"<Var>Contact</Var>\n          " + gender + timeZone + messageFooter;
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
	elementSelectedGender();
	elementSelectedMinAge();
	elementSelectedMaxAge();
	elementSelectedInjury();
	elementSelectedCategory();
	elementSelectedHealingStage();
	elementSelectedTreatment();
	elementSelectedMinRSVP();
	elementSelectedMaxRSVP();
	elementSelectedStartDate();
	elementSelectedEndDate();
	elementSelectedDuration();
	elementSelectedStartTime();
	elementSelectedEndTime();
	elementSelectedChannel();
	elementSelectedTimeZone();
}


/*recomplile()
When the HTML page is loaded, this function is ran which runs all the
function variable functions for the first time with the html form's
default values.
*/
function recompile(){
	elementSelectedProfileID();
	elementSelectedGender();
	elementSelectedMinAge();
	elementSelectedMaxAge();
	elementSelectedInjury();
	elementSelectedCategory();
	elementSelectedHealingStage();
	elementSelectedTreatment();
	elementSelectedMinRSVP();
	elementSelectedMaxRSVP();
	elementSelectedStartDate();
	elementSelectedEndDate();
	elementSelectedDuration();
	elementSelectedStartTime();
	elementSelectedEndTime();
	elementSelectedChannel();
	elementSelectedTimeZone();
}