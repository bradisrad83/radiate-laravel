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
            for (var a in b.widget_definitions) "function" === typeof b.widget_definitions[a].init && b.widget_definitions[a].init(jQuery)
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
    process_widget_element: function(a, b, e, d) {
        a = jQuery(a);
        var c = !1,
            f = {},
            h, g, l;
        for (l in b) b.hasOwnProperty(l) && (h = b[l], g = a.data(h), "undefined" !== typeof g ? (f[h] = g, c = !0) : f[h] = "");
        g = a.prop("id");
        if (c) f.type = a.data("type");
        else {
            if ("string" !== typeof g || g.substr(0, e.length + 1) !== e + "_") return null;
            f.fromid = !0;
            f.originalid = g;
            e = g.substr(e.length + 1);
            if (d) {
                d = /^([a-z0-9]+)_/;
                c = d.exec(e);
                if (!c) return null;
                f.type = c[1];
                e = e.replace(d, "")
            }
            var k = null;
            for (l in b) b.hasOwnProperty(l) && (h = b[l], null === k && (k = h), d = new RegExp("_" + l + "-([^_]+)"), c = d.exec(e)) && (f[h] = c[1], e = e.replace(d, ""));
            f[k] = e;
            "string" === typeof f.mount && (f.mount = f.mount.replace(/-/, "/"))
        }
        f.id = g;
        f.$el = a;
        return f
    },
    process_widget_elements: function(a, b, e, d) {
        var c = {},
            f = this;
        a.each(function() {
            var a = f.process_widget_element(this, b, e, d),
                g = "" + a.username + a.mount;
            c[g] || (c[g] = jQuery.extend({}, a), d && (c[g].type = void 0), c[g].hastype = d, c[g].$el = d ? {} : null);
            d ? c[g].$el[a.type] = c[g].$el[a.type] ? c[g].$el[a.type].add(a.$el[0]) : a.$el : c[g].$el = c[g].$el ? c[g].$el.add(a.$el[0]) : a.$el
        });
        return {
            widget_data: c,
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
        var a = document.getElementsByTagName("script"),
            a = a[a.length - 1],
            a = void 0 !== a.getAttribute.length ? a.getAttribute("src") : a.getAttribute("src", 2);
        a.match(/^https?:\/\//i) ||
            (a = window.location.href);
        this.url = a.replace(/(\.(?:[a-z]{2,}|[0-9]+)(\:[0-9]+)?\/).*$/i, "$1");
        (this.external_jquery = "undefined" !== typeof jQuery) || this.load_script(this.url + "system/jquery.min.js");
        this.check()
    },
    add: function(a, b, e) {
        this.widget_definitions[a] || (this.widget_definitions[a] = {
            define: e,
            init: b,
            ref: null
        });
        this.loaded && this.load_widget(a);
        this.ready && b(jQuery)
    },
    jq_get_jsonp: function(a, b, e) {
        return jQuery.ajax({
            type: "GET",
            url: a,
            data: b,
            success: e,
            dataType: "jsonp"
        })
    }
}, window.centovacast.loader.init());
window.centovacast.loader.add("player", function(a) {
    a.extend(!0, window.centovacast.player.settings, window.centovacast.options.player);
    window.centovacast.player.run()
}, function(a) {
    window.centovacast.options.player = a.extend(!0, {}, window.centovacast.options.player, window.centovacast.player ? window.centovacast.player.config : null);
    return window.centovacast.player = {
        pollcount: 0,
        settings: {
            muses: {}
        },
        widgets: {},
        element_class: ".cc_player",
        inspector: !1,
        debug: !1,
        dbg: function(a) {
            this.debug && console.log(a)
        },
        players: {
            muses: function(b,
                e) {
                var d = window.centovacast.player,
                    c = window.centovacast.player.settings.muses,
                    f = "string" === typeof e.skin ? e.skin.replace(/[^A-Za-z0-9_-]+/g, "") : "";
                f.length || (f = "mcclean");
                e.skin = f = b.url + "muses/muses-" + f + ".xml";
                d.dbg("streaminfo:");
                d.dbg(b);
                var h = d.restricted_extend({
                    url: d.get_tunein_url(b),
                    lang: "auto",
                    codec: b.tuneinformat,
                    volume: 75,
                    tracking: !1,
                    skin: b.url + "muses/muses-" + f + ".xml",
                    title: b.title,
                    jsevents: !1,
                    welcome: "",
                    introurl: "",
                    autoplay: !1,
                    buffering: 5
                }, c);
                d.restricted_extend(h, e, !0);
                f = window.centovacast.player.build_query(h, !0);
                d.dbg("flashvars:");
                d.dbg(h);
                c = d.restricted_extend({
                    swfurl: b.url + "muses/muses.swf",
                    width: 180,
                    height: 60,
                    bgcolor: "#FFFFFF",
                    wmode: "window",
                    scale: "noscale",
                    allowscriptaccess: "always"
                }, c);
                d.dbg("extending:");
                d.dbg(c);
                d.dbg("with:");
                d.dbg(e);
                d.restricted_extend(c, e, !0);
                d.dbg("params:");
                d.dbg(c);
                return a("<object/>", {
                    width: c.width,
                    height: c.height,
                    bgcolor: c.bgcolor
                }).append(a("<param/>", {
                    name: "movie",
                    value: c.swfurl
                })).append(a("<param/>", {
                    name: "flashvars",
                    value: f
                })).append(a("<param/>", {
                    name: "wmode",
                    value: c.wmode
                })).append(a("<param/>", {
                    name: "scale",
                    value: c.scale
                })).append(a("<param/>", {
                    name: "allowScriptAccess",
                    value: c.allowscriptaccess
                })).append(a("<embed/>", {
                    src: c.swfurl,
                    flashvars: f,
                    width: c.width,
                    height: c.height,
                    scale: c.scale,
                    wmode: c.wmode,
                    bgcolor: c.bgcolor,
                    type: "application/x-shockwave-flash",
                    allowscriptaccess: c.allowscriptaccess
                }))
            },
            jplayer: function(b, e) {
                var d = e.skin;
                d && d.length || (d = "blue.monday");
                "custom" !== e.skin && a("body").append(a("<link/>", {
                    rel: "stylesheet",
                    type: "text/css",
                    href: b.url +
                        "jplayer/skin/" + d + "/css/jplayer." + d + ".css"
                }));
                var c = window.centovacast.player,
                    f = a("<div />", {
                        "class": "jp-info-bar"
                    });
                window.centovacast.next_unique_id = window.centovacast.next_unique_id ? window.centovacast.next_unique_id + 1 : 1;
                var h = window.centovacast.next_unique_id,
                    g = a("<div />", {
                        "class": "jp-controls"
                    }).append(a("<button/>", {
                        "class": "jp-play",
                        role: "button",
                        tabindex: 0
                    }).text("play")),
                    l = a("<div />", {
                        "class": "jp-volume-controls"
                    }).append(a("<button/>", {
                        "class": "jp-mute",
                        role: "button",
                        tabindex: 0
                    }).text("mute")).append(a("<button/>", {
                        "class": "jp-volume-max",
                        role: "button",
                        tabindex: 0
                    }).text("max volume")).append(a("<div/>", {
                        "class": "jp-volume-bar"
                    }).append(a("<div/>", {
                        "class": "jp-volume-bar-value"
                    }))),
                    d = e.controlorder && "volume,playback" === e.controlorder || 0 <= d.indexOf("pink.flag") ? [l, g] : [g, l],
                    k = a("<div />", {
                        id: "cc_jplayer_" + h,
                        "class": "jp-jplayer"
                    });
                a("<div />", {
                    "class": "jp-controls"
                }).append(a("<button/>", {
                    "class": "jp-play",
                    role: "button",
                    tabindex: 0
                }).text("play"));
                a("<div />", {
                    "class": "jp-volume-controls"
                }).append(a("<button/>", {
                    "class": "jp-mute",
                    role: "button",
                    tabindex: 0
                }).text("mute")).append(a("<button/>", {
                    "class": "jp-volume-max",
                    role: "button",
                    tabindex: 0
                }).text("max volume")).append(a("<div/>", {
                    "class": "jp-volume-bar"
                }).append(a("<div/>", {
                    "class": "jp-volume-bar-value"
                })));
                var q = a("<div />", {
                        id: "cc_jp_container_" + h,
                        "class": "jp-audio-stream",
                        role: "application",
                        "aria-label": "media player"
                    }).append(a("<div />", {
                        "class": "jp-type-single"
                    }).append(a("<div />", {
                        "class": "jp-gui jp-interface"
                    }).append(d[0]).append(d[1])).append(a("<div />", {
                        "class": "jp-details"
                    }).append(a("<div/>", {
                        "class": "jp-title",
                        "aria-label": "title"
                    }).html("&nbsp;"))).append(a("<div />", {
                        "class": "jp-no-solution"
                    }).text("To play the media you will need to either update your browser to a recent version or update your Flash plugin."))).append(f),
                    h = a("<div />").append(k).append(q),
                    p;
                c.inspector && (p = a("<div>").appendTo(h));
                var m = b.tuneinformat;
                switch (m) {
                    case "aac":
                        m = "m4a";
                        break;
                    case "ogg":
                        m = "oga"
                }
                var n = {
                    title: b.title
                };
                n[m] = c.get_tunein_url(b);
                d = [b.url + "/jplayer/jplayer/jquery.jplayer.js"];
                c.inspector && d.push(b.url + "/jplayer/add-on/jquery.jplayer.inspector.min.js");
                c.load_scripts({
                    scripts: d,
                    success: function() {
                        var c = !1,
                            d = 0;
                        k.jPlayer({
                            ready: function() {
                                c = !0;
                                k.jPlayer("setMedia", n);
                                e.autoplay && k.jPlayer("play")
                            },
                            playing: function() {
                                d = 0;
                                f.text("")
                            },
                            pause: function() {
                                k.jPlayer("clearMedia");
                                k.jPlayer("setMedia", n)
                            },
                            play: function() {
                                f.text("Loading ...")
                            },
                            stalled: function() {
                                f.text("Load stalled")
                            },
                            error: function(b) {
                                alert("Error: " + b.jPlayer.error.message + " " + b.jPlayer.error.hint + " (" + b.jPlayer.error.type +
                                    " context " + b.jPlayer.error.context + ") " + (b.jPlayer.error.type === a.jPlayer.error.URL_NOT_SET ? "Y" : "N"));
                                c && b.jPlayer.error.type === a.jPlayer.error.URL && 5 > d ? (d++, setTimeout(function() {
                                    k.jPlayer("setMedia", n).jPlayer("play")
                                }, 1E3)) : c && b.jPlayer.error.type === a.jPlayer.error.URL_NOT_SET ? k.jPlayer("setMedia", n).jPlayer("play") : (d = 0, f.text("Error: " + b.jPlayer.error.message + " " + b.jPlayer.error.hint + " (" + b.jPlayer.error.type + " context " + b.jPlayer.error.context + ") " + (b.jPlayer.error.type === a.jPlayer.error.URL_NOT_SET ?
                                    "Y" : "N")))
                            },
                            swfPath: b.url + "/jplayer/",
                            supplied: m,
                            cssSelectorAncestor: "#" + q.attr("id"),
                            preload: "none",
                            wmode: "window",
                            useStateClassSkin: !0,
                            autoBlur: !1,
                            keyEnabled: !0
                        });
                        p && p.length && p.jPlayerInspector({
                            jPlayer: k
                        })
                    },
                    error: function(a) {
                        alert("Failed to load required scripts: " + a)
                    }
                });
                return h
            },
            wmp: function(b, e) {
                var d = window.centovacast.player,
                    c = window.centovacast.player.settings.wmp,
                    f = d.restricted_extend({
                        classid: "clsid:6BF52A52-394A-11D3-B153-00C04F79FAA6",
                        width: 320,
                        height: 68
                    }, c);
                d.restricted_extend(f, e);
                var h = d.restricted_extend({
                    type: "application/x-mplayer2",
                    pluginspage: "http://www.microsoft.com/Windows/Downloads/Contents/MediaPlayer/",
                    width: 320,
                    height: 68,
                    src: b.tuneinurl,
                    filename: b.tuneinurl,
                    autostart: 0,
                    showcontrols: 1,
                    showstatusbar: 1,
                    showdisplay: 1
                }, c);
                d.restricted_extend(h, e);
                c = d.restricted_extend({
                    url: b.tuneinurl,
                    autostart: 0,
                    showcontrols: 1,
                    showstatusbar: 1,
                    showdisplay: 1,
                    stretchtofit: 1
                }, c);
                d.restricted_extend(c, e);
                var d = a("<object/>", f),
                    g;
                for (g in c) c.hasOwnProperty(g) && a("<param/>", {
                    name: g,
                    value: c[g]
                }).appendTo(d);
                d.append(a("<embed/>", h));
                return d
            }
        },
        load_scripts: function(b) {
            var e = b.scripts.length,
                d = b.success,
                c = function() {
                    e--;
                    0 >= e && d && d.apply(this)
                },
                f;
            for (f = 0; f < e; f++) a.ajax({
                dataType: "script",
                cache: !0,
                url: b.scripts[f],
                success: c,
                error: b.error
            })
        },
        build_query: function(a, e) {
            var d, c, f = "";
            for (d in a) a.hasOwnProperty(d) && (c = a[d], e && "boolean" === typeof c && (c = c ? "true" : "false"), f += (f.length ? "&" : "") + encodeURIComponent(d) + "=" + encodeURIComponent(c));
            return f
        },
        get_tunein_url: function(a) {
            if ("ShoutCast" === a.servertype) {
                var e =
                    a.proxytuneinurl;
                e && e.length || (e = a.tuneinurl);
                return e + ";stream/1"
            }
            return a.tuneinurl
        },
        restricted_extend: function(a, e, d) {
            if ("object" !== typeof e || "object" !== typeof a) return a;
            for (var c in a) a.hasOwnProperty(c) && e.hasOwnProperty(c) && (!d || null !== e[c] && ("string" !== typeof e[c] || 0 < e[c].length)) && (a[c] = e[c]);
            return a
        },
        generate_player: function(a, e) {
            var d = this.widgets.get(a),
                c = this.widgets.get_element(a),
                f = e.webplayer;
            f || (f = "muses");
            f = f.replace(/sc1$/, "");
            this.dbg("generate " + f + " player for " + a);
            this.players[f] ?
                (d = (0, this.players[f])(e, d), c.empty().append(d)) : this.player_error(a, "Unavailable", "Unrecognized player type: " + f)
        },
        show_loading: function(a) {
            this.dbg("player for " + a + " is now loading ...")
        },
        clear_loading: function(a) {
            this.dbg("player for " + a + " is no longer loading")
        },
        player_error: function(a, e, d) {
            this.dbg("player error for " + a + ": " + e + "; " + d);
            this.widgets.get_element(a).html('<span title="' + d + '">' + e + "</span>");
            if ("function" === typeof this.settings.on_error_callback) this.settings.on_error_callback(d)
        },
        handle_json: function(a, e) {
            e || (e = a.rid);
            this.widgets.get(e) && ("error" === a.type ? this.player_error(e, "Unavailable", a ? a.error : "No JSON object") : this.generate_player(e, a.data[0]))
        },
        initialize: function(b) {
            var e = this.widgets.get(b);
            if (e) {
                this.dbg("initializing " + b);
                this.show_loading(b);
                var d = this;
                a.getJSONP((this.settings.local ? "/" : window.centovacast.loader.url) + "external/rpc.php", {
                    m: "streaminfo.get",
                    username: e.username,
                    charset: e.charset,
                    mountpoint: e.mount,
                    rid: b
                }, function(a) {
                    a && d.handle_json(a, b)
                })
            }
        },
        initialize_all: function() {
            var a =
                this;
            this.widgets.each(function(e) {
                a.initialize(e)
            })
        },
        run: function() {
            this.widgets = window.centovacast.loader.process_widget_elements(a(this.element_class), {
                username: "username",
                skin: "skin",
                cs: "charset",
                mp: "mount",
                width: "width",
                height: "height",
                autoplay: "autoplay",
                controlorder: "controlorder"
            }, "cc_player", !1);
            this.initialize_all()
        }
    }
});