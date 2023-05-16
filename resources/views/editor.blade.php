<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Matematicky priklad</title>
  <script src="/editorResources/lib/jquery-2.0.0.js"></script>
  <script src="/editorResources/lib/underscore-1.6.0.js"></script>
  <script src="/editorResources/lib/mousetrap-1.4.6.js"></script>
  <script src="/editorResources/lib/spin.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script src="/js/editor/property.js"></script>
  <script src="/js/editor/init.js"></script>
  <script src="/js/editor/fontMetrics.js"></script>
  <script src="/js/editor/equation-components/misc/equationComponent.js"></script>
  <script src="/js/editor/equation-components/misc/boundEquationComponent.js"></script>
  <script src="/js/editor/equation.js"></script>
  <script src="/js/editor/equation-components/dom/equationDom.js"></script>
  <script src="/js/editor/equation-components/containers/container.js"></script>
  <script src="/js/editor/equation-components/dom/containerDom.js"></script>
  <script src="/js/editor/equation-components/wrappers/wrapper.js"></script>
  <script src="/js/editor/equation-components/dom/wrapperDom.js"></script>
  <script src="/js/editor/equation-components/misc/symbol.js"></script>
  <script src="/js/editor/equation-components/wrappers/symbolWrapper.js"></script>
  <script src="/js/editor/equation-components/wrappers/operatorWrapper.js"></script>
  <script src="/js/editor/equation-components/wrappers/emptyContainerWrapper.js"></script>
  <script src="/js/editor/equation-components/wrappers/topLevelEmptyContainerWrapper.js"></script>
  <script src="/js/editor/equation-components/misc/topLevelEmptyContainerMessage.js"></script>
  <script src="/js/editor/equation-components/wrappers/squareEmptyContainerWrapper.js"></script>
  <script src="/js/editor/equation-components/containers/squareEmptyContainer.js"></script>
  <script src="/js/editor/equation-components/wrappers/squareEmptyContainerFillerWrapper.js"></script>
  <script src="/js/editor/equation-components/wrappers/stackedFractionWrapper.js"></script>
  <script src="/js/editor/equation-components/containers/stackedFractionNumeratorContainer.js"></script>
  <script src="/js/editor/equation-components/containers/stackedFractionDenominatorContainer.js"></script>
  <script src="/js/editor/equation-components/misc/stackedFractionHorizontalBar.js"></script>
  <script src="/js/editor/equation-components/wrappers/superscriptWrapper.js"></script>
  <script src="/js/editor/equation-components/containers/superscriptContainer.js"></script>
  <script src="/js/editor/equation-components/wrappers/subscriptWrapper.js"></script>
  <script src="/js/editor/equation-components/containers/subscriptContainer.js"></script>
  <script src="/js/editor/equation-components/wrappers/superscriptAndSubscriptWrapper.js"></script>
  <script src="/js/editor/equation-components/wrappers/squareRootWrapper.js"></script>
  <script src="/js/editor/equation-components/misc/squareRootOverBar.js"></script>
  <script src="/js/editor/equation-components/misc/squareRootRadical.js"></script>
  <script src="/js/editor/equation-components/misc/squareRootDiagonal.js"></script>
  <script src="/js/editor/equation-components/containers/squareRootRadicandContainer.js"></script>
  <script src="/js/editor/equation-components/wrappers/nthRootWrapper.js"></script>
  <script src="/js/editor/equation-components/misc/nthRootOverBar.js"></script>
  <script src="/js/editor/equation-components/misc/nthRootRadical.js"></script>
  <script src="/js/editor/equation-components/misc/nthRootDiagonal.js"></script>
  <script src="/js/editor/equation-components/containers/nthRootRadicandContainer.js"></script>
  <script src="/js/editor/equation-components/containers/nthRootDegreeContainer.js"></script>
  <script src="/js/editor/equation-components/wrappers/bracketWrapper.js"></script>
  <script src="/js/editor/equation-components/misc/bracket.js"></script>
  <script src="/js/editor/equation-components/misc/wholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/topBracket.js"></script>
  <script src="/js/editor/equation-components/misc/middleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/bottomBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftParenthesisBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightParenthesisBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftParenthesisWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftParenthesisTopBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftParenthesisMiddleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftParenthesisBottomBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightParenthesisWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightParenthesisTopBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightParenthesisMiddleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightParenthesisBottomBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftSquareBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftSquareWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftSquareTopBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftSquareMiddleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftSquareBottomBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightSquareBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightSquareWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightSquareTopBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightSquareMiddleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightSquareBottomBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftCurlyBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftCurlyWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftCurlyTopBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftCurlyMiddleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftCurlyBottomBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightCurlyBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightCurlyWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightCurlyTopBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightCurlyMiddleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightCurlyBottomBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftAngleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftAngleWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightAngleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightAngleWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftFloorBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftFloorWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftFloorMiddleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftFloorBottomBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightFloorBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightFloorWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightFloorMiddleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightFloorBottomBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftCeilBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftCeilWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftCeilTopBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftCeilMiddleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightCeilBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightCeilWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightCeilTopBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightCeilMiddleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftAbsValBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightAbsValBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftAbsValWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftAbsValMiddleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightAbsValWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightAbsValMiddleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftNormBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightNormBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftNormWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/leftNormMiddleBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightNormWholeBracket.js"></script>
  <script src="/js/editor/equation-components/misc/rightNormMiddleBracket.js"></script>
  <script src="/js/editor/equation-components/wrappers/bracketPairWrapper.js"></script>
  <script src="/js/editor/equation-components/containers/bracketContainer.js"></script>
  <script src="/js/editor/equation-components/wrappers/bigOperatorWrapper.js"></script>
  <script src="/js/editor/equation-components/containers/bigOperatorUpperLimitContainer.js"></script>
  <script src="/js/editor/equation-components/containers/bigOperatorLowerLimitContainer.js"></script>
  <script src="/js/editor/equation-components/containers/bigOperatorOperandContainer.js"></script>
  <script src="/js/editor/equation-components/misc/bigOperatorSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/sumBigOperatorSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/bigCapBigOperatorSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/bigCupBigOperatorSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/bigSqCapBigOperatorSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/bigSqCupBigOperatorSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/bigSqCupBigOperatorSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/prodBigOperatorSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/coProdBigOperatorSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/bigVeeBigOperatorSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/bigWedgeBigOperatorSymbol.js"></script>
  <script src="/js/editor/equation-components/wrappers/integralWrapper.js"></script>
  <script src="/js/editor/equation-components/misc/integralSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/doubleIntegralSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/tripleIntegralSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/contourIntegralSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/contourDoubleIntegralSymbol.js"></script>
  <script src="/js/editor/equation-components/misc/contourTripleIntegralSymbol.js"></script>
  <script src="/js/editor/equation-components/containers/integralUpperLimitContainer.js"></script>
  <script src="/js/editor/equation-components/containers/integralLowerLimitContainer.js"></script>
  <script src="/js/editor/equation-components/misc/word.js"></script>
  <script src="/js/editor/equation-components/misc/functionWord.js"></script>
  <script src="/js/editor/equation-components/wrappers/functionWrapper.js"></script>
  <script src="/js/editor/equation-components/wrappers/functionLowerWrapper.js"></script>
  <script src="/js/editor/equation-components/misc/functionLowerWord.js"></script>
  <script src="/js/editor/equation-components/containers/functionLowerContainer.js"></script>
  <script src="/js/editor/equation-components/wrappers/logLowerWrapper.js"></script>
  <script src="/js/editor/equation-components/misc/logLowerWord.js"></script>
  <script src="/js/editor/equation-components/containers/logLowerContainer.js"></script>
  <script src="/js/editor/equation-components/wrappers/limitWrapper.js"></script>
  <script src="/js/editor/equation-components/containers/limitLeftContainer.js"></script>
  <script src="/js/editor/equation-components/containers/limitRightContainer.js"></script>
  <script src="/js/editor/equation-components/misc/limitWord.js"></script>
  <script src="/js/editor/equation-components/misc/limitSymbol.js"></script>
  <script src="/js/editor/equation-components/wrappers/matrixWrapper.js"></script>
  <script src="/js/editor/equation-components/containers/matrixContainer.js"></script>
  <script src="/js/editor/equation-components/wrappers/accentWrapper.js"></script>
  <script src="/js/editor/equation-components/misc/accentSymbol.js"></script>
  <script src="/js/editor/equation-components/containers/accentContainer.js"></script>
  <script src="/js/editor/equation-components/containers/topLevelContainer.js"></script>
  <script src="/js/editor/blinkingCursor.js"></script>
  <script src="/js/editor/mouseInteraction.js"></script>
  <script src="/js/editor/addWrapperUtil.js"></script>
  <script src="/js/editor/keyboardInteraction.js"></script>
  <script src="/js/editor/menuInteraction.js"></script>
  <script src="/js/editor/equationEditor.js"></script>
  <script src="/js/editor/latexGenerator.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script>
  <script src="/js/editor/latexAnswer.js" defer></script>
  <link href="/editorResources/Fonts/TeX/font.css" rel="stylesheet" type="text/css" charset="utf-8" />
  <link href="/css/editor/equationEditor.css" rel="stylesheet" type="text/css" charset="utf-8" />
  
</head>
<body onload="onLoad();">
    <h1>Zadanie....</h1>
    <div id="content">
    
    </div>
    <div class="tabs">
        <ul class="outer-tab-links tab-links">
            <li class="outerTab active"><a href="#common">Common</a></li>
            <li class="outerTab"><a href="#brackets">Brackets</a></li>
            <li class="outerTab"><a href="#symbols">Symbols</a></li>
            <li class="outerTab"><a href="#functions">Functions</a></li>
            <li class="outerTab"><a href="#largeOperators">Large Operators</a></li>
            <li class="outerTab"><a href="#integrals">Integrals</a></li>
            <li class="outerTab"><a href="#misc">Misc</a></li>
        </ul>
     
        <div class="tab-content" id="tab-content-top">
            <div id="common" class="tab outer active">
                <img class="menuItem" id="stackedFractionButton" src="/editorResources/MenuImages/png/stackedFraction.png">
                <img class="menuItem" id="superscriptButton" src="/editorResources/MenuImages/png/superscript.png">
                <img class="menuItem" id="subscriptButton" src="/editorResources/MenuImages/png/subscript.png">
                <img class="menuItem" id="superscriptAndSubscriptButton" src="/editorResources/MenuImages/png/superscriptAndSubscript.png">
                <img class="menuItem" id="squareRootButton" src="/editorResources/MenuImages/png/squareRoot.png">
                <img class="menuItem" id="nthRootButton" height="60" src="/editorResources/MenuImages/png/nthRoot.png">
                <img class="menuItem" id="limitButton" src="/editorResources/MenuImages/png/limit.png">
                <img class="menuItem" id="logLowerButton" height="55" src="/editorResources/MenuImages/png/log_n.png">
                <span class="menuItem MathJax_Main" id="logButton" style="font-size: 45px;">log</span>
                <span class="menuItem MathJax_Main" id="lnButton" style="font-size: 45px;">ln</span>
            </div>
     
            <div id="brackets" class="tab outer">
                <ul class="inner-tab-links tab-links">
                    <li class="innerTab active"><a href="#bracketsSingle">Single</a></li>
                    <li class="innerTab"><a href="#bracketsPair">Pair</a></li>
                </ul>
                <div class="tab-content tab-content-nested">
                  <div id="bracketsSingle" class="tab inner active">
                    <span class="menuItem MathJax_Main" id="leftAngleBracketButton" style="font-size: 65px;">&#10216;</span>
                    <span class="menuItem MathJax_Main" id="rightAngleBracketButton" style="font-size: 65px;">&#10217;</span>
                    <span class="menuItem MathJax_Main" id="leftFloorBracketButton" style="font-size: 65px;">&#8970;</span>
                    <span class="menuItem MathJax_Main" id="rightFloorBracketButton" style="font-size: 65px;">&#8971;</span>
                    <span class="menuItem MathJax_Main" id="leftCeilBracketButton" style="font-size: 65px;">&#8968;</span>
                    <span class="menuItem MathJax_Main" id="rightCeilBracketButton" style="font-size: 65px;">&#8969;</span>
                  </div>
                  <div id="bracketsPair" class="tab inner">
                    <img class="menuItem" id="parenthesesBracketPairButton" src="/editorResources/MenuImages/png/parenthesesBracketPair.png">
                    <img class="menuItem" id="squareBracketPairButton" src="/editorResources/MenuImages/png/squareBracketPair.png">
                    <img class="menuItem" id="curlyBracketPairButton" src="/editorResources/MenuImages/png/curlyBracketPair.png">
                    <img class="menuItem" id="angleBracketPairButton" src="/editorResources/MenuImages/png/angleBracketPair.png">
                    <img class="menuItem" id="floorBracketPairButton" src="/editorResources/MenuImages/png/floorBracketPair.png">
                    <img class="menuItem" id="ceilBracketPairButton" src="/editorResources/MenuImages/png/ceilBracketPair.png">
                    <img class="menuItem" id="absValBracketPairButton" src="/editorResources/MenuImages/png/absBracketPair.png">
                    <img class="menuItem" id="normBracketPairButton" src="/editorResources/MenuImages/png/normBracketPair.png">
                  </div>
                </div>
            </div>
            
            <div id="symbols" class="tab outer">
                <ul class="inner-tab-links tab-links">
                    <li class="innerTab active"><a href="#symbolsOperators">Operators</a></li>
                    <li class="innerTab"><a href="#symbolsGreek">Greek</a></li>
                    <li class="innerTab"><a href="#symbolsMisc">Misc</a></li>
                </ul>
                <div class="tab-content tab-content-nested">
                  <div id="symbolsOperators" class="tab inner active">
                    <span class="menuItem MathJax_Main" id="colonButton" style="font-size: 45px;">:</span>
                    <span class="menuItem MathJax_Main" id="lessThanOrEqualToButton" style="font-size: 45px;">&#x2264;</span>
                    <span class="menuItem MathJax_Main" id="greaterThanOrEqualToButton" style="font-size: 45px;">&#x2265;</span>
                    <span class="menuItem MathJax_Main" id="circleOperatorButton" style="font-size: 45px;">&#9702;</span>
                    <span class="menuItem MathJax_Main" id="approxEqualToButton" style="font-size: 45px;">&#x2248;</span>
                    <span class="menuItem MathJax_Main" id="belongsToButton" style="font-size: 45px;">&#8712;</span>
                    <span class="menuItem MathJax_Main" id="timesButton" style="font-size: 45px;">&#215;</span>
                    <span class="menuItem MathJax_Main" id="pmButton" style="font-size: 45px;">&#177;</span>
                    <span class="menuItem MathJax_Main" id="wedgeButton" style="font-size: 45px;">&#8743;</span>
                    <span class="menuItem MathJax_Main" id="veeButton" style="font-size: 45px;">&#8744;</span>
                    <span class="menuItem MathJax_Main" id="equivButton" style="font-size: 45px;">&#8801;</span>
                    <span class="menuItem MathJax_Main" id="congButton" style="font-size: 45px;">&#8773;</span>
                    <span class="menuItem MathJax_Main" id="neqButton" style="font-size: 45px;">&#8800;</span>
                    <span class="menuItem MathJax_Main" id="simButton" style="font-size: 45px;">&#8764;</span>
                    <span class="menuItem MathJax_Main" id="proptoButton" style="font-size: 45px;">&#8733;</span>
                    <span class="menuItem MathJax_Main" id="precButton" style="font-size: 45px;">&#8826;</span>
                    <span class="menuItem MathJax_Main" id="precEqButton" style="font-size: 45px;">&#10927;</span>
                    <span class="menuItem MathJax_Main" id="subsetButton" style="font-size: 45px;">&#8834;</span>
                    <span class="menuItem MathJax_Main" id="subsetEqButton" style="font-size: 45px;">&#8838;</span>
                    <span class="menuItem MathJax_Main" id="succButton" style="font-size: 45px;">&#8827;</span>
                    <span class="menuItem MathJax_Main" id="succEqButton" style="font-size: 45px;">&#10928;</span>
                    <span class="menuItem MathJax_Main" id="perpButton" style="font-size: 45px;">&#8869;</span>
                    <span class="menuItem MathJax_Main" id="midButton" style="font-size: 45px;">&#8739;</span>
                    <span class="menuItem MathJax_Main" id="parallelButton" style="font-size: 45px;">&#8741;</span>
                  </div>
                  <div id="symbolsGreek" class="tab inner">
                    <span class="menuItem MathJax_Main" id="gammaUpperButton" style="font-size: 45px;">&#915;</span>
                    <span class="menuItem MathJax_Main" id="deltaUpperButton" style="font-size: 45px;">&#916;</span>
                    <span class="menuItem MathJax_Main" id="thetaUpperButton" style="font-size: 45px;">&#920;</span>
                    <span class="menuItem MathJax_Main" id="lambdaUpperButton" style="font-size: 45px;">&#923;</span>
                    <span class="menuItem MathJax_Main" id="xiUpperButton" style="font-size: 45px;">&#926;</span>
                    <span class="menuItem MathJax_Main" id="piUpperButton" style="font-size: 45px;">&#928;</span>
                    <span class="menuItem MathJax_Main" id="sigmaUpperButton" style="font-size: 45px;">&#931;</span>
                    <span class="menuItem MathJax_Main" id="upsilonUpperButton" style="font-size: 45px;">&#933;</span>
                    <span class="menuItem MathJax_Main" id="phiUpperButton" style="font-size: 45px;">&#934;</span>
                    <span class="menuItem MathJax_Main" id="psiUpperButton" style="font-size: 45px;">&#936;</span>
                    <span class="menuItem MathJax_Main" id="omegaUpperButton" style="font-size: 45px;">&#937;</span>

                    <span class="menuItem MathJax_MathItalic" id="alphaButton" style="font-size: 45px;">&#945;</span>
                    <span class="menuItem MathJax_MathItalic" id="betaButton" style="font-size: 45px;">&#946;</span>
                    <span class="menuItem MathJax_MathItalic" id="gammaButton" style="font-size: 45px;">&#947;</span>
                    <span class="menuItem MathJax_MathItalic" id="deltaButton" style="font-size: 45px;">&#948;</span>
                    <span class="menuItem MathJax_MathItalic" id="varEpsilonButton" style="font-size: 45px;">&#949;</span>
                    <span class="menuItem MathJax_MathItalic" id="epsilonButton" style="font-size: 45px;">&#1013;</span>
                    <span class="menuItem MathJax_MathItalic" id="zetaButton" style="font-size: 45px;">&#950;</span>
                    <span class="menuItem MathJax_MathItalic" id="etaButton" style="font-size: 45px;">&#951;</span>
                    <span class="menuItem MathJax_MathItalic" id="thetaButton" style="font-size: 45px;">&#952;</span>
                    <span class="menuItem MathJax_MathItalic" id="varThetaButton" style="font-size: 45px;">&#977;</span>
                    <span class="menuItem MathJax_MathItalic" id="iotaButton" style="font-size: 45px;">&#953;</span>
                    <span class="menuItem MathJax_MathItalic" id="kappaButton" style="font-size: 45px;">&#954;</span>
                    <span class="menuItem MathJax_MathItalic" id="lambdaButton" style="font-size: 45px;">&#955;</span>
                    <span class="menuItem MathJax_MathItalic" id="muButton" style="font-size: 45px;">&#956;</span>
                    <span class="menuItem MathJax_MathItalic" id="nuButton" style="font-size: 45px;">&#957;</span>
                    <span class="menuItem MathJax_MathItalic" id="xiButton" style="font-size: 45px;">&#958;</span>
                    <span class="menuItem MathJax_MathItalic" id="piButton" style="font-size: 45px;">&#960;</span>
                    <span class="menuItem MathJax_MathItalic" id="varPiButton" style="font-size: 45px;">&#982;</span>
                    <span class="menuItem MathJax_MathItalic" id="rhoButton" style="font-size: 45px;">&#961;</span>
                    <span class="menuItem MathJax_MathItalic" id="varRhoButton" style="font-size: 45px;">&#1009;</span>
                    <span class="menuItem MathJax_MathItalic" id="sigmaButton" style="font-size: 45px;">&#963;</span>
                    <span class="menuItem MathJax_MathItalic" id="varSigmaButton" style="font-size: 45px;">&#962;</span>
                    <span class="menuItem MathJax_MathItalic" id="tauButton" style="font-size: 45px;">&#964;</span>
                    <span class="menuItem MathJax_MathItalic" id="upsilonButton" style="font-size: 45px;">&#965;</span>
                    <span class="menuItem MathJax_MathItalic" id="varPhiButton" style="font-size: 45px;">&#966;</span>
                    <span class="menuItem MathJax_MathItalic" id="phiButton" style="font-size: 45px;">&#981;</span>
                    <span class="menuItem MathJax_MathItalic" id="chiButton" style="font-size: 45px;">&#967;</span>
                    <span class="menuItem MathJax_MathItalic" id="psiButton" style="font-size: 45px;">&#968;</span>
                    <span class="menuItem MathJax_MathItalic" id="omegaButton" style="font-size: 45px;">&#969;</span>
                  </div>
                  <div id="symbolsMisc" class="tab inner">
                    <span class="menuItem MathJax_Main" id="partialButton" style="font-size: 45px;">&#8706;</span>
                    <span class="menuItem MathJax_Main" id="infinityButton" style="font-size: 45px;">&#8734;</span>
                  </div>
                </div>
            </div>

            <div id="functions" class="tab outer">
                <ul class="inner-tab-links tab-links">
                    <li class="innerTab active"><a href="#functionsTrig">Trig</a></li>
                    <li class="innerTab"><a href="#functionsMisc">Misc</a></li>
                </ul>
                <div class="tab-content tab-content-nested">
                  <div id="functionsTrig" class="tab inner active">
                    <span class="menuItem MathJax_Main" id="sinButton" style="font-size: 45px;">sin</span>
                    <span class="menuItem MathJax_Main" id="cosButton" style="font-size: 45px;">cos</span>
                    <span class="menuItem MathJax_Main" id="tanButton" style="font-size: 45px;">tan</span>
                    <span class="menuItem MathJax_Main" id="cotButton" style="font-size: 45px;">cot</span>
                    <span class="menuItem MathJax_Main" id="secButton" style="font-size: 45px;">sec</span>
                    <span class="menuItem MathJax_Main" id="cscButton" style="font-size: 45px;">csc</span>
                    <span class="menuItem MathJax_Main" id="sinhButton" style="font-size: 45px;">sinh</span>
                    <span class="menuItem MathJax_Main" id="coshButton" style="font-size: 45px;">cosh</span>
                    <span class="menuItem MathJax_Main" id="tanhButton" style="font-size: 45px;">tanh</span>
                    <span class="menuItem MathJax_Main" id="cothButton" style="font-size: 45px;">coth</span>
                    <span class="menuItem MathJax_Main" id="sechButton" style="font-size: 45px;">sech</span>
                    <span class="menuItem MathJax_Main" id="cschButton" style="font-size: 45px;">csch</span>
                  </div>
                  <div id="functionsMisc" class="tab inner">
                    <span class="menuItem MathJax_Main" id="limButton" style="font-size: 45px;">lim</span>
                    <span class="menuItem MathJax_Main" id="maxButton" style="font-size: 45px;">max</span>
                    <span class="menuItem MathJax_Main" id="minButton" style="font-size: 45px;">min</span>
                    <span class="menuItem MathJax_Main" id="supButton" style="font-size: 45px;">sup</span>
                    <span class="menuItem MathJax_Main" id="infButton" style="font-size: 45px;">inf</span>
                    <img class="menuItem" id="maxLowerButton" src="/editorResources/MenuImages/png/maxLower.png">
                    <img class="menuItem" id="minLowerButton" src="/editorResources/MenuImages/png/minLower.png">
                  </div>
                </div>
            </div>
     
            <div id="largeOperators" class="tab outer">
                <ul class="inner-tab-links tab-links">
                    <li class="innerTab active"><a href="#largeOperatorsSum"><img class="innerTabImg" src="/editorResources/MenuImages/png/sumSymbol.png"></a></li>
                    <li class="innerTab"><a href="#largeOperatorsBigCap"><img class="innerTabImg" src="/editorResources/MenuImages/png/bigCapSymbol.png"></a></li>
                    <li class="innerTab"><a href="#largeOperatorsBigCup"><img class="innerTabImg" src="/editorResources/MenuImages/png/bigCupSymbol.png"></a></li>
                    <li class="innerTab"><a href="#largeOperatorsBigSqCap"><img class="innerTabImg" src="/editorResources/MenuImages/png/bigSqCapSymbol.png"></a></li>
                    <li class="innerTab"><a href="#largeOperatorsBigSqCup"><img class="innerTabImg" src="/editorResources/MenuImages/png/bigSqCupSymbol.png"></a></li>
                    <li class="innerTab"><a href="#largeOperatorsProd"><img class="innerTabImg" src="/editorResources/MenuImages/png/prodSymbol.png"></a></li>
                    <li class="innerTab"><a href="#largeOperatorsCoProd"><img class="innerTabImg" src="/editorResources/MenuImages/png/coProdSymbol.png"></a></li>
                    <li class="innerTab"><a href="#largeOperatorsBigVee"><img class="innerTabImg" src="/editorResources/MenuImages/png/bigVeeSymbol.png"></a></li>
                    <li class="innerTab"><a href="#largeOperatorsBigWedge"><img class="innerTabImg" src="/editorResources/MenuImages/png/bigWedgeSymbol.png"></a></li>
                </ul>
                <div class="tab-content tab-content-nested">
                  <div id="largeOperatorsSum" class="tab inner active">
                    <img class="menuItem" id="sumBigOperatorButton" src="/editorResources/MenuImages/png/sum.png">
                    <img class="menuItem" id="sumBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/sumNoUpper.png">
                    <img class="menuItem" id="sumBigOperatorNoUpperNoLowerButton" src="/editorResources/MenuImages/png/sumNoUpperNoLower.png">
                    <img class="menuItem" id="inlineSumBigOperatorButton" src="/editorResources/MenuImages/png/sumInline.png">
                    <img class="menuItem" id="inlineSumBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/sumNoUpperInline.png">
                  </div>
                  <div id="largeOperatorsBigCap" class="tab inner">
                    <img class="menuItem" id="bigCapBigOperatorButton" src="/editorResources/MenuImages/png/bigCap.png">
                    <img class="menuItem" id="bigCapBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/bigCapNoUpper.png">
                    <img class="menuItem" id="bigCapBigOperatorNoUpperNoLowerButton" src="/editorResources/MenuImages/png/bigCapNoUpperNoLower.png">
                    <img class="menuItem" id="inlineBigCapBigOperatorButton" src="/editorResources/MenuImages/png/bigCapInline.png">
                    <img class="menuItem" id="inlineBigCapBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/bigCapNoUpperInline.png">
                  </div>
                  <div id="largeOperatorsBigCup" class="tab inner">
                    <img class="menuItem" id="bigCupBigOperatorButton" src="/editorResources/MenuImages/png/bigCup.png">
                    <img class="menuItem" id="bigCupBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/bigCupNoUpper.png">
                    <img class="menuItem" id="bigCupBigOperatorNoUpperNoLowerButton" src="/editorResources/MenuImages/png/bigCupNoUpperNoLower.png">
                    <img class="menuItem" id="inlineBigCupBigOperatorButton" src="/editorResources/MenuImages/png/bigCupInline.png">
                    <img class="menuItem" id="inlineBigCupBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/bigCupNoUpperInline.png">
                  </div>
                  <div id="largeOperatorsBigSqCap" class="tab inner">
                    <img class="menuItem" id="bigSqCapBigOperatorButton" src="/editorResources/MenuImages/png/bigSqCap.png">
                    <img class="menuItem" id="bigSqCapBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/bigSqCapNoUpper.png">
                    <img class="menuItem" id="bigSqCapBigOperatorNoUpperNoLowerButton" src="/editorResources/MenuImages/png/bigSqCapNoUpperNoLower.png">
                    <img class="menuItem" id="inlineBigSqCapBigOperatorButton" src="/editorResources/MenuImages/png/bigSqCapInline.png">
                    <img class="menuItem" id="inlineBigSqCapBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/bigSqCapNoUpperInline.png">
                  </div>
                  <div id="largeOperatorsBigSqCup" class="tab inner">
                    <img class="menuItem" id="bigSqCupBigOperatorButton" src="/editorResources/MenuImages/png/bigSqCup.png">
                    <img class="menuItem" id="bigSqCupBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/bigSqCupNoUpper.png">
                    <img class="menuItem" id="bigSqCupBigOperatorNoUpperNoLowerButton" src="/editorResources/MenuImages/png/bigSqCupNoUpperNoLower.png">
                    <img class="menuItem" id="inlineBigSqCupBigOperatorButton" src="/editorResources/MenuImages/png/bigSqCupInline.png">
                    <img class="menuItem" id="inlineBigSqCupBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/bigSqCupNoUpperInline.png">
                  </div>
                  <div id="largeOperatorsProd" class="tab inner">
                    <img class="menuItem" id="prodBigOperatorButton" src="/editorResources/MenuImages/png/prod.png">
                    <img class="menuItem" id="prodBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/prodNoUpper.png">
                    <img class="menuItem" id="prodBigOperatorNoUpperNoLowerButton" src="/editorResources/MenuImages/png/prodNoUpperNoLower.png">
                    <img class="menuItem" id="inlineProdBigOperatorButton" src="/editorResources/MenuImages/png/prodInline.png">
                    <img class="menuItem" id="inlineProdBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/prodNoUpperInline.png">
                  </div>
                  <div id="largeOperatorsCoProd" class="tab inner">
                    <img class="menuItem" id="coProdBigOperatorButton" src="/editorResources/MenuImages/png/coProd.png">
                    <img class="menuItem" id="coProdBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/coProdNoUpper.png">
                    <img class="menuItem" id="coProdBigOperatorNoUpperNoLowerButton" src="/editorResources/MenuImages/png/coProdNoUpperNoLower.png">
                    <img class="menuItem" id="inlineCoProdBigOperatorButton" src="/editorResources/MenuImages/png/coProdInline.png">
                    <img class="menuItem" id="inlineCoProdBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/coProdNoUpperInline.png">
                  </div>
                  <div id="largeOperatorsBigVee" class="tab inner">
                    <img class="menuItem" id="bigVeeBigOperatorButton" src="/editorResources/MenuImages/png/bigVee.png">
                    <img class="menuItem" id="bigVeeBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/bigVeeNoUpper.png">
                    <img class="menuItem" id="bigVeeBigOperatorNoUpperNoLowerButton" src="/editorResources/MenuImages/png/bigVeeNoUpperNoLower.png">
                    <img class="menuItem" id="inlineBigVeeBigOperatorButton" src="/editorResources/MenuImages/png/bigVeeInline.png">
                    <img class="menuItem" id="inlineBigVeeBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/bigVeeNoUpperInline.png">
                  </div>
                  <div id="largeOperatorsBigWedge" class="tab inner">
                    <img class="menuItem" id="bigWedgeBigOperatorButton" src="/editorResources/MenuImages/png/bigWedge.png">
                    <img class="menuItem" id="bigWedgeBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/bigWedgeNoUpper.png">
                    <img class="menuItem" id="bigWedgeBigOperatorNoUpperNoLowerButton" src="/editorResources/MenuImages/png/bigWedgeNoUpperNoLower.png">
                    <img class="menuItem" id="inlineBigWedgeBigOperatorButton" src="/editorResources/MenuImages/png/bigWedgeInline.png">
                    <img class="menuItem" id="inlineBigWedgeBigOperatorNoUpperButton" src="/editorResources/MenuImages/png/bigWedgeNoUpperInline.png">
                  </div>
                </div>
            </div>

            <div id="integrals" class="tab outer">
                <ul class="inner-tab-links tab-links">
                    <li class="innerTab active"><a href="#integralsIntegral"><img class="innerTabImg" src="/editorResources/MenuImages/png/integralSymbol.png"></a></li>
                    <li class="innerTab"><a href="#integralsDoubleIntegral"><img class="innerTabImg" src="/editorResources/MenuImages/png/doubleIntegralSymbol.png"></a></li>
                    <li class="innerTab"><a href="#integralsTripleIntegral"><img class="innerTabImg" src="/editorResources/MenuImages/png/tripleIntegralSymbol.png"></a></li>
                    <li class="innerTab"><a href="#integralsContourIntegral"><img class="innerTabImg" src="/editorResources/MenuImages/png/contourIntegralSymbol.png"></a></li>
                    <li class="innerTab"><a href="#integralsContourDoubleIntegral"><img class="innerTabImg" src="/editorResources/MenuImages/png/doubleContourIntegralSymbol.png"></a></li>
                    <li class="innerTab"><a href="#integralsContourTripleIntegral"><img class="innerTabImg" src="/editorResources/MenuImages/png/tripleContourIntegralSymbol.png"></a></li>
                </ul>
                <div class="tab-content tab-content-nested">
                  <div id="integralsIntegral" class="tab inner active">
                    <img class="menuItem" id="integralButton" src="/editorResources/MenuImages/png/integral.png">
                    <img class="menuItem" id="integralNoUpperButton" src="/editorResources/MenuImages/png/integralNoUpper.png">
                    <img class="menuItem" id="integralNoUpperNoLowerButton" src="/editorResources/MenuImages/png/integralNoUpperNoLower.png">
                    <img class="menuItem" id="inlineIntegralButton" src="/editorResources/MenuImages/png/integralInline.png">
                    <img class="menuItem" id="inlineIntegralNoUpperButton" src="/editorResources/MenuImages/png/integralNoUpperInline.png">
                  </div>
                  <div id="integralsDoubleIntegral" class="tab inner">
                    <img class="menuItem" id="doubleIntegralButton" src="/editorResources/MenuImages/png/doubleIntegral.png">
                    <img class="menuItem" id="doubleIntegralNoUpperButton" src="/editorResources/MenuImages/png/doubleIntegralNoUpper.png">
                    <img class="menuItem" id="doubleIntegralNoUpperNoLowerButton" src="/editorResources/MenuImages/png/doubleIntegralNoUpperNoLower.png">
                    <img class="menuItem" id="inlineDoubleIntegralButton" src="/editorResources/MenuImages/png/doubleIntegralInline.png">
                    <img class="menuItem" id="inlineDoubleIntegralNoUpperButton" src="/editorResources/MenuImages/png/doubleIntegralNoUpperInline.png">
                  </div>
                  <div id="integralsTripleIntegral" class="tab inner">
                    <img class="menuItem" id="tripleIntegralButton" src="/editorResources/MenuImages/png/tripleIntegral.png">
                    <img class="menuItem" id="tripleIntegralNoUpperButton" src="/editorResources/MenuImages/png/tripleIntegralNoUpper.png">
                    <img class="menuItem" id="tripleIntegralNoUpperNoLowerButton" src="/editorResources/MenuImages/png/tripleIntegralNoUpperNoLower.png">
                    <img class="menuItem" id="inlineTripleIntegralButton" src="/editorResources/MenuImages/png/tripleIntegralInline.png">
                    <img class="menuItem" id="inlineTripleIntegralNoUpperButton" src="/editorResources/MenuImages/png/tripleIntegralNoUpperInline.png">
                  </div>
                  <div id="integralsContourIntegral" class="tab inner">
                    <img class="menuItem" id="contourIntegralButton" src="/editorResources/MenuImages/png/contourIntegral.png">
                    <img class="menuItem" id="contourIntegralNoUpperButton" src="/editorResources/MenuImages/png/contourIntegralNoUpper.png">
                    <img class="menuItem" id="contourIntegralNoUpperNoLowerButton" src="/editorResources/MenuImages/png/contourIntegralNoUpperNoLower.png">
                    <img class="menuItem" id="inlineContourIntegralButton" src="/editorResources/MenuImages/png/contourIntegralInline.png">
                    <img class="menuItem" id="inlineContourIntegralNoUpperButton" src="/editorResources/MenuImages/png/contourIntegralNoUpperInline.png">
                  </div>
                  <div id="integralsContourDoubleIntegral" class="tab inner">
                    <img class="menuItem" id="contourDoubleIntegralButton" src="/editorResources/MenuImages/png/doubleContourIntegral.png">
                    <img class="menuItem" id="contourDoubleIntegralNoUpperButton" src="/editorResources/MenuImages/png/doubleContourIntegralNoUpper.png">
                    <img class="menuItem" id="contourDoubleIntegralNoUpperNoLowerButton" src="/editorResources/MenuImages/png/doubleContourIntegralNoUpperNoLower.png">
                    <img class="menuItem" id="inlineContourDoubleIntegralButton" src="/editorResources/MenuImages/png/doubleContourIntegralInline.png">
                    <img class="menuItem" id="inlineContourDoubleIntegralNoUpperButton" src="/editorResources/MenuImages/png/doubleContourIntegralNoUpperInline.png">
                  </div>
                  <div id="integralsContourTripleIntegral" class="tab inner">
                    <img class="menuItem" id="contourTripleIntegralButton" src="/editorResources/MenuImages/png/tripleContourIntegral.png">
                    <img class="menuItem" id="contourTripleIntegralNoUpperButton" src="/editorResources/MenuImages/png/tripleContourIntegralNoUpper.png">
                    <img class="menuItem" id="contourTripleIntegralNoUpperNoLowerButton" src="/editorResources/MenuImages/png/tripleContourIntegralNoUpperNoLower.png">
                    <img class="menuItem" id="inlineContourTripleIntegralButton" src="/editorResources/MenuImages/png/tripleContourIntegralInline.png">
                    <img class="menuItem" id="inlineContourTripleIntegralNoUpperButton" src="/editorResources/MenuImages/png/tripleContourIntegralNoUpperInline.png">
                  </div>
                </div>
            </div>
            <div id="misc" class="tab outer">
                <img class="menuItem" id="dotAccentButton" src="/editorResources/MenuImages/png/dotAccent.png">
                <img class="menuItem" id="hatAccentButton" src="/editorResources/MenuImages/png/hatAccent.png">
                <img class="menuItem" id="vectorAccentButton" src="/editorResources/MenuImages/png/vectorAccent.png">
                <img class="menuItem" id="barAccentButton" src="/editorResources/MenuImages/png/barAccent.png">
                <div style="display: inline-block">rows: <input type="text" id="rows" /><br> cols: <input type="text" id="cols" /></div>
                <div class="menuItem" id="matrixButton" style="font-size: 35px; padding: 5px 5px; display: inline-block">Matrix</div>
            </div>
        </div>
    </div>
    <h1>Odpoved napis sem</h1>
    <div class="equation-editor"></div>
    <input id="hiddenFocusInput" style="width: 0; height: 0; opacity: 0; position: absolute; top: 0; left: 0;" type="text" autocapitalize="off" />
    <div id="loadingMessageOuter" style="width: 234px; height: 64px;">
      <div id="loadingMessage" class="fontSizeSmaller" style="width: 234px; height: 64px; position: fixed;"></div>
    </div>
    <button id="toLatex">Posli odpoved</button>
    <p>LaTeX:</p>
    <div id="ContentLatex" style="margin: 20px; border: solid 1px #000">&nbsp;</div>
</body>
</html>
