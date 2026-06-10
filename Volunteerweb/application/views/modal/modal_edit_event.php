<div id="editEventModal" class="modal">

    <div class="modal-content">

        <span class="close" onclick="closeEditModal()">&times;</span>

        <h2>Edit Event</h2>

        <form method="POST" id="editEventForm">

            <input type="hidden" name="id" id="edit_event_id">

            <label>Event Title</label>
            <input type="text" name="title" id="edit_title" required>

            <label>Event Description</label>
            <input type="text" name="description" id="edit_description">

            <label>Location</label>
            <input type="text" name="location" id="edit_location">

            <label>Date and Time</label>
            <input type="datetime-local" name="event_date" id="edit_event_date">

            <label>Max Quota</label>
            <input type="number" name="max_quota" id="edit_max_quota">

            <label>Hours Reward</label>
            <input type="number" name="hours_reward" id="edit_hours_reward">

            <button type="submit">Save Changes</button>

        </form>

    </div>

</div>