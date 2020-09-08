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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/status_toggle.js":
/*!***************************************!*\
  !*** ./resources/js/status_toggle.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(function () {\n  $('.toggle-class').change(function () {\n    var userStatus = $(this).prop('checked') == true ? 1 : 0;\n    var userId = $(this).data('id'); //    console.log(userStatus);\n\n    $.ajax({\n      type: \"GET\",\n      dataType: \"json\",\n      url: '/userStatus',\n      data: {\n        'userStatus': userStatus,\n        'userId': userId\n      },\n      success: function success(data) {\n        // console.log(data.success)\n        //success message toaster\n        var Toast = Swal.mixin({\n          toast: true,\n          position: 'top-end',\n          showConfirmButton: false,\n          timer: 5000,\n          timerProgressBar: true,\n          onOpen: function onOpen(toast) {\n            toast.addEventListener('mouseenter', Swal.stopTimer);\n            toast.addEventListener('mouseleave', Swal.resumeTimer);\n          }\n        });\n        Toast.fire({\n          icon: 'success',\n          title: data.success\n        });\n      }\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc3RhdHVzX3RvZ2dsZS5qcz9lZWE5Il0sIm5hbWVzIjpbIiQiLCJjaGFuZ2UiLCJ1c2VyU3RhdHVzIiwicHJvcCIsInVzZXJJZCIsImRhdGEiLCJhamF4IiwidHlwZSIsImRhdGFUeXBlIiwidXJsIiwic3VjY2VzcyIsIlRvYXN0IiwiU3dhbCIsIm1peGluIiwidG9hc3QiLCJwb3NpdGlvbiIsInNob3dDb25maXJtQnV0dG9uIiwidGltZXIiLCJ0aW1lclByb2dyZXNzQmFyIiwib25PcGVuIiwiYWRkRXZlbnRMaXN0ZW5lciIsInN0b3BUaW1lciIsInJlc3VtZVRpbWVyIiwiZmlyZSIsImljb24iLCJ0aXRsZSJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQyxZQUFXO0FBQ1RBLEdBQUMsQ0FBQyxlQUFELENBQUQsQ0FBbUJDLE1BQW5CLENBQTBCLFlBQVc7QUFDakMsUUFBSUMsVUFBVSxHQUFHRixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFHLElBQVIsQ0FBYSxTQUFiLEtBQTJCLElBQTNCLEdBQWtDLENBQWxDLEdBQXNDLENBQXZEO0FBQ0EsUUFBSUMsTUFBTSxHQUFHSixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFLLElBQVIsQ0FBYSxJQUFiLENBQWIsQ0FGaUMsQ0FHakM7O0FBQ0FMLEtBQUMsQ0FBQ00sSUFBRixDQUFPO0FBQ0hDLFVBQUksRUFBRSxLQURIO0FBRUhDLGNBQVEsRUFBRSxNQUZQO0FBR0hDLFNBQUcsRUFBRSxhQUhGO0FBSUhKLFVBQUksRUFBRTtBQUFDLHNCQUFjSCxVQUFmO0FBQTJCLGtCQUFVRTtBQUFyQyxPQUpIO0FBS0hNLGFBQU8sRUFBRSxpQkFBU0wsSUFBVCxFQUFjO0FBQ25CO0FBQ0E7QUFDQSxZQUFNTSxLQUFLLEdBQUdDLElBQUksQ0FBQ0MsS0FBTCxDQUFXO0FBQ3JCQyxlQUFLLEVBQUUsSUFEYztBQUVyQkMsa0JBQVEsRUFBRSxTQUZXO0FBR3JCQywyQkFBaUIsRUFBRSxLQUhFO0FBSXJCQyxlQUFLLEVBQUUsSUFKYztBQUtyQkMsMEJBQWdCLEVBQUUsSUFMRztBQU1yQkMsZ0JBQU0sRUFBRSxnQkFBQ0wsS0FBRCxFQUFXO0FBQ2ZBLGlCQUFLLENBQUNNLGdCQUFOLENBQXVCLFlBQXZCLEVBQXFDUixJQUFJLENBQUNTLFNBQTFDO0FBQ0FQLGlCQUFLLENBQUNNLGdCQUFOLENBQXVCLFlBQXZCLEVBQXFDUixJQUFJLENBQUNVLFdBQTFDO0FBQ0g7QUFUb0IsU0FBWCxDQUFkO0FBV0FYLGFBQUssQ0FBQ1ksSUFBTixDQUFXO0FBQ1BDLGNBQUksRUFBRSxTQURDO0FBRVBDLGVBQUssRUFBRXBCLElBQUksQ0FBQ0s7QUFGTCxTQUFYO0FBSUg7QUF2QkUsS0FBUDtBQXlCSCxHQTdCRDtBQThCSCxDQS9CQSxDQUFEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3N0YXR1c190b2dnbGUuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIkKGZ1bmN0aW9uKCkge1xuICAgICQoJy50b2dnbGUtY2xhc3MnKS5jaGFuZ2UoZnVuY3Rpb24oKSB7XG4gICAgICAgIHZhciB1c2VyU3RhdHVzID0gJCh0aGlzKS5wcm9wKCdjaGVja2VkJykgPT0gdHJ1ZSA/IDEgOiAwO1xuICAgICAgICB2YXIgdXNlcklkID0gJCh0aGlzKS5kYXRhKCdpZCcpO1xuICAgICAgICAvLyAgICBjb25zb2xlLmxvZyh1c2VyU3RhdHVzKTtcbiAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgIHR5cGU6IFwiR0VUXCIsXG4gICAgICAgICAgICBkYXRhVHlwZTogXCJqc29uXCIsXG4gICAgICAgICAgICB1cmw6ICcvdXNlclN0YXR1cycsXG4gICAgICAgICAgICBkYXRhOiB7J3VzZXJTdGF0dXMnOiB1c2VyU3RhdHVzLCAndXNlcklkJzogdXNlcklkfSxcbiAgICAgICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uKGRhdGEpe1xuICAgICAgICAgICAgICAgIC8vIGNvbnNvbGUubG9nKGRhdGEuc3VjY2VzcylcbiAgICAgICAgICAgICAgICAvL3N1Y2Nlc3MgbWVzc2FnZSB0b2FzdGVyXG4gICAgICAgICAgICAgICAgY29uc3QgVG9hc3QgPSBTd2FsLm1peGluKHtcbiAgICAgICAgICAgICAgICAgICAgdG9hc3Q6IHRydWUsXG4gICAgICAgICAgICAgICAgICAgIHBvc2l0aW9uOiAndG9wLWVuZCcsXG4gICAgICAgICAgICAgICAgICAgIHNob3dDb25maXJtQnV0dG9uOiBmYWxzZSxcbiAgICAgICAgICAgICAgICAgICAgdGltZXI6IDUwMDAsXG4gICAgICAgICAgICAgICAgICAgIHRpbWVyUHJvZ3Jlc3NCYXI6IHRydWUsXG4gICAgICAgICAgICAgICAgICAgIG9uT3BlbjogKHRvYXN0KSA9PiB7XG4gICAgICAgICAgICAgICAgICAgICAgICB0b2FzdC5hZGRFdmVudExpc3RlbmVyKCdtb3VzZWVudGVyJywgU3dhbC5zdG9wVGltZXIpXG4gICAgICAgICAgICAgICAgICAgICAgICB0b2FzdC5hZGRFdmVudExpc3RlbmVyKCdtb3VzZWxlYXZlJywgU3dhbC5yZXN1bWVUaW1lcilcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgIFRvYXN0LmZpcmUoe1xuICAgICAgICAgICAgICAgICAgICBpY29uOiAnc3VjY2VzcycsXG4gICAgICAgICAgICAgICAgICAgIHRpdGxlOiBkYXRhLnN1Y2Nlc3NcbiAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICB9KVxufSlcbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/status_toggle.js\n");

/***/ }),

/***/ 1:
/*!*********************************************!*\
  !*** multi ./resources/js/status_toggle.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\acl\resources\js\status_toggle.js */"./resources/js/status_toggle.js");


/***/ })

/******/ });