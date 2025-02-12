// function showCustomAlert(message = "Alert") {
//     // Set message and title in the modal
//     document.getElementById("customAlertMessage").innerText = message;

//     // Show Bootstrap Modal
//     var myModal = new bootstrap.Modal(document.getElementById("alertModal"));
//     myModal.show();
// }

// function loadBladeView() {
//     $.ajax({
//         url: "/getAlert", // Route defined in Laravel
//         type: "GET",
//         success: function (response) {
//             $("#alertSuccess").html(response); // Load content into a div
//         },
//         error: function () {
//             console.error("Error loading Blade file.");
//         }
//     });
// }