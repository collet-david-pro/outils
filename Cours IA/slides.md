
# Formation à l'Intelligence Artificielle  
### Pour les élèves de l'IRA Lille

Formateur : David Collet  
Secrétaire Général d’EPLE – Collège Victor Hugo (Chauny)
Version 2 juin 2025

<img src="men.png" alt="Logo MENJ" style="height:80px; float:right; margin-left: 20px;" witdh="200px"/>
<img src="ira.png" alt="Logo IRA Lille" style="height:80px; float:right;" witdh="200px"/>


---

# Formation à l'Intelligence Artificielle  
## Objectifs de la formation

- Comprendre les fondements de l'IA  
- Identifier ses applications concrètes dans le secteur public  
- Utiliser un outil conversationnel d'IA générative  
- Réfléchir aux enjeux éthiques et organisationnels  

---

## Plan de la journée – Matinée

- Un peu de théorie
- Un peu plus de théorie et contexte
- *Pause* 
- Structure d’un prompt  
- Premiers prompt simples

---

## Plan de la journée – Après-midi

- Une conversation à la place d’une requête  
- Affiner une demande  
- L’analyse de documents  
- *Pause*  
- Les limites  
- Aller plus loin…


---

## Qu’est-ce que l’intelligence artificielle ?  
### Définition générale

L’intelligence artificielle (IA) désigne l’ensemble des techniques visant à permettre à des machines d’imiter des capacités humaines telles que :

- Le raisonnement logique  
- L’apprentissage  
- La résolution de problèmes  
- La compréhension du langage  
- La perception visuelle ou sonore

---

## Qu’est-ce que l’intelligence artificielle ?  
### Objectif de l’IA

Créer des systèmes capables de :

- Réagir de manière autonome à des situations nouvelles  
- S’adapter à leur environnement  
- Améliorer leur performance au fil du temps  
- Apporter une aide ou remplacer certaines fonctions humaines dans des tâches précises

---

## Qu’est-ce que l’intelligence artificielle ?  
### IA, algorithmes et données

L’IA repose sur trois piliers fondamentaux :

- **Les données** : carburant de l’intelligence artificielle  
- **Les algorithmes** : méthodes pour extraire des règles ou des décisions à partir des données  
- **La puissance de calcul** : permet le traitement à grande échelle

---

## Machine Learning  
### Apprentissage automatique

Le **machine learning (ML)** est une branche de l’IA qui permet aux machines d’apprendre à partir des données, sans être explicitement programmées.

Exemples :  
- Recommandations de vidéos  
- Tri de mails (spam / non-spam)  
- Prédictions de pannes ou de fraudes

---

## Deep Learning  
### Apprentissage profond

Le **deep learning** est une sous-branche du machine learning basée sur des réseaux de neurones artificiels très profonds.

Applications typiques :  
- Reconnaissance vocale  
- Traduction automatique  
- Détection d’objets dans une image  

---

## Historique de l’IA moderne

**Alan Turing (1912–1954)** est un mathématicien britannique considéré comme le père de l’intelligence artificielle.  
En 1950, il publie un article où il pose la question : “Les machines peuvent-elles penser ?”  
Il propose alors **le test de Turing**, qui évalue si une machine peut imiter la pensée humaine.

Il pose les bases théoriques de l’IA moderne.

---

## Le test de Turing

Une personne humaine dialogue par écrit avec deux interlocuteurs cachés : un humain et une machine.  
Si, après plusieurs échanges, la personne ne peut pas distinguer qui est la machine, alors la machine réussit le test.



---

## IA faible vs IA forte  
### Deux visions de l’intelligence artificielle

- **IA faible** : conçue pour réaliser une tâche spécifique  
  *Exemples : reconnaissance vocale, recommandation Netflix, correction automatique*
  
- **IA forte** : viserait à reproduire une intelligence générale autonome et consciente  
  *Encore hypothétique, souvent abordée en science-fiction*

---

## IA faible  
### Caractéristiques

- Très performante dans un domaine étroit  
- Ne comprend pas ce qu’elle fait  
- Aucun « bon sens » ou conscience  
- Exemples : ChatGPT, Siri, GPS intelligent, algorithmes de tri

---

## IA forte  
### Enjeux théoriques et philosophiques ?

- Capacité à raisonner de manière générale  
- Autonomie complète dans des environnements variés  
- Hypothèse de la conscience artificielle  
- Pas de réalisation actuelle : concept exploratoire

---


## L’essor des agents IA  
### Un changement de paradigme

- Les modèles d’IA ne sont plus uniquement réactifs, ils deviennent **proactifs**  
- Apparition d’**agents IA** capables d’exécuter des tâches complexes de manière autonome  
- Ces agents interagissent avec leur environnement et d’autres outils  

---

## Qu’est-ce qu’un agent IA ?  
### Définition

Un **agent IA** est un système autonome qui :

- Observe (via des entrées ou des capteurs)  
- Prend des décisions à partir d’objectifs définis  
- Exécute des actions dans un environnement  
- Éventuellement apprend de ses erreurs (boucle de rétroaction)  

---

## Exemples d’agents IA  
### Cas d’usage récents

- **Agents personnels** : planifient des réunions, gèrent un agenda  
- **Agents de navigation** : pilotent un drone, une voiture autonome  
- **Agents logiciels** : effectuent des recherches, résument des documents, interagissent avec d’autres IA (multi-agents)  
- **Chaînes d’outils** : un agent orchestre des outils externes pour accomplir un objectif complexe  

---



## Domaines d'application  
### Panorama

- **Santé** :  
  - Détection précoce de cancers sur imagerie médicale (IA d’analyse radiologique)  
  - Aide au diagnostic via des assistants cliniques (ex : IBM Watson Health)

- **Éducation** :  
  - Génération de contenus pédagogiques adaptés (par niveau ou par profil)  
  - Outils de remédiation personnalisée (ex : plateformes adaptatives type Khan Academy)

- **Transports** :  
  - Voitures autonomes (Tesla, Waymo)  
  - Optimisation du trafic et des itinéraires (GPS intelligents, gestion de feux)

- **Administration** :  
  - Tri et traitement automatisé de courriers entrants  
  - Analyse prédictive de fraudes fiscales ou sociales  
  - Aide à la rédaction de rapports, synthèses, ou notes de cadrage


---

## Domaines d'application  
### En administration

- **Automatisation de courriers** :  
  - Génération automatique de réponses types (demandes de stage, réclamations, relances)  
  - Intégration avec des bases de données pour adapter les réponses (nom, statut, service concerné)

- **Comptes-rendus automatiques** :  
  - Résumés de réunions produits à partir d’enregistrements ou de prises de notes brutes  
  - Outils de transcription avec structuration automatique (ex : titres, décisions, actions)

- **Aide à la rédaction de projets** :  
  - Génération de trames pour appels à projets, rapports d'activité, notes d’opportunité  
  - Suggestion d’indicateurs, mise en forme automatique, complétion à partir de données fournies

- **Support à la gestion RH ou financière** :  
  - Préparation de profils de poste ou de bilans sociaux  
  - Analyse de données budgétaires ou génération de graphiques


---

## Domaines d'application  
### Méthode : Présentation de 3 cas concrets

---

## Cas 1 : L’IA dans la gestion de courriers – Préfecture de région

### Contexte :
- En 2021, certaines préfectures expérimentent l’intégration d’un agent conversationnel couplé à une IA de traitement sémantique.
- Objectif : trier et répondre automatiquement à une partie des 20 000 mails mensuels reçus.

### Application :
- Un modèle IA classe automatiquement les demandes (carte grise, titre de séjour, réclamations).
- Pour les demandes simples et fréquentes : génération immédiate d’un mail-type adapté.
- Pour les autres : transmission au bon service avec résumé automatique du contenu.

### Résultat :
- 40 % des mails traités sans intervention humaine.  
- Diminution du stress des agents de guichet et recentrage sur les cas complexes.

---

## Cas 2 : IA et diagnostic médical – Hôpital universitaire (France, 2022)

### Contexte :
- Utilisation de l'IA pour analyser les mammographies dans un service de radiologie surchargé.

### Application :
- Un algorithme de deep learning pré-entraîné détecte des anomalies suspectes sur les clichés.  
- Il classe automatiquement les cas à faible, moyen ou fort risque.  
- Les radiologues gardent la décision finale, mais sont guidés dans leur lecture.

### Résultat :
- Gain de temps pour le personnel médical (jusqu'à 30 %).  
- Meilleure détection des cas précoces.  
- Réduction du nombre de diagnostics manqués.

---

## Cas 3 : IA et analyse de CV – Service de recrutement d’une collectivité

### Contexte :
- Pour répondre à un besoin de traitement rapide sur des vagues de candidatures (> 300 par poste), un établissement met en place une IA de présélection.

### Application :
- Les CV sont analysés automatiquement selon des critères définis (expérience, mots-clés, compatibilité missions).  
- Classement des profils selon un score d’adéquation.  
- Les RH accèdent à une synthèse comparative (points forts/faibles) pour chaque candidat.

### Résultat :
- Temps de traitement réduit de moitié.  
- Amélioration de l’objectivité perçue.  
- Risques de biais détectés et corrigés par réglages réguliers de l’algorithme.

---

## Avantages et limites  
### Avantages de l’IA

- **Automatisation des tâches répétitives**  
  → Gain de temps sur les tâches chronophages (ex : traitement de formulaires, réponses types)

- **Accès facilité à l’information**  
  → Synthèse de textes longs, extraction de points clés, réponses instantanées à des questions complexes

- **Personnalisation des services**  
  → Contenus adaptés aux besoins de l’utilisateur (formation, accompagnement, services publics)

- **Aide à la prise de décision**  
  → Visualisation de données, simulations prédictives, scoring de dossiers

- **Disponibilité 24h/24**  
  → Les agents IA fonctionnent en continu, sans pause ni fatigue

---

## Avantages et limites  
### Limites et risques de l’IA

- **Biais algorithmiques**  
  → Reproduction de stéréotypes ou d’injustices si les données d’apprentissage sont biaisées

- **Transparence limitée**  
  → Fonctionnement souvent opaque : décisions difficilement explicables (notamment avec le deep learning)

- **Perte de certaines compétences humaines**  
  → Désapprentissage progressif de certaines tâches (ex : rédaction, calcul, mémoire)

- **Dépendance technologique**  
  → Risque de perte d’autonomie si les outils deviennent indispensables au quotidien

- **Problèmes éthiques ou juridiques**  
  → Questions liées à la vie privée, à la responsabilité, au contrôle humain


---

## Prise en main d’un outil d’IA générative  
### Objectifs de la séquence

- Comprendre le fonctionnement d’un outil conversationnel  
- Maîtriser la logique des **prompts** (requêtes)  
- Expérimenter la génération de contenus adaptés à un usage professionnel

---

## Qu’est-ce qu’un prompt ?  
### Définition et enjeux

- Un **prompt** est une instruction ou une question que l’on donne à une IA pour obtenir une réponse.
- Sa qualité influence fortement la pertinence de la réponse.
- Prompt ≠ commande simple : il faut contextualiser, structurer, guider l’IA.

**Exemples :**  
- Mauvais : « fais un résumé »  
- Meilleur : « Résume ce texte en 5 lignes en conservant les idées clés et un ton formel »

---

## Usages professionnels possibles  
### Ce que les participants vont tester

- Rédaction d’un **mail professionnel** clair et structuré  
- Génération d’un **résumé de document administratif**  
- Proposition d’un **plan ou d’un argumentaire**  
- Reformulation ou **simplification d’un texte technique**  
- Création d’un **modèle de courrier** adapté à une situation réelle


---
## Les acteurs

- **OpenAI** : ChatGPT, DALL·E, Whisper, Copilot…  
- **Google** : Gemini  
- **Meta** : Llama  
- **Anthropic** : Claude  
- **Mistral**  
- **Xai** : Grok  
- **Autres** : Amazon, Apple, Alibaba, Huawei, Samsung…

---

## IA de génération de contenu

- ChatGPT (OpenAI) – texte, code, image  
- Claude (Anthropic) – texte long, structuration  
- Gemini (Google) – texte + multimodalité  
- Mistral (Mixtral, Mistral Large) – texte (open source)  
- LLaMA (Meta) – texte (open source)  
- Suno / Udio / ElevenLabs – musique ou voix  
- DALL·E / MidJourney / Stable Diffusion – images

---

## IA d’analyse et d’aide à la décision

- Whisper (OpenAI) – transcription automatique  
- Perplexity AI – moteur de recherche IA (sources citées)  
- Cohere – résumé, classification, recherche sémantique  
- WatsonX (IBM) – données + NLP  
- Haystack / Qdrant – recherche sémantique (open source)  
- AlphaFold (DeepMind) – structures biologiques

---

## IA d’assistance intégrée

- Microsoft Copilot – Word, Excel, Outlook…  
- Google Duet / Gemini – Docs, Gmail, Sheets…  
- Notion AI – écriture, gestion de projet  
- X.ai (Grok) – chatbot X (Twitter)  
- GitHub Copilot – programmation  
- Alexa / Siri / Google Assistant – vocaux

---

## Comment ça marche ?

### 1. Compréhension du texte
Découpage en *tokens* (mots ou fragments), conversion en représentations numériques.

---

### 2. Traitement par le modèle
Réseau de neurones profonds, couches successives, repérage du sens, logique, contexte.

---

### 3. Génération de la réponse
Mot à mot, selon la consigne et le contexte. Ajout de variation contrôlée.

---

### 4. Affichage du résultat
Conversion du résultat en texte fluide, naturel, structuré.

---

## Pause

---

## Quel modèle ?

> Peu importe le modèle utilisé — ChatGPT, Mistral ou un autre — le fonctionnement de base reste le même : une analyse du prompt, un traitement via un réseau de neurones, puis une génération de réponse mot à mot.  

La suite de la présentation est **généraliste**.

---

## Mistral

- https://chat.mistral.ai  
- Gratuit  
- RGPD  
- Hébergé en France  
- Open Source

---

## Le prompt

Un prompt bien formulé = une réponse de qualité.

### 1. Le contexte
> “Je prépare une réunion sur le numérique au collège.”

### 2. La tâche attendue
> “Rédige un mail d’invitation professionnel.”

### 3. Les contraintes
> “Ton formel, moins de 10 lignes, date du 12 juin à 14h.”

---



> “Je prépare une réunion sur le numérique au collège. Rédige un mail d’invitation professionnel, au ton formel, de moins de 10 lignes, mentionnant la date du 12 juin à 14h.”

**Exemple généré :**

---

### Invitation à la réunion sur le numérique – 12 juin à 14h

Madame, Monsieur,  
Je vous invite à une réunion portant sur le développement du numérique au sein du collège, qui se tiendra le mercredi 12 juin à 14h, en salle des réunions.  
Votre présence est vivement souhaitée afin d’échanger sur les projets en cours et les perspectives à venir.  
Je vous remercie de bien vouloir confirmer votre participation.  
**Cordialement,**  
[Prénom Nom]

---

## C’est un premier jet, voyons ce qu’on peut faire avec :

- “Ajoute l’information suivante : un rafraîchissement sera servi à la fin.”
- “Fais une version pour les parents d’élèves.”

---

## C’est à vous

Prompt simple :  
**1. Contexte** + **2. Action claire** + **3. Contraintes précises**

---

## Pause

---

## Plan de l’après-midi

- Une conversation à la place d’une requête  
- Affiner une demande  
- L’analyse de documents  
- *Pause*  
- Les limites  
- Aller plus loin…

---

## Bilan de la journée

---

## Échanger au lieu de demander

> “L’IA conversationnelle désigne un type d’intelligence artificielle conçue pour interagir avec les humains en langage naturel”

Agissons en conversant :  
https://chat.mistral.ai/chat/aa8549e7-ce0d-4c88-896f-3470cbff45ec

---

## Bilan de la journée

Merci pour votre attention !
