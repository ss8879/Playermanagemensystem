const addButton = document.getElementById("addButton");
const playerDetailsForm = document.getElementById("player-details-form");
const viewbutton = document.getElementById("viewbutton");
const viewdetailsform = document.getElementById("viewdetailsform");
addButton.addEventListener("click", function () {
    if (playerDetailsForm.style.display === "none" || playerDetailsForm.style.display === ""&&viewdetailsform.style.display === "block") {
        viewdetailsform.style.display = "none";
        playerDetailsForm.style.display = "block";
    } else {
        playerDetailsForm.style.display = "none";
    }
});
viewbutton.addEventListener("click", function () {
    if (viewdetailsform.style.display === "none" || viewdetailsform.style.display === "" && playerDetailsForm.style.display === "block") {
        playerDetailsForm.style.display = "none"
        viewdetailsform.style.display = "block";
    } else {
        viewdetailsform.style.display = "none";
    }
});
function hclose(){
    if (viewdetailsform.style.display === "block" ||playerDetailsForm.style.display === "block")
    {
        playerDetailsForm.style.display = "none"
        viewdetailsform.style.display = "none";
    }
}