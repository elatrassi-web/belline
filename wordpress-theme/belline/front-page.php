<?php
/**
 * The front page template file
 */

get_header(); ?>

<main id="primary" class="site-main">

    <style>
        .spa-container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            gap: 20px;
            align-items: flex-start;
        }
        .navigation-grid {
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex: 0 0 auto;
        }
        .spa-button {
            cursor: pointer;
            border: none;
            background: none;
            padding: 0;
            transition: transform 0.2s;
        }
        .spa-button:hover {
            transform: scale(1.05);
        }
        .spa-button img {
            display: block;
        }
        .spa-content-section {
            display: none;
            animation: fadeIn 0.5s;
        }
        .spa-content-section.active {
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Form styling */
        .belline-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-width: 600px;
            margin: 20px auto;
            text-align: left;
        }
        .belline-form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }
        .belline-form-group label {
            font-weight: bold;
            font-style: italic;
            flex: 1;
        }
        .belline-form-group input[type="text"],
        .belline-form-group input[type="email"],
        .belline-form-group select,
        .belline-form-group textarea,
        .belline-form-group input[type="file"] {
            flex: 2;
            padding: 5px;
        }
        .belline-form-group.radio-group {
            flex: 2;
            display: flex;
            flex-direction: column;
        }
        .belline-form-group.radio-group label {
            font-weight: normal;
            font-style: normal;
            flex: none;
        }
        .submit-btn-container {
            text-align: center;
            margin-top: 20px;
        }
        .submit-btn {
            padding: 10px 20px;
            background-color: white;
            color: black;
            border: 1px solid #ccc;
            cursor: pointer;
            font-weight: bold;
        }
    </style>

    <div class="spa-container">
    <div class="navigation-grid">
        <!-- Add an explicit Accueil button if needed later, right now Voyance Gratuite is default -->
        <button class="spa-button" data-target="gratuite" aria-label="Voyance Gratuite"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Gratuite.png" alt="Voyance Gratuite"></button>
        <button class="spa-button" data-target="mail" aria-label="Consultation par Mail"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/02_mail.png" alt="Consultation par Mail"></button>
        <button class="spa-button" data-target="tchat" aria-label="Consultation par Tchat"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/03_tchat.png" alt="Consultation par Tchat"></button>
        <button class="spa-button" data-target="magie" aria-label="Magie Blanche"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Magie_blanche.png" alt="Magie Blanche"></button>
        <button class="spa-button" data-target="coaching" aria-label="Coaching"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/05_coaching.png" alt="Coaching"></button>
        <button class="spa-button" data-target="domicile" aria-label="Consultation à domicile"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/06_a_domicile.png" alt="Consultation à domicile"></button>
        <button class="spa-button" data-target="dons" aria-label="Vos Dons"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/07_vos_dons.png" alt="Vos Dons"></button>
        <button class="spa-button" data-target="cartes32" aria-label="Jeu de 32 Cartes"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/08_32_cartes.png" alt="Jeu de 32 Cartes"></button>
        <button class="spa-button" data-target="belline" aria-label="Oracle Belline"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/09_oracle_belline.png" alt="Oracle Belline"></button>
        <button class="spa-button" data-target="tarots" aria-label="Les Tarots"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/10_les_tarots.png" alt="Les Tarots"></button>
        <button class="spa-button" data-target="methodes" aria-label="Méthodes"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Methodes.png" alt="Méthodes"></button>
        <button class="spa-button" data-target="planetes" aria-label="Planètes"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Planetes.png" alt="Planètes"></button>
    </div>

    <div class="content-area" style="flex: 1; padding: 20px; color: #fff; background: rgba(0,0,0,0.6); border-radius: 10px; border: 1px solid #c0a062; text-align: center;">

        <!-- Welcome (Default Content based on original prompt) -->
        <div id="content-accueil" class="spa-content-section active">
            <h1>Voyance gratuite et approfondie par tchat, en cabinet ou à votre domicile</h1>
            <p>Bienvenue sur mon site pour une consultation gratuite, sans frais cachés, ou pour aborder un domaine spécifique que vous souhaitez approfondir.</p>
            <p>Je vous propose une voyance gratuite par mail, car votre avenir ne devrait pas être freiné par des contraintes financières. Mes consultations reposent sur le tirage des Tarots et de l'Oracle de Belline. Que ce soit en direct à mon cabinet, par mail ou par téléphone, chaque échange est confidentiel et personnalisé.</p>
            <p>Mon don est à votre disposition pour vous guider sur votre chemin de vie. Si vous le souhaitez, un don de votre choix (à partir de 1 €) peut m'être adressé pour me soutenir.</p>
        </div>

        <!-- Voyance Gratuite Content -->
        <div id="content-gratuite" class="spa-content-section">
            <h2 style="color: yellow; font-style: italic;">Consultation gratuite par Mail / Tchat</h2>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cadeau.png" alt="Cadeau" style="margin: 20px auto; display: block; max-width: 150px;">

            <p style="font-style: italic; font-weight: bold;">Bienvenue à cette séance de cartomancie gratuite ! Nous allons explorer ensemble les messages que l'Oracle Belline ont à vous transmettre.</p>
            <p style="font-style: italic; font-weight: bold;">Cette séance est une opportunité rapide pour éclairer vos pensées, répondre à une question précise ou simplement vous donner un aperçu des énergies qui vous entourent. N'hésitez pas à formuler à exprimer une préoccupation particulière.</p>
            <p style="font-style: italic; font-weight: bold;">Gardez à l'esprit que ce moment est avant tout un espace de découverte et d'introspection. Je vous invite à accueillir les messages des cartes.</p>
            <p style="font-style: italic; font-weight: bold;">Consultation par Mail, réponse sous quelques minutes ou sous quelques heures ainsi que par Tchat sur rendez-vous (durée 10 minutes).</p>

            <p style="color: yellow; font-style: italic; font-weight: bold;">(Offre réservée aux nouveaux consultants valable une seule fois)</p>
            <p style="font-style: italic; font-weight: bold;">Stéphane.</p>

            <form class="belline-form" method="POST" action="" enctype="multipart/form-data">
                <div class="belline-form-group">
                    <label>Votre prénom</label>
                    <input type="text" name="prenom" required>
                </div>
                <div class="belline-form-group">
                    <label>Votre adresse mail</label>
                    <input type="email" name="email" required>
                </div>
                <div class="belline-form-group">
                    <label>Votre date de naissance</label>
                    <div style="flex: 2; display: flex; gap: 5px;">
                        <input type="date" name="date_naissance" required style="width: 100%;">
                    </div>
                </div>
                <div class="belline-form-group">
                    <label>Votre photo (recommandée)</label>
                    <input type="file" name="photo">
                </div>
                <div class="belline-form-group">
                    <label>Consultation par</label>
                    <div class="radio-group">
                        <label><input type="radio" name="type_consultation" value="mail" checked> Mail</label>
                        <label><input type="radio" name="type_consultation" value="tchat"> Tchat</label>
                    </div>
                </div>
                <div class="belline-form-group">
                    <label>Date du rendez-vous</label>
                    <div style="flex: 2; display: flex; gap: 5px;">
                        <input type="date" name="date_rdv" style="width: 100%;">
                    </div>
                </div>
                <div class="belline-form-group">
                    <label>Heure du rendez-vous</label>
                    <div style="flex: 2; display: flex; gap: 5px;">
                        <input type="time" name="heure_rdv" style="width: 100%;">
                    </div>
                </div>
                <div class="belline-form-group">
                    <label>Votre question concerne</label>
                    <select name="theme_question" style="flex: 2;">
                        <option value="amour">Amour</option>
                        <option value="travail">Travail</option>
                        <option value="argent">Argent</option>
                        <option value="famille">Famille</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>
                <div class="belline-form-group" style="align-items: flex-start;">
                    <label>Exposez moi votre problème précis</label>
                    <textarea name="probleme" rows="5" required></textarea>
                </div>
                <div class="submit-btn-container">
                    <button type="submit" class="submit-btn">Envoyer le<br>formulaire</button>
                </div>
            </form>
        </div>

        <!-- Mail Content -->
        <div id="content-mail" class="spa-content-section">
            <h2 style="color: yellow; font-style: italic;">Consultation détaillée par Mail</h2>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arobase.png" alt="Mail" style="margin: 20px auto; display: block; max-width: 150px;">

            <p style="font-style: italic; font-weight: bold;">Dans un monde où les questions sur l'avenir, les relations et les choix de vie sont fréquentes, la voyance se présente comme un outil précieux pour obtenir des éclaircissements et des conseils.</p>

            <p style="font-style: italic; font-weight: bold;">La consultation de voyance par mail offre une solution moderne et accessible à tous ceux qui cherchent des réponses sans avoir à se déplacer. Grâce à cette méthode, vous pouvez poser votre question en toute confidentialité et recevoir une réponse personnalisée directement dans votre boîte de réception.</p>

            <p style="font-style: italic; font-weight: bold;">Que vous soyez curieux de connaître ce que l'avenir vous réserve ou que vous ayez besoin d'un soutien dans une période de questionnement, la voyance par mail vous permet d'explorer vos préoccupations à votre rythme, tout en bénéficiant de mon expertise en qualité de praticien qualifié.</p>

            <p style="color: yellow; font-style: italic; font-weight: bold;">Pour le paiement de cette consultation, rapprochez-vous de la rubrique "Dons"</p>
            <p style="font-style: italic; font-weight: bold;">Stéphane.</p>

            <form class="belline-form" method="POST" action="" enctype="multipart/form-data">
                <div class="belline-form-group">
                    <label>Votre prénom</label>
                    <input type="text" name="prenom" required>
                </div>
                <div class="belline-form-group">
                    <label>Votre adresse mail</label>
                    <input type="email" name="email" required>
                </div>
                <div class="belline-form-group">
                    <label>Votre date de naissance</label>
                    <div style="flex: 2; display: flex; gap: 5px;">
                        <input type="date" name="date_naissance" required style="width: 100%;">
                    </div>
                </div>
                <div class="belline-form-group">
                    <label>Votre photo (recommandée)</label>
                    <input type="file" name="photo">
                </div>
                <div class="belline-form-group">
                    <label>Votre question concerne</label>
                    <select name="theme_question" style="flex: 2;">
                        <option value="amour">Amour</option>
                        <option value="travail">Travail</option>
                        <option value="argent">Argent</option>
                        <option value="famille">Famille</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>
                <div class="belline-form-group" style="align-items: flex-start;">
                    <label>Exposez moi votre problème précis</label>
                    <textarea name="probleme" rows="5" required></textarea>
                </div>
                <div class="submit-btn-container">
                    <button type="submit" class="submit-btn">Envoyer le<br>formulaire</button>
                </div>
            </form>
        </div>

        <!-- Tchat Content -->
        <div id="content-tchat" class="spa-content-section">
            <h2>Consultation par Tchat</h2>
            <p><em>Contenu à venir...</em></p>
        </div>

        <!-- Magie Blanche Content -->
        <div id="content-magie" class="spa-content-section">
            <h2>Magie Blanche</h2>
            <p><em>Contenu à venir...</em></p>
        </div>

        <!-- Coaching Content -->
        <div id="content-coaching" class="spa-content-section">
            <h2>Coaching</h2>
            <p><em>Contenu à venir...</em></p>
        </div>

        <!-- À domicile Content -->
        <div id="content-domicile" class="spa-content-section">
            <h2>Consultation à domicile</h2>
            <p><em>Contenu à venir...</em></p>
        </div>

        <!-- Vos Dons Content -->
        <div id="content-dons" class="spa-content-section">
            <h2>Vos Dons</h2>
            <p><em>Contenu à venir...</em></p>
        </div>

        <!-- 32 cartes Content -->
        <div id="content-cartes32" class="spa-content-section">
            <h2>Jeu de 32 Cartes</h2>
            <p><em>Contenu à venir...</em></p>
        </div>

        <!-- Oracle Belline Content -->
        <div id="content-belline" class="spa-content-section">
            <h2>Oracle Belline</h2>
            <p><em>Contenu à venir...</em></p>
        </div>

        <!-- Les Tarots Content -->
        <div id="content-tarots" class="spa-content-section">
            <h2>Les Tarots</h2>
            <p><em>Contenu à venir...</em></p>
        </div>

        <!-- Méthodes Content -->
        <div id="content-methodes" class="spa-content-section">
            <h2>Méthodes</h2>
            <p><em>Contenu à venir...</em></p>
        </div>

        <!-- Planètes Content -->
        <div id="content-planetes" class="spa-content-section">
            <h2>Planètes</h2>
            <p><em>Contenu à venir...</em></p>
        </div>

    </div>
    </div> <!-- Close spa-container -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.spa-button');
            const sections = document.querySelectorAll('.spa-content-section');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = 'content-' + this.getAttribute('data-target');

                    // Hide all sections
                    sections.forEach(section => {
                        section.classList.remove('active');
                    });

                    // Show target section
                    const targetSection = document.getElementById(targetId);
                    if (targetSection) {
                        targetSection.classList.add('active');
                    }
                });
            });
        });
    </script>

</main><!-- #main -->

<?php
get_footer();
