Le système est conçu pour la gestion centralisée d'un réseau multi-services (points de vente, opérations financières, ressources humaines). Voici les principaux modules fonctionnels :

1. Gestion des Structures et du Réseau
Multiservices & PDV (Points de Vente) : Gestion centralisée des entités commerciales, incluant le suivi des informations légales (NINEA, Numéro de Registre) et la structuration géographique par zones.

Gestion des Caisses : Création et attribution de caisses spécifiques à chaque point de vente.

2. Gestion des Opérations et Finances
Suivi des Opérations : Enregistrement complet des transactions (montants, types d'opérations, services associés) et traçabilité par caisse.

Gestion des Soldes : Suivi en temps réel des soldes disponibles par caisse et par service.

Configuration des Commissions : Paramétrage dynamique des commissions par service, incluant des règles basées sur des tranches (minimum/maximum).

Catalogue de Services : Gestion hiérarchique des services proposés (services et sous-services).

3. Gestion des Ressources Humaines (RH)
Base de données employés : Gestion complète du profil utilisateur (informations personnelles, état civil, contacts d'urgence).

Suivi administratif : Gestion des contrats, salaires, dates d'affectation et informations liées à la prise de fonction.

Hiérarchie et Traçabilité : Chaque entité du système (PDV, opération, commission) est rattachée à un propriétaire (fk_proprio_id) et assure la traçabilité des actions via des clés d'insertion (fk_sup_id) et de mise à jour (fk_up_id).

4. Spécificités Techniques
Authentification sécurisée : Système basé sur Laravel Sanctum avec gestion des rôles.

Intégration AdminLTE : Interface d'administration pré-configurée pour une gestion fluide des profils et des espaces de travail.
