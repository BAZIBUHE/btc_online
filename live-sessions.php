<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sessions en Direct - BTC Online Platform</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <script src="https://api-checkout.cinetpay.com/seamless/main.js"></script>
<script>
  function checkout() {
    console.log("Démarrage du processus de paiement...");

    // Configuration de CinetPay
    CinetPay.setConfig({
      apiKey: "143337576466e6e6e2196f75.42667773",
      site_id:"5879976",
      notify_url: 'http://127.0.0.1:5500/index.php', // Assurez-vous que cette URL est correcte
      close_after_response: true,
      mode: 'PRODUCTION'
    });

    // Génération d'un ID de transaction aléatoire
    const transactionId = Math.floor(Math.random() * 100000000).toString();
    console.log("ID de transaction:", transactionId);

    // Appel de CinetPay pour le paiement
    CinetPay.getCheckout({
      transaction_id:'4',
      amount: 10000, // Montant en centimes
      currency: 'CDF',
      channels: 'ALL',
      description: 'Test de paiement',
      customer_name: "Joe",
      customer_surname: "Down",
      customer_email: "down@test.com",
      customer_phone_number: "088767611",
      customer_address: "BP 0024",
      customer_city: "Antananarivo",
      customer_country: "CM",
      customer_state: "CM",
      customer_zip_code: "06510",
    });

    // Gestion de la réponse du paiement
    CinetPay.waitResponse(function(data) {
      console.log("Réponse reçue:", data);
      if (data.status === "REFUSED") {
        alert("Votre paiement a échoué");
        window.location.reload();
      } else if (data.status === "ACCEPTED") {
        alert("Votre paiement a été effectué avec succès");
        localStorage.setItem('subscriptionExpirationDate', new Date(new Date().getTime() + 4 * 24 * 60 * 60 * 1000).toISOString());
        document.getElementById('paymentForm').style.display = 'none';
        document.getElementById('sessionsContainer').style.display = 'block';
        startCountdown();
      } else {
        console.log("Statut de la transaction non pris en charge:", data.status);
      }
    });

    CinetPay.onError(function(data) {
      console.error("Erreur:", data);
    });
  }

  function startCountdown() {
    const timerElement = document.getElementById('timer');
    const targetDate = new Date();
    targetDate.setHours(targetDate.getHours() + 1);

    function updateCountdown() {
      const now = new Date();
      const remainingTime = targetDate - now;
      const hours = Math.floor(remainingTime / (1000 * 60 * 60));
      const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

      timerElement.textContent = `${hours}h ${minutes}m ${seconds}s`;

      if (remainingTime <= 0) {
        clearInterval(countdownInterval);
        timerElement.textContent = 'La session a commencé!';
      }
    }

    const countdownInterval = setInterval(updateCountdown, 1000);
    updateCountdown();
  }
</script>
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

    .session-card {
      background-color: var(--card-bg);
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }

    .session-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .session-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .session-details {
      padding: 20px;
    }

    .session-title {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .session-info {
      font-size: 0.9rem;
      color: #666;
    }

    .btn-join {
      background-color: var(--primary-color);
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 20px;
      transition: all 0.3s ease;
    }

    .btn-join:hover {
      background-color: var(--secondary-color);
      transform: translateY(-2px);
    }

    .footer {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: #fff;
      padding: 30px 0;
      margin-top: 50px;
    }

    .payment-form {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    #countdown {
      font-size: 2rem;
      font-weight: bold;
      text-align: center;
      margin-bottom: 30px;
    }

    .animate-fade-in-up {
      animation: fadeInUp 0.5s ease-out;
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
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="/">
    <img src="images/logo.png" alt="Logo BTC" width="50" height="50">
    BTC Plateforme d'Apprentissage
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="/courses"><i class="fas fa-book"></i> Cours</a></li>
      <li class="nav-item active"><a class="nav-link" href="/live-sessions"><i class="fas fa-video"></i> Sessions en direct</a></li>
      <li class="nav-item"><a class="nav-link" href="/community"><i class="fas fa-users"></i> Communauté</a></li>
    </ul>
  </div>
</nav>

<div class="payment-form" id="paymentForm">
  <h2 class="text-center">Paiement pour Accès aux Sessions</h2>
  <form id="paymentDetailsForm" onsubmit="event.preventDefault(); checkout();">
    <div class="form-group">
      <label for="amount">Montant</label>
      <input type="text" class="form-control" id="amount" name="amount" value="1000" readonly> <!-- Montant en unités de devise -->
    </div>
    <button type="button" class="btn btn-primary btn-block" onclick="checkout()">Payer</button>
  </form>
</div>

<div class="container mt-5" id="sessionsContainer" style="display: none;">
  <h1 class="text-center mb-5">Sessions en Direct</h1>
  
  <div id="countdown" class="animate-fade-in-up">
    Prochaine session dans: <span id="timer"></span>
  </div>

  <!-- Contenu des sessions -->
  <div class="row">
    <div class="col-md-4 mb-4">
      <div class="session-card">
        <img src="images/session1.jpg" class="session-image" alt="Session 1">
        <div class="session-details">
          <h3 class="session-title">Session 1</h3>
          <p class="session-info">Date: 20 septembre 2024</p>
          <p class="session-info">Heure: 14h00</p>
          <a href="#" class="btn-join">Rejoindre</a>
        </div>
      </div>
    </div>
    <!-- Ajoutez plus de cartes de session ici -->
  </div>
</div>

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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
