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
        <button class="spa-button" data-target="accueil" aria-label="Accueil" style="margin-bottom: 10px;"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Accueil_blue.png" alt="Accueil" style="margin: 0 auto;"></button>
        <div style="text-align: center; color: yellow; font-style: italic; font-weight: bold; margin-bottom: 10px; font-size: 1.2em;">Version PC</div>

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
            <h1 style="color: yellow; font-style: italic;">Bienvenue sur mon site de voyance, de magie blanche et de coaching personnel</h1>
            <p style="font-style: italic; font-weight: bold;">votre destination privilégiée pour explorer l'univers mystérieux de la clairvoyance et de la spiritualité. Que vous soyez en quête de réponses à des questions personnelles, professionnelles ou sentimentales, je suis expérimenté et là pour vous guider avec bienveillance et précision.</p>

            <p style="font-style: italic; font-weight: bold;">Ici pas de tarif, je vous offre la possibilité d'avoir recours aux dons en fonction de votre degré de satisfaction mais dans la limite du raisonnable... Je vous invite à vous rapprocher de la rubrique dédiée à cet effet et à prendre connaissance de la moyenne de ce que mes consultants m'offrent en contrepartie de mes séances.</p>

            <h2 style="color: yellow; font-style: italic; margin-top: 30px;">Les consultations,</h2>

            <p style="font-style: italic; font-weight: bold;">La voyance et la magie blanche sont deux pratiques spirituelles qui s’entrelacent pour offrir des outils puissants d’orientation et de transformation personnelle. La magie blanche, souvent associée à des intentions bienveillantes, utilise des rituels et des énergies positives pour favoriser l’harmonie, la protection et la réussite. Elle vise à créer un environnement propice à l’épanouissement et à la réalisation des désirs.</p>

            <p style="font-style: italic; font-weight: bold;">La voyance permet d’accéder à des connaissances cachées et de percevoir des éléments du passé, du présent ou de l’avenir. Grâce à la cartomancie, je vous offre des éclairages précieux sur les choix à faire et les chemins à emprunter.</p>

            <p style="font-style: italic; font-weight: bold;">La magie blanche est associée à des pratiques spirituelles ou ésotériques qui visent à apporter des bienfaits, à protéger... Elle est généralement perçue comme une forme de magie positive, utilisée pour des intentions altruistes. Par exemple, elle peut être utilisée pour : Protéger et céer des sorts ou des rituels de protection contre les énergies négatives, aider l'émotionnelle, attirer l’amour, favoriser la prospérité et aider à rétablir l’harmonie et l’équilibre dans divers aspects de la vie.</p>

            <p style="font-style: italic; font-weight: bold;">Le coaching spirituel est un soutien qui vise à vous accompagner dans l’exploration et le développement de votre moi spirituel. Cela inclut la recherche de sens dans votre existence, la connexion avec votre être intérieur, l’harmonisation avec vos valeurs et croyances ainsi que votre épanouissement personnel.</p>

            <p style="font-style: italic; font-weight: bold;">En combinant ces disciplines, il est possible de non seulement comprendre les défis et les opportunités qui se présentent, mais aussi d’invoquer des énergies bénéfiques pour favoriser des résultats positifs. Que vous cherchiez à clarifier votre chemin de vie, à attirer l’amour, ou à surmonter des obstacles, la magie blanche, la voyance et le coaching spirituel peuvent vous guider vers un avenir radieux.</p>

            <p style="font-style: italic; font-weight: bold;">Découvrez mes services de consultations par mail, par tchat ainsi qu'en matière de coaching spirituel et laissez la magie, les cartes et la spiritualité vous éclairer sur votre chemin. Osez la découverte de vous-même et de votre avenir avec confiance et sérénité.</p>

            <p style="font-style: italic; font-weight: bold;">Votre avenir n'est pas figé, mais il est le fruit de vos choix et de vos intentions.<br>
            En prenant conscience de votre pouvoir personnel et en écoutant les conseils que je vous offre, vous pourrez prendre des décisions éclairées et vous épanouir.</p>

            <p style="font-style: italic; font-weight: bold;">Je vous invite à poser vos questions, à partager vos préoccupations, et ensemble, nous explorerons les chemins qui s'offrent à vous.</p>

            <p style="font-style: italic; font-weight: bold; color: yellow;">Votre voyage vers l'épanouissement commence ici !</p>

            <h2 style="color: yellow; font-style: italic; margin-top: 30px;">Mes prestations,</h2>

            <p style="font-style: italic; font-weight: bold;">Vous pouvez me poser votre question de voyance gratuitement par mail ou tchat (rdv).<br>
            <span style="color: yellow;">(Offre réservée aux nouveaux consultants et valable une seule fois)</span></p>

            <p style="font-style: italic; font-weight: bold;">Pour une consultation detaillée de voyance par mail et selon votre problèmatique, je vous réponds sous quelques minutes ou quelques heures suivant mes disponibilités.</p>

            <p style="font-style: italic; font-weight: bold;">Pour une consultation de voyance détaillée par tchat, d'une demi heure ou d'une heure environ et selon votre problèmatique, je vous reçois de 8h à 21h sur rdv.</p>

            <p style="font-style: italic; font-weight: bold;">Dans le domaine de la magie blanche, je vous reçois de de 8h à 21h par tchat sur rdv.</p>

            <p style="font-style: italic; font-weight: bold;">Dans le cadre de mon coaching spirituel, je vous reçois de 8h à 21h par tchat sur rdv.</p>

            <p style="font-style: italic; font-weight: bold;">Exceptionnel : Je vous propose de me déplacer à votre domicile dans un rayon de 15 kms aux alentours de Saint Florent sur Cher (à 20 kms de la ville de Bourges dans le département du Cher 18000) de 8h à 19h sur rendez-vous.</p>

            <p style="font-style: italic; font-weight: bold;">Découvrez également mon interprétation des lames de l'Oracle Belline, du jeu de 32 cartes, ainsi que des arcanes majeurs du Tarot de Marseille.</p>

            <p style="font-style: italic; font-weight: bold;">Je souhaite vous exprimer ma gratitude pour la confiance que vous m'accordez, car vous êtes de plus en plus nombreux à faire appel à mes services chaque jour.</p>

            <p style="font-style: italic; font-weight: bold;">Stéphane.</p>
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
            <h2 style="color: yellow; font-style: italic;">Consultation détaillée par Tchat</h2>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tchat.png" alt="Tchat" style="margin: 20px auto; display: block; max-width: 150px;">

            <p style="font-style: italic; font-weight: bold;">La cartomancie est un outil puissant qui nous permet d'explorer les énergies qui vous entourent et d'accéder à des perspectives sur votre passé, votre présent et votre avenir.</p>

            <p style="font-style: italic; font-weight: bold;">Durant cette séance, nous allons utiliser l'Oracle Belline pour mieux comprendre vos préoccupations et vos aspirations. Les lames peuvent révéler des informations cachées et offrir des conseils précieux pour vous aider à prendre des décisions éclairées.</p>

            <p style="font-style: italic; font-weight: bold;">N'hésitez pas à partager vos questions ou vos intentions pour cette rencontre, car cela m'aidera à orienter mon tirage. Rappelez-vous que cette expérience est avant tout un moment de réflexion et d'introspection, où vous pourrez découvrir des éléments de votre cheminement personnel.</p>

            <p style="font-style: italic; font-weight: bold;">Ouvrons ensemble la porte à la sagesse des cartes et plongeons dans cette aventure...</p>

            <p style="font-style: italic; font-weight: bold;">N'hésitez pas à me contacter pour planifier votre séance et commencer cette belle aventure vers le futur et l'épanouissement personnel.</p>

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

        <!-- Magie Blanche Content -->
        <div id="content-magie" class="spa-content-section">
<div class="OESZ OESZ_DivContent OESZG_WE8bfb2a0fb0">
    <div style="text-align: center; margin-bottom: 20px;">
        <h2 style="color: #ffff00; font-style: italic; font-family: 'Times New Roman', Times, serif;">Consultation de Magie Blanche</h2>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bougies.png" alt="Bougies" style="max-width: 200px; margin-top: 10px;">
    </div>

    <div style="text-align: center; font-style: italic; font-weight: bold; font-family: 'Times New Roman', Times, serif; line-height: 1.6; margin-bottom: 20px;">
        <p>La magie blanche est une pratique spirituelle bienveillante qui utilise des éléments naturels pour canaliser des énergies positives et favoriser l'harmonie dans la vie des individus. Au cœur de cette approche, on trouve des outils tels que les cristaux, les bougies et l'encens, chacun ayant ses propres propriétés et significations.</p>

        <p>Les cristaux sont des réceptacles d'énergie qui peuvent amplifier les intentions et favoriser vos domaines de prédilections. Chaque cristal possède des vibrations uniques et peut être utilisée pour des objectifs spécifiques, comme la protection, l'amour, le domaine professionnel, la clarté mentale... En les intégrant dans des rituels ou en les portant sur soi, on peut bénéficier de leurs effets apaisants et énergisants.</p>

        <p>Les bougies, quant à elles, jouent un rôle central dans la magie blanche. Elles sont souvent allumées lors de rituels pour symboliser l'illumination, la purification et l'intention. La couleur de la bougie choisie peut également avoir une signification particulière, renforçant ainsi le but du rituel. En se concentrant sur la flamme, on peut également méditer et se connecter à des énergies supérieures.</p>

        <p>L'encens, avec ses arômes envoûtants, est utilisé pour purifier l'espace et élever les vibrations durant les rituels. Il aide à créer une atmosphère propice à la méditation et à la concentration, tout en permettant de se relier aux mondes spirituels. Différents types d'encens correspondent à des intentions spécifiques, que ce soit par exemple, pour la protection, l'amour ou la prospérité.</p>

        <p>En somme, la magie blanche, enrichie par l'utilisation de cristaux, de bougies et d'encens, offre une palette d'outils puissants pour ceux qui souhaitent se connecter à leur essence spirituelle, améliorer leur quotidien et manifester leurs désirs dans un cadre de bienveillance et d'harmonie.</p>

        <p>Concernant le domaine sentimental, entre autre, la magie blanche est en mesure de vous aider à trouver l'amour, renforcer les relations existantes, nouer une amitié sincère...</p>

        <p>En ce qui concerne le secteur professionnel, elle a la capacité de vous remettre sur la bonne voie, de vous orienter dans votre recherche d'emploi, de vous aider à identifier des opportunités et de favoriser votre prospérité.</p>

        <p>Contrairement à la magie noire, la magie blanche est pratiquée dans le respect du libre arbitre et vise à apporter du bien-être et des énergies positives. Beaucoup d'autres domaines de prédilections existent en magie blanche.</p>

        <p>L'art de la magie ne se base pas sur des principes scientifiques rigoureux. Environ 5 à 7% des consultants ne sont pas réceptifs selon mes propres statistiques.</p>
    </div>

    <div style="text-align: center; margin-bottom: 20px;">
        <h2 style="color: #ffff00; font-style: italic; font-family: 'Times New Roman', Times, serif;">La séance :</h2>
    </div>

    <div style="text-align: center; font-style: italic; font-weight: bold; font-family: 'Times New Roman', Times, serif; line-height: 1.6; margin-bottom: 30px;">
        <p>Des entretiens <span style="color: #ffff00;">gratuits par mail</span> seront organisés pour aborder votre ou vos problèmatiques ainsi que vos souhaits et désirs.</p>

        <p>À l'issue de ces entretiens, nous organiserons une séance par <span style="color: #ffff00;">tchat</span> me permettant de sélectionner pour vous le cristal à magnétiser.</p>

        <p>Plusieurs possibilités vous serons donnés : colliers, pendentifs, boucles d'oreilles, pierre brute, etc... Ce cristal vous sera envoyée par "colissimo" ou enveloppe à bulle avec les incantations et recommandations à suivre. Elle sera expédiée à l'adresse que vous m'indiquerez ou en poste restante pour préserver votre anonymat.</p>

        <p>N'hésitez pas à me contacter pour planifier votre séance et commencer cette belle aventure vers le futur et l'épanouissement personnel.</p>

        <p>PS : Il est nécessaire de remagnétiser la pierre une fois par an. Il vous suffira de me la renvoyer, et je procéderai à son rechargement gratuitement (hors frais d'envoi).</p>

        <p style="color: #ffff00;">Pour le paiement de cette consultation, rapprochez-vous de la rubrique "Dons"</p>

        <p>Stéphane.</p>
    </div>

    <div style="font-family: 'Times New Roman', Times, serif; font-style: italic; font-weight: bold;">
        <form method="POST" action="" enctype="multipart/form-data">
            <table style="width: 100%; border-collapse: separate; border-spacing: 0 15px;">
                <tr>
                    <td style="text-align: right; padding-right: 20px; width: 40%;"><label for="magie-prenom">Votre prénom</label></td>
                    <td><input type="text" id="magie-prenom" name="prenom" style="width: 80%; padding: 5px;"></td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="magie-mail">Votre adresse mail</label></td>
                    <td><input type="email" id="magie-mail" name="mail" style="width: 80%; padding: 5px;" required></td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="magie-naissance">Votre date de naissance</label></td>
                    <td>
                        <input type="date" id="magie-naissance" name="date_naissance" style="padding: 5px;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="magie-sexe">Sexe</label></td>
                    <td>
                        <select id="magie-sexe" name="sexe" style="padding: 5px;">
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="magie-photo">Votre photo (souhaitée)</label></td>
                    <td>
                        <input type="file" id="magie-photo" name="photo" accept="image/*" style="padding: 5px;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="magie-date-rdv">Date du rendez-vous</label></td>
                    <td>
                        <input type="date" id="magie-date-rdv" name="date_rdv" style="padding: 5px;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="magie-heure-rdv">Heure du rendez-vous</label></td>
                    <td>
                        <input type="time" id="magie-heure-rdv" name="heure_rdv" style="padding: 5px;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="magie-question">Votre question concerne</label></td>
                    <td>
                        <select id="magie-question" name="domaine" style="padding: 5px;">
                            <option value="Amour">Amour</option>
                            <option value="Travail">Travail</option>
                            <option value="Argent">Argent</option>
                            <option value="Sante">Santé</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px; vertical-align: top;"><label for="magie-probleme">Exposez-moi votre problème précis</label></td>
                    <td>
                        <textarea id="magie-probleme" name="probleme" style="width: 80%; height: 150px; padding: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" style="padding: 10px 20px; cursor: pointer; font-family: 'Times New Roman', Times, serif; font-style: italic; font-weight: bold;">Envoyer</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

        </div>

        <!-- Coaching Content -->
        <div id="content-coaching" class="spa-content-section">
<div class="OESZ OESZ_DivContent OESZG_WE8bfb2a0fb0">
    <div style="text-align: center; margin-bottom: 20px;">
        <h2 style="color: #ffff00; font-style: italic; font-family: 'Times New Roman', Times, serif;">Coaching spirituel</h2>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/spirituel.png" alt="Coaching spirituel" style="max-width: 200px; margin-top: 10px;">
    </div>

    <div style="text-align: center; font-style: italic; font-weight: bold; font-family: 'Times New Roman', Times, serif; line-height: 1.6; margin-bottom: 20px;">
        <p>Le coaching spirituel, constitue un accompagnement destiné à vous aider à explorer et à développer votre dimension spirituelle. Cela peut englober la quête de sens dans la vie, la connexion avec soi-même, l’alignement avec ses valeurs et croyances, ainsi que l’épanouissement personnel. Voici quelques aspects fondamentaux du coaching spirituel</p>

        <p>- <span style="color: #ffff00;">Prise de conscience :</span> Cette approche encourage l’introspection afin de mieux comprendre ses émotions, ses pensées et ses comportements, ce qui permet de mieux identifier ses besoins fondamentaux.</p>

        <p>- <span style="color: #ffff00;">Définition d’objectifs :</span> En collaboration, nous établirons des objectifs spirituels précis, qu’il s’agisse de découvrir un sens à sa vie, de cultiver une pratique de méditation ou d’améliorer vos relations interpersonnelles.</p>

        <p>- <span style="color: #ffff00;">Affinement de l’intuition :</span> Le coaching spirituel vise à développer l’intuition personnelle, facilitant ainsi l’écoute de ses ressentis et la prise de décisions en accord avec son moi intérieur.</p>

        <p>- <span style="color: #ffff00;">Soutien durant les transitions :</span> Que ce soit face à un changement de carrière, une perte ou une quête de sens, le coaching spirituel offre un soutien précieux pour naviguer à travers ces périodes de transition.</p>

        <p>- <span style="color: #ffff00;">Création d’un espace de confiance :</span> Nous établirons un cadre sûr et accueillant où vous pouvez vous exprimer librement, sans crainte de jugement.</p>

        <p>N’hésitez pas à me contacter pour planifier votre séance et commencer cette belle aventure vers le futur et l’épanouissement personnel.</p>

        <p style="color: #ffff00;">Pour le paiement de cette consultation, rapprochez-vous de la rubrique "Dons"</p>

        <p>Stéphane</p>
    </div>

    <div style="font-family: 'Times New Roman', Times, serif; font-style: italic; font-weight: bold;">
        <form method="POST" action="" enctype="multipart/form-data">
            <table style="width: 100%; border-collapse: separate; border-spacing: 0 15px;">
                <tr>
                    <td style="text-align: right; padding-right: 20px; width: 40%;"><label for="coaching-prenom">Votre prénom</label></td>
                    <td><input type="text" id="coaching-prenom" name="prenom" style="width: 80%; padding: 5px;"></td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="coaching-mail">Votre adresse mail</label></td>
                    <td><input type="email" id="coaching-mail" name="mail" style="width: 80%; padding: 5px;" required></td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="coaching-naissance">Votre date de naissance</label></td>
                    <td>
                        <input type="date" id="coaching-naissance" name="date_naissance" style="padding: 5px;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="coaching-date-rdv">Date du rendez-vous</label></td>
                    <td>
                        <input type="date" id="coaching-date-rdv" name="date_rdv" style="padding: 5px;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="coaching-heure-rdv">Heure du rendez-vous</label></td>
                    <td>
                        <input type="time" id="coaching-heure-rdv" name="heure_rdv" style="padding: 5px;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="coaching-photo">Votre photo (recommandée)</label></td>
                    <td>
                        <input type="file" id="coaching-photo" name="photo" accept="image/*" style="padding: 5px;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="coaching-question">Votre question concerne</label></td>
                    <td>
                        <select id="coaching-question" name="domaine" style="padding: 5px;">
                            <option value="Amour">Amour</option>
                            <option value="Travail">Travail</option>
                            <option value="Argent">Argent</option>
                            <option value="Sante">Santé</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px; vertical-align: top;"><label for="coaching-probleme">Exposez moi votre problème précis</label></td>
                    <td>
                        <textarea id="coaching-probleme" name="probleme" style="width: 80%; height: 150px; padding: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" style="padding: 10px 20px; cursor: pointer; font-family: 'Times New Roman', Times, serif; font-style: italic; font-weight: bold;">Envoyer le<br>formulaire</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

        </div>

        <!-- À domicile Content -->
        <div id="content-domicile" class="spa-content-section">
<div class="OESZ OESZ_DivContent OESZG_WE8bfb2a0fb0">
    <div style="text-align: center; margin-bottom: 20px;">
        <h2 style="color: #ffff00; font-style: italic; font-family: 'Times New Roman', Times, serif;">Consultation à votre domicile</h2>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icone_domicile.png" alt="Consultation à votre domicile" style="max-width: 200px; margin-top: 10px;">
    </div>

    <div style="text-align: center; font-style: italic; font-weight: bold; font-family: 'Times New Roman', Times, serif; line-height: 1.6; margin-bottom: 20px;">
        <p>Je vous propose un service unique : des séances à domicile, vous permettant de bénéficier d’une expérience intime et personnalisée dans le confort de votre logement.</p>

        <p>La voyance et la cartomancie sont des pratiques ancestrales qui nous connectent à notre intuition et à l’énergie qui nous entoure. Grâce à des lectures de cartes, tels que les oracles, je peux vous aider à éclaircir vos préoccupations, qu’elles soient liées à l’amour, au travail, à la famille ou à d’autres aspects de votre vie.</p>

        <p>Le coaching spirituel, quand à lui, est beaucoup plus récent et permet, entre autre chose, de se reconnecter à son moi intérieur, d'affiner son intuition, permet le soutien durant les transitions de la vie...</p>

        <p>En choisissant une consultation à domicile, vous vous offrez un moment privilégié, où confort et confidentialité sont au rendez-vous. Ensemble, nous découvrirons ce que l’univers a à vous révéler et comment vous pouvez utiliser ces connaissances pour avancer sur votre chemin de vie.</p>

        <p>Je vous propose de me déplacer à votre domicile dans un rayon de 15 kms aux alentours de St Florent sur Cher (à 20 kms de la ville de Bourges dans le département du Cher 18000) de 9h à 19h.</p>

        <p>N’hésitez pas à me contacter pour planifier votre séance et commencer cette belle aventure vers le futur et l’épanouissement personnel.</p>

        <p style="color: #ffff00;">Pour le paiement de cette consultation, rapprochez-vous de la rubrique "Dons"</p>

        <p>Stéphane</p>
    </div>

    <div style="font-family: 'Times New Roman', Times, serif; font-style: italic; font-weight: bold;">
        <form method="POST" action="" enctype="multipart/form-data">
            <table style="width: 100%; border-collapse: separate; border-spacing: 0 15px;">
                <tr>
                    <td style="text-align: right; padding-right: 20px; width: 40%;"><label for="domicile-prenom">Votre prénom</label></td>
                    <td><input type="text" id="domicile-prenom" name="prenom" style="width: 80%; padding: 5px;"></td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="domicile-mail">Votre adresse mail</label></td>
                    <td><input type="email" id="domicile-mail" name="mail" style="width: 80%; padding: 5px;" required></td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="domicile-naissance">Votre date de naissance</label></td>
                    <td>
                        <input type="date" id="domicile-naissance" name="date_naissance" style="padding: 5px;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="domicile-date-rdv">Date du rendez-vous</label></td>
                    <td>
                        <input type="date" id="domicile-date-rdv" name="date_rdv" style="padding: 5px;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="domicile-heure-rdv">Heure du rendez-vous</label></td>
                    <td>
                        <input type="time" id="domicile-heure-rdv" name="heure_rdv" style="padding: 5px;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="domicile-photo">Votre photo (recommandée)</label></td>
                    <td>
                        <input type="file" id="domicile-photo" name="photo" accept="image/*" style="padding: 5px;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px;"><label for="domicile-question">Votre question concerne</label></td>
                    <td>
                        <select id="domicile-question" name="domaine" style="padding: 5px;">
                            <option value="Amour">Amour</option>
                            <option value="Travail">Travail</option>
                            <option value="Argent">Argent</option>
                            <option value="Sante">Santé</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 20px; vertical-align: top;"><label for="domicile-probleme">Exposez moi votre problème précis</label></td>
                    <td>
                        <textarea id="domicile-probleme" name="probleme" style="width: 80%; height: 150px; padding: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" style="padding: 10px 20px; cursor: pointer; font-family: 'Times New Roman', Times, serif; font-style: italic; font-weight: bold;">Envoyer le<br>formulaire</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

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
