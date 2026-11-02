
document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('.quantity-form');

    const quantityElement = document.getElementById('product-quantity');
    const messageElement = document.getElementById('quantity-message');

    forms.forEach((form) => {
        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            const button = form.querySelector('button');
            const originalText = button.textContent;

            button.disabled = true;
            button.textContent = 'Processing...';

            messageElement.textContent = '';

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: new FormData(form),
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Something went wrong.');
                }

                // Update quantity without reloading the page
                quantityElement.textContent = data.quantity;

                // Display success message
                messageElement.textContent = data.message;
                messageElement.className = 'success-message';

            } catch (error) {
                // Display error message
                messageElement.textContent = error.message;
                messageElement.className = 'error-message';

            } finally {
                button.disabled = false;
                button.textContent = originalText;
            }
        });
    });
});
