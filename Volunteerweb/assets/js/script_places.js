if (!IS_LOGGED_IN) {

    window.location.replace(
        BASE_URL.replace(
            "assets/images/",
            "auth/login"
        )
    );

}

function showOrganizerAlert()
{
    alert(
        "You must be an organizer to create events.\n\nApply to become one here."
    );
}

function openCreateModal()
{
    document
        .getElementById(
            "createEventModal"
        )
        .style.display = "flex";
}

function closeCreateModal()
{
    document
        .getElementById(
            "createEventModal"
        )
        .style.display = "none";
}

window.onclick = function(e)
{
    const modal =
        document.getElementById(
            "createEventModal"
        );

    if (e.target == modal) {

        modal.style.display =
            "none";
    }
}

document
    .addEventListener(
        "DOMContentLoaded",
        function()
        {
            const form =
                document.getElementById(
                    "createEventForm"
                );

            if (!form) {
                return;
            }

            form.addEventListener(
                "submit",
                async function(e)
                {
                    e.preventDefault();

                    const formData =
                        new FormData();

                    formData.append(
                        "user_id",
                        USER_ID
                    );

                    formData.append(
                        "title",
                        document
                            .getElementById("title")
                            .value
                    );

                    formData.append(
                        "description",
                        document
                            .getElementById("description")
                            .value
                    );

                    formData.append(
                        "location",
                        document
                            .getElementById("location")
                            .value
                    );

                    const eventDate =
                        document
                            .getElementById("event_date")
                            .value
                            .replace("T", " ") + ":00";

                    formData.append(
                        "event_date",
                        eventDate
                    );

                    formData.append(
                        "max_quota",
                        document
                            .getElementById("max_quota")
                            .value
                    );

                    formData.append(
                        "hours_reward",
                        document
                            .getElementById("hours_reward")
                            .value
                    );

                    try {

                        const response =
                            await fetch(
                                BASE_URL.replace(
                                    "assets/images/",
                                    "places/createEvent"
                                ),
                                {
                                    method: "POST",
                                    body: formData
                                }
                            );

                        const result =
                            await response.json();

                        alert(
                            result.message
                        );

                        if (
                            result.status
                        ) {

                            location.reload();

                        }

                    } catch (error) {

                        console.error(
                            error
                        );

                        alert(
                            "Server Error"
                        );

                    }

                }
            );
        }
    );