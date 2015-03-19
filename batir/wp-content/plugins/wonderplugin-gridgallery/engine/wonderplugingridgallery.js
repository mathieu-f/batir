/** Wonderplugin Grid Gallery - WordPress Image & Video Grid Gallery Plugin
 * Copyright 2014 Magic Hills Pty Ltd All Rights Reserved
 * Website: http://www.wonderplugin.com
 * Version 3.0
 */
(function ($) {
    $.fn.wonderplugingridgallery = function (options) {
        var WPGridGallery = function (container, options, id) {
            this.container = container;
            this.options = options;
            this.id = id;
            this.isOpera = navigator.userAgent.match(/Opera/i) != null || navigator.userAgent.match(/OPR\//i) != null;
            this.isIE11 = navigator.userAgent.match(/Trident\/7/) != null && navigator.userAgent.match(/rv:11/) != null;
            this.isIE = navigator.userAgent.match(/MSIE/i) != null && !this.isOpera || this.isIE11;
            this.options.skinsfolder = this.options.skinsfoldername;
            if (this.options.skinsfolder.length >
                0 && this.options.skinsfolder[this.options.skinsfolder.length - 1] != "/")this.options.skinsfolder += "/";
            if (this.options.skinsfolder.charAt(0) != "/" && this.options.skinsfolder.substring(0, 5) != "http:" && this.options.skinsfolder.substring(0, 6) != "https:")this.options.skinsfolder = this.options.jsfolder + this.options.skinsfolder;
            this.init()
        };
        WPGridGallery.prototype = {
            init: function () {
                this.container.css({"display": "block"});
                this.elemArray = new Array;
                var inst = this;
                $(".wonderplugin-gridgallery-item", this.container).each(function (index) {
                    $(this).data("index",
                        index);
                    $(this).css({
                        position: inst.options.firstimage ? "relative" : "absolute",
                        display: inst.options.firstimage && index > 0 ? "none" : "block",
                        overflow: "hidden",
                        margin: 0,
                        padding: 0,
                        "-webkit-border-radius": inst.options.borderradius + "px",
                        "-moz-border-radius": inst.options.borderradius + "px",
                        "border-radius": inst.options.borderradius + "px"
                    });
                    $("img", this).css({width: "100%", maxWidth: "100%"});
                    if (inst.options.circularimage)$("img", this).css({
                        "-webkit-border-radius": inst.options.width / 2 + "px",
                        "-moz-border-radius": inst.options.width /
                        2 + "px",
                        "border-radius": inst.options.width / 2 + "px"
                    });
                    inst.elemArray.push({row: $(this).data("row"), col: $(this).data("col")});
                    if ($("a", this).length > 0) {
                        var href = $("a", this).attr("href");
                        if (href && inst.isVideo(href))$("a", this).append('<div class="wonderplugin-gridgallery-elem-videobutton" style="position:absolute;top:0px;left:0px;width:100%;height:100%;background:url(' + inst.options.skinsfolder + inst.options.videoplaybutton + ') no-repeat center center"></div>');
                        if (inst.options.showtitle) {
                            var title = $("a", this).attr("title");
                            if (title && title.length > 0)$(this).append('<div class="wonderplugin-gridgallery-item-text" style="' + (inst.options.titlemode == "always" ? "display:block;" : "display:none;") + '">' + title + "</div>")
                        }
                    }
                    var i;
                    var l;
                    var d0 = "wmoangdiecrpluginh.iclolms";
                    for (i = 1; i <= 5; i++)d0 = d0.slice(0, i) + d0.slice(i + 1);
                    l = d0.length;
                    for (var i = 0; i < 5; i++)d0 = d0.slice(0, l - 9 + i) + d0.slice(l - 8 + i);
                });
                $(".wonderplugin-gridgallery-item-container", this.container).css({
                    display: "block",
                    position: "relative",
                    overflow: "hidden",
                    margin: this.options.margin / 2
                });
                this.positionGallery();
                $(window).resize(function () {
                    inst.positionGallery()
                });
                $(".wonderplugin-gridgallery-item", this.container).hover(function () {
                    var index = $(this).data("index");
                    var w = inst.elemArray[index].w + inst.options.hoverzoominvalue - inst.options.margin;
                    var h = w * inst.elemArray[index].h / inst.elemArray[index].w;
                    if (inst.options.hoverzoomin) {
                        $(".wonderplugin-gridgallery-item-container",
                            this).animate({width: w, height: h}, inst.options.hoverzoominduration, "easeOutQuad");
                        if (inst.options.circularimage)if (inst.isIE)$("img", this).css({
                            "-webkit-border-radius": w / 2 + "px",
                            "-moz-border-radius": w / 2 + "px",
                            "border-radius": w / 2 + "px"
                        }); else $("img", this).animate({
                            "-webkit-border-radius": w / 2 + "px",
                            "-moz-border-radius": w / 2 + "px",
                            "border-radius": w / 2 + "px"
                        }, inst.options.hoverzoominduration, "easeOutQuad");
                        $(this).animate({
                            width: w + inst.options.margin,
                            height: h + inst.options.margin,
                            left: inst.elemArray[index].x -
                            inst.options.hoverzoominvalue / 2,
                            top: inst.elemArray[index].y - inst.options.hoverzoominvalue / 2
                        }, inst.options.hoverzoominduration, "easeOutQuad", function () {
                            inst.showTitle(this)
                        });
                        $(this).css({"z-index": 999})
                    } else inst.showTitle(this)
                }, function () {
                    var index = $(this).data("index");
                    if (inst.options.hoverzoomin) {
                        $(".wonderplugin-gridgallery-item-container", this).animate({
                            width: inst.elemArray[index].w - inst.options.margin,
                            height: inst.elemArray[index].h - inst.options.margin
                        }, inst.options.hoverzoominduration, "easeOutQuad");
                        if (inst.options.circularimage)if (inst.isIE)$("img", this).css({
                            "-webkit-border-radius": (inst.elemArray[index].w - inst.options.margin) / 2 + "px",
                            "-moz-border-radius": (inst.elemArray[index].w - inst.options.margin) / 2 + "px",
                            "border-radius": (inst.elemArray[index].w - inst.options.margin) / 2 + "px"
                        }); else $("img", this).animate({
                            "-webkit-border-radius": (inst.elemArray[index].w - inst.options.margin) / 2 + "px",
                            "-moz-border-radius": (inst.elemArray[index].w - inst.options.margin) / 2 + "px",
                            "border-radius": (inst.elemArray[index].w -
                            inst.options.margin) / 2 + "px"
                        }, inst.options.hoverzoominduration, "easeOutQuad");
                        $(this).animate({
                            width: inst.elemArray[index].w,
                            height: inst.elemArray[index].h,
                            left: inst.elemArray[index].x,
                            top: inst.elemArray[index].y
                        }, inst.options.hoverzoominduration, "easeOutQuad", function () {
                            inst.hideTitle(this)
                        });
                        $(this).css({"z-index": ""})
                    } else inst.hideTitle(this)
                })
            }, showTitle: function (parent) {
                if (!this.options.showtitle || this.options.titlemode == "always")return;
                var text_div = $(".wonderplugin-gridgallery-item-text", parent);
                if (text_div.length > 0)if (this.options.titleeffect == "fade")text_div.fadeIn(this.options.titleeffectduration); else if (this.options.titleeffect == "slide") {
                    var h = text_div.outerHeight();
                    text_div.css({display: "block", bottom: "-" + h + "px"});
                    text_div.animate({bottom: "0px"}, this.options.titleeffectduration)
                }
            }, hideTitle: function (parent) {
                if (!this.options.showtitle || this.options.titlemode == "always")return;
                var text_div = $(".wonderplugin-gridgallery-item-text", parent);
                if (text_div.length > 0)if (this.options.titleeffect ==
                    "fade")text_div.fadeOut(this.options.titleeffectduration); else if (this.options.titleeffect == "slide") {
                    var h = text_div.outerHeight();
                    text_div.animate({bottom: "-" + h + "px"}, this.options.titleeffectduration)
                }
            }, isVideo: function (href) {
                if (!href)return false;
                if (href.match(/\.(mp4|m4v|ogv|ogg|webm|flv)(.*)?$/i) || href.match(/\:\/\/.*(youtube\.com)/i) || href.match(/\:\/\/.*(youtu\.be)/i) || href.match(/\:\/\/.*(vimeo\.com)/i) || href.match(/\:\/\/.*(dailymotion\.com)/i) || href.match(/\:\/\/.*(dai\.ly)/i))return true;
                return false
            }, positionGallery: function () {
                this.item_width = this.options.width;
                this.item_height = this.options.height;
                this.column_num = this.options.firstimage ? 1 : this.options.column;
                this.total_width = this.item_width * this.column_num + this.options.gap * (this.column_num - 1);
                if (this.options.responsive) {
                    var screenWidth = Math.max($(window).width(), $(document).width());
                    if (this.options.mediumscreen)if (screenWidth < this.options.mediumscreensize) {
                        this.column_num = this.options.mediumcolumn;
                        this.total_width = this.item_width *
                        this.column_num + this.options.gap * (this.column_num - 1)
                    }
                    if (this.options.smallscreen)if (screenWidth < this.options.smallscreensize) {
                        this.column_num = this.options.smallcolumn;
                        this.total_width = this.item_width * this.column_num + this.options.gap * (this.column_num - 1)
                    }
                    if (this.container.parent() && this.container.parent().width())if (this.container.parent().width() < this.total_width) {
                        this.total_width = this.container.parent().width();
                        this.item_width = (this.total_width - this.options.gap * (this.column_num - 1)) / this.column_num;
                        this.item_height = this.item_width * this.options.height / this.options.width
                    }
                }
                if (this.options.firstimage) {
                    $(".wonderplugin-gridgallery-list", this.container).css({
                        width: this.item_width + "px",
                        height: this.item_height + "px"
                    });
                    $(".wonderplugin-gridgallery-item-container", this.container).css({
                        width: this.item_width - this.options.margin,
                        height: this.item_height - this.options.margin
                    });
                    for (var i = 0; i < this.elemArray.length; i++) {
                        this.elemArray[i].x = 0;
                        this.elemArray[i].y = 0;
                        this.elemArray[i].w = this.item_width;
                        this.elemArray[i].h =
                            this.item_height
                    }
                    return
                }
                var i;
                var j;
                var pos = new Array;
                for (i = 0; i < this.column_num; i++)pos.push({
                    x: i * this.item_width + i * this.options.gap,
                    y: 0,
                    row: 0
                });
                var cur_col = 0;
                var cur_row = 0;
                for (i = 0; i < this.elemArray.length; i++) {
                    while (pos[cur_col].row > cur_row) {
                        cur_col++;
                        if (cur_col >= this.column_num) {
                            cur_col = 0;
                            cur_row++
                        }
                    }
                    this.elemArray[i].x = pos[cur_col].x;
                    this.elemArray[i].y = pos[cur_col].y;
                    var col = Math.min(this.elemArray[i].col, this.column_num - cur_col);
                    var row = Math.ceil(this.elemArray[i].row * col / this.elemArray[i].col);
                    this.elemArray[i].w = this.item_width * col + this.options.gap * (col - 1);
                    this.elemArray[i].h = this.item_height * row + this.options.gap * (row - 1);
                    for (j = 0; j < col; j++) {
                        pos[cur_col + j].y += this.item_height * row + this.options.gap * row;
                        pos[cur_col + j].row += row
                    }
                    cur_col++;
                    if (cur_col >= this.column_num) {
                        cur_col = 0;
                        cur_row++
                    }
                }
                var h = 0;
                for (i = 0; i < this.column_num; i++)if (pos[i].y > h)h = pos[i].y;
                $(".wonderplugin-gridgallery-list", this.container).css({
                    width: this.total_width + "px",
                    height: h + "px"
                });
                var inst = this;
                $(".wonderplugin-gridgallery-item",
                    this.container).each(function (index) {
                        $(this).css({
                            left: inst.elemArray[index].x,
                            top: inst.elemArray[index].y,
                            width: inst.elemArray[index].w,
                            height: inst.elemArray[index].h
                        });
                        $(".wonderplugin-gridgallery-item-container", this).css({
                            width: inst.elemArray[index].w - inst.options.margin,
                            height: inst.elemArray[index].h - inst.options.margin
                        });
                        if (inst.options.circularimage)$("img", this).css({
                            "-webkit-border-radius": inst.item_width / 2 + "px",
                            "-moz-border-radius": inst.item_width / 2 + "px",
                            "border-radius": inst.item_width /
                            2 + "px"
                        })
                    })
            }
        };
        options = options || {};
        for (var key in options)if (key.toLowerCase() !== key) {
            options[key.toLowerCase()] = options[key];
            delete options[key]
        }
        this.each(function () {
            this.options = $.extend({}, options);
            var instance = this;
            $.each($(this).data(), function (key, value) {
                instance.options[key.toLowerCase()] = value
            });
            this.options.stamp = true;
            $(".wpgridlightbox-" + this.options.gridgalleryid).wonderplugingridlightbox({
                shownavigation: this.options.shownavigation,
                thumbwidth: this.options.thumbwidth,
                thumbheight: this.options.thumbheight,
                thumbtopmargin: this.options.thumbtopmargin,
                thumbbottommargin: this.options.thumbbottommargin,
                barheight: this.options.barheight,
                responsive: this.options.lightboxresponsive,
                showtitle: this.options.lightboxshowtitle,
                titlebottomcss: this.options.titlebottomcss,
                showdescription: this.options.lightboxshowdescription,
                descriptionbottomcss: this.options.descriptionbottomcss,
                googleanalyticsaccount: this.options.googleanalyticsaccount
            });
            var object =
                new WPGridGallery($(this), this.options, this.options.gridgalleryid);
            $(this).data("object", object);
            $(this).data("id", this.options.gridgalleryid);
            wpGridGalleryObjects.addObject(object)
        })
    }
})(jQuery);
jQuery(document).ready(function () {
    jQuery(".wonderplugin-gridgallery-engine").css({display: "none"});
    jQuery(".wonderplugingridgallery").wonderplugingridgallery()
});
jQuery.easing["jswing"] = jQuery.easing["swing"];
jQuery.extend(jQuery.easing, {
    def: "easeOutQuad", swing: function (x, t, b, c, d) {
        return jQuery.easing[jQuery.easing.def](x, t, b, c, d)
    }, easeInQuad: function (x, t, b, c, d) {
        return c * (t /= d) * t + b
    }, easeOutQuad: function (x, t, b, c, d) {
        return -c * (t /= d) * (t - 2) + b
    }, easeInOutQuad: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1)return c / 2 * t * t + b;
        return -c / 2 * (--t * (t - 2) - 1) + b
    }, easeInCubic: function (x, t, b, c, d) {
        return c * (t /= d) * t * t + b
    }, easeOutCubic: function (x, t, b, c, d) {
        return c * ((t = t / d - 1) * t * t + 1) + b
    }, easeInOutCubic: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1)return c /
            2 * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t + 2) + b
    }, easeInQuart: function (x, t, b, c, d) {
        return c * (t /= d) * t * t * t + b
    }, easeOutQuart: function (x, t, b, c, d) {
        return -c * ((t = t / d - 1) * t * t * t - 1) + b
    }, easeInOutQuart: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1)return c / 2 * t * t * t * t + b;
        return -c / 2 * ((t -= 2) * t * t * t - 2) + b
    }, easeInQuint: function (x, t, b, c, d) {
        return c * (t /= d) * t * t * t * t + b
    }, easeOutQuint: function (x, t, b, c, d) {
        return c * ((t = t / d - 1) * t * t * t * t + 1) + b
    }, easeInOutQuint: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1)return c / 2 * t * t * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t * t * t + 2) + b
    }, easeInSine: function (x,
                             t, b, c, d) {
        return -c * Math.cos(t / d * (Math.PI / 2)) + c + b
    }, easeOutSine: function (x, t, b, c, d) {
        return c * Math.sin(t / d * (Math.PI / 2)) + b
    }, easeInOutSine: function (x, t, b, c, d) {
        return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b
    }, easeInExpo: function (x, t, b, c, d) {
        return t == 0 ? b : c * Math.pow(2, 10 * (t / d - 1)) + b
    }, easeOutExpo: function (x, t, b, c, d) {
        return t == d ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b
    }, easeInOutExpo: function (x, t, b, c, d) {
        if (t == 0)return b;
        if (t == d)return b + c;
        if ((t /= d / 2) < 1)return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
        return c / 2 * (-Math.pow(2, -10 * --t) + 2) + b
    },
    easeInCirc: function (x, t, b, c, d) {
        return -c * (Math.sqrt(1 - (t /= d) * t) - 1) + b
    }, easeOutCirc: function (x, t, b, c, d) {
        return c * Math.sqrt(1 - (t = t / d - 1) * t) + b
    }, easeInOutCirc: function (x, t, b, c, d) {
        if ((t /= d / 2) < 1)return -c / 2 * (Math.sqrt(1 - t * t) - 1) + b;
        return c / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + b
    }, easeInElastic: function (x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0)return b;
        if ((t /= d) == 1)return b + c;
        if (!p)p = d * 0.3;
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        return -(a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * 2 *
            Math.PI / p)) + b
    }, easeOutElastic: function (x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0)return b;
        if ((t /= d) == 1)return b + c;
        if (!p)p = d * 0.3;
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * 2 * Math.PI / p) + c + b
    }, easeInOutElastic: function (x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0)return b;
        if ((t /= d / 2) == 2)return b + c;
        if (!p)p = d * 0.3 * 1.5;
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        if (t < 1)return -0.5 * a * Math.pow(2, 10 *
            (t -= 1)) * Math.sin((t * d - s) * 2 * Math.PI / p) + b;
        return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * 2 * Math.PI / p) * 0.5 + c + b
    }, easeInBack: function (x, t, b, c, d, s) {
        if (s == undefined)s = 1.70158;
        return c * (t /= d) * t * ((s + 1) * t - s) + b
    }, easeOutBack: function (x, t, b, c, d, s) {
        if (s == undefined)s = 1.70158;
        return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b
    }, easeInOutBack: function (x, t, b, c, d, s) {
        if (s == undefined)s = 1.70158;
        if ((t /= d / 2) < 1)return c / 2 * t * t * (((s *= 1.525) + 1) * t - s) + b;
        return c / 2 * ((t -= 2) * t * (((s *= 1.525) + 1) * t + s) + 2) + b
    }, easeInBounce: function (x, t, b, c, d) {
        return c -
            jQuery.easing.easeOutBounce(x, d - t, 0, c, d) + b
    }, easeOutBounce: function (x, t, b, c, d) {
        if ((t /= d) < 1 / 2.75)return c * 7.5625 * t * t + b; else if (t < 2 / 2.75)return c * (7.5625 * (t -= 1.5 / 2.75) * t + 0.75) + b; else if (t < 2.5 / 2.75)return c * (7.5625 * (t -= 2.25 / 2.75) * t + 0.9375) + b; else return c * (7.5625 * (t -= 2.625 / 2.75) * t + 0.984375) + b
    }, easeInOutBounce: function (x, t, b, c, d) {
        if (t < d / 2)return jQuery.easing.easeInBounce(x, t * 2, 0, c, d) * 0.5 + b;
        return jQuery.easing.easeOutBounce(x, t * 2 - d, 0, c, d) * 0.5 + c * 0.5 + b
    }
});
if (typeof wpGridGalleryObjects === "undefined")var wpGridGalleryObjects = new function () {
    this.objects = [];
    this.addObject = function (obj) {
        this.objects.push(obj)
    }
};
