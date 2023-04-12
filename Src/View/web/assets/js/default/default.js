function carrossel(seletor, arrows, slidesToShow, statusDots){
    jQuery(seletor).slick({
        infinite: true,
        arrows: arrows,
        dots: statusDots,
        slidesToShow: slidesToShow,
        slidesToScroll: 1,
        variableWidth: false,
        focusOnSelect: false,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnHover: false
    });
}

function openAccess() {
    var topLogin = $('.form_login');
    if (topLogin.hasClass('display-none')){
        topLogin.removeClass('display-none');
    } else {
        topLogin.addClass('display-none');
    }
}
jQuery(document).ready(function(){
    var header = $('header');
    jQuery(window).scroll(function(){
        if(jQuery(document).scrollTop() < 80){
            header.removeClass('fixed');
        } else {
            header.addClass('fixed');
        }
    });
});
var teste;
function getLogged(Element, event){
    event.preventDefault();
    var xhr      = new XMLHttpRequest(),
        email    = $('.form_login .login input[name="txtemail"]').val(),
        password = $('.form_login .login input[name="txtsenha"]').val(),
        button   = $('.form_login .login input.botao-login[name="Enviar"]'),
        formData = new FormData();

    button.addClass('loading');
    button.val('');

    formData.append('txtemail' , email);
    formData.append('txtsenha' , password);

    xhr.onload = function(res){
        teste = res;
        var url = JSON.parse(res.srcElement.response).url;
        submitForm(button, url);
    }
    xhr.open('POST', window.location.origin + '/Src/Controller/Login.php');
    xhr.send(formData);
}

function submitForm(button, url) {
    var inputs = $('.form_login .login input:not(.botao-login)');
    if (url.indexOf(window.location.origin + '/access/portal/portaladm') > -1 || url.indexOf(window.location.origin + '/access/portal/portalaluno') > -1){
        inputs.removeClass('error');
        window.location.href = url;
    } else {
        inputs.addClass('error');
    }
    button.removeClass('loading');
    button.val('Entrar');
}
function removeError(button) {
    if ($(button).val() !== "")
    $(button).removeClass('error');
}