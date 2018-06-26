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
/******/ 	return __webpack_require__(__webpack_require__.s = 16);
/******/ })
/************************************************************************/
/******/ ({

/***/ 16:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(17);


/***/ }),

/***/ 17:
/***/ (function(module, exports) {

/* http://github.com/mindmup/bootstrap-wysiwyg */
/*global jQuery, $, FileReader*/
/*jslint browser:true*/
(function ($) {
    'use strict';

    // var readFileIntoDataUrl = function (fileInfo) {
    //     var loader = $.Deferred(),
    //         fReader = new FileReader();
    //     fReader.onload = function (e) {
    //         loader.resolve(e.target.result);
    //     };
    //     fReader.onerror = loader.reject;
    //     fReader.onprogress = loader.notify;
    //     fReader.readAsDataURL(fileInfo);
    //     return loader.promise();
    // };

    $.fn.cleanHtml = function () {
        var html = $(this)[0].innerHTML;

        return html
        //.replace(/<(\b(?!(a|img|b|i|ul|ol|li))[^>\s]*)(.*?)(\s*\/?>)/g, '<p>')
        //.replace(/<(\/)(\b(?!(\/a|\/img|\/b|\/i|\/ul|\/ol|\/li))[^>\s]*)(.*?)(\s*\/?>)/g, '</p>')
        .replace(/<(use|svg)(\b(?!!)[^>\s]*)(.*?)(\s*\/?>)/g, '').replace(/<(\/use|\/svg)(\b(?!!)[^>\s]*)(.*?)(\s*\/?>)/g, '').replace(/<p>[\s]*<\/p>/g, '').replace(/\u00A0/g, '');
    };
    $.fn.wysiwyg = function (userOptions) {
        var editor = this,
            selectedRange,
            options,
            toolbarBtnSelector,
            updateToolbar = function updateToolbar() {
            if (options.activeToolbarClass) {
                $(options.toolbarSelector).find(toolbarBtnSelector).each(function () {
                    var command = $(this).data(options.commandRole);
                    if (document.queryCommandState(command)) {
                        $(this).addClass(options.activeToolbarClass);
                    } else {
                        $(this).removeClass(options.activeToolbarClass);
                    }
                });
            }
        },
            execCommand = function execCommand(commandWithArgs, valueArg) {
            var commandArr = commandWithArgs.split(' '),
                command = commandArr.shift(),
                args = commandArr.join(' ') + (valueArg || '');
            document.execCommand(command, 0, args);
            updateToolbar();
        },
            bindHotkeys = function bindHotkeys(hotKeys) {
            $.each(hotKeys, function (hotkey, command) {
                editor.keydown(hotkey, function (e) {
                    if (editor.attr('contenteditable') && editor.is(':visible')) {
                        e.preventDefault();
                        e.stopPropagation();
                        execCommand(command);
                    }
                }).keyup(hotkey, function (e) {
                    if (editor.attr('contenteditable') && editor.is(':visible')) {
                        e.preventDefault();
                        e.stopPropagation();
                    }
                });
            });
        },
            getCurrentRange = function getCurrentRange() {
            var sel = window.getSelection();
            if (sel.getRangeAt && sel.rangeCount) {
                return sel.getRangeAt(0);
            }
        },
            saveSelection = function saveSelection() {
            selectedRange = getCurrentRange();
        },
            restoreSelection = function restoreSelection() {
            var selection = window.getSelection();
            if (selectedRange) {
                try {
                    selection.removeAllRanges();
                } catch (ex) {
                    document.body.createTextRange().select();
                    document.selection.empty();
                }

                selection.addRange(selectedRange);
            }
        },
            insertFiles = function insertFiles(files) {
            editor.focus();
            var data = new FormData();
            data.append("file", files[0]);
            $.ajax({
                data: data,
                type: "POST",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: '/upload',
                cache: false,
                contentType: false,
                processData: false,
                success: function success(url) {
                    editor.focus();
                    execCommand('insertImage', url);
                }
            });

            // $.each(files, function (idx, fileInfo) {
            //     if (/^image\//.test(fileInfo.type)) {
            //         $.when(readFileIntoDataUrl(fileInfo)).done(function (dataUrl) {
            //             execCommand('insertImage', dataUrl);
            //         }).fail(function (e) {
            //             options.fileUploadError("file-reader", e);
            //         });
            //     } else {
            //         options.fileUploadError("unsupported-file-type", fileInfo.type);
            //     }
            // });
        },
            markSelection = function markSelection(input, color) {
            restoreSelection();
            if (document.queryCommandSupported('hiliteColor')) {
                document.execCommand('hiliteColor', 0, color || 'transparent');
            }
            saveSelection();
            input.data(options.selectionMarker, color);
        },
            bindToolbar = function bindToolbar(toolbar, options) {
            toolbar.find(toolbarBtnSelector).click(function () {
                restoreSelection();
                editor.focus();
                execCommand($(this).data(options.commandRole));
                saveSelection();
            });
            toolbar.find('[data-toggle=dropdown]').click(restoreSelection);

            toolbar.find('input[type=text][data-' + options.commandRole + ']').on('webkitspeechchange change', function () {
                var newValue = this.value; /* ugly but prevents fake double-calls due to selection restoration */
                this.value = '';
                restoreSelection();
                if (newValue) {
                    editor.focus();
                    execCommand($(this).data(options.commandRole), newValue);
                }
                saveSelection();
            }).on('focus', function () {
                var input = $(this);
                if (!input.data(options.selectionMarker)) {
                    markSelection(input, options.selectionColor);
                    input.focus();
                }
            }).on('blur', function () {
                var input = $(this);
                if (input.data(options.selectionMarker)) {
                    markSelection(input, false);
                }
            });
            toolbar.find('input[type=file][data-' + options.commandRole + ']').change(function () {
                restoreSelection();
                if (this.type === 'file' && this.files && this.files.length > 0) {
                    insertFiles(this.files);
                }
                saveSelection();
                this.value = '';
            });
        },
            initFileDrops = function initFileDrops() {
            editor.on('dragenter dragover', false).on('drop', function (e) {
                var dataTransfer = e.originalEvent.dataTransfer;
                e.stopPropagation();
                e.preventDefault();
                if (dataTransfer && dataTransfer.files && dataTransfer.files.length > 0) {
                    insertFiles(dataTransfer.files);
                }
            });
        };
        options = $.extend({}, $.fn.wysiwyg.defaults, userOptions);
        toolbarBtnSelector = 'a[data-' + options.commandRole + '],button[data-' + options.commandRole + '],input[type=button][data-' + options.commandRole + ']';
        bindHotkeys(options.hotKeys);
        if (options.dragAndDropImages) {
            initFileDrops();
        }
        bindToolbar($(options.toolbarSelector), options);
        editor.attr('contenteditable', true).on('mouseup keyup mouseout', function () {
            saveSelection();
            updateToolbar();
        });
        $(window).bind('touchend', function (e) {
            var isInside = editor.is(e.target) || editor.has(e.target).length > 0,
                currentRange = getCurrentRange(),
                clear = currentRange && currentRange.startContainer === currentRange.endContainer && currentRange.startOffset === currentRange.endOffset;
            if (!clear || isInside) {
                saveSelection();
                updateToolbar();
            }
        });
        return this;
    };
    $.fn.wysiwyg.defaults = {
        hotKeys: {
            'ctrl+b meta+b': 'bold',
            'ctrl+i meta+i': 'italic',
            'ctrl+u meta+u': 'underline'
            //'ctrl+z meta+z': 'undo',
            //'ctrl+y meta+y meta+shift+z': 'redo',
            //'ctrl+l meta+l': 'justifyleft',
            //'ctrl+r meta+r': 'justifyright',
            //'ctrl+e meta+e': 'justifycenter',
            //'ctrl+j meta+j': 'justifyfull',
            //'shift+tab': 'outdent',
            //'tab': 'indent'
        },
        toolbarSelector: '[data-role=editor-toolbar]',
        commandRole: 'edit',
        activeToolbarClass: 'btn-info',
        selectionMarker: 'edit-focus-marker',
        selectionColor: 'darkgrey',
        dragAndDropImages: true
        //fileUploadError: function (reason, detail) { console.log("File upload error", reason, detail); },
    };
})(window.jQuery);

/***/ })

/******/ });