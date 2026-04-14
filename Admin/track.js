const arrivalSound = new Audio('./sounds/enter.mp3');  // Change le chemin si besoin
const leaveSound = new Audio('./sounds/leave.mp3');

let lastUsers = [];
let trackingInterval = null;
// const trackerURL = 'https://bel.okw.re';
const trackerURL = './';


const checkUsers = () => {
    fetch(trackerURL + '/tracking.json', { credentials: "include" })
        .then(response => response.json())
        .then(users => {
            let currentUsers = Object.keys(users);

            // Vérifier les entrées
            currentUsers.forEach(user => {
                if (!lastUsers.includes(user)) {
                    arrivalSound.play();
                }
            });

            // Vérifier les sorties
            lastUsers.forEach(user => {
                if (!currentUsers.includes(user)) {
                    leaveSound.play();
                }
            });

            lastUsers = currentUsers;
        })
        .catch(error => console.error('Tracking fetch failed', error));
};

document.addEventListener('DOMContentLoaded', () => {
    const btnTracker = document.getElementById('tracker');

    // Fonction pour activer/désactiver le suivi
    if (btnTracker) {
        btnTracker.addEventListener('click', () => {
            if (trackingInterval) {
                clearInterval(trackingInterval);
                trackingInterval = null;
                console.log('Tracking arrêté');
                btnTracker.innerText = 'Démarrer le tracking';
            } else {
                trackingInterval = setInterval(checkUsers, 5000);
                console.log('Tracking activé');
                btnTracker.innerText = 'Arrêter le tracking';
            }
        });
    }
})
