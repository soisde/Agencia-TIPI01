$('.banner').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: false,
  });

  $('.galeira').slick({
    slidesToShow: 5,
    slidesToScroll: 3,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: false,
    prevArrow: false,
    nextArrow: false,

    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  $('.slideDepo').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
  });


  // menu mibile
  
  document.querySelector(".abrirMenu").onclick = function () {
    document.documentElement.classList.add("menuAtivo");
  }


  document.querySelector(".fecharMenu").onclick = function () {
    document.documentElement.classList.remove("menuAtivo");
  }

  AOS.init();

  window.onscroll = function(){
    var top = window.scrollY || document.documentElement.scrollTop;
    if(top > 800){
      //console.log("adicionar meu menu fixo " + top)
      document.getElementById('topoFixo').classList.add('menu-fixo');
      document.getElementById('topoFixo').classList.remove('site');
    }else{
      //console.log("remover meu menu fixo " + top)
      document.getElementById('topoFixo').classList.remove('menu-fixo');
      document.getElementById('topoFixo').classList.add('site');
    }
  } 
  function formWhats(){

    var nome = '*Nome: *'+ document.getElementById('nome').value;
    var email = '*Email: *'+ document.getElementById('email').value;
    var tel = document.getElementById('tel').value;
    var mens = '*Mensagem: *'+ document.getElementById('mens').value;

    var agencia = 'Agencia TIPI'
    var assunto = 'Mensagem do site'

    var numfone = '5511973118790'
    var quebraDeLinha = '%0A'

    if(tel == ''){
      alert("o campo do celular e obrigatorio")
      return;
    }else{
      var tel = '*Fone: *' + document.getElementById('tel').value;
    }

window.open('https://api.whatsapp.com/send?phone=' + 
 numfone + '&text=' +
 assunto + '-' + agencia + quebraDeLinha + quebraDeLinha +
 nome + quebraDeLinha +
 email + quebraDeLinha +
 tel + quebraDeLinha +
 mens, '_blank');

form.reset();



  }