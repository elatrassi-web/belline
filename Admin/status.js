class StatusDisplayer {
     constructor() {
        this.init();
    }

    async init() {
        this.status = await this.fetchStatus();

        this.statusElements = this.findElementsByText('###status-displayer###');

        this.addCss();

        this.statusElements.forEach(element => {
            this.replaceByStatus(element);
        })
    }

    addCss() {
        if (!document.querySelector('#status-displayer-style')) {
            const style = document.createElement('style');
            style.id = 'status-displayer-style';
            style.textContent = `
            .status-displayer span::before {
                content: "";
                position: absolute;
                width: 100%;
                height: 100%;
                border-radius: 50%;
                background-color: inherit;
                animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
            }

            @keyframes ping {
              75%, 100% {
                transform: scale(2);
                opacity: 0;
              }
            }
        `;
            document.head.appendChild(style);
        }
    }

    async fetchStatus() {
        try {
            const response = await fetch('/Admin/status.txt', { cache: 'no-cache' });
            if (!response.ok) {
                throw new Error('Erreur lors du chargement du statut');
            }
            return await response.text();
            // document.getElementById('status-display').textContent = `Statut actuel : ${status}`;
        } catch (error) {
            console.error('Erreur:', error);
            return 'error';
            // document.getElementById('status-display').textContent = 'Impossible de récupérer le statut';
        }
    }

    findElementsByText(text) {
        const elements = [];
        const allElements = document.querySelectorAll('*'); // Sélectionne tous les éléments

        allElements.forEach(element => {
            if (element.childNodes.length === 1 && element.childNodes[0].nodeType === Node.TEXT_NODE) {
                if (element.textContent.trim() === text) {
                    elements.push(element);
                }
            }
        });

        return elements;
    }

    replaceByStatus(element) {
         let color = 'red';
         switch (this.status) {
             case 'disponible':
                 color = 'green';
                 break;
             case 'en consultation':
                 color = 'orange';
                 break;
             case 'indisponible':
                 color = 'red';
                 break;
         }
        const span = document.createElement('span');
        Object.assign(span.style, {
            position: 'absolute',
            width: '0.8em',
            height: '0.8em',
            borderRadius: '50%',
            top: '50%',
            left: '0.35em',
            translate: '0px -50%',
            backgroundColor: color
        });

        const statusDisplayerEl = document.createElement('div');
        statusDisplayerEl.classList.add('status-displayer');
        Object.assign(statusDisplayerEl.style, {
            position: 'relative',
            display: 'inline-grid',
            padding: '0.25em 0.5em 0.25em 1.5em',
            fontSize: '18px',
            fontWeight: 'bold',
            textTransform: 'uppercase',
            fontFamily: 'sans-serif',
            border: `0.2em solid ${color}`,
            borderRadius: '0.4em'
        });

        statusDisplayerEl.textContent = this.status;
        statusDisplayerEl.appendChild(span);

        element.replaceWith(statusDisplayerEl);
    }
}

document.addEventListener('DOMContentLoaded', async () => {
    new StatusDisplayer();
});
