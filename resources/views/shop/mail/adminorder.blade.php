<h2>Bonjour</h2> <br>
Nouvelle commande via Plancher Laurentides !<br><br>
Détails de la commande : <br><br>
Nom: {{ $data['name'] }} <br>
Courriel: {{ $data['email'] }} <br>
Téléphone: {{ $data['phone'] }} <br>
Montant: {{ $data['amount'] }} <br>
Facture: {{ $data['invoice_no'] }} <br><br>

<h2>Détails de livraison</h2> <br>
Récepteur: {{ $data['shipping_name'] }} <br>
Compagnie: {{ $data['shipping_cname'] }} <br>
Adresse: {{ $data['shipping_address'] }} <br>
Unité/Bureau/App: {{ $data['shipping_unit'] }} <br>
Ville: {{ $data['shipping_city'] }} <br>
Province: {{ $data['shipping_province'] }} <br>
Code Postale: {{ $data['shipping_postal'] }} <br>