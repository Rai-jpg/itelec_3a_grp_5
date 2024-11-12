document.addEventListener('DOMContentLoaded', () => {
    // Initialize an empty array for events (previously, sample events were added here)
    let events = JSON.parse(localStorage.getItem('events')) || [];

    // Retrieve profile data and user events from localStorage
    const userProfile = JSON.parse(localStorage.getItem('user')) || {
        username: "John Doe",
        email: "john.doe@example.com",
        telephone: "123-456-7890",
        address: "123 Community Street, Barangay, City"
    };
    const joinedEvents = JSON.parse(localStorage.getItem('joinedEvents')) || [];
    const initiatedEvents = JSON.parse(localStorage.getItem('initiatedEvents')) || [];

    // Render Dashboard Overview
    const renderDashboard = () => {
        let dashboardHTML = `
            <h2 class="text-3xl font-bold text-white mb-6">Welcome to Community Hub Dashboard</h2>
            <p class="text-lg text-gray-200 mb-4">Here you can manage events, view statistics, and more.</p>
            <h3 class="text-2xl font-bold text-white mb-4">Project Statistics:</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gray-800 p-4 rounded-lg text-white">
                    <h4 class="text-xl font-bold mb-2">Number of Joiners</h4>
                    <p>${events.reduce((total, event) => total + (event.joiners || 0), 0)}</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-lg text-white">
                    <h4 class="text-xl font-bold mb-2">Total Expenses</h4>
                    <p>₱${events.reduce((total, event) => total + (event.expenses || 0), 0).toFixed(2)}</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-lg text-white">
                    <h4 class="text-xl font-bold mb-2">Funds Needed</h4>
                    <p>₱${events.reduce((total, event) => total + (event.fundsNeeded || 0), 0).toFixed(2)}</p>
                </div>
            </div>
        `;
        document.getElementById('content-container').innerHTML = dashboardHTML;
        renderEvents(events);
    };

    // Function to Render Events
    const renderEvents = (events) => {
        let contentHTML = '';
        events.forEach(event => {
            contentHTML += `
                <div class="bg-white p-4 rounded-lg shadow-lg cursor-pointer event-card mb-4" data-id="${event.id}">
                    <h3 class="text-xl font-bold mb-2">${event.name}</h3>
                    <img alt="${event.name}" class="w-full h-40 object-cover rounded mb-2" src="${event.img}"/>
                    <p class="mb-2">Location: ${event.location}</p>
                    <p class="mb-2 text-gray-600">Joiners: <strong>${event.joiners || 0}</strong></p>
                    <p class="mb-2 text-gray-600">Funds Needed: <strong>₱${(event.fundsNeeded || 0).toFixed(2)}</strong></p>
                </div>
            `;
        });
        document.getElementById('content-container').insertAdjacentHTML('beforeend', contentHTML);

        // Add Event Listeners for Event Cards
        document.querySelectorAll('.event-card').forEach(card => {
            card.addEventListener('click', (e) => {
                const eventId = e.currentTarget.getAttribute('data-id');
                showEventDetails(eventId);
            });
        });
    };

    // Show Event Details in Modal
    const showEventDetails = (eventId) => {
        const event = events.find(evt => evt.id == eventId);
        if (!event) return;

        const eventDetails = `
            <h2 class="text-3xl font-bold text-gray-700 mb-4">${event.name}</h2>
            <p class="text-gray-600 mb-2"><strong>Date:</strong> ${event.date}</p>
            <p class="text-gray-600 mb-2"><strong>Location:</strong> ${event.location}</p>
            <p class="text-gray-600 mb-2"><strong>Expenses:</strong> ₱${(event.expenses || 0).toFixed(2)}</p>
            <p class="text-gray-600 mb-2"><strong>Funds Needed:</strong> ₱${(event.fundsNeeded || 0).toFixed(2)}</p>
            <p class="text-gray-600 mb-2"><strong>Joiners:</strong> ${event.joiners || 0}</p>
            <button id="join-event" class="w-full p-3 bg-green-500 text-white font-bold rounded hover:bg-green-600 transition duration-300">Join Event</button>
            <button id="donate-gcash" class="w-full p-3 mt-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-600 transition duration-300">Donate via GCash</button>
        `;

        document.getElementById('event-details').innerHTML = eventDetails;
        document.getElementById('event-modal').classList.remove('hidden');

        // Add Event Listener to Join Button
        document.getElementById('join-event').addEventListener('click', () => {
            event.joiners = (event.joiners || 0) + 1;
            joinedEvents.push(event);
            localStorage.setItem('joinedEvents', JSON.stringify(joinedEvents));
            localStorage.setItem('events', JSON.stringify(events)); // Update events in localStorage
            alert('Thank you for joining!');
            document.getElementById('event-modal').classList.add('hidden');
            renderDashboard();
        });

        // Add Event Listener to Donate via GCash Button
        document.getElementById('donate-gcash').addEventListener('click', () => {
            alert('Redirecting to GCash for donation...');
        });
    };

    // Close Event Modal
    document.getElementById('close-modal').addEventListener('click', () => {
        document.getElementById('event-modal').classList.add('hidden');
    });

    // Add New Event Modal Logic
    document.getElementById('add-event-button').addEventListener('click', () => {
        document.getElementById('add-event-modal').classList.remove('hidden');
    });

    document.getElementById('close-add-event-modal').addEventListener('click', () => {
        document.getElementById('add-event-modal').classList.add('hidden');
    });

    document.getElementById('add-event-form').addEventListener('submit', (e) => {
        e.preventDefault();
        const name = document.getElementById('event-name').value.trim();
        const location = document.getElementById('event-location').value.trim();
        const date = document.getElementById('event-date').value.trim();
        const img = document.getElementById('event-img').value.trim();
        const expenses = parseFloat(document.getElementById('event-expenses').value.trim()) || 0;
        const fundsNeeded = parseFloat(document.getElementById('funds-needed').value.trim()) || 0;

        if (name && location && date && img && !isNaN(expenses) && !isNaN(fundsNeeded)) {
            const newEvent = {
                id: new Date().getTime(), // Use timestamp for unique ID
                name,
                location,
                date,
                img,
                expenses,
                fundsNeeded,
                joiners: 0
            };
            events.push(newEvent);
            localStorage.setItem('events', JSON.stringify(events)); // Store events in localStorage
            initiatedEvents.push(newEvent);
            localStorage.setItem('initiatedEvents', JSON.stringify(initiatedEvents)); // Store initiated events
            alert('Event added successfully!');
            document.getElementById('add-event-modal').classList.add('hidden');
            renderDashboard();
        } else {
            alert('Please fill in all fields.');
        }
    });

    // Function to Render Profile Section
    const renderProfile = () => {
        let profileHTML = `
            <h2 class="text-3xl font-bold text-white mb-6">Profile Information</h2>
            <p class="text-lg text-gray-200 mb-4"><strong>Username:</strong> ${userProfile.username}</p>
            <p class="text-lg text-gray-200 mb-4"><strong>Email:</strong> ${userProfile.email}</p>
            <p class="text-lg text-gray-200 mb-4"><strong>Telephone:</strong> ${userProfile.telephone}</p>
            <p class="text-lg text-gray-200 mb-4"><strong>Address:</strong> ${userProfile.address}</p>
        `;

        // List of Joined Events
        if (joinedEvents.length > 0) {
            profileHTML += `<h3 class="text-2xl text-white mt-8 mb-4">Joined Events:</h3>`;
            joinedEvents.forEach(event => {
                profileHTML += `
                    <div class="bg-gray-800 p-4 rounded-lg mb-4 text-white">
                        <h4 class="font-bold">${event.name}</h4>
                        <p>${event.date} at ${event.location}</p>
                    </div>
                `;
            });
        }

        // List of Initiated Events
        if (initiatedEvents.length > 0) {
            profileHTML += `<h3 class="text-2xl text-white mt-8 mb-4">Initiated Events:</h3>`;
            initiatedEvents.forEach(event => {
                profileHTML += `
                    <div class="bg-gray-800 p-4 rounded-lg mb-4 text-white">
                        <h4 class="font-bold">${event.name}</h4>
                        <p>${event.date} at ${event.location}</p>
                    </div>
                `;
            });
        }

        document.getElementById('content-container').innerHTML = profileHTML;
    };

    // Function to Render Settings Section
    const renderSettings = () => {
        const settingsHTML = `
            <h2 class="text-3xl font-bold text-white mb-6">Settings</h2>
            <p class="text-lg text-gray-200 mb-4">This is the settings section. You can adjust various configurations here.</p>
        `;
        document.getElementById('content-container').innerHTML = settingsHTML;
    };

    // Function to Render Help Section
    const renderHelp = () => {
        const helpHTML = `
            <h2 class="text-3xl font-bold text-white mb-6">Help</h2>
            <p class="text-lg text-gray-200 mb-4">This is the help section. Find answers to frequently asked questions here.</p>
        `;
        document.getElementById('content-container').innerHTML = helpHTML;
    };

    // Handle Menu Click Events using Event Delegation
    document.getElementById('menu').addEventListener('click', (e) => {
        const item = e.target.closest('li[data-section]');
        if (item) {
            const section = item.getAttribute('data-section');

            if (section === 'home') {
                renderDashboard();
                document.getElementById('section-title').textContent = 'Community Hub Dashboard';
            } else if (section === 'profile') {
                renderProfile();
                document.getElementById('section-title').textContent = 'Profile';
            } else if (section === 'events') {
                window.location.href = 'events.html'; // Redirect to events.html
            } else if (section === 'settings') {
                renderSettings();
                document.getElementById('section-title').textContent = 'Settings';
            } else if (section === 'help') {
                renderHelp();
                document.getElementById('section-title').textContent = 'Help';
            }
        }
    });

    // Logout Button Event
    document.getElementById('logout-button').addEventListener('click', () => {
        localStorage.clear();
        alert('You have been logged out.');
        window.location.href = 'login.html'; // Replace with your login page
    });

    // Render Initial Dashboard
    renderDashboard();
});