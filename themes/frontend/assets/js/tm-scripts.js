function include(scriptUrl) {
    document.write('<script src="' + scriptUrl + '"></script>');
}

function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
};

/* cookie.JS
 ========================================================*/
/*!
 * jQuery Cookie Plugin v1.4.0
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as anonymous module.
        define(['jquery'], factory);
    } else {
        // Browser globals.
        factory(jQuery);
    }
}(function ($) {

    var pluses = /\+/g;

    function encode(s) {
        return config.raw ? s : encodeURIComponent(s);
    }

    function decode(s) {
        return config.raw ? s : decodeURIComponent(s);
    }

    function stringifyCookieValue(value) {
        return encode(config.json ? JSON.stringify(value) : String(value));
    }

    function parseCookieValue(s) {
        if (s.indexOf('"') === 0) {
            // This is a quoted cookie as according to RFC2068, unescape...
            s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
        }

        try {
            // Replace server-side written pluses with spaces.
            // If we can't decode the cookie, ignore it, it's unusable.
            // If we can't parse the cookie, ignore it, it's unusable.
            s = decodeURIComponent(s.replace(pluses, ' '));
            return config.json ? JSON.parse(s) : s;
        } catch(e) {}
    }

    function read(s, converter) {
        var value = config.raw ? s : parseCookieValue(s);
        return $.isFunction(converter) ? converter(value) : value;
    }

    var config = $.cookie = function (key, value, options) {

        // Write

        if (value !== undefined && !$.isFunction(value)) {
            options = $.extend({}, config.defaults, options);

            if (typeof options.expires === 'number') {
                var days = options.expires, t = options.expires = new Date();
                t.setTime(+t + days * 864e+5);
            }

            return (document.cookie = [
                encode(key), '=', stringifyCookieValue(value),
                options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
                options.path    ? '; path=' + options.path : '',
                options.domain  ? '; domain=' + options.domain : '',
                options.secure  ? '; secure' : ''
            ].join(''));
        }

        // Read

        var result = key ? undefined : {};

        // To prevent the for loop in the first place assign an empty array
        // in case there are no cookies at all. Also prevents odd result when
        // calling $.cookie().
        var cookies = document.cookie ? document.cookie.split('; ') : [];

        for (var i = 0, l = cookies.length; i < l; i++) {
            var parts = cookies[i].split('=');
            var name = decode(parts.shift());
            var cookie = parts.join('=');

            if (key && key === name) {
                // If second argument (value) is a function it's a converter...
                result = read(cookie, value);
                break;
            }

            // Prevent storing a cookie that we couldn't decode.
            if (!key && (cookie = read(cookie)) !== undefined) {
                result[name] = cookie;
            }
        }

        return result;
    };

    config.defaults = {};

    $.removeCookie = function (key, options) {
        if ($.cookie(key) === undefined) {
            return false;
        }

        // Must not alter options, thus extending a fresh object...
        $.cookie(key, '', $.extend({}, options, { expires: -1 }));
        return !$.cookie(key);
    };

}));


/* Easing library
 ========================================================*/
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
    def: 'easeOutQuad',
    swing: function (x, t, b, c, d) {
        //alert(jQuery.easing.default);
        return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
    },
    easeInQuad: function (x, t, b, c, d) {
        return c*(t/=d)*t + b;
    },
    easeOutQuad: function (x, t, b, c, d) {
        return -c *(t/=d)*(t-2) + b;
    },
    easeInOutQuad: function (x, t, b, c, d) {
        if ((t/=d/2) < 1) return c/2*t*t + b;
        return -c/2 * ((--t)*(t-2) - 1) + b;
    },
    easeInCubic: function (x, t, b, c, d) {
        return c*(t/=d)*t*t + b;
    },
    easeOutCubic: function (x, t, b, c, d) {
        return c*((t=t/d-1)*t*t + 1) + b;
    },
    easeInOutCubic: function (x, t, b, c, d) {
        if ((t/=d/2) < 1) return c/2*t*t*t + b;
        return c/2*((t-=2)*t*t + 2) + b;
    },
    easeInQuart: function (x, t, b, c, d) {
        return c*(t/=d)*t*t*t + b;
    },
    easeOutQuart: function (x, t, b, c, d) {
        return -c * ((t=t/d-1)*t*t*t - 1) + b;
    },
    easeInOutQuart: function (x, t, b, c, d) {
        if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
        return -c/2 * ((t-=2)*t*t*t - 2) + b;
    },
    easeInQuint: function (x, t, b, c, d) {
        return c*(t/=d)*t*t*t*t + b;
    },
    easeOutQuint: function (x, t, b, c, d) {
        return c*((t=t/d-1)*t*t*t*t + 1) + b;
    },
    easeInOutQuint: function (x, t, b, c, d) {
        if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
        return c/2*((t-=2)*t*t*t*t + 2) + b;
    },
    easeInSine: function (x, t, b, c, d) {
        return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
    },
    easeOutSine: function (x, t, b, c, d) {
        return c * Math.sin(t/d * (Math.PI/2)) + b;
    },
    easeInOutSine: function (x, t, b, c, d) {
        return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
    },
    easeInExpo: function (x, t, b, c, d) {
        return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
    },
    easeOutExpo: function (x, t, b, c, d) {
        return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
    },
    easeInOutExpo: function (x, t, b, c, d) {
        if (t==0) return b;
        if (t==d) return b+c;
        if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
        return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
    },
    easeInCirc: function (x, t, b, c, d) {
        return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
    },
    easeOutCirc: function (x, t, b, c, d) {
        return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
    },
    easeInOutCirc: function (x, t, b, c, d) {
        if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
        return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
    },
    easeInElastic: function (x, t, b, c, d) {
        var s=1.70158;var p=0;var a=c;
        if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
        if (a < Math.abs(c)) { a=c; var s=p/4; }
        else var s = p/(2*Math.PI) * Math.asin (c/a);
        return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
    },
    easeOutElastic: function (x, t, b, c, d) {
        var s=1.70158;var p=0;var a=c;
        if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
        if (a < Math.abs(c)) { a=c; var s=p/4; }
        else var s = p/(2*Math.PI) * Math.asin (c/a);
        return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
    },
    easeInOutElastic: function (x, t, b, c, d) {
        var s=1.70158;var p=0;var a=c;
        if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
        if (a < Math.abs(c)) { a=c; var s=p/4; }
        else var s = p/(2*Math.PI) * Math.asin (c/a);
        if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
        return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
    },
    easeInBack: function (x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158;
        return c*(t/=d)*t*((s+1)*t - s) + b;
    },
    easeOutBack: function (x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158;
        return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
    },
    easeInOutBack: function (x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158; 
        if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
        return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
    },
    easeInBounce: function (x, t, b, c, d) {
        return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
    },
    easeOutBounce: function (x, t, b, c, d) {
        if ((t/=d) < (1/2.75)) {
            return c*(7.5625*t*t) + b;
        } else if (t < (2/2.75)) {
            return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
        } else if (t < (2.5/2.75)) {
            return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
        } else {
            return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
        }
    },
    easeInOutBounce: function (x, t, b, c, d) {
        if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
        return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
    }
});


/* Stick up menus
 ========================================================*/
;
(function ($) {
    var o = $('html');
    if (o.hasClass('desktop')) {
     (function($,undefined){
    var 
        def={
            stuckClass:'isStuck'            
        }
        ,doc=$(document),anim = false;

    $.fn.TMStickUp=function(opt){
        opt=$.extend(true,{},def,opt)

        $(this).each(function(){
            var $this=$(this)
                ,posY//=$this.offset().top+$this.outerHeight()
                ,isStuck=false
                ,clone=$this.clone().appendTo($this.parent()).addClass(opt.stuckClass)
                ,height//=$this.outerHeight()
                ,stuckedHeight=clone.outerHeight()
                ,opened//=$.cookie&&$.cookie('panel1')==='opened'
                ,tmr

            $(window).resize(function(){
                clearTimeout(tmr)               
                clone.css({top:isStuck?0:-stuckedHeight,visibility:isStuck?'visible':'hidden'})
                tmr=setTimeout(function(){
                    posY=$this.offset().top//+$this.outerHeight()               
                    height=$this.outerHeight()
                    stuckedHeight=clone.outerHeight()
                    opened=$.cookie&&$.cookie('panel1')==='opened'

                    clone.css({top:isStuck?0:-stuckedHeight})
                },40)
            }).resize()

            clone.css({
                position:'fixed'                
                ,width:'100%'
            })

            $this
                .on('rePosition',function(e,d){
                    if(isStuck)
                        clone.animate({marginTop:d},{easing:'linear'})
                    if(d===0)
                        opened=false
                    else
                        opened=true
                })
            
            doc
                .on('scroll',function(){
                    var scrollTop=doc.scrollTop()

                    if(scrollTop>=posY&&!isStuck){                      
                        clone
                            .stop()
                            .css({visibility:'visible'})
                            .animate({
                                top:0
                                ,marginTop:opened?50:0
                            },{

                            })
                            
                        isStuck=true
                    }
                    
                    if(scrollTop<posY+height&&isStuck){
                        if ($('.search-form-toggle').length > 0) {
                            var o_stuck = $('.search-form-toggle'),
                            f_stuck = $('.search-form');

                            if (!anim && o_stuck.hasClass('active')) {
                                anim = true;
                                o_stuck.removeClass('active');
                                f_stuck.slideUp(300, function () {
                                    setTimeout(function () {
                                        anim = false;
                                    }, 1000);
                                });
                            }
                        }

                        $('.sf-menu ul').css('display', 'none');

                        clone
                            .stop()
                            .animate({
                                top:-stuckedHeight
                                ,marginTop:0
                            },{
                                duration:200
                                ,complete:function(){
                                    clone.css({visibility:'hidden'})
                                }
                            });
                        
                        isStuck=false;

                    }           
                })              
                .trigger('scroll')
        })
    }
})(jQuery)


        $(document).ready(function () {
            $('#stuck_container').TMStickUp({})
        });
    }
})(jQuery);

/* ToTop
 ========================================================*/
;
(function ($) {
    var o = $('html');
    if (o.hasClass('desktop')) {
      (function($){
    $.fn.UItoTop = function(options) {

        var defaults = {
            text: '',
            min: 500,           
            scrollSpeed: 800,
            containerID: 'toTop',
            containerClass: 'toTop fa fa-chevron-up',
            easingType: 'linear'
                    
        };

        var settings = $.extend(defaults, options);
        var containerIDhash = '#' + settings.containerID;
        var containerHoverIDHash = '#'+settings.containerHoverID;
            
        $('body').append('<a href="#" id="'+settings.containerID+'" class="'+settings.containerClass+'" >'+settings.text+'</a>');       
        
        $(containerIDhash).hide().click(function(){         
            $('html, body').stop().animate({scrollTop:0}, settings.scrollSpeed, settings.easingType);
            $('#'+settings.containerHoverID, this).stop().animate({'opacity': 0 }, settings.inDelay, settings.easingType);
            return false;
        })
        
                                
        $(window).scroll(function() {
            var sd = $(window).scrollTop();
            if(typeof document.body.style.maxHeight === "undefined") {
                $(containerIDhash).css({
                    'position': 'absolute',
                    'top': $(window).scrollTop() + $(window).height() - 50
                });
            }
            if ( sd > settings.min ) 
                $(containerIDhash).stop(true,true).fadeIn(600);
            else 
                $(containerIDhash).fadeOut(800);
        });
};
})(jQuery);


        $(document).ready(function () {
            $().UItoTop({easingType: 'easeOutQuart'});
        });
    }
})(jQuery);

/* EqualHeights
 ========================================================*/
;
(function ($) {
    var o = $('[data-equal-group]');
    if (o.length > 0) {
        include('js/jquery.equalheights.js');
    }
})(jQuery);



/* Copyright Year
 ========================================================*/
;
(function ($) {
    var currentYear = (new Date).getFullYear();
    $(document).ready(function () {
        $("#copyright-year").text((new Date).getFullYear());
    });
})(jQuery);




;
(function ($) {
    function include(url) {
    document.write('<script src="js/' + url + '"></script>');
    return false;
}
  /*
 * jQuery Superfish Menu Plugin - v1.7.4
 * Copyright (c) 2013 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 *  http://www.opensource.org/licenses/mit-license.php
 *  http://www.gnu.org/licenses/gpl.html
 */

;(function ($) {
    "use strict";

    var methods = (function () {
        // private properties and methods go here
        var c = {
                bcClass: 'sf-breadcrumb',
                menuClass: 'sf-js-enabled',
                anchorClass: 'sf-with-ul',
                menuArrowClass: 'sf-arrows'
            },
            ios = (function () {
                var ios = /iPhone|iPad|iPod/i.test(navigator.userAgent);
                if (ios) {
                    // iOS clicks only bubble as far as body children
                    $(window).load(function () {
                        $('body').children().on('click', $.noop);
                    });
                }
                return ios;
            })(),
            wp7 = (function () {
                var style = document.documentElement.style;
                return ('behavior' in style && 'fill' in style && /iemobile/i.test(navigator.userAgent));
            })(),
            toggleMenuClasses = function ($menu, o) {
                var classes = c.menuClass;
                if (o.cssArrows) {
                    classes += ' ' + c.menuArrowClass;
                }
                $menu.toggleClass(classes);
            },
            setPathToCurrent = function ($menu, o) {
                return $menu.find('li.' + o.pathClass).slice(0, o.pathLevels)
                    .addClass(o.hoverClass + ' ' + c.bcClass)
                        .filter(function () {
                            return ($(this).children(o.popUpSelector).hide().show().length);
                        }).removeClass(o.pathClass);
            },
            toggleAnchorClass = function ($li) {
                $li.children('a').toggleClass(c.anchorClass);
            },
            toggleTouchAction = function ($menu) {
                var touchAction = $menu.css('ms-touch-action');
                touchAction = (touchAction === 'pan-y') ? 'auto' : 'pan-y';
                $menu.css('ms-touch-action', touchAction);
            },
            applyHandlers = function ($menu, o) {
                var targets = 'li:has(' + o.popUpSelector + ')';
                if ($.fn.hoverIntent && !o.disableHI) {
                    $menu.hoverIntent(over, out, targets);
                }
                else {
                    $menu
                        .on('mouseenter.superfish', targets, over)
                        .on('mouseleave.superfish', targets, out);
                }
                var touchevent = 'MSPointerDown.superfish';
                if (!ios) {
                    touchevent += ' touchend.superfish';
                }
                if (wp7) {
                    touchevent += ' mousedown.superfish';
                }
                $menu
                    .on('focusin.superfish', 'li', over)
                    .on('focusout.superfish', 'li', out)
                    .on(touchevent, 'a', o, touchHandler);
            },
            touchHandler = function (e) {
                var $this = $(this),
                    $ul = $this.siblings(e.data.popUpSelector);

                if ($ul.length > 0 && $ul.is(':hidden')) {
                    $this.one('click.superfish', false);
                    if (e.type === 'MSPointerDown') {
                        $this.trigger('focus');
                    } else {
                        $.proxy(over, $this.parent('li'))();
                    }
                }
            },
            over = function () {
                var $this = $(this),
                    o = getOptions($this);
                clearTimeout(o.sfTimer);
                $this.siblings().superfish('hide').end().superfish('show');
            },
            out = function () {
                var $this = $(this),
                    o = getOptions($this);
                if (ios) {
                    $.proxy(close, $this, o)();
                }
                else {
                    clearTimeout(o.sfTimer);
                    o.sfTimer = setTimeout($.proxy(close, $this, o), o.delay);
                }
            },
            close = function (o) {
                o.retainPath = ($.inArray(this[0], o.$path) > -1);
                this.superfish('hide');

                if (!this.parents('.' + o.hoverClass).length) {
                    o.onIdle.call(getMenu(this));
                    if (o.$path.length) {
                        $.proxy(over, o.$path)();
                    }
                }
            },
            getMenu = function ($el) {
                return $el.closest('.' + c.menuClass);
            },
            getOptions = function ($el) {
                return getMenu($el).data('sf-options');
            };

        return {
            // public methods
            hide: function (instant) {
                if (this.length) {
                    var $this = this,
                        o = getOptions($this);
                    if (!o) {
                        return this;
                    }
                    var not = (o.retainPath === true) ? o.$path : '',
                        $ul = $this.find('li.' + o.hoverClass).add(this).not(not).removeClass(o.hoverClass).children(o.popUpSelector),
                        speed = o.speedOut;

                    if (instant) {
                        $ul.show();
                        speed = 0;
                    }
                    o.retainPath = false;
                    o.onBeforeHide.call($ul);
                    $ul.stop(true, true).animate(o.animationOut, speed, function () {
                        var $this = $(this);
                        o.onHide.call($this);
                    });
                }
                return this;
            },
            show: function () {
                var o = getOptions(this);
                if (!o) {
                    return this;
                }
                var $this = this.addClass(o.hoverClass),
                    $ul = $this.children(o.popUpSelector);

                o.onBeforeShow.call($ul);
                $ul.stop(true, true).animate(o.animation, o.speed, function () {
                    o.onShow.call($ul);
                });
                return this;
            },
            destroy: function () {
                return this.each(function () {
                    var $this = $(this),
                        o = $this.data('sf-options'),
                        $hasPopUp;
                    if (!o) {
                        return false;
                    }
                    $hasPopUp = $this.find(o.popUpSelector).parent('li');
                    clearTimeout(o.sfTimer);
                    toggleMenuClasses($this, o);
                    toggleAnchorClass($hasPopUp);
                    toggleTouchAction($this);
                    // remove event handlers
                    $this.off('.superfish').off('.hoverIntent');
                    // clear animation's inline display style
                    $hasPopUp.children(o.popUpSelector).attr('style', function (i, style) {
                        return style.replace(/display[^;]+;?/g, '');
                    });
                    // reset 'current' path classes
                    o.$path.removeClass(o.hoverClass + ' ' + c.bcClass).addClass(o.pathClass);
                    $this.find('.' + o.hoverClass).removeClass(o.hoverClass);
                    o.onDestroy.call($this);
                    $this.removeData('sf-options');
                });
            },
            init: function (op) {
                return this.each(function () {
                    var $this = $(this);
                    if ($this.data('sf-options')) {
                        return false;
                    }
                    var o = $.extend({}, $.fn.superfish.defaults, op),
                        $hasPopUp = $this.find(o.popUpSelector).parent('li');
                    o.$path = setPathToCurrent($this, o);

                    $this.data('sf-options', o);

                    toggleMenuClasses($this, o);
                    toggleAnchorClass($hasPopUp);
                    toggleTouchAction($this);
                    applyHandlers($this, o);

                    $hasPopUp.not('.' + c.bcClass).superfish('hide', true);

                    o.onInit.call(this);
                });
            }
        };
    })();

    $.fn.superfish = function (method, args) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        }
        else if (typeof method === 'object' || ! method) {
            return methods.init.apply(this, arguments);
        }
        else {
            return $.error('Method ' +  method + ' does not exist on jQuery.fn.superfish');
        }
    };

    $.fn.superfish.defaults = {
        popUpSelector: 'ul,.sf-mega', // within menu context
        hoverClass: 'sfHover',
        pathClass: 'overrideThisToUse',
        pathLevels: 1,
        delay: 800,
        animation: {height: 'show'},
        animationOut: {height: 'hide'},
        speed: 'normal',
        speedOut: 'fast',
        cssArrows: true,
        disableHI: false,
        onInit: $.noop,
        onBeforeShow: $.noop,
        onShow: $.noop,
        onBeforeHide: $.noop,
        onHide: $.noop,
        onIdle: $.noop,
        onDestroy: $.noop
    };

    // soon to be deprecated
    $.fn.extend({
        hideSuperfishUl: methods.hide,
        showSuperfishUl: methods.show
    });

})(jQuery);


$(window).load(function(){
    $('.sf-menu').superfish()
})
    jQuery(function () {
})
})(jQuery);



/* Responsive Tabs
 ========================================================*/
;
(function ($) {
    var o = $('.resp-tabs');
    if (o.length > 0) {
        include('js/jquery.responsive.tabs.js');

        $(document).ready(function () {
            o.easyResponsiveTabs();
        });
    }
})(jQuery);



/* Navbar
 ========================================================*/
;
(function ($) {
  /*
 * Author: Evgeniy Gusarov StMechanus (Diversant)
 * Under the MIT License
 *
 * Version: 1.0.1
 *
 */


;
(function ($) {

    var settings = {
            cntClass: 'rd-mobilemenu',
            menuClass: 'rd-mobilemenu_ul',
            submenuClass: 'rd-mobilemenu_submenu',
            panelClass: 'rd-mobilepanel',
            toggleClass: 'rd-mobilepanel_toggle',
            titleClass: 'rd-mobilepanel_title'
        },
        lastY, dir;


    var RDMobileMenu = function (element, options) {
        this.options = options;

        this.$source = $(element);
    };

    RDMobileMenu.prototype = {
        init: function () {
            var nav = this;
            nav.createDOM();
            nav.createListeners();
        },

        createDOM: function () {
            var nav = this;

            $('body')
                .append($('<div/>', {
                    'class': settings.cntClass
                }).append(nav.createNavDOM()))
                .append($('<div/>', {
                    'class': settings.panelClass
                })
                    .append($('<button/>', {
                        'class': settings.toggleClass
                    }).append($('<span/>')))
                    .append($('<h2/>', {
                        'class': settings.titleClass                        
                    }).append($('[data-type="rd-navbar-brand"]').length? $('[data-type="rd-navbar-brand"]').html() : document.title))
                    );
        },

        createNavDOM: function () {
            var nav = this;

            var menu = $('<ul>', {'class': settings.menuClass});

            var li = nav.$source.children();
            for (var i = 0; i < li.length; i++) {
                var o = li[i].children,
                    item = null;
                for (var j = 0; j < o.length; j++) {
                    if (o[j].tagName) {
                        if (!item) {
                            item = document.createElement('li');
                            if (li[i].className.indexOf('active') > -1) {
                                item.className = 'active';
                            }
                        }

                        switch (o[j].tagName.toLowerCase()) {
                            case 'a':
                                var link = o[j].cloneNode(true);
                                item.appendChild(link);
                                break;
                            case 'ul':
                                var submenu = o[j].cloneNode(true);
                                submenu.className = settings.submenuClass;
                                $(submenu).css({"display": "none"});
                                item.appendChild(submenu);
                                $(item).find('> a')
                                    .each(function () {
                                        $this = $(this);
                                        $this.addClass('rd-with-ul')
                                            .append($('<span/>', {class: 'rd-submenu-toggle'}))
                                            .find('.rd-submenu-toggle')
                                            .on('click', function (e) {
                                                e.preventDefault();
                                                $this = $(this).parent();

                                                if ($this.hasClass('rd-with-ul') && !$this.hasClass('active')) {
                                                    $('.rd-with-ul').removeClass('active');
                                                    var submenu = $this.addClass('active').parent().find('.' + settings.submenuClass);
                                                    submenu.stop().slideDown();
                                                    $('.' + settings.submenuClass).not(submenu).stop().slideUp();
                                                } else {
                                                    var submenu = $this.removeClass('active').parent().find('.' + settings.submenuClass);
                                                    submenu.stop().slideUp();
                                                }
                                            });
                                    });

                                break;
                            default:
                                break;
                        }
                    }
                }

                if (item) {
                    menu.append(item);
                }
            }

            return menu;
        },

        createListeners: function () {
            var nav = this;

            nav.createToggleListener();
            nav.createResizeListener();
        },

        createToggleListener: function () {
            var nav = this,
                type;

            if (nav.isMobile()){
                type = 'touchstart';
            }else{
                type = 'click';
            }

            $('body').delegate('.' + settings.toggleClass, type, function () {
                var o = $('.' + settings.cntClass);
                $(this).toggleClass('active');

                if (o.hasClass('active')) {
                    $(this).removeClass('active');
                    o.removeClass('active');
                    $('body').undelegate('*', 'mousewheel', nav.scroll);
                    $('body').undelegate('*', 'touchmove', nav.scroll);
                    $('body').undelegate('*', 'touchend', nav.touchend);
                    $('body').undelegate('*', 'touchstart', nav.close);
                    $('body').undelegate('*:not(.' + settings.toggleClass + ' span)', 'click', nav.close);
                } else {
                    $(this).addClass('active');
                    o.addClass('active');
                    $('body').delegate('*', 'mousewheel', nav.scroll);
                    $('body').delegate('*', 'touchmove', nav.scroll);
                    $('body').delegate('*', 'touchend', nav.touchend);
                    $('body').delegate('*', 'touchstart', {type: type}, nav.close);
                    $('body').delegate('*:not(.' + settings.toggleClass + ' span)', 'click', {type: type}, nav.close);
                }
            });
        },

        createResizeListener: function () {
            var nav = this;

            $(window).on('resize', function () {
                var o = $('.' + settings.cntClass);

                if (o.css('display') == 'none') {
                    o.removeClass('active');
                    $('.' + settings.toggleClass).removeClass('active');
                    $('body').undelegate('*', 'mousewheel', nav.scroll);
                    $('body').undelegate('*', 'touchmove', nav.scroll);
                    $('body').undelegate('*', 'touchend', nav.touchend);
                    $('body').undelegate('*', 'touchstart', nav.close);
                    $('body').undelegate('*:not(.' + settings.toggleClass + ' span)', 'click', nav.close);
                }
            });
        },

        scroll: function (e) {
            e.preventDefault();
            var menu = $('.' + settings.menuClass);

            var x = e.originalEvent.targetTouches ? e.originalEvent.targetTouches[0].pageX : e.pageX,
                y = e.originalEvent.targetTouches ? e.originalEvent.targetTouches[0].pageY : e.pageY;

            if (
                y > menu.offset().top &&
                y < (menu.offset().top + menu.outerHeight()) &&
                x > menu.offset().left &&
                x < (menu.offset().left + menu.outerWidth())
            ) {
                var delta = 0;
                if (e.originalEvent.targetTouches) {
                    if (!lastY) lastY = y;
                    delta = (lastY - y);

                    lastY = y;
                    dir = delta > 0;

                } else {
                    delta = (e.originalEvent.wheelDelta || -e.originalEvent.detail) * (-50)
                }

                menu.stop().scrollTop(menu.scrollTop() + delta);
            }
            return false;
        },

        touchend: function (e) {
            var menu = $('.' + settings.menuClass);

            menu.stop().animate({
                scrollTop: menu.scrollTop() + (dir ? 100 : -100)
            }, 3000, 'easeOutQuint');
            lastY = undefined;
        },

        close: function (e) {
            if (!e.originalEvent) {
                return;
            }

            var menu = $('.' + settings.menuClass);
            var x = e.originalEvent.targetTouches ? e.originalEvent.targetTouches[0].pageX : e.pageX,
                y = e.originalEvent.targetTouches ? e.originalEvent.targetTouches[0].pageY : e.pageY;

            if (!(
                y > menu.offset().top &&
                y < (menu.offset().top + menu.outerHeight()) &&
                x > menu.offset().left &&
                x < (menu.offset().left + menu.outerWidth())
                )
            ) {
                $('.' + settings.toggleClass).trigger(e.data.type);
            }
        },

        isMobile: function () {
            return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        }
    };

    $.fn.rdparallax = function (option) {
        var o = this;
        if (o.length) {
            new RDMobileMenu(o[0]).init();
        }
        return o;
    };

    window.RDMobilemenu_autoinit = function (selector) {
        var o = $(selector);
        if (o.length) {
            new RDMobileMenu(o[0]).init();
        }
    };
})(jQuery);

$(document).ready(function () {
    RDMobilemenu_autoinit('[data-type="navbar"]');
});

})(jQuery);




/* JQuery UI Accordion
 ========================================================*/
;
(function ($) {
    var o = $('.accordion');
    if (o.length > 0) {
        include('js/jquery.ui.accordion.min.js');

        $(document).ready(function () {
            o.accordion({
                active: false,
                header: '.accordion_header',
                heightStyle: 'content',
                collapsible: true
            });
        });
    }
})(jQuery);


/* Google Map
 ========================================================*/
;
(function ($) {
    var o = document.getElementById("google-map");
    if (o) {
        include('//maps.google.com/maps/api/js?sensor=false');
        include('js/jquery.rd-google-map.js');

        $(document).ready(function () {
            var o = $('#google-map');
            if (o.length > 0) {
                o.googleMap({styles:[{
                    "featureType": "landscape",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 65
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                    {
                        "featureType": "poi",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 51
                            },
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 30
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 40
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.province",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "lightness": -25
                            },
                            {
                                "saturation": -100
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "hue": "#ffff00"
                            },
                            {
                                "lightness": -25
                            },
                            {
                                "saturation": -97
                            }
                        ]
                    }]});
            }
        });
    }
})
(jQuery);

/* Owl Carousel
========================================================*/
;(function ($) {
    var o = $('.owl-carousel');
    if (o.length > 0) {
        include('js/owl.carousel.min.js');
        $(document).ready(function () {
            o.owlCarousel({
                margin: 30,
                smartSpeed: 450,
                loop: true,
                dots: false,
                dotsEach: 1,
                nav: true,
                navClass: ['owl-prev fa fa-angle-left', 'owl-next fa fa-angle-right'],
                responsive: {
                    0: { items: 1 },
                    768: { items: 1},
                    980: { items: 1}
                }
            });
        });
    }
})(jQuery);


/* WOW
 ========================================================*/
;
(function ($) {
    var o = $('html');

    if ((navigator.userAgent.toLowerCase().indexOf('msie') == -1 ) || (isIE() && isIE() > 9)) {
        if (o.hasClass('desktop')) {
            (function() {
  var MutationObserver, Util, WeakMap,
    __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; },
    __indexOf = [].indexOf || function(item) { for (var i = 0, l = this.length; i < l; i++) { if (i in this && this[i] === item) return i; } return -1; };

  Util = (function() {
    function Util() {}

    Util.prototype.extend = function(custom, defaults) {
      var key, value;
      for (key in custom) {
        value = custom[key];
        if (value != null) {
          defaults[key] = value;
        }
      }
      return defaults;
    };

    Util.prototype.isMobile = function(agent) {
      return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(agent);
    };

    return Util;

  })();

  WeakMap = this.WeakMap || this.MozWeakMap || (WeakMap = (function() {
    function WeakMap() {
      this.keys = [];
      this.values = [];
    }

    WeakMap.prototype.get = function(key) {
      var i, item, _i, _len, _ref;
      _ref = this.keys;
      for (i = _i = 0, _len = _ref.length; _i < _len; i = ++_i) {
        item = _ref[i];
        if (item === key) {
          return this.values[i];
        }
      }
    };

    WeakMap.prototype.set = function(key, value) {
      var i, item, _i, _len, _ref;
      _ref = this.keys;
      for (i = _i = 0, _len = _ref.length; _i < _len; i = ++_i) {
        item = _ref[i];
        if (item === key) {
          this.values[i] = value;
          return;
        }
      }
      this.keys.push(key);
      return this.values.push(value);
    };

    return WeakMap;

  })());

  MutationObserver = this.MutationObserver || this.WebkitMutationObserver || this.MozMutationObserver || (MutationObserver = (function() {
    function MutationObserver() {
      console.warn('MutationObserver is not supported by your browser.');
      console.warn('WOW.js cannot detect dom mutations, please call .sync() after loading new content.');
    }

    MutationObserver.notSupported = true;

    MutationObserver.prototype.observe = function() {};

    return MutationObserver;

  })());

  this.WOW = (function() {
    WOW.prototype.defaults = {
      boxClass: 'wow',
      animateClass: 'animated',
      offset: 0,
      mobile: true,
      live: true
    };

    function WOW(options) {
      if (options == null) {
        options = {};
      }
      this.scrollCallback = __bind(this.scrollCallback, this);
      this.scrollHandler = __bind(this.scrollHandler, this);
      this.start = __bind(this.start, this);
      this.scrolled = true;
      this.config = this.util().extend(options, this.defaults);
      this.animationNameCache = new WeakMap();
    }

    WOW.prototype.init = function() {
      var _ref;
      this.element = window.document.documentElement;
      if ((_ref = document.readyState) === "interactive" || _ref === "complete") {
        this.start();
      } else {
        document.addEventListener('DOMContentLoaded', this.start);
      }
      return this.finished = [];
    };

    WOW.prototype.start = function() {
      var box, _i, _len, _ref;
      this.stopped = false;
      this.boxes = this.element.getElementsByClassName(this.config.boxClass);
      this.all = (function() {
        var _i, _len, _ref, _results;
        _ref = this.boxes;
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
          box = _ref[_i];
          _results.push(box);
        }
        return _results;
      }).call(this);
      if (this.boxes.length) {
        if (this.disabled()) {
          this.resetStyle();
        } else {
          _ref = this.boxes;
          for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            box = _ref[_i];
            this.applyStyle(box, true);
          }
          window.addEventListener('scroll', this.scrollHandler, false);
          window.addEventListener('resize', this.scrollHandler, false);
          this.interval = setInterval(this.scrollCallback, 50);
        }
      }
      if (this.config.live) {
        return new MutationObserver((function(_this) {
          return function(records) {
            var node, record, _j, _len1, _results;
            _results = [];
            for (_j = 0, _len1 = records.length; _j < _len1; _j++) {
              record = records[_j];
              _results.push((function() {
                var _k, _len2, _ref1, _results1;
                _ref1 = record.addedNodes || [];
                _results1 = [];
                for (_k = 0, _len2 = _ref1.length; _k < _len2; _k++) {
                  node = _ref1[_k];
                  _results1.push(this.doSync(node));
                }
                return _results1;
              }).call(_this));
            }
            return _results;
          };
        })(this)).observe(document.body, {
          childList: true,
          subtree: true
        });
      }
    };

    WOW.prototype.stop = function() {
      this.stopped = true;
      window.removeEventListener('scroll', this.scrollHandler, false);
      window.removeEventListener('resize', this.scrollHandler, false);
      if (this.interval != null) {
        return clearInterval(this.interval);
      }
    };

    WOW.prototype.sync = function(element) {
      if (MutationObserver.notSupported) {
        return this.doSync(this.element);
      }
    };

    WOW.prototype.doSync = function(element) {
      var box, _i, _len, _ref, _results;
      if (!this.stopped) {
        element || (element = this.element);
        element = element.parentNode || element;
        _ref = element.getElementsByClassName(this.config.boxClass);
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
          box = _ref[_i];
          if (__indexOf.call(this.all, box) < 0) {
            this.applyStyle(box, true);
            this.boxes.push(box);
            this.all.push(box);
            _results.push(this.scrolled = true);
          } else {
            _results.push(void 0);
          }
        }
        return _results;
      }
    };

    WOW.prototype.show = function(box) {
      this.applyStyle(box);
      return box.className = "" + box.className + " " + this.config.animateClass;
    };

    WOW.prototype.applyStyle = function(box, hidden) {
      var delay, duration, iteration;
      duration = box.getAttribute('data-wow-duration');
      delay = box.getAttribute('data-wow-delay');
      iteration = box.getAttribute('data-wow-iteration');
      return this.animate((function(_this) {
        return function() {
          return _this.customStyle(box, hidden, duration, delay, iteration);
        };
      })(this));
    };

    WOW.prototype.animate = (function() {
      if ('requestAnimationFrame' in window) {
        return function(callback) {
          return window.requestAnimationFrame(callback);
        };
      } else {
        return function(callback) {
          return callback();
        };
      }
    })();

    WOW.prototype.resetStyle = function() {
      var box, _i, _len, _ref, _results;
      _ref = this.boxes;
      _results = [];
      for (_i = 0, _len = _ref.length; _i < _len; _i++) {
        box = _ref[_i];
        _results.push(box.setAttribute('style', 'visibility: visible;'));
      }
      return _results;
    };

    WOW.prototype.customStyle = function(box, hidden, duration, delay, iteration) {
      if (hidden) {
        this.cacheAnimationName(box);
      }
      box.style.visibility = hidden ? 'hidden' : 'visible';
      if (duration) {
        this.vendorSet(box.style, {
          animationDuration: duration
        });
      }
      if (delay) {
        this.vendorSet(box.style, {
          animationDelay: delay
        });
      }
      if (iteration) {
        this.vendorSet(box.style, {
          animationIterationCount: iteration
        });
      }
      this.vendorSet(box.style, {
        animationName: hidden ? 'none' : this.cachedAnimationName(box)
      });
      return box;
    };

    WOW.prototype.vendors = ["moz", "webkit"];

    WOW.prototype.vendorSet = function(elem, properties) {
      var name, value, vendor, _results;
      _results = [];
      for (name in properties) {
        value = properties[name];
        elem["" + name] = value;
        _results.push((function() {
          var _i, _len, _ref, _results1;
          _ref = this.vendors;
          _results1 = [];
          for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            vendor = _ref[_i];
            _results1.push(elem["" + vendor + (name.charAt(0).toUpperCase()) + (name.substr(1))] = value);
          }
          return _results1;
        }).call(this));
      }
      return _results;
    };

    WOW.prototype.vendorCSS = function(elem, property) {
      var result, style, vendor, _i, _len, _ref;
      style = window.getComputedStyle(elem);
      result = style.getPropertyCSSValue(property);
      _ref = this.vendors;
      for (_i = 0, _len = _ref.length; _i < _len; _i++) {
        vendor = _ref[_i];
        result = result || style.getPropertyCSSValue("-" + vendor + "-" + property);
      }
      return result;
    };

    WOW.prototype.animationName = function(box) {
      var animationName;
      try {
        animationName = this.vendorCSS(box, 'animation-name').cssText;
      } catch (_error) {
        animationName = window.getComputedStyle(box).getPropertyValue('animation-name');
      }
      if (animationName === 'none') {
        return '';
      } else {
        return animationName;
      }
    };

    WOW.prototype.cacheAnimationName = function(box) {
      return this.animationNameCache.set(box, this.animationName(box));
    };

    WOW.prototype.cachedAnimationName = function(box) {
      return this.animationNameCache.get(box);
    };

    WOW.prototype.scrollHandler = function() {
      return this.scrolled = true;
    };

    WOW.prototype.scrollCallback = function() {
      var box;
      if (this.scrolled) {
        this.scrolled = false;
        this.boxes = (function() {
          var _i, _len, _ref, _results;
          _ref = this.boxes;
          _results = [];
          for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            box = _ref[_i];
            if (!(box)) {
              continue;
            }
            if (this.isVisible(box)) {
              this.show(box);
              continue;
            }
            _results.push(box);
          }
          return _results;
        }).call(this);
        if (!(this.boxes.length || this.config.live)) {
          return this.stop();
        }
      }
    };

    WOW.prototype.offsetTop = function(element) {
      var top;
      while (element.offsetTop === void 0) {
        element = element.parentNode;
      }
      top = element.offsetTop;
      while (element = element.offsetParent) {
        top += element.offsetTop;
      }
      return top;
    };

    WOW.prototype.isVisible = function(box) {
      var bottom, offset, top, viewBottom, viewTop;
      offset = box.getAttribute('data-wow-offset') || this.config.offset;
      viewTop = window.pageYOffset;
      viewBottom = viewTop + this.element.clientHeight - offset;
      top = this.offsetTop(box);
      bottom = top + box.clientHeight;
      return top <= viewBottom && bottom >= viewTop;
    };

    WOW.prototype.util = function() {
      return this._util || (this._util = new Util());
    };

    WOW.prototype.disabled = function() {
      return !this.config.mobile && this.util().isMobile(navigator.userAgent);
    };

    return WOW;

  })();

}).call(this);


            $(document).ready(function () {
                new WOW().init();
            });
        }
    }
})(jQuery);



/* Orientation tablet fix
 ========================================================*/
$(function () {
    // IPad/IPhone
    var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
        ua = navigator.userAgent,

        gestureStart = function () {
            viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";
        },

        scaleFix = function () {
            if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
                viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
                document.addEventListener("gesturestart", gestureStart, false);
            }
        };

    scaleFix();
    // Menu Android
    if (window.orientation != undefined) {
        var regM = /ipod|ipad|iphone/gi,
            result = ua.match(regM);
        if (!result) {
            $('.sf-menus li').each(function () {
                if ($(">ul", this)[0]) {
                    $(">a", this).toggle(
                        function () {
                            return false;
                        },
                        function () {
                            window.location.href = $(this).attr("href");
                        }
                    );
                }
            })
        }
    }
});
var ua = navigator.userAgent.toLocaleLowerCase(),
    regV = /ipod|ipad|iphone/gi,
    result = ua.match(regV),
    userScale = "";
if (!result) {
    userScale = ",user-scalable=0"
}
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0' + userScale + '">');

/* Camera
========================================================*/
;(function ($) {
var o = $('#camera');
    if (o.length > 0) {
        if (!(isIE() && (isIE() > 9))) {
            include('js/jquery.mobile.customized.min.js');
        }

        include('js/camera.js');

        $(document).ready(function () {
            o.camera({
                autoAdvance: false,
                height: '29.75609756097561%',
                minHeight: '350px',
                pagination: true,
                thumbnails: false,
                playPause: false,
                hover: false,
                loader: 'none',
                navigation: false,
                navigationHover: false,
                mobileNavHover: false,
                fx: 'simpleFade'
            })
        });
    }
})(jQuery);

/* Search.js
 ========================================================*/
;
(function ($) {
    var o = $('.search-form');
    if (o.length > 0) {
     ;
(function ($) {
    $.TMSearch = function (o) {
        var defaults = {
            form: '.search-form',
            input: '.search-form_input',
            toggle: '.search-form_toggle',
            liveout: '.search-form_liveout',
            out: '#search-results',
            scope: 1,

            handler: 'bat/SearchHandler.php'
        }

        var options = $.extend({}, defaults, o);

        var $form = $(options.form),
            $input = $(options.input, $form),
            $liveout = $(options.liveout, $form),
            $toggle = $(options.toggle),
            $out = $(options.out);

        // Search toggle
        if ($toggle.length > 0) {
            $toggle.click(function () {
                $form.toggleClass('on');
                if (!$toggle.hasClass('active')) {
                    $(this).parents().eq(options.scope).find(options.form).find('input').val('').focus();
                }
                $toggle.toggleClass('active');
                return false;
            });

            $(document).click(function (e) {
                if ($toggle.hasClass('active') && e.target.className.indexOf(options.form.substr(1, options.form.length - 1))) {
                    $toggle.removeClass('active');
                    $form.removeClass('on');
                }
            });
        }

        // Live Search
        if ($('html').hasClass('desktop')) {
            $input.on("keyup", function () {
                $.get(
                    options.handler,
                    {
                        s: $(this).val(),
                        liveSearch: "true",
                        dataType: "html"
                    },
                    onSuccess
                );
                function onSuccess(data) {
                    $liveout.html(data);
                }
            });

            $input.on('focusout', function () {
                setTimeout(function () {
                    $liveout.html('');
                }, 300);
            })
        }

        // Frame Search
        if ($out.length > 0) {
            $out.height(0);
            var s = location.search.replace(/^\?.*s=([^&]+)/, '$1'),
                ifr = $('<iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" allowTransparency="true"></iframe>')

            if ($out.length) {
                ifr.attr({src: options.handler + '?s=' + s}).appendTo($out), $input.val(decodeURI(s));
            }

            window._resize = function (h) {
                $out.height(h)
            }
        }
    }

})(jQuery);

$(document).ready(function () {
    $.TMSearch();
});

    }
})(jQuery);  





/* Contact Form
 ========================================================*/
;
(function ($) {
    var o = $('#contact-form');
    if (o.length > 0) {
        include('js/modal.js');
        include('js/TMForm.js'); 

        if($('#contact-form .recaptcha').length > 0){
            include('//www.google.com/recaptcha/api/js/recaptcha_ajax.js');
        }
    }
})(jQuery);





/* Facebook
========================================================*/

;(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

;(function ($) {
var o = $('.fb-page');

$(window).load(function () {
o.css({'display': 'block'})
.find('span').css({
'width': '100%',
'display': 'block',
'text-align': 'inherit'
})
.find('iframe').css({
'display': 'inline-block',
'position': 'static'
});
});

$(window).on('load resize', function () {
if (o.parent().width() < o.find('iframe').width()) {
o.find('iframe').css({
'transform': 'scale(' + (o.width() / o.find('iframe').width()) + ')',
'transform-origin': '0% 0%'
})
.parent().css({
'height': (o.find('iframe').height() * (o.width() / o.find('iframe').width())) + 'px'
});
} else {
o
.find('span').css({
'height': 'auto'
})
.find('iframe').css({
'transform': 'none'
});
}
});
})(jQuery);


/* FancyBox
========================================================*/
;(function ($) {
    var o = $('.thumb');
    if (o.length > 0) {
        include('js/jquery.fancybox.js');
        include('js/jquery.fancybox-media.js');
        include('js/jquery.fancybox-buttons.js');
        $(document).ready(function () {
            o.fancybox();
        });
    }
})(jQuery);

/* Parallax
=============================================*/
;(function ($) {
/*
 * Author: Evgeniy Gusarov StMechanus (Diversant)
 * Under the MIT License
 *
 * Version: 2.0.1
 *
 */


;
(function ($) {

    var RDParallax = function (element, options) {
        this.options = options;

        this.settings = {
            'imageClass': 'parallax_image',
            'patternClass': 'parallax_pattern',
            'contentClass': 'parallax_cnt',
            'wrapClass': 'parallax'
        }

        this.$wrap = $(element);

        this.$image = $.noop();
    };

    RDParallax.prototype = {
        init: function () {
            var parallax = this;
            parallax.isInit = true;
            parallax.createDOM();
            parallax.blur();
            parallax.createListeners();
        },

        createDOM: function () {
            var parallax = this;

            parallax
                .$wrap
                .addClass(parallax.settings.wrapClass)
                .wrapInner($('<div/>', {
                    'class': parallax.settings.contentClass
                }))
                .prepend($('<div/>', {
                    'class': (parallax.options.pattern ? parallax.settings.patternClass : parallax.settings.imageClass)
                }).css({
                    'background-image': 'url(' + parallax.options.url + ')',
                    'background-color': parallax.options.color
                }));

            parallax.$image = parallax.options.pattern ? parallax.$wrap.find('.' + parallax.settings.patternClass) : parallax.$wrap.find('.' + parallax.settings.imageClass);
        },

        createListeners: function () {
            this.createResizeListener();
            this.createScrollListener();
        },

        createScrollListener: function () {
            var parallax = this;

            if (parallax.isMobile()) {
                if (!parallax.options.mobile) {
                    return;
                }
            }

            $(window).bind('touchstart', function () {
                parallax.isTouched = true;
            });

            $(window).bind('touchend', function () {
                if(parallax.timer){
                    clearTimeout(parallax.timer);
                }

                parallax.timer = setTimeout(function () {
                    parallax.isTouched = false;
                }, 1200);
            });

            $(window).bind('scroll', function () {
                parallax.move();
            });
            parallax.move();
        },

        createResizeListener: function () {
            var parallax = this;

            if (parallax.isMobile()) {
                if (!parallax.options.mobile) {
                    return;
                }
            }

            if (!parallax.isMobile()) {
                $(window).bind('resize', function () {
                    parallax.resize();
                });
            }

            $(window).bind('orientationchange', function () {
                setTimeout(function () {
                    parallax.resize();
                }, 300);
            });

            parallax.resize();
        },

        move: function () {
            var parallax = this;

            if (!parallax.isVisible()) {
                return;
            }

            if (parallax.isMobile()) {
                if (!parallax.options.mobile) {
                    return;
                }
            }

            var st = $(window).scrollTop(),
                off = parallax.$wrap.offset().top,
                wh = $(window).height(),
                h = parallax.$wrap.outerHeight(),
                ph = parallax.$image.height();

            var speed = parallax.options.speed;
            if (speed < 0) {
                speed = 0;
            }
            if (speed > 1) {
                speed = 1;
            }

            var step = (st - (off - wh)) / ((off + h) - (off - wh)) * speed;


            if (parallax.options.direction == 'normal') {
                var pos = step * (h - ph);
            } else {
                var pos = (1 - step) * (h - ph);
            }

            if (parallax.isIE() && parallax.ieVersion() <= 10) {
                parallax.$image.css('top', '' + pos + 'px');
            }
            else if (parallax.isMobile() && parallax.options.mobile) {
                if (parallax.isTouched || parallax.isInit) {
                    parallax.$image.stop().animate({pos: pos}, {
                        step: function (pos) {
                            $(this).css('transform', 'translate3d(0, ' + pos + 'px, 0)');
                        },
                        duration: parallax.options.duration
                    }, parallax.options.easing);

                    parallax.isInit = false;
                }
            } else {
                parallax.$image.css('transform', 'translate3d(0, ' + pos + 'px, 0)');
            }

            if (parallax.isFirefox() && window.devicePixelRatio < 1){
                parallax.$image.css('background-color', '#010101');

                setTimeout(function () {
                    parallax.$image.css('background-color', parallax.options.color);
                }, 10);
            }
        },

        resize: function () {
            var parallax = this,
                h = Math.max($(window).height(), 500);

            if(h < parallax.$wrap.outerHeight()){
                h = parallax.$wrap.outerHeight() + $(window).height() * parallax.options.speed;
            }

            parallax.$image.height(h);

            setTimeout(function () {
                parallax.move();
                parallax.blur();
            }, 300);
        },

        blur: function () {
            var parallax = this;

            if (parallax.options.blur && !parallax.isIE() && !parallax.options.pattern) {

                $('<img/>', {src: parallax.options.url}).load(function () {
                    var dh = parallax.$image.height() / this.height,
                        dw = parallax.$image.width() / this.width,
                        blur = Math.floor(Math.max(dh, dw));


                    if (blur > 2) {
                        parallax.$image.css({
                            'filter': 'blur(' + blur + 'px)',
                            '-webkit-filter': 'blur(' + blur + 'px)'
                        });
                    } else {
                        parallax.$image.css({
                            'filter': 'blur(' + 0 + 'px)',
                            '-webkit-filter': 'blur(' + 0 + 'px)'
                        });
                    }
                });

            }
        },

        isVisible: function () {
            var parallax = this,

                windowScroll = $(window).scrollTop(),
                windowHeight = $(window).height(),
                parallaxOffset = parallax.$wrap.offset().top,
                parallaxHeight = parallax.$wrap.outerHeight();

            return (parallaxOffset + parallaxHeight >= windowScroll) && (parallaxOffset <= windowScroll + windowHeight)
        },

        isIE: function () {
            if (navigator.appVersion.indexOf("MSIE") != -1) {
                return true;
            }
            return false;
        },

        isMobile: function () {
            return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        },

        ieVersion: function () {
            return parseFloat(navigator.appVersion.split("MSIE")[1]);
        },

        isFirefox: function () {
            return typeof InstallTrigger !== 'undefined';   // Firefox 1.0+
        }
    };

    $.fn.rdparallax = function (option) {
        var element = this.each(function () {
            var options = $.extend({}, $.fn.rdparallax.defaults, option);

            if (options.url) {
                new RDParallax(this, options).init();
            } else {
                console.error('RD Parallax: data-url is not defined');
            }
        });
        return element;
    };

    $.fn.rdparallax.defaults = {
        speed: 0.4,
        direction: 'normal',
        blur: false,
        mobile: false,
        url: false,
        pattern: false,
        duration: 200,
        easing: 'linear',
        color: 'inherit'
    };

    window.RDParallax_autoinit = function (selector) {
        $(selector).each(function () {
            var options = $.extend({}, $.fn.rdparallax.defaults, {
                url: $(this).data('url'),
                speed: $(this).data('speed'),
                direction: $(this).data('direction'),
                blur: $(this).data('blur'),
                mobile: $(this).data('mobile'),
                pattern: $(this).data('pattern'),
                color: $(this).data('color')
            });

            if (options.url) {
                new RDParallax(this, options).init();
            } else {
                console.error('RD Parallax: data-url is not defined');
            }
        });
    };
})(jQuery);

$(document).ready(function () {
    RDParallax_autoinit('.parallax');
});

})(jQuery); 



