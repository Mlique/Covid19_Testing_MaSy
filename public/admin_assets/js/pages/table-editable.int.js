$(function () {
    var e = {};
    $(".table-edits tr").editable({
        dropdowns: { Status: ["At Lab", "Closed", "Performed", "Scheduled"] },
        dropdowns: { time_slot: ["06:00 AM - 08:00 AM", "08:00 AM - 10:00 AM", "10:00 AM - 12:00 AM", "12:00 AM - 14:00 PM", "14:00 PM - 16:00 PM", "16:00 PM - 18:00 PM", "18:00 PM - 20:00 PM"] },
        edit: function (t) {
            $(".edit i", this)
                .removeClass("fa-pencil-alt")
                .addClass("fa-save")
                .attr("title", "Save");
        },
        save: function (t) {
            $(".edit i", this)
                .removeClass("fa-save")
                .addClass("fa-pencil-alt")
                .attr("title", "Edit"),
                this in e && (e[this].destroy(), delete e[this]);
        },
        cancel: function (t) {
            $(".edit i", this)
                .removeClass("fa-save")
                .addClass("fa-pencil-alt")
                .attr("title", "Edit"),
                this in e && (e[this].destroy(), delete e[this]);
        },
    });
});

