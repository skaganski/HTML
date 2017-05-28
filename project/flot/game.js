var words = ['one', 'sun', 'cat', 'dog', 'fog', 'black', 'start', 'bring', 'offer', 'leave', 'fundamental', 'attribition', 'grandmother', 'gardener', 'thunderstorm'];
var startWord = "";
var resultWord = "";

var easyModeScore = [0];
var mediumModeScore = [0];
var hardModeScore = [0];

var level = 0;

var spanSpace = 40;

var timer = null;
var seconds = 0;
var blockedTimer = true;

var eventType = 'mouseup'; //pressing mouse button
var listener = function (event) {
    push(event);
}

GameOverStates = {
    LOSE: 0,
    WIN: 1
}

function myHint() {
    alert("First of all you need to choose the mode. Then guess the world and check the result! Try to provide answer as fast as you can!");
}
/*graph*/
var plot;
$(function () {
    plot = $.plot("#placeholder", [getData(easyModeScore), getData(mediumModeScore), getData(hardModeScore)], {
        series: {
            shadowSize: 0
        },
        yaxis: { // axis X
            min: 0,
            max: 100
        },
        xaxis: { // axis Y
            min: 0,
            max: 10,
            show: true
        }
    });
});

/*timer*/
function showTime() {
    if (!blockedTimer) {
        seconds++;
        document.getElementById("timer").innerHTML = seconds;
        timer = setTimeout(function () {
            showTime()
        }, 1000);
    } else if (timer) {
        clearTimeout(timer);
        timer = null;
    }
}

/* get word from the list */
function getWord(minCharCount, maxCharCount) {
    return _.filter(words, function (word) {//all unsorted array, filter function
        console.log('Checking word - ' + word);
        return word.length >= minCharCount && word.length <= maxCharCount; //unfiltered results
    });
}

/*start new game and display new word*/
function displayWord() {
    var e = document.getElementById("level");

    //if it is not an empty word - display results (0 letters - no level)
    if (resultWord.length !== 0) {
        level++;
        displayResult(level, seconds);
    }


    var displayEl = document.getElementById('display');
    displayEl.innerHTML = "";
    var resultEl = document.getElementById('result');

    resultEl.innerHTML = "";
    resultWord = "";

    var difficulty = document.getElementById('level').value;
    console.log('Chosen difficulty - ' + difficulty);
	
    switch (parseInt(difficulty)) {
        case 1:
            startWord = _.sample(getWord(3, 4));
            break;
        case 2:
            startWord = _.sample(getWord(5, 6));
            break;
        case 3:
            startWord = _.sample(getWord(7, 100));
            break;
    }

    var wordArr = startWord.split(""); //splitting into array
    var l = wordArr.length; //massive length
    var symbId = 0;
    for (var i = 0; i < l; i++) {
        var spanTag = document.createElement("div");
        spanTag.id = "span" + i;
        spanTag.className = "trans";
        if (i % (level + 1) > (level - 1) && symbId < wordArr.length) {
        } else {
            symbId = Math.floor(Math.random() * wordArr.length); //as result - random integer
        }
        spanTag.innerHTML = wordArr.splice(symbId, 1);
        spanTag.style.top = 0;
        spanTag.style.left = spanSpace * i + 'px';

        /*multibrowsers support*/
        if ('ontouchstart' in window) {//touch devices
            eventType = 'touched';
        } else if (window.navigator.msPointerEnabled) {//IE
            eventType = 'MSPointerUp';
        }

        spanTag.addEventListener(eventType, listener);
        displayEl.appendChild(spanTag);

        var resultSpanTag = document.createElement("div"); //creating new <div> element
        resultSpanTag.id = "resultSpan" + i;
        resultSpanTag.innerHTML = " ";
        resultSpanTag.style.top = 50;
        resultSpanTag.style.left = spanSpace * i + 'px';
        resultSpanTag.className = 'resultNonActive';
        resultEl.appendChild(resultSpanTag);
    }


    var resultSpanNew = document.getElementById("resultSpan0");
    resultSpanNew.className = 'resultActive';

    if (timer) {
        clearTimeout(timer);
        timer = null;
    }
    seconds = 0;
    blockedTimer = false;

    showTime();
}

/**clicking on the spans with letters **/
function push(e) {
    if (!blockedTimer) {
        var spanId = e.target.id;

        var spanEl = document.getElementById(spanId);
        spanEl.removeEventListener(eventType, listener);


        var resultSpanOld = document.getElementById("resultSpan" + resultWord.length);
        resultSpanOld.className = 'resultNonActive';
        spanEl.style.top = '50px'; //letter is moving down on 50px
        spanEl.style.left = (spanSpace * resultWord.length) + 'px';//letters are moving right


        var nextValue = spanEl.innerHTML;
        resultWord += nextValue;

        if (resultWord.length < startWord.length) {
            var resultSpanNew = document.getElementById("resultSpan" + resultWord.length);
            resultSpanNew.className = 'resultActive';
        }
    }
}

/* alert, game over */
function ready() {
    if (blockedTimer) {
        alert('Please start new game');
        return;
    }
    blockedTimer = true;
    var gameOverState = GameOverStates.LOSE;

    if (resultWord === startWord) {
        gameOverState = GameOverStates.WIN

    }
    switch (parseInt(document.getElementById('level').value)) {
        case 1:
        {
            if (easyModeScore.length > 10)
                easyModeScore.shift(); //deletes 0 element and dislocate others
            easyModeScore.push(seconds); //adds last elements into massive
            break;
        }
        case 2:
        {
            if (mediumModeScore.length > 10)
                mediumModeScore.shift();
            mediumModeScore.push(seconds);
            break;
        }
        case 3:
        {
            if (hardModeScore.length > 10)
                hardModeScore.shift();
            hardModeScore.push(seconds);
            break;
        }
    }

    plot.setData([getData(easyModeScore), getData(mediumModeScore), getData(hardModeScore)]);
    plot.draw();

    switch (gameOverState) {
        case GameOverStates.LOSE:
        {
            alert('YOU LOOSE!');
            break;
        }
        case GameOverStates.WIN:
        {
            alert('GREAT!');
            break;
        }
    }
}



function displayResult(level, value) {
    var table = document.getElementById("scoreTable");
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
    cell1.innerHTML = level;
    cell2.innerHTML = value;
	
}	

function getData(data) {
    var res = [];
    for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
    }

    return res;
}




