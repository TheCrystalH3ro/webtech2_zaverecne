<div class="tabs">
    <ul class="outer-tab-links tab-links mb-2 mt-2">
        <li class="outerTab active"><a class="btn bg-transparent btn-outline-light text-white" href="#common">{{ __('Common') }}</a></li>
        <li class="outerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#brackets">{{ __('Brackets') }}</a></li>
        <li class="outerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#symbols">{{ __('Symbols') }}</a></li>
        <li class="outerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#functions">{{ __('Functions')}}</a></li>
        <li class="outerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#largeOperators">{{ __('Large Operators') }}</a></li>
        <li class="outerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#integrals">{{ __('Integrals')}}</a></li>
        <li class="outerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#misc">{{ __('Misc') }}</a></li>
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
            <ul class="inner-tab-links tab-links mb-2">
                <li class="innerTab active"><a class="btn bg-transparent btn-outline-light text-white" href="#bracketsSingle">{{ __('Single') }}</a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#bracketsPair">{{ __('Pair') }}</a></li>
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
            <ul class="inner-tab-links tab-links mb-2">
                <li class="innerTab active"><a class="btn bg-transparent btn-outline-light text-white" href="#symbolsOperators">{{ __('Operators') }}</a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#symbolsGreek">{{ __('Greek') }}</a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#symbolsMisc">{{ __('Misc') }}</a></li>
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
            <ul class="inner-tab-links tab-links mb-2">
                <li class="innerTab active"><a class="btn bg-transparent btn-outline-light text-white" href="#functionsTrig">{{ __('Trig') }}</a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#functionsMisc">{{ __('Misc') }}</a></li>
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
            <ul class="inner-tab-links tab-links mb-2">
                <li class="innerTab active"><a class="btn bg-transparent btn-outline-light text-white" href="#largeOperatorsSum"><img class="innerTabImg" src="/editorResources/MenuImages/png/sumSymbol.png"></a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#largeOperatorsBigCap"><img class="innerTabImg" src="/editorResources/MenuImages/png/bigCapSymbol.png"></a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#largeOperatorsBigCup"><img class="innerTabImg" src="/editorResources/MenuImages/png/bigCupSymbol.png"></a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#largeOperatorsBigSqCap"><img class="innerTabImg" src="/editorResources/MenuImages/png/bigSqCapSymbol.png"></a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#largeOperatorsBigSqCup"><img class="innerTabImg" src="/editorResources/MenuImages/png/bigSqCupSymbol.png"></a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#largeOperatorsProd"><img class="innerTabImg" src="/editorResources/MenuImages/png/prodSymbol.png"></a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#largeOperatorsCoProd"><img class="innerTabImg" src="/editorResources/MenuImages/png/coProdSymbol.png"></a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#largeOperatorsBigVee"><img class="innerTabImg" src="/editorResources/MenuImages/png/bigVeeSymbol.png"></a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#largeOperatorsBigWedge"><img class="innerTabImg" src="/editorResources/MenuImages/png/bigWedgeSymbol.png"></a></li>
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
            <ul class="inner-tab-links tab-links mb-2">
                <li class="innerTab active"><a class="btn bg-transparent btn-outline-light text-white" href="#integralsIntegral"><img class="innerTabImg" src="/editorResources/MenuImages/png/integralSymbol.png"></a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#integralsDoubleIntegral"><img class="innerTabImg" src="/editorResources/MenuImages/png/doubleIntegralSymbol.png"></a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#integralsTripleIntegral"><img class="innerTabImg" src="/editorResources/MenuImages/png/tripleIntegralSymbol.png"></a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#integralsContourIntegral"><img class="innerTabImg" src="/editorResources/MenuImages/png/contourIntegralSymbol.png"></a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#integralsContourDoubleIntegral"><img class="innerTabImg" src="/editorResources/MenuImages/png/doubleContourIntegralSymbol.png"></a></li>
                <li class="innerTab"><a class="btn bg-transparent btn-outline-light text-white" href="#integralsContourTripleIntegral"><img class="innerTabImg" src="/editorResources/MenuImages/png/tripleContourIntegralSymbol.png"></a></li>
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
            <div class="mb-2">rows: <input class="form-control" type="text" id="rows" /><br> cols: <input class="form-control" type="text" id="cols" /></div>
            <div class="menuItem btn btn-outline-dark" id="matrixButton" style="font-size: 35px; padding: 5px 5px; display: inline-block">{{ __('Matrix') }}</div>
        </div>
    </div>
</div>

<h1 class="mt-4 mb-3">{{ __('Enter your answer here') }}</h1>

<div class="equation_wrapper">
  <div class="equation-editor w-100"></div>
</div>

<input id="hiddenFocusInput" style="width: 0; height: 0; opacity: 0; position: absolute; top: 0; left: 0;" type="text" autocapitalize="off" />

<div id="loadingMessageOuter" style="width: 234px; height: 64px;">
  <div id="loadingMessage" class="fontSizeSmaller" style="width: 234px; height: 64px; position: fixed;"></div>
</div>

<button id="sendAnswer" class="btn btn-primary d-block mt-3 w-100">{{ __('Send answer') }}</button>