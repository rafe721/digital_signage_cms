// -------------------------------------------------------------------------------------------------------------------
// function to animate the header depending on scrolling of page.
// #START - getResult() - function definition.
// -------------------------------------------------------------------------------------------------------------------
function animateHeader() {
	window.addEventListener('scroll', function(e){
		var distanceY = window.pageYOffset || document.documentElement.scrollTop,
			shrinkOn = 100,
			header = document.querySelector("header");
		if (distanceY > shrinkOn) {
			classie.add(header,"smaller");
		} else {
			if (classie.has(header,"smaller")) {
				classie.remove(header,"smaller");
			}
		}
	});
}
// #END - function definition - getQuestion().
// -------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------
// functions to execute when page loads.
// #START - getResult() - function definition.
// -------------------------------------------------------------------------------------------------------------------
$( document ).ready(function() {
	animateHeader();
	// goHome();
});

// #END - function definition - getQuestion().
// -------------------------------------------------------------------------------------------------------------------

var max_question = 10;

// -------------------------------------------------------------------------------------------------------------------
// function to validate the input
// #START - validateInput() - function definition.
// -------------------------------------------------------------------------------------------------------------------
function validateInput() {
	var selectedAnswer = document.getElementById("Options").elements["option"].value; // get the value of `options`
	// if Nothing is selected, signal an error
	if (selectedAnswer == null || selectedAnswer == ""){
		document.getElementById("info").innerHTML = "<P>You must click on an <I>option.</I></P>";
		$('[name="option_container"]').addClass('error');
		$("#next_button").addClass('animated shake').delay(1000).queue( function(){
			$(this).removeClass('animated shake').dequeue();
		});
	} else {
		document.getElementById("info").innerHTML = "<P>Click on an option...</P>";
		$('[name="option_container"]').removeClass('error');
		$("input:radio[name='option']").each(function(i) {
			this.checked = false;
		});
	}
}
// #END - function definition - getQuestion().
// -------------------------------------------------------------------------------------------------------------------
	
// -------------------------------------------------------------------------------------------------------------------
// Definition of AgonyMeter Class
function AgonyMeter(CurrentQuestion, CurrentScore, questionfaced, selectedThreshold){
	// Add object properties
	this.currentQuestion = CurrentQuestion;
	this.currentScore = CurrentScore;
	this.questionfaced = questionfaced;
	this.selectedThreshold = selectedThreshold;
}

// Add methods
AgonyMeter.prototype = {
	//questionfaced: "", // temporary variable
	getCurrentQuestion :  function(){
		return this.currentQuestion;
	},
	// get the current score.
	getCurrentScore :  function(){
		return this.currentScore;
	},
	// append a question to list of qustions faced.
	appendQuestionFaced : function(Question) {
		if (this.questionfaced == "") {
			this.questionfaced += Question;
		} else {
			this.questionfaced += "," + Question;
		}
	},
	// 
	getQuestionList: function(){
		return this.questionfaced;
	}
}
// # END - Definition of AgonyMeter Class
// -------------------------------------------------------------------------------------------------------------------
	
// Instantiate object to store AgonyMeter
// -------------------------------------------------------------------------------------------------------------------
var agonyMeter = new AgonyMeter(1, 0, "", 0);
// -------------------------------------------------------------------------------------------------------------------
	
// -------------------------------------------------------------------------------------------------------------------
// function to get the initial threshold assesment
// #START - getThreshold() - function definition.
// -------------------------------------------------------------------------------------------------------------------
function goHome() {
	$.ajax({url: "goHome.php", success: function(result){
		$("#txtHint").html(result);
	},
	error: function(jqXHR,error, errorThrown) {  
		alert("Unable to load the Home page... Something went wrong");
	}
	});
}
// #END - function definition - getQuestion().
// -------------------------------------------------------------------------------------------------------------------

// -------------------------------------------------------------------------------------------------------------------
// function to get the initial threshold assesment
// #START - getThreshold() - function definition.
// -------------------------------------------------------------------------------------------------------------------
function getThreshold() {
	$.ajax({url: "getThresholdTaunt.php?q=1&ques="+agonyMeter.currentQuestion + "&faced=" + agonyMeter.getQuestionList(), success: function(result){
		$("#txtHint").html(result);
		// listen to change in the range values.
		listenToThresholdRange();
	}});
}
// #END - function definition - getThreshold().
// -------------------------------------------------------------------------------------------------------------------
	
// -------------------------------------------------------------------------------------------------------------------
// function to get the next Riddler question.
// #START - getQuestion() - function definition.
// -------------------------------------------------------------------------------------------------------------------
function getQuestion() {
	if (document.getElementById("Options") != null) { // if the page calling method is a multichoice question page.
		var selectedAnswer = document.getElementById("Options").elements["option"].value; // get the value of `options`
		// if Nothing is selected, signal an error
		if (selectedAnswer == null || selectedAnswer == ""){
			//document.getElementById("info").innerHTML = "<P>You must click on an <I>option.</I></P>";
			document.getElementById("info").innerHTML = "<P>You must click on an <I>option.</I></P>";
			$('[name="option_container"]').addClass('error');
			$("#next_button").addClass('animated shake').delay(1000).queue( function(){
				$(this).removeClass('animated shake').dequeue();
			});
		} else {
			document.getElementById("info").innerHTML = "<P>Click on an option...</P>";
			$('[name="option_container"]').removeClass('error');
			// update the current question variable in agonyMeter.
			agonyMeter.currentQuestion += 1;
			// if something is selected and it is correct, increase score.
			if (selectedAnswer == "correct" || selectedAnswer == "Correct") {
				agonyMeter.currentScore += 1;
			}
			// and load the next question into the question space.
			$.ajax({url: "getQuestion.php?q=1&ques="+agonyMeter.currentQuestion + "&faced=" + agonyMeter.getQuestionList(), success: function(result){
				$("#txtHint").html(result);
			}});
		}
	} else if (document.getElementById("Range") != null) {
		range = document.getElementById("Range");
		var selectedValue = range.elements["aRange"].value;
		// check if range is changed
		// if changed, increase score
		agonyMeter.currentScore += selectedValue/range.elements["aRange"].max;
		
		// load the next question
		$.ajax({url: "getQuestion.php?q=1&ques="+agonyMeter.currentQuestion + "&faced=" + agonyMeter.getQuestionList(), success: function(result){
			$("#txtHint").html(result);
		}});
		
	} else if (document.getElementById("ThresholdTaunt") != null) {
		threshold = document.getElementById("ThresholdTaunt");
		var selectedValue = threshold.elements["Threshold"].value;// /threshold.elements["Threshold"].max;
		agonyMeter.selectedThreshold = selectedValue;
		
		// load the next question
		$.ajax({url: "getQuestion.php?q=1&ques="+agonyMeter.currentQuestion + "&faced=" + agonyMeter.getQuestionList(), success: function(result){
			$("#txtHint").html(result);
		}});
	} else {
		$.ajax({url: "getQuestion.php?q=1&ques="+agonyMeter.currentQuestion + "&faced=" + agonyMeter.getQuestionList(), success: function(result){
			$("#txtHint").html(result);
		}});
	}
	
}
// #END - function definition - getQuestion().
// -------------------------------------------------------------------------------------------------------------------

// -------------------------------------------------------------------------------------------------------------------
// function to get the results of the Quiz
// #START - getResult() - function definition.
// -------------------------------------------------------------------------------------------------------------------
function getResult() {
	if (document.getElementById("Options") != null) {
		var selectedAnswer = document.getElementById("Options").elements["option"].value; // get the value of `options`
		// if Nothing is selected, signal an error
		if ((selectedAnswer == null || selectedAnswer == "") && agonyMeter.currentQuestion == max_question) {
			document.getElementById("info").innerHTML = "<P class=\"error\">You must click on an <I>option.</I></P>";
			$('[name="option_container"]').addClass('error');
			$("#next_button").addClass('animated shake').delay(1000).queue( function(){
				$(this).removeClass('animated shake').dequeue();
			});
		} else {
			document.getElementById("info").innerHTML = "<P>Click on an option...</P>";
			$('[name="option_container"]').removeClass('error');
			// update the current question variable in agonyMeter.
			agonyMeter.currentQuestion += 1;
			// if something is selected and it is correct, increase score.
			if (selectedAnswer == "correct" || selectedAnswer == "Correct") {
				agonyMeter.currentScore += 1;
			}
			// and load the next question into the question space.
			$.ajax({url: "getResult.php?question="+agonyMeter.currentQuestion + "&threshold=" + agonyMeter.selectedThreshold + "&score=" + agonyMeter.getCurrentScore(), success: function(result){
				$("#txtHint").html(result);
				// animate the bar graph
				animatePercentageBar();
			}});
		}
	} else if (document.getElementById("Range") != null) {
		$.ajax({url: "getResult.php?question="+agonyMeter.currentQuestion + "&threshold=" + agonyMeter.selectedThreshold + "&score=" + agonyMeter.getCurrentScore(), success: function(result){
			$("#txtHint").html(result);
			// animate the bar graph
			animatePercentageBar();
		}});
	} else if (document.getElementById("ThresholdTaunt") != null) {
		$.ajax({url: "getResult.php?question="+agonyMeter.currentQuestion + "&threshold=" + agonyMeter.selectedThreshold + "&score=" + agonyMeter.getCurrentScore(), success: function(result){
			$("#txtHint").html(result);
			// animate the bar graph
			animatePercentageBar();
		}});
	}
	
	// reinitialise the variable AgonyMeter
	agonyMeter = new AgonyMeter(1, 0, "", 0);

}
// #END - function definition - getResult().
// -------------------------------------------------------------------------------------------------------------------

// -------------------------------------------------------------------------------------------------------------------
// function to Animate the score bar at the Results page.
// #START - animatePercentageBar() - function definition.
// -------------------------------------------------------------------------------------------------------------------
function animatePercentageBar() {
	$('.bar-percentage[data-percentage]').each(function () {
		var progress = $(this);
		var percentage = Math.ceil($(this).attr('data-percentage'));
		$({countNum: 0}).animate({countNum: percentage}, {
			duration: 2000,
			easing:'linear',
			step: function() {
			// What todo on every count
			var pct = '';
			if(percentage == 0){
				pct = Math.floor(this.countNum) + '%';
			}else{
				pct = Math.floor(this.countNum+1) + '%';
			}
			progress.text(pct) && progress.siblings().children().css('width',pct);
		}
		});
	});
}
// #END - function definition - animatePercentageBar().
// -------------------------------------------------------------------------------------------------------------------

// -------------------------------------------------------------------------------------------------------------------
// function to change display text depending on range input value in Threshold taunt page
// #START - listenToThresholdRange() - function definition.
// -------------------------------------------------------------------------------------------------------------------
function listenToThresholdRange(){
	var elem = document.querySelector('input[type="range"]');

	var rangeValue = function(){
	  var newValue = elem.value;
	  var target = document.querySelector('.value');
	  target.innerHTML = newValue;
	  var target_meaning = document.querySelector('.value_meaning');
	  if (newValue < 4) {
		target_meaning.innerHTML = "low";
		} else if(newValue >= 4 && newValue < 7) {
			target_meaning.innerHTML = "kinda OK";
		} else if(newValue >= 7) {
			target_meaning.innerHTML = "Awesome";
		} else {
			target_meaning.innerHTML = "loading..";
		}
	}
	
	elem.addEventListener("input", rangeValue);
}
// #END - function definition - listenToThresholdRange().
// -------------------------------------------------------------------------------------------------------------------