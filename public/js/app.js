(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/app"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/CommentComponent.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/CommentComponent.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['data'],
  data: function data() {
    return {
      editing: false,
      id: this.data.id,
      body: this.data.body
    };
  },
  computed: {
    ago: function ago() {
      return moment__WEBPACK_IMPORTED_MODULE_0___default()(this.data.created_at).fromNow() + '...';
    },
    signedIn: function signedIn() {
      return window.App.signedIn;
    },
    canUpdate: function canUpdate() {
      var _this = this;

      return this.authorize(function (user) {
        return _this.data.user_id == user.id;
      });
    }
  },
  methods: {
    update: function update() {
      axios.patch('/comments/' + this.data.id, {
        body: this.body
      });
      this.editing = false;
    },
    deleteComment: function deleteComment() {
      axios.delete('/comments/' + this.id);
      this.$emit('deleted', this.id);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/CommentsComponent.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/CommentsComponent.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CommentComponent_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CommentComponent.vue */ "./resources/assets/js/components/CommentComponent.vue");
/* harmony import */ var _NewComment_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./NewComment.vue */ "./resources/assets/js/components/NewComment.vue");
/* harmony import */ var _mixins_collection_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../mixins/collection.js */ "./resources/assets/js/mixins/collection.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    comment: _CommentComponent_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
    addComment: _NewComment_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  mixins: [_mixins_collection_js__WEBPACK_IMPORTED_MODULE_2__["default"]],
  data: function data() {
    return {
      dataSet: false
    };
  },
  created: function created() {
    this.fetch();
  },
  methods: {
    fetch: function fetch(page) {
      axios.get(this.url(page)).then(this.refresh);
    },
    url: function url() {
      var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;

      if (!page) {
        var query = location.search.match(/page=(\d+)/);
        page = query ? query[1] : 1;
      }

      return "".concat(location.pathname, "/comments?page=").concat(page);
    },
    refresh: function refresh(_ref) {
      var data = _ref.data;
      this.dataSet = data;
      this.items = data.data;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Countdown.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Countdown.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    until: String
  },
  data: function data() {
    return {
      now: new Date()
    };
  },
  created: function created() {
    var interval = this.refreshEverySecond();
    this.$on('finished', function () {
      return clearInterval(interval);
    });
  },
  computed: {
    finished: function finished() {
      return this.remaining.total <= 0;
    },
    remaining: function remaining() {
      var remaining = moment__WEBPACK_IMPORTED_MODULE_0___default.a.duration(Date.parse(this.until) - this.now);

      if (remaining <= 0) {
        this.$emit('finished');
      }

      return {
        total: remaining,
        days: remaining.days(),
        hours: remaining.hours(),
        minutes: remaining.minutes(),
        seconds: remaining.seconds()
      };
    }
  },
  methods: {
    refreshEverySecond: function refreshEverySecond() {
      var _this = this;

      return setInterval(function () {
        _this.now = new Date();
      }, 1000);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/DatePicker.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/DatePicker.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var pikaday__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! pikaday */ "./node_modules/pikaday/pikaday.js");
/* harmony import */ var pikaday__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(pikaday__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    label: {
      required: true
    },
    value: {
      required: true
    },
    format: {
      default: 'YYYY-MM-DD'
    }
  },
  mounted: function mounted() {
    var _this = this;

    var picker = new pikaday__WEBPACK_IMPORTED_MODULE_0___default.a({
      field: this.$refs.input,
      format: this.format,
      onSelect: function onSelect() {
        _this.$emit('input', picker.toString());
      }
    });
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Event.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Event.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['data'],
  data: function data() {
    return {
      editing: false,
      id: this.data.id,
      body: this.data.body,
      comment: this.data
    };
  },
  computed: {
    ago: function ago() {
      return moment__WEBPACK_IMPORTED_MODULE_0___default()(this.data.created_at).fromNow() + '...';
    }
  },
  methods: {
    update: function update() {
      axios__WEBPACK_IMPORTED_MODULE_1___default.a.patch('/f/comment/' + this.data.id, {
        body: this.body
      });
      this.editing = false;
    },
    deleteComment: function deleteComment() {
      axios__WEBPACK_IMPORTED_MODULE_1___default.a.delete('/f/comment/' + this.id);
      this.$emit('deleted', this.id);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Events.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Events.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Event_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Event.vue */ "./resources/assets/js/components/Event.vue");
/* harmony import */ var _NewComment_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./NewComment.vue */ "./resources/assets/js/components/NewComment.vue");
/* harmony import */ var _mixins_collection_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../mixins/collection.js */ "./resources/assets/js/mixins/collection.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_3__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    event: _Event_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
    addComment: _NewComment_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  mixins: [_mixins_collection_js__WEBPACK_IMPORTED_MODULE_2__["default"]],
  data: function data() {
    return {
      dataSet: false
    };
  },
  created: function created() {
    this.fetch();
  },
  methods: {
    fetch: function fetch(page) {
      axios__WEBPACK_IMPORTED_MODULE_3___default.a.get(this.url(page)).then(this.refresh);
    },
    url: function url() {
      var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;

      if (!page) {
        var query = location.search.match(/page=(\d+)/);
        page = query ? query[1] : 1;
      }

      return "".concat(location.pathname, "/comments?page=").concat(page);
    },
    refresh: function refresh(_ref) {
      var data = _ref.data;
      this.dataSet = data;
      this.items = data.data;
      window.scrollTo(0, 0);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Frontend/Documents/index.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Frontend/Documents/index.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _Paginator__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../Paginator */ "./resources/assets/js/components/Paginator.vue");
/* harmony import */ var izitoast_dist_css_iziToast_min_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! izitoast/dist/css/iziToast.min.css */ "./node_modules/izitoast/dist/css/iziToast.min.css");
/* harmony import */ var izitoast_dist_css_iziToast_min_css__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(izitoast_dist_css_iziToast_min_css__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var vue_notifications__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vue-notifications */ "./node_modules/vue-notifications/dist/vue-notifications.es5.js");
/* harmony import */ var vue_notifications__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(vue_notifications__WEBPACK_IMPORTED_MODULE_4__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//





/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['action'],
  components: {
    paginator: _Paginator__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        name: '',
        description: '',
        document: null
      }),
      dataSet: '',
      items: [],
      showUploadForm: false
    };
  },
  notifications: {
    showSuccessMsg: {
      type: vue_notifications__WEBPACK_IMPORTED_MODULE_4___default.a.types.success,
      title: 'Success',
      message: 'That\'s the success!'
    },
    showErrorMsg: {
      type: vue_notifications__WEBPACK_IMPORTED_MODULE_4___default.a.types.error,
      title: 'Whoops!',
      message: 'Something went wrong.'
    }
  },
  mounted: function mounted() {
    this.fetch();
  },
  methods: {
    handleFileUpload: function handleFileUpload(event) {
      this.form.document = event.target.files[0];
    },
    onSubmit: function onSubmit() {
      var _this = this;

      this.form.post(this.action).then(function (response) {
        _this.showSuccessMsg({
          message: response.message
        });
      }).catch(function (response) {
        return _this.showErrorMsg();
      });
    },
    fetch: function fetch(page) {
      axios__WEBPACK_IMPORTED_MODULE_1___default.a.get(this.url(page)).then(this.refresh);
    },
    url: function url() {
      var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;

      if (!page) {
        var query = location.search.match(/page=(\d+)/);
        page = query ? query[1] : 1;
      }

      return "".concat(location.pathname, "/?page=").concat(page);
    },
    refresh: function refresh(_ref) {
      var data = _ref.data;
      this.dataSet = data;
      this.items = data.data;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Frontend/DocumentsUpload.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Frontend/DocumentsUpload.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['action'],
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        name: '',
        description: '',
        file: null
      })
    };
  },
  methods: {}
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Frontend/Profile.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Frontend/Profile.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_2__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['user', 'media', 'action', 'authenticated', 'picture', 'payroll', 'deductions'],
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        password: '',
        password_confirmation: '',
        id: this.user.id
      }),
      biometricData: [],
      employee: [this.user.employee],
      message: '',
      messageClass: '',
      avatar: this.picture,
      moment: moment__WEBPACK_IMPORTED_MODULE_1___default.a
    };
  },
  created: function created() {
    this.fetchBiometricData();
  },
  methods: {
    fetchBiometricData: function fetchBiometricData() {
      var vm = this;
      axios__WEBPACK_IMPORTED_MODULE_2___default.a.get('/f/biometric-in-out/' + this.user.employee.biometric_code).then(function (response) {
        vm.biometricData = response.data;
      }).catch(function (error) {});
    },
    onChange: function onChange(e) {
      var _this = this;

      if (!e.target.files.length) {
        return;
      }

      var profile = e.target.files[0];
      var reader = new FileReader();
      reader.readAsDataURL(profile);

      reader.onload = function (e) {
        _this.avatar = e.target.result;
      };

      this.uploadAvatar(profile);
    },
    uploadAvatar: function uploadAvatar(profile) {
      var data = new FormData();
      data.append('avatar', profile);
      data.append('username', this.user.username);
      axios__WEBPACK_IMPORTED_MODULE_2___default.a.post('/profile/${this.user.username}/picture', data);
    },
    onSubmit: function onSubmit() {
      var _this2 = this;

      this.form.post(this.action).then(function (response) {
        return _this2.displaySuccessMessage('Password has been updated.');
      }).catch(function (response) {
        return _this2.displayErrorMessage('Something went wrong! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    },
    clearMessage: function clearMessage() {
      this.message = '';
    },
    printPayslip: function printPayslip() {// window.open(`/f/t/${this.user.username}`)
      // var doc = new jsPDF();
      //
      // doc.fromHTML($('#payrolldetails').html(), 15, 15, {
      //     'width': 170,
      // });
      // doc.save('sample-file.pdf');
      // let printContents = $('#payrolldetails').clone().find('script').remove().end().html();
      // let allLinks = $('head').clone().find('script').remove().end().html();
      // let popupWin = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
      // ready for writing
      // popupWin.document.open();
      // let keepColors = '<style>body {-webkit-print-color-adjust: exact !important; }</style>';
      // writing
      // onload="window.print()" to print straigthaway
      // popupWin.document.write('<html><head>' + keepColors + allLinks + '</head><body onload="window.print()">' + printContents + '</body></html>');
      // close for writing
      // popupWin.document.close();
      // console.log(printContents);
      // let content = document.getElementById('payroll_card').outerHTML;
      //
      // let stylesHtml = '';
      //
      // for (const node of [...document.querySelectorAll('link[rel="stylesheet"], style')]) {
      //     stylesHtml += node.outerHTML;
      // }
      // console.log(content);
      // const printWindow = window.open('','printWindow');
      // printWindow.document.write('<html>' +
      //     '<head><title>Print it!</title>' +
      //     '<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">' +
      //     '<link rel="stylesheet" type="text/css" href="assets/css/bootstrap_limitless.min.css">' +
      //     '<link rel="stylesheet" type="text/css" href="assets/css/layout.min.css">' +
      //     '<link rel="stylesheet" type="text/css" href="assets/css/components.min.css">' +
      //     '<link rel="stylesheet" type="text/css" href="assets/css/colors.min.css">' +
      //     '</head>' +
      //     '<body>');
      // printWindow.document.write(document.getElementById('payrolldetails').innerHTML);
      // printWindow.document.write('</body></html>');
      // printWindow.print();
      // printWindow.close();
      // return true;
      //
      // WinPrint.document.write('<html><head>');
      // WinPrint.document.write('<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">');
      // WinPrint.document.write('<link rel="stylesheet" type="text/css" href="assets/css/bootstrap_limitless.min.css">');
      // WinPrint.document.write('<link rel="stylesheet" type="text/css" href="assets/css/layout.min.css">');
      // WinPrint.document.write('<link rel="stylesheet" type="text/css" href="assets/css/components.min.css">');
      // WinPrint.document.write('<link rel="stylesheet" type="text/css" href="assets/css/colors.min.css">');
      // WinPrint.document.write('</head>');
      // WinPrint.document.write('<body>');
      // WinPrint.document.write(content);
      // WinPrint.document.write('</body></html>');
      // WinPrint.print();
      // WinPrint.close();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/NewComment.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/NewComment.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var jquery_caret__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! jquery.caret */ "./node_modules/jquery.caret/dist/jquery.caret.js");
/* harmony import */ var jquery_caret__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(jquery_caret__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var at_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! at.js */ "./node_modules/at.js/dist/js/jquery.atwho.js");
/* harmony import */ var at_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(at_js__WEBPACK_IMPORTED_MODULE_3__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      comment_body: ''
    };
  },
  mounted: function mounted() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('#body').atwho({
      at: '@',
      delay: 750,
      callbacks: {
        remoteFilter: function remoteFilter(query, callback) {
          jquery__WEBPACK_IMPORTED_MODULE_0___default.a.getJSON('/api/users', {
            name: query
          }, function (usernames) {
            callback(usernames);
          });
        }
      }
    });
  },
  methods: {
    addComment: function addComment() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_2___default.a.post(location.pathname, {
        body: this.comment_body
      }).then(function (_ref) {
        var data = _ref.data;
        _this.comment_body = '';

        _this.$emit('created', data.data);
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Notifications.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Notifications.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      notifications: false
    };
  },
  created: function created() {
    var _this = this;

    axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/profile/" + window.authenticated.username + "/notifications").then(function (response) {
      return _this.notifications = response.data;
    });
  },
  methods: {
    markAsRead: function markAsRead(notification) {
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.delete("/profile/" + window.authenticated.username + "/notifications/" + notification.id);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Paginator.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Paginator.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['dataSet'],
  data: function data() {
    return {
      page: 1,
      prevUrl: false,
      nextUrl: false
    };
  },
  watch: {
    dataSet: function dataSet() {
      this.page = this.dataSet.current_page;
      this.prevUrl = this.dataSet.prev_page_url;
      this.nextUrl = this.dataSet.next_page_url;
    },
    page: function page() {
      this.broadcast().updateUrl();
    }
  },
  computed: {
    shouldPaginate: function shouldPaginate() {
      return !!this.prevUrl || !!this.nextUrl;
    }
  },
  methods: {
    broadcast: function broadcast() {
      return this.$emit('changed', this.page);
    },
    updateUrl: function updateUrl() {
      history.pushState(null, null, '?page=' + this.page);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/User/Activate.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/User/Activate.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _DatePicker__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../DatePicker */ "./resources/assets/js/components/DatePicker.vue");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_2__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    DatePicker: _DatePicker__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  props: ['user', 'action'],
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        username: this.user.username,
        email: this.user.email,
        national_id_no: this.user.national_id_no,
        telephone: '',
        name: '',
        date_employed: '',
        department_id: '',
        designation: '',
        employee_type_id: '',
        nhif_no: '',
        nssf_no: '',
        kra_pin: '',
        dob: '',
        physical_address: '',
        gender: '',
        biometric_code: '',
        bank_account_no: '',
        user_id: this.user.id,
        employee_id: null,
        send_email: ''
      }),
      employeeDetails: null,
      message: '',
      messsageClass: '',
      genderList: [{
        value: 'MALE',
        label: 'MALE'
      }, {
        value: 'FEMALE',
        label: 'FEMALE'
      }],
      searchID: '',
      departments: [],
      employeeType: [],
      activateAccount: false,
      biometricResult: null
    };
  },
  mounted: function mounted() {
    this.getDepartments();
    this.getEmployeeType();
  },
  methods: {
    searchEmployee: function searchEmployee() {
      axios__WEBPACK_IMPORTED_MODULE_2___default.a.get('/admin/employees/search/' + this.searchID).then(this.refreshEmployeeDetails);
    },
    searchBioCode: function searchBioCode() {
      var vm = this;
      axios__WEBPACK_IMPORTED_MODULE_2___default.a.post('/admin/employees/searchBiometric', {
        biometricSearch: document.getElementById('biometric_search').value
      }).then(function (response) {
        vm.biometricResult = response.data;
      }).catch(function (error) {});
    },
    refreshEmployeeDetails: function refreshEmployeeDetails(_ref) {
      var data = _ref.data;
      this.employeeDetails = data.data;
      this.form.name = data.data.name;
      this.form.physical_address = data.data.physical_address;
      this.form.national_id_no = data.data.national_id_no;
      this.form.gender = data.data.gender;
      this.form.nssf_no = data.data.nssf_no;
      this.form.nhif_no = data.data.nhif_no;
      this.form.kra_pin = data.data.kra_pin;
      this.form.dob = data.data.dob;
      this.form.date_employed = data.data.date_employed;
      this.form.bank_account_no = data.data.bank_account_no;
      this.form.staff_no = data.data.staff_no;
      this.form.employee_type_id = data.data.employee_type_id;
      this.form.designation = data.data.designation;
      this.form.employee_id = data.data.id;
    },
    refreshDepartments: function refreshDepartments(_ref2) {
      var data = _ref2.data;
      this.departments = data.data;
    },
    refreshEmployeeType: function refreshEmployeeType(_ref3) {
      var data = _ref3.data;
      this.employeeType = data.data;
    },
    getDepartments: function getDepartments() {
      axios__WEBPACK_IMPORTED_MODULE_2___default.a.get('/admin/departments').then(this.refreshDepartments);
    },
    getEmployeeType: function getEmployeeType() {
      axios__WEBPACK_IMPORTED_MODULE_2___default.a.get('/admin/employee-type').then(this.refreshEmployeeType);
    },
    onSubmit: function onSubmit() {
      var _this = this;

      this.form.post(this.action).then(function (response) {
        return _this.displaySuccessMessage('User activated!');
      }).catch(function (response) {
        return _this.displayErrorMessage('Oh snap! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    },
    clearMessage: function clearMessage() {
      this.message = '';
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/User/Create.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/User/Create.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DatePicker__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../DatePicker */ "./resources/assets/js/components/DatePicker.vue");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_1__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    DatePicker: _DatePicker__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  props: ['action'],
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_1___default.a({
        username: '',
        email: '',
        telephone: '',
        name: '',
        national_id_no: '',
        date_employed: '',
        department_id: '',
        designation: '',
        employee_type_id: '',
        nhif_no: '',
        nssf_no: '',
        kra_pin: '',
        dob: '',
        physical_address: '',
        gender: '',
        biometric_code: ''
      }),
      message: '',
      messsageClass: '',
      genderList: [{
        value: 'Male',
        label: 'Male'
      }, {
        value: 'Female',
        label: 'Female'
      }],
      employeeType: [],
      departments: []
    };
  },
  created: function created() {
    this.fetchEmployeeType();
    this.fetchDepartments();
  },
  methods: {
    fetchEmployeeType: function fetchEmployeeType() {
      axios.get('/admin/employee-type').then(this.refreshEmployeeType);
    },
    fetchDepartments: function fetchDepartments() {
      axios.get('/admin/departments').then(this.refreshDepartments);
    },
    refreshEmployeeType: function refreshEmployeeType(_ref) {
      var data = _ref.data;
      this.employeeType = data.data;
    },
    refreshDepartments: function refreshDepartments(_ref2) {
      var data = _ref2.data;
      this.departments = data.data;
    },
    onSubmit: function onSubmit() {
      var _this = this;

      this.form.post(this.action).then(function (response) {
        return _this.displaySuccessMessage('User created!');
      }).catch(function (response) {
        return _this.displayErrorMessage('Oh snap! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    },
    clearMessage: function clearMessage() {
      this.message = '';
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/User/Edit.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/User/Edit.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DatePicker__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../DatePicker */ "./resources/assets/js/components/DatePicker.vue");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_1__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    DatePicker: _DatePicker__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  props: ['action', 'user'],
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_1___default.a({
        username: this.user.username,
        email: this.user.email,
        telephone: this.user.telephone,
        name: this.user.employee.name,
        national_id_no: this.user.employee.national_id_no,
        date_employed: this.user.employee.date_employed,
        department_id: this.user.employee.department_id,
        designation: this.user.employee.designation,
        employee_type_id: this.user.employee.employee_type_id,
        nhif_no: this.user.employee.nhif_no,
        nssf_no: this.user.employee.nssf_no,
        kra_pin: this.user.employee.kra_pin,
        dob: this.user.employee.dob,
        physical_address: this.user.employee.physical_address,
        gender: this.user.employee.gender,
        biometric_code: this.user.employee.biometric_code
      }),
      message: '',
      messsageClass: '',
      genderList: [{
        value: 'MALE',
        label: 'MALE'
      }, {
        value: 'FEMALE',
        label: 'FEMALE'
      }],
      employeeType: [],
      departments: []
    };
  },
  created: function created() {
    this.fetchEmployeeType();
    this.fetchDepartments();
  },
  methods: {
    fetchEmployeeType: function fetchEmployeeType() {
      axios.get('/admin/employee-type').then(this.refreshEmployeeType);
    },
    fetchDepartments: function fetchDepartments() {
      axios.get('/admin/departments').then(this.refreshDepartments);
    },
    refreshEmployeeType: function refreshEmployeeType(_ref) {
      var data = _ref.data;
      this.employeeType = data.data;
    },
    refreshDepartments: function refreshDepartments(_ref2) {
      var data = _ref2.data;
      this.departments = data.data;
    },
    onSubmit: function onSubmit() {
      var _this = this;

      this.form.put(this.action).then(function (response) {
        return _this.displaySuccessMessage('User updated!');
      }).catch(function (response) {
        return _this.displayErrorMessage('Oh snap! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    },
    clearMessage: function clearMessage() {
      this.message = '';
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Wysiwyg.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Wysiwyg.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var trix__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! trix */ "./node_modules/trix/dist/trix.js");
/* harmony import */ var trix__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(trix__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['name', 'value'],
  mounted: function mounted() {
    var _this = this;

    this.$refs.trix.addEventListener('trix-change', function (e) {
      console.log('handling');

      _this.$emit('input', e.target.innerHTML);
    });
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/auth/Register.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/auth/Register.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['method', 'action', 'departmentlink'],
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        username: '',
        password: '',
        name: '',
        email: '',
        national_id_no: '',
        department_id: ''
      }),
      message: '',
      messageClass: '',
      departments: []
    };
  },
  created: function created() {
    this.fetch();
  },
  methods: {
    fetch: function fetch() {
      var vm = this;
      axios__WEBPACK_IMPORTED_MODULE_1___default.a.get(this.departmentlink).then(function ($response) {
        vm.departments = $response.data.data;
      });
    },
    onSubmit: function onSubmit() {
      var _this = this;

      this.form[this.method](this.action).then(function (response) {
        return _this.displaySuccessMessage('Well done! Your request has been successfully sent. Instructions on how to access your account will be mailed to you.');
      }).catch(function (response) {
        return _this.displayErrorMessage('Oh snap! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    },
    clearMessage: function clearMessage() {
      this.message = '';
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/department/Create.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/department/Create.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['action', 'method'],
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        name: '',
        email: '',
        mailing_list: ''
      }),
      message: '',
      messageClass: ''
    };
  },
  methods: {
    onSubmit: function onSubmit() {
      var _this = this;

      this.form[this.method](this.action).then(function (response) {
        return _this.displaySuccessMessage('Department created!');
      }).catch(function (response) {
        return _this.displayErrorMessage('Oh snap! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/department/Edit.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/department/Edit.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['action', 'method', 'department'],
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        name: this.department.name,
        email: this.department.email,
        mailing_list: this.department.mailing_list
      }, {
        resetOnSuccess: false
      }),
      message: '',
      messageClass: ''
    };
  },
  methods: {
    onSubmit: function onSubmit() {
      var _this = this;

      this.form.patch(this.action).then(function (response) {
        return _this.displaySuccessMessage('Department created!');
      }).catch(function (response) {
        return _this.displayErrorMessage('Oh snap! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/department/Show.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/department/Show.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Wysiwyg_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../Wysiwyg.vue */ "./resources/assets/js/components/Wysiwyg.vue");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_2__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['department', 'action', 'documentroute'],
  components: {
    wysiwyg: _Wysiwyg_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        overview: ''
      }),
      documents: {},
      document_type: [{
        name: 'S.O.P',
        value: 'sop'
      }, {
        name: 'service charter',
        value: 'charter'
      }, {
        name: 'mission & vision',
        value: 'mission'
      }],
      type: null,
      uploadedFile: null,
      processing: false,
      editingDetails: false,
      hod: '',
      email: '',
      message: '',
      messageClass: ''
    };
  },
  mounted: function mounted() {
    this.getDocuments();
  },
  methods: {
    updateDetails: function updateDetails() {
      axios__WEBPACK_IMPORTED_MODULE_2___default.a.patch('/admin/departments/update-details/' + this.department.id, {
        hod: this.hod,
        email: this.email,
        id: this.department.id
      }).then(function (response) {
        return alert(response.data);
      }).catch(function (error) {
        return alert('Something went wrong! Please try again!');
      });
    },
    processFile: function processFile($e) {
      var selectedFile = $e.target.files[0];

      if (!selectedFile) {
        return;
      }

      this.uploadedFile = selectedFile;
    },
    uploadFile: function uploadFile() {
      if (!this.uploadedFile || !this.type) {
        alert('Please upload a document and select it\'s type');
        return;
      }

      var data = new FormData();
      data.append('document', this.uploadedFile);
      data.append('type', this.type);
      data.append('id', this.department.id);
      axios__WEBPACK_IMPORTED_MODULE_2___default.a.post(this.action, data).then(function (response) {
        return alert(response.data);
      }).catch(function (error) {
        return alert('Something went wrong');
      });
    },
    getDocuments: function getDocuments() {
      var vm = this;
      axios__WEBPACK_IMPORTED_MODULE_2___default.a.get(this.documentroute, this.department.id).then(function ($response) {
        vm.documents = $response.data;
      });
    },
    onSubmit: function onSubmit() {
      var _this = this;

      this.form.patch('/admin/departments/update-overview/' + this.department.id).then(function (response) {
        return _this.displaySuccessMessage('Department updated!');
      }).catch(function (response) {
        return _this.displayErrorMessage('Oh snap! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/employee/Edit.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/employee/Edit.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _DatePicker__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../DatePicker */ "./resources/assets/js/components/DatePicker.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['action', 'employee', 'departmentlink', 'employeetypelink'],
  components: {
    DatePicker: _DatePicker__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        name: this.employee.name,
        department_id: this.employee.department_id,
        designation: this.employee.designation,
        gender: this.employee.gender,
        national_id_no: this.employee.national_id_no,
        date_employed: this.employee.date_employed,
        employee_type_id: this.employee.employee_type_id,
        nhif_no: this.employee.nhif_no,
        nssf_no: this.employee.nssf_no,
        kra_pin: this.employee.kra_pin,
        dob: this.employee.dob,
        physical_address: this.employee.physical_address,
        biometric_code: this.employee.biometric_code,
        bank_account_no: this.employee.bank_account_no,
        telephone: this.employee.telephone[0].telephone,
        email: this.employee.email[0].email
      }),
      genderList: [{
        value: 'MALE',
        label: 'MALE'
      }, {
        value: 'FEMALE',
        label: 'FEMALE'
      }],
      employeeType: [],
      message: '',
      messsageClass: '',
      departmentList: []
    };
  },
  created: function created() {
    this.fetchDepartments();
    this.fetchEmployeeType();
  },
  methods: {
    fetchDepartments: function fetchDepartments() {
      var vm = this;
      axios__WEBPACK_IMPORTED_MODULE_1___default.a.get(this.departmentlink).then(function ($response) {
        vm.departmentList = $response.data.data;
      });
    },
    fetchEmployeeType: function fetchEmployeeType() {
      var vm = this;
      axios__WEBPACK_IMPORTED_MODULE_1___default.a.get(this.employeetypelink).then(function ($response) {
        vm.employeeType = $response.data.data;
      });
    },
    onSubmit: function onSubmit() {
      var _this = this;

      this.form.patch(this.action).then(function (response) {
        return _this.displaySuccessMessage('Employee updated!');
      }).catch(function (response) {
        return _this.displayErrorMessage('Oh snap! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    },
    clearMessage: function clearMessage() {
      this.message = '';
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/event/Create.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/event/Create.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Wysiwyg_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../Wysiwyg.vue */ "./resources/assets/js/components/Wysiwyg.vue");
/* harmony import */ var vue2_selectize__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue2-selectize */ "./node_modules/vue2-selectize/dist/vue2-selectize.js");
/* harmony import */ var vue2_selectize__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue2_selectize__WEBPACK_IMPORTED_MODULE_2__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['method', 'action', 'departments', 'tagscollection'],
  components: {
    wysiwyg: _Wysiwyg_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    selectize: vue2_selectize__WEBPACK_IMPORTED_MODULE_2___default.a
  },
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        name: '',
        body: '',
        venue: '',
        start_date: '',
        end_date: '',
        department_id: ''
      }),
      message: '',
      messageClass: '',
      settings: {
        placeholder: 'Choose department'
      }
    };
  },
  methods: {
    onSubmit: function onSubmit() {
      var _this = this;

      this.form[this.method](this.action).then(function (response) {
        return _this.displaySuccessMessage('Event created!');
      }).catch(function (response) {
        return _this.displayErrorMessage('Something went wrong! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/event/Edit.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/event/Edit.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Wysiwyg_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../Wysiwyg.vue */ "./resources/assets/js/components/Wysiwyg.vue");
/* harmony import */ var vue2_selectize__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue2-selectize */ "./node_modules/vue2-selectize/dist/vue2-selectize.js");
/* harmony import */ var vue2_selectize__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue2_selectize__WEBPACK_IMPORTED_MODULE_2__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['method', 'action', 'event', 'start_date', 'end_date', 'departments'],
  components: {
    wysiwyg: _Wysiwyg_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    selectize: vue2_selectize__WEBPACK_IMPORTED_MODULE_2___default.a
  },
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        name: this.event.name,
        body: this.event.body,
        venue: this.event.venue,
        start_date: this.start_date,
        end_date: this.end_date,
        department_id: this.event.department_id
      }, {
        resetOnSuccess: false
      }),
      tagsItems: this.tagscollection,
      message: '',
      messageClass: '',
      settings: {
        placeholder: 'Choose department'
      }
    };
  },
  methods: {
    onSubmit: function onSubmit() {
      var _this = this;

      this.form.put(this.action).then(function (response) {
        return _this.displaySuccessMessage('Event updated!');
      }).catch(function (response) {
        return _this.displayErrorMessage('Oh snap! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/extension/Create.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/extension/Create.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue2_selectize__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue2-selectize */ "./node_modules/vue2-selectize/dist/vue2-selectize.js");
/* harmony import */ var vue2_selectize__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vue2_selectize__WEBPACK_IMPORTED_MODULE_1__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['method', 'action', 'departments', 'employees'],
  components: {
    selectize: vue2_selectize__WEBPACK_IMPORTED_MODULE_1___default.a
  },
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        ext_no: '',
        department_id: '',
        employee_id: '',
        station_name: ''
      }),
      message: '',
      messageClass: '',
      departmentSettings: {
        placeholder: 'Choose the department'
      },
      contactSettings: {
        hideSelected: true,
        maxItems: 20,
        placeholder: 'Choose the contact persons'
      }
    };
  },
  methods: {
    onSubmit: function onSubmit() {
      var _this = this;

      this.form[this.method](this.action).then(function (response) {
        return _this.displaySuccessMessage('Extension created!');
      }).catch(function (response) {
        return _this.displayErrorMessage('Oh snap! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/extension/Edit.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/extension/Edit.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue2_selectize__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue2-selectize */ "./node_modules/vue2-selectize/dist/vue2-selectize.js");
/* harmony import */ var vue2_selectize__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vue2_selectize__WEBPACK_IMPORTED_MODULE_1__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['method', 'action', 'departments', 'employees', 'extension'],
  components: {
    selectize: vue2_selectize__WEBPACK_IMPORTED_MODULE_1___default.a
  },
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        ext_no: this.extension.ext_no,
        department_id: this.extension.department_id,
        employee_id: this.extension.employees.id,
        station_name: this.extension.station_name
      }),
      message: '',
      messageClass: '',
      departmentSettings: {
        placeholder: 'Choose the department'
      },
      contactSettings: {
        hideSelected: true,
        maxItems: 20,
        placeholder: 'Choose the contact persons'
      }
    };
  },
  methods: {
    onSubmit: function onSubmit() {
      var _this = this;

      this.form.patch(this.action).then(function (response) {
        return _this.displaySuccessMessage('Extension created!');
      }).catch(function (response) {
        return _this.displayErrorMessage('Oh snap! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/memo/Create.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/memo/Create.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _DatePicker__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../DatePicker */ "./resources/assets/js/components/DatePicker.vue");
/* harmony import */ var vue2_selectize__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue2-selectize */ "./node_modules/vue2-selectize/dist/vue2-selectize.js");
/* harmony import */ var vue2_selectize__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue2_selectize__WEBPACK_IMPORTED_MODULE_2__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['departments', 'method', 'action'],
  components: {
    DatePicker: _DatePicker__WEBPACK_IMPORTED_MODULE_1__["default"],
    selectize: vue2_selectize__WEBPACK_IMPORTED_MODULE_2___default.a
  },
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        subject: "",
        from: "",
        date: "",
        body: "",
        to: []
      }),
      settings: {
        hideSelected: true,
        maxItems: 40,
        placeholder: 'choose department'
      },
      message: "",
      messageClass: ""
    };
  },
  methods: {
    onSubmit: function onSubmit() {
      var _this = this;

      this.form[this.method](this.action).then(function (response) {
        return _this.displaySuccessMessage('Memo created!');
      }).catch(function (response) {
        return _this.displayErrorMessage('Something went wrong! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    },
    clearMessage: function clearMessage() {
      this.message = '';
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/minutes/Create.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/minutes/Create.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _DatePicker__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../DatePicker */ "./resources/assets/js/components/DatePicker.vue");
/* harmony import */ var vue2_selectize__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue2-selectize */ "./node_modules/vue2-selectize/dist/vue2-selectize.js");
/* harmony import */ var vue2_selectize__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue2_selectize__WEBPACK_IMPORTED_MODULE_2__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['method', 'action', 'departments'],
  components: {
    DatePicker: _DatePicker__WEBPACK_IMPORTED_MODULE_1__["default"],
    selectize: vue2_selectize__WEBPACK_IMPORTED_MODULE_2___default.a
  },
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        name: "",
        department_id: "",
        date: ""
      }),
      settings: {
        hideSelected: true,
        maxItems: 40,
        placeholder: 'choose related department'
      },
      message: "",
      messageClass: ""
    };
  },
  methods: {
    onSubmit: function onSubmit() {
      var _this = this;

      this.form[this.method](this.action).then(function (response) {
        return _this.displaySuccessMessage(response.data);
      }).catch(function (response) {
        return _this.displayErrorMessage(response.message);
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    },
    clearMessage: function clearMessage() {
      this.message = '';
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/minutes/Edit.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/minutes/Edit.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _DatePicker__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../DatePicker */ "./resources/assets/js/components/DatePicker.vue");
/* harmony import */ var vue2_selectize__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue2-selectize */ "./node_modules/vue2-selectize/dist/vue2-selectize.js");
/* harmony import */ var vue2_selectize__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue2_selectize__WEBPACK_IMPORTED_MODULE_2__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['departments', 'method', 'action'],
  components: {
    DatePicker: _DatePicker__WEBPACK_IMPORTED_MODULE_1__["default"],
    selectize: vue2_selectize__WEBPACK_IMPORTED_MODULE_2___default.a
  },
  data: function data() {
    return {
      form: new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a({
        subject: "",
        from: "",
        date: "",
        body: "",
        to: []
      }),
      settings: {
        hideSelected: true,
        maxItems: 40,
        placeholder: 'choose department'
      },
      message: "",
      messageClass: ""
    };
  },
  methods: {
    onSubmit: function onSubmit() {
      var _this = this;

      this.form[this.method](this.action).then(function (response) {
        return _this.displaySuccessMessage('Memo created!');
      }).catch(function (response) {
        return _this.displayErrorMessage('Something went wrong! Change a few things up and try submitting again.');
      });
    },
    displaySuccessMessage: function displaySuccessMessage(message) {
      this.messageClass = 'bg-success alert text-white alert-dismissible';
      this.message = message;
    },
    displayErrorMessage: function displayErrorMessage(message) {
      this.messageClass = 'bg-danger alert text-white alert-dismissible';
      this.message = message;
    },
    clearMessage: function clearMessage() {
      this.message = '';
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/pages/eventPage.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/pages/eventPage.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_Events_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../components/Events.vue */ "./resources/assets/js/components/Events.vue");
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    events: _components_Events_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/pages/news.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/pages/news.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_CommentsComponent_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../components/CommentsComponent.vue */ "./resources/assets/js/components/CommentsComponent.vue");
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    comments: _components_CommentsComponent_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  }
});

/***/ }),

/***/ "./node_modules/moment/locale sync recursive ^\\.\\/.*$":
/*!**************************************************!*\
  !*** ./node_modules/moment/locale sync ^\.\/.*$ ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./af": "./node_modules/moment/locale/af.js",
	"./af.js": "./node_modules/moment/locale/af.js",
	"./ar": "./node_modules/moment/locale/ar.js",
	"./ar-dz": "./node_modules/moment/locale/ar-dz.js",
	"./ar-dz.js": "./node_modules/moment/locale/ar-dz.js",
	"./ar-kw": "./node_modules/moment/locale/ar-kw.js",
	"./ar-kw.js": "./node_modules/moment/locale/ar-kw.js",
	"./ar-ly": "./node_modules/moment/locale/ar-ly.js",
	"./ar-ly.js": "./node_modules/moment/locale/ar-ly.js",
	"./ar-ma": "./node_modules/moment/locale/ar-ma.js",
	"./ar-ma.js": "./node_modules/moment/locale/ar-ma.js",
	"./ar-sa": "./node_modules/moment/locale/ar-sa.js",
	"./ar-sa.js": "./node_modules/moment/locale/ar-sa.js",
	"./ar-tn": "./node_modules/moment/locale/ar-tn.js",
	"./ar-tn.js": "./node_modules/moment/locale/ar-tn.js",
	"./ar.js": "./node_modules/moment/locale/ar.js",
	"./az": "./node_modules/moment/locale/az.js",
	"./az.js": "./node_modules/moment/locale/az.js",
	"./be": "./node_modules/moment/locale/be.js",
	"./be.js": "./node_modules/moment/locale/be.js",
	"./bg": "./node_modules/moment/locale/bg.js",
	"./bg.js": "./node_modules/moment/locale/bg.js",
	"./bm": "./node_modules/moment/locale/bm.js",
	"./bm.js": "./node_modules/moment/locale/bm.js",
	"./bn": "./node_modules/moment/locale/bn.js",
	"./bn.js": "./node_modules/moment/locale/bn.js",
	"./bo": "./node_modules/moment/locale/bo.js",
	"./bo.js": "./node_modules/moment/locale/bo.js",
	"./br": "./node_modules/moment/locale/br.js",
	"./br.js": "./node_modules/moment/locale/br.js",
	"./bs": "./node_modules/moment/locale/bs.js",
	"./bs.js": "./node_modules/moment/locale/bs.js",
	"./ca": "./node_modules/moment/locale/ca.js",
	"./ca.js": "./node_modules/moment/locale/ca.js",
	"./cs": "./node_modules/moment/locale/cs.js",
	"./cs.js": "./node_modules/moment/locale/cs.js",
	"./cv": "./node_modules/moment/locale/cv.js",
	"./cv.js": "./node_modules/moment/locale/cv.js",
	"./cy": "./node_modules/moment/locale/cy.js",
	"./cy.js": "./node_modules/moment/locale/cy.js",
	"./da": "./node_modules/moment/locale/da.js",
	"./da.js": "./node_modules/moment/locale/da.js",
	"./de": "./node_modules/moment/locale/de.js",
	"./de-at": "./node_modules/moment/locale/de-at.js",
	"./de-at.js": "./node_modules/moment/locale/de-at.js",
	"./de-ch": "./node_modules/moment/locale/de-ch.js",
	"./de-ch.js": "./node_modules/moment/locale/de-ch.js",
	"./de.js": "./node_modules/moment/locale/de.js",
	"./dv": "./node_modules/moment/locale/dv.js",
	"./dv.js": "./node_modules/moment/locale/dv.js",
	"./el": "./node_modules/moment/locale/el.js",
	"./el.js": "./node_modules/moment/locale/el.js",
	"./en-au": "./node_modules/moment/locale/en-au.js",
	"./en-au.js": "./node_modules/moment/locale/en-au.js",
	"./en-ca": "./node_modules/moment/locale/en-ca.js",
	"./en-ca.js": "./node_modules/moment/locale/en-ca.js",
	"./en-gb": "./node_modules/moment/locale/en-gb.js",
	"./en-gb.js": "./node_modules/moment/locale/en-gb.js",
	"./en-ie": "./node_modules/moment/locale/en-ie.js",
	"./en-ie.js": "./node_modules/moment/locale/en-ie.js",
	"./en-il": "./node_modules/moment/locale/en-il.js",
	"./en-il.js": "./node_modules/moment/locale/en-il.js",
	"./en-nz": "./node_modules/moment/locale/en-nz.js",
	"./en-nz.js": "./node_modules/moment/locale/en-nz.js",
	"./eo": "./node_modules/moment/locale/eo.js",
	"./eo.js": "./node_modules/moment/locale/eo.js",
	"./es": "./node_modules/moment/locale/es.js",
	"./es-do": "./node_modules/moment/locale/es-do.js",
	"./es-do.js": "./node_modules/moment/locale/es-do.js",
	"./es-us": "./node_modules/moment/locale/es-us.js",
	"./es-us.js": "./node_modules/moment/locale/es-us.js",
	"./es.js": "./node_modules/moment/locale/es.js",
	"./et": "./node_modules/moment/locale/et.js",
	"./et.js": "./node_modules/moment/locale/et.js",
	"./eu": "./node_modules/moment/locale/eu.js",
	"./eu.js": "./node_modules/moment/locale/eu.js",
	"./fa": "./node_modules/moment/locale/fa.js",
	"./fa.js": "./node_modules/moment/locale/fa.js",
	"./fi": "./node_modules/moment/locale/fi.js",
	"./fi.js": "./node_modules/moment/locale/fi.js",
	"./fo": "./node_modules/moment/locale/fo.js",
	"./fo.js": "./node_modules/moment/locale/fo.js",
	"./fr": "./node_modules/moment/locale/fr.js",
	"./fr-ca": "./node_modules/moment/locale/fr-ca.js",
	"./fr-ca.js": "./node_modules/moment/locale/fr-ca.js",
	"./fr-ch": "./node_modules/moment/locale/fr-ch.js",
	"./fr-ch.js": "./node_modules/moment/locale/fr-ch.js",
	"./fr.js": "./node_modules/moment/locale/fr.js",
	"./fy": "./node_modules/moment/locale/fy.js",
	"./fy.js": "./node_modules/moment/locale/fy.js",
	"./gd": "./node_modules/moment/locale/gd.js",
	"./gd.js": "./node_modules/moment/locale/gd.js",
	"./gl": "./node_modules/moment/locale/gl.js",
	"./gl.js": "./node_modules/moment/locale/gl.js",
	"./gom-latn": "./node_modules/moment/locale/gom-latn.js",
	"./gom-latn.js": "./node_modules/moment/locale/gom-latn.js",
	"./gu": "./node_modules/moment/locale/gu.js",
	"./gu.js": "./node_modules/moment/locale/gu.js",
	"./he": "./node_modules/moment/locale/he.js",
	"./he.js": "./node_modules/moment/locale/he.js",
	"./hi": "./node_modules/moment/locale/hi.js",
	"./hi.js": "./node_modules/moment/locale/hi.js",
	"./hr": "./node_modules/moment/locale/hr.js",
	"./hr.js": "./node_modules/moment/locale/hr.js",
	"./hu": "./node_modules/moment/locale/hu.js",
	"./hu.js": "./node_modules/moment/locale/hu.js",
	"./hy-am": "./node_modules/moment/locale/hy-am.js",
	"./hy-am.js": "./node_modules/moment/locale/hy-am.js",
	"./id": "./node_modules/moment/locale/id.js",
	"./id.js": "./node_modules/moment/locale/id.js",
	"./is": "./node_modules/moment/locale/is.js",
	"./is.js": "./node_modules/moment/locale/is.js",
	"./it": "./node_modules/moment/locale/it.js",
	"./it.js": "./node_modules/moment/locale/it.js",
	"./ja": "./node_modules/moment/locale/ja.js",
	"./ja.js": "./node_modules/moment/locale/ja.js",
	"./jv": "./node_modules/moment/locale/jv.js",
	"./jv.js": "./node_modules/moment/locale/jv.js",
	"./ka": "./node_modules/moment/locale/ka.js",
	"./ka.js": "./node_modules/moment/locale/ka.js",
	"./kk": "./node_modules/moment/locale/kk.js",
	"./kk.js": "./node_modules/moment/locale/kk.js",
	"./km": "./node_modules/moment/locale/km.js",
	"./km.js": "./node_modules/moment/locale/km.js",
	"./kn": "./node_modules/moment/locale/kn.js",
	"./kn.js": "./node_modules/moment/locale/kn.js",
	"./ko": "./node_modules/moment/locale/ko.js",
	"./ko.js": "./node_modules/moment/locale/ko.js",
	"./ky": "./node_modules/moment/locale/ky.js",
	"./ky.js": "./node_modules/moment/locale/ky.js",
	"./lb": "./node_modules/moment/locale/lb.js",
	"./lb.js": "./node_modules/moment/locale/lb.js",
	"./lo": "./node_modules/moment/locale/lo.js",
	"./lo.js": "./node_modules/moment/locale/lo.js",
	"./lt": "./node_modules/moment/locale/lt.js",
	"./lt.js": "./node_modules/moment/locale/lt.js",
	"./lv": "./node_modules/moment/locale/lv.js",
	"./lv.js": "./node_modules/moment/locale/lv.js",
	"./me": "./node_modules/moment/locale/me.js",
	"./me.js": "./node_modules/moment/locale/me.js",
	"./mi": "./node_modules/moment/locale/mi.js",
	"./mi.js": "./node_modules/moment/locale/mi.js",
	"./mk": "./node_modules/moment/locale/mk.js",
	"./mk.js": "./node_modules/moment/locale/mk.js",
	"./ml": "./node_modules/moment/locale/ml.js",
	"./ml.js": "./node_modules/moment/locale/ml.js",
	"./mn": "./node_modules/moment/locale/mn.js",
	"./mn.js": "./node_modules/moment/locale/mn.js",
	"./mr": "./node_modules/moment/locale/mr.js",
	"./mr.js": "./node_modules/moment/locale/mr.js",
	"./ms": "./node_modules/moment/locale/ms.js",
	"./ms-my": "./node_modules/moment/locale/ms-my.js",
	"./ms-my.js": "./node_modules/moment/locale/ms-my.js",
	"./ms.js": "./node_modules/moment/locale/ms.js",
	"./mt": "./node_modules/moment/locale/mt.js",
	"./mt.js": "./node_modules/moment/locale/mt.js",
	"./my": "./node_modules/moment/locale/my.js",
	"./my.js": "./node_modules/moment/locale/my.js",
	"./nb": "./node_modules/moment/locale/nb.js",
	"./nb.js": "./node_modules/moment/locale/nb.js",
	"./ne": "./node_modules/moment/locale/ne.js",
	"./ne.js": "./node_modules/moment/locale/ne.js",
	"./nl": "./node_modules/moment/locale/nl.js",
	"./nl-be": "./node_modules/moment/locale/nl-be.js",
	"./nl-be.js": "./node_modules/moment/locale/nl-be.js",
	"./nl.js": "./node_modules/moment/locale/nl.js",
	"./nn": "./node_modules/moment/locale/nn.js",
	"./nn.js": "./node_modules/moment/locale/nn.js",
	"./pa-in": "./node_modules/moment/locale/pa-in.js",
	"./pa-in.js": "./node_modules/moment/locale/pa-in.js",
	"./pl": "./node_modules/moment/locale/pl.js",
	"./pl.js": "./node_modules/moment/locale/pl.js",
	"./pt": "./node_modules/moment/locale/pt.js",
	"./pt-br": "./node_modules/moment/locale/pt-br.js",
	"./pt-br.js": "./node_modules/moment/locale/pt-br.js",
	"./pt.js": "./node_modules/moment/locale/pt.js",
	"./ro": "./node_modules/moment/locale/ro.js",
	"./ro.js": "./node_modules/moment/locale/ro.js",
	"./ru": "./node_modules/moment/locale/ru.js",
	"./ru.js": "./node_modules/moment/locale/ru.js",
	"./sd": "./node_modules/moment/locale/sd.js",
	"./sd.js": "./node_modules/moment/locale/sd.js",
	"./se": "./node_modules/moment/locale/se.js",
	"./se.js": "./node_modules/moment/locale/se.js",
	"./si": "./node_modules/moment/locale/si.js",
	"./si.js": "./node_modules/moment/locale/si.js",
	"./sk": "./node_modules/moment/locale/sk.js",
	"./sk.js": "./node_modules/moment/locale/sk.js",
	"./sl": "./node_modules/moment/locale/sl.js",
	"./sl.js": "./node_modules/moment/locale/sl.js",
	"./sq": "./node_modules/moment/locale/sq.js",
	"./sq.js": "./node_modules/moment/locale/sq.js",
	"./sr": "./node_modules/moment/locale/sr.js",
	"./sr-cyrl": "./node_modules/moment/locale/sr-cyrl.js",
	"./sr-cyrl.js": "./node_modules/moment/locale/sr-cyrl.js",
	"./sr.js": "./node_modules/moment/locale/sr.js",
	"./ss": "./node_modules/moment/locale/ss.js",
	"./ss.js": "./node_modules/moment/locale/ss.js",
	"./sv": "./node_modules/moment/locale/sv.js",
	"./sv.js": "./node_modules/moment/locale/sv.js",
	"./sw": "./node_modules/moment/locale/sw.js",
	"./sw.js": "./node_modules/moment/locale/sw.js",
	"./ta": "./node_modules/moment/locale/ta.js",
	"./ta.js": "./node_modules/moment/locale/ta.js",
	"./te": "./node_modules/moment/locale/te.js",
	"./te.js": "./node_modules/moment/locale/te.js",
	"./tet": "./node_modules/moment/locale/tet.js",
	"./tet.js": "./node_modules/moment/locale/tet.js",
	"./tg": "./node_modules/moment/locale/tg.js",
	"./tg.js": "./node_modules/moment/locale/tg.js",
	"./th": "./node_modules/moment/locale/th.js",
	"./th.js": "./node_modules/moment/locale/th.js",
	"./tl-ph": "./node_modules/moment/locale/tl-ph.js",
	"./tl-ph.js": "./node_modules/moment/locale/tl-ph.js",
	"./tlh": "./node_modules/moment/locale/tlh.js",
	"./tlh.js": "./node_modules/moment/locale/tlh.js",
	"./tr": "./node_modules/moment/locale/tr.js",
	"./tr.js": "./node_modules/moment/locale/tr.js",
	"./tzl": "./node_modules/moment/locale/tzl.js",
	"./tzl.js": "./node_modules/moment/locale/tzl.js",
	"./tzm": "./node_modules/moment/locale/tzm.js",
	"./tzm-latn": "./node_modules/moment/locale/tzm-latn.js",
	"./tzm-latn.js": "./node_modules/moment/locale/tzm-latn.js",
	"./tzm.js": "./node_modules/moment/locale/tzm.js",
	"./ug-cn": "./node_modules/moment/locale/ug-cn.js",
	"./ug-cn.js": "./node_modules/moment/locale/ug-cn.js",
	"./uk": "./node_modules/moment/locale/uk.js",
	"./uk.js": "./node_modules/moment/locale/uk.js",
	"./ur": "./node_modules/moment/locale/ur.js",
	"./ur.js": "./node_modules/moment/locale/ur.js",
	"./uz": "./node_modules/moment/locale/uz.js",
	"./uz-latn": "./node_modules/moment/locale/uz-latn.js",
	"./uz-latn.js": "./node_modules/moment/locale/uz-latn.js",
	"./uz.js": "./node_modules/moment/locale/uz.js",
	"./vi": "./node_modules/moment/locale/vi.js",
	"./vi.js": "./node_modules/moment/locale/vi.js",
	"./x-pseudo": "./node_modules/moment/locale/x-pseudo.js",
	"./x-pseudo.js": "./node_modules/moment/locale/x-pseudo.js",
	"./yo": "./node_modules/moment/locale/yo.js",
	"./yo.js": "./node_modules/moment/locale/yo.js",
	"./zh-cn": "./node_modules/moment/locale/zh-cn.js",
	"./zh-cn.js": "./node_modules/moment/locale/zh-cn.js",
	"./zh-hk": "./node_modules/moment/locale/zh-hk.js",
	"./zh-hk.js": "./node_modules/moment/locale/zh-hk.js",
	"./zh-tw": "./node_modules/moment/locale/zh-tw.js",
	"./zh-tw.js": "./node_modules/moment/locale/zh-tw.js"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./node_modules/moment/locale sync recursive ^\\.\\/.*$";

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/CommentComponent.vue?vue&type=template&id=4720d6d6&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/CommentComponent.vue?vue&type=template&id=4720d6d6& ***!
  \**************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("li", { staticClass: "media flex-column flex-md-row" }, [
      _c("div", { staticClass: "mr-md-3 mb-2 mb-md-0" }),
      _vm._v(" "),
      _c("div", { staticClass: "media-body" }, [
        _c("div", { staticClass: "media-title" }, [
          _c(
            "a",
            { staticClass: "font-weight-semibold", attrs: { href: "#" } },
            [_vm._v(_vm._s(_vm.data.user_id) + "\n                ")]
          ),
          _vm._v(" "),
          _c("span", {
            staticClass: "text-muted ml-3",
            domProps: { textContent: _vm._s(_vm.ago) }
          })
        ]),
        _vm._v(" "),
        _vm.editing
          ? _c("div", [
              _c("div", { staticClass: "form-group" }, [
                _c("textarea", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.body,
                      expression: "body"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: { name: "body" },
                  domProps: { value: _vm.body },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.body = $event.target.value
                    }
                  }
                })
              ]),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass: "btn btn-link",
                  attrs: { type: "button" },
                  on: { click: _vm.update }
                },
                [_vm._v("Update")]
              ),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass: "btn btn-xs btn-link",
                  on: {
                    click: function($event) {
                      _vm.editing = false
                    }
                  }
                },
                [_vm._v("Cancel")]
              )
            ])
          : _c("div", [
              _c("p", { domProps: { textContent: _vm._s(_vm.body) } })
            ]),
        _vm._v(" "),
        _c(
          "ul",
          { staticClass: "list-inline list-inline-dotted font-size-sm" },
          [
            _vm.canUpdate
              ? _c(
                  "li",
                  {
                    staticClass: "list-inline-item",
                    on: {
                      click: function($event) {
                        _vm.editing = true
                      }
                    }
                  },
                  [
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-link",
                        attrs: { type: "button" }
                      },
                      [_vm._v("Edit")]
                    )
                  ]
                )
              : _vm._e(),
            _vm._v(" "),
            _vm.canUpdate
              ? _c("li", { staticClass: "list-inline-item" }, [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-link",
                      attrs: { type: "button" },
                      on: { click: _vm.deleteComment }
                    },
                    [_vm._v("Delete")]
                  )
                ])
              : _vm._e()
          ]
        )
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/CommentsComponent.vue?vue&type=template&id=abb4387c&":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/CommentsComponent.vue?vue&type=template&id=abb4387c& ***!
  \***************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _vm._l(_vm.items, function(comment, index) {
        return _c(
          "div",
          [
            _c("comment", {
              attrs: { data: comment },
              on: {
                deleted: function($event) {
                  return _vm.remove(index)
                }
              }
            })
          ],
          1
        )
      }),
      _vm._v(" "),
      _c("paginator", {
        attrs: { dataSet: _vm.dataSet },
        on: { changed: _vm.fetch }
      }),
      _vm._v(" "),
      _c("addComment", { on: { created: _vm.add } })
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Countdown.vue?vue&type=template&id=63ea958a&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Countdown.vue?vue&type=template&id=63ea958a& ***!
  \*******************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "card" }, [
    _vm._m(0),
    _vm._v(" "),
    _c("div", { staticClass: "card-body" }, [
      _c(
        "div",
        { staticClass: "d-flex justify-content-center text-center mb-2" },
        [
          _c("div", { staticClass: "timer-number font-weight-light" }, [
            _vm._v("\n                " + _vm._s(_vm.remaining.days) + " "),
            _c("span", { staticClass: "d-block font-size-base mt-2" }, [
              _vm._v("Days")
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "timer-dots mx-1" }, [_vm._v(":")]),
          _vm._v(" "),
          _c("div", { staticClass: "timer-number font-weight-light" }, [
            _vm._v("\n                " + _vm._s(_vm.remaining.hours) + " "),
            _c("span", { staticClass: "d-block font-size-base mt-2" }, [
              _vm._v("hours")
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "timer-dots mx-1" }, [_vm._v(":")]),
          _vm._v(" "),
          _c("div", { staticClass: "timer-number font-weight-light" }, [
            _vm._v("\n                " + _vm._s(_vm.remaining.minutes) + " "),
            _c("span", { staticClass: "d-block font-size-base mt-2" }, [
              _vm._v("minutes")
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "timer-dots mx-1" }, [_vm._v(":")]),
          _vm._v(" "),
          _c("div", { staticClass: "timer-number font-weight-light" }, [
            _vm._v("\n                " + _vm._s(_vm.remaining.seconds) + " "),
            _c("span", { staticClass: "d-block font-size-base mt-2" }, [
              _vm._v("seconds")
            ])
          ])
        ]
      )
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "card-footer d-flex align-items-center" })
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "card-header bg-transparent header-elements-inline" },
      [
        _c(
          "span",
          { staticClass: "text-uppercase font-size-sm font-weight-semibold" },
          [_vm._v("Event countdown")]
        )
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/DatePicker.vue?vue&type=template&id=5b6a2d5a&scoped=true&":
/*!********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/DatePicker.vue?vue&type=template&id=5b6a2d5a&scoped=true& ***!
  \********************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "form-group" }, [
    _c("label", [_vm._v(_vm._s(this.label) + " ")]),
    _vm._v(" "),
    _c("input", {
      ref: "input",
      staticClass: "form-control ",
      attrs: { type: "text", name: "", placeholder: "Date" },
      domProps: { value: _vm.value }
    })
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Event.vue?vue&type=template&id=49441df3&":
/*!***************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Event.vue?vue&type=template&id=49441df3& ***!
  \***************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "card" }, [
    _c(
      "div",
      {
        staticClass:
          "card-header bg-white header-elements-sm-inline border-bottom-1 border-bottom-indigo"
      },
      [
        _c("h6", { staticClass: "card-title" }, [
          _c("i", { staticClass: "icon-user-tie text-muted" }),
          _vm._v(" "),
          _c("span", { staticClass: "text-success" }, [
            _vm._v(_vm._s(_vm.data.user.username))
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "header-elements" }, [
          _c("div", { staticClass: "d-flex justify-content-center" }, [
            _c("div", {
              staticClass: "text-muted mr-2",
              domProps: { textContent: _vm._s(_vm.ago) }
            })
          ])
        ])
      ]
    ),
    _vm._v(" "),
    _c("div", { staticClass: "card-body" }, [
      _vm.editing
        ? _c("div", [
            _c(
              "form",
              {
                on: {
                  submit: function($event) {
                    $event.preventDefault()
                    return _vm.update($event)
                  }
                }
              },
              [
                _c("div", { staticClass: "form-group" }, [
                  _c("textarea", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.body,
                        expression: "body"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { name: "body", required: "" },
                    domProps: { value: _vm.body },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.body = $event.target.value
                      }
                    }
                  })
                ]),
                _vm._v(" "),
                _c(
                  "button",
                  { staticClass: "btn btn-link", attrs: { type: "submit" } },
                  [_vm._v("Update")]
                ),
                _vm._v(" "),
                _c(
                  "button",
                  {
                    staticClass: "btn btn-xs btn-link",
                    on: {
                      click: function($event) {
                        _vm.editing = false
                      }
                    }
                  },
                  [_vm._v("Cancel")]
                )
              ]
            )
          ])
        : _c("div", [_c("span", { domProps: { innerHTML: _vm._s(_vm.body) } })])
    ]),
    _vm._v(" "),
    _vm.authorize("update", _vm.comment)
      ? _c(
          "div",
          {
            staticClass:
              "card-footer d-sm-flex justify-content-sm-between align-items-sm-center"
          },
          [
            _c("ul", { staticClass: "list-inline mb-0 mt-2 mt-sm-0" }, [
              _c("li", { staticClass: "list-inline-item dropdown" }, [
                _vm._m(0),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass: "dropdown-menu dropdown-menu-right",
                    attrs: { "x-placement": "bottom-end" }
                  },
                  [
                    _c(
                      "button",
                      {
                        staticClass: "dropdown-item",
                        attrs: { href: "#" },
                        on: {
                          click: function($event) {
                            _vm.editing = true
                          }
                        }
                      },
                      [
                        _c("i", { staticClass: "icon-pencil7" }),
                        _vm._v(" Edit\n                    ")
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "dropdown-item",
                        attrs: {
                          href: "#",
                          onclick: "alert('Are you sure you want to delete?')"
                        },
                        on: { click: _vm.deleteComment }
                      },
                      [
                        _c("i", { staticClass: "icon-cross2" }),
                        _vm._v(" Delete\n                    ")
                      ]
                    )
                  ]
                )
              ])
            ])
          ]
        )
      : _vm._e()
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "text-default ",
        attrs: {
          href: "#",
          "data-toggle": "dropdown",
          "aria-expanded": "false"
        }
      },
      [_c("i", { staticClass: "icon-menu3" })]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Events.vue?vue&type=template&id=3a297ce0&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Events.vue?vue&type=template&id=3a297ce0& ***!
  \****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _vm._l(_vm.items, function(event, index) {
        return _c(
          "div",
          { key: event.id },
          [
            _c("event", {
              attrs: { data: event },
              on: {
                deleted: function($event) {
                  return _vm.remove(index)
                }
              }
            })
          ],
          1
        )
      }),
      _vm._v(" "),
      _c("paginator", {
        attrs: { dataSet: _vm.dataSet },
        on: { changed: _vm.fetch }
      }),
      _vm._v(" "),
      _c("addComment", { on: { created: _vm.add } })
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Frontend/Documents/index.vue?vue&type=template&id=6df7d0d5&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Frontend/Documents/index.vue?vue&type=template&id=6df7d0d5&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c(
      "div",
      {
        staticClass: "modal fade",
        attrs: { id: "modal_form_vertical", tabindex: "-1" }
      },
      [
        _c("div", { staticClass: "modal-dialog" }, [
          _c("div", { staticClass: "modal-content" }, [
            _vm._m(0),
            _vm._v(" "),
            _c(
              "form",
              {
                on: {
                  submit: function($event) {
                    $event.preventDefault()
                    return _vm.onSubmit($event)
                  },
                  keydown: function($event) {
                    return _vm.form.errors.clear($event.target.name)
                  }
                }
              },
              [
                _c("div", { staticClass: "modal-body" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.name,
                          expression: "form.name"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "text",
                        name: "name",
                        id: "name",
                        placeholder: "Enter Document Name. eg Financial Report"
                      },
                      domProps: { value: _vm.form.name },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "name", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _vm.form.errors.has("name")
                      ? _c("label", {
                          staticClass: "validation-invalid-label",
                          domProps: {
                            textContent: _vm._s(_vm.form.errors.first("name"))
                          }
                        })
                      : _vm._e()
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group" }, [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.description,
                          expression: "form.description"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "text",
                        name: "description",
                        placeholder:
                          "Enter description of the document... optional",
                        id: "description"
                      },
                      domProps: { value: _vm.form.description },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "description", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _vm.form.errors.has("description")
                      ? _c("label", {
                          staticClass: "validation-invalid-label",
                          domProps: {
                            textContent: _vm._s(
                              _vm.form.errors.first("description")
                            )
                          }
                        })
                      : _vm._e()
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group" }, [
                    _c("input", {
                      ref: "document",
                      attrs: { type: "file", name: "document", required: "" },
                      on: { change: _vm.handleFileUpload }
                    }),
                    _vm._v(" "),
                    _vm.form.errors.has("document")
                      ? _c("label", {
                          staticClass: "validation-invalid-label",
                          domProps: {
                            textContent: _vm._s(
                              _vm.form.errors.first("document")
                            )
                          }
                        })
                      : _c("label", [
                          _c("span", { staticClass: "form-text text-muted" }, [
                            _vm._v("Accepted formats: doc, docx, pdf.")
                          ])
                        ])
                  ])
                ]),
                _vm._v(" "),
                _vm._m(1)
              ]
            )
          ])
        ])
      ]
    ),
    _vm._v(" "),
    _c("div", { staticClass: "card" }, [
      _vm._m(2),
      _vm._v(" "),
      _c("div", { staticClass: "card-body tab-content" }, [
        _c(
          "div",
          {
            staticClass: "tab-pane fade active show",
            attrs: { id: "card-bottom-tab1" }
          },
          [
            _c(
              "div",
              { staticClass: "row" },
              _vm._l(_vm.items, function(item) {
                return _c(
                  "div",
                  { staticClass: "col-sm-6 col-lg-3 col-md-2" },
                  [
                    _c("div", { staticClass: "card card-body" }, [
                      _c("div", { staticClass: "media" }, [
                        _vm._m(3, true),
                        _vm._v(" "),
                        _c("div", { staticClass: "media-body" }, [
                          _c("h6", { staticClass: "mb-0" }, [
                            _vm._v(_vm._s(item.name))
                          ]),
                          _vm._v(" "),
                          _c("span", { staticClass: "text-muted" }, [
                            _vm._v(_vm._s(item.description))
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "ml-3 align-self-center" }, [
                          _c("div", { staticClass: "list-icons" }, [
                            _c(
                              "div",
                              { staticClass: "list-icons-item dropdown" },
                              [
                                _vm._m(4, true),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "dropdown-menu dropdown-menu-right",
                                    attrs: { "x-placement": "bottom-end" }
                                  },
                                  [
                                    _c(
                                      "a",
                                      {
                                        staticClass: "dropdown-item",
                                        attrs: {
                                          target: "_blank",
                                          href: "/f/document/" + item.uuid + ""
                                        }
                                      },
                                      [
                                        _c("i", {
                                          staticClass: "icon-file-download"
                                        }),
                                        _vm._v(
                                          " Download\n                                                "
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ]
                            )
                          ])
                        ])
                      ])
                    ])
                  ]
                )
              }),
              0
            )
          ]
        )
      ]),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass:
            "card-footer bg-white d-sm-flex justify-content-between align-items-center"
        },
        [
          _c("paginator", {
            attrs: { dataSet: _vm.dataSet },
            on: { changed: _vm.fetch }
          }),
          _vm._v(" "),
          _c(
            "button",
            {
              staticClass:
                "btn btn-sm btn-outline bg-success-400 border-success-400 ml-3",
              attrs: {
                type: "button",
                "data-toggle": "modal",
                "data-target": "#modal_form_vertical"
              }
            },
            [_vm._v("\n                Upload\n            ")]
          )
        ],
        1
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-header" }, [
      _c("h5", { staticClass: "modal-title" }, [_vm._v("Upload Document")]),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass: "close",
          attrs: { type: "button", "data-dismiss": "modal" }
        },
        [_vm._v("×")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-footer" }, [
      _c(
        "button",
        {
          staticClass: "btn btn-link",
          attrs: { type: "button", "data-dismiss": "modal" }
        },
        [_vm._v("Close")]
      ),
      _vm._v(" "),
      _c(
        "button",
        { staticClass: "btn bg-primary", attrs: { type: "submit" } },
        [_vm._v("Submit form")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "card-header bg-white pb-0 pt-sm-0 pr-sm-0 header-elements-inline"
      },
      [
        _c("div", { staticClass: "header-elements" }, [
          _c(
            "ul",
            {
              staticClass: "nav nav-tabs nav-tabs-bottom card-header-tabs mx-0"
            },
            [
              _c("li", { staticClass: "nav-item" }, [
                _c(
                  "a",
                  {
                    staticClass: "nav-link active show",
                    attrs: { href: "#card-bottom-tab1", "data-toggle": "tab" }
                  },
                  [
                    _c("i", { staticClass: "icon-file-pdf mr-2" }),
                    _vm._v(
                      "\n                            Documents\n                        "
                    )
                  ]
                )
              ])
            ]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "mr-3" }, [
      _c("i", { staticClass: "icon-file-pdf icon-3x" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "list-icons-item dropdown-toggle caret-0",
        attrs: {
          href: "#",
          "data-toggle": "dropdown",
          "aria-expanded": "false"
        }
      },
      [_c("i", { staticClass: "icon-menu7" })]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Frontend/DocumentsUpload.vue?vue&type=template&id=2cf29df3&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Frontend/DocumentsUpload.vue?vue&type=template&id=2cf29df3&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "col-md-12" }, [
    _vm._m(0),
    _vm._v(" "),
    _c("div", { staticClass: "card" }, [
      _c("div", { staticClass: "card-body" }, [
        _c("form", [
          _c("div", { staticClass: "form-group" }, [
            _vm._m(1),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.form.name,
                  expression: "form.name"
                }
              ],
              staticClass: "form-control",
              attrs: {
                type: "text",
                id: "name",
                name: "name",
                placeholder: "Document name. eg Financial Report for ..."
              },
              domProps: { value: _vm.form.name },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.form, "name", $event.target.value)
                }
              }
            })
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "form-group" }, [
            _vm._m(2),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.form.description,
                  expression: "form.description"
                }
              ],
              staticClass: "form-control",
              attrs: {
                type: "text",
                id: "description",
                name: "description",
                placeholder: "Enter description of the document."
              },
              domProps: { value: _vm.form.description },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.form, "description", $event.target.value)
                }
              }
            })
          ]),
          _vm._v(" "),
          _vm._m(3),
          _vm._v(" "),
          _vm._m(4)
        ])
      ]),
      _vm._v(" "),
      _vm._m(5)
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card" }, [
      _c(
        "div",
        {
          staticClass:
            "card-header bg-white pb-0 pt-sm-0 pr-sm-0 header-elements-sm-inline"
        },
        [
          _c("div", { staticClass: "header-elements" }, [
            _c(
              "ul",
              {
                staticClass:
                  "nav nav-tabs nav-tabs-bottom card-header-tabs mx-0"
              },
              [
                _c("li", { staticClass: "nav-item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "nav-link active show",
                      attrs: { href: "#card-bottom-tab1", "data-toggle": "tab" }
                    },
                    [
                      _c("i", { staticClass: "icon-file-pdf mr-2" }),
                      _vm._v(
                        "\n                            Documents\n                        "
                      )
                    ]
                  )
                ]),
                _vm._v(" "),
                _c("li", { staticClass: "nav-item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "nav-link",
                      attrs: { href: "#card-bottom-tab2", "data-toggle": "tab" }
                    },
                    [
                      _c("i", { staticClass: "icon-stack-picture mr-2" }),
                      _vm._v(
                        "\n                            Pictures\n                        "
                      )
                    ]
                  )
                ])
              ]
            )
          ])
        ]
      ),
      _vm._v(" "),
      _c("div", { staticClass: "card-body tab-content" }, [
        _c(
          "div",
          {
            staticClass: "tab-pane fade active show",
            attrs: { id: "card-bottom-tab1" }
          },
          [
            _vm._v(
              "\n                This is the first card tab content\n            "
            )
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "tab-pane fade", attrs: { id: "card-bottom-tab2" } },
          [
            _vm._v(
              "\n                This is the second card tab content\n            "
            )
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "tab-pane fade", attrs: { id: "card-bottom-tab3" } },
          [
            _vm._v(
              "\n                This is the third card tab content\n            "
            )
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "tab-pane fade", attrs: { id: "card-bottom-tab4" } },
          [
            _vm._v(
              "\n                This is the fourth card tab content\n            "
            )
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "name" } }, [
      _vm._v("Name: "),
      _c("span", { staticClass: "label text-danger small" }, [
        _vm._v("Required")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "description" } }, [
      _vm._v("Description: "),
      _c("span", { staticClass: "label text-success small" }, [
        _vm._v("Optional")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form-group" }, [
      _c("label", { attrs: { for: "file" } }, [
        _vm._v("File: "),
        _c("span", { staticClass: "label text-danger small" }, [
          _vm._v("required")
        ])
      ]),
      _vm._v(" "),
      _c("input", {
        staticClass: "form-control",
        attrs: { type: "file", id: "file", name: "file" }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "form-action d-flex justify-content-between align-items-center"
      },
      [
        _c(
          "a",
          {
            staticClass: "btn btn-light btn-sm",
            attrs: { type: "submit", href: "/f/documents" }
          },
          [_vm._v("Cancel")]
        ),
        _vm._v(" "),
        _c(
          "button",
          { staticClass: "btn bg-blue btn-sm", attrs: { type: "submit" } },
          [_vm._v("Submit"), _c("i", { staticClass: "icon-paperplane ml-2" })]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-footer" }, [
      _c(
        "span",
        { staticClass: "d-flex justify-content-center text-muted small" },
        [
          _c("i", { staticClass: "icon-info3" }),
          _vm._v(
            "\n                Document will be published after the system Administrator's approval"
          )
        ]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Frontend/Profile.vue?vue&type=template&id=073bfec3&scoped=true&":
/*!**************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Frontend/Profile.vue?vue&type=template&id=073bfec3&scoped=true& ***!
  \**************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "d-md-flex align-items-md-start" }, [
    _c(
      "div",
      {
        staticClass:
          " sidebar-light sidebar-component sidebar-component-left wmin-300 shadow-5 sidebar-expand-md"
      },
      [
        _c("div", { staticClass: "card" }, [
          _c(
            "div",
            {
              staticClass: "card-body text-center card-img-top ",
              staticStyle: {
                "background-image":
                  "url(http://demo.interface.club/limitless/assets/images/bg.png)",
                "background-size": "contain"
              }
            },
            [
              _c(
                "div",
                { staticClass: "card-img-actions d-inline-block mb-3" },
                [
                  _c("img", {
                    staticClass: "img-fluid rounded-circle",
                    attrs: {
                      src: _vm.avatar,
                      width: "190",
                      height: "190",
                      alt: ""
                    }
                  })
                ]
              ),
              _vm._v(" "),
              _c("h6", {
                staticClass: "font-weight-semibold mb-0",
                domProps: { textContent: _vm._s(_vm.user.username) }
              }),
              _vm._v(" "),
              _c("span", { staticClass: "d-block opacity-75" }, [
                _vm._v(_vm._s(this.user.employee.department.name))
              ])
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "card-body p-0" }, [
            _c("ul", { staticClass: "nav nav-sidebar mb-2" }, [
              _c("li", { staticClass: "nav-item-header" }, [
                _vm._v("Navigation")
              ]),
              _vm._v(" "),
              _vm._m(0),
              _vm._v(" "),
              _vm.user.id === _vm.authenticated.id
                ? _c("li", { staticClass: "nav-item" }, [_vm._m(1)])
                : _vm._e(),
              _vm._v(" "),
              _vm.user.id === _vm.authenticated.id
                ? _c("li", { staticClass: "nav-item" }, [_vm._m(2)])
                : _vm._e(),
              _vm._v(" "),
              _vm.user.id === _vm.authenticated.id
                ? _c("li", { staticClass: "nav-item" }, [_vm._m(3)])
                : _vm._e(),
              _vm._v(" "),
              _c("li", { staticClass: "nav-item-divider" })
            ])
          ])
        ])
      ]
    ),
    _vm._v(" "),
    _c("div", { staticClass: "tab-content w-100 " }, [
      _c(
        "div",
        { staticClass: "tab-pane fade active show", attrs: { id: "profile" } },
        [
          _c("div", { staticClass: "card" }, [
            _vm._m(4),
            _vm._v(" "),
            _c("div", { staticClass: "card-body" }, [
              _c("form", { attrs: { action: "#" } }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-6" }, [
                      _c("label", [_vm._v("Username")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.user.username,
                            expression: "user.username"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: { type: "text", readonly: "readonly" },
                        domProps: { value: _vm.user.username },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.user, "username", $event.target.value)
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-6" }, [
                      _c("label", { attrs: { for: "name" } }, [
                        _vm._v("Full name")
                      ]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.user.employee.name,
                            expression: "user.employee.name"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "text",
                          readonly: "readonly",
                          name: "name",
                          id: "name"
                        },
                        domProps: { value: _vm.user.employee.name },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.user.employee,
                              "name",
                              $event.target.value
                            )
                          }
                        }
                      })
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "form-group" }, [
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-4" }, [
                      _c("label", { attrs: { for: "address" } }, [
                        _vm._v("Address")
                      ]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.user.employee.physical_address,
                            expression: "user.employee.physical_address"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "text",
                          readonly: "readonly",
                          name: "address",
                          id: "address"
                        },
                        domProps: { value: _vm.user.employee.physical_address },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.user.employee,
                              "physical_address",
                              $event.target.value
                            )
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-4" }, [
                      _c("label", { attrs: { for: "email" } }, [
                        _vm._v("Email")
                      ]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.user.email,
                            expression: "user.email"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "text",
                          name: "email",
                          id: "email",
                          readonly: ""
                        },
                        domProps: { value: _vm.user.email },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.user, "email", $event.target.value)
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-4" }, [
                      _c("label", { attrs: { for: "telephone" } }, [
                        _vm._v("Telephone")
                      ]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.user.employee.telephone.telephone,
                            expression: "user.employee.telephone.telephone"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "text",
                          name: "telephone",
                          id: "telephone",
                          readonly: ""
                        },
                        domProps: {
                          value: _vm.user.employee.telephone.telephone
                        },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.user.employee.telephone,
                              "telephone",
                              $event.target.value
                            )
                          }
                        }
                      })
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "form-group" }, [
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-4" }, [
                      _c("label", { attrs: { for: "department_id" } }, [
                        _vm._v("Department")
                      ]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.user.employee.department.name,
                            expression: "user.employee.department.name"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "text",
                          name: "department_id",
                          id: "department_id",
                          readonly: ""
                        },
                        domProps: { value: _vm.user.employee.department.name },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.user.employee.department,
                              "name",
                              $event.target.value
                            )
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-4" }, [
                      _c("label", { attrs: { for: "designation_id" } }, [
                        _vm._v("Designation")
                      ]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.user.employee.designation,
                            expression: "user.employee.designation"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "text",
                          name: "designation_id",
                          id: "designation_id",
                          readonly: ""
                        },
                        domProps: { value: _vm.user.employee.designation },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.user.employee,
                              "designation",
                              $event.target.value
                            )
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-4" }, [
                      _c("label", { attrs: { for: "date_employed" } }, [
                        _vm._v("Date of Employement")
                      ]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.user.employee.date_employed,
                            expression: "user.employee.date_employed"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "text",
                          name: "date_employed",
                          id: "date_employed",
                          readonly: ""
                        },
                        domProps: { value: _vm.user.employee.date_employed },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.user.employee,
                              "date_employed",
                              $event.target.value
                            )
                          }
                        }
                      })
                    ])
                  ])
                ]),
                _vm._v(" "),
                _vm.user.id === _vm.authenticated.id
                  ? _c("div", [
                      _c("div", { staticClass: "form-group" }, [
                        _c("div", { staticClass: "row" }, [
                          _c("div", { staticClass: "col-md-3" }, [
                            _c("label", { attrs: { for: "kra_pin" } }, [
                              _vm._v("KRA PIN")
                            ]),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.user.employee.kra_pin,
                                  expression: "user.employee.kra_pin"
                                }
                              ],
                              staticClass: "form-control",
                              attrs: {
                                type: "text",
                                name: "kra_pin",
                                id: "kra_pin",
                                readonly: ""
                              },
                              domProps: { value: _vm.user.employee.kra_pin },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.user.employee,
                                    "kra_pin",
                                    $event.target.value
                                  )
                                }
                              }
                            })
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-md-3" }, [
                            _c("label", { attrs: { for: "nhif_no" } }, [
                              _vm._v("NHIF no")
                            ]),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.user.employee.nhif_no,
                                  expression: "user.employee.nhif_no"
                                }
                              ],
                              staticClass: "form-control",
                              attrs: {
                                type: "text",
                                name: "nhif_no",
                                id: "nhif_no",
                                readonly: ""
                              },
                              domProps: { value: _vm.user.employee.nhif_no },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.user.employee,
                                    "nhif_no",
                                    $event.target.value
                                  )
                                }
                              }
                            })
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-md-3" }, [
                            _c("label", { attrs: { for: "nssf_no" } }, [
                              _vm._v("NSSF no")
                            ]),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.user.employee.nssf_no,
                                  expression: "user.employee.nssf_no"
                                }
                              ],
                              staticClass: "form-control",
                              attrs: {
                                type: "text",
                                name: "nssf_no",
                                id: "nssf_no",
                                readonly: ""
                              },
                              domProps: { value: _vm.user.employee.nssf_no },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.user.employee,
                                    "nssf_no",
                                    $event.target.value
                                  )
                                }
                              }
                            })
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-md-3" }, [
                            _c("label", { attrs: { for: "bank_account_no" } }, [
                              _vm._v("Bank Account ")
                            ]),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.user.employee.bank_account_no,
                                  expression: "user.employee.bank_account_no"
                                }
                              ],
                              staticClass: "form-control",
                              attrs: {
                                type: "text",
                                name: "bank_account_no",
                                id: "bank_account_no",
                                readonly: ""
                              },
                              domProps: {
                                value: _vm.user.employee.bank_account_no
                              },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.user.employee,
                                    "bank_account_no",
                                    $event.target.value
                                  )
                                }
                              }
                            })
                          ])
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "form-group" }, [
                        _c("div", { staticClass: "row" }, [
                          _c("div", { staticClass: "col-md-6" }, [
                            _c("label", [_vm._v("Upload profile image")]),
                            _vm._v(" "),
                            _c("input", {
                              attrs: {
                                type: "file",
                                name: "avatar",
                                accept: "image/*"
                              },
                              on: { change: _vm.onChange }
                            }),
                            _vm._v(" "),
                            _c(
                              "span",
                              { staticClass: "form-text text-muted" },
                              [
                                _vm._v(
                                  "Accepted formats: gif, png, jpg. Max file size 2Mb"
                                )
                              ]
                            )
                          ])
                        ])
                      ])
                    ])
                  : _vm._e()
              ])
            ])
          ])
        ]
      ),
      _vm._v(" "),
      _c("div", { staticClass: "tab-pane fade", attrs: { id: "settings" } }, [
        _c("div", { staticClass: "card" }, [
          _vm._m(5),
          _vm._v(" "),
          _c("div", { staticClass: "card-body" }, [
            _c(
              "form",
              {
                attrs: { action: "#" },
                on: {
                  submit: function($event) {
                    $event.preventDefault()
                    return _vm.onSubmit($event)
                  },
                  keydown: function($event) {
                    return _vm.form.errors.clear($event.target.name)
                  }
                }
              },
              [
                _c("div", { staticClass: "form-group" }, [
                  this.message
                    ? _c("div", { class: this.messageClass }, [
                        _vm._m(6),
                        _vm._v(" "),
                        _c("span", {
                          staticClass: "font-weight-semibold",
                          domProps: { textContent: _vm._s(this.message) }
                        })
                      ])
                    : _vm._e(),
                  _vm._v(" "),
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-6" }, [
                      _c("label", [_vm._v("Username")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.user.username,
                            expression: "user.username"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "text",
                          name: "username",
                          readonly: "readonly"
                        },
                        domProps: { value: _vm.user.username },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.user, "username", $event.target.value)
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-6" }, [
                      _c("label", [_vm._v("Email")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.user.email,
                            expression: "user.email"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: { type: "email", readonly: "readonly" },
                        domProps: { value: _vm.user.email },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.user, "email", $event.target.value)
                          }
                        }
                      })
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "form-group" }, [
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-6" }, [
                      _c("label", [_vm._v("New password")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.form.password,
                            expression: "form.password"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "password",
                          placeholder: "Enter new password",
                          name: "password"
                        },
                        domProps: { value: _vm.form.password },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.form, "password", $event.target.value)
                          }
                        }
                      }),
                      _vm._v(" "),
                      _vm.form.errors.has("password")
                        ? _c("label", {
                            staticClass: "validation-invalid-label",
                            domProps: {
                              textContent: _vm._s(
                                _vm.form.errors.first("password")
                              )
                            }
                          })
                        : _vm._e()
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-6" }, [
                      _c("label", [_vm._v("Repeat password")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.form.password_confirmation,
                            expression: "form.password_confirmation"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "password",
                          placeholder: "Repeat new password",
                          name: "password_confirmation"
                        },
                        domProps: { value: _vm.form.password_confirmation },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.form,
                              "password_confirmation",
                              $event.target.value
                            )
                          }
                        }
                      }),
                      _vm._v(" "),
                      _vm.form.errors.has("password_confirmation")
                        ? _c("label", {
                            staticClass: "validation-invalid-label",
                            domProps: {
                              textContent: _vm._s(
                                _vm.form.errors.first("password_confirmation")
                              )
                            }
                          })
                        : _vm._e()
                    ])
                  ])
                ]),
                _vm._v(" "),
                _vm._m(7)
              ]
            )
          ])
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "tab-pane fade", attrs: { id: "biometric" } }, [
        _c("div", { staticClass: "card" }, [
          _vm._m(8),
          _vm._v(" "),
          _c(
            "table",
            {
              staticClass: "table table-condensed table-xs table-border-dashed"
            },
            [
              _vm._m(9),
              _vm._v(" "),
              _c(
                "tbody",
                _vm._l(_vm.biometricData, function(biometric) {
                  return _c(
                    "tr",
                    {
                      class: {
                        "table-success": biometric.In_Out_Flag === "Check in"
                      }
                    },
                    [
                      _c("td", {
                        domProps: { textContent: _vm._s(biometric.Emp_Id) }
                      }),
                      _vm._v(" "),
                      _c("td", {
                        domProps: { textContent: _vm._s(biometric.For_Date) }
                      }),
                      _vm._v(" "),
                      _c("td", {
                        domProps: { textContent: _vm._s(biometric.In_Duration) }
                      }),
                      _vm._v(" "),
                      _c("td", {
                        domProps: { textContent: _vm._s(biometric.In_Out_Flag) }
                      })
                    ]
                  )
                }),
                0
              )
            ]
          )
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "tab-pane fade", attrs: { id: "payslip" } }, [
        _c("div", { staticClass: "card", attrs: { id: "payroll_details" } }, [
          _c(
            "div",
            {
              staticClass: "card-header bg-transparent header-elements-inline"
            },
            [
              _c("h6", { staticClass: "card-title" }, [
                _vm._v(" Latest Payroll")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "header-elements" }, [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-light btn-sm ml-3",
                    attrs: { type: "button" },
                    on: { click: _vm.printPayslip }
                  },
                  [
                    _c("i", { staticClass: "icon-file-download mr-2" }),
                    _vm._v(
                      "\n                            Download\n                        "
                    )
                  ]
                )
              ])
            ]
          ),
          _vm._v(" "),
          _vm._m(10),
          _vm._v(" "),
          _c("div", { staticClass: "card-body" }, [
            _c("div", { staticClass: "d-md-flex flex-md-wrap" }, [
              _c("div", { staticClass: "col-md-6" }, [
                _c("div", [
                  _c("ul", { staticClass: "list list-unstyled mb-0" }, [
                    _c("li", [_vm._v("NAME: Muhyadin Abdullahi")]),
                    _vm._v(" "),
                    _c("li", [
                      _vm._v("STAFF NO: " + _vm._s(_vm.user.employee.staff_no))
                    ]),
                    _vm._v(" "),
                    _c("li", [_vm._v("MONTH: OCTOBER 2017")]),
                    _vm._v(" "),
                    _c("li", [_vm._v("BANK: EQUITY")]),
                    _vm._v(" "),
                    _c("li", [_vm._v("BRANCH: NKURUMAH ROAD 12020")])
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-6" }, [
                _c("div", [
                  _c("ul", { staticClass: "list list-unstyled mb-0" }, [
                    _c("li", [
                      _vm._v("PIN: " + _vm._s(_vm.user.employee.kra_pin))
                    ]),
                    _vm._v(" "),
                    _c("li", [
                      _vm._v("NSSF: " + _vm._s(_vm.user.employee.nssf_no))
                    ]),
                    _vm._v(" "),
                    _c("li", [
                      _vm._v("NHIF: " + _vm._s(_vm.user.employee.nhif_no))
                    ]),
                    _vm._v(" "),
                    _c("li", [
                      _vm._v(
                        "ACCOUNT: " + _vm._s(_vm.user.employee.bank_account_no)
                      )
                    ])
                  ])
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "card-body" }),
          _vm._v(" "),
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-md-12" }, [
              _c(
                "table",
                {
                  staticClass:
                    "table table-border-dashed text-nowrap table-customers"
                },
                [
                  _vm._m(11),
                  _vm._v(" "),
                  _c("tbody", [
                    _c("tr", [
                      _c("td", [_vm._v("BASIC PAY")]),
                      _vm._v(" "),
                      _c("td", [_vm._v(_vm._s(_vm.payroll[0].basic_pay))])
                    ])
                  ])
                ]
              )
            ]),
            _vm._v(" "),
            _c("hr"),
            _vm._v(" "),
            _c("div", { staticClass: "col-md-12" }, [
              _c(
                "table",
                {
                  staticClass:
                    "table table-border-dashed text-nowrap table-customers"
                },
                [
                  _vm._m(12),
                  _vm._v(" "),
                  _c(
                    "tbody",
                    [
                      _c("tr", [
                        _c("td", [_vm._v("PAYE")]),
                        _vm._v(" "),
                        _c("td", [_vm._v(_vm._s(_vm.payroll[0].paye))])
                      ]),
                      _vm._v(" "),
                      _c("tr", [
                        _c("td", [_vm._v("NHIF")]),
                        _vm._v(" "),
                        _c("td", [_vm._v(_vm._s(_vm.payroll[0].nhif))])
                      ]),
                      _vm._v(" "),
                      _c("tr", [
                        _c("td", [_vm._v("NSSF")]),
                        _vm._v(" "),
                        _c("td", [_vm._v(_vm._s(_vm.payroll[0].nssf))])
                      ]),
                      _vm._v(" "),
                      _vm._l(_vm.deductions, function(deduction) {
                        return _c("tr", [
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(deduction.deduction.name)
                            }
                          }),
                          _vm._v(" "),
                          _c("td", {
                            domProps: { textContent: _vm._s(deduction.amount) }
                          })
                        ])
                      })
                    ],
                    2
                  )
                ]
              )
            ])
          ]),
          _vm._v(" "),
          _c("hr"),
          _vm._v(" "),
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-md-6" }, [
              _c(
                "table",
                {
                  staticClass:
                    "table table-border-dashed text-nowrap table-customers"
                },
                [
                  _c("tbody", [
                    _c("tr", [
                      _c("td", [_vm._v(" TOTAL EARNINGS")]),
                      _vm._v(" "),
                      _c("td", [
                        _vm._v(" " + _vm._s(_vm.payroll[0].gross_paye))
                      ])
                    ]),
                    _vm._v(" "),
                    _c("tr", [
                      _c("td", [_vm._v("NET PAY")]),
                      _vm._v(" "),
                      _c("td", [_vm._v(_vm._s(_vm.payroll[0].net_pay))])
                    ])
                  ])
                ]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-md-6" }, [
              _c(
                "table",
                {
                  staticClass:
                    "table table-border-dashed text-nowrap table-customers"
                },
                [
                  _c("tbody", [
                    _c("tr", [
                      _c("td", [_vm._v("TOTAL DEDUCTIONS")]),
                      _vm._v(" "),
                      _c("td", [
                        _vm._v(_vm._s(_vm.payroll[0].total_deductions))
                      ])
                    ]),
                    _vm._v(" "),
                    _c("tr", [
                      _c("td", [_vm._v("RELIEF")]),
                      _vm._v(" "),
                      _c("td", [_vm._v(_vm._s(_vm.payroll[0].tax_relief))])
                    ])
                  ])
                ]
              )
            ])
          ])
        ])
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("li", { staticClass: "nav-item" }, [
      _c(
        "a",
        {
          staticClass: "nav-link active",
          attrs: { href: "#profile", "data-toggle": "tab" }
        },
        [
          _c("i", { staticClass: "icon-user" }),
          _vm._v(
            "\n                            Profile\n                        "
          )
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "nav-link",
        attrs: { href: "#biometric", "data-toggle": "tab" }
      },
      [
        _c("i", { staticClass: "icon-touch" }),
        _vm._v(
          "\n                            Biometric\n                        "
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "nav-link",
        attrs: { href: "#settings", "data-toggle": "tab" }
      },
      [
        _c("i", { staticClass: "icon-wrench" }),
        _vm._v(
          "\n                            Account Settings\n                        "
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "nav-link",
        attrs: { href: "#payslip", "data-toggle": "tab" }
      },
      [
        _c("i", { staticClass: "icon-cash" }),
        _vm._v(
          "\n                            Payslip\n                        "
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-header header-elements-inline" }, [
      _c("h5", { staticClass: "card-title" }, [_vm._v("Profile information")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-header header-elements-inline" }, [
      _c("h5", { staticClass: "card-title" }, [_vm._v("Account settings")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "text-right" }, [
      _c(
        "button",
        { staticClass: "btn btn-primary", attrs: { type: "submit" } },
        [_vm._v("Save changes")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-header header-elements-inline" }, [
      _c("h6", { staticClass: "card-title" }, [
        _vm._v("Biometric clock-in details")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("#")]),
        _vm._v(" "),
        _c("th", [_vm._v("Date / Time")]),
        _vm._v(" "),
        _c("th", [_vm._v("Hours worked")]),
        _vm._v(" "),
        _c("th", [_vm._v("Action")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-body" }, [
      _c("div", { staticClass: "d-md-flex flex-md-wrap" }, [
        _c("div", { staticClass: "col-md-6" }, [
          _c("div", [
            _c("ul", { staticClass: "list list-unstyled mb-0" }, [
              _c("li", [_vm._v("MEWA HOSPITAL")]),
              _vm._v(" "),
              _c("li", [_vm._v("P.O Box 98591")]),
              _vm._v(" "),
              _c("li", [_vm._v("020088533, 0788921477")]),
              _vm._v(" "),
              _c("li", [_vm._v("020088533, 0788921477")]),
              _vm._v(" "),
              _c("li", [_vm._v("mewahospital@mewa.or.ke")])
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-md-3 offset-3 " }, [
          _c("div", [
            _c("img", {
              staticClass: "mb-3 mt-2",
              staticStyle: { width: "150px" },
              attrs: { src: "/img/logo_35.jpg", alt: "" }
            })
          ])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("EARNINGS")]),
        _vm._v(" "),
        _c("th", [_vm._v("AMOUNT")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("DEDUCTIONS")]),
        _vm._v(" "),
        _c("th", [_vm._v("AMOUNT")])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/NewComment.vue?vue&type=template&id=768aae96&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/NewComment.vue?vue&type=template&id=768aae96& ***!
  \********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "card-body" }, [
    _c("h6", { staticClass: "mb-3" }, [_vm._v("Add comment")]),
    _vm._v(" "),
    _c("div", { staticClass: "mb-3" }, [
      _c("textarea", {
        directives: [
          {
            name: "model",
            rawName: "v-model",
            value: _vm.comment_body,
            expression: "comment_body"
          }
        ],
        staticClass: "form-control",
        attrs: {
          name: "comment_body",
          rows: "5",
          id: "body",
          required: "",
          placeholder: "Have something to say?"
        },
        domProps: { value: _vm.comment_body },
        on: {
          input: function($event) {
            if ($event.target.composing) {
              return
            }
            _vm.comment_body = $event.target.value
          }
        }
      })
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "text-right" }, [
      _c(
        "button",
        {
          staticClass: "btn bg-blue",
          attrs: { type: "button" },
          on: { click: _vm.addComment }
        },
        [
          _c("i", { staticClass: "icon-plus22 mr-1" }),
          _vm._v(" Add comment\n        ")
        ]
      )
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Notifications.vue?vue&type=template&id=5db11841&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Notifications.vue?vue&type=template&id=5db11841&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.notifications.length
    ? _c("li", { staticClass: "nav-item dropdown" }, [
        _vm._m(0),
        _vm._v(" "),
        _c(
          "div",
          {
            staticClass:
              "dropdown-menu dropdown-menu-right dropdown-content wmin-md-350"
          },
          [
            _vm._m(1),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "dropdown-content-body dropdown-scrollable" },
              [
                _c(
                  "ul",
                  { staticClass: "media-list" },
                  _vm._l(_vm.notifications, function(notification) {
                    return _c("li", { staticClass: "media" }, [
                      _c("div", { staticClass: "media-body" }, [
                        _c("div", { staticClass: "media-title" }, [
                          _c("a", { attrs: { href: "#" } }, [
                            _c(
                              "span",
                              { staticClass: "font-weight-semibold" },
                              [_vm._v(" " + _vm._s(notification.data.user))]
                            ),
                            _vm._v(" "),
                            _c(
                              "span",
                              {
                                staticClass:
                                  "text-muted float-right font-size-sm"
                              },
                              [_vm._v(_vm._s(notification.data.date))]
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("span", { staticClass: "text-muted" }, [
                          _vm._v(_vm._s(notification.data.message) + ".  "),
                          _c(
                            "a",
                            {
                              attrs: { href: notification.data.link },
                              on: {
                                click: function($event) {
                                  return _vm.markAsRead(notification)
                                }
                              }
                            },
                            [_vm._v("Link ")]
                          )
                        ])
                      ])
                    ])
                  }),
                  0
                )
              ]
            )
          ]
        )
      ])
    : _vm._e()
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "navbar-nav-link dropdown-toggle caret-0",
        attrs: { href: "#", "data-toggle": "dropdown" }
      },
      [
        _c("i", { staticClass: "icon-bell2" }),
        _vm._v(" "),
        _c("span", { staticClass: "d-md-none ml-2" }, [_vm._v("Notifications")])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "dropdown-content-header" }, [
      _c("span", { staticClass: "font-weight-semibold" }, [
        _vm._v("Notifications")
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Paginator.vue?vue&type=template&id=74bc836a&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Paginator.vue?vue&type=template&id=74bc836a& ***!
  \*******************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.shouldPaginate
    ? _c(
        "ul",
        {
          staticClass:
            "pagination-separated justify-content-center twbs-separated pagination"
        },
        [
          _c(
            "li",
            {
              directives: [
                {
                  name: "show",
                  rawName: "v-show",
                  value: _vm.prevUrl,
                  expression: "prevUrl"
                }
              ],
              staticClass: "page-item prev "
            },
            [
              _c(
                "a",
                {
                  staticClass: "page-link",
                  attrs: { href: "#", rel: "prev" },
                  on: {
                    click: function($event) {
                      $event.preventDefault()
                      _vm.page--
                    }
                  }
                },
                [_vm._v("Prev")]
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "li",
            {
              directives: [
                {
                  name: "show",
                  rawName: "v-show",
                  value: _vm.nextUrl,
                  expression: "nextUrl"
                }
              ],
              staticClass: "page-item next"
            },
            [
              _c(
                "a",
                {
                  staticClass: "page-link",
                  attrs: { href: "#", rel: "next" },
                  on: {
                    click: function($event) {
                      $event.preventDefault()
                      _vm.page++
                    }
                  }
                },
                [_vm._v("Next")]
              )
            ]
          )
        ]
      )
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/User/Activate.vue?vue&type=template&id=fd0e92a0&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/User/Activate.vue?vue&type=template&id=fd0e92a0&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "row" }, [
    _c("div", { staticClass: "col-md-3" }, [
      _c("div", { staticClass: "card" }, [
        _vm._m(0),
        _vm._v(" "),
        _c("div", { staticClass: "card-body" }, [
          _c(
            "form",
            {
              on: {
                submit: function($event) {
                  $event.preventDefault()
                  return _vm.searchEmployee($event)
                }
              }
            },
            [
              _c(
                "div",
                {
                  staticClass:
                    "form-group form-group-feedback form-group-feedback-left"
                },
                [
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.searchID,
                        expression: "searchID"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "National ID",
                      name: "field"
                    },
                    domProps: { value: _vm.searchID },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.searchID = $event.target.value
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm._m(1)
                ]
              ),
              _vm._v(" "),
              _vm._m(2)
            ]
          )
        ])
      ])
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "col-md-9" }, [
      _c(
        "form",
        {
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.onSubmit($event)
            },
            keydown: function($event) {
              return _vm.form.errors.clear($event.target.name)
            }
          }
        },
        [
          _c("div", { staticClass: "card" }, [
            _c("div", { staticClass: "card-body" }, [
              _c("h6", { staticClass: "font-weight-semibold mb-3" }, [
                _vm._v("Account details")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-4" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _vm._m(3),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.username,
                          expression: "form.username"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "text",
                        name: "username",
                        id: "username",
                        placeholder: "choose a unique username"
                      },
                      domProps: { value: _vm.form.username },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "username", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _vm.form.errors.has("username")
                      ? _c("label", {
                          staticClass: "validation-invalid-label",
                          domProps: {
                            textContent: _vm._s(
                              _vm.form.errors.first("username")
                            )
                          }
                        })
                      : _vm._e()
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-4" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _vm._m(4),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.email,
                          expression: "form.email"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "email",
                        name: "email",
                        id: "email",
                        placeholder: "example@mewa.or.ke"
                      },
                      domProps: { value: _vm.form.email },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "email", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _vm.form.errors.has("email")
                      ? _c("label", {
                          staticClass: "validation-invalid-label",
                          domProps: {
                            textContent: _vm._s(_vm.form.errors.first("email"))
                          }
                        })
                      : _vm._e()
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-4" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", { attrs: { for: "national_id_no" } }, [
                      _vm._v("ID no")
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.national_id_no,
                          expression: "form.national_id_no"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "text",
                        placeholder: "National ID",
                        name: "national_id_no",
                        id: "national_id_no"
                      },
                      domProps: { value: _vm.form.national_id_no },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.form,
                            "national_id_no",
                            $event.target.value
                          )
                        }
                      }
                    }),
                    _vm._v(" "),
                    _vm.form.errors.has("national_id_no")
                      ? _c("label", {
                          staticClass: "validation-invalid-label",
                          domProps: {
                            textContent: _vm._s(
                              _vm.form.errors.first("national_id_no")
                            )
                          }
                        })
                      : _vm._e()
                  ])
                ])
              ])
            ]),
            _vm._v(" "),
            this.employeeDetails
              ? _c("div", { staticClass: "card-body" }, [
                  _c("h6", { staticClass: "font-weight-semibold mb-3" }, [
                    _vm._v("Employee details")
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-6" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", { attrs: { for: "name" } }, [
                          _vm._v("Full name")
                        ]),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.name,
                              expression: "form.name"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            placeholder: "Full name ",
                            name: "name",
                            id: "name"
                          },
                          domProps: { value: _vm.form.name },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(_vm.form, "name", $event.target.value)
                            }
                          }
                        }),
                        _vm._v(" "),
                        _vm.form.errors.has("name")
                          ? _c("label", {
                              staticClass: "validation-invalid-label",
                              domProps: {
                                textContent: _vm._s(
                                  _vm.form.errors.first("name")
                                )
                              }
                            })
                          : _vm._e()
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-3" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", { attrs: { for: "national_id_no" } }, [
                          _vm._v("ID no")
                        ]),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.national_id_no,
                              expression: "form.national_id_no"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            placeholder: "National ID",
                            name: "national_id_no"
                          },
                          domProps: { value: _vm.form.national_id_no },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "national_id_no",
                                $event.target.value
                              )
                            }
                          }
                        }),
                        _vm._v(" "),
                        _vm.form.errors.has("national_id_no")
                          ? _c("label", {
                              staticClass: "validation-invalid-label",
                              domProps: {
                                textContent: _vm._s(
                                  _vm.form.errors.first("national_id_no")
                                )
                              }
                            })
                          : _vm._e()
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-3" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", { attrs: { for: "gender" } }, [
                          _vm._v("Gender")
                        ]),
                        _vm._v(" "),
                        _c(
                          "select",
                          {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.form.gender,
                                expression: "form.gender"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: { name: "gender", id: "gender" },
                            on: {
                              change: function($event) {
                                var $$selectedVal = Array.prototype.filter
                                  .call($event.target.options, function(o) {
                                    return o.selected
                                  })
                                  .map(function(o) {
                                    var val = "_value" in o ? o._value : o.value
                                    return val
                                  })
                                _vm.$set(
                                  _vm.form,
                                  "gender",
                                  $event.target.multiple
                                    ? $$selectedVal
                                    : $$selectedVal[0]
                                )
                              }
                            }
                          },
                          _vm._l(_vm.genderList, function(gender) {
                            return _c(
                              "option",
                              { domProps: { value: gender.value } },
                              [
                                _vm._v(
                                  "\n                                            " +
                                    _vm._s(gender.label) +
                                    "\n                                        "
                                )
                              ]
                            )
                          }),
                          0
                        ),
                        _vm._v(" "),
                        _vm.form.errors.has("gender")
                          ? _c("label", {
                              staticClass: "validation-invalid-label",
                              domProps: {
                                textContent: _vm._s(
                                  _vm.form.errors.first("gender")
                                )
                              }
                            })
                          : _vm._e()
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-3" }, [
                      _c(
                        "div",
                        { staticClass: "form-group" },
                        [
                          _c("DatePicker", {
                            attrs: { label: "DOB", name: "dob" },
                            model: {
                              value: _vm.form.dob,
                              callback: function($$v) {
                                _vm.$set(_vm.form, "dob", $$v)
                              },
                              expression: "form.dob"
                            }
                          })
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _vm.form.errors.has("dob")
                        ? _c("label", {
                            staticClass: "validation-invalid-label",
                            domProps: {
                              textContent: _vm._s(_vm.form.errors.first("dob"))
                            }
                          })
                        : _vm._e()
                    ]),
                    _vm._v(" "),
                    _vm._m(5)
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-3" }, [
                      _c(
                        "div",
                        { staticClass: "form-group" },
                        [
                          _c("DatePicker", {
                            attrs: {
                              label: "Employment Date",
                              name: "date_employed"
                            },
                            model: {
                              value: _vm.form.date_employed,
                              callback: function($$v) {
                                _vm.$set(_vm.form, "date_employed", $$v)
                              },
                              expression: "form.date_employed"
                            }
                          }),
                          _vm._v(" "),
                          _vm.form.errors.has("date_employed")
                            ? _c("label", {
                                staticClass: "validation-invalid-label",
                                domProps: {
                                  textContent: _vm._s(
                                    _vm.form.errors.first("date_employed")
                                  )
                                }
                              })
                            : _vm._e()
                        ],
                        1
                      )
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-3" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _vm._m(6),
                        _vm._v(" "),
                        _c(
                          "select",
                          {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.form.department_id,
                                expression: "form.department_id"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: { name: "department_id", id: "department" },
                            on: {
                              change: function($event) {
                                var $$selectedVal = Array.prototype.filter
                                  .call($event.target.options, function(o) {
                                    return o.selected
                                  })
                                  .map(function(o) {
                                    var val = "_value" in o ? o._value : o.value
                                    return val
                                  })
                                _vm.$set(
                                  _vm.form,
                                  "department_id",
                                  $event.target.multiple
                                    ? $$selectedVal
                                    : $$selectedVal[0]
                                )
                              }
                            }
                          },
                          _vm._l(_vm.departments, function(department) {
                            return _c(
                              "option",
                              { domProps: { value: department.id } },
                              [
                                _vm._v(
                                  "\n                                            " +
                                    _vm._s(department.name) +
                                    "\n                                        "
                                )
                              ]
                            )
                          }),
                          0
                        ),
                        _vm._v(" "),
                        _vm.form.errors.has("department_id")
                          ? _c("label", {
                              staticClass: "validation-invalid-label",
                              domProps: {
                                textContent: _vm._s(
                                  _vm.form.errors.first("department_id")
                                )
                              }
                            })
                          : _vm._e()
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-3" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _vm._m(7),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.designation,
                              expression: "form.designation"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            placeholder: "Designation",
                            name: "designation",
                            id: "designation"
                          },
                          domProps: { value: _vm.form.designation },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "designation",
                                $event.target.value
                              )
                            }
                          }
                        }),
                        _vm._v(" "),
                        _vm.form.errors.has("designation")
                          ? _c("label", {
                              staticClass: "validation-invalid-label",
                              domProps: {
                                textContent: _vm._s(
                                  _vm.form.errors.first("designation")
                                )
                              }
                            })
                          : _vm._e()
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-3" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _vm._m(8),
                        _vm._v(" "),
                        _c(
                          "select",
                          {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.form.employee_type_id,
                                expression: "form.employee_type_id"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              name: "department_id",
                              id: "employee_type_id",
                              placeholder: "Choose your currrent Department"
                            },
                            on: {
                              change: function($event) {
                                var $$selectedVal = Array.prototype.filter
                                  .call($event.target.options, function(o) {
                                    return o.selected
                                  })
                                  .map(function(o) {
                                    var val = "_value" in o ? o._value : o.value
                                    return val
                                  })
                                _vm.$set(
                                  _vm.form,
                                  "employee_type_id",
                                  $event.target.multiple
                                    ? $$selectedVal
                                    : $$selectedVal[0]
                                )
                              }
                            }
                          },
                          _vm._l(_vm.employeeType, function(type) {
                            return _c(
                              "option",
                              { domProps: { value: type.id } },
                              [
                                _vm._v(
                                  _vm._s(type.name) +
                                    "\n                                        "
                                )
                              ]
                            )
                          }),
                          0
                        )
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-3" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", { attrs: { for: "nssf_no" } }, [
                          _vm._v("NSSF No")
                        ]),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.nssf_no,
                              expression: "form.nssf_no"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            placeholder: "NSSF No",
                            name: "nssf_no",
                            id: "nssf_no"
                          },
                          domProps: { value: _vm.form.nssf_no },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(_vm.form, "nssf_no", $event.target.value)
                            }
                          }
                        }),
                        _vm._v(" "),
                        _vm.form.errors.has("nssf_no")
                          ? _c("label", {
                              staticClass: "validation-invalid-label",
                              domProps: {
                                textContent: _vm._s(
                                  _vm.form.errors.first("nssf_no")
                                )
                              }
                            })
                          : _vm._e()
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-3" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", { attrs: { for: "nhif_no" } }, [
                          _vm._v("NHIF No")
                        ]),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.nhif_no,
                              expression: "form.nhif_no"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            placeholder: "NHIF No",
                            name: "nhif_no",
                            id: "nhif_no"
                          },
                          domProps: { value: _vm.form.nhif_no },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(_vm.form, "nhif_no", $event.target.value)
                            }
                          }
                        }),
                        _vm._v(" "),
                        _vm.form.errors.has("nhif_no")
                          ? _c("label", {
                              staticClass: "validation-invalid-label",
                              domProps: {
                                textContent: _vm._s(
                                  _vm.form.errors.first("nhif_no")
                                )
                              }
                            })
                          : _vm._e()
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-3" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", { attrs: { for: "kra_pin" } }, [
                          _vm._v("KRA Pin")
                        ]),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.kra_pin,
                              expression: "form.kra_pin"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            placeholder: "KRA Pin",
                            name: "kra_pin",
                            id: "kra_pin"
                          },
                          domProps: { value: _vm.form.kra_pin },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(_vm.form, "kra_pin", $event.target.value)
                            }
                          }
                        }),
                        _vm._v(" "),
                        _vm.form.errors.has("kra_pin")
                          ? _c("label", {
                              staticClass: "validation-invalid-label",
                              domProps: {
                                textContent: _vm._s(
                                  _vm.form.errors.first("kra_pin")
                                )
                              }
                            })
                          : _vm._e()
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-3" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c("label", { attrs: { for: "kra_pin" } }, [
                          _vm._v("Bank account")
                        ]),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.bank_account_no,
                              expression: "form.bank_account_no"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            placeholder: "Bank Account",
                            name: "bank_account_no",
                            id: "bank_account_no"
                          },
                          domProps: { value: _vm.form.bank_account_no },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "bank_account_no",
                                $event.target.value
                              )
                            }
                          }
                        }),
                        _vm._v(" "),
                        _vm.form.errors.has("bank_account_no")
                          ? _c("label", {
                              staticClass: "validation-invalid-label",
                              domProps: {
                                textContent: _vm._s(
                                  _vm.form.errors.first("bank_account_no")
                                )
                              }
                            })
                          : _vm._e()
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-5" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c("div", { staticClass: "input-group" }, [
                          _c("input", {
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              name: "biometric_search",
                              placeholder: "Search employee Biometric Code ",
                              id: "biometric_search"
                            }
                          }),
                          _vm._v(" "),
                          _c("span", { staticClass: "input-group-append" }, [
                            _c(
                              "button",
                              {
                                staticClass: "btn btn-light",
                                attrs: { type: "button" },
                                on: { click: _vm.searchBioCode }
                              },
                              [_vm._v("Search")]
                            )
                          ])
                        ])
                      ]),
                      _vm._v(" "),
                      _vm.biometricResult
                        ? _c(
                            "div",
                            { staticClass: "form-group mt-2" },
                            [
                              _c(
                                "label",
                                { staticClass: "font-weight-semibold" },
                                [_vm._v("Results:")]
                              ),
                              _vm._v(" "),
                              _vm._l(_vm.biometricResult, function(result) {
                                return _c(
                                  "div",
                                  { staticClass: "form-check" },
                                  [
                                    _c(
                                      "label",
                                      { staticClass: "form-check-label" },
                                      [
                                        _c("input", {
                                          directives: [
                                            {
                                              name: "model",
                                              rawName: "v-model",
                                              value: _vm.form.biometric_code,
                                              expression: "form.biometric_code"
                                            }
                                          ],
                                          staticClass: "form-check-input",
                                          attrs: {
                                            type: "radio",
                                            name: "unstyled-radio-left"
                                          },
                                          domProps: {
                                            value: result.Emp_Code,
                                            checked: _vm._q(
                                              _vm.form.biometric_code,
                                              result.Emp_Code
                                            )
                                          },
                                          on: {
                                            change: function($event) {
                                              return _vm.$set(
                                                _vm.form,
                                                "biometric_code",
                                                result.Emp_Code
                                              )
                                            }
                                          }
                                        }),
                                        _vm._v(
                                          "\n                                            Name: " +
                                            _vm._s(result.Emp_Name) +
                                            ". Code: " +
                                            _vm._s(result.Emp_Code) +
                                            "\n                                        "
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm.form.errors.has("biometric_code")
                                      ? _c("label", {
                                          staticClass:
                                            "validation-invalid-label",
                                          domProps: {
                                            textContent: _vm._s(
                                              _vm.form.errors.first(
                                                "biometric_code"
                                              )
                                            )
                                          }
                                        })
                                      : _vm._e()
                                  ]
                                )
                              })
                            ],
                            2
                          )
                        : _vm._e()
                    ])
                  ]),
                  _vm._v(" "),
                  _vm._m(9)
                ])
              : _vm._e()
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-12" }, [
            this.message
              ? _c("div", { class: this.messageClass }, [
                  _vm._m(10),
                  _vm._v(" "),
                  _c("span", {
                    staticClass: "font-weight-semibold",
                    domProps: { textContent: _vm._s(this.message) }
                  })
                ])
              : _vm._e()
          ])
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "card-header bg-transparent header-elements-inline" },
      [
        _c(
          "span",
          { staticClass: "text-uppercase font-size-sm font-weight-semibold" },
          [_vm._v("Search Employee")]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form-control-feedback" }, [
      _c("i", { staticClass: "icon-mailbox text-muted" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      { staticClass: "btn bg-blue btn-block", attrs: { type: "submit" } },
      [
        _c("i", { staticClass: "icon-search4 font-size-base mr-2" }),
        _vm._v("\n                            Search\n                        ")
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Username "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "email" } }, [
      _vm._v("Email "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-4" }, [
      _c("div", { staticClass: "form-group" }, [
        _c("label", [
          _vm._v("Physical Address: "),
          _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
        ]),
        _vm._v(" "),
        _c("input", {
          staticClass: "form-control",
          attrs: { type: "text", name: "physical_address" }
        })
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Department: "),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Designation: "),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Employee Type: "),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row mt-2" }, [
      _c("div", { staticClass: "col-md-12" }, [
        _c("div", { staticClass: "form-action" }, [
          _c(
            "button",
            { staticClass: "btn btn-sm bg-success", attrs: { type: "submit" } },
            [_vm._v("Activate user "), _c("i", { staticClass: "icon-check " })]
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/User/Create.vue?vue&type=template&id=8cb5890e&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/User/Create.vue?vue&type=template&id=8cb5890e&scoped=true& ***!
  \*********************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    {
      staticClass: "card card-body",
      on: {
        submit: function($event) {
          $event.preventDefault()
          return _vm.onSubmit($event)
        },
        keydown: function($event) {
          return _vm.form.errors.clear($event.target.name)
        }
      }
    },
    [
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-12" }, [
          this.message
            ? _c("div", { class: this.messageClass }, [
                _vm._m(0),
                _vm._v(" "),
                _c("span", {
                  staticClass: "font-weight-semibold",
                  domProps: { textContent: _vm._s(this.message) }
                })
              ])
            : _vm._e()
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-6" }, [
          _c("fieldset", [
            _c("legend", { staticClass: "font-weight-semibold" }, [
              _vm._v("\n                    Account Details\n                ")
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-5" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(1),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.username,
                        expression: "form.username"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      name: "username",
                      id: "username",
                      placeholder: "choose a unique username"
                    },
                    domProps: { value: _vm.form.username },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "username", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("username")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("username"))
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-7" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(2),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.email,
                        expression: "form.email"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "email",
                      name: "email",
                      id: "email",
                      placeholder: "example@mewa.or.ke"
                    },
                    domProps: { value: _vm.form.email },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "email", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("email")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("email"))
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "telephone" } }, [
                    _vm._v("Telephone")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.telephone,
                        expression: "form.telephone"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      name: "telephone",
                      id: "telephone",
                      placeholder: "10 digits mobile no"
                    },
                    domProps: { value: _vm.form.telephone },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "telephone", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("telephone")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("telephone")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-md-6" }, [
          _c("fieldset", [
            _c("legend", { staticClass: "font-weight-semibold" }, [
              _vm._v("\n                    Employee Details\n                ")
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-8" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "name" } }, [
                    _vm._v("Full name")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.name,
                        expression: "form.name"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "Full name ",
                      name: "name",
                      id: "name"
                    },
                    domProps: { value: _vm.form.name },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "name", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("name")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("name"))
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "national_id_no" } }, [
                    _vm._v("ID no")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.national_id_no,
                        expression: "form.national_id_no"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "National ID",
                      name: "national_id_no",
                      id: "national_id_no"
                    },
                    domProps: { value: _vm.form.national_id_no },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(
                          _vm.form,
                          "national_id_no",
                          $event.target.value
                        )
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("national_id_no")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("national_id_no")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-3" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "gender" } }, [_vm._v("Gender")]),
                  _vm._v(" "),
                  _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.gender,
                          expression: "form.gender"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { name: "gender", id: "gender" },
                      on: {
                        change: function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.form,
                            "gender",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        }
                      }
                    },
                    _vm._l(_vm.genderList, function(gender) {
                      return _c(
                        "option",
                        { domProps: { value: gender.value } },
                        [_vm._v(_vm._s(gender.label))]
                      )
                    }),
                    0
                  ),
                  _vm._v(" "),
                  _vm.form.errors.has("gender")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("gender"))
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-3" }, [
                _c(
                  "div",
                  { staticClass: "form-group" },
                  [
                    _c("DatePicker", {
                      attrs: { label: "DOB", name: "dob" },
                      model: {
                        value: _vm.form.dob,
                        callback: function($$v) {
                          _vm.$set(_vm.form, "dob", $$v)
                        },
                        expression: "form.dob"
                      }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _vm.form.errors.has("dob")
                  ? _c("label", {
                      staticClass: "validation-invalid-label",
                      domProps: {
                        textContent: _vm._s(_vm.form.errors.first("dob"))
                      }
                    })
                  : _vm._e()
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-6" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", [_vm._v("Physical Address")]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.physical_address,
                        expression: "form.physical_address"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "Physical address",
                      name: "physical_address",
                      id: "physical_address"
                    },
                    domProps: { value: _vm.form.physical_address },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(
                          _vm.form,
                          "physical_address",
                          $event.target.value
                        )
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("physical_address")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("physical_address")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "col-md-3" },
                [
                  _c("DatePicker", {
                    attrs: { label: "Employment Date", name: "date_employed" },
                    model: {
                      value: _vm.form.date_employed,
                      callback: function($$v) {
                        _vm.$set(_vm.form, "date_employed", $$v)
                      },
                      expression: "form.date_employed"
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("date_employed")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("date_employed")
                          )
                        }
                      })
                    : _vm._e()
                ],
                1
              ),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-3" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { form: "department_id" } }, [
                    _vm._v("Department")
                  ]),
                  _vm._v(" "),
                  _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.department_id,
                          expression: "form.department_id"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { name: "department_id", id: "department_id" },
                      on: {
                        change: function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.form,
                            "department_id",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        }
                      }
                    },
                    [
                      _vm._v(">\n                                "),
                      _vm._l(_vm.departments, function(department) {
                        return _c(
                          "option",
                          { domProps: { value: department.id } },
                          [_vm._v(" " + _vm._s(department.name) + " ")]
                        )
                      })
                    ],
                    2
                  ),
                  _vm._v(" "),
                  _vm.form.errors.has("department_id")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("department_id")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-3" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "designation" } }, [
                    _vm._v("Designation")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.designation,
                        expression: "form.designation"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "Designation",
                      name: "designation",
                      id: "designation"
                    },
                    domProps: { value: _vm.form.designation },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "designation", $event.target.value)
                      }
                    }
                  })
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-3" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "employee_type_id" } }, [
                    _vm._v("Employee type")
                  ]),
                  _vm._v(" "),
                  _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.employee_type_id,
                          expression: "form.employee_type_id"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        name: "employee_type_id",
                        id: "employee_type_id"
                      },
                      on: {
                        change: function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.form,
                            "employee_type_id",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        }
                      }
                    },
                    _vm._l(_vm.employeeType, function(type) {
                      return _c("option", { domProps: { value: type.id } }, [
                        _vm._v(" " + _vm._s(type.name) + " ")
                      ])
                    }),
                    0
                  ),
                  _vm._v(" "),
                  _vm.form.errors.has("employee_type_id")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("employee_type_id")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "nssf_no" } }, [
                    _vm._v("NSSF No")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.nssf_no,
                        expression: "form.nssf_no"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "NSSF No",
                      name: "nssf_no",
                      id: "nssf_no"
                    },
                    domProps: { value: _vm.form.nssf_no },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "nssf_no", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("nssf_no")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("nssf_no"))
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "nhif_no" } }, [
                    _vm._v("NHIF No")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.nhif_no,
                        expression: "form.nhif_no"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "NHIF No",
                      name: "nhif_no",
                      id: "nhif_no"
                    },
                    domProps: { value: _vm.form.nhif_no },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "nhif_no", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("nhif_no")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("nhif_no"))
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "kra_pin" } }, [
                    _vm._v("KRA Pin")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.kra_pin,
                        expression: "form.kra_pin"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "KRA Pin",
                      name: "kra_pin",
                      id: "kra_pin"
                    },
                    domProps: { value: _vm.form.kra_pin },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "kra_pin", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("kra_pin")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("kra_pin"))
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-3" }, [
                _c("label", { attrs: { for: "biometric_code" } }, [
                  _vm._v("Biometric User Code")
                ]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.form.biometric_code,
                      expression: "form.biometric_code"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: {
                    type: "text",
                    placeholder: "123",
                    name: "biometric_code",
                    id: "biometric_code"
                  },
                  domProps: { value: _vm.form.biometric_code },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.form, "biometric_code", $event.target.value)
                    }
                  }
                })
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "text-right" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-primary",
                  attrs: { type: "submit", disabled: _vm.form.errors.any() }
                },
                [
                  _vm._v("Submit"),
                  _c("i", { staticClass: "icon-paperplane ml-2" })
                ]
              )
            ])
          ])
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Username "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "email" } }, [
      _vm._v("Email "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/User/Edit.vue?vue&type=template&id=3acff272&scoped=true&":
/*!*******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/User/Edit.vue?vue&type=template&id=3acff272&scoped=true& ***!
  \*******************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    {
      staticClass: "card card-body",
      on: {
        submit: function($event) {
          $event.preventDefault()
          return _vm.onSubmit($event)
        },
        keydown: function($event) {
          return _vm.form.errors.clear($event.target.name)
        }
      }
    },
    [
      _c("div", { staticClass: "row" }, [
        _c("input", {
          attrs: { type: "hidden", name: "_method", value: "put" }
        }),
        _vm._v(" "),
        _c("div", { staticClass: "col-md-12" }, [
          this.message
            ? _c("div", { class: this.messageClass }, [
                _vm._m(0),
                _vm._v(" "),
                _c("span", {
                  staticClass: "font-weight-semibold",
                  domProps: { textContent: _vm._s(this.message) }
                })
              ])
            : _vm._e()
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-6" }, [
          _c("fieldset", [
            _c("legend", { staticClass: "font-weight-semibold" }, [
              _vm._v("\n                    Account Details\n                ")
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-5" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(1),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.username,
                        expression: "form.username"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      name: "username",
                      id: "username",
                      placeholder: "choose a unique username"
                    },
                    domProps: { value: _vm.form.username },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "username", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("username")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("username"))
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-7" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(2),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.email,
                        expression: "form.email"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "email",
                      name: "email",
                      id: "email",
                      placeholder: "example@mewa.or.ke"
                    },
                    domProps: { value: _vm.form.email },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "email", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("email")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("email"))
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "telephone" } }, [
                    _vm._v("Telephone")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.telephone,
                        expression: "form.telephone"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      name: "telephone",
                      id: "telephone",
                      placeholder: "10 digits mobile no"
                    },
                    domProps: { value: _vm.form.telephone },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "telephone", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("telephone")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("telephone")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-md-6" }, [
          _c("fieldset", [
            _c("legend", { staticClass: "font-weight-semibold" }, [
              _vm._v("\n                    Employee Details\n                ")
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-8" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "name" } }, [
                    _vm._v("Full name")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.name,
                        expression: "form.name"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "Full name ",
                      name: "name",
                      id: "name"
                    },
                    domProps: { value: _vm.form.name },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "name", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("name")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("name"))
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "national_id_no" } }, [
                    _vm._v("ID no")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.national_id_no,
                        expression: "form.national_id_no"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "National ID",
                      name: "national_id_no",
                      id: "national_id_no"
                    },
                    domProps: { value: _vm.form.national_id_no },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(
                          _vm.form,
                          "national_id_no",
                          $event.target.value
                        )
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("national_id_no")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("national_id_no")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-3" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "gender" } }, [_vm._v("Gender")]),
                  _vm._v(" "),
                  _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.gender,
                          expression: "form.gender"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { name: "gender", id: "gender" },
                      on: {
                        change: function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.form,
                            "gender",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        }
                      }
                    },
                    _vm._l(_vm.genderList, function(gender) {
                      return _c(
                        "option",
                        { domProps: { value: gender.value } },
                        [_vm._v(_vm._s(gender.label))]
                      )
                    }),
                    0
                  ),
                  _vm._v(" "),
                  _vm.form.errors.has("gender")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("gender"))
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-3" }, [
                _c(
                  "div",
                  { staticClass: "form-group" },
                  [
                    _c("DatePicker", {
                      attrs: { label: "DOB", name: "dob" },
                      model: {
                        value: _vm.form.dob,
                        callback: function($$v) {
                          _vm.$set(_vm.form, "dob", $$v)
                        },
                        expression: "form.dob"
                      }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _vm.form.errors.has("dob")
                  ? _c("label", {
                      staticClass: "validation-invalid-label",
                      domProps: {
                        textContent: _vm._s(_vm.form.errors.first("dob"))
                      }
                    })
                  : _vm._e()
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-6" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", [_vm._v("Physical Address")]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.physical_address,
                        expression: "form.physical_address"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "Physical address",
                      name: "physical_address",
                      id: "physical_address"
                    },
                    domProps: { value: _vm.form.physical_address },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(
                          _vm.form,
                          "physical_address",
                          $event.target.value
                        )
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("physical_address")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("physical_address")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "col-md-3" },
                [
                  _c("DatePicker", {
                    attrs: { label: "Employment Date", name: "date_employed" },
                    model: {
                      value: _vm.form.date_employed,
                      callback: function($$v) {
                        _vm.$set(_vm.form, "date_employed", $$v)
                      },
                      expression: "form.date_employed"
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("date_employed")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("date_employed")
                          )
                        }
                      })
                    : _vm._e()
                ],
                1
              ),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-3" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { form: "department_id" } }, [
                    _vm._v("Department")
                  ]),
                  _vm._v(" "),
                  _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.department_id,
                          expression: "form.department_id"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { name: "department_id", id: "department_id" },
                      on: {
                        change: function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.form,
                            "department_id",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        }
                      }
                    },
                    [
                      _vm._v(">\n                                "),
                      _vm._l(_vm.departments, function(department) {
                        return _c(
                          "option",
                          { domProps: { value: department.id } },
                          [_vm._v(" " + _vm._s(department.name) + " ")]
                        )
                      })
                    ],
                    2
                  ),
                  _vm._v(" "),
                  _vm.form.errors.has("department_id")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("department_id")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-3" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "designation" } }, [
                    _vm._v("Designation")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.designation,
                        expression: "form.designation"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "Designation",
                      name: "designation",
                      id: "designation"
                    },
                    domProps: { value: _vm.form.designation },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "designation", $event.target.value)
                      }
                    }
                  })
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-3" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "employee_type_id" } }, [
                    _vm._v("Employee type")
                  ]),
                  _vm._v(" "),
                  _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.employee_type_id,
                          expression: "form.employee_type_id"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        name: "employee_type_id",
                        id: "employee_type_id"
                      },
                      on: {
                        change: function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.form,
                            "employee_type_id",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        }
                      }
                    },
                    _vm._l(_vm.employeeType, function(type) {
                      return _c("option", { domProps: { value: type.id } }, [
                        _vm._v(" " + _vm._s(type.name) + " ")
                      ])
                    }),
                    0
                  ),
                  _vm._v(" "),
                  _vm.form.errors.has("employee_type_id")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("employee_type_id")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "nssf_no" } }, [
                    _vm._v("NSSF No")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.nssf_no,
                        expression: "form.nssf_no"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "NSSF No",
                      name: "nssf_no",
                      id: "nssf_no"
                    },
                    domProps: { value: _vm.form.nssf_no },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "nssf_no", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("nssf_no")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("nssf_no"))
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "nhif_no" } }, [
                    _vm._v("NHIF No")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.nhif_no,
                        expression: "form.nhif_no"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "NHIF No",
                      name: "nhif_no",
                      id: "nhif_no"
                    },
                    domProps: { value: _vm.form.nhif_no },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "nhif_no", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("nhif_no")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("nhif_no"))
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c("label", { attrs: { for: "kra_pin" } }, [
                    _vm._v("KRA Pin")
                  ]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.kra_pin,
                        expression: "form.kra_pin"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "KRA Pin",
                      name: "kra_pin",
                      id: "kra_pin"
                    },
                    domProps: { value: _vm.form.kra_pin },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "kra_pin", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("kra_pin")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("kra_pin"))
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-3" }, [
                _c("label", { attrs: { for: "biometric_code" } }, [
                  _vm._v("Biometric User Code")
                ]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.form.biometric_code,
                      expression: "form.biometric_code"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: {
                    type: "text",
                    placeholder: "123",
                    name: "biometric_code",
                    id: "biometric_code"
                  },
                  domProps: { value: _vm.form.biometric_code },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.form, "biometric_code", $event.target.value)
                    }
                  }
                })
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "text-right" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-primary",
                  attrs: { type: "submit", disabled: _vm.form.errors.any() }
                },
                [
                  _vm._v("Submit"),
                  _c("i", { staticClass: "icon-paperplane ml-2" })
                ]
              )
            ])
          ])
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Username "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "email" } }, [
      _vm._v("Email "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Wysiwyg.vue?vue&type=template&id=e08f58b4&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Wysiwyg.vue?vue&type=template&id=e08f58b4& ***!
  \*****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("input", {
        attrs: { id: "x", type: "hidden", name: _vm.name },
        domProps: { value: _vm.value }
      }),
      _vm._v(" "),
      _c("trix-editor", { ref: "trix", attrs: { input: "x" } })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/auth/Register.vue?vue&type=template&id=5f3035c3&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/auth/Register.vue?vue&type=template&id=5f3035c3& ***!
  \***********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    {
      staticClass: "flex-fill",
      on: {
        submit: function($event) {
          $event.preventDefault()
          return _vm.onSubmit($event)
        },
        keydown: function($event) {
          return _vm.form.errors.clear($event.target.name)
        }
      }
    },
    [
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-5 offset-md-3" }, [
          _c("div", { staticClass: "card mb-0" }, [
            _c("div", { staticClass: "card-body" }, [
              _c("div", { staticClass: "text-center mb-3" }, [
                _c("i", {
                  staticClass:
                    "icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"
                }),
                _vm._v(" "),
                _c("h5", { staticClass: "mb-0" }, [
                  _vm._v("Account Request form")
                ]),
                _vm._v(" "),
                _vm._m(0),
                _vm._v(" "),
                this.message
                  ? _c("div", { class: this.messageClass }, [
                      _vm._m(1),
                      _vm._v(" "),
                      _c("span", {
                        staticClass: "font-weight-semibold",
                        domProps: { textContent: _vm._s(this.message) }
                      })
                    ])
                  : _vm._e()
              ]),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass:
                    "form-group form-group-feedback form-group-feedback-right"
                },
                [
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.username,
                        expression: "form.username"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      name: "username",
                      placeholder: "Choose username"
                    },
                    domProps: { value: _vm.form.username },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "username", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm._m(2),
                  _vm._v(" "),
                  _vm.form.errors.has("username")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.get("username"))
                        }
                      })
                    : _vm._e()
                ]
              ),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-12" }, [
                  _c(
                    "div",
                    {
                      staticClass:
                        "form-group form-group-feedback form-group-feedback-right"
                    },
                    [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.form.name,
                            expression: "form.name"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "text",
                          name: "name",
                          placeholder:
                            "Full name as it appears on your National Identification card"
                        },
                        domProps: { value: _vm.form.name },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.form, "name", $event.target.value)
                          }
                        }
                      }),
                      _vm._v(" "),
                      _vm._m(3),
                      _vm._v(" "),
                      _vm.form.errors.has("name")
                        ? _c("label", {
                            staticClass: "validation-invalid-label",
                            domProps: {
                              textContent: _vm._s(_vm.form.errors.get("name"))
                            }
                          })
                        : _vm._e()
                    ]
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-6" }, [
                  _c(
                    "div",
                    {
                      staticClass:
                        "form-group form-group-feedback form-group-feedback-right"
                    },
                    [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.form.email,
                            expression: "form.email"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "email",
                          name: "email",
                          placeholder: "Your MEWA domain email"
                        },
                        domProps: { value: _vm.form.email },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.form, "email", $event.target.value)
                          }
                        }
                      }),
                      _vm._v(" "),
                      _vm._m(4),
                      _vm._v(" "),
                      _vm.form.errors.has("email")
                        ? _c("label", {
                            staticClass: "validation-invalid-label",
                            domProps: {
                              textContent: _vm._s(_vm.form.errors.get("email"))
                            }
                          })
                        : _vm._e()
                    ]
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-6" }, [
                  _c(
                    "div",
                    {
                      staticClass:
                        "form-group form-group-feedback form-group-feedback-right"
                    },
                    [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.form.national_id_no,
                            expression: "form.national_id_no"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "text",
                          name: "national_id_no",
                          placeholder: "Identification Number (ID)"
                        },
                        domProps: { value: _vm.form.national_id_no },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.form,
                              "national_id_no",
                              $event.target.value
                            )
                          }
                        }
                      }),
                      _vm._v(" "),
                      _vm._m(5),
                      _vm._v(" "),
                      _vm.form.errors.has("national_id_no")
                        ? _c("label", {
                            staticClass: "validation-invalid-label",
                            domProps: {
                              textContent: _vm._s(
                                _vm.form.errors.get("national_id_no")
                              )
                            }
                          })
                        : _vm._e()
                    ]
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-6" }, [
                  _c(
                    "div",
                    {
                      staticClass:
                        "form-group form-group-feedback form-group-feedback-right"
                    },
                    [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.form.password,
                            expression: "form.password"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "password",
                          name: "password",
                          placeholder: "Create password"
                        },
                        domProps: { value: _vm.form.password },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.form, "password", $event.target.value)
                          }
                        }
                      }),
                      _vm._v(" "),
                      _vm._m(6),
                      _vm._v(" "),
                      _vm.form.errors.has("password")
                        ? _c("label", {
                            staticClass: "validation-invalid-label",
                            domProps: {
                              textContent: _vm._s(
                                _vm.form.errors.get("password")
                              )
                            }
                          })
                        : _vm._e()
                    ]
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-6" }, [
                  _c(
                    "div",
                    {
                      staticClass:
                        "form-group form-group-feedback form-group-feedback-right"
                    },
                    [
                      _c(
                        "select",
                        {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.department_id,
                              expression: "form.department_id"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            name: "department_id",
                            id: "department",
                            placeholder: "Choose your currrent Department"
                          },
                          on: {
                            change: function($event) {
                              var $$selectedVal = Array.prototype.filter
                                .call($event.target.options, function(o) {
                                  return o.selected
                                })
                                .map(function(o) {
                                  var val = "_value" in o ? o._value : o.value
                                  return val
                                })
                              _vm.$set(
                                _vm.form,
                                "department_id",
                                $event.target.multiple
                                  ? $$selectedVal
                                  : $$selectedVal[0]
                              )
                            }
                          }
                        },
                        _vm._l(_vm.departments, function(department) {
                          return _c(
                            "option",
                            { domProps: { value: department.id } },
                            [_vm._v(_vm._s(department.name))]
                          )
                        }),
                        0
                      ),
                      _vm._v(" "),
                      _vm._m(7),
                      _vm._v(" "),
                      _vm.form.errors.has("department_id")
                        ? _c("label", {
                            staticClass: "validation-invalid-label",
                            domProps: {
                              textContent: _vm._s(
                                _vm.form.errors.first("department_id")
                              )
                            }
                          })
                        : _vm._e()
                    ]
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-4 offset-md-4 mb-2" }, [
                _c(
                  "button",
                  {
                    staticClass:
                      "btn bg-teal-400 btn-labeled btn-labeled-right btn-block",
                    attrs: { type: "submit", disabled: _vm.form.errors.any() }
                  },
                  [
                    _vm._m(8),
                    _vm._v(" Submit request\n                        ")
                  ]
                )
              ])
            ]),
            _vm._v(" "),
            _vm._m(9),
            _vm._v(" "),
            _vm._m(10)
          ])
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", { staticClass: "d-block text-muted" }, [
      _c("span", { staticClass: "text-danger" }, [
        _vm._v("All fields are required")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form-control-feedback" }, [
      _c("i", { staticClass: "icon-user-plus text-muted" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form-control-feedback" }, [
      _c("i", { staticClass: "icon-user text-muted" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form-control-feedback" }, [
      _c("i", { staticClass: "icon-mention text-muted" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form-control-feedback" }, [
      _c("i", { staticClass: "icon-vcard text-muted" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form-control-feedback" }, [
      _c("i", { staticClass: "icon-lock text-muted" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form-control-feedback" }, [
      _c("i", { staticClass: "icon-users text-muted" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("b", [_c("i", { staticClass: "icon-plus3" })])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "form-group text-center text-muted content-divider" },
      [_c("span", { staticClass: "px-2" }, [_vm._v("Have an account?")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-md-4 offset-md-4" }, [
        _c("div", { staticClass: "form-group" }, [
          _c(
            "a",
            {
              staticClass:
                "btn btn btn-outline bg-indigo-400 text-indigo-400 border-indigo-400 btn-block btn-outline",
              attrs: { href: "login" }
            },
            [_vm._v("Sign in")]
          )
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/department/Create.vue?vue&type=template&id=f700361c&scoped=true&":
/*!***************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/department/Create.vue?vue&type=template&id=f700361c&scoped=true& ***!
  \***************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    {
      staticClass: "row",
      on: {
        submit: function($event) {
          $event.preventDefault()
          return _vm.onSubmit($event)
        },
        keydown: function($event) {
          return _vm.form.errors.clear($event.target.name)
        }
      }
    },
    [
      _c("div", { staticClass: "col-lg-6 col-md-12 offset-lg-3" }, [
        this.message
          ? _c("div", { class: this.messageClass }, [
              _vm._m(0),
              _vm._v(" "),
              _c("span", {
                staticClass: "font-weight-semibold",
                domProps: { textContent: _vm._s(this.message) }
              })
            ])
          : _vm._e(),
        _vm._v(" "),
        _c("div", { staticClass: "card" }, [
          _c("div", { staticClass: "card-body" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(1),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.name,
                    expression: "form.name"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", name: "name", id: "name" },
                domProps: { value: _vm.form.name },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "name", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("name")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("name"))
                    }
                  })
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group" }, [
              _c("label", { attrs: { for: "email" } }, [
                _vm._v("Department Email")
              ]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.email,
                    expression: "form.email"
                  }
                ],
                staticClass: "form-control",
                attrs: {
                  type: "email",
                  placeholder: "Department email address",
                  name: "email",
                  id: "email"
                },
                domProps: { value: _vm.form.email },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "email", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("email")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("email"))
                    }
                  })
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group" }, [
              _c("label", { attrs: { for: "mailing_list" } }, [
                _vm._v("Department Mailing Email")
              ]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.mailing_list,
                    expression: "form.mailing_list"
                  }
                ],
                staticClass: "form-control",
                attrs: {
                  type: "email",
                  placeholder:
                    "Mailing address that will be used to mail all users",
                  name: "mailing_list",
                  id: "mailing_list"
                },
                domProps: { value: _vm.form.mailing_list },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "mailing_list", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("mailing_list")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("mailing_list"))
                    }
                  })
                : _vm._e()
            ])
          ]),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass:
                "card-footer d-flex justify-content-between align-items-center"
            },
            [
              _c(
                "button",
                {
                  staticClass: "btn bg-blue btn-sm ",
                  attrs: { type: "submit", disabled: this.form.errors.any() }
                },
                [
                  _vm._v("Submit "),
                  _c("i", { staticClass: "icon-paperplane ml-2" })
                ]
              )
            ]
          )
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "name" } }, [
      _vm._v("Department Name "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/department/Edit.vue?vue&type=template&id=58d0ba80&scoped=true&":
/*!*************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/department/Edit.vue?vue&type=template&id=58d0ba80&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    {
      staticClass: "row",
      on: {
        submit: function($event) {
          $event.preventDefault()
          return _vm.onSubmit($event)
        },
        keydown: function($event) {
          return _vm.form.errors.clear($event.target.name)
        }
      }
    },
    [
      _c("input", {
        attrs: { type: "hidden", name: "_method", value: "PATCH" }
      }),
      _vm._v(" "),
      _c("div", { staticClass: "col-lg-6 col-md-12 offset-lg-3" }, [
        this.message
          ? _c("div", { class: this.messageClass }, [
              _vm._m(0),
              _vm._v(" "),
              _c("span", {
                staticClass: "font-weight-semibold",
                domProps: { textContent: _vm._s(this.message) }
              })
            ])
          : _vm._e(),
        _vm._v(" "),
        _c("div", { staticClass: "card" }, [
          _c("div", { staticClass: "card-body" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(1),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.name,
                    expression: "form.name"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", name: "name", id: "name" },
                domProps: { value: _vm.form.name },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "name", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("name")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("name"))
                    }
                  })
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group" }, [
              _c("label", { attrs: { for: "email" } }, [
                _vm._v("Department Email")
              ]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.email,
                    expression: "form.email"
                  }
                ],
                staticClass: "form-control",
                attrs: {
                  type: "email",
                  placeholder: "Department email address",
                  name: "email",
                  id: "email"
                },
                domProps: { value: _vm.form.email },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "email", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("email")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("email"))
                    }
                  })
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group" }, [
              _c("label", { attrs: { for: "mailing_list" } }, [
                _vm._v("Department Mailing Email")
              ]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.mailing_list,
                    expression: "form.mailing_list"
                  }
                ],
                staticClass: "form-control",
                attrs: {
                  type: "email",
                  placeholder:
                    "Mailing address that will be used to mail all users",
                  name: "mailing_list",
                  id: "mailing_list"
                },
                domProps: { value: _vm.form.mailing_list },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "mailing_list", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("mailing_list")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("mailing_list"))
                    }
                  })
                : _vm._e()
            ])
          ]),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass:
                "card-footer d-flex justify-content-between align-items-center"
            },
            [
              _c(
                "button",
                {
                  staticClass: "btn bg-blue btn-sm ",
                  attrs: { type: "submit", disabled: this.form.errors.any() }
                },
                [
                  _vm._v("Submit "),
                  _c("i", { staticClass: "icon-paperplane ml-2" })
                ]
              )
            ]
          )
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "name" } }, [
      _vm._v("Department Name "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/department/Show.vue?vue&type=template&id=35bd141a&scoped=true&":
/*!*************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/department/Show.vue?vue&type=template&id=35bd141a&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "row" }, [
    _c(
      "form",
      {
        staticClass: "col-md-9",
        on: {
          submit: function($event) {
            $event.preventDefault()
            return _vm.onSubmit($event)
          },
          keydown: function($event) {
            return _vm.form.errors.clear($event.target.name)
          }
        }
      },
      [
        _c("input", {
          attrs: { type: "hidden", name: "_method", value: "PATCH" }
        }),
        _vm._v(" "),
        this.message
          ? _c("div", { class: this.messageClass }, [
              _vm._m(0),
              _vm._v(" "),
              _c("span", {
                staticClass: "font-weight-semibold",
                domProps: { textContent: _vm._s(this.message) }
              })
            ])
          : _vm._e(),
        _vm._v(" "),
        _c("div", { staticClass: "card" }, [
          _c(
            "div",
            {
              staticClass: "card-header bg-transparent header-elements-inline"
            },
            [
              _c("h5", { staticClass: "card-title" }, [
                _vm._v(" " + _vm._s(this.department.name))
              ])
            ]
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "card-body" },
            [
              _c("h6", { staticClass: "font-weight-semibold" }, [
                _vm._v("Department Overview")
              ]),
              _vm._v(" "),
              _c("wysiwyg", {
                attrs: { name: "overview", value: _vm.form.overview },
                model: {
                  value: _vm.form.overview,
                  callback: function($$v) {
                    _vm.$set(_vm.form, "overview", $$v)
                  },
                  expression: "form.overview"
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("overview")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("overview"))
                    }
                  })
                : _vm._e()
            ],
            1
          ),
          _vm._v(" "),
          _vm._m(1)
        ])
      ]
    ),
    _vm._v(" "),
    _c("div", { staticClass: "col-md-3" }, [
      _c("div", { staticClass: "card" }, [
        _vm._m(2),
        _vm._v(" "),
        _c(
          "table",
          { staticClass: "table table-border-dashed table-xs my-2" },
          [
            _c("tbody", [
              _c("tr", [
                _vm._m(3),
                _vm._v(" "),
                _vm.editingDetails
                  ? _c("td", { staticClass: "text-right" }, [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.hod,
                            expression: "hod"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: { type: "text", name: "hod" },
                        domProps: { value: _vm.hod },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.hod = $event.target.value
                          }
                        }
                      })
                    ])
                  : _c("td", {
                      staticClass: "text-right",
                      domProps: { textContent: _vm._s(_vm.department.hod) }
                    })
              ]),
              _vm._v(" "),
              _c("tr", [
                _vm._m(4),
                _vm._v(" "),
                _vm.editingDetails
                  ? _c("td", { staticClass: "text-right" }, [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.email,
                            expression: "email"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: { type: "text", name: "email" },
                        domProps: { value: _vm.email },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.email = $event.target.value
                          }
                        }
                      })
                    ])
                  : _c("td", {
                      staticClass: "text-right",
                      domProps: { textContent: _vm._s(_vm.department.email) }
                    })
              ])
            ])
          ]
        ),
        _vm._v(" "),
        _c("div", { staticClass: "card-footer d-flex align-items-center" }, [
          _c(
            "ul",
            { staticClass: "list-inline list-inline-condensed mb-0 ml-auto" },
            [
              _c("li", { staticClass: "list-inline-item dropdown" }, [
                _vm._m(5),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "dropdown-menu dropdown-menu-right" },
                  [
                    _c(
                      "button",
                      {
                        staticClass: "dropdown-item",
                        on: {
                          click: function($event) {
                            _vm.editingDetails = true
                          }
                        }
                      },
                      [
                        _c("i", { staticClass: "icon-pencil7" }),
                        _vm._v(" Edit\n                            ")
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "dropdown-item",
                        on: {
                          click: function($event) {
                            _vm.editingDetails = false
                          }
                        }
                      },
                      [
                        _c("i", { staticClass: "icon-cross" }),
                        _vm._v(" Close\n                            ")
                      ]
                    ),
                    _vm._v(" "),
                    _c("hr", { staticClass: "dropdown-divider" }),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "dropdown-item",
                        on: { click: _vm.updateDetails }
                      },
                      [
                        _c("i", { staticClass: "icon-check" }),
                        _vm._v(" Update\n                            ")
                      ]
                    )
                  ]
                )
              ])
            ]
          )
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "card" }, [
        _vm._m(6),
        _vm._v(" "),
        _c("div", { staticClass: "card-body" }, [
          _c(
            "ul",
            { staticClass: "media-list" },
            _vm._l(_vm.documents, function(document) {
              return _c("li", { staticClass: "media" }, [
                _vm._m(7, true),
                _vm._v(" "),
                _c("div", { staticClass: "media-body" }, [
                  _c("div", { staticClass: "font-weight-semibold" }, [
                    _vm._v(" " + _vm._s(document.file_name))
                  ]),
                  _vm._v(" "),
                  _vm._m(8, true)
                ]),
                _vm._v(" "),
                _vm._m(9, true)
              ])
            }),
            0
          )
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "card" }, [
        _vm._m(10),
        _vm._v(" "),
        _c("form", { staticClass: "card-body" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", [_vm._v("Document")]),
            _vm._v(" "),
            _c("input", {
              staticClass: "form-control",
              attrs: { type: "file", name: "sop" },
              on: { change: _vm.processFile }
            })
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "form-group" }, [
            _c("label", [_vm._v("Document type")]),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.type,
                  expression: "type"
                }
              ],
              staticClass: "form-control",
              attrs: {
                type: "text",
                name: "document_type",
                placeholder: "Doc. type eg Standard operating...",
                id: "document_type"
              },
              domProps: { value: _vm.type },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.type = $event.target.value
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "card-footer" }, [
          _c(
            "button",
            {
              staticClass:
                "btn btn-outline bg-indigo-400 text-indigo-400 border-indigo-400 btn-sm",
              attrs: { type: "button" },
              on: { click: _vm.uploadFile }
            },
            [_vm._v("Upload\n                ")]
          ),
          _vm._v(" "),
          this.processing
            ? _c("div", { staticClass: "text-muted pull-right" }, [
                _c("i", { staticClass: "icon-spinner2 spinner mr-2" }),
                _vm._v("\n                    Processing...\n                ")
              ])
            : _vm._e()
        ])
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "card-footer d-sm-flex justify-content-sm-between align-items-sm-center"
      },
      [
        _c(
          "button",
          {
            staticClass: "btn btn-sm btn-success btn-round pull-right",
            attrs: { type: "submit" }
          },
          [_vm._v("Update")]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "card-header bg-transparent header-elements-inline" },
      [
        _c(
          "span",
          { staticClass: "text-uppercase font-size-sm font-weight-semibold" },
          [_vm._v("Department details")]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("td", [
      _c("i", { staticClass: "icon-user-tie mr-2" }),
      _vm._v(" HOD:")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("td", [
      _c("i", { staticClass: "icon-mailbox mr-2" }),
      _vm._v(" Email:")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "text-default dropdown-toggle",
        attrs: { href: "#", "data-toggle": "dropdown" }
      },
      [_c("i", { staticClass: "icon-cog3" })]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "card-header bg-transparent header-elements-inline" },
      [
        _c(
          "span",
          { staticClass: "text-uppercase font-size-sm font-weight-semibold" },
          [_vm._v("Attached files")]
        ),
        _vm._v(" "),
        _c("div", { staticClass: "header-elements" }, [
          _c("div", { staticClass: "list-icons" }, [
            _c("div", { staticClass: "dropdown" }, [
              _c(
                "a",
                {
                  staticClass: "list-icons-item dropdown-toggle",
                  attrs: {
                    href: "#",
                    "data-toggle": "dropdown",
                    "aria-expanded": "false"
                  }
                },
                [_c("i", { staticClass: "icon-menu7" })]
              ),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "dropdown-menu dropdown-menu-right",
                  attrs: { "x-placement": "bottom-end" }
                },
                [
                  _c(
                    "a",
                    { staticClass: "dropdown-item", attrs: { href: "#" } },
                    [
                      _c("i", { staticClass: "icon-file-word" }),
                      _vm._v(
                        " Upload\n                                    Documents"
                      )
                    ]
                  )
                ]
              )
            ])
          ])
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "mr-3 align-self-center" }, [
      _c("i", { staticClass: "icon-file-word icon-2x text-primary-300 top-0" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "ul",
      {
        staticClass:
          "list-inline list-inline-dotted list-inline-condensed font-size-sm text-muted"
      },
      [_c("li", { staticClass: "list-inline-item" }, [_vm._v("Size: 1.2Mb")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "ml-3" }, [
      _c("div", { staticClass: "list-icons" }, [
        _c("a", { staticClass: "list-icons-item", attrs: { href: "#" } }, [
          _c("i", { staticClass: "icon-trash" })
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "card-header bg-transparent header-elements-inline" },
      [
        _c(
          "span",
          { staticClass: "text-uppercase font-size-sm font-weight-semibold" },
          [_vm._v("Upload Documents")]
        )
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/employee/Edit.vue?vue&type=template&id=1025d2e4&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/employee/Edit.vue?vue&type=template&id=1025d2e4&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    {
      staticClass: "row",
      on: {
        submit: function($event) {
          $event.preventDefault()
          return _vm.onSubmit($event)
        },
        keydown: function($event) {
          return _vm.form.errors.clear($event.target.name)
        }
      }
    },
    [
      _c("input", {
        attrs: { type: "hidden", name: "_method", value: "PATCH" }
      }),
      _vm._v(" "),
      _c("div", { staticClass: "col-md-10 offset-md-1" }, [
        _c("div", { staticClass: "card" }, [
          _c("div", { staticClass: "card-body pb-0" }, [
            _c("div", { staticClass: "media flex-column flex-md-row mb-2" }, [
              _c("div", { staticClass: "media-body" }, [
                _c("h5", {
                  staticClass: "media-title font-weight-semibold",
                  domProps: { textContent: _vm._s(_vm.form.name) }
                }),
                _vm._v(" "),
                _c(
                  "ul",
                  {
                    staticClass:
                      "list-inline list-inline-dotted text-muted mb-0"
                  },
                  [
                    _c("li", {
                      staticClass: "list-inline-item",
                      domProps: { textContent: _vm._s(_vm.form.designation) }
                    })
                  ]
                )
              ]),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "align-self-md-center ml-md-3 mt-2 mt-md-0" },
                [
                  _c("a", { attrs: { href: "#" } }, [
                    _c("i", {
                      staticClass: "badge badge-success mr-2",
                      domProps: { textContent: _vm._s(_vm.form.staff_no) }
                    })
                  ])
                ]
              )
            ])
          ]),
          _vm._v(" "),
          _c("fieldset", { staticClass: "card-body" }, [
            _c("h6", { staticClass: "font-weight-semibold mt-1 mb-3" }, [
              _vm._v("Employee Details")
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-sm-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(0),
                  _vm._v(" "),
                  _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.department_id,
                          expression: "form.department_id"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { name: "department_id" },
                      on: {
                        change: function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.form,
                            "department_id",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        }
                      }
                    },
                    _vm._l(_vm.departmentList, function(department) {
                      return _c(
                        "option",
                        { domProps: { value: department.id } },
                        [
                          _vm._v(
                            " " +
                              _vm._s(department.name) +
                              "\n                                "
                          )
                        ]
                      )
                    }),
                    0
                  ),
                  _vm._v(" "),
                  _vm.form.errors.has("department_id")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("department_id")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(1),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.designation,
                        expression: "form.designation"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { type: "text", name: "designation" },
                    domProps: { value: _vm.form.designation },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "designation", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("designation")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("designation")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-3" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(2),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.staff_no,
                        expression: "form.staff_no"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { type: "text", name: "staff_no" },
                    domProps: { value: _vm.form.staff_no },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "staff_no", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("staff_no")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("staff_no"))
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-sm-3" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(3),
                  _vm._v(" "),
                  _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.employee_type_id,
                          expression: "form.employee_type_id"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { name: "employee_type_id" },
                      on: {
                        change: function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.form,
                            "employee_type_id",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        }
                      }
                    },
                    _vm._l(_vm.employeeType, function(type) {
                      return _c("option", { domProps: { value: type.id } }, [
                        _vm._v(
                          " " +
                            _vm._s(type.name) +
                            "\n                                "
                        )
                      ])
                    }),
                    0
                  ),
                  _vm._v(" "),
                  _vm.form.errors.has("employee_type_id")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("employee_type_id")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-3" }, [
                _c(
                  "div",
                  { staticClass: "form-group" },
                  [
                    _c("DatePicker", {
                      attrs: { label: "Date Employed", name: "dob" },
                      model: {
                        value: _vm.form.date_employed,
                        callback: function($$v) {
                          _vm.$set(_vm.form, "date_employed", $$v)
                        },
                        expression: "form.date_employed"
                      }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _vm.form.errors.has("date_employed")
                  ? _c("label", {
                      staticClass: "validation-invalid-label",
                      domProps: {
                        textContent: _vm._s(
                          _vm.form.errors.first("date_employed")
                        )
                      }
                    })
                  : _vm._e()
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-3" }, [
                _vm._m(4),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.form.biometric_code,
                      expression: "form.biometric_code"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: { type: "text", name: "biometric_code" },
                  domProps: { value: _vm.form.biometric_code },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.form, "biometric_code", $event.target.value)
                    }
                  }
                }),
                _vm._v(" "),
                _vm.form.errors.has("biometric_code")
                  ? _c("label", {
                      staticClass: "validation-invalid-label",
                      domProps: {
                        textContent: _vm._s(
                          _vm.form.errors.first("biometric_code")
                        )
                      }
                    })
                  : _vm._e()
              ])
            ])
          ]),
          _vm._v(" "),
          _c("fieldset", { staticClass: "card-body" }, [
            _c("h6", { staticClass: "font-weight-semibold mb-3" }, [
              _vm._v("Personal details")
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group" }, [
              _vm._m(5),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.name,
                    expression: "form.name"
                  }
                ],
                staticClass: "form-control ",
                attrs: { type: "text", name: "name" },
                domProps: { value: _vm.form.name },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "name", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("name")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("name"))
                    }
                  })
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-sm-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(6),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.telephone,
                        expression: "form.telephone"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { type: "text", name: "telephone" },
                    domProps: { value: _vm.form.telephone },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "telephone", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("telephone")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("telephone")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(7),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.email,
                        expression: "form.email"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { type: "text", name: "email" },
                    domProps: { value: _vm.form.email },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "email", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("email")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("email"))
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(8),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.national_id_no,
                        expression: "form.national_id_no"
                      }
                    ],
                    staticClass: "form-control ",
                    attrs: {
                      type: "text",
                      name: "national_id_no",
                      placeholder: "National ID No"
                    },
                    domProps: { value: _vm.form.national_id_no },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(
                          _vm.form,
                          "national_id_no",
                          $event.target.value
                        )
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("national_id_no")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("national_id_no")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-sm-3" }, [
                _c(
                  "div",
                  { staticClass: "form-group" },
                  [
                    _c("DatePicker", {
                      attrs: { label: "DOB ", name: "dob" },
                      model: {
                        value: _vm.form.dob,
                        callback: function($$v) {
                          _vm.$set(_vm.form, "dob", $$v)
                        },
                        expression: "form.dob"
                      }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _vm.form.errors.has("dob")
                  ? _c("label", {
                      staticClass: "validation-invalid-label",
                      domProps: {
                        textContent: _vm._s(_vm.form.errors.first("dob"))
                      }
                    })
                  : _vm._e()
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-3" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(9),
                  _vm._v(" "),
                  _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.gender,
                          expression: "form.gender"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { name: "gender", id: "gender" },
                      on: {
                        change: function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.form,
                            "gender",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        }
                      }
                    },
                    _vm._l(_vm.genderList, function(gender) {
                      return _c(
                        "option",
                        { domProps: { value: gender.value } },
                        [
                          _vm._v(
                            "\n                                    " +
                              _vm._s(gender.label) +
                              "\n                                "
                          )
                        ]
                      )
                    }),
                    0
                  ),
                  _vm._v(" "),
                  _vm.form.errors.has("gender")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("gender"))
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-6" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(10),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.physical_address,
                        expression: "form.physical_address"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { type: "text", name: "physical_address" },
                    domProps: { value: _vm.form.physical_address },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(
                          _vm.form,
                          "physical_address",
                          $event.target.value
                        )
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("physical_address")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("physical_address")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-sm-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(11),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.kra_pin,
                        expression: "form.kra_pin"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { type: "text", name: "kra_pin" },
                    domProps: { value: _vm.form.kra_pin },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "kra_pin", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("kra_pin")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("kra_pin"))
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(12),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.nhif_no,
                        expression: "form.nhif_no"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { type: "text", name: "nhif_no" },
                    domProps: { value: _vm.form.nhif_no },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "nhif_no", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("nhif_no")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("nhif_no"))
                        }
                      })
                    : _vm._e()
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-4" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(13),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.nssf_no,
                        expression: "form.nssf_no"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { type: "text", name: "nssf_no" },
                    domProps: { value: _vm.form.nssf_no },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "nssf_no", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("nssf_no")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("nssf_no"))
                        }
                      })
                    : _vm._e()
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _vm._m(14)
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            this.message
              ? _c("div", { class: this.messageClass }, [
                  _c("span", {
                    staticClass: "font-weight-semibold",
                    domProps: { textContent: _vm._s(this.message) }
                  })
                ])
              : _vm._e()
          ])
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Department: "),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Designation: "),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Staff No: "),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v(" Employee Type: "),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Biometric code: "),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Full name: "),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Telephone: "),
      _c("span", { staticClass: "text-success" }, [_vm._v("optional")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Email: "),
      _c("span", { staticClass: "text-success" }, [_vm._v("optional")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("National ID no: "),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Gender: "),
      _c("span", { staticClass: "text-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Address: "),
      _c("span", { staticClass: "text-success" }, [_vm._v("optional")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("KRA Pin: "),
      _c("span", { staticClass: "text-success" }, [_vm._v("optional")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("NHIF: "),
      _c("span", { staticClass: "text-success" }, [_vm._v("optional")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("NSSF: "),
      _c("span", { staticClass: "text-success" }, [_vm._v("optional")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "card-footer d-flex justify-content-between align-items-center"
      },
      [
        _c(
          "button",
          { staticClass: "btn bg-blue btn-sm", attrs: { type: "submit" } },
          [_vm._v("Submit"), _c("i", { staticClass: "icon-paperplane ml-2" })]
        )
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/event/Create.vue?vue&type=template&id=54d5f170&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/event/Create.vue?vue&type=template&id=54d5f170& ***!
  \**********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    {
      staticClass: "card",
      on: {
        submit: function($event) {
          $event.preventDefault()
          return _vm.onSubmit($event)
        },
        keydown: function($event) {
          return _vm.form.errors.clear($event.target.name)
        }
      }
    },
    [
      _c("div", { staticClass: "card-body" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            this.message
              ? _c("div", { class: this.messageClass }, [
                  _vm._m(0),
                  _vm._v(" "),
                  _c("span", {
                    staticClass: "font-weight-semibold",
                    domProps: { textContent: _vm._s(this.message) }
                  })
                ])
              : _vm._e()
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(1),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.name,
                    expression: "form.name"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", name: "name", id: "name" },
                domProps: { value: _vm.form.name },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "name", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("name")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("name"))
                    }
                  })
                : _vm._e()
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-6" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(2),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.venue,
                    expression: "form.venue"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", name: "venue", id: "venue" },
                domProps: { value: _vm.form.venue },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "venue", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("venue")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("venue"))
                    }
                  })
                : _vm._e()
            ])
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "col-md-3" },
            [
              _c(
                "datetime",
                {
                  attrs: {
                    type: "datetime",
                    "input-class": "form-control",
                    "input-id": "start_date",
                    "hidden-name": "start_date",
                    zone: "Africa/Nairobi",
                    "value-zone": "Africa/Nairobi"
                  },
                  model: {
                    value: _vm.form.start_date,
                    callback: function($$v) {
                      _vm.$set(_vm.form, "start_date", $$v)
                    },
                    expression: "form.start_date"
                  }
                },
                [
                  _c("label", { attrs: { slot: "before" }, slot: "before" }, [
                    _vm._v("Start Date")
                  ])
                ]
              ),
              _vm._v(" "),
              _vm.form.errors.has("start_date")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("start_date"))
                    }
                  })
                : _vm._e()
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "col-md-3" },
            [
              _c(
                "datetime",
                {
                  attrs: {
                    type: "datetime",
                    "input-class": "form-control",
                    "input-id": "end_date",
                    zone: "Africa/Nairobi",
                    "value-zone": "Africa/Nairobi",
                    "hidden-name": "end_date"
                  },
                  model: {
                    value: _vm.form.end_date,
                    callback: function($$v) {
                      _vm.$set(_vm.form, "end_date", $$v)
                    },
                    expression: "form.end_date"
                  }
                },
                [
                  _c("label", { attrs: { slot: "before" }, slot: "before" }, [
                    _vm._v("End Date ")
                  ])
                ]
              ),
              _vm._v(" "),
              _vm.form.errors.has("end_date")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("end_date"))
                    }
                  })
                : _vm._e()
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-4" }, [
            _c(
              "div",
              { staticClass: "form-group" },
              [
                _vm._m(3),
                _vm._v(" "),
                _c(
                  "selectize",
                  {
                    attrs: { settings: _vm.settings, name: "department_id" },
                    model: {
                      value: _vm.form.department_id,
                      callback: function($$v) {
                        _vm.$set(_vm.form, "department_id", $$v)
                      },
                      expression: "form.department_id"
                    }
                  },
                  _vm._l(_vm.departments, function(department) {
                    return _c(
                      "option",
                      { domProps: { value: department.id } },
                      [
                        _vm._v(
                          "\n                            " +
                            _vm._s(department.name) +
                            "\n                        "
                        )
                      ]
                    )
                  }),
                  0
                ),
                _vm._v(" "),
                _vm.form.errors.has("department_id")
                  ? _c("label", {
                      staticClass: "validation-invalid-label",
                      domProps: {
                        textContent: _vm._s(
                          _vm.form.errors.first("department_id")
                        )
                      }
                    })
                  : _vm._e()
              ],
              1
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            _c(
              "div",
              { staticClass: "form-group" },
              [
                _vm._m(4),
                _vm._v(" "),
                _c("wysiwyg", {
                  attrs: { name: "body", value: _vm.form.body },
                  model: {
                    value: _vm.form.body,
                    callback: function($$v) {
                      _vm.$set(_vm.form, "body", $$v)
                    },
                    expression: "form.body"
                  }
                }),
                _vm._v(" "),
                _vm.form.errors.has("body")
                  ? _c("label", {
                      staticClass: "validation-invalid-label",
                      domProps: {
                        textContent: _vm._s(_vm.form.errors.first("body"))
                      }
                    })
                  : _vm._e()
              ],
              1
            )
          ])
        ])
      ]),
      _vm._v(" "),
      _vm._m(5)
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "name" } }, [
      _vm._v("Name "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "venue" } }, [
      _vm._v("Venue "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Department "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Description"),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "card-footer d-flex justify-content-between align-items-center"
      },
      [
        _c(
          "a",
          {
            staticClass: "btn btn-light btn-sm",
            attrs: { type: "submit", href: "" }
          },
          [_vm._v("Cancel")]
        ),
        _vm._v(" "),
        _c(
          "button",
          { staticClass: "btn bg-blue btn-sm", attrs: { type: "submit" } },
          [_vm._v("Submit"), _c("i", { staticClass: "icon-paperplane ml-2" })]
        )
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/event/Edit.vue?vue&type=template&id=74567a56&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/event/Edit.vue?vue&type=template&id=74567a56& ***!
  \********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    {
      staticClass: "card",
      on: {
        submit: function($event) {
          $event.preventDefault()
          return _vm.onSubmit($event)
        },
        keydown: function($event) {
          return _vm.form.errors.clear($event.target.name)
        }
      }
    },
    [
      _c("div", { staticClass: "card-body" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            this.message
              ? _c("div", { class: this.messageClass }, [
                  _vm._m(0),
                  _vm._v(" "),
                  _c("span", {
                    staticClass: "font-weight-semibold",
                    domProps: { textContent: _vm._s(this.message) }
                  })
                ])
              : _vm._e()
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(1),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.name,
                    expression: "form.name"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", name: "name", id: "name" },
                domProps: { value: _vm.form.name },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "name", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("name")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("name"))
                    }
                  })
                : _vm._e()
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-6" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(2),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.venue,
                    expression: "form.venue"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", name: "venue", id: "venue" },
                domProps: { value: _vm.form.venue },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "venue", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("venue")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("venue"))
                    }
                  })
                : _vm._e()
            ])
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "col-md-3" },
            [
              _c(
                "datetime",
                {
                  attrs: {
                    type: "datetime",
                    "input-class": "form-control",
                    "input-id": "start_date",
                    zone: "Africa/Nairobi",
                    "value-zone": "Africa/Nairobi",
                    "hidden-name": "start_date"
                  },
                  model: {
                    value: _vm.form.start_date,
                    callback: function($$v) {
                      _vm.$set(_vm.form, "start_date", $$v)
                    },
                    expression: "form.start_date"
                  }
                },
                [
                  _c("label", { attrs: { slot: "before" }, slot: "before" }, [
                    _vm._v("Start Date")
                  ])
                ]
              ),
              _vm._v(" "),
              _vm.form.errors.has("start_date")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("start_date"))
                    }
                  })
                : _vm._e()
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "col-md-3" },
            [
              _c(
                "datetime",
                {
                  attrs: {
                    type: "datetime",
                    "input-class": "form-control",
                    "input-id": "end_date",
                    zone: "Africa/Nairobi",
                    "value-zone": "Africa/Nairobi",
                    "hidden-name": "end_date"
                  },
                  model: {
                    value: _vm.form.end_date,
                    callback: function($$v) {
                      _vm.$set(_vm.form, "end_date", $$v)
                    },
                    expression: "form.end_date"
                  }
                },
                [
                  _c("label", { attrs: { slot: "before" }, slot: "before" }, [
                    _vm._v("End Date ")
                  ])
                ]
              ),
              _vm._v(" "),
              _vm.form.errors.has("end_date")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("end_date"))
                    }
                  })
                : _vm._e()
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-4" }, [
            _c(
              "div",
              { staticClass: "form-group" },
              [
                _vm._m(3),
                _vm._v(" "),
                _c(
                  "selectize",
                  {
                    attrs: { settings: _vm.settings, name: "department_id" },
                    model: {
                      value: _vm.form.department_id,
                      callback: function($$v) {
                        _vm.$set(_vm.form, "department_id", $$v)
                      },
                      expression: "form.department_id"
                    }
                  },
                  _vm._l(_vm.departments, function(department) {
                    return _c(
                      "option",
                      { domProps: { value: department.id } },
                      [
                        _vm._v(
                          "\n                            " +
                            _vm._s(department.name) +
                            "\n                        "
                        )
                      ]
                    )
                  }),
                  0
                ),
                _vm._v(" "),
                _vm.form.errors.has("department_id")
                  ? _c("label", {
                      staticClass: "validation-invalid-label",
                      domProps: {
                        textContent: _vm._s(
                          _vm.form.errors.first("department_id")
                        )
                      }
                    })
                  : _vm._e()
              ],
              1
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            _c(
              "div",
              { staticClass: "form-group" },
              [
                _vm._m(4),
                _vm._v(" "),
                _c("wysiwyg", {
                  attrs: { name: "body", value: _vm.form.body },
                  model: {
                    value: _vm.form.body,
                    callback: function($$v) {
                      _vm.$set(_vm.form, "body", $$v)
                    },
                    expression: "form.body"
                  }
                }),
                _vm._v(" "),
                _vm.form.errors.has("body")
                  ? _c("label", {
                      staticClass: "validation-invalid-label",
                      domProps: {
                        textContent: _vm._s(_vm.form.errors.first("body"))
                      }
                    })
                  : _vm._e()
              ],
              1
            )
          ])
        ])
      ]),
      _vm._v(" "),
      _vm._m(5)
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "name" } }, [
      _vm._v("Name "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "venue" } }, [
      _vm._v("Venue "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Department "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Description"),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "card-footer d-flex justify-content-between align-items-center"
      },
      [
        _c(
          "a",
          {
            staticClass: "btn btn-light btn-sm",
            attrs: { type: "submit", href: "" }
          },
          [_vm._v("Cancel")]
        ),
        _vm._v(" "),
        _c(
          "button",
          { staticClass: "btn bg-blue btn-sm", attrs: { type: "submit" } },
          [_vm._v("Submit"), _c("i", { staticClass: "icon-paperplane ml-2" })]
        )
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/extension/Create.vue?vue&type=template&id=1a9285fa&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/extension/Create.vue?vue&type=template&id=1a9285fa& ***!
  \**************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "row" }, [
    _c("div", { staticClass: "col-md-6 offset-3" }, [
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-12" }, [
          this.message
            ? _c("div", { class: this.messageClass }, [
                _vm._m(0),
                _vm._v(" "),
                _c("span", {
                  staticClass: "font-weight-semibold",
                  domProps: { textContent: _vm._s(this.message) }
                })
              ])
            : _vm._e()
        ])
      ]),
      _vm._v(" "),
      _c(
        "form",
        {
          staticClass: "card",
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.onSubmit($event)
            },
            keydown: function($event) {
              return _vm.form.errors.clear($event.target.name)
            }
          }
        },
        [
          _c("div", { staticClass: "card-body" }, [
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-12" }, [
                _c(
                  "div",
                  { staticClass: "form-group" },
                  [
                    _vm._m(1),
                    _vm._v(" "),
                    _c(
                      "selectize",
                      {
                        attrs: {
                          settings: _vm.departmentSettings,
                          name: "department_id",
                          id: "department_id"
                        },
                        model: {
                          value: _vm.form.department_id,
                          callback: function($$v) {
                            _vm.$set(_vm.form, "department_id", $$v)
                          },
                          expression: "form.department_id"
                        }
                      },
                      _vm._l(_vm.departments, function(department) {
                        return _c(
                          "option",
                          { domProps: { value: department.id } },
                          [
                            _vm._v(
                              "\n                                    " +
                                _vm._s(department.name) +
                                "\n                                "
                            )
                          ]
                        )
                      }),
                      0
                    ),
                    _vm._v(" "),
                    _vm.form.errors.has("department_id")
                      ? _c("label", {
                          staticClass: "validation-invalid-label",
                          domProps: {
                            textContent: _vm._s(
                              _vm.form.errors.first("department_id")
                            )
                          }
                        })
                      : _vm._e()
                  ],
                  1
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-12" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(2),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.station_name,
                        expression: "form.station_name"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      name: "station_name",
                      id: "station_name",
                      placeholder: "Station / desk name"
                    },
                    domProps: { value: _vm.form.station_name },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "station_name", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("station_name")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("station_name")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-12" }, [
                _c(
                  "div",
                  { staticClass: "form-group" },
                  [
                    _vm._m(3),
                    _vm._v(" "),
                    _c(
                      "selectize",
                      {
                        attrs: {
                          settings: _vm.contactSettings,
                          name: "employees[]",
                          id: "employee_id"
                        },
                        model: {
                          value: _vm.form.employee_id,
                          callback: function($$v) {
                            _vm.$set(_vm.form, "employee_id", $$v)
                          },
                          expression: "form.employee_id"
                        }
                      },
                      _vm._l(_vm.employees, function(employee) {
                        return _c(
                          "option",
                          { domProps: { value: employee.id } },
                          [
                            _vm._v(
                              "\n                                    " +
                                _vm._s(employee.name) +
                                "\n                                "
                            )
                          ]
                        )
                      }),
                      0
                    ),
                    _vm._v(" "),
                    _vm.form.errors.has("contact_person")
                      ? _c("label", {
                          staticClass: "validation-invalid-label",
                          domProps: {
                            textContent: _vm._s(
                              _vm.form.errors.first("contact_person")
                            )
                          }
                        })
                      : _vm._e()
                  ],
                  1
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-12" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(4),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.ext_no,
                        expression: "form.ext_no"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      name: "ext_no",
                      id: "ext_no",
                      placeholder: "Extension number eg 132"
                    },
                    domProps: { value: _vm.form.ext_no },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "ext_no", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("ext_no")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("ext_no"))
                        }
                      })
                    : _vm._e()
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _vm._m(5)
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "department_id" } }, [
      _vm._v("Department "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "ext_no" } }, [
      _vm._v("Station / Desk "),
      _c("span", { staticClass: "text-success small" }, [_vm._v(" (option)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "employee_id" } }, [
      _vm._v("Contact Person "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "ext_no" } }, [
      _vm._v("Extension "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "card-footer d-flex justify-content-between align-items-center"
      },
      [
        _c(
          "button",
          { staticClass: "btn bg-blue btn-sm", attrs: { type: "submit" } },
          [_vm._v("Submit"), _c("i", { staticClass: "icon-paperplane ml-2" })]
        )
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/extension/Edit.vue?vue&type=template&id=af5f3a5e&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/extension/Edit.vue?vue&type=template&id=af5f3a5e& ***!
  \************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "row" }, [
    _c("div", { staticClass: "col-md-6 offset-3" }, [
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-12" }, [
          this.message
            ? _c("div", { class: this.messageClass }, [
                _vm._m(0),
                _vm._v(" "),
                _c("span", {
                  staticClass: "font-weight-semibold",
                  domProps: { textContent: _vm._s(this.message) }
                })
              ])
            : _vm._e()
        ])
      ]),
      _vm._v(" "),
      _c(
        "form",
        {
          staticClass: "card",
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.onSubmit($event)
            },
            keydown: function($event) {
              return _vm.form.errors.clear($event.target.name)
            }
          }
        },
        [
          _c("input", {
            attrs: { type: "hidden", name: "_method", value: "PATCH" }
          }),
          _vm._v(" "),
          _c("div", { staticClass: "card-body" }, [
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-12" }, [
                _c(
                  "div",
                  { staticClass: "form-group" },
                  [
                    _vm._m(1),
                    _vm._v(" "),
                    _c(
                      "selectize",
                      {
                        attrs: {
                          settings: _vm.departmentSettings,
                          name: "department_id",
                          id: "department_id"
                        },
                        model: {
                          value: _vm.form.department_id,
                          callback: function($$v) {
                            _vm.$set(_vm.form, "department_id", $$v)
                          },
                          expression: "form.department_id"
                        }
                      },
                      _vm._l(_vm.departments, function(department) {
                        return _c(
                          "option",
                          { domProps: { value: department.id } },
                          [
                            _vm._v(
                              "\n                                    " +
                                _vm._s(department.name) +
                                "\n                                "
                            )
                          ]
                        )
                      }),
                      0
                    ),
                    _vm._v(" "),
                    _vm.form.errors.has("department_id")
                      ? _c("label", {
                          staticClass: "validation-invalid-label",
                          domProps: {
                            textContent: _vm._s(
                              _vm.form.errors.first("department_id")
                            )
                          }
                        })
                      : _vm._e()
                  ],
                  1
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-12" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(2),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.station_name,
                        expression: "form.station_name"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      name: "station_name",
                      id: "station_name",
                      placeholder: "Station / desk name"
                    },
                    domProps: { value: _vm.form.station_name },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "station_name", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("station_name")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(
                            _vm.form.errors.first("station_name")
                          )
                        }
                      })
                    : _vm._e()
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-12" }, [
                _c(
                  "div",
                  { staticClass: "form-group" },
                  [
                    _vm._m(3),
                    _vm._v(" "),
                    _c(
                      "selectize",
                      {
                        attrs: {
                          settings: _vm.contactSettings,
                          name: "employees[]",
                          id: "employee_id"
                        },
                        model: {
                          value: _vm.form.employee_id,
                          callback: function($$v) {
                            _vm.$set(_vm.form, "employee_id", $$v)
                          },
                          expression: "form.employee_id"
                        }
                      },
                      _vm._l(_vm.employees, function(employee) {
                        return _c(
                          "option",
                          { domProps: { value: employee.id } },
                          [
                            _vm._v(
                              "\n                                    " +
                                _vm._s(employee.name) +
                                "\n                                "
                            )
                          ]
                        )
                      }),
                      0
                    ),
                    _vm._v(" "),
                    _vm.form.errors.has("contact_person")
                      ? _c("label", {
                          staticClass: "validation-invalid-label",
                          domProps: {
                            textContent: _vm._s(
                              _vm.form.errors.first("contact_person")
                            )
                          }
                        })
                      : _vm._e()
                  ],
                  1
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-12" }, [
                _c("div", { staticClass: "form-group" }, [
                  _vm._m(4),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.ext_no,
                        expression: "form.ext_no"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      name: "ext_no",
                      id: "ext_no",
                      placeholder: "Extension number eg 132"
                    },
                    domProps: { value: _vm.form.ext_no },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "ext_no", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm.form.errors.has("ext_no")
                    ? _c("label", {
                        staticClass: "validation-invalid-label",
                        domProps: {
                          textContent: _vm._s(_vm.form.errors.first("ext_no"))
                        }
                      })
                    : _vm._e()
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _vm._m(5)
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "department_id" } }, [
      _vm._v("Department "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "ext_no" } }, [
      _vm._v("Station / Desk "),
      _c("span", { staticClass: "text-success small" }, [_vm._v(" (option)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "employee_id" } }, [
      _vm._v("Contact Person "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "ext_no" } }, [
      _vm._v("Extension "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "card-footer d-flex justify-content-between align-items-center"
      },
      [
        _c(
          "button",
          { staticClass: "btn bg-blue btn-sm", attrs: { type: "submit" } },
          [_vm._v("Submit"), _c("i", { staticClass: "icon-paperplane ml-2" })]
        )
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/memo/Create.vue?vue&type=template&id=29196eca&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/memo/Create.vue?vue&type=template&id=29196eca& ***!
  \*********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    {
      staticClass: "card",
      on: {
        submit: function($event) {
          $event.preventDefault()
          return _vm.onSubmit($event)
        },
        keydown: function($event) {
          return _vm.form.errors.clear($event.target.name)
        }
      }
    },
    [
      _c("div", { staticClass: "card-body" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            this.message
              ? _c("div", { class: this.messageClass }, [
                  _vm._m(0),
                  _vm._v(" "),
                  _c("span", {
                    staticClass: "font-weight-semibold",
                    domProps: { textContent: _vm._s(this.message) }
                  })
                ])
              : _vm._e()
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(1),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.from,
                    expression: "form.from"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", name: "from", id: "from" },
                domProps: { value: _vm.form.from },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "from", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("from")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("from"))
                    }
                  })
                : _vm._e()
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-12" }, [
            _c(
              "div",
              { staticClass: "form-group" },
              [
                _vm._m(2),
                _vm._v(" "),
                _c(
                  "selectize",
                  {
                    attrs: { settings: _vm.settings, name: "to[]" },
                    model: {
                      value: _vm.form.to,
                      callback: function($$v) {
                        _vm.$set(_vm.form, "to", $$v)
                      },
                      expression: "form.to"
                    }
                  },
                  _vm._l(_vm.departments, function(department) {
                    return _c(
                      "option",
                      { domProps: { value: department.id } },
                      [
                        _vm._v(
                          "\n                            " +
                            _vm._s(department.name) +
                            "\n                        "
                        )
                      ]
                    )
                  }),
                  0
                ),
                _vm._v(" "),
                _vm.form.errors.has("to")
                  ? _c("label", {
                      staticClass: "validation-invalid-label",
                      domProps: {
                        textContent: _vm._s(_vm.form.errors.first("to"))
                      }
                    })
                  : _vm._e()
              ],
              1
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(3),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.subject,
                    expression: "form.subject"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", name: "subject", id: "subject" },
                domProps: { value: _vm.form.subject },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "subject", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("subject")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("subject"))
                    }
                  })
                : _vm._e()
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c(
            "div",
            { staticClass: "col-md-3" },
            [
              _c("DatePicker", {
                attrs: { label: "Date", name: "date" },
                model: {
                  value: _vm.form.date,
                  callback: function($$v) {
                    _vm.$set(_vm.form, "date", $$v)
                  },
                  expression: "form.date"
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("date")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("date"))
                    }
                  })
                : _vm._e()
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            _c(
              "div",
              { staticClass: "form-group" },
              [
                _vm._m(4),
                _vm._v(" "),
                _c("wysiwyg", {
                  attrs: { name: "body", value: _vm.form.body },
                  model: {
                    value: _vm.form.body,
                    callback: function($$v) {
                      _vm.$set(_vm.form, "body", $$v)
                    },
                    expression: "form.body"
                  }
                }),
                _vm._v(" "),
                _vm.form.errors.has("body")
                  ? _c("label", {
                      staticClass: "validation-invalid-label",
                      domProps: {
                        textContent: _vm._s(_vm.form.errors.first("body"))
                      }
                    })
                  : _vm._e()
              ],
              1
            )
          ])
        ])
      ]),
      _vm._v(" "),
      _vm._m(5)
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "from" } }, [
      _vm._v("From: "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("To: "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "subject" } }, [
      _vm._v("Subject: "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Message: "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "card-footer d-flex justify-content-between align-items-center"
      },
      [
        _c(
          "a",
          {
            staticClass: "btn btn-light btn-sm",
            attrs: { type: "submit", href: "" }
          },
          [_vm._v("Cancel")]
        ),
        _vm._v(" "),
        _c(
          "button",
          { staticClass: "btn bg-blue btn-sm", attrs: { type: "submit" } },
          [_vm._v("Submit"), _c("i", { staticClass: "icon-paperplane ml-2" })]
        )
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/minutes/Create.vue?vue&type=template&id=200a27ba&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/minutes/Create.vue?vue&type=template&id=200a27ba& ***!
  \************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    {
      staticClass: "card",
      on: {
        submit: function($event) {
          $event.preventDefault()
          return _vm.onSubmit($event)
        },
        keydown: function($event) {
          return _vm.form.errors.clear($event.target.name)
        }
      }
    },
    [
      _c("div", { staticClass: "card-body" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            this.message
              ? _c("div", { class: this.messageClass }, [
                  _vm._m(0),
                  _vm._v(" "),
                  _c("span", {
                    staticClass: "font-weight-semibold",
                    domProps: { textContent: _vm._s(this.message) }
                  })
                ])
              : _vm._e()
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(1),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.name,
                    expression: "form.name"
                  }
                ],
                staticClass: "form-control",
                attrs: {
                  type: "text",
                  name: "name",
                  id: "name",
                  placeholder: "Minutes name eg Management meeting minutes"
                },
                domProps: { value: _vm.form.name },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "name", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("name")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("name"))
                    }
                  })
                : _vm._e()
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-6" }, [
            _c(
              "div",
              { staticClass: "form-group" },
              [
                _vm._m(2),
                _vm._v(" "),
                _c(
                  "selectize",
                  {
                    attrs: {
                      settings: _vm.settings,
                      name: "department_id[]",
                      id: "employee_id"
                    },
                    model: {
                      value: _vm.form.department_id,
                      callback: function($$v) {
                        _vm.$set(_vm.form, "department_id", $$v)
                      },
                      expression: "form.department_id"
                    }
                  },
                  _vm._l(_vm.departments, function(department) {
                    return _c(
                      "option",
                      { domProps: { value: department.id } },
                      [
                        _vm._v(
                          "\n                            " +
                            _vm._s(department.name) +
                            "\n                        "
                        )
                      ]
                    )
                  }),
                  0
                ),
                _vm._v(" "),
                _vm.form.errors.has("department_id")
                  ? _c("label", {
                      staticClass: "validation-invalid-label",
                      domProps: {
                        textContent: _vm._s(
                          _vm.form.errors.first("department_id")
                        )
                      }
                    })
                  : _vm._e()
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "col-md-6" },
            [
              _c("DatePicker", {
                attrs: { label: "Date", name: "date" },
                model: {
                  value: _vm.form.date,
                  callback: function($$v) {
                    _vm.$set(_vm.form, "date", $$v)
                  },
                  expression: "form.date"
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("date")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("date"))
                    }
                  })
                : _vm._e()
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-6" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(3),
              _vm._v(" "),
              _c("input", { attrs: { type: "file", name: "document" } }),
              _vm._v(" "),
              _vm.form.errors.has("department_id")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(
                        _vm.form.errors.first("department_id")
                      )
                    }
                  })
                : _vm._e()
            ])
          ])
        ])
      ]),
      _vm._v(" "),
      _vm._m(4)
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "name" } }, [
      _vm._v("Name: "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "employee_id" } }, [
      _vm._v("Department "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "employee_id" } }, [
      _vm._v("File "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "card-footer d-flex justify-content-between align-items-center"
      },
      [
        _c(
          "a",
          {
            staticClass: "btn btn-light btn-sm",
            attrs: { type: "submit", href: "" }
          },
          [_vm._v("Cancel")]
        ),
        _vm._v(" "),
        _c(
          "button",
          { staticClass: "btn bg-blue btn-sm", attrs: { type: "submit" } },
          [_vm._v("Submit"), _c("i", { staticClass: "icon-paperplane ml-2" })]
        )
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/minutes/Edit.vue?vue&type=template&id=7dd44c1e&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/minutes/Edit.vue?vue&type=template&id=7dd44c1e& ***!
  \**********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    {
      staticClass: "card",
      on: {
        submit: function($event) {
          $event.preventDefault()
          return _vm.onSubmit($event)
        },
        keydown: function($event) {
          return _vm.form.errors.clear($event.target.name)
        }
      }
    },
    [
      _c("div", { staticClass: "card-body" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            this.message
              ? _c("div", { class: this.messageClass }, [
                  _vm._m(0),
                  _vm._v(" "),
                  _c("span", {
                    staticClass: "font-weight-semibold",
                    domProps: { textContent: _vm._s(this.message) }
                  })
                ])
              : _vm._e()
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(1),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.form.name,
                    expression: "form.name"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", name: "name", id: "name" },
                domProps: { value: _vm.form.name },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.form, "name", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("name")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("name"))
                    }
                  })
                : _vm._e()
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c(
            "div",
            { staticClass: "col-md-3" },
            [
              _c("DatePicker", {
                attrs: { label: "Date", name: "date" },
                model: {
                  value: _vm.form.date,
                  callback: function($$v) {
                    _vm.$set(_vm.form, "date", $$v)
                  },
                  expression: "form.date"
                }
              }),
              _vm._v(" "),
              _vm.form.errors.has("date")
                ? _c("label", {
                    staticClass: "validation-invalid-label",
                    domProps: {
                      textContent: _vm._s(_vm.form.errors.first("date"))
                    }
                  })
                : _vm._e()
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-12" }, [
            _c(
              "div",
              { staticClass: "form-group" },
              [
                _vm._m(2),
                _vm._v(" "),
                _c("wysiwyg", {
                  attrs: { name: "body", value: _vm.form.body },
                  model: {
                    value: _vm.form.body,
                    callback: function($$v) {
                      _vm.$set(_vm.form, "body", $$v)
                    },
                    expression: "form.body"
                  }
                }),
                _vm._v(" "),
                _vm.form.errors.has("body")
                  ? _c("label", {
                      staticClass: "validation-invalid-label",
                      domProps: {
                        textContent: _vm._s(_vm.form.errors.first("body"))
                      }
                    })
                  : _vm._e()
              ],
              1
            )
          ])
        ])
      ]),
      _vm._v(" "),
      _vm._m(3)
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: { type: "button", "data-dismiss": "alert" }
      },
      [_c("span", [_vm._v("×")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "name" } }, [
      _vm._v("Name: "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _vm._v("Message: "),
      _c("span", { staticClass: "text-danger small" }, [_vm._v("* (Required)")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "card-footer d-flex justify-content-between align-items-center"
      },
      [
        _c(
          "a",
          {
            staticClass: "btn btn-light btn-sm",
            attrs: { type: "submit", href: "" }
          },
          [_vm._v("Cancel")]
        ),
        _vm._v(" "),
        _c(
          "button",
          { staticClass: "btn bg-blue btn-sm", attrs: { type: "submit" } },
          [_vm._v("Submit"), _c("i", { staticClass: "icon-paperplane ml-2" })]
        )
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/assets/js/app.js":
/*!************************************!*\
  !*** ./resources/assets/js/app.js ***!
  \************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue_notifications__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-notifications */ "./node_modules/vue-notifications/dist/vue-notifications.es5.js");
/* harmony import */ var vue_notifications__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue_notifications__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var izitoast__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! izitoast */ "./node_modules/izitoast/dist/js/iziToast.js");
/* harmony import */ var izitoast__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(izitoast__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var vue_datetime__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-datetime */ "./node_modules/vue-datetime/dist/vue-datetime.js");
/* harmony import */ var vue_datetime__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue_datetime__WEBPACK_IMPORTED_MODULE_2__);
/*
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
__webpack_require__(/*! ./bootstrap */ "./resources/assets/js/bootstrap.js");

window.Vue = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/**
 * Notification libraries
 */





function toast(_ref) {
  var title = _ref.title,
      message = _ref.message,
      type = _ref.type,
      timeout = _ref.timeout,
      cb = _ref.cb;
  if (type === vue_notifications__WEBPACK_IMPORTED_MODULE_0___default.a.types.warn) type = 'warning';
  return izitoast__WEBPACK_IMPORTED_MODULE_1___default.a[type]({
    title: title,
    message: message,
    timeout: timeout
  });
}

var options = {
  success: toast,
  error: toast,
  info: toast,
  warn: toast
};
Vue.use(vue_notifications__WEBPACK_IMPORTED_MODULE_0___default.a, options);

var authorizations = __webpack_require__(/*! ./authorizations */ "./resources/assets/js/authorizations.js");

Vue.prototype.authorize = function () {
  if (!window.signedIn) return false;

  for (var _len = arguments.length, params = new Array(_len), _key = 0; _key < _len; _key++) {
    params[_key] = arguments[_key];
  }

  if (typeof params[0] === 'string') {
    return authorizations[params[0]](params[1]);
  }

  return params[0](window.authenticated);
};
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('datetime', vue_datetime__WEBPACK_IMPORTED_MODULE_2__["Datetime"]);
Vue.component('news', __webpack_require__(/*! ./pages/news.vue */ "./resources/assets/js/pages/news.vue").default);
Vue.component('event-page', __webpack_require__(/*! ./pages/eventPage.vue */ "./resources/assets/js/pages/eventPage.vue").default);
Vue.component('paginator', __webpack_require__(/*! ./components/Paginator.vue */ "./resources/assets/js/components/Paginator.vue").default);
Vue.component('create-event', __webpack_require__(/*! ./components/event/Create.vue */ "./resources/assets/js/components/event/Create.vue").default);
Vue.component('edit-event', __webpack_require__(/*! ./components/event/Edit.vue */ "./resources/assets/js/components/event/Edit.vue").default);
Vue.component('create_user', __webpack_require__(/*! ./components/User/Create.vue */ "./resources/assets/js/components/User/Create.vue").default);
Vue.component('edit_user', __webpack_require__(/*! ./components/User/Edit.vue */ "./resources/assets/js/components/User/Edit.vue").default);
Vue.component('create_memo', __webpack_require__(/*! ./components/memo/Create.vue */ "./resources/assets/js/components/memo/Create.vue").default);
Vue.component('edit_employee', __webpack_require__(/*! ./components/employee/Edit.vue */ "./resources/assets/js/components/employee/Edit.vue").default);
Vue.component('create_department', __webpack_require__(/*! ./components/department/Create.vue */ "./resources/assets/js/components/department/Create.vue").default);
Vue.component('edit_department', __webpack_require__(/*! ./components/department/Edit.vue */ "./resources/assets/js/components/department/Edit.vue").default);
Vue.component('view_department', __webpack_require__(/*! ./components/department/Show.vue */ "./resources/assets/js/components/department/Show.vue").default);
Vue.component('create_extension', __webpack_require__(/*! ./components/extension/Create.vue */ "./resources/assets/js/components/extension/Create.vue").default);
Vue.component('edit_extension', __webpack_require__(/*! ./components/extension/Edit.vue */ "./resources/assets/js/components/extension/Edit.vue").default);
Vue.component('create_minutes', __webpack_require__(/*! ./components/minutes/Create.vue */ "./resources/assets/js/components/minutes/Create.vue").default);
Vue.component('edit_minutes', __webpack_require__(/*! ./components/minutes/Edit.vue */ "./resources/assets/js/components/minutes/Edit.vue").default);
Vue.component('countdown', __webpack_require__(/*! ./components/Countdown.vue */ "./resources/assets/js/components/Countdown.vue").default);
Vue.component('register', __webpack_require__(/*! ./components/auth/Register.vue */ "./resources/assets/js/components/auth/Register.vue").default);
Vue.component('wysiwyg', __webpack_require__(/*! ./components/Wysiwyg.vue */ "./resources/assets/js/components/Wysiwyg.vue").default);
Vue.component('profile', __webpack_require__(/*! ./components/Frontend/Profile.vue */ "./resources/assets/js/components/Frontend/Profile.vue").default);
Vue.component('activate', __webpack_require__(/*! ./components/User/Activate.vue */ "./resources/assets/js/components/User/Activate.vue").default);
Vue.component('notifications', __webpack_require__(/*! ./components/Notifications.vue */ "./resources/assets/js/components/Notifications.vue").default); // Vue.component('documents', require('./components/Frontend/Documents.vue').default);

Vue.component('documents_upload', __webpack_require__(/*! ./components/Frontend/DocumentsUpload */ "./resources/assets/js/components/Frontend/DocumentsUpload.vue").default);
Vue.component('documents', __webpack_require__(/*! ./components/Frontend/Documents/index */ "./resources/assets/js/components/Frontend/Documents/index.vue").default); // window.events = new Vue();
// window.flash = function (message, level = 'success') {
//     window.events.$emit('flash', {message, level});
// };

var app = new Vue({
  el: '#app'
});

/***/ }),

/***/ "./resources/assets/js/authorizations.js":
/*!***********************************************!*\
  !*** ./resources/assets/js/authorizations.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */
module.exports = {
  update: function update(comment) {
    return comment.user_id === window.authenticated.id;
  }
};

/***/ }),

/***/ "./resources/assets/js/bootstrap.js":
/*!******************************************!*\
  !*** ./resources/assets/js/bootstrap.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */
window._ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js"); // window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {// window.$ = window.jQuery = require('jquery');
  // require('bootstrap');
} catch (e) {}
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


window.axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

var token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
// import Echo from 'laravel-echo'
// window.Pusher = require('pusher-js');
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

/***/ }),

/***/ "./resources/assets/js/components/CommentComponent.vue":
/*!*************************************************************!*\
  !*** ./resources/assets/js/components/CommentComponent.vue ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CommentComponent_vue_vue_type_template_id_4720d6d6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CommentComponent.vue?vue&type=template&id=4720d6d6& */ "./resources/assets/js/components/CommentComponent.vue?vue&type=template&id=4720d6d6&");
/* harmony import */ var _CommentComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CommentComponent.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/CommentComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _CommentComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _CommentComponent_vue_vue_type_template_id_4720d6d6___WEBPACK_IMPORTED_MODULE_0__["render"],
  _CommentComponent_vue_vue_type_template_id_4720d6d6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/CommentComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/CommentComponent.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/assets/js/components/CommentComponent.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CommentComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./CommentComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/CommentComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CommentComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/CommentComponent.vue?vue&type=template&id=4720d6d6&":
/*!********************************************************************************************!*\
  !*** ./resources/assets/js/components/CommentComponent.vue?vue&type=template&id=4720d6d6& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CommentComponent_vue_vue_type_template_id_4720d6d6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./CommentComponent.vue?vue&type=template&id=4720d6d6& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/CommentComponent.vue?vue&type=template&id=4720d6d6&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CommentComponent_vue_vue_type_template_id_4720d6d6___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CommentComponent_vue_vue_type_template_id_4720d6d6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/CommentsComponent.vue":
/*!**************************************************************!*\
  !*** ./resources/assets/js/components/CommentsComponent.vue ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CommentsComponent_vue_vue_type_template_id_abb4387c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CommentsComponent.vue?vue&type=template&id=abb4387c& */ "./resources/assets/js/components/CommentsComponent.vue?vue&type=template&id=abb4387c&");
/* harmony import */ var _CommentsComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CommentsComponent.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/CommentsComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _CommentsComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _CommentsComponent_vue_vue_type_template_id_abb4387c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _CommentsComponent_vue_vue_type_template_id_abb4387c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/CommentsComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/CommentsComponent.vue?vue&type=script&lang=js&":
/*!***************************************************************************************!*\
  !*** ./resources/assets/js/components/CommentsComponent.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CommentsComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./CommentsComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/CommentsComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CommentsComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/CommentsComponent.vue?vue&type=template&id=abb4387c&":
/*!*********************************************************************************************!*\
  !*** ./resources/assets/js/components/CommentsComponent.vue?vue&type=template&id=abb4387c& ***!
  \*********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CommentsComponent_vue_vue_type_template_id_abb4387c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./CommentsComponent.vue?vue&type=template&id=abb4387c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/CommentsComponent.vue?vue&type=template&id=abb4387c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CommentsComponent_vue_vue_type_template_id_abb4387c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CommentsComponent_vue_vue_type_template_id_abb4387c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/Countdown.vue":
/*!******************************************************!*\
  !*** ./resources/assets/js/components/Countdown.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Countdown_vue_vue_type_template_id_63ea958a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Countdown.vue?vue&type=template&id=63ea958a& */ "./resources/assets/js/components/Countdown.vue?vue&type=template&id=63ea958a&");
/* harmony import */ var _Countdown_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Countdown.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/Countdown.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Countdown_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Countdown_vue_vue_type_template_id_63ea958a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Countdown_vue_vue_type_template_id_63ea958a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/Countdown.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/Countdown.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/assets/js/components/Countdown.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Countdown_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Countdown.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Countdown.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Countdown_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/Countdown.vue?vue&type=template&id=63ea958a&":
/*!*************************************************************************************!*\
  !*** ./resources/assets/js/components/Countdown.vue?vue&type=template&id=63ea958a& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Countdown_vue_vue_type_template_id_63ea958a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Countdown.vue?vue&type=template&id=63ea958a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Countdown.vue?vue&type=template&id=63ea958a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Countdown_vue_vue_type_template_id_63ea958a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Countdown_vue_vue_type_template_id_63ea958a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/DatePicker.vue":
/*!*******************************************************!*\
  !*** ./resources/assets/js/components/DatePicker.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DatePicker_vue_vue_type_template_id_5b6a2d5a_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DatePicker.vue?vue&type=template&id=5b6a2d5a&scoped=true& */ "./resources/assets/js/components/DatePicker.vue?vue&type=template&id=5b6a2d5a&scoped=true&");
/* harmony import */ var _DatePicker_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DatePicker.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/DatePicker.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _DatePicker_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DatePicker_vue_vue_type_template_id_5b6a2d5a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _DatePicker_vue_vue_type_template_id_5b6a2d5a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "5b6a2d5a",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/DatePicker.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/DatePicker.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/assets/js/components/DatePicker.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DatePicker_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./DatePicker.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/DatePicker.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DatePicker_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/DatePicker.vue?vue&type=template&id=5b6a2d5a&scoped=true&":
/*!**************************************************************************************************!*\
  !*** ./resources/assets/js/components/DatePicker.vue?vue&type=template&id=5b6a2d5a&scoped=true& ***!
  \**************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DatePicker_vue_vue_type_template_id_5b6a2d5a_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./DatePicker.vue?vue&type=template&id=5b6a2d5a&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/DatePicker.vue?vue&type=template&id=5b6a2d5a&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DatePicker_vue_vue_type_template_id_5b6a2d5a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DatePicker_vue_vue_type_template_id_5b6a2d5a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/Event.vue":
/*!**************************************************!*\
  !*** ./resources/assets/js/components/Event.vue ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Event_vue_vue_type_template_id_49441df3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Event.vue?vue&type=template&id=49441df3& */ "./resources/assets/js/components/Event.vue?vue&type=template&id=49441df3&");
/* harmony import */ var _Event_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Event.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/Event.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Event_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Event_vue_vue_type_template_id_49441df3___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Event_vue_vue_type_template_id_49441df3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/Event.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/Event.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/assets/js/components/Event.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Event_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Event.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Event.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Event_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/Event.vue?vue&type=template&id=49441df3&":
/*!*********************************************************************************!*\
  !*** ./resources/assets/js/components/Event.vue?vue&type=template&id=49441df3& ***!
  \*********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Event_vue_vue_type_template_id_49441df3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Event.vue?vue&type=template&id=49441df3& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Event.vue?vue&type=template&id=49441df3&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Event_vue_vue_type_template_id_49441df3___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Event_vue_vue_type_template_id_49441df3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/Events.vue":
/*!***************************************************!*\
  !*** ./resources/assets/js/components/Events.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Events_vue_vue_type_template_id_3a297ce0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Events.vue?vue&type=template&id=3a297ce0& */ "./resources/assets/js/components/Events.vue?vue&type=template&id=3a297ce0&");
/* harmony import */ var _Events_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Events.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/Events.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Events_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Events_vue_vue_type_template_id_3a297ce0___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Events_vue_vue_type_template_id_3a297ce0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/Events.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/Events.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/assets/js/components/Events.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Events_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Events.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Events.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Events_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/Events.vue?vue&type=template&id=3a297ce0&":
/*!**********************************************************************************!*\
  !*** ./resources/assets/js/components/Events.vue?vue&type=template&id=3a297ce0& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Events_vue_vue_type_template_id_3a297ce0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Events.vue?vue&type=template&id=3a297ce0& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Events.vue?vue&type=template&id=3a297ce0&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Events_vue_vue_type_template_id_3a297ce0___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Events_vue_vue_type_template_id_3a297ce0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/Frontend/Documents/index.vue":
/*!*********************************************************************!*\
  !*** ./resources/assets/js/components/Frontend/Documents/index.vue ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_vue_vue_type_template_id_6df7d0d5_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=6df7d0d5&scoped=true& */ "./resources/assets/js/components/Frontend/Documents/index.vue?vue&type=template&id=6df7d0d5&scoped=true&");
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/Frontend/Documents/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _index_vue_vue_type_template_id_6df7d0d5_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _index_vue_vue_type_template_id_6df7d0d5_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "6df7d0d5",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/Frontend/Documents/index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/Frontend/Documents/index.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************!*\
  !*** ./resources/assets/js/components/Frontend/Documents/index.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Frontend/Documents/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/Frontend/Documents/index.vue?vue&type=template&id=6df7d0d5&scoped=true&":
/*!****************************************************************************************************************!*\
  !*** ./resources/assets/js/components/Frontend/Documents/index.vue?vue&type=template&id=6df7d0d5&scoped=true& ***!
  \****************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_6df7d0d5_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=template&id=6df7d0d5&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Frontend/Documents/index.vue?vue&type=template&id=6df7d0d5&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_6df7d0d5_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_6df7d0d5_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/Frontend/DocumentsUpload.vue":
/*!*********************************************************************!*\
  !*** ./resources/assets/js/components/Frontend/DocumentsUpload.vue ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DocumentsUpload_vue_vue_type_template_id_2cf29df3_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DocumentsUpload.vue?vue&type=template&id=2cf29df3&scoped=true& */ "./resources/assets/js/components/Frontend/DocumentsUpload.vue?vue&type=template&id=2cf29df3&scoped=true&");
/* harmony import */ var _DocumentsUpload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DocumentsUpload.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/Frontend/DocumentsUpload.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _DocumentsUpload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DocumentsUpload_vue_vue_type_template_id_2cf29df3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _DocumentsUpload_vue_vue_type_template_id_2cf29df3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "2cf29df3",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/Frontend/DocumentsUpload.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/Frontend/DocumentsUpload.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************!*\
  !*** ./resources/assets/js/components/Frontend/DocumentsUpload.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DocumentsUpload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./DocumentsUpload.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Frontend/DocumentsUpload.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DocumentsUpload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/Frontend/DocumentsUpload.vue?vue&type=template&id=2cf29df3&scoped=true&":
/*!****************************************************************************************************************!*\
  !*** ./resources/assets/js/components/Frontend/DocumentsUpload.vue?vue&type=template&id=2cf29df3&scoped=true& ***!
  \****************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DocumentsUpload_vue_vue_type_template_id_2cf29df3_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./DocumentsUpload.vue?vue&type=template&id=2cf29df3&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Frontend/DocumentsUpload.vue?vue&type=template&id=2cf29df3&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DocumentsUpload_vue_vue_type_template_id_2cf29df3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DocumentsUpload_vue_vue_type_template_id_2cf29df3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/Frontend/Profile.vue":
/*!*************************************************************!*\
  !*** ./resources/assets/js/components/Frontend/Profile.vue ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Profile_vue_vue_type_template_id_073bfec3_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Profile.vue?vue&type=template&id=073bfec3&scoped=true& */ "./resources/assets/js/components/Frontend/Profile.vue?vue&type=template&id=073bfec3&scoped=true&");
/* harmony import */ var _Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Profile.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/Frontend/Profile.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Profile_vue_vue_type_template_id_073bfec3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Profile_vue_vue_type_template_id_073bfec3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "073bfec3",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/Frontend/Profile.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/Frontend/Profile.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/assets/js/components/Frontend/Profile.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Profile.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Frontend/Profile.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/Frontend/Profile.vue?vue&type=template&id=073bfec3&scoped=true&":
/*!********************************************************************************************************!*\
  !*** ./resources/assets/js/components/Frontend/Profile.vue?vue&type=template&id=073bfec3&scoped=true& ***!
  \********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_template_id_073bfec3_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Profile.vue?vue&type=template&id=073bfec3&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Frontend/Profile.vue?vue&type=template&id=073bfec3&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_template_id_073bfec3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_template_id_073bfec3_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/NewComment.vue":
/*!*******************************************************!*\
  !*** ./resources/assets/js/components/NewComment.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _NewComment_vue_vue_type_template_id_768aae96___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./NewComment.vue?vue&type=template&id=768aae96& */ "./resources/assets/js/components/NewComment.vue?vue&type=template&id=768aae96&");
/* harmony import */ var _NewComment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./NewComment.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/NewComment.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _NewComment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _NewComment_vue_vue_type_template_id_768aae96___WEBPACK_IMPORTED_MODULE_0__["render"],
  _NewComment_vue_vue_type_template_id_768aae96___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/NewComment.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/NewComment.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/assets/js/components/NewComment.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NewComment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./NewComment.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/NewComment.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NewComment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/NewComment.vue?vue&type=template&id=768aae96&":
/*!**************************************************************************************!*\
  !*** ./resources/assets/js/components/NewComment.vue?vue&type=template&id=768aae96& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NewComment_vue_vue_type_template_id_768aae96___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./NewComment.vue?vue&type=template&id=768aae96& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/NewComment.vue?vue&type=template&id=768aae96&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NewComment_vue_vue_type_template_id_768aae96___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NewComment_vue_vue_type_template_id_768aae96___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/Notifications.vue":
/*!**********************************************************!*\
  !*** ./resources/assets/js/components/Notifications.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Notifications_vue_vue_type_template_id_5db11841_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Notifications.vue?vue&type=template&id=5db11841&scoped=true& */ "./resources/assets/js/components/Notifications.vue?vue&type=template&id=5db11841&scoped=true&");
/* harmony import */ var _Notifications_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Notifications.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/Notifications.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Notifications_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Notifications_vue_vue_type_template_id_5db11841_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Notifications_vue_vue_type_template_id_5db11841_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "5db11841",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/Notifications.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/Notifications.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/assets/js/components/Notifications.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Notifications_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Notifications.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Notifications.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Notifications_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/Notifications.vue?vue&type=template&id=5db11841&scoped=true&":
/*!*****************************************************************************************************!*\
  !*** ./resources/assets/js/components/Notifications.vue?vue&type=template&id=5db11841&scoped=true& ***!
  \*****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Notifications_vue_vue_type_template_id_5db11841_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Notifications.vue?vue&type=template&id=5db11841&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Notifications.vue?vue&type=template&id=5db11841&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Notifications_vue_vue_type_template_id_5db11841_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Notifications_vue_vue_type_template_id_5db11841_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/Paginator.vue":
/*!******************************************************!*\
  !*** ./resources/assets/js/components/Paginator.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Paginator_vue_vue_type_template_id_74bc836a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Paginator.vue?vue&type=template&id=74bc836a& */ "./resources/assets/js/components/Paginator.vue?vue&type=template&id=74bc836a&");
/* harmony import */ var _Paginator_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Paginator.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/Paginator.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Paginator_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Paginator_vue_vue_type_template_id_74bc836a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Paginator_vue_vue_type_template_id_74bc836a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/Paginator.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/Paginator.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/assets/js/components/Paginator.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Paginator_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Paginator.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Paginator.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Paginator_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/Paginator.vue?vue&type=template&id=74bc836a&":
/*!*************************************************************************************!*\
  !*** ./resources/assets/js/components/Paginator.vue?vue&type=template&id=74bc836a& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Paginator_vue_vue_type_template_id_74bc836a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Paginator.vue?vue&type=template&id=74bc836a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Paginator.vue?vue&type=template&id=74bc836a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Paginator_vue_vue_type_template_id_74bc836a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Paginator_vue_vue_type_template_id_74bc836a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/User/Activate.vue":
/*!**********************************************************!*\
  !*** ./resources/assets/js/components/User/Activate.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Activate_vue_vue_type_template_id_fd0e92a0_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Activate.vue?vue&type=template&id=fd0e92a0&scoped=true& */ "./resources/assets/js/components/User/Activate.vue?vue&type=template&id=fd0e92a0&scoped=true&");
/* harmony import */ var _Activate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Activate.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/User/Activate.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Activate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Activate_vue_vue_type_template_id_fd0e92a0_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Activate_vue_vue_type_template_id_fd0e92a0_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "fd0e92a0",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/User/Activate.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/User/Activate.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/assets/js/components/User/Activate.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Activate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Activate.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/User/Activate.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Activate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/User/Activate.vue?vue&type=template&id=fd0e92a0&scoped=true&":
/*!*****************************************************************************************************!*\
  !*** ./resources/assets/js/components/User/Activate.vue?vue&type=template&id=fd0e92a0&scoped=true& ***!
  \*****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Activate_vue_vue_type_template_id_fd0e92a0_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Activate.vue?vue&type=template&id=fd0e92a0&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/User/Activate.vue?vue&type=template&id=fd0e92a0&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Activate_vue_vue_type_template_id_fd0e92a0_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Activate_vue_vue_type_template_id_fd0e92a0_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/User/Create.vue":
/*!********************************************************!*\
  !*** ./resources/assets/js/components/User/Create.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Create_vue_vue_type_template_id_8cb5890e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Create.vue?vue&type=template&id=8cb5890e&scoped=true& */ "./resources/assets/js/components/User/Create.vue?vue&type=template&id=8cb5890e&scoped=true&");
/* harmony import */ var _Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Create.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/User/Create.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Create_vue_vue_type_template_id_8cb5890e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Create_vue_vue_type_template_id_8cb5890e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "8cb5890e",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/User/Create.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/User/Create.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/assets/js/components/User/Create.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Create.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/User/Create.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/User/Create.vue?vue&type=template&id=8cb5890e&scoped=true&":
/*!***************************************************************************************************!*\
  !*** ./resources/assets/js/components/User/Create.vue?vue&type=template&id=8cb5890e&scoped=true& ***!
  \***************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_8cb5890e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Create.vue?vue&type=template&id=8cb5890e&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/User/Create.vue?vue&type=template&id=8cb5890e&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_8cb5890e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_8cb5890e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/User/Edit.vue":
/*!******************************************************!*\
  !*** ./resources/assets/js/components/User/Edit.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Edit_vue_vue_type_template_id_3acff272_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Edit.vue?vue&type=template&id=3acff272&scoped=true& */ "./resources/assets/js/components/User/Edit.vue?vue&type=template&id=3acff272&scoped=true&");
/* harmony import */ var _Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Edit.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/User/Edit.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Edit_vue_vue_type_template_id_3acff272_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Edit_vue_vue_type_template_id_3acff272_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "3acff272",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/User/Edit.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/User/Edit.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/assets/js/components/User/Edit.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Edit.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/User/Edit.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/User/Edit.vue?vue&type=template&id=3acff272&scoped=true&":
/*!*************************************************************************************************!*\
  !*** ./resources/assets/js/components/User/Edit.vue?vue&type=template&id=3acff272&scoped=true& ***!
  \*************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_3acff272_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Edit.vue?vue&type=template&id=3acff272&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/User/Edit.vue?vue&type=template&id=3acff272&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_3acff272_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_3acff272_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/Wysiwyg.vue":
/*!****************************************************!*\
  !*** ./resources/assets/js/components/Wysiwyg.vue ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Wysiwyg_vue_vue_type_template_id_e08f58b4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Wysiwyg.vue?vue&type=template&id=e08f58b4& */ "./resources/assets/js/components/Wysiwyg.vue?vue&type=template&id=e08f58b4&");
/* harmony import */ var _Wysiwyg_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Wysiwyg.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/Wysiwyg.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Wysiwyg_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Wysiwyg_vue_vue_type_template_id_e08f58b4___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Wysiwyg_vue_vue_type_template_id_e08f58b4___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/Wysiwyg.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/Wysiwyg.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/assets/js/components/Wysiwyg.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Wysiwyg_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Wysiwyg.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Wysiwyg.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Wysiwyg_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/Wysiwyg.vue?vue&type=template&id=e08f58b4&":
/*!***********************************************************************************!*\
  !*** ./resources/assets/js/components/Wysiwyg.vue?vue&type=template&id=e08f58b4& ***!
  \***********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Wysiwyg_vue_vue_type_template_id_e08f58b4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Wysiwyg.vue?vue&type=template&id=e08f58b4& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Wysiwyg.vue?vue&type=template&id=e08f58b4&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Wysiwyg_vue_vue_type_template_id_e08f58b4___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Wysiwyg_vue_vue_type_template_id_e08f58b4___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/auth/Register.vue":
/*!**********************************************************!*\
  !*** ./resources/assets/js/components/auth/Register.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Register_vue_vue_type_template_id_5f3035c3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Register.vue?vue&type=template&id=5f3035c3& */ "./resources/assets/js/components/auth/Register.vue?vue&type=template&id=5f3035c3&");
/* harmony import */ var _Register_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Register.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/auth/Register.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Register_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Register_vue_vue_type_template_id_5f3035c3___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Register_vue_vue_type_template_id_5f3035c3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/auth/Register.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/auth/Register.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/assets/js/components/auth/Register.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Register_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Register.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/auth/Register.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Register_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/auth/Register.vue?vue&type=template&id=5f3035c3&":
/*!*****************************************************************************************!*\
  !*** ./resources/assets/js/components/auth/Register.vue?vue&type=template&id=5f3035c3& ***!
  \*****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Register_vue_vue_type_template_id_5f3035c3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Register.vue?vue&type=template&id=5f3035c3& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/auth/Register.vue?vue&type=template&id=5f3035c3&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Register_vue_vue_type_template_id_5f3035c3___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Register_vue_vue_type_template_id_5f3035c3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/department/Create.vue":
/*!**************************************************************!*\
  !*** ./resources/assets/js/components/department/Create.vue ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Create_vue_vue_type_template_id_f700361c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Create.vue?vue&type=template&id=f700361c&scoped=true& */ "./resources/assets/js/components/department/Create.vue?vue&type=template&id=f700361c&scoped=true&");
/* harmony import */ var _Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Create.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/department/Create.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Create_vue_vue_type_template_id_f700361c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Create_vue_vue_type_template_id_f700361c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "f700361c",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/department/Create.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/department/Create.vue?vue&type=script&lang=js&":
/*!***************************************************************************************!*\
  !*** ./resources/assets/js/components/department/Create.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Create.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/department/Create.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/department/Create.vue?vue&type=template&id=f700361c&scoped=true&":
/*!*********************************************************************************************************!*\
  !*** ./resources/assets/js/components/department/Create.vue?vue&type=template&id=f700361c&scoped=true& ***!
  \*********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_f700361c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Create.vue?vue&type=template&id=f700361c&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/department/Create.vue?vue&type=template&id=f700361c&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_f700361c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_f700361c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/department/Edit.vue":
/*!************************************************************!*\
  !*** ./resources/assets/js/components/department/Edit.vue ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Edit_vue_vue_type_template_id_58d0ba80_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Edit.vue?vue&type=template&id=58d0ba80&scoped=true& */ "./resources/assets/js/components/department/Edit.vue?vue&type=template&id=58d0ba80&scoped=true&");
/* harmony import */ var _Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Edit.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/department/Edit.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Edit_vue_vue_type_template_id_58d0ba80_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Edit_vue_vue_type_template_id_58d0ba80_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "58d0ba80",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/department/Edit.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/department/Edit.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/assets/js/components/department/Edit.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Edit.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/department/Edit.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/department/Edit.vue?vue&type=template&id=58d0ba80&scoped=true&":
/*!*******************************************************************************************************!*\
  !*** ./resources/assets/js/components/department/Edit.vue?vue&type=template&id=58d0ba80&scoped=true& ***!
  \*******************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_58d0ba80_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Edit.vue?vue&type=template&id=58d0ba80&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/department/Edit.vue?vue&type=template&id=58d0ba80&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_58d0ba80_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_58d0ba80_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/department/Show.vue":
/*!************************************************************!*\
  !*** ./resources/assets/js/components/department/Show.vue ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Show_vue_vue_type_template_id_35bd141a_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Show.vue?vue&type=template&id=35bd141a&scoped=true& */ "./resources/assets/js/components/department/Show.vue?vue&type=template&id=35bd141a&scoped=true&");
/* harmony import */ var _Show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Show.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/department/Show.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Show_vue_vue_type_template_id_35bd141a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Show_vue_vue_type_template_id_35bd141a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "35bd141a",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/department/Show.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/department/Show.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/assets/js/components/department/Show.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Show.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/department/Show.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/department/Show.vue?vue&type=template&id=35bd141a&scoped=true&":
/*!*******************************************************************************************************!*\
  !*** ./resources/assets/js/components/department/Show.vue?vue&type=template&id=35bd141a&scoped=true& ***!
  \*******************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_template_id_35bd141a_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Show.vue?vue&type=template&id=35bd141a&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/department/Show.vue?vue&type=template&id=35bd141a&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_template_id_35bd141a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_template_id_35bd141a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/employee/Edit.vue":
/*!**********************************************************!*\
  !*** ./resources/assets/js/components/employee/Edit.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Edit_vue_vue_type_template_id_1025d2e4_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Edit.vue?vue&type=template&id=1025d2e4&scoped=true& */ "./resources/assets/js/components/employee/Edit.vue?vue&type=template&id=1025d2e4&scoped=true&");
/* harmony import */ var _Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Edit.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/employee/Edit.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Edit_vue_vue_type_template_id_1025d2e4_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Edit_vue_vue_type_template_id_1025d2e4_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "1025d2e4",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/employee/Edit.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/employee/Edit.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/assets/js/components/employee/Edit.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Edit.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/employee/Edit.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/employee/Edit.vue?vue&type=template&id=1025d2e4&scoped=true&":
/*!*****************************************************************************************************!*\
  !*** ./resources/assets/js/components/employee/Edit.vue?vue&type=template&id=1025d2e4&scoped=true& ***!
  \*****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_1025d2e4_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Edit.vue?vue&type=template&id=1025d2e4&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/employee/Edit.vue?vue&type=template&id=1025d2e4&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_1025d2e4_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_1025d2e4_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/event/Create.vue":
/*!*********************************************************!*\
  !*** ./resources/assets/js/components/event/Create.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Create_vue_vue_type_template_id_54d5f170___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Create.vue?vue&type=template&id=54d5f170& */ "./resources/assets/js/components/event/Create.vue?vue&type=template&id=54d5f170&");
/* harmony import */ var _Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Create.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/event/Create.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var selectize_dist_css_selectize_bootstrap3_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! selectize/dist/css/selectize.bootstrap3.css?vue&type=style&index=0&lang=css& */ "./node_modules/selectize/dist/css/selectize.bootstrap3.css?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Create_vue_vue_type_template_id_54d5f170___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Create_vue_vue_type_template_id_54d5f170___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/event/Create.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/event/Create.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/assets/js/components/event/Create.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Create.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/event/Create.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/event/Create.vue?vue&type=template&id=54d5f170&":
/*!****************************************************************************************!*\
  !*** ./resources/assets/js/components/event/Create.vue?vue&type=template&id=54d5f170& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_54d5f170___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Create.vue?vue&type=template&id=54d5f170& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/event/Create.vue?vue&type=template&id=54d5f170&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_54d5f170___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_54d5f170___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/event/Edit.vue":
/*!*******************************************************!*\
  !*** ./resources/assets/js/components/event/Edit.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Edit_vue_vue_type_template_id_74567a56___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Edit.vue?vue&type=template&id=74567a56& */ "./resources/assets/js/components/event/Edit.vue?vue&type=template&id=74567a56&");
/* harmony import */ var _Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Edit.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/event/Edit.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var selectize_dist_css_selectize_bootstrap3_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! selectize/dist/css/selectize.bootstrap3.css?vue&type=style&index=0&lang=css& */ "./node_modules/selectize/dist/css/selectize.bootstrap3.css?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Edit_vue_vue_type_template_id_74567a56___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Edit_vue_vue_type_template_id_74567a56___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/event/Edit.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/event/Edit.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/assets/js/components/event/Edit.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Edit.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/event/Edit.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/event/Edit.vue?vue&type=template&id=74567a56&":
/*!**************************************************************************************!*\
  !*** ./resources/assets/js/components/event/Edit.vue?vue&type=template&id=74567a56& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_74567a56___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Edit.vue?vue&type=template&id=74567a56& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/event/Edit.vue?vue&type=template&id=74567a56&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_74567a56___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_74567a56___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/extension/Create.vue":
/*!*************************************************************!*\
  !*** ./resources/assets/js/components/extension/Create.vue ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Create_vue_vue_type_template_id_1a9285fa___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Create.vue?vue&type=template&id=1a9285fa& */ "./resources/assets/js/components/extension/Create.vue?vue&type=template&id=1a9285fa&");
/* harmony import */ var _Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Create.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/extension/Create.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var selectize_dist_css_selectize_bootstrap3_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! selectize/dist/css/selectize.bootstrap3.css?vue&type=style&index=0&lang=css& */ "./node_modules/selectize/dist/css/selectize.bootstrap3.css?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Create_vue_vue_type_template_id_1a9285fa___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Create_vue_vue_type_template_id_1a9285fa___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/extension/Create.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/extension/Create.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/assets/js/components/extension/Create.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Create.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/extension/Create.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/extension/Create.vue?vue&type=template&id=1a9285fa&":
/*!********************************************************************************************!*\
  !*** ./resources/assets/js/components/extension/Create.vue?vue&type=template&id=1a9285fa& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_1a9285fa___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Create.vue?vue&type=template&id=1a9285fa& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/extension/Create.vue?vue&type=template&id=1a9285fa&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_1a9285fa___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_1a9285fa___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/extension/Edit.vue":
/*!***********************************************************!*\
  !*** ./resources/assets/js/components/extension/Edit.vue ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Edit_vue_vue_type_template_id_af5f3a5e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Edit.vue?vue&type=template&id=af5f3a5e& */ "./resources/assets/js/components/extension/Edit.vue?vue&type=template&id=af5f3a5e&");
/* harmony import */ var _Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Edit.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/extension/Edit.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var selectize_dist_css_selectize_bootstrap3_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! selectize/dist/css/selectize.bootstrap3.css?vue&type=style&index=0&lang=css& */ "./node_modules/selectize/dist/css/selectize.bootstrap3.css?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Edit_vue_vue_type_template_id_af5f3a5e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Edit_vue_vue_type_template_id_af5f3a5e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/extension/Edit.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/extension/Edit.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/assets/js/components/extension/Edit.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Edit.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/extension/Edit.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/extension/Edit.vue?vue&type=template&id=af5f3a5e&":
/*!******************************************************************************************!*\
  !*** ./resources/assets/js/components/extension/Edit.vue?vue&type=template&id=af5f3a5e& ***!
  \******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_af5f3a5e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Edit.vue?vue&type=template&id=af5f3a5e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/extension/Edit.vue?vue&type=template&id=af5f3a5e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_af5f3a5e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_af5f3a5e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/memo/Create.vue":
/*!********************************************************!*\
  !*** ./resources/assets/js/components/memo/Create.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Create_vue_vue_type_template_id_29196eca___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Create.vue?vue&type=template&id=29196eca& */ "./resources/assets/js/components/memo/Create.vue?vue&type=template&id=29196eca&");
/* harmony import */ var _Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Create.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/memo/Create.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var selectize_dist_css_selectize_bootstrap3_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! selectize/dist/css/selectize.bootstrap3.css?vue&type=style&index=0&lang=css& */ "./node_modules/selectize/dist/css/selectize.bootstrap3.css?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Create_vue_vue_type_template_id_29196eca___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Create_vue_vue_type_template_id_29196eca___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/memo/Create.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/memo/Create.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/assets/js/components/memo/Create.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Create.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/memo/Create.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/memo/Create.vue?vue&type=template&id=29196eca&":
/*!***************************************************************************************!*\
  !*** ./resources/assets/js/components/memo/Create.vue?vue&type=template&id=29196eca& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_29196eca___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Create.vue?vue&type=template&id=29196eca& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/memo/Create.vue?vue&type=template&id=29196eca&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_29196eca___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_29196eca___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/minutes/Create.vue":
/*!***********************************************************!*\
  !*** ./resources/assets/js/components/minutes/Create.vue ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Create_vue_vue_type_template_id_200a27ba___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Create.vue?vue&type=template&id=200a27ba& */ "./resources/assets/js/components/minutes/Create.vue?vue&type=template&id=200a27ba&");
/* harmony import */ var _Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Create.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/minutes/Create.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var selectize_dist_css_selectize_bootstrap3_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! selectize/dist/css/selectize.bootstrap3.css?vue&type=style&index=0&lang=css& */ "./node_modules/selectize/dist/css/selectize.bootstrap3.css?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Create_vue_vue_type_template_id_200a27ba___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Create_vue_vue_type_template_id_200a27ba___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/minutes/Create.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/minutes/Create.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/assets/js/components/minutes/Create.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Create.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/minutes/Create.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/minutes/Create.vue?vue&type=template&id=200a27ba&":
/*!******************************************************************************************!*\
  !*** ./resources/assets/js/components/minutes/Create.vue?vue&type=template&id=200a27ba& ***!
  \******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_200a27ba___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Create.vue?vue&type=template&id=200a27ba& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/minutes/Create.vue?vue&type=template&id=200a27ba&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_200a27ba___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Create_vue_vue_type_template_id_200a27ba___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/minutes/Edit.vue":
/*!*********************************************************!*\
  !*** ./resources/assets/js/components/minutes/Edit.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Edit_vue_vue_type_template_id_7dd44c1e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Edit.vue?vue&type=template&id=7dd44c1e& */ "./resources/assets/js/components/minutes/Edit.vue?vue&type=template&id=7dd44c1e&");
/* harmony import */ var _Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Edit.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/minutes/Edit.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var selectize_dist_css_selectize_bootstrap3_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! selectize/dist/css/selectize.bootstrap3.css?vue&type=style&index=0&lang=css& */ "./node_modules/selectize/dist/css/selectize.bootstrap3.css?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Edit_vue_vue_type_template_id_7dd44c1e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Edit_vue_vue_type_template_id_7dd44c1e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/minutes/Edit.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/minutes/Edit.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/assets/js/components/minutes/Edit.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Edit.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/minutes/Edit.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/minutes/Edit.vue?vue&type=template&id=7dd44c1e&":
/*!****************************************************************************************!*\
  !*** ./resources/assets/js/components/minutes/Edit.vue?vue&type=template&id=7dd44c1e& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_7dd44c1e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Edit.vue?vue&type=template&id=7dd44c1e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/minutes/Edit.vue?vue&type=template&id=7dd44c1e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_7dd44c1e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Edit_vue_vue_type_template_id_7dd44c1e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/mixins/collection.js":
/*!**************************************************!*\
  !*** ./resources/assets/js/mixins/collection.js ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/*
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      items: []
    };
  },
  methods: {
    add: function add(item) {
      this.items.push(item);
    },
    remove: function remove(index) {
      this.items.splice(index, 1);
    }
  }
});

/***/ }),

/***/ "./resources/assets/js/pages/eventPage.vue":
/*!*************************************************!*\
  !*** ./resources/assets/js/pages/eventPage.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _eventPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./eventPage.vue?vue&type=script&lang=js& */ "./resources/assets/js/pages/eventPage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
var render, staticRenderFns




/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__["default"])(
  _eventPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"],
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/pages/eventPage.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/pages/eventPage.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/assets/js/pages/eventPage.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_eventPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./eventPage.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/pages/eventPage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_eventPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/pages/news.vue":
/*!********************************************!*\
  !*** ./resources/assets/js/pages/news.vue ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _news_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./news.vue?vue&type=script&lang=js& */ "./resources/assets/js/pages/news.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
var render, staticRenderFns




/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__["default"])(
  _news_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"],
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/pages/news.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/pages/news.vue?vue&type=script&lang=js&":
/*!*********************************************************************!*\
  !*** ./resources/assets/js/pages/news.vue?vue&type=script&lang=js& ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_news_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./news.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/pages/news.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_news_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/sass/app.scss":
/*!****************************************!*\
  !*** ./resources/assets/sass/app.scss ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************************!*\
  !*** multi ./resources/assets/js/app.js ./resources/assets/sass/app.scss ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/muhidin/Code/Intranet/resources/assets/js/app.js */"./resources/assets/js/app.js");
module.exports = __webpack_require__(/*! /home/muhidin/Code/Intranet/resources/assets/sass/app.scss */"./resources/assets/sass/app.scss");


/***/ })

},[[0,"/js/manifest","/js/vendor"]]]);