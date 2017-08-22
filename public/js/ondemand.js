void 0 === window.centovacast && (window.centovacast = {});
void 0 === window.centovacast.options && (window.centovacast.options = {});
void 0 === window.centovacast.loader && (window.centovacast.loader = {
    attempts: 0,
    external_jquery: !1,
    loaded: !1,
    ready: !1,
    widget_definitions: {},
    url: "",
    load_script: function(a) {
        var b = document.createElement("script");
        void 0 !== b && (b.setAttribute("type", "text/javascript"), b.setAttribute("src", a), void 0 !== b && document.getElementsByTagName("head")[0].appendChild(b))
    },
    load_widget: function(a) {
        a = this.widget_definitions[a];
        null === a.ref && (a.ref = a.define(jQuery))
    },
    jq_loaded: function() {
        this.external_jquery || jQuery.noConflict();
        jQuery.getJSONP = this.jq_get_jsonp;
        for (var a in this.widget_definitions) "string" === typeof a && this.load_widget(a);
        this.loaded = !0;
        var b = this;
        jQuery(document).ready(function() {
            b.ready = !0;
            for (var c in b.widget_definitions) "function" === typeof b.widget_definitions[c].init && b.widget_definitions[c].init(jQuery)
        })
    },
    check: function() {
        if ("undefined" === typeof jQuery) {
            var a = this;
            setTimeout(function() {
                a.check()
            }, 100);
            this.attempts++
        } else this.jq_loaded()
    },
    process_widget_element: function(a, b, c, d) {
        a = jQuery(a);
        var f = !1,
            g = {},
            e, k, l;
        for (l in b) b.hasOwnProperty(l) && (e = b[l], k = a.data(e), "undefined" !== typeof k ? (g[e] = k, f = !0) : g[e] = "");
        k = a.prop("id");
        if (f) g.type = a.data("type");
        else {
            if ("string" !== typeof k || k.substr(0, c.length + 1) !== c + "_") return null;
            g.fromid = !0;
            g.originalid = k;
            c = k.substr(c.length + 1);
            if (d) {
                d = /^([a-z0-9]+)_/;
                f = d.exec(c);
                if (!f) return null;
                g.type = f[1];
                c = c.replace(d, "")
            }
            var h = null;
            for (l in b) b.hasOwnProperty(l) && (e = b[l], null === h && (h = e), d = new RegExp("_" + l + "-([^_]+)"), f = d.exec(c)) && (g[e] = f[1], c = c.replace(d, ""));
            g[h] = c;
            "string" === typeof g.mount && (g.mount = g.mount.replace(/-/, "/"))
        }
        g.id = k;
        g.$el = a;
        return g
    },
    process_widget_elements: function(a, b, c, d) {
        var f = {},
            g = this;
        a.each(function() {
            var e = g.process_widget_element(this, b, c, d),
                a = "" + e.username + e.mount;
            f[a] || (f[a] = jQuery.extend({}, e), d && (f[a].type = void 0), f[a].hastype = d, f[a].$el = d ? {} : null);
            d ? f[a].$el[e.type] = f[a].$el[e.type] ? f[a].$el[e.type].add(e.$el[0]) : e.$el : f[a].$el = f[a].$el ? f[a].$el.add(e.$el[0]) : e.$el
        });
        return {
            widget_data: f,
            get: function(b) {
                return this.widget_data[b] ?
                    this.widget_data[b] : void 0
            },
            get_property: function(b, a) {
                return this.widget_data[b] && this.widget_data[b][a] ? this.widget_data[b][a] : void 0
            },
            get_element: function(b, a) {
                return this.widget_data[b] ? this.widget_data[b].hastype ? this.widget_data[b].$el[a] ? this.widget_data[b].$el[a] : jQuery() : this.widget_data[b].$el ? this.widget_data[b].$el : jQuery() : void 0
            },
            set_element: function(b, a, c) {
                this.widget_data[b].hastype ? a && a.length && (this.widget_data[b].$el[a] = c) : this.widget_data[b].$el = c
            },
            set_property: function(b, a, c) {
                if (!this.widget_data[b]) return !1;
                this.widget_data[b][a] = c;
                return !0
            },
            each: function(b) {
                for (var a in this.widget_data) "string" === typeof a && b(a, this.widget_data[a])
            },
            each_element: function(b, a) {
                if (this.widget_data[b].hastype)
                    for (var c in this.widget_data[b].$el) "string" !== typeof c && void 0 !== c || a(this.widget_data[b].$el[c], c);
                else a(this.widget_data[b].$el)
            }
        }
    },
    init: function() {
        var a = document.getElementsByTagName("script"),
            a = a[a.length - 1],
            a = void 0 !== a.getAttribute.length ? a.getAttribute("src") : a.getAttribute("src", 2);
        a.match(/^https?:\/\//i) ||
            (a = window.location.href);
        this.url = a.replace(/(\.(?:[a-z]{2,}|[0-9]+)(\:[0-9]+)?\/).*$/i, "$1");
        (this.external_jquery = "undefined" !== typeof jQuery) || this.load_script(this.url + "system/jquery.min.js");
        this.check()
    },
    add: function(a, b, c) {
        this.widget_definitions[a] || (this.widget_definitions[a] = {
            define: c,
            init: b,
            ref: null
        });
        this.loaded && this.load_widget(a);
        this.ready && b(jQuery)
    },
    jq_get_jsonp: function(a, b, c) {
        return jQuery.ajax({
            type: "GET",
            url: a,
            data: b,
            success: c,
            dataType: "jsonp"
        })
    }
}, window.centovacast.loader.init());
window.centovacast.loader.add("ondemand", function(a) {
    window.centovacast.ondemand.run()
}, function(a) {
    a("<link/>", {
        rel: "stylesheet",
        type: "text/css",
        href: window.centovacast.loader.url + "theme/widget_ondemand.css"
    }).appendTo(a("body"));
    return window.centovacast.ondemand = {
        settings: {},
        widgets: {},
        element_class: ".cc_ondemand_content",
        create_m3u: function(b) {
            var c = 0,
                d = "",
                f = this.widgets.get_element(b).children(".cc_ondemand_rowlist:first");
            a("input", f).each(function() {
                a(this).prop("checked") && (d += a(this).data("cctoken") +
                    "\n", c++)
            });
            if (!c) return alert(window.lang.no_items_selected), !1;
            b = this.widgets.get(b);
            b = a("<form>", {
                action: window.centovacast.loader.url + "external/rpc.php?m=ondemand.build_m3u&username=" + b.username,
                method: "post"
            }).hide();
            a("<textarea>", {
                name: "playlist"
            }).val(d).hide().appendTo(b);
            b.appendTo(a("body")).submit();
            return !1
        },
        create_m3u_click: null,
        resource_click: null,
        create_new: function(b, c, d, f, g) {
            var e = "other";
            0 < d.d ? e = "folder" : 0 < d.m && (e = "media");
            c = a("<div/>", {
                data: {
                    cctoken: d.t
                }
            });
            c.addClass("ccfilerow ccfiletype_" +
                e + " ccfilerow_" + (g ? "odd" : "even"));
            g = a("<input/>", {
                type: "checkbox",
                data: {
                    cctoken: d.t
                }
            });
            g.addClass("ccfilebox");
            g.appendTo(c);
            c.data("box", g);
            e = a("<div/>", {
                html: 0 < d.d ? "" : d.s
            });
            e.addClass("ccfilesize");
            e.appendTo(c);
            e = a("<div/>");
            e.addClass("ccfilename");
            a("<a/>", {
                html: d.n,
                data: {
                    ccwidgetid: b,
                    cctoken: d.t,
                    ccbox: g,
                    ccisdir: 0 < d.d
                },
                href: d.d ? "#" : f + d.u,
                click: d.d ? this.resource_click : null
            }).appendTo(e);
            e.appendTo(c);
            return c
        },
        add_next: function(b, c, d, f, g) {
            var e = this.widgets.get_element(b),
                k = e.children(".cc_ondemand_rowlist:first"),
                l = this,
                h = !1;
            if (h = d.length) {
                e = h;
                e > g + 25 && (e = g + 25);
                for (h = g; h < e; h++) k.append(this.create_new(b, c, d[h], d[h].d ? "" : f, h % 2));
                g = e;
                h = g >= d.length - 1
            } else e.html(window.lang.no_content), h = !0;
            h ? (e = a("<div/>"), e.addClass("ccfilem3u"), h = a("<a/>", {
                href: "#",
                html: window.lang.create_m3u,
                data: {
                    ccwidgetid: b
                }
            }), h.click(this.create_m3u_click), h.appendTo(e), k.append(e), k.fadeIn("fast", function() {
                l.hide_throbber(b)
            })) : setTimeout(function() {
                l.add_next(b, c, d, f, g)
            }, 150)
        },
        create_throbber: function() {
            var b = a("<div/>", {
                "class": "cc_ondemand_loading",
                css: {
                    position: "absolute",
                    opacity: .7,
                    zIndex: 250
                },
                html: '<img src="' + window.centovacast.loader.url + 'system/images/ajax-loading.gif" align="absmiddle" /> &nbsp;Please wait...'
            });
            b.hide();
            b.appendTo(a("body"));
            return b
        },
        get_throbber: function(b) {
            var a = this.widgets.get_property(b, "throbber");
            a && a.length || (a = this.create_throbber(), this.widgets.set_property(b, "throbber", a));
            return a
        },
        show_throbber: function(b) {
            var a = this.get_throbber(b);
            a.css("visibility", "hidden");
            a.show();
            b = this.widgets.get_element(b);
            var d =
                a.width();
            a.height();
            var f = b.offset(),
                g = b.width();
            b.height();
            a.css({
                left: f.left + Math.floor((g - d) / 2) + "px",
                top: f.top + 100 + "px"
            });
            a.hide();
            a.css("visibility", "");
            a.fadeIn("fast")
        },
        hide_throbber: function(b) {
            this.get_throbber(b).hide()
        },
        click: function(b) {
            b = a(b.target);
            if (b.length) {
                var c = b.data("ccwidgetid");
                if (c && this.widgets.get(c)) {
                    var d = b.data("cctoken");
                    if (d) {
                        var f = this;
                        setTimeout(function() {
                            f.get(c, d)
                        }, 10);
                        return !1
                    }
                }
            }
        },
        handle_json: function(b, c) {
            c || (c = b.rid);
            if (this.widgets.get(c)) {
                var d = this,
                    f = this.widgets.get_element(c),
                    g;
                f.data("initialized") ? g = f.children(".cc_ondemand_rowlist:first") : (f.empty(), f.data("initialized", !0), g = a("<div/>", {
                    "class": "cc_ondemand_rowlist"
                }), g.hide(), g.appendTo(f));
                if ("error" === b.type) g.html('<span title="' + (b ? b.error : "No JSON object") + '">Unavailable</span>'), g.show(), window.centovacast.ondemand.hide_throbber(c);
                else {
                    var e = b.data[0],
                        k = b.data[1],
                        f = b.data[2],
                        l = b.data[3],
                        h = b.data[4],
                        m = b.data[5],
                        n = b.data[6];
                    window.lang || (window.lang = {});
                    m.length && (window.lang.no_items_selected = m);
                    h.length && (window.lang.create_m3u =
                        h);
                    n.length && (window.lang.no_content = n);
                    this.widgets.set_property(c, "activepath", e);
                    this.widgets.set_property(c, "baseuri", f);
                    g.fadeOut("fast", function() {
                        g.empty();
                        d.add_next(c, e, k, l, 0)
                    })
                }
            }
        },
        get: function(b, c) {
            this.show_throbber(b);
            var d = this.widgets.get(b),
                f = this;
            a.getJSONP((this.settings.local ? "/" : window.centovacast.loader.url) + "external/rpc.php", {
                m: "ondemand.get",
                username: d.username,
                charset: d.charset,
                path: c,
                rid: b
            }, function(a) {
                a && f.handle_json(a, b)
            })
        },
        poll_all: function() {
            var b = this;
            this.widgets.each(function(a) {
                b.get(a,
                    "")
            })
        },
        run: function() {
            var b = this;
            this.create_m3u_click = function() {
                b.create_m3u(a(this).data("ccwidgetid"))
            };
            this.resource_click = function(a) {
                b.click(a)
            };
            this.widgets = window.centovacast.loader.process_widget_elements(a(this.element_class), {
                username: "username",
                cs: "charset",
                mp: "mount"
            }, "cc_ondemand", !1);
            this.poll_all()
        }
    }
});