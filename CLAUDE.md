# [Nom de l'app]

## Projet
[À compléter par Claude à partir de docs/ARCHITECTURE.md : ce que fait l'app, en 2 lignes.]

## Structure
- `api/` : backend Laravel 13 (API JSON + panneau d'admin Filament)
- `app/` : front-end Expo (React Native, TypeScript, Expo Router) pour iOS, Android et web (PWA)
- `docs/ARCHITECTURE.md` : la spécification du projet
- `docs/PLAN.md` : les étapes du MVP
- `.claude/agents/` : sous-agents testeur et codeur

## Stack
- API : Laravel 13, PHP 8.4, Sanctum (routes dans `api/routes/api.php`), tests Pest
- Admin : Filament 4, panneau sur `/admin` (`api/app/Providers/Filament/AdminPanelProvider.php`)
- BD : MySQL en local, MariaDB/MySQL en production (cPanel)
- App : Expo, TypeScript, Expo Router
- Hébergement : cPanel mutualisé (pas de SSH, pas de processus en continu)

## Commandes
- API, tests : `cd api && php artisan test`
- Admin, créer un compte : `cd api && php artisan make:filament-user` (son courriel doit être dans `ADMIN_EMAILS` du `.env`, sinon erreur 403)
- API, serveur : `cd api && php artisan serve --host=0.0.0.0` (lancé par l'utilisateur dans son Terminal 2)
- App, serveur : `cd app && npx expo start` (lancé par l'utilisateur dans son Terminal 3)
- App, vérification des types : `cd app && npx tsc --noEmit`

Ne lance jamais toi-même `php artisan serve` ni `npx expo start` : l'utilisateur les garde ouverts dans ses propres terminaux.

## Règles
- Fais un commit Git avant chaque modification du code, avec un message clair.
- Aucun secret dans le code ni dans Git : tout va dans `.env`. Ne modifie jamais `.gitignore` pour y faire entrer un `.env`.
- Valide toutes les entrées (Form Requests).
- Vérifie les droits (Policies) : « connecté » ne veut pas dire « autorisé ».
- Pas de SQL construit à la main : Eloquent ou requêtes paramétrées, `$fillable` précis.
- Un test Pest par endpoint.
- Throttle sur l'API. En production : `APP_DEBUG=false`, HTTPS partout.
- Hébergement mutualisé : pas de SSH, pas de queue worker, pas de processus en continu.
- Dans `app/`, lis `app/AGENTS.md` avant de toucher à Expo, et installe les paquets avec `npx expo install`.
- Les variables `EXPO_PUBLIC_*` sont publiques : jamais de secret dedans.
- Explique chaque changement en une phrase, en français.
- Avant de modifier plus de 3 fichiers, présente ton plan et attends mon accord.
