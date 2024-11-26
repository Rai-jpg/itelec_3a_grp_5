document.addEventListener("DOMContentLoaded", () => {
    // Select the modal and buttons
    const addEventButton = document.getElementById('add-event-button');
    const addEventModal = document.getElementById('add-event-modal');
    const closeAddEventModal = document.getElementById('close-add-event-modal');

    const detailsModal = document.getElementById('details-modal');
    const closeDetailsModal = document.getElementById('close-details-modal');
    const modalContent = document.getElementById('modal-details-content');

    const popupModal = document.getElementById('popup-modal');
    const closePopup = document.getElementById('close-popup');
    const popupImage = document.getElementById('popup-image');

    // Show the "Add Event" modal
    addEventButton.addEventListener('click', () => {
        addEventModal.classList.remove('hidden');
    });

    // Close the "Add Event" modal
    closeAddEventModal.addEventListener('click', () => {
        addEventModal.classList.add('hidden');
    });

    // Handle image expand for popup
    const imgExpand = document.getElementById('img-expand');
    if (imgExpand) {
        imgExpand.addEventListener('click', () => {
            popupImage.src = imgExpand.src; // Use the same image for popup
            popupModal.classList.remove('hidden');
            popupModal.style.display = 'flex';
        });
    }

    // Close the image popup
    closePopup.addEventListener('click', () => {
        popupModal.classList.add('hidden');
        popupModal.style.display = 'none';
    });

    // Close modal when clicking outside the content
    popupModal.addEventListener('click', (e) => {
        if (e.target === popupModal) {
            popupModal.classList.add('hidden');
            popupModal.style.display = 'none';
        }
    });

    // Event listener for event details
    const eventElements = document.querySelectorAll('.dash-details');
    eventElements.forEach(eventElement => {
        eventElement.addEventListener('click', () => {
            // Open the details modal
            detailsModal.classList.remove('hidden');
            detailsModal.style.display = 'flex';

            // Get event data
            const username = eventElement.getAttribute('data-username');
            const location = eventElement.getAttribute('data-location');
            const joiners = eventElement.getAttribute('data-joiners');
            const donationGoal = eventElement.getAttribute('data-donation-goal');
            const totalDonation = eventElement.getAttribute('data-total-donation');
            const bannerImage = eventElement.getAttribute('data-banner-image');

            // Populate the modal with event data
            modalContent.innerHTML = `
                <p><strong>Posted by:</strong> ${username}</p>
                <p><strong>Location:</strong> ${location}</p>
                <p><strong>Joiners:</strong> <span id="joiners-count">${joiners}</span></p>
                <p><strong>Donation Goal:</strong> ${donationGoal}</p>
                <p><strong>Amount Donated:</strong> ${totalDonation}</p>
            `;
        });
    });

    // Close the details modal
    closeDetailsModal.addEventListener('click', () => {
        detailsModal.classList.add('hidden');
        detailsModal.style.display = 'none';
    });

    // Handle "Join" button click to increment joiners
     const joinButtons = document.querySelectorAll('.join-button');

    // Add click event listener to each join button
    joinButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Get the event ID from the button's data attribute
            const eventId = button.getAttribute('data-event-id');

            // Send an AJAX request to increment the joiners count
            fetch('incrementJoiners.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ eventId }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Find the joiners element and update its count
                        const eventElement = button.closest('.dash-details');
                        const joinersElement = eventElement.querySelector('[data-joiners]');
                        const currentJoiners = parseInt(joinersElement.textContent);
                        joinersElement.textContent = currentJoiners + 1;

                        alert('You have successfully joined the event!');
                    } else {
                        alert('Failed to join the event. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });

    // Handle "Donate via GCash" button click
    const donateButtons = document.querySelectorAll('#donate-button');
    donateButtons.forEach(button => {
        button.addEventListener('click', () => {
            modalContent.innerHTML = `
                <img src="./images/qrcode.png" alt="GCash QR Code" style="width: 100%; height: auto;" />
                <p style="text-align: center; margin-top: 10px;">Scan the QR code above to donate via GCash.</p>
            `;
        });
    });
});
