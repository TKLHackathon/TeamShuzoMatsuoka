var lastClickedTd;
var todoList = {};

function init(){
	//クリックイベントリスナーの設定
	var tds = document.getElementsByTagName("td");
	for(var i=0; i<tds.length; i++){
		if(tds[i].getAttribute("class")!="passed" && tds[i].getAttribute("class")!="after-goal")
			tds[i].onclick = popup;
	}
}
function popup(){
	var popupDiv = document.getElementById("popup");
	popupDiv.setAttribute("class", "");
	document.getElementById("popup-background").setAttribute("class", "");
	//日付の取得
	lastClickedTd = event.currentTarget;
	popupDiv.firstElementChild.innerText = lastClickedTd.dataset.month+"/"+lastClickedTd.dataset.day;
}
function closePopup(){
	if(event.target.id!="popup-background")return;
	document.getElementById("popup").setAttribute("class", "hidden");
	document.getElementById("popup-background").setAttribute("class", "hidden");
	
	//ToDoの反映
	lastClickedTd.lastElementChild.innerText = document.forms.form.todo.value;
	//ToDoの保持
	var key = lastClickedTd.dataset.year+"/"+lastClickedTd.dataset.month+"/"+lastClickedTd.dataset.day
	todoList[key] = document.forms.form.todo.value;
	//フォーム初期化
	document.forms.form.todo.value = "";
}

window.onload = init;