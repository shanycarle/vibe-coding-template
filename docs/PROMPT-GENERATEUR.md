# Prompt générateur du template

Pour une deuxième (ou troisième) idée d'app, sans repasser par GitHub.

1. Crée un dossier vide pour ta nouvelle app et ouvre-le dans VS Code.
2. Terminal → Nouveau terminal, tape `claude`.
3. Colle ce prompt :

```
Crée dans ce dossier vide un template de projet :

1. api/ : un nouveau projet Laravel (dernière version) avec composer create-project laravel/laravel api. Dans api/.env.example, configure MySQL : DB_CONNECTION=mysql, DB_HOST=127.0.0.1, DB_PORT=3306, DB_DATABASE=monapp, DB_USERNAME=root, DB_PASSWORD vide. Supprime api/CLAUDE.md et api/AGENTS.md s'ils existent.

2. app/ : un nouveau projet Expo avec npx create-expo-app@latest app --template default, puis vide l'exemple avec npm run reset-project (réponds « n » pour ne pas garder l'exemple). Supprime le dossier app/.git s'il existe.

3. À la racine :
- CLAUDE.md avec les sections Projet (à compléter), Structure, Stack (Laravel, PHP 8.4, Sanctum, Filament 4, MySQL, Expo, cPanel mutualisé), Commandes et Règles (commit Git avant chaque modification, aucun secret dans le code, valider les entrées, Policies, pas de SQL à la main, un test Pest par endpoint, throttle, APP_DEBUG=false en prod, pas de SSH ni de processus en continu, lire app/AGENTS.md avant de toucher à Expo, EXPO_PUBLIC_* jamais de secret, expliquer chaque changement en une phrase, présenter un plan avant de modifier plus de 3 fichiers). Ne lance jamais php artisan serve ni npx expo start toi-même.
- docs/ARCHITECTURE.md vide, avec la liste des sections à remplir.
- .claude/agents/testeur.md : testeur QA qui ne modifie jamais le code, lance les tests, teste les cas limites et écrit les bogues dans BUGS.md (étapes, attendu, obtenu, gravité). Outils : Read, Grep, Glob, Bash, Write.
- .claude/agents/codeur.md : corrige les bogues de BUGS.md un à la fois, test d'abord, puis commit.
- .gitignore : .env et .env.* (sauf .env.example), docs/env-production.txt, vendor/, node_modules/, dist/, .expo/, api-deploy.zip, pwa.zip, *.aab, *.ipa, .DS_Store.

4. Initialise Git et fais un premier commit « Template de départ ».

Montre-moi l'arborescence à la fin.
```
