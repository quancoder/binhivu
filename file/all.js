function loadScript(url, callback){

    var script = document.createElement("script")
    script.type = "text/javascript";

    if (script.readyState){  //IE
        script.onreadystatechange = function(){
            if (script.readyState == "loaded" ||
                script.readyState == "complete"){
                script.onreadystatechange = null;
                callback();
            }
        };
    } else {  //Others
        script.onload = function(){
            callback();
        };
    }

    script.src = url;
    document.getElementsByTagName("head")[0].appendChild(script);
}

if (jQuery !== undefined) {
    jQuery.getScript('https://www.googletagmanager.com/gtag/js?id=');
} else {
    loadScript('https://www.googletagmanager.com/gtag/js?id=', function() {});
}

window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', '');

if (location.href.includes('thankyou')) {
    if ( Bizweb.checkout.subtotal_price) {
        var price = Bizweb.checkout.subtotal_price;
        var currency = Bizweb.checkout.currency;
        var orderId = Bizweb.checkout.order_id;

        window.dataLayer = window.dataLayer || [];
        function gtag(){ dataLayer.push(arguments); }
        gtag('event', 'conversion', {
            'send_to': '',
            'value': price,
            'currency': currency,
            'transaction_id': orderId
        });
    }
}


//306071


var ServerLog = "https://stats.bizweb.vn/";
window.logging = {
    setCookie: function (name, value, expires, path, domain, secure) {
        var today = new Date();
        today.setTime(today.getTime());
        if (expires) {
            expires = expires * 1000 * 60 * 60 * 24;
        }
        var expires_date = new Date(today.getTime() + (expires));

        document.cookie = name + "=" + escape(value) + ((expires) ? ";expires=" + expires_date.toGMTString() : "") + ((path) ? ";path=" + path : "") + ((domain) ? ";domain=" + domain : "") + ((secure) ? ";secure" : "");
    },
    getCookie: function (name) {
        var start = document.cookie.indexOf(name + "=");
        var len = start + name.length + 1;
        if ((!start) && (name != document.cookie.substring(0, name.length))) {
            return null;
        }
        if (start == -1) return null;
        var end = document.cookie.indexOf(";", len);
        if (end == -1) end = document.cookie.length;
        return unescape(document.cookie.substring(len, end));
    }
};

function SiteStats(SiteID) {
    this.siteId = SiteID;
}

SiteStats.prototype.toHtml = function () {
    var html = this.getLink();
    return html;
}

SiteStats.prototype.getLink = function () {

    if (document.referrer == null || document.referrer == "") {

        var link = '<div style="display:none"><img src="' + ServerLog + "Delivery/Logging?SiteId=" + this.siteId + "&Url=" + document.URL + '&ReferenceUrl=Null"/></div>';
    }
    else {
        var link = '<div style="display:none"><img src="' + ServerLog + "Delivery/Logging?SiteId=" + this.siteId + "&Url=" + document.URL + "&ReferenceUrl=" + document.referrer + '"/></div>';
    }
    return link;
}

SiteStats.prototype.draw = function () {
    //this.bindCSS(this.css);
    var newStats = document.createElement("div");
    newStats.innerHTML = this.toHtml();
    document.body.appendChild(newStats);
}

function Statistic(b) {
    if (b) {
        var temp = {
            SiteId: parseInt(b.SiteId),
            Current: parseInt(b.Current),
            Today: parseInt(b.Today),
            Yesterday: parseInt(b.Yesterday),
            Total: parseInt(b.Total)
        };
        var property;
        for (property in b) this[property] = b[property];
    }
};

Statistic.prototype.toHtml = function () {

    var html = '<table class="UserOnlineTable"><tbody><tr id="showOnlineCurrent"><td class="showIconToday"></td>';
    html += '<td><span class="UserOnlineLabel">Đang trực tuyến: </span></td>';
    html += '<td><span style="font-weight:bold;" class="UserOnlineValue">' + this.Current + '</span></td></tr>';
    html += '<tr id="showOnlineToday"><td class="showIconYestoday"></td><td><span class="UserOnlineLabel">Hôm nay: </span></td>';
    html += '<td><span style="font-weight:bold;" class="UserOnlineValue">' + this.Today + '</span></td></tr>';
    html += '<tr id="showOnlineYesterday"><td class="showIconYestoday"></td><td><span class="UserOnlineLabel">Hôm qua: </span></td>';
    html += '<td><span style="font-weight:bold;" class="UserOnlineValue">' + this.Yesterday + '</span></td></tr>';
    html += '<tr id="showOnlineTotal"><td class="showIconVisitor"></td><td><span class="UserOnlineLabel">Tất cả: </span></td>';

    html += '<td><span style="font-weight:bold;" class="UserOnlineValue">' + this.Total + '</span></td></tr></tbody></table>';
    return html;
}

function Preview(statistic) {
    this.statistic = new Statistic(statistic);
}

Preview.prototype.toHtml = function () {
    //alert(JSON.stringify(this.statistic.Style));
    var html = this.statistic.toHtml();
    return html;
}

Preview.prototype.print = function () {
    //    <div id="ViewStats"></div>
    var viewStat = document.getElementById('ViewStats');
    if (viewStat != null) {
        viewStat.innerHTML = this.toHtml();
    }
    //document.write(this.toHtml());
}

function getTracking() {
    var siteStats = new SiteStats(306071);
    siteStats.draw();

}
var _admTrackingTime = 0;
function checkgetTracking() {

    if ((window.document.readyState == 'complete') || (typeof (window.document.readyState) == 'undefined')) {
        if (!_trackingSend) {
            _trackingSend = true;
            getTracking();
        }
    }
    else {
        _admTrackingTime++;
        if (_admTrackingTime == 5) {
            if (!_trackingSend) {
                _trackingSend = true;
                getTracking();
            }
            return false;
        }
        setTimeout("checkgetTracking()", 1000);
    }
}
if (typeof (_trackingSend) == 'undefined') {
    var _trackingSend = false;
}
checkgetTracking();

//script.js(1)
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id; js.type = 'text/javascript'; js.async = true;
    js.src = "https://bizwebform.sapoapps.vn/assets/js/script.js?v=637085889846371343";
    js.setAttribute("data-shop", "nghialavn.bizwebvietnam.net"); js.setAttribute("data-domain", "https://bizwebform.sapoapps.vn");
    fjs.parentNode.insertBefore(js, fjs.nextSibling);
}(document, 'script', 'bizweb-form-jssdk'));

//main
$(document).ready(function () {
    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    $("#datepicker").datepicker({
        dateFormat: 'dd-mm-yy',
        currentText: $.datepicker.formatDate('dd-mm-yy', new Date()),
        minDate: 0
    });
    $("#request_form form").on('submit', function (e) {
        var gender = $('select#gender').val(),
            yob = $('#yob').val(),
            bookdate = $('#datepicker').val(),
            chosen = $('#depart_chosen').val(),
            body = 'Giới tính: ' + gender + ' / Năm sinh: ' + yob + ' / Ngày hẹn khám: ' + bookdate + ' / Khoa: ' + chosen;
        $('#request_form [name="contact[body]"]').val(body);
        $('#request_form .ega-input-valid').each(function () {
            $(this).parent().removeClass('has-error');
            $(this).next().hide();
            if ($(this).val().length == 0) {
                $(this).parent().addClass('has-error');
                $(this).next().show();
                e.preventDefault();
            } else {
                if ($(this).attr('name') == 'contact[email]') {
                    if (!validateEmail($(this).val())) {
                        $(this).parent().addClass('has-error');
                        $(this).next().show();
                        e.preventDefault();
                    }
                }
            }
        })
    })

    window.NO_IMAGE = "//bizweb.dktcdn.net/100/306/071/themes/734876/assets/no-image-cart.jpg?1572658067805";
    //@todo : just load file
    if (window.location.href.toString().indexOf('account') > -1 || window.location.href.toString().indexOf('cart') > -1) {
        if ($(window).width() > 992) {
            if ($("body").height() < $(window).height()) {
                var height = $(window).height() - $("body").height();
                $("#main > main").css('padding-bottom', height);
            }
        }
    }

    $('#view-request, #request_form .close-button').click(function () {
        $('#request_form').toggleClass('open');
    })
})
