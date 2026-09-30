# Prompt générateur du template

Pour une deuxième (ou troisième) idée d'app, sans repasser par GitHub.

1. Crée un dossier vide pour ta nouvelle app et ouvre-le dans VS Code.
2. Terminal → Nouveau terminal, tape `claude`.
3. Colle ce prompt :

```
Crée dans ce dossier vide un template de projet :

1. api/ : un nouveau projet Laravel (dernière version) avec composer create-project laravel/laravel api. Supprime api/CLAUDE.md et api/AGENTS.md s'ils existent. Puis, dans api/ :
- remplace PHPUnit par Pest (composer remove phpunit/phpunit --dev, puis composer require pestphp/pest --dev -W, puis vendor/bin/pest --init), active RefreshDatabase pour les tests Feature dans tests/Pest.php et réécris les tests d'exemple en syntaxe Pest ;
- installe Sanctum avec php artisan install:api, ajoute le trait HasApiTokens au modèle User, active $middleware->throttleApi() dans bootstrap/app.php et définis le limiteur « api » (60 requêtes/minute par utilisateur ou IP) dans AppServiceProvider ;
- dans bootstrap/app.php, rends les erreurs en JSON pour les routes api/* ;
- installe Filament 4 (composer require filament/filament:"^4.0" -W, puis php artisan filament:install --panels, panneau « admin »), et fais implémenter FilamentUser au modèle User : canAccessPanel autorise seulement les courriels de ADMIN_EMAILS (variable ajoutée dans .env.example, lue dans config/app.php, liste séparée par des virgules) ;
- écris un test Pest pour GET /api/user (invité refusé, connecté accepté, throttle présent) et pour /admin (invité redirigé vers /admin/login, courriel autorisé accepté, autre courriel refusé en 403) ;
- dans api/.env.example : APP_NAME=MonApp, APP_LOCALE=fr, APP_FAKER_LOCALE=fr_CA, QUEUE_CONNECTION=sync, et MySQL : DB_CONNECTION=mysql, DB_HOST=127.0.0.1, DB_PORT=3306, DB_DATABASE=monapp, DB_USERNAME=root, DB_PASSWORD vide ;
- garde api/composer.lock dans Git, et vérifie que php artisan test passe.

2. app/ : un nouveau projet Expo avec npx create-expo-app@latest app --template default, puis vide l'exemple avec npm run reset-project (réponds « n » pour ne pas garder l'exemple). Ensuite : retire le script « reset-project » de app/package.json, supprime les images de l'exemple qui ne sont plus utilisées, déplace app/.claude/settings.json vers .claude/settings.json à la racine, et supprime le dossier app/.git s'il existe. Vérifie que npx tsc --noEmit et npx expo-doctor passent.

3. À la racine :
- CLAUDE.md avec les sections Projet (à compléter), Structure, Stack (Laravel, PHP 8.4, Sanctum, Filament 4, MySQL, Expo, cPanel mutualisé), Commandes (dont php artisan make:filament-user pour créer un compte admin) et Règles (commit Git avant chaque modification, aucun secret dans le code, valider les entrées, Policies, pas de SQL à la main, un test Pest par endpoint, throttle, APP_DEBUG=false en prod, pas de SSH ni de processus en continu, lire app/AGENTS.md avant de toucher à Expo, EXPO_PUBLIC_* jamais de secret, expliquer chaque changement en une phrase, présenter un plan avant de modifier plus de 3 fichiers). Ne lance jamais php artisan serve ni npx expo start toi-même.
- docs/ARCHITECTURE.md vide, avec la liste des sections à remplir.
- docs/PLAN.md vide, avec ce qu'il contiendra (étapes du MVP, une case à cocher par étape).
- .claude/agents/testeur.md : testeur QA qui ne modifie jamais le code, lance les tests, teste les cas limites et écrit les bogues dans BUGS.md (étapes, attendu, obtenu, gravité). Outils : Read, Grep, Glob, Bash, Write.
- .claude/agents/codeur.md : corrige les bogues de BUGS.md un à la fois, test d'abord, puis commit.
- .gitignore : .env et .env.* (sauf .env.example), docs/env-production.txt, vendor/, node_modules/, dist/, .expo/, api-deploy.zip, pwa.zip, *.aab, *.ipa, .DS_Store, Thumbs.db.
- README.md : comment récupérer le template, les 3 terminaux (Claude, API, App) et le premier prompt de préparation de api/.

4. Initialise Git et fais un premier commit « Template de départ ».

Montre-moi l'arborescence à la fin.
```
