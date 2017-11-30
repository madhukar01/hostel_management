import TweenMax from 'gsap';

import GLOBALS from './config.js';
import Button from './ui/components/Button.js';
import IntroSection from './ui/modules/IntroSection.js';
import InputSection from './ui/modules/InputSection.js';
import LearningSection from './ui/modules/LearningSection.js';
import OutputSection from './ui/modules/OutputSection.js';
import Wizard from './ui/modules/Wizard.js';
import Recording from './ui/modules/Recording';
import RecordOpener from './ui/components/RecordOpener.js';
import LaunchScreen from './ui/modules/wizard/LaunchScreen.js';
import BrowserUtils from './ui/components/BrowserUtils';

function init() {

	// Shim for forEach for IE/Edge
    if (typeof NodeList.prototype.forEach !== 'function') {
        NodeList.prototype.forEach = Array.prototype.forEach;
	}
    GLOBALS.browserUtils = new BrowserUtils();
    GLOBALS.launchScreen = new LaunchScreen();

    GLOBALS.learningSection = new LearningSection(document.querySelector('#learning-section'));
	GLOBALS.inputSection = new InputSection(document.querySelector('#input-section'));
	GLOBALS.outputSection = new OutputSection(document.querySelector('#output-section'));
    GLOBALS.recordOpener = new RecordOpener(document.querySelector('#record-open-section'));

	GLOBALS.inputSection.ready();
	GLOBALS.learningSection.ready();
	GLOBALS.wizard = new Wizard();
	GLOBALS.recordSection = new Recording(document.querySelector('#recording'));
	if (localStorage.getItem('isBackFacingCam') && localStorage.getItem('isBackFacingCam') === 'true') {
		GLOBALS.isBackFacingCam = true;
	}
}

window.addEventListener('load', init);

export default GLOBALS;