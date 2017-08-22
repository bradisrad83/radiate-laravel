void 0 === window.centovacast && (window.centovacast = {});
void 0 === window.centovacast.options && (window.centovacast.options = {});
void 0 === window.centovacast.loader && (window.centovacast.loader = {
    attempts: 0,
    external_jquery: !1,
    loaded: !1,
    ready: !1,
    widget_definitions: {},
    url: "",
    load_script: function(c) {
        var a = document.createElement("script");
        void 0 !== a && (a.setAttribute("type", "text/javascript"), a.setAttribute("src", c), void 0 !== a && document.getElementsByTagName("head")[0].appendChild(a))
    },
    load_widget: function(c) {
        c = this.widget_definitions[c];
        null === c.ref && (c.ref = c.define(jQuery))
    },
    jq_loaded: function() {
        this.external_jquery || jQuery.noConflict();
        jQuery.getJSONP = this.jq_get_jsonp;
        for (var c in this.widget_definitions) "string" === typeof c && this.load_widget(c);
        this.loaded = !0;
        var a = this;
        jQuery(document).ready(function() {
            a.ready = !0;
            for (var b in a.widget_definitions) "function" === typeof a.widget_definitions[b].init && a.widget_definitions[b].init(jQuery)
        })
    },
    check: function() {
        if ("undefined" === typeof jQuery) {
            var c = this;
            setTimeout(function() {
                c.check()
            }, 100);
            this.attempts++
        } else this.jq_loaded()
    },
    process_widget_element: function(c, a, b, e) {
        c = jQuery(c);
        var d = !1,
            f = {},
            h, g, k;
        for (k in a) a.hasOwnProperty(k) && (h = a[k], g = c.data(h), "undefined" !== typeof g ? (f[h] = g, d = !0) : f[h] = "");
        g = c.prop("id");
        if (d) f.type = c.data("type");
        else {
            if ("string" !== typeof g || g.substr(0, b.length + 1) !== b + "_") return null;
            f.fromid = !0;
            f.originalid = g;
            b = g.substr(b.length + 1);
            if (e) {
                e = /^([a-z0-9]+)_/;
                d = e.exec(b);
                if (!d) return null;
                f.type = d[1];
                b = b.replace(e, "")
            }
            var l = null;
            for (k in a) a.hasOwnProperty(k) && (h = a[k], null === l && (l = h), e = new RegExp("_" + k + "-([^_]+)"), d = e.exec(b)) && (f[h] = d[1], b = b.replace(e, ""));
            f[l] = b;
            "string" === typeof f.mount && (f.mount = f.mount.replace(/-/, "/"))
        }
        f.id = g;
        f.$el = c;
        return f
    },
    process_widget_elements: function(c, a, b, e) {
        var d = {},
            f = this;
        c.each(function() {
            var c = f.process_widget_element(this, a, b, e),
                g = "" + c.username + c.mount;
            d[g] || (d[g] = jQuery.extend({}, c), e && (d[g].type = void 0), d[g].hastype = e, d[g].$el = e ? {} : null);
            e ? d[g].$el[c.type] = d[g].$el[c.type] ? d[g].$el[c.type].add(c.$el[0]) : c.$el : d[g].$el = d[g].$el ? d[g].$el.add(c.$el[0]) : c.$el
        });
        return {
            widget_data: d,
            get: function(a) {
                return this.widget_data[a] ?
                    this.widget_data[a] : void 0
            },
            get_property: function(a, b) {
                return this.widget_data[a] && this.widget_data[a][b] ? this.widget_data[a][b] : void 0
            },
            get_element: function(a, b) {
                return this.widget_data[a] ? this.widget_data[a].hastype ? this.widget_data[a].$el[b] ? this.widget_data[a].$el[b] : jQuery() : this.widget_data[a].$el ? this.widget_data[a].$el : jQuery() : void 0
            },
            set_element: function(a, b, c) {
                this.widget_data[a].hastype ? b && b.length && (this.widget_data[a].$el[b] = c) : this.widget_data[a].$el = c
            },
            set_property: function(a, b, c) {
                if (!this.widget_data[a]) return !1;
                this.widget_data[a][b] = c;
                return !0
            },
            each: function(a) {
                for (var b in this.widget_data) "string" === typeof b && a(b, this.widget_data[b])
            },
            each_element: function(a, b) {
                if (this.widget_data[a].hastype)
                    for (var c in this.widget_data[a].$el) "string" !== typeof c && void 0 !== c || b(this.widget_data[a].$el[c], c);
                else b(this.widget_data[a].$el)
            }
        }
    },
    init: function() {
        var c = document.getElementsByTagName("script"),
            c = c[c.length - 1],
            c = void 0 !== c.getAttribute.length ? c.getAttribute("src") : c.getAttribute("src", 2);
        c.match(/^https?:\/\//i) ||
            (c = window.location.href);
        this.url = c.replace(/(\.(?:[a-z]{2,}|[0-9]+)(\:[0-9]+)?\/).*$/i, "$1");
        (this.external_jquery = "undefined" !== typeof jQuery) || this.load_script(this.url + "system/jquery.min.js");
        this.check()
    },
    add: function(c, a, b) {
        this.widget_definitions[c] || (this.widget_definitions[c] = {
            define: b,
            init: a,
            ref: null
        });
        this.loaded && this.load_widget(c);
        this.ready && a(jQuery)
    },
    jq_get_jsonp: function(c, a, b) {
        return jQuery.ajax({
            type: "GET",
            url: c,
            data: a,
            success: b,
            dataType: "jsonp"
        })
    }
}, window.centovacast.loader.init());
window.centovacast.loader.add("request", function(c) {
    window.centovacast.request.run()
}, function(c) {
    c("<link/>", {
        rel: "stylesheet",
        type: "text/css",
        href: window.centovacast.loader.url + "theme/widget_request.css"
    }).appendTo(c("body"));
    return window.centovacast.request = {
        settings: {},
        widgets: {},
        element_class: ".cc_request_form",
        get_form_fields: function(a) {
            var b = {},
                e = this.widgets.get(a),
                d = this.widgets.get_element(a, "button");
            if (!e) return !1;
            e.fromid ? (b.$rartist = c("#" + e.originalid.replace(/^cc_req_button_/, "cc_req_artist_")),
                b.$rtitle = c("#" + e.originalid.replace(/^cc_req_button_/, "cc_req_title_")), b.$remail = c("#" + e.originalid.replace(/^cc_req_button_/, "cc_req_email_")), b.$rsender = c("#" + e.originalid.replace(/^cc_req_button_/, "cc_req_sender_")), b.$rdedi = c("#" + e.originalid.replace(/^cc_req_button_/, "cc_req_dedi_"))) : (a = this.widgets.get_element(a, "form"), b.$rartist = a.find('*[name="request[artist]"]:first'), b.$rtitle = a.find('*[name="request[title]"]:first'), b.$remail = a.find('*[name="request[email]"]:first'), b.$rsender = a.find('*[name="request[sender]"]:first'),
                b.$rdedi = a.find('*[name="request[dedication]"]:first'));
            b.$rbtn = d;
            var d = {
                    artist: b.$rartist,
                    title: b.$rtitle,
                    email: b.$remail,
                    sender: b.$rsender
                },
                f;
            for (f in d)
                if (!d[f].length) return alert('bad request form; field with name="request[' + f + ']" is missing'), !1;
            return b
        },
        handle_json: function(a, b) {
            if (a) {
                var c = this.get_result_container(b),
                    d = !0;
                if ("error" === a.type) c.html("Temporarily unavailable");
                else {
                    var f = a.data[0],
                        d = a.data[1];
                    c.hide();
                    c.html(f)
                }
                c.fadeIn("fast");
                c = this.get_form_fields(b);
                d || (c.$rartist.val(""),
                    c.$rtitle.val(""), c.$remail.val(""), c.$rsender.val(""), c.$rdedi.val(""));
                c.$rbtn.prop("disabled", !1);
                this.hide_throbber(b)
            }
        },
        submit: function(a) {
            var b = this.widgets.get(a),
                e = this.get_form_fields(a),
                d = e.$rartist.val(),
                f = e.$rtitle.val(),
                h = e.$remail.val(),
                g = e.$rsender.val(),
                k = e.$rdedi.val();
            this.get_result_container(a).fadeOut("fast");
            if (2 > d.length) e.$rartist.css({
                backgroundColor: "#faa"
            }).focus().select();
            else if (1 > f.length) e.$rtitle.css({
                backgroundColor: "#faa"
            }).focus().select();
            else if (h.match(/^[\w\.%+\-]{1,64}@[A-Z0-9][A-Z0-9\.\-]{0,253}[A-Z0-9]\.[A-Z]{2,16}$/i)) {
                e.$rbtn.prop("disabled", !0);
                this.show_throbber(a);
                var l = this;
                c.getJSONP((this.settings.local ? "/" : window.centovacast.loader.url) + "external/rpc.php", {
                    m: "request.submit",
                    username: b.username,
                    charset: b.charset,
                    artist: d,
                    title: f,
                    sender: g,
                    email: h,
                    dedi: k,
                    rid: a
                }, function(b) {
                    b && l.handle_json(b, a)
                })
            } else e.$remail.css({
                backgroundColor: "#faa"
            }).focus().select()
        },
        create_throbber: function() {
            var a = c("<div/>", {
                "class": "cc_request_throbber",
                css: {
                    position: "absolute",
                    zIndex: 250,
                    textAlign: "center"
                },
                html: '<img src="' + window.centovacast.loader.url +
                    'system/images/ajax-loading.gif" align="absmiddle" /> &nbsp;Please wait...'
            });
            a.hide();
            a.appendTo(c("body"));
            return a
        },
        get_throbber: function(a) {
            var b = this.widgets.get_property(a, "throbber");
            b && b.length || (b = this.create_throbber(), this.widgets.set_property(a, "throbber", b));
            return b
        },
        show_throbber: function(a) {
            var b = this.get_throbber(a);
            b.css("visibility", "hidden");
            b.show();
            a = this.widgets.get_element(a, "form");
            var c = b.width();
            b.height();
            var d = a.offset(),
                f = a.width();
            a.height();
            b.css({
                left: d.left + Math.floor((f -
                    c) / 2) + "px",
                top: d.top + 50 + "px"
            });
            b.hide();
            b.css("visibility", "");
            b.fadeIn("fast")
        },
        hide_throbber: function(a) {
            this.get_throbber(a).hide()
        },
        get_result_container: function(a) {
            return this.widgets.get_element(a, "result")
        },
        init_form: function(a) {
            var b = this.widgets.get(a),
                e, d;
            if (b.fromid) {
                if (e = this.widgets.get_element(a, "button"), d = c("#" + b.originalid.replace(/^cc_req_button_/, "cc_req_result_")), b = e.parents("form:first"), !b.length) return alert("Bad request form; button and input fields are not enclosed in a <form> element"), !1
            } else {
                b = this.widgets.get_element(a, void 0);
                e = b.find('*[data-type="submit"]:first');
                d = b.find('*[data-type="result"]:first');
                if (!b.length || !e.length || !d.length) return alert("Bad request form; button, result, and input fields are not enclosed in a <form> element"), !1;
                this.widgets.set_element(a, "form", b);
                this.widgets.set_element(a, "button", e)
            }
            this.widgets.set_element(a, "form", b);
            this.widgets.set_element(a, "result", d);
            var f = this;
            e.click(function() {
                f.submit(a)
            })
        },
        init_all: function() {
            var a = this;
            this.widgets.each(function(b) {
                a.init_form(b)
            })
        },
        run: function() {
            this.widgets = window.centovacast.loader.process_widget_elements(c(this.element_class), {
                username: "username",
                cs: "charset",
                mp: "mount"
            }, "cc_req", !0);
            this.init_all()
        }
    }
});