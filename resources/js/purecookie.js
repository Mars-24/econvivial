// --- Config --- //
var purecookieTitle = "Cookies." // Title
var purecookieDesc = "En utilisant ce site internet, vous acceptez automatiquement que nous utilisions des cookies."; // Description
var purecookieLink = '<a href="#" target="_blank">lire plus?</a>'; // Cookiepolicy link
var purecookieButton = "Acceptez les coockies"; // Button text
// ---        --- //


function pureFadeIn(elem, display){
  var el = document.getElementById(elem);
  el.style.opacity = 0;
  el.style.display = display || "block";

  (function fade() {
    var val = parseFloat(el.style.opacity);
    if (!((val += .02) > 1)) {
      el.style.opacity = val;
      requestAnimationFrame(fade);
    }
  })();
};
function pureFadeOut(elem){
  var el = document.getElementById(elem);
  el.style.opacity = 1;

  (function fade() {
    if ((el.style.opacity -= .02) < 0) {
      el.style.display = "none";
    } else {
      requestAnimationFrame(fade);
    }
  })();
};

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {
    document.cookie = name+'=; Max-Age=-99999999;';
}

function cookieConsent() {
  if (!getCookie('purecookieDismiss')) {
    document.body.innerHTML += '<div class="cookieConsentContainer" id="cookieConsentContainer"><div class="cookieTitle"><a>' + purecookieTitle + '</a></div><div class="cookieDesc><p  id ="p">' + purecookieDesc + ' ' + purecookieLink + '</p></div><div id="btn" class="cookieButton"><a  onClick="purecookieDismiss();">' + purecookieButton + '</a></div></div>';
	pureFadeIn("cookieConsentContainer");
  document.getElementById("cookieConsentContainer").style.width="450px";
  document.getElementById("cookieConsentContainer").style.background=" #ffffff";
  document.getElementById("cookieConsentContainer").style.borderRadius="8px";
  document.getElementById("p").style.color=" black";
  document.getElementById("btn").style.color=" white";
  document.getElementById("btn").style.borderRadius="8px";
  document.getElementById("btn").style.background="#192e3a";



  purecookieDesc.value.style


  }
}

function purecookieDismiss() {
  setCookie('purecookieDismiss','1',7);
  pureFadeOut("cookieConsentContainer");
}

window.onload = function() { cookieConsent(); };
