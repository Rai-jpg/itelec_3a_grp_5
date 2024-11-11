document.addEventListener('DOMContentLoaded', () => {
    const user = JSON.parse(localStorage.getItem('user'));
    if (user) {
        const profileInfo = `
            <p><strong>Name:</strong> ${user.username}</p>
            <p><strong>Email:</strong> ${user.email}</p>
            <p><strong>Telephone:</strong> ${user.telephone}</p>
            <p><strong>Address:</strong> ${user.address}</p>
        `;
        document.getElementById('profile-info').innerHTML = profileInfo;
    }

    const joinedEvents = JSON.parse(localStorage.getItem('joinedEvents')) || [];
    const joinedEventsContainer = document.getElementById('joined-events');
    if (joinedEvents.length === 0) {
        joinedEventsContainer.innerHTML = '<p>No events joined yet.</p>';
    } else {
        joinedEvents.forEach(event => {
            const eventItem = `<p>${event.name} on ${event.date}</p>`;
            joinedEventsContainer.insertAdjacentHTML('beforeend', eventItem);
        });
    }

    const createdEvents = JSON.parse(localStorage.getItem('events')) || [];
    const createdEventsContainer = document.getElementById('created-events');
    if (createdEvents.length === 0) {
        createdEventsContainer.innerHTML = '<p>No events created yet.</p>';
    } else {
        createdEvents.forEach(event => {
            const eventItem = `<p>${event.name} at ${event.location} on ${event.date}</p>`;
            createdEventsContainer.insertAdjacentHTML('beforeend', eventItem);
        });
    }
});
