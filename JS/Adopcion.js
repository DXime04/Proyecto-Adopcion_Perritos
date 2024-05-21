document.addEventListener('DOMContentLoaded', function() {
    const razaFilter = document.getElementById('raza') ;
    const tamanoFilter = document.getElementById('tamano');
    const cards = document.querySelectorAll('.card');

    function filterCards() {
        const razaValue = razaFilter.value.toLowerCase();
        const tamanoValue = tamanoFilter.value.toLowerCase();
        cards.forEach(card => {
            const cardRaza = card.getAttribute('data-raza').toLowerCase();
            const cardTamano = card.getAttribute('data-tamano').toLowerCase();

            if ((razaValue === 'all' || cardRaza === razaValue) && 
                (tamanoValue === 'all' || cardTamano === tamanoValue)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
    razaFilter.addEventListener('change', filterCards);
    tamanoFilter.addEventListener('change', filterCards);

    filterCards();
});