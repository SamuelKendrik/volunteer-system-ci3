<div id="createEventModal" class="modal">

    <div class="modal-content">

        <span class="close-modal" onclick="closeCreateModal()">
            &times;
        </span>

        <h2>
            Create Event
        </h2>

        <form id="createEventForm">

            <input type="text" id="title" placeholder="Event Title" required>

            <textarea id="description" placeholder="Event Description" required></textarea>

            <input type="text" id="location" placeholder="Location" required>

            <input type="datetime-local" id="event_date" required>

            <input type="number" id="max_quota" placeholder="Max Quota" required>

            <input type="number" id="hours_reward" placeholder="Hours Reward" required>

            <button type="submit" class="submit-event-btn">
                Create Event
            </button>

        </form>

    </div>

</div>