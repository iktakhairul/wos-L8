// renter get a report
const updateBaby = () => {
    $("#update-baby-modal").modal("show");
};

$(document).ready(function () {
    $(document).on("click", ".updateBaby", function (e) {
        e.preventDefault();
        updateBaby();
    });
});
