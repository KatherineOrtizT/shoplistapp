window.addEventListener('scroll', function() {
    var navbar = document.getElementById('navbar');
    var jumbotron = document.querySelector('.jumbotron');
    if (window.pageYOffset > jumbotron.offsetHeight) {
      navbar.classList.add('navbar-custom');
    } else {
      navbar.classList.remove('navbar-custom');
    }
  });
  