/*! mousestop - v3.0.1 - 2013-07-15 */ ! function(a) {
    function b() {
        var b = this,
            c = a(this).data("mousestop");
        this.movement = !0, c.timeToStop && (this.timeToStopTimer = window.setTimeout(function() { b.movement = !1, window.clearTimeout(b.timer) }, c.timeToStop))
    }

    function c() { window.clearTimeout(this.timer), window.clearTimeout(this.timeToStopTimer) }

    function d() {
        var b = a(this),
            c = b.data("mousestop");
        this.movement && (window.clearTimeout(this.timer), this.timer = window.setTimeout(function() { b.trigger("mousestop") }, c.delay))
    }

    function e(b) { return a.isNumeric(b) ? b = { delay: b } : "object" != typeof b && (b = {}), a.extend({}, a.fn.mousestop.defaults, b) }
    a.event.special.mousestop = { setup: function(f) { a(this).data("mousestop", e(f)).bind("mouseenter.mousestop", b).bind("mouseleave.mousestop", c).bind("mousemove.mousestop", d) }, teardown: function() { a(this).removeData("mousestop").unbind(".mousestop") } }, a.fn.mousestop = function(a, b) { return "function" == typeof a && (b = a), arguments.length > 0 ? this.bind("mousestop", a, b) : this.trigger("mousestop") }, a.fn.mousestop.defaults = { delay: 300, timeToStop: null }
}(jQuery);