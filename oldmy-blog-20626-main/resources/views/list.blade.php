<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}}</title>
</head>
<body>
    @yield('content')

    <table>
  <tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Adresse</th>
    <th>Téléphone</th>
    <th>Courriel</th>
    <th>Date de naissance</th>
    <th>Action</th>
  </tr>

  @foreach($etudiants as $etudiant)
  <tr>
    <td>{{ $etudiant['id']}}</td>
    <td>{{ $etudiant['etudiant_nom']}}</td>
    <td>{{ $etudiant['adresse']}}</td>
    <td>{{ $etudiant['phone']}}</td>
    <td>{{ $etudiant['email']}}</td>
    <td>{{ $etudiant['date_de_naissance']}}</td>
    <td><a href={{"delete/".$etudiant['id']}}>Delete</a></td>
    
  </tr>
  @endforeach
</table>


</body>
</html>