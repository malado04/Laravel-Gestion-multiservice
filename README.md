# Laravel Gestion Multiservice

## Plateforme de gestion centralisée d'un réseau multiservices

**Laravel Gestion Multiservice** est une application web développée avec **Laravel** pour centraliser la gestion d'un réseau de points de vente (PDV), de caisses, de services, d'opérations financières, de commissions, de soldes et de ressources humaines.

L'objectif du projet est de fournir une plateforme permettant de gérer plusieurs structures et activités multiservices depuis une interface d'administration centralisée.

---

## 🎯 Objectifs

La plateforme permet notamment de :

* centraliser la gestion des points de vente ;
* organiser les PDV par zones ;
* gérer les caisses associées aux points de vente ;
* enregistrer et suivre les opérations ;
* suivre les soldes ;
* configurer les commissions ;
* administrer un catalogue de services et sous-services ;
* gérer les utilisateurs et leurs responsabilités ;
* assurer la traçabilité des opérations et des actions administratives ;
* centraliser certaines informations liées aux ressources humaines.

---

## ✨ Fonctionnalités

### 🏪 Gestion des points de vente — PDV

Le système permet de gérer les différents points de vente du réseau.

Les informations peuvent notamment inclure :

* informations du point de vente ;
* informations légales ;
* NINEA ;
* numéro de registre ;
* propriétaire du PDV ;
* zone géographique ;
* état et informations administratives.

Les PDV peuvent être organisés selon une structure géographique basée sur les zones.

---

### 🌍 Gestion des zones

Le module de gestion des zones permet de structurer géographiquement le réseau.

Une zone peut regrouper plusieurs points de vente afin de faciliter :

* l'organisation du réseau ;
* le suivi des activités ;
* la supervision ;
* la gestion administrative.

---

### 💰 Gestion des caisses

Chaque point de vente peut disposer d'une ou plusieurs caisses.

Le module permet notamment de :

* créer une caisse ;
* associer une caisse à une structure ;
* suivre les opérations de caisse ;
* suivre les soldes ;
* assurer la traçabilité des opérations.

---

### 🔄 Gestion des opérations

Les opérations constituent un élément central de la plateforme.

Le système permet d'enregistrer les transactions avec des informations telles que :

* montant ;
* type d'opération ;
* service concerné ;
* caisse concernée ;
* utilisateur responsable ;
* informations de traçabilité ;
* dates de création et de modification.

Les opérations peuvent ensuite être exploitées pour le suivi financier et administratif.

---

### 💵 Gestion des soldes

Le module de gestion des soldes permet de suivre les disponibilités financières liées aux caisses et aux services.

Il permet notamment de :

* consulter les soldes ;
* suivre les mouvements ;
* rattacher les informations financières aux structures concernées ;
* faciliter le contrôle des opérations.

---

### 💸 Gestion des commissions

Le système permet de configurer les commissions associées aux services.

Les règles de commission peuvent notamment être définies selon :

* le service ;
* un montant minimum ;
* un montant maximum ;
* une règle de commission ;
* la structure concernée.

Cette approche permet de gérer des mécanismes de commissionnement basés sur des tranches.

---

### 🧾 Gestion des services

La plateforme propose un catalogue de services multiservices.

Le système prend en charge une organisation pouvant distinguer :

```text
Service
   │
   ├── Sous-service
   ├── Sous-service
   └── Sous-service
```

Cette structure permet d'organiser différents services proposés par le réseau.

---

### 👥 Gestion des utilisateurs

L'application intègre la gestion des utilisateurs et de leurs responsabilités.

Les routes et contrôleurs du projet prennent notamment en charge :

* utilisateurs ;
* superviseurs ;
* administrateurs ;
* gérants ;
* agents.

Les espaces de travail peuvent être différenciés selon le profil de l'utilisateur.

---

### 📊 Tableaux de bord

Le projet possède différents espaces selon le profil utilisateur.

Exemples :

```text
Administrateur
      │
      ├── Dashboard principal
      │
      ├── Gestion utilisateurs
      ├── PDV
      ├── Zones
      ├── Caisses
      ├── Services
      └── Opérations

Gérant
      │
      └── Dashboard gérant

Agent
      │
      └── Dashboard agent
```

Cette séparation permet d'adapter l'accès aux fonctionnalités selon les responsabilités.

---

## 👨‍💼 Gestion des ressources humaines

Le système intègre également des fonctionnalités liées à la gestion administrative des collaborateurs.

Les informations peuvent notamment concerner :

* identité ;
* coordonnées ;
* état civil ;
* contacts d'urgence ;
* informations contractuelles ;
* salaire ;
* date d'affectation ;
* prise de fonction ;
* rattachement administratif.

---

## 🔐 Gestion des rôles et accès

L'application utilise un système de contrôle des accès basé sur l'authentification Laravel.

Les différents niveaux d'utilisateur permettent d'adapter les espaces et fonctionnalités disponibles.

Exemple de logique métier utilisée dans l'application :

```text
0 → Administrateur / Propriétaire
1 → Gérant / Superviseur
2 → Agent
```

La gestion des utilisateurs et des responsabilités est intégrée au fonctionnement global de la plateforme.

---

## 🧭 Architecture fonctionnelle

L'organisation générale peut être représentée ainsi :

```text
                         APPLICATION
                              │
                              ▼
                     ┌─────────────────┐
                     │  Authentification│
                     └────────┬────────┘
                              │
             ┌────────────────┼────────────────┐
             │                │                │
             ▼                ▼                ▼
          ADMIN            GÉRANT            AGENT
             │                │                │
             └────────────────┼────────────────┘
                              │
              ┌───────────────┼────────────────┐
              │               │                │
              ▼               ▼                ▼
             PDV           SERVICES          CAISSES
              │               │                │
              │               ▼                │
              │          COMMISSIONS           │
              │                                │
              └───────────────┬────────────────┘
                              │
                              ▼
                         OPÉRATIONS
                              │
                    ┌─────────┴─────────┐
                    ▼                   ▼
                 SOLDES             TRAÇABILITÉ
```

---

## 🔄 Exemple de flux métier

Un exemple de flux de traitement peut être représenté ainsi :

```text
Utilisateur
    │
    ▼
Point de vente
    │
    ▼
Caisse
    │
    ▼
Sélection du service
    │
    ▼
Opération
    │
    ├──────────────► Commission
    │
    └──────────────► Mise à jour du solde
```

Ce modèle permet de relier l'activité opérationnelle aux informations financières et administratives.

---

## 🏗️ Architecture technique

Le projet est construit selon l'architecture MVC de Laravel.

```text
Laravel Application
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
│
├── routes/
│   └── web.php
│
├── resources/
│   └── views/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│
├── config/
│
├── storage/
│
└── tests/
```

---

## 🛠️ Technologies

| Technologie         | Utilisation                      |
| ------------------- | -------------------------------- |
| **PHP**             | Langage principal                |
| **Laravel**         | Framework backend                |
| **Laravel Sanctum** | Authentification                 |
| **MySQL / SQL**     | Persistance des données          |
| **Blade**           | Interfaces web                   |
| **AdminLTE**        | Interface d'administration       |
| **JavaScript**      | Interactions côté client         |
| **HTML5 / CSS3**    | Interface utilisateur            |
| **Composer**        | Gestion des dépendances PHP      |
| **NPM**             | Gestion des dépendances frontend |

---

## 📂 Structure du projet

```text
Laravel-Gestion-multiservice/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── ControllerPdv.php
│   │       ├── ControllerCaisse.php
│   │       ├── ControllerZone.php
│   │       ├── ControllerSolde.php
│   │       ├── ControllerOperation.php
│   │       ├── ControllerCommission.php
│   │       ├── ControllerMultiservice.php
│   │       └── ControllerService.php
│   │
│   └── Models/
│
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
│   └── web.php
│
├── storage/
├── tests/
│
├── artisan
├── composer.json
├── package.json
├── phpunit.xml
└── README.md
```

---

## 🚀 Installation

### Prérequis

Avant d'installer le projet, disposer de :

* PHP ;
* Composer ;
* MySQL ou un SGBD compatible ;
* Node.js et NPM ;
* Git ;
* un serveur web compatible Laravel.

### Cloner le projet

```bash
git clone https://github.com/malado04/Laravel-Gestion-multiservice.git
```

Entrer dans le projet :

```bash
cd Laravel-Gestion-multiservice
```

### Installer les dépendances PHP

```bash
composer install
```

### Installer les dépendances frontend

```bash
npm install
```

### Configurer l'environnement

Copier le fichier `.env.example` :

```bash
cp .env.example .env
```

Générer la clé Laravel :

```bash
php artisan key:generate
```

Configurer ensuite les paramètres de connexion à la base de données dans `.env`.

Exemple :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=multiservice
DB_USERNAME=root
DB_PASSWORD=
```

### Exécuter les migrations

```bash
php artisan migrate
```

Si des seeders sont disponibles :

```bash
php artisan db:seed
```

### Compiler les ressources frontend

```bash
npm run dev
```

Pour une compilation de production :

```bash
npm run production
```

### Lancer l'application

```bash
php artisan serve
```

L'application sera alors accessible depuis l'environnement local Laravel.

---

## 🔐 Configuration et sécurité

Les informations sensibles doivent être configurées dans le fichier `.env` et ne doivent pas être versionnées.

Exemples :

```env
APP_KEY=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Le fichier `.env` doit rester privé dans un environnement de production.

---

## 🧪 Tests

Le projet contient une structure de tests Laravel.

Les tests peuvent être exécutés avec :

```bash
php artisan test
```

ou :

```bash
./vendor/bin/phpunit
```

---

## 📈 Évolutions possibles

Plusieurs évolutions peuvent être envisagées pour une version moderne de la plateforme :

### API REST

Exposer les fonctionnalités métier à travers une API REST afin de permettre :

* applications mobiles ;
* applications frontend Angular/React/Vue ;
* intégrations avec des systèmes externes ;
* automatisation des opérations.

### Architecture moderne

Une évolution progressive pourrait introduire :

```text
Laravel
   │
   ├── REST API
   │
   ├── Authentication
   │
   ├── Business Services
   │
   └── Database
```

### Observabilité

Ajouter progressivement :

* logs structurés ;
* monitoring ;
* suivi des erreurs ;
* audit des opérations ;
* indicateurs de performance.

### Sécurité

Renforcer progressivement :

* contrôle d'accès par rôle ;
* validation des données ;
* protection des API ;
* gestion sécurisée des tokens ;
* audit des opérations sensibles.

---

## 🎓 Compétences démontrées

Ce projet met en évidence plusieurs compétences de développement logiciel :

* développement backend PHP ;
* développement Laravel ;
* architecture MVC ;
* conception de fonctionnalités métier ;
* gestion des utilisateurs et des rôles ;
* gestion de transactions ;
* gestion des données financières ;
* conception de relations entre entités ;
* développement d'interfaces d'administration ;
* authentification ;
* gestion de bases de données ;
* conception d'une application multiservices ;
* structuration d'une application métier.

---

## 📌 État du projet

**Statut : Projet fonctionnel / évolution continue**

Le dépôt constitue une base applicative pour la gestion d'un réseau multiservices et peut évoluer vers une architecture plus moderne orientée API et applications frontend/mobile.

---

## 👨‍💻 Auteur

**Amadou Malado Ndiaye**

**Software Engineer | Full Stack Developer | Software Architecture**

Technologies principales :

```text
PHP / Laravel
Java / Spring Boot
Angular / TypeScript
JavaScript
PostgreSQL / MySQL
REST API
Docker
Linux
Git / GitHub
```

---

## 📄 Licence

Projet présenté à des fins de démonstration, de portfolio et de développement logiciel.

---

## ⭐ Repository

[Laravel Gestion Multiservice](https://github.com/malado04/Laravel-Gestion-multiservice)

---
