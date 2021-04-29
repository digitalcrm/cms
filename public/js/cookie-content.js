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

eval("var acceptCookie = document.getElementById('acceptModal');\nvar getCookieValueFromStorage = localStorage.getItem('cookieAccepted'); // console.log(getCookieValueFromStorage);\n\nfunction toggle() {\n  if (acceptCookie.click) {\n    localStorage.setItem('cookieAccepted', 1);\n  } else {\n    localStorage.setItem('cookieAccepted', 0);\n  }\n}\n\n$(document).ready(function () {\n  if (getCookieValueFromStorage == 0 || getCookieValueFromStorage == null) {\n    $('#cookieModal').modal('show');\n  }\n});\nacceptCookie.addEventListener('click', toggle);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY29va2llLWNvbnRlbnQuanM/MDZmMyJdLCJuYW1lcyI6WyJhY2NlcHRDb29raWUiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwiZ2V0Q29va2llVmFsdWVGcm9tU3RvcmFnZSIsImxvY2FsU3RvcmFnZSIsImdldEl0ZW0iLCJ0b2dnbGUiLCJjbGljayIsInNldEl0ZW0iLCIkIiwicmVhZHkiLCJtb2RhbCIsImFkZEV2ZW50TGlzdGVuZXIiXSwibWFwcGluZ3MiOiJBQUFBLElBQUlBLFlBQVksR0FBR0MsUUFBUSxDQUFDQyxjQUFULENBQXdCLGFBQXhCLENBQW5CO0FBRUEsSUFBTUMseUJBQXlCLEdBQUdDLFlBQVksQ0FBQ0MsT0FBYixDQUFxQixnQkFBckIsQ0FBbEMsQyxDQUVBOztBQUVBLFNBQVNDLE1BQVQsR0FBa0I7QUFDZCxNQUFHTixZQUFZLENBQUNPLEtBQWhCLEVBQXVCO0FBQ25CSCxnQkFBWSxDQUFDSSxPQUFiLENBQXFCLGdCQUFyQixFQUF1QyxDQUF2QztBQUNILEdBRkQsTUFFTztBQUNISixnQkFBWSxDQUFDSSxPQUFiLENBQXFCLGdCQUFyQixFQUF1QyxDQUF2QztBQUNIO0FBQ0o7O0FBRURDLENBQUMsQ0FBQ1IsUUFBRCxDQUFELENBQVlTLEtBQVosQ0FBa0IsWUFBVztBQUN6QixNQUFJUCx5QkFBeUIsSUFBSSxDQUE3QixJQUFrQ0EseUJBQXlCLElBQUksSUFBbkUsRUFBeUU7QUFDckVNLEtBQUMsQ0FBQyxjQUFELENBQUQsQ0FBa0JFLEtBQWxCLENBQXdCLE1BQXhCO0FBQ0g7QUFDSixDQUpEO0FBTUFYLFlBQVksQ0FBQ1ksZ0JBQWIsQ0FBOEIsT0FBOUIsRUFBdUNOLE1BQXZDIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2Nvb2tpZS1jb250ZW50LmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsibGV0IGFjY2VwdENvb2tpZSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdhY2NlcHRNb2RhbCcpO1xyXG5cclxuY29uc3QgZ2V0Q29va2llVmFsdWVGcm9tU3RvcmFnZSA9IGxvY2FsU3RvcmFnZS5nZXRJdGVtKCdjb29raWVBY2NlcHRlZCcpO1xyXG5cclxuLy8gY29uc29sZS5sb2coZ2V0Q29va2llVmFsdWVGcm9tU3RvcmFnZSk7XHJcblxyXG5mdW5jdGlvbiB0b2dnbGUoKSB7XHJcbiAgICBpZihhY2NlcHRDb29raWUuY2xpY2spIHtcclxuICAgICAgICBsb2NhbFN0b3JhZ2Uuc2V0SXRlbSgnY29va2llQWNjZXB0ZWQnLCAxKTtcclxuICAgIH0gZWxzZSB7XHJcbiAgICAgICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oJ2Nvb2tpZUFjY2VwdGVkJywgMCk7XHJcbiAgICB9XHJcbn1cclxuXHJcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xyXG4gICAgaWYgKGdldENvb2tpZVZhbHVlRnJvbVN0b3JhZ2UgPT0gMCB8fCBnZXRDb29raWVWYWx1ZUZyb21TdG9yYWdlID09IG51bGwpIHtcclxuICAgICAgICAkKCcjY29va2llTW9kYWwnKS5tb2RhbCgnc2hvdycpO1xyXG4gICAgfVxyXG59KTtcclxuXHJcbmFjY2VwdENvb2tpZS5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIHRvZ2dsZSk7Il0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/cookie-content.js\n");

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