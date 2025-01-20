document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('orderModal');
    const closeModal = document.querySelector('.close-modal');
    const orderForm = document.getElementById('orderForm');


    closeModal.onclick = function () {
        modal.style.display = "none";
    }


    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


    orderForm.onsubmit = function (e) {
        e.preventDefault();
        const formData = new FormData(orderForm);

        fetch('place_order.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                if (data.includes('successfully')) {
                    showNotification('Order placed successfully! 🎉');
                    modal.style.display = "none";
                    orderForm.reset();
                } else {
                    showNotification('Error placing order. Please try again.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Error placing order. Please try again.', 'error');
            });
    }
});

function orderNow(flavorId, flavorName) {
    const modal = document.getElementById('orderModal');
    document.getElementById('flavorId').value = flavorId;
    modal.style.display = "block";
}

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    document.body.appendChild(notification);


    setTimeout(() => {
        notification.remove();
    }, 3000);
}


document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

function filterFlavors(category) {

    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    event.target.classList.add('active');


    const items = document.querySelectorAll('.flavor-card');
    items.forEach(item => {
        if (category === 'all' || item.dataset.category === category) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}


document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.flavor-card');
    menuItems.forEach((item, index) => {
        item.style.animation = `fadeIn 0.5s ease forwards ${index * 0.1}s`;
    });
});

function filterFlavors(category) {

    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.classList.remove('active');
        if (btn.textContent.trim() === category || (category === 'all' && btn.textContent.trim() === 'All Flavors')) {
            btn.classList.add('active');
        }
    });


    const items = document.querySelectorAll('.flavor-card');
    items.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'scale(0.8)';

        setTimeout(() => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'scale(1)';
                }, 50);
            } else {
                item.style.display = 'none';
            }
        }, 300);
    });
}


document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.flavor-card');
    cards.forEach(card => {
        card.style.transition = 'all 0.3s ease';
    });
});

let currentFlavorDetails = null;

function orderNow(flavorId, flavorName, price) {
    currentFlavorDetails = { id: flavorId, name: flavorName, price: price };
    const modal = document.getElementById('orderModal');
    const selectedFlavorElement = document.getElementById('selectedFlavor');
    const flavorPriceElement = document.getElementById('flavorPrice');
    const flavorIdInput = document.getElementById('flavorId');

    selectedFlavorElement.textContent = flavorName;
    flavorPriceElement.textContent = `Price per scoop: $${price}`;
    flavorIdInput.value = flavorId;

    modal.style.display = "block";
}

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('orderModal');
    const closeBtn = document.querySelector('.close-modal');
    const orderForm = document.getElementById('orderForm');

    closeBtn.onclick = function () {
        modal.style.display = "none";
        orderForm.reset();
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            orderForm.reset();
        }
    }

    orderForm.onsubmit = function (e) {
        e.preventDefault();
        const submitBtn = orderForm.querySelector('.submit-btn');
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;

        const formData = new FormData(orderForm);

        fetch('place_order.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    showNotification(data.message, 'success');
                    modal.style.display = "none";
                    orderForm.reset();
                } else {
                    showNotification(data.message, 'error');
                }
            })
            .catch(error => {
                showNotification('Error placing order. Please try again.', 'error');
                console.error('Error:', error);
            })
            .finally(() => {
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;
            });
    }
});

function showNotification(message, type = 'success') {

    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => notification.remove());


    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;

    document.body.appendChild(notification);


    setTimeout(() => {
        notification.style.opacity = '0';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}