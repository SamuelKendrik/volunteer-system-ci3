function openEditModal(id, title, description, location, event_date, max_quota, hours_reward) {

    const modal = document.getElementById("editEventModal");

    modal.classList.add("show");

    document.getElementById("edit_event_id").value = id;
    document.getElementById("edit_title").value = title;
    document.getElementById("edit_description").value = description;
    document.getElementById("edit_location").value = location;

    document.getElementById("edit_event_date").value =
        event_date ? event_date.replace(" ", "T").substring(0, 16) : "";

    document.getElementById("edit_max_quota").value = max_quota;
    document.getElementById("edit_hours_reward").value = hours_reward;

    document.getElementById("editEventForm").action =
        "<?= base_url('account/updateEvent/') ?>" + id;
}

function closeEditModal() {
    document.getElementById("editEventModal").classList.remove("show");
}

window.onclick = function (e) {
    const modal = document.getElementById("editEventModal");
    if (e.target === modal) {
        modal.classList.remove("show");
    }
}