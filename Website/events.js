document.addEventListener('DOMContentLoaded', () => {
    // Sample Event Data
    const events = [
        { id: 1, name: "Feeding Program", location: "Marawoy Elementary School", date: "October 21, 2024" },
        { id: 2, name: "Tree Planting", location: "Marawoy", date: "October 24, 2024" },
        { id: 3, name: "Informational Seminar", location: "Community Center", date: "October 21, 2024" }
    ];

    // Function to render events dynamically
    const renderEvents = (events) => {
        const eventsList = document.getElementById('events-list');
        eventsList.innerHTML = ''; // Clear existing content

        events.forEach(event => {
            const eventDate = new Date(event.date);
            const day = eventDate.getDate();
            const month = eventDate.toLocaleString('default', { month: 'long' });

            const eventItem = `
                <li>
                    <div class="time">
                        <h2>${day} <br><span>${month}</span></h2>
                    </div>
                    <div class="details">
                        <h3>${event.name}</h3>
                        <p>Location: ${event.location}</p>
                        <p>This is not a real event and is only for testing purposes of the Events display</p>
                        <a href="#">View Details</a>
                    </div>
                    <div style="clear:both;"></div>
                </li>
            `;
            eventsList.insertAdjacentHTML('beforeend', eventItem);
        });
    };

    // Render the events when the DOM is loaded
    renderEvents(events);
});
