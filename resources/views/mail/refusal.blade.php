@component('mail::message')

Bonjour {{$candidature->nom}} {{$candidature->prenom}},

Nous avons pris connaissance de votre candidature et vous remercions de l’intérêt que vous portez pour ABM Fibre.

Nous sommes au regret de vous informer que votre candidature n’a pu être retenue dans le cadre de ce recrutement, le poste ayant été pourvu.

Vous souhaitant néanmoins un plein succès dans vos recherches, nous vous prions d‘agréer, Madame, Monsieur nos salutations distinguées.


@component('mail::button', ['url' => $url])

Revoir l'offre d'emploi


@endcomponent

Cordialement,<br>
{{ config('app.name') }}
@endcomponent
