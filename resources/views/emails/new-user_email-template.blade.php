<br>
Bonjour, <b>{{ $name }}</b><br><br>
Votre Compte Utilisateur a été créé avec succès sur la plateforme en ligne :
vous pouvez récupérer les coordonnées de votre compte ci-dessous:
<br>
<b>Email</b>: {{ $email }} {{ $sname }}<br>
<b>Mot de passe</b>: {{ $password }}
<br><br>
<a href="{{ route('login') }}">Connectez-vous</a>
<b>Note</b>: Il est recommandé dès votre première connexion de pouvoir changer le mot de passe.
<br><br>
Merci, Bienvenue parmi nous !
