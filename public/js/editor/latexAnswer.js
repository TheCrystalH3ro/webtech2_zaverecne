let taskSolution;

function onLoad() {

    var content = document.getElementById('content');
    // prevent the default form submission
    $.ajax({
        url: "/mathTasks",
        type: "GET",
        success: function (data) {
            var div = document.createElement('p');
            div.innerHTML = data[0].solution;
            taskSolution = data[0].solution.replace("\\begin{equation*}", '').replace("\\end{equation*}", '').replace("\\dfrac", "\\frac").replace("\\tfrac", "\\frac").trim();
            div.style.width = "max-content";
            content.appendChild(div);
            // data.forEach(element => {
            //     var div = document.createElement('p');
            //     div.innerHTML = element.solution;
            //     console.log(element.solution);
            //     div.style.width = "max-content";
            //     content.appendChild(div);
            //     // if(element.images.length != 0) {
            //     //     element.images.forEach(image =>{
            //     //         var img = document.createElement('img');
            //     //         img.setAttribute('src', image);
            //     //         content.appendChild(img);
            //     //     })
            //     // }
            //     MathJax.typeset();
            // });
            MathJax.typeset();
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log("Status: " + textStatus + " ERROR: " + errorThrown + "\n");
        }
    });
}

$('#sendAnswer').on('click', function() {
    var answerJsonObj = $('.eqEdEquation').data('eqObject').buildJsonObj();
    var solutionOperands = countOperands(taskSolution);
    if(solutionOperands != answerJsonObj.operands.topLevelContainer.length) { // check if operand count is same, if yes lets check if the operands are also correct
        $('#ContentLatex').html("nespravne");
    }
    var latexAnswer = generateLatex(answerJsonObj);
    $('#ContentLatex').html(isAnswerCorrect(latexAnswer.toString().trim()));
});

function isAnswerCorrect(answer) {
    console.log(answer);
    if(taskSolution === answer) {
        return "spravne";
    }
    
    // rozdelit podla =, ak su 2x = tak mam dve moznosti vysledku
    // musim si rozdelit odpoved a solution zaroven podla + a -, ak nemam rovnako podstringov nerovnaju sa, ak mam rovnako tak kontrolujem ich postupne...
    //

    let solutionSplited = splitInputByEquator(taskSolution);
    let answerSplited = splitInputByEquator(answer);
    let rightAnswer = answerSplited[0];
    if(answerSplited.length > 1) {
        rightAnswer = answerSplited[1];
    }
    if(solutionSplited.length > 1) { // if true there is equation or solutions in different form(y = \frac{1}{2} = 0.5)
        if(solutionSplited[1].trim() === taskSolution || solutionSplited[2].trim() === taskSolution) {
            return "spravne";
        } 
        let answer =  checkSolution(solutionSplited[1].trim(), rightAnswer);
        if(answer === "nespravne") {
            answer = checkSolution(solutionSplited[2].trim(), rightAnswer);
        }
        return answer;
    }

    return checkSolution(solutionSplited[0], rightAnswer);

    // let substrings = taskSolution.split(/(?<![{}])\s*([+-])\s*(?![{}])/);
    // //console.log(substrings);
    // let regex = /\\frac{(.*?)}{(.*?)}/;
    // let matches = answer.match(regex);

    // if (matches && matches.length >= 3) {
    //     let firstString = matches[1];
    //     let secondString = matches[2];

    //     console.log(firstString);
    //     console.log(secondString);
    // }
    // return "nespravne";

    // let variable = findCharacterWithSurroundingSymbols(answer);
    // if(variable != null) {
    //     fn = evaluatex(answer, {variable: 1}, {latex: true});
    // } else {
    //     fn = evaluatex(answer, {}, { latex: true });
    // }
    // let result = fn();
    // if(result === latexSolution) {
    //     return "correct";
    // } else {
    //     return "false";
    // }
}

function checkSolution(solution, answer) {
    let solutionOperandsCount = countOperands(solution);
    let answerOperandsCount = countOperands(answer);
    if(solutionOperandsCount != -1 || answerOperandsCount != -1) {
        if(answerOperandsCount === solutionOperandsCount) {
            hehe(solution, answer);
            return "spravne";
        } else {
            return "nespravne";
        }
    }
    return "syntax error";
}

function hehe(solution, answer) {
    //let solutionPosition = 0;
    let count = 0;
    let answerPosition = 0;
    for(i = 0; i < solution.length; i++) {
        if(solution[i] === '\\' && solution[i+1] === 'f') {  // \frac{}{}
            for(j = i + 1; j < solution.length; j++) { 
                if(solution[j] === '{') {                   // need to find first bracket in \\frac
                    let closingBracketIndex1 = findClosingBracketIndex(solution, j);
                    if(closingBracketIndex1 == -1) {
                        return "syntax error";
                    }
                    if(solution.substring(i, closingBracketIndex1) === answer.substring(answerPosition, closingBracketIndex1)) {
                        return 'spravne';
                    }
                    let solutionOperation = solution.substring(j + 1, closingBracketIndex1);
                    let solutionNumbers = extractNumbersFromFrac(solutionOperation);
                    let answerOperation = answer.substring(j + 1, closingBracketIndex1);
                    let answerNumbers = extractNumbersFromFrac(answerOperation);
                    if(solutionNumbers.length === answerNumbers.length) {
                        let answerDivisor = 0;
                        let answerCount = 0;
                        let solutionDivisor = 0;
                        let solutionCount = 0;
                        for(n = 0; n < solutionNumbers.length; n++) {
                            if(Math.floor(solutionNumbers[n] / answerNumbers[n]) === solutionNumbers[n] / answerNumbers[n]) {
                                if(n > 0 && answerDivisor != solutionNumbers[n] / answerNumbers[n]) {
                                    break;
                                }
                                answerDivisor = solutionNumbers[n] / answerNumbers[n];
                                answerCount++;
                            } if(Math.floor(answerNumbers[n] / solutionNumbers[n]) === answerNumbers[n] / solutionNumbers[n]) {
                                if(n > 0 && solutionDivisor != answerNumbers[n] / solutionNumbers[n]) {
                                    break;
                                }
                                solutionDivisor = answerNumbers[n] / solutionNumbers[n];
                                solutionCount++;
                            } 
                        }
                        if(solutionCount == solutionNumbers.length || answerCount == solutionNumbers.length) {
                            return "spravne";
                        }
                    } else {
                        return "nespravne";
                    }
                    
                    j = closingBracketIndex1 + 1;
                    i = closingBracketIndex1 + 1;
                    answerPosition = i;
                    //let matches = operation.match(/(?<![a-zA-Z])[-+]?\d+(\.\d+)?(?![a-zA-Z])/g);
                    //let numbers = matches.map(match => parseFloat(match.replace(/[+-]/, '')));
                    //if(operation === answer[answerPosition]) {}
                    
                }
            }
        } else if(solution[i] === '^') {
            if(solution[i + 1] === '{' ) { 
                let closingBracketIndex = findClosingBracketIndex(solution, i + 1);
                if(closingBracketIndex == -1) {
                    return "syntax error";
                }
                i = closingBracketIndex;
            } else if(/[a-zA-Z0-9]/.test(solution[i + 1])) {
                i++;
                if(/[a-zA-Z0-9]/.test(solution[i + 2])) {
                    i++;
                }
            }
            count++;
        } else if(/[+\-=a-zA-Z0-9]/.test(solution[i])) { // if its number, character or operator
            count++;
        }
    }
}

function splitInputByEquator(input) {
    // split the input to strings divided by '='
    return input.split('=');
}

function extractNumbersFromFrac(operation) {
    let numbers = new Array;
    for(k = 0; k < operation.length; k++) {
        if (!isNaN(operation[k])) {
            let number = '' + operation[k];
            for(m = k + 1; m < operation.length; m++) {
                if(!isNaN(operation[m])) {
                    number += operation[m];
                    k++;
                } else if(operation[m] === '.') {
                    number += operation[m];
                } else {
                    k = m;
                    break;
                }
            }
            numbers.push(number);
        } else if (operation[k] === '\\') {
            for(l = k; l < operation.length; l++) {
                if(operation[l] === '{') { 
                    // extract upper number from frac
                }
                // set k to the end of frac
            }
        } else if (operation[k] === '^') {
            if(operation[k + 1] === '{' ) { 
                let closingBracketIndex2 = findClosingBracketIndex(operation, k + 1);
                if(closingBracketIndex2 == -1) {
                    return "syntax error";
                }
                k = closingBracketIndex2;
            } else if(/[+\-0-9a-zA-Z]/.test(operation[k + 1])) {
                k++;
                if(/^[a-zA-Z0-9]$/.test(operation[k + 1])) {
                    k++;
                    if(/^[a-zA-Z0-9]$/.test(operation[k + 1])) {
                        k++;
                    }
                }
            }
        } else if (/^[a-zA-Z]$/.test(operation[k])) {
            numbers.push('1');
        } 
    }
    return numbers;
}

function countOperands(input) {
    let count = 0;
    for(i = 0; i < input.length; i++) {
        if(input[i] === '\\') { // \sqrt{} or \frac{}{}
            for(j = i; j < input.length; j++) {
                if(input[j] === '{' ) { 
                    let closingBracketIndex = findClosingBracketIndex(input, j);
                    if(closingBracketIndex == -1) {
                        return "syntax error";
                    }
                    i = closingBracketIndex;
                    count++;
                    break;
                }
            }
        } else if(input[i] === '^') {
            if(input[i + 1] === '{' ) { 
                let closingBracketIndex = findClosingBracketIndex(input, i + 1);
                if(closingBracketIndex == -1) {
                    return "syntax error";
                }
                i = closingBracketIndex;
            } else if(/[a-zA-Z0-9]/.test(input[i + 1])) {
                i++;
                if(/[a-zA-Z0-9]/.test(input[i + 2])) {
                    i++;
                }
            }
            count++;
        } else if(/[+\-=a-zA-Z0-9]/.test(input[i])) { // if its number, character or operator
            count++;
        }
    }
    return count;
}

function findClosingBracketIndex(input, openingIndex) {
    let counter = 0;
  
    for (let i = openingIndex + 1; i < input.length; i++) {
      if (input[i] === "{") {
        counter++;
      } else if (input[i] === "}") {
        if (counter === 0) {
            if (input[i + 1] === "{") {
                i++;
                continue;
            }
            return i;
        }
        counter--;
      }
    }
    return -1;
  }

function findCharacterWithSurroundingSymbols(str) {
    const regex = /[^a-zA-Z]([a-zA-Z])[^a-zA-Z]/;
    const match = str.match(regex);
    if (match && match.length > 1) {
      return match[1];
    }
    return null;
  }