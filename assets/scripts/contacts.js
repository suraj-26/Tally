
	var db1;
	// var request = indexedDB.deleteDatabase('myDatabase');
var dbReq1 = indexedDB.open('contact_list');

dbReq1.onupgradeneeded = function(event) {
	// Set the db variable to our database so we can use it!
	db1 = event.target.result;

	var contacts = db1.createObjectStore('contact_diary',{keyPath: "id"});

	
}


	dbReq1.onsuccess = function(event) {
		db1 = event.target.result;
		var note = event.target.result;
		console.log("database");
		console.log(db1);
		  get_contactList().then(function (data1) {
			  show_contact_data();
			  }).catch(function (error) {

                                                });
		
	}

dbReq1.onerror = function(event) {
	alert('error opening database ' + event.target.errorCode);
}




var jarvis_cnt1=0;
	function storecontactList(number,name_with_number,cnt1=0) {
			console.log('data1.length='+cnt1);
		var tx = db1.transaction(['contact_diary'], 'readwrite');
		var store = tx.objectStore('contact_diary');
		var note = {id:number,body:name_with_number};
		store.add(note);
	
		if(jarvis_cnt1==cnt1){																
         $.LoadingOverlay("hide");
			show_contact_data();
			jarvis_cnt1=0;
		}
		jarvis_cnt1++;
		
		tx.oncomplete = function() {

		}
		tx.onerror = function(event) {
			  $.LoadingOverlay("hide");
			// console.log('error storing note ' + event.target.errorCode);
		}
		
	}
