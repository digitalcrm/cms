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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/tinymce-custom.js":
/*!****************************************!*\
  !*** ./resources/js/tinymce-custom.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("tinymce.init({\n  selector: '#mytextarea',\n  branding: false,\n  height: 300,\n  menubar: false,\n  relative_urls: false,\n  plugins: [\"advlist autolink lists link image charmap print preview hr anchor pagebreak\", \"searchreplace wordcount visualblocks visualchars code fullscreen\", \"insertdatetime media nonbreaking save table contextmenu directionality\", \"emoticons template paste textcolor colorpicker textpattern\"],\n  toolbar: \"styleselect | bold italic | \" + \" alignleft aligncenter alignright alignjustify | \" + \"bullist numlist outdent indent | link | image | media | preview print fullpage\",\n  block_formats: 'Paragraph=p; Header 1=h1; Header 2=h2; Header 3=h3'\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvdGlueW1jZS1jdXN0b20uanM/OGY3ZSJdLCJuYW1lcyI6WyJ0aW55bWNlIiwiaW5pdCIsInNlbGVjdG9yIiwiYnJhbmRpbmciLCJoZWlnaHQiLCJtZW51YmFyIiwicmVsYXRpdmVfdXJscyIsInBsdWdpbnMiLCJ0b29sYmFyIiwiYmxvY2tfZm9ybWF0cyJdLCJtYXBwaW5ncyI6IkFBQUFBLE9BQU8sQ0FBQ0MsSUFBUixDQUFhO0FBQ1RDLFVBQVEsRUFBRSxhQUREO0FBRVRDLFVBQVEsRUFBRSxLQUZEO0FBR1RDLFFBQU0sRUFBRSxHQUhDO0FBSVRDLFNBQU8sRUFBRSxLQUpBO0FBS1RDLGVBQWEsRUFBRyxLQUxQO0FBTVRDLFNBQU8sRUFBRSxDQUNULDZFQURTLEVBRVQsa0VBRlMsRUFHVCx3RUFIUyxFQUlULDREQUpTLENBTkE7QUFZVEMsU0FBTyxFQUFFLGlDQUNELG1EQURDLEdBRUQsZ0ZBZEM7QUFlVEMsZUFBYSxFQUFFO0FBZk4sQ0FBYiIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy90aW55bWNlLWN1c3RvbS5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbInRpbnltY2UuaW5pdCh7XHJcbiAgICBzZWxlY3RvcjogJyNteXRleHRhcmVhJyxcclxuICAgIGJyYW5kaW5nOiBmYWxzZSxcclxuICAgIGhlaWdodDogMzAwLFxyXG4gICAgbWVudWJhcjogZmFsc2UsXHJcbiAgICByZWxhdGl2ZV91cmxzIDogZmFsc2UsXHJcbiAgICBwbHVnaW5zOiBbXHJcbiAgICBcImFkdmxpc3QgYXV0b2xpbmsgbGlzdHMgbGluayBpbWFnZSBjaGFybWFwIHByaW50IHByZXZpZXcgaHIgYW5jaG9yIHBhZ2VicmVha1wiLFxyXG4gICAgXCJzZWFyY2hyZXBsYWNlIHdvcmRjb3VudCB2aXN1YWxibG9ja3MgdmlzdWFsY2hhcnMgY29kZSBmdWxsc2NyZWVuXCIsXHJcbiAgICBcImluc2VydGRhdGV0aW1lIG1lZGlhIG5vbmJyZWFraW5nIHNhdmUgdGFibGUgY29udGV4dG1lbnUgZGlyZWN0aW9uYWxpdHlcIixcclxuICAgIFwiZW1vdGljb25zIHRlbXBsYXRlIHBhc3RlIHRleHRjb2xvciBjb2xvcnBpY2tlciB0ZXh0cGF0dGVyblwiXHJcbiAgICBdLFxyXG4gICAgdG9vbGJhcjogXCJzdHlsZXNlbGVjdCB8IGJvbGQgaXRhbGljIHwgXCIgK1xyXG4gICAgICAgICAgICBcIiBhbGlnbmxlZnQgYWxpZ25jZW50ZXIgYWxpZ25yaWdodCBhbGlnbmp1c3RpZnkgfCBcIiArXHJcbiAgICAgICAgICAgIFwiYnVsbGlzdCBudW1saXN0IG91dGRlbnQgaW5kZW50IHwgbGluayB8IGltYWdlIHwgbWVkaWEgfCBwcmV2aWV3IHByaW50IGZ1bGxwYWdlXCIsXHJcbiAgICBibG9ja19mb3JtYXRzOiAnUGFyYWdyYXBoPXA7IEhlYWRlciAxPWgxOyBIZWFkZXIgMj1oMjsgSGVhZGVyIDM9aDMnXHJcbn0pO1xyXG5cclxuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/tinymce-custom.js\n");

/***/ }),

/***/ 5:
/*!**********************************************!*\
  !*** multi ./resources/js/tinymce-custom.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\acl\resources\js\tinymce-custom.js */"./resources/js/tinymce-custom.js");


/***/ })

/******/ });