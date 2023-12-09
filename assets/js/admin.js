// function untuk menampilkan dashboard, user, hotel dan reservasi
// sesuai dengan apa yang di klik oleh user/admin
const nav = document.querySelectorAll(".btn-nav");
const tabs = document.querySelectorAll(".content");

nav.forEach((a) => {
	a.addEventListener("click", (e) => {
		const dataTab = e.target.getAttribute("data-tabs");

		//menghilangkan content yg bukan kita cari
		tabs.forEach((tab) => {
			tab.classList.remove("active");
		});

		document.getElementById(dataTab).classList.add("active");
	});
});

// function untuk menampilkan halaman create admin, user dan hotel
// function akan berjalan dan memunculkan halaman sesuai apa yang di klik
const link = document.querySelectorAll(".btn-link");
const linkTab = document.querySelectorAll(".link-create");

link.forEach((item) => {
	item.addEventListener("click", (e) => {
		const dataTab = e.target.getAttribute("data-link");
		const divMain = document.querySelector(".to-back");

		linkTab.forEach((a) => {
			a.classList.remove("show");
		});

		document.getElementById(dataTab).classList.add("show");
		divMain.style.opacity = ".2";
	});
});

// function unutk close halaman create admin, user dan hotel
// const linkClose = document.querySelectorAll(".link-close");

// linkClose.forEach((close) => {
// 	close.addEventListener("click", (e) => {
// 		const tabAdmin = document.querySelector("#create-admin");
// 		const tabUser = document.querySelector("#create-user");
// 		const tabHotel = document.querySelector("#create-hotel");
// 		const divMain = document.querySelector(".to-back");
// 		const showing = document.querySelectorAll("show");

// 		if (
// 			(e.target && tabAdmin.classList.contains("show")) ||
// 			(e.target && tabUser.classList.contains("show")) ||
// 			(e.target && tabHotel.classList.contains("show"))
// 		) {
// 			tabAdmin.classList.remove("show");
// 			tabUser.classList.remove("show");
// 			tabHotel.classList.remove("show");
// 			divMain.style.opacity = "1";
// 		}
// 	});
// });

document.addEventListener("click", (e) => {
	const tabAdmin = document.querySelector("#create-admin");
	const tabUser = document.querySelector("#create-user");
	const tabHotel = document.querySelector("#create-hotel");
	const divMain = document.querySelector(".to-back");
	const showing = document.querySelectorAll("show");

	if (
		e.target &&
		e.target.classList.contains("link-close") &&
		(tabAdmin.classList.contains("show") ||
			tabHotel.classList.contains("show") ||
			tabUser.classList.contains("show"))
	) {
		tabAdmin.classList.remove("show");
		tabHotel.classList.remove("show");
		tabUser.classList.remove("show");

		divMain.style.opacity = "1";
	}
});

// search data untuk user
const inpUser = document.querySelector(".data");
const inpHotel = document.querySelector(".data-hotel");
const inpTransaksi = document.querySelector(".data-transaksi");
const tbody = document.querySelectorAll("#tbody");

// document.querySelector(".cari").addEventListener("click", (e) => {
// 	e.preventDefault();

// 	const dataUser = document.querySelectorAll("#data-user");
// 	const searcValue = inp.value.toLowerCase();

// 	dataUser.forEach((data) => {
// 		const user = data.getAttribute("data-nama").toLowerCase();

// 		// untuk mengatur display ketika data yg dicari ada atau tidak
// 		// dan ada kondisi untuk penegecekan apa yg dicari ada di dalam atau sama dengan data di data-nama
// 		// hasil dari kondisinya boolean
// 		data.style.display = user.includes(searcValue) ? "table-row" : "none";
// 	});
// });

const cari = document.querySelectorAll(".cari");

cari.forEach((a) => {
	a.addEventListener("click", (e) => {
		e.preventDefault();
		const dataCari = e.target.getAttribute("data-cari");

		if (dataCari === "user") {
			const dataUser = document.querySelectorAll("#data-user");

			const searcValue = inpUser.value.toLowerCase();

			dataUser.forEach((data) => {
				const user = data.getAttribute("data-nama").toLowerCase();

				// untuk mengatur display ketika data yg dicari ada atau tidak
				// dan ada kondisi untuk penegecekan apa yg dicari ada di dalam atau sama dengan data di data-nama
				// hasil dari kondisinya boolean
				data.style.display = user.includes(searcValue) ? "table-row" : "none";
			});
		} else if (dataCari === "hotel") {
			const dataHotel = document.querySelectorAll("#data-hotel");
			const searchValue = inpHotel.value.toLowerCase();

			dataHotel.forEach((data) => {
				const hotel = data.getAttribute("data-nama").toLowerCase();

				data.style.display = hotel.includes(searchValue) ? "table-row" : "none";
			});
		} else {
			const dataTransaksi = document.querySelectorAll("#data-transaksi");
			const searchValu = inpTransaksi.value.toLowerCase();

			dataTransaksi.forEach((data) => {
				const transaksi = data.getAttribute("data-nama").toLowerCase();

				data.style.display = transaksi.includes(searchValu)
					? "tabl-row"
					: "none";
			});
		}
	});
});

// function untuk mengurutkan data user

const filterUser = document.querySelector("#filterName");
const table = document.querySelector("table tbody");

filterUser.addEventListener("change", function () {
	const dataFilter = filterUser.value;

	switch (dataFilter) {
		case "id":
			selectedByName(table, dataFilter);
			break;
		case "name":
			selectedByName(table, dataFilter);
			break;
	}

	function selectedByName(list, dataFilter) {
		const items = Array.from(list.children);

		if (dataFilter === "id") {
			items.sort(
				(a, b) => a.getAttribute("data-id") - b.getAttribute("data-id")
			);
		} else if (dataFilter === "name") {
			items.sort((a, b) =>
				a.getAttribute("data-nama").localeCompare(b.getAttribute("data-nama"))
			);
		}

		list.innerHTML = "";

		items.forEach((item) => list.appendChild(item));
	}
});

// dark mode
const darkMode = document.querySelector(".dark-mode");
const img = document.querySelector("#img-icon");
const toggle = document.querySelector(".dark-mode span");

const isSun = true;

// const imgSun = baseUrl + `assets/icons/sun.svg`;
const imgMoon = "assets/icons/moon.svg";
const imgSun = "assets/icons/sun.svg";

img.src = imgMoon;

darkMode.addEventListener("click", function () {
	const toggle = document.querySelector(".dark-mode span");
	const modeBody = document.querySelector(".mode");
	const dash = document.querySelector("#idash");
	const user = document.querySelector("#iuser");
	const hotel = document.querySelector("#ihotel");
	const trans = document.querySelector("#itrans");
	const logout = document.querySelector("#ilogout");
	const title = document.querySelectorAll(".title");

	if (toggle.classList.contains("mode-toggle")) {
		darkMode.style.backgroundColor = "blue";
		modeBody.style.backgroundColor = "white";
		modeBody.style.color = "black";
		dash.style.color = "black";
		user.style.color = "black";
		hotel.style.color = "black";
		trans.style.color = "black";
		logout.style.color = "black";
		title.forEach((t) => {
			t.style.color = "yellow";
		});
		toggle.classList.remove("mode-toggle");
		img.src = imgMoon;
		return;
	}
	toggle.classList.add("mode-toggle");
	img.src = imgSun;
	darkMode.style.backgroundColor = "yellow";
	modeBody.style.backgroundColor = "black";
	modeBody.style.color = "white";
	dash.style.color = "white";
	user.style.color = "white";
	hotel.style.color = "white";
	trans.style.color = "white";
	logout.style.color = "white";
	title.forEach((t) => {
		t.style.color = "red";
	});
});

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
