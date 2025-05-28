# Scraping Le Monde

Ce projet est un script PHP simple qui récupère les titres des articles du site [lemonde.fr](https://www.lemonde.fr) et les sauvegarde dans un fichier JSON.

---

## Fonctionnalités

- Récupération des titres des articles via scraping.
- Sauvegarde des titres dans `scraped_titles.json`.
- Gestion robuste des erreurs (timeout, absence de structure HTML, erreurs réseau).
- Journalisation des erreurs dans `errors.log` avec horodatage.

---

## Installation

1. Clonez ce dépôt :
   ```bash
   git clone https://github.com/Ramanandafy/scraping-lemonde.git
   cd scraping-lemonde

Exécutez le script PHP en ligne de commande :
php scraper.php