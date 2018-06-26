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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 12);
/******/ })
/************************************************************************/
/******/ ({

/***/ 12:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(13);


/***/ }),

/***/ 13:
/***/ (function(module, exports) {

// COMMENT FORM
$(function () {
    $(document).on('click', '.comment-add-link', function (event) {

        event.preventDefault();

        var data_user_name = $(this).data('user-name');
        var this_parent = $(this).parent();

        $('.comment-form').hide({
            duration: 0,
            easing: "linear",
            complete: function complete() {
                $(this).remove();
            }
        });

        //$(this).fadeOut(0);

        this_parent.find('.append-form').append('' + '<form class="comment-form">' + '<div class="comment-editor rounded"></div>' + '<button type="submit" class="send-comment btn btn-primary pull-right">' + ' Ответить' + '</button>' + '</form>');

        $('.comment-editor').wysiwyg();
        this_parent.find('.comment-form').show({
            duration: 0,
            easing: "linear"
        });
        //$('.comment-add-link').not(this).fadeIn(0);


        this_parent.find('.comment-editor').append('' +
        //'<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-down-right"><polyline points="15 10 20 15 15 20"></polyline><path d="M4 4v7a4 4 0 0 0 4 4h12"></path></svg>' +
        '<a href="#' + data_user_name + '" class="font-weight-bold">' + data_user_name + '</a>,&nbsp; ');
    });
});

// SEND COMMENT FORM
$(function () {
    $(document).on('click', '.comment-form__submit', function (event) {

        event.preventDefault();

        var data_link = $(this).parent().parent().parent().find('.comment-add-link');

        var data = {
            'item_id': data_link.data('item-id'),
            'content_id': data_link.data('content-id'),
            'content-type': data_link.data('content-type'),
            'content': data_link.parent().find('.comment-editor').html()
        };
        console.log(data);
        $.ajax({
            url: '/add_comment',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            data: data,
            success: function success(data) {
                console.log(data);
            },
            complete: function complete() {
                console.log(data);
            }
        });
    });
});

// var data = {
//     'item_id'       : $(this).data('user-name'),
//     'content-type'  : $(this).data('content-type'),
//     'content'       : $(this).parent().find('.form').text()
// }

// $.ajax({
//     url: '/add_comment',
//     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//     type: 'POST',
//     data: data,
//     success: function (data) {
//         console.log(data);
//     },
//     complete: function () {
//         console.log(data);
//     }
// });


// reply_link.after(reply_form);
//
// if($('.append_form') )
// var no_parent = $('.append_form').not(this);
// $('.append_form').show('400');
// $(function () {
//     $('#comment-editor').wysiwyg();
// });
// if(no_parent== show())
// no_parent.hide();

// // DATA
// var data_url        = $(this).data('url');
// var data_name       = $(this).data('name');
// var data_content    = $(this).data('content');
// var modal_size      = $(this).data('modal-size');
//
// if(modal_size) modal_window.find(modal_container).addClass(modal_size);
//
// modal_window.find(modal_container).append(
//     '<div class="modal-content">' +
//     '<div class="modal-header">' +
//     '<h6 class="modal-title">' + data_name + '</h6>' +
//     '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
//     '<span aria-hidden="true">&times;</span>' +
//     '</button>' +
//     '</div>' +
//     '<div class="modal-body">' +
//     '</div>' +
//     '</div>');
//
// $.ajax({
//     url: data_url,
//     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//     type: 'POST',
//     success: function (data) {
//         modal_window.find(modal_content).append(data.html);
//     },
//     complete: function () {
//         modal_window.modal('show');
//     }
// });
//
// if(data_content) {
//     modal_window.find(modal_content).append(data_content);
// }
//
// // CLEAR MODAL CONTENT
// modal_window.on('hidden.bs.modal', function () {
//     $(this).find(modal_container).children().remove();
//     if(modal_size) modal_window.find(modal_container).removeClass(modal_size);
// });

/***/ })

/******/ });