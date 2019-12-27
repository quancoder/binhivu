// JavaScript Document
function selectText(containerid) {
     if (document.selection) {
         var range = document.body.createTextRange();
         range.moveToElementText(document.getElementById(containerid));
         range.select();
     } else if (window.getSelection) {
         var range = document.createRange();
         range.selectNode(document.getElementById(containerid));
         window.getSelection().addRange(range);
     }
}

function getAjax(url, params, method, onSuccess, dataType, onError, onComplete)
{
	method = (typeof(method) == 'undefined' || method == '' || (method.toUpperCase() != 'POST' && method.toUpperCase() != 'GET') ) ? 'GET' : method.toUpperCase();
	dataType = (typeof(dataType) == 'undefined' || dataType == '') ? 'html' : dataType;

	if(typeof(onSuccess) == 'undefined' || onSuccess == '')
	{
		var _onSucess = function(data)
		{
		};
	}
	else
	{
		var _onSucess = onSuccess;
    }

	if(typeof(onComplete) == 'undefined' || onComplete == '')
	{
		var _onComplete = function(jqXHR, textStatus){
            
		};
	}
	else
	{
		var _onComplete = onComplete;
	}
	
	if(typeof(onError) == 'undefined' || onError == '')
	{
		var _onError = function(jqXHR, textStatus, errorThrown){
		};
	}
	else
	{
		var _onError = onError;
	}

	$.ajax({
		   		type: method,
				url: url,
				dataType: dataType,
				data: params,
				success: _onSucess,
				error: _onError,
				complete: _onComplete,
				cache: false
			 });
}

function getQueryParam(paramName) {
	var strQuery = window.location.search.substring(1);
	var arrParam = strQuery.split("&");
	for (i=0;i<arrParam.length;i++)
	{
		var paramItem = arrParam[i].split("=");
		if (paramItem[0] == paramName)
		{
			return paramItem[1];
		}
	}
	return '';
}


function getAllUrlQueryParam(url)
{
	/*
	get all url string query param. return an object
	*/
	var queryString = '';
	if(url.indexOf('?') != -1)
	{
		queryString = url.substring( url.indexOf('?') + 1 );
	}
	var params = {}, queries, temp, i, l;

 	if(queryString != '')
	{
		// Split into key/value pairs
		queries = queryString.split("&");
		// Convert the array of strings into an object
		for ( i = 0, l = queries.length; i < l; i++ ) {
			temp = queries[i].split('=');
			var tmp_len = temp.length;
			if(tmp_len == 1)
			{
				params[temp[0]] = '';
			}
			else if(tmp_len == 2)
			{
				params[temp[0]] = temp[1];
			}
			else
			{
				params[temp[0]] = temp[1];
				for(var m = 2; m < tmp_len; m++)
				{
					params[temp[0]] += '=' + temp[m];
				}
			}
		}
	}
    return params;
}


function isIntNumber(sText)
{
   var ValidChars = "0123456789";
   var IsNumber=true;
   var Char;
   for (i = 0; i < sText.length; i++)
   {
      Char = sText.charAt(i);
      if (ValidChars.indexOf(Char) == -1 || sText.charAt(0) == "0")
      {
         IsNumber = false;
         break;
      }
   }
   return IsNumber;
}

function checkPhoneNumber(phone) {
    var flag = false;
    phone = phone.replace('(+84)', '0');
    phone = phone.replace('+84', '0');
    phone = phone.replace('0084', '0');
    if (phone != '') {
        var firstNumber = phone.substring(0, 1);
        if (phone.length == 10 && firstNumber == 0) {
            if (phone.match(/^\d{10}/)) {
                flag = true;
            }
        }
    }
    return flag;
}

function isValidDate(dateString)
{
    // First check for the pattern
    if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
        return false;

    // Parse the date parts to integers
    var parts = dateString.split("/");
    var month = parseInt(parts[1], 10);
    var day = parseInt(parts[0], 10);
    var year = parseInt(parts[2], 10);

    var d = new Date();
    var yearnow = d.getFullYear();

    // Check the ranges of month and year
    if(year < 1000 || year >= yearnow || month == 0 || month > 12)
        return false;

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
};

function strIsNumber(sText)
{
	var ValidChars = "0123456789";
	var IsNumber=true;
	var Char;
	for (i = 0; i < sText.length; i++)
	{
		Char = sText.charAt(i);
		if (ValidChars.indexOf(Char) == -1)
		{
			IsNumber = false;
			break;
		}
	}
	return IsNumber;
}

function getNumberFromStr(sText)
{
	var ValidChars = "0123456789";
	var relNumber='';
	var Char;
	for (i = 0; i < sText.length; i++)
	{
		Char = sText.charAt(i);
		if (ValidChars.indexOf(Char) != -1)
		{
			relNumber += Char;
		}
	}
	return relNumber;
}

// arrAllowType:  array('.jpg', '.gif', '.png')
function uploadValidExtension(fileName, arrAllowType)
{
    if(fileName == "")
    {
        return false;
    }
    fileName = fileName.toLowerCase();
    var extension     = fileName.substr(fileName.lastIndexOf('.'), fileName.length);
    var check = false;
    for(var i in arrAllowType)
    {
        if(arrAllowType[i] == extension)
        {
            check = true;
            break;
        }
    }
    return check;
}// JavaScript Document

function isUrl(urlStr) {
    if (urlStr == '' || urlStr == null) {
        return false;
    }

	// check white space in domain
	if(urlStr.indexOf('?') != -1)
	{
		var tmpArrDomain = urlStr.split('?');
		var tmpDomain = tmpArrDomain[0].toLowerCase();
		if (tmpDomain.indexOf(' ') != -1)
		{
	       return false;
	    }
	}

   	var RegexUrl=/(https|http):\/\/([a-z0-9\-._~%!$&'()*+,;=]+@)?([a-z0-9\-._~%]+|\[[a-f0-9:.]+\]|\[v[a-f0-9][a-z0-9\-._~%!$&'()*+,;=:]+\])(:[0-9]+)?(.*)/i;

  	var chk = false;
    if(RegexUrl.test(urlStr)){
		chk = true;
    }else{
		chk = false;
    }

    if(chk)
    {

	    var rex = /(https|http):\/\/w{1,}\./i;
		if(rex.test(urlStr))
		{
			var RegexUrl2 =/(https|http):\/\/(w{3,3})\./i;
		    if(RegexUrl2.test(urlStr))
			{
				var reg3 = /(https|http):\/\/(www\.){1}/i;
				if(reg3.test(urlStr))
				{
					chk = true;
				}
				else
				{
					chk = false;
				}
		    }
			else
			{
		        chk = false;
		    }
		}
		// check dot charachter
		if(urlStr.lastIndexOf('.') == -1)
		{
			chk = false;
		}

    }
    return chk;
}

var Encoder = {

	// When encoding do we convert characters into html or numerical entities
	EncodeType : "entity",  // entity OR numerical

	isEmpty : function(val){
		if(val){
			return ((val===null) || val.length==0 || /^\s+$/.test(val));
		}else{
			return true;
		}
	},
	arr1: new Array('&nbsp;','&iexcl;','&cent;','&pound;','&curren;','&yen;','&brvbar;','&sect;','&uml;','&copy;','&ordf;','&laquo;','&not;','&shy;','&reg;','&macr;','&deg;','&plusmn;','&sup2;','&sup3;','&acute;','&micro;','&para;','&middot;','&cedil;','&sup1;','&ordm;','&raquo;','&frac14;','&frac12;','&frac34;','&iquest;','&Agrave;','&Aacute;','&Acirc;','&Atilde;','&Auml;','&Aring;','&Aelig;','&Ccedil;','&Egrave;','&Eacute;','&Ecirc;','&Euml;','&Igrave;','&Iacute;','&Icirc;','&Iuml;','&ETH;','&Ntilde;','&Ograve;','&Oacute;','&Ocirc;','&Otilde;','&Ouml;','&times;','&Oslash;','&Ugrave;','&Uacute;','&Ucirc;','&Uuml;','&Yacute;','&THORN;','&szlig;','&agrave;','&aacute;','&acirc;','&atilde;','&auml;','&aring;','&aelig;','&ccedil;','&egrave;','&eacute;','&ecirc;','&euml;','&igrave;','&iacute;','&icirc;','&iuml;','&eth;','&ntilde;','&ograve;','&oacute;','&ocirc;','&otilde;','&ouml;','&divide;','&Oslash;','&ugrave;','&uacute;','&ucirc;','&uuml;','&yacute;','&thorn;','&yuml;','&quot;','&amp;','&lt;','&gt;','&oelig;','&oelig;','&scaron;','&scaron;','&yuml;','&circ;','&tilde;','&ensp;','&emsp;','&thinsp;','&zwnj;','&zwj;','&lrm;','&rlm;','&ndash;','&mdash;','&lsquo;','&rsquo;','&sbquo;','&ldquo;','&rdquo;','&bdquo;','&dagger;','&dagger;','&permil;','&lsaquo;','&rsaquo;','&euro;','&fnof;','&alpha;','&beta;','&gamma;','&delta;','&epsilon;','&zeta;','&eta;','&theta;','&iota;','&kappa;','&lambda;','&mu;','&nu;','&xi;','&omicron;','&pi;','&rho;','&sigma;','&tau;','&upsilon;','&phi;','&chi;','&psi;','&omega;','&alpha;','&beta;','&gamma;','&delta;','&epsilon;','&zeta;','&eta;','&theta;','&iota;','&kappa;','&lambda;','&mu;','&nu;','&xi;','&omicron;','&pi;','&rho;','&sigmaf;','&sigma;','&tau;','&upsilon;','&phi;','&chi;','&psi;','&omega;','&thetasym;','&upsih;','&piv;','&bull;','&hellip;','&prime;','&prime;','&oline;','&frasl;','&weierp;','&image;','&real;','&trade;','&alefsym;','&larr;','&uarr;','&rarr;','&darr;','&harr;','&crarr;','&larr;','&uarr;','&rarr;','&darr;','&harr;','&forall;','&part;','&exist;','&empty;','&nabla;','&isin;','&notin;','&ni;','&prod;','&sum;','&minus;','&lowast;','&radic;','&prop;','&infin;','&ang;','&and;','&or;','&cap;','&cup;','&int;','&there4;','&sim;','&cong;','&asymp;','&ne;','&equiv;','&le;','&ge;','&sub;','&sup;','&nsub;','&sube;','&supe;','&oplus;','&otimes;','&perp;','&sdot;','&lceil;','&rceil;','&lfloor;','&rfloor;','&lang;','&rang;','&loz;','&spades;','&clubs;','&hearts;','&diams;'),
	arr2: new Array('&#160;','&#161;','&#162;','&#163;','&#164;','&#165;','&#166;','&#167;','&#168;','&#169;','&#170;','&#171;','&#172;','&#173;','&#174;','&#175;','&#176;','&#177;','&#178;','&#179;','&#180;','&#181;','&#182;','&#183;','&#184;','&#185;','&#186;','&#187;','&#188;','&#189;','&#190;','&#191;','&#192;','&#193;','&#194;','&#195;','&#196;','&#197;','&#198;','&#199;','&#200;','&#201;','&#202;','&#203;','&#204;','&#205;','&#206;','&#207;','&#208;','&#209;','&#210;','&#211;','&#212;','&#213;','&#214;','&#215;','&#216;','&#217;','&#218;','&#219;','&#220;','&#221;','&#222;','&#223;','&#224;','&#225;','&#226;','&#227;','&#228;','&#229;','&#230;','&#231;','&#232;','&#233;','&#234;','&#235;','&#236;','&#237;','&#238;','&#239;','&#240;','&#241;','&#242;','&#243;','&#244;','&#245;','&#246;','&#247;','&#248;','&#249;','&#250;','&#251;','&#252;','&#253;','&#254;','&#255;','&#34;','&#38;','&#60;','&#62;','&#338;','&#339;','&#352;','&#353;','&#376;','&#710;','&#732;','&#8194;','&#8195;','&#8201;','&#8204;','&#8205;','&#8206;','&#8207;','&#8211;','&#8212;','&#8216;','&#8217;','&#8218;','&#8220;','&#8221;','&#8222;','&#8224;','&#8225;','&#8240;','&#8249;','&#8250;','&#8364;','&#402;','&#913;','&#914;','&#915;','&#916;','&#917;','&#918;','&#919;','&#920;','&#921;','&#922;','&#923;','&#924;','&#925;','&#926;','&#927;','&#928;','&#929;','&#931;','&#932;','&#933;','&#934;','&#935;','&#936;','&#937;','&#945;','&#946;','&#947;','&#948;','&#949;','&#950;','&#951;','&#952;','&#953;','&#954;','&#955;','&#956;','&#957;','&#958;','&#959;','&#960;','&#961;','&#962;','&#963;','&#964;','&#965;','&#966;','&#967;','&#968;','&#969;','&#977;','&#978;','&#982;','&#8226;','&#8230;','&#8242;','&#8243;','&#8254;','&#8260;','&#8472;','&#8465;','&#8476;','&#8482;','&#8501;','&#8592;','&#8593;','&#8594;','&#8595;','&#8596;','&#8629;','&#8656;','&#8657;','&#8658;','&#8659;','&#8660;','&#8704;','&#8706;','&#8707;','&#8709;','&#8711;','&#8712;','&#8713;','&#8715;','&#8719;','&#8721;','&#8722;','&#8727;','&#8730;','&#8733;','&#8734;','&#8736;','&#8743;','&#8744;','&#8745;','&#8746;','&#8747;','&#8756;','&#8764;','&#8773;','&#8776;','&#8800;','&#8801;','&#8804;','&#8805;','&#8834;','&#8835;','&#8836;','&#8838;','&#8839;','&#8853;','&#8855;','&#8869;','&#8901;','&#8968;','&#8969;','&#8970;','&#8971;','&#9001;','&#9002;','&#9674;','&#9824;','&#9827;','&#9829;','&#9830;'),

	// Convert HTML entities into numerical entities
	HTML2Numerical : function(s){
		return this.swapArrayVals(s,this.arr1,this.arr2);
	},

	// Convert Numerical entities into HTML entities
	NumericalToHTML : function(s){
		return this.swapArrayVals(s,this.arr2,this.arr1);
	},


	// Numerically encodes all unicode characters
	numEncode : function(s){

		if(this.isEmpty(s)) return "";

		var e = "";
		for (var i = 0; i < s.length; i++)
		{
			var c = s.charAt(i);
			if (c < " " || c > "~")
			{
				c = "&#" + c.charCodeAt() + ";";
			}
			e += c;
		}
		return e;
	},

	// HTML Decode numerical and HTML entities back to original values
	htmlDecode : function(s){

		var c,m,d = s;

		if(this.isEmpty(d)) return "";

		// convert HTML entites back to numerical entites first
		d = this.HTML2Numerical(d);

		// look for numerical entities &#34;
		arr=d.match(/&#[0-9]{1,5};/g);

		// if no matches found in string then skip
		if(arr!=null){
			for(var x=0;x<arr.length;x++){
				m = arr[x];
				c = m.substring(2,m.length-1); //get numeric part which is refernce to unicode character
				// if its a valid number we can decode
				if(c >= -32768 && c <= 65535){
					// decode every single match within string
					d = d.replace(m, String.fromCharCode(c));
				}else{
					d = d.replace(m, ""); //invalid so replace with nada
				}
			}
		}

		return d;
	},

	// encode an input string into either numerical or HTML entities
	htmlEncode : function(s,dbl){

		if(this.isEmpty(s)) return "";

		// do we allow double encoding? E.g will &amp; be turned into &amp;amp;
		dbl = dbl || false; //default to prevent double encoding

		// if allowing double encoding we do ampersands first
		if(dbl){
			if(this.EncodeType=="numerical"){
				s = s.replace(/&/g, "&#38;");
			}else{
				s = s.replace(/&/g, "&amp;");
			}
		}

		// convert the xss chars to numerical entities ' " < >
		s = this.XSSEncode(s,false);

		if(this.EncodeType=="numerical" || !dbl){
			// Now call function that will convert any HTML entities to numerical codes
			s = this.HTML2Numerical(s);
		}

		// Now encode all chars above 127 e.g unicode
		s = this.numEncode(s);

		// now we know anything that needs to be encoded has been converted to numerical entities we
		// can encode any ampersands & that are not part of encoded entities
		// to handle the fact that I need to do a negative check and handle multiple ampersands &&&
		// I am going to use a placeholder

		// if we don't want double encoded entities we ignore the & in existing entities
		if(!dbl){
			s = s.replace(/&#/g,"##AMPHASH##");

			if(this.EncodeType=="numerical"){
				s = s.replace(/&/g, "&#38;");
			}else{
				s = s.replace(/&/g, "&amp;");
			}

			s = s.replace(/##AMPHASH##/g,"&#");
		}

		// replace any malformed entities
		s = s.replace(/&#\d*([^\d;]|$)/g, "$1");

		if(!dbl){
			// safety check to correct any double encoded &amp;
			s = this.correctEncoding(s);
		}

		// now do we need to convert our numerical encoded string into entities
		if(this.EncodeType=="entity"){
			s = this.NumericalToHTML(s);
		}

		return s;
	},

	// Encodes the basic 4 characters used to malform HTML in XSS hacks
	XSSEncode : function(s,en){
		if(!this.isEmpty(s)){
			en = en || true;
			// do we convert to numerical or html entity?
			if(en){
				s = s.replace(/\'/g,"&#39;"); //no HTML equivalent as &apos is not cross browser supported
				s = s.replace(/\"/g,"&quot;");
				s = s.replace(/</g,"&lt;");
				s = s.replace(/>/g,"&gt;");
			}else{
				s = s.replace(/\'/g,"&#39;"); //no HTML equivalent as &apos is not cross browser supported
				s = s.replace(/\"/g,"&#34;");
				s = s.replace(/</g,"&#60;");
				s = s.replace(/>/g,"&#62;");
			}
			return s;
		}else{
			return "";
		}
	},

	// returns true if a string contains html or numerical encoded entities
	hasEncoded : function(s){
		if(/&#[0-9]{1,5};/g.test(s)){
			return true;
		}else if(/&[A-Z]{2,6};/gi.test(s)){
			return true;
		}else{
			return false;
		}
	},

	// will remove any unicode characters
	stripUnicode : function(s){
		return s.replace(/[^\x20-\x7E]/g,"");

	},

	// corrects any double encoded &amp; entities e.g &amp;amp;
	correctEncoding : function(s){
		return s.replace(/(&amp;)(amp;)+/,"$1");
	},


	// Function to loop through an array swaping each item with the value from another array e.g swap HTML entities with Numericals
	swapArrayVals : function(s,arr1,arr2){
		if(this.isEmpty(s)) return "";
		var re;
		if(arr1 && arr2){
			//ShowDebug("in swapArrayVals arr1.length = " + arr1.length + " arr2.length = " + arr2.length)
			// array lengths must match
			if(arr1.length == arr2.length){
				for(var x=0,i=arr1.length;x<i;x++){
					re = new RegExp(arr1[x], 'g');
					s = s.replace(re,arr2[x]); //swap arr1 item with matching item from arr2
				}
			}
		}
		return s;
	},

	inArray : function( item, arr ) {
		for ( var i = 0, x = arr.length; i < x; i++ ){
			if ( arr[i] === item ){
				return i;
			}
		}
		return -1;
	}

};

var UrlEncode = {

	// public method for url encoding
	encode : function (string) {
		return escape(this._utf8_encode(string));
	},

	// public method for url decoding
	decode : function (string) {
		return this._utf8_decode(unescape(string));
	},

	// private method for UTF-8 encoding
	_utf8_encode : function (string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";

		for (var n = 0; n < string.length; n++) {

			var c = string.charCodeAt(n);

			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}

		}

		return utftext;
	},

	// private method for UTF-8 decoding
	_utf8_decode : function (utftext) {
		var string = "";
		var i = 0;
		var c = c1 = c2 = 0;

		while ( i < utftext.length ) {

			c = utftext.charCodeAt(i);

			if (c < 128) {
				string += String.fromCharCode(c);
				i++;
			}
			else if((c > 191) && (c < 224)) {
				c2 = utftext.charCodeAt(i+1);
				string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
				i += 2;
			}
			else {
				c2 = utftext.charCodeAt(i+1);
				c3 = utftext.charCodeAt(i+2);
				string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
				i += 3;
			}

		}
		return string;
	}
};

var Utf8 = {

	// public method for url encoding
	encode : function (string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";

		for (var n = 0; n < string.length; n++) {

			var c = string.charCodeAt(n);

			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}

		}

		return utftext;
	},

	// public method for url decoding
	decode : function (utftext) {
		var string = "";
		var i = 0;
		var c = c1 = c2 = 0;

		while ( i < utftext.length ) {

			c = utftext.charCodeAt(i);

			if (c < 128) {
				string += String.fromCharCode(c);
				i++;
			}
			else if((c > 191) && (c < 224)) {
				c2 = utftext.charCodeAt(i+1);
				string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
				i += 2;
			}
			else {
				c2 = utftext.charCodeAt(i+1);
				c3 = utftext.charCodeAt(i+2);
				string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
				i += 3;
			}

		}

		return string;
	}

}
function toUnicode(theString) {
	var unicodeString = '';
	for (var i=0; i < theString.length; i++)
	{
		var theUnicode = theString.charCodeAt(i).toString(16).toUpperCase();
		while (theUnicode.length < 4) {
	    	theUnicode = '0' + theUnicode;
	    }
		theUnicode = '\\u' + theUnicode;
	    unicodeString += theUnicode;
	}
  	return unicodeString;
}

var UTF8 = {
	encode: function(s){
		for(var c, i = -1, l = (s = s.split("")).length, o = String.fromCharCode; ++i < l;
			s[i] = (c = s[i].charCodeAt(0)) >= 127 ? o(0xc0 | (c >>> 6)) + o(0x80 | (c & 0x3f)) : s[i]
		);
		return s.join("");
	},
	decode: function(s){
		for(var a, b, i = -1, l = (s = s.split("")).length, o = String.fromCharCode, c = "charCodeAt"; ++i < l;
			((a = s[i][c](0)) & 0x80) &&
			(s[i] = (a & 0xfc) == 0xc0 && ((b = s[i + 1][c](0)) & 0xc0) == 0x80 ?
			o(((a & 0x03) << 6) + (b & 0x3f)) : o(128), s[++i] = "")
		);
		return s.join("");
	}
};

function stripHtmlTags(str)
{
	return str.replace(/<\/?[^>]+>/gi, '');
}

function validHtmlTags(v) {
	return(v.match(/(<+[^>]*?>)/g));
}

function chkHtmlTags(str)
{
	var check = false;
	if (str.match(/<\/?[^>]+>/gi)) {
		check = true;
	}
	return check;
}

function getSelText()
{
    var txt = '';
    if (window.getSelection)
    {
        txt = window.getSelection();
	}
    else if (document.getSelection)
    {
        txt = document.getSelection();
    }
    else if (document.selection)
    {
        txt = document.selection.createRange().text;
    }
	return txt;
}

function getDomainFromUrl(strUrl)
{
	if(strUrl == '') return '';
	try
	{
		var temp = strUrl.split('?', 1);
		var domain = temp[0];
		domain = domain.match(/:\/\/(.[^/]+)/)[1];
		domain = domain.replace(/www./i, '');
		return domain;
	}
	catch(err)
	{
		return '';
	}
}

function isEmail(email)
{
	var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/;
    if (email == "") {
        return false;
    } else if (!emailFilter.test(email)) {              //test email for illegal characters
       return false;
    } else if (email.match(illegalChars)) {
       return false;
    }
    return true;
}

// number format
function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1))
	{
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}
function roundNumber(num, dec) {
	return Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
}
// end number format

JSON.stringify = JSON.stringify || function (obj) {
    var t = typeof (obj);
    if (t != "object" || obj === null) {
        // simple data type
        if (t == "string") obj = '"'+obj+'"';
        return String(obj);
    }
    else {
        // recurse array or object
        var n, v, json = [], arr = (obj && obj.constructor == Array);
        for (n in obj) {
            v = obj[n]; t = typeof(v);
            if (t == "string") v = '"'+v+'"';
            else if (t == "object" && v !== null) v = JSON.stringify(v);
            json.push((arr ? "" : '"' + n + '":') + String(v));
        }
        return (arr ? "[" : "{") + String(json) + (arr ? "]" : "}");
    }
};
//var ajaxLoadingPopupStatus = 0;

//loading popup with jQuery magic!
function loadAjaxLoadingPopup(imgId, divBgId, isScroll){
	isScroll = (typeof(isScroll) === 'undefined' || isScroll === '') ? true : isScroll;
	//loads popup only if it is disabled
	//if(ajaxLoadingPopupStatus==0){
		centerAjaxLoadingPopup(imgId, divBgId, isScroll);
		$(divBgId).css({
			"opacity": "0.5"
		});
		$(divBgId).fadeIn("fast");
		$(imgId).show();
		//ajaxLoadingPopupStatus = 1;

	//}
}

//disabling popup with jQuery magic!
function disableAjaxLoadingPopup(imgId, divBgId){
	//disables popup only if it is enabled
	//if(ajaxLoadingPopupStatus==1){
		$(divBgId).fadeOut();
		$(divBgId).hide();

		//ajaxLoadingPopupStatus = 0;
	//}
	$(imgId).hide();
}

//centering popup
function centerAjaxLoadingPopup(imgId, divBgId, isScroll){
	isScroll = (typeof(isScroll) === 'undefined' || isScroll === '') ? true : isScroll;
	//request data for centering
	var windowWidth = document.documentElement.clientWidth;
	var windowHeight = document.documentElement.clientHeight;
	var bodywidth = $('body').innerWidth();
	var bodyheight = $('body').innerHeight();
	var popupHeight = $(imgId).height();
	var popupWidth = $(imgId).width();

	var wpos = (bodywidth > windowWidth) ? bodywidth : windowWidth;
	var hpos = (bodyheight > windowHeight) ? bodyheight : windowHeight;
	var scrollWindow = $(window).scrollTop();
	var top = windowHeight/2-((popupHeight/3)*2) + scrollWindow;
	var left = windowWidth/2-popupWidth/2;

	//centering
	$(imgId).css({
		"position": "absolute",
		"top": top,
		"left": left
	});
	//only need force for IE6
	$(divBgId).css({
		"height": hpos,
		"width" : wpos
	});
	if(isScroll)
	{
		$(window).scroll(function(){
			if($(imgId).css('display') != 'none')
			{
				$(imgId).stop();
				var scroll = $(window).scrollTop();
				var scrollPos = windowHeight/2-((popupHeight/3)*2) + scroll;
				$(imgId).animate({top: scrollPos},'slow');
			}
		});
	}
}

function htmlspecialchars_decode (string, quote_style) {
    // http://kevin.vanzonneveld.net
    // +   original by: Mirek Slugen
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Mateusz "loonquawl" Zalega
    // +      input by: ReverseSyntax
    // +      input by: Slawomir Kaniecki
    // +      input by: Scott Cariss
    // +      input by: Francois
    // +   bugfixed by: Onno Marsman
    // +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
    // +      input by: Ratheous
    // +      input by: Mailfaker (http://www.weedem.fr/)
    // +      reimplemented by: Brett Zamir (http://brett-zamir.me)
    // +    bugfixed by: Brett Zamir (http://brett-zamir.me)
    // *     example 1: htmlspecialchars_decode("<p>this -&gt; &quot;</p>", 'ENT_NOQUOTES');
    // *     returns 1: '<p>this -> &quot;</p>'
    // *     example 2: htmlspecialchars_decode("&amp;quot;");
    // *     returns 2: '&quot;'
    var optTemp = 0,
        i = 0,
        noquotes = false;
    if (typeof quote_style === 'undefined') {
        quote_style = 2;
    }
    string = string.toString().replace(/&lt;/g, '<').replace(/&gt;/g, '>');
    var OPTS = {
        'ENT_NOQUOTES': 0,
        'ENT_HTML_QUOTE_SINGLE': 1,
        'ENT_HTML_QUOTE_DOUBLE': 2,
        'ENT_COMPAT': 2,
        'ENT_QUOTES': 3,
        'ENT_IGNORE': 4
    };
    if (quote_style === 0) {
        noquotes = true;
    }
    if (typeof quote_style !== 'number') { // Allow for a single string or an array of string flags
        quote_style = [].concat(quote_style);
        for (i = 0; i < quote_style.length; i++) {
            // Resolve string input to bitwise e.g. 'PATHINFO_EXTENSION' becomes 4
            if (OPTS[quote_style[i]] === 0) {
                noquotes = true;
            } else if (OPTS[quote_style[i]]) {
                optTemp = optTemp | OPTS[quote_style[i]];
            }
        }
        quote_style = optTemp;
    }
    if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
        string = string.replace(/&#0*39;/g, "'"); // PHP doesn't currently escape if more than one 0, but it should
        // string = string.replace(/&apos;|&#x0*27;/g, "'"); // This would also be useful here, but not a part of PHP
    }
    if (!noquotes) {
        string = string.replace(/&quot;/g, '"');
    }
    // Put this in last place to avoid escape being double-decoded
    string = string.replace(/&amp;/g, '&');

    return string;
}

function setCookie (c_name, value, expiredays, reset)
{
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + expiredays);
    if (reset == 1)
	{
        document.cookie = c_name + "=" + escape(value) + ((expiredays == null) ? "" : ";expires=" + exdate.toUTCString()) + ";path=/";
    }
	else
	{
        var curCook = this.getCookie('cpcSelfServ');
        if (curCook.search(value) < 0 || curCook == '' || curCook == null)
		{
            document.cookie = c_name + "=" + escape(curCook + value) + ((expiredays == null) ? "" : ";expires=" + exdate.toUTCString()) + ";path=/";
        }
    }
}

function getCookie(c_name)
{
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) c_end = document.cookie.length;
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";
}

function isFlashEnabled()
{
    var hasFlash = false;
    try
    {
        var fo = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
        if(fo) hasFlash = true;
    }
    catch(e)
    {
        if(navigator.mimeTypes ["application/x-shockwave-flash"] != undefined) hasFlash = true;
    }
    return hasFlash;
}

function showViewStrength(strength , strength_View){
	var style =
		"<style type='text/css'>" +
		".strength{ border: 1px solid gray; width: 40px; height: 10px; float: left; margin-right: 10px;}"+
		".lv1{background-color: rgba(244, 204, 68, 0.68); vertical-align: middle; margin-top: 3px;}"+
		".lv2{background-color: #f4cc44;vertical-align: middle;margin-top: 3px;}"+
		".lv3{background-color: #EEBD40;vertical-align: middle;margin-top: 3px;}"+
		".lv4{background-color: #ED9208;vertical-align: middle;margin-top: 3px;}"+
		".lv5{background-color: #FF6600;vertical-align: middle;margin-top: 3px;}"+
		".lvdf{background-color: whitesmoke;vertical-align: middle;margin-top: 3px;}"+
		".color1{font-weight: bold; color: rgba(244, 204, 68, 0.68);vertical-align: middle;font-size:90%;position: relative;bottom:2px}"+
		".color2{font-weight: bold; color: #f4cc44;vertical-align: middle;font-size:90%;position: relative;bottom:2px}"+
		".color3{font-weight: bold; color: #EEBD40;vertical-align: middle;font-size:90%;position: relative;bottom:2px}"+
		".color4{font-weight: bold; color: #ED9208;vertical-align: middle;font-size:90%;position: relative;bottom:2px}"+
		".color5{font-weight: bold; color: #FF6600;vertical-align: middle;font-size:90%;position: relative;bottom:2px}"+
		"</style>";

	$(strength_View).html('');
	var lv1 ='df', lv2='df', lv3='df', lv4='df', lv5 = 'df';
	var color = 1;
	var showText;
	var html = '';

	if(strength == 1){
		showText = 'Rất Yếu';
		color = 1;
		lv1 = 1;
	}else if(strength == 2){
		showText = 'Yếu';
		color = 2;
		lv1 = 1; lv2 = 2;
	}else if(strength == 3){
		showText = 'Trung bình';
		color = 3;
		lv1 = 1; lv2 = 2; lv3 = 3;
	}else if(strength == 4){
		showText = 'Mạnh';
		color = 4;
		lv1 = 1; lv2 = 2; lv3 = 3; lv4 = 4;
	}else if(strength == 5){
		showText = 'Rất mạnh';
		color = 5;
		lv1 = 1; lv2 = 2; lv3 = 3; lv4 = 4; lv5 = 5;
	}
	html += "<div class='strength lv"+lv1+"'></div>";
	html += "<div class='strength lv"+lv2+"'></div>";
	html += "<div class='strength lv"+lv3+"'></div>";
	html += "<div class='strength lv"+lv4+"'></div>";
	html += "<div class='strength lv"+lv5+"'></div>";

	html += '<div class="color'+color+'">'+showText+'</div>';
	html += '<div style="clear: both"></div>';

	$(strength_View).html(style + html);
    
 
}

function showloading()
{
    $("#bg-loading").show();
    var img_w = $("#bg-loading img").width();
    var img_h = $("#bg-loading img").height();
    var wd_w = $(window).width();
    var wd_h = $(window).height();
    
    var left = (wd_w - img_w) / 2;
    
    var top = (wd_h - img_h) / 2;
    $("#bg-loading img").css({'top': top, 'left': left});
}