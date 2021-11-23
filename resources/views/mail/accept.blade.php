@component('mail::message')

Bonjour {{$candidature->nom}} {{$candidature->prenom}}

Nous sommes heureux de vous annoncer que votre profil a été retenu suite à votre entretien avec ABM Fibre.

Afin de nous permettre de préparer votre arrivée veuillez nous envoyer les documents suivants :

- Pièce d'identité (recto et verso) valide
- Assurance Maladie
- Carte vitale
- RIB

Restant à votre entière disponibilité pour toutes informations complémentaires.
@component('mail::button', ['url' => $url])

Revoir l'offre d'emploi

@endcomponent

Cordialement,<br>
{{ config('app.name') }}
@endcomponent
