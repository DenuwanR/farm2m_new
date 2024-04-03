document.addEventListener('DOMContentLoaded', function() {
    const itemCards = document.querySelectorAll('.product-card');

    itemCards.forEach(function(card) {
        card.addEventListener('click', function() {
            const itemId = card.dataset.productId;
            window.location.href = `product-details.php?productId=${productId}`; // Redirect to item detail page
        });
    });
});
