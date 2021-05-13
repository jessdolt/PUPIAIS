/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/js/index.js":
/*!****************************!*\
  !*** ./assets/js/index.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _nav__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./nav */ \"./assets/js/nav.js\");\n/* harmony import */ var _modal__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modal */ \"./assets/js/modal.js\");\n/* harmony import */ var _table__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./table */ \"./assets/js/table.js\");\n\r\n\r\n\r\n\r\n_nav__WEBPACK_IMPORTED_MODULE_0__.default.init();\r\n_modal__WEBPACK_IMPORTED_MODULE_1__.default.init();\r\n_table__WEBPACK_IMPORTED_MODULE_2__.default.init();\r\n\r\n/* if(module.hot){\r\n    module.hot.accept()\r\n}   */ \n\n//# sourceURL=webpack://PUPIAIS/./assets/js/index.js?");

/***/ }),

/***/ "./assets/js/modal.js":
/*!****************************!*\
  !*** ./assets/js/modal.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\nconst alertModalObj = {\r\n    init:() => {\r\n        //--------------------Variable Declaration------------------------\r\n        const btnLogout = document.querySelector(\".adminNav button\")\r\n        const btnDelete = document.querySelector(\".deleteSelected\");\r\n        const btnDeleteInline = document.querySelectorAll(\".btnDeleteInline\");\r\n        const modalBackground = document.querySelector(\".alertModalContainer\");\r\n        const modalLogout = document.querySelector(\".logoutAlert\");\r\n        const modalDelete = document.querySelector(\".deleteAlert\");\r\n        const modalBtnCancel = document.querySelectorAll(\".alertModal div button\");\r\n        //--------------------Event Listeners------------------------\r\n        btnLogout.addEventListener(\"click\", generateLogoutModal);\r\n        if(btnDelete != null){\r\n            btnDelete.addEventListener(\"click\", generateDeleteModal);\r\n            btnDeleteInline.forEach(element => element.addEventListener(\"click\", generateDeleteModal));\r\n        }\r\n        \r\n        //--------------------functions------------------------\r\n        modalBtnCancel.forEach(element => element.onclick = () => {\r\n            modalBackground.classList.remove(\"show\");\r\n            modalDelete.classList.remove(\"show\");\r\n            modalLogout.classList.remove(\"show\");\r\n        })\r\n        function generateDeleteModal(){\r\n            modalBackground.classList.add(\"show\");\r\n            modalDelete.classList.add(\"show\");\r\n        }\r\n        function generateLogoutModal(){\r\n            modalBackground.classList.add(\"show\");\r\n            modalLogout.classList.add(\"show\");\r\n        }\r\n    }\r\n}\r\n\r\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (alertModalObj);\n\n//# sourceURL=webpack://PUPIAIS/./assets/js/modal.js?");

/***/ }),

/***/ "./assets/js/nav.js":
/*!**************************!*\
  !*** ./assets/js/nav.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\nconst nav = {\r\n    init:() => {\r\n        let page = document.body.id;\r\n        switch(page){\r\n            case 'user':\r\n                //--------------------Variable Declaration------------------------\r\n                //userNav\r\n                const hamburgerIcon = document.querySelector(\".hamburgerIcon\");\r\n                const closeIcon = document.querySelector(\".closeIcon\");\r\n                const mobileNav = document.querySelector(\".mainNav\");\r\n                //--------------------Event Listeners------------------------\r\n                /*open mobile nav*/\r\n                hamburgerIcon.addEventListener(\"keydown\", enterHamburgerIcon);\r\n                hamburgerIcon.addEventListener(\"click\", openMobileNav);\r\n                /*close mobile nav*/\r\n                closeIcon.addEventListener(\"keydown\", enterCloseIcon);\r\n                closeIcon.addEventListener(\"click\", closeMobileNav);\r\n                console.log(\"AlloYapo\")\r\n                //--------------------functions------------------------\r\n                //mobileNav Functions\r\n                window.addEventListener(\"resize\", (event) => {\r\n                    if(window.innerWidth >= 1280){\r\n                        mobileNav.style.left = \"0\";\r\n                    }\r\n                    else{\r\n                        mobileNav.style.left = \"-100%\";\r\n                    }\r\n                });\r\n                function enterHamburgerIcon(event){\r\n                    if(event.key == \"Enter\"){\r\n                        console.log(event);\r\n                        openMobileNav();\r\n                    }\r\n                }\r\n                function openMobileNav(event){\r\n                    mobileNav.style.left = \"0\";\r\n                }\r\n                function enterCloseIcon(event){\r\n                    if(event.key == \"Enter\"){\r\n                        console.log(event);\r\n                        closeMobileNav();\r\n                    }\r\n                }\r\n                function closeMobileNav(event){\r\n                    mobileNav.style.left = \"-100%\";\r\n                }\r\n                break;\r\n            case 'admin':\r\n                //check if filterNav is on the page\r\n                let main = document.querySelector(\".main\");\r\n                if(main.childNodes[3].classList.contains(\"filterNav\")){\r\n                    const groupHeader = document.querySelectorAll(\".groupHeader\")\r\n                    groupHeader.forEach(element=>element.addEventListener(\"click\",()=>{\r\n                        let isActive = element.classList.contains(\"active\")\r\n                        if(isActive){\r\n                            element.classList.remove(\"active\")\r\n                        }\r\n                        else{\r\n                            groupHeader.forEach(boom=>boom.classList.remove(\"active\"))\r\n                            element.classList.add(\"active\")\r\n                        }\r\n                    }))\r\n                }\r\n                //--------------------Variable Declaration------------------------\r\n                //adminNav\r\n                const adminHamburger = document.querySelector(\".hamburgerAdmin\");\r\n                const sideNav = document.querySelector(\".adminNav\");\r\n                const mainCategory = document.querySelectorAll(\".mainCategory\");\r\n                \r\n                //--------------------Event Listeners------------------------\r\n                /* toggleSideNav */\r\n                adminHamburger.addEventListener(\"click\", toggleSideNav);\r\n                window.addEventListener(\"click\", closeSideNav);\r\n                //toggleNavCategories\r\n                mainCategory.forEach(element => element.addEventListener(\"keydown\", tabSelectMainCategory));\r\n                mainCategory.forEach(element => element.addEventListener(\"click\", selectMainCategory));\r\n                \r\n                 //--------------------functions------------------------\r\n                  //adminSideNav Functions\r\n                function toggleSideNav(){\r\n                    const isOpen = sideNav.classList.contains(\"navOpen\");\r\n                    if(isOpen){\r\n                        sideNav.classList.remove(\"navOpen\");\r\n                    }\r\n                    else{\r\n                        sideNav.classList.add(\"navOpen\");\r\n                    }\r\n                }\r\n                function closeSideNav(e){\r\n                    let targetElem = e.target;\r\n                    //click inside or the humburger\r\n                    do{\r\n                        if(targetElem == sideNav || targetElem == adminHamburger){\r\n                            return;\r\n                        }\r\n                        targetElem = targetElem.parentNode;\r\n                    } while(targetElem);\r\n                    //click outside\r\n                    sideNav.classList.remove(\"navOpen\");\r\n                }\r\n                //adminNav Functions\r\n                function openSubCategory(element){\r\n                    mainCategory.forEach(list => list.classList.remove(\"open\"));\r\n                    element.classList.add(\"open\");\r\n                }\r\n                function closeSubCategory(element){\r\n                    element.classList.remove(\"open\");\r\n                }\r\n                function selectMainCategory(e){\r\n                    let element;\r\n                    if(e.type == \"click\"){\r\n                        element = this;\r\n                    }\r\n                    else{\r\n                        element = e;\r\n                    }\r\n                    const isOpen = element.classList.contains(\"open\");\r\n\r\n                    if(isOpen){\r\n                        closeSubCategory(element);\r\n                        \r\n                    }\r\n                    else{\r\n                        openSubCategory(element);\r\n                    }\r\n                }\r\n\r\n                function tabSelectMainCategory(event){\r\n                    if(event.key == \"Enter\"){\r\n                        selectMainCategory(this);\r\n                    }\r\n                }\r\n                break;\r\n            default:\r\n                console.log(\"Allo\")\r\n        }\r\n    }\r\n}\r\n\r\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (nav);\n\n//# sourceURL=webpack://PUPIAIS/./assets/js/nav.js?");

/***/ }),

/***/ "./assets/js/table.js":
/*!****************************!*\
  !*** ./assets/js/table.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\nconst table = {\r\n    init:() => {\r\n        let page = document.body.id;\r\n        switch(page){\r\n            case 'user':\r\n                //--------------------Variable Declaration------------------------\r\n                \r\n                break;\r\n            case 'admin':\r\n                //--------------------Variable Declaration------------------------\r\n                //variables for inline option btn\r\n                const optionBtn = document.querySelectorAll(\".optionSpan\");\r\n                //variables for checkbox selection\r\n                const btnSelectAll = document.querySelector(\".selectAll\");\r\n                const btnDelete = document.querySelector(\".deleteSelected\");\r\n                /* const btnCancel = document.querySelector(\".alertModal button:first-child\");\r\n                const alertModal = document.querySelector('.alertModalContainer'); */\r\n                const checkbox = document.querySelectorAll('input[type=\"checkbox\"]');\r\n                //--------------------Event Listeners------------------------\r\n                //Listeners for inline option btn\r\n                optionBtn.forEach(element => element.addEventListener(\"click\", toggleOptions));\r\n                window.addEventListener(\"click\", closeOptionModal);\r\n                //Listeners for checkbox selection\r\n                if(btnSelectAll != null){\r\n                    btnSelectAll.addEventListener(\"click\", selectAll);\r\n                }\r\n                checkbox.forEach(element => element.addEventListener(\"click\", select));\r\n                //Listener for modal button\r\n                /* btnCancel.addEventListener(\"click\", removeAlertModal); */\r\n                /* btnDelete.addEventListener(\"click\", showDeleteAlert);\r\n                btnDeleteInline.forEach(element => element.addEventListener(\"click\", showDeleteAlert)); */\r\n                //--------------------functions------------------------\r\n                //functions for inline option btn\r\n                function toggleOptions(e){\r\n                    const isOpen = e.target.classList.contains(\"active\");\r\n                    if(isOpen){\r\n                        e.target.classList.remove(\"active\")\r\n                    }\r\n                    else{\r\n                        optionBtn.forEach(element => element.classList.remove(\"active\"));\r\n                        e.target.classList.add(\"active\")\r\n                    }\r\n                }\r\n                function closeOptionModal(e){\r\n                    let targetElem = e.target;\r\n                    //click inside\r\n                    if(targetElem.classList.contains(\"active\")){\r\n                        \r\n                    }\r\n                    else{\r\n                        optionBtn.forEach(element => element.classList.remove(\"active\"));\r\n                    }\r\n                }\r\n                //functions for checkbox selection\r\n                function select(){\r\n                    let count = 0;\r\n                    checkbox.forEach(element => {\r\n                        if(element.checked){\r\n                            count++;\r\n                            btnDelete.classList.add(\"visible\");\r\n                        }\r\n                        else if(count == 0){\r\n                            btnDelete.classList.remove(\"visible\");\r\n                        }\r\n                        });\r\n                    }\r\n                \r\n                function selectAll(){\r\n                    let count = 0;\r\n                    checkbox.forEach(element => {\r\n                        if(element.checked){\r\n                            count++;\r\n                            if(count == checkbox.length){\r\n                                checkbox.forEach(element => element.click());\r\n                                btnDelete.classList.remove(\"visible\")\r\n                            }\r\n                        }\r\n                        else{\r\n                            element.click()\r\n                            btnDelete.classList.add(\"visible\")\r\n                        }\r\n                    });\r\n                }\r\n\r\n                /* function showDeleteAlert(){\r\n                    alertModal.classList.add(\"show\");\r\n                }\r\n                \r\n                function removeAlertModal(){\r\n                    alertModal.classList.remove(\"show\");\r\n                } */\r\n                break;\r\n            default:\r\n                console.log(\"Default\")\r\n        }\r\n    }\r\n}\r\n\r\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (table);\n\n//# sourceURL=webpack://PUPIAIS/./assets/js/table.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./assets/js/index.js");
/******/ 	
/******/ })()
;