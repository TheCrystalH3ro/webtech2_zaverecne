
<<<<<<< HEAD
function onLoad() {

    var content = document.getElementById('content');
    // prevent the default form submission
    $.ajax({
        url: "/mathTasks",
        type: "GET",
        success: function (data) {
            var div = document.createElement('p');
            var solution = "\\begin{equation*}y(t)=\\dfrac{1}{12} - \\dfrac{3}{2}e^{-t} + \\dfrac{1}{6}e^{-3t} + \\dfrac{1}{4}e^{-4t} = 0.0833 -1.5 e^{-t} + 0.1666 e^{-3t} + 0.25 e^{-4t}\\end{equation*}";//data[0].solution;
            div.innerHTML = solution;
            taskSolution = solution.replace("\\begin{equation*}", '')
                      .replace("\\end{equation*}", '')
                      .replace(/\\dfrac/g, "\\frac")
                      .replace(/\\tfrac/g, "\\frac")
                      .replace(/\s/g, "")
                      .trim();
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

// $('#sendAnswer').on('click', function() {
//     var answerJsonObj = $('.eqEdEquation').data('eqObject').buildJsonObj();
//     var latexAnswer = generateLatex(answerJsonObj);
//     $('#ContentLatex').html(isAnswerCorrect(latexAnswer.toString().trim()));
// });

function isAnswerCorrect(answer) {
    console.log(answer);
    if(taskSolution === answer) {
        return "spravne";
    }
    let solutionSplited = splitInputByEquator(taskSolution);
    let answerSplited = splitInputByEquator(answer);
    let rightAnswer = answerSplited[0];
    if(solutionSplited.length > 1 && answerSplited.length == 1) {
        return "nespravne";
    }
    if(answerSplited.length > 1) {
        rightAnswer = answerSplited[1];
    } else if(solutionSplited.length < 1){
        if(countOperands(rightAnswer) != countOperands(taskSolution)) {
            return "nespravne";
        }
    }
    if(solutionSplited.length > 1) { // if true there is equation or solutions in different form(y = \frac{1}{2} = 0.5)
        if(solutionSplited[1].trim() == rightAnswer) {
            return "spravne";
        }
        let answer =  checkSolution(solutionSplited[1].trim(), rightAnswer);
        if(answer === "nespravne") {
            if(solutionSplited[2].trim() == rightAnswer) {
                return "spravne";
            }
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
            return hehe(solution, answer);
        } else {
            return "nespravne";
        }
    }
    return "syntax error";
}

function hehe(solution, answer) {
    //let solutionPosition = 0;
    let correctCount = 0;
    let answerPosition = 0;
    for(i = 0; i < solution.length; i++) {
        if(solution[i] === '\\' && solution[i+1] === 'f') {  // \frac{}{}
            for(j = i + 1; j < solution.length; j++) {
                if(solution[j] === '{') {                   // need to find first bracket in \\frac
                    answerPosition += '\frac{'.length;
                    let closingBracketIndexSolution = findClosingBracketIndex(solution, j);
                    let closingBracketIndexAnswer = findClosingBracketIndex(answer, answerPosition);
                    if(closingBracketIndexSolution == -1 && closingBracketIndexAnswer == -1) {
                        return "syntax error";
                    }
                    if(solution.substring(i, closingBracketIndexSolution) === answer.substring(answerPosition, closingBracketIndexAnswer)) {
                        return "nespravne";
                    }
                    let solutionOperation = solution.substring(j + 1, closingBracketIndexSolution);
                    let solutionNumbers = extractNumbersFromFrac(solutionOperation);
                    let answerOperation = answer.substring(answerPosition + 1, closingBracketIndexAnswer);
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
                            correctCount++;
                        } else {
                            return "nespravne";
                        }
                    } else {
                        return "nespravne";
                    }

                    j = solution.length;
                    i = closingBracketIndexSolution;
                    answerPosition = closingBracketIndexAnswer + 1;
                }
            }
        } else if(solution[i] === '^') {
            if(solution[i + 1] === '{' ) {
                let closingBracketIndex = findClosingBracketIndex(solution, i + 1);
                if(closingBracketIndex == -1) {
                    return "syntax error";
                }
                i = closingBracketIndex;
                answerPosition = closingBracketIndex + 1;
            } else if(/[a-zA-Z0-9]/.test(solution[i + 1])) {
                i++;
                answerPosition++;
                if(/[a-zA-Z0-9]/.test(solution[i + 1])) {
                    i++;
                    answerPosition++;
                }
                answerPosition++;
            }
            correctCount++;
        } else if(!isNaN(solution[i])) {
            // todo: if solution has number but in answer is \frac it can be same after division of frac
            let number = '' + solution[i];
            for(o = i + 1; o < solution.length; o++) {
                if(!isNaN(solution[o])) {
                    number += solution[o];
                } else if(solution[o] === '.') {
                    number += solution[o];
                } else {
                    break;
                }
            }
            if(answer.substring(answerPosition, answerPosition + number.length) == number) { // if its number
                correctCount++;
                i += number.length - 1;
                answerPosition += number.length;
            } else {
                return "nespravne";
            }
        } else if(solution[i] == '+' || solution[i] == '-') { // if its operator
            if(solution[i] == answer[answerPosition]) {
                correctCount++;
                answerPosition++;
            } else {
                return "nespravne";
            }
        } else if(isNaN(solution[i])) { // if its character
            if(isNaN(answer[answerPosition])) {
                correctCount++;
                answerPosition++;
            } else {
                return "nespravne";
            }

        }
    }
    if(correctCount == countOperands(solution)) {
        return "spravne";
    } else {
        return "nespravne";
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
                    k = m - 1;
                    break;
                }
            }
            if(m == operation.length) {
                k = m - 1;
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
        } else if (/^[a-zA-Z]$/.test(operation[k]) && (k === 0 || isNaN(operation[k - 1]))) {
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
        } else if(!isNaN(input[i])) {
            let number = '' + input[i];
            for(m = i + 1; m < input.length; m++) {
                if(!isNaN(input[m])) {
                    number += input[m];
                    i++;
                } else if(input[m] === '.') {
                    number += input[m];
                } else {
                    i = m - 1;
                    break;
                }
            }
            count++;
        } else {//if(/[+\-=a-zA-Z0-9]/.test(input[i])) { // if its number, character or operator
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
=======
// $('#sendAnswer').on('click', function() {
//     var answerJsonObj = $('.eqEdEquation').data('eqObject').buildJsonObj();
//     var latexAnswer = generateLatex(answerJsonObj);
// });
>>>>>>> fd9816f (need to move code from js to php)
