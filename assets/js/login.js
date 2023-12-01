// membuat alert setlah data di input itu hanya waktu 5 detik
const succes = document.querySelector("#success-alert");
const error = document.querySelector("#error-alert");
if (succes) {
	hideAlert(succes);
}
if (error) {
	hideAlert(error);
}

function hideAlert(alert) {
	setTimeout(() => {
		alert.style.display = "none";
	}, 3000);
}

const forgot = document.querySelector(".forgot");
const login = document.querySelector("#log");

forgot.addEventListener("click", function () {
	const changePassword = document.querySelector("#changePassword");

	changePassword.classList.add("show");
	login.classList.add("close");
});
