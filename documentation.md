# 📄 Documentation - Script de Scraping Lemonde.fr

## 🧩 Prérequis

- PHP 7.4 ou supérieur
- Connexion Internet active
- Accès en ligne de commande (Terminal, PowerShell, etc.)

## ⚙️ Commande d'exécution

Dans le terminal, placez-vous dans le dossier du projet puis lancez :

```bash
php scraper.php
```


 ## Structure attendue des fichiers en sortie
Après exécution du script :

cpp
Copier
Modifier
scraping-lemonde/
├── scraper.php                 // Script principal
├── scraped_titles.json         // ✅ Fichier contenant les titres d'articles (JSON)
└── errors.log                  // ❌ Journal des erreurs (créé seulement si erreur)

.scraped_titles.json : contient un tableau de titres extraits.

.errors.log : contient les erreurs rencontrées avec date et heure.

 ## ⚠️ Erreurs courantes et solutions

Erreur	
1. Structure HTML absente : Le site a changé de structure
2. Timeout ou erreur cURL : Problème de connexion réseau
3. scraped_titles.json vide : Aucun titre détecté
4. errors.log généré : Une erreur est survenue

Solution
1. Adapter les sélecteurs DOM dans le script
2. Vérifier connexion, relancer plus tard
3. Revoir les balises ciblées (h2, h3)
4. Lire le fichier errors.log pour le détail

👤 Auteur
Ramanandafy
