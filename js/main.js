// main.js

// Mode sombre avec stockage local
document.addEventListener('DOMContentLoaded', function() {
    const themeSelector = document.getElementById('theme-selector');
    themeSelector.addEventListener('change', function() {
        document.body.className = themeSelector.value;
        localStorage.setItem('theme', themeSelector.value);
    });

    // Charger le thème choisi précédemment
    const savedTheme = localStorage.getItem('theme') || 'light-mode';
    document.body.className = savedTheme;
    themeSelector.value = savedTheme;
});

// Toggle mode sombre/lumière
const toggleButton = document.getElementById('darkModeToggle');
toggleButton.addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    
    // Changer l'icône en fonction du mode
    const icon = toggleButton.querySelector('i');
    if (document.body.classList.contains('dark-mode')) {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    } else {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
    }
});

// Gestion des modales
function openModal(modalId) {
    document.getElementById(modalId).style.display = 'flex';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Fermer la modale en cliquant à l'extérieur
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        closeModal(event.target.id);
    }
}

// Publication d'un statut avec AJAX
$(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault();
        var status = $("textarea[name='status']").val();

        if (status.trim() === "") {
            alert("Veuillez entrer un message.");
            return;
        }

        $.ajax({
            url: "post_status.php",
            type: "POST",
            data: { status: status },
            success: function (response) {
                alert("Statut publié avec succès.");
                $("textarea[name='status']").val("");
            },
            error: function () {
                alert("Erreur lors de la publication du statut.");
            }
        });
    });

    // Vérification des notifications toutes les 10 secondes
    setInterval(checkNotifications, 10000);

    function checkNotifications() {
        $.ajax({
            url: "fetch_notifications.php",
            type: "GET",
            success: function (response) {
                console.log("Nouvelles notifications : ", response);
            },
            error: function () {
                console.log("Erreur lors de la vérification des notifications.");
            }
        });
    }
});
