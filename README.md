# Template · Vibe Coding avec Claude Code

Point de départ de la formation de Shany Carle : un backend Laravel et une app Expo déjà en place, avec les règles pour Claude.

## Récupérer le template

```
git clone [URL-DU-TEMPLATE] mon-projet
```

Puis dans VS Code : Fichier → Ouvrir le dossier… → mon-projet.

## Ce qu'il contient

| Dossier ou fichier | Rôle |
|---|---|
| `api/` | Projet Laravel 13, configuré pour MySQL (base `monapp`) |
| `app/` | Projet Expo avec Expo Router, écran vide |
| `CLAUDE.md` | La mémoire du projet : stack, commandes, règles |
| `docs/ARCHITECTURE.md` | La spécification, que Claude rédige avec toi |
| `.claude/agents/` | Les sous-agents testeur et codeur (bloc 5) |

## Les 3 terminaux

| Terminal | Rôle | Ce que tu tapes |
|---|---|---|
| 1 | Claude | `claude` |
| 2 | API | `cd api` puis `php artisan serve --host=0.0.0.0` |
| 3 | App | `cd app` puis `npx expo start` |

Tout le reste se demande à Claude dans le Terminal 1. Les prompts sont dans le document participant.

## Premier prompt (Terminal 1)

```
Lis CLAUDE.md et docs/ARCHITECTURE.md. Prépare api/ pour travailler en local :
- lance composer install ;
- crée .env à partir de .env.example et génère la clé ;
- MySQL : base « monapp », utilisateur root, mot de passe [ton mot de passe MySQL] ;
- crée la base si elle n'existe pas ;
- lance les migrations.
Explique chaque étape en une phrase.
```

## Une nouvelle idée d'app ?

Le prompt pour recréer ce template à partir de zéro est dans `docs/PROMPT-GENERATEUR.md`.
