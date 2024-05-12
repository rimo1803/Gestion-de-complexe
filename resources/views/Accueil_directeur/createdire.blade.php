
<form method="POST" action="{{ route('directeur.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="Nomper" placeholder="Nom">
    <input type="text" name="prenomper" placeholder="Prénom">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="text" name="immat" placeholder="Immatriculation">
    <input type="date" name="date_naissance" placeholder="Date de naissance">
    <input type="text" name="grade" placeholder="Grade">
    <input type="text" name="CIN" placeholder="CIN">
    <input type="date" name="date_affectation" placeholder="Date d'affectation">
    <input type="text" name="diplome" placeholder="Diplôme">
    <input type="text" name="lieu_naissance" placeholder="Lieu de naissance">
    <input type="file" name="photo_profil" placeholder="Photo de profil">
    <button type="submit">Créer le compte</button>
</form>

