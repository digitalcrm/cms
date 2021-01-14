/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 10);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/cookie-content.js":
/*!****************************************!*\
  !*** ./resources/js/cookie-content.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var acceptCookie = document.getElementById('acceptModal');\nvar getCookieValueFromStorage = localStorage.getItem('cookieAccepted');\nconsole.log(getCookieValueFromStorage);\n\nfunction toggle() {\n  if (acceptCookie.click) {\n    localStorage.setItem('cookieAccepted', 1);\n  } else {\n    localStorage.setItem('cookieAccepted', 0);\n  }\n}\n\n$(document).ready(function () {\n  if (getCookieValueFromStorage == 0 || getCookieValueFromStorage == null) {\n    $('#cookieModal').modal('show');\n  }\n});\nacceptCookie.addEventListener('click', toggle);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY29va2llLWNvbnRlbnQuanM/MDZmMyJdLCJuYW1lcyI6WyJhY2NlcHRDb29raWUiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwiZ2V0Q29va2llVmFsdWVGcm9tU3RvcmFnZSIsImxvY2FsU3RvcmFnZSIsImdldEl0ZW0iLCJjb25zb2xlIiwibG9nIiwidG9nZ2xlIiwiY2xpY2siLCJzZXRJdGVtIiwiJCIsInJlYWR5IiwibW9kYWwiLCJhZGRFdmVudExpc3RlbmVyIl0sIm1hcHBpbmdzIjoiQUFBQSxJQUFJQSxZQUFZLEdBQUdDLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixhQUF4QixDQUFuQjtBQUVBLElBQU1DLHlCQUF5QixHQUFHQyxZQUFZLENBQUNDLE9BQWIsQ0FBcUIsZ0JBQXJCLENBQWxDO0FBRUFDLE9BQU8sQ0FBQ0MsR0FBUixDQUFZSix5QkFBWjs7QUFFQSxTQUFTSyxNQUFULEdBQWtCO0FBQ2QsTUFBR1IsWUFBWSxDQUFDUyxLQUFoQixFQUF1QjtBQUNuQkwsZ0JBQVksQ0FBQ00sT0FBYixDQUFxQixnQkFBckIsRUFBdUMsQ0FBdkM7QUFDSCxHQUZELE1BRU87QUFDSE4sZ0JBQVksQ0FBQ00sT0FBYixDQUFxQixnQkFBckIsRUFBdUMsQ0FBdkM7QUFDSDtBQUNKOztBQUVEQyxDQUFDLENBQUNWLFFBQUQsQ0FBRCxDQUFZVyxLQUFaLENBQWtCLFlBQVc7QUFDekIsTUFBSVQseUJBQXlCLElBQUksQ0FBN0IsSUFBa0NBLHlCQUF5QixJQUFJLElBQW5FLEVBQXlFO0FBQ3JFUSxLQUFDLENBQUMsY0FBRCxDQUFELENBQWtCRSxLQUFsQixDQUF3QixNQUF4QjtBQUNIO0FBQ0osQ0FKRDtBQU1BYixZQUFZLENBQUNjLGdCQUFiLENBQThCLE9BQTlCLEVBQXVDTixNQUF2QyIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9jb29raWUtY29udGVudC5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbImxldCBhY2NlcHRDb29raWUgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnYWNjZXB0TW9kYWwnKTtcclxuXHJcbmNvbnN0IGdldENvb2tpZVZhbHVlRnJvbVN0b3JhZ2UgPSBsb2NhbFN0b3JhZ2UuZ2V0SXRlbSgnY29va2llQWNjZXB0ZWQnKTtcclxuXHJcbmNvbnNvbGUubG9nKGdldENvb2tpZVZhbHVlRnJvbVN0b3JhZ2UpO1xyXG5cclxuZnVuY3Rpb24gdG9nZ2xlKCkge1xyXG4gICAgaWYoYWNjZXB0Q29va2llLmNsaWNrKSB7XHJcbiAgICAgICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oJ2Nvb2tpZUFjY2VwdGVkJywgMSk7XHJcbiAgICB9IGVsc2Uge1xyXG4gICAgICAgIGxvY2FsU3RvcmFnZS5zZXRJdGVtKCdjb29raWVBY2NlcHRlZCcsIDApO1xyXG4gICAgfVxyXG59XHJcblxyXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcclxuICAgIGlmIChnZXRDb29raWVWYWx1ZUZyb21TdG9yYWdlID09IDAgfHwgZ2V0Q29va2llVmFsdWVGcm9tU3RvcmFnZSA9PSBudWxsKSB7XHJcbiAgICAgICAgJCgnI2Nvb2tpZU1vZGFsJykubW9kYWwoJ3Nob3cnKTtcclxuICAgIH1cclxufSk7XHJcblxyXG5hY2NlcHRDb29raWUuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCB0b2dnbGUpOyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/cookie-content.js\n");

/***/ }),

/***/ 10:
/*!**********************************************!*\
  !*** multi ./resources/js/cookie-content.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\acl\resources\js\cookie-content.js */"./resources/js/cookie-content.js");


/***/ })

/******/ });