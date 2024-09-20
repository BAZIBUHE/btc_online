<html><head><base href="https://btc-online-platform.com/courses">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BTC Online Platform - Cours</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
:root {
  --primary-color: #3498db;
  --secondary-color: #2ecc71;
  --accent-color: #e74c3c;
  --background-color: #f0f3f6;
  --text-color: #333;
  --card-bg: #ffffff;
}

body {
  font-family: 'Roboto', sans-serif;
  background-color: var(--background-color);
  color: var(--text-color);
}

.navbar {
  background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.nav-link {
  color: #fff !important;
  transition: color 0.3s ease;
}

.nav-link:hover {
  color: #f0f0f0 !important;
}

.course-header {
  background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('/images/course-header-bg.jpg') no-repeat center center;
  background-size: cover;
  color: #fff;
  padding: 100px 0;
  text-align: center;
}

.course-card {
  background-color: var(--card-bg);
  border-radius: 10px;
  overflow: hidden;
  margin-bottom: 30px;
  transition: all 0.3s ease;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.course-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

.course-image {
  height: 200px;
  object-fit: cover;
}

.course-content {
  padding: 20px;
}

.course-title {
  font-size: 1.2rem;
  margin-bottom: 10px;
}

.course-description {
  font-size: 0.9rem;
  color: #666;
  margin-bottom: 15px;
}

.course-meta {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 0.8rem;
  color: #888;
}

.course-rating {
  color: #f39c12;
}

.filters {
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  margin-bottom: 30px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.filter-title {
  font-size: 1.2rem;
  margin-bottom: 15px;
  color: var(--primary-color);
}

.form-check {
  margin-bottom: 10px;
}

.pagination {
  justify-content: center;
  margin-top: 30px;
}

.page-link {
  color: var(--primary-color);
}

.page-item.active .page-link {
  background-color: var(--primary-color);
  border-color: var(--primary-color);
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in-up {
  animation: fadeInUp 0.5s ease-out;
}

</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="/images/logo.svg" alt="Logo BTC" width="50" height="50">
      BTC Online Platform
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="/"><i class="fas fa-home"></i> Accueil</a></li>
        <li class="nav-item active"><a class="nav-link" href="/courses"><i class="fas fa-book"></i> Cours</a></li>
        <li class="nav-item"><a class="nav-link" href="/live-sessions"><i class="fas fa-video"></i> Sessions en direct</a></li>
        <li class="nav-item"><a class="nav-link" href="/community"><i class="fas fa-users"></i> Communauté</a></li>
        <li class="nav-item"><a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Connexion</a></li>
        <li class="nav-item"><a class="nav-link" href="/signup"><i class="fas fa-user-plus"></i> Inscription</a></li>
      </ul>
    </div>
  </div>
</nav>

<header class="course-header">
  <div class="container">
    <h1 class="animate-fade-in-up">Explorez nos cours</h1>
    <p class="animate-fade-in-up">Découvrez une vaste sélection de cours de haute qualité pour booster votre carrière dans la tech</p>
  </div>
</header>

<main class="container mt-5">
  <div class="row">
    <div class="col-md-3">
      <div class="filters">
        <h3 class="filter-title">Filtres</h3>
        <form>
          <h4>Catégories</h4>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="filter-ai">
            <label class="form-check-label" for="filter-ai">
              Intelligence Artificielle
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="filter-blockchain">
            <label class="form-check-label" for="filter-blockchain">
              Blockchain
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="filter-data-science">
            <label class="form-check-label" for="filter-data-science">
              Data Science
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="filter-cybersecurity">
            <label class="form-check-label" for="filter-cybersecurity">
              Cybersécurité
            </label>
          </div>
          
          <h4 class="mt-4">Niveau</h4>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="filter-beginner">
            <label class="form-check-label" for="filter-beginner">
              Débutant
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="filter-intermediate">
            <label class="form-check-label" for="filter-intermediate">
              Intermédiaire
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="filter-advanced">
            <label class="form-check-label" for="filter-advanced">
              Avancé
            </label>
          </div>
          
          <h4 class="mt-4">Durée</h4>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="filter-short">
            <label class="form-check-label" for="filter-short">
              &lt; 5 heures
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="filter-medium">
            <label class="form-check-label" for="filter-medium">
              5-10 heures
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="filter-long">
            <label class="form-check-label" for="filter-long">
              &gt; 10 heures
            </label>
          </div>
          
          <button type="submit" class="btn btn-primary mt-4">Appliquer les filtres</button>
        </form>
      </div>
    </div>
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-4">
          <div class="course-card animate-fade-in-up">
            <img src="/images/courses/ai-intro.jpg" alt="Introduction à l'IA" class="course-image img-fluid">
            <div class="course-content">
              <h3 class="course-title">Introduction à l'Intelligence Artificielle</h3>
              <p class="course-description">Découvrez les fondamentaux de l'IA et ses applications dans le monde réel.</p>
              <div class="course-meta">
                <span><i class="fas fa-clock"></i> 8 heures</span>
                <span class="course-rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                  4.5
                </span>
              </div>
              <a href="/courses/ai-intro" class="btn btn-primary mt-3">En savoir plus</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="course-card animate-fade-in-up">
            <img src="/images/courses/blockchain-basics.jpg" alt="Blockchain pour les débutants" class="course-image img-fluid">
            <div class="course-content">
              <h3 class="course-title">Blockchain pour les débutants</h3>
              <p class="course-description">Comprenez les concepts clés de la blockchain et son potentiel révolutionnaire.</p>
              <div class="course-meta">
                <span><i class="fas fa-clock"></i> 6 heures</span>
                <span class="course-rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                  4.0
                </span>
              </div>
              <a href="/courses/blockchain-basics" class="btn btn-primary mt-3">En savoir plus</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="course-card animate-fade-in-up">
            <img src="/images/courses/data-science-python.jpg" alt="Data Science avec Python" class="course-image img-fluid">
            <div class="course-content">
              <h3 class="course-title">Data Science avec Python</h3>
              <p class="course-description">Maîtrisez l'analyse de données et le machine learning avec Python.</p>
              <div class="course-meta">
                <span><i class="fas fa-clock"></i> 12 heures</span>
                <span class="course-rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  5.0
                </span>
              </div>
              <a href="/courses/data-science-python" class="btn btn-primary mt-3">En savoir plus</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="course-card animate-fade-in-up">
            <img src="/images/courses/cybersecurity-essentials.jpg" alt="Essentiels de la Cybersécurité" class="course-image img-fluid">
            <div class="course-content">
              <h3 class="course-title">Essentiels de la Cybersécurité</h3>
              <p class="course-description">Apprenez à protéger les systèmes et les réseaux contre les cyberattaques.</p>
              <div class="course-meta">
                <span><i class="fas fa-clock"></i> 10 heures</span>
                <span class="course-rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                  4.7
                </span>
              </div>
              <a href="/courses/cybersecurity-essentials" class="btn btn-primary mt-3">En savoir plus</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="course-card animate-fade-in-up">
            <img src="/images/courses/cloud-computing.jpg" alt="Introduction au Cloud Computing" class="course-image img-fluid">
            <div class="course-content">
              <h3 class="course-title">Introduction au Cloud Computing</h3>
              <p class="course-description">Découvrez les fondamentaux du cloud et ses applications en entreprise.</p>
              <div class="course-meta">
                <span><i class="fas fa-clock"></i> 7 heures</span>
                <span class="course-rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                  4.2
                </span>
              </div>
              <a href="/courses/cloud-computing" class="btn btn-primary mt-3">En savoir plus</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="course-card animate-fade-in-up">
            <img src="/images/courses/web3-development.jpg" alt="Développement Web3" class="course-image img-fluid">
            <div class="course-content">
              <h3 class="course-title">Développement Web3</h3>
              <p class="course-description">Apprenez à créer des applications décentralisées sur la blockchain Ethereum.</p>
              <div class="course-meta">
                <span><i class="fas fa-clock"></i> 15 heures</span>
                <span class="course-rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                  4.8
                </span>
              </div>
              <a href="/courses/web3-development" class="btn btn-primary mt-3">En savoir plus</a>
            </div>
          </div>
        </div>
      </div>
      
      <nav aria-label="Course pagination">
        <ul class="pagination">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
          </li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Suivant</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</main>

<footer class="bg-dark text-light mt-5 py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5>À propos de BTC</h5>
        <p>BTC Online Platform est dédiée à fournir une éducation technologique de pointe, accessible à tous, partout dans le monde.</p>
      </div>
      <div class="col-md-4">
        <h5>Liens rapides</h5>
        <ul class="list-unstyled">
          <li><a href="/about" class="text-light">À propos</a></li>
          <li><a href="/careers" class="text-light">Carrières</a></li>
          <li><a href="/privacy" class="text-light">Politique de confidentialité</a></li>
          <li><a href="/terms" class="text-light">Conditions d'utilisation</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Contactez-nous</h5>
        <p>Email: contact@btc-online-platform.com</p>
        <p>Téléphone: +1 234 567 890</p>
        <div class="social-icons">
          <a href="#" class="text-light mr-2"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-light mr-2"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-light mr-2"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <hr class="bg-light mt-4 mb-3">
    <div class="text-center">
      <p>&copy; 2024 BTC Online Platform. Tous droits réservés.</p>
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
  function animateOnScroll() {
    const elements = document.querySelectorAll('.course-card');
    elements.forEach((element) => {
      const elementTop = element.getBoundingClientRect().top;
      const elementBottom = element.getBoundingClientRect().bottom;
      if (elementTop < window.innerHeight && elementBottom > 0) {
        element.classList.add('animate-fade-in-up');
      }
    });
  }
1
  animateOnScroll();
  window.addEventListener('scroll', animateOnScroll);
});
</script>
</body>
</html>