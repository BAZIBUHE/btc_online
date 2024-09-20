<?php
require 'config.php'; // Inclure le fichier de connexion à la base de données
// Initialiser le jeton CSRF s'il n'est pas défini
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Vérifier si les mots de passe correspondent
    if ($password !== $confirmPassword) {
        echo "Les mots de passe ne correspondent pas !";
        exit;
    }

    // Hacher le mot de passe pour plus de sécurité
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insérer les données dans la base de données
    $sql = "INSERT INTO users (fullname, email, password) VALUES (:fullname, :email, :password)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['fullname' => $fullname, 'email' => $email, 'password' => $hashed_password]);
        // Rediriger vers l'index après une inscription réussie
        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            echo "Cet email est déjà utilisé.";
        } else {
            echo "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }
}
?>

<html><head><base href="https://btc-online-platform.com/signup">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription - BTC Online Platform</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
:root {
  --primary-color: #3498db;
  --secondary-color: #2ecc71;
  --background-color: #f0f3f6;
  --text-color: #333;
  --card-bg: #ffffff;
  --hover-color: #e8f4fd;
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

.signup-container {
  background-color: var(--card-bg);
  border-radius: 15px;
  padding: 30px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.form-control {
  border-radius: 20px;
  padding: 10px 15px;
  border: 1px solid #ddd;
  transition: all 0.3s ease;
}

.form-control:focus {
  box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
  border-color: var(--primary-color);
}

.btn-signup {
  background-color: var(--primary-color);
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 20px;
  transition: all 0.3s ease;
}

.btn-signup:hover {
  background-color: var(--secondary-color);
  transform: translateY(-2px);
}

.or-divider {
  display: flex;
  align-items: center;
  text-align: center;
  margin: 20px 0;
}

.or-divider::before,
.or-divider::after {
  content: '';
  flex: 1;
  border-bottom: 1px solid #ddd;
}

.or-divider span {
  padding: 0 10px;
  color: #777;
  font-size: 14px;
}

.social-signup {
  display: flex;
  justify-content: center;
  gap: 15px;
}

.social-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: #f8f9fa;
  border: 1px solid #ddd;
  transition: all 0.3s ease;
  font-size: 20px;
}

.social-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.social-btn.facebook { color: #3b5998; }
.social-btn.google { color: #db4437; }
.social-btn.twitter { color: #1da1f2; }

.footer {
  background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
  color: #fff;
  padding: 30px 0;
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
  <a class="navbar-brand" href="/">
    <img src="/images/logo.svg" alt="Logo BTC" width="50" height="50">
    BTC Plateforme d'Apprentissage
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">

      <li class="nav-item"><a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Connexion</a></li>
      <li class="nav-item active"><a class="nav-link" href="/signup"><i class="fas fa-user-plus"></i> Inscription</a></li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="signup-container animate-fade-in-up">
        <h2 class="text-center mb-4">Créer un compte</h2>
        <form id="signup-form">
          <div class="form-group">
            <label for="fullname">Nom complet</label>
            <input type="text" class="form-control" id="fullname" placeholder="Entrez votre nom complet" required>
          </div>
          <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" class="form-control" id="email" placeholder="Entrez votre adresse e-mail" required>
          </div>
          <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" placeholder="Choisissez un mot de passe" required>
          </div>
          <div class="form-group">
            <label for="confirm-password">Confirmer le mot de passe</label>
            <input type="password" class="form-control" id="confirm-password" placeholder="Confirmez votre mot de passe" required>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="terms" required>
            <label class="form-check-label" for="terms">J'accepte les <a href="/terms">conditions d'utilisation</a> et la <a href="/privacy">politique de confidentialité</a></label>
          </div>
          <button type="submit" class="btn btn-signup btn-block">S'inscrire</button>
        </form>
        
        <div class="or-divider">
          <span>OU</span>
        </div>
        
        <div class="social-signup">
          <a href="#" class="social-btn facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social-btn google"><i class="fab fa-google"></i></a>
          <a href="#" class="social-btn twitter"><i class="fab fa-twitter"></i></a>
        </div>
        
        <p class="text-center mt-4">
          Vous avez déjà un compte ? <a href="/login">Connectez-vous</a>
        </p>
      </div>
    </div>
  </div>
</div>

<footer class="footer mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5>À propos de BTC</h5>
        <p>BTC Online Platform est dédiée à fournir une éducation de qualité accessible à tous, partout dans le monde.</p>
      </div>
      <div class="col-md-4">
        <h5>Liens rapides</h5>
        <ul class="list-unstyled">
          <li><a href="/about">À propos</a></li>
          <li><a href="/contact">Contact</a></li>
          <li><a href="/privacy">Politique de confidentialité</a></li>
          <li><a href="/terms">Conditions d'utilisation</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Suivez-nous</h5>
        <a href="#" class="text-white mr-3"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-white mr-3"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-white mr-3"><i class="fab fa-linkedin-in"></i></a>
        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
    <hr class="bg-light">
    <div class="text-center">
      &copy; 2024 BTC Online Platform. Tous droits réservés.
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('signup-form');
  
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const fullname = document.getElementById('fullname').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    const termsAccepted = document.getElementById('terms').checked;
    
    // Simple form validation
    if (!fullname || !email || !password || !confirmPassword) {
      alert('Veuillez remplir tous les champs');
      return;
    }
    
    if (password !== confirmPassword) {
      alert('Les mots de passe ne correspondent pas');
      return;
    }
    
    if (!termsAccepted) {
      alert('Veuillez accepter les conditions d\'utilisation et la politique de confidentialité');
      return;
    }
    
    // Here you would typically send the data to your server
    // For this example, we'll just log it to the console
    console.log('Inscription soumise', { fullname, email });
    
    // Simulate a successful signup
    alert('Inscription réussie ! Bienvenue sur BTC Online Platform.');
    // Redirect to the courses page or dashboard
    window.location.href = '/courses';
  });
  
  // Password strength indicator (simple version)
  const passwordInput = document.getElementById('password');
  passwordInput.addEventListener('input', function() {
    const strength = this.value.length;
    let strengthText = '';
    let strengthColor = '';
    
    if (strength < 6) {
      strengthText = 'Faible';
      strengthColor = 'red';
    } else if (strength < 10) {
      strengthText = 'Moyen';
      strengthColor = 'orange';
    } else {
      strengthText = 'Fort';
      strengthColor = 'green';
    }
    
    // Update UI to show password strength (you might want to add elements for this)
    console.log(`Force du mot de passe: ${strengthText}`);
  });
  
  // Social signup buttons (these would typically redirect to OAuth providers)
  const socialButtons = document.querySelectorAll('.social-btn');
  socialButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      const provider = this.classList[1];
      console.log(`Tentative de connexion avec ${provider}`);
      // Here you would redirect to the OAuth provider's login page
    });
  });
});
</script>
</body>
</html>