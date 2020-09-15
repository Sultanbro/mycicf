'use strict';Object.defineProperty(exports,'__esModule',{value:true});function _interopDefault(e){return(e&&(typeof e==='object')&&'default'in e)?e['default']:e}var Vue=_interopDefault(require('vue'));function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function (obj) {
      return typeof obj;
    };
  } else {
    _typeof = function (obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

function ownKeys(object, enumerableOnly) {
  var keys = Object.keys(object);

  if (Object.getOwnPropertySymbols) {
    var symbols = Object.getOwnPropertySymbols(object);
    if (enumerableOnly) symbols = symbols.filter(function (sym) {
      return Object.getOwnPropertyDescriptor(object, sym).enumerable;
    });
    keys.push.apply(keys, symbols);
  }

  return keys;
}

function _objectSpread2(target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i] != null ? arguments[i] : {};

    if (i % 2) {
      ownKeys(Object(source), true).forEach(function (key) {
        _defineProperty(target, key, source[key]);
      });
    } else if (Object.getOwnPropertyDescriptors) {
      Object.defineProperties(target, Object.getOwnPropertyDescriptors(source));
    } else {
      ownKeys(Object(source)).forEach(function (key) {
        Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));
      });
    }
  }

  return target;
}

function _slicedToArray(arr, i) {
  return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest();
}

function _arrayWithHoles(arr) {
  if (Array.isArray(arr)) return arr;
}

function _iterableToArrayLimit(arr, i) {
  if (!(Symbol.iterator in Object(arr) || Object.prototype.toString.call(arr) === "[object Arguments]")) {
    return;
  }

  var _arr = [];
  var _n = true;
  var _d = false;
  var _e = undefined;

  try {
    for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) {
      _arr.push(_s.value);

      if (i && _arr.length === i) break;
    }
  } catch (err) {
    _d = true;
    _e = err;
  } finally {
    try {
      if (!_n && _i["return"] != null) _i["return"]();
    } finally {
      if (_d) throw _e;
    }
  }

  return _arr;
}

function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance");
}var creators_offset = new Date().getTimezoneOffset() / 60;

if (creators_offset * -1 >= 0) {
  creators_offset *= -1;
  creators_offset = "".concat((creators_offset + "").padStart(2, "0"), ":00");
  creators_offset = "+".concat(creators_offset);
} else {
  creators_offset = "".concat((creators_offset + "").padStart(2, "0"), ":00");
  creators_offset = "-".concat(creators_offset);
}

var getHourlessDate = function getHourlessDate(date_string) {
  var today = date_string ? new Date(date_string) : new Date();
  var year = today.getFullYear() + "",
      month = (today.getMonth() + 1 + "").padStart(2, "0"),
      day = (today.getDate() + "").padStart(2, "0");
  return "".concat(year, "-").concat(month, "-").concat(day, "T00:00:00.000Z");
};

var getDatelessHour = function getDatelessHour(date_string, military) {
  var time = addTimezoneInfo(date_string);
  if (military) return getLocaleTime(time).slice(11, 16);
  return formatAMPM(new Date(getLocaleTime(time)));
};

var getTime = function getTime(date) {
  var dateObj = new Date(date);
  var minutes = dateObj.getUTCHours().toString().padStart(2, "0");
  var seconds = dateObj.getUTCMinutes().toString().padStart(2, "0");
  return "".concat(minutes, ":").concat(seconds);
};

var addDays = function addDays(date, days) {
  var dateObj = new Date(date);
  dateObj.setUTCHours(0, 0, 0, 0);
  dateObj.setDate(dateObj.getDate() + days);
  return dateObj;
};

var startOfWeek = function startOfWeek(date) {
  var d = new Date(date);
  var day = d.getDay(),
      diff = d.getDate() - day;
  return new Date(d.setDate(diff));
};

var endOfWeek = function endOfWeek(date) {
  var dateObj = new Date(date);
  dateObj.setUTCHours(0, 0, 0, 0);
  var toAdd = 6 - dateObj.getDay();
  return addDays(dateObj, toAdd);
};

var generateUUID = function generateUUID() {
  return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, function (c) {
    return (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16);
  });
};

var cloneObject = function cloneObject(object) {
  return JSON.parse(JSON.stringify(object));
};

var getLocaleTime = function getLocaleTime(dateString) {
  var _toLocaleString$split = new Date(dateString).toLocaleString("en-GB").split(", "),
      _toLocaleString$split2 = _slicedToArray(_toLocaleString$split, 2),
      date = _toLocaleString$split2[0],
      hour = _toLocaleString$split2[1];

  date = date.split("/").reverse().join("-");
  return "".concat(date, "T").concat(hour, ".000Z");
};

var addTimezoneInfo = function addTimezoneInfo(ISOdate) {
  if (new Date(ISOdate).toISOString() !== ISOdate) return;
  return "".concat(ISOdate.slice(0, 19)).concat(creators_offset);
};

var isToday = function isToday(date) {
  if (!date) return;
  var today = getLocaleTime(new Date()).slice(0, 10);
  return date.slice(0, 10) === today;
};

var isBefore = function isBefore(date1, date2) {
  if (!date1 || !date2) return;
  return new Date(date1) < new Date(date2);
};

var isWeekend = function isWeekend(date) {
  if (!date) return;
  var day = new Date(date).getDay();
  return day === 6 || day === 0;
};

var formatAMPM = function formatAMPM(date) {
  var hours = date.getUTCHours();
  var result = "".concat(hours % 12 === 0 ? 12 : hours % 12, " ").concat(hours >= 12 ? "PM" : "AM");
  return result;
};var script = {
  components: {
    KalendarWeekView: function KalendarWeekView() {
      return Promise.resolve().then(function(){return kalendarWeekview});
    }
  },
  props: {
    // this provided array will be kept in sync
    events: {
      required: true,
      type: Array,
      validator: function validator(val) {
        return Array.isArray(val);
      }
    },
    // use this to enable/disable stuff which
    // are supported by Kalendar itself
    configuration: {
      type: Object,
      required: false,
      validator: function validator(val) {
        return _typeof(val) === 'object';
      }
    }
  },
  data: function data() {
    var _this = this;

    return {
      current_day: getHourlessDate(),
      default_options: {
        cell_height: 10,
        scrollToNow: false,
        start_day: getHourlessDate(),
        view_type: 'week',
        style: 'material_design',
        now: new Date(),
        military_time: true,
        read_only: false,
        day_starts_at: 0,
        day_ends_at: 24,
        time_mode: 'relative',
        overlap: true,
        past_event_creation: true,
        formatLeftHours: function formatLeftHours(date) {
          return getDatelessHour(date, _this.configuration.military_time);
        },
        formatDayTitle: function formatDayTitle(date) {
          var isoDate = new Date(date);
          var dayName = isoDate.toUTCString().slice(0, 3);
          var dayNumber = isoDate.getUTCDate();
          return [dayName, dayNumber];
        },
        formatWeekNavigator: function formatWeekNavigator(isoDate) {
          var startDate = startOfWeek(isoDate);
          var endDate = endOfWeek(isoDate);
          var startString = startDate.toUTCString().slice(5, 11);
          var endString = endDate.toUTCString().slice(5, 11);
          return "".concat(startString, " - ").concat(endString);
        },
        formatDayNavigator: function formatDayNavigator(isoDate) {
          var day = new Date(isoDate);
          return day.toUTCString().slice(5, 11);
        }
      },
      kalendar_events: null,
      new_appointment: {},
      scrollable: true
    };
  },
  computed: {
    kalendar_options: function kalendar_options() {
      var options = this.default_options;
      var provided_props = this.configuration;
      var conditions = {
        scrollToNow: function scrollToNow(val) {
          return typeof val === 'boolean';
        },
        start_day: function start_day(val) {
          return !isNaN(Date.parse(val));
        },
        view_type: function view_type(val) {
          return ['week', 'day'].includes(val);
        },
        cell_height: function cell_height(val) {
          return !isNaN(val);
        },
        style: function style(val) {
          return ['material_design', 'flat_design'].includes(val);
        },
        military_time: function military_time(val) {
          return typeof val === 'boolean';
        },
        read_only: function read_only(val) {
          return typeof val === 'boolean';
        },
        day_starts_at: function day_starts_at(val) {
          return typeof val === 'number' && val >= 0 && val <= 24;
        },
        day_ends_at: function day_ends_at(val) {
          return typeof val === 'number' && val >= 0 && val <= 24;
        },
        hide_dates: function hide_dates(val) {
          return Array.isArray(val);
        },
        hide_days: function hide_days(val) {
          return Array.isArray(val) && !val.find(function (n) {
            return typeof n !== 'number';
          });
        },
        overlap: function overlap(val) {
          return typeof val === 'boolean';
        },
        past_event_creation: function past_event_creation(val) {
          return typeof val === 'boolean';
        }
      };

      for (var key in provided_props) {
        if (conditions.hasOwnProperty(key) && conditions[key](provided_props[key])) {
          options[key] = provided_props[key];
        }
      }

      return options;
    }
  },
  created: function created() {
    var _this2 = this;

    this.current_day = this.kalendar_options.start_day;
    this.kalendar_events = this.events.map(function (event) {
      return _objectSpread2({}, event, {
        id: event.id || generateUUID()
      });
    });

    if (!this.$kalendar) {
      Vue.prototype.$kalendar = {};
    }

    this.$kalendar.getEvents = function () {
      return _this2.kalendar_events.slice(0);
    };

    this.$kalendar.updateEvents = function (payload) {
      _this2.kalendar_events = payload.map(function (event) {
        return _objectSpread2({}, event, {
          id: event.id || generateUUID()
        });
      });

      _this2.$emit('update:events', payload.map(function (event) {
        return {
          from: event.from,
          to: event.to,
          data: event.data
        };
      }));
    };
  },
  provide: function provide() {
    var _this3 = this;

    var provider = {};
    Object.defineProperty(provider, 'kalendar_options', {
      enumerable: true,
      get: function get() {
        return _this3.kalendar_options;
      }
    });
    Object.defineProperty(provider, 'kalendar_events', {
      enumerable: true,
      get: function get() {
        return _this3.kalendar_events;
      }
    });
    return provider;
  },
  methods: {
    getTime: getTime,
    changeDay: function changeDay(numDays) {
      var _this4 = this;

      this.current_day = addDays(this.current_day, numDays).toISOString();
      setTimeout(function () {
        return _this4.$kalendar.buildWeek();
      });
    },
    addAppointment: function addAppointment(popup_info) {
      var payload = {
        data: {
          title: this.new_appointment.title,
          description: this.new_appointment.description
        },
        from: popup_info.start_time,
        to: popup_info.end_time
      };
      this.$kalendar.addNewEvent(payload);
      this.$kalendar.closePopups();
      this.clearFormData();
    },
    clearFormData: function clearFormData() {
      this.new_appointment = {
        description: null,
        title: null
      };
    },
    closePopups: function closePopups() {
      this.$kalendar.closePopups();
    }
  }
};function normalizeComponent(template, style, script, scopeId, isFunctionalTemplate, moduleIdentifier /* server only */, shadowMode, createInjector, createInjectorSSR, createInjectorShadow) {
    if (typeof shadowMode !== 'boolean') {
        createInjectorSSR = createInjector;
        createInjector = shadowMode;
        shadowMode = false;
    }
    // Vue.extend constructor export interop.
    const options = typeof script === 'function' ? script.options : script;
    // render functions
    if (template && template.render) {
        options.render = template.render;
        options.staticRenderFns = template.staticRenderFns;
        options._compiled = true;
        // functional template
        if (isFunctionalTemplate) {
            options.functional = true;
        }
    }
    // scopedId
    if (scopeId) {
        options._scopeId = scopeId;
    }
    let hook;
    if (moduleIdentifier) {
        // server build
        hook = function (context) {
            // 2.3 injection
            context =
                context || // cached call
                    (this.$vnode && this.$vnode.ssrContext) || // stateful
                    (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext); // functional
            // 2.2 with runInNewContext: true
            if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
                context = __VUE_SSR_CONTEXT__;
            }
            // inject component styles
            if (style) {
                style.call(this, createInjectorSSR(context));
            }
            // register component module identifier for async chunk inference
            if (context && context._registeredComponents) {
                context._registeredComponents.add(moduleIdentifier);
            }
        };
        // used by ssr in case component is cached and beforeCreate
        // never gets called
        options._ssrRegister = hook;
    }
    else if (style) {
        hook = shadowMode
            ? function (context) {
                style.call(this, createInjectorShadow(context, this.$root.$options.shadowRoot));
            }
            : function (context) {
                style.call(this, createInjector(context));
            };
    }
    if (hook) {
        if (options.functional) {
            // register for functional component in vue file
            const originalRender = options.render;
            options.render = function renderWithStyleInjection(h, context) {
                hook.call(context);
                return originalRender(h, context);
            };
        }
        else {
            // inject component registration as beforeCreate hook
            const existing = options.beforeCreate;
            options.beforeCreate = existing ? [].concat(existing, hook) : [hook];
        }
    }
    return script;
}const isOldIE = typeof navigator !== 'undefined' &&
    /msie [6-9]\\b/.test(navigator.userAgent.toLowerCase());
function createInjector(context) {
    return (id, style) => addStyle(id, style);
}
let HEAD;
const styles = {};
function addStyle(id, css) {
    const group = isOldIE ? css.media || 'default' : id;
    const style = styles[group] || (styles[group] = { ids: new Set(), styles: [] });
    if (!style.ids.has(id)) {
        style.ids.add(id);
        let code = css.source;
        if (css.map) {
            // https://developer.chrome.com/devtools/docs/javascript-debugging
            // this makes source maps inside style tags work properly in Chrome
            code += '\n/*# sourceURL=' + css.map.sources[0] + ' */';
            // http://stackoverflow.com/a/26603875
            code +=
                '\n/*# sourceMappingURL=data:application/json;base64,' +
                    btoa(unescape(encodeURIComponent(JSON.stringify(css.map)))) +
                    ' */';
        }
        if (!style.element) {
            style.element = document.createElement('style');
            style.element.type = 'text/css';
            if (css.media)
                style.element.setAttribute('media', css.media);
            if (HEAD === undefined) {
                HEAD = document.head || document.getElementsByTagName('head')[0];
            }
            HEAD.appendChild(style.element);
        }
        if ('styleSheet' in style.element) {
            style.styles.push(code);
            style.element.styleSheet.cssText = style.styles
                .filter(Boolean)
                .join('\n');
        }
        else {
            const index = style.ids.size - 1;
            const textNode = document.createTextNode(code);
            const nodes = style.element.childNodes;
            if (nodes[index])
                style.element.removeChild(nodes[index]);
            if (nodes.length)
                style.element.insertBefore(textNode, nodes[index]);
            else
                style.element.appendChild(textNode);
        }
    }
}/* script */
var __vue_script__ = script;
/* template */

var __vue_render__ = function __vue_render__() {
  var _vm = this;

  var _h = _vm.$createElement;

  var _c = _vm._self._c || _h;

  return _c('div', {
    staticClass: "kalendar-wrapper",
    class: {
      'no-scroll': !_vm.scrollable,
      gstyle: _vm.kalendar_options.style === 'material_design',
      'day-view': _vm.kalendar_options.view_type === 'day'
    },
    on: {
      "touchstart": function touchstart($event) {
        _vm.scrollable = false;
      },
      "touchend": function touchend($event) {
        _vm.scrollable = true;
      }
    }
  }, [_c('div', {
    staticClass: "week-navigator"
  }, [_vm.kalendar_options.view_type === 'week' ? _c('div', {
    staticClass: "nav-wrapper"
  }, [_c('button', {
    staticClass: "week-navigator-button",
    on: {
      "click": function click($event) {
        return _vm.changeDay(-7);
      }
    }
  }, [_c('svg', {
    staticClass: "css-i6dzq1",
    staticStyle: {
      "transform": "rotate(180deg)"
    },
    attrs: {
      "viewBox": "0 0 24 24",
      "width": "24",
      "height": "24",
      "stroke": "currentColor",
      "stroke-width": "2",
      "fill": "none",
      "stroke-linecap": "round",
      "stroke-linejoin": "round"
    }
  }, [_c('polyline', {
    attrs: {
      "points": "9 18 15 12 9 6"
    }
  })])]), _vm._v(" "), _c('div', [_c('span', [_vm._v(_vm._s(_vm.kalendar_options.formatWeekNavigator(_vm.current_day)))])]), _vm._v(" "), _c('button', {
    staticClass: "week-navigator-button",
    on: {
      "click": function click($event) {
        return _vm.changeDay(7);
      }
    }
  }, [_c('svg', {
    staticClass: "css-i6dzq1",
    attrs: {
      "viewBox": "0 0 24 24",
      "width": "24",
      "height": "24",
      "stroke": "currentColor",
      "stroke-width": "2",
      "fill": "none",
      "stroke-linecap": "round",
      "stroke-linejoin": "round"
    }
  }, [_c('polyline', {
    attrs: {
      "points": "9 18 15 12 9 6"
    }
  })])])]) : _vm._e(), _vm._v(" "), _vm.kalendar_options.view_type === 'day' ? _c('div', {
    staticClass: "nav-wrapper"
  }, [_c('button', {
    staticClass: "week-navigator-button",
    on: {
      "click": function click($event) {
        return _vm.changeDay(-1);
      }
    }
  }, [_c('svg', {
    staticClass: "css-i6dzq1",
    staticStyle: {
      "transform": "rotate(180deg)"
    },
    attrs: {
      "viewBox": "0 0 24 24",
      "width": "24",
      "height": "24",
      "stroke": "currentColor",
      "stroke-width": "2",
      "fill": "none",
      "stroke-linecap": "round",
      "stroke-linejoin": "round"
    }
  }, [_c('polyline', {
    attrs: {
      "points": "9 18 15 12 9 6"
    }
  })])]), _vm._v(" "), _c('div', [_c('span', [_vm._v(_vm._s(_vm.kalendar_options.formatDayNavigator(_vm.current_day)))])]), _vm._v(" "), _c('button', {
    staticClass: "week-navigator-button",
    on: {
      "click": function click($event) {
        return _vm.changeDay(1);
      }
    }
  }, [_c('svg', {
    staticClass: "css-i6dzq1",
    attrs: {
      "viewBox": "0 0 24 24",
      "width": "24",
      "height": "24",
      "stroke": "currentColor",
      "stroke-width": "2",
      "fill": "none",
      "stroke-linecap": "round",
      "stroke-linejoin": "round"
    }
  }, [_c('polyline', {
    attrs: {
      "points": "9 18 15 12 9 6"
    }
  })])])]) : _vm._e()]), _vm._v(" "), _c('kalendar-week-view', {
    attrs: {
      "current_day": _vm.current_day
    }
  }), _vm._v(" "), _c('portal', {
    staticClass: "slotable",
    attrs: {
      "to": "event-creation"
    },
    scopedSlots: _vm._u([{
      key: "default",
      fn: function fn(information) {
        return _c('div', {
          staticClass: "creating-event"
        }, [_vm._t("creating-card", [_c('h4', {
          staticClass: "appointment-title",
          staticStyle: {
            "text-align": "left"
          }
        }, [_vm._v("\n                    New Appointment\n                ")]), _vm._v(" "), _c('span', {
          staticClass: "time"
        }, [_vm._v("\n                    " + _vm._s(_vm.getTime(information.start_time)) + "\n                    -\n                    " + _vm._s(_vm.getTime(information.end_time)) + "\n                ")])], {
          "event_information": information
        })], 2);
      }
    }], null, true)
  }), _vm._v(" "), _c('portal', {
    staticClass: "slotable",
    attrs: {
      "to": "event-popup-form"
    },
    scopedSlots: _vm._u([{
      key: "default",
      fn: function fn(information) {
        return _c('div', {
          staticClass: "popup-event"
        }, [_vm._t("popup-form", [_c('h4', {
          staticStyle: {
            "margin-bottom": "10px"
          }
        }, [_vm._v("\n                    New Appointment\n                ")]), _vm._v(" "), _c('input', {
          directives: [{
            name: "model",
            rawName: "v-model",
            value: _vm.new_appointment['title'],
            expression: "new_appointment['title']"
          }],
          staticStyle: {
            "width": "100%"
          },
          attrs: {
            "type": "text",
            "name": "title",
            "placeholder": "Title"
          },
          domProps: {
            "value": _vm.new_appointment['title']
          },
          on: {
            "input": function input($event) {
              if ($event.target.composing) {
                return;
              }

              _vm.$set(_vm.new_appointment, 'title', $event.target.value);
            }
          }
        }), _vm._v(" "), _c('textarea', {
          directives: [{
            name: "model",
            rawName: "v-model",
            value: _vm.new_appointment['description'],
            expression: "new_appointment['description']"
          }],
          attrs: {
            "type": "text",
            "name": "description",
            "placeholder": "Description",
            "rows": "2"
          },
          domProps: {
            "value": _vm.new_appointment['description']
          },
          on: {
            "input": function input($event) {
              if ($event.target.composing) {
                return;
              }

              _vm.$set(_vm.new_appointment, 'description', $event.target.value);
            }
          }
        }), _vm._v(" "), _c('div', {
          staticClass: "buttons"
        }, [_c('button', {
          staticClass: "cancel",
          on: {
            "click": function click($event) {
              return _vm.closePopups();
            }
          }
        }, [_vm._v("\n                        Cancel\n                    ")]), _vm._v(" "), _c('button', {
          on: {
            "click": function click($event) {
              return _vm.addAppointment(information);
            }
          }
        }, [_vm._v("\n                        Save\n                    ")])])], {
          "popup_information": information
        })], 2);
      }
    }], null, true)
  }), _vm._v(" "), _c('portal', {
    staticClass: "slotable",
    attrs: {
      "to": "event-details"
    },
    scopedSlots: _vm._u([{
      key: "default",
      fn: function fn(information) {
        return _c('div', {
          staticClass: "created-event"
        }, [_vm._t("created-card", [_c('h4', {
          staticStyle: {
            "margin-bottom": "5px"
          }
        }, [_vm._v(_vm._s(information.data))]), _vm._v(" "), _c('p', [_vm._v("\n                    " + _vm._s(information.start_time.substr(11, 5)) + " -\n                    " + _vm._s(information.end_time.substr(11, 5)) + "\n                ")])], {
          "event_information": information
        })], 2);
      }
    }], null, true)
  })], 1);
};

var __vue_staticRenderFns__ = [];
/* style */

var __vue_inject_styles__ = function __vue_inject_styles__(inject) {
  if (!inject) return;
  inject("data-v-19b411b8_0", {
    source: "*{box-sizing:border-box}.kalendar-wrapper{font-family:-apple-system,BlinkMacSystemFont,\"Segoe UI\",Roboto,Helvetica,Arial,sans-serif,\"Apple Color Emoji\",\"Segoe UI Emoji\",\"Segoe UI Symbol\";min-height:1440px;--main-color:#ec4d3d;--weekend-color:#f7f7f7;--current-day-color:#fef4f4;--table-cell-border-color:#e5e5e5;--odd-cell-border-color:#e5e5e5;--hour-row-color:inherit;--dark:#212121;--lightg:#9e9e9e;--card-bgcolor:#4285f4;--card-color:white;--max-hours:10;--previous-events:#c6dafc;--previous-text-color:#727d8f}.kalendar-wrapper.gstyle{--hour-row-color:#212121;--main-color:#4285f4;--weekend-color:transparent;--current-day-color:transparent;--table-cell-border-color:#e0e0e0;--odd-cell-border-color:transparent;font-family:\"Google Sans\",Roboto,-apple-system,BlinkMacSystemFont,\"Segoe UI\",Arial,sans-serif}.kalendar-wrapper.gstyle .week-navigator{background:#fff;border-bottom:none;padding:20px;color:rgba(0,0,0,.54)}.kalendar-wrapper.gstyle .week-navigator button{color:rgba(0,0,0,.54)}.kalendar-wrapper.gstyle .created-event,.kalendar-wrapper.gstyle .creating-event{background-color:var(--card-bgcolor);color:var(--card-color);text-shadow:none;border-left:none;border-radius:2px;opacity:1;border-bottom:solid 1px rgba(0,0,0,.03)}.kalendar-wrapper.gstyle .created-event>*,.kalendar-wrapper.gstyle .creating-event>*{text-shadow:none}.kalendar-wrapper.gstyle .is-past .created-event,.kalendar-wrapper.gstyle .is-past .creating-event{background-color:var(--previous-events);color:var(--previous-text-color)}.kalendar-wrapper.gstyle .created-event{width:96%}.kalendar-wrapper.gstyle .created-event .time{right:2px}.kalendar-wrapper.gstyle .sticky-top .days{margin-left:0;padding-left:55px}.kalendar-wrapper.gstyle .all-day{display:none}.kalendar-wrapper.gstyle ul.building-blocks.day-1 li.is-an-hour::before{content:\"\";position:absolute;bottom:-1px;left:-10px;width:10px;height:1px;background-color:var(--table-cell-border-color)}.kalendar-wrapper.gstyle .hours,.kalendar-wrapper.gstyle ul.building-blocks li{border-right:solid 1px var(--table-cell-border-color)}.kalendar-wrapper.gstyle .hours li{font-size:80%}.kalendar-wrapper.gstyle .hour-indicator-line>span.line{height:2px;background-color:#db4437}.kalendar-wrapper.gstyle .hour-indicator-line>span.line:before{content:\"\";width:12px;height:12px;display:block;background-color:#db4437;position:absolute;top:-1px;left:0;border-radius:100%}.kalendar-wrapper.gstyle .days{border-top:solid 1px var(--table-cell-border-color);position:relative}.kalendar-wrapper.gstyle .days:before{content:\"\";position:absolute;height:1px;width:55px;left:0;bottom:0;background-color:var(--table-cell-border-color)}.kalendar-wrapper.gstyle .day-indicator{display:flex;flex-direction:column;align-items:center;color:var(--dark);font-size:13px;padding-left:0;border-right:solid 1px var(--table-cell-border-color)}.kalendar-wrapper.gstyle .day-indicator>div{display:flex;flex-direction:column;align-items:center}.kalendar-wrapper.gstyle .day-indicator.is-before{color:#757575}.kalendar-wrapper.gstyle .day-indicator .number-date{margin-left:0;margin-right:0;order:2;font-size:25px;font-weight:500;width:46px;height:46px;border-radius:100%;align-items:center;justify-content:center;display:flex;margin-top:4px}.kalendar-wrapper.gstyle .day-indicator.today{border-bottom-color:var(--table-cell-border-color)}.kalendar-wrapper.gstyle .day-indicator.today:after{display:none}.kalendar-wrapper.gstyle .day-indicator.today .number-date{background-color:var(--main-color);color:#fff}.kalendar-wrapper.gstyle .day-indicator .letters-date{margin-left:0;margin-right:0;font-weight:500;text-transform:uppercase;font-size:11px}.kalendar-wrapper.gstyle .day-indicator:first-child{position:relative}.kalendar-wrapper.gstyle .day-indicator:first-child::before{content:\"\";position:absolute;left:-1px;top:0;width:1px;height:100%;background-color:var(--table-cell-border-color)}.kalendar-wrapper.gstyle .creating-event,.kalendar-wrapper.gstyle .popup-wrapper{box-shadow:0 6px 10px 0 rgba(0,0,0,.14),0 1px 18px 0 rgba(0,0,0,.12),0 3px 5px -1px rgba(0,0,0,.2);transition:opacity .1s linear}.kalendar-wrapper.non-desktop .building-blocks{pointer-events:none}.kalendar-wrapper.day-view .day-indicator{align-items:flex-start;text-align:center;padding-left:10px}.created-event,.creating-event{padding:4px 6px;cursor:default;word-break:break-word;height:100%;width:100%;font-size:14px}.created-event h4,.creating-event h4{font-weight:400}.creating-event{background-color:#34aadc;opacity:.9}.creating-event>*{text-shadow:0 0 7px rgba(0,0,0,.25)}.created-event{background-color:#bfecff;opacity:.74;border-left:solid 3px #34aadc;color:#1f6570}.week-navigator{display:flex;align-items:center;background:linear-gradient(#fdfdfd,#f9f9f9);border-bottom:solid 1px #ec4d3d;padding:10px 20px}.week-navigator .nav-wrapper{display:flex;align-items:center;justify-content:space-between;font-size:22px;width:25ch;max-width:30ch;margin:0 auto}.week-navigator .nav-wrapper span{white-space:nowrap}.week-navigator button{background:0 0;border:none;padding:0;display:inline-flex;margin:0 10px;color:#ec4d3d;align-items:center;font-size:14px;padding-bottom:5px}.kalendar-wrapper{background-color:#fff;min-width:300px}.no-scroll{overflow-y:hidden;max-height:100%}.hour-indicator-line{position:absolute;z-index:2;width:100%;height:10px;display:flex;align-items:center;pointer-events:none;user-select:none}.hour-indicator-line>span.line{background-color:var(--main-color);height:1px;display:block;flex:1}.hour-indicator-line>span.time-value{font-size:14px;width:48px;color:var(--main-color);font-weight:600;background-color:#fff}.hour-indicator-tooltip{position:absolute;z-index:0;background-color:var(--main-color);width:10px;height:10px;display:block;border-radius:100%;pointer-events:none;user-select:none}ul.kalendar-day li.kalendar-cell:last-child{display:none}.week-navigator-button{outline:0}.week-navigator-button:active svg,.week-navigator-button:hover svg{stroke:var(--main-color)}",
    map: undefined,
    media: undefined
  });
};
/* scoped */


var __vue_scope_id__ = undefined;
/* module identifier */

var __vue_module_identifier__ = undefined;
/* functional template */

var __vue_is_functional_template__ = false;
/* style inject SSR */

/* style inject shadow dom */

var __vue_component__ = normalizeComponent({
  render: __vue_render__,
  staticRenderFns: __vue_staticRenderFns__
}, __vue_inject_styles__, __vue_script__, __vue_scope_id__, __vue_is_functional_template__, __vue_module_identifier__, false, createInjector, undefined, undefined);/* eslint-disable import/prefer-default-export */var components=/*#__PURE__*/Object.freeze({__proto__:null,Kalendar: __vue_component__});var install = function installKalendarVue(Vue) {
  if (install.installed) return;
  install.installed = true;
  Object.entries(components).forEach(function (_ref) {
    var _ref2 = _slicedToArray(_ref, 2),
        componentName = _ref2[0],
        component = _ref2[1];

    Vue.component(componentName, component);
  });
  Vue.prototype.$kalendar = {};
}; // Create module definition for Vue.use()


var plugin = {
  install: install
}; // To auto-install when vue is found
// eslint-disable-next-line no-redeclare

/* global window, global */

var GlobalVue = null;

if (typeof window !== "undefined") {
  GlobalVue = window.Vue;
} else if (typeof global !== "undefined") {
  GlobalVue = global.Vue;
}

if (GlobalVue) {
  GlobalVue.use(plugin);
} // Default export is library as a whole, registered via Vue.use()
function PromiseWorker (worker) {
  var messageIds = 0;
  var callbacks = {};
  worker.addEventListener("message", function (e) {
    return onMessage(e);
  });

  var onMessage = function onMessage(e) {
    var message = e.data;

    if (!Array.isArray(message) || message.length < 2) {
      return;
    }

    var messageId = message[0];
    var error = message[1];
    var result = message[2];
    var callback = callbacks[messageId];
    if (!callback) return;
    delete callbacks[messageId];
    callback(error, result);
  };

  return {
    initiateWorker: function initiateWorker(_worker) {},
    postMessage: function postMessage(userMessage) {
      var messageId = messageIds++;
      var messageToSend = [messageId, userMessage];
      return new Promise(function (resolve, reject) {
        callbacks[messageId] = function (error, result) {
          if (error) return reject(new Error(error.message));
          resolve(result);
        };

        if (typeof worker.controller !== "undefined") {
          // service worker, use MessageChannels because e.source is broken in Chrome < 51:
          // https://bugs.chromium.org/p/chromium/issues/detail?id=543198
          var channel = new MessageChannel();

          channel.port1.onmessage = function (e) {
            onMessage(e);
          };

          worker.controller.postMessage(messageToSend, [channel.port2]);
        } else {
          // web worker
          worker.postMessage(messageToSend);
        }
      });
    }
  };
}const kIsNodeJS = Object.prototype.toString.call(typeof process !== 'undefined' ? process : 0) === '[object process]';
const kRequire = kIsNodeJS && typeof module.require === 'function' ? module.require : null; // eslint-disable-line

function browserDecodeBase64(base64, enableUnicode) {
    const binaryString = atob(base64);
    if (enableUnicode) {
        const binaryView = new Uint8Array(binaryString.length);
        Array.prototype.forEach.call(binaryView, (el, idx, arr) => {
            arr[idx] = binaryString.charCodeAt(idx);
        });
        return String.fromCharCode.apply(null, new Uint16Array(binaryView.buffer));
    }
    return binaryString;
}

function nodeDecodeBase64(base64, enableUnicode) {
    return Buffer.from(base64, 'base64').toString(enableUnicode ? 'utf16' : 'utf8');
}

function createBase64WorkerFactory(base64, sourcemap = null, enableUnicode = false) {
    const source = kIsNodeJS ? nodeDecodeBase64(base64, enableUnicode) : browserDecodeBase64(base64, enableUnicode);
    const start = source.indexOf('\n', 10) + 1;
    const body = source.substring(start) + (sourcemap ? `\/\/# sourceMappingURL=${sourcemap}` : '');

    if (kRequire) {
        /* node.js */
        const Worker = kRequire('worker_threads').Worker; // eslint-disable-line
        return function WorkerFactory(options) {
            return new Worker(body, Object.assign({}, options, { eval: true }));
        };
    }

    /* browser */
    const blob = new Blob([body], { type: 'application/javascript' });
    const url = URL.createObjectURL(blob);
    return function WorkerFactory(options) {
        return new Worker(url, options);
    };
}/* eslint-disable */
const WorkerFactory = createBase64WorkerFactory('Lyogcm9sbHVwLXBsdWdpbi13ZWItd29ya2VyLWxvYWRlciAqLwpmdW5jdGlvbiBfdHlwZW9mKG9iaikgewogICJAYmFiZWwvaGVscGVycyAtIHR5cGVvZiI7CgogIGlmICh0eXBlb2YgU3ltYm9sID09PSAiZnVuY3Rpb24iICYmIHR5cGVvZiBTeW1ib2wuaXRlcmF0b3IgPT09ICJzeW1ib2wiKSB7CiAgICBfdHlwZW9mID0gZnVuY3Rpb24gKG9iaikgewogICAgICByZXR1cm4gdHlwZW9mIG9iajsKICAgIH07CiAgfSBlbHNlIHsKICAgIF90eXBlb2YgPSBmdW5jdGlvbiAob2JqKSB7CiAgICAgIHJldHVybiBvYmogJiYgdHlwZW9mIFN5bWJvbCA9PT0gImZ1bmN0aW9uIiAmJiBvYmouY29uc3RydWN0b3IgPT09IFN5bWJvbCAmJiBvYmogIT09IFN5bWJvbC5wcm90b3R5cGUgPyAic3ltYm9sIiA6IHR5cGVvZiBvYmo7CiAgICB9OwogIH0KCiAgcmV0dXJuIF90eXBlb2Yob2JqKTsKfQoKZnVuY3Rpb24gX2RlZmluZVByb3BlcnR5KG9iaiwga2V5LCB2YWx1ZSkgewogIGlmIChrZXkgaW4gb2JqKSB7CiAgICBPYmplY3QuZGVmaW5lUHJvcGVydHkob2JqLCBrZXksIHsKICAgICAgdmFsdWU6IHZhbHVlLAogICAgICBlbnVtZXJhYmxlOiB0cnVlLAogICAgICBjb25maWd1cmFibGU6IHRydWUsCiAgICAgIHdyaXRhYmxlOiB0cnVlCiAgICB9KTsKICB9IGVsc2UgewogICAgb2JqW2tleV0gPSB2YWx1ZTsKICB9CgogIHJldHVybiBvYmo7Cn0KCmZ1bmN0aW9uIG93bktleXMob2JqZWN0LCBlbnVtZXJhYmxlT25seSkgewogIHZhciBrZXlzID0gT2JqZWN0LmtleXMob2JqZWN0KTsKCiAgaWYgKE9iamVjdC5nZXRPd25Qcm9wZXJ0eVN5bWJvbHMpIHsKICAgIHZhciBzeW1ib2xzID0gT2JqZWN0LmdldE93blByb3BlcnR5U3ltYm9scyhvYmplY3QpOwogICAgaWYgKGVudW1lcmFibGVPbmx5KSBzeW1ib2xzID0gc3ltYm9scy5maWx0ZXIoZnVuY3Rpb24gKHN5bSkgewogICAgICByZXR1cm4gT2JqZWN0LmdldE93blByb3BlcnR5RGVzY3JpcHRvcihvYmplY3QsIHN5bSkuZW51bWVyYWJsZTsKICAgIH0pOwogICAga2V5cy5wdXNoLmFwcGx5KGtleXMsIHN5bWJvbHMpOwogIH0KCiAgcmV0dXJuIGtleXM7Cn0KCmZ1bmN0aW9uIF9vYmplY3RTcHJlYWQyKHRhcmdldCkgewogIGZvciAodmFyIGkgPSAxOyBpIDwgYXJndW1lbnRzLmxlbmd0aDsgaSsrKSB7CiAgICB2YXIgc291cmNlID0gYXJndW1lbnRzW2ldICE9IG51bGwgPyBhcmd1bWVudHNbaV0gOiB7fTsKCiAgICBpZiAoaSAlIDIpIHsKICAgICAgb3duS2V5cyhPYmplY3Qoc291cmNlKSwgdHJ1ZSkuZm9yRWFjaChmdW5jdGlvbiAoa2V5KSB7CiAgICAgICAgX2RlZmluZVByb3BlcnR5KHRhcmdldCwga2V5LCBzb3VyY2Vba2V5XSk7CiAgICAgIH0pOwogICAgfSBlbHNlIGlmIChPYmplY3QuZ2V0T3duUHJvcGVydHlEZXNjcmlwdG9ycykgewogICAgICBPYmplY3QuZGVmaW5lUHJvcGVydGllcyh0YXJnZXQsIE9iamVjdC5nZXRPd25Qcm9wZXJ0eURlc2NyaXB0b3JzKHNvdXJjZSkpOwogICAgfSBlbHNlIHsKICAgICAgb3duS2V5cyhPYmplY3Qoc291cmNlKSkuZm9yRWFjaChmdW5jdGlvbiAoa2V5KSB7CiAgICAgICAgT2JqZWN0LmRlZmluZVByb3BlcnR5KHRhcmdldCwga2V5LCBPYmplY3QuZ2V0T3duUHJvcGVydHlEZXNjcmlwdG9yKHNvdXJjZSwga2V5KSk7CiAgICAgIH0pOwogICAgfQogIH0KCiAgcmV0dXJuIHRhcmdldDsKfQoKZnVuY3Rpb24gX3NsaWNlZFRvQXJyYXkoYXJyLCBpKSB7CiAgcmV0dXJuIF9hcnJheVdpdGhIb2xlcyhhcnIpIHx8IF9pdGVyYWJsZVRvQXJyYXlMaW1pdChhcnIsIGkpIHx8IF9ub25JdGVyYWJsZVJlc3QoKTsKfQoKZnVuY3Rpb24gX2FycmF5V2l0aEhvbGVzKGFycikgewogIGlmIChBcnJheS5pc0FycmF5KGFycikpIHJldHVybiBhcnI7Cn0KCmZ1bmN0aW9uIF9pdGVyYWJsZVRvQXJyYXlMaW1pdChhcnIsIGkpIHsKICBpZiAoIShTeW1ib2wuaXRlcmF0b3IgaW4gT2JqZWN0KGFycikgfHwgT2JqZWN0LnByb3RvdHlwZS50b1N0cmluZy5jYWxsKGFycikgPT09ICJbb2JqZWN0IEFyZ3VtZW50c10iKSkgewogICAgcmV0dXJuOwogIH0KCiAgdmFyIF9hcnIgPSBbXTsKICB2YXIgX24gPSB0cnVlOwogIHZhciBfZCA9IGZhbHNlOwogIHZhciBfZSA9IHVuZGVmaW5lZDsKCiAgdHJ5IHsKICAgIGZvciAodmFyIF9pID0gYXJyW1N5bWJvbC5pdGVyYXRvcl0oKSwgX3M7ICEoX24gPSAoX3MgPSBfaS5uZXh0KCkpLmRvbmUpOyBfbiA9IHRydWUpIHsKICAgICAgX2Fyci5wdXNoKF9zLnZhbHVlKTsKCiAgICAgIGlmIChpICYmIF9hcnIubGVuZ3RoID09PSBpKSBicmVhazsKICAgIH0KICB9IGNhdGNoIChlcnIpIHsKICAgIF9kID0gdHJ1ZTsKICAgIF9lID0gZXJyOwogIH0gZmluYWxseSB7CiAgICB0cnkgewogICAgICBpZiAoIV9uICYmIF9pWyJyZXR1cm4iXSAhPSBudWxsKSBfaVsicmV0dXJuIl0oKTsKICAgIH0gZmluYWxseSB7CiAgICAgIGlmIChfZCkgdGhyb3cgX2U7CiAgICB9CiAgfQoKICByZXR1cm4gX2FycjsKfQoKZnVuY3Rpb24gX25vbkl0ZXJhYmxlUmVzdCgpIHsKICB0aHJvdyBuZXcgVHlwZUVycm9yKCJJbnZhbGlkIGF0dGVtcHQgdG8gZGVzdHJ1Y3R1cmUgbm9uLWl0ZXJhYmxlIGluc3RhbmNlIik7Cn0KCi8vdG9kbzogcmVtb3ZlIHRoaXMgYW5kIGZvcmsgcHJvbWlzZS13b3JrZXIgdG8gcHJvdmlkZSBFU00KCmZ1bmN0aW9uIGlzUHJvbWlzZShvYmopIHsKICAvLyB2aWEgaHR0cHM6Ly91bnBrZy5jb20vaXMtcHJvbWlzZUAyLjEuMC9pbmRleC5qcwogIHJldHVybiAhIW9iaiAmJiAoX3R5cGVvZihvYmopID09PSAib2JqZWN0IiB8fCB0eXBlb2Ygb2JqID09PSAiZnVuY3Rpb24iKSAmJiB0eXBlb2Ygb2JqLnRoZW4gPT09ICJmdW5jdGlvbiI7Cn0KCmZ1bmN0aW9uIHJlZ2lzdGVyUHJvbWlzZVdvcmtlciAoY2FsbGJhY2spIHsKICBmdW5jdGlvbiBwb3N0T3V0Z29pbmdNZXNzYWdlKGUsIG1lc3NhZ2VJZCwgZXJyb3IsIHJlc3VsdCkgewogICAgZnVuY3Rpb24gcG9zdE1lc3NhZ2UobXNnKSB7CiAgICAgIC8qIGlzdGFuYnVsIGlnbm9yZSBpZiAqLwogICAgICBpZiAodHlwZW9mIHNlbGYucG9zdE1lc3NhZ2UgIT09ICJmdW5jdGlvbiIpIHsKICAgICAgICAvLyBzZXJ2aWNlIHdvcmtlcgogICAgICAgIGUucG9ydHNbMF0ucG9zdE1lc3NhZ2UobXNnKTsKICAgICAgfSBlbHNlIHsKICAgICAgICAvLyB3ZWIgd29ya2VyCiAgICAgICAgc2VsZi5wb3N0TWVzc2FnZShtc2cpOwogICAgICB9CiAgICB9CgogICAgaWYgKGVycm9yKSB7CgogICAgICBwb3N0TWVzc2FnZShbbWVzc2FnZUlkLCB7CiAgICAgICAgbWVzc2FnZTogZXJyb3IubWVzc2FnZQogICAgICB9XSk7CiAgICB9IGVsc2UgewogICAgICBwb3N0TWVzc2FnZShbbWVzc2FnZUlkLCBudWxsLCByZXN1bHRdKTsKICAgIH0KICB9CgogIGZ1bmN0aW9uIHRyeUNhdGNoRnVuYyhjYWxsYmFjaywgbWVzc2FnZSkgewogICAgdHJ5IHsKICAgICAgcmV0dXJuIHsKICAgICAgICByZXM6IGNhbGxiYWNrKG1lc3NhZ2UpCiAgICAgIH07CiAgICB9IGNhdGNoIChlKSB7CiAgICAgIHJldHVybiB7CiAgICAgICAgZXJyOiBlCiAgICAgIH07CiAgICB9CiAgfQoKICBmdW5jdGlvbiBoYW5kbGVJbmNvbWluZ01lc3NhZ2UoZSwgY2FsbGJhY2ssIG1lc3NhZ2VJZCwgbWVzc2FnZSkgewogICAgdmFyIHJlc3VsdCA9IHRyeUNhdGNoRnVuYyhjYWxsYmFjaywgbWVzc2FnZSk7CgogICAgaWYgKHJlc3VsdC5lcnIpIHsKICAgICAgcG9zdE91dGdvaW5nTWVzc2FnZShlLCBtZXNzYWdlSWQsIHJlc3VsdC5lcnIpOwogICAgfSBlbHNlIGlmICghaXNQcm9taXNlKHJlc3VsdC5yZXMpKSB7CiAgICAgIHBvc3RPdXRnb2luZ01lc3NhZ2UoZSwgbWVzc2FnZUlkLCBudWxsLCByZXN1bHQucmVzKTsKICAgIH0gZWxzZSB7CiAgICAgIHJlc3VsdC5yZXMudGhlbihmdW5jdGlvbiAoZmluYWxSZXN1bHQpIHsKICAgICAgICBwb3N0T3V0Z29pbmdNZXNzYWdlKGUsIG1lc3NhZ2VJZCwgbnVsbCwgZmluYWxSZXN1bHQpOwogICAgICB9LCBmdW5jdGlvbiAoZmluYWxFcnJvcikgewogICAgICAgIHBvc3RPdXRnb2luZ01lc3NhZ2UoZSwgbWVzc2FnZUlkLCBmaW5hbEVycm9yKTsKICAgICAgfSk7CiAgICB9CiAgfQoKICBmdW5jdGlvbiBvbkluY29taW5nTWVzc2FnZShlKSB7CiAgICB2YXIgcGF5bG9hZCA9IGUuZGF0YTsKCiAgICBpZiAoIUFycmF5LmlzQXJyYXkocGF5bG9hZCkgfHwgcGF5bG9hZC5sZW5ndGggIT09IDIpIHsKICAgICAgLy8gbWVzc2FnZSBkb2Vucyd0IG1hdGNoIGNvbW11bmljYXRpb24gZm9ybWF0OyBpZ25vcmUKICAgICAgcmV0dXJuOwogICAgfQoKICAgIHZhciBtZXNzYWdlSWQgPSBwYXlsb2FkWzBdOwogICAgdmFyIG1lc3NhZ2UgPSBwYXlsb2FkWzFdOwoKICAgIGlmICh0eXBlb2YgY2FsbGJhY2sgIT09ICJmdW5jdGlvbiIpIHsKICAgICAgcG9zdE91dGdvaW5nTWVzc2FnZShlLCBtZXNzYWdlSWQsIG5ldyBFcnJvcigiUGxlYXNlIHBhc3MgYSBmdW5jdGlvbiBpbnRvIHJlZ2lzdGVyKCkuIikpOwogICAgfSBlbHNlIHsKICAgICAgaGFuZGxlSW5jb21pbmdNZXNzYWdlKGUsIGNhbGxiYWNrLCBtZXNzYWdlSWQsIG1lc3NhZ2UpOwogICAgfQogIH0KCiAgc2VsZi5hZGRFdmVudExpc3RlbmVyKCJtZXNzYWdlIiwgb25JbmNvbWluZ01lc3NhZ2UpOwp9Cgp2YXIgY3JlYXRvcnNfb2Zmc2V0ID0gbmV3IERhdGUoKS5nZXRUaW1lem9uZU9mZnNldCgpIC8gNjA7CgppZiAoY3JlYXRvcnNfb2Zmc2V0ICogLTEgPj0gMCkgewogIGNyZWF0b3JzX29mZnNldCAqPSAtMTsKICBjcmVhdG9yc19vZmZzZXQgPSAiIi5jb25jYXQoKGNyZWF0b3JzX29mZnNldCArICIiKS5wYWRTdGFydCgyLCAiMCIpLCAiOjAwIik7CiAgY3JlYXRvcnNfb2Zmc2V0ID0gIisiLmNvbmNhdChjcmVhdG9yc19vZmZzZXQpOwp9IGVsc2UgewogIGNyZWF0b3JzX29mZnNldCA9ICIiLmNvbmNhdCgoY3JlYXRvcnNfb2Zmc2V0ICsgIiIpLnBhZFN0YXJ0KDIsICIwIiksICI6MDAiKTsKICBjcmVhdG9yc19vZmZzZXQgPSAiLSIuY29uY2F0KGNyZWF0b3JzX29mZnNldCk7Cn0KCnZhciBnZXRIb3VybGVzc0RhdGUgPSBmdW5jdGlvbiBnZXRIb3VybGVzc0RhdGUoZGF0ZV9zdHJpbmcpIHsKICB2YXIgdG9kYXkgPSBkYXRlX3N0cmluZyA/IG5ldyBEYXRlKGRhdGVfc3RyaW5nKSA6IG5ldyBEYXRlKCk7CiAgdmFyIHllYXIgPSB0b2RheS5nZXRGdWxsWWVhcigpICsgIiIsCiAgICAgIG1vbnRoID0gKHRvZGF5LmdldE1vbnRoKCkgKyAxICsgIiIpLnBhZFN0YXJ0KDIsICIwIiksCiAgICAgIGRheSA9ICh0b2RheS5nZXREYXRlKCkgKyAiIikucGFkU3RhcnQoMiwgIjAiKTsKICByZXR1cm4gIiIuY29uY2F0KHllYXIsICItIikuY29uY2F0KG1vbnRoLCAiLSIpLmNvbmNhdChkYXksICJUMDA6MDA6MDAuMDAwWiIpOwp9OwoKdmFyIGdldFllYXJNb250aERheSA9IGZ1bmN0aW9uIGdldFllYXJNb250aERheShkYXRlX3N0cmluZykgewogIHJldHVybiBnZXRIb3VybGVzc0RhdGUoZGF0ZV9zdHJpbmcpLnNsaWNlKDAsIDEwKTsKfTsKCnZhciBhZGREYXlzID0gZnVuY3Rpb24gYWRkRGF5cyhkYXRlLCBkYXlzKSB7CiAgdmFyIGRhdGVPYmogPSBuZXcgRGF0ZShkYXRlKTsKICBkYXRlT2JqLnNldFVUQ0hvdXJzKDAsIDAsIDAsIDApOwogIGRhdGVPYmouc2V0RGF0ZShkYXRlT2JqLmdldERhdGUoKSArIGRheXMpOwogIHJldHVybiBkYXRlT2JqOwp9OwoKdmFyIGdlbmVyYXRlVVVJRCA9IGZ1bmN0aW9uIGdlbmVyYXRlVVVJRCgpIHsKICByZXR1cm4gKFsxZTddICsgLTFlMyArIC00ZTMgKyAtOGUzICsgLTFlMTEpLnJlcGxhY2UoL1swMThdL2csIGZ1bmN0aW9uIChjKSB7CiAgICByZXR1cm4gKGMgXiBjcnlwdG8uZ2V0UmFuZG9tVmFsdWVzKG5ldyBVaW50OEFycmF5KDEpKVswXSAmIDE1ID4+IGMgLyA0KS50b1N0cmluZygxNik7CiAgfSk7Cn07Cgp2YXIgZ2V0TG9jYWxlVGltZSA9IGZ1bmN0aW9uIGdldExvY2FsZVRpbWUoZGF0ZVN0cmluZykgewogIHZhciBfdG9Mb2NhbGVTdHJpbmckc3BsaXQgPSBuZXcgRGF0ZShkYXRlU3RyaW5nKS50b0xvY2FsZVN0cmluZygiZW4tR0IiKS5zcGxpdCgiLCAiKSwKICAgICAgX3RvTG9jYWxlU3RyaW5nJHNwbGl0MiA9IF9zbGljZWRUb0FycmF5KF90b0xvY2FsZVN0cmluZyRzcGxpdCwgMiksCiAgICAgIGRhdGUgPSBfdG9Mb2NhbGVTdHJpbmckc3BsaXQyWzBdLAogICAgICBob3VyID0gX3RvTG9jYWxlU3RyaW5nJHNwbGl0MlsxXTsKCiAgZGF0ZSA9IGRhdGUuc3BsaXQoIi8iKS5yZXZlcnNlKCkuam9pbigiLSIpOwogIHJldHVybiAiIi5jb25jYXQoZGF0ZSwgIlQiKS5jb25jYXQoaG91ciwgIi4wMDBaIik7Cn07Cgp2YXIgaG91clV0aWxzID0gewogIGdldEFsbEhvdXJzOiBmdW5jdGlvbiBnZXRBbGxIb3VycygpIHsKICAgIHJldHVybiBbIjAwOjAwOjAwIiwgIjAwOjEwOjAwIiwgIjAwOjIwOjAwIiwgIjAwOjMwOjAwIiwgIjAwOjQwOjAwIiwgIjAwOjUwOjAwIiwgIjAxOjAwOjAwIiwgIjAxOjEwOjAwIiwgIjAxOjIwOjAwIiwgIjAxOjMwOjAwIiwgIjAxOjQwOjAwIiwgIjAxOjUwOjAwIiwgIjAyOjAwOjAwIiwgIjAyOjEwOjAwIiwgIjAyOjIwOjAwIiwgIjAyOjMwOjAwIiwgIjAyOjQwOjAwIiwgIjAyOjUwOjAwIiwgIjAzOjAwOjAwIiwgIjAzOjEwOjAwIiwgIjAzOjIwOjAwIiwgIjAzOjMwOjAwIiwgIjAzOjQwOjAwIiwgIjAzOjUwOjAwIiwgIjA0OjAwOjAwIiwgIjA0OjEwOjAwIiwgIjA0OjIwOjAwIiwgIjA0OjMwOjAwIiwgIjA0OjQwOjAwIiwgIjA0OjUwOjAwIiwgIjA1OjAwOjAwIiwgIjA1OjEwOjAwIiwgIjA1OjIwOjAwIiwgIjA1OjMwOjAwIiwgIjA1OjQwOjAwIiwgIjA1OjUwOjAwIiwgIjA2OjAwOjAwIiwgIjA2OjEwOjAwIiwgIjA2OjIwOjAwIiwgIjA2OjMwOjAwIiwgIjA2OjQwOjAwIiwgIjA2OjUwOjAwIiwgIjA3OjAwOjAwIiwgIjA3OjEwOjAwIiwgIjA3OjIwOjAwIiwgIjA3OjMwOjAwIiwgIjA3OjQwOjAwIiwgIjA3OjUwOjAwIiwgIjA4OjAwOjAwIiwgIjA4OjEwOjAwIiwgIjA4OjIwOjAwIiwgIjA4OjMwOjAwIiwgIjA4OjQwOjAwIiwgIjA4OjUwOjAwIiwgIjA5OjAwOjAwIiwgIjA5OjEwOjAwIiwgIjA5OjIwOjAwIiwgIjA5OjMwOjAwIiwgIjA5OjQwOjAwIiwgIjA5OjUwOjAwIiwgIjEwOjAwOjAwIiwgIjEwOjEwOjAwIiwgIjEwOjIwOjAwIiwgIjEwOjMwOjAwIiwgIjEwOjQwOjAwIiwgIjEwOjUwOjAwIiwgIjExOjAwOjAwIiwgIjExOjEwOjAwIiwgIjExOjIwOjAwIiwgIjExOjMwOjAwIiwgIjExOjQwOjAwIiwgIjExOjUwOjAwIiwgIjEyOjAwOjAwIiwgIjEyOjEwOjAwIiwgIjEyOjIwOjAwIiwgIjEyOjMwOjAwIiwgIjEyOjQwOjAwIiwgIjEyOjUwOjAwIiwgIjEzOjAwOjAwIiwgIjEzOjEwOjAwIiwgIjEzOjIwOjAwIiwgIjEzOjMwOjAwIiwgIjEzOjQwOjAwIiwgIjEzOjUwOjAwIiwgIjE0OjAwOjAwIiwgIjE0OjEwOjAwIiwgIjE0OjIwOjAwIiwgIjE0OjMwOjAwIiwgIjE0OjQwOjAwIiwgIjE0OjUwOjAwIiwgIjE1OjAwOjAwIiwgIjE1OjEwOjAwIiwgIjE1OjIwOjAwIiwgIjE1OjMwOjAwIiwgIjE1OjQwOjAwIiwgIjE1OjUwOjAwIiwgIjE2OjAwOjAwIiwgIjE2OjEwOjAwIiwgIjE2OjIwOjAwIiwgIjE2OjMwOjAwIiwgIjE2OjQwOjAwIiwgIjE2OjUwOjAwIiwgIjE3OjAwOjAwIiwgIjE3OjEwOjAwIiwgIjE3OjIwOjAwIiwgIjE3OjMwOjAwIiwgIjE3OjQwOjAwIiwgIjE3OjUwOjAwIiwgIjE4OjAwOjAwIiwgIjE4OjEwOjAwIiwgIjE4OjIwOjAwIiwgIjE4OjMwOjAwIiwgIjE4OjQwOjAwIiwgIjE4OjUwOjAwIiwgIjE5OjAwOjAwIiwgIjE5OjEwOjAwIiwgIjE5OjIwOjAwIiwgIjE5OjMwOjAwIiwgIjE5OjQwOjAwIiwgIjE5OjUwOjAwIiwgIjIwOjAwOjAwIiwgIjIwOjEwOjAwIiwgIjIwOjIwOjAwIiwgIjIwOjMwOjAwIiwgIjIwOjQwOjAwIiwgIjIwOjUwOjAwIiwgIjIxOjAwOjAwIiwgIjIxOjEwOjAwIiwgIjIxOjIwOjAwIiwgIjIxOjMwOjAwIiwgIjIxOjQwOjAwIiwgIjIxOjUwOjAwIiwgIjIyOjAwOjAwIiwgIjIyOjEwOjAwIiwgIjIyOjIwOjAwIiwgIjIyOjMwOjAwIiwgIjIyOjQwOjAwIiwgIjIyOjUwOjAwIiwgIjIzOjAwOjAwIiwgIjIzOjEwOjAwIiwgIjIzOjIwOjAwIiwgIjIzOjMwOjAwIiwgIjIzOjQwOjAwIiwgIjIzOjUwOjAwIiwgIjI0OjAwOjAwIl07CiAgfSwKICBnZXRGdWxsSG91cnM6IGZ1bmN0aW9uIGdldEZ1bGxIb3VycygpIHsKICAgIHJldHVybiBbIjAwOjAwOjAwIiwgIjAxOjAwOjAwIiwgIjAyOjAwOjAwIiwgIjAzOjAwOjAwIiwgIjA0OjAwOjAwIiwgIjA1OjAwOjAwIiwgIjA2OjAwOjAwIiwgIjA3OjAwOjAwIiwgIjA4OjAwOjAwIiwgIjA5OjAwOjAwIiwgIjEwOjAwOjAwIiwgIjExOjAwOjAwIiwgIjEyOjAwOjAwIiwgIjEzOjAwOjAwIiwgIjE0OjAwOjAwIiwgIjE1OjAwOjAwIiwgIjE2OjAwOjAwIiwgIjE3OjAwOjAwIiwgIjE4OjAwOjAwIiwgIjE5OjAwOjAwIiwgIjIwOjAwOjAwIiwgIjIxOjAwOjAwIiwgIjIyOjAwOjAwIiwgIjIzOjAwOjAwIl07CiAgfQp9OwoKcmVnaXN0ZXJQcm9taXNlV29ya2VyKGZ1bmN0aW9uIChtZXNzYWdlKSB7CiAgdmFyIHR5cGUgPSBtZXNzYWdlLnR5cGUsCiAgICAgIGRhdGEgPSBtZXNzYWdlLmRhdGE7CgogIGlmICh0eXBlID09PSAibWVzc2FnZSIpIHsKICAgIHJldHVybiAiV29ya2VyIHJlcGxpZXM6ICIuY29uY2F0KG5ldyBEYXRlKCkudG9JU09TdHJpbmcoKSk7CiAgfQoKICBzd2l0Y2ggKHR5cGUpIHsKICAgIGNhc2UgImdldERheXMiOgogICAgICByZXR1cm4gZ2V0RGF5cyhkYXRhLmRheSwgZGF0YS5vcHRpb25zKTsKCiAgICBjYXNlICJnZXRIb3VycyI6CiAgICAgIHJldHVybiBnZXRIb3VycyhkYXRhLmhvdXJPcHRpb25zKTsKCiAgICBjYXNlICJnZXREYXlDZWxscyI6CiAgICAgIHJldHVybiBnZXREYXlDZWxscyhkYXRhLmRheSwgZGF0YS5ob3VyT3B0aW9ucyk7CgogICAgY2FzZSAiY29uc3RydWN0RGF5RXZlbnRzIjoKICAgICAgcmV0dXJuIGNvbnN0cnVjdERheUV2ZW50cyhkYXRhLmRheSwgZGF0YS5ldmVudHMpOwoKICAgIGNhc2UgImNvbnN0cnVjdE5ld0V2ZW50IjoKICAgICAgcmV0dXJuIGNvbnN0cnVjdE5ld0V2ZW50KGRhdGEuZXZlbnQpOwogIH0KfSk7CgpmdW5jdGlvbiBnZXREYXlzKGRheVN0cmluZywgX3JlZikgewogIHZhciBoaWRlX2RhdGVzID0gX3JlZi5oaWRlX2RhdGVzLAogICAgICBoaWRlX2RheXMgPSBfcmVmLmhpZGVfZGF5cywKICAgICAgdmlld190eXBlID0gX3JlZi52aWV3X3R5cGU7CiAgdmFyIGRhdGUgPSBuZXcgRGF0ZSgiIi5jb25jYXQoZGF5U3RyaW5nLCAiVDAwOjAwOjAwLjAwMFoiKSk7CiAgdmFyIGRheV9vZl93ZWVrID0gZGF0ZS5nZXRVVENEYXkoKSAtIDE7CiAgdmFyIGRheXMgPSBbXTsKCiAgaWYgKHZpZXdfdHlwZSA9PT0gImRheSIpIHsKICAgIGRheXMgPSBbewogICAgICB2YWx1ZTogZGF0ZS50b0lTT1N0cmluZygpLAogICAgICBpbmRleDogMAogICAgfV07CiAgfSBlbHNlIHsKICAgIGZvciAodmFyIGlkeCA9IDA7IGlkeCA8IDc7IGlkeCsrKSB7CiAgICAgIGRheXMucHVzaCh7CiAgICAgICAgdmFsdWU6IGFkZERheXMoZGF0ZSwgaWR4IC0gZGF5X29mX3dlZWspLnRvSVNPU3RyaW5nKCksCiAgICAgICAgaW5kZXg6IGlkeAogICAgICB9KTsKICAgIH0KICB9CgogIGlmIChoaWRlX2RhdGVzICYmIGhpZGVfZGF0ZXMubGVuZ3RoID4gMCkgewogICAgZGF5cyA9IGRheXMuZmlsdGVyKGZ1bmN0aW9uIChfcmVmMikgewogICAgICB2YXIgdmFsdWUgPSBfcmVmMi52YWx1ZTsKICAgICAgcmV0dXJuIGhpZGVfZGF0ZXMuaW5kZXhPZih2YWx1ZS5zbGljZSgwLCAxMCkpIDwgMDsKICAgIH0pOwogIH0KCiAgaWYgKGhpZGVfZGF5cyAmJiBoaWRlX2RheXMubGVuZ3RoID4gMCkgewogICAgZGF5cyA9IGRheXMuZmlsdGVyKGZ1bmN0aW9uIChfcmVmMykgewogICAgICB2YXIgaW5kZXggPSBfcmVmMy5pbmRleDsKICAgICAgcmV0dXJuIGhpZGVfZGF5cy5pbmRleE9mKGluZGV4KSA8IDA7CiAgICB9KTsKICB9CgogIHJldHVybiBkYXlzOwp9CgpmdW5jdGlvbiBnZXRIb3Vycyhob3VyX29wdGlvbnMpIHsKICB2YXIgZGF0ZSA9IG5ldyBEYXRlKCk7CiAgZGF0ZS5zZXRVVENIb3VycygwLCAwLCAwLCAwKTsKICB2YXIgaXNvX2RhdGUgPSBnZXRZZWFyTW9udGhEYXkoZGF0ZSk7CiAgdmFyIGRheV9ob3VycyA9IGhvdXJVdGlscy5nZXRGdWxsSG91cnMoKTsKCiAgaWYgKGhvdXJfb3B0aW9ucykgewogICAgdmFyIHN0YXJ0X2hvdXIgPSBob3VyX29wdGlvbnMuc3RhcnRfaG91ciwKICAgICAgICBlbmRfaG91ciA9IGhvdXJfb3B0aW9ucy5lbmRfaG91cjsKICAgIGRheV9ob3VycyA9IGRheV9ob3Vycy5zbGljZShzdGFydF9ob3VyLCBlbmRfaG91cik7CiAgfQoKICB2YXIgaG91cnMgPSBbXTsKCiAgZm9yICh2YXIgaWR4ID0gMDsgaWR4IDwgZGF5X2hvdXJzLmxlbmd0aDsgaWR4KyspIHsKICAgIHZhciB2YWx1ZSA9ICIiLmNvbmNhdChpc29fZGF0ZSwgIlQiKS5jb25jYXQoZGF5X2hvdXJzW2lkeF0sICIuMDAwWiIpOwogICAgaG91cnMucHVzaCh7CiAgICAgIHZhbHVlOiB2YWx1ZSwKICAgICAgaW5kZXg6IGlkeCwKICAgICAgdmlzaWJsZTogdHJ1ZQogICAgfSk7CiAgfQoKICByZXR1cm4gaG91cnM7Cn0KCnZhciBnZXREYXlDZWxscyA9IGZ1bmN0aW9uIGdldERheUNlbGxzKGRheVN0cmluZywgZGF5X29wdGlvbnMpIHsKICBpZiAobmV3IERhdGUoZGF5U3RyaW5nKS50b0lTT1N0cmluZygpICE9PSBkYXlTdHJpbmcpIHsKICAgIHRocm93IG5ldyBFcnJvcigiVW5zdXBwb3J0ZWQgZGF5U3RyaW5nIHBhcmFtZXRlciBwcm92aWRlZCIpOwogIH0KCiAgdmFyIGNlbGxzID0gW107CiAgdmFyIGRhdGVfcGFydCA9IGRheVN0cmluZy5zbGljZSgwLCAxMCk7CiAgdmFyIGFsbF9ob3VycyA9IGhvdXJVdGlscy5nZXRBbGxIb3VycygpOwoKICBpZiAoZGF5X29wdGlvbnMpIHsKICAgIHZhciBzdGFydF9ob3VyID0gZGF5X29wdGlvbnMuc3RhcnRfaG91ciwKICAgICAgICBlbmRfaG91ciA9IGRheV9vcHRpb25zLmVuZF9ob3VyOwogICAgdmFyIHN0YXJ0X2luZGV4ID0gc3RhcnRfaG91ciAqIDY7CiAgICB2YXIgZW5kX2luZGV4ID0gZW5kX2hvdXIgKiA2ICsgMTsKICAgIGFsbF9ob3VycyA9IGFsbF9ob3Vycy5zbGljZShzdGFydF9pbmRleCwgZW5kX2luZGV4KTsKICB9CgogIGZvciAodmFyIGhvdXJJZHggPSAwOyBob3VySWR4IDwgYWxsX2hvdXJzLmxlbmd0aDsgaG91cklkeCsrKSB7CiAgICB2YXIgaG91ciA9IGFsbF9ob3Vyc1tob3VySWR4XTsKICAgIHZhciB2YWx1ZSA9ICIiLmNvbmNhdChkYXRlX3BhcnQsICJUIikuY29uY2F0KGhvdXIsICIuMDAwWiIpOwogICAgY2VsbHMucHVzaCh7CiAgICAgIHZhbHVlOiB2YWx1ZSwKICAgICAgaW5kZXg6IGhvdXJJZHgsCiAgICAgIHZpc2libGU6IHRydWUKICAgIH0pOwogIH0KCiAgcmV0dXJuIGNlbGxzOwp9OwoKdmFyIGNvbnN0cnVjdERheUV2ZW50cyA9IGZ1bmN0aW9uIGNvbnN0cnVjdERheUV2ZW50cyhkYXksIGV4aXN0aW5nX2V2ZW50cykgewogIHZhciBldmVudHNfZm9yX3RoaXNfZGF5ID0gZXhpc3RpbmdfZXZlbnRzLm1hcChmdW5jdGlvbiAoZXZlbnQpIHsKICAgIHZhciBmcm9tID0gZXZlbnQuZnJvbSwKICAgICAgICB0byA9IGV2ZW50LnRvOwogICAgZnJvbSA9IGdldExvY2FsZVRpbWUoZnJvbSk7CiAgICB0byA9IGdldExvY2FsZVRpbWUodG8pOwogICAgcmV0dXJuIF9vYmplY3RTcHJlYWQyKHt9LCBldmVudCwgewogICAgICBmcm9tOiBmcm9tLAogICAgICB0bzogdG8KICAgIH0pOwogIH0pLmZpbHRlcihmdW5jdGlvbiAoX3JlZjQpIHsKICAgIHZhciBmcm9tID0gX3JlZjQuZnJvbTsKICAgIHJldHVybiBmcm9tLnNsaWNlKDAsIDEwKSA9PT0gZGF5LnNsaWNlKDAsIDEwKTsKICB9KTsKICBpZiAoZXZlbnRzX2Zvcl90aGlzX2RheS5sZW5ndGggPT09IDApIHJldHVybiB7fTsKICB2YXIgZmlsdGVyZWRfZXZlbnRzID0ge307CiAgZXZlbnRzX2Zvcl90aGlzX2RheS5mb3JFYWNoKGZ1bmN0aW9uIChldmVudCkgewogICAgdmFyIGNvbnN0cnVjdGVkRXZlbnQgPSBjb25zdHJ1Y3ROZXdFdmVudChldmVudCk7CiAgICB2YXIga2V5ID0gY29uc3RydWN0ZWRFdmVudC5rZXk7CgogICAgaWYgKGZpbHRlcmVkX2V2ZW50cy5oYXNPd25Qcm9wZXJ0eShrZXkpKSB7CiAgICAgIGZpbHRlcmVkX2V2ZW50c1trZXldLnB1c2goY29uc3RydWN0ZWRFdmVudCk7CiAgICB9IGVsc2UgewogICAgICBmaWx0ZXJlZF9ldmVudHNba2V5XSA9IFtjb25zdHJ1Y3RlZEV2ZW50XTsKICAgIH0KICB9KTsKICByZXR1cm4gZmlsdGVyZWRfZXZlbnRzOwp9OwoKdmFyIGNvbnN0cnVjdE5ld0V2ZW50ID0gZnVuY3Rpb24gY29uc3RydWN0TmV3RXZlbnQoZXZlbnQpIHsKICB2YXIgZnJvbSA9IGV2ZW50LmZyb20sCiAgICAgIHRvID0gZXZlbnQudG87CiAgZnJvbSA9IG5ldyBEYXRlKGZyb20pOwogIHRvID0gbmV3IERhdGUodG8pOwogIGZyb20uc2V0VVRDU2Vjb25kcygwLCAwKTsKICB0by5zZXRVVENTZWNvbmRzKDAsIDApOwogIHZhciBmcm9tX3ZhbHVlID0gZnJvbS50b0lTT1N0cmluZygpOwogIHZhciBtYXNrZWRfZnJvbSA9IG5ldyBEYXRlKGZyb20uZ2V0VGltZSgpKTsKICB2YXIgbWFza2VkX3RvID0gbmV3IERhdGUodG8uZ2V0VGltZSgpKTsKICB2YXIgZnJvbURhdGEgPSB7CiAgICB2YWx1ZTogZnJvbV92YWx1ZSwKICAgIG1hc2tlZF92YWx1ZTogbWFza2VkX2Zyb20udG9JU09TdHJpbmcoKSwKICAgIHJvdW5kZWQ6IGZhbHNlLAogICAgcm91bmRfb2Zmc2V0OiBudWxsCiAgfTsKICB2YXIgdG9fdmFsdWUgPSB0by50b0lTT1N0cmluZygpOwogIHZhciB0b0RhdGEgPSB7CiAgICB2YWx1ZTogdG9fdmFsdWUsCiAgICBtYXNrZWRfdmFsdWU6IG1hc2tlZF90by50b0lTT1N0cmluZygpLAogICAgcm91bmRlZDogZmFsc2UsCiAgICByb3VuZF9vZmZzZXQ6IG51bGwKICB9OwoKICB2YXIgbXVsdGlwbGVPZjEwID0gZnVuY3Rpb24gbXVsdGlwbGVPZjEwKGRhdGVTdHIpIHsKICAgIHJldHVybiBuZXcgRGF0ZShkYXRlU3RyKS5nZXRNaW51dGVzKCkgJSAxMDsKICB9OwoKICBpZiAobXVsdGlwbGVPZjEwKGZyb21EYXRhLnZhbHVlKSAhPT0gMCkgewogICAgZnJvbURhdGEucm91bmRlZCA9IHRydWU7CiAgICBmcm9tRGF0YS5yb3VuZF9vZmZzZXQgPSBtdWx0aXBsZU9mMTAoZnJvbURhdGEudmFsdWUpOwogICAgdmFyIG1pbnV0ZXMgPSBuZXcgRGF0ZShmcm9tRGF0YS52YWx1ZSkuZ2V0TWludXRlcygpOwogICAgdmFyIG1hc2tlZE1pbnV0ZXMgPSBNYXRoLmZsb29yKG1pbnV0ZXMgLyAxMCkgKiAxMDsKICAgIG1hc2tlZF9mcm9tLnNldE1pbnV0ZXMobWFza2VkTWludXRlcyk7CiAgICBmcm9tRGF0YS5tYXNrZWRfdmFsdWUgPSBtYXNrZWRfZnJvbS50b0lTT1N0cmluZygpOwogIH0KCiAgdmFyIGV2ZW50S2V5ID0gbWFza2VkX2Zyb20udG9JU09TdHJpbmcoKTsgLy8gMSBtaW51dGUgZXF1YWxzIDEgcGl4ZWwgaW4gb3VyIHZpZXcuIFRoYXQgbWVhbnMgd2UgbmVlZCB0byBmaW5kIHRoZSBsZW5ndGgKICAvLyBvZiB0aGUgZXZlbnQgYnkgZmluZGluZyBvdXQgdGhlIGRpZmZlcmVuY2UgaW4gbWludXRlcwoKICB2YXIgZGlmZkluTXMgPSB0byAtIGZyb207CiAgdmFyIGRpZmZJbkhycyA9IE1hdGguZmxvb3IoZGlmZkluTXMgJSA4NjQwMDAwMCAvIDM2MDAwMDApOwogIHZhciBkaWZmTWlucyA9IE1hdGgucm91bmQoZGlmZkluTXMgJSA4NjQwMDAwMCAlIDM2MDAwMDAgLyA2MDAwMCk7CiAgdmFyIGNvbnN0cnVjdGVkRXZlbnQgPSB7CiAgICBzdGFydDogZnJvbURhdGEsCiAgICBlbmQ6IHRvRGF0YSwKICAgIGRhdGE6IGV2ZW50LmRhdGEsCiAgICBpZDogZXZlbnQuaWQgfHwgZ2VuZXJhdGVVVUlEKCksCiAgICBkaXN0YW5jZTogZGlmZk1pbnMgKyBkaWZmSW5IcnMgKiA2MCwKICAgIHN0YXR1czogImNvbXBsZXRlZCIsCiAgICBrZXk6IGV2ZW50S2V5CiAgfTsKICByZXR1cm4gY29uc3RydWN0ZWRFdmVudDsKfTsKCg==', null, false);
/* eslint-enable */var worker = new WorkerFactory();
var promiseWorker = PromiseWorker(worker);

var send = function send() {
  var type = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "message";
  var data = arguments.length > 1 ? arguments[1] : undefined;
  return promiseWorker.postMessage({
    type: type,
    data: data
  });
};

var myWorker = {
  send: send
};var script$1 = {
  props: ["day", "passedTime"],
  created: function created() {
    // get and render day cells
    // and then render any event
    // on top of them
    this.renderDay();
  },
  components: {
    kalendarCell: function kalendarCell$1() {
      return Promise.resolve().then(function(){return kalendarCell});
    }
  },
  provide: function provide() {
    // provide these methods to children components
    // for easier access
    return {
      kalendarAddEvent: this.addEvent,
      kalendarClearPopups: this.clearCreatingLeftovers
    };
  },
  // inject kalendar options from parent component
  inject: ["kalendar_options"],
  mounted: function mounted() {
    if (this.kalendar_options.scrollToNow && this.isToday) this.scrollView();
  },
  computed: {
    isWeekend: function isWeekend$1() {
      return isWeekend(this.day.value);
    },
    isToday: function isToday$1() {
      return isToday(this.day.value);
    }
  },
  data: function data() {
    return {
      // this is the main object
      // we use to make selections
      // and control their flows
      creator: {
        creating: false,
        starting_cell: null,
        original_starting_cell: null,
        current_cell: null,
        ending_cell: null,
        status: null
      },
      // temporary event is an object
      // that holds values of creator
      // when the popup is initiated
      temporary_event: null,
      // day cells and events are used for rendering purposes
      day_cells: [],
      day_events: null
    };
  },
  methods: {
    renderDay: function renderDay() {
      var _this = this;

      myWorker.send("getDayCells", {
        day: this.day.value,
        hourOptions: {
          start_hour: this.kalendar_options.day_starts_at,
          end_hour: this.kalendar_options.day_ends_at
        }
      }).then(function (reply) {
        _this.day_cells = reply;
        return _this.getDayEvents(_this.$kalendar.getEvents());
      });
    },
    addEvent: function addEvent(payload) {
      var _this2 = this;

      // validation
      var validation_message = this.checkEventValidity(payload);

      if (validation_message !== null) {
        return Promise.reject(validation_message);
      } // use web worker to generate event
      // and then render it in the day_events objects


      var from = payload.from,
          to = payload.to;
      from = getLocaleTime(from);
      to = getLocaleTime(to);
      return myWorker.send("constructNewEvent", {
        event: _objectSpread2({}, payload, {
          from: from,
          to: to
        })
      }).then(function (constructed_event) {
        var key = constructed_event.key;

        if (_this2.day_events.hasOwnProperty(key)) {
          _this2.day_events[key].push(constructed_event);
        } else {
          // must use $set since key wasnt present in the object
          // vue will fail to render it
          _this2.$set(_this2.day_events, key, [constructed_event]);
        }

        var events = _this2.$kalendar.getEvents();
        events.push(_objectSpread2({}, payload, {
          id: constructed_event.id
        }));

        _this2.$kalendar.updateEvents(events);
      });
    },
    // this is not called inside this component
    // but rather from the kalendar-weekview component
    // which targets it using $refs object.
    removeEvent: function removeEvent(payload) {
      var events = this.$kalendar.getEvents();
      var eventIndex = events.findIndex(function (event) {
        return event.id === payload.id;
      });
      if (eventIndex < 0) return;
      events.splice(eventIndex, 1);
      var index = this.day_events[payload.key].findIndex(function (event) {
        return event.id === payload.id;
      });
      this.day_events[payload.key].splice(index, 1);
      this.$kalendar.updateEvents(events);
      return Promise.resolve();
    },
    checkEventValidity: function checkEventValidity(payload) {
      var from = payload.from,
          to = payload.to;
      if (!from || !to) return "No dates were provided in the payload";
      /*if (isoFrom !== from) {
        return 'From date is not ISO format';
      }
      if (isoTo !== to) {
        return 'To date is not ISO format';
      }*/

      return null;
    },
    getDayEvents: function getDayEvents(events) {
      var _this3 = this;

      var clonedEvents = events.map(function (event) {
        return cloneObject(event);
      });
      return myWorker.send("constructDayEvents", {
        events: clonedEvents,
        day: this.day.value
      }).then(function (constructed_events) {
        _this3.day_events = constructed_events;
      });
    },
    clearCreatingLeftovers: function clearCreatingLeftovers() {
      for (var key in this.day_events) {
        var hasPending = this.day_events[key].some(function (event) {
          return event.status === "popup-initiated" || event.status === "creating";
        });

        if (hasPending) {
          var completed = this.day_events[key].filter(function (event) {
            return event.status === "completed";
          });
          this.$set(this.day_events, key, completed);

          if (completed.length === 0) {
            delete this.day_events[key];
          }
        }
      }

      this.resetEvents();
    },
    resetEvents: function resetEvents() {
      if (!this.creator.creating && this.creator.status === null) return;
      this.creator = {
        creating: false,
        starting_cell: null,
        original_starting_cell: null,
        current_cell: null,
        ending_cell: null,
        status: null,
        temporary_id: null
      };
      this.temporary_event = null;
    },
    // this method is what we use
    // to start the flow of selecting a new cell
    // while the creator is enabled
    updateCreator: function updateCreator(payload) {
      this.creator = _objectSpread2({}, this.validateSelection(payload), {
        status: "creating"
      });

      if (this.kalendar_options.overlap === false && Object.keys(this.day_events).length > 0) {
        var fixedOverlap = this.overlapPolice(payload);

        if (fixedOverlap) {
          this.creator = this.validateSelection(fixedOverlap);
          this.selectCell();
          this.initiatePopup();
          return;
        }
      }

      this.selectCell();
    },
    // when the direction is reversed,
    // the ending cell is actually the originally selected cell
    validateSelection: function validateSelection(event) {
      var original_starting_cell = event.original_starting_cell,
          starting_cell = event.starting_cell,
          current_cell = event.current_cell;

      if (event.direction === "reverse" && original_starting_cell.index > current_cell.index) {
        return _objectSpread2({}, event, {
          starting_cell: current_cell,
          ending_cell: original_starting_cell
        });
      }

      return event;
    },
    selectCell: function selectCell() {
      if (!this.creator.creating) return;
      var _this$creator = this.creator,
          creating = _this$creator.creating,
          ending_cell = _this$creator.ending_cell,
          current_cell = _this$creator.current_cell,
          starting_cell = _this$creator.starting_cell,
          original_starting_cell = _this$creator.original_starting_cell;
      var real_ending_cell_index = ending_cell.index + 1;
      ending_cell = this.day_cells[real_ending_cell_index];
      var diffInMs = new Date(ending_cell.value) - new Date(starting_cell.value);
      var diffInHrs = Math.floor(diffInMs % 86400000 / 3600000);
      var diffMins = Math.round(diffInMs % 86400000 % 3600000 / 60000);
      var startDate = new Date(starting_cell.value);
      var endDate = new Date(ending_cell.value);
      var distance = diffMins + diffInHrs * 60;
      this.temporary_event = {
        start: {
          masked_value: startDate.toISOString(),
          value: startDate.toISOString(),
          rounded: false,
          round_offset: null
        },
        end: {
          masked_value: endDate.toISOString(),
          value: endDate.toISOString(),
          rounded: false,
          round_offset: null
        },
        distance: distance,
        status: "creating"
      };
    },
    initiatePopup: function initiatePopup() {
      if (this.creating && this.creator.status !== "creating") return;
      this.creator = _objectSpread2({}, this.creator, {
        status: "popup-initiated",
        creating: false
      });
      var _this$creator2 = this.creator,
          ending_cell = _this$creator2.ending_cell,
          current_cell = _this$creator2.current_cell,
          starting_cell = _this$creator2.starting_cell,
          original_starting_cell = _this$creator2.original_starting_cell;
      var real_ending_cell_index = ending_cell.index + 1;
      ending_cell = this.day_cells[real_ending_cell_index];
      var diffInMs = new Date(ending_cell.value) - new Date(starting_cell.value);
      var diffInHrs = Math.floor(diffInMs % 86400000 / 3600000);
      var diffMins = Math.round(diffInMs % 86400000 % 3600000 / 60000);
      var startDate = new Date(starting_cell.value);
      var endDate = new Date(ending_cell.value);
      var finalEvent = {
        start: {
          masked_value: startDate.toISOString(),
          value: startDate.toISOString(),
          rounded: false,
          round_offset: null
        },
        end: {
          masked_value: endDate.toISOString(),
          value: endDate.toISOString(),
          rounded: false,
          round_offset: null
        },
        distance: diffMins + diffInHrs * 60,
        status: "popup-initiated"
      };
      var updated_events = this.day_events[starting_cell.value];
      if (!updated_events) updated_events = [];
      updated_events.push(finalEvent);
      this.$set(this.day_events, starting_cell.value, updated_events);
      this.temporary_event = null;
    },
    overlapPolice: function overlapPolice(payload) {
      var _this4 = this;

      if (!payload.current_cell) return;
      var overlapped = Object.keys(this.day_events).map(function (evKey) {
        return _this4.day_events[evKey];
      }).flat().filter(function (event) {
        var cellStart = new Date(payload.starting_cell.value);
        var cellEnd = new Date(payload.ending_cell.value);
        var eventStarts = new Date(event.start.value);
        var eventEnds = new Date(event.end.value);
        return cellEnd > eventStarts && cellEnd < eventEnds || cellStart < eventStarts && cellEnd > eventStarts;
      });

      if (!overlapped || overlapped.length === 0) {
        return;
      }

      var newPayload = payload;

      if (payload.direction === "reverse") {
        var needed_cell = overlapped[0].end;
        var event_cell = this.day_cells.find(function (c) {
          return c.value === needed_cell.masked_value;
        });
        var cell = this.day_cells[event_cell.index];
        newPayload.starting_cell = {
          value: cell.value,
          index: cell.index
        };
        newPayload.current_cell = {
          value: cell.value,
          index: cell.index
        };
      } else {
        var _needed_cell = overlapped[0].start;

        var _event_cell = this.day_cells.find(function (c) {
          return c.value === _needed_cell.masked_value;
        });

        var _cell = this.day_cells[_event_cell.index - 1];
        newPayload.ending_cell = {
          value: _cell.value,
          index: _cell.index
        };
      }

      return newPayload;
    },
    scrollView: function scrollView() {
      var topoffset = this.$refs.nowIndicator.offsetTop;
      setTimeout(function () {
        window.scroll({
          top: topoffset,
          left: 0,
          behavior: "smooth"
        });
      }, 500);
    }
  }
};/* script */
var __vue_script__$1 = script$1;
/* template */

var __vue_render__$1 = function __vue_render__() {
  var _vm = this;

  var _h = _vm.$createElement;

  var _c = _vm._self._c || _h;

  return _c('ul', {
    ref: _vm.day.value + '-reference',
    staticClass: "kalendar-day",
    class: {
      'is-weekend': _vm.isWeekend,
      'is-today': _vm.isToday,
      creating: _vm.creator.creating || _vm.creator.status === 'popup-initiated'
    },
    staticStyle: {
      "position": "relative"
    }
  }, [_vm.isToday ? _c('div', {
    ref: "nowIndicator",
    class: _vm.kalendar_options.style === 'material_design' ? 'hour-indicator-line' : 'hour-indicator-tooltip',
    style: "top:" + _vm.passedTime + "px"
  }, [_c('span', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: _vm.kalendar_options.style === 'material_design',
      expression: "kalendar_options.style === 'material_design'"
    }],
    staticClass: "line"
  })]) : _vm._e(), _vm._v(" "), _vm._l(_vm.day_cells, function (cell, index) {
    return _c('kalendar-cell', {
      key: "cell-" + index,
      attrs: {
        "constructed-events": _vm.day_events,
        "creator": _vm.creator,
        "cell-data": cell,
        "index": index,
        "temporary-event": _vm.temporary_event
      },
      on: {
        "select": _vm.updateCreator,
        "reset": function reset($event) {
          return _vm.resetEvents();
        },
        "initiatePopup": function initiatePopup($event) {
          return _vm.initiatePopup();
        }
      }
    });
  })], 2);
};

var __vue_staticRenderFns__$1 = [];
/* style */

var __vue_inject_styles__$1 = function __vue_inject_styles__(inject) {
  if (!inject) return;
  inject("data-v-1724e754_0", {
    source: "ul.kalendar-day{position:relative;background-color:#fff}ul.kalendar-day.is-weekend{background-color:var(--weekend-color)}ul.kalendar-day.is-today{background-color:var(--current-day-color)}ul.kalendar-day .clear{position:absolute;z-index:1;top:-20px;right:0;font-size:10px}ul.kalendar-day.creating{z-index:11}ul.kalendar-day.creating .created-event{pointer-events:none}",
    map: undefined,
    media: undefined
  });
};
/* scoped */


var __vue_scope_id__$1 = undefined;
/* module identifier */

var __vue_module_identifier__$1 = undefined;
/* functional template */

var __vue_is_functional_template__$1 = false;
/* style inject SSR */

/* style inject shadow dom */

var __vue_component__$1 = normalizeComponent({
  render: __vue_render__$1,
  staticRenderFns: __vue_staticRenderFns__$1
}, __vue_inject_styles__$1, __vue_script__$1, __vue_scope_id__$1, __vue_is_functional_template__$1, __vue_module_identifier__$1, false, createInjector, undefined, undefined);//
var script$2 = {
  props: {
    current_day: {
      required: true,
      type: String,
      validator: function validator(d) {
        return !isNaN(Date.parse(d));
      }
    }
  },
  components: {
    KalendarDays: __vue_component__$1
  },
  created: function created() {
    var _this = this;

    this.addHelperMethods();
    setInterval(function () {
      return _this.kalendar_options.now = new Date();
    }, 1000 * 60);
    this.constructWeek();
  },
  inject: ["kalendar_options", "kalendar_events"],
  data: function data() {
    return {
      hours: null,
      days: []
    };
  },
  computed: {
    hoursVisible: function hoursVisible() {
      if (!this.hours) return [];
      return this.hours.filter(function (x) {
        return !!x.visible;
      });
    },
    colsSpace: function colsSpace() {
      return this.kalendar_options.style === "flat_design" ? "5px" : "0px";
    },
    hourHeight: function hourHeight() {
      return 6 * this.kalendar_options.cell_height; //this.kalendar_options.cell_height * (60 / this.kalendar_options.split_value);
      // * this.kalendar_options.hour_parts;
    },
    passedTime: function passedTime() {
      var _this$kalendar_option = this.kalendar_options,
          day_starts_at = _this$kalendar_option.day_starts_at,
          day_ends_at = _this$kalendar_option.day_ends_at,
          now = _this$kalendar_option.now;
      var time = getLocaleTime(now);
      var day_starts = "".concat(time.split("T")[0], "T").concat((day_starts_at + "").padStart(2, '0'), ":00:00.000Z");
      var day_ends = "".concat(time.split("T")[0], "T").concat((day_ends_at + "").padStart(2, '0'), ":00:00.000Z");
      var time_obj = new Date(time);
      if (new Date(day_ends) < time_obj || time_obj < new Date(day_starts)) return null;
      var distance = (time_obj - new Date(day_starts)) / 1000 / 60;
      return {
        distance: distance,
        time: time
      };
    }
  },
  methods: {
    _isToday: function _isToday(day) {
      return isToday(day);
    },
    updateAppointments: function updateAppointments(_ref) {
      var id = _ref.id,
          data = _ref.data;
      this.$emit("update", {
        id: id,
        data: data
      });
    },
    deleteAppointment: function deleteAppointment(id) {
      this.$emit("delete", {
        id: id
      });
    },
    clearAppointments: function clearAppointments() {
      this.$emit("clear");
    },
    isDayBefore: function isDayBefore(day) {
      var now = new Date(this.kalendar_options.now);
      var formattedNow = getLocaleTime(now.toISOString());
      return isBefore(day, getHourlessDate(formattedNow));
    },
    constructWeek: function constructWeek() {
      var _this2 = this;

      var date = this.current_day.slice(0, 10);
      var _this$kalendar_option2 = this.kalendar_options,
          hide_dates = _this$kalendar_option2.hide_dates,
          hide_days = _this$kalendar_option2.hide_days,
          view_type = _this$kalendar_option2.view_type;
      return Promise.all([myWorker.send("getDays", {
        day: date,
        options: {
          hide_dates: hide_dates,
          hide_days: hide_days,
          view_type: view_type
        }
      }).then(function (reply) {
        _this2.days = reply; //.slice(0,1);
      }), myWorker.send("getHours", {
        hourOptions: {
          start_hour: this.kalendar_options.day_starts_at,
          end_hour: this.kalendar_options.day_ends_at
        }
      }).then(function (reply) {
        // Handle the reply
        _this2.hours = reply;
      })]);
    },
    addHelperMethods: function addHelperMethods() {
      var _this3 = this;

      this.$kalendar.buildWeek = function () {
        _this3.constructWeek();
      };

      this.$kalendar.addNewEvent = function (payload) {
        if (!payload) return Promise.reject("No payload");
        var from = payload.from,
            to = payload.to;
        if (from.slice(-4) === "000Z") payload.from = addTimezoneInfo(from);
        if (to.slice(-4) === "000Z") payload.to = addTimezoneInfo(to);
        var targetRef = payload.from.slice(0, 10);
        var refObject = _this3.$refs[targetRef];

        if (refObject && refObject[0]) {
          refObject[0].addEvent(payload);
        } else {
          // appointment is not in this view
          var events = _this3.$kalendar.getEvents();

          events.push(payload);

          _this3.$kalendar.updateEvents(events);
        }
      };

      this.$kalendar.removeEvent = function (options) {
        var day = options.day,
            key = options.key,
            id = options.id;

        if (day.length > 10) {
          day = day.slice(0, 10);
        }
        if (!day) return Promise.reject("Day wasn't provided");
        if (!id) return Promise.reject("No ID was provided");
        if (!key) return Promise.reject("No key was provided in the object");
        var targetRef = day;

        _this3.$refs[targetRef][0].removeEvent({
          id: id,
          key: key
        });
      };

      this.$kalendar.closePopups = function () {
        var refs = _this3.days.map(function (day) {
          return day.value.slice(0, 10);
        });

        refs.forEach(function (ref) {
          _this3.$refs[ref][0].clearCreatingLeftovers();
        });
      };
    }
  }
};/* script */
var __vue_script__$2 = script$2;
/* template */

var __vue_render__$2 = function __vue_render__() {
  var _vm = this;

  var _h = _vm.$createElement;

  var _c = _vm._self._c || _h;

  return _c('div', {
    staticClass: "calendar-wrap",
    style: "--space-between-cols: " + _vm.colsSpace
  }, [_c('div', {
    staticClass: "sticky-top"
  }, [_c('ul', {
    staticClass: "days"
  }, _vm._l(_vm.days || [], function (ref, index) {
    var value = ref.value;
    return _c('li', {
      key: index,
      staticClass: "day-indicator",
      class: {
        today: _vm._isToday(value),
        'is-before': _vm.isDayBefore(value)
      }
    }, [_c('div', [_c('span', {
      staticClass: "letters-date"
    }, [_vm._v(_vm._s(_vm.kalendar_options.formatDayTitle(value)[0]))]), _vm._v(" "), _c('span', {
      staticClass: "number-date"
    }, [_vm._v(_vm._s(_vm.kalendar_options.formatDayTitle(value)[1]))])])]);
  }), 0), _vm._v(" "), _c('ul', {
    staticClass: "all-day"
  }, [_c('span', [_vm._v("All Day")]), _vm._v(" "), _vm._l(_vm.days || [], function (date, index) {
    return _c('li', {
      key: index,
      class: {
        'all-today': _vm._isToday(date.value),
        'is-all-day': false
      },
      style: "height:" + (_vm.kalendar_options.cell_height + 5) + "px"
    });
  })], 2)]), _vm._v(" "),  _vm._e(), _vm._v(" "), _vm.hours ? _c('div', {
    staticClass: "blocks"
  }, [_c('div', {
    staticClass: "calendar-blocks"
  }, [_c('ul', {
    staticClass: "hours"
  }, _vm._l(_vm.hoursVisible, function (hour, index) {
    return _c('li', {
      key: index,
      staticClass: "hour-row-identifier",
      style: "height:" + _vm.hourHeight + "px"
    }, [_c('span', [_vm._v(_vm._s(_vm.kalendar_options.formatLeftHours(hour.value)))])]);
  }), 0), _vm._v(" "), _c('div', {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: _vm.kalendar_options.style !== 'material_design',
      expression: "kalendar_options.style !== 'material_design'"
    }],
    staticClass: "hour-indicator-line",
    style: "top:" + _vm.passedTime.distance + "px"
  }, [_c('span', {
    staticClass: "time-value"
  }, [_vm._v(_vm._s(_vm.passedTime.value))]), _vm._v(" "), _c('span', {
    staticClass: "line"
  })]), _vm._v(" "), _vm._l(_vm.days, function (day, index) {
    return _c('kalendar-days', {
      key: day.value.slice(0, 10),
      ref: day.value.slice(0, 10),
      refInFor: true,
      staticClass: "building-blocks",
      class: "day-" + (index + 1),
      attrs: {
        "day": day,
        "passed-time": _vm.passedTime.distance
      }
    });
  })], 2)]) : _vm._e()]);
};

var __vue_staticRenderFns__$2 = [];
/* style */

var __vue_inject_styles__$2 = function __vue_inject_styles__(inject) {
  if (!inject) return;
  inject("data-v-3c3b50e4_0", {
    source: ".calendar-wrap{display:flex;flex-direction:column}.calendar-wrap ul{list-style:none;padding:0}.calendar-wrap ul>li{display:flex}.sticky-top{position:sticky;top:0;z-index:20;background-color:#fff}.sticky-top .days{margin:0;display:flex;margin-left:55px}.sticky-top .days li{display:inline-flex;align-items:flex-end;padding-top:10px;flex:1;font-size:1.1rem;color:#666;font-weight:300;margin-right:var(--space-between-cols);border-bottom:solid 1px #e5e5e5;padding-bottom:5px;position:relative;font-size:18px}.sticky-top .days li span{margin-right:3px}.sticky-top .days li span:first-child{font-size:20px;font-weight:500}.sticky-top .days .today{border-bottom-color:var(--main-color);color:var(--main-color)!important}.sticky-top .days .today::after{content:\"\";position:absolute;height:2px;bottom:0;left:0;width:100%;background-color:var(--main-color)}.sticky-top .all-day{display:flex;margin-bottom:0;margin-top:0;border-bottom:solid 2px #e5e5e5}.sticky-top .all-day span{display:flex;align-items:center;padding:0 5px;width:55px;font-weight:500;font-size:.8rem;color:#b8bbca;text-transform:lowercase}.sticky-top .all-day li{flex:1;margin-right:var(--space-between-cols)}.sticky-top .all-day li.all-today{background-color:#fef4f4}.dummy-row{display:flex;padding-left:55px}.dummy-row ul{display:flex;flex:1;margin:0}.dummy-row li{flex:1;height:15px;margin-right:var(--space-between-cols);border-bottom:solid 1px #e5e5e5}.blocks{display:flex;position:relative;height:100%}.blocks ul{margin-top:0}.blocks .building-blocks{flex:1;margin-right:var(--space-between-cols);margin-bottom:0;display:flex;flex-direction:column}.blocks .calendar-blocks{width:100%;display:flex;position:relative}.hours{display:flex;flex-direction:column;color:#b8bbca;font-weight:500;font-size:.85rem;width:55px;height:100%;margin-bottom:0}.hours li{color:var(--hour-row-color);border-bottom:solid 1px transparent;padding-left:8px}.hours li span{margin-top:-8px}.hours li:first-child span{visibility:hidden}",
    map: undefined,
    media: undefined
  });
};
/* scoped */


var __vue_scope_id__$2 = undefined;
/* module identifier */

var __vue_module_identifier__$2 = undefined;
/* functional template */

var __vue_is_functional_template__$2 = false;
/* style inject SSR */

/* style inject shadow dom */

var __vue_component__$2 = normalizeComponent({
  render: __vue_render__$2,
  staticRenderFns: __vue_staticRenderFns__$2
}, __vue_inject_styles__$2, __vue_script__$2, __vue_scope_id__$2, __vue_is_functional_template__$2, __vue_module_identifier__$2, false, createInjector, undefined, undefined);var kalendarWeekview=/*#__PURE__*/Object.freeze({__proto__:null,'default': __vue_component__$2});var script$3 = {
  props: ['creator', 'index', 'cellData', 'constructedEvents', 'temporaryEvent'],
  inject: ['kalendar_options'],
  components: {
    KalendarEvent: function KalendarEvent() {
      return Promise.resolve().then(function(){return kalendarEvent});
    }
  },
  computed: {
    cell_events: function cell_events() {
      var all_events = [];

      if (this.completed_events) {
        all_events = all_events.concat(this.completed_events);
      }

      if (this.being_created) {
        all_events = all_events.concat(this.being_created);
      }

      return all_events;
    },
    completed_events: function completed_events() {
      return this.constructedEvents && this.constructedEvents.hasOwnProperty(this.cellData.value) && this.constructedEvents[this.cellData.value];
    },
    being_created: function being_created() {
      return this.temporaryEvent && this.temporaryEvent.start.value === this.cellData.value && this.temporaryEvent;
    },
    overlappingEvents: function overlappingEvents() {
      var _this = this;

      if (!this.constructedEvents || this.cell_events.length < 1) return [];
      return Object.values(this.constructedEvents).flat().filter(function (event) {
        var cellDate = new Date(_this.cellData.value);
        var eventStarts = new Date(event.start.value);
        var eventEnds = new Date(event.end.value);
        return eventStarts < cellDate && eventEnds > cellDate;
      });
    },
    overlapValue: function overlapValue() {
      var length = this.overlappingEvents.length;
      return length > 2 ? 2 : length;
    },
    selected: function selected() {
      return this.cell_events && this.cell_events.length > 0;
    },
    hasPopups: function hasPopups() {
      return this.selected && !!this.cell_events.find(function (ev) {
        return ev.status === 'popup-initiated';
      });
    }
  },
  methods: {
    mouseDown: function mouseDown() {
      // user mouse got depressed while outside kalendar-cells
      // came back in and clicked while the creator was on
      if (!!this.creator.creating) {
        this.mouseUp();
        return;
      }

      var _this$kalendar_option = this.kalendar_options,
          read_only = _this$kalendar_option.read_only,
          overlap = _this$kalendar_option.overlap,
          past_event_creation = _this$kalendar_option.past_event_creation;
      if (read_only) return; // if past_event_creation is set to false, check if cell value is
      // before current time

      if (past_event_creation === false) {
        var now = getLocaleTime(new Date());

        if (new Date(now) > new Date(this.cellData.value)) {
          this.mouseUp();
          return;
        }
      } // if overlap is set to false, prevent selection on top of
      // other events
      if (!overlap && this.cell_events.length > 0) return; // close any open popups in the whole kalendar instance
      // before starting a new one

      this.$kalendar.closePopups(); // create a payload consisting of
      // starting, current, ending and originalStarting cell
      // starting, current and ending are self explanatory
      // but originalStarting cell is required
      // to determine the direction of the scroll/drag

      var payload = {
        creating: true,
        original_starting_cell: cloneObject(this.cellData),
        starting_cell: cloneObject(this.cellData),
        current_cell: cloneObject(this.cellData),
        ending_cell: cloneObject(this.cellData)
      };
      this.$emit('select', payload);
    },
    mouseMove: function mouseMove() {
      // same guards like in the mouseDown function
      var _this$kalendar_option2 = this.kalendar_options,
          read_only = _this$kalendar_option2.read_only,
          overlap = _this$kalendar_option2.overlap;
      if (read_only) return;
      if (this.creator && !this.creator.creating) return;
      var _this$creator = this.creator,
          starting_cell = _this$creator.starting_cell,
          original_starting_cell = _this$creator.original_starting_cell,
          creating = _this$creator.creating; // direction of scroll

      var going_down = this.cellData.index >= starting_cell.index && starting_cell.index === original_starting_cell.index;

      if (creating) {
        var payload = _objectSpread2({}, this.creator, {
          current_cell: this.cellData,
          ending_cell: this.cellData,
          direction: going_down ? 'normal' : 'reverse'
        });

        this.$emit('select', payload);
      }
    },
    mouseUp: function mouseUp() {
      if (this.kalendar_options.read_only) return;

      if (this.creator.creating) {
        this.$emit('initiatePopup');
      }
    },
    resetCreator: function resetCreator() {
      this.$emit('reset');
    }
  }
};/* script */
var __vue_script__$3 = script$3;
/* template */

var __vue_render__$3 = function __vue_render__() {
  var _vm = this;

  var _h = _vm.$createElement;

  var _c = _vm._self._c || _h;

  return _vm.cellData.visible ? _c('li', {
    staticClass: "kalendar-cell",
    class: {
      selected: _vm.selected,
      'is-an-hour': (_vm.index + 1) % (60 / 10) === 0,
      'has-events': _vm.cell_events && _vm.cell_events.length > 0,
      'being-created': !!_vm.being_created || _vm.hasPopups
    },
    style: "\n  height: " + _vm.kalendar_options.cell_height + "px;\n",
    on: {
      "mouseover": function mouseover($event) {
        if ($event.target !== $event.currentTarget) {
          return null;
        }

        return _vm.mouseMove();
      },
      "mousedown": function mousedown($event) {
        if ($event.target !== $event.currentTarget) {
          return null;
        }

        return _vm.mouseDown();
      },
      "mouseup": function mouseup($event) {
        return _vm.mouseUp();
      }
    }
  }, _vm._l(_vm.cell_events, function (event, eventIndex) {
    return _vm.cell_events && _vm.cell_events.length ? _c('KalendarEvent', {
      key: eventIndex,
      style: "z-index: 10",
      attrs: {
        "event": event,
        "total": _vm.cell_events.length,
        "index": eventIndex,
        "overlaps": _vm.overlapValue
      }
    }) : _vm._e();
  }), 1) : _vm._e();
};

var __vue_staticRenderFns__$3 = [];
/* style */

var __vue_inject_styles__$3 = function __vue_inject_styles__(inject) {
  if (!inject) return;
  inject("data-v-bc1c5858_0", {
    source: "li{font-size:13px;position:relative}.created-events{height:100%}ul.building-blocks li{z-index:0;border-bottom:dotted 1px var(--odd-cell-border-color)}ul.building-blocks li.first_of_appointment{z-index:1;opacity:1}ul.building-blocks li.is-an-hour{border-bottom:solid 1px var(--table-cell-border-color)}ul.building-blocks li.has-events{z-index:unset}ul.building-blocks li.being-created{z-index:11}",
    map: undefined,
    media: undefined
  });
};
/* scoped */


var __vue_scope_id__$3 = undefined;
/* module identifier */

var __vue_module_identifier__$3 = undefined;
/* functional template */

var __vue_is_functional_template__$3 = false;
/* style inject SSR */

/* style inject shadow dom */

var __vue_component__$3 = normalizeComponent({
  render: __vue_render__$3,
  staticRenderFns: __vue_staticRenderFns__$3
}, __vue_inject_styles__$3, __vue_script__$3, __vue_scope_id__$3, __vue_is_functional_template__$3, __vue_module_identifier__$3, false, createInjector, undefined, undefined);var kalendarCell=/*#__PURE__*/Object.freeze({__proto__:null,'default': __vue_component__$3});//
var script$4 = {
  props: ['event', 'total', 'index', 'overlaps'],
  created: function created() {},
  inject: ['kalendar_options'],
  data: function data() {
    return {
      inspecting: false,
      editing: false
    };
  },
  computed: {
    isPast: function isPast() {
      var now = getLocaleTime(new Date().toISOString());
      return isBefore(this.event.start.value, now);
    },
    width_value: function width_value() {
      return "".concat(100 / this.total, "% - ").concat(this.overlaps * 50 / this.total, "px");
    },
    left_offset: function left_offset() {
      return "(".concat(this.index, " * (").concat(this.width_value, ")) + ").concat(this.overlaps * 50, "px");
    },
    top_offset: function top_offset() {
      return this.event.start.round_offset ? "".concat(this.event.start.round_offset, "px") : "0px";
    },
    distance: function distance() {
      if (!this.event) return;
      var multiplier = this.kalendar_options.cell_height / 10; // 0.5 * multiplier for an offset so next cell is easily selected

      return "".concat(this.event.distance * multiplier - 0.2 * multiplier, "px");
    },
    status: function status() {
      return this.event && this.event.status || this.editing;
    },
    information: function information() {
      var _this$event = this.event,
          start = _this$event.start,
          end = _this$event.end,
          data = _this$event.data,
          id = _this$event.id,
          key = _this$event.key;
      var payload = {
        start_time: addTimezoneInfo(start.value),
        end_time: addTimezoneInfo(end.value),
        kalendar_id: id,
        key: key,
        data: data
      };
      return payload;
    },
    editEvent: function editEvent() {
      this.$kalendar.closePopups();
      this.editing = true;
    },
    closeEventPopup: function closeEventPopup() {
      this.editing = false;
    }
  }
};/* script */
var __vue_script__$4 = script$4;
/* template */

var __vue_render__$4 = function __vue_render__() {
  var _vm = this;

  var _h = _vm.$createElement;

  var _c = _vm._self._c || _h;

  return _c('div', {
    ref: "kalendarEventRef-" + _vm.event.id,
    staticClass: "event-card",
    class: {
      'is-past': _vm.isPast,
      overlaps: _vm.overlaps > 0,
      'two-in-one': _vm.total > 1,
      inspecting: !!_vm.inspecting,
      'event-card__mini': _vm.event.distance <= 10,
      'event-card__small': _vm.event.distance > 10 && _vm.event.distance < 40 || _vm.overlaps > 1
    },
    style: "\n  height: " + _vm.distance + "; \n  width: calc(" + _vm.width_value + "); \n  left: calc(" + _vm.left_offset + ");\n  top: " + _vm.top_offset + ";\n",
    on: {
      "click": function click($event) {
        _vm.inspecting = true;
      },
      "mouseleave": function mouseleave($event) {
        _vm.inspecting = false;
      }
    }
  }, [_vm.status === 'creating' || _vm.status === 'popup-initiated' ? _c('portal-target', {
    attrs: {
      "slot-props": _vm.information,
      "name": "event-creation",
      "slim": ""
    }
  }) : _c('portal-target', {
    attrs: {
      "name": "event-details",
      "slot-props": _vm.information,
      "slim": ""
    }
  }), _vm._v(" "), _vm.status === 'popup-initiated' ? _c('div', {
    staticClass: "popup-wrapper"
  }, [_c('portal-target', {
    attrs: {
      "name": "event-popup-form",
      "slim": "",
      "slot-props": _vm.information
    }
  })], 1) : _vm._e()], 1);
};

var __vue_staticRenderFns__$4 = [];
/* style */

var __vue_inject_styles__$4 = function __vue_inject_styles__(inject) {
  if (!inject) return;
  inject("data-v-01cd5133_0", {
    source: ".event-card{display:flex;flex-direction:column;height:100%;width:100%;position:absolute;pointer-events:none;top:0;left:0;right:0;bottom:0;color:#fff;user-select:none;will-change:height}.event-card h4,.event-card p,.event-card span{margin:0}.event-card>*{flex:1;position:relative}.event-card.creating{z-index:-1}.event-card.overlaps>*{border:solid 1px #fff!important}.event-card.inspecting{z-index:11!important}.event-card.inspecting .created-event{box-shadow:0 6px 10px 0 rgba(0,0,0,.14),0 1px 18px 0 rgba(0,0,0,.12),0 3px 5px -1px rgba(0,0,0,.2);transition:opacity .1s linear}.event-card__mini .created-event>.details-card>*{display:none}.event-card__mini .appointment-title,.event-card__mini .time{display:block!important;position:absolute;top:0;font-size:9px;z-index:1;overflow:visible;height:100%}.event-card__small .appointment-title{font-size:80%}.event-card__small .time{font-size:70%}.event-card.two-in-one .details-card>*{font-size:60%}.event-card h1,.event-card h2,.event-card h3,.event-card h4,.event-card h5,.event-card h6,.event-card p{margin:0}.time{position:absolute;bottom:0;right:0;font-size:11px}.popup-wrapper{text-shadow:none;color:#000;z-index:10;position:absolute;top:0;left:calc(100% + 5px);display:flex;flex-direction:column;pointer-events:all;user-select:none;background-color:#fff;border:solid 1px rgba(0,0,0,.08);border-radius:4px;box-shadow:0 2px 12px -3px rgba(0,0,0,.3);padding:10px}.popup-wrapper h4{color:#000;font-weight:400}.popup-wrapper input,.popup-wrapper textarea{border:none;background-color:#ebebeb;color:#030303;border-radius:4px;padding:5px 8px;margin-bottom:5px}.created-event{pointer-events:all;position:relative}.created-event>.details-card{max-width:100%;width:100%;overflow:hidden;position:relative;white-space:nowrap;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical}.created-event>.details-card h2,.created-event>.details-card h3,.created-event>.details-card h4,.created-event>.details-card p,.created-event>.details-card small,.created-event>.details-card span,.created-event>.details-card strong,.created-event>.details-card>h1{text-overflow:ellipsis;overflow:hidden;display:block}ul:last-child .popup-wrapper{left:auto;right:100%;margin-right:10px}.day-view ul .popup-wrapper{left:auto;right:auto;width:calc(100% - 10px);top:10px}",
    map: undefined,
    media: undefined
  });
};
/* scoped */


var __vue_scope_id__$4 = undefined;
/* module identifier */

var __vue_module_identifier__$4 = undefined;
/* functional template */

var __vue_is_functional_template__$4 = false;
/* style inject SSR */

/* style inject shadow dom */

var __vue_component__$4 = normalizeComponent({
  render: __vue_render__$4,
  staticRenderFns: __vue_staticRenderFns__$4
}, __vue_inject_styles__$4, __vue_script__$4, __vue_scope_id__$4, __vue_is_functional_template__$4, __vue_module_identifier__$4, false, createInjector, undefined, undefined);var kalendarEvent=/*#__PURE__*/Object.freeze({__proto__:null,'default': __vue_component__$4});exports.Kalendar=__vue_component__;exports.default=plugin;