button.onclick = () => {
	window.open("confirmation.js");
};
let newWindow = open("/", "example", "width=300,height=300");
newWindow.focus();

alert(newWindow.location.href); // (*) about:blank, le chargement n'a pas encore commencé

newWindow.onload = function () {
	let html = `<div style="font-size:30px">Welcome!</div>`;
	newWindow.document.body.insertAdjacentHTML("afterbegin", html);
};
