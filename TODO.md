# Projet ecommerce (Rappel°)

- Pour afficher un formulaire dans un symfony:
    - Créer une entité - repository
    - Créer le type du formulaire (registrationtype)
    - Créer le formulaire (controller)
    - Créer la partie visible du formulaire et la passer à la vue(twig)
    - Afficher le formulaire

Controller user à faire?

# Etapes pour l'authentification:

Quand on est dans le fichier index.html.twig situé dans le dossier home situé dans le dossier Front, on peut faire des tests pour l'authentification

Il existe une variable d'environnement qui s'appelle "app" dans laquelle on peut retrouver les notifications ('flashes'): app.flashes mais également l'utilisateur connecté  app.user

app.user retourne null lorsque l'utilisateur n'est pas connecté

app.user retourne un objet de l'entité de la classe User lorsque l'utilisateur est connecté. Dans cet objet, on retrouve les informations de l'utilisateur connecté(par exemple: nom, prenom, id, mail etc...)