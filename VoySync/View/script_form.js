document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('destinationForm').addEventListener('submit', function (event) {
        var nom = document.getElementById('nom').value.trim();
        var description = document.getElementById('description').value.trim();
        var pays = document.getElementById('pays').value.trim();

        var nomError = document.getElementById('nomError');
        var descriptionError = document.getElementById('descriptionError');
        var paysError = document.getElementById('paysError');

        nomError.textContent = '';
        descriptionError.textContent = '';
        paysError.textContent = '';


        function isEmpty(value) {
            return value === '';
        }

        if (isEmpty(nom)) {
            nomError.textContent = 'Le nom est requis.';
            nomError.classList.add('error');
            event.preventDefault();
        }

        if (isEmpty(description)) {
            descriptionError.textContent = 'La description est requise.';
            descriptionError.classList.add('error');
            event.preventDefault();
        }

        if (isEmpty(pays)) {
            paysError.textContent = 'Le pays est requis.';
            paysError.classList.add('error');
            event.preventDefault();
        }
    });

    document.getElementById('transportForm').addEventListener('submit', function (event) {
        var type = document.getElementById('type').value.trim();
        var pays_depart = document.getElementById('pays_depart').value.trim();
        var pays_arrivee = document.getElementById('pays_arrivee').value.trim();
        var lieux_depart = document.getElementById('lieux_depart').value.trim();
        var lieux_arrivee = document.getElementById('lieux_arrivee').value.trim();
        var temps_depart = document.getElementById('temps_depart').value.trim();
        var temps_arrivee = document.getElementById('temps_arrivee').value.trim();
        var prix = document.getElementById('prix').value.trim();

        var typeError = document.getElementById('typeError');
        var paysDepartError = document.getElementById('paysDepartError');
        var paysArriveeError = document.getElementById('paysArriveeError');
        var lieuxDepartError = document.getElementById('lieuxDepartError');
        var lieuxArriveeError = document.getElementById('lieuxArriveeError');
        var tempsDepartError = document.getElementById('tempsDepartError');
        var tempsArriveeError = document.getElementById('tempsArriveeError');
        var prixError = document.getElementById('prixError');

        typeError.textContent = '';
        paysDepartError.textContent = '';
        paysArriveeError.textContent = '';
        lieuxDepartError.textContent = '';
        lieuxArriveeError.textContent = '';
        tempsDepartError.textContent = '';
        tempsArriveeError.textContent = '';
        prixError.textContent = '';

        if (isEmpty(type)) {
            typeError.textContent = 'Le type est requis.';
            typeError.classList.add('error');
            event.preventDefault();
        }

        if (isEmpty(pays_depart)) {
            paysDepartError.textContent = 'Le pays de départ est requis.';
            paysDepartError.classList.add('error');
            event.preventDefault();
        }

        if (isEmpty(pays_arrivee)) {
            paysArriveeError.textContent = 'Le pays d\'arrivée est requis.';
            paysArriveeError.classList.add('error');
            event.preventDefault();
        }

        if (isEmpty(lieux_depart)) {
            lieuxDepartError.textContent = 'Le lieu de départ est requis.';
            lieuxDepartError.classList.add('error');
            event.preventDefault();
        }

        if (isEmpty(lieux_arrivee)) {
            lieuxArriveeError.textContent = 'Le lieu d\'arrivée est requis.';
            lieuxArriveeError.classList.add('error');
            event.preventDefault();
        }

        if (isEmpty(temps_depart)) {
            tempsDepartError.textContent = 'Le temps de départ est requis.';
            tempsDepartError.classList.add('error');
            event.preventDefault();
        }

        if (isEmpty(temps_arrivee)) {
            tempsArriveeError.textContent = 'Le temps d\'arrivée est requis.';
            tempsArriveeError.classList.add('error');
            event.preventDefault();
        }

        if (isEmpty(prix)) {
            prixError.textContent = 'Le prix est requis.';
            prixError.classList.add('error');
            event.preventDefault();
        }
    });
});
