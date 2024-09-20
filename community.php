<html><head><base href="https://btc-online-platform.com/community">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Communauté BTC - Plateforme d'Apprentissage en Ligne</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
:root {
  --primary-color: #3498db;
  --secondary-color: #2ecc71;
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
}

.community-container {
  max-width: 1200px;
  margin: 50px auto;
}

.card {
  border: none;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
}

.card:hover {
  transform: translateY(-5px);
}

.forum-card {
  height: 200px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.forum-icon {
  font-size: 3rem;
  color: var(--primary-color);
}

.user-avatar {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  object-fit: cover;
}

.post-content {
  font-size: 0.9rem;
}

.engagement-icons {
  font-size: 1.2rem;
}

.engagement-icons i {
  margin-right: 10px;
  cursor: pointer;
  transition: color 0.3s ease;
}

.engagement-icons i:hover {
  color: var(--primary-color);
}

.community-header {
  background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
  color: white;
  padding: 40px 0;
  margin-bottom: 30px;
  border-radius: 15px;
}

.search-bar {
  max-width: 500px;
  margin: 20px auto;
}

.search-bar .form-control {
  border-radius: 20px 0 0 20px;
}

.search-bar .btn {
  border-radius: 0 20px 20px 0;
  background-color: var(--secondary-color);
  border-color: var(--secondary-color);
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

.animate-fade-in {
  animation: fadeIn 0.5s ease-out;
}

</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="/">
    <img src="/images/logo.svg" alt="Logo BTC" width="50" height="50">
    BTC Plateforme d'Apprentissage
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="/courses"><i class="fas fa-book"></i> Cours</a></li>
      <li class="nav-item"><a class="nav-link" href="/live-sessions"><i class="fas fa-video"></i> Sessions en direct</a></li>
      <li class="nav-item active"><a class="nav-link" href="/community"><i class="fas fa-users"></i> Communauté</a></li>
      <li class="nav-item"><a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Connexion</a></li>
      <li class="nav-item"><a class="nav-link" href="/signup"><i class="fas fa-user-plus"></i> Inscription</a></li>
    </ul>
  </div>
</nav>

<div class="community-header text-center">
  <h1>Communauté BTC</h1>
  <p>Connectez-vous, apprenez et partagez avec d'autres passionnés de Bitcoin et de crypto-monnaies</p>
  <div class="search-bar input-group">
    <input type="text" class="form-control" placeholder="Rechercher dans la communauté...">
    <div class="input-group-append">
      <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
    </div>
  </div>
</div>

<div class="container community-container">
  <div class="row">
    <div class="col-md-4 mb-4">
      <div class="card forum-card animate-fade-in">
        <div class="card-body text-center">
          <i class="fas fa-coins forum-icon mb-3"></i>
          <h5 class="card-title">Forum Bitcoin</h5>
          <p class="card-text">Discutez des dernières nouvelles et tendances du Bitcoin.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">3,456 membres actifs</small>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card forum-card animate-fade-in">
        <div class="card-body text-center">
          <i class="fas fa-chart-line forum-icon mb-3"></i>
          <h5 class="card-title">Analyse de Marché</h5>
          <p class="card-text">Partagez vos analyses et prédictions sur le marché crypto.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">2,189 membres actifs</small>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card forum-card animate-fade-in">
        <div class="card-body text-center">
          <i class="fas fa-code forum-icon mb-3"></i>
          <h5 class="card-title">Développement Blockchain</h5>
          <p class="card-text">Explorez les aspects techniques de la blockchain.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">1,732 membres actifs</small>
        </div>
      </div>
    </div>
  </div>

  <h2 class="mt-5 mb-4">Discussions Récentes</h2>

  <div class="card mb-4 animate-fade-in">
    <div class="card-body">
      <div class="d-flex align-items-center mb-3">
        <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Avatar de l'utilisateur" class="user-avatar mr-3">
        <div>
          <h5 class="mb-0">Jean Dupont</h5>
          <small class="text-muted">Il y a 2 heures</small>
        </div>
      </div>
      <h6 class="card-title">Impact du halving sur le prix du Bitcoin</h6>
      <p class="card-text post-content">Que pensez-vous de l'impact potentiel du prochain halving sur le prix du Bitcoin ? Personnellement, je pense que nous pourrions voir une hausse significative dans les mois suivants l'événement.</p>
      <div class="engagement-icons">
        <i class="far fa-heart"></i> 24
        <i class="far fa-comment"></i> 8
        <i class="far fa-share-square"></i> 3
      </div>
    </div>
  </div>

  <div class="card mb-4 animate-fade-in">
    <div class="card-body">
      <div class="d-flex align-items-center mb-3">
        <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Avatar de l'utilisateur" class="user-avatar mr-3">
        <div>
          <h5 class="mb-0">Marie Leroy</h5>
          <small class="text-muted">Il y a 5 heures</small>
        </div>
      </div>
      <h6 class="card-title">Sécurité des portefeuilles hardware</h6>
      <p class="card-text post-content">J'envisage d'investir dans un portefeuille hardware pour mes cryptos. Quels sont vos retours d'expérience sur les différents modèles disponibles sur le marché ? La sécurité est ma priorité numéro un.</p>
      <div class="engagement-icons">
        <i class="far fa-heart"></i> 18
        <i class="far fa-comment"></i> 12
        <i class="far fa-share-square"></i> 2
      </div>
    </div>
  </div>

  <div class="text-center mt-4">
    <button class="btn btn-primary">Charger plus de discussions</button>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
// Simuler le chargement de nouveaux posts
document.querySelector('.btn-primary').addEventListener('click', function() {
  const newPost = `
    <div class="card mb-4 animate-fade-in">
      <div class="card-body">
        <div class="d-flex align-items-center mb-3">
          <img src="https://randomuser.me/api/portraits/men/${Math.floor(Math.random() * 100)}.jpg" alt="Avatar de l'utilisateur" class="user-avatar mr-3">
          <div>
            <h5 class="mb-0">Utilisateur ${Math.floor(Math.random() * 1000)}</h5>
            <small class="text-muted">Il y a ${Math.floor(Math.random() * 24)} heures</small>
          </div>
        </div>
        <h6 class="card-title">Nouveau sujet de discussion</h6>
        <p class="card-text post-content">Voici un nouveau post généré dynamiquement. Il pourrait contenir des discussions intéressantes sur les crypto-monnaies, la blockchain, ou d'autres sujets pertinents pour notre communauté.</p>
        <div class="engagement-icons">
          <i class="far fa-heart"></i> ${Math.floor(Math.random() * 50)}
          <i class="far fa-comment"></i> ${Math.floor(Math.random() * 20)}
          <i class="far fa-share-square"></i> ${Math.floor(Math.random() * 10)}
        </div>
      </div>
    </div>
  `;
  document.querySelector('.community-container').insertAdjacentHTML('beforeend', newPost);
});

// Ajouter de l'interactivité aux icônes d'engagement
document.addEventListener('click', function(e) {
  if (e.target.classList.contains('fa-heart')) {
    e.target.classList.toggle('far');
    e.target.classList.toggle('fas');
    const currentLikes = parseInt(e.target.nextSibling.textContent);
    e.target.nextSibling.textContent = e.target.classList.contains('fas') ? currentLikes + 1 : currentLikes - 1;
  }
});

// Animation au défilement
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('animate-fade-in');
    }
  });
}, { threshold: 0.1 });

document.querySelectorAll('.card').forEach(card => {
  observer.observe(card);
});

</script>
</body>
</html>