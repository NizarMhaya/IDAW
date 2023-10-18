swagger: "2.0"
info:
  description: "API REST pour la gestion des utilisateurs"
  version: "1.0.0"
  title: "Gestion des Utilisateurs"
basePath: "/IDAW/TP4/exo5"
schemes:
  - "http"
paths:
  /utilisateurs:
    get:
      summary: "Récupère la liste des utilisateurs"
      description: "Récupère tous les utilisateurs de la base de données."
      responses:
        200:
          description: "Succès"
          schema:
            type: "array"
            items:
              $ref: "#/definitions/User"
  /utilisateurs/{id}:
    get:
      summary: "Récupère un utilisateur par son ID"
      description: "Récupère un utilisateur spécifique en fonction de l'ID fourni en paramètre."
      parameters:
        - name: "id"
          in: "path"
          description: "ID de l'utilisateur à récupérer"
          required: true
          type: "integer"
      responses:
        200:
          description: "Succès"
          schema:
            $ref: "#/definitions/User"
        404:
          description: "Utilisateur non trouvé"
    post:
      summary: "Crée un nouvel utilisateur"
      description: "Crée un nouvel utilisateur dans la base de données."
      parameters:
        - in: "body"
          name: "user"
          description: "Utilisateur à créer"
          required: true
          schema:
            $ref: "#/definitions/UserInput"
      responses:
        200:
          description: "Utilisateur créé avec succès"
        400:
          description: "Requête incorrecte"
    put:
      summary: "Met à jour un utilisateur existant"
      description: "Met à jour un utilisateur existant dans la base de données."
      parameters:
        - in: "body"
          name: "user"
          description: "Utilisateur à mettre à jour"
          required: true
          schema:
            $ref: "#/definitions/User"
      responses:
        200:
          description: "Utilisateur mis à jour avec succès"
        400:
          description: "Requête incorrecte"
    delete:
      summary: "Supprime un utilisateur"
      description: "Supprime un utilisateur de la base de données en fonction de l'ID fourni en paramètre."
      parameters:
        - name: "id"
          in: "query"
          description: "ID de l'utilisateur à supprimer"
          required: true
          type: "integer"
      responses:
        200:
          description: "Utilisateur supprimé avec succès"
        400:
          description: "Requête incorrecte"
definitions:
  User:
    type: "object"
    properties:
      id:
        type: "integer"
      name:
        type: "string"
      email:
        type: "string"
  UserInput:
    type: "object"
    properties:
      name:
        type: "string"
      email:
        type: "string"
