let db;
	// var request = indexedDB.deleteDatabase('myDatabase');
let dbReq = indexedDB.open('myDatabase');

dbReq.onupgradeneeded = function(event) {
	// Set the db variable to our database so we can use it!
	db = event.target.result;

	let mailHeaders = db.createObjectStore('mail_headers',{keyPath: "id"});
	let mailBody = db.createObjectStore('mail_body',{keyPath: "id"});
	let mailerData = db.createObjectStore('mailer_data',{keyPath: "id"});
    let refreshData = db.createObjectStore('refresh_data',{keyPath: "id"});
	let mail_folder = db.createObjectStore('mail_folder',{keyPath: "id"});
	
}


	dbReq.onsuccess = function(event) {
		db = event.target.result;
		let note = event.target.result;
	}

dbReq.onerror = function(event) {
	alert('error opening database ' + event.target.errorCode);
}


function addStickyNote(db, message,mode=1) {
	// Start a database transaction and get the notes object store
	let tx = db.transaction(['mail_headers'], 'readwrite');
	let store = tx.objectStore('mail_headers');
	// Put the sticky note into the object store
	// Wait for the database transaction to complete
	if(mode==1){
		var data= store.get(1);
//     var data1=JSON.parse(data);
		tx.oncomplete = function() {
			var data1=data.result.text;
			console.log(data1);
		}
		tx.onerror = function(event) {
			alert('error storing note ' + event.target.errorCode);
		}
	}else{
		let note = {id:'102',body: "This json Object Store"};
		store.add(note);
		tx.oncomplete = function() { console.log('stored note!') }
		tx.onerror = function(event) {
			alert('error storing note ' + event.target.errorCode);
		}
	}
}

function storeMailHeaders(msg_no,mail_body) {
	let tx = db.transaction(['mail_headers'], 'readwrite');
	let store = tx.objectStore('mail_headers');
	let note = {id:msg_no,body:mail_body,attachment:''};
	store.add(note);
	tx.oncomplete = function() {
		// console.log('stored note!');
	}
	tx.onerror = function(event) {
		// console.log('error storing note ' + event.target.errorCode);
	}
}
	function storeMail(key_value,mail_id,mailer_name,user_mail_id) {
		let tx = db.transaction(['mailer_data'], 'readwrite');
		let store = tx.objectStore('mailer_data');
		let note = {id:key_value,mail_id:mail_id,body:mailer_name,user_mail:user_mail_id};
		store.add(note);
		tx.oncomplete = function() {
			// console.log('Mailer Information store');
		}
		tx.onerror = function(event) {
			// console.log(mail_id);
			// console.log('error to store mailer information' + event.target.errorCode);
		}
	}
var jarvis_cnt=0;
	function storeMailList(msg_no,mail_body,tag_name,mailer_id,cnt=0) {
		console.log(cnt);
		let tx = db.transaction(['mail_body'], 'readwrite');
		let store = tx.objectStore('mail_body');
		let note = {id:msg_no,body:mail_body,mail_box:tag_name,user_id:mailer_id,seen:0};
		store.add(note);
		
		if(jarvis_cnt==cnt){
			getMailList();
			jarvis_cnt=0;
		}
		jarvis_cnt++;
		tx.oncomplete = function() {

		}
		tx.onerror = function(event) {
			// console.log('error storing note ' + event.target.errorCode);
		}
	}
function getData(mail_no) {
	// console.log(mail_no);
	// let my_mail='"'+mail_no+'"';
	let tx = db.transaction(['mail_headers'], 'readwrite');
	let store = tx.objectStore('mail_headers');
	var data = store.get(mail_no);

//     var data1=JSON.parse(data);
	tx.oncomplete = function (event) {
		var data1 = data.result.body;
		return data1;
	}
	tx.onerror = function (event) {
		console.log('error storing note ' + event.target.errorCode);
	}
}

	function storeRefreshData(id,date,time,mail_nos) {
		let tx = db.transaction(['refresh_data'], 'readwrite');
		let store = tx.objectStore('refresh_data');
		let note = {id:id,date:date,time:time,no_of_mails:mail_nos};
		store.add(note);
		tx.oncomplete = function() {
			console.log('refresh data stores');
		}
		tx.onerror = function(event) {
			// console.log('error storing note ' + event.target.errorCode);
		}
	}
	
	function storemailfolder(id,folders) {
		let tx = db.transaction(['mail_folder'], 'readwrite');
		let store = tx.objectStore('mail_folder');
		let note = {id:id,list:folders};
		store.add(note);
		tx.oncomplete = function() {
			console.log('mail folder data stores');
		}
		tx.onerror = function(event) {
			// console.log('error storing note ' + event.target.errorCode);
		}
	}



