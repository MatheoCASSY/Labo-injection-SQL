# Projet : Lab de Vulnérabilités Web — Injection SQL

Page "centrale" du projet : login.php

## 🎯 Objectif du projet

Ce labo a pour but de créer un **site web volontairement vulnérable**, afin de comprendre les mécanismes d'une **injection SQL**.

---

## 🛠️ Technologies utilisées

- **WAMP**
- **PHP** 
- **MySql**
- **HTML/CSS**

---

## 🧱 Étapes de réalisation

### 1. Création d'une base de données

Un script `setup.php` initialise une base sql, avec une table `users` et deux utilisateurs par défaut (`admin` et `user`).

### 2. Développement d’un site vulnérable (`index.php`)

- Une page de connexion prend un identifiant et un mot de passe.
- Les données sont insérées directement dans la requête SQL **sans aucune protection**.

---

## 📌 Exemple d’exploitation

### Exemple 1
- **Utilisateur** : *(peu importe)*

- **Mot de passe** :  
  ```text
  ' OR '1'='1
  ```
✅ Résultat : connexion réussie.

### Exemple 2

- **Utilisateur** :
```text
  admin' -- 
  ```
Ne pas oublier l'espace après les --

- **Mot de passe** : *(peu importe)*


✅ Résultat : connexion réussie en admin.

---

## Solution possible

Utiliser des requêtes préparées pour lutter contre de possible injection.
