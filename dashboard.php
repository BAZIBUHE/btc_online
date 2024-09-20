<html><head><base href="https://btc-online-platform.com/">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tableau de bord - BTC Plateforme d'Apprentissage</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<style>
body {
    background-color: #f8f9fa;
}
.navbar {
    box-shadow: 0 2px 4px rgba(0,0,0,.1);
}
.sidebar {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,.1);
}
.main-content {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,.1);
    padding: 20px;
}
.course {
    background-color: #f1f3f5;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 20px;
}
.advertisement {
    background-color: #e9ecef;
    border-radius: 8px;
    padding: 15px;
    margin-top: 20px;
    text-align: center;
}
.notification-badge {
    position: absolute;
    top: 0;
    right: 0;
    padding: 0.25em 0.6em;
    border-radius: 50%;
    background-color: red;
    color: white;
}
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">BTC Plateforme</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notifications.php">
                        Notifications
                        <span class="notification-badge" id="notificationCount"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="messages.php">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar p-3">
                    <h4>Menu</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="profile.php"><i class="fas fa-user mr-2"></i>Mon Profil</a></li>
                        <li class="list-group-item"><a href="courses.php"><i class="fas fa-book mr-2"></i>Mes Cours</a></li>
                        <li class="list-group-item"><a href="settings.php"><i class="fas fa-cog mr-2"></i>Paramètres</a></li>
                        <li class="list-group-item"><a href="manage_courses.php"><i class="fas fa-chalkboard-teacher mr-2"></i>Gérer les Cours</a></li>
                        <li class="list-group-item"><a href="manage_payments.php"><i class="fas fa-money-bill-wave mr-2"></i>Gérer les Paiements</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9">
                <div class="main-content">
                    <h2 class="mb-4">Tableau de bord</h2>
                    <p>Bienvenue, <strong id="userName"></strong> !</p>
                    <p>Rôle : <strong id="userRole"></strong></p>

                    <div class="post-section mt-5">
                        <form id="statusForm">
                            <div class="form-group">
                                <textarea class="form-control" id="statusText" rows="3" placeholder="Quoi de neuf ?"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Publier</button>
                        </form>
                    </div>

                    <div class="notifications mt-4">
                        <h4>Dernières Notifications</h4>
                        <ul class="list-group" id="notificationList">
                            <!-- Les notifications seront insérées ici dynamiquement -->
                        </ul>
                    </div>

                    <div class="courses mt-4">
                        <h4>Mes Cours</h4>
                        <div id="courseList">
                            <!-- Les cours seront insérés ici dynamiquement -->
                        </div>
                    </div>

                    <div class="manage-courses mt-4">
                        <h4>Gérer les Cours</h4>
                        <a href="add_course.php" class="btn btn-success">Ajouter un nouveau cours</a>
                    </div>

                    <div class="advertisement mt-4" id="adContainer">
                        <!-- La publicité sera insérée ici dynamiquement -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        // Fonction pour charger les données utilisateur
        function loadUserData() {
            $.ajax({
                url: 'get_user_data.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#userName').text(response.name);
                    $('#userRole').text(response.role);
                },
                error: function() {
                    console.error("Erreur lors du chargement des données utilisateur");
                }
            });
        }

        // Fonction pour charger les notifications
        function loadNotifications() {
            $.ajax({
                url: 'get_notifications.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#notificationList').empty();
                    response.notifications.forEach(function(notification) {
                        $('#notificationList').append(`<li class="list-group-item">${notification.message}</li>`);
                    });
                    $('#notificationCount').text(response.count);
                },
                error: function() {
                    console.error("Erreur lors du chargement des notifications");
                }
            });
        }

        // Fonction pour charger les cours
        function loadCourses() {
            $.ajax({
                url: 'get_courses.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#courseList').empty();
                    response.forEach(function(course) {
                        $('#courseList').append(`
                            <div class="course">
                                <h5>${course.title}</h5>
                                <p>${course.description}</p>
                                ${course.file_path ? `<a href="${course.file_path}" class="btn btn-sm btn-info">Télécharger le matériel</a>` : ''}
                            </div>
                        `);
                    });
                },
                error: function() {
                    console.error("Erreur lors du chargement des cours");
                }
            });
        }

        // Fonction pour charger une publicité
        function loadAd() {
            $.ajax({
                url: 'get_ad.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response) {
                        $('#adContainer').html(`
                            <a href="${response.redirect_url}" target="_blank">
                                <img src="${response.banner_image}" alt="Publicité" style="max-width: 100%;">
                            </a>
                        `);
                    }
                },
                error: function() {
                    console.error("Erreur lors du chargement de la publicité");
                }
            });
        }

        // Gestionnaire de soumission du formulaire de statut
        $('#statusForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'post_status.php',
                method: 'POST',
                data: { status: $('#statusText').val() },
                success: function(response) {
                    alert("Statut publié avec succès!");
                    $('#statusText').val('');
                },
                error: function() {
                    alert("Erreur lors de la publication du statut");
                }
            });
        });

        // Chargement initial des données
        loadUserData();
        loadNotifications();
        loadCourses();
        loadAd();

        // Rafraîchissement périodique des notifications
        setInterval(loadNotifications, 60000); // Toutes les minutes
    });
    </script>
</body>
</html>