//MODO ESCUROO
$(document).ready(function () {
  $('#dark-mode-toggle').click(function () {
    $('body, .navbar, .section, .card-content').toggleClass('is-dark');
    $('.pricing-plan').toggleClass('is-black');
    $('body, .section, .hero, .card, .pricing-table, .plan-header, .plan-item, .plan-items, .plan-footer, .plan-price').toggleClass('dark-mode');
    $('.card-content, #contact, .copyright').toggleClass('has-background-dark');
    $('title, span, p, h1, .column a, .title, .card-content').toggleClass('has-text-white');

    var moonIcon = $('.fa-moon');
    if (moonIcon) {
      moonIcon.removeClass('fa-moon').addClass('fa-sun');
      islink.removeClass('is-link').addClass('is-black');
      $('#logoid img').attr('src', '../../assets/img/telecall-branco.png'); // trocar logo para branco

    } else {
      $('#logoid img').attr('src', '../../assets/img/telecall-logo-removebg-preview.png'); // trocar logo para branco
      $('.fa-sun').removeClass('fa-sun').addClass('fa-moon');
      $(".is-black").removeClass("is-black").addClass("is-link");
    }
  });
});


$(document).ready(function () {
  // Define o tamanho da fonte inicial
  var fontSize = 24;

  // Define o menor tamanho da fonte permitido
  var minFontSize = 20;

  // Define o incremento/diminuição do tamanho da fonte
  var fontSizeIncrement = 2;

  // Manipulador de evento para aumentar o zoom
  $('#zoom-in').click(function () {
    if (fontSize < 34) {
      fontSize += fontSizeIncrement;
      $('p, h1, span, input, li a, .plan-header, .plan-item, .plan-price-amount').css('font-size', fontSize + 'px');
    }
  });

  // Manipulador de evento para diminuir o zoom
  $('#zoom-out').click(function () {
    if (fontSize >= minFontSize) {
      fontSize -= fontSizeIncrement;
      $('p, h1, span, input, li a, .plan-header, .plan-item, .plan-price-amount').css('font-size', fontSize + 'px');
    }
  });
});
