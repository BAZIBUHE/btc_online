<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BTC Online Platform - Accueil</title>
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

.navbar-brand img {
  transition: transform 0.3s ease;
}

.navbar-brand:hover img {
  transform: rotate(360deg);
}

.nav-link {
  color: #fff !important;
  transition: color 0.3s ease;
}

.nav-link:hover {
  color: #f0f0f0 !important;
}

.hero {
  background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('/images/hero-bg.jpg') no-repeat center center;
  background-size: cover;
  color: #fff;
  padding: 100px 0;
  text-align: center;
}

.hero h1 {
  font-size: 3rem;
  margin-bottom: 20px;
}

.hero p {
  font-size: 1.2rem;
  margin-bottom: 30px;
}

.btn-cta {
  background-color: var(--accent-color);
  color: #fff;
  padding: 10px 25px;
  font-size: 1.1rem;
  border-radius: 30px;
  transition: all 0.3s ease;
}

.btn-cta:hover {
  background-color: #c0392b;
  transform: translateY(-3px);
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

.features {
  padding: 80px 0;
}

.feature-card {
  background-color: var(--card-bg);
  border-radius: 10px;
  padding: 30px;
  margin-bottom: 30px;
  transition: all 0.3s ease;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.feature-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

.feature-icon {
  font-size: 3rem;
  margin-bottom: 20px;
  color: var(--primary-color);
}

.courses {
  background-color: #f9f9f9;
  padding: 80px 0;
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

.testimonials {
  padding: 80px 0;
}

.testimonial-card {
  background-color: var(--card-bg);
  border-radius: 10px;
  padding: 30px;
  margin-bottom: 30px;
  text-align: center;
  transition: all 0.3s ease;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.testimonial-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

.testimonial-image {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin: 0 auto 20px;
}

.testimonial-text {
  font-style: italic;
  margin-bottom: 20px;
}

.footer {
  background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
  color: #fff;
  padding: 50px 0;
}

.footer h5 {
  color: #fff;
  margin-bottom: 20px;
}

.footer ul {
  list-style: none;
  padding: 0;
}

.footer ul li {
  margin-bottom: 10px;
}

.footer ul li a {
  color: #fff;
  text-decoration: none;
}

.social-icons a {
  color: #fff;
  font-size: 1.5rem;
  margin-right: 15px;
  transition: color 0.3s ease;
}

.social-icons a:hover {
  color: var(--accent-color);
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
        <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" alt="Logo BTC" width="50" height="50">
            BTC Online Platform
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="index.php"><i class="fas fa-home"></i> Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="courses.php"><i class="fas fa-book"></i> Cours</a></li>
                <li class="nav-item"><a class="nav-link" href="live-sessions.php"><i class="fas fa-video"></i> Sessions en direct</a></li>
                <li class="nav-item"><a class="nav-link" href="community.php"><i class="fas fa-users"></i> Communauté</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Connexion</a></li>
                <li class="nav-item"><a class="nav-link" href="signup.php"><i class="fas fa-user-plus"></i> Inscription</a></li>
            </ul>
        </div>
    </div>
</nav>


<section class="hero">
  <div class="container">
    <h1 class="animate-fade-in-up">Propulsez votre carrière avec BTC Online Platform</h1>
    <p class="animate-fade-in-up">Découvrez des cours de pointe en technologie, dispensés par des experts de l'industrie.</p>
    <a href="/courses" class="btn btn-cta animate-fade-in-up">Commencez à apprendre</a>
  </div>
</section>

<section class="features">
  <div class="container">
    <h2 class="text-center mb-5">Pourquoi choisir BTC Online Platform ?</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="feature-card">
          <i class="fas fa-laptop-code feature-icon"></i>
          <h3>Apprentissage pratique</h3>
          <p>Nos cours sont conçus pour vous offrir une expérience pratique, avec des projets réels et des études de cas.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-card">
          <i class="fas fa-chalkboard-teacher feature-icon"></i>
          <h3>Experts de l'industrie</h3>
          <p>Apprenez directement des meilleurs professionnels du secteur, avec une expérience concrète du terrain.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-card">
          <i class="fas fa-clock feature-icon"></i>
          <h3>Flexibilité totale</h3>
          <p>Étudiez à votre rythme, où que vous soyez, avec un accès illimité à nos ressources en ligne.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="courses">
  <div class="container">
    <h2 class="text-center mb-5">Nos cours les plus populaires</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="course-card">
          <img src="images/2.jpg" alt="Introduction à l'IA" class="course-image img-fluid">
          <div class="course-content">
            <h3 class="course-title">Introduction à l'Intelligence Artificielle</h3>
            <p class="course-description">Découvrez les fondamentaux de l'IA et ses applications dans le monde réel.</p>
            <a href="/courses/ai-intro" class="btn btn-primary">En savoir plus</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="course-card">
          <img src="images/blockchain.jpg" alt="Blockchain pour les débutants" class="course-image img-fluid">
          <div class="course-content">
            <h3 class="course-title">Blockchain pour les débutants</h3>
            <p class="course-description">Comprenez les concepts clés de la blockchain et son potentiel révolutionnaire.</p>
            <a href="/courses/blockchain-basics" class="btn btn-primary">En savoir plus</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="course-card">
          <img src="images/Data Science avec Python_pop-art_3D_1 (1).jpg" alt="Data Science avec Python" class="course-image img-fluid">
          <div class="course-content">
            <h3 class="course-title">Data Science avec Python</h3>
            <p class="course-description">Maîtrisez l'analyse de données et le machine learning avec Python.</p>
            <a href="/courses/data-science-python" class="btn btn-primary">En savoir plus</a>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-4">
      <a href="/courses" class="btn btn-lg btn-outline-primary">Voir tous les cours</a>
    </div>
  </div>
</section>

<section class="testimonials">
  <div class="container">
    <h2 class="text-center mb-5">Ce que disent nos étudiants</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="testimonial-card">
          <img src="images/testimonials/frank.jpg" alt="Frank" class="testimonial-image">
          <p class="testimonial-text">"Les cours de BTC m'ont permis de changer de carrière et de décrocher mon emploi de rêve dans l'IA. Une expérience incroyable !"</p>
          <p class="testimonial-author">Sarah M., Data Scientist</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testimonial-card">
          <img src="images/testimonials/sylvain.JPG" alt="Sylvain" class="testimonial-image">
          <p class="testimonial-text">"La qualité des cours et le support de la communauté sont incomparables. J'ai appris plus en 3 mois qu'en 2 ans d'études traditionnelles."</p>
          <p class="testimonial-author">Moise M., Développeur Blockchain</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testimonial-card">
          <img src="images/testimonials/cela.jpg" alt="Cela" class="testimonial-image">
          <p class="testimonial-text">"Grâce à BTC, j'ai pu acquérir les compétences nécessaires pour lancer ma propre startup tech. Une plateforme qui change vraiment la donne !"</p>
          <p class="testimonial-author">Aisha K., Entrepreneure Tech</p>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5>À propos de BTC</h5>
        <p>BTC Online Platform est dédiée à fournir une éducation technologique de pointe, accessible à tous, partout dans le monde.</p>
      </div>
      <div class="col-md-4">
        <h5>Liens rapides</h5>
        <ul>
          <li><a href="/about">À propos</a></li>
          <li><a href="/careers">Carrières</a></li>
          <li><a href="/privacy">Politique de confidentialité</a></li>
          <li><a href="/terms">Conditions d'utilisation</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Restez connecté</h5>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <p class="mt-3">Abonnez-vous à notre newsletter pour les dernières nouvelles et offres.</p>
        <form class="form-inline">
          <div class="input-group">
            <input type="email" class="form-control" placeholder="Votre email">
            <div class="input-group-append">
              <button class="btn btn-outline-light" type="submit">S'abonner</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <hr class="mt-4 mb-3 bg-light">
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
  // Fonction pour animer l'apparition des éléments au scroll
  function animateOnScroll() {
    const elements = document.querySelectorAll('.feature-card, .course-card, .testimonial-card');
    elements.forEach((element) => {
      const elementTop = element.getBoundingClientRect().top;
      const elementBottom = element.getBoundingClientRect().bottom;
      if (elementTop < window.innerHeight && elementBottom > 0) {
        element.classList.add('animate-fade-in-up');
      }
    });
  }

  // Lancer l'animation au chargement de la page
  animateOnScroll();

  // Lancer l'animation au scroll
  window.addEventListener('scroll', animateOnScroll);

  // Animation du compteur de statistiques
  const stats = document.querySelectorAll('.stat-number');
  const speed = 200;

  stats.forEach(stat => {
    const updateCount = () => {
      const target = +stat.getAttribute('data-target');
      const count = +stat.innerText;
      const inc = target / speed;

      if (count < target) {
        stat.innerText = Math.ceil(count + inc);
        setTimeout(updateCount, 1);
      } else {
        stat.innerText = target;
      }
    };

    updateCount();
  });
});
</script>
</body>
</html>